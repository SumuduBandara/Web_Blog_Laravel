/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.24 : Database - laravel_pro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel_pro` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `laravel_pro`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('wikumdiluka1@gmail.com','$2y$10$XLd4UaiZGiixP5xy0/c0/O51KGljSyIzcEjLLvbegq1tllEVVLdlu','2021-08-04 11:08:08');

/*Table structure for table `post_bloggers` */

DROP TABLE IF EXISTS `post_bloggers`;

CREATE TABLE `post_bloggers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bloger_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloger_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloger_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloger_status` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_bloggers` */

insert  into `post_bloggers`(`id`,`bloger_name`,`bloger_email`,`bloger_phone`,`bloger_status`,`created_at`,`updated_at`) values 
(1,'Kamal Fernando','kamal@gmail.com','0775025021',1,'2021-08-08 14:29:47','2021-08-08 14:29:47'),
(2,'Thishan Madusha','thishan@gmail.com','0771237895',1,'2021-08-08 14:58:24','2021-08-08 14:58:24');

/*Table structure for table `post_comments` */

DROP TABLE IF EXISTS `post_comments`;

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'D',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_comments` */

insert  into `post_comments`(`id`,`post_id`,`comment`,`status`,`created_by`,`created_at`,`updated_at`) values 
(1,1,'If Kunduz falls, it would be a significant gain for the Taliban and a test of their ability to take and retain territory. It is one of the country’s larger cities with a population of more than 340,000.','D',13,'2021-08-08 14:59:45','2021-08-08 14:59:45');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` char(1) NOT NULL COMMENT 'D= Draft, P=Publish ,',
  `view_count` bigint(20) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `posts` */

insert  into `posts`(`id`,`title`,`description`,`status`,`view_count`,`created_by`,`created_at`,`updated_at`) values 
(1,'Tokyo Olympics Closing Ceremony Ends ‘Strangest’ Games On Record','It began with a virus and a yearlong pause. It ended with a typhoon blowing through and, still, a virus. In between: just about everything.\r\n\r\nThe Tokyo Olympics, christened with “2020” but held in mid-2021 after being interrupted for a year by the coronavirus, glided to their conclusion in a COVID-emptied stadium Sunday night as an often surreal mixed bag for Japan and for the world.','P',0,1,'2021-08-08 14:25:49','2021-08-08 14:25:49'),
(2,'Taliban Seize Government Buildings In Kunduz, A Major Afghan City: Official','If Kunduz falls, it would be a significant gain for the Taliban and a test of their ability to take and retain territory.','P',0,1,'2021-08-08 14:31:19','2021-08-08 14:31:49'),
(3,'U.S. Jobless Claims Drop By 14,000 To 385,000','It’s more evidence that the economy and the job market are rebounding briskly from the coronavirus recession.','D',0,13,'2021-08-08 15:17:14','2021-08-08 15:17:14');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`relation_id`,`name`,`email`,`password`,`role`,`is_active`,`phone`,`mobile`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`) values 
(1,0,'Administrator','wikumdiluka1@gmail.com','$2y$10$vfHVXVbtFWZcYKycILz.EOyN8wGEwQVwNF.7EOhzEVkehDq90DdKW','ADMIN','A','',NULL,NULL,NULL,'2020-12-30 17:04:43','2020-12-30 17:04:43'),
(12,1,'Kamal Fernando','kamal@gmail.com','$2y$10$28khRcYO9TByCaM1gM2VJOPHNLxcIZqHMoSgwFD/2PC.bWNfXXfWO','BLOGGER','A','0775025021',NULL,NULL,NULL,'2021-08-08 14:29:48','2021-08-08 14:29:48'),
(13,2,'Thishan Madusha','thishan@gmail.com','$2y$10$WwHmSPgznv39d3ZeUGgBn.W0I9y0.Fp/f4jJhERKYmCtAIMtFrw.O','BLOGGER','A','0771237895',NULL,NULL,NULL,'2021-08-08 14:58:24','2021-08-08 14:58:24');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
