<?php
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = trim($_POST['host'] ?? 'localhost');
    $database = trim($_POST['database'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = (string) ($_POST['password'] ?? '');

    if ($host === '' || $database === '' || $username === '') {
        $error = 'Host, database name and username are required.';
    } else {
        try {
            $pdo = new PDO('mysql:host=' . $host . ';charset=utf8mb4', $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
            $pdo->exec('CREATE DATABASE IF NOT EXISTS `' . str_replace('`', '``', $database) . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
            $pdo->exec('USE `' . str_replace('`', '``', $database) . '`');
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS leads (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(120) NOT NULL,
                    phone VARCHAR(30) NOT NULL,
                    email VARCHAR(160) NULL,
                    course VARCHAR(120) NOT NULL,
                    city VARCHAR(120) NOT NULL,
                    message TEXT NULL,
                    status VARCHAR(40) NOT NULL DEFAULT 'New',
                    source_page VARCHAR(255) NULL,
                    created_at DATETIME NOT NULL,
                    updated_at DATETIME NULL,
                    INDEX idx_phone (phone),
                    INDEX idx_course (course),
                    INDEX idx_city (city),
                    INDEX idx_status (status)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
            ");
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS settings (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    setting_key VARCHAR(100) NOT NULL UNIQUE,
                    setting_value TEXT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
            ");

            if (!is_dir(__DIR__ . '/config')) {
                mkdir(__DIR__ . '/config', 0755, true);
            }

            $config = "<?php\n";
            $config .= "define('DB_HOST', " . var_export($host, true) . ");\n";
            $config .= "define('DB_NAME', " . var_export($database, true) . ");\n";
            $config .= "define('DB_USER', " . var_export($username, true) . ");\n";
            $config .= "define('DB_PASS', " . var_export($password, true) . ");\n\n";
            $config .= "function db()\n{\n";
            $config .= "    static \$pdo = null;\n";
            $config .= "    if (\$pdo === null) {\n";
            $config .= "        \$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';\n";
            $config .= "        \$pdo = new PDO(\$dsn, DB_USER, DB_PASS, [\n";
            $config .= "            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,\n";
            $config .= "            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,\n";
            $config .= "        ]);\n";
            $config .= "    }\n";
            $config .= "    return \$pdo;\n";
            $config .= "}\n";

            file_put_contents(__DIR__ . '/config/database.php', $config);
            $message = 'Installation complete. Database tables created and config/database.php saved. For security, delete install.php now.';
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }
    }
}

$pageTitle = 'Install KyaKru.com Database';
$metaDescription = 'Install database tables for KyaKru.com college admission lead website.';
require __DIR__ . '/includes/header.php';
?>
<main>
    <section class="page-hero">
        <div class="container">
            <span class="badge">Database Installer</span>
            <h1>Install KyaKru.com Lead Capture Database</h1>
            <p>Enter your Hostinger MySQL details. This page creates tables and saves the database config.</p>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="lead-box">
                <?php if ($message): ?><div class="alert"><?= e($message) ?></div><?php endif; ?>
                <?php if ($error): ?><div class="alert" style="background:#fff1f1;border-color:#ffc9c9;color:#9f1d1d;"><?= e($error) ?></div><?php endif; ?>
                <form class="form-grid" method="post">
                    <input type="text" name="host" value="localhost" placeholder="Database Host" required>
                    <input type="text" name="database" placeholder="Database Name" required>
                    <input type="text" name="username" placeholder="Database Username" required>
                    <input type="password" name="password" placeholder="Database Password">
                    <button class="btn" type="submit">Create Database Tables</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
