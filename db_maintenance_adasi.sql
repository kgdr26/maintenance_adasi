/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.11.4-MariaDB : Database - db_maintenance_adasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_maintenance_adasi` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `db_maintenance_adasi`;

/*Table structure for table `mst_location` */

DROP TABLE IF EXISTS `mst_location`;

CREATE TABLE `mst_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `mst_location` */

insert  into `mst_location`(`id`,`name`,`is_active`,`update_by`,`last_update`) values 
(1,'DELTAMAS',1,1,'2024-01-21 19:05:57'),
(2,'DS8',1,1,'2024-01-21 19:06:34'),
(3,'SURABAYA',1,1,'2024-01-21 19:06:46');

/*Table structure for table `mst_machine` */

DROP TABLE IF EXISTS `mst_machine`;

CREATE TABLE `mst_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qr_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `no_machine` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  `id_location` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `mst_machine` */

insert  into `mst_machine`(`id`,`qr_code`,`name`,`type`,`no_machine`,`age`,`id_section`,`id_location`,`foto`,`is_active`,`update_by`,`last_update`) values 
(1,'2024.01.000000001','C1','H 1613','C1','1905',1,1,'53945.jpeg',1,1,'2024-01-21 20:39:00'),
(2,'2024.01.000000002','C2','H 1010','C2','1905',1,1,'21229.png',1,1,'2024-01-21 20:57:38');

/*Table structure for table `mst_role` */

DROP TABLE IF EXISTS `mst_role`;

CREATE TABLE `mst_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `mst_role` */

insert  into `mst_role`(`id`,`name`,`is_active`,`update_by`,`last_update`) values 
(1,'SUPERADMIN',1,1,'2024-01-20 15:00:33'),
(2,'MAINTENACE',1,1,'2024-01-20 15:01:12'),
(3,'PRODUCTION',1,1,'2024-01-20 15:02:34'),
(4,'DEPTMAN',1,1,'2024-01-20 15:06:20'),
(5,'Tes edit',0,1,'2024-01-21 15:57:36');

/*Table structure for table `mst_section` */

DROP TABLE IF EXISTS `mst_section`;

CREATE TABLE `mst_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `mst_section` */

insert  into `mst_section`(`id`,`name`,`is_active`,`update_by`,`last_update`) values 
(1,'CUTTING',1,1,'2024-01-21 19:07:17'),
(2,'MACHINING',1,1,'2024-01-21 19:07:36'),
(3,'CT BUBUT',1,1,'2024-01-21 19:08:01'),
(4,'CNC BUBUT',1,1,'2024-01-21 19:08:21'),
(5,'HEAT TREATMENT',1,1,'2024-01-21 19:08:37');

/*Table structure for table `mst_status` */

DROP TABLE IF EXISTS `mst_status`;

CREATE TABLE `mst_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `mst_status` */

insert  into `mst_status`(`id`,`name`,`color`,`is_active`,`update_by`,`last_update`) values 
(1,'DRAFT','primary',1,1,'2024-01-22 00:55:54'),
(2,'ON PROGRESS','secondary',1,1,'2024-01-22 00:57:37'),
(3,'WAITING PART','warning',1,1,'2024-01-22 00:56:48'),
(4,'FINISH','dark',1,1,'2024-01-22 00:57:51'),
(5,'WATING CLOSED','info',1,1,'2024-01-22 00:56:30'),
(6,'CLOSED','success',1,1,'2024-01-22 00:56:13');

/*Table structure for table `trx_corrective` */

DROP TABLE IF EXISTS `trx_corrective`;

CREATE TABLE `trx_corrective` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_machine` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `constraint` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `date_finish` datetime DEFAULT NULL,
  `date_waiting` datetime DEFAULT NULL,
  `user_waiting` int(11) DEFAULT NULL,
  `date_close` datetime DEFAULT NULL,
  `user_close` int(11) DEFAULT NULL,
  `result` text DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_corrective` */

insert  into `trx_corrective`(`id`,`id_machine`,`id_user`,`constraint`,`foto`,`date_create`,`id_status`,`date_finish`,`date_waiting`,`user_waiting`,`date_close`,`user_close`,`result`) values 
(1,1,1,'tesss bikin corrective','10500.png','2024-01-22 00:24:39',1,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`pass`,`role_id`,`name`,`email`,`no_tlp`,`foto`,`status`,`is_active`,`update_by`,`last_update`) values 
(1,'kgdr','$2y$10$c3W.UkaWWfqg53Xl7esRT.RckZLC/r2vREKedHl/GroQMIJb2WBvO','1',1,'Kang Dru','kgdr@gmail.com','081211159962','default.jpg',1,1,1,'2024-01-21 18:07:55'),
(2,'medi','$2y$10$bMwpEXewYPlWeSQIJZxsWOUH6EEtgUPL.iC566XdepOemCAPUO2dO','1',2,'Medi123','medi@gmail.com','0888877772','default.jpg',0,1,1,'2024-01-21 16:52:39'),
(3,'tes','$2y$12$ztOPiTcW3E6gwetVtzojseB1VaageRmAg9vVu5gUpy6f4MM050O1u','123456',1,'tes 123','tes@gmailo.com','88888','10569.png',0,0,1,'2024-01-21 17:49:09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
