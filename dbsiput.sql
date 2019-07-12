-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 06:02 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsiput`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis_nip` int(11) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlpn` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `jurusan` enum('kecantikan','tataboga','perhotelan','tatabusana','mi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis_nip`, `nama_anggota`, `username`, `password`, `alamat`, `no_tlpn`, `foto`, `tgl_lahir`, `jk`, `jurusan`) VALUES
(9, 'Badrul', '', '56018323b921dd2c5444', 'alamat', '0490234920', '', '0000-00-00', 'L', ''),
(34, 'Agus', '', '56018323b921dd2c5444', 'alamat', '094818418', '', '0000-00-00', 'L', ''),
(45, 'Rana', '', '56018323b921dd2c5444', 'alamat', '02490240204', '', '0000-00-00', 'L', ''),
(45454, 'dadan', 'dani', '0a3b3d4831f7cf573ea1', 'Jl. Tluki 1', '098384662334', '', '1998-02-03', 'P', 'perhotelan'),
(45464, 'ninda', 'ninda', 'b2e24957744c51aeeda1', 'Semangut', '082246524086', '', '1998-05-02', 'P', 'tataboga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kd_buku` varchar(200) NOT NULL,
  `id_kategori` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(150) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `thn_terbit` varchar(20) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('rak 1','rak 2','rak 3') NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`kd_buku`, `id_kategori`, `judul`, `pengarang`, `penerbit`, `thn_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
('00003', 'K002', 'Kemanusiaan', 'Priliyandi', 'Media ', '2009', '', 2, '', '2019-07-12'),
('10', 'K001', 'Basis Data', 'Basis', 'Data', '2017', '3536728394', 1, 'rak 1', '2019-01-07'),
('11', 'K001', 'CSS dan HTML', 'coding pinter', 'server', '2019', '55362882', 5, 'rak 2', '2018-04-03'),
('12', 'K001', 'SIM', 'sistem informasi', 'informasi', '2018', '45536745433', 2, 'rak 2', '2019-03-13'),
('13', 'K001', 'Logika dan Algoritma', 'Basis', 'Data', '2004', '3434335545', 3, 'rak 1', '2019-01-07'),
('278', 'K002', 'Diatas Langit', 'Reza', 'Utama Mandiri', '2009', '', 3, '', '2019-07-02'),
('52', 'K002', 'Insan Mandiri', 'Sukardi', 'Betharia', '2010', '', 2, '', '2019-07-09'),
('B002', 'K001', 'Sejarah', 'lama', 'dahulu', '2016', '554734553', 1, 'rak 1', '2019-03-05'),
('B003', 'K001', 'Biologi', 'handayani', 'erlangga', '2019', '554663783', 0, 'rak 2', '2019-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detpeminjaman`
--

CREATE TABLE `tb_detpeminjaman` (
  `kd_peminjaman` varchar(100) NOT NULL,
  `kd_buku` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
('K001', 'Pendidikan'),
('K002', 'Sosial'),
('K003', 'Agama'),
('K004', 'Budaya'),
('K005', 'Jasmani'),
('K006', 'seni');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `kd_pinjam` varchar(100) NOT NULL,
  `kd_buku` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `judul_2` varchar(200) NOT NULL,
  `nis_nip` int(11) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`kd_pinjam`, `kd_buku`, `judul`, `judul_2`, `nis_nip`, `nama_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('T020', '', 'Kemanusiaan', '', 9, 'Badrul', '12-07-2019', '26-07-19', 'pinjam'),
('T021', '', 'Kemanusiaan', '', 34, 'Agus', '12-07-2019', '19-07-2019', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `kd_petugas` varchar(100) NOT NULL,
  `nip` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_petugas` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `no_tlpn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`kd_petugas`, `nip`, `username`, `password`, `nama_petugas`, `foto`, `no_tlpn`) VALUES
('P002', 45653, 'miftah9398', '66dd9ad231c7eed5852c', 'miftah', 'admin1.png', '2147483647'),
('P003', 2333, 'admin', 'admin', 'admin', 'work.jpg', '942042424949'),
('P004', 423423, 'priliyandi', 'priliyandi', 'Priliyandi', 'IMG20180620135903.jp', '9124891488');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kd` int(9) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis_nip`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kd_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`),
  ADD KEY `id_kategori_3` (`id_kategori`);

--
-- Indexes for table `tb_detpeminjaman`
--
ALTER TABLE `tb_detpeminjaman`
  ADD PRIMARY KEY (`kd_peminjaman`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`kd_pinjam`),
  ADD KEY `nis` (`nis_nip`),
  ADD KEY `kd_buku` (`kd_buku`),
  ADD KEY `nis_2` (`nis_nip`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`kd_petugas`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kd`),
  ADD KEY `nis` (`nis`),
  ADD KEY `nis_2` (`nis`),
  ADD KEY `nis_3` (`nis`),
  ADD KEY `nis_4` (`nis`),
  ADD KEY `nis_5` (`nis`),
  ADD KEY `nis_6` (`nis`),
  ADD KEY `nis_7` (`nis`),
  ADD KEY `nis_8` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `kd` int(9) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_anggota` (`nis_nip`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
