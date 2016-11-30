-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30 Nov 2016 pada 02.46
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siswasmkn2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` varchar(30) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`, `keterangan`) VALUES
('002', 'KULTUR JARINGAN', ''),
('1', 'TPHP', ''),
('2', 'PERTANIAN', ''),
('3', 'OTOMOTIF', ''),
('4', 'PANGAN', ''),
('5', 'KIMIA', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` int(15) NOT NULL,
  `nisn` int(50) NOT NULL,
  `nama_siswa` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_orang_tua` varchar(50) NOT NULL,
  `sekolah_asal` varchar(150) NOT NULL,
  `nomor_peserta` varchar(100) NOT NULL,
  `tahun_lulus` date NOT NULL,
  `kepala_sekolah` varchar(100) NOT NULL,
  `nomor_ijazah` varchar(200) NOT NULL,
  `nilai_rata_rata` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nisn`, `nama_siswa`, `alamat`, `no_telp`, `tempat_lahir`, `tgl_lahir`, `nama_orang_tua`, `sekolah_asal`, `nomor_peserta`, `tahun_lulus`, `kepala_sekolah`, `nomor_ijazah`, `nilai_rata_rata`, `nama_jurusan`, `keterangan`, `foto`, `guru`) VALUES
(12346, 0, 'Khairunisa', 'Tangerang Selatan, banten', '021937728', 'Bogor', '1991-09-27', 'Anisa', 'SMK Negeri  2 Kota Tangerang', '4-10-30-02-002-056-3', '2016-12-01', 'Drs. H. Purwanto Adi Tjahjono', 'No. DN-30 Mk 0020523', '9.90', 'TPHP', 'Rajin Belajar\r\nrajin mengaji', 'khairunisa.jpg', 'admin'),
(12347, 21233, 'Rahayu Pratiwi', '', '0219233747', 'Tangerang', '1990-10-28', 'Mulia', 'SMK Negeri  2 Kota Tangerang', '4-10-30-02-002-056-4', '2016-12-31', 'Drs. H. Purwanto Adi Tjahjono', 'No. DN-30 Mk 0020524', '9.50', 'TPHP', '', 'ayu.jpg', 'Erlang Surya'),
(542312, 1231381271, 'Putri Azahra', 'pamulang', '02384748', 'Tangerang', '1997-10-27', 'Tini', 'SMK Negeri  2 Kota Tangerang', '4-10-30-02-002-055-8', '2013-09-01', 'Drs. H. Purwanto Adi Tjahjono', 'No. DN-30 Mk 0020544', '8.50', 'TPHP', 'belajar', '', 'Erlang Surya'),
(20132138, 1231381274, 'Bimbi', 'Kalideres jakarta barat\r\nJakarta Selatan', '02384748', 'Pamulang', '1989-09-23', 'Ramdani', 'SMK Negeri  2 Kota Tangerang', '4-10-30-02-002-056-8', '2011-09-30', 'Drs. H. Purwanto Adi Tjahjono', 'No. DN-30 Mk 0020528', '8.50', 'KULTUR JARINGAN', 'tauran\r\nnilai merah', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('admin','guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin 1', 'admin'),
(2, 'erlang', '622c84b69ee448a07d80de5cbeb13e3d', 'Erlang Surya', 'guru'),
(3, '2011140204', 'a9200c1823cc336d9f59881d1d3a7cb9', 'Ingka', 'admin'),
(5, 'ikha', '45eeab56b6b9a205cd497d64a7bde06e', 'Maratus Solihkah', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`,`nomor_ijazah`,`nomor_peserta`),
  ADD UNIQUE KEY `nomor_peserta` (`nomor_peserta`),
  ADD UNIQUE KEY `nomor_ijazah` (`nomor_ijazah`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
