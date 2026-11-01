-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2026 at 11:26 AM
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
-- Database: `feryandriawan_411212045`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `department_id` int(11) NOT NULL,
  `nama_departemen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`department_id`, `nama_departemen`) VALUES
(12, 'Human Resources (HRD)'),
(13, 'Finance & Accounting'),
(14, 'IT & Digital Transformation'),
(15, 'Sales & Marketing'),
(16, 'Operational Support'),
(17, 'Legal & General Affairs'),
(18, 'Supply Chain Management'),
(19, 'Quality Assurance'),
(20, 'Customer Service'),
(21, 'Engineering'),
(22, 'Corporate Planning'),
(23, 'Purchasing');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `visitor_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `tujuan_id` int(11) DEFAULT NULL,
  `waktu_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `waktu_keluar` datetime DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`visitor_id`, `nama`, `email`, `perusahaan`, `department_id`, `tujuan_id`, `waktu_masuk`, `waktu_keluar`, `catatan`) VALUES
(7, 'Fitria Andrian', 'corcomm@ai.astra.co.id', 'PT Astra International Tbk', 15, 10, '2024-02-03 14:13:00', '2024-02-03 16:34:00', ''),
(8, 'Pranawa Usamah', 'utcall@unitedtractors.com', 'PT United Tractors Tbk', 12, 7, '2024-01-09 09:30:00', '2024-01-09 15:00:00', ''),
(9, 'Maimunah Jailani', 'contact@component.astra.co.id', 'PT Astra Otoparts Tbk', 12, 13, '2024-04-28 08:00:00', '2024-04-28 15:00:00', ''),
(10, 'Malika Firgantoro', 'anggabayatarihoran@hotmail.com', 'PT Serasi Autoraya', 17, 9, '2024-07-12 08:00:00', '2024-07-12 15:00:00', ''),
(11, 'Opan Prayoga', 'hairyanto61@gmail.com', 'PT Astra Honda Motor', 12, 13, '2024-04-02 07:15:00', '2024-04-02 15:00:00', ''),
(12, 'Ajeng Ramadan', 'bwinarno@gmail.com', 'PT Astra Daihatsu Motor', 12, 14, '2024-01-10 08:00:00', '2024-01-10 15:00:00', ''),
(13, 'Putri Mansur', 'pratiwimarsito@tam.co.id', 'PT Toyota Astra Motor', 12, 14, '2024-02-01 08:00:00', '2024-02-01 15:36:00', ''),
(14, 'Ir. Endra Wasita, S.E.I', 'career@pamapersada.com', 'PT Pamapersada Nusantara', 21, 10, '2024-03-10 08:00:00', '2024-03-10 15:00:00', ''),
(15, 'drg. Vanya Andriani, S.Gz', 'ywaskita@yahoo.com', 'PT Astra Agro Lestari Tbk', 12, 12, '2024-04-19 09:00:00', '2024-04-19 14:00:00', ''),
(16, 'Perkasa Kuswoyo', 'lukmanjanuar@hotmail.com', 'PT Fuji Seat Indonesia', 16, 9, '2024-02-09 08:00:00', '2024-02-09 15:00:00', ''),
(17, 'Almira Pudjiastuti', 'info@akebono-astra.co.id', 'PT Akebono Brake Astra Indonesia', 12, 10, '2024-03-27 08:00:00', '2024-03-27 15:00:00', ''),
(18, 'Rangga Megantara', 'kppmining.recruitment@kppmining.com', 'PT Kalimantan Prima Persada', 12, 13, '2024-02-18 07:00:00', '2024-02-18 17:00:00', ''),
(19, 'Galiono Permata, S.H.', 'info@astragraphia.co.id', 'PT Astra Graphia Tbk', 12, 10, '2024-02-20 13:46:47', '2024-02-28 01:54:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `tujuan_id` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`tujuan_id`, `tujuan`) VALUES
(7, 'Manager'),
(8, 'Engineer'),
(9, 'Consultant'),
(10, 'Technician'),
(11, 'Developer'),
(12, 'Analyst'),
(13, 'Coordinator'),
(14, 'Supervisor'),
(15, 'Director'),
(16, 'Administrator'),
(17, 'Meeting'),
(18, 'Meeting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$0XNSfIRlJokWYSCRJzLf9.0c7/6dYy1p/0x2QaMCdgVHCV9jmKfG6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`visitor_id`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`tujuan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `tujuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
