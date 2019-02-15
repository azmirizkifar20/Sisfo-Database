-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 12:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chevalier`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id` int(11) NOT NULL,
  `nim` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bpp` varchar(250) NOT NULL,
  `asuransi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id`, `nim`, `nama`, `bpp`, `asuransi`) VALUES
(1, '6706184055', 'Muhamad Azmi Rizkifar', '6.500.000', '150.000'),
(2, '6706180041', 'Irgi Ahmad Maulana', '6.800.000', '150.000'),
(3, '6706180067', 'Aziz Alfauzi', '6.700.000', '150.000'),
(4, '6706180122', 'Kharis Zakaria', '6.550.000', '150.000'),
(5, '6706180126', 'Nuril Febri Setiyawan', '6.700.000', '150.000'),
(6, '6706180130', 'Haidar Rasyid Ramdana Putra', '6.650.000', '150.000'),
(7, '6706181008', 'Fachrul Faathirullah', '6.600.000', '150000'),
(8, '6706181059', 'Haikal Gibran Akbar', '6.500.000', '150.000'),
(9, '6706181063', 'Naufal Sayyid Furqoon', '6.700.000', '150.000'),
(10, '6706181071', 'Muhammad Fikri Fadilah', '6.600.000', '150.000'),
(11, '6706181088', 'Muhammad Dicky Mujantara', '6.550.000', '150.000'),
(12, '6706183049', 'Muhammad Alfath Abibi', '6.550.000', '150.000'),
(13, '6706184004', 'Dewa Aditya Armanda', '6.550.000', '150.000'),
(14, '6706184011', 'Maulidiyah Zuhdi', '6.600.000', '150.000'),
(15, '6706184015', 'Intan Oktavia Putri', '6.700.000', '150.000'),
(16, '6706184018', 'Fadil Ilham Muharram', '6.800.000', '150.000'),
(17, '6706184026', 'Muhamad Anas Mustopa', '6.650.000', '150.000'),
(18, '6706184030', 'Titan Hafizh Surya Kusuma', '6.550.000', '150.000');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nilai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `kelas`, `nilai`) VALUES
(9, '6706184055', 'Muhamad Azmi Rizkifar', 'D3IF-42-03', '3.84'),
(10, '6706180041', 'Irgi Ahmad Maulana', 'D3IF-42-03', '3.86'),
(11, '6706180067', 'Aziz Alfauzi', 'D3IF-42-03', '3.92'),
(12, '6706180122', 'Kharis Zakaria', 'D3IF-42-03', '3.76'),
(13, '6706180126', 'Nuril Febri Setiyawan', 'D3IF-42-03', '3.96'),
(14, '6706180130', 'Haidar Rasyid Ramdana Putra', 'D3IF-42-03', '3.87'),
(15, '6706181008', 'Fachrul Faathirullah', 'D3IF-42-02', '3.82'),
(16, '6706181059', 'Haikal Gibran Akbar', 'D3IF-42-03', '3.87'),
(17, '6706181063', 'Naufal Sayyid Furqoon', 'D3IF-42-03', '3.84'),
(18, '6706181071', 'Muhammad Fikri Fadilah', 'D3IF-42-03', '3.92'),
(19, '6706181088', 'Muhammad Dicky Mujantara', 'D3IF-42-03', '3.87'),
(20, '6706183049', 'Muhammad Alfath Abibi', 'D3IF-42-03', '3.96'),
(21, '6706184004', 'Dewa Aditya Armanda', 'D3IF-42-03', '3.87'),
(22, '6706184011', 'Maulidiyah Zuhdi', 'D3IF-42-03', '3.85'),
(23, '6706184015', 'Intan Oktavia Putri', 'D3IF-42-03', '3.87'),
(24, '6706184018', 'Fadil Ilham Muharram', 'D3IF-42-03', '3.82'),
(25, '6706184026', 'Muhamad Anas Mustopa', 'D3IF-41-01', '3.92'),
(26, '6706184030', 'Titan Hafizh Surya Kusuma', 'D3IF-42-03', '3.84');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$j7dfEiatXJvWR66DpbUEdOsLjo71oofk0q2dvHA0miUrT93eN0eFq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
