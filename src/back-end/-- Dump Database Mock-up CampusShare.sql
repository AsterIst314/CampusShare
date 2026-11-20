-- Dump Database Mock-up CampusShare
-- Target: phpMyAdmin (InfinityFree)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";
SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- 1. Struktur & Data untuk Tabel `user`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nim` (`nim`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id_user`, `nama_lengkap`, `nim`, `email`, `password`, `no_hp`, `fakultas`, `foto_profil`, `created_at`) VALUES
(1, 'Afrizal Guswidianto', '2413020201', 'afrizal@campus.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567801', 'Teknik Informatika', 'afrizal.jpg', '2026-11-10 08:00:00'),
(2, 'Saiful Anwar', '2413020202', 'saiful@campus.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567802', 'Teknik Informatika', 'saiful.jpg', '2026-11-10 08:05:00'),
(3, 'Rangga Pratama', '2413020203', 'rangga@campus.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567803', 'Teknik Informatika', 'rangga.jpg', '2026-11-10 08:10:00'),
(4, 'Yulius Rio', '2413020204', 'yulius@campus.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567804', 'Sistem Informasi', 'yulius.jpg', '2026-11-10 08:15:00'),
(5, 'Nadia Putri', '2413020205', 'nadia@campus.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567805', 'Desain Komunikasi Visual', 'nadia.jpg', '2026-11-10 08:20:00');

-- --------------------------------------------------------
-- 2. Struktur & Data untuk Tabel `barang`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemilik` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `kategori` enum('Elektronik','Buku','Alat Tulis','Praktikum','Lainnya') NOT NULL DEFAULT 'Lainnya',
  `deskripsi` text DEFAULT NULL,
  `kondisi` enum('Sangat Baik','Baik','Cukup') NOT NULL DEFAULT 'Baik',
  `status_ketersediaan` enum('Tersedia','Dipinjam','Tidak Tersedia') NOT NULL DEFAULT 'Tersedia',
  `biaya_sewa_harian` decimal(10,2) DEFAULT 0.00,
  `foto_barang` varchar(255) DEFAULT 'item_default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_barang`),
  KEY `fk_barang_pemilik` (`id_pemilik`),
  CONSTRAINT `fk_barang_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `barang` (`id_barang`, `id_pemilik`, `nama_barang`, `kategori`, `deskripsi`, `kondisi`, `status_ketersediaan`, `biaya_sewa_harian`, `foto_barang`, `created_at`) VALUES
(1, 1, 'Kalkulator Scientific Casio fx-991ID Plus', 'Elektronik', 'Cocok untuk ujian kalkulus dan statistika, baterai aman.', 'Sangat Baik', 'Tersedia', 5000.00, 'kalkulator.jpg', '2026-11-11 09:00:00'),
(2, 2, 'Arduino Uno R3 Starter Kit', 'Praktikum', 'Lengkap dengan breadboard, kabel jumper, dan sensor ultrasonik.', 'Baik', 'Dipinjam', 15000.00, 'arduino.jpg', '2026-11-11 09:30:00'),
(3, 3, 'Buku Algoritma & Pemrograman (Rinaldi Munir)', 'Buku', 'Edisi revisi, tidak ada coretan, sampul plastik rapi.', 'Sangat Baik', 'Tersedia', 0.00, 'buku_algo.jpg', '2026-11-11 10:00:00'),
(4, 4, 'Kabel HDMI to VGA + Audio Converter', 'Elektronik', 'Untuk presentasi sidang/kelas proyektor lama.', 'Baik', 'Tersedia', 3000.00, 'hdmi_vga.jpg', '2026-11-11 10:15:00'),
(5, 5, 'Drawing Pen Snowman Set (0.1 - 0.8)', 'Alat Tulis', 'Tinta masih penuh semua, cocok untuk tugas sketsa.', 'Sangat Baik', 'Tersedia', 2000.00, 'drawing_pen.jpg', '2026-11-11 11:00:00');

-- --------------------------------------------------------
-- 3. Struktur & Data untuk Tabel `peminjaman`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_biaya` decimal(10,2) DEFAULT 0.00,
  `status_peminjaman` enum('Menunggu','Disetujui','Dipinjam','Selesai','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_peminjaman`),
  KEY `fk_pinjam_barang` (`id_barang`),
  KEY `fk_pinjam_user` (`id_peminjam`),
  CONSTRAINT `fk_pinjam_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE,
  CONSTRAINT `fk_pinjam_user` FOREIGN KEY (`id_peminjam`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `peminjaman` (`id_peminjaman`, `id_barang`, `id_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `total_biaya`, `status_peminjaman`, `catatan`, `created_at`) VALUES
(1, 1, 3, '2026-11-12', '2026-11-14', 10000.00, 'Selesai', 'Dipakai untuk kuis Kalkulus II', '2026-11-12 07:30:00'),
(2, 2, 1, '2026-11-18', '2026-11-22', 60000.00, 'Dipinjam', 'Untuk praktikum mikrokontroler kelompok', '2026-11-18 08:00:00'),
(3, 3, 5, '2026-11-15', '2026-11-17', 0.00, 'Selesai', 'Referensi tugas struktur data', '2026-11-15 09:00:00'),
(4, 4, 2, '2026-11-21', '2026-11-21', 3000.00, 'Disetujui', 'Pinjam buat presentasi pagi di Gedung C', '2026-11-19 13:20:00');

-- --------------------------------------------------------
-- 4. Struktur & Data untuk Tabel `chat`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `pesan` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `waktu_kirim` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_chat`),
  KEY `fk_chat_pengirim` (`id_pengirim`),
  KEY `fk_chat_penerima` (`id_penerima`),
  KEY `fk_chat_barang` (`id_barang`),
  CONSTRAINT `fk_chat_pengirim` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `fk_chat_penerima` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `fk_chat_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `chat` (`id_chat`, `id_pengirim`, `id_penerima`, `id_barang`, `pesan`, `is_read`, `waktu_kirim`) VALUES
(1, 3, 1, 1, 'Halo Zal, kalkulatornya besok pagi ready kah?', 1, '2026-11-11 19:00:00'),
(2, 1, 3, 1, 'Ready Ngga, ketemuan di kantin teknik jam 8 ya.', 1, '2026-11-11 19:05:00'),
(3, 1, 2, 2, 'Pul, kit Arduino-nya lengkap sama kabel USB-nya kan?', 1, '2026-11-17 15:10:00'),
(4, 2, 1, 2, 'Lengkap aman, langsung ambil aja di sekre.', 1, '2026-11-17 15:12:00'),
(5, 2, 4, 4, 'Bro, besok pagi aku ambil konverter HDMI-nya sebelum jam 9 ya.', 0, '2026-11-20 09:45:00');

-- --------------------------------------------------------
-- 5. Struktur & Data untuk Tabel `rating`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `id_pemberi_rating` int(11) NOT NULL,
  `id_penerima_rating` int(11) NOT NULL,
  `skor` tinyint(1) NOT NULL CHECK (`skor` BETWEEN 1 AND 5),
  `ulasan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_rating`),
  KEY `fk_rating_peminjaman` (`id_peminjaman`),
  KEY `fk_rating_pemberi` (`id_pemberi_rating`),
  KEY `fk_rating_penerima` (`id_penerima_rating`),
  CONSTRAINT `fk_rating_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE,
  CONSTRAINT `fk_rating_pemberi` FOREIGN KEY (`id_pemberi_rating`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `fk_rating_penerima` FOREIGN KEY (`id_penerima_rating`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rating` (`id_rating`, `id_peminjaman`, `id_pemberi_rating`, `id_penerima_rating`, `skor`, `ulasan`, `created_at`) VALUES
(1, 1, 3, 1, 5, 'Barang berfungsi normal, pemilik fast respon dan ramah.', '2026-11-14 16:00:00'),
(2, 1, 1, 3, 5, 'Peminjam tepat waktu mengembalikan dan barang masih mulus.', '2026-11-14 16:15:00'),
(3, 3, 5, 3, 5, 'Bukunya bersih banget dan sangat membantu buat tugas, makasih!', '2026-11-17 17:00:00');

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;