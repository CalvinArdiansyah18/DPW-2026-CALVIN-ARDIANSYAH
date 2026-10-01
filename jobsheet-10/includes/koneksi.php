<?php
// ============================================================
// KONEKSI DATABASE
// ============================================================

// ------------------------------------------------------------
// Versi PDO - DISIMPAN SEBAGAI KOMENTAR
// Tidak digunakan karena environment Railway saat ini memiliki
// extension pgsql, tetapi tidak memiliki pdo_pgsql.
// ------------------------------------------------------------
//
// // Koneksi untuk hosting menggunakan Supabase
// $host = getenv('DB_HOST');
// $port = getenv('DB_PORT') ?: '5432';
// $db   = getenv('DB_NAME') ?: 'postgres';
// $user = getenv('DB_USER');
// $pass = getenv('DB_PASSWORD');
//
// try {
//     $pdo = new PDO(
//         "pgsql:host=$host;port=$port;dbname=$db",
//         $user,
//         $pass
//     );
//
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Koneksi database gagal: " . $e->getMessage());
// }
//
// // Koneksi lokal
// $host = "localhost";
// $port = "5432";
// $db   = "simpus_mini";
// $user = "postgres";
// $pass = "3333";
//
// try {
//     $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Koneksi database gagal: " . $e->getMessage());
// }

// ------------------------------------------------------------
// Versi PostgreSQL pgsql - DIGUNAKAN DI RAILWAY
// ------------------------------------------------------------

// $connectionString = getenv('DATABASE_URL');

// if (!$connectionString) {
//     die("DATABASE_URL tidak ditemukan.");
// }

// $conn = pg_connect($connectionString);

// if (!$conn) {
//     die("Koneksi database gagal.");
// }

$connectionString = getenv('DATABASE_URL');

if (!$connectionString) {
    die("DATABASE_URL tidak ditemukan.");
}

try {
    $pdo = new PDO($connectionString);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}