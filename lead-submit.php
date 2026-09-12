<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$config = __DIR__ . '/config/database.php';
if (!file_exists($config)) {
    exit('Database is not installed. Please run install.php first.');
}

require $config;

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$course = trim($_POST['course'] ?? '');
$city = trim($_POST['city'] ?? '');
$message = trim($_POST['message'] ?? '');
$honeypot = trim($_POST['website'] ?? '');
$qualification = trim($_POST['qualification'] ?? '');
$preferredMode = trim($_POST['preferred_mode'] ?? '');
$preferredCollege = trim($_POST['preferred_college'] ?? '');
$sourcePage = trim($_POST['source_page'] ?? 'website');
$referrer = trim($_POST['referrer'] ?? '');
$utmSource = trim($_POST['utm_source'] ?? '');
$utmMedium = trim($_POST['utm_medium'] ?? '');
$utmCampaign = trim($_POST['utm_campaign'] ?? '');

if ($honeypot !== '') {
    header('Location: index.php?success=1#enquiry');
    exit;
}

if ($name === '' || $course === '' || $city === '' || empty($_POST['consent']) || !preg_match('/^[6-9][0-9]{9}$/', preg_replace('/\D+/', '', $phone))) {
    header('Location: index.php?error=1#enquiry');
    exit;
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?error=1#enquiry');
    exit;
}

$normalizedPhone = preg_replace('/\D+/', '', $phone);
$duplicate = db()->prepare('SELECT id FROM leads WHERE phone = ? AND created_at >= (NOW() - INTERVAL 10 MINUTE) LIMIT 1');
$duplicate->execute([$normalizedPhone]);
if ($duplicate->fetch()) {
    header('Location: index.php?success=1#enquiry', true, 303);
    exit;
}

$stmt = db()->prepare('INSERT INTO leads (name, phone, email, course, city, qualification, preferred_mode, preferred_college, message, source_page, referrer, utm_source, utm_medium, utm_campaign, consent_at, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())');
$stmt->execute([
    $name,
    $normalizedPhone,
    $email,
    $course,
    $city,
    $qualification,
    $preferredMode,
    $preferredCollege,
    $message,
    substr($sourcePage, 0, 255),
    substr($referrer, 0, 500),
    substr($utmSource, 0, 120),
    substr($utmMedium, 0, 120),
    substr($utmCampaign, 0, 160),
]);

header('Location: index.php?success=1#enquiry', true, 303);
exit;
