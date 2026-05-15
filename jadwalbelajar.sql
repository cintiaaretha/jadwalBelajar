-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2026 at 11:47 AM
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
  `ruangan` varchar(100) DEFAULT NULL,
  `dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `user_id`, `matkul`, `hari`, `jam_mulai`, `jam_selesai`, `ruangan`, `dosen`) VALUES
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
(5, 'Tsaqif Khan', 'tsaqif@gmail.com', 'tsaqif123'),
(6, 'Feli Olivatus', 'feli@gmail.com', 'feli123');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `nama_tugas` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `status` enum('Belum','Selesai') DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `user_id`, `jadwal_id`, `nama_tugas`, `deadline`, `catatan`, `status`) VALUES
(1, 1, 1, 'Tugas 10 Pengantar Bisnis', '2026-05-22', 'Materi: Manajemen Pemasaran.', 'Belum'),
(2, 1, 2, 'Esai Bahasa Indonesia', '2026-05-20', 'Rangkum jurnal lalu buat esai dan upload ke Google Drive.', 'Selesai'),
(3, 2, 3, 'Final Project Linked List', '2026-05-25', 'Buat program linked list menggunakan C++ lalu upload ke GitHub.', 'Belum'),
(4, 2, 4, 'Tugas Statistika', '2026-05-24', 'Hitung mean, median, dan modus dari data survei mahasiswa.', 'Belum'),
(5, 3, 5, 'Analisis Organisasi', '2026-05-27', 'Buat presentasi struktur organisasi perusahaan dalam format PPT.', 'Selesai'),
(6, 3, 6, 'Karya Ilmiah', '2026-05-29', 'Buat karya ilmiah minimal 700 kata format PDF.', 'Belum'),
(7, 4, 7, 'Latihan Responsi Web', '2026-05-15', 'Gabungkan PHP dengan HTML dan CSS untuk membuat halaman dinamis.', 'Belum'),
(8, 5, 8, 'Analisis Sistem Informasi', '2026-05-22', 'Buat laporan mengenai penerapan sistem informasi dalam bisnis.', 'Belum');

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
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
