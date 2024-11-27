-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: stubble_solve
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `dsroom`
--

DROP TABLE IF EXISTS `dsroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dsroom` (
  `DSRId` int NOT NULL AUTO_INCREMENT,
  `DSRName` varchar(255) DEFAULT NULL,
  `DSRLocation` varchar(255) DEFAULT NULL,
  `DSRSMeter` varchar(45) DEFAULT NULL,
  `DSRCropType` varchar(255) DEFAULT 'Rice',
  `DSRRollCount` int DEFAULT '0',
  PRIMARY KEY (`DSRId`),
  UNIQUE KEY `DSRId_UNIQUE` (`DSRId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dsroom`
--

LOCK TABLES `dsroom` WRITE;
/*!40000 ALTER TABLE `dsroom` DISABLE KEYS */;
INSERT INTO `dsroom` VALUES (1,'Storeroom 1','East Punjab','400','Rice',1800),(2,'Storeroom 2','West Punjab','500','Wheat',8990),(3,'Storeroom 3','North Punjab','600','Rice',2000),(4,'Storeroom 4','South Punjab','600','Wheat',2000),(5,'Storeroom 5','South Haryana','600','Rice',2000),(6,'Storeroom 8','North Haryana','700','Wheat',2000),(7,'Storeroom 6','East Haryana','800','Rice',2000),(8,'Storeroom 7','West Haryana','800','Wheat',2000);
/*!40000 ALTER TABLE `dsroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `OrdersId` int unsigned NOT NULL AUTO_INCREMENT,
  `OrderedBy` int DEFAULT NULL,
  `CardId` int DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `Paid` tinyint DEFAULT '1',
  `Packed` tinyint DEFAULT '0',
  `Shipped` tinyint DEFAULT '0',
  `Delivery` tinyint DEFAULT '0',
  `Verfied` tinyint DEFAULT '0',
  PRIMARY KEY (`OrdersId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (8,20,1,100,1,0,0,0,0),(9,20,1,100,1,0,0,0,0),(10,20,2,10,1,0,0,0,0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `PostId` int NOT NULL AUTO_INCREMENT,
  `CropType` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `FieldSize` int DEFAULT NULL,
  `Deadline` date DEFAULT NULL,
  `Image` blob,
  `CreatedBy` int DEFAULT NULL,
  `PostedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `NeededHuman` int DEFAULT '0',
  `EnrolledHuman` int DEFAULT '0',
  `CommitedHuman` int DEFAULT '0',
  `Harvested` tinyint DEFAULT '0',
  `Rolled` tinyint DEFAULT '0',
  `Collected` tinyint DEFAULT '0',
  `Transported` tinyint DEFAULT '0',
  `Verified` tinyint DEFAULT '0',
  `Paid` tinyint DEFAULT '0',
  PRIMARY KEY (`PostId`),
  UNIQUE KEY `PostId_UNIQUE` (`PostId`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (24,'Rice','Punjab ',100,'2024-10-30',NULL,20,'2024-10-23 11:44:37',10,2,2,1,1,1,1,1,0),(25,'Rice','Punjab ',100,'2024-10-30',NULL,20,'2024-10-23 11:53:19',10,0,0,1,1,0,0,0,0),(26,'Rice','Punjab ',100,'2024-10-30',NULL,20,'2024-10-23 12:24:27',10,1,1,1,1,1,1,1,0),(27,'Rice','Chennai, Tamilnadu ',2,'2024-10-30',NULL,20,'2024-10-23 12:53:59',0,0,0,1,1,0,0,0,0),(28,'Rice','Punjab ',123,'2024-10-30',NULL,20,'2024-10-23 12:54:16',12,1,1,1,1,1,1,1,0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `User_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) DEFAULT 'DefaultEmail845734509357573475894843@xmail.com',
  `Phone` int unsigned DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`User_id`),
  UNIQUE KEY `User_id_UNIQUE` (`User_id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `Phone_UNIQUE` (`Phone`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'nr633507e@gmail.com',1234567890,'Vengadesan G','$2y$10$MLeqBHZLTTuK6Zg.OBSaJeRzRlziDVc0w1nLcEGnv/7DZM.40ziLC'),(3,'',123123,'Vengadesan G','$2y$10$471rkDmlmUIRQ.0LDEpqXOX8nSygFulXs1990nLfByqYWL7bPnYQm'),(5,'DefaultEmail845734509357573475894843@xmail.com',312,'Vengadesan G','$2y$10$N6EB.OWBO.dVJAIqqVAJquNfnfuoGXq5ISw.M9CZfSFBwVzxjsBxa'),(11,'test@example.us',1212121212,'Vengadesan G','$2y$10$CPTLZDwbQAxwiR0uN/SSLuaFOQwR38WNn6mWOEVvjoPTzvLyariUq'),(14,'DefaultEmailId2323232323@ssmail.com',2323232323,'Vengadesan G','$2y$10$JTeVJDV/q2yGsTOZrvHALOykWh6WBBH/fk5R9DV0Erz7F4ZQqrnQq'),(15,'DefaultEmailId123123123@ssmail.com',123123123,'Vengadesan G','$2y$10$E6OxwsQ1OIAlFfwg2jGE8uNKSm6y9RRKM1S.EVS4nGxC6qc5Jg37e'),(16,'DefaultEmailId000000000@ssmail.com',0,'Vengadesan G','$2y$10$N9mM.A3NQeKr3OIMrp6JN.kVTmX1GEnO8P0wNBK5x8/LOfmK1H/Ve'),(18,'DefaultEmailId90@ssmail.com',90,'Vengadesan G','$2y$10$9JLKHghhOUnad2cCThFigOnNanVVDdrFYjntWmZdsBEv3IVagH9FC'),(19,'DefaultEmailId91@ssmail.com',91,'Vengadesan G','$2y$10$NJntX8JFsf4r/aTG8YY1futLkifOQ8KsC7kNFWxWPcUWTrOmlB.7e'),(20,'DefaultEmailId92@ssmail.com',92,'Vengadesan G','$2y$10$4HG84F4/2Ha6I.e0zYMH0eGKs52feth7lRvDgF5hGdMANdBGvAbPm'),(22,'test2@example.us',44,'Vengadesan G','$2y$10$uK3DnSuJ2Q18NsH9VCTlH.V8RcUhlKPXP1ffowGVUvXJY6rGlBbd2'),(23,'test5@example.us',5445,'Vengadesan G','$2y$10$IqGdI6iB.xUu7JVKUQulLOf6/dpsURk5gpeTBPmEVhRy9/LzTNZSO'),(24,'test6@example.us',666,'Vengadesan G','$2y$10$psWvWAcMDySzLtKQ6811FepF.tf.Q1FRXAQ3hbWT4HlSG.sq.etxO'),(25,'vengadesang@gmail.com',98977,'Vengadesan G','$2y$10$iEaBfDwvYPMTkLnzBfaDQuheVlxf9Cv2tWAp4uy/wIKBCfYB8DqnS'),(26,'imthusdsad@gmail.com',12345,'Imthu','$2y$10$.58Dp8Y8NaK405yYFtAtk.GLza9418.R7SBjHmDGclq3mNOp1TZ4C'),(27,'asdas@gmail.com',54554,'Yuva','$2y$10$m0Gh5yqF4bwOeWoc1ughoOzlcAwJ1GzGs6l9tXCjN/HVaNLYdfABW'),(28,'assaasda@gmail.com',916850733,'Venkatesh','$2y$10$yDDhAsXB3g9wpXaTmqXlDehyTX0yWTL01UHs492sGbik0hTd76jxC'),(31,'asas@gmail.com',1234567891,'Imthu1','$2y$10$rkfofBPkBPHqugwNcRbVqebEbhuuJaJPIOWw/pvZkZ/ntbswjAdxO'),(33,'asadfcx@gmail.com',369,'Vishali','$2y$10$s8fYPKyql4wnIro5qthV4.nBMU1VEQ5xhhUebryso28obvnjw7V8O');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `works` (
  `WorksId` int NOT NULL AUTO_INCREMENT,
  `WorkType` varchar(255) DEFAULT NULL,
  `PostId` int DEFAULT NULL,
  `WorkerId` int DEFAULT NULL,
  `Committed` tinyint DEFAULT '0',
  `Completed` tinyint DEFAULT '0',
  `Verified` tinyint DEFAULT '0',
  `Paid` tinyint DEFAULT '0',
  PRIMARY KEY (`WorksId`),
  UNIQUE KEY `WorksId_UNIQUE` (`WorksId`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` VALUES (31,'2',24,20,1,1,1,0),(32,'2',26,20,1,1,1,0),(33,'2',28,20,1,1,1,0),(34,'3',24,20,1,0,0,0);
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-27 13:35:08
