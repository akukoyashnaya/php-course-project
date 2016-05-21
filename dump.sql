-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: c9
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (37,1,4,'2016-05-19 16:45:12','fdhsdhs'),(39,1,2,'2016-05-19 19:34:49','fn.kdfhg;xdxod;xbd'),(46,22,4,'2016-05-19 21:29:58','mcps\'adkmalm'),(48,12,4,'2016-05-20 10:18:18','cjmment2'),(49,21,1,'2016-05-20 17:22:40','czxcc'),(50,25,1,'2016-05-20 17:25:04','1111'),(51,30,1,'2016-05-20 23:34:41','<div>His dicit paulo no, cu summo deterruisset sed, eam nemore accumsan abhorreant ad. Labore ponderum deterruisset mel te. Has labitur nusquam verterem ut, ius cu luptatum rationibus mediocritatem</div><div><br></div>            '),(52,24,1,'2016-05-20 23:45:18','qqqqq'),(53,24,1,'2016-05-20 23:48:30','lhk,j'),(54,24,1,'2016-05-20 23:50:09','sdf'),(55,24,1,'2016-05-20 23:51:08','k.jbkjb'),(56,26,1,'2016-05-20 23:52:25','sdvsdv'),(57,26,1,'2016-05-20 23:52:29','sdvsdv');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (107,'dgjdfoghjdio','trhoitepohji','osfijgpsofji','11@11','drp[yidprogjhodlighk'),(110,'dgjdfoghjdio','trhoitepohji','osfijgpsofji','11@11','drp[yidprogjhodlighk'),(111,'dgjdfoghjdio','trhoitepohji','osfijgpsofji','11@11','drp[yidprogjhodlighk'),(112,'erer','erer','erer','ere@344','sfgsfsdfsfdf'),(113,'gtdgtsdtgs','ststt','stgsds','sdgsdg@sdfgsdf','xdgxdgxgdxdgg'),(114,'sdgsdg','sdgsdgs','dgsdgs','sdgsdg@sdfa','sdgsdg'),(115,'werwr','wserewr','werwer','wewe@fdsf','sdfsfsf'),(116,'rtgert','ertert','ertert','twt@fgdgdfg','dgdgdgdfgdfg'),(117,'zxcvzxcv','zxvczxc','zxczxc','zxc@zcvzv','zxvzcvzcvzv'),(118,'111','111','111','11@11','1111');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `forum` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forums`
--

LOCK TABLES `forums` WRITE;
/*!40000 ALTER TABLE `forums` DISABLE KEYS */;
INSERT INTO `forums` VALUES (1,'Fashion'),(2,'Design'),(3,'Music'),(4,'Travel');
/*!40000 ALTER TABLE `forums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `img_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_order` bigint(20) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `img_order` (`img_order`),
  UNIQUE KEY `img_order_2` (`img_order`),
  UNIQUE KEY `img_name` (`img_name`),
  UNIQUE KEY `img_name_2` (`img_name`),
  KEY `img_order_3` (`img_order`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (50,'5739c8028a42f257047051.jpg',3),(51,'5739c8028bce6976913996.jpg',5),(52,'5739c802aa8e2262420071.jpg',4),(53,'5739c802abc59408857035.jpg',1),(54,'5739c802aca95307405071.jpg',6),(55,'5739c802adf44470715790.jpg',7),(56,'5739c802af015888494985.jpg',9),(57,'5739c802aff42101618425.jpg',8);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(4) DEFAULT '0',
  `menu` tinyint(4) NOT NULL DEFAULT '1',
  `header` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `page` (`page`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'index.php','Home',1,1,NULL,NULL),(3,'gallery.php','Images',1,1,NULL,NULL),(4,'show_forum.php','Forum',1,1,NULL,NULL),(5,'topic.php','Topic',1,1,NULL,NULL),(6,'contacts.php','Contacts',1,1,NULL,NULL),(7,'show_topics.php','Topics',1,1,NULL,NULL),(21,'test.php','Test',0,1,' TEST','<div>Lorem ipsum dolor sit amet, iracundia theophrastus comprehensam id quo, ei his eirmod aperiam hendrerit. Cu esse repudiare quaerendum pri, eos nibh graeco cu. Id iudico mnesarchum eum, nostro vituperata sit te, no his fierent imperdiet dissentiet. Feugiat dolores est an, facer tritani noluisse nam ea. Pri epicuri electram ne, causae tamquam sanctus an mel, eos ei minim dolore perpetua. Cu mea omnes suscipit.</div><div><br></div><div>His dicit paulo no, cu summo deterruisset sed, eam nemore accumsan abhorreant ad. Labore ponderum deterruisset mel te. Has labitur nusquam verterem ut, ius cu luptatum rationibus mediocritatem, justo platonem vim id. Ne graeci aeterno vivendo usu, no nihil molestie periculis vix, ei primis putant definiebas sea. Wisi erat essent ei est, prompta adipisci cu ius. Ad odio deterruisset mel.</div><div><br></div><div>Epicuri perfecto invenire in ius, his ne putant delicatissimi. Veri justo simul sea in, vis ad doctus omittam, legere torquatos intellegam id eum. In qui veniam consul, dicit putant rationibus nam et. Mei no lorem admodum, errem inimicus constituam ut cum. Timeam mentitum eleifend eam id, illud justo antiopam pro ei. Libris civibus definitionem pri ei, his te meis perpetua reprimique.</div><div><br></div><div>Id voluptaria cotidieque nam, euismod voluptaria mea ad. Eius oblique iuvaret ut vim. Ludus consequat vel et, probatus splendide pri ne. Voluptua electram vim te, ius an diam posse, ex eum nisl vero. Cum in ipsum diceret consetetur. Quo stet dicam explicari in, vis augue molestiae ne.</div><div><br></div><div>Per vide dicta ad, nusquam moderatius ut ius. Id pri saperet vivendo repudiare, simul recusabo moderatius no mel, has ne congue lucilius. Mei odio atqui ei, viris assentior mea ut. Vis ei dico affert virtute, probo dolore ei sea. Dicit feugait neglegentur et mel. Id omnis etiam error quo, quo eu postulant persequeris ullamcorper.</div>');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `forum_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `topic` (`topic`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (24,'11',1,1,'2016-05-20 17:21:45',NULL,'1112xbxcv'),(26,'mvsfldknsv',1,1,'2016-05-20 17:46:25',NULL,'sdcam/lmlk'),(28,'fasdfasd',1,1,'2016-05-20 17:50:21',NULL,'sfsfasdfasdf lalala'),(30,'Interior Design',2,1,'2016-05-20 23:34:30',NULL,'<div>His dicit paulo no, cu summo deterruisset sed, eam nemore accumsan abhorreant ad. Labore ponderum deterruisset mel te. Has labitur nusquam verterem ut, ius cu luptatum rationibus mediocritatem, justo platonem vim id. Ne graeci aeterno vivendo usu, no nihil molestie periculis vix, ei primis putant definiebas sea. Wisi erat essent ei est, prompta adipisci cu ius. Ad odio deterruisset mel.</div><div><br></div>');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user1','111','aaa@aaa',1,0),(2,'user2','222','bbb@bbb',0,0),(3,'user3','333','ccc@ccc',1,0),(4,'admin','admin','ddd@ddd',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-21  0:03:20
