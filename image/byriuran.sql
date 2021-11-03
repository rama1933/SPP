-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 05:19 PM
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
-- Table structure for table `byriuran`
--

CREATE TABLE IF NOT EXISTS `byriuran` (
`id_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `NIS` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_tahun_ajaran` int(100) NOT NULL,
  `id_tingkat` int(100) NOT NULL,
  `id_kelas` int(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `byriuran`
--

INSERT INTO `byriuran` (`id_bayar`, `tgl_bayar`, `NIS`, `id_tagihan`, `jumlah`, `id_tahun_ajaran`, `id_tingkat`, `id_kelas`) VALUES
(77, '2017-11-24', '123', 7, 300000, 30, 4, 7),
(79, '2018-07-08', '123', 7, 100000, 30, 4, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `byriuran`
--
ALTER TABLE `byriuran`
 ADD PRIMARY KEY (`id_bayar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `byriuran`
--
ALTER TABLE `byriuran`
MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
