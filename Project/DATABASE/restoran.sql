-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2020 pada 17.22
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

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
-- Struktur dari tabel `djual`
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
-- Dumping data untuk tabel `djual`
--

INSERT INTO `djual` (`id_djual`, `id_menu`, `harga`, `jumlah`, `subtotal`, `id_hjual`) VALUES
('DJ001', 'MEN002', 5000, 1, 5000, 'H001'),
('DJ002', 'MEN004', 30000, 1, 30000, 'H002'),
('DJ003', 'PK003', 20000, 0, 0, 'H002'),
('DJ004', 'MEN008', 5000, 0, 0, 'H002'),
('DJ005', 'MEN012', 15000, 1, 15000, 'H003'),
('DJ006', 'PK005', 25000, 0, 0, 'H003'),
('DJ007', 'MEN009', 8000, 0, 0, 'H003'),
('DJ008', 'MEN001', 20000, 0, 0, 'H004'),
('DJ009', 'MEN006', 12000, 0, 0, 'H004'),
('DJ010', 'MEN010', 8000, 0, 0, 'H004'),
('DJ011', 'MEN004', 30000, 1, 30000, 'H005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hjual`
--

DROP TABLE IF EXISTS `hjual`;
CREATE TABLE `hjual` (
  `id_hjual` varchar(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total` int(11) NOT NULL,
  `jenis_pemesanan` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `id_member` varchar(10) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hjual`
--

INSERT INTO `hjual` (`id_hjual`, `tanggal_transaksi`, `total`, `jenis_pemesanan`, `id_pegawai`, `id_member`, `keterangan`, `status`) VALUES
('H001', '2020-06-11', 15000, 'Delivery', '', 'FE00001', 'Alamat:bcf||Waktu:22:26||Hari:||Keterangan Meja:||detail_meja:||total discount:0||jenis:cash||kode_res:RESVXX-H001||Keterangan Promo:||||Keterangan Kupon:KUP002||5000||banyak_orang:', 0),
('H002', '2020-06-11', 55000, 'Take-away', '', 'FE00001', 'Alamat:||Waktu:22:28||Hari:||Keterangan Meja:||detail_meja:||total discount:0||jenis:cash||kode_res:RESVXX-H002||Keterangan Promo:||||Keterangan Kupon:||0||banyak_orang:', 0),
('H003', '2020-06-11', 40500, 'Take-away', '', 'FE00001', 'Alamat:||Waktu:22:32||Hari:||Keterangan Meja:||detail_meja:||total discount:7500||jenis:cash||kode_res:RESVXX-H003||Keterangan Promo:7500,||MEN012,||Keterangan Kupon:||0||banyak_orang:', 0),
('H004', '2020-06-11', 40000, 'Take-away', '', 'FE00001', 'Alamat:||Waktu:22:36||Hari:||Keterangan Meja:||detail_meja:||total discount:0||jenis:cash||kode_res:RESVXX-H004||Keterangan Promo:||||Keterangan Kupon:||0||banyak_orang:', 0),
('H005', '2020-06-11', 30000, 'Dine-in', 'W00001', 'default', 'Alamat:||Waktu:||Hari:||Keterangan Meja:ada||detail_meja: 14, ||total discount:0||jenis:cash||kode_res:RESVXX-H005||Keterangan Promo:||||Keterangan Kupon:||0||banyak_orang:', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `jenis_kategori` varchar(50) NOT NULL,
  `status_kategori` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
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
-- Struktur dari tabel `kupon`
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
-- Dumping data untuk tabel `kupon`
--

INSERT INTO `kupon` (`id_kupon`, `nama_kupon`, `id_menu`, `harga_kupon`, `periode_awal_kupon`, `periode_akhir_kupon`, `sisa_kupon`, `status_kupon`) VALUES
('KUP001', 'Nasi Goreng Jawa', 'MEN001', 5000, '2020-06-11', '2020-06-30', 3, 1),
('KUP002', 'Ayam Goreng', 'MEN002', 5000, '2020-06-11', '2020-06-30', 2, 1),
('KUP003', 'Jus Alpukat', 'MEN011', 8000, '2020-06-11', '2020-06-30', 2, 1),
('KUP004', 'Bubur Ayam', 'MEN012', 4000, '2020-06-11', '2020-06-30', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kupon_member`
--

DROP TABLE IF EXISTS `kupon_member`;
CREATE TABLE `kupon_member` (
  `id_kupon` varchar(10) NOT NULL,
  `id_member` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kupon_member`
--

INSERT INTO `kupon_member` (`id_kupon`, `id_member`, `status`) VALUES
('KUP001', 'MI00001', 0),
('KUP003', 'MI00001', 0),
('KUP004', 'FE00001', 0),
('KUP001', 'FE00001', 0),
('KUP003', 'FE00001', 0),
('KUP002', 'FE00001', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
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
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `fullname`, `password`, `email`, `alamat`, `no_hp`, `kota`, `kecematan`, `kode_pos`, `username`, `status`, `point`, `saldo_member`) VALUES
('FE00001', 'Fendy Handsome', 'suga', 'fendysugiartog@gmail.com', 'Jl. Gemini 09', 987654321, 'Surabaya', 'Jawa Timur', 6123212, 'fendy', '1', 3310, 0),
('MI00001', 'Michael Shan Widodo', 'shan', 'michaelshan077@gmail.com', 'Bumi Citra Fajar Jl. Mawar 100 Sidoarjo', 1234567890, 'Salatiga', 'Jawa Tengah', 61232, 'shanwid', '1', 720, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
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
('MEN012', 'Bubur Ayam', 15000, 'Image/Bubur.jpg', 'Lembut', 'KAT002', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
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
-- Dumping data untuk tabel `paket`
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
-- Struktur dari tabel `paket_menu`
--

DROP TABLE IF EXISTS `paket_menu`;
CREATE TABLE `paket_menu` (
  `id_paket` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_menu`
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
('PK008', 'MEN008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `email`, `nohp`, `password`, `status`) VALUES
('W00001', 'Fabian', 'Waiter', 'fabiansuryajayas@gmail.com', '1232132131232', 'PW00001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE `promo` (
  `id_promo` varchar(10) NOT NULL,
  `nama_promo` varchar(50) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `gambar_promo` varchar(200) NOT NULL,
  `detail_promo` varchar(200) NOT NULL,
  `jenis_promo` varchar(10) NOT NULL,
  `status_promo` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `periode_awal`, `periode_akhir`, `gambar_promo`, `detail_promo`, `jenis_promo`, `status_promo`) VALUES
('PR001', 'Hemat 1', '2020-06-11', '2020-06-20', 'PrImage/ayam-bakar-dengan-es.jpg', 'enak', 'H', 1),
('PR002', 'Hemat 2', '2020-06-15', '2020-06-20', 'PrImage/download.png', 'enak', 'H', 0),
('PR003', 'Beef Time', '2020-06-20', '2020-06-25', 'PrImage/16214324-beef-steak-on-a-wooden-table.jpg', 'enak', 'M', 0),
('PR004', 'Ramadhan Hemat', '2020-06-14', '2020-06-30', 'PrImage/ketupat-dan-opor-ayam-foto-resep-utama.jpg', 'enak', 'HR', 0),
('PR005', 'Es Ceria', '2020-06-25', '2020-06-28', 'PrImage/easiest-ever-fruit-ice-cream-ghk-1532637317.jpg', 'enak', 'M', 0),
('PR006', 'Hari Raya Penuh berkah', '2020-06-11', '2020-06-15', 'PrImage/promoenak.jpg', 'Promo Ini sangat bagus dan hebat', 'HR', 1),
('PR007', 'Promo Yuhui', '2020-06-11', '2020-06-20', 'PrImage/x8clothing.jpg', 'lalala', 'X', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo_paket`
--

DROP TABLE IF EXISTS `promo_paket`;
CREATE TABLE `promo_paket` (
  `id_promo` varchar(10) NOT NULL,
  `id_paket` varchar(10) NOT NULL,
  `harga_promo_paket` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `promo_paket`
--

INSERT INTO `promo_paket` (`id_promo`, `id_paket`, `harga_promo_paket`, `status`) VALUES
('PR001', 'MEN012', 7500, 1),
('PR002', 'MEN011', 12000, 0),
('PR003', 'MEN013', 13500, 0),
('PR004', 'PK009', 25500, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `djual`
--
ALTER TABLE `djual`
  ADD PRIMARY KEY (`id_djual`);

--
-- Indeks untuk tabel `hjual`
--
ALTER TABLE `hjual`
  ADD PRIMARY KEY (`id_hjual`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kupon`
--
ALTER TABLE `kupon`
  ADD PRIMARY KEY (`id_kupon`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `paket_menu`
--
ALTER TABLE `paket_menu`
  ADD PRIMARY KEY (`id_paket`,`id_menu`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
