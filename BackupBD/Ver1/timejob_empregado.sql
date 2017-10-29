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
-- Table structure for table `empregado`
--

DROP TABLE IF EXISTS `empregado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empregado` (
  `Senha` varchar(255) DEFAULT NULL,
  `TelefoneCel` varchar(255) DEFAULT NULL,
  `CPF` varchar(255) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `IdEmpregado` bigint(20) NOT NULL AUTO_INCREMENT,
  `Sobrenome` varchar(255) DEFAULT NULL,
  `Cargo` varchar(255) DEFAULT NULL,
  `Login` varchar(255) DEFAULT NULL,
  `FkEquipe` bigint(20) DEFAULT NULL,
  `FkProjeto` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`IdEmpregado`),
  KEY `FkEquipe` (`FkEquipe`),
  CONSTRAINT `empregado_ibfk_1` FOREIGN KEY (`FkEquipe`) REFERENCES `equipe` (`IdEquipe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empregado`
--

LOCK TABLES `empregado` WRITE;
/*!40000 ALTER TABLE `empregado` DISABLE KEYS */;
INSERT INTO `empregado` VALUES ('admin','21999999999','123-456-78','Administrador',1,'Administrador2','Administrador','admin',NULL,NULL),('rhachyd','21993015287','123456789','Rhachyd',2,'Silveira','Administrador','rhachyd',NULL,NULL),('gestor','123456789','12345678','Gestor',3,'Gest','Gestor','gestor',NULL,NULL),('usuario','1234567890','12345678','User',4,'Usuario','Usuario','usuario',NULL,NULL);
/*!40000 ALTER TABLE `empregado` ENABLE KEYS */;
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
