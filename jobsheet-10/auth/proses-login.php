<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../includes/koneksi.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

/*
 * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
 *
 * $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
 * $stmt->execute(['username' => $username]);
 * $user = $stmt->fetch(PDO::FETCH_ASSOC);
 */

// Versi PostgreSQL pg_query_params.
$stmt = pg_query_params(
    $conn,
    "SELECT * FROM users WHERE username = $1",
    [$username]
);

if ($stmt === false) {
    die("Query database gagal: " . pg_last_error($conn));
}

$user = pg_fetch_assoc($stmt);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];
    header('Location: ../index.php');
    exit;
}

$_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Username atau password salah.'];
header('Location: login.php');
exit;
