## 📁 Struktur Folder 
```text
jobsheet-09/
├── anggota/
│   ├── daftar-anggota.php
│   ├── edit.php
│   ├── hapus.php
│   ├── proses-edit.php
│   ├── proses-tambah.php
│   └── tambah-anggota.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
├── buku/
│   ├── daftar-buku.php
│   ├── edit.php
│   ├── hapus.php
│   ├── proses-edit.php
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
## 🔄 Pembaruan & Perubahan Jobsheet 09
| Jenis Perubahan                       | Deskripsi                                                                                                                                                                                                                                        |
| :------------------------------------ | :--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| ✏️ **Fitur Edit Data**                | Menambahkan `buku/edit.php`, `buku/proses-edit.php`, `anggota/edit.php`, dan `anggota/proses-edit.php` untuk melengkapi fitur **Update** pada data buku dan anggota.                                                                             |
| 🗑️ **Fitur Hapus Data**              | Menambahkan `hapus.php` untuk menghapus data. Proses hapus hanya menerima method **POST** agar tidak dapat dipicu secara tidak sengaja melalui URL/GET.                                                             |
| 🔘 **Modifikasi Tombol Hapus**        | Tombol hapus pada `daftar-buku.php` dan `daftar-anggota.php` menggunakan `<form class="form-hapus" method="post">` sehingga penghapusan dilakukan melalui **POST**, bukan tombol `<button>` biasa.                                               |
| ⚙️ **Konfirmasi Hapus pada `app.js`** | Memodifikasi `initHapusConfirm()` pada `app.js` agar konfirmasi hapus dijalankan pada event `submit` form `.form-hapus`, bukan event `click`. Jika pengguna membatalkan konfirmasi, proses submit dibatalkan menggunakan `preventDefault()`. |
| 📄 **Pagination**                     | Menambahkan pagination pada `buku/daftar-buku.php` dan `anggota/daftar-anggota.php` menggunakan `LIMIT` dan `OFFSET`, dengan **5 data per halaman**.                                                                                             |
| 🔎 **Pencarian Server-Side**          | Menambahkan pencarian menggunakan form `GET` dan query `WHERE ... ILIKE :kw`, sehingga pencarian dilakukan oleh database, bukan lagi client-side seperti pada Jobsheet 05/06.                                                                   |
---
## ✨ Hasil Penerapan JavaScript

Penerapan pada Jobsheet 09 menambahkan fitur CRUD lengkap dengan edit dan hapus data. Selain itu, ditambahkan pagination, pencarian server-side, serta konfirmasi tombol hapus melalui app.js sebelum data dihapus dari database.