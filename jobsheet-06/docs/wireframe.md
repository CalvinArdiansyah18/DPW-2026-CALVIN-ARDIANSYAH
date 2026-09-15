# 📚 Wireframe Sistem Perpustakaan

## 🔐 Halaman Login
```text
┌──────────────────────────────────────┐
│             PERPUSTAKAAN             │
│                                      │
│                 LOGIN                │
│                                      │
│  Email / Username                    │
│  ┌────────────────────────────────┐  │
│  │ Masukkan email / username      │  │
│  └────────────────────────────────┘  │
│                                      │
│  Password                            │
│  ┌────────────────────────────────┐  │
│  │ Masukkan password              │  │
│  └────────────────────────────────┘  │
│                                      │
│  ☐ Ingat saya        Lupa password?  │
│                                      │
│  ┌────────────────────────────────┐  │
│  │            LOGIN               │  │
│  └────────────────────────────────┘  │
│                                      │
│     Belum punya akun? Registrasi     │
└──────────────────────────────────────┘
```
## 📝 Halaman Registrasi
```text
┌──────────────────────────────────────┐
│             PERPUSTAKAAN             │
│                                      │
│              REGISTRASI              │
│                                      │
│  Nama Lengkap                        │
│  ┌────────────────────────────────┐  │
│  │ Masukkan nama lengkap          │  │
│  └────────────────────────────────┘  │
│                                      │
│  Email                               │
│  ┌────────────────────────────────┐  │
│  │ Masukkan email                 │  │
│  └────────────────────────────────┘  │
│                                      │
│  Password                            │
│  ┌────────────────────────────────┐  │
│  │ Masukkan password              │  │
│  └────────────────────────────────┘  │
│                                      │
│  Konfirmasi Password                 │
│  ┌────────────────────────────────┐  │
│  │ Ulangi password                │  │
│  └────────────────────────────────┘  │
│                                      │
│  ┌────────────────────────────────┐  │
│  │          REGISTRASI            │  │
│  └────────────────────────────────┘  │
│                                      │
│       Sudah punya akun? Login        │
└──────────────────────────────────────┘
```

## 📊 Dashboard Admin
```text
┌────────────────────────────────────────────────────────────────────────────────┐
| PERPUSTAKAAN     Beranda | Buku | Anggota | Peminjaman  (Nama Petugas) Logout  |
|--------------------------------------------------------------------------------|
|  [Total Buku]   [Total Anggota]   [Sedang Dipinjam]                            |   
|                                                                                |
|  Aksi Cepat:                                                                   |
|  [ + Peminjaman Baru ]   [ + Pengembalian ]                                    |
|                                                                                |
|  Transaksi Terbaru                                                             |
|  ------------------------------------------------------------------------------| 
|  Anggota | Buku | Tgl Pinjam | Status                                          |
└────────────────────────────────────────────────────────────────────────────────┘
```

## 📖 Halaman Peminjaman Buku
```text
┌──────────────────────────────────────┐
|  Form Peminjaman Buku                |
|--------------------------------------|
|  Anggota : [ dropdown pilih anggota ]|
|  Buku    : [ dropdown, hanya stok>0 ]|
|  Tanggal Pinjam : [ auto: hari ini ] |
|                                      |
|        [  Simpan Peminjaman  ]       |
└──────────────────────────────────────┘
```

## ↩️ Halaman Pengembalian Buku
```text
┌─────────────────────────────────────────────┐
|  Pengembalian Buku                          |
|---------------------------------------------|
|  Cari transaksi aktif:                      |
|  [ nama anggota / judul buku ______ ]       |
|                                             |
|  Anggota | Buku | Tgl Pinjam | [Kembalikan] |
└─────────────────────────────────────────────┘
```

## 🕘 Halaman Riwayat Peminjaman
```text
┌──────────────────────────────────────────────────────┐
|  Riwayat Peminjaman — Siti Aminah                    |
|------------------------------------------------------|
|  Buku             | Pinjam   | Kembali | Status      |
|  Laskar Pelangi   | 01/07    | 10/07   | Selesai     |
|  Bumi Manusia     | 15/07    | -       | Dipinjam    |
└──────────────────────────────────────────────────────┘
```