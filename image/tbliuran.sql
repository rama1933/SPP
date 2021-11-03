-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 05:18 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nurhik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbliuran`
--

CREATE TABLE IF NOT EXISTS `tbliuran` (
`id_tagihan` int(11) NOT NULL,
  `id_tahun_ajaran` int(100) NOT NULL,
  `id_tingkat` int(100) NOT NULL,
  `jenis_tagihan` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbliuran`
--

INSERT INTO `tbliuran` (`id_tagihan`, `id_tahun_ajaran`, `id_tingkat`, `jenis_tagihan`, `jumlah`) VALUES
(7, 30, 4, 'Seragam', 400000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbliuran`
--
ALTER TABLE `tbliuran`
 ADD PRIMARY KEY (`id_tagihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbliuran`
--
ALTER TABLE `tbliuran`
MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
