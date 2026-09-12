<?php
$config = __DIR__ . '/../config/database.php';
if (!file_exists($config)) {
    exit('Database is not installed. Please run ../install.php first.');
}
require $config;

$leads = db()->query('SELECT * FROM leads ORDER BY id DESC LIMIT 200')->fetchAll();

$pageTitle = 'Admission Leads - KyaKru.com Admin';
$metaDescription = 'View college admission enquiries captured from KyaKru.com.';
$basePath = '../';
require __DIR__ . '/../includes/header.php';
?>
<main>
    <section class="page-hero">
        <div class="container">
            <span class="badge">Admin</span>
            <h1>Admission Leads</h1>
            <p>Latest student enquiries from the website.</p>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="table-wrap">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Contact</th>
                        <th>Course</th>
                        <th>City</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($leads as $lead): ?>
                        <tr>
                            <td><?= e($lead['id']) ?></td>
                            <td><?= e($lead['name']) ?><br><?= e($lead['message']) ?></td>
                            <td><?= e($lead['phone']) ?><br><?= e($lead['email']) ?></td>
                            <td><?= e($lead['course']) ?></td>
                            <td><?= e($lead['city']) ?></td>
                            <td><?= e($lead['status']) ?></td>
                            <td><?= e($lead['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (!$leads): ?>
                        <tr><td colspan="7">No leads yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
