<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/koneksi.php';

/*
 * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
 *
 * $totalBuku = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
 * $totalAnggota = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();
 */

// Versi PostgreSQL pg_query - digunakan di Railway.
$resultBuku = pg_query($conn, "SELECT COUNT(*) FROM buku");
$resultAnggota = pg_query($conn, "SELECT COUNT(*) FROM anggota");

if (!$resultBuku || !$resultAnggota) {
    die("Query database gagal: " . pg_last_error($conn));
}

$totalBuku = pg_fetch_result($resultBuku, 0, 0);
$totalAnggota = pg_fetch_result($resultAnggota, 0, 0);
?>

<section>
    <h2>Selamat Datang di Sistem Perpustakaan</h2>
    <p class="p1">Aplikasi untuk mengelola data buku dan anggota perpustakaan.</p>
</section>

<section>
    <h2>Ringkasan</h2>
    <div class="ringkasan-grid">
        <article>
            <h3>Total Buku</h3>
            <p><?php echo $totalBuku; ?></p>
        </article>
        <article>
            <h3>Total Anggota</h3>
            <p><?php echo $totalAnggota; ?></p>
        </article>
        <article>
            <h3>Sedang Dipinjam</h3>
            <p>0</p>
        </article>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>