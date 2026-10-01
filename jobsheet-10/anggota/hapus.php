<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: daftar-anggota.php');
    exit;
}

$id = $_POST['id'] ?? null;
if ($id) {
    /*
     * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
     *
     * $stmt = $pdo->prepare("DELETE FROM anggota WHERE id = :id");
     * $stmt->execute(['id' => $id]);
     */

    $stmt = pg_query_params($conn, "DELETE FROM anggota WHERE id = $1", [(int) $id]);

    if ($stmt === false) {
        die("Query database gagal: " . pg_last_error($conn));
    }

    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil dihapus.'];
}

header('Location: daftar-anggota.php');
exit;
