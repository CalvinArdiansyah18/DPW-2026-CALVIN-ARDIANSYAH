<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

$errors = [];
if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}
if ($username === '') {
    $errors[] = "Username wajib diisi.";
}
if (strlen($password) < 6) {
    $errors[] = "Password minimal 6 karakter.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: register.php');
    exit;
}

/*
 * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
 *
 * $cek = $pdo->prepare("SELECT id FROM users WHERE username = :username");
 * $cek->execute(['username' => $username]);
 * if ($cek->fetch()) {
 *     $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Username sudah digunakan.'];
 *     header('Location: register.php');
 *     exit;
 * }
 */

$cek = pg_query_params(
    $conn,
    "SELECT id FROM users WHERE username = $1",
    [$username]
);

if ($cek === false) {
    die("Query database gagal: " . pg_last_error($conn));
}

if (pg_num_rows($cek) > 0) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Username sudah digunakan.'];
    header('Location: register.php');
    exit;
}

/*
 * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
 *
 * $stmt = $pdo->prepare(
 *     "INSERT INTO users (nama, username, password, role) VALUES (:nama, :username, :password, 'petugas')"
 * );
 * $stmt->execute([
 *     'nama' => $nama,
 *     'username' => $username,
 *     'password' => password_hash($password, PASSWORD_DEFAULT),
 * ]);
 */

// Versi PostgreSQL pg_query_params.
$stmt = pg_query_params(
    $conn,
    "INSERT INTO users (nama, username, password, role)
     VALUES ($1, $2, $3, 'petugas')",
    [$nama, $username, password_hash($password, PASSWORD_DEFAULT)]
);

if ($stmt === false) {
    die("Query database gagal: " . pg_last_error($conn));
}

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Registrasi berhasil, silakan login.'];
header('Location: login.php');
exit;
