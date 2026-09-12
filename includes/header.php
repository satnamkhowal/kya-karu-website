<?php
require_once __DIR__ . '/functions.php';

$basePath = $basePath ?? '';
$pageTitle = $pageTitle ?? 'KyaKru.com - College Admission Guidance';
$metaDescription = $metaDescription ?? 'Compare courses and colleges and get admission guidance with KyaKru.com.';
$currentPage = $currentPage ?? '';
$canonicalPath = ltrim((string) ($_SERVER['SCRIPT_NAME'] ?? '/'), '/');
$canonicalUrl = 'https://kyakru.com/' . ($canonicalPath === 'index.php' ? '' : $canonicalPath);
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($metaDescription) ?>">
    <meta name="robots" content="<?= strpos($canonicalPath, 'admin/') === 0 || $canonicalPath === 'install.php' ? 'noindex,nofollow' : 'index,follow' ?>">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($metaDescription) ?>">
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <meta property="og:image" content="https://kyakru.com/assets/img/kyakru-logo.svg">
    <link rel="icon" href="<?= e($basePath) ?>assets/img/kyakru-logo.svg" type="image/svg+xml">
    <link rel="stylesheet" href="<?= e($basePath) ?>assets/css/style.css">
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>
<div class="topbar"><div class="container"><span>Free college admission guidance</span><a href="<?= e($basePath) ?>index.php#enquiry">Request a callback</a></div></div>
<header class="site-header">
    <div class="container nav">
        <a class="brand" href="<?= e($basePath) ?>index.php" aria-label="KyaKru.com home"><img src="<?= e($basePath) ?>assets/img/kyakru-logo.svg" width="46" height="46" alt="KyaKru.com"><span>KyaKru.com</span></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu">Menu</button>
        <nav class="menu" id="primary-menu" aria-label="Primary navigation">
            <a href="<?= e($basePath) ?>index.php"<?= active('home', $currentPage) ?>>Home</a>
            <a href="<?= e($basePath) ?>colleges.php"<?= active('colleges', $currentPage) ?>>Colleges</a>
            <a href="<?= e($basePath) ?>courses.php"<?= active('courses', $currentPage) ?>>Courses</a>
            <a href="<?= e($basePath) ?>admission-guidance.php"<?= active('guidance', $currentPage) ?>>Admission Guidance</a>
            <a class="btn" href="<?= e($basePath) ?>index.php#enquiry">Free Counselling</a>
        </nav>
    </div>
</header>
<div id="main-content"></div>
