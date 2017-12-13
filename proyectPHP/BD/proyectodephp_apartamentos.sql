-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: proyectodephp
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `apartamentos`
--

DROP TABLE IF EXISTS `apartamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_apto` int(11) DEFAULT NULL,
  `torre` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos`
--

LOCK TABLES `apartamentos` WRITE;
/*!40000 ALTER TABLE `apartamentos` DISABLE KEYS */;
INSERT INTO `apartamentos` VALUES (1,101,'01','Activo'),(2,102,'01','Activo'),(3,103,'01','Activo'),(4,104,'01','Activo'),(5,105,'01','Activo'),(6,106,'01','Activo'),(7,107,'01','Inactivo'),(8,108,'01','Inactivo'),(9,201,'02','Activo'),(10,202,'02','Inactivo'),(11,203,'02','Inactivo'),(12,204,'02','Activo'),(13,205,'02','Inactivo'),(14,206,'02','Activo'),(15,207,'02','Activo'),(16,208,'02','Inactivo'),(17,301,'03','Activo'),(18,302,'03','Activo'),(19,303,'03','Inactivo'),(20,304,'03','Activo'),(21,305,'03','Activo'),(22,306,'03','Inactivo'),(23,307,'03','Activo'),(24,308,'03','Inactivo'),(25,401,'04','Activo'),(26,402,'04','Activo'),(27,403,'04','Inactivo'),(28,404,'04','Activo'),(29,405,'04','Activo'),(30,406,'04','Inactivo'),(31,407,'04','Activo'),(32,408,'04','Inactivo'),(33,501,'05','Activo'),(34,502,'05','Activo'),(35,503,'05','Inactivo'),(36,504,'05','Activo'),(37,505,'05','Activo'),(38,506,'05','Inactivo'),(39,507,'05','Activo'),(40,508,'05','Inactivo');
/*!40000 ALTER TABLE `apartamentos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-05 11:31:24
