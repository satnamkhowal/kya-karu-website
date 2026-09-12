<?php require __DIR__ . '/data.php'; ?>
<div class="lead-box" id="enquiry">
    <span class="badge">Free Admission Help</span>
    <h2>Get College Options</h2>
    <p>Fill the form and get counselling for course, fees, eligibility and admission process.</p>
    <?php if (!empty($_GET['success'])): ?>
        <div class="alert">Thank you. Your enquiry has been submitted successfully.</div>
    <?php endif; ?>
    <form class="form-grid" action="<?= e($basePath ?? '') ?>lead-submit.php" method="post">
        <input type="text" name="name" placeholder="Student Name" required>
        <input type="tel" name="phone" placeholder="Mobile Number" required>
        <input type="email" name="email" placeholder="Email Address">
        <select name="course" required>
            <option value="">Select Course</option>
            <?php foreach ($courses as $course): ?>
                <option value="<?= e($course) ?>"><?= e($course) ?></option>
            <?php endforeach; ?>
        </select>
        <select name="city" required>
            <option value="">Preferred City</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= e($city) ?>"><?= e($city) ?></option>
            <?php endforeach; ?>
        </select>
        <textarea name="message" placeholder="Tell us your marks, budget or preferred college"></textarea>
        <button class="btn" type="submit">Submit Enquiry</button>
    </form>
</div>
