<?php
// Koneksi lokal
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

//Koneksi Supabase + Railway
$connectionString = getenv('DATABASE_URL');

if (!$connectionString) {
    die("DATABASE_URL tidak ditemukan.");
}

try {
    $url = parse_url($connectionString);

    $host = $url['host'];
    $port = $url['port'] ?? 5432;
    $dbname = ltrim($url['path'], '/');
    $username = $url['user'];
    $password = urldecode($url['pass']);

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}