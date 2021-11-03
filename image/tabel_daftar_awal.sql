-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 08:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_daftar_awal`
--

CREATE TABLE IF NOT EXISTS `tabel_daftar_awal` (
`nrp` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `bpjs` varchar(100) NOT NULL,
  `kewarganegaran` varchar(10) NOT NULL,
  `jalan` text NOT NULL,
  `dusun` varchar(30) NOT NULL,
  `rt` varchar(11) NOT NULL,
  `rw` varchar(11) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kodepos` varchar(30) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `tinggal` varchar(10) NOT NULL,
  `transportasi` varchar(20) NOT NULL,
  `tlprumah` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `kota_sekolah` varchar(100) NOT NULL,
  `jurusan_sekolah` varchar(100) NOT NULL,
  `kps` varchar(5) NOT NULL,
  `nokps` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `aktifasi` varchar(100) NOT NULL,
  `id_jurusan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_daftar_awal`
--

INSERT INTO `tabel_daftar_awal` (`nrp`, `nama`, `tempat`, `tanggal`, `kelamin`, `agama`, `nik`, `nisn`, `npwp`, `bpjs`, `kewarganegaran`, `jalan`, `dusun`, `rt`, `rw`, `kelurahan`, `kodepos`, `kecamatan`, `tinggal`, `transportasi`, `tlprumah`, `hp`, `asal_sekolah`, `kota_sekolah`, `jurusan_sekolah`, `kps`, `nokps`, `email`, `gambar`, `aktifasi`, `id_jurusan`) VALUES
(39, 'Hanif', 'dskfjskfjs`', '2018-06-12', 'laki-laki', 'islam', '423424', '42343', '3423', '423432', 'wni', 'gdfsfsd', 'sfddfsf', '523423', '423424', 'zxz32432', '43432423', 'ffdsfsfs', 'sendiri', 'jalan_kaki', '42343242', '42343242', 'sdfdsfsf', 'fsdfds', 'ipa', 'ada', 324242, 'tommy.adam21@gmail.com', 'd3583e52378b3d2167a811ab67643b78.PNG', 'MYJKAFE7LY', 'j001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_daftar_awal`
--
ALTER TABLE `tabel_daftar_awal`
 ADD PRIMARY KEY (`nrp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_daftar_awal`
--
ALTER TABLE `tabel_daftar_awal`
MODIFY `nrp` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
