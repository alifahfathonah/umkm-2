-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jan 2021 pada 04.55
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
  `bumn_berdiri` text NOT NULL,
  `bumn_status` text NOT NULL,
  `bumn_foto` text NOT NULL,
  `bumn_pengelola` text NOT NULL,
  `bumn_no` text NOT NULL,
  `bumn_cabang` text NOT NULL,
  `bumn_pic` text NOT NULL,
  `bumn_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_bumn`
--

INSERT INTO `t_bumn` (`bumn_id`, `bumn_user`, `bumn_rumah`, `bumn_berdiri`, `bumn_status`, `bumn_foto`, `bumn_pengelola`, `bumn_no`, `bumn_cabang`, `bumn_pic`, `bumn_tanggal`) VALUES
(1, 2, 'Dayana House', '2021', 'milik pribadi', 'diego-s-peri-peri.jpg', 'Dayana demi demik', '087000000000', 'Nur Sultan', 'Astana', '2021-01-18');

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
(3, 2, '', '', '', ''),
(4, 3, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_umkm`
--

CREATE TABLE `t_umkm` (
  `umkm_id` int(11) NOT NULL,
  `umkm_user` int(11) NOT NULL,
  `umkm_rumah` text NOT NULL,
  `umkm_skc` text NOT NULL,
  `umkm_brand` text NOT NULL,
  `umkm_usaha` text NOT NULL,
  `umkm_jenis` text NOT NULL,
  `umkm_jenis_lain` text NOT NULL,
  `umkm_provinsi` text NOT NULL,
  `umkm_kota` text NOT NULL,
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
  `umkm_website` text NOT NULL,
  `umkm_pameran_dalam` text NOT NULL,
  `umkm_pameran_luar` text NOT NULL,
  `umkm_penghargaan` text NOT NULL,
  `umkm_cerita` text NOT NULL,
  `umkm_berdiri` text NOT NULL,
  `umkm_skala` text NOT NULL,
  `umkm_karyawan` text NOT NULL,
  `umkm_omset` text NOT NULL,
  `umkm_jenis_biaya_bni` text NOT NULL,
  `umkm_kredit` text NOT NULL,
  `umkm_produk` text NOT NULL,
  `umkm_produk_deskripsi` text NOT NULL,
  `umkm_bpom` text NOT NULL,
  `umkm_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_umkm`
--

INSERT INTO `t_umkm` (`umkm_id`, `umkm_user`, `umkm_rumah`, `umkm_skc`, `umkm_brand`, `umkm_usaha`, `umkm_jenis`, `umkm_jenis_lain`, `umkm_provinsi`, `umkm_kota`, `umkm_pos`, `umkm_alamat`, `umkm_pemilik`, `umkm_no`, `umkm_pic`, `umkm_no_pic`, `umkm_ig`, `umkm_fb`, `umkm_email`, `umkm_shopee`, `umkm_tokopedia`, `umkm_lazada`, `umkm_bukalapak`, `umkm_jdid`, `umkm_website`, `umkm_pameran_dalam`, `umkm_pameran_luar`, `umkm_penghargaan`, `umkm_cerita`, `umkm_berdiri`, `umkm_skala`, `umkm_karyawan`, `umkm_omset`, `umkm_jenis_biaya_bni`, `umkm_kredit`, `umkm_produk`, `umkm_produk_deskripsi`, `umkm_bpom`, `umkm_tanggal`) VALUES
(1, 3, 'Fikinaki Haouse', '001', 'Ome TV cell', 'konter', 'Lain-lain', 'jual pulsa', 'Jawa Barat', 'Jakarta', '666666', 'Bogor', 'Fiki Naki', '085000000000', 'Dayana', '089000000000', 'instagram', 'instagram', 'fikinaki@gmail.com', 'shopee', 'tokopedia', 'lazada', 'bukalapak', 'jdid', 'kanglintang.info', 'pameran malam', 'pameran rusia', 'golden tiket', 'bagus ramah dan mantap', '2021', 'Kecil', '100', '1000000', 'Kredit Kemitraan', '12000', 'buah-buahan-777x437.jpg', 'nice foto', 'Tidak', '2021-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_foreignkey` text NOT NULL,
  `user_name` text,
  `user_email` text,
  `user_password` text,
  `user_level` set('0','1','2') DEFAULT NULL,
  `user_foto` text,
  `user_hapus` int(11) DEFAULT '0',
  `user_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_foreignkey`, `user_name`, `user_email`, `user_password`, `user_level`, `user_foto`, `user_hapus`, `user_tanggal`) VALUES
(1, '1', 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '0', 'dessert_donut.png', 0, '2021-01-18'),
(7, '2', 'Dayana', 'dayana@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', NULL, 0, '2021-01-18'),
(8, '3', 'Fiki Naki', 'fiki@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2', 'dessert_froyo.png', 0, '2021-01-18');

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
  MODIFY `bumn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_detail_user`
--
ALTER TABLE `t_detail_user`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_umkm`
--
ALTER TABLE `t_umkm`
  MODIFY `umkm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
