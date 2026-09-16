## 📁 Struktur Folder 

```text
jobsheet-06/
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
│       ├── app.js                # Menangani fungsi JavaScript umum
│       ├── anggota.js            # Menangani data dan fungsi anggota
│       └── buku.js               # Menangani data dan fungsi buku
├── data/
│   ├── anggota.json              # Data dummy anggota
│   └── buku.json                 # Data dummy buku
├── docs/
│   └── wireframe.md              # Sketsa awal sebelum dibuat tampilannya
└── README.md                     # Dokumentasi singkat
```
---
## 🔄 Pembaruan & Perubahan Jobsheet 06

| Jenis Perubahan                          | Deskripsi                                                                                                                                                                          |
| :--------------------------------------- | :--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 📜 **Penambahan JavaScript Anggota**     | Menambahkan file `assets/js/anggota.js` yang digunakan untuk menangani proses pengambilan, penampilan, dan pengelolaan data anggota pada website.                                  |
| 📚 **Penambahan JavaScript Buku**        | Menambahkan file `assets/js/buku.js` yang digunakan untuk menangani proses pengambilan, penampilan, pencarian, dan pengelolaan data buku pada website.                             |
| 🗂️ **Penambahan Data Dummy JSON**       | Menambahkan folder `data/` yang berisi `anggota.json` dan `buku.json` sebagai sumber data dummy yang digunakan untuk menampilkan data anggota dan buku.                            |
| ⏳ **Loading Indicator**                  | Menambahkan loading indicator yang ditampilkan ketika JavaScript sedang mengambil atau memproses data dari file JSON sehingga pengguna mengetahui bahwa proses sedang berlangsung. |
| ⚠️ **Penanganan Error dengan Try Catch** | Menambahkan penggunaan `try...catch` pada proses JavaScript untuk menangani kesalahan saat mengambil atau memproses data sehingga error dapat ditangani dengan lebih baik.         |
| 🔗 **Pengambilan Data JSON**             | Menggunakan JavaScript untuk mengambil data anggota dan buku dari file JSON dengan metode `fetch()` kemudian menampilkannya pada tabel yang sesuai.                                |
| 📝 **Penyesuaian HTML**                  | Melakukan penyesuaian pada beberapa halaman HTML agar dapat terhubung dengan file JavaScript dan menampilkan data dari file JSON.                                                  |

---
## ✨ Hasil Penerapan JavaScript

Penerapan JavaScript pada Jobsheet 06 membuat website dapat menampilkan data buku dan anggota secara dinamis dari file JSON. Ditambahkan juga **loading indicator** dan `try...catch` untuk menangani proses loading serta error. Data masih menggunakan **dummy JSON** dan belum tersimpan dalam database.
