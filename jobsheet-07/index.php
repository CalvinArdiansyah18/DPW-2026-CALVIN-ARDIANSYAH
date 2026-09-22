<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';

$totalBuku = count($_SESSION['buku'] ?? []);
$totalAnggota = count($_SESSION['anggota'] ?? []);
?>

<section>
    <h2>Selamat Datang di Sistem Perpustakaan</h2>
    <p>Aplikasi untuk mengelola data buku dan anggota perpustakaan.</p>
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