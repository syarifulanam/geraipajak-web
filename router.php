<?php

/**
 * Router untuk PHP Built-in Server
 * Jalankan dengan: php -S localhost:8000 router.php
 * 
 * File ini memblokir akses ke file sensitif saat development
 */

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

// Daftar file/pattern yang diblokir
$blocked_patterns = [
    '/^\/\.env/',                    // .env, .env.local, dll
    '/^\/\.git/',                    // .git folder
    '/^\/\.htaccess/',               // .htaccess
    '/^\/function-env\.php/',        // function-env.php
    '/\.(bak|sql|log|tar|gz|zip)$/', // file backup
];

foreach ($blocked_patterns as $pattern) {
    if (preg_match($pattern, $path)) {
        http_response_code(403);
        echo "403 Forbidden - Access Denied";
        exit;
    }
}

// Jika file ada, biarkan PHP built-in server handle
$file = __DIR__ . $path;
if (is_file($file)) {
    return false; // Serve file langsung
}

// Default: jalankan index.php
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';
