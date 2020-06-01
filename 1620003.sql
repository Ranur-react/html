/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.13-MariaDB : Database - akses_data
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
  `namaperangkat` varchar(100) DEFAULT NULL,
  `id` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hakakses` */

insert  into `hakakses`(`namaperangkat`,`id`,`password`,`level`,`ip`,`status`) values ('hp','123','123','harian','192.168.1.1','1'),('Adit NofriadiA','333','1234','bulanan','192.168.1.3','1');

/*Table structure for table `jatah_ip` */

DROP TABLE IF EXISTS `jatah_ip`;

CREATE TABLE `jatah_ip` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `jatah_ip` */

insert  into `jatah_ip`(`no`,`ip_address`) values (1,'192.168.1.1'),(2,'192.168.1.2'),(3,'192.168.1.3');

/*Table structure for table `konfig_ip` */

DROP TABLE IF EXISTS `konfig_ip`;

CREATE TABLE `konfig_ip` (
  `ip_server` varchar(20) NOT NULL,
  `network` varchar(20) DEFAULT NULL,
  `netmask` varchar(20) DEFAULT NULL,
  `jumlah_host` int(5) DEFAULT NULL,
  `range` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ip_server`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `konfig_ip` */

insert  into `konfig_ip`(`ip_server`,`network`,`netmask`,`jumlah_host`,`range`) values ('192.168.1.3','192.168.1.1','255.255.255.0',2,'/24');

/*Table structure for table `level` */

DROP TABLE IF EXISTS `level`;

CREATE TABLE `level` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `level` */

insert  into `level`(`no`,`level`) values (1,'harian'),(2,'bulanan'),(3,'unlimited');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
