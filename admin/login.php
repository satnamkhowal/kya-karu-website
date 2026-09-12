<?php
require __DIR__ . '/_auth.php';
$config = __DIR__ . '/../config/database.php';
if (!file_exists($config)) { header('Location: ../install.php'); exit; }
require $config;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = db()->prepare('SELECT * FROM admins WHERE email = ? LIMIT 1');
    $stmt->execute([trim($_POST['email'] ?? '')]);
    $admin = $stmt->fetch();
    if ($admin && password_verify((string) ($_POST['password'] ?? ''), $admin['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_email'] = $admin['email'];
        header('Location: leads.php'); exit;
    }
    $error = 'Invalid email or password.';
}
$pageTitle = 'CRM Login - KyaKru.com'; $metaDescription = 'Secure CRM login.'; $basePath = '../'; require __DIR__ . '/../includes/header.php';
?>
<main><section class="section"><div class="container"><div class="lead-box auth-box"><h1>Lead CRM Login</h1><?php if ($error): ?><div class="alert error-alert"><?= e($error) ?></div><?php endif; ?><form class="form-grid" method="post"><input type="email" name="email" placeholder="Admin Email" required><input type="password" name="password" placeholder="Password" required><button class="btn">Login</button></form></div></div></section></main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
