-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 10:35 AM
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
('DJ005', 'MEN001', 5000, 4, 20000, 'H003'),
('DJ006', 'MEN001', 10000, 2, 20000, 'H003'),
('DJ007', 'MEN002', 20000, 2, 40000, 'H004'),
('DJ008', 'MEN001', 15000, 2, 30000, 'H004'),
('DJ009', 'MEN003', 5000, 2, 10000, 'H005'),
('DJ010', 'MEN003', 5000, 2, 10000, 'H005'),
('DJ011', 'MEN001', 10000, 2, 20000, 'H006'),
('DJ012', 'MEN001', 10000, 2, 20000, 'H006'),
('DJ013', 'MEN001', 10000, 2, 20000, 'H007'),
('DJ014', 'MEN001', 10000, 2, 20000, 'H007'),
('DJ015', 'MEN001', 10000, 2, 20000, 'H008'),
('DJ016', 'MEN001', 8000, 1, 8000, 'H008'),
('DJ017', 'MEN001', 8000, 1, 8000, 'H009'),
('DJ018', 'MEN001', 12000, 2, 24000, 'H009'),
('DJ019', 'MEN001', 15000, 2, 30000, 'H010'),
('DJ020', 'MEN001', 12000, 2, 24000, 'H010'),
('DJ021', 'MEN001', 5000, 1, 5000, 'H011'),
('DJ022', 'MEN002', 5000, 1, 5000, 'H011'),
('DJ023', 'MEN002', 5000, 6, 30000, 'H012'),
('DJ024', 'MEN002', 5000, 6, 30000, 'H013'),
('DJ025', 'MEN002', 5000, 6, 30000, 'H014'),
('DJ026', 'MEN002', 5000, 6, 30000, 'H015'),
('DJ027', 'MEN002', 5000, 6, 30000, 'H016'),
('DJ028', 'MEN002', 5000, 6, 30000, 'H017'),
('DJ029', 'MEN002', 5000, 13, 65000, 'H018'),
('DJ030', 'MEN002', 5000, 13, 65000, 'H019'),
('DJ031', 'MEN002', 5000, 12, 60000, 'H020'),
('DJ032', 'MEN002', 5000, 12, 60000, 'H021');

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
  `id_member` varchar(10) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hjual`
--

INSERT INTO `hjual` (`id_hjual`, `tanggal_transaksi`, `total`, `jenis_pemesanan`, `id_pegawai`, `id_member`, `keterangan`) VALUES
('H001', '2020-02-14', 10000, 'dine-in', 'W00002', 'AM001', ''),
('H002', '2020-03-18', 20000, 'take away', 'W00002', 'AM001', ''),
('H003', '2020-02-14', 40000, 'delivery', 'W00002', 'fa00001', ''),
('H004', '2020-02-18', 70000, 'Take-away', 'W00002', 'AB00001', ''),
('H005', '2020-03-18', 10000, 'Dine-in', 'W00002', 'AB00001', ''),
('H006', '2020-04-18', 20000, 'Dine-in', 'W00002', 'AB00001', ''),
('H007', '2020-05-18', 20000, 'Dine-in', 'W00002', 'AB00001', ''),
('H008', '2020-06-18', 18000, 'Delivery', 'W00002', 'AB00001', ''),
('H009', '2020-07-18', 20000, 'Delivery', 'W00002', 'AB00001', ''),
('H010', '2020-08-18', 27000, 'Dine-in', 'W00002', 'AB00001', ''),
('H011', '2020-02-15', 10000, 'delivery', 'W00002', 'AB00001', ''),
('H012', '2020-05-07', 5000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H013', '2020-05-07', 5000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H014', '2020-05-07', 5000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H015', '2020-05-07', 5000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H016', '2020-05-07', 5000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H017', '2020-05-07', 5000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H018', '2020-05-07', 40000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H019', '2020-05-07', 40000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H020', '2020-05-07', 35000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada'),
('H021', '2020-05-07', 35000, 'Reservasi', '', 'FA00001', 'Alamat:,Waktu:17:50,Hari:2020-05-07,Keterangan Meja:ada');

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
  `status` varchar(1) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `fullname`, `password`, `email`, `alamat`, `no_hp`, `kota`, `kecematan`, `kode_pos`, `username`, `status`, `point`) VALUES
('', 'aaa', '123', 'aa@gmail.com', 'bbb', 1234314132132, '', '', 111111, 'aaab', '0', 0),
('AB00001', 'ab', '123', 'aabbbb@gmail.com', 'bbb', 1234314132134, '', '', 111111, 'ababb', '0', 0),
('AB00002', 'abc', '123', 'aabbbbb@gmail.com', 'bbb', 1234314132135, '', '', 111111, 'ababbc', '1', 0),
('AM00002', 'amm', '123', 'aabbb@gmail.com', 'bbb', 1234314132133, '', '', 111111, 'abab', '0', 0),
('AM001', 'Amelia', '213', 'amelia@gmail.com', 'aba', 1231231231231, 'surabaya', 'Jawa Timur', 12312312, 'ameliaDwi', '1', 0),
('FA00001', 'Fabian Suryajaya S', '123', 'fab@gmail.com', 'jalan 30', 891234567894, '', 'Jawa Timur', 123123, 'fabiansuryajayas', '1', 10000),
('FA00002', 'Fabian Suryajaya S', '123', 'fabi@gmail.com', 'jalan 30', 891234567890, 'Surabaya', 'Jawa Timur', 123123, 'fabiansuryajaya', '1', 0);

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
  `deskripsi` varchar(200) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `gambar`, `deskripsi`, `id_kategori`, `status`) VALUES
('MEN001', 'Nasi Goreng Jawa', 20000, 'Image/Nasgor.jpg', 'Dengan Bumbu Jawa', 'KAT002', 0),
('MEN002', 'Ayam goreng', 5000, 'Image/Aygor.jpg', 'Dengan tambahan rempah-rempah', 'KAT001', 1),
('MEN003', 'Iga Bakar', 20000, 'Image/Igbak.jpg', 'Iga daging sapi yang berkualitas', 'KAT006', 1),
('MEN004', 'Cumi Goreng', 30000, 'Image/Cumgor.jpg', 'Bergizi, nikmat, dan krispi', 'KAT001', 1),
('MEN005', 'Mie Goreng', 15000, 'Image/Migor.jpg', 'Dengan kelezatan nikmat', 'KAT003', 1),
('MEN006', 'Ayam Geprek', 12000, 'Image/Aygep.jpg', 'Geprek, dengan tingkat kepedasan yang menggugah lidah', 'KAT005', 1),
('MEN007', 'Es Teh  Manis', 3000, 'Image/Steh.jpg', 'Dingin', 'KAT007', 1),
('MEN008', 'Es Lemon Tea', 5000, 'Image/Lteh.jpg', 'Jeruk Lemon', 'KAT007', 1),
('MEN009', 'Es Mega Mendung', 8000, 'Image/Megmen.jpg', 'Soda', 'KAT008', 1),
('MEN010', 'Kopi Luwak', 8000, 'Image/kopi.jpg', 'Luwak asli', 'KAT008', 1),
('MEN011', 'Jus Alpukat', 20000, 'Image/Jusalpukat.jpg', 'Alpukat terpercaya', 'KAT009', 0),
('MEN012', 'Bubur Ayam', 15000, 'Image/Bubur.jpg', 'Lembut', 'KAT004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket` (
  `id_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_promo` varchar(10) DEFAULT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga_paket`, `gambar`, `id_kategori`, `id_promo`, `status`) VALUES
('PK001', 'Subuh', 20000, 'Image/paket.png', 'KAT005', 'PR001', 1),
('PK002', 'Dini', 25000, 'Image/paket.png', 'KAT004', 'PR001', 1),
('PK003', 'Siang', 10000, 'Image/paket.png', 'KAT005', 'PR003', 1),
('PK004', 'Sore', 15000, 'Image/paket.png', 'KAT004', 'PR001', 1),
('PK005', 'Malam', 25000, 'Image/paket.png', 'KAT004', 'PR001', 1),
('PK006', 'Tengah malam', 30000, 'Image/paket.png', 'KAT005', 'PR001', 1),
('PK007', 'Panas 1', 25000, 'Image/paket.png', 'KAT005', 'PR003', 1),
('PK008', 'Panas 2', 20000, 'Image/paket.png', 'KAT005', 'PR002', 1),
('PK009', 'Panas 3', 10000, 'Image/paket.png', 'KAT005', 'PR001', 1),
('PK010', 'Panas 4', 56000, 'Image/paket.png', 'KAT005', 'PR002', 1),
('PK011', 'Coba', 10000, 'Image/paket.png', 'KAT001', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_menu`
--

DROP TABLE IF EXISTS `paket_menu`;
CREATE TABLE `paket_menu` (
  `id_paket` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_menu`
--

INSERT INTO `paket_menu` (`id_paket`, `id_menu`) VALUES
('PK011', 'MEN002'),
('PK011', 'MEN004');

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
('PR001', 'Hemat 1', 25000, '2020-04-01', '2020-06-30', 'PrImage/ayam-bakar-dengan-es.jpg', 1),
('PR002', 'Hemat 2', 24000, '2020-04-02', '2020-04-30', 'PrImage/download.png', 1),
('PR003', 'Beef Time', 85000, '2020-04-08', '2020-04-23', 'PrImage/16214324-beef-steak-on-a-wooden-table.jpg', 1),
('PR004', 'Ramadhan Hemat', 15000, '2020-04-01', '2020-04-30', 'PrImage/ketupat-dan-opor-ayam-foto-resep-utama.jpg', 1),
('PR005', 'Es Ceria', 50000, '2020-04-09', '2020-04-11', 'PrImage/easiest-ever-fruit-ice-cream-ghk-1532637317.jpg', 1);

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
