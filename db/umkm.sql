-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 09:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_bumn`
--

CREATE TABLE `t_bumn` (
  `bumn_id` int(11) NOT NULL,
  `bumn_user` int(11) NOT NULL,
  `bumn_rumah` text NOT NULL,
  `bumn_kantor_wilayah` text NOT NULL,
  `bumn_kantor_cabang` text NOT NULL,
  `bumn_berdiri` text NOT NULL,
  `bumn_status` text NOT NULL,
  `bumn_status_dinas` text NOT NULL,
  `bumn_foto` varchar(50) NOT NULL DEFAULT '[]',
  `bumn_pengelola` text NOT NULL,
  `bumn_no` text NOT NULL,
  `bumn_pic` text NOT NULL,
  `bumn_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bumn`
--

INSERT INTO `t_bumn` (`bumn_id`, `bumn_user`, `bumn_rumah`, `bumn_kantor_wilayah`, `bumn_kantor_cabang`, `bumn_berdiri`, `bumn_status`, `bumn_status_dinas`, `bumn_foto`, `bumn_pengelola`, `bumn_no`, `bumn_pic`, `bumn_tanggal`) VALUES
(4, 5, '12', 'W01', '11', '2021', 'milik dinas', 'Perhutanan', '[\"5_dessert_froyo.png\",\"5_dessert_keylimepie.png\"]', '[\"Rudi\",\"Yahya\"]', '[\"085855011542\",\"085222000111\"]', '[\"Cabang 1\",\"Cabang 2\"]', '2021-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_user`
--

CREATE TABLE `t_detail_user` (
  `detail_id` int(11) NOT NULL,
  `detail_id_user` int(11) NOT NULL,
  `detail_jabatan` text NOT NULL,
  `detail_pendidikan` text NOT NULL,
  `detail_alamat` text NOT NULL,
  `detail_biodata` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_detail_user`
--

INSERT INTO `t_detail_user` (`detail_id`, `detail_id_user`, `detail_jabatan`, `detail_pendidikan`, `detail_alamat`, `detail_biodata`) VALUES
(2, 1, 'administrator', 'SMK', 'alamat', 'biodata'),
(5, 4, '', '', '', ''),
(6, 5, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_usaha`
--

CREATE TABLE `t_jenis_usaha` (
  `jenis_usaha_id` int(11) NOT NULL,
  `jenis_usaha_nama` text NOT NULL,
  `jenis_usaha_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jenis_usaha`
--

INSERT INTO `t_jenis_usaha` (`jenis_usaha_id`, `jenis_usaha_nama`, `jenis_usaha_tanggal`) VALUES
(1, 'Kuliner (Snack)', '2021-02-09'),
(2, 'Kuliner (Minuman)', '2021-02-09'),
(3, 'Kuliner (Catering)', '2021-02-09'),
(4, 'Kuliner (Herbal)', '2021-02-09'),
(5, 'Kuliner (Teh dan olahannya)', '2021-02-09'),
(6, 'Kuliner ( Kopi dan olahannya)', '2021-02-09'),
(7, 'Craft/Kerajinan (Kayu)', '2021-02-09'),
(8, 'Craft/Kerajinan (Bambu)', '2021-02-09'),
(9, 'Craft/Kerajinan (Logam)', '2021-02-09'),
(10, 'Craft/Kerajinan (Perak)', '2021-02-09'),
(11, 'Craft/Kerajinan (Anyaman)', '2021-02-09'),
(12, 'Craft/Kerajinan (Furniture)', '2021-02-09'),
(13, 'Craft/Kerajinan (Batu)', '2021-02-09'),
(15, 'Fashion (Fashion ready to wear)', '2021-02-09'),
(16, 'Fashion (Wastra/Kain)', '2021-02-09'),
(17, 'Fashion (Aksesories)', '2021-02-09'),
(19, 'Agro (Hasil pertanian)', '2021-02-09'),
(20, 'Agro (Hasil perikanan)', '2021-02-09'),
(21, 'Jasa Perdagangan', '2021-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `t_log_kunjungan`
--

CREATE TABLE `t_log_kunjungan` (
  `log_kunjungan_id` int(11) NOT NULL,
  `log_kunjungan_user` int(11) NOT NULL,
  `log_kunjungan_kunjungan` date DEFAULT NULL,
  `log_kunjungan_nama` text DEFAULT NULL,
  `log_kunjungan_kategori` text DEFAULT NULL,
  `log_kunjungan_lokasi` text DEFAULT NULL,
  `log_kunjungan_dokumentasi` text DEFAULT NULL,
  `log_kunjungan_laporan` text DEFAULT NULL,
  `log_kunjungan_hapus` int(11) DEFAULT 0,
  `log_kunjungan_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_log_kunjungan`
--

INSERT INTO `t_log_kunjungan` (`log_kunjungan_id`, `log_kunjungan_user`, `log_kunjungan_kunjungan`, `log_kunjungan_nama`, `log_kunjungan_kategori`, `log_kunjungan_lokasi`, `log_kunjungan_dokumentasi`, `log_kunjungan_laporan`, `log_kunjungan_hapus`, `log_kunjungan_tanggal`) VALUES
(19, 5, '2021-02-20', 'Perikanan', 'Koi', 'Blitar', '[\"19_dessert_donut.png\"]', 'Keren sekali tempatnya', 0, '2021-02-21'),
(21, 5, '2021-02-20', 'Pertanian', 'Anggur', 'Lodoyo', '{\"0\":\"21_dessert_ics.png\",\"2\":\"21_dessert_eclair.png\"}', 'Sipp joss', 0, '2021-02-21'),
(22, 5, '2021-02-20', 'Pertanian', 'Anggur', 'lodoyo', '{\"0\":\"21_dessert_ics.png\",\"2\":\"21_dessert_eclair.png\"}', 'Sipp joss', 0, '2021-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `t_log_pameran`
--

CREATE TABLE `t_log_pameran` (
  `log_pameran_id` int(11) NOT NULL,
  `log_pameran_user` int(11) NOT NULL,
  `log_pameran_nama` text NOT NULL,
  `log_pameran_waktu` date DEFAULT NULL,
  `log_pameran_lokasi` text DEFAULT NULL,
  `log_pameran_penyelenggara` text DEFAULT NULL,
  `log_pameran_peserta` text DEFAULT NULL,
  `log_pameran_produk` text DEFAULT NULL,
  `log_pameran_dokumentasi` text DEFAULT NULL,
  `log_pameran_hapus` int(11) NOT NULL DEFAULT 0,
  `log_pameran_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_log_pameran`
--

INSERT INTO `t_log_pameran` (`log_pameran_id`, `log_pameran_user`, `log_pameran_nama`, `log_pameran_waktu`, `log_pameran_lokasi`, `log_pameran_penyelenggara`, `log_pameran_peserta`, `log_pameran_produk`, `log_pameran_dokumentasi`, `log_pameran_hapus`, `log_pameran_tanggal`) VALUES
(2, 5, 'Seni Budaya', '2021-02-22', 'Gedung Serba Guna', 'Lintang', '100', '[\"Enak\",\"Gurih\",\"Mantap\",\"banget\"]', '[\"2_dessert_donut.png\",\"2_dessert_eclair.png\",\"2_dessert_froyo.png\"]', 0, '2021-02-22'),
(4, 5, 'Cosplay', '2021-02-25', 'Gedung Serba Guna', 'Lintang', '1000', '{\"0\":\"keren\",\"2\":\"sugoi\"}', '{\"0\":\"4_dessert_cupcake.png\",\"2\":\"4_dessert_eclair.png\"}', 0, '2021-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `t_log_pelatihan`
--

CREATE TABLE `t_log_pelatihan` (
  `log_pelatihan_id` int(11) NOT NULL,
  `log_pelatihan_user` int(11) NOT NULL,
  `log_pelatihan_pelatihan` text NOT NULL,
  `log_pelatihan_pelatihan_lainya` text NOT NULL,
  `log_pelatihan_nama` text NOT NULL,
  `log_pelatihan_waktu` date DEFAULT NULL,
  `log_pelatihan_lokasi` text NOT NULL,
  `log_pelatihan_narasumber` text NOT NULL,
  `log_pelatihan_narasumber_asal` text NOT NULL,
  `log_pelatihan_jumlah` text NOT NULL,
  `log_pelatihan_dokumentasi` text NOT NULL,
  `log_pelatihan_hapus` int(11) NOT NULL DEFAULT 0,
  `log_pelatihan_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_log_pelatihan`
--

INSERT INTO `t_log_pelatihan` (`log_pelatihan_id`, `log_pelatihan_user`, `log_pelatihan_pelatihan`, `log_pelatihan_pelatihan_lainya`, `log_pelatihan_nama`, `log_pelatihan_waktu`, `log_pelatihan_lokasi`, `log_pelatihan_narasumber`, `log_pelatihan_narasumber_asal`, `log_pelatihan_jumlah`, `log_pelatihan_dokumentasi`, `log_pelatihan_hapus`, `log_pelatihan_tanggal`) VALUES
(2, 5, 'lainya', 'Ada deh', 'Menanam Padi', '2021-02-19', 'Alun-alun', '{\"0\":\"Lintang\",\"2\":\"Bagas\"}', '[\"Malang\",\"Jakarta\"]', '15', '[\"2_dessert_flan.png\",\"2_dessert_donut.png\"]', 0, '2021-06-01'),
(6, 5, 'online', 'Prototipe', 'Daring Menanam Anggur', '2021-02-20', 'Kebun Raya Bogor', '{\"0\":\"Lintang\",\"2\":\"Bagas\"}', '[\"Bogor\",\"Surabaya\"]', '10', '[\"6_dessert_ics.png\",\"6_dessert_eclair.png\",\"6_dessert_cupcake.png\"]', 0, '2021-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `t_pembiayaan`
--

CREATE TABLE `t_pembiayaan` (
  `pembiayaan_id` int(11) NOT NULL,
  `pembiayaan_user` int(11) NOT NULL,
  `pembiayaan_rumah` text NOT NULL,
  `pembiayaan_skm` text NOT NULL,
  `pembiayaan_skc` text NOT NULL,
  `pembiayaan_cabang` text NOT NULL,
  `pembiayaan_wilayah` text NOT NULL,
  `pembiayaan_brand` text NOT NULL,
  `pembiayaan_usaha` text NOT NULL,
  `pembiayaan_kategori` text NOT NULL,
  `pembiayaan_jenis` text NOT NULL,
  `pembiayaan_jenis_lain` text NOT NULL,
  `pembiayaan_provinsi` text NOT NULL,
  `pembiayaan_provinsi_text` text NOT NULL,
  `pembiayaan_kota` text NOT NULL,
  `pembiayaan_kota_text` text NOT NULL,
  `pembiayaan_kecamatan` text NOT NULL,
  `pembiayaan_kecamatan_text` text NOT NULL,
  `pembiayaan_pos` text NOT NULL,
  `pembiayaan_alamat` text NOT NULL,
  `pembiayaan_pemilik` text NOT NULL,
  `pembiayaan_no` text NOT NULL,
  `pembiayaan_pic` text NOT NULL,
  `pembiayaan_no_pic` text NOT NULL,
  `pembiayaan_ig` text NOT NULL,
  `pembiayaan_fb` text NOT NULL,
  `pembiayaan_email` text NOT NULL,
  `pembiayaan_shopee` text NOT NULL,
  `pembiayaan_tokopedia` text NOT NULL,
  `pembiayaan_lazada` text NOT NULL,
  `pembiayaan_bukalapak` text NOT NULL,
  `pembiayaan_jdid` text NOT NULL,
  `pembiayaan_blibli` text NOT NULL,
  `pembiayaan_padi` text NOT NULL,
  `pembiayaan_website` text NOT NULL,
  `pembiayaan_pameran_dalam` text NOT NULL,
  `pembiayaan_pameran_luar` text NOT NULL,
  `pembiayaan_penghargaan` text NOT NULL,
  `pembiayaan_deskripsi` text NOT NULL,
  `pembiayaan_berdiri` text NOT NULL,
  `pembiayaan_skala` text NOT NULL,
  `pembiayaan_karyawan` text NOT NULL,
  `pembiayaan_omset` text NOT NULL,
  `pembiayaan_jenis_biaya_bni` text NOT NULL,
  `pembiayaan_kredit` text NOT NULL,
  `pembiayaan_produk` varchar(50) NOT NULL DEFAULT '[]',
  `pembiayaan_logo` text NOT NULL,
  `pembiayaan_bpom` text NOT NULL,
  `pembiayaan_izinusaha` text NOT NULL,
  `pembiayaan_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pembiayaan`
--

INSERT INTO `t_pembiayaan` (`pembiayaan_id`, `pembiayaan_user`, `pembiayaan_rumah`, `pembiayaan_skm`, `pembiayaan_skc`, `pembiayaan_cabang`, `pembiayaan_wilayah`, `pembiayaan_brand`, `pembiayaan_usaha`, `pembiayaan_kategori`, `pembiayaan_jenis`, `pembiayaan_jenis_lain`, `pembiayaan_provinsi`, `pembiayaan_provinsi_text`, `pembiayaan_kota`, `pembiayaan_kota_text`, `pembiayaan_kecamatan`, `pembiayaan_kecamatan_text`, `pembiayaan_pos`, `pembiayaan_alamat`, `pembiayaan_pemilik`, `pembiayaan_no`, `pembiayaan_pic`, `pembiayaan_no_pic`, `pembiayaan_ig`, `pembiayaan_fb`, `pembiayaan_email`, `pembiayaan_shopee`, `pembiayaan_tokopedia`, `pembiayaan_lazada`, `pembiayaan_bukalapak`, `pembiayaan_jdid`, `pembiayaan_blibli`, `pembiayaan_padi`, `pembiayaan_website`, `pembiayaan_pameran_dalam`, `pembiayaan_pameran_luar`, `pembiayaan_penghargaan`, `pembiayaan_deskripsi`, `pembiayaan_berdiri`, `pembiayaan_skala`, `pembiayaan_karyawan`, `pembiayaan_omset`, `pembiayaan_jenis_biaya_bni`, `pembiayaan_kredit`, `pembiayaan_produk`, `pembiayaan_logo`, `pembiayaan_bpom`, `pembiayaan_izinusaha`, `pembiayaan_tanggal`) VALUES
(9, 4, '20', '20', '20', '22', 'W02', 'Nokia', 'Gadget', 'Unggulan', '21', '', '52', 'NUSA TENGGARA BARAT', '5202', 'KABUPATEN LOMBOK TENGAH', '5202011', 'PRAYA BARAT DAYA', '57775', 'Alamat', 'Nisa sabyan', '08555500011122', 'endro', '08666666666', 'intagram', 'facebook', 'google email', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Kredit Kemitraan', '', '[]', '', '', 'null', '2021-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `t_rumah_bumn`
--

CREATE TABLE `t_rumah_bumn` (
  `rumah_bumn_id` int(11) NOT NULL,
  `rumah_bumn_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_rumah_bumn`
--

INSERT INTO `t_rumah_bumn` (`rumah_bumn_id`, `rumah_bumn_nama`) VALUES
(1, 'Aceh Tenggara'),
(2, 'Nias Selatan'),
(3, 'Tanjung Balai'),
(4, 'Padang'),
(5, 'Payakumbuh'),
(6, 'Payakumbuh 50 Kota'),
(7, 'Pangkal Pinang'),
(8, 'Tebo'),
(9, 'Way Kanan'),
(10, 'Pangandaran'),
(11, 'Cilacap'),
(12, 'Sleman'),
(13, 'Tegal'),
(14, 'Wonogiri'),
(15, 'Banyuwangi'),
(16, 'Ngawi'),
(17, 'Tulungagung'),
(18, 'Manggarai'),
(19, 'Belu'),
(20, 'Sumba Barat Daya'),
(21, 'Sumba Tengah'),
(22, 'Banjarbaru'),
(23, 'Katingan'),
(24, 'Pontianak'),
(25, 'Tabalong'),
(26, 'Bantaeng'),
(27, 'Maluku Tenggara'),
(28, 'Mamuju'),
(29, 'Takalar'),
(30, 'Banggai laut'),
(31, 'Pohuwato'),
(32, 'Ternate'),
(33, 'Fakfak'),
(34, 'Jayapura'),
(35, 'Raja Ampat'),
(36, 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `t_rumah_bumn_cabang`
--

CREATE TABLE `t_rumah_bumn_cabang` (
  `rumah_bumn_cabang_id` int(11) NOT NULL,
  `rumah_bumn_cabang_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_rumah_bumn_cabang`
--

INSERT INTO `t_rumah_bumn_cabang` (`rumah_bumn_cabang_id`, `rumah_bumn_cabang_nama`) VALUES
(1, 'Langsa'),
(2, 'Gunung Sitoli'),
(3, 'Tg Balai Karimun'),
(4, 'Padang'),
(5, 'Payakumbuh'),
(6, 'Pangkal Pinang'),
(7, 'Muara Bungo'),
(8, 'Kotabumi'),
(9, 'Banjar'),
(10, 'Cilacap'),
(11, 'UGM'),
(12, 'Tegal'),
(13, 'Wonogiri'),
(14, 'Banyuwang'),
(15, 'Madiun'),
(16, 'Tulungagung'),
(17, 'Ende'),
(18, 'Kupang'),
(19, 'Banjarbaru'),
(20, 'Palangkaraya'),
(21, 'Pontianak'),
(22, 'Barabai'),
(23, 'Bulukumba'),
(24, 'Ambon'),
(25, 'Mamuju'),
(26, 'Mattoangin'),
(27, 'Luwuk'),
(28, 'Gorontalo'),
(29, 'Ternate'),
(30, 'Monokwari'),
(31, 'Jayapura'),
(32, 'Sorong'),
(33, 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `t_setting`
--

CREATE TABLE `t_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_slide_1` text NOT NULL,
  `setting_slide_2` text NOT NULL,
  `setting_slide_3` text NOT NULL,
  `setting_slide_4` text NOT NULL,
  `setting_slide_5` text NOT NULL,
  `setting_footer` text NOT NULL,
  `setting_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_setting`
--

INSERT INTO `t_setting` (`setting_id`, `setting_slide_1`, `setting_slide_2`, `setting_slide_3`, `setting_slide_4`, `setting_slide_5`, `setting_footer`, `setting_tanggal`) VALUES
(1, 'CJH2LNyVEAAtw6E.png', 'CJH2LNyVEAAtw6E.png', 'CJH2LNyVEAAtw6E.png', 'CJH2LNyVEAAtw6E.png', 'CJH2LNyVEAAtw6E.png', 'mitraumkmbni.id', '2021-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `t_skc`
--

CREATE TABLE `t_skc` (
  `skc_id` int(11) NOT NULL,
  `skc_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_skc`
--

INSERT INTO `t_skc` (`skc_id`, `skc_nama`) VALUES
(1, 'SKC Medan'),
(2, 'SKC Polonia'),
(3, 'SKC Pekanbaru'),
(4, 'SKC Palembang'),
(5, 'SKC Bandung'),
(6, 'SKC Priangan'),
(7, 'SKC Semarang'),
(8, 'SKC Solo'),
(9, 'SKC Yogjakarta'),
(10, 'SKC Graha Pangeran'),
(11, 'SKC Surabaya'),
(12, 'SKC Makasar'),
(13, 'SKC Denpasar'),
(14, 'SKC Banjarmasin'),
(15, 'SKC Melawai'),
(16, 'SKC Tanah Abang'),
(17, 'SKC Jakarta Kota'),
(18, 'SKC Kelapa Gading'),
(19, 'SKC Pecenongan'),
(20, 'SKC Bogor'),
(21, 'SKC Tangerang'),
(22, 'SKC Bekasi'),
(23, 'SKC Jatinegara'),
(24, 'SKC Kramat'),
(25, 'SKC Jakarta Graha Elok Mas');

-- --------------------------------------------------------

--
-- Table structure for table `t_skm`
--

CREATE TABLE `t_skm` (
  `skm_id` int(11) NOT NULL,
  `skm_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_skm`
--

INSERT INTO `t_skm` (`skm_id`, `skm_nama`) VALUES
(1, 'SKM BANDAR LAMPUNG'),
(2, 'SKM PADANG'),
(3, 'SKM PONTIANAK'),
(4, 'SKM MALANG'),
(5, 'SKM HR MUHAMMAD'),
(6, 'SKM KELAPA GADING'),
(7, 'SKM KELAPA PONDOK INDAH'),
(8, 'SKM MAKASSAR PERINTIS'),
(9, 'SKM MEDAN'),
(10, 'SKM BATAM'),
(11, 'SKM PEKANBARU'),
(12, 'SKM PALEMBANG'),
(13, 'SKM BANDUNG'),
(14, 'SKM SEMARANG'),
(15, 'SKM SOLO'),
(16, 'SKM SIDOARJO'),
(17, 'SKM GRESIK'),
(18, 'SKM SURABAYA'),
(19, 'SKM SURABAYA PEMUDA'),
(20, 'SKM MAKASSAR'),
(21, 'SKM DENPASAR'),
(22, 'SKM BALIKPAPAN'),
(23, 'SKM BANJARMASIN'),
(24, 'SKM JAKARTA'),
(25, 'SKM JAKARTA SUDIRMAN'),
(26, 'SKM MANADO'),
(27, 'SKM PETOJO'),
(28, 'SKM JAKARTA KOTA'),
(29, 'SKM TANGERANG'),
(30, 'SKM BEKASI'),
(31, 'SKM IMM'),
(32, 'SKM PAPUA'),
(33, 'SKM TANGERANG CITY');

-- --------------------------------------------------------

--
-- Table structure for table `t_umkm`
--

CREATE TABLE `t_umkm` (
  `umkm_id` int(11) NOT NULL,
  `umkm_user` int(11) NOT NULL,
  `umkm_rumah` text NOT NULL,
  `umkm_skm` text NOT NULL,
  `umkm_skc` text NOT NULL,
  `umkm_cabang` text NOT NULL,
  `umkm_wilayah` text NOT NULL,
  `umkm_brand` text NOT NULL,
  `umkm_usaha` text NOT NULL,
  `umkm_kategori` text NOT NULL,
  `umkm_jenis` text NOT NULL,
  `umkm_jenis_lain` text NOT NULL,
  `umkm_provinsi` text NOT NULL,
  `umkm_provinsi_text` text NOT NULL,
  `umkm_kota` text NOT NULL,
  `umkm_kota_text` text NOT NULL,
  `umkm_kecamatan` text NOT NULL,
  `umkm_kecamatan_text` text NOT NULL,
  `umkm_pos` text NOT NULL,
  `umkm_alamat` text NOT NULL,
  `umkm_pemilik` text NOT NULL,
  `umkm_no` text NOT NULL,
  `umkm_pic` text NOT NULL,
  `umkm_no_pic` text NOT NULL,
  `umkm_ig` text NOT NULL,
  `umkm_fb` text NOT NULL,
  `umkm_email` text NOT NULL,
  `umkm_shopee` text NOT NULL,
  `umkm_tokopedia` text NOT NULL,
  `umkm_lazada` text NOT NULL,
  `umkm_bukalapak` text NOT NULL,
  `umkm_jdid` text NOT NULL,
  `umkm_blibli` text NOT NULL,
  `umkm_padi` text NOT NULL,
  `umkm_website` text NOT NULL,
  `umkm_pameran_dalam` text NOT NULL,
  `umkm_pameran_luar` text NOT NULL,
  `umkm_penghargaan` text NOT NULL,
  `umkm_deskripsi` text NOT NULL,
  `umkm_berdiri` text NOT NULL,
  `umkm_skala` text NOT NULL,
  `umkm_karyawan` text NOT NULL,
  `umkm_omset` text NOT NULL,
  `umkm_jenis_biaya_bni` text NOT NULL,
  `umkm_kredit` text NOT NULL,
  `umkm_produk` varchar(50) NOT NULL DEFAULT '[]',
  `umkm_logo` text NOT NULL,
  `umkm_bpom` text NOT NULL,
  `umkm_izinusaha` text NOT NULL,
  `umkm_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_umkm`
--

INSERT INTO `t_umkm` (`umkm_id`, `umkm_user`, `umkm_rumah`, `umkm_skm`, `umkm_skc`, `umkm_cabang`, `umkm_wilayah`, `umkm_brand`, `umkm_usaha`, `umkm_kategori`, `umkm_jenis`, `umkm_jenis_lain`, `umkm_provinsi`, `umkm_provinsi_text`, `umkm_kota`, `umkm_kota_text`, `umkm_kecamatan`, `umkm_kecamatan_text`, `umkm_pos`, `umkm_alamat`, `umkm_pemilik`, `umkm_no`, `umkm_pic`, `umkm_no_pic`, `umkm_ig`, `umkm_fb`, `umkm_email`, `umkm_shopee`, `umkm_tokopedia`, `umkm_lazada`, `umkm_bukalapak`, `umkm_jdid`, `umkm_blibli`, `umkm_padi`, `umkm_website`, `umkm_pameran_dalam`, `umkm_pameran_luar`, `umkm_penghargaan`, `umkm_deskripsi`, `umkm_berdiri`, `umkm_skala`, `umkm_karyawan`, `umkm_omset`, `umkm_jenis_biaya_bni`, `umkm_kredit`, `umkm_produk`, `umkm_logo`, `umkm_bpom`, `umkm_izinusaha`, `umkm_tanggal`) VALUES
(4, 4, '12', '13', '7', '4', 'W01', 'Like Video', 'Indah Corporations', 'Unggulan', 'Lain-lain', 'Tiktok', '35', 'JAWA TIMUR', '3505', 'KABUPATEN BLITAR', '', 'Kecamatan', '61661', 'Ds. Desa RT01 RW01', 'Indah Krisna Devi', '081000000000', 'Bagas', '085000000000', 'intagram/indah', 'facebook/indah', 'indah@gmail.com', 'shopee/indah', 'toped/indah', 'lazada/indah', 'BL/indah', 'jd/indah', 'blibli/indah', 'PADI/indah', 'https://indahsekali.com', '[\"dalam 1\",\"dalam 2\"]', '[\"luar 1\",\"luar 2\"]', '[\"penghargaan 1\",\"penghargaan 2\"]', '[\"deskripsi 1\",\"deskripsi 2\"]', '2021', 'Menengah', '200', '1000000', 'Kredit Kemitraan', '22000', '[\"4_dessert_donut.png\",\"4_dessert_eclair.png\"]', 'subscribe_logo_png_1326590.png', 'Ya', '[\"PIRT\",\"SKDP\",\"Sertifikat Halal\"]', '2021-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_foreignkey` char(50) NOT NULL DEFAULT '',
  `user_name` text DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `user_level` set('0','1','2') DEFAULT NULL,
  `user_foto` text DEFAULT NULL,
  `user_hapus` int(11) DEFAULT 0,
  `user_tanggal` date DEFAULT NULL,
  `user_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_foreignkey`, `user_name`, `user_email`, `user_password`, `user_level`, `user_foto`, `user_hapus`, `user_tanggal`, `user_status`) VALUES
(1, '1', 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '0', 'lurah.png', 0, '2021-01-18', 1),
(9, '4', 'Indah', 'indah@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2', NULL, 0, '2021-02-09', 1),
(10, '5', 'Papa Fait', 'papa@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', NULL, 0, '2021-02-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_wilayah_baru`
--

CREATE TABLE `t_wilayah_baru` (
  `wilayah_baru_id` int(11) NOT NULL,
  `wilayah_baru_kode` text NOT NULL,
  `wilayah_baru_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_wilayah_baru`
--

INSERT INTO `t_wilayah_baru` (`wilayah_baru_id`, `wilayah_baru_kode`, `wilayah_baru_nama`) VALUES
(1, 'W01', 'kantor wilayah 01'),
(2, 'W02', 'kantor wilayah 02'),
(3, 'W03', 'kantor wilayah 03'),
(4, 'W04', 'kantor wilayah 04'),
(5, 'W05', 'kantor wilayah 05'),
(6, 'W06', 'kantor wilayah 06'),
(7, 'W07', 'kantor wilayah 07'),
(8, 'W08', 'kantor wilayah 08'),
(9, 'W09', 'kantor wilayah 09'),
(10, 'W10', 'kantor wilayah 10'),
(11, 'W11', 'kantor wilayah 11'),
(12, 'W12', 'kantor wilayah 12'),
(13, 'W13', 'kantor wilayah 13'),
(14, 'W14', 'kantor wilayah 14'),
(15, 'W15', 'kantor wilayah 15'),
(16, 'W16', 'kantor wilayah 16'),
(17, 'W17', 'kantor wilayah 17');

-- --------------------------------------------------------

--
-- Table structure for table `t_wilayah_eksisting`
--

CREATE TABLE `t_wilayah_eksisting` (
  `wilayah_eksisting_id` int(11) NOT NULL,
  `wilayah_eksisting_kode` text NOT NULL,
  `wilayah_eksisting_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_wilayah_eksisting`
--

INSERT INTO `t_wilayah_eksisting` (`wilayah_eksisting_id`, `wilayah_eksisting_kode`, `wilayah_eksisting_nama`) VALUES
(1, 'WMD', 'kantor wilayah medan'),
(2, 'WPD', 'kantor wilayah padang'),
(3, 'WPL', 'kantor wilayah palembang'),
(4, 'WBN', 'kantor wilayah bandung'),
(5, 'WSM', 'kantor wilayah semarang'),
(6, 'WSY', 'kantor wilayah surabaya'),
(7, 'WMK', 'kantor wilayah makasar'),
(8, 'WDR', 'kantor wilayah denpasar'),
(9, 'WBJ', 'kantor wilayah banjarmasin'),
(10, 'WJS', 'kantor wilayah jakarta'),
(11, 'WMO', 'kantor wilayah manado'),
(12, 'WJK', 'kantor wilayah  jakarta kota'),
(13, 'WJB', 'kantor wilayah jakarta BSD'),
(14, 'WJY', 'kantor wilayah jakarta kemayoran'),
(15, 'WPU', 'kantor wilayah papua'),
(16, 'WYK', 'kantor wilayah yogyakarta'),
(17, 'WMA', 'kantor wilayah malang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_bumn`
--
ALTER TABLE `t_bumn`
  ADD PRIMARY KEY (`bumn_id`);

--
-- Indexes for table `t_detail_user`
--
ALTER TABLE `t_detail_user`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `t_jenis_usaha`
--
ALTER TABLE `t_jenis_usaha`
  ADD PRIMARY KEY (`jenis_usaha_id`);

--
-- Indexes for table `t_log_kunjungan`
--
ALTER TABLE `t_log_kunjungan`
  ADD PRIMARY KEY (`log_kunjungan_id`);

--
-- Indexes for table `t_log_pameran`
--
ALTER TABLE `t_log_pameran`
  ADD PRIMARY KEY (`log_pameran_id`);

--
-- Indexes for table `t_log_pelatihan`
--
ALTER TABLE `t_log_pelatihan`
  ADD PRIMARY KEY (`log_pelatihan_id`);

--
-- Indexes for table `t_pembiayaan`
--
ALTER TABLE `t_pembiayaan`
  ADD PRIMARY KEY (`pembiayaan_id`);

--
-- Indexes for table `t_rumah_bumn`
--
ALTER TABLE `t_rumah_bumn`
  ADD PRIMARY KEY (`rumah_bumn_id`);

--
-- Indexes for table `t_rumah_bumn_cabang`
--
ALTER TABLE `t_rumah_bumn_cabang`
  ADD PRIMARY KEY (`rumah_bumn_cabang_id`);

--
-- Indexes for table `t_setting`
--
ALTER TABLE `t_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `t_skc`
--
ALTER TABLE `t_skc`
  ADD PRIMARY KEY (`skc_id`);

--
-- Indexes for table `t_skm`
--
ALTER TABLE `t_skm`
  ADD PRIMARY KEY (`skm_id`);

--
-- Indexes for table `t_umkm`
--
ALTER TABLE `t_umkm`
  ADD PRIMARY KEY (`umkm_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `t_wilayah_baru`
--
ALTER TABLE `t_wilayah_baru`
  ADD PRIMARY KEY (`wilayah_baru_id`);

--
-- Indexes for table `t_wilayah_eksisting`
--
ALTER TABLE `t_wilayah_eksisting`
  ADD PRIMARY KEY (`wilayah_eksisting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_bumn`
--
ALTER TABLE `t_bumn`
  MODIFY `bumn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_detail_user`
--
ALTER TABLE `t_detail_user`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_jenis_usaha`
--
ALTER TABLE `t_jenis_usaha`
  MODIFY `jenis_usaha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_log_kunjungan`
--
ALTER TABLE `t_log_kunjungan`
  MODIFY `log_kunjungan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_log_pameran`
--
ALTER TABLE `t_log_pameran`
  MODIFY `log_pameran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_log_pelatihan`
--
ALTER TABLE `t_log_pelatihan`
  MODIFY `log_pelatihan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_pembiayaan`
--
ALTER TABLE `t_pembiayaan`
  MODIFY `pembiayaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_rumah_bumn`
--
ALTER TABLE `t_rumah_bumn`
  MODIFY `rumah_bumn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `t_rumah_bumn_cabang`
--
ALTER TABLE `t_rumah_bumn_cabang`
  MODIFY `rumah_bumn_cabang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `t_setting`
--
ALTER TABLE `t_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_skc`
--
ALTER TABLE `t_skc`
  MODIFY `skc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `t_skm`
--
ALTER TABLE `t_skm`
  MODIFY `skm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `t_umkm`
--
ALTER TABLE `t_umkm`
  MODIFY `umkm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_wilayah_baru`
--
ALTER TABLE `t_wilayah_baru`
  MODIFY `wilayah_baru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `t_wilayah_eksisting`
--
ALTER TABLE `t_wilayah_eksisting`
  MODIFY `wilayah_eksisting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
