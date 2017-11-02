-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for osx10.6 (i386)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `bod` date DEFAULT NULL,
  `colegiatura` double DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,'Hector Monarrez','monarrez','Desarrollo Urbano La Primavera, San Luis 22','2017-04-11',123,NULL),(2,'Hector Monarrez','Monarrez','Desarrollo Urbano La Primavera, San Luis 22','2017-04-01',1000,NULL),(3,'Jose','Lopez','Av Carlos Lazo #20 dept 601, torre 2000','2012-01-01',1002,NULL),(4,'Luis','Perez','Huanghe Road 288, 22','2012-01-01',1203,'2009-01-01');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colegiaturas`
--

DROP TABLE IF EXISTS `colegiaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colegiaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aid` int(11) NOT NULL,
  `restante` float DEFAULT NULL,
  `pago_completo` tinyint(1) NOT NULL,
  `cuenta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `colegiatras_alumnos` (`aid`),
  CONSTRAINT `colegiatras_alumnos` FOREIGN KEY (`aid`) REFERENCES `alumnos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colegiaturas`
--

LOCK TABLES `colegiaturas` WRITE;
/*!40000 ALTER TABLE `colegiaturas` DISABLE KEYS */;
INSERT INTO `colegiaturas` VALUES (1,1002,'2017-04-28 23:14:33',3,0,1,NULL),(2,321.1,'2017-04-28 23:14:52',1,-198.1,0,NULL),(3,123,'2017-05-09 14:55:04',1,0,1,2),(4,90,'2017-05-09 14:55:20',2,910,0,3),(5,1002,'2017-05-09 21:24:39',3,0,1,2),(6,503,'2017-05-09 21:25:08',4,700,0,3),(7,100,'2017-09-29 18:43:23',1,23,0,2),(8,1000,'2017-09-29 18:43:31',2,0,1,2);
/*!40000 ALTER TABLE `colegiaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donadores`
--

DROP TABLE IF EXISTS `donadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `donativo` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donadores`
--

LOCK TABLES `donadores` WRITE;
/*!40000 ALTER TABLE `donadores` DISABLE KEYS */;
INSERT INTO `donadores` VALUES (1,'industrias algo','moral',2000),(2,'donador 2','fisica',2000);
/*!40000 ALTER TABLE `donadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donativos`
--

DROP TABLE IF EXISTS `donativos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donativos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float NOT NULL,
  `restante` float DEFAULT NULL,
  `pago_completo` tinyint(1) DEFAULT '0',
  `did` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cuenta` int(11) DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `donativos_donadores` (`did`),
  CONSTRAINT `donativos_donadores` FOREIGN KEY (`did`) REFERENCES `donadores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donativos`
--

LOCK TABLES `donativos` WRITE;
/*!40000 ALTER TABLE `donativos` DISABLE KEYS */;
INSERT INTO `donativos` VALUES (1,2000,0,1,1,'2017-04-28 23:42:57',NULL),(2,342.2,1657.8,0,2,'2017-04-28 23:43:01',NULL),(3,2000,0,1,1,'2017-05-09 21:25:33',3),(4,1000,1000,0,2,'2017-05-09 21:25:39',3);
/*!40000 ALTER TABLE `donativos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) DEFAULT NULL,
  `monto` float NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `did` int(11) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `people_ingresos` (`did`),
  KEY `alumnos_ingresos` (`aid`),
  CONSTRAINT `alumnos_ingresos` FOREIGN KEY (`aid`) REFERENCES `alumnos` (`id`),
  CONSTRAINT `people_ingresos` FOREIGN KEY (`did`) REFERENCES `donadores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` VALUES (1,NULL,100,'2017-04-25 20:07:08',1,'colegiatura',1),(7,NULL,100,'2017-04-25 20:11:35',1,'123',1),(8,'donativo',544.4,'2017-04-28 16:45:01',2,'test',NULL),(10,'donativo',544.4,'2017-04-28 16:47:50',2,'test',NULL),(12,NULL,394123,'2017-04-28 16:54:20',2,'aslgo',NULL),(13,'otro',123,'2017-04-28 16:56:23',NULL,'algo',NULL),(14,'colegiatura',4093,'2017-04-28 16:56:39',NULL,'col',1),(15,'donativo',123.21,'2017-04-28 16:57:44',1,'don',NULL),(16,'colegiatura',123.21,'2017-04-28 17:35:03',NULL,'testing',3),(17,'colegiatura',532.1,'2017-04-28 17:36:10',NULL,'testing otro',3),(18,'otro',123,'2017-05-09 20:43:09',NULL,'123',NULL);
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `monto` double NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_pago` (`aid`),
  CONSTRAINT `alumno_pago` FOREIGN KEY (`aid`) REFERENCES `alumnos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'hec','$2y$10$3pg0ODxibo1dTMcARj6Twe4bAZkjkG12VphwGZKjRLKJoUXd4VoKq',NULL),(3,'qwe','$2y$10$O3ucZXYxqvtN65L1S.U6fOysoozTBEmPW/Lr7gW6T.aNBhuMJ5Cma','1'),(4,'susana','$2y$10$1J6tMcrYf7nvHMeQA2UYPOCiIQKbynSm/1a1kRecXmCPpNgiYaPym','1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-02 14:08:35
