-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2023 at 01:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kendaraan`
--

CREATE TABLE `data_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `no_pol` varchar(11) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `jam_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jam_keluar` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status_member` enum('member','tidak member') NOT NULL,
  `harga` decimal(20,0) NOT NULL DEFAULT 0,
  `id_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kendaraan`
--

INSERT INTO `data_kendaraan` (`id_kendaraan`, `no_pol`, `id_kategori`, `jam_masuk`, `jam_keluar`, `id_user`, `status_member`, `harga`, `id_member`) VALUES
(45, 'E 9987 ME', 2, '2023-03-06 11:17:04', NULL, 6, 'tidak member', '0', NULL),
(46, 'E 9988 MEHA', 1, '2023-03-06 11:57:51', '2023-03-06 12:57:51', 6, 'member', '10000', NULL),
(49, 'E 8877 EDS', 1, '2023-03-06 11:57:50', '2023-03-06 12:57:50', 6, 'member', '0', NULL),
(50, 'E 9988 MEHA', 1, '2023-03-06 11:57:49', '2023-03-06 12:57:49', 6, 'tidak member', '10000', NULL),
(51, 'E 9988 MEHA', 1, '2023-03-06 11:57:48', '2023-03-06 12:57:48', 6, 'tidak member', '10000', NULL),
(52, 'E 9988 MEHA', 1, '2023-03-06 11:57:47', '2023-03-06 12:57:47', 6, 'tidak member', '10000', NULL),
(53, 'E 8877 EDS', 1, '2023-03-06 11:57:46', '2023-03-06 12:57:46', 6, 'member', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(20) NOT NULL,
  `harga_1jam` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`, `harga_1jam`) VALUES
(1, 'motor', '2000'),
(2, 'mobil', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(3) NOT NULL,
  `no_pol` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `no_pol`) VALUES
(2, 'E 8877 EDS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `password` varchar(254) NOT NULL,
  `role` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `password`, `role`) VALUES
(6, 'admin', 'admin123', 'admin'),
(7, 'syaha', 'syaha', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kendaraan`
--
ALTER TABLE `data_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_member` (`id_member`);

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
  ADD KEY `no_pol` (`no_pol`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kendaraan`
--
ALTER TABLE `data_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kendaraan`
--
ALTER TABLE `data_kendaraan`
  ADD CONSTRAINT `data_kendaraan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_kendaraan_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_kendaraan_ibfk_4` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
