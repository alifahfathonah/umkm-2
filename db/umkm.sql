-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Feb 2021 pada 19.12
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `t_bumn`
--

CREATE TABLE `t_bumn` (
  `bumn_id` int(11) NOT NULL,
  `bumn_user` int(11) NOT NULL,
  `bumn_rumah` text NOT NULL,
  `bumn_kantor_cabang` text NOT NULL,
  `bumn_berdiri` text NOT NULL,
  `bumn_status` text NOT NULL,
  `bumn_foto` varchar(50) NOT NULL DEFAULT '[]',
  `bumn_pengelola` text NOT NULL,
  `bumn_no` text NOT NULL,
  `bumn_pic` text NOT NULL,
  `bumn_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_bumn`
--

INSERT INTO `t_bumn` (`bumn_id`, `bumn_user`, `bumn_rumah`, `bumn_kantor_cabang`, `bumn_berdiri`, `bumn_status`, `bumn_foto`, `bumn_pengelola`, `bumn_no`, `bumn_pic`, `bumn_tanggal`) VALUES
(4, 5, 'Tanjung Balai', 'Gunung Sitoli', '2021', 'Milik pribadi', '["5_dessert_froyo.png","5_dessert_keylimepie.png"]', 'DIan', '085855011555', 'DIandra', '2021-02-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_user`
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
-- Dumping data untuk tabel `t_detail_user`
--

INSERT INTO `t_detail_user` (`detail_id`, `detail_id_user`, `detail_jabatan`, `detail_pendidikan`, `detail_alamat`, `detail_biodata`) VALUES
(2, 1, 'administrator', 'SMK', 'alamat', 'biodata'),
(5, 4, '', '', '', ''),
(6, 5, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis_usaha`
--

CREATE TABLE `t_jenis_usaha` (
  `jenis_usaha_id` int(11) NOT NULL,
  `jenis_usaha_nama` text NOT NULL,
  `jenis_usaha_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jenis_usaha`
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
-- Struktur dari tabel `t_log_kunjungan`
--

CREATE TABLE `t_log_kunjungan` (
  `log_kunjungan_id` int(11) NOT NULL,
  `log_kunjungan_user` int(11) NOT NULL,
  `log_kunjungan_kunjungan` date DEFAULT NULL,
  `log_kunjungan_nama` text,
  `log_kunjungan_kategori` text,
  `log_kunjungan_lokasi` text,
  `log_kunjungan_dokumentasi` text,
  `log_kunjungan_hapus` int(11) DEFAULT '0',
  `log_kunjungan_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_log_kunjungan`
--

INSERT INTO `t_log_kunjungan` (`log_kunjungan_id`, `log_kunjungan_user`, `log_kunjungan_kunjungan`, `log_kunjungan_nama`, `log_kunjungan_kategori`, `log_kunjungan_lokasi`, `log_kunjungan_dokumentasi`, `log_kunjungan_hapus`, `log_kunjungan_tanggal`) VALUES
(19, 5, '2021-02-20', 'Perikanan', 'Koi', 'Blitar', '["19_dessert_donut.png"]', 0, '2021-02-21'),
(21, 5, '2021-02-20', 'Pertanian', 'Anggur', 'Lodoyo', '{"0":"21_dessert_ics.png","2":"21_dessert_eclair.png"}', 0, '2021-02-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_log_pameran`
--

CREATE TABLE `t_log_pameran` (
  `log_pameran_id` int(11) NOT NULL,
  `log_pameran_user` int(11) NOT NULL,
  `log_pameran_nama` text NOT NULL,
  `log_pameran_waktu` date DEFAULT NULL,
  `log_pameran_lokasi` text,
  `log_pameran_penyelenggara` text,
  `log_pameran_peserta` text,
  `log_pameran_produk` text,
  `log_pameran_dokumentasi` text,
  `log_pameran_hapus` int(11) NOT NULL DEFAULT '0',
  `log_pameran_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_log_pameran`
--

INSERT INTO `t_log_pameran` (`log_pameran_id`, `log_pameran_user`, `log_pameran_nama`, `log_pameran_waktu`, `log_pameran_lokasi`, `log_pameran_penyelenggara`, `log_pameran_peserta`, `log_pameran_produk`, `log_pameran_dokumentasi`, `log_pameran_hapus`, `log_pameran_tanggal`) VALUES
(2, 5, 'Seni Budaya', '2021-02-22', 'Gedung Serba Guna', 'Lintang', '100', '["Enak","Gurih","Mantap","banget"]', '["2_dessert_donut.png","2_dessert_eclair.png","2_dessert_froyo.png"]', 0, '2021-02-22'),
(4, 5, 'Cosplay', '2021-02-25', 'Gedung Serba Guna', 'Lintang', '1000', '{"0":"keren","2":"sugoi"}', '{"0":"4_dessert_cupcake.png","2":"4_dessert_eclair.png"}', 0, '2021-02-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_log_pelatihan`
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
  `log_pelatihan_jumlah` text NOT NULL,
  `log_pelatihan_dokumentasi` text NOT NULL,
  `log_pelatihan_hapus` int(11) NOT NULL DEFAULT '0',
  `log_pelatihan_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_log_pelatihan`
--

INSERT INTO `t_log_pelatihan` (`log_pelatihan_id`, `log_pelatihan_user`, `log_pelatihan_pelatihan`, `log_pelatihan_pelatihan_lainya`, `log_pelatihan_nama`, `log_pelatihan_waktu`, `log_pelatihan_lokasi`, `log_pelatihan_narasumber`, `log_pelatihan_jumlah`, `log_pelatihan_dokumentasi`, `log_pelatihan_hapus`, `log_pelatihan_tanggal`) VALUES
(2, 5, 'lainya', 'Ada deh', 'Menanam Padi', '2021-02-19', 'Alun-alun', 'LIntang', '15', '["2_dessert_flan.png","2_dessert_donut.png"]', 0, '2021-02-19'),
(6, 5, 'online', 'Prototipe', 'Daring Menanam Anggur', '2021-02-20', 'Kebun Raya Bogor', 'LIntang', '10', '["6_dessert_ics.png","6_dessert_eclair.png","6_dessert_cupcake.png"]', 0, '2021-02-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_setting`
--

CREATE TABLE `t_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_logo` text NOT NULL,
  `setting_footer` text NOT NULL,
  `setting_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_setting`
--

INSERT INTO `t_setting` (`setting_id`, `setting_logo`, `setting_footer`, `setting_tanggal`) VALUES
(1, 'umkm.png', 'Kang Lintang', '2021-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_umkm`
--

CREATE TABLE `t_umkm` (
  `umkm_id` int(11) NOT NULL,
  `umkm_user` int(11) NOT NULL,
  `umkm_rumah` text NOT NULL,
  `umkm_skc` text NOT NULL,
  `umkm_cabang` text NOT NULL,
  `umkm_brand` text NOT NULL,
  `umkm_usaha` text NOT NULL,
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
-- Dumping data untuk tabel `t_umkm`
--

INSERT INTO `t_umkm` (`umkm_id`, `umkm_user`, `umkm_rumah`, `umkm_skc`, `umkm_cabang`, `umkm_brand`, `umkm_usaha`, `umkm_jenis`, `umkm_jenis_lain`, `umkm_provinsi`, `umkm_provinsi_text`, `umkm_kota`, `umkm_kota_text`, `umkm_kecamatan`, `umkm_kecamatan_text`, `umkm_pos`, `umkm_alamat`, `umkm_pemilik`, `umkm_no`, `umkm_pic`, `umkm_no_pic`, `umkm_ig`, `umkm_fb`, `umkm_email`, `umkm_shopee`, `umkm_tokopedia`, `umkm_lazada`, `umkm_bukalapak`, `umkm_jdid`, `umkm_blibli`, `umkm_padi`, `umkm_website`, `umkm_pameran_dalam`, `umkm_pameran_luar`, `umkm_penghargaan`, `umkm_deskripsi`, `umkm_berdiri`, `umkm_skala`, `umkm_karyawan`, `umkm_omset`, `umkm_jenis_biaya_bni`, `umkm_kredit`, `umkm_produk`, `umkm_logo`, `umkm_bpom`, `umkm_izinusaha`, `umkm_tanggal`) VALUES
(3, 4, 'Tanjung Balai', 'SKC Pekanbaru', 'Banjarbaru', 'Like Video', 'Indah Corporations', 'Lain-lain', 'Tiktok', '35', 'JAWA TIMUR', '3505', 'KABUPATEN BLITAR', '3505040', 'WATES', '61661', 'Ds. Desa RT01 RW01', 'Indah Krisna Devi', '081000000000', 'Bagas', '085000000000', 'intagram/indah', 'facebook/indah', 'indah@gmail.com', 'shopee/indah', 'toped/indah', 'lazada/indah', 'BL/indah', 'jd/indah', 'blibli/indah', 'PADI/indah', 'https://indahsekali.com', '["dalam 1","dalam 2"]', '["luar 1","luar 2"]', '["penghargaan 1","penghargaan 2"]', '["deskripsi 1","deskripsi 2"]', '2021', 'Menengah', '200', '1000000', 'Kredit Kemitraan', '22000', '["4_dessert_donut.png","4_dessert_eclair.png"]', 'subscribe_logo_png_1326590.png', 'Ya', '["PIRT","SKDP","Sertifikat Halal"]', '2021-02-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_foreignkey` char(50) NOT NULL DEFAULT '',
  `user_name` text,
  `user_email` text,
  `user_password` text,
  `user_level` set('0','1','2') DEFAULT NULL,
  `user_foto` text,
  `user_hapus` int(11) DEFAULT '0',
  `user_tanggal` date DEFAULT NULL,
  `user_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_foreignkey`, `user_name`, `user_email`, `user_password`, `user_level`, `user_foto`, `user_hapus`, `user_tanggal`, `user_status`) VALUES
(1, '1', 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '0', 'dessert_donut.png', 0, '2021-01-18', 1),
(9, '4', 'Indah', 'indah@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2', NULL, 0, '2021-02-09', 1),
(10, '5', 'Papa Fait', 'papa@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', NULL, 0, '2021-02-17', 1);

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
-- Indexes for table `t_setting`
--
ALTER TABLE `t_setting`
  ADD PRIMARY KEY (`setting_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_bumn`
--
ALTER TABLE `t_bumn`
  MODIFY `bumn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `log_kunjungan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `t_log_pameran`
--
ALTER TABLE `t_log_pameran`
  MODIFY `log_pameran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_log_pelatihan`
--
ALTER TABLE `t_log_pelatihan`
  MODIFY `log_pelatihan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_setting`
--
ALTER TABLE `t_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_umkm`
--
ALTER TABLE `t_umkm`
  MODIFY `umkm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
