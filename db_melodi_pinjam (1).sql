-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql207.byetcluster.com
-- Generation Time: Apr 10, 2026 at 10:05 AM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_41606399_db_melodi_pinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_musik`
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
-- Dumping data for table `alat_musik`
--

INSERT INTO `alat_musik` (`id_alat`, `nama_alat`, `kategori`, `kategori_id`, `stok`, `harga_denda_perhari`) VALUES
(41, 'Gitar Listrik', NULL, 10, 5, NULL),
(42, 'suling', NULL, 4, 2, NULL),
(45, 'sasando', NULL, 10, 4, NULL),
(47, 'drum', NULL, 15, 2, NULL),
(48, 'gitar', NULL, 10, 2, NULL),
(50, 'angklung', NULL, 7, 4, NULL),
(51, 'bola', NULL, 6, 4, NULL),
(52, 'saksofon', NULL, 4, 5, NULL),
(53, 'ukulele', NULL, 10, 3, NULL),
(54, 'gendang', NULL, 15, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
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
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `pesan`, `waktu`) VALUES
(3, 17, 'Login ke sistem sebagai admin', '2026-04-09 00:15:39'),
(4, 18, 'Login ke sistem sebagai petugas', '2026-04-09 00:46:50'),
(7, 17, 'Login ke sistem sebagai admin', '2026-04-09 01:18:14'),
(34, 17, 'Login ke sistem sebagai admin', '2026-04-10 04:09:05'),
(35, 64, 'Login ke sistem sebagai peminjam', '2026-04-10 04:09:51'),
(36, 64, 'Login ke sistem sebagai peminjam', '2026-04-10 04:11:36'),
(37, 64, 'Login ke sistem sebagai peminjam', '2026-04-10 04:11:38'),
(38, 64, 'Login ke sistem sebagai peminjam', '2026-04-10 04:11:40'),
(39, 64, 'Mengajukan peminjaman: drum', '2026-04-10 04:22:30'),
(40, 17, 'Login ke sistem sebagai admin', '2026-04-10 04:22:50'),
(41, 17, 'Menambah alat baru: gendang', '2026-04-10 04:23:19'),
(42, 18, 'Login ke sistem sebagai petugas', '2026-04-10 04:23:53'),
(43, 18, 'Menyetujui peminjaman ID: 13', '2026-04-10 04:24:03'),
(44, 65, 'Login ke sistem sebagai peminjam', '2026-04-10 04:25:05'),
(45, 17, 'Login ke sistem sebagai admin', '2026-04-10 04:29:17'),
(46, 66, 'Login ke sistem sebagai peminjam', '2026-04-10 04:30:00'),
(47, 66, 'Mengajukan peminjaman: gitar', '2026-04-10 04:30:32'),
(48, 18, 'Login ke sistem sebagai petugas', '2026-04-10 04:30:49'),
(49, 66, 'Mengajukan peminjaman: angklung', '2026-04-10 04:31:56'),
(50, 18, 'Menyetujui peminjaman ID: 25', '2026-04-10 04:32:25'),
(51, 17, 'Login ke sistem sebagai admin', '2026-04-10 04:33:43'),
(52, 17, 'Menghapus alat: kecapi ', '2026-04-10 04:39:04'),
(53, 17, 'Login ke sistem sebagai admin', '2026-04-10 04:40:53'),
(54, 18, 'Login ke sistem sebagai petugas', '2026-04-10 04:42:54'),
(55, 18, 'Login ke sistem sebagai petugas', '2026-04-10 04:49:17'),
(56, 17, 'Login ke sistem sebagai admin', '2026-04-10 04:53:35'),
(57, 19, 'Login ke sistem sebagai peminjam', '2026-04-10 04:54:04'),
(58, 19, 'Mengajukan peminjaman: drum', '2026-04-10 04:57:02'),
(59, 67, 'Login ke sistem sebagai peminjam', '2026-04-10 05:01:10'),
(60, 67, 'Login ke sistem sebagai peminjam', '2026-04-10 05:01:44'),
(61, 67, 'Mengajukan peminjaman: drum', '2026-04-10 05:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
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
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `nama_peminjam`, `id_user`, `id_alat`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(15, NULL, 53, 41, '2026-03-11', NULL, 'dipinjam'),
(16, NULL, 53, 47, '2026-03-11', NULL, 'dipinjam'),
(17, NULL, 19, 41, '2026-03-11', NULL, 'dipinjam'),
(18, NULL, 19, 45, '2026-03-11', NULL, 'dipinjam'),
(23, NULL, 64, 47, '2026-04-10', NULL, 'dipinjam'),
(24, NULL, 66, 48, '2026-04-10', NULL, 'dipinjam'),
(25, NULL, 66, 50, '2026-04-10', NULL, 'dipinjam'),
(26, NULL, 19, 47, '2026-04-10', NULL, 'dipinjam'),
(27, NULL, 67, 47, '2026-04-10', NULL, 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas','peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
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
(64, 'Birli Aulia', 'birli', '$2y$10$qOr4W4wABKZxTqlfZOOi8.3T/20wmpkSadLdIATjnAjdmRPCaxxZy', 'peminjam'),
(65, 'nadia danakitri arya putri', 'nadia', '$2y$10$qGBmq9EuRsSfRtbp.xyOquOxKKnCICmCQReKBf4jZanIEy5ug.AhC', 'peminjam'),
(66, 'Reykal alyuga putra maulana', 'kal kel kol', '$2y$10$q5TUXA6mGpsC6yr5CmqVQOfVGimcT/t2xTmcI4vKjIYsi3TTpHiP6', 'peminjam'),
(67, 'ucokk', 'ucokk', '$2y$10$hvEUpH3OzP47owtj4j/P.efS53Spm9Fn01//kYzxO1.nhiTqWyWZK', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_musik`
--
ALTER TABLE `alat_musik`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `fk_kategori` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `peminjaman_ibfk_2` (`id_alat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_musik`
--
ALTER TABLE `alat_musik`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat_musik`
--
ALTER TABLE `alat_musik`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL;

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `fk_log_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_alat`) REFERENCES `alat_musik` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
