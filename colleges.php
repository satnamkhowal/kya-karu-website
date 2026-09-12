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
