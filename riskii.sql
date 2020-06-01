/*
SQLyog Ultimate v8.55 
MySQL - 5.6.16 : Database - akses_data
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`akses_data` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `akses_data`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`password`,`nama`,`status`) values ('admin','202cb962ac59075b964b07152d234b70','riski','1');

/*Table structure for table `hakakses` */

DROP TABLE IF EXISTS `hakakses`;

CREATE TABLE `hakakses` (
  `id` varchar(50) NOT NULL,
  `namaperangkat` varchar(100) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `jenisperangkat` varchar(50) DEFAULT NULL,
  `mac` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hakakses` */

insert  into `hakakses`(`id`,`namaperangkat`,`ip`,`jenisperangkat`,`mac`,`status`) values ('Laptopsu','Laptopsu','192.168.1.12','Laptop','192:asda:213a:31','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
