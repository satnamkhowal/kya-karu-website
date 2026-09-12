<?php
$pageTitle = 'Top Colleges Admission Guidance - KyaKru.com';
$metaDescription = 'Explore engineering, management, IT, medical, law and design colleges with admission counselling and lead support from KyaKru.com.';
$currentPage = 'colleges';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/data.php';
?>
<main>
    <section class="page-hero">
        <div class="container">
            <span class="badge">College Search</span>
            <h1>Find colleges by stream, city and admission goal</h1>
            <p>KyaKru.com helps students compare college categories and connect with counselling support.</p>
        </div>
    </section>
    <section class="section">
        <div class="container section-head"><span class="badge">Priority Admissions</span><h2>Explore Jaipur colleges by course</h2><div class="grid-3">
            <a class="card" href="bca-colleges-in-jaipur.php"><h3>BCA Colleges</h3><p>Computer applications after 12th</p></a>
            <a class="card" href="mca-colleges-in-jaipur.php"><h3>MCA Colleges</h3><p>Postgraduate computer applications</p></a>
            <a class="card" href="bba-colleges-in-jaipur.php"><h3>BBA Colleges</h3><p>Undergraduate management</p></a>
            <a class="card" href="mba-colleges-in-jaipur.php"><h3>MBA Colleges</h3><p>Management and specializations</p></a>
            <a class="card" href="engineering-colleges-in-jaipur.php"><h3>Engineering Colleges</h3><p>B.Tech and engineering programmes</p></a>
        </div></div>
    </section>
    <section class="section soft">
        <div class="container grid-3">
            <?php foreach ($colleges as $college): ?>
                <article class="card">
                    <h3><?= e($college['name']) ?></h3>
                    <p><?= e($college['detail']) ?></p>
                    <a class="btn" href="index.php#enquiry">Enquire Now</a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
