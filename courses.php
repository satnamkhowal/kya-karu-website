<?php
$pageTitle = 'Courses After 12th and Graduation - Admission Help';
$metaDescription = 'Get admission guidance for B.Tech, BCA, MBA, Nursing, Pharmacy, Law, Design and diploma courses in India. Submit enquiry on KyaKru.com.';
$currentPage = 'courses';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/data.php';
?>
<main>
    <section class="page-hero">
        <div class="container">
            <span class="badge">Course Guidance</span>
            <h1>Choose the right course for your career</h1>
            <p>Compare courses after 12th and graduation with practical admission guidance.</p>
        </div>
    </section>
    <section class="section">
        <div class="container grid-2">
            <div class="card">
                <h2>Popular admission courses</h2>
                <ul class="list">
                    <?php foreach ($courses as $course): ?>
                        <li><?= e($course) ?> admission guidance</li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php require __DIR__ . '/includes/lead-form.php'; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
