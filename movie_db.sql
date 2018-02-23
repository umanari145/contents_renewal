-- MySQL dump 10.13  Distrib 5.7.20, for osx10.13 (x86_64)
--
-- Host: localhost    Database: movie_db
-- ------------------------------------------------------
-- Server version	5.7.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (2,'umanari145','$2y$10$vG8gMl4xEtWSuopilfsoJOiq0SqZmpuQeYNYHK5jFeH/8Xhji4tsC',NULL,'2018-02-10 15:42:30','2018-02-10 15:42:30',0,'Sf51FsZ1kCVriYWJw9h4L8vNQtTcpv3K4uXULEmkXV6ga3t5Pd0g6baLcWcw');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `favorite_number` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`favorite_number`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (3,'vxd9YSoodAU62ZlM5stR0Apxi99lebDOBlfy8edg',5722,'2018-02-04 23:03:54','2018-02-04 23:03:54'),(4,'vxd9YSoodAU62ZlM5stR0Apxi99lebDOBlfy8edg',5720,'2018-02-04 23:04:17','2018-02-04 23:04:17'),(7,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 12:37:49','2018-02-17 12:37:49'),(8,'svxxshjVdBhOb2TqnZD3cePjqHnYmre68tPpCv40',14,'2018-02-21 07:22:00','2018-02-21 07:22:00'),(12,'SOz0YJvnPFn4M5UFABm7XXv7KKUHwIJN7C7mpa13',7,'2018-02-24 00:07:03','2018-02-24 00:07:03'),(11,'s3X9okrUsYmXmFAZcjS72IGb9WcnBNpHxjPP22Dt',13,'2018-02-23 23:57:28','2018-02-23 23:57:28'),(13,'SOz0YJvnPFn4M5UFABm7XXv7KKUHwIJN7C7mpa13',2,'2018-02-24 00:07:18','2018-02-24 00:07:18'),(14,'SOz0YJvnPFn4M5UFABm7XXv7KKUHwIJN7C7mpa13',14,'2018-02-24 00:09:21','2018-02-24 00:09:21');
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histories`
--

LOCK TABLES `histories` WRITE;
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
INSERT INTO `histories` VALUES (1,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5718,'2018-02-10 16:01:28','2018-02-10 16:01:28'),(2,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5718,'2018-02-10 16:01:44','2018-02-10 16:01:44'),(3,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5716,'2018-02-10 16:02:38','2018-02-10 16:02:38'),(4,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5717,'2018-02-10 17:08:27','2018-02-10 17:08:27'),(5,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5717,'2018-02-10 17:08:39','2018-02-10 17:08:39'),(6,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5718,'2018-02-10 17:08:56','2018-02-10 17:08:56'),(7,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5718,'2018-02-10 17:21:05','2018-02-10 17:21:05'),(8,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5717,'2018-02-10 17:21:12','2018-02-10 17:21:12'),(9,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5704,'2018-02-10 17:22:01','2018-02-10 17:22:01'),(10,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5721,'2018-02-10 17:30:08','2018-02-10 17:30:08'),(11,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5715,'2018-02-10 17:41:04','2018-02-10 17:41:04'),(12,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5715,'2018-02-10 17:41:23','2018-02-10 17:41:23'),(13,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5701,'2018-02-10 18:20:21','2018-02-10 18:20:21'),(14,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5689,'2018-02-10 18:33:10','2018-02-10 18:33:10'),(15,'g59Djm7Jf3JmBj2NblnM8tC29uCde1yYYcMrWHea',5715,'2018-02-10 18:37:07','2018-02-10 18:37:07'),(16,'pIWY54C56FXwpTm9tQvpeP9UsoxCO8jhUPi2Jehh',5706,'2018-02-11 21:56:15','2018-02-11 21:56:15'),(17,'MJSsnvUscp8JnbOjyVdOFG6f90BVaHcipxgf6836',5722,'2018-02-11 21:59:40','2018-02-11 21:59:40'),(18,'MJSsnvUscp8JnbOjyVdOFG6f90BVaHcipxgf6836',5722,'2018-02-11 21:59:46','2018-02-11 21:59:46'),(19,'MJSsnvUscp8JnbOjyVdOFG6f90BVaHcipxgf6836',5703,'2018-02-11 21:59:51','2018-02-11 21:59:51'),(20,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 12:34:07','2018-02-17 12:34:07'),(21,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 12:37:46','2018-02-17 12:37:46'),(22,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 12:45:45','2018-02-17 12:45:45'),(23,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 12:45:56','2018-02-17 12:45:56'),(24,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',7,'2018-02-17 12:46:15','2018-02-17 12:46:15'),(25,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 12:46:21','2018-02-17 12:46:21'),(26,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',6,'2018-02-17 12:46:26','2018-02-17 12:46:26'),(27,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',3,'2018-02-17 12:47:24','2018-02-17 12:47:24'),(28,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',3,'2018-02-17 12:54:18','2018-02-17 12:54:18'),(29,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 13:15:35','2018-02-17 13:15:35'),(30,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 13:29:33','2018-02-17 13:29:33'),(31,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',2,'2018-02-17 13:39:38','2018-02-17 13:39:38'),(32,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 13:41:10','2018-02-17 13:41:10'),(33,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',14,'2018-02-17 13:41:34','2018-02-17 13:41:34'),(34,'R2H3Ev1SXAFkU4dbZTfLAkXL7pD4jqAH2Jwzjyan',6,'2018-02-17 16:21:48','2018-02-17 16:21:48'),(35,'HHctAr8jKWIkum7dWyvvJo5oyVSjOZa5TLVaSID3',4,'2018-02-18 19:11:42','2018-02-18 19:11:42'),(36,'DBmV9M5BkhrDAkTTlNmD4KFEWzULpJbtQcLnhvhb',14,'2018-02-21 07:16:02','2018-02-21 07:16:02'),(37,'DBmV9M5BkhrDAkTTlNmD4KFEWzULpJbtQcLnhvhb',14,'2018-02-21 07:16:50','2018-02-21 07:16:50'),(38,'DBmV9M5BkhrDAkTTlNmD4KFEWzULpJbtQcLnhvhb',14,'2018-02-21 07:17:09','2018-02-21 07:17:09'),(39,'DBmV9M5BkhrDAkTTlNmD4KFEWzULpJbtQcLnhvhb',14,'2018-02-21 07:18:58','2018-02-21 07:18:58'),(40,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',7,'2018-02-23 23:42:34','2018-02-23 23:42:34'),(41,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',9,'2018-02-23 23:42:49','2018-02-23 23:42:49'),(42,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',8,'2018-02-23 23:44:04','2018-02-23 23:44:04'),(43,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',8,'2018-02-23 23:51:52','2018-02-23 23:51:52'),(44,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',8,'2018-02-23 23:53:35','2018-02-23 23:53:35'),(45,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',8,'2018-02-23 23:55:19','2018-02-23 23:55:19'),(46,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',14,'2018-02-23 23:56:44','2018-02-23 23:56:44'),(47,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',13,'2018-02-23 23:57:25','2018-02-23 23:57:25'),(48,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',13,'2018-02-23 23:57:56','2018-02-23 23:57:56'),(49,'Q5V1Xm4api37gZZT4q8EqMfBZVFfAtymm5kOckTQ',14,'2018-02-23 23:58:03','2018-02-23 23:58:03'),(50,'vPyYyoPBS7ynAEVeIsOdVnYPxKoaf7C4RnQQNM2c',8,'2018-02-24 00:06:47','2018-02-24 00:06:47'),(51,'vPyYyoPBS7ynAEVeIsOdVnYPxKoaf7C4RnQQNM2c',7,'2018-02-24 00:07:00','2018-02-24 00:07:00'),(52,'vPyYyoPBS7ynAEVeIsOdVnYPxKoaf7C4RnQQNM2c',2,'2018-02-24 00:07:15','2018-02-24 00:07:15'),(53,'vPyYyoPBS7ynAEVeIsOdVnYPxKoaf7C4RnQQNM2c',8,'2018-02-24 00:08:49','2018-02-24 00:08:49'),(54,'vPyYyoPBS7ynAEVeIsOdVnYPxKoaf7C4RnQQNM2c',14,'2018-02-24 00:09:17','2018-02-24 00:09:17');
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_tags`
--

DROP TABLE IF EXISTS `item_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `tag_id` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_item_id` (`item_id`),
  KEY `index_tags_on_tag_id_and_item_id` (`tag_id`,`item_id`),
  KEY `tag_id_index` (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_tags`
--

LOCK TABLES `item_tags` WRITE;
/*!40000 ALTER TABLE `item_tags` DISABLE KEYS */;
INSERT INTO `item_tags` VALUES (1,14,5,NULL,NULL),(2,13,4,NULL,NULL),(3,9,2,NULL,NULL),(4,8,1,NULL,NULL),(5,6,1,NULL,NULL),(6,5,1,NULL,NULL),(7,4,1,NULL,NULL),(8,3,1,NULL,NULL),(9,2,1,NULL,NULL),(10,2,4,NULL,NULL),(11,1,1,NULL,NULL),(12,7,1,NULL,NULL);
/*!40000 ALTER TABLE `item_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_id` varchar(100) DEFAULT NULL,
  `title` text,
  `comment` text,
  `volume` varchar(20) DEFAULT NULL,
  `movie_url` text,
  `original_contents_id` varchar(200) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `actress` text,
  `maker` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `genre` text,
  `item_order` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `item_order_index` (`item_order`),
  KEY `item_id_index` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,NULL,'落合博満監督退任後のテレビ出演',NULL,NULL,'https://www.youtube.com/watch?v=prGcGbkh-JM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,0),(2,NULL,'落合博満 × 野村克也 生対談 今だから話そうあの時の真実(2011)',NULL,NULL,'https://www.youtube.com/watch?v=PJ640T8Whxk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'2018-02-24 00:07:15',0),(3,NULL,'落合監督に学ぶ“オレ流”指揮官の姿',NULL,NULL,'https://www.youtube.com/watch?v=lfs_XAnfNuc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'2018-02-17 12:54:18',0),(4,NULL,'中日ドラゴンズ 10年前の沖縄キャンプ(2008)',NULL,NULL,'https://www.youtube.com/watch?v=p9DXFi2Hphg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2018-02-18 19:11:42',0),(5,NULL,'落合博満 × 江川卓 対談 野球哲学＆秘話 (2011)',NULL,NULL,'https://www.youtube.com/watch?v=1NjQk9KQ_Yg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,0),(6,NULL,'巨人軍とは」　落合博満　動画',NULL,NULL,'https://www.youtube.com/watch?v=itMEMtYwlXY',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'2018-02-17 16:21:48',0),(7,NULL,'落合博満 1982年',NULL,NULL,'https://www.youtube.com/watch?v=v3n1usdRdWw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,'2018-02-24 00:07:00',0),(8,NULL,'中日ドラゴンズ 1989年8月12日 落合博満 逆転サヨナラホームラン',NULL,NULL,'https://www.youtube.com/watch?v=DIgPt-_mV70',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,NULL,'2018-02-24 00:08:49',0),(9,NULL,'【清原和博】独占告白 いま覚醒剤の影響は？',NULL,NULL,'https://www.youtube.com/watch?v=Tl-n8sHPPdA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2018-02-23 23:42:49',0),(13,NULL,'野村克也の野球人生「人は何しに生まれてくるんだ」 1:18-から実物 「野村ノート」',NULL,NULL,'https://www.youtube.com/watch?v=78Z3EbHQrF8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'2018-02-23 23:57:56',0),(14,NULL,'山崎武司が引退試合のあり方について「真剣勝負でいいんじゃない」 プロ野球 2017年11月13日',NULL,NULL,'https://www.youtube.com/watch?v=Ld9-9pe7LI0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,NULL,'2018-02-24 00:09:17',0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL,
  `tag` varchar(255) DEFAULT '',
  `show_tag` tinyint(1) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'落合',0,NULL,NULL),(2,'清原',0,NULL,NULL),(3,'山崎',0,NULL,NULL),(4,'野村',0,NULL,NULL),(5,'山崎',0,NULL,NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-24  0:13:15
