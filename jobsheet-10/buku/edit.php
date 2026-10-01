<?php
require __DIR__ . '/../includes/auth.php';
$page_title = "Edit Buku";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: daftar-buku.php');
    exit;
}

/*
 * Versi PDO - DISIMPAN SEBAGAI KOMENTAR
 *
 * $stmt = $pdo->prepare("SELECT * FROM buku WHERE id = :id");
 * $stmt->execute(['id' => $id]);
 * $buku = $stmt->fetch(PDO::FETCH_ASSOC);
 */

// Versi PostgreSQL pg_query_params.
$stmt = pg_query_params($conn, "SELECT * FROM buku WHERE id = $1", [(int) $id]);

if ($stmt === false) {
    die("Query database gagal: " . pg_last_error($conn));
}

$buku = pg_fetch_assoc($stmt);

if (!$buku) {
    header('Location: daftar-buku.php');
    exit;
}
?>
<section>
    <h2>Edit Buku</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <form id="form-tambah" method="post" action="proses-edit.php">
        <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">
        <p>
            <label for="judul">Judul</label><br>
            <input type="text" id="judul" name="judul" value="<?php echo $buku['judul']; ?>" required>
        </p>
        <p>
            <label for="pengarang">Pengarang</label><br>
            <input type="text" id="pengarang" name="pengarang" value="<?php echo $buku['pengarang']; ?>" required>
        </p>
        <p>
            <label for="tahun">Tahun Terbit</label><br>
            <input type="number" id="tahun" name="tahun" min="1900" max="2026" value="<?php echo $buku['tahun']; ?>" required>
        </p>
        <p>
            <label for="isbn">ISBN</label><br>
            <input type="text" id="isbn" name="isbn" value="<?php echo $buku['isbn']; ?>">
        </p>
        <p>
            <label for="stok">Stok</label><br>
            <input type="number" id="stok" name="stok" min="0" value="<?php echo $buku['stok']; ?>" required>
        </p>
        <p>
            <label for="kategori">Kategori</label><br>
            <select id="kategori" name="kategori">
                <?php foreach (['fiksi' => 'Fiksi', 'non-fiksi' => 'Non-Fiksi', 'referensi' => 'Referensi'] as $value => $label): ?>
                    <option value="<?php echo $value; ?>" <?php echo $buku['kategori'] === $value ? 'selected' : ''; ?>><?php echo $label; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <button type="submit">Update</button>
        </p>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>