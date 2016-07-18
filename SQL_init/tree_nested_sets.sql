-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: seven
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `tree`
--

DROP TABLE IF EXISTS `tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `left_key` int(11) DEFAULT NULL,
  `right_key` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tree`
--

LOCK TABLES `tree` WRITE;
/*!40000 ALTER TABLE `tree` DISABLE KEYS */;
INSERT INTO `tree` VALUES (1,'A',NULL,2,19,1),(2,'B',NULL,20,37,1),(3,'C',NULL,38,39,1),(4,'AA',1,3,14,2),(5,'AB',1,15,16,2),(6,'AC',1,17,18,2),(7,'AAA',4,4,11,3),(8,'AAB',4,12,13,3),(9,'AAAA',7,5,8,4),(10,'AAAB',7,9,10,4),(11,'AAAAA',9,6,7,5),(12,'BB',2,21,26,2),(13,'BBB',12,22,25,3),(14,'BBBB',13,23,24,4),(15,'BA',2,27,28,2),(16,'BC',2,29,36,2),(17,'BCA',16,30,33,3),(18,'BCB',16,34,35,3),(19,'BCAA',17,31,32,4),(20,'D',NULL,40,53,1),(21,'DA',20,41,42,2),(22,'DB',20,43,46,2),(23,'DC',20,47,48,2),(24,'DD',20,49,52,2),(25,'DBA',22,44,45,3),(26,'DDA',24,50,51,3),(27,'E',NULL,54,55,1);
/*!40000 ALTER TABLE `tree` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-17 22:00:18
