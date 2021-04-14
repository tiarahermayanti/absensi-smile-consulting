-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 03:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen_sc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `ab_id` int(11) NOT NULL,
  `kry_id` int(11) NOT NULL,
  `ab_tgl` date NOT NULL,
  `ab_masuk` time NOT NULL,
  `ab_trlmbt_msk` int(11) NOT NULL,
  `ab_ft_msk` text NOT NULL,
  `ab_latlong_msk` text NOT NULL,
  `ab_pulang` time NOT NULL,
  `ab_trlmbt_plg` int(11) NOT NULL,
  `ab_ft_plg` text NOT NULL,
  `ab_latlong_plg` text NOT NULL,
  `ab_lembur` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`ab_id`, `kry_id`, `ab_tgl`, `ab_masuk`, `ab_trlmbt_msk`, `ab_ft_msk`, `ab_latlong_msk`, `ab_pulang`, `ab_trlmbt_plg`, `ab_ft_plg`, `ab_latlong_plg`, `ab_lembur`, `status_id`) VALUES
(263, 98765, '2021-01-03', '09:00:00', 0, 'image_1609676809.png', 'Smile Consulting Indonesia', '19:27:14', 5234, 'image_1609676834.png', 'Smile Consulting Indonesia', 0, 1),
(264, 567432, '2021-01-03', '11:31:20', 3000, '', '', '20:33:59', 0, 'image_1609680839.png', 'Smile Consulting Indonesia', 2039, 1),
(277, 21768240, '2021-01-07', '15:22:56', 22076, 'image_1610007776.png', 'Smile Consulting Indonesia', '15:23:21', 0, 'image_1610007801.png', 'Smile Consulting Indonesia', 0, 7),
(278, 21768240, '2021-01-08', '00:00:00', 0, '', '', '00:00:00', 0, '', '', 0, 6),
(279, 21768240, '2021-01-09', '00:00:00', 0, '', '', '00:00:00', 0, '', '', 0, 6),
(280, 21768240, '2021-02-05', '09:41:09', 2469, 'image_1612521669.png', 'Smile Consulting Indonesia', '21:41:54', 0, 'image_1612521714.png', 'Smile Consulting Indonesia', 6114, 1),
(281, 21768240, '2021-02-10', '16:29:12', 26052, 'image_1612949352.png', 'Smile Consulting Indonesia', '00:00:00', 0, '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen_dinas`
--

CREATE TABLE `tb_absen_dinas` (
  `ab_dinas_id` int(11) NOT NULL,
  `dinas_id` int(11) NOT NULL,
  `ab_dinas_jam` time NOT NULL,
  `ab_dinas_foto` text NOT NULL,
  `dinas_rencana` text NOT NULL,
  `ab_dinas_selesai` time NOT NULL,
  `dinas_lap` text NOT NULL,
  `dinas_ft1` text DEFAULT NULL,
  `dinas_ft2` text NOT NULL,
  `dinas_ft3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_alasan`
--

CREATE TABLE `tb_alasan` (
  `alasan_id` int(11) NOT NULL,
  `ab_id` int(11) NOT NULL,
  `alasan_msk` text DEFAULT NULL,
  `alasan_plg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alasan`
--

INSERT INTO `tb_alasan` (`alasan_id`, `ab_id`, `alasan_msk`, `alasan_plg`) VALUES
(20, 263, NULL, 'terlambat absen saja'),
(21, 264, 'macet', 'tidak menemukan solusi error'),
(26, 277, 'sakit', NULL),
(27, 280, 'terlambat bangun', NULL),
(28, 281, 'ketiduran', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `nama_bank`) VALUES
(1, 'BCA'),
(2, 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dinas`
--

CREATE TABLE `tb_dinas` (
  `dinas_id` int(11) NOT NULL,
  `kry_id` int(11) NOT NULL,
  `dinas_tgl` date NOT NULL,
  `dinas_tempat` text NOT NULL,
  `dinas_lat` text NOT NULL,
  `dinas_long` text NOT NULL,
  `dinas_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `gj_id` int(11) NOT NULL,
  `kry_id` int(11) NOT NULL,
  `gj_bulan` int(11) NOT NULL,
  `gj_tahun` year(4) NOT NULL,
  `gj_pokok` double NOT NULL,
  `gj_makan` double NOT NULL,
  `gj_kesehatan` double NOT NULL,
  `gj_disiplin` double NOT NULL,
  `gj_transport` double NOT NULL,
  `ttl_lembur` int(11) NOT NULL,
  `gj_lembur` double NOT NULL,
  `ttl_alpa` int(11) NOT NULL,
  `pt_alpa` double NOT NULL,
  `ttl_terlambat` int(11) NOT NULL,
  `pt_terlambat` double NOT NULL,
  `ttl_half` int(11) NOT NULL,
  `pt_half` double NOT NULL,
  `ttl_izin` int(11) NOT NULL,
  `pt_izin` double NOT NULL,
  `ttl_sakit` int(11) NOT NULL,
  `pt_sakit` double NOT NULL,
  `ttl_sakitnsdr` int(11) NOT NULL,
  `pt_sakitnsdr` double NOT NULL,
  `ttl_cuti` int(11) NOT NULL,
  `pt_cuti` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`gj_id`, `kry_id`, `gj_bulan`, `gj_tahun`, `gj_pokok`, `gj_makan`, `gj_kesehatan`, `gj_disiplin`, `gj_transport`, `ttl_lembur`, `gj_lembur`, `ttl_alpa`, `pt_alpa`, `ttl_terlambat`, `pt_terlambat`, `ttl_half`, `pt_half`, `ttl_izin`, `pt_izin`, `ttl_sakit`, `pt_sakit`, `ttl_sakitnsdr`, `pt_sakitnsdr`, `ttl_cuti`, `pt_cuti`) VALUES
(48, 10234, 1, 2021, 5000000, 300000, 300000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 98765, 1, 2021, 5000000, 500000, 500000, 0, 0, 0, 0, 0, 0, 0, 0, 1, 100000, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 199925, 1, 2021, 5000000, 300000, 300000, 100000, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 250299, 1, 2021, 6000000, 300000, 300000, 100000, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 21768240, 1, 2021, 5000000, 500000, 500000, 50000, 100000, 0, 0, 1, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0),
(53, 199925, 12, 2020, 5000000, 300000, 300000, 100000, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 250299, 12, 2020, 6000000, 300000, 300000, 100000, 100000, 4, 40000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin`
--

CREATE TABLE `tb_izin` (
  `izin_id` int(11) NOT NULL,
  `kry_id` int(11) NOT NULL,
  `id_izin_jenis` int(11) NOT NULL,
  `izin_mulai` date NOT NULL,
  `izin_berakhir` date NOT NULL,
  `izin_tgl_pengajuan` date NOT NULL,
  `izin_ket` text NOT NULL,
  `izin_upload` text NOT NULL,
  `id_izin_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_izin`
--

INSERT INTO `tb_izin` (`izin_id`, `kry_id`, `id_izin_jenis`, `izin_mulai`, `izin_berakhir`, `izin_tgl_pengajuan`, `izin_ket`, `izin_upload`, `id_izin_status`) VALUES
(26, 21768240, 4, '2021-01-08', '2021-01-09', '2021-01-07', 'acara keluarga kakak nikahan', 'null', 2),
(27, 21768240, 2, '2021-01-11', '2021-01-12', '2021-01-07', 'sakit demam belum sempat ke dokter', 'null', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin_jenis`
--

CREATE TABLE `tb_izin_jenis` (
  `id_izin_jenis` int(11) NOT NULL,
  `nama_izin_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_izin_jenis`
--

INSERT INTO `tb_izin_jenis` (`id_izin_jenis`, `nama_izin_jenis`) VALUES
(1, 'Sakit (Surat Dokter)'),
(2, 'Sakit (Tidak Ada Surat Dokter)'),
(3, 'Izin'),
(4, 'Cuti');

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin_status`
--

CREATE TABLE `tb_izin_status` (
  `id_status_izin` int(11) NOT NULL,
  `nama_status_izin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_izin_status`
--

INSERT INTO `tb_izin_status` (`id_status_izin`, `nama_status_izin`) VALUES
(1, 'Menunggu'),
(2, 'Diterima'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `jdwl_id` int(11) NOT NULL,
  `jdwl_hari` varchar(50) NOT NULL,
  `jdwl_masuk` time NOT NULL,
  `jdwl_pulang` time NOT NULL,
  `jdwl_lembur` time NOT NULL,
  `jdwl_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`jdwl_id`, `jdwl_hari`, `jdwl_masuk`, `jdwl_pulang`, `jdwl_lembur`, `jdwl_status`) VALUES
(1, 'Senin', '09:00:00', '18:00:00', '20:00:00', 'kerja'),
(2, 'Selasa', '09:00:00', '18:00:00', '20:00:00', 'kerja'),
(3, 'Rabu', '09:00:00', '18:00:00', '20:00:00', 'kerja'),
(4, 'Kamis', '09:00:00', '18:00:00', '20:00:00', 'kerja'),
(5, 'Jumat', '09:00:00', '18:00:00', '20:00:00', 'kerja'),
(6, 'Sabtu', '09:00:00', '14:00:00', '00:00:00', 'kerja'),
(7, 'Minggu', '00:00:00', '00:00:00', '00:00:00', 'libur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `kry_id` int(11) NOT NULL,
  `kry_nama` varchar(100) NOT NULL,
  `kry_posisi` varchar(100) NOT NULL,
  `kry_email` varchar(100) NOT NULL,
  `kry_tlp` varchar(20) NOT NULL,
  `kry_alamat` text NOT NULL,
  `kry_nik` int(11) NOT NULL,
  `kry_ktp` text NOT NULL,
  `kry_kk` text NOT NULL,
  `kry_foto` text NOT NULL,
  `kry_jk` varchar(20) NOT NULL,
  `kry_cuti` int(11) NOT NULL,
  `kry_cuti_sampai` date NOT NULL,
  `kry_cuti_sisa` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `kry_rekening` varchar(100) NOT NULL,
  `kry_an_rekening` varchar(100) NOT NULL,
  `gj_pokok` double NOT NULL,
  `gj_makan` double NOT NULL,
  `gj_kesehatan` double NOT NULL,
  `gj_disiplin` double NOT NULL,
  `gj_transport` double NOT NULL,
  `kry_tgl` date NOT NULL,
  `kry_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`kry_id`, `kry_nama`, `kry_posisi`, `kry_email`, `kry_tlp`, `kry_alamat`, `kry_nik`, `kry_ktp`, `kry_kk`, `kry_foto`, `kry_jk`, `kry_cuti`, `kry_cuti_sampai`, `kry_cuti_sisa`, `id_bank`, `kry_rekening`, `kry_an_rekening`, `gj_pokok`, `gj_makan`, `gj_kesehatan`, `gj_disiplin`, `gj_transport`, `kry_tgl`, `kry_status`) VALUES
(10234, 'Park Sungjin', 'Staff Marketing', 'ParkSungjinn@gmail.com', '081270755351', 'Padang', 0, '', '', '102341609430264.jpg', 'Pria', 5, '0000-00-00', 0, 1, '12345678', '', 5000000, 300000, 300000, 0, 0, '2021-01-01', 'aktif'),
(54321, 'Gunawan', 'pimpinan', '', '', '', 0, '', '', '', '', 0, '0000-00-00', 0, 0, '', '', 0, 0, 0, 0, 0, '0000-00-00', ''),
(98765, 'Kang Brian', 'Staff Marketing', 'kangbrian@gmail.com', '081270755351', 'Siteba Padang', 0, '987651609321593.jpeg', '', '987651609428099.jpg', 'Pria', 5, '0000-00-00', 0, 1, '987654321', '', 5000000, 500000, 500000, 0, 0, '2021-01-01', 'aktif'),
(199925, 'Yoon Dowoon', 'Staff Marketing', 'dddounblue@gmail.com', '81270755350', 'Gunung Pangilun Padang', 12345678, '1999251609419038.jpeg', '1999251609419038.jpg', '1999251609419038.jpg', 'Pria', 12, '2021-06-28', 12, 2, '12345678', 'Yoon Dowoon', 5000000, 300000, 300000, 100000, 100000, '2020-12-01', 'aktif'),
(250299, 'Kim Wonpil', 'Staff Marketing', 'onefeel@gmail.com', '081270755351', 'Purus Padang', 12345678, '2502991609420806.jpeg', '2502991609420806.jpg', '2502991609430280.jpg', 'Pria', 12, '2021-12-31', 12, 1, '12345678', 'Kim Wonpil', 6000000, 300000, 300000, 100000, 100000, '0000-00-00', 'aktif'),
(567432, 'Park Jaehyung', 'Staff Admin', 'eajpark@gmail.com', '081270755351', 'Jalan Veteran No. 55 Padang', 325324243, '', '', '5674321609430475.jpg', 'Pria', 12, '2021-05-19', 12, 2, '036456743', 'Park Jaehyung', 2000000, 100000, 1000000, 100000, 100000, '2021-02-28', 'aktif'),
(21768240, 'Tiara Hermayanti', 'Staff Marketing', 'tiarahermayanti10.2@gmail.com', '081270755351', 'Jalan Veteran No 55 Padang', 12345678, '217682401610007552.jpeg', '217682401610007552.jpg', '217682401610007552.png', 'Wanita', 12, '2021-12-10', 10, 1, '12345', 'Tiara Hermayanti', 5000000, 500000, 500000, 50000, 100000, '2021-01-07', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `lap_id` int(11) NOT NULL,
  `ab_id` int(11) NOT NULL,
  `lap_deskripsi` text NOT NULL,
  `lap_foto1` text DEFAULT NULL,
  `lap_foto2` text DEFAULT NULL,
  `lap_foto3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`lap_id`, `ab_id`, `lap_deskripsi`, `lap_foto1`, `lap_foto2`, `lap_foto3`) VALUES
(83, 263, 'bercocok tanam', 'foto1_1609676829.png', NULL, NULL),
(84, 264, 'mengerjakan error', NULL, NULL, NULL),
(89, 277, 'mengerjakan laporan kegiatan', NULL, NULL, NULL),
(90, 280, 'kegiatan apa aja', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_potongan_bonus`
--

CREATE TABLE `tb_potongan_bonus` (
  `id_pot` int(11) NOT NULL,
  `terlambat` double NOT NULL,
  `hadir_setengah` double NOT NULL,
  `sakit_sdr` double NOT NULL,
  `sakit_nsdr` double NOT NULL,
  `izin` double NOT NULL,
  `cuti` double NOT NULL,
  `alpa` double NOT NULL,
  `lembur` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_potongan_bonus`
--

INSERT INTO `tb_potongan_bonus` (`id_pot`, `terlambat`, `hadir_setengah`, `sakit_sdr`, `sakit_nsdr`, `izin`, `cuti`, `alpa`, `lembur`) VALUES
(1, 10000, 50000, 50000, 100000, 50000, 0, 100000, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status_id` int(11) NOT NULL,
  `status_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status_id`, `status_nama`) VALUES
(1, 'Hadir Penuh'),
(2, 'Hadir 1/2 Hari'),
(3, 'Sakit S.Dr'),
(4, 'Sakit NS.Dr'),
(5, 'Izin'),
(6, 'Cuti'),
(7, 'Alpha');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `kry_id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `kry_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `kry_id`, `password`, `role`, `kry_status`) VALUES
(2, 54321, '5f4dcc3b5aa765d61d8327deb882cf99', 'pimpinan', 'aktif'),
(4, 98765, '5f4dcc3b5aa765d61d8327deb882cf99', 'karyawan', 'aktif'),
(5, 10234, '5a22e6c339c96c9c0513a46e44c39683', 'karyawan', 'aktif'),
(8, 250299, '78e4ef411d50825edffa958b7b49ffa5', 'karyawan', 'aktif'),
(9, 199925, '77ae966622529ccbc2710b98f0440e77', 'karyawan', 'aktif'),
(11, 21768240, '5f4dcc3b5aa765d61d8327deb882cf99', 'karyawan', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`ab_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `kry_id` (`kry_id`);

--
-- Indexes for table `tb_absen_dinas`
--
ALTER TABLE `tb_absen_dinas`
  ADD PRIMARY KEY (`ab_dinas_id`),
  ADD KEY `dinas_id` (`dinas_id`);

--
-- Indexes for table `tb_alasan`
--
ALTER TABLE `tb_alasan`
  ADD PRIMARY KEY (`alasan_id`),
  ADD KEY `ab_id` (`ab_id`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD PRIMARY KEY (`dinas_id`),
  ADD KEY `kry_id` (`kry_id`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`gj_id`),
  ADD KEY `kry_id` (`kry_id`);

--
-- Indexes for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`izin_id`),
  ADD KEY `kry_id` (`kry_id`),
  ADD KEY `id_izin_jenis` (`id_izin_jenis`),
  ADD KEY `id_izin_status` (`id_izin_status`);

--
-- Indexes for table `tb_izin_jenis`
--
ALTER TABLE `tb_izin_jenis`
  ADD PRIMARY KEY (`id_izin_jenis`);

--
-- Indexes for table `tb_izin_status`
--
ALTER TABLE `tb_izin_status`
  ADD PRIMARY KEY (`id_status_izin`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`jdwl_id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`kry_id`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`lap_id`),
  ADD KEY `ab_id` (`ab_id`);

--
-- Indexes for table `tb_potongan_bonus`
--
ALTER TABLE `tb_potongan_bonus`
  ADD PRIMARY KEY (`id_pot`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `kry_id` (`kry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `tb_absen_dinas`
--
ALTER TABLE `tb_absen_dinas`
  MODIFY `ab_dinas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_alasan`
--
ALTER TABLE `tb_alasan`
  MODIFY `alasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  MODIFY `dinas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `gj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_izin`
--
ALTER TABLE `tb_izin`
  MODIFY `izin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_izin_jenis`
--
ALTER TABLE `tb_izin_jenis`
  MODIFY `id_izin_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_izin_status`
--
ALTER TABLE `tb_izin_status`
  MODIFY `id_status_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `jdwl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `lap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_potongan_bonus`
--
ALTER TABLE `tb_potongan_bonus`
  MODIFY `id_pot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD CONSTRAINT `tb_absen_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`status_id`),
  ADD CONSTRAINT `tb_absen_ibfk_3` FOREIGN KEY (`kry_id`) REFERENCES `tb_karyawan` (`kry_id`);

--
-- Constraints for table `tb_absen_dinas`
--
ALTER TABLE `tb_absen_dinas`
  ADD CONSTRAINT `tb_absen_dinas_ibfk_1` FOREIGN KEY (`dinas_id`) REFERENCES `tb_dinas` (`dinas_id`);

--
-- Constraints for table `tb_alasan`
--
ALTER TABLE `tb_alasan`
  ADD CONSTRAINT `tb_alasan_ibfk_1` FOREIGN KEY (`ab_id`) REFERENCES `tb_absen` (`ab_id`);

--
-- Constraints for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD CONSTRAINT `tb_dinas_ibfk_1` FOREIGN KEY (`kry_id`) REFERENCES `tb_karyawan` (`kry_id`);

--
-- Constraints for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`kry_id`) REFERENCES `tb_karyawan` (`kry_id`);

--
-- Constraints for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD CONSTRAINT `tb_izin_ibfk_1` FOREIGN KEY (`kry_id`) REFERENCES `tb_karyawan` (`kry_id`),
  ADD CONSTRAINT `tb_izin_ibfk_2` FOREIGN KEY (`id_izin_jenis`) REFERENCES `tb_izin_jenis` (`id_izin_jenis`),
  ADD CONSTRAINT `tb_izin_ibfk_3` FOREIGN KEY (`id_izin_status`) REFERENCES `tb_izin_status` (`id_status_izin`);

--
-- Constraints for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`ab_id`) REFERENCES `tb_absen` (`ab_id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`kry_id`) REFERENCES `tb_karyawan` (`kry_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
