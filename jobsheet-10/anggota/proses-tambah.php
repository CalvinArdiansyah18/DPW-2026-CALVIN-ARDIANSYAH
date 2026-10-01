<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$noAnggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');

$errors = [];
if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}

if ($noAnggota === '') {
    $errors[] = "No. Anggota wajib diisi.";
} else {
    /*
     * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
     *
     * $cek = $pdo->prepare("SELECT COUNT(*) FROM anggota WHERE no_anggota = :no_anggota");
     * $cek->execute(['no_anggota' => $noAnggota]);
     * if ($cek->fetchColumn() > 0) {
     *     $errors[] = "No. Anggota sudah digunakan.";
     * }
     */

    $cek = pg_query_params(
        $conn,
        "SELECT COUNT(*) FROM anggota WHERE no_anggota = $1",
        [$noAnggota]
    );

    if ($cek === false) {
        die("Query database gagal: " . pg_last_error($conn));
    }

    if ((int) pg_fetch_result($cek, 0, 0) > 0) {
        $errors[] = "No. Anggota sudah digunakan.";
    }
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah-anggota.php');
    exit;
}

/*
 * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
 *
 * $stmt = $pdo->prepare(
 *     "INSERT INTO anggota (nama, no_anggota, alamat, no_hp)
 *     VALUES (:nama, :no_anggota, :alamat, :no_hp)
 *     RETURNING id"
 * );
 * $stmt->execute([
 *     'nama' => $nama,
 *     'no_anggota' => $noAnggota,
 *     'alamat' => $alamat,
 *     'no_hp' => $noHp,
 * ]);
 */

// Versi PostgreSQL pg_query_params.
$stmt = pg_query_params(
    $conn,
    "INSERT INTO anggota (nama, no_anggota, alamat, no_hp)
     VALUES ($1, $2, $3, $4)
     RETURNING id",
    [$nama, $noAnggota, $alamat, $noHp]
);

if ($stmt === false) {
    die("Query database gagal: " . pg_last_error($conn));
}

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil ditambahkan.'];
header('Location: daftar-anggota.php');
exit;
