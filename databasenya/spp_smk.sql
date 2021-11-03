-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 08:56 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spp_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE IF NOT EXISTS `bulan` (
`id_bulan` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Juli'),
(2, 'Agustus'),
(3, 'September'),
(4, 'Oktober'),
(5, 'November'),
(6, 'Desember'),
(7, 'Januari'),
(8, 'Februari'),
(9, 'Maret'),
(10, 'April'),
(11, 'Mei'),
(12, 'Juni');

-- --------------------------------------------------------

--
-- Table structure for table `byrnonspp`
--

CREATE TABLE IF NOT EXISTS `byrnonspp` (
`id_bayar_iuran` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `NIS` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_iuran` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `byrnonspp`
--

INSERT INTO `byrnonspp` (`id_bayar_iuran`, `tgl_bayar`, `NIS`, `id_iuran`, `jumlah_bayar`) VALUES
(94, '2018-08-06', '123', 60, 370000),
(93, '2018-08-06', '123', 60, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `byrspp`
--

CREATE TABLE IF NOT EXISTS `byrspp` (
`id_bayar_spp` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `NIS` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `byrspp`
--

INSERT INTO `byrspp` (`id_bayar_spp`, `tgl_bayar`, `NIS`, `id_spp`) VALUES
(252, '2018-08-06', '123', 394);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
`id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(15, 'Otomotif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_jurusan`, `id_tingkat`) VALUES
(20, 'X-MOC', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
`id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sejumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
`id_tahun_ajaran` int(11) NOT NULL,
  `tahun` varchar(9) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun`, `status`) VALUES
(42, '2018/2019', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbliuran`
--

CREATE TABLE IF NOT EXISTS `tbliuran` (
`id_iuran` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `jenis_iuran` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbliuran`
--

INSERT INTO `tbliuran` (`id_iuran`, `id_tahun_ajaran`, `id_tingkat`, `id_jurusan`, `jenis_iuran`, `jumlah`) VALUES
(60, 42, 1, 15, 'Seragam', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `tblsiswa`
--

CREATE TABLE IF NOT EXISTS `tblsiswa` (
`id_siswa` int(11) NOT NULL,
  `NIS` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tmpt_lhr` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` char(1) COLLATE latin1_general_ci NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tblsiswa`
--

INSERT INTO `tblsiswa` (`id_siswa`, `NIS`, `nama`, `tmpt_lhr`, `tgl_lhr`, `jk`, `id_tahun_ajaran`, `id_kelas`, `alamat`, `foto`) VALUES
(24, '123', 'Tommy Bani Adam', 'Jakarta', '2018-08-06', 'L', 42, 20, 'Cileungsi', '96311cbc2d8456fc6f2d89ab26a65150.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tblspp`
--

CREATE TABLE IF NOT EXISTS `tblspp` (
`id_spp` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_tingkat` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=406 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tblspp`
--

INSERT INTO `tblspp` (`id_spp`, `id_tahun_ajaran`, `jumlah`, `id_tingkat`, `id_jurusan`, `id_bulan`) VALUES
(405, 42, 700000, 1, 15, 12),
(404, 42, 700000, 1, 15, 11),
(403, 42, 700000, 1, 15, 10),
(402, 42, 700000, 1, 15, 9),
(401, 42, 700000, 1, 15, 8),
(400, 42, 700000, 1, 15, 7),
(399, 42, 700000, 1, 15, 6),
(398, 42, 700000, 1, 15, 5),
(397, 42, 700000, 1, 15, 4),
(396, 42, 700000, 1, 15, 3),
(395, 42, 700000, 1, 15, 2),
(394, 42, 700000, 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
`kode_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','operator','kepsek','user') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`kode_user`, `username`, `password`, `pass`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `level`) VALUES
(1, 'tommy', '$2y$09$8Ln9gUj10/1J8lIhfun74OIYwR/MTN72kQ7qv9QHCeorux5fFIRhG', 'admin', 'TommyBaniAdam', 'Laki-laki', 'Cileungsi', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE IF NOT EXISTS `tingkat` (
`id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(3) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `tingkat`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
 ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `byrnonspp`
--
ALTER TABLE `byrnonspp`
 ADD PRIMARY KEY (`id_bayar_iuran`);

--
-- Indexes for table `byrspp`
--
ALTER TABLE `byrspp`
 ADD PRIMARY KEY (`id_bayar_spp`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
 ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
 ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tbliuran`
--
ALTER TABLE `tbliuran`
 ADD PRIMARY KEY (`id_iuran`);

--
-- Indexes for table `tblsiswa`
--
ALTER TABLE `tblsiswa`
 ADD PRIMARY KEY (`id_siswa`);

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
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `byrnonspp`
--
ALTER TABLE `byrnonspp`
MODIFY `id_bayar_iuran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `byrspp`
--
ALTER TABLE `byrspp`
MODIFY `id_bayar_spp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbliuran`
--
ALTER TABLE `tbliuran`
MODIFY `id_iuran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tblsiswa`
--
ALTER TABLE `tblsiswa`
MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tblspp`
--
ALTER TABLE `tblspp`
MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=406;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
