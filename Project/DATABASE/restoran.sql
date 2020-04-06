-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 09:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
  `jenis_kategori` varchar(50) NOT NULL,
  `status_kategori` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `jenis_kategori`, `status_kategori`) VALUES
('KAT001', 'Chinese Cuisene', 'Makanan', 1),
('KAT002', 'Javanese Cuisine', 'Makanan', 1),
('KAT003', 'Noodle', 'Makanan', 1),
('KAT004', 'Porrridge', 'Makanan', 1),
('KAT005', 'Penyetan', 'Makanan', 1),
('KAT006', 'Steak', 'Makanan', 1),
('KAT007', 'Tea', 'Minuman', 1),
('KAT008', 'Coffe', 'Minuman', 1),
('KAT009', 'Juice', 'Minuman', 1);

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
('AB00001', 'ab', '123', 'aabbbb@gmail.com', 'bbb', 1234314132134, '', '', 111111, 'ababb', '0'),
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
  `gambar` varchar(200) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_promo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `gambar`, `deskripsi`, `id_kategori`, `id_promo`) VALUES
('MEN001', 'Nasi Goreng', 20000, 'Image/Screenshot (14).png', 'Lezat', 'KA1', 'PR1'),
('MEN002', 'Ayam goreng', 5000, 'Image/800px-Basement', 'Enak', 'KA1', 'PR1'),
('MEN003', 'Iga Bakar', 20000, 'Image/Screenshot (9).png', 'Matang', 'KA5', 'PR3'),
('MEN004', 'Indomie', 5000, 'Image/Screenshot (12).png', 'Bergizi', 'KA4', 'PR1'),
('MEN005', 'Mie', 15000, 'Image/Screenshot (13).png', 'Enak', 'KA4', 'PR4'),
('MEN006', 'Ayam Geprek', 12000, 'Image/Screenshot (16).png', 'Pedas', 'KA4', 'PR5'),
('MEN007', 'Es Teh  Manis', 3000, 'Image/Screenshot (17).png', 'Dingin', 'KA4', 'PR3'),
('MEN008', 'Teh Hangat', 3000, 'Image/Screenshot (18).png', 'Hangat', 'KA4', 'PR8'),
('MEN009', 'Es Mega Mendung', 5000, 'Image/Screenshot (19).png', 'Soda', 'KA4', 'PR3'),
('MEN010', 'Mega Mendung', 8000, 'Image/Screenshot (20).png', 'Bersoda', 'KA4', 'PR4'),
('MEN011', 'Nasi Goreng banget', 20000, '', 'Enak', 'KA10', 'PR10');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket` (
  `id_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_promo` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga_paket`, `id_kategori`, `id_promo`, `status`) VALUES
('PK001', 'Subuh', 20000, 'KA5', 'PR1', 1),
('PK002', 'Dini', 25000, 'KA4', 'PR1', 1),
('PK003', 'Siang', 10000, 'KA5', 'PR3', 1),
('PK004', 'Sore', 15000, 'KA4', 'PR1', 1),
('PK005', 'Malam', 25000, 'KA4', 'PR1', 1),
('PK006', 'Tengah malam', 30000, 'KA5', 'PR1', 1),
('PK007', 'Panas 1', 25000, 'KA5', 'PR3', 1),
('PK008', 'Panas 2', 20000, 'KA5', 'PR2', 1),
('PK009', 'Panas 3', 10000, 'KA5', 'PR1', 1),
('PK010', 'Panas 4', 56000, 'KA5', 'PR2', 1);

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
  `jabatan` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `email`, `nohp`, `password`, `status`) VALUES
('W00001', 'Fabian', 'Waiter', 'fabiansuryajayas@gmail.com', '1232132131232', 'PW00001', 1),
('W00002', 'Fabian', 'Waiter', 'fabiansuryajayas@gmail.com', '1232132131232', 'PW00002', 1),
('W00003', 'Fabian', 'Waiter', 'fabiansuryajayas@gmail.com', '1232132131232', 'PW00003', 1),
('W00004', 'Fabian', 'Waiter', 'fabiansuryajayas@gmail.com', '1232132131232', 'PW00004', 1),
('W00005', 'Fabian', 'Waiter', 'fabiansuryajayas@gmail.com', '1232132131232', 'PW00005', 0),
('W00006', 'Fabian', 'Waiter', 'fabiansuryajayas@gmail.com', '1232132131232', 'PW00006', 1);

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
  `periode_akhir` date NOT NULL,
  `gambar_promo` varchar(200) NOT NULL,
  `status_promo` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `harga_promo`, `periode_awal`, `periode_akhir`, `gambar_promo`, `status_promo`) VALUES
('PR10', 'alsdkals', 2147483647, '2020-04-04', '2020-04-11', 'promo/PrImage/LennyFace.jpg', 1),
('PR2', 'hihi', 0, '1970-01-01', '1970-01-01', 'promo/PrImage/LennyFace.jpg', 1),
('PR3', 'kasjdkasd', 20000000, '1970-01-01', '1970-01-01', 'promo/PrImage/623548.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo_menu`
--

DROP TABLE IF EXISTS `promo_menu`;
CREATE TABLE `promo_menu` (
  `id_menu` varchar(10) NOT NULL,
  `id_promo` varchar(10) NOT NULL
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
