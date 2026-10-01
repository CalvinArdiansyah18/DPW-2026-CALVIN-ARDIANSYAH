<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

$id = $_POST['id'] ?? null;
$nama = trim($_POST['nama'] ?? '');
$noAnggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');

if (!$id) {
    header('Location: daftar-anggota.php');
    exit;
}

$errors = [];
if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}
if ($noAnggota === '') {
    $errors[] = "No. Anggota wajib diisi.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: edit.php?id=' . urlencode($id));
    exit;
}

/*
 * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
 *
 * $stmt = $pdo->prepare(
 *     "UPDATE anggota SET nama = :nama, no_anggota = :no_anggota,
 *      alamat = :alamat, no_hp = :no_hp WHERE id = :id"
 * );
 * $stmt->execute([
 *     'nama' => $nama,
 *     'no_anggota' => $noAnggota,
 *     'alamat' => $alamat,
 *     'no_hp' => $noHp,
 *     'id' => $id,
 * ]);
 */

// Versi PostgreSQL pg_query_params.
$stmt = pg_query_params(
    $conn,
    "UPDATE anggota
     SET nama = $1, no_anggota = $2, alamat = $3, no_hp = $4
     WHERE id = $5",
    [$nama, $noAnggota, $alamat, $noHp, (int) $id]
);

if ($stmt === false) {
    die("Query database gagal: " . pg_last_error($conn));
}

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil diperbarui.'];
header('Location: daftar-anggota.php');
exit;
