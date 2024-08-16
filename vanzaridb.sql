-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: vanzaridb
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clienti` (
  `clientID` int NOT NULL AUTO_INCREMENT,
  `nume` varchar(45) NOT NULL,
  `prenume` varchar(45) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  PRIMARY KEY (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES (2,'Coman','George','Bucuresti,sector3'),(3,'Ionita','Darius','Constanta'),(13,'Marcel','Pavel','Strada Iancului Nr24');
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comenzi`
--

DROP TABLE IF EXISTS `comenzi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comenzi` (
  `comandaID` int NOT NULL AUTO_INCREMENT,
  `clientID` int NOT NULL,
  `produsID` int NOT NULL,
  `dataComanda` varchar(50) NOT NULL,
  `cantitate` int NOT NULL,
  PRIMARY KEY (`comandaID`),
  KEY `fk_comenzi_1_idx` (`clientID`),
  KEY `fk_comenzi_2_idx` (`produsID`),
  CONSTRAINT `fk_comenzi_1` FOREIGN KEY (`clientID`) REFERENCES `clienti` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_comenzi_2` FOREIGN KEY (`produsID`) REFERENCES `produsalimentar` (`produsID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comenzi`
--

LOCK TABLES `comenzi` WRITE;
/*!40000 ALTER TABLE `comenzi` DISABLE KEYS */;
INSERT INTO `comenzi` VALUES (13,3,5,'2023-12-13',200);
/*!40000 ALTER TABLE `comenzi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conturi`
--

DROP TABLE IF EXISTS `conturi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conturi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nume` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(500) NOT NULL,
  `tip` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conturi`
--

LOCK TABLES `conturi` WRITE;
/*!40000 ALTER TABLE `conturi` DISABLE KEYS */;
INSERT INTO `conturi` VALUES (2,'George','geoogacc','GeoStyleYoutube@yahoo.ro','$2y$10$k4PO1pNN9ZRs0JMOaw9YguiKhubSqvsSBlAQOvyHxsKuM9Qn9vZgq','user'),(6,'Adrian','lol','test@email.com','$2y$10$1oiFAFX4taoD5HnW0gF9DOMj8mp41TD6bx8pbkhToXnkuARlfb9Z.','admin'),(7,'casca','casca','asda','$2y$10$lW417xSNQnPEPfv31GdpheKz5HC2vG/H9duw32i5gaqhwTM53F6Ke','user'),(8,'Cosmin','cosmin123','cosmin@email.com','$2y$10$9SpxsFvxb3WkNQiWbz0r3u6cO4VeIKbPqlLGGNGksZKFfZ3GTYlBa','admin'),(9,'Matei','matei321','matei@gmail.com','$2y$10$953wxaZA1R1Ytk3CxBvfO.2ED6XBS9hXOsQzgqUYaQYlHnLyO0QHC','user'),(13,'sss','bbb','c@yahoo.com','$2y$10$o8zzgRgCg3s5jcUUY6gkquCe6xmcUBVzVA3p9xyQL13FRRmc35Fty','user');
/*!40000 ALTER TABLE `conturi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expedieri`
--

DROP TABLE IF EXISTS `expedieri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expedieri` (
  `expediereID` int NOT NULL AUTO_INCREMENT,
  `produsID` int NOT NULL,
  `producatorID` int NOT NULL,
  `dataExpediere` varchar(50) NOT NULL,
  `cantitate` int NOT NULL,
  PRIMARY KEY (`expediereID`),
  KEY `fk_expedieri_1_idx` (`produsID`),
  KEY `fk_expedieri_2_idx` (`producatorID`),
  CONSTRAINT `fk_expedieri_1` FOREIGN KEY (`produsID`) REFERENCES `produsalimentar` (`produsID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_expedieri_2` FOREIGN KEY (`producatorID`) REFERENCES `producatori` (`producatorID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expedieri`
--

LOCK TABLES `expedieri` WRITE;
/*!40000 ALTER TABLE `expedieri` DISABLE KEYS */;
INSERT INTO `expedieri` VALUES (8,1,1,'2023-09-24',1111),(9,3,2,'2023-06-16',20);
/*!40000 ALTER TABLE `expedieri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producatori`
--

DROP TABLE IF EXISTS `producatori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producatori` (
  `producatorID` int NOT NULL AUTO_INCREMENT,
  `denumire` varchar(45) NOT NULL,
  `taraOrigine` varchar(45) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  PRIMARY KEY (`producatorID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producatori`
--

LOCK TABLES `producatori` WRITE;
/*!40000 ALTER TABLE `producatori` DISABLE KEYS */;
INSERT INTO `producatori` VALUES (1,'Coca-Cola','SUA','Voluntari,Bucuresti,sector6'),(2,'Lotto','Romania','Bucuresti,Sector 3'),(4,'Cris-Tim','Romania','Judetul Prahova');
/*!40000 ALTER TABLE `producatori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produsalimentar`
--

DROP TABLE IF EXISTS `produsalimentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produsalimentar` (
  `produsID` int NOT NULL AUTO_INCREMENT,
  `denumire` varchar(45) NOT NULL,
  `dataProducere` varchar(45) NOT NULL,
  `dataExpirare` varchar(45) NOT NULL,
  PRIMARY KEY (`produsID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produsalimentar`
--

LOCK TABLES `produsalimentar` WRITE;
/*!40000 ALTER TABLE `produsalimentar` DISABLE KEYS */;
INSERT INTO `produsalimentar` VALUES (1,'Coca-Cola Lime','2023-08-12','2024-08-30'),(3,'Pufuleti Cascaval','2023-01-30','2023-06-30'),(5,'Cioco Latte','2021-03-20','2025-08-31');
/*!40000 ALTER TABLE `produsalimentar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-07  0:39:11
