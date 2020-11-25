/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.11 : Database - registro_figuras_ecuacion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`registro_figuras_ecuacion` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `registro_figuras_ecuacion`;

/*Table structure for table `cuadrado` */

DROP TABLE IF EXISTS `cuadrado`;

CREATE TABLE `cuadrado` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `lado1` float NOT NULL,
  `lado2` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cuadrado` */

insert  into `cuadrado`(`id`,`lado1`,`lado2`) values 
(68,2,3),
(69,2,3),
(70,2,4),
(71,2,69),
(72,2,69),
(73,3,4),
(74,2,3),
(75,2,2),
(76,100,100),
(77,3,3),
(78,3,3),
(79,3,3),
(80,4,4);

/*Table structure for table `cubo` */

DROP TABLE IF EXISTS `cubo`;

CREATE TABLE `cubo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `lado` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cubo` */

insert  into `cubo`(`id`,`lado`) values 
(8,7),
(9,3),
(11,7),
(12,3),
(13,4),
(14,4);

/*Table structure for table `ecuacion` */

DROP TABLE IF EXISTS `ecuacion`;

CREATE TABLE `ecuacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a` double DEFAULT NULL,
  `b` double DEFAULT NULL,
  `c` double DEFAULT NULL,
  `d` double DEFAULT NULL,
  `e` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ecuacion` */

insert  into `ecuacion`(`id`,`a`,`b`,`c`,`d`,`e`) values 
(1,1,0.1,1,1,0.5),
(2,1,0.1,1,1,0.5),
(3,0.9,0.1,0.6,0.9,0.5),
(4,0.9,0.1,0.6,0.9,0.5),
(5,0,1,0.3,1,1),
(6,0,1,0.3,1,1),
(7,0.1,0.2,0.3,0.4,0.5),
(8,0.1,0.2,0.3,0.4,0.5);

/*Table structure for table `esfera` */

DROP TABLE IF EXISTS `esfera`;

CREATE TABLE `esfera` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `radio` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `esfera` */

insert  into `esfera`(`id`,`radio`) values 
(3,1),
(4,10),
(5,10),
(6,10),
(7,4),
(8,4),
(9,1),
(10,4);

/*Table structure for table `trianguloa` */

DROP TABLE IF EXISTS `trianguloa`;

CREATE TABLE `trianguloa` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `base` double DEFAULT NULL,
  `altura` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

/*Data for the table `trianguloa` */

insert  into `trianguloa`(`id`,`base`,`altura`) values 
(41,2,3);

/*Table structure for table `triangulop` */

DROP TABLE IF EXISTS `triangulop`;

CREATE TABLE `triangulop` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `lado1` double DEFAULT NULL,
  `lado2` double DEFAULT NULL,
  `lado3` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `triangulop` */

insert  into `triangulop`(`id`,`lado1`,`lado2`,`lado3`) values 
(5,1,2,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
