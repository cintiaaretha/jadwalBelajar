-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2026 at 08:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwalbelajar2`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mapel` varchar(100) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `ruangan` varchar(100) DEFAULT NULL,
  `dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `user_id`, `mapel`, `hari`, `jam_mulai`, `jam_selesai`, `ruangan`, `dosen`) VALUES
(1, 1, 'Pengantar Bisnis', 'Jumat', '10:00:00', '11:45:00', 'Patt.I-1A', 'Budi Suvanto S.T., M.Eng.'),
(2, 1, 'Bahasa Indonesia', 'Selasa', '12:30:00', '14:15:00', 'Patt.II-3C', 'Hermanto S.Pd., M.Hum.'),
(3, 2, 'Algoritma dan Struktur Data', 'Kamis', '07:30:00', '10:00:00', 'Patt.I-3A', 'Wilis Kaswidjanti S.Si., M.Kom.'),
(4, 2, 'Pengantar Metode Statistika', 'Selasa', '10:00:00', '11:45:00', 'Patt.I-3C', 'Daniel Eliazar Latumaerissa, S.Pd., M.Si.D.'),
(5, 3, 'Manajemen & Organisasi', 'Rabu', '07:30:00', '09:15:00', 'Patt.II-3C', 'Yuli Fauziah S.T., M.T.'),
(6, 3, 'Bahasa Indonesia', 'Kamis', '15:00:00', '16:45:00', 'Patt.III-3B', 'Yunie Herawati Ir., M.Hum.'),
(7, 4, 'Pemrograman Web Dasar', 'Rabu', '12:30:00', '14:15:00', 'Patt.I-3B', 'Dessyanto Boedi P S.T., M.T.'),
(8, 5, 'Pengantar Bisnis', 'Jumat', '10:00:00', '11:45:00', 'Patt.I-1A', 'Budi Suvanto S.T., M.Eng.');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Azka Nida', 'azka@gmail.com', 'azka123'),
(2, 'Cintia Mutiara', 'cintia@gmail.com', 'cintia123'),
(3, 'Arfaha Mizan', 'hamiz@gmail.com', 'hamiz123'),
(4, 'Nadya Gildas', 'gildas@gmail.com', 'gildas123'),
(5, 'Tsaqif Khan', 'tsaqif@gmail.com', 'tsaqif123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
