-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 06:12 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppdbci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_calonsiswa`
--

CREATE TABLE `tb_calonsiswa` (
  `no_daftar` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki - laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `sekolah_asal` varchar(255) NOT NULL,
  `nope` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_calonsiswa`
--

INSERT INTO `tb_calonsiswa` (`no_daftar`, `nisn`, `nama`, `tgl_lahir`, `jk`, `alamat`, `sekolah_asal`, `nope`, `email`, `foto`) VALUES
(12, 122222222, 'Supriyadi', '2024-10-01', 'Laki - laki', 'baleraja', 'SMPN 1 Gantar', '903894737394', 'leclerc@f1.com', '2.jpg'),
(98, 9090, 'rusdi', '2024-10-05', 'Laki - laki', 'jalan kebenaran', 'SMPN 1 Gantar', '903894737394', 'rusdi@gmail.com', '1000568316-removebg-preview.png'),
(99, 24122007, 'Rhadit Mika Rahil', '2007-12-24', 'Laki - laki', 'Situraja Gantar', 'SMPN 3 Gantar', '0819241323', 'rhdt.rhl@gmail.com', 'WhatsApp_Image_2024-08-22_at_19_03_25_16accef7-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','petugas','siswa','') NOT NULL DEFAULT 'petugas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(2, 'Rhadit Rahil', 'rhdtrhl', '$2y$10$3dnKanJlpeGvBgqIngB1SOZZqxkOVZdqed2GYx6x7M1qsPjeEaBw2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_calonsiswa`
--
ALTER TABLE `tb_calonsiswa`
  ADD PRIMARY KEY (`no_daftar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_calonsiswa`
--
ALTER TABLE `tb_calonsiswa`
  MODIFY `no_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
