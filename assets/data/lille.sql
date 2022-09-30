-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: lille
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
<<<<<<< HEAD
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin@admin.fr','$2y$10$mXy2aZSeL0KvWUa75KPVRuBOXSpQp5f3nnHs4eK9BpDLYcd2g2Czq');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
=======
>>>>>>> main
-- Table structure for table `anecdote`
--

DROP TABLE IF EXISTS `anecdote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anecdote` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
<<<<<<< HEAD
  `ID_QUESTION` int(11) NOT NULL,
=======
  `ID_QUESTION` int(11) DEFAULT NULL,
>>>>>>> main
  `ID_LIEU` int(11) NOT NULL,
  `CONTENT` varchar(1200) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `question` (`ID_QUESTION`),
  KEY `lieu_anecdote` (`ID_LIEU`),
  CONSTRAINT `lieu_anecdote` FOREIGN KEY (`ID_LIEU`) REFERENCES `lieu` (`ID`),
  CONSTRAINT `question` FOREIGN KEY (`ID_QUESTION`) REFERENCES `quizz` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anecdote`
--

LOCK TABLES `anecdote` WRITE;
/*!40000 ALTER TABLE `anecdote` DISABLE KEYS */;
/*!40000 ALTER TABLE `anecdote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_CAT` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `categorie` VALUES (1,'Lieux et monuments'),(2,'Histoire de Lille'),(3,'Parcs et jardins');
=======
INSERT INTO `categorie` VALUES (1,'Histoire de Lille'),(2,'Lieux et monuments'),(3,'Parcs et jardins');
>>>>>>> main
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lieu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_LIEU` varchar(255) DEFAULT NULL,
  `ID_CAT` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `categorie` (`ID_CAT`),
  CONSTRAINT `categorie` FOREIGN KEY (`ID_CAT`) REFERENCES `categorie` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
=======
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
>>>>>>> main
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lieu`
--

LOCK TABLES `lieu` WRITE;
/*!40000 ALTER TABLE `lieu` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `lieu` VALUES (1,'Vieux-Lille',1);
=======
INSERT INTO `lieu` VALUES (1,'Vieux-Lille',2),(4,'Beffroi de Lille',2),(5,'Citadelle de Lille',2),(6,'Opéra',2),(7,'La Grand\'Place de Lille',2),(8,'Vieille Bourse',2);
>>>>>>> main
/*!40000 ALTER TABLE `lieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizz` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_LIEU` int(11) NOT NULL,
<<<<<<< HEAD
  `question` varchar(400) DEFAULT NULL,
  `anecdote` varchar(1000) NOT NULL,
  `r1` varchar(300) DEFAULT NULL,
  `r2` varchar(300) DEFAULT NULL,
  `r3` varchar(300) DEFAULT NULL,
  `r4` varchar(300) DEFAULT NULL,
  `br` int(11) DEFAULT NULL,
  `ID_CAT` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `lieu` (`ID_LIEU`),
  CONSTRAINT `lieu` FOREIGN KEY (`ID_LIEU`) REFERENCES `lieu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
=======
  `INTITULE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `lieu` (`ID_LIEU`),
  CONSTRAINT `lieu` FOREIGN KEY (`ID_LIEU`) REFERENCES `lieu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
>>>>>>> main
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizz`
--

LOCK TABLES `quizz` WRITE;
/*!40000 ALTER TABLE `quizz` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `quizz` VALUES (1,1,'Quelle est la caractéristique de la rue Petit Paon ?','D\'après le site Vozer, le nom actuel de la rue \'Petit Paon viendrait d\'un cabaret aujourd\'hui disparu qui s\'appelait tout simplement \'Le petit paon\'','C\'est la plus petite rue de Lille','Le général de Gaulle y a vécu','C\'est la plus colorée','Autrefois, un marché de paons y existait',1,0),(2,1,'Quel surnom lui donne t-on ?','Il s\'agit du quartier le plus charmant de la ville avec ses ruelles pavées et ses petites places. En outre, ce secteur de Lille est propice aux promenades et à la flânerie. Il compte de très bonnes adresses.','le triangle d\'or','le quartier d\'or','le carré d\'or','le vieil or',1,0);
/*!40000 ALTER TABLE `quizz` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `quizz` VALUES (2,1,'Quelle est la particularité de la rue Petit Paon?'),(3,1,'Quel surnom donne t-on au quartier du Vieux-Lille ?'),(4,4,'Quel architecte a conçu le Beffroi de Lille ?'),(5,4,'Dans quel quartier se trouve le Beffroi ?'),(8,5,'Quand fut posée la première pierre de la Citadelle ?'),(9,5,'Comment Vauban, architecte de la Citadelle, la nomme t-elle ?');
/*!40000 ALTER TABLE `quizz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reponse` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_QUESTION` int(11) NOT NULL,
  `CONTENT` varchar(400) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reponse`
--

LOCK TABLES `reponse` WRITE;
/*!40000 ALTER TABLE `reponse` DISABLE KEYS */;
INSERT INTO `reponse` VALUES (1,2,'Le général de Gaulle y a vécu'),(2,2,'C\'est la rue la plus colorée de Lille'),(3,2,'C\'est la plus petite rue de Lille'),(4,2,'D. Autrefois, un marché de paons s\'y tenait');
/*!40000 ALTER TABLE `reponse` ENABLE KEYS */;
UNLOCK TABLES;
>>>>>>> main
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<< HEAD
-- Dump completed on 2022-09-29 16:55:42
=======
-- Dump completed on 2022-09-26 19:47:46
>>>>>>> main
