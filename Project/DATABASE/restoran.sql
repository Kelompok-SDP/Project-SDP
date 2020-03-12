-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 05:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--
CREATE DATABASE IF NOT EXISTS `restoran` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `restoran`;

-- --------------------------------------------------------

--
-- Table structure for table `djual`
--

DROP TABLE IF EXISTS `djual`;
CREATE TABLE `djual` (
  `id_djual` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `harga` bigint(6) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `subtotal` bigint(8) NOT NULL,
  `id_hjual` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `djual`
--

INSERT INTO `djual` (`id_djual`, `id_menu`, `harga`, `jumlah`, `subtotal`, `id_hjual`) VALUES
('DJ001', 'MEN001', 5000, 1, 5000, 'H001'),
('DJ002', 'MEN002', 5000, 1, 5000, 'H001'),
('DJ003', 'MEN003', 10000, 1, 10000, 'H002'),
('DJ004', 'MEN004', 5000, 2, 10000, 'H002'),
('DJ005', 'MEN001', 5000, 4, 20000, 'H003');

-- --------------------------------------------------------

--
-- Table structure for table `hjual`
--

DROP TABLE IF EXISTS `hjual`;
CREATE TABLE `hjual` (
  `id_hjual` varchar(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total` int(11) NOT NULL,
  `jenis_pemesanan` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `id_member` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hjual`
--

INSERT INTO `hjual` (`id_hjual`, `tanggal_transaksi`, `total`, `jenis_pemesanan`, `id_pegawai`, `id_member`) VALUES
('H001', '2020-02-14', 10000, 'dine-in', 'PEG001', 'AM001'),
('H002', '2020-03-18', 20000, 'take away', 'PEG001', 'AM001'),
('H003', '2020-02-14', 20000, 'delivery', 'PEG002', 'fa00001');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `jenis_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id_member` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET macce COLLATE macce_bin NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` bigint(13) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecematan` varchar(50) NOT NULL,
  `kode_pos` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `fullname`, `password`, `email`, `alamat`, `no_hp`, `kota`, `kecematan`, `kode_pos`, `username`, `status`) VALUES
('', 'aaa', '123', 'aa@gmail.com', 'bbb', 1234314132132, '', '', 111111, 'aaab', '0'),
('AB00001', 'ab', '123', 'aabbbb@gmail.com', 'bbb', 1234314132134, '', '', 111111, 'ababb', '1'),
('AB00002', 'abc', '123', 'aabbbbb@gmail.com', 'bbb', 1234314132135, '', '', 111111, 'ababbc', '1'),
('AM00002', 'amm', '123', 'aabbb@gmail.com', 'bbb', 1234314132133, '', '', 111111, 'abab', '0'),
('AM001', 'Amelia', '213', 'amelia@gmail.com', 'aba', 1231231231231, 'surabaya', 'Jawa Timur', 12312312, 'ameliaDwi', '1'),
('FA00001', 'Fabian Suryajaya S', '123', 'fab@gmail.com', 'jalan 30', 891234567894, '', 'Jawa Timur', 123123, 'fabiansuryajayas', '1'),
('FA00002', 'Fabian Suryajaya S', '123', 'fabi@gmail.com', 'jalan 30', 891234567890, 'Surabaya', 'Jawa Timur', 123123, 'fabiansuryajaya', '1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_promo` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `id_kategori`, `id_promo`, `status`) VALUES
('MEN001', 'Nasi Goreng', 5000, '001', '01', 1),
('MEN002', 'Ayam Goreng', 5000, '002', '001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket` (
  `id_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `id_promo` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket_menu`
--

DROP TABLE IF EXISTS `paket_menu`;
CREATE TABLE `paket_menu` (
  `id_paket` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE `promo` (
  `id_promo` varchar(10) NOT NULL,
  `nama_promo` varchar(50) NOT NULL,
  `harga_promo` int(11) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `djual`
--
ALTER TABLE `djual`
  ADD PRIMARY KEY (`id_djual`);

--
-- Indexes for table `hjual`
--
ALTER TABLE `hjual`
  ADD PRIMARY KEY (`id_hjual`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `paket_menu`
--
ALTER TABLE `paket_menu`
  ADD PRIMARY KEY (`id_paket`,`id_menu`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
