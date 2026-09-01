## Struktur Folder
```text
jobsheet-01/
├── index.html               # Halaman beranda
├── buku/
│   ├── daftar-buku.html     # Tabel daftar buku (+ Link Daftar & Tambah Anggota)
│   └── tambah-buku.html     # Form tambah buku (+ Link Daftar & Tambah Anggota)
├── anggota/
│   ├── daftar-anggota.html  # Tabel daftar anggota (+ Tanggal Bergabung)
│   └── tambah-anggota.html  # Form tambah anggota (+ Kolom Email) 
├── README.md                # Dokumentasi singkat
```
## Modifikasi
Beberapa modifikasi yang dilakukan pada jobsheet 1

* Daftar dan Tambah Buku 
```diff
<nav>
    <ul>
        <li><a href="../index.html">Beranda</a></li>
        <li><a href="daftar-buku.html">Daftar Buku</a></li>
        <li><a href="tambah-buku.html">Tambah Buku</a></li>
        <li><a href="../anggota/daftar-anggota.html">Daftar Anggota</a></li>
+       <li><a href="../anggota/tambah-anggota.html">Tambah Anggota</a></li>
        </ul>
</nav>
```

* Daftar dan Tambah Anggota

```diff
<nav>
    <ul>
        <li><a href="../index.html">Beranda</a></li>
        <li><a href="../buku/daftar-buku.html">Daftar Buku</a></li>
+       <li><a href="../buku/tambah-buku.html">Tambah Buku</a></li>
        <li><a href="daftar-anggota.html">Daftar Anggota</a></li>
        <li><a href="tambah-anggota.html">Tambah Anggota</a></li>
    </ul>
</nav>
```

```diff
<p>
+    <label for="email">Email</label><br>
+    <input type="email" id="email" name="email">
</p>
```

```diff
<tr>
    <th>No. Anggota</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No. HP</th>
+   <th>Tanggal Bergabung</th>
    <th>Aksi</th>
</tr>
```

