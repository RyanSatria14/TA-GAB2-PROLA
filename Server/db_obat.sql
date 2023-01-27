/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_obat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_obat` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_obat`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id`,`username`,`password`,`nama`,`no_hp`) values 
(1,'imam24','123','Imam Asyrofi',89363829);

/*Table structure for table `tb_login` */

DROP TABLE IF EXISTS `tb_login`;

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tb_login` */

insert  into `tb_login`(`id`,`user_id`,`key`,`level`,`ignore_limits`,`is_private_key`,`ip_addresses`,`date_created`) values 
(1,1,'RESTAPI',0,0,0,NULL,0),
(3,0,'',0,0,0,NULL,0);

/*Table structure for table `tb_obat` */

DROP TABLE IF EXISTS `tb_obat`;

CREATE TABLE `tb_obat` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` enum('Vitamin','Obat') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stok` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_obat` */

insert  into `tb_obat`(`id`,`kode`,`nama`,`jenis`,`harga`,`stok`) values 
(18,'B0001','Fatigon','Vitamin','20000','34'),
(19,'B0002','Paramex','Obat','12000','23'),
(20,'B0003','Bodrex','Obat','5000','45'),
(21,'B0004','OBH Combi','Obat','25000','24'),
(22,'B0005','OBH Anak','Obat','20000','12'),
(23,'B0006','Panadol','Obat','30000','34'),
(24,'B0007','Diapet','Obat','30000','43'),
(25,'B0008','Konidin','Obat','23000','23'),
(26,'B0009','Stimuno','Vitamin','30000','12'),
(27,'B0010','Hemaviton','Vitamin','25000','25');

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`id`,`kode`,`nama`,`no_hp`,`alamat`,`kota`) values 
(1,'S0001','PT Jaya Utama S','086251728345','Jl. Daan Mogot KM 19 Kebun Besar Batu Ceper Tangerang 15122','Tangerang'),
(2,'S0002','Dunia Cakrawala Abadi','081374628394','Jl. Hayam Wuruk No.127 Lantai GF2 Blok A26 NO.6-7, Jakarta Barat, DKI Jakarta','Jakarta Barat'),
(3,'S0003','PT Kikayu Global Sentosa','089652416374','Rukan New Castle Blok B-56 Jln. Greenlake City, Petir, Cipondoh Tangerang Kota, 15147','Tangerang'),
(4,'S0004','PT Multiverse Anugerah Chemindo','085873627183','Jl. Hasyim Ashari No.118, Golden City Business Park Blok A9 Cipondoh-Tangerang','Tangerang'),
(5,'S0005','PT Isotekindo Intertama','089673627382','Jalan Raya Kebayoran Lama No.309-C, Kebayoran Lama Jakarta Selatan','Jakarta Selatan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
