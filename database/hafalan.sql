-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2023 at 02:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hafalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_hafalan_baru`
--

CREATE TABLE `tb_hafalan_baru` (
  `id` int NOT NULL,
  `id_santri` int NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `juz` varchar(100) NOT NULL,
  `surat` varchar(100) NOT NULL,
  `ayat` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hafalan_baru`
--

INSERT INTO `tb_hafalan_baru` (`id`, `id_santri`, `tanggal`, `juz`, `surat`, `ayat`, `created_at`, `updated_at`) VALUES
(5, 4, '2023-09-30', 'Juz 1', 'Al-Fatihah', '1', '2023-09-30 13:08:28', '2023-09-30 13:08:28'),
(6, 4, '2023-09-28', 'Juz 1', 'Al-Masad', '123', '2023-09-30 15:02:45', '2023-09-30 15:02:45'),
(7, 4, '2023-09-30', 'Juz 5', 'Al-Fatihah', 'asd', '2023-09-30 15:17:10', '2023-09-30 15:17:10'),
(8, 4, '2023-09-22', 'Juz 1', 'Al-Ma\'idah', '123', '2023-09-30 15:17:27', '2023-09-30 15:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wali_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nama_kelas`, `wali_kelas`, `created_at`, `updated_at`) VALUES
(1, '1A', 'Ustadz Ahmad Fauzi', '2023-09-09 13:21:00', '2023-09-12 05:10:13'),
(2, '2B', 'Ustadzah Fatimah', '2023-09-09 13:21:00', '2023-09-08 16:00:00'),
(3, '3C', 'Ustad Ali', '2023-09-09 13:21:00', '2023-09-08 16:00:00'),
(26, '2B', 'Gunawan S.Pd', '2023-09-22 22:08:28', '2023-09-23 18:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_murojaah`
--

CREATE TABLE `tb_murojaah` (
  `id` int NOT NULL,
  `id_santri` int NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `juz` varchar(100) NOT NULL,
  `surat` varchar(100) NOT NULL,
  `ayat` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_murojaah`
--

INSERT INTO `tb_murojaah` (`id`, `id_santri`, `tanggal`, `juz`, `surat`, `ayat`, `created_at`, `updated_at`) VALUES
(2, 4, '2023-09-30', 'Juz 1', 'Al-Fatihah', '123', '2023-09-30 13:08:37', '2023-09-30 13:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `nama`, `password`, `level`, `foto`, `tanggal`) VALUES
(1, 'admin', 'Pembina', '66b65567cedbc743bda3417fb813b9ba', 'Administrator', 'anonim.png', '2023-08-04 17:26:42'),
(17, 'putri', '12345', '526641bd710f0e083d38ed9a216391c3', 'Orang Tua Santri', '', '2023-09-30 13:08:09'),
(18, '123', '123', '96de4eceb9a0c2b9b52c0b618819821b', 'Orang Tua Santri', '', '2023-09-30 15:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id` int NOT NULL,
  `id_santri` int NOT NULL,
  `waktu_menghafal` varchar(100) NOT NULL,
  `tanggal_khatam` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id`, `id_santri`, `waktu_menghafal`, `tanggal_khatam`, `created_at`, `updated_at`) VALUES
(3, 4, '123', '2023-09-30', '2023-09-30 13:08:45', '2023-09-30 13:08:45'),
(4, 5, '12312312', '2023-10-05', '2023-10-05 06:04:39', '2023-10-05 06:04:39'),
(5, 5, 'qweqwe', '2023-10-05', '2023-10-05 06:04:52', '2023-10-05 06:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_santri`
--

CREATE TABLE `tb_santri` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggallahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ortu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_santri`
--

INSERT INTO `tb_santri` (`id`, `nis`, `kelas`, `nama`, `tempatlahir`, `tanggallahir`, `nama_ortu`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(4, '12345', '1A', 'Putri Cahyani', 'Makassar', '2000-08-14', 'Bagus', '081923012312', 'Makassar', '2023-09-30 13:08:09', '2023-10-06 00:39:10'),
(5, '123', '1A', '123', '123', '2023-09-07', '123', '123', '123', '2023-09-30 15:01:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_hafalan_baru`
--
ALTER TABLE `tb_hafalan_baru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_murojaah`
--
ALTER TABLE `tb_murojaah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_santri`
--
ALTER TABLE `tb_santri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hafalan_baru`
--
ALTER TABLE `tb_hafalan_baru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_murojaah`
--
ALTER TABLE `tb_murojaah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_santri`
--
ALTER TABLE `tb_santri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
