-- Adminer 4.8.0 MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `checker`;
CREATE TABLE `checker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_do` int(11) NOT NULL,
  `id_pallet` varchar(25) NOT NULL,
  `kode_pakan` varchar(20) NOT NULL,
  `lokasi_gudang` varchar(50) NOT NULL,
  `waktu_pembuatan` date NOT NULL,
  `expired_date` date NOT NULL,
  `waktu_checker` timestamp NOT NULL,
  `qty_checker` int(3) NOT NULL,
  `qty_muat` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `checker` (`id`, `nomor_do`, `id_pallet`, `kode_pakan`, `lokasi_gudang`, `waktu_pembuatan`, `expired_date`, `waktu_checker`, `qty_checker`, `qty_muat`) VALUES
(4,	9,	'dPY8pbk26J',	'B11MTK',	'line 99',	'2021-03-28',	'2021-04-22',	'2021-06-07 06:44:09',	3,	0),
(5,	66767,	'4XEPGko62M',	'B12MTKGWD',	'line 5b',	'2021-04-12',	'2021-05-03',	'2021-06-08 04:27:09',	10,	0);

DELIMITER ;;

CREATE TRIGGER `kurang_qty` AFTER INSERT ON `checker` FOR EACH ROW
BEGIN
UPDATE pallet SET qty=qty-NEW.qty_checker
WHERE id_pallet = NEW.id_pallet;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `gudang_rpk`;
CREATE TABLE `gudang_rpk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pallet` varchar(256) NOT NULL,
  `kode_pakan` varchar(256) NOT NULL,
  `waktu_pembuatan` date NOT NULL,
  `expired_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_rpk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `gudang_rpk` (`id`, `id_pallet`, `kode_pakan`, `waktu_pembuatan`, `expired_date`, `qty`, `qty_rpk`) VALUES
(1,	'dPY8pbk26J',	'B11MTK',	'2021-03-28',	'2021-04-22',	2,	1);

DROP TABLE IF EXISTS `history_do`;
CREATE TABLE `history_do` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_do` int(11) NOT NULL,
  `id_pallet` varchar(25) NOT NULL,
  `kode_pakan` varchar(20) NOT NULL,
  `lokasi_gudang` varchar(50) NOT NULL,
  `waktu_pembuatan` date NOT NULL,
  `expired_date` date NOT NULL,
  `waktu_checker` timestamp NOT NULL,
  `qty` int(3) NOT NULL,
  `qty_muat` int(3) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `plat_nomor` varchar(50) NOT NULL,
  `operator` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `history_do` (`id`, `nomor_do`, `id_pallet`, `kode_pakan`, `lokasi_gudang`, `waktu_pembuatan`, `expired_date`, `waktu_checker`, `qty`, `qty_muat`, `nama_pelanggan`, `plat_nomor`, `operator`) VALUES
(1,	5,	'bA0KHaEU3Z',	'B11MTK',	'line 6a',	'2021-03-31',	'2021-04-21',	'2021-03-31 14:12:47',	1,	1,	'Astuti',	'B 4324 HG',	'William'),
(2,	5,	'pSartnPVZ4',	'B11MTK',	'line 11',	'2021-03-29',	'2021-04-21',	'2021-03-31 14:13:22',	6,	4,	'Astuti',	'B 4324 HG',	'William'),
(3,	5555,	'dPY8pbk26J',	'B11MTK',	'line 99',	'2021-03-28',	'2021-04-22',	'2021-04-12 07:35:00',	50,	48,	'Sri',	'H 3545 UU',	'William'),
(4,	8,	'FjWLfCXltV',	'B11S3',	'line 5',	'2021-06-07',	'2021-06-28',	'2021-06-07 06:41:50',	56,	56,	'sejahtera',	'123',	'William'),
(5,	8787,	'dPY8pbk26J',	'B11MTK',	'line 99',	'2021-03-28',	'2021-04-22',	'2021-04-12 07:43:36',	3,	3,	'amin ys',	'321',	'William');

DROP TABLE IF EXISTS `kode_pakan`;
CREATE TABLE `kode_pakan` (
  `id_pakan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pakan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_pakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kode_pakan` (`id_pakan`, `nama_pakan`) VALUES
(1,	'B11MTK'),
(2,	'B10'),
(3,	'B11S3'),
(4,	'B12MTKGWD');

DROP TABLE IF EXISTS `pallet`;
CREATE TABLE `pallet` (
  `id_pallet` varchar(25) NOT NULL,
  `tanggal_pallet` datetime NOT NULL,
  `nomor_po` int(11) DEFAULT NULL,
  `kode_pakan` varchar(256) DEFAULT NULL,
  `line_packing` int(1) DEFAULT NULL,
  `shift` int(1) DEFAULT NULL,
  `waktu_pembuatan` date DEFAULT NULL,
  `nomor_pallet` int(11) DEFAULT NULL,
  `lokasi_gudang` varchar(256) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `qty` int(3) DEFAULT NULL,
  `operator` varchar(256) DEFAULT NULL,
  `print` int(1) DEFAULT NULL,
  `status_lab` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pallet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pallet` (`id_pallet`, `tanggal_pallet`, `nomor_po`, `kode_pakan`, `line_packing`, `shift`, `waktu_pembuatan`, `nomor_pallet`, `lokasi_gudang`, `expired_date`, `qty`, `operator`, `print`, `status_lab`) VALUES
('BGWR1SaAwF',	'2021-06-15 10:59:27',	1861,	'B11S3',	2,	1,	'2021-06-15',	1,	'5A 2',	'2021-07-06',	45,	'William',	NULL,	'REMIXED'),
('eqitszfXjY',	'2021-06-15 10:59:28',	1862,	'B10',	3,	1,	'2021-06-15',	1,	'5A 3',	'2021-07-06',	47,	'William',	NULL,	'REMIXED'),
('GxFg78u5Hb',	'2021-06-15 10:59:29',	999,	'B12MTKGWD',	1,	1,	'2021-06-16',	1,	'6A 2',	'2021-07-07',	7,	'Lab',	NULL,	NULL);

DROP TABLE IF EXISTS `pallet_remix_area`;
CREATE TABLE `pallet_remix_area` (
  `id_pallet` varchar(25) NOT NULL,
  `kode_pakan` varchar(25) NOT NULL,
  `waktu_pembuatan` date NOT NULL,
  `lokasi_gudang` varchar(25) NOT NULL,
  `expired_date` date NOT NULL,
  `qty_remix` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pallet_remix_area` (`id_pallet`, `kode_pakan`, `waktu_pembuatan`, `lokasi_gudang`, `expired_date`, `qty_remix`) VALUES
('BGWR1SaAwF',	'B11S3',	'2021-06-15',	'5A 2',	'2021-07-06',	5);

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `peta_lokasi_gudang`;
CREATE TABLE `peta_lokasi_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `line_gudang` varchar(50) NOT NULL,
  `kapasitas_pallet` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `peta_lokasi_gudang` (`id`, `line_gudang`, `kapasitas_pallet`) VALUES
(1,	'5A 1',	14),
(2,	'5A 2',	25),
(5,	'5A 3',	0),
(7,	'6A 2',	1),
(9,	'5A 4',	10);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `role` enum('Admin','Operator Packing','Krani Muat','Lab') NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id_user`, `nama`, `username`, `role`, `password`) VALUES
(14,	'William',	'wil',	'Admin',	'202cb962ac59075b964b07152d234b70'),
(22,	'Packing Robotik',	'asep_op',	'Operator Packing',	'202cb962ac59075b964b07152d234b70'),
(24,	'Lab',	'lab',	'Lab',	'202cb962ac59075b964b07152d234b70'),
(25,	'Bambang',	'bambang',	'Krani Muat',	'202cb962ac59075b964b07152d234b70');

-- 2021-08-19 04:50:16
