<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

// Sengaja hanya menerima POST (bukan GET) agar penghapusan tidak bisa
// dipicu tanpa sengaja lewat link/preview crawler.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: daftar-buku.php');
    exit;
}

$id = $_POST['id'] ?? null;
if ($id) {
    /*
     * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
     *
     * $stmt = $pdo->prepare("DELETE FROM buku WHERE id = :id");
     * $stmt->execute(['id' => $id]);
     */

    $stmt = pg_query_params($conn, "DELETE FROM buku WHERE id = $1", [(int) $id]);

    if ($stmt === false) {
        die("Query database gagal: " . pg_last_error($conn));
    }

    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Buku berhasil dihapus.'];
}

header('Location: daftar-buku.php');
exit;
