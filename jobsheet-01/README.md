## 📁 Struktur Folder

```text
jobsheet-01/
├── index.html              # Halaman beranda
│   
├── buku/
│   ├── daftar-buku.html    # Tabel daftar buku
│   └── tambah-buku.html    # Form tambah buku
│
├── anggota/
│   ├── daftar-anggota.html # Tabel daftar anggota
│   └── tambah-anggota.html # Form tambah anggota
│
└── README.md               # Dokumentasi project
```

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Kegunaan                                             |
| --------- | ---------------------------------------------------- |
| HTML   | Membuat struktur dan halaman website                 |
| CSS       | Mengatur tampilan website jika tersedia pada project |
| Browser   | Menjalankan dan melihat website                      |

---

## 🔄 Modifikasi yang Dilakukan

### 1. Penambahan Menu pada Halaman Buku

Pada halaman **Daftar Buku** dan **Tambah Buku**, ditambahkan menu **Tambah Anggota** agar pengguna dapat langsung berpindah ke halaman penambahan anggota.

```html
<nav>
    <ul>
        <li><a href="../index.html">Beranda</a></li>
        <li><a href="daftar-buku.html">Daftar Buku</a></li>
        <li><a href="tambah-buku.html">Tambah Buku</a></li>
        <li><a href="../anggota/daftar-anggota.html">Daftar Anggota</a></li>
        <li><a href="../anggota/tambah-anggota.html">Tambah Anggota</a></li>
    </ul>
</nav>
```

### 2. Penambahan Menu pada Halaman Anggota

Pada halaman **Daftar Anggota** dan **Tambah Anggota**, ditambahkan menu **Tambah Buku**.

```html
<nav>
    <ul>
        <li><a href="../index.html">Beranda</a></li>
        <li><a href="../buku/daftar-buku.html">Daftar Buku</a></li>
        <li><a href="../buku/tambah-buku.html">Tambah Buku</a></li>
        <li><a href="daftar-anggota.html">Daftar Anggota</a></li>
        <li><a href="tambah-anggota.html">Tambah Anggota</a></li>
    </ul>
</nav>
```

### 3. Penambahan Kolom Email

Form **Tambah Anggota** dimodifikasi dengan menambahkan input email.

```html
<p>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email">
</p>
```

Penggunaan `type="email"` membantu browser melakukan validasi dasar terhadap format alamat email.

### 4. Penambahan Tanggal Bergabung

Pada tabel **Daftar Anggota**, ditambahkan kolom **Tanggal Bergabung**.

```html
<tr>
    <th>No. Anggota</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No. HP</th>
    <th>Tanggal Bergabung</th>
    <th>Aksi</th>
</tr>
```
Kolom ini digunakan untuk menampilkan informasi kapan seorang anggota mulai terdaftar sebagai anggota perpustakaan.

---

## 🧭 Navigasi Website

Website memiliki navigasi utama sebagai berikut:

* 🏠 **Beranda** — menuju halaman utama.
* 📖 **Daftar Buku** — menampilkan daftar buku.
* ➕ **Tambah Buku** — menampilkan form untuk menambahkan buku.
* 👥 **Daftar Anggota** — menampilkan daftar anggota.
* ➕ **Tambah Anggota** — menampilkan form untuk menambahkan anggota.

Setiap halaman dapat saling terhubung melalui menu navigasi sehingga pengguna tidak perlu kembali ke halaman utama untuk berpindah fitur.

---

## 🎯 Tujuan Modifikasi

Modifikasi dilakukan untuk:

1. Memperluas fitur website perpustakaan.
2. Membuat navigasi antarhalaman lebih lengkap.
3. Menambahkan informasi email anggota.
4. Menampilkan tanggal bergabung anggota.
5. Meningkatkan kemudahan penggunaan website.
