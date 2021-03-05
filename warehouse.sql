-- Adminer 4.6.3 MySQL dump

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


DELIMITER ;;

CREATE TRIGGER `kurang_qty` AFTER INSERT ON `checker` FOR EACH ROW
BEGIN
UPDATE pallet SET qty=qty-NEW.qty_checker
WHERE id_pallet = NEW.id_pallet;
END;;

DELIMITER ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
  `print` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_pallet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pallet` (`id_pallet`, `tanggal_pallet`, `nomor_po`, `kode_pakan`, `line_packing`, `shift`, `waktu_pembuatan`, `nomor_pallet`, `lokasi_gudang`, `expired_date`, `qty`, `print`) VALUES
('9YLFZekTr7',	'2021-02-18 10:23:38',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1),
('cTpsAlGIoC',	'2021-02-18 10:20:41',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1),
('JC4euUOKm5',	'2021-02-18 10:20:43',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1),
('JyVh6F0j3x',	'2021-02-18 10:20:45',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1),
('wrSzp7XhV9',	'2021-03-03 08:45:30',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`) VALUES
(1,	'Pakan ayam sejati'),
(3,	'kucing1');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `role` enum('Admin','Operator Packing','Juru Muat') NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id_user`, `nama`, `username`, `role`, `password`) VALUES
(14,	'William',	'wil',	'Admin',	'202cb962ac59075b964b07152d234b70'),
(22,	'Packing Robotik',	'packing',	'Operator Packing',	'202cb962ac59075b964b07152d234b70'),
(23,	'Juru Muat',	'jurumuat',	'Juru Muat',	'202cb962ac59075b964b07152d234b70');

-- 2021-03-05 07:46:19
