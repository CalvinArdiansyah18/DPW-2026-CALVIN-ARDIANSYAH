## 📁 Struktur Folder 
```text
jobsheet-10/
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
├── auth/
│   ├── login.php
│   ├── logout.php
│   ├── proses-login.php
│   ├── proses-register.php
│   └── register.php
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
│   ├── auth.php
│   ├── footer.php
│   ├── header.php
│   └── koneksi.php
├── sql/
│   ├── 01_buku_anggota.sql
│   └── 02_users.sql
├── index.php
└── README.md
```
---
## 🔄 Pembaruan & Perubahan Jobsheet 10
| Jenis Perubahan                           | Deskripsi                                                                                                                     |
| :---------------------------------------- | :---------------------------------------------------------------------------------------------------------------------------- |
| 👤 **Penambahan Sistem Login & Register** | Menambahkan fitur autentikasi pengguna melalui halaman `login.php` dan `register.php`.                                        |
| 🔐 **Proses Autentikasi**                 | Menambahkan `proses-login.php` dan `proses-register.php` untuk memproses login dan pendaftaran pengguna menggunakan database. |
| 🚪 **Fitur Logout**                       | Menambahkan `logout.php` untuk mengakhiri session pengguna yang sedang login.                                                 |
| 🛡️ **Proteksi Halaman**                  | Menambahkan `includes/auth.php` untuk membatasi akses halaman tertentu hanya bagi pengguna yang sudah login.                  |
| 🗄️ **Database Pengguna**                 | Menambahkan `sql/02_users.sql` untuk membuat tabel pengguna yang digunakan dalam sistem login dan register.                   |
| 🔗 **Integrasi Session**                  | Menggunakan session PHP untuk menyimpan status login pengguna selama mengakses website.                                       |
| 📚 **CRUD Buku & Anggota**                | Fitur tambah, tampil, edit, dan hapus data buku serta anggota dari Jobsheet 09 tetap dipertahankan.                           |
| 🧩 **Penyederhanaan JavaScript**          | Menggunakan satu file `assets/js/app.js` untuk fungsi JavaScript yang digunakan pada website.                                 |
| 🖥️ **Dashboard Terproteksi**             | Halaman `index.php` digunakan sebagai dashboard setelah pengguna berhasil login.                                              |
---
## ✨ Hasil Penerapan JavaScript

Penerapan pada Jobsheet 10 menambahkan sistem login, register, dan logout dengan session PHP serta proteksi halaman menggunakan auth.php. Database juga diperluas dengan tabel pengguna, sementara fitur CRUD buku dan anggota dari Jobsheet 09 tetap digunakan.