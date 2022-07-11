-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 04:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` tinyint(2) NOT NULL,
  `nm_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(1, 'admin 1', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `ampu`
--

CREATE TABLE `ampu` (
  `id_ampu` smallint(4) NOT NULL,
  `id_tentor` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ampu`
--

INSERT INTO `ampu` (`id_ampu`, `id_tentor`, `id_rombel`) VALUES
(1, 8, 1),
(6, 8, 4),
(7, 9, 7),
(8, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_temp`
--

CREATE TABLE `daftar_temp` (
  `id_daftar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas_tipe` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_temp`
--

INSERT INTO `daftar_temp` (`id_daftar`, `id_siswa`, `id_kelas_tipe`, `time`) VALUES
(1, 1, 1, 1654845383);

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id_detail` smallint(4) NOT NULL,
  `id_mapel` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nm_kelas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nm_kelas`) VALUES
(1, 'UTBK'),
(2, 'Matematika SMA'),
(3, 'Matematika SMK'),
(4, 'Matematika SMP/MTs');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas_tipe` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `id_siswa`, `id_kelas_tipe`, `id_rombel`, `start`, `end`, `status`) VALUES
(1, 1, 1, 1, 1654845480, 1657472400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_tipe`
--

CREATE TABLE `kelas_tipe` (
  `id_kelas_tipe` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_tipe`
--

INSERT INTO `kelas_tipe` (`id_kelas_tipe`, `id_kelas`, `durasi`, `keterangan`) VALUES
(1, 1, 2628000, '1 Bulan');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` smallint(3) NOT NULL,
  `nm_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_ampu` smallint(4) NOT NULL,
  `judul` text NOT NULL,
  `keterangan` text NOT NULL,
  `link` text NOT NULL,
  `jadwal` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_ampu`, `judul`, `keterangan`, `link`, `jadwal`, `time`) VALUES
(6, 1, 'Pengenalan Diri Tentor', 'test ini test materi', 'bit.ly/wienclass', 1649896380, 1649449419),
(8, 1, 'Wawancara observasi kegiatan usaha ', 'ini adalah contoh penambahan materi baru pada panel tentor', 'ujian.smkn1banyuwangi.sch.id', 1649856780, 1649856715);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` smallint(4) NOT NULL,
  `nm_paket` varchar(255) NOT NULL,
  `id_kelas` smallint(3) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_tagihan`, `nominal`, `time`) VALUES
(1, 1, 25010, 1654845417);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `privat`
--

CREATE TABLE `privat` (
  `id_privat` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tentor` int(11) NOT NULL,
  `tgl_awal` int(11) NOT NULL,
  `tgl_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id_referral` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `referral` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id_referral`, `id_siswa`, `referral`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `rombel` int(11) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `id_kelas`, `rombel`, `kuota`) VALUES
(1, 1, 1, 20),
(4, 2, 1, 20),
(5, 2, 2, 20),
(6, 2, 3, 20),
(7, 1, 2, 20),
(8, 3, 1, 20),
(9, 4, 1, 20),
(10, 3, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nm_siswa` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` char(16) NOT NULL,
  `email` varchar(200) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nm_siswa`, `alamat`, `tp_lahir`, `tgl_lahir`, `no_hp`, `email`, `asal_sekolah`, `foto`, `password`) VALUES
(1, 'Endah Kholifatus Sholihah', 'Kaliputih - Banyuwangi', 'Banyuwangi', '1995-11-12', '081235010019', 'endahndung@gmail.com', 'SMKN 1 Banyuwangi', '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `referral` int(11) NOT NULL,
  `jumlah_tagihan` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `status` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_siswa`, `id_tarif`, `nominal`, `referral`, `jumlah_tagihan`, `time`, `time_limit`, `status`) VALUES
(1, 1, 1, 25000, 10, 25010, 1654845383, 1654848983, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tarif_kelas`
--

CREATE TABLE `tarif_kelas` (
  `id_tarif` int(11) NOT NULL,
  `id_kelas_tipe` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif_kelas`
--

INSERT INTO `tarif_kelas` (`id_tarif`, `id_kelas_tipe`, `deskripsi`, `tarif`) VALUES
(1, 1, 'Untuk 1 Bulan', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tentor`
--

CREATE TABLE `tentor` (
  `id_tentor` int(11) NOT NULL,
  `nm_tentor` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` char(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentor`
--

INSERT INTO `tentor` (`id_tentor`, `nm_tentor`, `alamat`, `tp_lahir`, `tgl_lahir`, `no_hp`, `email`, `foto`, `password`) VALUES
(8, 'Noval Harwin Rozin, S.Kom', 'JL. Panjalu RT 04 RW 01 Tamanbaru Banyuwangi', 'Banyuwangi', '1995-06-27', '081235010010', 'wiensoftdev@gmail.com', '', '202cb962ac59075b964b07152d234b70'),
(9, 'Endah Ks', 'Kaliputih', 'Banyuwangi', '1996-11-12', '0854673674637', 'endahks@poliwangi.com', '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `u_hasil`
--

CREATE TABLE `u_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `jawab` int(11) NOT NULL,
  `benar` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_hasil`
--

INSERT INTO `u_hasil` (`id_hasil`, `id_siswa`, `id_jadwal`, `jawab`, `benar`, `salah`, `nilai`, `waktu`) VALUES
(1, 1, 7, 10, 10, 0, 100, 1657476528);

-- --------------------------------------------------------

--
-- Table structure for table `u_jadwal`
--

CREATE TABLE `u_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal` varchar(200) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_jadwal`
--

INSERT INTO `u_jadwal` (`id_jadwal`, `jadwal`, `id_modul`, `id_rombel`, `time_start`, `time_end`, `durasi`) VALUES
(6, 'Percobaan tryout 1', 3, 1, 1656319080, 1656578280, 30),
(7, 'Percobaan Tryout 2', 3, 1, 1657316160, 1657920960, 10);

-- --------------------------------------------------------

--
-- Table structure for table `u_jawab`
--

CREATE TABLE `u_jawab` (
  `id_jawab` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_opsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_jawab`
--

INSERT INTO `u_jawab` (`id_jawab`, `id_siswa`, `id_jadwal`, `id_soal`, `id_opsi`) VALUES
(1, 1, 7, 4, 16),
(2, 1, 7, 7, 31),
(3, 1, 7, 1, 1),
(4, 1, 7, 9, 41),
(5, 1, 7, 6, 26),
(6, 1, 7, 2, 6),
(7, 1, 7, 3, 11),
(8, 1, 7, 5, 21),
(9, 1, 7, 8, 36),
(10, 1, 7, 10, 46);

-- --------------------------------------------------------

--
-- Table structure for table `u_modul`
--

CREATE TABLE `u_modul` (
  `id_modul` int(11) NOT NULL,
  `modul` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_modul`
--

INSERT INTO `u_modul` (`id_modul`, `modul`) VALUES
(2, 'Modul B2'),
(3, 'Modul B1'),
(4, 'Modul A');

-- --------------------------------------------------------

--
-- Table structure for table `u_opsi`
--

CREATE TABLE `u_opsi` (
  `id_opsi` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `opsi` text NOT NULL,
  `kunci` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_opsi`
--

INSERT INTO `u_opsi` (`id_opsi`, `id_soal`, `opsi`, `kunci`) VALUES
(1, 1, '<p>opsi 1</p>', 'benar'),
(2, 1, '<p>opsi 2</p>\r\n', 'salah'),
(3, 1, '<p>opsi 3</p>\r\n', 'salah'),
(4, 1, '<p>opsi 4</p>\r\n', 'salah'),
(5, 1, '<p>opsi 5</p>\r\n', 'salah'),
(6, 2, '<p>binatang dari australia</p>\r\n', 'benar'),
(7, 2, '<p>binatang dari indonesia</p>\r\n', 'salah'),
(8, 2, '<p>binatang dari amerika</p>\r\n', 'salah'),
(9, 2, '<p>binatang dari rusia</p>\r\n', 'salah'),
(10, 2, '<p>binatang dari china</p>\r\n', 'salah'),
(11, 3, '<p>dua</p>\r\n', 'benar'),
(12, 3, '<p>lima</p>\r\n', 'salah'),
(13, 3, '<p>empat</p>\r\n', 'salah'),
(14, 3, '<p>tiga</p>\r\n', 'salah'),
(15, 3, '<p>sepuluh</p>\r\n', 'salah'),
(16, 4, '<p>mouse</p>\r\n', 'benar'),
(17, 4, '<p>speaker</p>\r\n', 'salah'),
(18, 4, '<p>monitor</p>\r\n', 'salah'),
(19, 4, '<p>lampu</p>\r\n', 'salah'),
(20, 4, '<p>heatshink</p>\r\n', 'salah'),
(21, 5, '<p>4</p>\r\n', 'benar'),
(22, 5, '<p>5</p>\r\n', 'salah'),
(23, 5, '<p>6</p>\r\n', 'salah'),
(24, 5, '<p>7</p>\r\n', 'salah'),
(25, 5, '<p>8</p>\r\n', 'salah'),
(26, 6, '<p>duta</p>\r\n', 'benar'),
(27, 6, '<p>eross</p>\r\n', 'salah'),
(28, 6, '<p>adam</p>\r\n', 'salah'),
(29, 6, '<p>bryan</p>\r\n', 'salah'),
(30, 6, '<p>sakti</p>\r\n', 'salah'),
(31, 7, '<p>arsyad kalief alfarizqi</p>\r\n', 'benar'),
(32, 7, '<p>arsyaaaad</p>\r\n', 'salah'),
(33, 7, '<p>acaad</p>\r\n', 'salah'),
(34, 7, '<p>dedek thole</p>\r\n', 'salah'),
(35, 7, '<p>thole</p>\r\n', 'salah'),
(36, 8, '<p>Endah Kholifatus Shalihah</p>\r\n', 'benar'),
(37, 8, '<p>Bunda Endah</p>\r\n', 'salah'),
(38, 8, '<p>Mbak En</p>\r\n', 'salah'),
(39, 8, '<p>endahndung</p>\r\n', 'salah'),
(40, 8, '<p>ndaaah</p>\r\n', 'salah'),
(41, 9, '<p>yaa ndak tau kok tanya saya</p>\r\n', 'benar'),
(42, 9, '<p>iyaa menmang harus gitu</p>\r\n', 'salah'),
(43, 9, '<p>yaa ndak tau lagi</p>\r\n', 'salah'),
(44, 9, '<p>yaa gimana ya</p>\r\n', 'salah'),
(45, 9, '<p>ygy</p>\r\n', 'salah'),
(46, 10, '<p>Sekolah menengah Kejuruan</p>\r\n', 'benar'),
(47, 10, '<p>Sekolah Menengah Keamanan</p>\r\n', 'salah'),
(48, 10, '<p>Sekolah Menimba Keilmuan</p>\r\n', 'salah'),
(49, 10, '<p>Sekolah Menengah</p>\r\n', 'salah'),
(50, 10, '<p>ndak tau pak</p>\r\n', 'salah');

-- --------------------------------------------------------

--
-- Table structure for table `u_soal`
--

CREATE TABLE `u_soal` (
  `id_soal` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_soal`
--

INSERT INTO `u_soal` (`id_soal`, `id_modul`, `soal`) VALUES
(1, 3, '<p>soal 1</p>\r\n'),
(2, 3, '<p>apa yang dimaksud dengan <strong>KOALA ???</strong></p>\r\n'),
(3, 3, '<p>satu di tambah satu sama dfengan</p>\r\n'),
(4, 3, '<p>contoh dari perangkat input pada komputer adalah</p>\r\n'),
(5, 3, '<p>berapakah jumlah kaki pada kucing?</p>\r\n'),
(6, 3, '<p>siapakah nama vokalis sheila on 7 ?</p>\r\n'),
(7, 3, '<p>siapa nama lengkap arsyad ?</p>\r\n'),
(8, 3, '<p>siapa nama bunda arsyad?</p>\r\n'),
(9, 3, '<p>mengapa diperlukan ketekunan dalam sekolah di SMKN 1 Banyuwangi?</p>\r\n'),
(10, 3, '<p>apa kepanjangan dari SMK?</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `u_tempsoal`
--

CREATE TABLE `u_tempsoal` (
  `id_tempsoal` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `opsi1` int(11) NOT NULL,
  `opsi2` int(11) NOT NULL,
  `opsi3` int(11) NOT NULL,
  `opsi4` int(11) NOT NULL,
  `opsi5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_tempsoal`
--

INSERT INTO `u_tempsoal` (`id_tempsoal`, `id_siswa`, `id_jadwal`, `id_modul`, `id_soal`, `opsi1`, `opsi2`, `opsi3`, `opsi4`, `opsi5`) VALUES
(1, 1, 7, 3, 4, 19, 16, 17, 20, 18),
(2, 1, 7, 3, 7, 34, 35, 33, 31, 32),
(3, 1, 7, 3, 1, 4, 1, 5, 2, 3),
(4, 1, 7, 3, 9, 43, 45, 44, 41, 42),
(5, 1, 7, 3, 6, 30, 26, 28, 29, 27),
(6, 1, 7, 3, 2, 8, 7, 9, 10, 6),
(7, 1, 7, 3, 3, 15, 13, 14, 12, 11),
(8, 1, 7, 3, 5, 21, 24, 23, 25, 22),
(9, 1, 7, 3, 8, 38, 40, 39, 36, 37),
(10, 1, 7, 3, 10, 46, 50, 49, 48, 47);

-- --------------------------------------------------------

--
-- Table structure for table `u_testrun`
--

CREATE TABLE `u_testrun` (
  `id_tesrun` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_testrun`
--

INSERT INTO `u_testrun` (`id_tesrun`, `id_siswa`, `id_jadwal`, `start`, `sisa`) VALUES
(6, 1, 7, 1657475923, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ampu`
--
ALTER TABLE `ampu`
  ADD PRIMARY KEY (`id_ampu`);

--
-- Indexes for table `daftar_temp`
--
ALTER TABLE `daftar_temp`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`);

--
-- Indexes for table `kelas_tipe`
--
ALTER TABLE `kelas_tipe`
  ADD PRIMARY KEY (`id_kelas_tipe`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `privat`
--
ALTER TABLE `privat`
  ADD PRIMARY KEY (`id_privat`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id_referral`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tarif_kelas`
--
ALTER TABLE `tarif_kelas`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`id_tentor`);

--
-- Indexes for table `u_hasil`
--
ALTER TABLE `u_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `u_jadwal`
--
ALTER TABLE `u_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `u_jawab`
--
ALTER TABLE `u_jawab`
  ADD PRIMARY KEY (`id_jawab`);

--
-- Indexes for table `u_modul`
--
ALTER TABLE `u_modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `u_opsi`
--
ALTER TABLE `u_opsi`
  ADD PRIMARY KEY (`id_opsi`);

--
-- Indexes for table `u_soal`
--
ALTER TABLE `u_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `u_tempsoal`
--
ALTER TABLE `u_tempsoal`
  ADD PRIMARY KEY (`id_tempsoal`);

--
-- Indexes for table `u_testrun`
--
ALTER TABLE `u_testrun`
  ADD PRIMARY KEY (`id_tesrun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ampu`
--
ALTER TABLE `ampu`
  MODIFY `id_ampu` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daftar_temp`
--
ALTER TABLE `daftar_temp`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas_tipe`
--
ALTER TABLE `kelas_tipe`
  MODIFY `id_kelas_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` smallint(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` smallint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privat`
--
ALTER TABLE `privat`
  MODIFY `id_privat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id_referral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tarif_kelas`
--
ALTER TABLE `tarif_kelas`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tentor`
--
ALTER TABLE `tentor`
  MODIFY `id_tentor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `u_hasil`
--
ALTER TABLE `u_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `u_jadwal`
--
ALTER TABLE `u_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `u_jawab`
--
ALTER TABLE `u_jawab`
  MODIFY `id_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `u_modul`
--
ALTER TABLE `u_modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `u_opsi`
--
ALTER TABLE `u_opsi`
  MODIFY `id_opsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `u_soal`
--
ALTER TABLE `u_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `u_tempsoal`
--
ALTER TABLE `u_tempsoal`
  MODIFY `id_tempsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `u_testrun`
--
ALTER TABLE `u_testrun`
  MODIFY `id_tesrun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
