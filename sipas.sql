-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2022 pada 10.03
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(5) NOT NULL,
  `id_masuk` int(5) NOT NULL,
  `tujuan` varchar(30) DEFAULT NULL,
  `tgl_disposisi` date NOT NULL,
  `isi` varchar(100) DEFAULT NULL,
  `sifat` varchar(20) NOT NULL,
  `arsip_disposisi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_masuk`, `tujuan`, `tgl_disposisi`, `isi`, `sifat`, `arsip_disposisi`) VALUES
(1, 1, 'Pembina Pramuka', '2022-06-21', 'Pemberitahuan Seleksi Petugas Upacara', 'Biasa', '1.pdf'),
(3, 10, 'Admin', '2022-06-21', 'Undangan Evaluasi Pelaksanaan Anggaran dan Optimalisasi Kinerja Satuan Kerja Triwulan II TA 2022', 'Biasa', 'Dispoisi-10.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(84, 'Kepala Madrasah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_keluar` int(5) NOT NULL,
  `tujuan_keluar` varchar(30) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `nomor_keluar` varchar(30) DEFAULT NULL,
  `keterangan_keluar` varchar(50) DEFAULT NULL,
  `arsip_keluar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_keluar`, `tujuan_keluar`, `tgl_keluar`, `nomor_keluar`, `keterangan_keluar`, `arsip_keluar`) VALUES
(5, 'Penmad Kemenag Kab Bekasi', '2022-08-01', '1129/Ma.10.56/PP.00.6/08/2022', 'Surat Undangan', 'Penmad_Kemenag_Kab_Bekasi2022-08-01Surat_Undangan.pdf'),
(8, 'Kepala Kemenag Kab Bekasi', '2022-08-01', '1130/Ma.10.56/PP.00.6/08/2022', 'Surat Undangan', 'Kepala_Kemenag_Kab_Bekasi2022-08-01Surat_Undangan1.pdf'),
(9, 'Didin Hadiyat', '2022-08-01', '1131/Ma.10.56/PP.00.6/08/2022', 'Surat Permohonan', 'Didin_Hadiyat2022-08-01Surat_Permohonan1.pdf'),
(10, 'Amal Basyari dkk', '2022-08-01', '1132/Ma.10.56/KP.00.3/08/2022', 'Surat Tugas', 'Amal_Basyari_dkk2022-08-01Surat_Tugas1.pdf'),
(11, 'Amal Basyari dkk', '2022-08-01', '1133/Ma.10.56/KP.00.3/08/2022', 'SPD', 'Amal_Basyari_dkk2022-08-01SPD1.pdf'),
(12, 'KPPN', '2022-08-01', '1134/Ma.10.56/KU.00/08/2022', 'Surat Konfirmasi Pajak', 'KPPN2022-08-01Surat_Konfirmasi_Pajak1.pdf'),
(13, 'Kepala Kemenag Kab Bekasi', '2022-08-01', '1135/Ma.10.56/PP.00.6/08/2022', 'Surat Permohonan', 'Kepala_Kemenag_Kab_Bekasi2022-08-01Surat_Permohonan1.pdf'),
(14, 'Ilham Wahyudi ', '2022-08-01', '1137/Ma.10.56/PP.00.6/08/2022', 'Surat Keterangan', 'Ilham_Wahyudi_2022-08-01Surat_Keterangan1.pdf'),
(15, 'Eqi Yudha', '2022-08-01', '1138/Ma.10.56/PP.00.6/08/2022', 'Surat Keterangan', 'Eqi_Yudha2022-08-01Surat_Keterangan1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_masuk` int(11) NOT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `nomor_masuk` varchar(30) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(100) DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL,
  `arsip_masuk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_masuk`, `pengirim`, `nomor_masuk`, `tgl_masuk`, `tgl_surat`, `perihal`, `keterangan`, `arsip_masuk`) VALUES
(1, 'Gerakan Pramuka Kwartir Ranting Cikarang Utara', '040/09.16.09-A', '2022-06-20', '2022-06-17', 'Pemberitahuan Seleksi Petugas Upacara', 'Sudah Disposisi', 'Gerakan_Pramuka_Kwartir_Ranting_Cikarang_Utara2022-06-20Pemberitahuan_Seleksi_Petugas_Upacara.pdf'),
(10, 'Kantor Pelayanan Perbendaharaan Negara Tipe A1 Bekasi', 'UND-12/KPN.1303/2022', '2022-06-20', '2022-06-20', 'Undangan Evaluasi Pelaksanaan Anggaran dan Optimalisasi Kinerja Satuan Kerja Triwulan II TA 2022', 'Sudah Disposisi', 'Kantor_Pelayanan_Perbendaharaan_Negara_Tipe_A1_Bekasi2022-06-20Undangan_Evaluasi_Pelaksanaan_Anggara'),
(11, 'Mahasiswa UIN Bandung', 'B.1558/Un.05/III.2/TL.00.9/06/', '2022-06-20', '2022-06-18', 'Permohonan Izin Survey/Kunjungan', 'Belum Disposisi', 'Mahasiswa_UIN_Bandung2022-06-20Permohonan_Izin_SurveyKunjungan1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `jabatan`) VALUES
(1, 'Hadi Atmojo', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'hadiatmojo99@gmail.com', 'Admin'),
(2, 'Hadi', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'Staff'),
(3, 'Ahmad Nur Arifin', 'guru', '77e69c137812518e359196bb2f5e9bb9', 'guru@gmail.com', 'Guru Biologi'),
(4, 'Della', 'guru1', '92afb435ceb16630e9827f54330c59c9', 'prm@gmail.com', 'Pembina Pramuka');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `disposisi_ibfk_1` (`id_masuk`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_masuk`) REFERENCES `surat_masuk` (`id_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
