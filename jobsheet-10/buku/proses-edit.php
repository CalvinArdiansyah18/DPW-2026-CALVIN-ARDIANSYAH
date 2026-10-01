<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

$id = $_POST['id'] ?? null;
$judul = trim($_POST['judul'] ?? '');
$pengarang = trim($_POST['pengarang'] ?? '');
$tahun = $_POST['tahun'] ?? '';
$isbn = trim($_POST['isbn'] ?? '');
$stok = $_POST['stok'] ?? '';
$kategori = trim($_POST['kategori'] ?? '');

if (!$id) {
    header('Location: daftar-buku.php');
    exit;
}

$errors = [];
if ($judul === '') {
    $errors[] = "Judul wajib diisi.";
}
if ($pengarang === '') {
    $errors[] = "Pengarang wajib diisi.";
}
if (!is_numeric($tahun) || $tahun < 1900 || $tahun > 2026) {
    $errors[] = "Tahun harus di antara 1900-2026.";
}
if (!is_numeric($stok) || $stok < 0) {
    $errors[] = "Stok tidak boleh negatif.";
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
 *     "UPDATE buku SET judul = :judul, pengarang = :pengarang, tahun = :tahun,
 *      isbn = :isbn, stok = :stok, kategori = :kategori WHERE id = :id"
 * );
 * $stmt->execute([
 *     'judul' => $judul,
 *     'pengarang' => $pengarang,
 *     'tahun' => (int) $tahun,
 *     'isbn' => $isbn,
 *     'stok' => (int) $stok,
 *     'kategori' => $kategori,
 *     'id' => $id,
 * ]);
 */

// Versi PostgreSQL pg_query_params.
$stmt = pg_query_params(
    $conn,
    "UPDATE buku
     SET judul = $1, pengarang = $2, tahun = $3,
         isbn = $4, stok = $5, kategori = $6
     WHERE id = $7",
    [$judul, $pengarang, (int) $tahun, $isbn, (int) $stok, $kategori, (int) $id]
);

if ($stmt === false) {
    die("Query database gagal: " . pg_last_error($conn));
}

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Buku berhasil diperbarui.'];
header('Location: daftar-buku.php');
exit;