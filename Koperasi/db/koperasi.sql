-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 06:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nik` int(30) NOT NULL,
  `jk` enum('laki laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `saldo` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_lengkap`, `nik`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `agama`, `no_hp`, `email`, `pekerjaan`, `saldo`) VALUES
('A001', 'Agung Prabowo', 434321, 'laki laki', 'Bekasi', '2000-08-08', 'Bekasii', 'Islam', '08123456789', 'agung@gmail.com', 'nganggur', 140000),
('A002', 'Towboat', 434322, 'laki laki', 'Karawang', '1999-02-23', 'Karawang', 'Islam', '081234567892', 'towboat@gmail.com', 'Mahasiswa', 100000),
('A003', 'Lutfi', 4343223, 'laki laki', 'Bekasi', '2000-01-11', 'Bekasi', 'Islam', '081234567893', 'lutfi@gmail.com', 'nganggur', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` varchar(30) NOT NULL,
  `tgl_angsuran` date NOT NULL,
  `id_pinjaman` varchar(30) NOT NULL,
  `id_anggota` varchar(20) NOT NULL,
  `ke` varchar(10) NOT NULL,
  `nominal` double NOT NULL,
  `status` enum('lunas','belum lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `tgl_angsuran`, `id_pinjaman`, `id_anggota`, `ke`, `nominal`, `status`) VALUES
('TRX001', '2020-05-06', 'P001', 'A001', '1', 262500, 'belum lunas'),
('TRX002', '2020-05-15', 'P001', 'A001', '2', 262500, 'belum lunas'),
('TRX003', '2020-05-11', 'P002', 'A001', '1', 47208.333333333336, 'belum lunas'),
('TRX004', '2020-05-11', 'P001', 'A001', '3', 262500, 'belum lunas'),
('TRX005', '2020-05-12', 'P002', 'A001', '2', 47208.333333333336, 'belum lunas'),
('TRX006', '2020-05-18', 'P001', 'A001', '4', 262500, 'belum lunas'),
('TRX007', '2020-05-05', 'P001', 'A001', '5', 262500, 'belum lunas'),
('TRX008', '2020-05-03', 'P002', 'A001', '3', 47208.333333333336, 'belum lunas');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `id_jenis_simpanan` varchar(30) NOT NULL,
  `nama_simpanan` varchar(50) NOT NULL,
  `jumlah` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`id_jenis_simpanan`, `nama_simpanan`, `jumlah`) VALUES
('JS1', 'Simpanan Pokok', 50000),
('JS2', 'Simpanan Wajib', 30000),
('JS3', 'Simpanan Sukarela', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_pengambilan` varchar(30) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengambilan`
--

INSERT INTO `pengambilan` (`id_pengambilan`, `tgl_ambil`, `id_anggota`, `jumlah`) VALUES
('PN001', '2020-05-05', 'A001', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('laki laki','perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `jk`, `email`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `alamat`) VALUES
('PGS001', 'Mawang', 'laki laki', 'ucok@gmail.com', '081234567893', 'Merauke', '1995-05-08', 'bau-bau');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(30) NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `lama` int(20) NOT NULL,
  `bunga` float(50,0) NOT NULL,
  `total` int(30) NOT NULL,
  `angsuran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `tgl_pinjaman`, `id_anggota`, `jumlah`, `lama`, `bunga`, `total`, `angsuran`) VALUES
('P001', '2020-05-08', 'A001', 5000000, 20, 5, 5250000, 262500),
('P002', '2020-05-08', 'A001', 550000, 12, 3, 566500, 47208.333333333336);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` varchar(30) NOT NULL,
  `tgl_simpan` date NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `id_jenis` varchar(20) NOT NULL,
  `jumlah` float(32,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `tgl_simpan`, `id_anggota`, `id_jenis`, `jumlah`) VALUES
('S001', '2020-05-04', 'A001', 'JS1', 50000),
('S002', '2020-05-29', 'A002', 'JS2', 30000),
('S003', '2020-05-01', 'A001', 'JS3', 100000),
('S004', '2020-05-05', 'A001', 'JS3', 100000),
('S005', '2020-05-23', 'A002', 'JS3', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hak` enum('admin','anggota','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `hak`) VALUES
('A001', 'Agung Prabowo', '123', 'anggota'),
('A002', 'Towboat', '123', 'anggota'),
('A003', 'Lutfi', '123', 'anggota'),
('admin', 'Marjo Marjono', 'admin', 'admin'),
('PGS001', 'Mawang', '123', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  ADD PRIMARY KEY (`id_jenis_simpanan`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_pengambilan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
