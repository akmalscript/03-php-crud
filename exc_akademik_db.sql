-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 06:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exc_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--
CREATE TABLE `mahasiswa` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nim` CHAR(8) NOT NULL,
  `nama` VARCHAR(50) NOT NULL,
  `alamat` VARCHAR(125) NOT NULL,
  `fakultas` VARCHAR(40) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `alamat`, `fakultas`) VALUES
(1, '20200001', 'Rizky', 'Semarang', 'Soshum'),
(2, '20200002', 'Sari', 'Yogyakarta', 'Saintek'),
(3, '20200003', 'Ayu', 'Jakarta', 'Soshum'),
(4, '20200004', 'Galih', 'Bandung', 'Saintek');

--
-- Set AUTO_INCREMENT to 5 for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY COLUMN `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
