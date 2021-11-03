-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 03:48 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `byrspp`
--

CREATE TABLE IF NOT EXISTS `byrspp` (
`id_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `NIS` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_spp` int(11) NOT NULL,
  `id_tingkat` int(100) NOT NULL,
  `id_tahun_ajaran` int(100) NOT NULL,
  `id_kelas` int(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `byrspp`
--

INSERT INTO `byrspp` (`id_bayar`, `tgl_bayar`, `NIS`, `id_spp`, `id_tingkat`, `id_tahun_ajaran`, `id_kelas`) VALUES
(25, '2017-11-23', '123', 13, 4, 30, 7);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `id_tingkat` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_tingkat`) VALUES
(7, 'IPA', 4),
(8, 'IPS', 4),
(9, 'IPA', 5),
(10, 'IPS', 5),
(11, 'IPA', 6),
(12, 'IPS', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
`id_keluar` int(50) NOT NULL,
  `jenis_pengeluaran` text NOT NULL,
  `jumlah_pengeluaran` int(50) NOT NULL,
  `tgl_pengeluaran` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_keluar`, `jenis_pengeluaran`, `jumlah_pengeluaran`, `tgl_pengeluaran`) VALUES
(7, 'zfdsfsdf', 53453, '2017-11-23'),
(8, 'gfrdgre', 54353, '2017-11-28'),
(9, 'xdgsdfdsf', 45354545, '2017-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
`id_tahun_ajaran` int(11) NOT NULL,
  `tahun` varchar(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun`) VALUES
(30, '2017/2018');

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

-- --------------------------------------------------------

--
-- Table structure for table `tblsiswa`
--

CREATE TABLE IF NOT EXISTS `tblsiswa` (
  `NIS` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tmpt_lhr` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan','','') COLLATE latin1_general_ci NOT NULL,
  `id_tahun_ajaran` int(100) NOT NULL,
  `id_tingkat` int(10) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tblsiswa`
--

INSERT INTO `tblsiswa` (`NIS`, `nama`, `tmpt_lhr`, `tgl_lhr`, `jk`, `id_tahun_ajaran`, `id_tingkat`, `id_kelas`, `alamat`, `foto`) VALUES
('123', 'TommyBaniAdam', 'Jakarta', '2017-11-23', 'Laki-laki', 30, 4, 7, 'hikhkh', 'IMG_20150806_153011.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblspp`
--

CREATE TABLE IF NOT EXISTS `tblspp` (
`id_spp` int(11) NOT NULL,
  `id_tahun_ajaran` int(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_tingkat` int(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tblspp`
--

INSERT INTO `tblspp` (`id_spp`, `id_tahun_ajaran`, `jumlah`, `id_tingkat`) VALUES
(13, 30, 300000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
`kode_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','operator','kepsek','user') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`kode_user`, `username`, `password`, `pass`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Rhendrian Dio Prayoga', 'Laki-laki', 'Cileungsi', 'admin'),
(2, 'operator', '4b583376b2767b923c3e1da60d10de59', 'operator', 'Damayanti', 'Perempuan', 'Jakarta', 'operator'),
(5, 'iik', '12f3f9d54a417eddf55c4d5d9f8f2c10', 'iik', 'Iik Abdul Kholiq, S.S. M.Pd', 'Laki-laki', 'Jonggol', 'kepsek');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE IF NOT EXISTS `tingkat` (
`id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `tingkat`) VALUES
(4, 'X'),
(5, 'XI'),
(6, 'XII');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `byriuran`
--
ALTER TABLE `byriuran`
 ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `byrspp`
--
ALTER TABLE `byrspp`
 ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
 ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
 ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tbliuran`
--
ALTER TABLE `tbliuran`
 ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tblspp`
--
ALTER TABLE `tblspp`
 ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
 ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
 ADD PRIMARY KEY (`id_tingkat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `byriuran`
--
ALTER TABLE `byriuran`
MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `byrspp`
--
ALTER TABLE `byrspp`
MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
MODIFY `id_keluar` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbliuran`
--
ALTER TABLE `tbliuran`
MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblspp`
--
ALTER TABLE `tblspp`
MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
