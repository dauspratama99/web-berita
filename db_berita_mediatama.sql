-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 05:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_berita_mediatama`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(11) NOT NULL,
  `about_keterangan_1` text NOT NULL,
  `about_keterangan_2` text NOT NULL,
  `about_keterangan_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `about_keterangan_1`, `about_keterangan_2`, `about_keterangan_list`) VALUES
(1, 'berita Mediatama adalah sebuah project magang yang dibuat dengan menggunakan php versi 7', 'Menyediakan berita sumber terpercaya dan anti hoax dan no drama drama', 'Bermutu tinggi,Anti Hoax,No Drama');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_email`, `admin_foto`) VALUES
(1, 'Bil haqi', 'bilhaqi28', '12345678', 'bilhaqi2806@gmail.com', 'bil.jpg'),
(2, '<script>alert(\"filterbos\");</script>', 'test', 'test', 'bilhaqi@gmail.com', '1613269686_Capture001.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `berita_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `berita_judul` varchar(255) NOT NULL,
  `berita_tgl` date NOT NULL,
  `berita_isi` varchar(255) NOT NULL,
  `berita_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`berita_id`, `kategori_id`, `berita_judul`, `berita_tgl`, `berita_isi`, `berita_gambar`) VALUES
(1, 1, 'Kasus Suap Bansos', '2021-02-01', 'terjadi penyelewwengan dana bansos oleh para politisi yang tidak bertanggung jawab dalam melakukan pengelolaan anggran yang sebetulnya diperuntukan untuk masyarakat kalangan bawah,Plt Bupati Cianjur Herman Suherman geram saat mendengar ada oknum pendampin', 'berita.png'),
(2, 2, 'Kunjungan Panti Asuhan', '2021-02-10', 'Kunjungan dilakukan pada hari rabu oleh Institut Teknologi Padang di pulau jawa kota tangerang', '1612966506_Logo Standar ITP.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`, `kategori_deskripsi`) VALUES
(1, 'Politik', 'Politik adalah suatu kegiatan yang memiliki satu visi dan misi yaitu mensejahterakan kehidupan rakyat'),
(2, 'Sosial', 'sosial adalah mengatur hubungan antara sesama makhluk hidup untuk dapat saling tolong menolong satu sama lainnya'),
(3, '<script>alert(\"filter bos\")</script>', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(11) NOT NULL,
  `nama` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `nama`) VALUES
(1, 'd'),
(2, 'dsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
