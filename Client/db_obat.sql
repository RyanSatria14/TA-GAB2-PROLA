/*
SQLyog Community v13.1.5  (32 bit)
MySQL - 10.4.25-MariaDB : Database - db_obat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_obat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_obat`;

/*Table structure for table `tb_obat` */

DROP TABLE IF EXISTS `tb_obat`;

CREATE TABLE `tb_obat` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `jenis` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `harga` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stok` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_obat` */

insert  into `tb_obat`(`id`,`kode`,`nama`,`jenis`,`harga`,`stok`) values 
(3,'D102','Oskadon','Vitamin','3500','20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
