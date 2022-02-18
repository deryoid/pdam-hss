-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 05 Feb 2022 pada 02.47
-- Versi server: 5.7.34
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_pdamhss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganti_meter`
--

CREATE TABLE `ganti_meter` (
  `id_gm` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tgl_permintaan` varchar(20) NOT NULL,
  `link_gmap` text NOT NULL,
  `nama_teknisi` varchar(75) NOT NULL,
  `tgl_perbaikan` varchar(20) NOT NULL,
  `biaya` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ganti_meter`
--

INSERT INTO `ganti_meter` (`id_gm`, `nama`, `tgl_permintaan`, `link_gmap`, `nama_teknisi`, `tgl_perbaikan`, `biaya`) VALUES
(1, 'Syamsuri', '2022-02-04', 'https://www.google.com/maps/@-5.1642368,119.455744,12z', 'Ijul', '2022-02-04', 'Rp. 400.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'SOSIAL'),
(2, 'NON NIAGA'),
(3, 'NIAGA'),
(4, 'INDUSTRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebocoran`
--

CREATE TABLE `kebocoran` (
  `id_kebocoran` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tgl_permintaan` varchar(20) NOT NULL,
  `link_gmap` text NOT NULL,
  `nama_teknisi` varchar(75) NOT NULL,
  `letak_kebocoran` varchar(150) NOT NULL,
  `tgl_perbaikan` varchar(20) NOT NULL,
  `biaya` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kebocoran`
--

INSERT INTO `kebocoran` (`id_kebocoran`, `nama`, `tgl_permintaan`, `link_gmap`, `nama_teknisi`, `letak_kebocoran`, `tgl_perbaikan`, `biaya`) VALUES
(2, 'Nugraha', '2022-02-04', 'https://www.google.com/maps/@-5.1642368,119.455744,12z', 'Zulkifli', 'Pipa Samping', '2022-02-04', 'Rp. 400.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `no_pelanggan` varchar(150) NOT NULL,
  `nik` varchar(150) NOT NULL,
  `nama_pelanggan` varchar(150) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `lokasi_rumah` varchar(255) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `link_gmap` text NOT NULL,
  `status` varchar(75) NOT NULL,
  `status_pasang` varchar(150) DEFAULT NULL,
  `bukti_pasang` varchar(255) DEFAULT NULL,
  `tgl_pemasangan` varchar(100) DEFAULT NULL,
  `status_cabut` varchar(100) DEFAULT NULL,
  `bukti_cabut` varchar(255) DEFAULT NULL,
  `tgl_pencabutan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `no_pelanggan`, `nik`, `nama_pelanggan`, `kecamatan`, `lokasi_rumah`, `id_golongan`, `link_gmap`, `status`, `status_pasang`, `bukti_pasang`, `tgl_pemasangan`, `status_cabut`, `bukti_cabut`, `tgl_pencabutan`) VALUES
(10, '070430', '630605000041235', 'MAHDIANOOR', 'Telaga Langsat', 'Desa Mandala RT. 02 ', 2, 'https://goo.gl/maps/DggfJReYn9Xjqg3GA', 'Tidak Aktif', 'Belum Dipasang', '', '2022-01-03', 'Dicabut', '74514.jpeg', '2022-01-21'),
(11, '070123', '63060800007412389', 'JURU PENGAIRAN AIR', 'Telaga Langsat', 'Desa Telaga Langsat RT. 04', 3, 'https://goo.gl/maps/ZFkU7mJFBueGA9xG6', 'Tidak Aktif', 'Belum Dipasang', '', '2022-01-03', 'Dicabut', '23139.jpeg', '2022-01-24'),
(12, '070642', '63060501020789520000', 'KURBAYAH', 'Telaga Langsat', 'Desa Ambutun RT. 01', 4, 'https://goo.gl/maps/2fHmXqAFPqyeuBBS8', 'Aktif', 'Dipasang', '61404.jpeg', '2022-01-11', NULL, NULL, NULL),
(13, '070901', '6306040800079620004', 'SITI ASPINAH', 'Telaga Langsat', 'Desa Pandulangan/Longawang RT. 02', 1, 'https://goo.gl/maps/eqCF3K1CtTrBRams5', 'Aktif', 'Dipasang', '62938.jpeg', '2022-01-20', NULL, NULL, NULL),
(15, '070906', '6306045285487999', 'MUHAMMAD ANDRIAN', 'Telaga Langsat', 'Desa Telaga Langsat RT. 06', 2, '111', 'Tidak Aktif', 'Belum Dipasang', '3806.jpeg', '2022-01-18', 'Dicabut', '92299.jpeg', '2022-01-24'),
(16, '010511', '650708901478925000', 'KANTOR PUSKESMAS KANDANGAN', 'Kandangan', 'Jl. Aluh Idut No. 11', 3, '666', 'Aktif', 'Dipasang', '88768.jpeg', '2022-01-24', NULL, NULL, NULL),
(17, '010208', '63060500012478111', 'MUHAMMAD ZULKIFLI', 'Kandangan', 'Jl. Aluh Idut No. 51', 2, 'https://goo.gl/maps/sSL5jD6wJQcEJHhC9', 'Tidak Aktif', 'Belum Dipasang', '61357.jpeg', '2022-01-19', 'Dicabut', '78592.jpeg', '2022-01-21'),
(18, '010562', '63050400005897000', 'DEWI YUNITA', 'Kandangan', 'Jl. Panglima Batur No. 44', 4, '', 'Aktif', 'Dipasang', '69903.jpeg', '2022-01-24', NULL, NULL, NULL),
(19, '010807', '6505047822220026999', 'NOOR HIKMAH', 'Kandangan', 'Kandangan Hulu RT. 04 No. 49', 2, '', 'Tidak Aktif', 'Belum Dipasang', NULL, NULL, 'Dicabut', '25582.jpeg', '2022-01-18'),
(20, '012361', '6406050000812155', 'FITRIYADI', 'Kandangan', 'Jl. Pahlawan No. 30', 2, '', 'Aktif', 'Dipasang', '55491.jpeg', '2022-01-24', NULL, NULL, NULL),
(21, '010506', '6302010000154512564', 'ABDUL KADIR', 'Kandangan', 'Jl. H.M Yusi RT. 03 No. 10', 2, '', 'Aktif', 'Dipasang', '45353.jpeg', '2022-01-21', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(3, 'teknisi1', 'e21394aaeee10f917f581054d24b031f', 'Teknisi'),
(4, 'teknisi2', 'e21394aaeee10f917f581054d24b031f', 'Teknisi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ganti_meter`
--
ALTER TABLE `ganti_meter`
  ADD PRIMARY KEY (`id_gm`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `kebocoran`
--
ALTER TABLE `kebocoran`
  ADD PRIMARY KEY (`id_kebocoran`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_golongan` (`id_golongan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ganti_meter`
--
ALTER TABLE `ganti_meter`
  MODIFY `id_gm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kebocoran`
--
ALTER TABLE `kebocoran`
  MODIFY `id_kebocoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
