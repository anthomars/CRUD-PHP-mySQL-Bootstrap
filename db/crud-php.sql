-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 10:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(4, 'ADMIN', 'admin', 'anthomars.am@gmail.com', '$2y$10$R6Z8v.PqsUScv/4BX8qkT.OyuZU2p2vigJOfNw5zJ3sAmyhDwbhY6', '1'),
(6, 'OPERATOR BARANG', 'operator_barang', 'nto.ganz8@gmail.com', '$2y$10$O5ua3rd.jIbrrF.W1PWeF.lTvIKJkQEPiskh.YFC3Jj9NKT.NIgtW', '2'),
(7, 'OPERATOR MAHASISWA', 'operator_mhs', 'mars@gmail.com', '$2y$10$lomjb0e48uTGdaYeZydapOhM8.kiCneIelqXSb1nP6z2iQjT4B2Z.', '3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `tanggal`) VALUES
(1, 'buku tulis', '10', '50000', '2022-06-28 01:55:58'),
(2, 'Pensil HB', '5', '10000', '2022-08-06 12:02:41'),
(7, 'Tip Ex', '10', '250000', '2022-08-07 13:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `email`, `foto`) VALUES
(1, 'Anthomars', 'Teknik Informatika', 'Laki-Laki', '085156467044', 'anthomars,am@gmail.com', 'anto.jpg'),
(2, 'Adam', 'Teknik Informatika', 'Laki-Laki', '085156467088', 'adam,am@gmail.com', 'anto.jpg'),
(3, 'Budi', 'Teknik Informatika', 'Laki-Laki', '0839393085', 'budi@gmail.com', 'budi.jpg'),
(6, 'Yoko', 'Teknik Mesin', 'Laki-Laki', '087766', 'yoko@gmail.com', '62eff3bdde1f4.jpg'),
(7, 'Yadi', 'Teknik Mesin', 'Laki-Laki', '08923398', 'yadi@gmail.com', '62eff63295c62.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
