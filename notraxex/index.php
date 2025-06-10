<?php
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// حذف پیشوند پروژه
$basePath = '/notraxex';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// حذف / آخر و تنظیم '/' برای مسیر اصلی
$uri = rtrim($uri, '/');
if ($uri === '' || $uri === false) $uri = '/';

// بارگذاری کنترلرها
foreach (glob(__DIR__ . "/app/controllers/*.php") as $filename) {
    require_once $filename;
}

// بارگذاری مسیرها
require_once __DIR__ . '/routes/web.php';
?>
