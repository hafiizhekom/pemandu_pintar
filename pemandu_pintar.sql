-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2020 at 10:27 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemandu_pintar`
--

-- --------------------------------------------------------

--
-- Table structure for table `gunung`
--

DROP TABLE IF EXISTS `gunung`;
CREATE TABLE IF NOT EXISTS `gunung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gunung` varchar(50) NOT NULL,
  `ketinggian` int(11) NOT NULL,
  `letak` varchar(100) NOT NULL,
  `curah_hujan` varchar(10) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gunung`
--

INSERT INTO `gunung` (`id`, `nama_gunung`, `ketinggian`, `letak`, `curah_hujan`, `gambar`, `deskripsi`, `updated_at`, `created_at`) VALUES
(1, 'Pangrango', 123, 'Malang', 'Tinggi', 'pangrango.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Lawu', 123, 'Malang', 'Tinggi', 'lawu.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Merapi', 123, 'Malang', 'Tinggi', 'merapi.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Merbabu', 123, 'Malang', 'Tinggi', 'merbabu.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pemanduan`
--

DROP TABLE IF EXISTS `pemanduan`;
CREATE TABLE IF NOT EXISTS `pemanduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pemandu` int(11) NOT NULL,
  `pendakian` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `catatan` text,
  `approved` char(1) NOT NULL DEFAULT 'N',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pemandu` (`pemandu`),
  KEY `pendakian` (`pendakian`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemanduan`
--

INSERT INTO `pemanduan` (`id`, `pemandu`, `pendakian`, `harga`, `catatan`, `approved`, `created_at`, `updated_at`) VALUES
(7, 5, 4, 250000, 'Test', 'Y', '2020-06-11 17:24:47', '2020-06-11 17:37:05'),
(8, 1, 1, 250000, 'Oke', 'Y', '2020-06-12 21:23:44', '2020-06-12 21:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `pendakian`
--

DROP TABLE IF EXISTS `pendakian`;
CREATE TABLE IF NOT EXISTS `pendakian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaki` int(11) NOT NULL,
  `gunung` int(11) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `tanggal_keberangkatan` date NOT NULL,
  `hari` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pembayaran` char(1) NOT NULL DEFAULT 'N',
  `bukti_pembayaran` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gunung` (`gunung`),
  KEY `pendaki` (`pendaki`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendakian`
--

INSERT INTO `pendakian` (`id`, `pendaki`, `gunung`, `jumlah_orang`, `tanggal_keberangkatan`, `hari`, `status`, `pembayaran`, `bukti_pembayaran`, `updated_at`, `created_at`) VALUES
(1, 3, 1, 3, '2020-06-15', 4, 'menunggu pembayaran pendaki', 'N', '', '2020-06-12 21:24:41', '2020-06-11 05:53:47'),
(2, 4, 1, 2, '2020-06-27', 4, 'mencari pemandu', 'N', '', '2020-06-11 06:01:37', '2020-06-11 06:01:37'),
(3, 3, 2, 3, '2020-06-26', 3, 'mencari pemandu', 'N', '', '2020-06-11 16:58:46', '2020-06-11 08:19:14'),
(4, 3, 1, 3, '2020-06-16', 4, 'selesai', 'Y', '4.png', '2020-06-11 20:00:20', '2020-06-11 13:18:44'),
(5, 3, 1, 3, '2020-06-26', 3, 'mencari pemandu', 'N', '', '2020-06-13 16:24:31', '2020-06-13 16:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_rekening` varchar(20) DEFAULT NULL,
  `riwayat_penyakit` text,
  `keterangan` text,
  `bank` varchar(20) DEFAULT NULL,
  `foto` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(7) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telepon`, `email`, `no_rekening`, `riwayat_penyakit`, `keterangan`, `bank`, `foto`, `password`, `role`, `updated_at`, `created_at`) VALUES
(1, 'Aldi Rezaldi', '2020-06-23', 'p', 'Jl. BKT', '123456789', 'aldi@yahoo.com', '123456789', 'Tidak ada', 'asdasdasd', 'BCA', '1.jpeg', '827ccb0eea8a706c4c34a16891f84e7b', 'pemandu', '2020-06-13 04:09:05', '0000-00-00 00:00:00'),
(3, 'Hafiizh', '2020-06-03', 'p', 'Jl. 123', '1234', 'hafiizhekom@yahoo.com', NULL, 'Test', '', '', '3.png', '827ccb0eea8a706c4c34a16891f84e7b', 'pendaki', '2020-06-12 19:52:30', '2020-06-09 20:07:37'),
(4, 'Test', '2020-06-01', 'w', 'asdsa', '123213', 'test@yahoo.com', '12321', NULL, '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', 'pendaki', '2020-06-09 20:19:16', '2020-06-09 20:19:16'),
(5, 'Besta', '2020-06-24', 'p', 'asdc', '123123', 'besta@yahoo.com', '12312', NULL, '', '', '5.png', '827ccb0eea8a706c4c34a16891f84e7b', 'pemandu', '2020-06-12 21:00:00', '2020-06-11 12:30:18'),
(6, 'Lili', '2020-06-03', 'w', 'asdasd', '12345', 'lili@yahoo.com', NULL, 'asdas', '', '', '.jpeg', '827ccb0eea8a706c4c34a16891f84e7b', 'pendaki', '2020-06-11 20:08:46', '2020-06-11 20:08:46'),
(7, 'Haha', '2020-05-06', 'p', 'asa', '1231', 'hah@yahoo.com', '12312', NULL, '', '', '.gif', '827ccb0eea8a706c4c34a16891f84e7b', 'pemandu', '2020-06-11 20:47:42', '2020-06-11 20:47:42'),
(8, 'Dian', '2020-06-03', 'w', 'asdasd', '123453242', 'dian@yahoo.com', '1243124123', NULL, NULL, 'BCA', '.png', '827ccb0eea8a706c4c34a16891f84e7b', 'pemandu', '2020-06-12 21:18:00', '2020-06-12 21:18:00'),
(9, 'Ali', '2020-05-14', 'p', 'Jl. Test', '12389', 'ali@yahoo.com', NULL, 'Tidak ada', NULL, NULL, '.png', '827ccb0eea8a706c4c34a16891f84e7b', 'pendaki', '2020-06-16 10:26:41', '2020-06-16 10:26:41');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemanduan`
--
ALTER TABLE `pemanduan`
  ADD CONSTRAINT `pemandu` FOREIGN KEY (`pemandu`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pendakian` FOREIGN KEY (`pendakian`) REFERENCES `pendakian` (`id`);

--
-- Constraints for table `pendakian`
--
ALTER TABLE `pendakian`
  ADD CONSTRAINT `gunung` FOREIGN KEY (`gunung`) REFERENCES `gunung` (`id`),
  ADD CONSTRAINT `pendaki` FOREIGN KEY (`pendaki`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
