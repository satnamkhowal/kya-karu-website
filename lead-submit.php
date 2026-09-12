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

if ($honeypot !== '') {
    header('Location: index.php?success=1#enquiry');
    exit;
}

if ($name === '' || $course === '' || $city === '' || !preg_match('/^[6-9][0-9]{9}$/', preg_replace('/\D+/', '', $phone))) {
    header('Location: index.php?error=1#enquiry');
    exit;
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?error=1#enquiry');
    exit;
}

$stmt = db()->prepare('INSERT INTO leads (name, phone, email, course, city, message, source_page, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
$stmt->execute([
    $name,
    $phone,
    $email,
    $course,
    $city,
    $message,
    $_SERVER['HTTP_REFERER'] ?? 'website',
]);

header('Location: index.php?success=1#enquiry', true, 303);
exit;
