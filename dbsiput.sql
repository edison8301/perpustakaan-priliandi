-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2019 pada 06.17
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `tb_anggota`
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
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis_nip`, `nama_anggota`, `username`, `password`, `alamat`, `no_tlpn`, `foto`, `tgl_lahir`, `jk`, `jurusan`) VALUES
(45454, 'dani', 'dani', '3ef06256b42a1fe6ddf7', 'Jl. Tluki 1', '098384662334', '', '1998-02-03', 'P', 'perhotelan'),
(45464, 'ninda', 'ninda', 'b2e24957744c51aeeda1', 'Semangut', '082246524086', '', '1998-05-02', 'P', 'tataboga'),
(676545, 'vina', '676545', 'ab3615079222f64edd8d', 'Klaten', '087366255362', '', '1999-05-08', 'P', 'kecantikan'),
(2343454, 'galih', 'gading', 'gading123', '', '083552663828', '64-2.jpg', '1998-07-02', 'L', 'perhotelan'),
(5654546, 'fani', 'fani', 'fani123', '', '2147483647', '2.jpg', '2019-04-09', 'P', 'kecantikan'),
(16029398, 'ilmi', '16029398', 'b1a103cf4b5fe6a80975', '', '086255366272', 'il.jpg', '1998-03-08', 'L', 'perhotelan'),
(16029937, 'dayat', '16029937', '7aefdc67c85506f8827a', '', '048365466223', '64-1.jpg', '2005-01-03', 'L', 'perhotelan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
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
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`kd_buku`, `id_kategori`, `judul`, `pengarang`, `penerbit`, `thn_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
('10', 'K001', 'Basis Data', 'Basis', 'Data', '2017', '3536728394', 1, 'rak 1', '2019-01-07'),
('11', 'K001', 'CSS dan HTML', 'coding pinter', 'server', '2019', '55362882', 5, 'rak 2', '2018-04-03'),
('12', 'K001', 'SIM', 'sistem informasi', 'informasi', '2018', '45536745433', 2, 'rak 2', '2019-03-13'),
('13', 'K001', 'Logika dan Algoritma', 'Basis', 'Data', '2004', '3434335545', 3, 'rak 1', '2019-01-07'),
('B002', 'K001', 'Sejarah', 'lama', 'dahulu', '2016', '554734553', 1, 'rak 1', '2019-03-05'),
('B003', 'K001', 'Biologi', 'handayani', 'erlangga', '2019', '554663783', 0, 'rak 2', '2019-03-20'),
('K010', 'K001', 'Bahasa Inggris II', 'people', 'master', '2018', '1232-1222-311', 5, 'rak 1', '2019-05-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detpeminjaman`
--

CREATE TABLE `tb_detpeminjaman` (
  `kd_peminjaman` varchar(100) NOT NULL,
  `kd_buku` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
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
-- Struktur dari tabel `tb_peminjaman`
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
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`kd_pinjam`, `kd_buku`, `judul`, `judul_2`, `nis_nip`, `nama_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('T017', '', 'Biologi', '', 45454, 'dani', '15-05-2019', '22-05-2019', 'pinjam'),
('T018', '', 'Bahasa Inggris II', '', 16029398, 'ilmi', '15-05-2019', '22-05-2019', 'pinjam'),
('T019', '', 'Biologi', '', 5654546, 'fani', '18-05-2019', '25-05-2019', 'pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
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
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`kd_petugas`, `nip`, `username`, `password`, `nama_petugas`, `foto`, `no_tlpn`) VALUES
('P001', 1233423, 'admin1', 'admin345', 'parman', '2.jpg', '038836254444'),
('P002', 45653, 'miftah9398', '66dd9ad231c7eed5852c', 'miftah', 'admin1.png', '2147483647');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
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
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis_nip`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kd_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`),
  ADD KEY `id_kategori_3` (`id_kategori`);

--
-- Indeks untuk tabel `tb_detpeminjaman`
--
ALTER TABLE `tb_detpeminjaman`
  ADD PRIMARY KEY (`kd_peminjaman`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`kd_pinjam`),
  ADD KEY `nis` (`nis_nip`),
  ADD KEY `kd_buku` (`kd_buku`),
  ADD KEY `nis_2` (`nis_nip`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`kd_petugas`);

--
-- Indeks untuk tabel `tb_transaksi`
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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `kd` int(9) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_anggota` (`nis_nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
