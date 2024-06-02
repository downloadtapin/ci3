-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2024 pada 10.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nama_database`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `evaluasi`
--

INSERT INTO `evaluasi` (`Id_evaluasi_penawaran`, `Id_kode_tender`, `No_Evaluasi`, `Tanggal`, `Metode_evaluasi`, `nama_Penyedia`, `nilai_penawaran`, `kualifikasi`, `administrasi`, `teknis`, `harga`, `Keterangan_lain`) VALUES
(2, 4, 'EVAL002', '2024-05-11', 'Metode B', 'Penyedia B', 1500000, '0', '1', '1', '0', 'Keterangan 2'),
(3, 3, 'EVAL003', '2024-05-12', 'Metode C', 'Penyedia C', 2000000, '1', '1', '0', '1', 'Keterangan 3'),
(4, 4, 'EVAL004', '2024-05-13', 'Metode A', 'Penyedia D', 1200000, '0', '0', '1', '1', 'Keterangan 4'),
(5, 5, 'EVAL005', '2024-05-14', 'Metode B', 'Penyedia E', 1800000, '1', '0', '0', '1', 'Keterangan 5'),
(12, 15, '2222222222', '2024-06-03', '12312', '1231', 12312, '1', '1', '1', '1', '12312'),
(13, 15, 'q3123123', '2024-06-02', '123123', '12312313123', 123123, '1', '1', NULL, NULL, '12312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klarifikasi`
--

CREATE TABLE `klarifikasi` (
  `Id_klarifikasi` int(10) NOT NULL,
  `Id_evaluasi_penawaran` int(10) DEFAULT NULL,
  `No_Klarifikasi` varchar(30) DEFAULT NULL,
  `Peralatan` varchar(20) DEFAULT NULL,
  `Tenaga_ahli` varchar(20) DEFAULT NULL,
  `Keterangan_lain` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `klarifikasi`
--

INSERT INTO `klarifikasi` (`Id_klarifikasi`, `Id_evaluasi_penawaran`, `No_Klarifikasi`, `Peralatan`, `Tenaga_ahli`, `Keterangan_lain`) VALUES
(1, 5, 'KLR-001', 'Pompa Air', 'Ahmad', 'Klarifikasi pertama'),
(2, 5, 'KLR-002', 'Generator', 'Budi', 'Klarifikasi kedua'),
(3, 3, 'KLR-003', 'Alat Pengukur', 'Charlie', 'Klarifikasi ketiga'),
(4, 4, 'KLR-004', 'Mesin Las', 'David', 'Klarifikasi keempat'),
(5, 5, 'KLR-005', 'Komputer', 'Eva', 'Klarifikasi kelima'),
(6, 5, 'KLR-006', 'Printer', 'Fathur', 'Klarifikasi keenam'),
(7, 5, 'KLR-007', 'Laptop', 'Gita', 'Klarifikasi ketujuh'),
(8, 5, 'KLR-008', 'Kamera', 'Hendra', 'Klarifikasi kedelapan'),
(9, 5, 'KLR-009', 'Scanner', 'Ika', 'Klarifikasi kesembilan'),
(10, 5, 'KLR-010', 'Telepon', 'Joko', 'Klarifikasi kesepuluh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_tabel`
--

CREATE TABLE `nama_tabel` (
  `Id_Paket` int(11) NOT NULL,
  `Id_Penjelasan` int(11) DEFAULT NULL,
  `Id_Evaluasi_Penawaran` int(11) DEFAULT NULL,
  `Id_Pembuktian` int(11) DEFAULT NULL,
  `Id_Klarifikasi` int(11) DEFAULT NULL,
  `Id_Negosiasi` int(11) DEFAULT NULL,
  `Id_Pemilihan` int(11) DEFAULT NULL,
  `Pertanyaan_Sanggah` varchar(255) DEFAULT NULL,
  `Jawaban_Sanggah` varchar(255) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Cek_List` varchar(50) DEFAULT NULL,
  `Keterangan_Lain` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `negosiasi`
--

CREATE TABLE `negosiasi` (
  `Id_negosiasi` int(10) NOT NULL,
  `Id_evaluasi_penawaran` int(10) DEFAULT NULL,
  `No_Negosiasi` varchar(30) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `harga_penawaran` int(20) DEFAULT NULL,
  `harga_terkoreksi` int(20) DEFAULT NULL,
  `harga_negosiasi` int(255) NOT NULL,
  `hasil_evaluasi` int(20) DEFAULT NULL,
  `Keterangan_lain` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `negosiasi`
--

INSERT INTO `negosiasi` (`Id_negosiasi`, `Id_evaluasi_penawaran`, `No_Negosiasi`, `Tanggal`, `harga_penawaran`, `harga_terkoreksi`, `harga_negosiasi`, `hasil_evaluasi`, `Keterangan_lain`) VALUES
(1, 3, 'NGS001', '2024-05-01', 10000000, 9500000, 0, 1, 'Keterangan 1'),
(2, 4, 'NGS002', '2024-05-02', 20000000, 19000000, 0, 1, 'Keterangan 2'),
(3, 3, 'NGS003', '2024-05-03', 30000000, 28000000, 0, 0, 'Keterangan 3'),
(4, 4, 'NGS004', '2024-05-04', 40000000, 38000000, 0, 1, 'Keterangan 4'),
(5, 5, 'NGS005', '2024-05-05', 50000000, 47000000, 0, 0, 'Keterangan 5'),
(6, 5, 'NGS006', '2024-05-06', 60000000, 55000000, 0, 1, 'Keterangan 6'),
(7, 5, 'NGS007', '2024-05-07', 70000000, 67000000, 0, 1, 'Keterangan 7'),
(8, 4, 'NGS008', '2024-05-08', 80000000, 75000000, 0, 0, 'Keterangan 8'),
(9, 4, 'NGS009', '2024-05-09', 90000000, 85000000, 0, 1, 'Keterangan 9'),
(10, 4, 'NGS010', '2024-05-10', 100000000, 95000000, 0, 1, 'Keterangan 10'),
(12, 2, '123', '2024-06-02', 123, 123, 123, 123, '123'),
(13, 12, '123123', '2024-06-04', 1231, 12312, 123123, 123123, '12321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `Id_kode_tender` int(10) NOT NULL,
  `kode_tender` text NOT NULL,
  `Id_pokja` varchar(10) DEFAULT NULL,
  `no_dokumen_pemilihan` text NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`Id_kode_tender`, `kode_tender`, `Id_pokja`, `no_dokumen_pemilihan`, `Nama_tender`, `Nilai_Pagu`, `Kode_RUP`, `Nilai_HPS`, `Kode_anggaran`, `Metode_tender`, `Nama_PPK`, `NIP_PPK`, `No_SK`, `Unit_kerja`, `Tgl_permohonan`, `Tgl_penugasan`, `Pokja_pemilihan`) VALUES
(2, '', '2,3,4', '', 'Tender 2', 1500000, 0, 1200000, 0, 'Metode 2', 'PPK 2', 23456, 'SK-002', 'Unit 2', '2024-05-02', '2024-05-06', 'Pokja 2'),
(3, '', '2,3,4', '', 'Tender 3', 2000000, 0, 1600000, 0, 'Metode 3', 'PPK 3', 34567, 'SK-003', 'Unit 3', '2024-05-03', '2024-05-07', 'Pokja 3'),
(4, '', '1,2,4', '', 'Tender 4', 2500000, 0, 2000000, 0, 'Metode 4', 'PPK 4', 45678, 'SK-004', 'Unit 4', '2024-05-04', '2024-05-08', 'Pokja 4'),
(5, '', '2,3,5', '', 'Tender 5', 3000000, 0, 2400000, 0, 'Metode 5', 'PPK 5', 56789, 'SK-005', 'Unit 5', '2024-05-05', '2024-05-09', 'Pokja 5'),
(14, '', '1,2,3', '', '123', 12312, 12312, 1231, 1231, '123', '123', 12, '123', '123', '2024-05-14', '2024-05-15', '123'),
(15, '123123', '2,3,4', '213', '123', 123, 12, 123, 123, '12123', '123', 123, '123', '123', '2024-06-03', '2024-06-03', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembuktian`
--

CREATE TABLE `pembuktian` (
  `Id_pembuktian` int(10) NOT NULL,
  `Id_evaluasi_penawaran` int(10) DEFAULT NULL,
  `No_Pembuktian` varchar(30) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Waktu` time DEFAULT NULL,
  `Tempat` varchar(200) DEFAULT NULL,
  `Nama_penyedia` varchar(200) DEFAULT NULL,
  `Alamat` varchar(200) DEFAULT NULL,
  `Nama_hadir` varchar(200) DEFAULT NULL,
  `jabatan` text NOT NULL,
  `Keterangan_lain` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pembuktian`
--

INSERT INTO `pembuktian` (`Id_pembuktian`, `Id_evaluasi_penawaran`, `No_Pembuktian`, `Tanggal`, `Waktu`, `Tempat`, `Nama_penyedia`, `Alamat`, `Nama_hadir`, `jabatan`, `Keterangan_lain`) VALUES
(1, 4, 'PBKT001', '2024-05-01', '12:12:00', 'Gedung A', 'PT ABC', 'Jalan Merdeka No. 123', 'John Doe', 'adasd', 'Keterangan 1'),
(2, 4, 'PBKT002', '2024-05-02', '12:12:12', 'Gedung B', 'PT XYZ', 'Jalan Jenderal Sudirman No. 456', 'Jane Doe', '', 'Keterangan 2'),
(3, 3, 'PBKT003', '2024-05-03', '00:00:00', 'Gedung C', 'PT LMN', 'Jalan Gatot Subroto No. 789', 'Foo Bar', '', 'Keterangan 3'),
(4, 4, 'PBKT004', '2024-05-04', '00:00:00', 'Gedung D', 'PT QRS', 'Jalan Asia Afrika No. 1011', 'Baz Quux', '', 'Keterangan 4'),
(5, 5, 'PBKT005', '2024-05-05', '00:00:00', 'Gedung E', 'PT TUV', 'Jalan Diponegoro No. 1213', 'Alice Smith', '', 'Keterangan 5'),
(6, 4, 'PBKT006', '2024-05-06', '00:00:00', 'Gedung F', 'PT WXY', 'Jalan Thamrin No. 1415', 'Bob Johnson', '', 'Keterangan 6'),
(7, 4, 'PBKT007', '2024-05-07', '00:00:00', 'Gedung G', 'PT ZZZ', 'Jalan Sudirman No. 1617', 'Carol Williams', '', 'Keterangan 7'),
(8, 4, 'PBKT008', '2024-05-08', '00:00:00', 'Gedung H', 'PT AAA', 'Jalan Pahlawan No. 1819', 'David Brown', '', 'Keterangan 8'),
(9, 4, 'PBKT009', '2024-05-09', '00:00:00', 'Gedung I', 'PT BBB', 'Jalan Merak No. 2021', 'Eve Taylor', '', 'Keterangan 9'),
(10, 4, 'PBKT010', '2024-05-10', '00:00:00', 'Gedung J', 'PT CCC', 'Jalan Garuda No. 2223', 'Frank Martin', '', 'Keterangan 10'),
(12, 12, '1424124', '2024-06-03', '12:01:00', '12214', NULL, '1241', '1241', '12412', '12412'),
(13, 13, '12312312', '2024-06-03', '12:12:00', '123123', NULL, '123123123', '213123', '123123123131', '1231312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilihan`
--

CREATE TABLE `pemilihan` (
  `Id_pemilihan` int(11) NOT NULL,
  `Id_paket` int(11) NOT NULL,
  `Id_penjelasan` int(11) DEFAULT NULL,
  `Id_evaluasi_Penawaran` int(11) DEFAULT NULL,
  `Id_pembuktian` int(11) DEFAULT NULL,
  `Id_klarifikasi` int(11) DEFAULT NULL,
  `Id_negosiasi` int(11) DEFAULT NULL,
  `No_Pemilihan` int(11) DEFAULT NULL,
  `Pertanyaan_sanggah` varchar(255) DEFAULT NULL,
  `Jawaban_sanggah` varchar(255) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Cek_list` varchar(50) DEFAULT NULL,
  `Keterangan_lain` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemilihan`
--

INSERT INTO `pemilihan` (`Id_pemilihan`, `Id_paket`, `Id_penjelasan`, `Id_evaluasi_Penawaran`, `Id_pembuktian`, `Id_klarifikasi`, `Id_negosiasi`, `No_Pemilihan`, `Pertanyaan_sanggah`, `Jawaban_sanggah`, `Tanggal`, `Cek_list`, `Keterangan_lain`) VALUES
(4, 2, 1, 4, 1, 1, 1, 2312, '123', '12', '2024-05-16', '12312', '123'),
(5, 4, 2, 3, 3, 3, 3, 23423, '234', '2344', '2024-05-16', '234', '234');

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
  `Pertanyaan` varchar(200) DEFAULT NULL,
  `Jawaban` varchar(200) DEFAULT NULL,
  `Keterangan_lain` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjelasan`
--

INSERT INTO `penjelasan` (`Id_penjelasan`, `Id_kode_tender`, `No_Penjelasan`, `Tanggal`, `Nama_penyedia`, `Pertanyaan`, `Jawaban`, `Keterangan_lain`) VALUES
(1, 2, 'No. 001', '2024-05-01', 'Penyedia 1', 'Pertanyaan 1', 'Jawaban 1', 'Keterangan 1'),
(2, 5, 'No. 002', '2024-05-02', 'Penyedia 2', 'Pertanyaan 2', 'Jawaban 2', 'Keterangan 2'),
(3, 3, 'No. 003', '2024-05-03', 'Penyedia 3', 'Pertanyaan 3', 'Jawaban 3', 'Keterangan 3'),
(4, 4, 'No. 004', '2024-05-04', 'Penyedia 4', 'Pertanyaan 4', 'Jawaban 4', 'Keterangan 4'),
(5, 5, 'No. 005', '2024-05-05', 'Penyedia 5', 'Pertanyaan 5', 'Jawaban 5', 'Keterangan 5'),
(6, 4, 'No. 006', '2024-05-06', 'Penyedia 6', 'Pertanyaan 6', 'Jawaban 6', 'Keterangan 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokjamil`
--

CREATE TABLE `pokjamil` (
  `id` int(11) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `NIP_Pokjamil` varchar(50) NOT NULL,
  `User_ID` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `No_telp` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pangkat` varchar(50) DEFAULT NULL,
  `Jabatan` varchar(50) DEFAULT NULL,
  `Golongan` varchar(50) DEFAULT NULL,
  `No_sertifikat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pokjamil`
--

INSERT INTO `pokjamil` (`id`, `Level`, `Nama`, `NIK`, `NIP_Pokjamil`, `User_ID`, `Password`, `Alamat`, `No_telp`, `Email`, `Pangkat`, `Jabatan`, `Golongan`, `No_sertifikat`) VALUES
(1, 'Pokja', 'Budi Santoso123', '1234567890123456', '198703012020121001', 'budi_santoso', 'password123', 'Jl. Merpati No. 12, Jakarta', '081234567890', 'budi@example.com', 'Pembina', 'Kepala Seksi', 'IV/a', '12345A'),
(2, 'Pokja', 'Siti Aminah', '2234567890123456', '198803022020121002', 'siti_aminah', 'password123', 'Jl. Kenanga No. 8, Bandung', '081234567891', 'siti@example.com', 'Pembina', 'Kepala Bagian', 'IV/b', '12345B'),
(3, 'Pokja', 'Ahmad Fauzi', '3234567890123456', '198904033020121003', 'ahmad_fauzi', 'password123', 'Jl. Melati No. 7, Surabaya', '081234567892', 'ahmad@example.com', 'Pembina Tinggi', 'Kepala Sub Bagian', 'IV/c', '12345C'),
(4, 'Pokja', 'Nurul Huda', '4234567890123456', '199005044020121004', 'nurul_huda', 'password123', 'Jl. Mawar No. 5, Yogyakarta', '081234567893', 'nurul@example.com', 'Penata', 'Staf Administrasi', 'III/c', '12345D'),
(5, 'Pokja', 'Rudi Hartono', '5234567890123456', '199106055020121005', 'rudi_hartono', 'password123', 'Jl. Anggrek No. 10, Medan', '081234567894', 'rudi@example.com', 'Penata Muda', 'Analis Kepegawaian', 'III/a', '12345E');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `userlogin`
--

INSERT INTO `userlogin` (`id_user`, `id_pokja`, `Username`, `Password`, `Level`) VALUES
(2, 23, 'pokja', 'd3412b73a5187c7fd989a8ef9803819b', 'pokja'),
(3, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

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
-- Indeks untuk tabel `nama_tabel`
--
ALTER TABLE `nama_tabel`
  ADD PRIMARY KEY (`Id_Paket`);

--
-- Indeks untuk tabel `negosiasi`
--
ALTER TABLE `negosiasi`
  ADD PRIMARY KEY (`Id_negosiasi`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`Id_kode_tender`);

--
-- Indeks untuk tabel `pembuktian`
--
ALTER TABLE `pembuktian`
  ADD PRIMARY KEY (`Id_pembuktian`);

--
-- Indeks untuk tabel `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD PRIMARY KEY (`Id_pemilihan`);

--
-- Indeks untuk tabel `penjelasan`
--
ALTER TABLE `penjelasan`
  ADD PRIMARY KEY (`Id_penjelasan`);

--
-- Indeks untuk tabel `pokjamil`
--
ALTER TABLE `pokjamil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `Id_evaluasi_penawaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `klarifikasi`
--
ALTER TABLE `klarifikasi`
  MODIFY `Id_klarifikasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `nama_tabel`
--
ALTER TABLE `nama_tabel`
  MODIFY `Id_Paket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `negosiasi`
--
ALTER TABLE `negosiasi`
  MODIFY `Id_negosiasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `Id_kode_tender` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pembuktian`
--
ALTER TABLE `pembuktian`
  MODIFY `Id_pembuktian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pemilihan`
--
ALTER TABLE `pemilihan`
  MODIFY `Id_pemilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjelasan`
--
ALTER TABLE `penjelasan`
  MODIFY `Id_penjelasan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pokjamil`
--
ALTER TABLE `pokjamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
