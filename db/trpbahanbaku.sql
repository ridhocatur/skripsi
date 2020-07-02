-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.13-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table trpbahanbaku.bahan_bantu
DROP TABLE IF EXISTS `bahan_bantu`;
CREATE TABLE IF NOT EXISTS `bahan_bantu` (
  `id` varchar(64) NOT NULL,
  `kd_bahan` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(20) NOT NULL,
  `id_kategori` varchar(64) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.bahan_bantu: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `bahan_bantu` DISABLE KEYS */;
REPLACE INTO `bahan_bantu` (`id`, `kd_bahan`, `nama`, `stok`, `id_kategori`, `keterangan`) VALUES
	('5ebd4988ecb89', 'GLUEMF', 'Melamine Glue', 28000, '1', 'stok awal'),
	('5ebd4d186bc91', 'GLUELFE', 'Low Formaldehyde Emission', 55000, '1', 'Stok awal'),
	('5ec8c2aed17c2', 'HU103', 'Hardener', 3500, '5', 'Stok awal'),
	('5edbb028f0ef0', 'HU100', 'HU-100', 3500, '5', 'Stok awal'),
	('5edbb03d3d40c', 'HU360', 'HU-360', 3500, '5', 'Stok awal'),
	('5edbb0b61f621', 'TPNG', 'Tepung', 38000, '2', 'Stok awal');
/*!40000 ALTER TABLE `bahan_bantu` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.bahan_masuk
DROP TABLE IF EXISTS `bahan_masuk`;
CREATE TABLE IF NOT EXISTS `bahan_masuk` (
  `id` varchar(64) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `id_bahan` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok_masuk` int(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_supplier` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_bahan` (`id_bahan`),
  KEY `id_supplier` (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.bahan_masuk: ~25 rows (lebih kurang)
/*!40000 ALTER TABLE `bahan_masuk` DISABLE KEYS */;
REPLACE INTO `bahan_masuk` (`id`, `invoice`, `tgl`, `id_bahan`, `nama`, `stok_masuk`, `keterangan`, `id_supplier`) VALUES
	('5ef8393d0e43c', 'LFE18723', '2020-04-02', '5ebd4d186bc91', 'Low Formaldehyde Emission', 20000, '', '1'),
	('5ef83956c9a63', 'MF454', '2020-04-02', '5ebd4988ecb89', 'Melamine Glue', 8000, '', '1'),
	('5ef8398570235', 'TPGH122', '2020-04-03', '5edbb0b61f621', 'Tepung', 10000, '', '3'),
	('5ef839a9cf6d8', 'HARD2870', '2020-04-05', '5edbb028f0ef0', 'HU-100', 1000, '', '7'),
	('5ef839ceaebfb', 'LFE9921', '2020-04-10', '5ebd4d186bc91', 'Low Formaldehyde Emission', 10000, '', '1'),
	('5ef839ebccd94', 'HARD7821', '2020-04-13', '5ec8c2aed17c2', 'Hardener', 1000, '', '7'),
	('5ef83a051dc97', 'HARD7291', '2020-04-15', '5edbb03d3d40c', 'HU-360', 1000, '', '7'),
	('5ef83a1e8f972', 'MF2104772', '2020-04-21', '5ebd4988ecb89', 'Melamine Glue', 5000, '', '1'),
	('5ef83a4f1c561', 'TPNG22048', '2020-04-22', '5edbb0b61f621', 'Tepung', 8000, '', '3'),
	('5ef83a6d73583', 'HU0105360', '2020-05-01', '5edbb03d3d40c', 'HU-360', 500, '', '7'),
	('5ef83a7dcde25', 'HU0105100', '2020-05-01', '5edbb028f0ef0', 'HU-100', 500, '', '7'),
	('5ef83a98ca803', 'HU0105103', '2020-05-01', '5ec8c2aed17c2', 'Hardener', 500, '', '7'),
	('5ef83ab8e1644', 'LFE050520', '2020-05-05', '5ebd4d186bc91', 'Low Formaldehyde Emission', 15000, '', '1'),
	('5ef83acb63d58', 'MF050520', '2020-05-05', '5ebd4988ecb89', 'Melamine Glue', 10000, '', '1'),
	('5ef83aef4c7fb', 'TPNG120520', '2020-05-12', '5edbb0b61f621', 'Tepung', 10000, '', '3'),
	('5ef83b09d49f9', 'HU2105103', '2020-05-21', '5ec8c2aed17c2', 'Hardener', 1000, '', '7'),
	('5ef83b1cdb690', 'HU2105100', '2020-05-21', '5edbb028f0ef0', 'HU-100', 500, '', '7'),
	('5ef83b2a96989', 'HU21105360', '2020-05-21', '5edbb03d3d40c', 'HU-360', 1000, '', '7'),
	('5ef83b3b5cfa4', 'MF260520', '2020-05-26', '5ebd4988ecb89', 'Melamine Glue', 5000, '', '1'),
	('5ef83b527e92b', 'LFE040620', '2020-06-04', '5ebd4d186bc91', 'Low Formaldehyde Emission', 10000, '', '1'),
	('5ef83b66ba565', 'TPNG090620', '2020-06-09', '5edbb0b61f621', 'Tepung', 10000, '', '7'),
	('5ef83ba060193', 'HU1006100', '2020-06-10', '5edbb028f0ef0', 'HU-100', 1000, '', '7'),
	('5ef83bad98a84', 'HU1206103', '2020-06-12', '5ec8c2aed17c2', 'Hardener', 1000, '', '7'),
	('5ef83bba8c405', 'HU1206360', '2020-06-12', '5edbb03d3d40c', 'HU-360', 1000, '', '7'),
	('5ef83be38ec7b', 'HU1506100', '2020-06-15', '5edbb028f0ef0', 'HU-100', 500, '', '7');
/*!40000 ALTER TABLE `bahan_masuk` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.dtl_gluemix
DROP TABLE IF EXISTS `dtl_gluemix`;
CREATE TABLE IF NOT EXISTS `dtl_gluemix` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_bahan` varchar(64) NOT NULL,
  `id_gluemix` int(64) NOT NULL,
  `stok_keluar` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id_bahan` (`id_bahan`),
  KEY `id_gluemix` (`id_gluemix`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_gluemix: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_gluemix` DISABLE KEYS */;
/*!40000 ALTER TABLE `dtl_gluemix` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.dtl_kayu_masuk
DROP TABLE IF EXISTS `dtl_kayu_masuk`;
CREATE TABLE IF NOT EXISTS `dtl_kayu_masuk` (
  `id` int(64) unsigned NOT NULL AUTO_INCREMENT,
  `id_kayu` varchar(64) NOT NULL,
  `id_masuk` int(64) NOT NULL,
  `panjang` int(20) NOT NULL,
  `diameter1` int(20) NOT NULL,
  `diameter2` int(20) NOT NULL,
  `stok_masuk` int(20) NOT NULL,
  `kubik_masuk` float(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kayu` (`id_kayu`),
  KEY `id_masuk` (`id_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_kayu_masuk: ~24 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_kayu_masuk` DISABLE KEYS */;
REPLACE INTO `dtl_kayu_masuk` (`id`, `id_kayu`, `id_masuk`, `panjang`, `diameter1`, `diameter2`, `stok_masuk`, `kubik_masuk`) VALUES
	(3, '5ecb4d3e12f33', 2, 300, 50, 50, 2500, 1472.63),
	(4, '5ecb4d4b5b93d', 2, 310, 56, 55, 2500, 1874.75),
	(5, '5ecb4d587b02f', 2, 290, 51, 51, 3000, 1777.26),
	(6, '5ecb4d3e12f33', 3, 320, 60, 61, 1000, 919.86),
	(7, '5ee22744a86b4', 3, 300, 56, 55, 1500, 1088.56),
	(8, '5ee2275051caf', 4, 270, 55, 55, 2000, 1282.95),
	(9, '5ef838d8beeb3', 4, 250, 50, 51, 1500, 751.04),
	(10, '5ee2275051caf', 5, 300, 50, 50, 1000, 589.05),
	(11, '5ef838d8beeb3', 5, 270, 49, 50, 500, 259.77),
	(12, '5ecb4d587b02f', 6, 340, 55, 56, 2000, 1644.94),
	(13, '5ee22744a86b4', 6, 320, 53, 54, 2000, 1438.60),
	(14, '5ecb4d3e12f33', 7, 380, 55, 55, 2500, 2257.04),
	(15, '5ecb4d4b5b93d', 7, 375, 55, 54, 2500, 2186.85),
	(16, '5ecb4d587b02f', 7, 370, 49, 50, 1500, 1067.95),
	(17, '5ecb4d4b5b93d', 8, 350, 55, 56, 2500, 2116.65),
	(18, '5ee22744a86b4', 8, 360, 55, 55, 2500, 2138.25),
	(19, '5ee22744a86b4', 9, 340, 45, 46, 1500, 829.15),
	(20, '5ee2275051caf', 9, 350, 50, 51, 1500, 1051.45),
	(21, '5ef838d8beeb3', 10, 360, 50, 52, 2500, 1837.84),
	(22, '5ecb4d3e12f33', 11, 410, 52, 53, 3000, 2662.41),
	(23, '5ecb4d587b02f', 11, 400, 55, 55, 3000, 2851.00),
	(24, '5ecb4d4b5b93d', 12, 380, 55, 55, 2500, 2257.04),
	(25, '5ee22744a86b4', 12, 380, 52, 52, 3000, 2421.04),
	(26, '5ee2275051caf', 13, 380, 55, 55, 3000, 2708.45);
/*!40000 ALTER TABLE `dtl_kayu_masuk` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.dtl_plywood
DROP TABLE IF EXISTS `dtl_plywood`;
CREATE TABLE IF NOT EXISTS `dtl_plywood` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_vinir` varchar(64) NOT NULL,
  `id_plywood` int(64) NOT NULL,
  `jenis` enum('face back','core','long grain') NOT NULL,
  `stok_keluar` int(20) NOT NULL DEFAULT 0,
  `kubik_keluar` float(8,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `id_vinir_keluar` (`id_vinir`),
  KEY `id_keluar` (`id_plywood`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_plywood: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_plywood` DISABLE KEYS */;
/*!40000 ALTER TABLE `dtl_plywood` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.gluemix
DROP TABLE IF EXISTS `gluemix`;
CREATE TABLE IF NOT EXISTS `gluemix` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `tipe_glue` varchar(30) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.gluemix: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `gluemix` DISABLE KEYS */;
/*!40000 ALTER TABLE `gluemix` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.jeniskayu
DROP TABLE IF EXISTS `jeniskayu`;
CREATE TABLE IF NOT EXISTS `jeniskayu` (
  `id` varchar(64) NOT NULL,
  `kd_jenis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT 'Tidak ada',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.jeniskayu: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `jeniskayu` DISABLE KEYS */;
REPLACE INTO `jeniskayu` (`id`, `kd_jenis`, `nama`, `keterangan`) VALUES
	('1', 'MLP', 'Melapi', ''),
	('2', 'DH', 'Damar Hitam', ''),
	('3', 'MRT', 'Meranti', ''),
	('4', 'MSW', 'Mersawa', ''),
	('5', 'KR', 'Kruing', ''),
	('6', 'BL', 'Balau', '');
/*!40000 ALTER TABLE `jeniskayu` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` varchar(64) NOT NULL,
  `nm_kateg` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.kategori: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
REPLACE INTO `kategori` (`id`, `nm_kateg`, `keterangan`) VALUES
	('1', 'Lem Plywood', 'lem'),
	('2', 'Tepung Industri', ''),
	('4', 'Kayu Log', ''),
	('5', 'Hardener', 'hardener'),
	('6', 'Veneer Basah', ''),
	('7', 'Veneer Kering', '');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.kayu
DROP TABLE IF EXISTS `kayu`;
CREATE TABLE IF NOT EXISTS `kayu` (
  `id` varchar(64) NOT NULL,
  `kd_kayu` varchar(20) NOT NULL,
  `id_jenis` varchar(64) NOT NULL,
  `stok` int(20) NOT NULL DEFAULT 0,
  `kubikasi` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.kayu: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `kayu` DISABLE KEYS */;
REPLACE INTO `kayu` (`id`, `kd_kayu`, `id_jenis`, `stok`, `kubikasi`, `keterangan`) VALUES
	('5ecb4d3e12f33', 'LOGMLP', '1', 8890, 7239.78, 'Stok awal'),
	('5ecb4d4b5b93d', 'LOGDH1', '2', 9885, 8356.54, 'Stok awal'),
	('5ecb4d587b02f', 'LOGMSW', '4', 9380, 7265.15, 'Stok awal'),
	('5ee22744a86b4', 'LOGMRT', '3', 10355, 7826.73, ''),
	('5ee2275051caf', 'LOGKR', '5', 7407, 5575.81, ''),
	('5ef838d8beeb3', 'LOGBLU', '6', 4406, 2800.44, '');
/*!40000 ALTER TABLE `kayu` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.kayu_masuk
DROP TABLE IF EXISTS `kayu_masuk`;
CREATE TABLE IF NOT EXISTS `kayu_masuk` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `id_supplier` varchar(64) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `jml_stok` int(20) NOT NULL,
  `jml_kubik` float(8,2) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_supplier` (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.kayu_masuk: ~12 rows (lebih kurang)
/*!40000 ALTER TABLE `kayu_masuk` DISABLE KEYS */;
REPLACE INTO `kayu_masuk` (`id`, `id_supplier`, `invoice`, `tgl`, `jml_stok`, `jml_kubik`, `keterangan`) VALUES
	(2, '4', 'KAJR040420', '2020-04-04', 8000, 5124.64, ''),
	(3, '5eba94e44279f', 'KTA140420', '2020-04-14', 2500, 2008.42, ''),
	(4, '5ebeb29b38c36', 'SBJ220420', '2020-04-22', 3500, 2033.99, ''),
	(5, '6', 'AB300420', '2020-04-30', 1500, 848.82, ''),
	(6, '6', 'AB040520', '2020-05-05', 4000, 3083.54, ''),
	(7, '4', 'KAJR150520', '2020-05-15', 6500, 5511.84, ''),
	(8, '5eba94e44279f', 'KTA200520', '2020-05-20', 5000, 4254.90, ''),
	(9, '5ebeb29b38c36', 'SBJ260520', '2020-05-26', 3000, 1880.60, ''),
	(10, '6', 'AB300520', '2020-05-30', 2500, 1837.84, ''),
	(11, '4', 'KAJR020620', '2020-06-02', 6000, 5513.41, ''),
	(12, '5ebeb29b38c36', 'SBJ100620', '2020-06-10', 5500, 4678.08, ''),
	(13, '6', 'AB150620', '2020-06-15', 3000, 2708.45, '');
/*!40000 ALTER TABLE `kayu_masuk` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.nilai_baku
DROP TABLE IF EXISTS `nilai_baku`;
CREATE TABLE IF NOT EXISTS `nilai_baku` (
  `id` int(10) NOT NULL,
  `dbobin` float(8,2) NOT NULL DEFAULT 0.00,
  `vbobin` float(8,4) NOT NULL DEFAULT 0.0000,
  `kerapatan` float(8,2) NOT NULL DEFAULT 0.00,
  `phi` float(8,4) NOT NULL DEFAULT 0.0000,
  `rendem` float(8,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.nilai_baku: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `nilai_baku` DISABLE KEYS */;
REPLACE INTO `nilai_baku` (`id`, `dbobin`, `vbobin`, `kerapatan`, `phi`, `rendem`) VALUES
	(1, 0.16, 0.0543, 0.85, 0.7854, 0.80);
/*!40000 ALTER TABLE `nilai_baku` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.pegawai
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` varchar(64) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(18) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `level` enum('admin','user','manager') NOT NULL DEFAULT 'user',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.pegawai: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
REPLACE INTO `pegawai` (`id`, `nik`, `username`, `password`, `nama`, `telp`, `gambar`, `level`, `last_login`, `created_at`) VALUES
	('5ebc01246be2a', '24800', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Catur Ridho', '0822771', '5ebc01246be2a.jpg', 'admin', '2020-06-30 15:21:43', '2020-05-18 20:30:53'),
	('5ebc02de8ed27', '2352345', 'acilirus', 'ee2bea29b7318b32e644d190da953f15', 'Acil Irus', '12121', '5aad4f2aede54_jpg_d6e6d07e022235c48a75238b6608d83d.jpg', 'manager', '2020-06-27 23:40:59', '2020-05-18 20:30:53'),
	('5ebc04fa7112c', '34', 'admin', 'admin', 'Admin', '119976', '_34.jpg', 'admin', '2020-05-18 20:30:53', '2020-05-18 20:30:53'),
	('5ebc0d91b1761', '2352345', 'cahbekasi', '860dec1a7a44b923c725901e11bc6363', 'Rafio Dioda', '08227716331', 'RafioGobloge_5ebc0d91b1765.png', 'user', '2020-06-27 23:40:44', '2020-05-18 20:30:53'),
	('5ebc131684828', '3', 'cc', '97e5622531f92f5710497dfdc35be728', 'cc', '333', 'cc_3.jpg', '', '2020-05-18 20:30:53', '2020-05-18 20:30:53'),
	('5ee4655ec2fc8', '90018', 'razzy', '0d4c01cb7c1fcfd6ed48e31425c637cc', 'Facrurazzy', '083657232', 'Facrurazzy_90018.jpg', 'admin', '2020-06-13 13:34:22', '2020-06-13 13:34:22');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.plywood
DROP TABLE IF EXISTS `plywood`;
CREATE TABLE IF NOT EXISTS `plywood` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_ukuran` int(11) NOT NULL DEFAULT 0,
  `tgl` date NOT NULL,
  `shift` varchar(10) NOT NULL,
  `tipe_glue` varchar(20) NOT NULL,
  `tipe_ply` enum('3','5','7','9','11') NOT NULL,
  `tebal` varchar(20) NOT NULL,
  `total_prod` int(20) NOT NULL DEFAULT 0,
  `total_kubik` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_ukuran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.plywood: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `plywood` DISABLE KEYS */;
/*!40000 ALTER TABLE `plywood` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.supplier
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` varchar(64) NOT NULL,
  `nm_sup` varchar(100) NOT NULL,
  `sup` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.supplier: ~8 rows (lebih kurang)
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
REPLACE INTO `supplier` (`id`, `nm_sup`, `sup`, `alamat`, `email`, `telp`, `keterangan`) VALUES
	('1', 'PT. GCKA', 'bahan', 'jl. barito kuala', 'gckabanjarmasin@gmail.com', '234534', 'pabrik lem dan hardener'),
	('3', 'PT. Bogasari Flour Mills', 'bahan', 'jakarta', 'bogasari@gmail.com', '021554621', 'tepung'),
	('4', 'PT. Kayu Ara Jaya Raya', 'kayu', 'kaltim', '', '', ''),
	('5eba94e44279f', 'PT. Kahayan Terang Abadi', 'kayu', 'Barito Kuala', 'kahayan@gmail.com', '0892763312', ''),
	('5ebd45995c945', 'PT. Gelora Citra', 'Bahan bantu', 'jl. barito kuala', 'gckabanjarmasin@gmail.com', '0511676354', ''),
	('5ebeb29b38c36', 'PT. Sumber Berkat Jaya', 'Kayu', 'Jl. Sudimara', '', '0887467324', ''),
	('6', 'PT. Austral Byna', 'kayu', NULL, NULL, NULL, NULL),
	('7', 'Japan Hydrazine Co. Inc', 'bahan', 'Jakarta', '', '', 'ADH');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.ukuran
DROP TABLE IF EXISTS `ukuran`;
CREATE TABLE IF NOT EXISTS `ukuran` (
  `id` int(64) unsigned NOT NULL AUTO_INCREMENT,
  `lebar` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.ukuran: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `ukuran` DISABLE KEYS */;
REPLACE INTO `ukuran` (`id`, `lebar`, `panjang`) VALUES
	(1, 910, 1820),
	(2, 920, 1830),
	(7, 1230, 2440);
/*!40000 ALTER TABLE `ukuran` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.vinir
DROP TABLE IF EXISTS `vinir`;
CREATE TABLE IF NOT EXISTS `vinir` (
  `id` varchar(64) NOT NULL,
  `id_jenis` int(64) NOT NULL,
  `tebal` float(8,1) NOT NULL,
  `panjang` int(11) NOT NULL DEFAULT 0,
  `lebar` int(11) NOT NULL DEFAULT 0,
  `stok` int(20) NOT NULL DEFAULT 0,
  `kubikasi` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.vinir: ~48 rows (lebih kurang)
/*!40000 ALTER TABLE `vinir` DISABLE KEYS */;
REPLACE INTO `vinir` (`id`, `id_jenis`, `tebal`, `panjang`, `lebar`, `stok`, `kubikasi`, `keterangan`) VALUES
	('5ef844e61c406', 1, 1.0, 1900, 950, 8798, 15.84, ''),
	('5ef8450144758', 1, 1.6, 1900, 950, 0, 0.00, ''),
	('5ef8450f9562f', 1, 2.5, 1900, 950, 0, 0.00, ''),
	('5ef8451a0bbfe', 1, 3.5, 1900, 950, 3806, 23.98, ''),
	('5ef84546affb1', 1, 1.0, 2600, 1300, 9513, 32.34, ''),
	('5ef84557043da', 1, 1.6, 2600, 1300, 0, 0.00, ''),
	('5ef845f1d92c5', 1, 2.5, 2600, 1300, 0, 0.00, ''),
	('5ef84601caf93', 1, 3.5, 2600, 1300, 0, 0.00, ''),
	('5ef8460cc7f24', 2, 1.0, 1900, 950, 0, 0.00, ''),
	('5ef8461c5880c', 2, 1.6, 1900, 950, 5506, 15.97, ''),
	('5ef84623e09ff', 2, 2.5, 1900, 950, 0, 0.00, ''),
	('5ef8462c6ef9a', 2, 3.5, 1900, 950, 3818, 24.05, ''),
	('5ef84636b363c', 2, 1.0, 2600, 1300, 0, 0.00, ''),
	('5ef8463fc6d8b', 2, 1.6, 2600, 1300, 2995, 16.17, ''),
	('5ef846464d055', 2, 2.5, 2600, 1300, 2686, 22.56, ''),
	('5ef8465d6db68', 2, 3.5, 2600, 1300, 0, 0.00, ''),
	('5ef846642a2fe', 3, 1.0, 1900, 950, 0, 0.00, ''),
	('5ef8467e59257', 3, 1.6, 1900, 950, 0, 0.00, ''),
	('5ef84685b9761', 3, 2.5, 1900, 950, 3534, 15.90, ''),
	('5ef8468d384ae', 3, 3.5, 1900, 950, 3806, 23.98, ''),
	('5ef846a8982fd', 3, 1.0, 2600, 1300, 0, 0.00, ''),
	('5ef846af0c22e', 3, 1.6, 2600, 1300, 4618, 24.94, ''),
	('5ef846b6769fe', 3, 2.5, 2600, 1300, 2863, 24.05, ''),
	('5ef846c9afe6d', 3, 3.5, 2600, 1300, 0, 0.00, ''),
	('5ef846d0bfce6', 4, 1.0, 1900, 950, 4514, 8.13, ''),
	('5ef84757eb474', 4, 1.6, 1900, 950, 0, 0.00, ''),
	('5ef8476001dab', 4, 2.5, 1900, 950, 0, 0.00, ''),
	('5ef8476d27b12', 4, 3.5, 1900, 950, 3162, 19.92, ''),
	('5ef848009d90b', 4, 1.0, 2600, 1300, 7114, 24.19, ''),
	('5ef84808269b5', 4, 1.6, 2600, 1300, 4400, 23.76, ''),
	('5ef8480fae5d8', 4, 2.5, 2600, 1300, 0, 0.00, ''),
	('5ef84827c54e3', 4, 3.5, 2600, 1300, 0, 0.00, ''),
	('5ef8482fbea01', 5, 1.0, 1900, 950, 13400, 24.12, ''),
	('5ef848374c6c8', 5, 1.6, 1900, 950, 0, 0.00, ''),
	('5ef8483f4f64d', 5, 2.5, 1900, 950, 0, 0.00, ''),
	('5ef848557d147', 5, 3.5, 1900, 950, 0, 0.00, ''),
	('5ef84890363b9', 5, 1.0, 2600, 1300, 0, 0.00, ''),
	('5ef8489742938', 5, 1.6, 2600, 1300, 0, 0.00, ''),
	('5ef848a1ad319', 5, 2.5, 2600, 1300, 3806, 31.97, ''),
	('5ef848a9c764e', 5, 3.5, 2600, 1300, 0, 0.00, ''),
	('5ef848b77e9ba', 6, 1.0, 1900, 950, 0, 0.00, ''),
	('5ef848c0c975e', 6, 1.6, 1900, 950, 8258, 23.95, ''),
	('5ef848c81d9cc', 6, 2.5, 1900, 950, 0, 0.00, ''),
	('5ef848e478a3c', 6, 3.5, 1900, 950, 0, 0.00, ''),
	('5ef848eba6f4d', 6, 1.0, 2600, 1300, 0, 0.00, ''),
	('5ef848f256a4b', 6, 1.6, 2600, 1300, 4493, 24.26, ''),
	('5ef848f9207dd', 6, 2.5, 2600, 1300, 0, 0.00, ''),
	('5ef848ff6eedd', 6, 3.5, 2600, 1300, 0, 0.00, '');
/*!40000 ALTER TABLE `vinir` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.vinir_masuk
DROP TABLE IF EXISTS `vinir_masuk`;
CREATE TABLE IF NOT EXISTS `vinir_masuk` (
  `id` varchar(64) NOT NULL,
  `id_vinir` varchar(64) NOT NULL,
  `id_kayu` varchar(64) NOT NULL,
  `tgl` date NOT NULL,
  `shift` enum('1','2') NOT NULL,
  `jml_log` int(11) NOT NULL DEFAULT 0,
  `kubik_log` float(8,2) NOT NULL DEFAULT 0.00,
  `r_reel` int(11) NOT NULL DEFAULT 0,
  `v_reel` float(8,4) NOT NULL DEFAULT 0.0000,
  `stok_masuk` int(20) NOT NULL DEFAULT 0,
  `kubik_masuk` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 3` (`id_kayu`),
  KEY `index2` (`id_vinir`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.vinir_masuk: ~21 rows (lebih kurang)
/*!40000 ALTER TABLE `vinir_masuk` DISABLE KEYS */;
REPLACE INTO `vinir_masuk` (`id`, `id_vinir`, `id_kayu`, `tgl`, `shift`, `jml_log`, `kubik_log`, `r_reel`, `v_reel`, `stok_masuk`, `kubik_masuk`, `keterangan`) VALUES
	('5efae86d4cd38', '5ef844e61c406', '5ecb4d3e12f33', '2020-04-06', '1', 24, 20.00, 20, 0.4218, 8798, 15.84, NULL),
	('5efae88b96eb3', '5ef8461c5880c', '5ecb4d4b5b93d', '2020-04-06', '1', 24, 20.00, 15, 0.2696, 5506, 15.97, NULL),
	('5efae89ebc190', '5ef84685b9761', '5ee22744a86b4', '2020-04-07', '1', 26, 20.00, 20, 0.4218, 3534, 15.90, NULL),
	('5efae8b2b045b', '5ef8476d27b12', '5ecb4d587b02f', '2020-04-08', '1', 32, 25.00, 20, 0.4218, 3162, 19.92, NULL),
	('5efae8ccd5c99', '5ef8482fbea01', '5ee2275051caf', '2020-04-10', '1', 40, 30.00, 25, 0.6039, 13400, 24.12, NULL),
	('5efae8fe0efcb', '5ef84546affb1', '5ecb4d3e12f33', '2020-05-12', '1', 12, 10.00, 15, 0.3859, 2371, 8.06, NULL),
	('5efae9104deb8', '5ef846b6769fe', '5ee22744a86b4', '2020-05-13', '1', 20, 15.00, 15, 0.3859, 1435, 12.05, NULL),
	('5efae92b6b09f', '5ef84546affb1', '5ecb4d3e12f33', '2020-05-18', '1', 37, 30.00, 25, 0.8434, 7142, 24.28, NULL),
	('5efae9539cfbf', '5ef8463fc6d8b', '5ecb4d4b5b93d', '2020-05-20', '1', 23, 20.00, 25, 0.8434, 2995, 16.17, NULL),
	('5efb00dea83bd', '5ef8468d384ae', '5ee22744a86b4', '2020-05-25', '1', 40, 30.00, 20, 0.4218, 3806, 23.98, NULL),
	('5efb00fa5ea77', '5ef848c0c975e', '5ef838d8beeb3', '2020-05-28', '1', 47, 30.00, 15, 0.2696, 8258, 23.95, NULL),
	('5efb0252aa5d1', '5ef848f256a4b', '5ef838d8beeb3', '2020-05-28', '1', 47, 30.00, 25, 0.8434, 4493, 24.26, NULL),
	('5efb026b01cf9', '5ef848009d90b', '5ecb4d587b02f', '2020-06-02', '1', 38, 30.00, 15, 0.3859, 7114, 24.19, NULL),
	('5efb028294e69', '5ef84808269b5', '5ecb4d587b02f', '2020-06-02', '1', 38, 30.00, 20, 0.5942, 4400, 23.76, NULL),
	('5efb0296a242f', '5ef848a1ad319', '5ee2275051caf', '2020-06-08', '1', 53, 40.00, 20, 0.5942, 3806, 31.97, NULL),
	('5efb02b37725e', '5ef8451a0bbfe', '5ecb4d3e12f33', '2020-06-09', '1', 37, 30.00, 20, 0.4218, 3806, 23.98, NULL),
	('5efb02c80af47', '5ef8462c6ef9a', '5ecb4d4b5b93d', '2020-06-10', '1', 35, 30.00, 30, 0.8158, 3818, 24.05, NULL),
	('5efb02e271235', '5ef846464d055', '5ecb4d4b5b93d', '2020-06-10', '1', 33, 28.00, 15, 0.3859, 2686, 22.56, NULL),
	('5efb02fe06667', '5ef846af0c22e', '5ee22744a86b4', '2020-06-15', '1', 40, 31.00, 25, 0.8434, 4618, 24.94, NULL),
	('5efb030cb3e9f', '5ef846b6769fe', '5ee22744a86b4', '2020-06-16', '1', 19, 15.00, 16, 0.4243, 1428, 12.00, NULL),
	('5efb036049b76', '5ef846d0bfce6', '5ecb4d587b02f', '2020-06-18', '1', 12, 10.00, 17, 0.3269, 4514, 8.13, NULL);
/*!40000 ALTER TABLE `vinir_masuk` ENABLE KEYS */;

-- membuang struktur untuk view trpbahanbaku.v_bahanbantu_stok
DROP VIEW IF EXISTS `v_bahanbantu_stok`;
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_bahanbantu_stok` (
	`id` VARCHAR(64) NOT NULL COLLATE 'latin1_swedish_ci',
	`kd_bahan` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`stok` INT(20) NOT NULL,
	`id_kategori` VARCHAR(64) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`masuk` DECIMAL(41,0) NOT NULL,
	`keluar` DECIMAL(41,0) NOT NULL,
	`nm_kateg` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk view trpbahanbaku.v_bahanbantu_tgl
DROP VIEW IF EXISTS `v_bahanbantu_tgl`;
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_bahanbantu_tgl` (
	`kd_bahan` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kateg` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`masuk` DECIMAL(41,0) NOT NULL,
	`keluar` DECIMAL(41,0) NOT NULL,
	`tglmasuk` DATE NULL,
	`tglkeluar` DATE NULL
) ENGINE=MyISAM;

-- membuang struktur untuk view trpbahanbaku.v_gluemix_all
DROP VIEW IF EXISTS `v_gluemix_all`;
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_gluemix_all` (
	`gid` INT(64) NOT NULL,
	`tgl` DATE NOT NULL,
	`total` INT(20) NOT NULL,
	`id_bahan` VARCHAR(64) NULL COLLATE 'latin1_swedish_ci',
	`stok_keluar` INT(20) NULL
) ENGINE=MyISAM;

-- membuang struktur untuk trigger trpbahanbaku.bahanmasuk_delete
DROP TRIGGER IF EXISTS `bahanmasuk_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `bahanmasuk_delete` BEFORE DELETE ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok-OLD.stok_masuk
    WHERE id=OLD.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.bahanmasuk_insert
DROP TRIGGER IF EXISTS `bahanmasuk_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `bahanmasuk_insert` AFTER INSERT ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok+NEW.stok_masuk
    WHERE id=NEW.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.bahanmasuk_update
DROP TRIGGER IF EXISTS `bahanmasuk_update`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `bahanmasuk_update` AFTER UPDATE ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=(stok-OLD.stok_masuk)+NEW.stok_masuk
    WHERE id=NEW.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_gluemix_delete
DROP TRIGGER IF EXISTS `dtl_gluemix_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_gluemix_delete` BEFORE DELETE ON `dtl_gluemix` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok+OLD.stok_keluar
    WHERE id=OLD.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_gluemix_insert
DROP TRIGGER IF EXISTS `dtl_gluemix_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_gluemix_insert` AFTER INSERT ON `dtl_gluemix` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok-NEW.stok_keluar WHERE id=NEW.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_kayumasuk_delete
DROP TRIGGER IF EXISTS `dtl_kayumasuk_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_kayumasuk_delete` AFTER DELETE ON `dtl_kayu_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok-OLD.stok_masuk, kubikasi=kubikasi-OLD.kubik_masuk
    WHERE id = OLD.id_kayu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_kayumasuk_insert
DROP TRIGGER IF EXISTS `dtl_kayumasuk_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_kayumasuk_insert` AFTER INSERT ON `dtl_kayu_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok+NEW.stok_masuk, kubikasi=kubikasi+NEW.kubik_masuk
    WHERE id=NEW.id_kayu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_plywood_delete
DROP TRIGGER IF EXISTS `dtl_plywood_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_plywood_delete` AFTER DELETE ON `dtl_plywood` FOR EACH ROW BEGIN
	UPDATE vinir SET stok=stok+OLD.stok_keluar, kubikasi=kubikasi+OLD.kubik_keluar
	WHERE id=OLD.id_vinir;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_plywood_insert
DROP TRIGGER IF EXISTS `dtl_plywood_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_plywood_insert` AFTER INSERT ON `dtl_plywood` FOR EACH ROW BEGIN
	UPDATE vinir SET stok=stok-NEW.stok_keluar, kubikasi=kubikasi-NEW.kubik_keluar
	WHERE id=NEW.id_vinir;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.gluemix_delete
DROP TRIGGER IF EXISTS `gluemix_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `gluemix_delete` AFTER DELETE ON `gluemix` FOR EACH ROW BEGIN
	DELETE FROM dtl_gluemix WHERE dtl_gluemix.id_gluemix = OLD.id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.kayulog_vinirmasuk_delete
DROP TRIGGER IF EXISTS `kayulog_vinirmasuk_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kayulog_vinirmasuk_delete` AFTER DELETE ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok+OLD.jml_log, kubikasi=kubikasi+OLD.kubik_masuk
    WHERE id = OLD.id_kayu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.kayulog_vinirmasuk_insert
DROP TRIGGER IF EXISTS `kayulog_vinirmasuk_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kayulog_vinirmasuk_insert` BEFORE INSERT ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok-NEW.jml_log, kubikasi=kubikasi-NEW.kubik_masuk
    WHERE id = NEW.id_kayu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.kayumasuk_delete
DROP TRIGGER IF EXISTS `kayumasuk_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kayumasuk_delete` BEFORE DELETE ON `kayu_masuk` FOR EACH ROW BEGIN
	DELETE FROM dtl_kayu_masuk WHERE id_masuk=OLD.id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.plywood_delete
DROP TRIGGER IF EXISTS `plywood_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `plywood_delete` AFTER DELETE ON `plywood` FOR EACH ROW BEGIN
	DELETE FROM dtl_plywood WHERE dtl_plywood.id_plywood = OLD.id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.vinirmasuk_insert
DROP TRIGGER IF EXISTS `vinirmasuk_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `vinirmasuk_insert` AFTER INSERT ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE vinir SET stok=stok+NEW.stok_masuk, kubikasi=kubikasi+NEW.kubik_masuk
    WHERE id = NEW.id_vinir;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk view trpbahanbaku.v_bahanbantu_stok
DROP VIEW IF EXISTS `v_bahanbantu_stok`;
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_bahanbantu_stok`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_bahanbantu_stok` AS SELECT bahan_bantu.*, IFNULL(bahanmasuk.masuk, 0) AS masuk, IFNULL(bahankeluar.keluar, 0) AS keluar, kategori.nm_kateg
FROM bahan_bantu
LEFT JOIN (SELECT id_bahan, SUM(stok_masuk) AS masuk FROM bahan_masuk GROUP BY id_bahan) bahanmasuk ON bahanmasuk.id_bahan = bahan_bantu.id
LEFT JOIN (SELECT id_bahan, SUM(stok_keluar) AS keluar FROM dtl_gluemix GROUP BY id_bahan) bahankeluar ON bahankeluar.id_bahan = bahan_bantu.id
LEFT JOIN kategori ON bahan_bantu.id_kategori = kategori.id
GROUP BY bahan_bantu.kd_bahan ;

-- membuang struktur untuk view trpbahanbaku.v_bahanbantu_tgl
DROP VIEW IF EXISTS `v_bahanbantu_tgl`;
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_bahanbantu_tgl`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_bahanbantu_tgl` AS SELECT bahan_bantu.kd_bahan, bahan_bantu.nama, kategori.nm_kateg, IFNULL(bahanmasuk.masuk, 0) AS masuk, IFNULL(bahankeluar.keluar, 0) AS keluar, bahanmasuk.tglmasuk, bahankeluar.tglkeluar
FROM bahan_bantu
LEFT JOIN (SELECT id_bahan, tgl AS tglmasuk, SUM(stok_masuk) AS masuk FROM bahan_masuk GROUP BY id_bahan) bahanmasuk ON bahanmasuk.id_bahan = bahan_bantu.id
LEFT JOIN (SELECT id_bahan, tgl AS tglkeluar, SUM(stok_keluar) AS keluar FROM v_gluemix_all GROUP BY id_bahan) bahankeluar ON bahankeluar.id_bahan = bahan_bantu.id
LEFT JOIN kategori ON bahan_bantu.id_kategori = kategori.id
GROUP BY bahan_bantu.kd_bahan ;

-- membuang struktur untuk view trpbahanbaku.v_gluemix_all
DROP VIEW IF EXISTS `v_gluemix_all`;
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_gluemix_all`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gluemix_all` AS SELECT gluemix.id AS gid,gluemix.tgl, gluemix.total, dtl_gluemix.id_bahan, dtl_gluemix.stok_keluar
FROM gluemix
LEFT JOIN dtl_gluemix ON dtl_gluemix.id_gluemix = gluemix.id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
