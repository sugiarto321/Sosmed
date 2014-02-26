-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for sosmed
CREATE DATABASE IF NOT EXISTS `sosmed` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sosmed`;


-- Dumping structure for table sosmed.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.autoincrement
CREATE TABLE IF NOT EXISTS `autoincrement` (
  `tablename` varchar(30) NOT NULL,
  `prefix` varchar(30) DEFAULT NULL,
  `count_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tablename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.city
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` varchar(50) NOT NULL DEFAULT '',
  `province_id` varchar(50) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `province_id` (`province_id`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.foto
CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tgal_upload` date DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.friend
CREATE TABLE IF NOT EXISTS `friend` (
  `id_friend` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.komentar_foto
CREATE TABLE IF NOT EXISTS `komentar_foto` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_foto` int(11) NOT NULL,
  `isi_komentar` text,
  `tgl_komentar` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `id_foto` (`id_foto`),
  KEY `FK_komentar_foto_user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.komentar_status
CREATE TABLE IF NOT EXISTS `komentar_status` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` int(11) DEFAULT NULL,
  `isi_komentar` text,
  `tgl_komentar` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `id_status` (`id_status`),
  KEY `FK_komentar_status_user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.nickname
CREATE TABLE IF NOT EXISTS `nickname` (
  `id_user` int(11) NOT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.pembaharuan
CREATE TABLE IF NOT EXISTS `pembaharuan` (
  `id_pembaharuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pembaharuan` varchar(200) NOT NULL,
  `tgal_pembaharuan` date DEFAULT NULL,
  PRIMARY KEY (`id_pembaharuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.pesan
CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `pesan` text,
  `tgal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.province
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` varchar(50) NOT NULL DEFAULT '',
  `province_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` varchar(50) NOT NULL DEFAULT '',
  `slider_name` varchar(500) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `isActive` bit(1) DEFAULT NULL,
  `slider_full_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.status
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgal_post` date DEFAULT NULL,
  PRIMARY KEY (`id_status`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table sosmed.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
