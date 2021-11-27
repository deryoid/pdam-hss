-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Nov 2021 pada 06.15
-- Versi server: 5.7.24
-- Versi PHP: 7.4.12

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
-- Struktur dari tabel `maintance`
--

CREATE TABLE `maintance` (
  `id_maintance` int(11) NOT NULL,
  `id_sektoratm` int(11) NOT NULL,
  `status_maintance` varchar(75) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tgl_maintance` varchar(150) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_pemeliharaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maintance`
--

INSERT INTO `maintance` (`id_maintance`, `id_sektoratm`, `status_maintance`, `id_petugas`, `tgl_maintance`, `keterangan`, `status_pemeliharaan`) VALUES
(9, 5, 'Preventive Maintenance', 4, '2021-08-20', '<p>1. Pemeliharan Mesin DLL</p><p>2. Kebersihan ATM&nbsp;</p>', 'Pemeliharaan Selesai');

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
(7, '77236662789', '637102221210008', 'Ummi Salamah', 'Sungai Raya', 'Jl. Pahlawan No.33, Sungai Raya, Kab. Kandangan', 2, '-', 'Aktif', 'Belum Dipasang', '18660.jpeg', '2021-10-27', NULL, NULL, NULL),
(8, '77236662710', '637123993299910', 'Syahrani', 'Kandangan', 'Jl. Budi Bakti, Amawang Kiri Muka, Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71213', 3, 'https://www.google.co.id/maps/dir//Jl.+Budi+Bakti,+Amawang+Kiri+Muka,+Kandangan,+Kabupaten+Hulu+Sungai+Selatan,+Kalimantan+Selatan+71213/@-2.7499064,115.2067415,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2de50aebc2a83677:0x6c03c6e5bdb96ce4!2m2!1d115.2540572!2d-2.777668', 'Aktif', 'Dipasang', '36720.jpg', '2021-11-27', NULL, NULL, NULL),
(9, '7723323111', '6346011107960002', 'Ali', 'Sungai Raya', '-', 1, '111', 'Tidak Aktif', 'Belum Dipasang', '', '2021-11-26', 'Dicabut', '14590.jpg', '2021-11-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `id_sektoratm` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL,
  `foto_sebelum` varchar(255) DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `foto_sesudah` varchar(255) DEFAULT NULL,
  `status_perbaikan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `id_sektoratm`, `id_petugas`, `tanggal_perbaikan`, `foto_sebelum`, `tanggal_selesai`, `foto_sesudah`, `status_perbaikan`) VALUES
(5, 5, 4, '2021-08-18', '25636.png', '2021-08-19', '61042.jpeg', 'Sedang Diperbaiki'),
(6, 4, 3, '2021-08-18', '46947.jpeg', '2021-08-19', '77956.jpeg', 'Sedang Diperbaiki'),
(7, 5, 3, '2021-08-20', NULL, NULL, NULL, 'Sedang Diperbaiki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_petugas` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `maintance`
--
ALTER TABLE `maintance`
  ADD PRIMARY KEY (`id_maintance`),
  ADD KEY `kode_barang` (`id_sektoratm`),
  ADD KEY `kode_barang_2` (`id_sektoratm`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_golongan` (`id_golongan`);

--
-- Indeks untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_sektoratm` (`id_sektoratm`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `maintance`
--
ALTER TABLE `maintance`
  MODIFY `id_maintance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
