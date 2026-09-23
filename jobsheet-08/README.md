## 📁 Struktur Folder 

```text
jobsheet-08/
├── anggota/
│   ├── daftar-anggota.php
│   ├── proses-tambah.php
│   └── tambah-anggota.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       ├── anggota.js
│       ├── app.js
│       └── buku.js
├── buku/
│   ├── daftar-buku.php
│   ├── proses-tambah.php
│   └── tambah-buku.php
├── docs/
│   └── wireframe.md
├── includes/
│   ├── footer.php
│   ├── header.php
│   └── koneksi.php
├── sql/
│   └── 01_buku_anggota.sql
├── index.php
└── README.md
```
---
## 🔄 Pembaruan & Perubahan Jobsheet 08
| Jenis Perubahan | Deskripsi |
| :--- | :--- |
| 🗄️ **Penambahan Database** | Menambahkan `sql/01_buku_anggota.sql` untuk membuat tabel `buku` dan `anggota`. |
| 🔌 **Koneksi Database** | Menambahkan `includes/koneksi.php` menggunakan PDO dengan driver PostgreSQL. |
| 📝 **Proses Tambah Data** | Mengubah `proses_tambah.php` agar menyimpan data ke database menggunakan `INSERT ... RETURNING id` dan prepared statement. |
| 📚 **Pengambilan Data** | Mengubah `buku/list.php` dan `anggota/list.php` dari data session menjadi data dari database dengan `SELECT`. |
| 📊 **Statistik Dashboard** | Mengubah statistik pada `index.php` agar menampilkan jumlah buku dan anggota berdasarkan data database. |



---
## ✨ Hasil Penerapan JavaScript

Penerapan database pada Jobsheet 08 membuat website terhubung dengan PostgreSQL menggunakan PDO. Data buku dan anggota kini disimpan dan diambil langsung dari database melalui query SQL, proses tambah data menggunakan prepared statement, dan halaman utama menampilkan jumlah buku serta anggota berdasarkan data yang ada di database.