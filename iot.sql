-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 05:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`) VALUES
(1, 'Motor'),
(2, 'Mobil'),
(3, 'Pajero');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `unik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `unik`, `nama`, `id_jenis`, `telepon`) VALUES
(2, '34', 'we', 1, '12'),
(3, '972442140', 'Asep', 3, '08789238388388'),
(4, '65137241', 'Andi', 3, '088838838'),
(5, '2043925555', 'Rilki', 1, '7371829'),
(6, '11520625226', 'Rangga', 2, '089373631636');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` bigint(11) NOT NULL,
  `unik` varchar(100) NOT NULL,
  `aksi` varchar(10) NOT NULL,
  `jam` varchar(11) NOT NULL,
  `hari` varchar(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `unik`, `aksi`, `jam`, `hari`, `tanggal`, `bulan`, `tahun`) VALUES
(19, '2043925555', 'boleh', '9', 'Sunday', 9, 12, 2021),
(20, '2043925555', 'boleh', '9', 'Monday', 9, 12, 2021),
(21, '20439255551', 'tolak', '9', 'Thursday', 9, 12, 2021),
(22, '11520625226', 'boleh', '9', 'Thursday', 9, 12, 2021),
(23, '115206252261', 'tolak', '9', 'Thursday', 9, 12, 2021),
(24, '65137241', 'boleh', '9', 'Thursday', 9, 12, 2021),
(25, '65137241as', 'tolak', '9', 'Saturday', 9, 12, 2021),
(26, '972442140', 'boleh', '9', 'Saturday', 9, 12, 2021),
(27, '972442140', 'boleh', '11', 'Thursday', 9, 12, 2021),
(28, '9724421401', 'tolak', '11', 'Thursday', 9, 12, 2021),
(29, '972442140', 'boleh', '11', 'Thursday', 9, 12, 2021),
(30, '65137241', 'boleh', '11', 'Thursday', 9, 12, 2021),
(31, '65137241', 'boleh', '11', 'Thursday', 9, 12, 2021),
(32, '65137241', 'boleh', '11', 'Thursday', 9, 12, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$x3.zGDoFpksCc5NzVOx.d.Fpar2mgEdxWhmkf1UDsJtb0nuqkZV.i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
