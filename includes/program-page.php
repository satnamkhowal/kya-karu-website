<?php
require __DIR__ . '/data.php';
$program = $priorityPrograms[$programKey];
$matchingColleges = array_values(array_filter($jaipurColleges, function ($college) use ($programKey) {
    return in_array($programKey, $college['programs'], true);
}));
$pageTitle = $program['title'] . ' - Admission Guidance | KyaKru.com';
$metaDescription = $program['description'];
$currentPage = 'colleges';
require __DIR__ . '/header.php';
?>
<main>
    <section class="page-hero"><div class="container"><span class="badge">Jaipur Admission 2026</span><h1><?= e($program['title']) ?></h1><p><?= e($program['description']) ?></p><a class="btn" href="#enquiry">Get Free College Shortlist</a></div></section>
    <section class="section"><div class="container grid-2"><div><h2>Jaipur <?= e($program['name']) ?> college directory</h2><p>Use this curated starting list to research institutions. Course availability, fees, approvals, intake and deadlines can change, so verify current details on the institution’s official website before applying.</p><div class="college-list">
        <?php foreach ($matchingColleges as $college): ?><article class="card college-card"><span class="badge"><?= e($college['type']) ?></span><h3><?= e($college['name']) ?></h3><p><?= e($college['area']) ?>, Jaipur</p><a href="#enquiry">Ask about <?= e($program['name']) ?> admission</a></article><?php endforeach; ?>
    </div></div><?php require __DIR__ . '/lead-form.php'; ?></div></section>
    <section class="section soft"><div class="container"><h2>How to shortlist the right college</h2><div class="grid-3"><article class="card"><h3>Eligibility & approval</h3><p>Confirm entry requirements, affiliation, programme approval and admission route.</p></article><article class="card"><h3>Total cost</h3><p>Compare tuition, examination, hostel, transport and other mandatory charges.</p></article><article class="card"><h3>Career support</h3><p>Ask for recent, verifiable placement information, internship process and recruiter details.</p></article></div></div></section>
</main>
<?php require __DIR__ . '/footer.php'; ?>
