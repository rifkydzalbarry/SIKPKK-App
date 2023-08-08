-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2023 pada 06.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikpkk_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cek_kehamilan`
--

CREATE TABLE `tbl_cek_kehamilan` (
  `id_cek` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `tgl_cek` date NOT NULL,
  `bb` varchar(15) NOT NULL,
  `tb` varchar(15) NOT NULL,
  `kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_cek_kehamilan`
--

INSERT INTO `tbl_cek_kehamilan` (`id_cek`, `id_ibu`, `tgl_cek`, `bb`, `tb`, `kondisi`) VALUES
(1, 1, '2023-08-07', '46', '170', 'Sehat'),
(2, 1, '2023-08-08', '50', '170', 'Sehat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ibu`
--

CREATE TABLE `tbl_ibu` (
  `id_ibu` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_lgkp` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_ibu`
--

INSERT INTO `tbl_ibu` (`id_ibu`, `nik`, `nama_lgkp`, `status`) VALUES
(1, 2, 'Aisyah Sulaiman', 'Hamil'),
(2, 102, 'Indah Monica', 'Hamil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kgt` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `tgl_kegiatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kgt`, `id_kegiatan`, `nik`, `tgl_kegiatan`) VALUES
(1, 1, 11111, '2023-08-08'),
(2, 1, 12346, '2023-08-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keluarga`
--

CREATE TABLE `tbl_keluarga` (
  `no_kk` char(16) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama_lgkp` varchar(50) NOT NULL,
  `hbkel` varchar(30) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `tmp_lhr` varchar(30) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kriteria` varchar(30) NOT NULL,
  `keb_khs` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_keluarga`
--

INSERT INTO `tbl_keluarga` (`no_kk`, `nik`, `nama_lgkp`, `hbkel`, `jk`, `tmp_lhr`, `tgl_lhr`, `pendidikan`, `pekerjaan`, `kriteria`, `keb_khs`) VALUES
('000', '00001', 'Agus Suherman', 'Kepala Keluarga', 'Laki-laki', 'Bandung', '2023-03-15', 'S1 dan Sederajat', 'Guru', 'PUS', 'None'),
('000', '00002', 'Aisyah Sulaiman', 'Istri', 'Perempuan', 'Bandung', '2023-03-15', 'S3 dan Sederajat', 'Tidak Bekerja', 'Hamil', ''),
('000', '00003', 'Sayidah Suherman', 'Anak', 'Perempuan', 'Bandung', '2023-03-15', 'Tidak Tamat SD', 'Tidak Bekerja', 'Balita', ''),
('001', '00101', 'Dani Sudani', 'Kepala Keluarga', 'Laki-laki', 'Solo', '2023-03-17', 'S2 dan Sederajat', 'PNS', 'PUS', 'None'),
('001', '00102', 'Indah Monica', 'Istri', 'Perempuan', 'Bandung', '2023-03-17', 'S1 dan Sederajat', 'Perangkat Desa', 'WUS', 'None'),
('001', '00103', 'Randi Sudani', 'Anak', 'Laki-laki', 'Jakarta', '2023-03-17', 'Tidak Tamat SD', 'Tidak Bekerja', 'Balita', ''),
('002', '00201', 'Aher Manukwari', 'Kepala Keluarga', 'Laki-laki', 'Jayapura', '2023-03-18', 'S1 dan Sederajat', 'Petani', 'PUS', 'None'),
('002', '00202', 'Ranti Maria', 'Istri', 'Perempuan', 'Jakarta', '2022-12-31', 'S1 dan Sederajat', 'Lainnya', 'WUS', 'None'),
('002', '00203', 'Edwin', 'Anak', 'Laki-laki', 'Jakarta', '2023-01-01', 'Tidak Sekolah', 'Tidak Bekerja', 'Balita', 'None'),
('004', '00401', 'Endang Sunandar', 'Kepala Keluarga', 'Laki-laki', 'Sidoarjo', '2023-03-17', 'SMP dan Sederajat', 'TKI', 'PUS', 'None'),
('004', '00402', 'Asriyani', 'Istri', 'Perempuan', 'Bandung', '2022-02-02', 'S1 dan Sederajat', 'Guru', 'WUS', 'None'),
('005', '00501', 'Dedi Cahyono', 'Kepala Keluarga', 'Laki-laki', 'Bandung', '2023-03-03', 'SD dan Sederajat', 'Buruh Tani', 'PUS', 'None'),
('123', '11111', 'Indah', 'Istri', 'Perempuan', 'Bandung', '2023-05-10', 'SMA dan Sederajat', 'Buruh Tani', 'WUS', '-'),
('123', '12345', 'Rifky Dzalbarry', 'Kepala Keluarga', 'Laki-laki', 'Bandung', '2023-05-10', 'S1 dan Sederajat', 'Guru/Dosen', 'PUS', '-'),
('1789', '12346', 'Siti', 'Istri', 'Perempuan', 'Bandung', '2023-07-13', 'Tidak Tamat SD', 'Tidak Bekerja', 'Hamil', 'None'),
('006', '1665', 'Ragnarok', 'Kepala Keluarga', 'Laki-laki', 'Banten', '2023-03-19', 'SMA dan Sederajat', 'Polisi', 'PUS', 'None'),
('1789', '1789001', 'Atangg', 'Kepala Keluarga', 'Laki-laki', 'Bandung', '2023-04-03', 'Tidak Tamat SD', 'Petani', 'Lansia', 'Tidak Ada'),
('006', '2411', 'Megawati', 'Istri', 'Perempuan', 'Banten', '2023-03-20', 'SD dan Sederajat', 'Buruh Bangunan', 'WUS', 'Bengo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kondisirumah`
--

CREATE TABLE `tbl_kondisirumah` (
  `id_konrmh` int(11) NOT NULL,
  `no_kk` char(16) NOT NULL,
  `mkn_pokok` varchar(15) NOT NULL,
  `jamban` varchar(10) NOT NULL,
  `sbr_air` varchar(15) NOT NULL,
  `tps` varchar(10) NOT NULL,
  `spal` varchar(10) NOT NULL,
  `stiker_p4k` varchar(10) NOT NULL,
  `krt_rmh` varchar(15) NOT NULL,
  `akf_up2k` varchar(25) NOT NULL,
  `akf_kukpl` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kondisirumah`
--

INSERT INTO `tbl_kondisirumah` (`id_konrmh`, `no_kk`, `mkn_pokok`, `jamban`, `sbr_air`, `tps`, `spal`, `stiker_p4k`, `krt_rmh`, `akf_up2k`, `akf_kukpl`) VALUES
(1, '00001', 'Non Beras', 'Tidak', 'Sumur', 'Tidak', 'Tidak', 'Tidak', 'Sehat', 'Tidak', 'Tidak'),
(2, '00201', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option1', 'option1', 'option1'),
(4, '1665', 'Beras', 'Ya', 'Sumur', 'Ya', 'Tidak', 'Tidak', 'Kurang Sehat', 'Tidak', 'Ya'),
(5, '00401', 'Non Beras', 'Ya', 'PDAM', 'Ya', 'Ya', 'Ya', 'Sehat', 'Ya', 'Ya'),
(6, '000', 'Beras', 'Ya', 'PDAM', 'Ya', 'Ya', 'Ya', 'Sehat', 'Tidak', 'Tidak'),
(7, '001', 'Beras', 'Tidak', 'Sumur', 'Tidak', 'Tidak', 'Tidak', 'Kurang Sehat', 'Tidak', 'Tidak'),
(9, '123', 'Beras', 'Ya', 'PDAM', 'Ya', 'Tidak', 'Tidak', 'Sehat', 'Ya', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_kegiatan`
--

CREATE TABLE `tbl_master_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_master_kegiatan`
--

INSERT INTO `tbl_master_kegiatan` (`id_kegiatan`, `nama_kegiatan`) VALUES
(1, 'Posyandu'),
(2, 'PHBN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `email`, `image`, `address`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Rifky Dzalbarry', 'admin@admin.com', 'default.jpg', 'Bandung', '$2y$10$Y90IXEsqRBba5esSmFiwGuvPF.2rkX/G6ytZ2BLtDK5iY6d05paYC', 1, 1, 1681477692),
(2, 'Moch Syahril Anas', 'syahril@gmail.com', 'default.jpg', 'Jln Penclut No. 666 Ds. Rancamanyar Kec. Baleendah Kab. Bandung', '$2y$10$yuIV9BrK5T6qMCczUWFNlubIYG9pZFcuuzuzD4md2SxXj4rkdNnT.', 2, 1, 1681478197);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Dasawisma');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cek_kehamilan`
--
ALTER TABLE `tbl_cek_kehamilan`
  ADD PRIMARY KEY (`id_cek`);

--
-- Indeks untuk tabel `tbl_ibu`
--
ALTER TABLE `tbl_ibu`
  ADD PRIMARY KEY (`id_ibu`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kgt`);

--
-- Indeks untuk tabel `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tbl_kondisirumah`
--
ALTER TABLE `tbl_kondisirumah`
  ADD PRIMARY KEY (`id_konrmh`);

--
-- Indeks untuk tabel `tbl_master_kegiatan`
--
ALTER TABLE `tbl_master_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_cek_kehamilan`
--
ALTER TABLE `tbl_cek_kehamilan`
  MODIFY `id_cek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_ibu`
--
ALTER TABLE `tbl_ibu`
  MODIFY `id_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kgt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kondisirumah`
--
ALTER TABLE `tbl_kondisirumah`
  MODIFY `id_konrmh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_master_kegiatan`
--
ALTER TABLE `tbl_master_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
