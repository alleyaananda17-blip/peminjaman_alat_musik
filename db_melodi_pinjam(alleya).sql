-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2026 pada 07.25
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_melodi_pinjam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_musik`
--

CREATE TABLE `alat_musik` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `harga_denda_perhari` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alat_musik`
--

INSERT INTO `alat_musik` (`id_alat`, `nama_alat`, `kategori`, `kategori_id`, `stok`, `harga_denda_perhari`) VALUES
(38, 'kecapi ', NULL, 10, 2, NULL),
(41, 'Gitar Listrik', NULL, 10, 5, NULL),
(42, 'suling', NULL, 4, 2, NULL),
(45, 'sasando', NULL, 10, 4, NULL),
(47, 'drum', NULL, 15, 2, NULL),
(48, 'gitar', NULL, 10, 2, NULL),
(50, 'angklung', NULL, 7, 4, NULL),
(51, 'bola', NULL, 6, 4, NULL),
(52, 'saksofon', NULL, 4, 5, NULL),
(53, 'ukulele', NULL, 10, 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'di tiup'),
(6, 'di gesek'),
(7, 'di goyangkan'),
(8, 'di tekan'),
(10, 'di petik'),
(15, 'di pukul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `pesan`, `waktu`) VALUES
(3, 17, 'Login ke sistem sebagai admin', '2026-04-09 00:15:39'),
(4, 18, 'Login ke sistem sebagai petugas', '2026-04-09 00:46:50'),
(5, 18, 'Menyetujui peminjaman ID: 16', '2026-04-09 01:10:16'),
(7, 17, 'Login ke sistem sebagai admin', '2026-04-09 01:18:14'),
(13, 17, 'Login ke sistem sebagai admin', '2026-04-09 01:53:55'),
(14, 17, 'Menghapus alat: suling', '2026-04-09 01:54:24'),
(15, 17, 'Menambah alat baru: bola', '2026-04-09 01:55:12'),
(16, 17, 'Menambah alat baru: saksofon', '2026-04-09 01:56:14'),
(17, 17, 'Menambah alat baru: ukulele', '2026-04-09 01:56:49'),
(19, 18, 'Login ke sistem sebagai petugas', '2026-04-09 03:58:08'),
(25, 64, 'Login ke sistem sebagai peminjam', '2026-04-09 04:03:29'),
(26, 64, 'Mengajukan peminjaman: kecapi ', '2026-04-09 04:03:34'),
(27, 18, 'Login ke sistem sebagai petugas', '2026-04-09 04:03:51'),
(28, 64, 'Login ke sistem sebagai peminjam', '2026-04-09 10:06:17'),
(29, 17, 'Login ke sistem sebagai admin', '2026-04-09 10:08:19'),
(30, 17, 'Login ke sistem sebagai admin', '2026-04-09 12:23:07'),
(31, 18, 'Login ke sistem sebagai petugas', '2026-04-09 12:23:25'),
(32, 18, 'Login ke sistem sebagai petugas', '2026-04-09 12:23:31'),
(33, 64, 'Login ke sistem sebagai peminjam', '2026-04-09 12:24:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `nama_peminjam` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_alat` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` enum('dipinjam','kembali') DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `nama_peminjam`, `id_user`, `id_alat`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(12, NULL, 38, 38, '2026-02-18', '2026-04-08', 'kembali'),
(13, NULL, 53, 38, '2026-03-11', '2026-04-08', 'kembali'),
(14, NULL, 53, 38, '2026-03-11', '2026-04-08', 'kembali'),
(15, NULL, 53, 41, '2026-03-11', NULL, 'dipinjam'),
(16, NULL, 53, 47, '2026-03-11', NULL, 'dipinjam'),
(17, NULL, 19, 41, '2026-03-11', NULL, 'dipinjam'),
(18, NULL, 19, 45, '2026-03-11', NULL, 'dipinjam'),
(22, NULL, 64, 38, '2026-04-08', NULL, 'dipinjam');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok_alat` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
    UPDATE alat_musik SET stok = stok - 1 
    WHERE id_alat = NEW.id_alat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas','peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `password`, `role`) VALUES
(17, 'admin', 'admin', 'admin123', 'admin'),
(18, 'petugas', 'petugas', 'petugas123', 'petugas'),
(19, 'alleya ananda putri', 'alea', '$2y$10$Q.zw4cCh3bFCm6YNjaGAguPN2VbaLy0JTPVjTe7y8ycin2BmKC54W', 'peminjam'),
(38, 'nayara dzikra arya putri', 'nayara', '$2y$10$YGA1BAyaa/BnJrDToDARDeXQIcyrgefeJLgxIu5jm1nA.c5shH.ae', 'peminjam'),
(53, 'reykal alyuga putra', 'reykal', '$2y$10$JgbhLZU3NrjxR6hwpBsQ/u0JpjSDb/EAY3EWgqbrVmITbzeRdKLQq', 'peminjam'),
(54, 'yuli novi yanti', 'yuli', '$2y$10$AitzdTkxhh/9yGFQ6/xXMuClDyGKHZzaafiwB7Otw/w60qDZk1jI.', 'peminjam'),
(60, 'almaira', 'almaira', '$2y$10$r/mWG7t8RKIZ6ruNV9/.huf/guXR5R7wTXEIA5uKE5YKrWbjKui/S', 'peminjam'),
(61, 'alaira', 'alaira', '$2y$10$YO1IpTBB14XVTnrtTixh6uqYXApkzvZW//.lFOhR9fbNl7H5nXH9S', 'peminjam'),
(64, 'Birli Aulia', 'birli', '$2y$10$qOr4W4wABKZxTqlfZOOi8.3T/20wmpkSadLdIATjnAjdmRPCaxxZy', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat_musik`
--
ALTER TABLE `alat_musik`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `fk_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `peminjaman_ibfk_2` (`id_alat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat_musik`
--
ALTER TABLE `alat_musik`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alat_musik`
--
ALTER TABLE `alat_musik`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `fk_log_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_alat`) REFERENCES `alat_musik` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
