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

if ($name === '' || $phone === '' || $course === '' || $city === '') {
    exit('Required fields are missing.');
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

header('Location: index.php?success=1#enquiry');
exit;
