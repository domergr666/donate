-- MySQL dump 10.13  Distrib 5.5.59, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: majorcore_dev
-- ------------------------------------------------------
-- Server version	5.5.59-0+deb8u1

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
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `command` varchar(200) NOT NULL,
  `intid` int(11) unsigned NOT NULL,
  `email` varchar(200) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `amount` int(11) unsigned NOT NULL,
  `order_id` int(11) unsigned NOT NULL,
  `donate` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `time` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data`
--

LOCK TABLES `data` WRITE;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
/*!40000 ALTER TABLE `data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footers`
--

DROP TABLE IF EXISTS `footers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `html` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footers`
--

LOCK TABLES `footers` WRITE;
/*!40000 ALTER TABLE `footers` DISABLE KEYS */;
INSERT INTO `footers` VALUES (27,'Стандартный блок','<div class=\"block-header block-header-default\">\n            <h3 class=\"block-title text-left\">Заголовок</h3>\n        </div>\n        <div class=\"block-content p-5\">\n			<div class=\'tab-content text-left\'>\nСодержимое блока\n			</div>\n</div>'),(26,'Виджет комментов','<!-- Put this script tag to the <head> of your page -->\n<script type=\"text/javascript\" src=\"https://vk.com/js/api/openapi.js?156\"></script>\n\n<script type=\"text/javascript\">\n  VK.init({apiId: 6406241, onlyWidgets: true});\n</script>\n\n<!-- Put this div tag to the place, where the Comments block will be -->\n<div id=\"vk_comments\"></div>\n<script type=\"text/javascript\">\nVK.Widgets.Comments(\"vk_comments\", {limit: 10, attach: \"*\"});\n</script>');
/*!40000 ALTER TABLE `footers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `headers`
--

DROP TABLE IF EXISTS `headers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `headers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `html` mediumtext NOT NULL COMMENT 'Содержимое divа',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `headers`
--

LOCK TABLES `headers` WRITE;
/*!40000 ALTER TABLE `headers` DISABLE KEYS */;
INSERT INTO `headers` VALUES (13,'Стандартный блог','<div class=\"block-header block-gd-cherry text-left\">\n                    <h3 class=\"block-title text-uppercase\">Текст</h3>\n                    <div class=\"block-options\">\n                        <div class=\"block-options-item\">\n                            <a class=\"text-white h5 font-w600\" target=\"_blank\" href=\"\">Текст 2</a>\n                        </div>\n                    </div>\n</div>');
/*!40000 ALTER TABLE `headers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) NOT NULL,
  `page_id` varchar(50) NOT NULL,
  `is_hidden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_name` (`page_name`),
  UNIQUE KEY `page_id` (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privileges` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `command` varchar(200) NOT NULL,
  `price` int(11) unsigned NOT NULL,
  `section` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`command`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES (99,'Say dorou','say dorou',2,'home','Команда 1<br><br>Команда 2'),(98,'Админка','pex user !user group set admin',200,'home','ыыыыыы'),(101,'Модератор','pex user !user group set moder',100,'home','Возможности:\n<br>\ngamemode\ngod режим\n');
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promo`
--

DROP TABLE IF EXISTS `promo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `promo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `discount` int(3) unsigned NOT NULL,
  `count` int(11) NOT NULL COMMENT 'Количество использований',
  PRIMARY KEY (`id`),
  UNIQUE KEY `promo` (`promo`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promo`
--

LOCK TABLES `promo` WRITE;
/*!40000 ALTER TABLE `promo` DISABLE KEYS */;
INSERT INTO `promo` VALUES (19,'mydonate-1',50,999);
/*!40000 ALTER TABLE `promo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roulette`
--

DROP TABLE IF EXISTS `roulette`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roulette` (
  `roulette_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Айди рулетки',
  `session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`roulette_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roulette`
--

LOCK TABLES `roulette` WRITE;
/*!40000 ALTER TABLE `roulette` DISABLE KEYS */;
/*!40000 ALTER TABLE `roulette` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roulette_content`
--

DROP TABLE IF EXISTS `roulette_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roulette_content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `roulette_parent` int(11) NOT NULL COMMENT 'Чей контент',
  `command` varchar(255) NOT NULL,
  `chance` float NOT NULL COMMENT 'Шанс выпадания чего-либо',
  `content_name` varchar(255) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roulette_content`
--

LOCK TABLES `roulette_content` WRITE;
/*!40000 ALTER TABLE `roulette_content` DISABLE KEYS */;
INSERT INTO `roulette_content` VALUES (1,92,'say 1',10,'Чета'),(2,92,'say 3',10,'Юрий Шатунов');
/*!40000 ALTER TABLE `roulette_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domen` varchar(30) NOT NULL,
  `sitename` varchar(100) NOT NULL,
  `admin_pass` varchar(30) NOT NULL,
  `dev_pass` varchar(30) NOT NULL,
  `lk_pass` varchar(30) NOT NULL,
  `md_secret.word1` varchar(255) NOT NULL,
  `md_secret.word2` varchar(255) NOT NULL,
  `md_secret.word3` varchar(255) NOT NULL,
  `vk_group_domain` varchar(30) NOT NULL,
  `server_ip` varchar(30) NOT NULL,
  `server_port` int(11) NOT NULL,
  `server_rcon.port` varchar(30) NOT NULL,
  `server_rcon.pass` varchar(30) NOT NULL,
  `server_query.port` varchar(30) NOT NULL,
  `fk_merchant.id` varchar(30) NOT NULL,
  `fk_secret.word` varchar(30) NOT NULL,
  `fk_secret.word2` varchar(30) NOT NULL,
  `vk_admin_id` varchar(64) NOT NULL,
  `status` int(1) NOT NULL,
  `mode` int(1) NOT NULL,
  `rules` char(64) DEFAULT NULL,
  `support` char(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'demo.mydonate.su','Nexter Universe','root','root','root','none','none','none','https://vk.com/nexteruniverse','IP',25565,'25566','root','25567','72826','none','none','0',1,1,NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-17 18:34:28
