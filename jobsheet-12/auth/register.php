<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

$page_title = "Registrasi Petugas";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
<section>
    <h2>Registrasi Petugas</h2>
    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <form action="proses-register.php" method="post">
        <?php echo csrf_field(); ?>
        <p>
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" required>
        </p>
        <p>
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" required>
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required minlength="6">
        </p>
        <p>
            <button type="submit">Daftar</button>
        </p>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>