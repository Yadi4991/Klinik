-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2024 at 04:56 PM
-- Server version: 10.5.23-MariaDB
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id_activity` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktifitas` varchar(60000) NOT NULL,
  `akses` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id_activity`, `nama`, `aktifitas`, `akses`, `waktu`) VALUES
(3, 'asep ', 'Menambahkan jenis obat bernama Antibiotik dengan stok 10', 'Admin', '2024-05-31 02:35:38'),
(4, 'asep ', 'Menambahkan jenis obat bernama Antihipertensi dengan stok 10', 'Admin', '2024-05-31 03:00:25'),
(14, 'asep ', 'Mengubah data seorang dokter bernama Junet dengan spesialisasi Umum', 'Admin', '2024-06-02 01:22:35'),
(15, 'asep ', 'Menambahkan jadwal dihari Senin seorang dokter bernama Junet', 'Admin', '2024-06-02 14:11:33'),
(16, 'asep ', 'Menambahkan jadwal dihari Senin seorang dokter bernama Nuruls', 'Admin', '2024-06-03 00:13:49'),
(23, 'asep ', 'Mengubah jadwal dihari Senin seorang dokter bernama Junet', 'Admin', '2024-06-03 00:18:18'),
(31, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 12:08:28'),
(37, 'asep ', 'Menambahkan data seorang dokter bernama Nurul dengan spesialisasi THT', 'Admin', '2024-06-03 12:22:00'),
(48, 'asep ', 'Mengubah data seorang dokter bernama Rafi dengan spesialisasi THT', 'Admin', '2024-06-03 12:22:39'),
(49, 'asep ', 'Menghapus data seorang dokter bernama  dengan spesialisasi ', 'Admin', '2024-06-03 12:26:10'),
(59, 'asep ', 'Menghapus data seorang dokter bernama  dengan spesialisasi ', 'Admin', '2024-06-03 12:26:10'),
(60, 'asep ', 'Menambahkan data seorang dokter bernama Le bron dengan spesialisasi THT', 'Admin', '2024-06-03 12:28:08'),
(70, 'asep ', 'Mengubah data seorang dokter bernama Le bron dengan spesialisasi Umum', 'Admin', '2024-06-03 12:28:24'),
(81, 'asep ', 'Mengubah data seorang dokter bernama Le Pablo dengan spesialisasi Umum', 'Admin', '2024-06-03 12:31:40'),
(93, 'asep ', 'Mengubah data seorang dokter bernama Le Pablo dengan spesialisasi THT', 'Admin', '2024-06-03 12:37:52'),
(104, 'asep ', 'Mengubah data seorang dokter bernama Le Pablo dengan spesialisasi Umum', 'Admin', '2024-06-03 12:39:26'),
(115, 'asep ', 'Menghapus data seorang dokter bernama  dengan spesialisasi ', 'Admin', '2024-06-03 12:41:25'),
(119, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(120, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(121, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(122, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(123, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(124, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(125, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(126, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(127, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(128, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(129, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(130, 'asep ', 'Menghapus jenis obat bernama ', 'Admin', '2024-06-03 14:12:31'),
(131, 'asep ', 'Menghapus data seorang dokter bernama  dengan spesialisasi ', 'Admin', '2024-06-03 14:13:35'),
(132, 'asep ', 'Menambahkan data seorang dokter bernama Riyadh dengan spesialisasi Umum', 'Admin', '2024-06-03 14:15:13'),
(133, 'asep ', 'Menghapus data seorang dokter bernama  dengan spesialisasi ', 'Admin', '2024-06-03 14:15:41'),
(134, 'asep ', 'Menghapus data seorang dokter bernama Riyadh dengan spesialisasi Umum', 'Admin', '2024-06-03 14:16:35'),
(135, 'asep ', 'Menghapus data seorang dokter bernama  dengan spesialisasi ', 'Admin', '2024-06-03 14:18:53'),
(136, 'asep ', 'Menghapus data seorang dokter bernama Riyadh dengan spesialisasi Umum', 'Admin', '2024-06-03 14:34:51'),
(137, 'asep ', 'Menghapus data seorang dokter bernama Riyadh dengan spesialisasi Umum', 'Admin', '2024-06-03 14:48:20'),
(138, 'asep ', 'Menghapus data seorang dokter bernama Nu dengan spesialisasi Umum', 'Admin', '2024-06-03 16:47:29'),
(139, 'asep ', 'Menambahkan data seorang dokter bernama Dr. Dree dengan spesialisasi Umum', 'Admin', '2024-06-03 16:57:54'),
(140, 'asep ', 'Menghapus data seorang dokter bernama Dr. Dre dengan spesialisasi Gigi', 'Admin', '2024-06-03 17:05:21'),
(141, 'asep ', 'Menambahkan data seorang dokter bernama Dr. Dree dengan spesialisasi Umum', 'Admin', '2024-06-03 17:05:43'),
(142, 'asep ', 'Menghapus data seorang dokter bernama Dr. Dree dengan spesialisasi Umum', 'Admin', '2024-06-03 17:25:27'),
(143, 'asep ', 'Menambahkan data seorang dokter bernama Dr. Dree dengan spesialisasi Umum', 'Admin', '2024-06-03 17:26:56'),
(144, 'asep ', 'Mengubah data seorang dokter sebelumnya bernama Dr. Dree menjadi Dr. Dre dengan spesialisasi Umum menjadi Gigi', 'Admin', '2024-06-03 17:31:14'),
(145, 'asep ', 'Menghapus data seorang dokter bernama Dr. Dre dengan spesialisasi Gigi', 'Admin', '2024-06-03 17:31:54'),
(146, 'asep ', 'Menghapus jadwal dihari Senin seorang dokter bernama Nurul dimulai dari jam  selesai dijam ', 'Admin', '2024-06-03 17:38:48'),
(147, 'asep ', 'Menambahkan jadwal dihari Jumat seorang dokter bernama Nur dimulai dari jam 17:40 selesai dijam 18:40', 'Admin', '2024-06-03 17:40:55'),
(148, 'asep ', 'Menambahkan jadwal dihari Minggu seorang dokter bernama Nur dimulai dari jam 18:45 selesai dijam 19:45', 'Admin', '2024-06-03 17:45:43'),
(149, 'asep ', 'Mengubah jadwal sebelumnya dihari Minggu menjadi Sabtu seorang dokter sebelumnya bernama Nur menjadi Nurul dimulai dijam sebelumnya 18:45 menjadi 19:45 selesai dijam sebelumnya 19:45 menjadi 20:45', 'Admin', '2024-06-03 17:46:05'),
(150, 'asep ', 'Mengubah jadwal sebelumnya dihari Minggu menjadi Sabtu seorang dokter sebelumnya bernama Nur menjadi Nurul dimulai dijam sebelumnya 18:45 menjadi 19:45 selesai dijam sebelumnya 19:45 menjadi 20:45', 'Admin', '2024-06-03 17:48:13'),
(151, 'asep ', 'Menghapus jadwal dihari  seorang dokter bernama  dimulai dari jam  selesai dijam ', 'Admin', '2024-06-03 17:51:58'),
(152, 'asep ', 'Menghapus jadwal dihari Senin seorang dokter bernama Nuri dimulai dari jam 17:41 selesai dijam 18:41', 'Admin', '2024-06-04 14:13:50'),
(158, 'asep ', 'Mengubah akun dengan username sebelumnya a menjadi l dengan password sebelumnya a menjadi l dengan nama sebelumnya Aight menjadi Light diberikan akses sebelumnya setingkat Employee menjadi Admin', 'Admin', '2024-06-04 14:42:50'),
(159, 'asep ', 'Menghapus akun dengan username l dengan password l dengan nama Light diberikan akses setingkat Admin', 'Admin', '2024-06-04 14:44:39'),
(160, 'asep ', 'Menghapus akun dengan username l dengan password l dengan nama Light diberikan akses setingkat Admin', 'Admin', '2024-06-04 14:44:39'),
(161, 'asep ', 'Menghapus akun dengan username l dengan password l dengan nama Light diberikan akses setingkat Admin', 'Admin', '2024-06-04 14:44:39'),
(162, 'asep ', 'Menambahkan akun dengan username l dengan password l dengan nama Light diberikan akses setingkat Employee', 'Admin', '2024-06-04 14:47:25'),
(163, 'asep ', 'Menambahkan jenis obat bernama Antibiotik dengan stok 10', 'Admin', '2024-06-04 14:52:03'),
(184, 'asep ', 'Menambahkan stok obat bernama Antibiotik menambah sejumlah 1', 'Admin', '2024-06-04 15:07:15'),
(185, 'asep ', 'Menghapus jenis obat bernama Simvastatin', 'Admin', '2024-06-04 15:10:23'),
(186, 'asep ', 'Menambahkan data seorang pasien bernik 1000000000000002 dengan nama Aang berjenis kelamin Laki-laki dengan tanggal lahir 2024-06-04', 'Admin', '2024-06-04 15:59:10'),
(191, 'asep ', 'Mengubah data seorang pasien sebelumnya bernik 1000000000000001 sekarang bernik 1000000000000002 dengan nama sebelumnya Anji diganti menjadi Anti berjenis kelamin sebelumnya Laki-laki diganti menjadi Perempuan dengan tanggal lahir sebelumnya 2024-06-02 diganti menjadi 2024-06-04', 'Admin', '2024-06-04 16:04:19'),
(192, 'asep ', 'Menghapus data seorang pasien bernik 1111111111111111 dengan nama Asep berjenis kelamin Laki-laki dengan tanggal lahir 1', 'Admin', '2024-06-04 16:20:29'),
(193, 'asep ', 'Menghapus data riwayat bernik  dengan nama  didiagnosa  dengan obat  ditangani dokter  ditanggal ', 'Admin', '2024-06-05 01:31:45'),
(194, 'asep ', 'Menghapus data riwayat bernik  dengan nama  didiagnosa  dengan obat Meriang, Masuk Angin ditangani dokter  ditanggal ', 'Admin', '2024-06-05 01:34:40'),
(195, 'asep ', 'Menghapus data riwayat bernik 1 dengan nama 1 didiagnosa  dengan obat 1 ditangani dokter 1 ditanggal 2024-06-30', 'Admin', '2024-06-05 01:36:19'),
(196, 'asep ', 'Menghapus data riwayat bernik 11 dengan nama ase didiagnosa  dengan obat as ditangani dokter as ditanggal 2024-06-05', 'Admin', '2024-06-05 01:40:17'),
(197, 'asep ', 'Menambahkan data riwayat bernik 1000000000000001 dengan nama Nurul didiagnosa Meriang dengan obat Parasetamol   ditangani dokter Nur ditanggal 2024-06-05', 'Admin', '2024-06-05 02:36:05'),
(198, 'asep ', 'Menambahkan data riwayat bernik 1000000000000000 dengan nama asd didiagnosa Meriang dengan obat Ibuprofen  ditangani dokter Nuruls ditanggal ', 'Admin', '2024-06-05 02:52:36'),
(199, 'asep ', 'Menghapus data riwayat bernik 1000000000000000 dengan nama asd didiagnosa  dengan obat Ibuprofen  ditangani dokter Nuruls ditanggal 2024-06-05', 'Admin', '2024-06-05 02:53:41'),
(200, 'asep ', 'Menghapus data riwayat bernik 1000000000000001 dengan nama Nurul didiagnosa  dengan obat Parasetamol   ditangani dokter Nur ditanggal 2024-06-05', 'Admin', '2024-06-05 02:54:01'),
(201, 'asep ', 'Menghapus data riwayat bernik 1000000000000002 dengan nama asd didiagnosa  dengan obat Parasetamol  Antibiotik  ditangani dokter Nurul ditanggal 2024-06-05', 'Admin', '2024-06-05 02:54:17'),
(202, 'asep ', 'Menambahkan data riwayat bernik 1000000000000000 dengan nama asd didiagnosa Meriang dengan obat Parasetamol   ditangani dokter Nurul ditanggal ', 'Admin', '2024-06-05 02:55:08'),
(203, 'asep ', 'Menambahkan data riwayat bernik 1000000000000002 dengan nama Nurul didiagnosa Meriang dengan obat Parasetamol   ditangani dokter Nurul ditanggal CURRENT_TIMESTAMP', 'Admin', '2024-06-05 17:41:44'),
(204, 'asep ', 'Menambahkan data riwayat bernik 1000000000000002 dengan nama Noval didiagnosa Meriang dengan obat Parasetamol   ditangani dokter Nurul ditanggal CURRENT_TIMESTAMP', 'Admin', '2024-06-05 17:43:09'),
(205, 'asep ', 'Menambahkan data riwayat bernik 1000000000000000 dengan nama Asya didiagnosa Lambung dengan obat Parasetamol  Cetirizine  ditangani dokter Nurul', 'Admin', '2024-06-05 23:01:56'),
(206, 'asep ', 'Menambahkan data riwayat bernik 1000000000000000 dengan nama Anto didiagnosa Meriang dengan obat Parasetamol   ditangani dokter Nur', 'Admin', '2024-06-06 13:56:09'),
(207, 'asep ', 'Menambahkan data seorang pasien bernik 1000000000000001 dengan nama Otong berjenis kelamin Laki-laki dengan tanggal lahir 1999-12-26', 'Admin', '2024-06-06 22:38:17'),
(208, 'asep ', 'Mengubah data seorang pasien sebelumnya bernik 1000000000000001 sekarang bernik 1000000000000003 dengan nama sebelumnya Otong diganti menjadi Andi berjenis kelamin sebelumnya Laki-laki diganti menjadi Laki-laki dengan tanggal lahir sebelumnya 1999-12-26 diganti menjadi 1999-12-26', 'Admin', '2024-06-06 22:41:32'),
(209, 'asep ', 'Menghapus data seorang pasien bernik 1000000000000003 dengan nama Andi berjenis kelamin Laki-laki dengan tanggal lahir 1999-12-26', 'Admin', '2024-06-06 22:48:33'),
(210, 'asep ', 'Menghapus data riwayat bernik 1000000000000000 dengan nama Asya didiagnosa  dengan obat Parasetamol  Cetirizine  ditangani dokter Nurul ditanggal 2024-06-05 23:01:56', 'Admin', '2024-06-06 22:59:44'),
(211, 'asep ', 'Menambahkan data riwayat bernik 1000000000000000 dengan nama Nova didiagnosa Lambung dengan obat Omeprazole  ditangani dokter Dr. Adi Hidayat', 'Admin', '2024-06-06 23:01:48'),
(212, 'asep ', 'Menghapus data riwayat bernik 1000000000000000 dengan nama Nova didiagnosa  dengan obat Omeprazole  ditangani dokter Dr. Adi Hidayat ditanggal 2024-06-06 23:01:48', 'Admin', '2024-06-06 23:02:05'),
(213, 'asep ', 'Menambahkan jenis obat bernama Anti Pencahar dengan stok 10', 'Admin', '2024-06-06 23:11:23'),
(214, 'asep ', 'Menambahkan stok obat bernama Anti Pencahar menambah sejumlah 1', 'Admin', '2024-06-06 23:11:31'),
(215, 'asep ', 'Menambahkan stok obat bernama Anti Pencahar menambah sejumlah 10', 'Admin', '2024-06-06 23:11:56'),
(216, 'asep ', 'Menghapus jenis obat bernama Anti Pencahar', 'Admin', '2024-06-06 23:12:10'),
(217, 'asep ', 'Menambahkan data seorang dokter bernama Dr. Dree dengan spesialisasi Umum', 'Admin', '2024-06-06 23:23:32'),
(218, 'asep ', 'Menghapus data seorang dokter bernama Dr. Dree dengan spesialisasi Umum', 'Admin', '2024-06-06 23:23:38'),
(219, 'asep ', 'Menambahkan data seorang dokter bernama Dr. Dree dengan spesialisasi Umum', 'Admin', '2024-06-06 23:24:03'),
(220, 'asep ', 'Mengubah data seorang dokter sebelumnya bernama Dr. Dree menjadi Dr. Dre dengan spesialisasi Umum menjadi THT', 'Admin', '2024-06-06 23:24:25'),
(221, 'asep ', 'Menghapus data seorang dokter bernama Dr. Dre dengan spesialisasi THT', 'Admin', '2024-06-06 23:24:40'),
(222, 'asep ', 'Menambahkan jadwal dihari Senin seorang dokter bernama Dr. Adi Hidayat dimulai dari jam 23:41 selesai dijam 12:41', 'Admin', '2024-06-06 23:41:52'),
(223, 'asep ', 'Mengubah jadwal sebelumnya dihari Senin menjadi Selasa seorang dokter sebelumnya bernama Dr. Adi Hidayat menjadi Dr. Francessus Sinaga dimulai dijam sebelumnya 23:41 menjadi 23:41 selesai dijam sebelumnya 12:41 menjadi 12:41', 'Admin', '2024-06-06 23:42:17'),
(224, 'asep ', 'Menghapus jadwal dihari Selasa seorang dokter bernama Dr. Francessus Sinaga dimulai dari jam 23:41 selesai dijam 12:41', 'Admin', '2024-06-06 23:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(1000) NOT NULL,
  `spesialisasi_dokter` enum('Umum','THT','Gigi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialisasi_dokter`) VALUES
(2, 'Dr. Adi Hidayat', 'Umum'),
(3, 'Dr. Francessus Sinaga', 'Umum'),
(6, 'Dr. Retno Wulandari', 'THT'),
(7, 'Dr. Irawan Gustava', 'THT'),
(8, 'Dr. Ari Arham', 'Gigi'),
(9, 'Dr. Andi Prabowo', 'Gigi'),
(10, 'Dr. Indra Wibowo', 'Gigi'),
(14, 'Dr. Ayu Indah', 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `mulaiP` varchar(100) NOT NULL,
  `selesaiP` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `nama_dokter`, `mulaiP`, `selesaiP`) VALUES
(1, 'Senin', 'Nurul', '15:41', '16:41'),
(3, 'Selasa', 'Moner', '18.00', '19.00'),
(4, 'Rabu', 'John', '19.00', '20.00'),
(6, 'Senin', 'Nur', '14:30', '16.30'),
(7, 'Senin', 'Nur', '14:30', '16.30'),
(9, 'Senin', 'Junet', '16:00', '18:00'),
(10, 'Senin', 'Junet', '01:13', '00:14'),
(11, 'Senin', 'Nurul', '16:47', '18:47');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(1000) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`) VALUES
(21, 'Parasetamol ', 7),
(23, 'Cetirizine', 9),
(24, 'Ibuprofen', 10),
(25, 'Metformin', 10),
(26, 'Loratadine', 10),
(27, 'Omeprazole', 9),
(28, 'Diazepam', 10),
(30, 'Salbutamol', 10),
(32, 'Antidepresan', 23),
(35, 'Antihipertensi', 10),
(36, 'Antibiotik', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `nik` bigint(255) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_kelahiran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nik`, `nama_pasien`, `gender`, `tanggal_kelahiran`) VALUES
(1000000000000000, 'Nova', 'Laki-laki', '2024-06-02'),
(1000000000000002, 'Anti', 'Perempuan', '2024-06-04'),
(1111111111111112, 'Yanto', 'Laki-laki', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `nik` bigint(255) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `obat` varchar(100) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `nik`, `nama_pasien`, `diagnosa`, `obat`, `dokter`, `date`) VALUES
(1, 1111111111111110, 'Nov', 'Sakit', 'Amoksisilin', 'Junet', '2024-06-02'),
(2, 1111111111111112, 'Yanto', 'Meriang', 'Antibiotik', 'Nurul', '2024-03-14'),
(7, 1000000000000002, 'Rini', 'Saki', 'Metformin Loratadine ', 'Nurul', '2024-06-05'),
(13, 1000000000000002, 'Nurul', 'Meriang', 'Parasetamol  ', 'Nurul', '2024-06-05 17:41:44'),
(14, 1000000000000002, 'Noval', 'Meriang', 'Parasetamol  ', 'Nurul', '2024-06-05 17:43:09'),
(15, 1111111111111112, 'Anto', 'Meriang', 'Diazepam ', 'Nurul', '2024-06-05 17:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `akses` enum('Employee','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `akses`) VALUES
(1, 'Ayam', 'ayam', 'asep ', 'Admin'),
(2, 'Koles', 'lol', 'lina', 'Employee'),
(5, 'l', 'l', 'Light', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
