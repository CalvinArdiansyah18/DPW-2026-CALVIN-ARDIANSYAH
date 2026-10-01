<?php
$page_title = "Daftar Buku";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$perPage = 5;
$page = max(1, (int) ($_GET['page'] ?? 1));
$offset = ($page - 1) * $perPage;
$keyword = trim($_GET['q'] ?? '');

/*
 * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
 *
 * if ($keyword !== '') {
 *     $hitung = $pdo->prepare("SELECT COUNT(*) FROM buku WHERE judul ILIKE :kw");
 *     $hitung->execute(['kw' => '%' . $keyword . '%']);
 *     $totalRows = $hitung->fetchColumn();
 *
 *     $stmt = $pdo->prepare("SELECT * FROM buku WHERE judul ILIKE :kw ORDER BY id ASC LIMIT :limit OFFSET :offset");
 *     $stmt->bindValue('kw', '%' . $keyword . '%');
 * } else {
 *     $totalRows = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
 *     $stmt = $pdo->prepare("SELECT * FROM buku ORDER BY id ASC LIMIT :limit OFFSET :offset");
 * }
 * $stmt->bindValue('limit', $perPage, PDO::PARAM_INT);
 * $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
 * $stmt->execute();
 * $daftarBuku = $stmt->fetchAll(PDO::FETCH_ASSOC);
 */

// Versi PostgreSQL pg_query / pg_query_params.
if ($keyword !== '') {
    $kw = '%' . $keyword . '%';

    $hitung = pg_query_params(
        $conn,
        "SELECT COUNT(*) FROM buku WHERE judul ILIKE $1",
        [$kw]
    );

    $stmt = pg_query_params(
        $conn,
        "SELECT * FROM buku WHERE judul ILIKE $1 ORDER BY id ASC LIMIT $2 OFFSET $3",
        [$kw, $perPage, $offset]
    );
} else {
    $hitung = pg_query($conn, "SELECT COUNT(*) FROM buku");

    $stmt = pg_query_params(
        $conn,
        "SELECT * FROM buku ORDER BY id ASC LIMIT $1 OFFSET $2",
        [$perPage, $offset]
    );
}

if ($hitung === false || $stmt === false) {
    die("Query database gagal: " . pg_last_error($conn));
}

$totalRows = (int) pg_fetch_result($hitung, 0, 0);

$daftarBuku = [];
while ($row = pg_fetch_assoc($stmt)) {
    $daftarBuku[] = $row;
}

$totalPages = max(1, (int) ceil($totalRows / $perPage));
?>

<section>
    <h2>Daftar Buku</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <div class="search-box">
        <form method="get" action="daftar-buku.php">
            <span>
                <label for="search-input">Cari Judul Buku</label><br>
                <input type="text" id="search-input" name="q" value="<?php echo $keyword; ?>" placeholder="Ketik judul buku...">
            </span>
            <button type="submit">Cari</button>
        </form>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>ISBN</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarBuku)): ?>
                    <tr>
                        <td colspan="8">Tidak ada data buku yang cocok.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($daftarBuku as $index => $buku): ?>
                        <tr>
                            <td><?php echo $offset + $index + 1; ?></td>
                            <td><?php echo $buku['judul']; ?></td>
                            <td><?php echo $buku['pengarang']; ?></td>
                            <td><?php echo $buku['tahun']; ?></td>
                            <td><?php echo $buku['isbn']; ?></td>
                            <td><?php echo $buku['stok']; ?></td>
                            <td><?php echo $buku['kategori']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $buku['id']; ?>" class="btn-edit">Edit</a>
                                <form class="form-hapus" method="post" action="hapus.php">
                                    <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <nav class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="daftar-buku.php?page=<?php echo $i; ?><?php echo $keyword !== '' ? '&q=' . urlencode($keyword) : ''; ?>"
                class="<?php echo $i === $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </nav>

</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>