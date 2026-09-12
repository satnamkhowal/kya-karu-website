<?php require __DIR__ . '/data.php'; ?>
<div class="lead-box" id="enquiry">
    <span class="badge">Free Admission Help</span>
    <h2>Get College Options</h2>
    <p>Fill the form and get counselling for course, fees, eligibility and admission process.</p>
    <?php if (!empty($_GET['success'])): ?>
        <div class="alert">Thank you. Your enquiry has been submitted successfully.</div>
    <?php endif; ?>
    <?php if (!empty($_GET['error'])): ?>
        <div class="alert error-alert">Please enter a valid Indian mobile number and check all required fields.</div>
    <?php endif; ?>
    <form class="form-grid" action="<?= e($basePath ?? '') ?>lead-submit.php" method="post">
        <input type="text" name="name" placeholder="Student Name" required>
        <input type="tel" name="phone" placeholder="10-digit Mobile Number" inputmode="numeric" pattern="[6-9][0-9]{9}" maxlength="10" required>
        <input type="email" name="email" placeholder="Email Address">
        <input class="form-honeypot" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">
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
        <input type="text" name="qualification" placeholder="Current Qualification">
        <select name="preferred_mode"><option value="">Preferred Mode</option><option>Online</option><option>Offline</option><option>Either</option></select>
        <input type="text" name="preferred_college" placeholder="Preferred College (optional)">
        <textarea name="message" placeholder="Tell us your marks, budget or preferred college"></textarea>
        <input type="hidden" name="source_page" value="<?= e($_SERVER['REQUEST_URI'] ?? '') ?>">
        <input type="hidden" name="referrer" value="<?= e($_SERVER['HTTP_REFERER'] ?? '') ?>">
        <input type="hidden" name="utm_source" value="<?= e($_GET['utm_source'] ?? '') ?>">
        <input type="hidden" name="utm_medium" value="<?= e($_GET['utm_medium'] ?? '') ?>">
        <input type="hidden" name="utm_campaign" value="<?= e($_GET['utm_campaign'] ?? '') ?>">
        <label class="consent"><input type="checkbox" name="consent" value="1" required> I agree to be contacted about college admission guidance.</label>
        <button class="btn" type="submit">Submit Enquiry</button>
    </form>
</div>
