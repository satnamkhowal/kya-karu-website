<?php $basePath = $basePath ?? ''; ?>
<section class="cta-band"><div class="container"><h2>Need help choosing a college or course?</h2><p>Share your preferences and get practical admission guidance.</p><a class="btn secondary" href="<?= e($basePath) ?>index.php#enquiry">Get Free Counselling</a></div></section>
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div><h3>KyaKru.com</h3><p>College and course discovery with admission guidance for students across India.</p></div>
            <div><h3>Explore</h3><p><a href="<?= e($basePath) ?>colleges.php">Colleges</a></p><p><a href="<?= e($basePath) ?>courses.php">Courses</a></p><p><a href="<?= e($basePath) ?>admission-guidance.php">Admission Guidance</a></p></div>
            <div><h3>Student Support</h3><p><a href="<?= e($basePath) ?>index.php#enquiry">Free counselling enquiry</a></p><p>Always verify fees, approvals and admission terms directly with the institution.</p></div>
        </div>
        <div class="copyright">&copy; <?= date('Y') ?> KyaKru.com. All rights reserved.</div>
    </div>
</footer>
<script>
(() => {
    const button = document.querySelector('.menu-toggle');
    const menu = document.getElementById('primary-menu');
    if (!button || !menu) return;
    button.addEventListener('click', () => {
        const open = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', String(!open));
        menu.classList.toggle('is-open', !open);
    });
})();
</script>
</body>
</html>
