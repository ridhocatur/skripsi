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
	('5ebd4988ecb89', 'GLUEMF', 'Melamine Glue', 353, '1', 'stok awal'),
	('5ebd4d186bc91', 'GLUELFE', 'Low Formaldehyde Emission', 360, '1', 'Stok awal'),
	('5ec8c2aed17c2', 'HU103', 'Hardener', 480, '5', 'Stok awal'),
	('5edbb028f0ef0', 'HU100', 'HU-100', 482, '5', 'Stok awal'),
	('5edbb03d3d40c', 'HU360', 'HU-360', 475, '5', 'Stok awal'),
	('5edbb0b61f621', 'TPNG', 'Tepung', 285, '2', 'Stok awal');
/*!40000 ALTER TABLE `bahan_bantu` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.bahan_masuk
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

-- Membuang data untuk tabel trpbahanbaku.bahan_masuk: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `bahan_masuk` DISABLE KEYS */;
REPLACE INTO `bahan_masuk` (`id`, `invoice`, `tgl`, `id_bahan`, `nama`, `stok_masuk`, `keterangan`, `id_supplier`) VALUES
	('5ebec4ffbf7a4', 'zsf', '2020-05-07', '5ebd4d186bc91', 'Low Formaldehyde Emission', 250, 'hjg', '1'),
	('5ec8c2f73ff36', 'AVC343', '2020-05-01', '5ec8c2aed17c2', 'Hardener', 50, 'tes', '1'),
	('5ec8c3381e75a', 'ML232', '2020-05-13', '5ec8c2aed17c2', 'Hardener', 500, 'aaa', '1');
/*!40000 ALTER TABLE `bahan_masuk` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.dtl_gluemix
CREATE TABLE IF NOT EXISTS `dtl_gluemix` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_bahan` varchar(64) NOT NULL,
  `id_gluemix` int(64) NOT NULL,
  `stok_keluar` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id_bahan` (`id_bahan`),
  KEY `id_gluemix` (`id_gluemix`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_gluemix: ~36 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_gluemix` DISABLE KEYS */;
REPLACE INTO `dtl_gluemix` (`id`, `id_bahan`, `id_gluemix`, `stok_keluar`) VALUES
	(37, '5ebd4d186bc91', 12, 0),
	(38, '5ebd4988ecb89', 12, 40),
	(39, '5edbb0b61f621', 12, 29),
	(40, '5edbb028f0ef0', 12, 0),
	(41, '5ec8c2aed17c2', 12, 0),
	(42, '5edbb03d3d40c', 12, 9),
	(43, '5ebd4d186bc91', 13, 0),
	(44, '5ebd4988ecb89', 13, 57),
	(45, '5edbb0b61f621', 13, 40),
	(46, '5edbb028f0ef0', 13, 0),
	(47, '5ec8c2aed17c2', 13, 0),
	(48, '5edbb03d3d40c', 13, 7),
	(49, '5ebd4d186bc91', 14, 40),
	(50, '5ebd4988ecb89', 14, 0),
	(51, '5edbb0b61f621', 14, 22),
	(52, '5edbb028f0ef0', 14, 5),
	(53, '5ec8c2aed17c2', 14, 6),
	(54, '5edbb03d3d40c', 14, 0),
	(55, '5ebd4d186bc91', 15, 50),
	(56, '5ebd4988ecb89', 15, 0),
	(57, '5edbb0b61f621', 15, 37),
	(58, '5edbb028f0ef0', 15, 4),
	(59, '5ec8c2aed17c2', 15, 5),
	(60, '5edbb03d3d40c', 15, 0),
	(61, '5ebd4d186bc91', 16, 0),
	(62, '5ebd4988ecb89', 16, 50),
	(63, '5edbb0b61f621', 16, 44),
	(64, '5edbb028f0ef0', 16, 0),
	(65, '5ec8c2aed17c2', 16, 0),
	(66, '5edbb03d3d40c', 16, 9),
	(67, '5ebd4d186bc91', 17, 50),
	(68, '5ebd4988ecb89', 17, 0),
	(69, '5edbb0b61f621', 17, 43),
	(70, '5edbb028f0ef0', 17, 9),
	(71, '5ec8c2aed17c2', 17, 9),
	(72, '5edbb03d3d40c', 17, 0);
/*!40000 ALTER TABLE `dtl_gluemix` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.dtl_kayu_masuk
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

-- Membuang data untuk tabel trpbahanbaku.dtl_kayu_masuk: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_kayu_masuk` DISABLE KEYS */;
REPLACE INTO `dtl_kayu_masuk` (`id`, `id_kayu`, `id_masuk`, `panjang`, `diameter1`, `diameter2`, `stok_masuk`, `kubik_masuk`) VALUES
	(6, '5ecb4d3e12f33', 2, 159, 65, 68, 100, 55.20),
	(7, '5ecb4d4b5b93d', 2, 280, 66, 65, 210, 198.12),
	(8, '5ecb4d587b02f', 2, 168, 54, 56, 379, 151.22),
	(9, '5ecb4d3e12f33', 3, 160, 68, 65, 5100, 2832.72),
	(10, '5ecb4d4b5b93d', 3, 185, 77, 84, 3100, 2913.36);
/*!40000 ALTER TABLE `dtl_kayu_masuk` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.dtl_plywood
CREATE TABLE IF NOT EXISTS `dtl_plywood` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_vinir` varchar(64) NOT NULL,
  `id_plywood` int(64) NOT NULL,
  `stok_keluar` int(20) NOT NULL DEFAULT 0,
  `kubik_keluar` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id_vinir_keluar` (`id_vinir`),
  KEY `id_keluar` (`id_plywood`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.dtl_plywood: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `dtl_plywood` DISABLE KEYS */;
/*!40000 ALTER TABLE `dtl_plywood` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.gluemix
CREATE TABLE IF NOT EXISTS `gluemix` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `tipe_glue` varchar(30) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.gluemix: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `gluemix` DISABLE KEYS */;
REPLACE INTO `gluemix` (`id`, `tgl`, `tipe_glue`, `shift`, `total`, `keterangan`) VALUES
	(12, '2020-05-18', 'Type-1 Melamine', '1', 78, ''),
	(13, '2020-05-21', 'Type-1 Melamine', '2', 104, ''),
	(14, '2020-05-29', 'Type-2 LFE', '2', 73, ''),
	(15, '2020-06-02', 'Type-2 LFE', '2', 96, ''),
	(16, '2020-06-03', 'Type-1 Melamine', '1', 103, ''),
	(17, '2020-06-04', 'Type-2 LFE', '1', 111, '');
/*!40000 ALTER TABLE `gluemix` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.jeniskayu
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
CREATE TABLE IF NOT EXISTS `kayu` (
  `id` varchar(64) NOT NULL,
  `kd_kayu` varchar(20) NOT NULL,
  `id_jenis` varchar(64) NOT NULL,
  `stok` int(20) NOT NULL DEFAULT 0,
  `kubikasi` float(8,2) DEFAULT 0.00,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.kayu: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `kayu` DISABLE KEYS */;
REPLACE INTO `kayu` (`id`, `kd_kayu`, `id_jenis`, `stok`, `kubikasi`, `keterangan`) VALUES
	('5ecb4d3e12f33', 'LOGMLP', '1', 5200, 2887.92, 'Stok awal'),
	('5ecb4d4b5b93d', 'LOGDH1', '2', 3310, 3111.48, 'Stok awal'),
	('5ecb4d587b02f', 'LOGMSW', '4', 379, 151.22, 'Stok awal');
/*!40000 ALTER TABLE `kayu` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.kayu_masuk
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

-- Membuang data untuk tabel trpbahanbaku.kayu_masuk: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `kayu_masuk` DISABLE KEYS */;
REPLACE INTO `kayu_masuk` (`id`, `id_supplier`, `invoice`, `tgl`, `jml_stok`, `jml_kubik`, `keterangan`) VALUES
	(2, '4', 'AVC343', '2020-05-08', 689, 404.54, 'masuk'),
	(3, '5ebeb29b38c36', 'KYHSZ81', '2020-05-20', 8200, 5746.08, '');
/*!40000 ALTER TABLE `kayu_masuk` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.pegawai
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
	('5ebc01246be2a', '24800', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Catur Ridho', '0822771', '5ebc01246be2a.jpg', 'admin', '2020-06-07 11:11:52', '2020-05-18 20:30:53'),
	('5ebc02de8ed27', '2352345', 'acilirus', 'ee2bea29b7318b32e644d190da953f15', 'Acil Irus', '12121', '5aad4f2aede54_jpg_d6e6d07e022235c48a75238b6608d83d.jpg', 'manager', '2020-05-27 20:20:08', '2020-05-18 20:30:53'),
	('5ebc04fa7112c', '34', 'admin', 'admin', 'Admin', '119976', '_34.jpg', 'admin', '2020-05-18 20:30:53', '2020-05-18 20:30:53'),
	('5ebc0d91b1761', '2352345', 'cahbekasi', '860dec1a7a44b923c725901e11bc6363', 'Rafio Dioda', '08227716331', 'RafioGobloge_5ebc0d91b1765.png', 'user', '2020-05-27 20:20:40', '2020-05-18 20:30:53'),
	('5ebc131684828', '3', 'cc', '97e5622531f92f5710497dfdc35be728', 'cc', '333', 'cc_3.jpg', '', '2020-05-18 20:30:53', '2020-05-18 20:30:53');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.plywood
CREATE TABLE IF NOT EXISTS `plywood` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `shift` varchar(10) NOT NULL,
  `tipe_glue` varchar(20) NOT NULL,
  `tebal` varchar(20) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `total_prod` int(20) NOT NULL DEFAULT 0,
  `total_kubik` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.plywood: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `plywood` DISABLE KEYS */;
/*!40000 ALTER TABLE `plywood` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.supplier
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
CREATE TABLE IF NOT EXISTS `ukuran` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.ukuran: ~8 rows (lebih kurang)
/*!40000 ALTER TABLE `ukuran` DISABLE KEYS */;
REPLACE INTO `ukuran` (`id`, `panjang`, `lebar`) VALUES
	(1, 910, 1820),
	(2, 920, 1830),
	(3, 920, 2150),
	(4, 920, 2440),
	(5, 1230, 1830),
	(6, 1230, 2150),
	(7, 1230, 2440),
	(8, 1000, 2000);
/*!40000 ALTER TABLE `ukuran` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.vinir
CREATE TABLE IF NOT EXISTS `vinir` (
  `id` varchar(64) NOT NULL,
  `id_jenis` int(64) NOT NULL,
  `tebal` float(8,1) NOT NULL,
  `id_ukuran` int(64) NOT NULL,
  `stok` int(20) NOT NULL DEFAULT 0,
  `kubikasi` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_ukuran` (`id_ukuran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.vinir: ~7 rows (lebih kurang)
/*!40000 ALTER TABLE `vinir` DISABLE KEYS */;
REPLACE INTO `vinir` (`id`, `id_jenis`, `tebal`, `id_ukuran`, `stok`, `kubikasi`, `keterangan`) VALUES
	('5ec8aba88832c', 1, 2.0, 2, 0, 100.00, ''),
	('5ec8abaff0479', 2, 2.0, 1, 0, 100.00, ''),
	('5ec8abb7177ef', 2, 2.0, 2, 0, 100.00, ''),
	('5ec8ba9ed9e69', 1, 2.0, 3, 0, 0.00, 'Stok awal'),
	('5ec8baac6d0db', 1, 2.0, 1, 0, 0.00, 'Stok awal'),
	('5ec8bbfed6731', 2, 2.0, 3, 0, 0.00, 'Stok awal'),
	('5ec8bc1ae32c0', 1, 2.0, 5, 0, 0.00, 'Stok awal');
/*!40000 ALTER TABLE `vinir` ENABLE KEYS */;

-- membuang struktur untuk table trpbahanbaku.vinir_masuk
CREATE TABLE IF NOT EXISTS `vinir_masuk` (
  `id` varchar(64) NOT NULL,
  `id_kayu` varchar(64) NOT NULL,
  `id_vinir` varchar(64) NOT NULL,
  `tgl` date NOT NULL,
  `jml_log` int(20) NOT NULL DEFAULT 0,
  `stok_masuk` int(20) NOT NULL DEFAULT 0,
  `kubik_masuk` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kayu` (`id_kayu`,`id_vinir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel trpbahanbaku.vinir_masuk: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `vinir_masuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `vinir_masuk` ENABLE KEYS */;

-- membuang struktur untuk trigger trpbahanbaku.bahanmasuk_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `bahanmasuk_delete` BEFORE DELETE ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok-OLD.stok_masuk
    WHERE id=OLD.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.bahanmasuk_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `bahanmasuk_insert` AFTER INSERT ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok+NEW.stok_masuk
    WHERE id=NEW.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.bahanmasuk_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `bahanmasuk_update` AFTER UPDATE ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=(stok-OLD.stok_masuk)+NEW.stok_masuk
    WHERE id=NEW.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_gluemix_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_gluemix_delete` BEFORE DELETE ON `dtl_gluemix` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok+OLD.stok_keluar
    WHERE id=OLD.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_gluemix_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_gluemix_insert` AFTER INSERT ON `dtl_gluemix` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok-NEW.stok_keluar WHERE id=NEW.id_bahan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_kayumasuk_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_kayumasuk_delete` AFTER DELETE ON `dtl_kayu_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok-OLD.stok_masuk, kubikasi=kubikasi-OLD.kubik_masuk
    WHERE id = OLD.id_kayu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.dtl_kayumasuk_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dtl_kayumasuk_insert` AFTER INSERT ON `dtl_kayu_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok+NEW.stok_masuk, kubikasi=kubikasi+NEW.kubik_masuk
    WHERE id=NEW.id_kayu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.gluemix_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `gluemix_delete` AFTER DELETE ON `gluemix` FOR EACH ROW BEGIN
	DELETE FROM dtl_gluemix WHERE dtl_gluemix.id_gluemix = OLD.id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.kayulog_vinirmasuk_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kayulog_vinirmasuk_delete` AFTER DELETE ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok+OLD.jml_log, kubikasi=kubikasi+OLD.kubik_masuk
    WHERE id = OLD.id_kayu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.kayulog_vinirmasuk_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kayulog_vinirmasuk_insert` BEFORE INSERT ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok-NEW.jml_log, kubikasi=kubikasi-NEW.kubik_masuk
    WHERE id = NEW.id_kayu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.kayumasuk_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kayumasuk_delete` BEFORE DELETE ON `kayu_masuk` FOR EACH ROW BEGIN
	DELETE FROM dtl_kayu_masuk WHERE id_masuk=OLD.id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger trpbahanbaku.vinirmasuk_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `vinirmasuk_insert` AFTER INSERT ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE vinir SET stok=stok+NEW.stok_masuk, kubikasi=kubikasi+NEW.kubik_masuk
    WHERE id = NEW.id_vinir;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
