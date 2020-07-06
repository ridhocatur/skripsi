-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.6-MariaDB - mariadb.org binary distribution
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
	('5ebd4988ecb89', 'GLUEMF', 'Melamine Glue', 445, '1', 'stok awal'),
	('5ebd4d186bc91', 'GLUELFE', 'Low Formaldehyde Emission', 6215, '1', 'Stok awal'),
	('5ec8c2aed17c2', 'HU103', 'HU-103', 2979, '5', 'Stok awal'),
	('5edbb028f0ef0', 'HU100', 'HU-100', 1479, '5', 'Stok awal'),
	('5edbb03d3d40c', 'HU360', 'HU-360', 1450, '5', 'Stok awal'),
	('5edbb0b61f621', 'TPNG', 'Tepung', 1425, '2', 'Stok awal');
/*!40000 ALTER TABLE `bahan_bantu` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.bahan_masuk
DROP TABLE IF EXISTS `bahan_masuk`;
CREATE TABLE IF NOT EXISTS `bahan_masuk` (
  `id` varchar(64) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `id_bahan` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok_awal` int(20) NOT NULL,
  `stok_masuk` int(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_supplier` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_bahan` (`id_bahan`),
  KEY `id_supplier` (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.bahan_masuk: ~7 rows (lebih kurang)
/*!40000 ALTER TABLE `bahan_masuk` DISABLE KEYS */;
REPLACE INTO `bahan_masuk` (`id`, `invoice`, `tgl`, `id_bahan`, `nama`, `stok_awal`, `stok_masuk`, `keterangan`, `id_supplier`) VALUES
	('5eff8640438c4', 'LFE010620', '2020-06-01', '5ebd4d186bc91', 'Low Formaldehyde Emission', 0, 5000, '', '1'),
	('5eff865343252', 'MF020620', '2020-06-02', '5ebd4988ecb89', 'Melamine Glue', 0, 2000, '', '1'),
	('5eff868cc56d2', 'LFE140620', '2020-06-14', '5ebd4d186bc91', 'Low Formaldehyde Emission', 5000, 2500, '', '1'),
	('5f0068e4e3771', 'HU103-160620', '2020-06-16', '5ec8c2aed17c2', 'Hardener', 0, 1500, '', '7'),
	('5f0068f7acd18', 'HU103-170620', '2020-06-17', '5ec8c2aed17c2', 'Hardener', 1500, 1500, '', '7'),
	('5f00691243d4b', 'HU360-170620', '2020-06-17', '5edbb03d3d40c', 'HU-360', 0, 1500, '', '7'),
	('5f006a444db9f', 'TPGN220620', '2020-06-22', '5edbb0b61f621', 'Tepung', 0, 2000, '', '3'),
	('5f00a546bca08', 'HU100-230620', '2020-06-23', '5edbb028f0ef0', 'HU-100', 0, 1500, '', '7');
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_gluemix: ~66 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_gluemix` DISABLE KEYS */;
REPLACE INTO `dtl_gluemix` (`id`, `id_bahan`, `id_gluemix`, `stok_keluar`) VALUES
	(13, '5ebd4d186bc91', 3, 0),
	(14, '5ebd4988ecb89', 3, 260),
	(15, '5edbb0b61f621', 3, 50),
	(16, '5edbb028f0ef0', 3, 0),
	(17, '5ec8c2aed17c2', 3, 0),
	(18, '5edbb03d3d40c', 3, 10),
	(19, '5ebd4d186bc91', 4, 250),
	(20, '5ebd4988ecb89', 4, 0),
	(21, '5edbb0b61f621', 4, 60),
	(22, '5edbb028f0ef0', 4, 2),
	(23, '5ec8c2aed17c2', 4, 2),
	(24, '5edbb03d3d40c', 4, 0),
	(25, '5ebd4d186bc91', 5, 0),
	(26, '5ebd4988ecb89', 5, 260),
	(27, '5edbb0b61f621', 5, 50),
	(28, '5edbb028f0ef0', 5, 0),
	(29, '5ec8c2aed17c2', 5, 0),
	(30, '5edbb03d3d40c', 5, 5),
	(31, '5ebd4d186bc91', 6, 0),
	(32, '5ebd4988ecb89', 6, 260),
	(33, '5edbb0b61f621', 6, 50),
	(34, '5edbb028f0ef0', 6, 0),
	(35, '5ec8c2aed17c2', 6, 0),
	(36, '5edbb03d3d40c', 6, 10),
	(37, '5ebd4d186bc91', 7, 265),
	(38, '5ebd4988ecb89', 7, 0),
	(39, '5edbb0b61f621', 7, 50),
	(40, '5edbb028f0ef0', 7, 5),
	(41, '5ec8c2aed17c2', 7, 5),
	(42, '5edbb03d3d40c', 7, 0),
	(43, '5ebd4d186bc91', 8, 250),
	(44, '5ebd4988ecb89', 8, 0),
	(45, '5edbb0b61f621', 8, 50),
	(46, '5edbb028f0ef0', 8, 4),
	(47, '5ec8c2aed17c2', 8, 4),
	(48, '5edbb03d3d40c', 8, 0),
	(49, '5ebd4d186bc91', 9, 260),
	(50, '5ebd4988ecb89', 9, 0),
	(51, '5edbb0b61f621', 9, 55),
	(52, '5edbb028f0ef0', 9, 5),
	(53, '5ec8c2aed17c2', 9, 5),
	(54, '5edbb03d3d40c', 9, 0),
	(55, '5ebd4d186bc91', 10, 0),
	(56, '5ebd4988ecb89', 10, 265),
	(57, '5edbb0b61f621', 10, 55),
	(58, '5edbb028f0ef0', 10, 0),
	(59, '5ec8c2aed17c2', 10, 0),
	(60, '5edbb03d3d40c', 10, 9),
	(61, '5ebd4d186bc91', 11, 260),
	(62, '5ebd4988ecb89', 11, 0),
	(63, '5edbb0b61f621', 11, 50),
	(64, '5edbb028f0ef0', 11, 5),
	(65, '5ec8c2aed17c2', 11, 5),
	(66, '5edbb03d3d40c', 11, 0),
	(67, '5ebd4d186bc91', 12, 0),
	(68, '5ebd4988ecb89', 12, 250),
	(69, '5edbb0b61f621', 12, 50),
	(70, '5edbb028f0ef0', 12, 0),
	(71, '5ec8c2aed17c2', 12, 0),
	(72, '5edbb03d3d40c', 12, 6),
	(73, '5ebd4d186bc91', 13, 0),
	(74, '5ebd4988ecb89', 13, 260),
	(75, '5edbb0b61f621', 13, 55),
	(76, '5edbb028f0ef0', 13, 0),
	(77, '5ec8c2aed17c2', 13, 0),
	(78, '5edbb03d3d40c', 13, 10);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_plywood: ~12 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_plywood` DISABLE KEYS */;
REPLACE INTO `dtl_plywood` (`id`, `id_vinir`, `id_plywood`, `jenis`, `stok_keluar`, `kubik_keluar`) VALUES
	(4, '5ef844e61c406', 2, 'face back', 2500, 4.51),
	(5, '5ef84685b9761', 2, 'core', 2500, 11.28),
	(6, '5ef846d0bfce6', 2, 'face back', 2500, 4.51),
	(7, '5ef846d0bfce6', 3, 'face back', 3000, 5.42),
	(8, '5ef8468d384ae', 3, 'core', 3000, 18.95),
	(9, '5ef844e61c406', 3, 'face back', 3000, 5.42),
	(10, '5ef844e61c406', 4, 'face back', 3000, 5.42),
	(11, '5ef84685b9761', 4, 'core', 3000, 13.54),
	(12, '5ef8482fbea01', 4, 'face back', 3000, 5.42),
	(13, '5ef8482fbea01', 5, 'face back', 2000, 3.61),
	(14, '5ef8482fbea01', 5, 'core', 2000, 3.61),
	(15, '5ef8482fbea01', 5, 'face back', 2000, 3.61);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.gluemix: ~11 rows (lebih kurang)
/*!40000 ALTER TABLE `gluemix` DISABLE KEYS */;
REPLACE INTO `gluemix` (`id`, `tgl`, `tipe_glue`, `shift`, `total`, `keterangan`) VALUES
	(3, '2020-06-23', 'Type-1 Melamine', '1', 320, ''),
	(4, '2020-06-23', 'Type-2 LFE', '2', 314, ''),
	(5, '2020-06-24', 'Type-1 Melamine', '1', 315, ''),
	(6, '2020-06-24', 'Type-1 Melamine', '2', 320, ''),
	(7, '2020-06-25', 'Type-2 LFE', '1', 325, ''),
	(8, '2020-06-25', 'Type-2 LFE', '2', 308, ''),
	(9, '2020-06-29', 'Type-2 LFE', '1', 325, ''),
	(10, '2020-06-30', 'Type-1 Melamine', '1', 329, ''),
	(11, '2020-07-01', 'Type-2 LFE', '2', 320, ''),
	(12, '2020-07-01', 'Type-1 Melamine', '1', 306, ''),
	(13, '2020-07-02', 'Type-1 Melamine', '2', 325, '');
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
	('5ecb4d587b02f', 'LOGMSW', '4', 9329, 7233.19, 'Stok awal'),
	('5ee22744a86b4', 'LOGMRT', '3', 10296, 7790.24, ''),
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

-- Membuang data untuk tabel trpbahanbaku.pegawai: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
REPLACE INTO `pegawai` (`id`, `nik`, `username`, `password`, `nama`, `telp`, `gambar`, `level`, `last_login`, `created_at`) VALUES
	('5ebc01246be2a', '24800', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Catur Ridho Arianto', '0822771', 'CaturRidho_24800.png', 'admin', '2020-07-06 23:27:43', '2020-05-18 20:30:53'),
	('5ebc02de8ed27', '2352345', 'acilirus', 'ee2bea29b7318b32e644d190da953f15', 'Acil Irus', '12121', 'AcilIrus_2352345.jpg', 'manager', '2020-07-05 15:00:38', '2020-05-18 20:30:53'),
	('5ebc0d91b1761', '2352345', 'cahbekasi', 'f684497877a4a910fcdd91a2f947b4ec', 'Rafio Dioda', '08227716331', 'RafioGobloge_5ebc0d91b1765.png', 'user', '2020-07-06 23:23:49', '2020-05-18 20:30:53'),
	('5ee4655ec2fc8', '800096', 'razzyman', 'd41d8cd98f00b204e9800998ecf8427e', 'Ust. Facrurazzy', '087896834', 'Facrurazzy_90018.jpg', 'admin', '2020-07-05 15:42:42', '2020-06-13 13:34:22');
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
  `tebal` float(8,1) NOT NULL DEFAULT 0.0,
  `total_prod` int(20) NOT NULL DEFAULT 0,
  `total_kubik` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_ukuran`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.plywood: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `plywood` DISABLE KEYS */;
REPLACE INTO `plywood` (`id`, `id_ukuran`, `tgl`, `shift`, `tipe_glue`, `tipe_ply`, `tebal`, `total_prod`, `total_kubik`, `keterangan`) VALUES
	(2, 1, '2020-06-23', '1', 'Type-1 Melamine', '3', 4.5, 1800, 13.50, ''),
	(3, 2, '2020-06-23', '2', 'Type-2 LFE', '3', 5.5, 2160, 20.09, ''),
	(4, 1, '2020-06-24', '1', 'Type-1 Melamine', '3', 4.5, 2160, 16.20, ''),
	(5, 1, '2020-06-25', '1', 'Type-1 Melamine', '3', 3.0, 1440, 7.20, '');
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
	('5ef844e61c406', 1, 1.0, 1900, 950, 298, 0.49, ''),
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
	('5ef84685b9761', 3, 2.5, 1900, 950, 6143, 27.57, ''),
	('5ef8468d384ae', 3, 3.5, 1900, 950, 806, 5.03, ''),
	('5ef846a8982fd', 3, 1.0, 2600, 1300, 0, 0.00, ''),
	('5ef846af0c22e', 3, 1.6, 2600, 1300, 4618, 24.94, ''),
	('5ef846b6769fe', 3, 2.5, 2600, 1300, 2863, 24.05, ''),
	('5ef846c9afe6d', 3, 3.5, 2600, 1300, 0, 0.00, ''),
	('5ef846d0bfce6', 4, 1.0, 1900, 950, 16772, 30.16, ''),
	('5ef84757eb474', 4, 1.6, 1900, 950, 0, 0.00, ''),
	('5ef8476001dab', 4, 2.5, 1900, 950, 0, 0.00, ''),
	('5ef8476d27b12', 4, 3.5, 1900, 950, 3162, 19.92, ''),
	('5ef848009d90b', 4, 1.0, 2600, 1300, 7114, 24.19, ''),
	('5ef84808269b5', 4, 1.6, 2600, 1300, 4400, 23.76, ''),
	('5ef8480fae5d8', 4, 2.5, 2600, 1300, 0, 0.00, ''),
	('5ef84827c54e3', 4, 3.5, 2600, 1300, 0, 0.00, ''),
	('5ef8482fbea01', 5, 1.0, 1900, 950, 4400, 7.87, ''),
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
  `stok_masuk` int(20) NOT NULL DEFAULT 0,
  `kubik_masuk` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 3` (`id_kayu`),
  KEY `index2` (`id_vinir`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.vinir_masuk: ~21 rows (lebih kurang)
/*!40000 ALTER TABLE `vinir_masuk` DISABLE KEYS */;
REPLACE INTO `vinir_masuk` (`id`, `id_vinir`, `id_kayu`, `tgl`, `shift`, `jml_log`, `kubik_log`, `stok_masuk`, `kubik_masuk`, `keterangan`) VALUES
	('5efae86d4cd38', '5ef844e61c406', '5ecb4d3e12f33', '2020-04-06', '1', 24, 20.00, 8798, 15.84, NULL),
	('5efae88b96eb3', '5ef8461c5880c', '5ecb4d4b5b93d', '2020-04-06', '1', 24, 20.00, 5506, 15.97, NULL),
	('5efae89ebc190', '5ef84685b9761', '5ee22744a86b4', '2020-04-07', '1', 26, 20.00, 3534, 15.90, NULL),
	('5efae8b2b045b', '5ef8476d27b12', '5ecb4d587b02f', '2020-04-08', '1', 32, 25.00, 3162, 19.92, NULL),
	('5efae8ccd5c99', '5ef8482fbea01', '5ee2275051caf', '2020-04-10', '1', 40, 30.00, 13400, 24.12, NULL),
	('5efae8fe0efcb', '5ef84546affb1', '5ecb4d3e12f33', '2020-05-12', '1', 12, 10.00, 2371, 8.06, NULL),
	('5efae9104deb8', '5ef846b6769fe', '5ee22744a86b4', '2020-05-13', '1', 20, 15.00, 1435, 12.05, NULL),
	('5efae92b6b09f', '5ef84546affb1', '5ecb4d3e12f33', '2020-05-18', '1', 37, 30.00, 7142, 24.28, NULL),
	('5efae9539cfbf', '5ef8463fc6d8b', '5ecb4d4b5b93d', '2020-05-20', '1', 23, 20.00, 2995, 16.17, NULL),
	('5efb00dea83bd', '5ef8468d384ae', '5ee22744a86b4', '2020-05-25', '1', 40, 30.00, 3806, 23.98, NULL),
	('5efb00fa5ea77', '5ef848c0c975e', '5ef838d8beeb3', '2020-05-28', '1', 47, 30.00, 8258, 23.95, NULL),
	('5efb0252aa5d1', '5ef848f256a4b', '5ef838d8beeb3', '2020-05-28', '1', 47, 30.00, 4493, 24.26, NULL),
	('5efb026b01cf9', '5ef848009d90b', '5ecb4d587b02f', '2020-06-02', '1', 38, 30.00, 7114, 24.19, NULL),
	('5efb028294e69', '5ef84808269b5', '5ecb4d587b02f', '2020-06-02', '1', 38, 30.00, 4400, 23.76, NULL),
	('5efb0296a242f', '5ef848a1ad319', '5ee2275051caf', '2020-06-08', '1', 53, 40.00, 3806, 31.97, NULL),
	('5efb02b37725e', '5ef8451a0bbfe', '5ecb4d3e12f33', '2020-06-09', '1', 37, 30.00, 3806, 23.98, NULL),
	('5efb02c80af47', '5ef8462c6ef9a', '5ecb4d4b5b93d', '2020-06-10', '1', 35, 30.00, 3818, 24.05, NULL),
	('5efb02e271235', '5ef846464d055', '5ecb4d4b5b93d', '2020-06-10', '1', 33, 28.00, 2686, 22.56, NULL),
	('5efb02fe06667', '5ef846af0c22e', '5ee22744a86b4', '2020-06-15', '1', 40, 31.00, 4618, 24.94, NULL),
	('5efb030cb3e9f', '5ef846b6769fe', '5ee22744a86b4', '2020-06-16', '1', 19, 15.00, 1428, 12.00, NULL),
	('5efb036049b76', '5ef846d0bfce6', '5ecb4d587b02f', '2020-06-18', '1', 12, 10.00, 4514, 8.13, NULL),
	('5f00b51166998', '5ef84685b9761', '5ee22744a86b4', '2020-06-19', '1', 59, 45.00, 8109, 36.49, NULL),
	('5f00b543eca2a', '5ef846d0bfce6', '5ecb4d587b02f', '2020-06-19', '1', 51, 40.00, 17758, 31.96, NULL);
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
