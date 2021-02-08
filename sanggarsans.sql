-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 03:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanggarsans`
--

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_pengunjung`
--

CREATE TABLE `jumlah_pengunjung` (
  `id` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL,
  `tgl` varchar(121) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jumlah_pengunjung`
--

INSERT INTO `jumlah_pengunjung` (`id`, `id_sanggar`, `tgl`) VALUES
(91, 1, 'Jan'),
(92, 9, 'Jan'),
(93, 9, 'Jan'),
(94, 9, 'Jan'),
(95, 9, 'Jan'),
(96, 9, 'Jan'),
(97, 9, 'Jan'),
(98, 9, 'Jan'),
(99, 9, 'Jan'),
(100, 9, 'Jan'),
(101, 9, 'Jan'),
(102, 9, 'Jan'),
(103, 1, 'Jan'),
(104, 1, 'Jan'),
(105, 5, 'Jan'),
(106, 9, 'Jan'),
(107, 1, 'Jan'),
(108, 1, 'Jan'),
(109, 5, 'Jan'),
(110, 1, 'Jan'),
(111, 9, 'Jan'),
(112, 9, 'Jan'),
(113, 1, 'Jan'),
(114, 1, 'Jan'),
(115, 1, 'Jan'),
(116, 1, 'Jan'),
(117, 9, 'Jan'),
(118, 9, 'Jan'),
(119, 9, 'Jan'),
(120, 9, 'Feb'),
(121, 1, 'Feb');

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_transaksi`
--

CREATE TABLE `jumlah_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jumlah_transaksi`
--

INSERT INTO `jumlah_transaksi` (`id`, `id_user`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tipe_sanggar`
--

CREATE TABLE `kategori_tipe_sanggar` (
  `id` int(11) NOT NULL,
  `tipe_sanggar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_tipe_sanggar`
--

INSERT INTO `kategori_tipe_sanggar` (`id`, `tipe_sanggar`) VALUES
(1, 'Sanggar Tari'),
(2, 'Sanggar Teater'),
(3, 'Sanggar Musik');

-- --------------------------------------------------------

--
-- Table structure for table `k_biaya`
--

CREATE TABLE `k_biaya` (
  `id_biaya` int(11) NOT NULL,
  `biaya` varchar(225) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_biaya`
--

INSERT INTO `k_biaya` (`id_biaya`, `biaya`, `nilai`) VALUES
(1, '<= 1 juta', 5),
(2, '2 jt s/d 4 juta', 4),
(3, '5 jt s/d 7 juta', 3),
(4, '8 jt s/d 10 juta', 2),
(5, '> 10 juta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `k_jadwal`
--

CREATE TABLE `k_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_jadwal`
--

INSERT INTO `k_jadwal` (`id_jadwal`, `jadwal`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at'),
(6, 'Sabtu'),
(7, 'Minggu'),
(8, 'Pukul 07:00 – 12:00'),
(9, 'Pukul 12:00 – 17:00'),
(10, 'Pukul 18:00 – 21:00');

-- --------------------------------------------------------

--
-- Table structure for table `k_pendidikan`
--

CREATE TABLE `k_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_pendidikan`
--

INSERT INTO `k_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Program Pendidikan Vocal'),
(2, 'Program Pendidikan Lagu Daerah '),
(3, 'Program Pendidikan Alat Musik Tradisional'),
(4, 'Program Pendidikan Alat Musik Modern '),
(5, 'Program Pendidikan Tari Tradisional'),
(6, 'Program Pendidikan Tari Kreasi Baru'),
(7, 'Program Pendidikan Tari Modern'),
(8, 'Program Pendidikan Pentas Seni'),
(15, 'Program Pendidikan Drama Musikal'),
(16, 'Program Pendidikan Teater Tradisional'),
(17, 'Program Pendidikan Teater Modern'),
(18, 'Layanan Sewa Alat Musik'),
(19, 'Layanan Sewa Pakaian Adat'),
(20, 'Layanan Undang Untuk Acara');

-- --------------------------------------------------------

--
-- Table structure for table `k_pendidikan_id`
--

CREATE TABLE `k_pendidikan_id` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `tipe_sanggar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_pendidikan_id`
--

INSERT INTO `k_pendidikan_id` (`id_pendidikan`, `pendidikan`, `tipe_sanggar_id`) VALUES
(1, 'Program Pendidikan Vocal', 3),
(2, 'Program Pendidikan Lagu Daerah', 3),
(3, 'Program Pendidikan Alat Musik Tradisional', 3),
(4, 'Program Pendidikan Alat Musik Modern', 3),
(5, 'Program Pendidikan Tari Tradisional', 1),
(6, 'Program Pendidikan Tari Kreasi Baru', 1),
(7, 'Program Pendidikan Tari Modern', 1),
(8, 'Program Pendidikan Pentas Seni', 2),
(9, 'Program Pendidikan Drama Musikal', 2),
(10, 'Program Pendidikan Teater Tradisional', 2),
(11, 'Program Pendidikan Teater Modern', 2),
(12, 'Layanan Sewa Alat Musik', 1),
(13, 'Layanan Sewa Alat Musik', 2),
(14, 'Layanan Sewa Alat Musik', 3),
(15, 'Layanan Sewa Pakaian Adat', 1),
(16, 'Layanan Sewa Pakaian Adat', 2),
(17, 'Layanan Sewa Pakaian Adat', 3),
(18, 'Layanan Undang Untuk Acara', 1),
(19, 'Layanan Undang Untuk Acara', 2),
(20, 'Layanan Undang Untuk Acara', 3);

-- --------------------------------------------------------

--
-- Table structure for table `k_prasarana`
--

CREATE TABLE `k_prasarana` (
  `id_prasarana` int(11) NOT NULL,
  `prasarana` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_prasarana`
--

INSERT INTO `k_prasarana` (`id_prasarana`, `prasarana`) VALUES
(1, 'Tempat Ibadah '),
(2, 'Kantin'),
(3, 'Area Parkir'),
(4, 'Aula / Auditorium'),
(5, 'Toilet'),
(6, 'Ruang Latihan'),
(7, 'Ruang Administrasi'),
(8, 'Ruang Simpan Alat dan Perlengkapan'),
(9, 'Ruang Ganti '),
(10, 'Ruang Pameran');

-- --------------------------------------------------------

--
-- Table structure for table `k_sarana`
--

CREATE TABLE `k_sarana` (
  `id_sarana` int(11) NOT NULL,
  `sarana` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_sarana`
--

INSERT INTO `k_sarana` (`id_sarana`, `sarana`) VALUES
(1, 'WIFI'),
(2, 'AC'),
(3, 'Sound System'),
(4, 'Komputer'),
(5, 'CCTV'),
(6, 'Video Latihan'),
(7, 'Buku Pembelajaran'),
(8, 'Perlengkapan Kostum'),
(9, 'Perlengkapan Panggung'),
(10, 'Perelengkapan Alat Musik'),
(11, 'Loker '),
(12, 'Rak Sepatu ');

-- --------------------------------------------------------

--
-- Table structure for table `k_umur`
--

CREATE TABLE `k_umur` (
  `id_umur` int(11) NOT NULL,
  `umur` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `k_umur`
--

INSERT INTO `k_umur` (`id_umur`, `umur`) VALUES
(5, 'Untuk Usia 3 – 7 Tahun'),
(6, 'Untuk Usia 7 – 11 Tahun '),
(7, 'Untuk Usia 11 – 17 Tahun'),
(8, 'Untuk Usia 17 - Dewasa');

-- --------------------------------------------------------

--
-- Table structure for table `n_biaya`
--

CREATE TABLE `n_biaya` (
  `id_nb` int(11) NOT NULL,
  `id_biaya` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_biaya`
--

INSERT INTO `n_biaya` (`id_nb`, `id_biaya`, `id_sanggar`) VALUES
(9, 1, 2),
(10, 1, 5),
(11, 1, 8),
(23, 5, 1),
(31, 2, 9),
(32, 5, 10),
(33, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `n_jadwal`
--

CREATE TABLE `n_jadwal` (
  `id_nj` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_jadwal`
--

INSERT INTO `n_jadwal` (`id_nj`, `id_jadwal`, `id_sanggar`) VALUES
(52, 1, 1),
(53, 2, 1),
(56, 1, 10),
(57, 2, 10),
(58, 1, 2),
(59, 6, 5),
(60, 4, 8),
(61, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `n_kriteria`
--

CREATE TABLE `n_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `kriteria` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_kriteria`
--

INSERT INTO `n_kriteria` (`id_kriteria`, `kode`, `kriteria`) VALUES
(1, 'K1', 'Program pendidikan'),
(2, 'K2', 'Umur'),
(3, 'K3', 'Jadwal Sanggar '),
(4, 'K4', 'Sarana'),
(5, 'K5', 'Prasarana'),
(6, 'K6', 'Biaya');

-- --------------------------------------------------------

--
-- Table structure for table `n_pendidikan`
--

CREATE TABLE `n_pendidikan` (
  `id_npen` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_pendidikan`
--

INSERT INTO `n_pendidikan` (`id_npen`, `id_pendidikan`, `id_sanggar`) VALUES
(58, 5, 2),
(354, 18, 1),
(355, 15, 1),
(356, 12, 1),
(362, 5, 10),
(364, 5, 9),
(367, 1, 2),
(369, 3, 2),
(370, 4, 2),
(371, 14, 2),
(372, 2, 2),
(373, 17, 2),
(374, 5, 5),
(375, 6, 5),
(376, 7, 5),
(377, 12, 5),
(378, 5, 8),
(379, 6, 8),
(380, 7, 8),
(381, 12, 8),
(382, 5, 11),
(400, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `n_penilaian`
--

CREATE TABLE `n_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_penilaian`
--

INSERT INTO `n_penilaian` (`id_penilaian`, `id_sanggar`, `id_subkriteria`) VALUES
(1, 1, 2),
(2, 1, 8),
(3, 1, 9),
(4, 1, 13),
(5, 1, 16),
(6, 1, 18),
(7, 2, 3),
(8, 2, 8),
(9, 2, 9),
(10, 2, 13),
(11, 2, 17),
(12, 2, 19),
(13, 8, 4),
(14, 8, 6),
(15, 8, 10),
(16, 8, 12),
(17, 8, 16),
(18, 8, 21),
(19, 5, 4),
(20, 5, 8),
(21, 5, 10),
(22, 5, 13),
(23, 5, 16),
(24, 5, 20);

-- --------------------------------------------------------

--
-- Table structure for table `n_prasarana`
--

CREATE TABLE `n_prasarana` (
  `id_npras` int(11) NOT NULL,
  `id_prasarana` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_prasarana`
--

INSERT INTO `n_prasarana` (`id_npras`, `id_prasarana`, `id_sanggar`) VALUES
(1, 1, 1),
(2, 1, 1),
(33, 1, 10),
(34, 2, 10),
(35, 6, 2),
(36, 5, 2),
(37, 8, 2),
(38, 10, 2),
(39, 7, 2),
(40, 3, 5),
(41, 4, 5),
(42, 10, 5),
(43, 5, 5),
(44, 8, 5),
(45, 1, 8),
(46, 1, 9),
(47, 2, 9),
(48, 3, 9),
(49, 4, 9),
(50, 5, 9),
(51, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `n_sarana`
--

CREATE TABLE `n_sarana` (
  `id_ns` int(11) NOT NULL,
  `id_sarana` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_sarana`
--

INSERT INTO `n_sarana` (`id_ns`, `id_sarana`, `id_sanggar`) VALUES
(18, 1, 1),
(32, 2, 1),
(33, 1, 10),
(34, 2, 10),
(35, 1, 2),
(36, 2, 2),
(37, 3, 2),
(38, 4, 2),
(39, 5, 2),
(40, 1, 5),
(41, 2, 5),
(42, 5, 5),
(43, 3, 5),
(44, 6, 5),
(45, 11, 5),
(46, 1, 9),
(47, 2, 9),
(48, 3, 9),
(49, 4, 9),
(50, 5, 9),
(51, 4, 11),
(52, 6, 11),
(53, 3, 11),
(54, 7, 11),
(55, 5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `n_subkriteria`
--

CREATE TABLE `n_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `subkriteria` varchar(128) NOT NULL,
  `nilai` varchar(128) NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_subkriteria`
--

INSERT INTO `n_subkriteria` (`id_subkriteria`, `subkriteria`, `nilai`, `id_kriteria`) VALUES
(1, '<= 6 program', '5', 1),
(2, '= 5 program', '4', 1),
(3, '= 4 program', '3', 1),
(4, '= 3 program', '2', 1),
(5, '<= 2 program', '1', 1),
(6, 'Sangat Lengkap (>=4)', '3', 2),
(7, 'Lengkap (2 – 3)', '2', 2),
(8, 'Standar (0 – 2)', '1', 2),
(9, 'Sangat Lengkap (>=10)', '3', 3),
(10, 'Lengkap (4 – 8)', '2', 3),
(11, 'Standar (0 – 3)', '1', 3),
(12, 'Sangat Lengkap (>=8)', '3', 4),
(13, 'Lengkap (4 – 7)', '2', 4),
(14, 'Standar (0 – 3)', '1', 4),
(15, 'Sangat Lengkap (>=11)', '3', 5),
(16, 'Lengkap (6 – 10)', '2', 5),
(17, 'Standar (0 – 5)', '1', 5),
(18, '<= 1 juta (Sangat Murah)', '5', 6),
(19, '2 jt s/d 4 juta (Murah)', '4', 6),
(20, '5 jt s/d 7 juta (Sedang)', '3', 6),
(21, '8 jt s/d 10 juta (Mahal)', '2', 6),
(22, '> 10 juta (Sangat Mahal)', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `n_umur`
--

CREATE TABLE `n_umur` (
  `id_nu` int(11) NOT NULL,
  `id_umur` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_umur`
--

INSERT INTO `n_umur` (`id_nu`, `id_umur`, `id_sanggar`) VALUES
(20, 6, 2),
(37, 8, 1),
(50, 8, 10),
(51, 7, 10),
(52, 5, 10),
(53, 6, 10),
(54, 6, 5),
(55, 7, 5),
(56, 8, 5),
(57, 5, 5),
(58, 5, 8),
(59, 5, 9),
(60, 8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `pm_nilaiketetapan_spk`
--

CREATE TABLE `pm_nilaiketetapan_spk` (
  `id` int(11) NOT NULL,
  `gap` varchar(128) NOT NULL,
  `bobot_nilai` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_nilaiketetapan_spk`
--

INSERT INTO `pm_nilaiketetapan_spk` (`id`, `gap`, `bobot_nilai`, `keterangan`) VALUES
(1, '0', '5', 'Kompetensi sesuai kebutuhan'),
(2, '1', '4.5', 'Kompetensi kelebihan 1 tingkat/level'),
(3, '-1', '4', 'Kompetensi kekurangan 1 tingkat/level'),
(4, '2', '3.5', 'Kompetensi kelebihan 2 tingkat/level'),
(5, '-2', '3', 'Kompetensi kekurangan 2 tingkat/level'),
(6, '3', '2.5', 'Kompetensi kelebihan 3 tingkat/level'),
(7, '-3', '2', 'Kompetensi kekurangan 3 tingkat/level'),
(8, '4', '1.5', 'Kompetensi kelebihan 3 tingkat/level'),
(9, '-4', '1', 'Kompetensi kekurangan 4 tingkat/level');

-- --------------------------------------------------------

--
-- Table structure for table `profile_matching`
--

CREATE TABLE `profile_matching` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `pendidikan` float NOT NULL,
  `umur` float NOT NULL,
  `biaya` float NOT NULL,
  `sarana` float NOT NULL,
  `prasarana` float NOT NULL,
  `jadwal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_matching`
--

INSERT INTO `profile_matching` (`id`, `nama`, `pendidikan`, `umur`, `biaya`, `sarana`, `prasarana`, `jadwal`) VALUES
(1, 1, 3, 1, 1, 1, 1, 1),
(2, 2, 5, 1, 5, 2, 2, 1),
(3, 5, 4, 3, 5, 2, 2, 1),
(4, 8, 4, 1, 5, 1, 1, 1),
(5, 9, 2, 1, 4, 2, 2, 1),
(6, 10, 1, 3, 1, 1, 1, 1),
(7, 11, 1, 1, 5, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_matching_jenis_kriteria`
--

CREATE TABLE `profile_matching_jenis_kriteria` (
  `id` int(11) NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `sarana` int(11) NOT NULL,
  `prasarana` int(11) NOT NULL,
  `jadwal` int(11) NOT NULL,
  `percentace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_matching_jenis_kriteria`
--

INSERT INTO `profile_matching_jenis_kriteria` (`id`, `pendidikan`, `umur`, `biaya`, `sarana`, `prasarana`, `jadwal`, `percentace`) VALUES
(1, 1, 1, 1, 0, 0, 0, 60);

-- --------------------------------------------------------

--
-- Table structure for table `profile_matching_nilai`
--

CREATE TABLE `profile_matching_nilai` (
  `id` int(11) NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `sarana` int(11) NOT NULL,
  `prasarana` int(11) NOT NULL,
  `jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile_matching_rangking`
--

CREATE TABLE `profile_matching_rangking` (
  `id` int(11) NOT NULL,
  `alternatif` int(128) NOT NULL,
  `nilai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(0, 'Belum bayar'),
(1, 'Diproses'),
(2, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `s_atribut`
--

CREATE TABLE `s_atribut` (
  `id` int(11) NOT NULL,
  `jenis_atribut` varchar(128) NOT NULL,
  `nama_atribut` varchar(128) NOT NULL,
  `keterangan_atribut` text NOT NULL,
  `harga` varchar(128) NOT NULL,
  `denda` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_atribut`
--

INSERT INTO `s_atribut` (`id`, `jenis_atribut`, `nama_atribut`, `keterangan_atribut`, `harga`, `denda`, `gambar`, `status`, `id_sanggar`) VALUES
(7, 'kostum tari', 'kostum tari kembang kota bambu', 'harga tercantum adalah harga sewa 1 set kostum', '150000', '20000', '67414788_364798750868011_9138430468275604166_n.jpg', 1, 2),
(12, 'Pakaian adat', 'Baju Pangsi dan Kebaya Sunda + Kain Kebat', 'Pengelompokan pakaian adat Jawa Barat yang pertama adalah untuk kalangan rakyat biasa. Seperti namanya, tampilan luar pakaian Sunda ini tentu sangatlah sederhana dan terkesan usang. Kaum jelata di daerah Sunda itu identik dengan kaum petani yang seperti sudah punya gaya pakaian yang khas.', '100000', '20000', 'adat_sunda.jpg', 0, 1),
(13, 'Kanigaran', 'pakaian adat tradisional jawa', 'Kanigaran di buat untuk para golongan bangsawan. Pakaian ini juga sering digunakan untuk moment-moment yang sangat membahagiakan bagi kedua pasangan yaitu hari pernikahan.\r\n\r\nAlasan pakaian kanigaran sering di gunakan untuk para penggantin karena makna yang terkandung dalam pakaian adat  ini memiliki nilai yang sangat kental. Sehingga cocok untuk digunakan saat hari pernikahan.', '150000', '30000', 'adat_jawa.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `s_galeri`
--

CREATE TABLE `s_galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_galeri`
--

INSERT INTO `s_galeri` (`id`, `foto`, `id_sanggar`) VALUES
(14, 'berita1.jpg', 1),
(15, 'berita2.jpg', 1),
(17, 'WhatsApp_Image_2021-01-18_at_15_50_22_(1).jpeg', 9),
(18, 'WhatsApp_Image_2021-01-18_at_15_50_22.jpeg', 9),
(19, 'WhatsApp_Image_2021-01-18_at_15_50_21.jpeg', 9),
(20, 'WhatsApp_Image_2021-01-18_at_15_50_17_(1).jpeg', 9),
(21, 'WhatsApp_Image_2021-01-18_at_15_50_17.jpeg', 9),
(22, '67414788_364798750868011_9138430468275604166_n.jpg', 2),
(23, '89826033_289555505356756_3991405450200136364_n.jpg', 2),
(24, '89057695_535604050421981_7136630729873685244_n.jpg', 2),
(25, '75467917_1186524441545364_4180200099524020647_n.jpg', 2),
(26, '79530320_1045849092474726_5627675868476560477_n.jpg', 2),
(27, '81431476_155449709093150_5209050204960372684_n.jpg', 5),
(28, '82011766_2499607636955352_451614006628551738_n.jpg', 5),
(29, '82806494_285250085766381_2518432513941176383_n.jpg', 5),
(30, '80037310_176845780066981_3723240828322236248_n.jpg', 5),
(31, '17934248_654958711371417_4483143462643826688_n.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `s_jadwal_latihan`
--

CREATE TABLE `s_jadwal_latihan` (
  `id_jadwal_latihan` int(11) NOT NULL,
  `judul_latihan` varchar(128) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `jam_latihan` varchar(128) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_jadwal_latihan`
--

INSERT INTO `s_jadwal_latihan` (`id_jadwal_latihan`, `judul_latihan`, `id_kelas`, `id_jadwal`, `jam_latihan`, `id_sanggar`) VALUES
(8, 'Latihan musik C', 9, 3, '14:30', 1),
(13, 'untuk senior', 14, 3, '21:02', 1),
(14, 'tari kembang', 20, 1, '19:00', 2),
(15, 'belajar ngelenong', 21, 6, '21:00', 2),
(16, 'palang pintu', 22, 7, '21:00', 2),
(17, 'musik gambang kromong', 23, 6, '14:00', 2),
(18, 'tari japin', 15, 6, '19:00', 9),
(19, 'tari manuk dadali', 16, 6, '19:00', 9),
(20, 'tari bibir merah', 17, 7, '19:00', 9),
(21, 'tari sirih kuning', 19, 7, '19:00', 9),
(22, 'palang pintu', 25, 6, '15:00', 5),
(23, 'tari topeng', 26, 7, '15:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `s_kelas`
--

CREATE TABLE `s_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL,
  `id_umur` int(11) NOT NULL,
  `deskripsi_kelas` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_kelas`
--

INSERT INTO `s_kelas` (`id`, `nama_kelas`, `id_umur`, `deskripsi_kelas`, `gambar`, `id_sanggar`) VALUES
(8, 'Kelas Menari', 6, '...', 'piring2.jpg', 1),
(9, 'Kelas Tari Tradisional', 5, '...', 'piring1.jpg', 1),
(14, 'bernyanyi bernyanyi', 7, 'kelas bernyanyi', 'WhatsApp_Image_2021-01-13_at_23_21_55.jpeg', 1),
(15, 'tari japin', 8, '', 'WhatsApp_Image_2021-01-18_at_15_50_17.jpeg', 9),
(16, 'tari manuk dadali', 8, '', 'WhatsApp_Image_2021-01-18_at_15_50_17_(1).jpeg', 9),
(17, 'tari bibir merah', 8, '', 'WhatsApp_Image_2021-01-18_at_15_50_21.jpeg', 9),
(18, 'tari ondel-ondel', 8, '', 'WhatsApp_Image_2021-01-18_at_15_50_22.jpeg', 9),
(19, 'tari sirih kuning', 8, '', 'WhatsApp_Image_2021-01-18_at_15_50_22_(1)1.jpeg', 9),
(20, 'tari kembang kota bambu', 7, '', 'tarikembang.PNG', 2),
(21, 'lenong betawi', 8, '', 'lenong.PNG', 2),
(22, 'palang pintu', 8, '', 'palang.PNG', 2),
(23, 'gambang kromong', 8, '', 'gambang.PNG', 2),
(25, 'palang pintu', 8, '', '80037310_176845780066981_3723240828322236248_n.jpg', 5),
(26, 'tari topeng', 7, '', '17934248_654958711371417_4483143462643826688_n.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `s_paket_undang`
--

CREATE TABLE `s_paket_undang` (
  `id` int(11) NOT NULL,
  `jenis_paket` varchar(128) NOT NULL,
  `nama_paket` varchar(128) NOT NULL,
  `keterangan_paket` text NOT NULL,
  `harga` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_paket_undang`
--

INSERT INTO `s_paket_undang` (`id`, `jenis_paket`, `nama_paket`, `keterangan_paket`, `harga`, `gambar`, `status`, `id_sanggar`) VALUES
(5, 'Tari', 'Tari Remo', 'Tari Remo berasal dari daerah Jombang Jawa Timur. Tarian ini diciptakan oleh seorang pengamen dan dalam perkembangannya, tari Remo sangat dikagumi oleh masyarakat Jawa Timur. Kini tari Remo menjadi salah satu tarian pembuka setiap pertunjukan kesenian Ludruk di Jawa Timur.\r\n\r\nJika dillihat dari gerak kaki yang energik, maka kita temukan keunikan dari Tari Remo. Kesan yang dihadirkan sangat sarat dengan suasana ceria dan bahagia. Busana atau kostum yang menjadi properti tari Remo yang dikenal terdapat tiga jenis yakni:\r\n\r\nGaya Surabayan,\r\nGaya Jombangan,\r\ndan Gaya Sawunggaling.', '50000', 'tari_remo.jpg', 1, 1),
(6, 'Tari', 'Tari Jaranan Kepak', 'Ini juga termasuk dalam tarian daerah Jawa Timur yaitu Tari Jaranan (Tari Jaran Kepang). Makna dari Tari Jaranan adalah tari tradisional yang dimainkan oleh para penari dengan menaiki kuda tiruan yang tebuat dari anyaman bambu.  Pesan yang ingin disampiakn oleh Tari jaranan ini menceritakan tentang sosok pahlawan. Dimana ilustrasinya seorang perajurit yang gagah perkasa sedang menunggang kuda. Yang selalu membuat heboh adalah, pada tarian Jaranan sering ada kejadian pertunjukan atraksi kesurupan.  Kesimpulan singkatnya, selain kaya akan nilai seni dan budaya, tarian ini juga sangat kental akan kesan magis dan nilai spiritual.', '500000', 'tari_jaranan_kepak.jpg', 0, 1),
(7, 'tari', 'palang pintu', '', '1500000', 'palang.PNG', 0, 2),
(13, 'tari', 'tari japin', '', '1500000', 'WhatsApp_Image_2021-01-18_at_15_50_17.jpeg', 1, 9),
(14, 'tari', 'tari manuk dadali', '', '1500000', 'WhatsApp_Image_2021-01-18_at_15_50_17_(1).jpeg', 1, 9),
(15, 'tari', 'tari bibir merah', '', '1500000', 'WhatsApp_Image_2021-01-18_at_15_50_21.jpeg', 1, 9),
(16, 'tari', 'tari ondel-ondel', '', '1500000', 'WhatsApp_Image_2021-01-18_at_15_50_22.jpeg', 1, 9),
(17, 'tari', 'tari sirih kuning', '', '1500000', 'WhatsApp_Image_2021-01-18_at_15_50_22_(1).jpeg', 1, 9),
(18, 'musik', 'gambang kromong', '', '2000000', '89057695_535604050421981_7136630729873685244_n.jpg', 1, 2),
(19, 'tari', 'ondel-ondel', '', '700000', '79530320_1045849092474726_5627675868476560477_n1.jpg', 1, 2),
(20, 'tari', 'tari tradisional kembang', '', '1000000', 'tarikembang.PNG', 1, 2),
(21, 'kesenian betawi', 'palang pintu', '', '2000000', '80037310_176845780066981_3723240828322236248_n.jpg', 1, 5),
(22, 'tari', 'tari topeng', '', '1000000', '17934248_654958711371417_4483143462643826688_n.jpg', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul_berita`, `keterangan`, `pengirim`, `date_created`, `gambar`) VALUES
(17, 'Karena Corona, Sumbar Batal Gelar Indonesian Channel 2020', 'Provinsi Sumatera Barat batal menjadi tuan rumah pada puncak acara Pagelaran Seni Indonesian Channel (Inchan) 2020 yang melibatkan sekira 140 peserta  70 negara peserta program beasiswa seni dan budaya Indonesia (BSBI) disebabkan adanya pandemi Covid-19\r\n\r\nKepala Dinas Pariwisata Provinsi Sumatera Barat Novrial mengatakan acara Inchan 2020 dinilai spesial bagi daerah itu dikarenakan satu minggu sebelum puncak acara seratusan peserta sudah berada di Padang, setelah sebelumnya mereka disebar di tujuh provinsi untuk belajar seni, budaya dan adat istiadat setempat.\r\n\r\n&quot;Semula Padang dipilih karena seni dan budaya yang variatif, selain Bali dan Jawa Timur dan peserta tinggal di rumah-rumah penduduk selama pelaksanaan kegiatan di bawah bimbingan orang tua asuh,&quot; kata Novrial di Padang, Minggu 14 Juni 2020,\r\n\r\nRencananya selama sepekan peserta pagelaran akan dibawa keliling Sumatera Barat menyaksikan keindahan objek-objek wisata dan keunikan tradisi budaya setempat yang kaya makna. Biasanya selain dihadiri peserta, orang tua peserta serta kedutaan besar dari masing-masing negara juga datang dan bermalam di Sumatera Barat dan kehadiran mereka tentunya memberikan dampak ikutan yang besar tidak hanya bagi pelaku usaha pariwisata tapi juga penjual cenderamata dan makanan khas daerah.', 'Muhammad Rizki Awaludin', 1609302314, 'berita1.jpg'),
(18, 'Gamelan Indonesia Keliling Amerika, Ketahui Apa Misinya', 'Amerika Serikat - Gamelan kini tak melulu tampil di acara pernikahan atau upacara adat. Di Amerika Serikat, gamelan Jawa Tengah dan gamelan Sunda menjadi seni tinggi yang menarik perhatian warga dari tujuh kota.\r\n\r\nPuluhan siswa Sekolah Bogor Raya berkeliling ke tujuh kota di Amerika Serikat untuk mengenalkan gamelan dan budaya Indonesia. Dalam tur selama dua pekan ini, mereka berkeliling ke sejumlah kampus dengan harapan menghidupkan kembali unit kesenian gamelan di sejumlah universitas di Amerika yang kekurangan dana dan sumber daya.\r\n\r\nKetua Alumnus University of Michigan di Indonesia, Henry Rahardja mengatakan, setidaknya ada seratus kampus di Amerika yang memiliki unit gamelan. Namun sebagian besar di antaranya tak aktif. &quot;Banyak yang sudah pudar. Misalnya, guru gamelannya pindah sehingga unitnya tutup,&quot; kata Henry kepada Tempo di Ann Arbor, Michigan.\r\n\r\nTur gamelan ini singgah di tujuh kota yaitu Northern Illinois University, Chicago; University of Wisconsin-Madison; Lafayette, Indiana (Purdue University); Bloomington, Indiana (University of Indiana); Richmond; dan Columbus, Ohio. Tur berlangsung sejak 26 September 2019 dan berakhir di University of Michigan, Ann Arbor pada Rabu malam, 9 Oktober 2019.', 'Muhammad Rizki Awaludin', 1609302378, 'berita2.jpg'),
(19, 'Wabah COVID-19, MAC UI Gelar Tadarus Seni Ramadan Secara online', 'Makara Art Centre Universitas Indonesia (MAC UI) menggelar acara Tadarus Seni Ramadhan secara online (live streaming) selama bulan Ramadan. Kegiatan ini hasil kerja sama MAC UI dan gerakan &quot;akuIndonesia&quot; serta Komunitas Musisi Ngaji (Komuji) Jakarta.\r\n\r\nKepala MAC UI Al-Zastrouw mengatakan, acara ini digagas oleh MAC UI sebagai bentuk kepedulian Universita Indonesia atas merebaknya wabah COVID-19 di tengah bulan Ramadan. &quot;Melalui seni, kami ingin mengajak masyarakat tetap tegar dan semangat menghadapi situasi tanpa kehilangan kebahagiaan,&quot; ucapnya dalam keterangan tertulisnya, Kamis, 30 April 2020.', 'Muhammad Rizki Awaludin', 1609302408, 'berita3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id` int(11) NOT NULL,
  `judul_event` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `tanggal_event` date NOT NULL,
  `date_created` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id`, `judul_event`, `keterangan`, `pengirim`, `tanggal_event`, `date_created`, `gambar`) VALUES
(14, 'PEMENTASAN TEATER VIRTUAL: MUSIKAL CALON ARANG', 'uk kita nikmati akhir pekan dengan menyaksikan pementasan teater virtual: Musikal Calon Arang di channel Youtube Budaya Maju https://www.youtube.com/channel/UCxEpQ47_c_56OS_vguK8_dQ.\r\n\r\nPementasan teater virtual ini mengusung cerita rakyat asal Jawa-Bali berjudul Calon Arang karya Dolfry Inda Suri dan Sutradara Rudolf Puspa.⁣', 'Muhammad Rizki Awaludin', '2020-09-15', 1599891017, 'event2.jpg'),
(17, 'LUTUNG KASARUNG', 'Nonton ya di youtube resmi Indonesia Kaya https://www.youtube.com/watch?v=VidpFNBv1sI\r\nPukul 20.00 WIB.\r\n \r\nMusikal ini kerjasama Boow Live, Indonesia Kaya, EKI Dance Company, dan Kalyana Shira Films.\r\n \r\nMusikal ini disutradarai oleh Rusdy Rukmarata dan Nia Dinata. \r\nPenata musik: Oni Krisnerwinto\r\nPemain:  Gusty Pratama, Nala Amrytha, Ara Ajisiwi, Beyon Destiano, Yuliani Ho, Alip Purnomo, Kristanto, Refen Paryohanda, Sonachi Akko, Kurnia Dharma Surya, Komang Ariawan, Yudhi Fong\r\n \r\nDan Masih banyak lagi teman-teman kita yang terlibat dalam produksi musikal ini. \r\n \r\nDukung Musikal Lutung Kasarung, dengan NONTON, LIKE, dan KOMEN di youtube.\r\n \r\nHanya tayang sampai tanggal 3 September. Jangan sampai terlewatkan !\r\n \r\nSee you nanti malam jam 20.00 WIB!', 'Sanggar seni tari pratiwi', '2020-09-29', 1600222844, 'event3.jpeg'),
(21, 'GORO-GORO MAHABARATA 2', 'Semar dan Togog turun ke marcapada dan ditugaskan menghamba kepada raja-raja di sana. Semar menjadi panakawan para ksatria yang membela kebenaran. Sedang Togog menghamba kepada para raksasa penyebar kejahatan.\r\n \r\nNasib mereka sangat berbeda. Semar sangat dihormati oleh para ksatria yang dibimbingnya. Pendapat dan nasehatnya dituruti. Sedangkan Togog, oleh para raja angkara, nasehatnya kadang didengar, lebih sering disepelekan.\r\n \r\nKini, Semar mengabdi kepada Raja Medangkamulyan, Prabu Srimahapunggung. Togog menghamba kepada Raja Raksasa Kerajaan Sonyantaka, Prabu Bukbangkalan.\r\n \r\nKetika Medangkamulyan panen padi melimpah-ruah, Sonyantaka malah diserang paceklik, maka Bukbangkalan pasang rencana merampok Medangkamulyan. Meski dicegah Togog, niatnya itu tetap dilaksanakan. Di tengah jalan, Bukbangkalan juga bersekutu dengan Batara Kala.\r\n \r\nApa yang akan terjadi terhadap kerajaan Medangkamulyan? Saran apa yang akan diberikan Semar untuk mengatasi serbuan para raksasa Sonyantaka? Apakah akhirnya Togog mampu menasehati Bukbangkalan agar tak menyerang Medangkamulyan?', 'Muhammad Rizki Awaludin', '2020-12-25', 1609302517, 'event1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(200) NOT NULL,
  `jenis_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `kriteria`, `jenis_kriteria`, `bobot_kriteria`) VALUES
(1, 'Program Pendidikan', 'CF', 5),
(2, 'Umur', 'CF', 3),
(3, 'Jadwal Latihan Sanggar', 'SF', 3),
(4, 'Sarana', 'SF', 3),
(5, 'Prasarana', 'SF', 3),
(6, 'Biaya', 'CF', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `kode_pendaftaran` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `status_pendaftaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`kode_pendaftaran`, `id_user`, `id_sanggar`, `id_kelas`, `tanggal_pendaftaran`, `status_pendaftaran`) VALUES
('KP-001', 3, 1, 9, '2021-01-08', 2),
('KP-002', 3, 9, 16, '2021-01-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengundang`
--

CREATE TABLE `tb_pengundang` (
  `kode_undang` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL,
  `id_paket_undang` int(11) NOT NULL,
  `nama_acara` varchar(128) NOT NULL,
  `tanggal_undang` date NOT NULL,
  `tanggal_acara` date NOT NULL,
  `biaya_undang` varchar(128) NOT NULL,
  `bukti_pembayaran` varchar(128) DEFAULT NULL,
  `status_undang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengundang`
--

INSERT INTO `tb_pengundang` (`kode_undang`, `id_user`, `id_sanggar`, `id_paket_undang`, `nama_acara`, `tanggal_undang`, `tanggal_acara`, `biaya_undang`, `bukti_pembayaran`, `status_undang`) VALUES
('KU-001', 3, 1, 6, 'pernikahan', '2020-12-07', '2020-12-31', '500000', '1.png', 1),
('KU-003', 3, 1, 6, 'kawinan', '2021-01-13', '2021-12-31', '500000', '7.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyewaan`
--

CREATE TABLE `tb_penyewaan` (
  `kode_sewa` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL,
  `id_atribut` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `harga_sewa` varchar(128) NOT NULL,
  `denda_sewa` varchar(128) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `bukti_pembayaran` varchar(128) DEFAULT NULL,
  `status_sewa` int(11) NOT NULL,
  `status_pengembalian` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyewaan`
--

INSERT INTO `tb_penyewaan` (`kode_sewa`, `id_user`, `id_sanggar`, `id_atribut`, `tanggal_sewa`, `tanggal_kembali`, `lama_sewa`, `harga_sewa`, `denda_sewa`, `tanggal_pengembalian`, `bukti_pembayaran`, `status_sewa`, `status_pengembalian`) VALUES
('KS-002', 3, 1, 12, '2021-01-09', '2021-01-12', 3, '300000', '40000', '2021-01-14', '2.png', 1, 0),
('KS-003', 3, 1, 12, '2021-01-17', '2021-01-18', 1, '100000', '', '0000-00-00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `nama_pemilik` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`id`, `id_sanggar`, `nama_bank`, `nomor_rekening`, `nama_pemilik`) VALUES
(3, 1, 'BNI', '61616161', 'rizki'),
(4, 1, 'BCA', '998291823919139123', 'rizki aw');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria`
--

CREATE TABLE `tb_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `subkriteria` varchar(200) NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_subkriteria`
--

INSERT INTO `tb_subkriteria` (`id_subkriteria`, `subkriteria`, `id_kriteria`) VALUES
(5, 'Program Pendidikan Vocal', 1),
(7, 'Program Pendidikan Alat Musik Tradisional', 1),
(8, 'Program Pendidikan Alat Musik Modern', 1),
(12, 'Program Pendidikan Tari Tradisional', 1),
(25, '<= 1 juta', 6),
(26, '2 - 4 juta', 6),
(27, '5 - 7 juta', 6),
(28, '8 - 10 juta', 6),
(29, '> 10 juta', 6),
(30, 'Program Pendidikan Tari Kreasi Baru', 1),
(31, 'Program Pendidikan Tari Modern', 1),
(32, 'Program Pendidikan Pentas Seni', 1),
(33, 'Program Pendidikan Drama Musikal', 1),
(34, 'Program Pendidikan Teater Tradisional', 1),
(35, 'Program Pendidikan Teater Modern', 1),
(36, 'Layanan Sewa Alat Musik', 1),
(37, 'Layanan Sewa Alat Musik', 1),
(38, 'Layanan Sewa Alat Musik', 1),
(39, 'Layanan Sewa Pakaian Adat', 1),
(40, 'Layanan Sewa Pakaian Adat', 1),
(41, 'Layanan Sewa Pakaian Adat', 1),
(42, 'Layanan Undang Untuk Acara', 1),
(43, 'Layanan Undang Untuk Acara', 1),
(44, 'Layanan Undang Untuk Acara', 1),
(45, 'Untuk Usia 3 – 7 Tahun', 2),
(46, 'Untuk Usia 7 – 11 Tahun', 2),
(47, 'Untuk Usia 11 – 17 Tahun', 2),
(48, 'Untuk Usia 17 - Dewasa', 2),
(49, 'Senin', 3),
(50, 'Selasa', 3),
(51, 'Rabu', 3),
(52, 'Kamis', 3),
(53, 'Jumat', 3),
(54, 'Sabtu', 3),
(55, 'Minggu', 3),
(56, 'Pukul 07:00 – 12:00', 3),
(57, 'Pukul 12:00 – 17:00', 3),
(58, 'Pukul 18:00 – 21:00', 3),
(59, 'WIFI', 4),
(60, 'AC', 4),
(61, 'Sound System', 4),
(62, 'Komputer', 4),
(63, 'CCTV', 4),
(64, 'Video Latihan', 4),
(65, 'Buku Pembelajaran', 4),
(66, 'Perlengkapan Kostum', 4),
(67, 'Perlengkapan Panggung', 4),
(68, 'Perlengkapan Alat Musik', 4),
(69, 'Loker', 4),
(70, 'Rak Sepatu', 4),
(71, 'Tempat Ibadah', 5),
(72, 'Kantin', 5),
(73, 'Area Parkir', 5),
(74, 'Aula / Auditorium', 5),
(75, 'Toilet', 5),
(76, 'Ruang Latihan', 5),
(77, 'Ruang Administrasi', 5),
(78, 'Ruang Simpan Alat dan Perlengkapan', 5),
(79, 'Ruang Ganti', 5),
(80, 'Ruang Pameran', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nomor_telepon` varchar(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `nomor_telepon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `gambar`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Muhammad Rizki Awaludin', 'rizkiawaludin323@gmail.com', '082117068976', 'Tangerang', '1999-03-23', 'Laki-laki', 'tangerang', '6.png', '$2y$10$zM1khL0ONOJT71Y1scfKQ.eljRixUIwY2wW69Enng5Qu4kVGPFAzS', 1, 1, 1598422095),
(3, 'Annisa Anggitya', 'annisa.anggitya12@gmail.com', '08219111111', 'Tangerang', '1990-07-10', 'Perempuan', 'Tangerang selatan', 'a3fb96fa-4835-4277-a26d-8e483526e014.jpg', '$2y$10$8R7GZTDKCDSHuXJLiRh8luR74ukbmhL9cFrRKN885dGDN8yxuXJqy', 3, 1, 1598422705);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 2, 2),
(5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'administrator'),
(2, 'sanggar'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'sanggar'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sanggar`
--

CREATE TABLE `user_sanggar` (
  `id_sanggar` int(11) NOT NULL,
  `nama_sanggar` varchar(128) NOT NULL,
  `nama_ketua` varchar(128) NOT NULL,
  `tipe_sanggar_id` int(11) NOT NULL,
  `deskripsi_seni` text NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` varchar(225) NOT NULL,
  `longitude` varchar(225) NOT NULL,
  `foto_sanggar` varchar(128) NOT NULL,
  `foto_ketua_sanggar` varchar(128) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `penyewaan` int(1) NOT NULL,
  `undang_acara` int(1) NOT NULL,
  `pendaftaran` int(1) NOT NULL,
  `view` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sanggar`
--

INSERT INTO `user_sanggar` (`id_sanggar`, `nama_sanggar`, `nama_ketua`, `tipe_sanggar_id`, `deskripsi_seni`, `nomor_telepon`, `email`, `alamat`, `latitude`, `longitude`, `foto_sanggar`, `foto_ketua_sanggar`, `password`, `role_id`, `is_active`, `date_created`, `penyewaan`, `undang_acara`, `pendaftaran`, `view`) VALUES
(1, 'Sanggar seni tari pratiwi', 'Pratiwi Setiawati', 1, 'sanggar seni pratiwi, berdiri pada tahun', '081908881872', 'pratiwi@gmail.com', 'Jl. Mesjid II No.6, RT.6/RW.2, Cengkareng Bar., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730', '-6.1372265809589965', '106.74128016372188', 'sanggar_pratiwi.jpeg', 'sanggar_pratiwi.jpeg', '$2y$10$y8n0Aln9wICWG7D44k5G3uZaSgjtsd7ke4JHYV.3jpUZa6oGiF6wC', 2, 1, 1599276186, 1, 1, 1, 11),
(2, 'Sanggar seni betawi kota bambu', 'Joko', 3, 'sanggar ini di dirikan pada tahun 2010', '089211221', 'bambu@gmail.com', 'tangerang', '-6.167435646489006', '106.7488268520993', 'sanggar_betawi.jpeg', 'avatar.jpg', '$2y$10$1YEiMhnyNvtJUpjnuUK/KefYZTZOG707Qbdz5PhSxGiSUJRKxae5W', 2, 1, 1599305667, 1, 1, 1, 0),
(5, 'Sanggar seni kayu manis', 'Joko', 1, 'sanggar ini di dirikan pada tahun 2010', '087887187', 'kayumanis@gmail.com', 'kp kelapa', '-6.189366008919849', '106.76625421145252', 'Capture.PNG', 'avatar.jpg', '$2y$10$VnpxNCsqwGBXsxncM/jiAub0NcprdpqFhcKYF.m5FYrhdfxxBA8wu', 2, 1, 1599966003, 0, 1, 1, 2),
(8, 'Sanggar tari nusantara selendang merah', 'Joko', 1, 'sanggar ini di dirikan pada tahun 2010', '081291289', 'selendang_merah@gmail.com', 'tangerang', '-6.177846282023312', '106.7853946218549', 'selendang_merah.jpeg', 'avatar.jpg', '$2y$10$nvEvGbHPuglpD5.2qPSOtux6ndT6fEaQdPxzeNMRsEs002mRrrd1y', 2, 1, 1602224983, 0, 0, 0, 0),
(9, 'Sanggar tari rasuna said', 'Milah sari', 1, 'Kenapa namanya sanggar Rasuna said, krna org org didlmnya kita baru menerima perempuan aja si sejauh ini, terus di PMII juga kan para kopri nya memperjuangkan hak hak perempuan kaya Hajjah Rasuna said ini beliau pahlawan Nasional Indonesia yg memperjuangkan persamaan laki laki dan pr jadi kaya satu kesatuan aja maknya namanya itu', '088212811', 'hcy.shop01@gmail.com', 'Jl. Pulo Harapan Indah No.12, RT.9/RW.10, Cengkareng Bar., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730', '-6.139473828663665', '106.72399707449647', 'rasuna.jpeg', 'rasuna.jpeg', '$2y$10$adhhFSz.lY7lgJBL0JmyfuMn84lcFkWMyTewPsorWhkLvZ0Pz8q7O', 2, 1, 1606800841, 0, 1, 1, 18),
(10, 'Sanggar RDC Nusantara', '', 1, 'sanggar ini di dirikan pada tahun 2010', '0821199811', 'nusantara@gmail.com', 'xyz', '-6.172982427259872', '106.77190735027179', 'rdc.jpeg', '', '$2y$10$MQfbeb2gixcttapohImt2.dET8bwso..cTweWtK2g5tJ11rG4PNr6', 2, 1, 1607970610, 0, 0, 0, 0),
(11, 'Sanggar seni nusantara ratoeh jaroe', '', 1, 'sanggar ini di dirikan pada tahun 2010', '081988199', 'ratoeh@gmail.com', 'a', '-6.1672649701425915', '106.76136271765802', 'ratoe.jpeg', '', '$2y$10$8su.YhIAEiUFqLRTYWZ55eh8Eh4cMn8XVjNuNMGMgKd4HpoOAUFom', 2, 1, 1607970973, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(225) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jumlah_pengunjung`
--
ALTER TABLE `jumlah_pengunjung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanggar` (`id_sanggar`);

--
-- Indexes for table `jumlah_transaksi`
--
ALTER TABLE `jumlah_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_tipe_sanggar`
--
ALTER TABLE `kategori_tipe_sanggar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_biaya`
--
ALTER TABLE `k_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `k_jadwal`
--
ALTER TABLE `k_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `k_pendidikan`
--
ALTER TABLE `k_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `k_pendidikan_id`
--
ALTER TABLE `k_pendidikan_id`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `k_prasarana`
--
ALTER TABLE `k_prasarana`
  ADD PRIMARY KEY (`id_prasarana`);

--
-- Indexes for table `k_sarana`
--
ALTER TABLE `k_sarana`
  ADD PRIMARY KEY (`id_sarana`);

--
-- Indexes for table `k_umur`
--
ALTER TABLE `k_umur`
  ADD PRIMARY KEY (`id_umur`);

--
-- Indexes for table `n_biaya`
--
ALTER TABLE `n_biaya`
  ADD PRIMARY KEY (`id_nb`),
  ADD KEY `id_biaya` (`id_biaya`),
  ADD KEY `id_sanggar` (`id_sanggar`);

--
-- Indexes for table `n_jadwal`
--
ALTER TABLE `n_jadwal`
  ADD PRIMARY KEY (`id_nj`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_sanggar` (`id_sanggar`);

--
-- Indexes for table `n_kriteria`
--
ALTER TABLE `n_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `n_pendidikan`
--
ALTER TABLE `n_pendidikan`
  ADD PRIMARY KEY (`id_npen`),
  ADD KEY `n_pendidikan_ibfk_2` (`id_sanggar`),
  ADD KEY `n_pendidikan_ibfk_3` (`id_pendidikan`);

--
-- Indexes for table `n_penilaian`
--
ALTER TABLE `n_penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_sanggar` (`id_sanggar`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `n_prasarana`
--
ALTER TABLE `n_prasarana`
  ADD PRIMARY KEY (`id_npras`),
  ADD KEY `id_prasarana` (`id_prasarana`),
  ADD KEY `id_sanggar` (`id_sanggar`);

--
-- Indexes for table `n_sarana`
--
ALTER TABLE `n_sarana`
  ADD PRIMARY KEY (`id_ns`),
  ADD KEY `id_sanggar` (`id_sanggar`),
  ADD KEY `id_sarana` (`id_sarana`);

--
-- Indexes for table `n_subkriteria`
--
ALTER TABLE `n_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `n_umur`
--
ALTER TABLE `n_umur`
  ADD PRIMARY KEY (`id_nu`),
  ADD KEY `id_sanggar` (`id_sanggar`),
  ADD KEY `id_umur` (`id_umur`);

--
-- Indexes for table `pm_nilaiketetapan_spk`
--
ALTER TABLE `pm_nilaiketetapan_spk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_matching`
--
ALTER TABLE `profile_matching`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `profile_matching_jenis_kriteria`
--
ALTER TABLE `profile_matching_jenis_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_matching_nilai`
--
ALTER TABLE `profile_matching_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_matching_rangking`
--
ALTER TABLE `profile_matching_rangking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif` (`alternatif`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_atribut`
--
ALTER TABLE `s_atribut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanggar` (`id_sanggar`);

--
-- Indexes for table `s_galeri`
--
ALTER TABLE `s_galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanggar_id` (`id_sanggar`);

--
-- Indexes for table `s_jadwal_latihan`
--
ALTER TABLE `s_jadwal_latihan`
  ADD PRIMARY KEY (`id_jadwal_latihan`),
  ADD KEY `id_sanggar` (`id_sanggar`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `s_jadwal_latihan_ibfk_3` (`id_kelas`);

--
-- Indexes for table `s_kelas`
--
ALTER TABLE `s_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanggar` (`id_sanggar`),
  ADD KEY `id_umur` (`id_umur`);

--
-- Indexes for table `s_paket_undang`
--
ALTER TABLE `s_paket_undang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanggar` (`id_sanggar`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `jenis_kriteria` (`jenis_kriteria`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`kode_pendaftaran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_sanggar` (`id_sanggar`);

--
-- Indexes for table `tb_pengundang`
--
ALTER TABLE `tb_pengundang`
  ADD PRIMARY KEY (`kode_undang`),
  ADD KEY `id_sanggar` (`id_sanggar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_paket_undang` (`id_paket_undang`);

--
-- Indexes for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  ADD PRIMARY KEY (`kode_sewa`),
  ADD KEY `id_atribut` (`id_atribut`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sanggar` (`id_sanggar`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sanggar`
--
ALTER TABLE `user_sanggar`
  ADD PRIMARY KEY (`id_sanggar`),
  ADD KEY `tipe_sanggar_id` (`tipe_sanggar_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jumlah_pengunjung`
--
ALTER TABLE `jumlah_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `jumlah_transaksi`
--
ALTER TABLE `jumlah_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori_tipe_sanggar`
--
ALTER TABLE `kategori_tipe_sanggar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `k_biaya`
--
ALTER TABLE `k_biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `k_jadwal`
--
ALTER TABLE `k_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `k_pendidikan`
--
ALTER TABLE `k_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `k_pendidikan_id`
--
ALTER TABLE `k_pendidikan_id`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `k_prasarana`
--
ALTER TABLE `k_prasarana`
  MODIFY `id_prasarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `k_sarana`
--
ALTER TABLE `k_sarana`
  MODIFY `id_sarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `k_umur`
--
ALTER TABLE `k_umur`
  MODIFY `id_umur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `n_biaya`
--
ALTER TABLE `n_biaya`
  MODIFY `id_nb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `n_jadwal`
--
ALTER TABLE `n_jadwal`
  MODIFY `id_nj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `n_kriteria`
--
ALTER TABLE `n_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `n_pendidikan`
--
ALTER TABLE `n_pendidikan`
  MODIFY `id_npen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `n_penilaian`
--
ALTER TABLE `n_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `n_prasarana`
--
ALTER TABLE `n_prasarana`
  MODIFY `id_npras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `n_sarana`
--
ALTER TABLE `n_sarana`
  MODIFY `id_ns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `n_subkriteria`
--
ALTER TABLE `n_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `n_umur`
--
ALTER TABLE `n_umur`
  MODIFY `id_nu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pm_nilaiketetapan_spk`
--
ALTER TABLE `pm_nilaiketetapan_spk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profile_matching`
--
ALTER TABLE `profile_matching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `profile_matching_jenis_kriteria`
--
ALTER TABLE `profile_matching_jenis_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_matching_nilai`
--
ALTER TABLE `profile_matching_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `s_atribut`
--
ALTER TABLE `s_atribut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `s_galeri`
--
ALTER TABLE `s_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `s_jadwal_latihan`
--
ALTER TABLE `s_jadwal_latihan`
  MODIFY `id_jadwal_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `s_kelas`
--
ALTER TABLE `s_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `s_paket_undang`
--
ALTER TABLE `s_paket_undang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sanggar`
--
ALTER TABLE `user_sanggar`
  MODIFY `id_sanggar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jumlah_pengunjung`
--
ALTER TABLE `jumlah_pengunjung`
  ADD CONSTRAINT `jumlah_pengunjung_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_biaya`
--
ALTER TABLE `n_biaya`
  ADD CONSTRAINT `n_biaya_ibfk_1` FOREIGN KEY (`id_biaya`) REFERENCES `k_biaya` (`id_biaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_biaya_ibfk_2` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_jadwal`
--
ALTER TABLE `n_jadwal`
  ADD CONSTRAINT `n_jadwal_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `k_jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_jadwal_ibfk_2` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_pendidikan`
--
ALTER TABLE `n_pendidikan`
  ADD CONSTRAINT `n_pendidikan_ibfk_2` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_pendidikan_ibfk_3` FOREIGN KEY (`id_pendidikan`) REFERENCES `k_pendidikan_id` (`id_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_penilaian`
--
ALTER TABLE `n_penilaian`
  ADD CONSTRAINT `n_penilaian_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_penilaian_ibfk_2` FOREIGN KEY (`id_subkriteria`) REFERENCES `n_subkriteria` (`id_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_prasarana`
--
ALTER TABLE `n_prasarana`
  ADD CONSTRAINT `n_prasarana_ibfk_1` FOREIGN KEY (`id_prasarana`) REFERENCES `k_prasarana` (`id_prasarana`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_prasarana_ibfk_2` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_sarana`
--
ALTER TABLE `n_sarana`
  ADD CONSTRAINT `n_sarana_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_sarana_ibfk_2` FOREIGN KEY (`id_sarana`) REFERENCES `k_sarana` (`id_sarana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_subkriteria`
--
ALTER TABLE `n_subkriteria`
  ADD CONSTRAINT `n_subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `n_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_umur`
--
ALTER TABLE `n_umur`
  ADD CONSTRAINT `n_umur_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_umur_ibfk_2` FOREIGN KEY (`id_umur`) REFERENCES `k_umur` (`id_umur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_matching`
--
ALTER TABLE `profile_matching`
  ADD CONSTRAINT `profile_matching_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_matching_rangking`
--
ALTER TABLE `profile_matching_rangking`
  ADD CONSTRAINT `profile_matching_rangking_ibfk_1` FOREIGN KEY (`alternatif`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_atribut`
--
ALTER TABLE `s_atribut`
  ADD CONSTRAINT `s_atribut_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_galeri`
--
ALTER TABLE `s_galeri`
  ADD CONSTRAINT `s_galeri_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_jadwal_latihan`
--
ALTER TABLE `s_jadwal_latihan`
  ADD CONSTRAINT `s_jadwal_latihan_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s_jadwal_latihan_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `k_jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s_jadwal_latihan_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `s_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_kelas`
--
ALTER TABLE `s_kelas`
  ADD CONSTRAINT `s_kelas_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s_kelas_ibfk_2` FOREIGN KEY (`id_umur`) REFERENCES `k_umur` (`id_umur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_paket_undang`
--
ALTER TABLE `s_paket_undang`
  ADD CONSTRAINT `s_paket_undang_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `tb_pendaftaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pendaftaran_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `s_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pendaftaran_ibfk_3` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengundang`
--
ALTER TABLE `tb_pengundang`
  ADD CONSTRAINT `tb_pengundang_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengundang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengundang_ibfk_3` FOREIGN KEY (`id_paket_undang`) REFERENCES `s_paket_undang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  ADD CONSTRAINT `tb_penyewaan_ibfk_1` FOREIGN KEY (`id_atribut`) REFERENCES `s_atribut` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penyewaan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penyewaan_ibfk_3` FOREIGN KEY (`id_sanggar`) REFERENCES `user_sanggar` (`id_sanggar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD CONSTRAINT `tb_subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sanggar`
--
ALTER TABLE `user_sanggar`
  ADD CONSTRAINT `user_sanggar_ibfk_1` FOREIGN KEY (`tipe_sanggar_id`) REFERENCES `kategori_tipe_sanggar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
