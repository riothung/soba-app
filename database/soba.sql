-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 11:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soba`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kk`
--

CREATE TABLE `anggota_kk` (
  `id` int(100) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `nik` int(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `no_kk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota_kk`
--

INSERT INTO `anggota_kk` (`id`, `nama_lengkap`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `jenis_pekerjaan`, `no_kk`) VALUES
(43, 'pqpweoqw', 2394242, 'Perempuan', 'axzasdas', '2023-02-16', 'Protestan', 'SD dan Sederajat', 'Tidak Bekerja', 89999),
(44, 'Yongki', 283743284, 'Laki-laki', 'akasjdsa', '2023-02-17', 'Buddha', 'SMP dan Sederajat', 'Buruh Bangunan', 12345),
(45, 'Hendrik', 23498234, 'Perempuan', 'sadkashdja', '2023-02-17', 'Protestan', 'SMP dan Sederajat', 'Pedagang Kecil', 12345),
(50, 'Edis', 23498273, 'Perempuan', 'askjdaskd', '2023-02-18', 'Protestan', 'SMP dan Sederajat', 'Tidak Bekerja', 12345),
(51, 'Agus', 23498273, 'Laki-laki', 'askjdaskd', '2023-02-18', 'Protestan', 'SD dan Sederajat', 'Buruh Bangunan', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `no_kk` int(100) NOT NULL,
  `kepala_keluarga` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt_rw` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `dusun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`no_kk`, `kepala_keluarga`, `alamat`, `rt_rw`, `kode_pos`, `dusun`) VALUES
(12345, 'Andi NTT', 'Soba', '', 12345, 3),
(89999, 'ARDS Yoksan', 'Soba', '06/02', 7896, 0),
(23473284, 'Abe', 'Kupang', '12/02', 2138, 4),
(213813891, 'Avila', 'Kupang', '05/02', 21381, 4),
(234932842, 'Yohan', 'soba', '02/01', 3294, 4),
(923492384, 'bayu', 'soba', '01/01', 9234, 0),
(2147483647, 'Andika', 'soba', '06/02', 234923, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id`, `name`, `level`) VALUES
('admin', 'admin', 1, 'Admin', 'admin'),
('rio', 'adminbayangan', 2, 'Rio', 'adminbayangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
