<?php

// Load environment variables
require_once __DIR__ . '/function-env.php';

// Koneksi database menggunakan environment variables
$conn = mysqli_connect(
    env('DB_HOST', '127.0.0.1'),
    env('DB_USER', 'root'),
    env('DB_PASS', ''),
    env('DB_NAME', 'geraipaj_office')
);

// Pastikan koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
