## 📁 Struktur Folder 

```text
jobsheet-05/
├── index.html                    # Halaman beranda
├── buku/
│   ├── daftar-buku.html          # Tabel daftar buku 
│   └── tambah-buku.html          # Form tambah buku 
├── anggota/
│   ├── daftar-anggota.html       # Tabel daftar anggota 
│   └── tambah-anggota.html       # Form tambah anggota
├── assets/
│   ├── css/
│   │   └── style.css             # Memberikan tampilan pada web
│   └── js/
│       └── app.js                # Menangani fungsi JavaScript
├── docs/
│   └── wireframe.md              # Sketsa awal sebelum dibuat tampilannya
└── README.md                     # Dokumentasi singkat
```
---
## 🔄 Pembaruan & Perubahan Jobsheet 05

| Jenis Perubahan                              | Deskripsi                                                                                                                                                                          |
| :------------------------------------------- | :--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 📜 **Penambahan JavaScript**                 | Menambahkan file `assets/js/app.js` yang digunakan untuk menangani berbagai fungsi interaktif pada website seperti hamburger menu, pencarian, penghapusan data, dan validasi form. |
| 🍔 **Hamburger Menu Menggunakan JavaScript** | Mengubah fungsi hamburger menu agar menggunakan JavaScript untuk membuka dan menutup menu navigasi ketika tombol hamburger diklik.                                                 |
| 🗑️ **Fitur Hapus Data**                     | Menambahkan fitur untuk menghapus data pada tabel dengan tombol hapus dan konfirmasi sebelum data dihapus.                                                                         |
| 🔍 **Fitur Pencarian Buku**                  | Menambahkan fitur pencarian buku berdasarkan data yang terdapat pada tabel. Pengguna dapat mencari judul buku melalui kolom pencarian secara real-time.                            |
| ➕ **Penambahan Form Buku dan Anggota**                   | Menambahkan form untuk memasukkan data buku dan anggota. Data sudah dapat divalidasi, tetapi belum tersimpan atau otomatis masuk ke tabel.    |
| 🎨 **Perubahan CSS**                         | Melakukan perubahan pada `style.css` untuk menyesuaikan tampilan hamburger menu, tombol, form, tabel, kolom pencarian, pesan error, dan tampilan responsif.                        |
| 📝 **Perubahan HTML**                        | Melakukan penyesuaian pada beberapa halaman HTML dengan menambahkan ID, class, tombol hamburger, kolom pencarian, tombol hapus, serta elemen yang dibutuhkan oleh JavaScript.      |
---

## ✨ Hasil Penerapan JavaScript

Penerapan JavaScript pada Jobsheet 05 membuat website menjadi lebih interaktif. Hamburger menu dapat digunakan untuk membuka dan menutup navigasi, data pada tabel dapat dihapus melalui tombol hapus, dan pengguna dapat mencari data buku berdasarkan isi tabel.

Selain itu, form tambah buku dan tambah anggota sudah dilengkapi dengan validasi sehingga dapat memberikan pesan ketika data yang dimasukkan tidak sesuai.

Namun, data yang ditambahkan melalui form belum tersimpan dan belum otomatis muncul pada tabel karena website pada Jobsheet 05 belum menggunakan sistem penyimpanan data atau database.