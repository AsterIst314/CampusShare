# Feature List v1.2

## Authentication & User Management

- [ ] Pengguna dapat mendaftar menggunakan alamat email.
- [ ] Pengguna dapat login menggunakan email dan password.
- [ ] Pengguna dapat mengelola profil pribadi.
- [ ] Sistem menyimpan informasi pengguna, meliputi:
  - NPM
  - Nama
  - Nomor telepon
  - Fakultas
  - Program studi
  - Informasi profil lainnya yang diperlukan.
- [ ] Sistem membatasi akses fitur berdasarkan status autentikasi pengguna.

## Item / Barang

- [ ] Pengguna dapat melihat daftar barang yang tersedia untuk dipinjam.
- [ ] Sistem mengategorikan barang berdasarkan fungsi atau jenisnya.
- [ ] Setiap barang memiliki informasi dasar seperti:
  - Nama barang
  - Deskripsi
  - Kategori
  - Fakultas pemilik
  - Status ketersediaan
  - Informasi pemilik.
- [ ] Pengguna dapat mencari barang berdasarkan nama atau kata kunci.
- [ ] Pengguna dapat memfilter barang berdasarkan:
  - Kategori
  - Fakultas
  - Status ketersediaan.
- [ ] Sistem menampilkan status barang secara jelas, seperti:
  - Tersedia
  - Menunggu persetujuan
  - Sedang dipinjam
  - Tidak tersedia.

## Borrowing / Lending

- [ ] Pengguna dapat mengajukan permintaan untuk meminjam barang.
- [ ] Pemilik barang dapat menyetujui atau menolak permintaan peminjaman.
- [ ] Sistem mencatat kesepakatan peminjaman antara pemilik dan peminjam.
- [ ] Pengguna dapat melihat detail peminjaman, termasuk aturan dan kesepakatan yang berlaku.
- [ ] Pengguna dapat mengembalikan barang sesuai dengan kesepakatan.
- [ ] Sistem memperbarui status barang berdasarkan siklus peminjaman.
- [ ] Sistem mencatat seluruh aktivitas peminjaman dan pengembalian.

## Borrowing History

- [ ] Pengguna dapat melihat riwayat barang yang pernah dipinjam.
- [ ] Pemilik barang dapat melihat riwayat barang yang pernah dipinjam oleh pengguna lain.
- [ ] Riwayat peminjaman memiliki status:
  - Menunggu persetujuan
  - Disetujui
  - Sedang dipinjam
  - Telah dikembalikan
  - Ditolak
  - Dibatalkan.
- [ ] Sistem menyimpan waktu pengajuan, persetujuan, peminjaman, dan pengembalian.
- [ ] Pengguna dapat melihat detail setiap transaksi peminjaman.

## Rating & Reputation

- [ ] Peminjam dapat memberikan rating terhadap barang setelah barang dikembalikan.
- [ ] Pengguna dapat memberikan rating kepada pengguna lain setelah transaksi selesai.
- [ ] Sistem menghitung dan menampilkan reputasi pengguna berdasarkan rating yang diterima.
- [ ] Sistem mencegah pengguna memberikan rating berulang pada transaksi yang sama.
- [ ] Rating hanya dapat diberikan setelah transaksi mencapai status yang sesuai.

## Communication

- [ ] Pengguna dapat melakukan percakapan dengan pengguna lain.
- [ ] Pengguna dapat mengirim dan menerima pesan terkait proses peminjaman.
- [ ] Sistem menyimpan riwayat percakapan.
- [ ] Pengguna dapat melihat status percakapan atau pesan yang belum dibaca.
- [ ] Sistem menghubungkan percakapan dengan konteks peminjaman apabila diperlukan.

## Notification

- [ ] Pengguna menerima notifikasi ketika permintaan peminjaman dibuat.
- [ ] Pemilik menerima notifikasi ketika terdapat permintaan peminjaman baru.
- [ ] Pengguna menerima notifikasi ketika permintaan disetujui atau ditolak.
- [ ] Pengguna menerima notifikasi terkait batas waktu pengembalian.
- [ ] Pengguna menerima notifikasi ketika barang telah dikembalikan.

##️ Security & Access Control

- [ ] Password pengguna disimpan menggunakan mekanisme hashing yang aman.
- [ ] Sistem memvalidasi data pengguna saat registrasi dan login.
- [ ] Sistem menerapkan kontrol akses terhadap data dan fitur pengguna.
- [ ] Pengguna hanya dapat mengubah data yang menjadi hak aksesnya.
- [ ] Sistem melindungi data pribadi pengguna dari akses yang tidak berwenang.

## Transaction & Audit Log

- [ ] Sistem mencatat perubahan status pada setiap transaksi peminjaman.
- [ ] Sistem mencatat pihak yang melakukan perubahan status transaksi.
- [ ] Sistem mencatat waktu setiap aktivitas penting.
- [ ] Riwayat transaksi tidak dapat diubah secara sembarangan setelah transaksi selesai.
