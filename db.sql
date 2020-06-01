/*
SQLyog Ultimate v8.55 
MySQL - 5.6.16 : Database - pos_ahx1620005
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pos_ahx1620005` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pos_ahx1620005`;

/*Table structure for table `barang1620005` */

DROP TABLE IF EXISTS `barang1620005`;

CREATE TABLE `barang1620005` (
  `brgbarcode1620005` char(50) NOT NULL,
  `brgnama1620005` varchar(200) DEFAULT NULL,
  `brgsatid1620005` int(11) DEFAULT NULL,
  `brgkatid1620005` int(11) DEFAULT NULL,
  `brghargajual1620005` double DEFAULT NULL,
  `bgrhargabeli1620005` double DEFAULT NULL,
  `bgrstok1620005` int(11) DEFAULT NULL,
  PRIMARY KEY (`brgbarcode1620005`),
  KEY `brgsatid1620005` (`brgsatid1620005`),
  KEY `brgkatid1620005` (`brgkatid1620005`),
  CONSTRAINT `barang1620005_ibfk_1` FOREIGN KEY (`brgsatid1620005`) REFERENCES `satuan1620005` (`satid1620005`),
  CONSTRAINT `barang1620005_ibfk_2` FOREIGN KEY (`brgkatid1620005`) REFERENCES `kategori1620005` (`katid1620005`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang1620005` */

/*Table structure for table `kategori1620005` */

DROP TABLE IF EXISTS `kategori1620005`;

CREATE TABLE `kategori1620005` (
  `katid1620005` int(11) NOT NULL AUTO_INCREMENT,
  `katnama1620005` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`katid1620005`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kategori1620005` */

insert  into `kategori1620005`(`katid1620005`,`katnama1620005`) values (1,'Makanan'),(2,'Elektronik');

/*Table structure for table `konsumen1620005` */

DROP TABLE IF EXISTS `konsumen1620005`;

CREATE TABLE `konsumen1620005` (
  `konkode1620005` char(5) NOT NULL,
  `konnama1620005` varchar(100) DEFAULT NULL,
  `konalamat1620005` varchar(200) DEFAULT NULL,
  `kontelp1620005` char(20) DEFAULT NULL,
  PRIMARY KEY (`konkode1620005`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `konsumen1620005` */

/*Table structure for table `pemasok1620005` */

DROP TABLE IF EXISTS `pemasok1620005`;

CREATE TABLE `pemasok1620005` (
  `pemkode1620005` char(5) NOT NULL,
  `pemnama1620005` varchar(100) DEFAULT NULL,
  `pemalamat1620005` varchar(200) DEFAULT NULL,
  `pemnotelp1620005` char(20) DEFAULT NULL,
  PRIMARY KEY (`pemkode1620005`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemasok1620005` */

/*Table structure for table `satuan1620005` */

DROP TABLE IF EXISTS `satuan1620005`;

CREATE TABLE `satuan1620005` (
  `satid1620005` int(11) NOT NULL AUTO_INCREMENT,
  `satnama1620005` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`satid1620005`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `satuan1620005` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
