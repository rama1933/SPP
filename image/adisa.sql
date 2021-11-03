-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 08:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
`id` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `nama`, `username`, `password`, `email`, `foto`) VALUES
(4, 'Zakaria', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'zakaria@gmail.com', 'pp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_art` int(11) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `penulis` varchar(300) NOT NULL,
  `posted` date NOT NULL,
  `isi` text NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_art`, `judul`, `gambar`, `penulis`, `posted`, `isi`, `status`) VALUES
(10, 'INI ARTIKEL', 'a04efb2b4a6d346e3cef4d861230949d.jpg', 'Zakaria', '2018-07-08', '<p>INI ARTIKEL</p>\r\n', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`id` int(11) NOT NULL,
  `banner` varchar(400) NOT NULL,
  `caption` text NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner`, `caption`, `status`) VALUES
(9, '064f70ae165b4c2154085a3ca65f47c2.jpg', 'ini contoh 3', 'Y'),
(7, '3e41a522826cb538598896bde74d34a4.jpg', 'Ini contoh 1', 'Y'),
(8, 'c82056a1667764cd75074ee809177559.jpg', 'ini contoh 2', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`id_berita` int(11) NOT NULL,
  `date` date NOT NULL,
  `judul` varchar(300) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `berita` text NOT NULL,
  `oleh` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `date`, `judul`, `gambar`, `berita`, `oleh`, `status`) VALUES
(24, '2018-07-08', 'Berita Test', 'cc110fb5995a1faa59f1b59ef42f31d3.jpg', '<p>ini berita</p>\r\n', 'Zakaria', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE IF NOT EXISTS `galery` (
`id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id`, `file`, `keterangan`, `status`) VALUES
(24, '07016e2d58a78e75d06186c710ccf115.jpg', 'Zakaria', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
`id_guru` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pelajaran` varchar(100) NOT NULL,
  `lulusan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `foto`, `nama`, `jabatan`, `pelajaran`, `lulusan`, `alamat`, `no_telp`, `status`) VALUES
(13, '954fe56aaa5a8f5dd9d6509d49055df8.jpg', 'Zakaria', 'Kepala Sekolah', 'Bahasa Inggris', 'Oxford School', 'Dimana ya gatau :D', '08888888888', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
`id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `pesan`) VALUES
(7, 'zakkisc', 'a', 'xax'),
(8, 'zakkisc', 'av saklnv', 'a'),
(9, 'kamukamuchi', 'bangkabeach@gmail.com', 'kamu itu sialan kalo lagi salah'),
(10, 'Mr. Mbo', 'accesbo@mail.com', 'kamu itu ituloh greget kalo bikin web'),
(11, 'kamukamuchi', 'teguhsmasa@yahoo.co.id', 'agak lumyan keren ah websitenya'),
(12, 'halo', 'pjmfurniture@gmail.com', 'kamu apa kabarnya?'),
(13, 'halo', 'pjmfurniture@gmail.com', 'kamu apa kabarnya?'),
(14, 'halo', 'pjmfurniture@gmail.com', 'kamu apa kabarnya?'),
(15, 'Nitinegoro', 'pjmfurniture@gmail.com', 'kamu gimana kabarnya?'),
(16, 'vfadas', 'sfrsefrse', 'sadsad');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
`id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `date`, `judul`, `img`, `deskripsi`, `status`) VALUES
(2, '2015-06-29', 'jalan santai', 'gal.jpg', '"Sebelum penutupan class meeting akan diadakan Jalan Santai, Rute Lap. Bnagsri', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
`id_profil` int(11) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `judul`, `deskripsi`, `status`) VALUES
(1, 'Kata Sambutan ', '<p><strong>INI KATA SAMBUTAN</strong></p>\r\n', 'Y'),
(2, 'Kemitraan, Sarana dan Fasilitas', '<p><strong>INI SARANA</strong></p>\r\n', 'Y'),
(3, 'Visi dan Misi', '<p><strong>INI VISI MISI</strong></p>\r\n', 'Y'),
(4, 'Sejarah Singkat', '<p><strong>INI SEJARAH SINGKAT</strong></p>\r\n', 'Y'),
(5, 'Prestasi', '<blockquote>\r\n<h3>INI PRESTASI</h3>\r\n</blockquote>\r\n', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_art`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
 ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
