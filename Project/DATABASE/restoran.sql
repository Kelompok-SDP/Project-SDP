-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 02:50 PM
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
('DJ026', 'MEN002', 5000, 1, 5000, 'H025'),
('DJ027', 'MEN002', 5000, 1, 5000, 'H026'),
('DJ028', 'MEN002', 5000, 1, 5000, 'H027'),
('DJ029', 'MEN004', 30000, 1, 30000, 'H016'),
('DJ030', 'MEN004', 30000, 1, 30000, 'H017'),
('DJ031', 'MEN004', 30000, 1, 30000, 'H018'),
('DJ032', 'MEN004', 30000, 1, 30000, 'H019'),
('DJ033', 'MEN004', 30000, 1, 30000, 'H020'),
('DJ034', 'MEN012', 15000, 1, 15000, 'H020'),
('DJ035', 'MEN004', 30000, 1, 30000, 'H021'),
('DJ036', 'MEN012', 15000, 1, 15000, 'H021'),
('DJ037', 'MEN004', 30000, 1, 30000, 'H022'),
('DJ038', 'MEN012', 15000, 1, 15000, 'H022'),
('DJ039', 'MEN004', 30000, 2, 60000, 'H023'),
('DJ040', 'MEN012', 15000, 1, 15000, 'H023'),
('DJ041', 'MEN004', 30000, 2, 60000, 'H024'),
('DJ042', 'MEN012', 15000, 1, 15000, 'H024'),
('DJ043', 'MEN004', 30000, 2, 60000, 'H025'),
('DJ044', 'MEN012', 15000, 1, 15000, 'H025'),
('DJ045', 'MEN004', 30000, 2, 60000, 'H026'),
('DJ046', 'MEN012', 15000, 1, 15000, 'H026'),
('DJ047', 'MEN004', 30000, 2, 60000, 'H027'),
('DJ048', 'MEN012', 15000, 1, 15000, 'H027'),
('DJ049', 'MEN004', 30000, 2, 60000, 'H028'),
('DJ050', 'MEN012', 15000, 1, 15000, 'H028'),
('DJ051', 'MEN004', 30000, 2, 60000, 'H029'),
('DJ052', 'MEN012', 15000, 1, 15000, 'H029'),
('DJ053', 'MEN004', 30000, 2, 60000, 'H030'),
('DJ054', 'MEN012', 15000, 1, 15000, 'H030'),
('DJ055', 'MEN004', 30000, 2, 60000, 'H031'),
('DJ056', 'MEN012', 15000, 1, 15000, 'H031'),
('DJ057', 'MEN004', 30000, 2, 60000, 'H032'),
('DJ058', 'MEN012', 15000, 1, 15000, 'H032'),
('DJ059', 'MEN004', 30000, 2, 60000, 'H033'),
('DJ060', 'MEN012', 15000, 1, 15000, 'H033'),
('DJ061', 'MEN004', 30000, 2, 60000, 'H034'),
('DJ062', 'MEN012', 15000, 1, 15000, 'H034'),
('DJ063', 'MEN004', 30000, 2, 60000, 'H035'),
('DJ064', 'MEN012', 15000, 1, 15000, 'H035'),
('DJ065', 'MEN004', 30000, 2, 60000, 'H036'),
('DJ066', 'MEN012', 15000, 1, 15000, 'H036'),
('DJ067', 'MEN004', 30000, 2, 60000, 'H037'),
('DJ068', 'MEN012', 15000, 1, 15000, 'H037'),
('DJ069', 'MEN002', 5000, 8, 40000, 'H038'),
('DJ070', 'MEN002', 5000, 8, 40000, 'H039'),
('DJ071', 'PK003', 20000, 3, 60000, 'H040'),
('DJ072', 'MEN004', 30000, 1, 30000, 'H041'),
('DJ073', 'MEN012', 15000, 0, 0, 'H041'),
('DJ074', 'MEN012', 15000, 1, 15000, 'H042'),
('DJ075', 'MEN004', 30000, 1, 30000, 'H043'),
('DJ076', 'MEN012', 15000, 0, 0, 'H043'),
('DJ077', 'MEN001', 20000, 0, 0, 'H043'),
('DJ078', 'MEN002', 5000, 3, 15000, 'H044'),
('DJ079', 'MEN004', 30000, 0, 0, 'H044'),
('DJ080', 'MEN001', 20000, 0, 0, 'H044'),
('DJ081', 'MEN001', 20000, 1, 20000, 'H045'),
('DJ082', 'MEN005', 15000, 0, 0, 'H045'),
('DJ083', 'MEN002', 5000, 0, 0, 'H045'),
('DJ084', 'MEN012', 15000, 0, 0, 'H045');

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
('H012', '2020-05-08', 35000, 'Reservasi', '', 'FA00001', 'Alamat:||Waktu:09:23||Hari:2020-05-10||Keterangan Meja:ada||detail_meja: 16, 8, '),
('H013', '2020-05-14', 0, 'Take-away', '', 'FA00002', 'Alamat:||Waktu:19:09||Hari:||Keterangan Meja:||detail_meja:||discount:0'),
('H014', '2020-05-14', 0, 'Delivery', '', 'FA00002', 'Alamat:kranggan 38||Waktu:19:12||Hari:||Keterangan Meja:||detail_meja:||discount:0'),
('H015', '2020-05-14', 0, 'Delivery', '', 'AM001', 'Alamat:aa||Waktu:19:12||Hari:||Keterangan Meja:||detail_meja:||discount:'),
('H016', '2020-05-14', 30000, 'Delivery', '', 'AM001', 'Alamat:aa||Waktu:19:19||Hari:||Keterangan Meja:||detail_meja:||discount:0'),
('H017', '2020-05-14', 30000, 'Delivery', '', 'AM001', 'Alamat:aba||Waktu:20:01||Hari:||Keterangan Meja:||detail_meja:||discount:0'),
('H018', '2020-05-14', 5000, 'Take-away', '', 'AM001', 'Alamat:||Waktu:20:18||Hari:||Keterangan Meja:||detail_meja:||discount:0'),
('H019', '2020-05-14', 20000, 'Delivery', '', 'AM001', 'Alamat:aa||Waktu:22:45||Hari:||Keterangan Meja:||detail_meja:||discount:0||ongkir:15000||jenis:||'),
('H020', '2020-05-14', 35000, 'Delivery', '', 'AM001', 'Alamat:aa||Waktu:20:54||Hari:||Keterangan Meja:||detail_meja:||discount:7500||ongkir:15000||jenis:cash'),
('H021', '2020-05-14', 35000, 'Delivery', '', 'AM001', 'Alamat:a||Waktu:21:09||Hari:||Keterangan Meja:||detail_meja:||discount:7500||promo:25000||jenis:cash'),
('H022', '2020-05-14', 27500, 'Delivery', '', 'AM001', 'Alamat:aa||Waktu:21:10||Hari:||Keterangan Meja:||detail_meja:||discount:7500||promo:25000||jenis:cash'),
('H023', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:11:00||Hari:2020-05-15||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H023'),
('H024', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-15||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H024'),
('H025', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-15||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H025'),
('H026', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H026'),
('H027', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H027'),
('H028', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H028'),
('H029', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H029'),
('H030', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H030'),
('H031', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H031'),
('H032', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H032'),
('H033', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H033'),
('H034', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H034'),
('H035', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H035'),
('H036', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H036'),
('H037', '2020-05-14', 42500, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:00||Hari:2020-05-14||Keterangan Meja:ada||detail_meja: 16, 8, ||discount:7500||promo:25000||jenis:cash||kode_res:RESVXX-H037'),
('H038', '2020-05-15', 40000, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:12:34||Hari:2020-05-15||Keterangan Meja:ada||detail_meja:7, ||discount:0||promo:0||jenis:cash||kode_res:RESVXX-H038'),
('H039', '2020-05-15', 40000, 'Reservasi', '', 'FA00004', 'Alamat:||Waktu:13:36||Hari:2020-05-15||Keterangan Meja:ada||detail_meja:7, ||discount:0||promo:0||jenis:cash||kode_res:RESVXX-H039'),
('H040', '2020-05-15', 75000, 'Delivery', '', 'FA00002', 'Alamat:aa||Waktu:12:40||Hari:||Keterangan Meja:||detail_meja:||discount:0||promo:0||jenis:cash||kode_res:RESVXX-H040'),
('H041', '2020-05-16', 52500, 'Delivery', '', 'FA00002', 'Alamat:a||Waktu:19:47||Hari:||Keterangan Meja:||detail_meja:||discount:7500||promo:||jenis:cash||kode_res:RESVXX-H041||Kode Promo:||7500,||PR001,'),
('H042', '2020-05-16', 22500, 'Delivery', '', 'FA00002', 'Alamat:aa||Waktu:19:52||Hari:||Keterangan Meja:||detail_meja:||discount:7500||promo:||jenis:cash||kode_res:RESVXX-H042||Kode Promo:||7500,||MEN012,'),
('H043', '2020-05-16', 67500, 'Delivery', '', 'FA00002', 'Alamat:bb||Waktu:21:28||Hari:||Keterangan Meja:||detail_meja:||total discount:7500||jenis:cash||kode_res:RESVXX-H043||Keterangan Promo:7500,||MEN012,||Keterangan Kupon:KUP001||5000'),
('H044', '2020-05-16', 75000, 'Delivery', '', 'FA00002', 'Alamat:b||Waktu:21:30||Hari:||Keterangan Meja:||detail_meja:||total discount:0||jenis:cash||kode_res:RESVXX-H044||Keterangan Promo:||||Keterangan Kupon:KUP001||5000'),
('H045', '2020-05-16', 57500, 'Delivery', '', 'FA00002', 'Alamat:c||Waktu:21:34||Hari:||Keterangan Meja:||detail_meja:||total discount:7500||jenis:cash||kode_res:RESVXX-H045||Keterangan Promo:7500,||MEN012,||Keterangan Kupon:KUP001||5000');

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
-- Table structure for table `kupon`
--

DROP TABLE IF EXISTS `kupon`;
CREATE TABLE `kupon` (
  `id_kupon` varchar(10) NOT NULL,
  `nama_kupon` varchar(50) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `harga_kupon` int(11) NOT NULL,
  `periode_awal_kupon` date NOT NULL,
  `periode_akhir_kupon` date NOT NULL,
  `sisa_kupon` int(11) NOT NULL,
  `status_kupon` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupon`
--

INSERT INTO `kupon` (`id_kupon`, `nama_kupon`, `id_menu`, `harga_kupon`, `periode_awal_kupon`, `periode_akhir_kupon`, `sisa_kupon`, `status_kupon`) VALUES
('KUP001', 'Coba', 'MEN001', 5000, '2020-05-21', '2020-05-18', 5, 1),
('KUP002', 'Coba2', 'MEN001', 5000, '2020-05-27', '2020-05-29', 3, 1),
('KUP003', 'Coba3', 'MEN011', 8000, '2020-05-27', '2020-05-29', 4, 1),
('KUP004', 'Murah', 'MEN012', 4000, '2020-05-19', '2020-05-21', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kupon_member`
--

DROP TABLE IF EXISTS `kupon_member`;
CREATE TABLE `kupon_member` (
  `id_kupon` varchar(10) NOT NULL,
  `id_member` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupon_member`
--

INSERT INTO `kupon_member` (`id_kupon`, `id_member`, `status`) VALUES
('KUP001', 'FA00002', 1),
('KUP001', 'FA00002', 1);

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
  `point` int(11) NOT NULL,
  `saldo_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `fullname`, `password`, `email`, `alamat`, `no_hp`, `kota`, `kecematan`, `kode_pos`, `username`, `status`, `point`, `saldo_member`) VALUES
('', 'aaa', '123', 'aa@gmail.com', 'bbb', 1234314132132, '', '', 111111, 'aaab', '0', 0, 0),
('AB00001', 'ab', '123', 'aabbbb@gmail.com', 'bbb', 1234314132134, '', '', 111111, 'ababb', '0', 0, 0),
('AB00002', 'abc', '123', 'aabbbbb@gmail.com', 'bbb', 1234314132135, '', '', 111111, 'ababbc', '1', 0, 0),
('AM00002', 'amm', '123', 'aabbb@gmail.com', 'bbb', 1234314132133, '', '', 111111, 'abab', '0', 0, 0),
('AM001', 'Amelia', '213', 'amelia@gmail.com', 'aba', 1231231231231, 'surabaya', 'Jawa Timur', 12312312, 'ameliaDwi', '1', 0, 0),
('FA00002', 'Fabian Suryajaya S', '123', 'fabi@gmail.com', 'jalan 30', 891234567890, 'Surabaya', 'Jawa Timur', 123123, 'fabiansuryajaya', '1', 0, 0),
('FE00001', 'Fendy', 'aa', 'fendysugiartog@gmail.com', 'jalan pecatu no 2', 88989, 'Surabaya', 'Jawa Timur', 89089, 'Fendyaso', '1', 0, 0),
('SH00001', 'Shan', 'a', 'michaelshan077@gmail.com', 'BCF', 123, 'Surabaya', 'Jawa Timur', 615333, 'sha', '1', 0, 0);

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
('MEN001', 'Nasi Goreng Jawa', 20000, 'Image/Nasgor.jpg', 'Dengan Bumbu Jawa', 'KAT002', 1),
('MEN002', 'Ayam goreng', 5000, 'Image/Aygor.jpg', 'Dengan tambahan rempah-rempah', 'KAT001', 1),
('MEN003', 'Iga Bakar', 20000, 'Image/Igbak.jpg', 'Iga daging sapi yang berkualitas', 'KAT006', 1),
('MEN004', 'Cumi Goreng', 30000, 'Image/Cumgor.jpg', 'Bergizi, nikmat, dan krispi', 'KAT001', 1),
('MEN005', 'Mie Goreng', 15000, 'Image/Migor.jpg', 'Dengan kelezatan nikmat', 'KAT003', 1),
('MEN006', 'Ayam Geprek', 12000, 'Image/Aygep.jpg', 'Geprek, dengan tingkat kepedasan yang menggugah lidah', 'KAT005', 1),
('MEN007', 'Es Teh  Manis', 3000, 'Image/Steh.jpg', 'Dingin', 'KAT007', 1),
('MEN008', 'Es Lemon Tea', 5000, 'Image/Lteh.jpg', 'Jeruk Lemon', 'KAT007', 1),
('MEN009', 'Es Mega Mendung', 8000, 'Image/Megmen.jpg', 'Soda', 'KAT008', 1),
('MEN010', 'Kopi Luwak', 8000, 'Image/kopi.jpg', 'Luwak asli', 'KAT008', 1),
('MEN011', 'Jus Alpukat', 20000, 'Image/Jusalpukat.jpg', 'Alpukat terpercaya', 'KAT009', 1),
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
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga_paket`, `gambar`, `id_kategori`, `status`) VALUES
('PK001', 'Steak', 50000, 'Image/beef-steak.jpg', 'KAT006', 1),
('PK002', 'Bubur', 10000, 'Image/pkt-b.jpg', 'KAT004', 1),
('PK003', 'Siang', 20000, 'Image/nasi-ayam-hemat.jpg', 'KAT001', 1),
('PK004', 'Agep Murmer', 15000, 'Image/aybak.jpg', 'KAT005', 1),
('PK005', 'Namikun', 25000, 'Image/pkt-nasi-kuning-ayam-goreng-suwir.jpg', 'KAT003', 1),
('PK006', 'Mie-Aygep', 22000, 'Image/mie.jpg', 'KAT005', 1),
('PK007', 'Ayam Kremes', 25000, 'Image/nasi-kotak-ayam-kremes.jpg', 'KAT005', 1),
('PK008', 'Nasgor', 12000, 'Image/nasgor2.jpg', 'KAT002', 1);

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
('PK001', 'MEN003'),
('PK001', 'MEN008'),
('PK002', 'MEN011'),
('PK002', 'MEN012'),
('PK003', 'MEN002'),
('PK003', 'MEN007'),
('PK004', 'MEN006'),
('PK004', 'MEN008'),
('PK005', 'MEN005'),
('PK005', 'MEN009'),
('PK006', 'MEN005'),
('PK006', 'MEN006'),
('PK007', 'MEN002'),
('PK007', 'MEN008'),
('PK008', 'MEN001'),
('PK008', 'MEN007'),
('PK009', 'MEN002'),
('PK009', 'MEN003'),
('PK009', 'MEN005'),
('PK009', 'MEN011'),
('PK009', 'MEN012'),
('PK010', 'MEN013'),
('PK010', 'MEN014'),
('PK011', 'MEN009'),
('PK011', 'MEN012'),
('PK012', 'MEN012'),
('PK012', 'MEN014'),
('PK013', 'MEN010'),
('PK013', 'MEN014');

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
  `detail_promo` varchar(200) NOT NULL,
  `jenis_promo` varchar(10) NOT NULL,
  `status_promo` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `harga_promo`, `periode_awal`, `periode_akhir`, `gambar_promo`, `detail_promo`, `jenis_promo`, `status_promo`) VALUES
('PR001', 'Hemat 1', 25000, '2020-04-01', '2020-05-20', 'PrImage/ayam-bakar-dengan-es.jpg', 'enak', 'H', 1),
('PR002', 'Hemat 2', 24000, '2020-04-02', '2020-05-20', 'PrImage/download.png', 'enak', 'H', 0),
('PR003', 'Beef Time', 85000, '2020-04-08', '2020-04-23', 'PrImage/16214324-beef-steak-on-a-wooden-table.jpg', 'enak', 'M', 0),
('PR004', 'Ramadhan Hemat', 15000, '2020-04-01', '2020-04-30', 'PrImage/ketupat-dan-opor-ayam-foto-resep-utama.jpg', 'enak', 'HR', 0),
('PR005', 'Es Ceria', 50000, '2020-04-09', '2020-04-11', 'PrImage/easiest-ever-fruit-ice-cream-ghk-1532637317.jpg', 'enak', 'M', 0),
('PR006', 'Hari Raya Penuh berkah', 2000000, '2020-05-11', '2020-05-23', 'PrImage/LennyFace.jpg', 'Promo Ini sangat bagus dan hebat', 'HR', 0),
('PR007', 'Promo Enak', 10000, '2020-05-28', '2020-05-31', 'PrImage/promoenak.jpg', 'lalala', 'H', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo_menu`
--

DROP TABLE IF EXISTS `promo_menu`;
CREATE TABLE `promo_menu` (
  `id_menu` varchar(10) NOT NULL,
  `id_promo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promo_paket`
--

DROP TABLE IF EXISTS `promo_paket`;
CREATE TABLE `promo_paket` (
  `id_promo` varchar(10) NOT NULL,
  `id_paket` varchar(10) NOT NULL,
  `harga_promo_paket` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_paket`
--

INSERT INTO `promo_paket` (`id_promo`, `id_paket`, `harga_promo_paket`, `status`) VALUES
('PR001', 'MEN012', 7500, 1),
('PR001', 'MEN011', 12000, 1);

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
-- Indexes for table `kupon`
--
ALTER TABLE `kupon`
  ADD PRIMARY KEY (`id_kupon`);

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
