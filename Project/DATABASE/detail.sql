-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2020 pada 15.10
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detail`
--
CREATE DATABASE IF NOT EXISTS `detail` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `detail`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daerah`
--

DROP TABLE IF EXISTS `daerah`;
CREATE TABLE `daerah` (
  `kode_daerah` varchar(100) NOT NULL,
  `nama_daerah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daerah`
--

INSERT INTO `daerah` (`kode_daerah`, `nama_daerah`) VALUES
('D0001', 'Jawa Timur'),
('D0002', 'Jawa Barat'),
('D0003', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('JAB00001', 'Waiter'),
('JAB00002', 'Host');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `kode_kota` varchar(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kode_daerah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0001', 'Surabaya', 'D0001'),
('K0002', 'Malang', 'D0001'),
('K0003', 'Probolinggo', 'D0001'),
('K0004', 'Batu', 'D0001'),
('K0005', 'Malang', 'D0001'),
('K0006', 'Bandung', 'D0002'),
('K0007', 'Bekasi', 'D0002'),
('K0008', 'Cirebon', 'D0002'),
('K0009', 'Indramayu', 'D0002'),
('K0010', 'Depok', 'D0002'),
('K0011', 'Magelang', 'D0003'),
('K0012', 'Pekalongan', 'D0003'),
('K0013', 'Salatiga', 'D0003'),
('K0014', 'Semarang', 'D0003'),
('K0015', 'Surakarta', 'D0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

DROP TABLE IF EXISTS `meja`;
CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `baris` int(11) NOT NULL,
  `kolom` int(11) NOT NULL,
  `status` varchar(3) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `baris`, `kolom`, `status`, `date`, `time`) VALUES
(1, 1, 1, '2', '', ''),
(2, 2, 1, '2', '', ''),
(3, 5, 1, '2', '', ''),
(4, 6, 1, '2', '', ''),
(5, 1, 4, '1', '', ''),
(6, 2, 4, '1', '', ''),
(7, 5, 4, '1', '', ''),
(8, 6, 4, '1', '', ''),
(9, 1, 2, '2', '', ''),
(10, 3, 2, '2', '', ''),
(11, 4, 2, '2', '', ''),
(12, 6, 2, '2', '', ''),
(13, 1, 3, '2', '', ''),
(14, 3, 3, '2', '', ''),
(15, 4, 3, '2', '', ''),
(16, 6, 3, '1', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
