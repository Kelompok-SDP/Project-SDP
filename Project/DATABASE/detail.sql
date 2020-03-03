-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 06:00 AM
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
-- Database: `detail`
--
CREATE DATABASE IF NOT EXISTS `detail` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `detail`;

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

DROP TABLE IF EXISTS `daerah`;
CREATE TABLE `daerah` (
  `kode_daerah` varchar(100) NOT NULL,
  `nama_daerah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`kode_daerah`, `nama_daerah`) VALUES
('D0001', 'Jawa Timur');
INSERT INTO `daerah` (`kode_daerah`, `nama_daerah`) VALUES
('D0002', 'Jawa Barat');
INSERT INTO `daerah` (`kode_daerah`, `nama_daerah`) VALUES
('D0003', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `kode_kota` varchar(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kode_daerah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0001', 'Surabaya', 'D0001');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0002', 'Malang', 'D0001');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0003', 'Probolinggo', 'D0001');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0004', 'Batu', 'D0001');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0005', 'Malang', 'D0001');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0006', 'Bandung', 'D0002');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0007', 'Bekasi', 'D0002');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0008', 'Cirebon', 'D0002');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0009', 'Indramayu', 'D0002');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0010', 'Depok', 'D0002');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0011', 'Magelang', 'D0003');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0012', 'Pekalongan', 'D0003');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0013', 'Salatiga', 'D0003');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0014', 'Semarang', 'D0003');
INSERT INTO `kota` (`kode_kota`, `nama_kota`, `kode_daerah`) VALUES
('K0015', 'Surakarta', 'D0003');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
