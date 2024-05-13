-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2024 pada 07.51
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukpbj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi`
--

CREATE TABLE `evaluasi` (
  `Id_evaluasi_penawaran` int(10) NOT NULL,
  `Id_kode_tender` int(10) DEFAULT NULL,
  `No_Evaluasi` varchar(30) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Metode_evaluasi` varchar(20) DEFAULT NULL,
  `nama_Penyedia` varchar(20) DEFAULT NULL,
  `nilai_penawaran` int(20) DEFAULT NULL,
  `kualifikasi` varchar(20) DEFAULT NULL,
  `administrasi` varchar(20) DEFAULT NULL,
  `teknis` varchar(20) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `Keterangan_lain` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `klarifikasi`
--

CREATE TABLE `klarifikasi` (
  `Id_klarifikasi` int(10) NOT NULL,
  `Id_pembuktian` int(10) DEFAULT NULL,
  `No_Klarifikasi` varchar(30) DEFAULT NULL,
  `Peralatan` varchar(20) DEFAULT NULL,
  `Tenaga_ahli` varchar(20) DEFAULT NULL,
  `Keterangan_lain` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `Id_kode_tender` int(10) NOT NULL,
  `Id_pokja` int(10) DEFAULT NULL,
  `Nama_tender` varchar(100) DEFAULT NULL,
  `Nilai_Pagu` int(30) DEFAULT NULL,
  `Kode_RUP` int(15) DEFAULT NULL,
  `Nilai_HPS` int(20) DEFAULT NULL,
  `Kode_anggaran` int(15) DEFAULT NULL,
  `Metode_tender` varchar(20) DEFAULT NULL,
  `Nama_PPK` varchar(50) DEFAULT NULL,
  `NIP_PPK` int(20) DEFAULT NULL,
  `No_SK` varchar(20) DEFAULT NULL,
  `Unit_kerja` varchar(50) DEFAULT NULL,
  `Tgl_permohonan` date DEFAULT NULL,
  `Tgl_penugasan` date DEFAULT NULL,
  `Pokja_pemilihan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjelasan`
--

CREATE TABLE `penjelasan` (
  `Id_penjelasan` int(10) NOT NULL,
  `Id_kode_tender` int(10) DEFAULT NULL,
  `No_Penjelasan` varchar(30) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Nama_penyedia` varchar(15) DEFAULT NULL,
  `Pertanyaaan` varchar(200) DEFAULT NULL,
  `jawaban` varchar(200) DEFAULT NULL,
  `Keterangan_lain` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokjamil`
--

CREATE TABLE `pokjamil` (
  `Id_pokja` int(10) NOT NULL,
  `User_ID` varchar(10) DEFAULT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `NIK` int(15) DEFAULT NULL,
  `NIP_Pokjamil` int(20) DEFAULT NULL,
  `No_telp` int(15) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `No_sertifikat` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlogin`
--

CREATE TABLE `userlogin` (
  `id_user` int(10) NOT NULL,
  `id_pokja` int(10) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Level` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`Id_evaluasi_penawaran`);

--
-- Indeks untuk tabel `klarifikasi`
--
ALTER TABLE `klarifikasi`
  ADD PRIMARY KEY (`Id_klarifikasi`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`Id_kode_tender`);

--
-- Indeks untuk tabel `penjelasan`
--
ALTER TABLE `penjelasan`
  ADD PRIMARY KEY (`Id_penjelasan`);

--
-- Indeks untuk tabel `pokjamil`
--
ALTER TABLE `pokjamil`
  ADD PRIMARY KEY (`Id_pokja`);

--
-- Indeks untuk tabel `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
