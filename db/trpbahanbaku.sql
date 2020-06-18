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
	('5ebd4988ecb89', 'GLUEMF', 'Melamine Glue', 11270, '1', 'stok awal'),
	('5ebd4d186bc91', 'GLUELFE', 'Low Formaldehyde Emission', 18670, '1', 'Stok awal'),
	('5ec8c2aed17c2', 'HU103', 'Hardener', 465, '5', 'Stok awal'),
	('5edbb028f0ef0', 'HU100', 'HU-100', 465, '5', 'Stok awal'),
	('5edbb03d3d40c', 'HU360', 'HU-360', 400, '5', 'Stok awal'),
	('5edbb0b61f621', 'TPNG', 'Tepung', 4550, '2', 'Stok awal');
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

-- Membuang data untuk tabel trpbahanbaku.bahan_masuk: ~8 rows (lebih kurang)
/*!40000 ALTER TABLE `bahan_masuk` DISABLE KEYS */;
REPLACE INTO `bahan_masuk` (`id`, `invoice`, `tgl`, `id_bahan`, `nama`, `stok_masuk`, `keterangan`, `id_supplier`) VALUES
	('5ee8d015d8d52', 'GCKALFE1105', '2020-05-11', '5ebd4d186bc91', 'Low Formaldehyde Emission', 20000, '20 Ton', '1'),
	('5ee8d04077d61', 'GCKAMF1505', '2020-05-15', '5ebd4988ecb89', 'Melamine Glue', 7000, '7 ton', '1'),
	('5ee8d06aa8a62', 'GCKAMF2005', '2020-05-20', '5ebd4988ecb89', 'Melamine Glue', 5000, 'aman', '1'),
	('5ee8d0996f1c0', 'TPG1305', '2020-05-13', '5edbb0b61f621', 'Tepung', 2000, '', '3'),
	('5ee8d0ba5f80d', 'TPG2605', '2020-05-26', '5edbb0b61f621', 'Tepung', 3000, '', '3'),
	('5ee8d0dd7ee3f', 'HU100-1405', '2020-05-14', '5edbb028f0ef0', 'HU-100', 500, '', '1'),
	('5ee8d0f909b7f', 'HU103-1505', '2020-05-15', '5ec8c2aed17c2', 'Hardener', 500, '', '1'),
	('5ee8d121dde4f', 'HU360-1505', '2020-05-15', '5edbb03d3d40c', 'HU-360', 500, '', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_gluemix: ~48 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_gluemix` DISABLE KEYS */;
REPLACE INTO `dtl_gluemix` (`id`, `id_bahan`, `id_gluemix`, `stok_keluar`) VALUES
	(1, '5ebd4d186bc91', 1, 0),
	(2, '5ebd4988ecb89', 1, 240),
	(3, '5edbb0b61f621', 1, 50),
	(4, '5edbb028f0ef0', 1, 0),
	(5, '5ec8c2aed17c2', 1, 0),
	(6, '5edbb03d3d40c', 1, 50),
	(7, '5ebd4d186bc91', 2, 250),
	(8, '5ebd4988ecb89', 2, 0),
	(9, '5edbb0b61f621', 2, 60),
	(10, '5edbb028f0ef0', 2, 5),
	(11, '5ec8c2aed17c2', 2, 5),
	(12, '5edbb03d3d40c', 2, 0),
	(13, '5ebd4d186bc91', 3, 0),
	(14, '5ebd4988ecb89', 3, 250),
	(15, '5edbb0b61f621', 3, 50),
	(16, '5edbb028f0ef0', 3, 0),
	(17, '5ec8c2aed17c2', 3, 0),
	(18, '5edbb03d3d40c', 3, 30),
	(19, '5ebd4d186bc91', 4, 260),
	(20, '5ebd4988ecb89', 4, 0),
	(21, '5edbb0b61f621', 4, 60),
	(22, '5edbb028f0ef0', 4, 5),
	(23, '5ec8c2aed17c2', 4, 5),
	(24, '5edbb03d3d40c', 4, 0),
	(25, '5ebd4d186bc91', 5, 270),
	(26, '5ebd4988ecb89', 5, 0),
	(27, '5edbb0b61f621', 5, 65),
	(28, '5edbb028f0ef0', 5, 10),
	(29, '5ec8c2aed17c2', 5, 10),
	(30, '5edbb03d3d40c', 5, 0),
	(31, '5ebd4d186bc91', 6, 0),
	(32, '5ebd4988ecb89', 6, 240),
	(33, '5edbb0b61f621', 6, 30),
	(34, '5edbb028f0ef0', 6, 0),
	(35, '5ec8c2aed17c2', 6, 0),
	(36, '5edbb03d3d40c', 6, 20),
	(37, '5ebd4d186bc91', 7, 270),
	(38, '5ebd4988ecb89', 7, 0),
	(39, '5edbb0b61f621', 7, 60),
	(40, '5edbb028f0ef0', 7, 5),
	(41, '5ec8c2aed17c2', 7, 5),
	(42, '5edbb03d3d40c', 7, 0),
	(43, '5ebd4d186bc91', 8, 280),
	(44, '5ebd4988ecb89', 8, 0),
	(45, '5edbb0b61f621', 8, 75),
	(46, '5edbb028f0ef0', 8, 10),
	(47, '5ec8c2aed17c2', 8, 10),
	(48, '5edbb03d3d40c', 8, 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_kayu_masuk: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_kayu_masuk` DISABLE KEYS */;
REPLACE INTO `dtl_kayu_masuk` (`id`, `id_kayu`, `id_masuk`, `panjang`, `diameter1`, `diameter2`, `stok_masuk`, `kubik_masuk`) VALUES
	(6, '5ecb4d3e12f33', 2, 159, 65, 68, 100, 55.20),
	(7, '5ecb4d4b5b93d', 2, 280, 66, 65, 210, 198.12),
	(8, '5ecb4d587b02f', 2, 168, 54, 56, 379, 151.22),
	(9, '5ecb4d3e12f33', 3, 160, 68, 65, 5100, 2832.72),
	(10, '5ecb4d4b5b93d', 3, 185, 77, 84, 3100, 2913.36);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_plywood: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_plywood` DISABLE KEYS */;
REPLACE INTO `dtl_plywood` (`id`, `id_vinir`, `id_plywood`, `jenis`, `stok_keluar`, `kubik_keluar`) VALUES
	(1, '5ee1d46a5fb7d', 1, 'face back', 5600, 7.08),
	(2, '5ee1d4e032237', 1, 'core', 5600, 25.27),
	(3, '5ee1d582c5bcd', 1, 'face back', 5600, 9.10);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.gluemix: ~8 rows (lebih kurang)
/*!40000 ALTER TABLE `gluemix` DISABLE KEYS */;
REPLACE INTO `gluemix` (`id`, `tgl`, `tipe_glue`, `shift`, `total`, `keterangan`) VALUES
	(1, '2020-05-12', 'Type-1 Melamine', '1', 340, ''),
	(2, '2020-05-13', 'Type-2 LFE', '2', 320, ''),
	(3, '2020-05-13', 'Type-1 Melamine', '1', 330, ''),
	(4, '2020-05-15', 'Type-2 LFE', '1', 330, ''),
	(5, '2020-05-18', 'Type-2 LFE', '2', 355, ''),
	(6, '2020-05-18', 'Type-1 Melamine', '2', 290, ''),
	(7, '2020-05-20', 'Type-2 LFE', '2', 340, ''),
	(8, '2020-05-25', 'Type-2 LFE', '1', 375, '');
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
  `kubikperlog` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.kayu: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `kayu` DISABLE KEYS */;
REPLACE INTO `kayu` (`id`, `kd_kayu`, `id_jenis`, `stok`, `kubikasi`, `kubikperlog`, `keterangan`) VALUES
	('5ecb4d3e12f33', 'LOGMLP', '1', 5147, 2863.95, 0.56, 'Stok awal'),
	('5ecb4d4b5b93d', 'LOGDH1', '2', 3257, 3072.25, 0.94, 'Stok awal'),
	('5ecb4d587b02f', 'LOGMSW', '4', 379, 151.22, 0.40, 'Stok awal'),
	('5ee22744a86b4', 'LOGMRT', '3', 780, 920.77, 0.00, ''),
	('5ee2275051caf', 'LOGKR', '5', 50, 50.00, 0.00, '');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.kayu_masuk: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `kayu_masuk` DISABLE KEYS */;
REPLACE INTO `kayu_masuk` (`id`, `id_supplier`, `invoice`, `tgl`, `jml_stok`, `jml_kubik`, `keterangan`) VALUES
	(2, '4', 'AVC343', '2020-05-08', 689, 404.54, 'masuk'),
	(3, '5ebeb29b38c36', 'KYHSZ81', '2020-05-20', 8200, 5746.08, '');
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
	('5ebc01246be2a', '24800', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Catur Ridho', '0822771', '5ebc01246be2a.jpg', 'admin', '2020-06-18 14:35:38', '2020-05-18 20:30:53'),
	('5ebc02de8ed27', '2352345', 'acilirus', 'ee2bea29b7318b32e644d190da953f15', 'Acil Irus', '12121', '5aad4f2aede54_jpg_d6e6d07e022235c48a75238b6608d83d.jpg', 'manager', '2020-05-27 20:20:08', '2020-05-18 20:30:53'),
	('5ebc04fa7112c', '34', 'admin', 'admin', 'Admin', '119976', '_34.jpg', 'admin', '2020-05-18 20:30:53', '2020-05-18 20:30:53'),
	('5ebc0d91b1761', '2352345', 'cahbekasi', '860dec1a7a44b923c725901e11bc6363', 'Rafio Dioda', '08227716331', 'RafioGobloge_5ebc0d91b1765.png', 'user', '2020-05-27 20:20:40', '2020-05-18 20:30:53'),
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.plywood: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `plywood` DISABLE KEYS */;
REPLACE INTO `plywood` (`id`, `id_ukuran`, `tgl`, `shift`, `tipe_glue`, `tipe_ply`, `tebal`, `total_prod`, `total_kubik`, `keterangan`) VALUES
	(1, 2, '2020-06-01', '1', 'Type-2 LFE', '3', '4.1', 5600, 38.64, '');
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

-- Membuang data untuk tabel trpbahanbaku.vinir: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `vinir` DISABLE KEYS */;
REPLACE INTO `vinir` (`id`, `id_jenis`, `tebal`, `panjang`, `lebar`, `stok`, `kubikasi`, `keterangan`) VALUES
	('5ee1d46a5fb7d', 1, 0.7, 1900, 950, -5590, 2.92, ''),
	('5ee1d4c85b4dc', 1, 1.5, 1900, 950, 8888, 33.97, ''),
	('5ee1d4e032237', 1, 2.5, 1900, 950, 5546, 34.84, ''),
	('5ee1d582c5bcd', 2, 0.9, 1900, 950, -5590, 0.90, ''),
	('5ee1d59153c0b', 2, 0.7, 1900, 950, 30190, 49.23, ''),
	('5ee1d5a138a2c', 3, 0.6, 2600, 1300, 10, 10.00, ''),
	('5ee1d5b22ccac', 3, 1.7, 2600, 1300, 10, 10.00, ''),
	('5ee1d5cd33b1a', 3, 2.0, 1900, 950, 10, 10.00, ''),
	('5ee1d601eaf07', 3, 2.0, 2600, 1300, 7167, 58.67, '');
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

-- Membuang data untuk tabel trpbahanbaku.vinir_masuk: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `vinir_masuk` DISABLE KEYS */;
REPLACE INTO `vinir_masuk` (`id`, `id_vinir`, `id_kayu`, `tgl`, `shift`, `jml_log`, `kubik_log`, `r_reel`, `v_reel`, `stok_masuk`, `kubik_masuk`, `keterangan`) VALUES
	('5ee24f8196182', '5ee1d59153c0b', '5ecb4d4b5b93d', '2020-06-10', '1', 53, 50.00, 50, 1.9618, 30180, 39.23, NULL),
	('5ee260f06acb4', '5ee1d4c85b4dc', '5ecb4d3e12f33', '2020-06-02', '1', 53, 30.00, 36, 1.1095, 8878, 23.97, NULL),
	('5ee26160e2f29', '5ee1d601eaf07', '5ee22744a86b4', '2020-05-28', '1', 150, 60.00, 52, 2.8944, 7157, 48.67, NULL);
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
