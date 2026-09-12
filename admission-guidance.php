<?php
$pageTitle = 'Admission Counselling and College Guidance - KyaKru.com';
$metaDescription = 'Get free admission counselling for college selection, fees, eligibility, documents, application deadlines and career planning from KyaKru.com.';
$currentPage = 'guidance';
require __DIR__ . '/includes/header.php';
?>
<main>
    <section class="page-hero">
        <div class="container">
            <span class="badge">Counselling Process</span>
            <h1>Simple admission guidance from enquiry to application</h1>
            <p>Use this page to explain your counselling process and convert students into verified admission leads.</p>
        </div>
    </section>
    <section class="section">
        <div class="container grid-3">
            <article class="card">
                <h3>1. Student Profile</h3>
                <p>Collect marks, target course, preferred city, budget and admission urgency.</p>
            </article>
            <article class="card">
                <h3>2. College Shortlist</h3>
                <p>Suggest realistic colleges based on eligibility, location, fees and placement scope.</p>
            </article>
            <article class="card">
                <h3>3. Follow Up</h3>
                <p>Store the lead and help the counsellor contact the student for next steps.</p>
            </article>
        </div>
    </section>
    <section class="section soft">
        <div class="container grid-2">
            <div>
                <h2>What we help with</h2>
                <ul class="list">
                    <li>Course selection after 12th or graduation</li>
                    <li>College comparison by city and fees</li>
                    <li>Eligibility and document checklist</li>
                    <li>Admission deadline reminders</li>
                    <li>Career scope and placement discussion</li>
                </ul>
            </div>
            <?php require __DIR__ . '/includes/lead-form.php'; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
