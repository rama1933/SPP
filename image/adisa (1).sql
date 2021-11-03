-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 12:28 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `date`, `judul`, `gambar`, `berita`, `oleh`, `status`) VALUES
(24, '2018-07-08', 'Berita Test', 'cc110fb5995a1faa59f1b59ef42f31d3.jpg', '<p>ini berita</p>\r\n', 'Zakaria', 'Y'),
(25, '2018-07-08', 'apa aja', 'f5ecac8e381bc62a414cf5543429e26c.PNG', '<p>tommy</p>\r\n', 'Zakaria', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `byriuran`
--

CREATE TABLE IF NOT EXISTS `byriuran` (
`id_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `nik` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_tahun_ajaran` int(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `byriuran`
--

INSERT INTO `byriuran` (`id_bayar`, `tgl_bayar`, `nik`, `id_tagihan`, `jumlah`, `id_tahun_ajaran`) VALUES
(77, '2017-11-24', '123', 8, 50000, 32),
(80, '2018-07-17', '1234', 8, 30000, 32);

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
-- Table structure for table `pendaftaran_siswa`
--

CREATE TABLE IF NOT EXISTS `pendaftaran_siswa` (
`id_siswa` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nisn` varchar(100) NOT NULL,
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
  `gambar` varchar(100) NOT NULL,
  `aktifasi` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_siswa`
--

INSERT INTO `pendaftaran_siswa` (`id_siswa`, `nama`, `tempat`, `tanggal`, `kelamin`, `agama`, `nik`, `nisn`, `jalan`, `dusun`, `rt`, `rw`, `kelurahan`, `kodepos`, `kecamatan`, `tinggal`, `transportasi`, `tlprumah`, `hp`, `gambar`, `aktifasi`, `status`) VALUES
(40, 'Tommy', 'gbfdgfg', '2018-07-09', 'laki-laki', 'islam', '123', '123', 'gfdgd', 'fdfd', '4342', '4324', 'xfgsfds', '252343242', 'fdsfdsf', 'sendiri', 'jalan_kaki', '234234324', '54534543', '1ffd9857b5e96adf1c31adb2443936bd.jpg', 'QYS1CU0J36', 'terima'),
(42, 'hanif', 'dfsdf', '2018-07-10', 'laki-laki', 'islam', '1234', '5453', 'wrwrwre', 'erwrw', '42342', '43242', 'rwerwrew', '343242', 'fsdfsf', 'sendiri', 'jalan_kaki', '23432424', '2342342', '310a628fc435cb5637346bda3fa18fc0.PNG', 'KDOK7VS0K3', 'terima');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `date`, `judul`, `img`, `deskripsi`, `status`) VALUES
(8, '2018-07-08', 'apap', '0090fb0fff1c60c7c0075f018bf18c67.PNG', '<p>jhuhuh</p>\r\n', 'Y');

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
(1, 'Kata Sambutan ', '<p><strong>INI KATA</strong></p>\r\n', 'Y'),
(2, 'Kemitraan, Sarana dan Fasilitas', '<p><strong>INI SARANA</strong></p>\r\n', 'Y'),
(3, 'Visi dan Misi', '<p><strong>INI VISI MISI</strong></p>\r\n', 'Y'),
(4, 'Sejarah Singkat', '<p><strong>INI SEJARAH SINGKAT</strong></p>\r\n', 'Y'),
(5, 'Prestasi', '<blockquote>\r\n<h3>INI PRESTASI</h3>\r\n</blockquote>\r\n', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
`id_tahun_ajaran` int(11) NOT NULL,
  `tahun` varchar(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun`) VALUES
(32, '2019/2020'),
(35, '2017/2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbliuran`
--

CREATE TABLE IF NOT EXISTS `tbliuran` (
`id_tagihan` int(11) NOT NULL,
  `id_tahun_ajaran` int(100) NOT NULL,
  `jenis_tagihan` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbliuran`
--

INSERT INTO `tbliuran` (`id_tagihan`, `id_tahun_ajaran`, `jenis_tagihan`, `jumlah`) VALUES
(8, 32, 'Seragam', 50000);

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
-- Indexes for table `byriuran`
--
ALTER TABLE `byriuran`
 ADD PRIMARY KEY (`id_bayar`);

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
-- Indexes for table `pendaftaran_siswa`
--
ALTER TABLE `pendaftaran_siswa`
 ADD PRIMARY KEY (`id_siswa`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `byriuran`
--
ALTER TABLE `byriuran`
MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pendaftaran_siswa`
--
ALTER TABLE `pendaftaran_siswa`
MODIFY `id_siswa` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbliuran`
--
ALTER TABLE `tbliuran`
MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
