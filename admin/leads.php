<?php
require __DIR__ . '/_auth.php';
require_admin();
$config = __DIR__ . '/../config/database.php';
if (!file_exists($config)) {
    exit('Database is not installed. Please run ../install.php first.');
}
require $config;

$stages = ['New', 'Contacted', 'Qualified', 'Counselling Scheduled', 'Application Started', 'Documents Pending', 'Applied', 'Admission Confirmed', 'Not Interested', 'Follow Up Later'];
$filter = trim($_GET['status'] ?? '');
if ($filter !== '' && in_array($filter, $stages, true)) { $stmt = db()->prepare('SELECT * FROM leads WHERE status = ? ORDER BY id DESC LIMIT 500'); $stmt->execute([$filter]); $leads = $stmt->fetchAll(); } else { $leads = db()->query('SELECT * FROM leads ORDER BY id DESC LIMIT 500')->fetchAll(); }
$counts = array_fill_keys($stages, 0); foreach (db()->query('SELECT status, COUNT(*) total FROM leads GROUP BY status')->fetchAll() as $row) { $counts[$row['status']] = (int) $row['total']; }

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
            <p><a class="btn secondary" href="logout.php">Logout</a></p>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <?php if (!empty($_GET['updated'])): ?><div class="alert">Lead updated.</div><?php endif; ?>
            <div class="stage-grid"><?php foreach ($stages as $stage): ?><a class="card" href="?status=<?= urlencode($stage) ?>"><strong><?= e($stage) ?></strong><span><?= e($counts[$stage]) ?></span></a><?php endforeach; ?></div>
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
                        <th>Source</th>
                        <th>Update</th>
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
                            <td><?= e($lead['status']) ?></td><td><?= e($lead['source_page']) ?><br><?= e($lead['utm_source']) ?></td>
                            <td><form method="post" action="update-lead.php" class="crm-form"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>"><input type="hidden" name="id" value="<?= e($lead['id']) ?>"><select name="status"><?php foreach ($stages as $stage): ?><option<?= $stage === $lead['status'] ? ' selected' : '' ?>><?= e($stage) ?></option><?php endforeach; ?></select><input name="note" placeholder="Follow-up note"><button class="btn">Save</button></form></td>
                            <td><?= e($lead['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (!$leads): ?>
                        <tr><td colspan="9">No leads yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
