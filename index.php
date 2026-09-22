<?php
$pageTitle = 'KyaKru.com - Best College Admission Guidance in India';
$metaDescription = 'Find the right college with KyaKru.com. Get admission counselling, course comparison, fees guidance and college options for B.Tech, BCA, MBA, Nursing and more.';
$currentPage = 'home';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/data.php';
?>
<main>
    <section class="hero">
        <div class="container hero-grid">
            <div>
                <span class="eyebrow">College Admission Lead Platform</span>
                <h1>Confused about college admission? KyaKru.com helps you decide.</h1>
                <p>Search colleges, compare courses, understand eligibility, fees and placement scope, then connect with an admission counsellor for the next step.</p>
                <div class="hero-actions">
                    <a class="btn" href="#enquiry">Get Free Counselling</a>
                    <a class="btn secondary" href="colleges.php">Explore Colleges</a>
                </div>
                <div class="trust-row">
                    <div class="trust-item">100+ <span>Course Options</span></div>
                    <div class="trust-item">India <span>College Guidance</span></div>
                    <div class="trust-item">Fast <span>Lead Response</span></div>
                </div>
            </div>
            <?php require __DIR__ . '/includes/lead-form.php'; ?>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="badge">Admission Support</span>
                <h2>What students can do on KyaKru.com</h2>
                <p>Built for students who need practical admission guidance instead of confusing lists.</p>
            </div>
            <div class="grid-3">
                <article class="card">
                    <h3>Find Suitable Colleges</h3>
                    <p>Shortlist colleges based on course, city, eligibility, budget and career goal.</p>
                </article>
                <article class="card">
                    <h3>Compare Courses</h3>
                    <p>Understand B.Tech, BCA, MBA, nursing, pharmacy, design and other admission options.</p>
                </article>
                <article class="card">
                    <h3>Capture Enquiries</h3>
                    <p>Every student enquiry is saved in MySQL so your counselling team can follow up.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section soft">
        <div class="container">
            <div class="section-head">
                <span class="badge">Popular Courses</span>
                <h2>Admission guidance for high-demand courses</h2>
            </div>
            <div class="grid-3">
                <?php foreach (array_slice($courses, 0, 6) as $course): ?>
                    <article class="card">
                        <h3><?= e($course) ?></h3>
                        <p>Get eligibility, fees, college options and admission process details for <?= e($course) ?>.</p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="badge">Jaipur College Resource</span>
                <h2>Looking specifically for colleges in Jaipur?</h2>
                <p>Explore <a href="https://collegeinjaipur.com/" target="_blank" rel="noopener">College in Jaipur</a> for Jaipur-focused college discovery, course options and admission guidance.</p>
            </div>
        </div>
    </section>
    <section class="section soft">
        <div class="container">
            <div class="section-head">
                <span class="badge">Jaipur Visitor Resource</span>
                <h2>Planning a Jaipur college visit?</h2>
                <p>Students and families coming to Jaipur can explore <a href="https://swiggywala.com/" target="_blank" rel="noopener">Swiggy Wala Jaipur tours and travel services</a> for local sightseeing, cab travel and Rajasthan trip planning.</p>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
