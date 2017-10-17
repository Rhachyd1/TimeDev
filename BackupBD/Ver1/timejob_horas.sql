CREATE DATABASE  IF NOT EXISTS `timejob` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `timejob`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: timejob
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `horas`
--

DROP TABLE IF EXISTS `horas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horas` (
  `HoraEntrada` time DEFAULT NULL,
  `HoraSaida` time DEFAULT NULL,
  `HoraAcumulada` time DEFAULT NULL,
  `HoraDevida` time DEFAULT NULL,
  `DataHora` date NOT NULL,
  `FkEmpregado` bigint(20) NOT NULL,
  PRIMARY KEY (`DataHora`,`FkEmpregado`),
  KEY `FkEmpregado` (`FkEmpregado`),
  CONSTRAINT `horas_ibfk_1` FOREIGN KEY (`FkEmpregado`) REFERENCES `empregado` (`IdEmpregado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas`
--

LOCK TABLES `horas` WRITE;
/*!40000 ALTER TABLE `horas` DISABLE KEYS */;
INSERT INTO `horas` VALUES ('12:10:31',NULL,NULL,NULL,'2017-10-14',1),('12:10:43',NULL,NULL,NULL,'2017-10-14',2),('12:10:03',NULL,NULL,NULL,'2017-10-15',1),('12:10:36',NULL,NULL,NULL,'2017-10-15',2),('13:10:48',NULL,NULL,NULL,'2017-10-15',3),('13:10:00',NULL,NULL,NULL,'2017-10-15',4);
/*!40000 ALTER TABLE `horas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-15 13:39:52
