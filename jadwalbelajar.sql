-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 10:27 AM
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
-- Database: `jadwalbelajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `matkul` varchar(100) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `user_id`, `matkul`, `hari`, `jam_mulai`, `jam_selesai`, `catatan`) VALUES
(1, 1, 'Pengantar Bisnis', 'Senin', '08:00:00', '09:30:00', 'Memahami konsep dasar bisnis'),
(2, 1, 'Kalkulus', 'Rabu', '10:00:00', '11:30:00', 'Latihan turunan dan integral'),
(3, 2, 'Algoritma dan Struktur Data', 'Selasa', '12:30:00', '14:00:00', 'Belajar array dan linked list'),
(4, 2, 'Pengantar Metode Statistika', 'Kamis', '09:00:00', '10:30:00', 'Menghitung mean, median, modus'),
(5, 3, 'Manajemen Basis Data', 'Rabu', '08:00:00', '09:30:00', 'Belajar ERD dan relasi tabel'),
(6, 3, 'Bahasa Indonesia', 'Kamis', '07:30:00', '09:00:00', 'Menyusun karya ilmiah'),
(7, 4, 'Pemograman Web Dasar', 'Jumat', '08:00:00', '09:30:00', 'Belajar HTML, CSS, dan PHP'),
(8, 5, 'Pengantar Sistem Informasi', 'Senin', '13:00:00', '14:30:00', 'Konsep dasar sistem informasi');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`) VALUES
(1, 'azkanida', 'azka123'),
(2, 'cintiamutiara', 'cintia123'),
(3, 'arfahamizan', 'hamiz123'),
(4, 'nadyagildas', 'gildas123'),
(5, 'tsaqifkhan', 'tsaqif123');

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
  ADD UNIQUE KEY `username` (`username`);

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
