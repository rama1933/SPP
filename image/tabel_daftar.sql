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
-- Table structure for table `tabel_daftar`
--

CREATE TABLE IF NOT EXISTS `tabel_daftar` (
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
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kodepos` int(30) NOT NULL,
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
  `id_jurusan` varchar(100) NOT NULL,
  `pemberian_nrp` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2018004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_daftar`
--

INSERT INTO `tabel_daftar` (`nrp`, `nama`, `tempat`, `tanggal`, `kelamin`, `agama`, `nik`, `nisn`, `npwp`, `bpjs`, `kewarganegaran`, `jalan`, `dusun`, `rt`, `rw`, `kelurahan`, `kodepos`, `kecamatan`, `tinggal`, `transportasi`, `tlprumah`, `hp`, `asal_sekolah`, `kota_sekolah`, `jurusan_sekolah`, `kps`, `nokps`, `email`, `gambar`, `id_jurusan`, `pemberian_nrp`) VALUES
(2018003, 'muhanif', 'bangkalan', '1995-03-20', 'laki-laki', 'islam', '120000', '12111', '11223', '1123111', 'wni', 'jl.rawamangun', 'koja', 12, 12, 'koja', 14441, 'koja', 'sendiri', 'kendaraan_umum', '111222', '1221', 'smk bangkalan', 'jl.ringroat', 'ipa', 'tidak', 0, 'hanif@gmail.com', '631x473xrsz_win7_1.png.pagespeed.ic.-UKcpR_oeV.png', 'j001', 'belum'),
(2018001, 'Tommy Ganteng', 'Jakarta', '2018-05-15', 'laki-laki', 'islam', '123456789', '123456789', '123', '123', 'wni', 'Jl. Uka', 'apa', 6775, 4324, 'fdfsd', 2147483647, 'fsdf', 'orangtua', 'kendaraan_pribadi', '32424', '3242423', 'fdsfsfs', 'fsdff', 'listrik', 'iya', 0, 'tommy.adam21@gmail.com', '17239-200.png', 'j001', 'belum'),
(2018002, 'Rani', 'ksdfneds', '2018-05-15', 'laki-laki', 'islam', '4234', '4324', '32424', '432423', 'wni', 'sgfdsdf', 'gdsfg', 24234324, 43242, 'fdsgdsfrgg', 4234, 'sdfsd', 'sendiri', 'kendaraan_umum', '534535345', '543543', 'sfdgsd', 'sgfsdg', 'ipa', 'iya', 545353, 'tommy.adam21@gmail.com', 'DJADAJAT FOTO.jpg', 'j001', 'belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
 ADD PRIMARY KEY (`nrp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
MODIFY `nrp` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2018004;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
