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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
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
INSERT INTO `categorie` VALUES (1,'Lieux et monuments'),(2,'Histoire de Lille'),(3,'Parcs et jardins');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lieu`
--

LOCK TABLES `lieu` WRITE;
/*!40000 ALTER TABLE `lieu` DISABLE KEYS */;
INSERT INTO `lieu` VALUES (1,'Vieux-Lille',1),(2,'Beffroi',1),(3,'Citadelle',1),(4,'Esplanade de Lille',1),(5,'place du Général de Gaulle',1),(6,'Parc des Géants',3),(7,'Jardin aux plantes',3),(8,'Jardin lorem',3),(9,'Jardin ipsum',3);
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
  `question` varchar(400) DEFAULT NULL,
  `anecdote` varchar(1000) NOT NULL,
  `r1` varchar(300) DEFAULT NULL,
  `r2` varchar(300) DEFAULT NULL,
  `r3` varchar(300) DEFAULT NULL,
  `r4` varchar(300) DEFAULT NULL,
  `br` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `lieu` (`ID_LIEU`),
  CONSTRAINT `lieu` FOREIGN KEY (`ID_LIEU`) REFERENCES `lieu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizz`
--

LOCK TABLES `quizz` WRITE;
/*!40000 ALTER TABLE `quizz` DISABLE KEYS */;
INSERT INTO `quizz` VALUES (1,1,'Quelle est la caractéristique de la rue Petit Paon ?','D&#039;après le site Vozer, le nom actuel de la rue &quot;Petit Paon&quot; viendrait d’un cabaret aujourd&#039;hui disparu qui s’y trouvait et qui s&#039;appelait tout simplement &quot;Le Petit Paon&quot;.','Le Général-de-Gaulle y a vécu','C&#039;est la plus colorée','C&#039;est la plus petite rue de Lille','Autrefois, un marché de Paon y existait',3),(2,1,'Quel surnom donne t-on au quartier du Vieux-Lille','Il s’agit du quartier le plus charmant de la ville avec ses ruelles pavées et ses petites places.\r\n \r\nEn outre, ce secteur de Lille est propice aux promenades et à la flânerie, et compte de très bonnes adresses.','Le triangle d&#039;or','Le quartier d&#039;or','Le carré d&#039;or','Le viel or',1),(3,2,'Quel est l&#039;architecte qui a conçu le Beffroi ?','L’actuel Beffroi de Lille n’est pas le premier de la ville. \r\n	Avant sa construction, la ville a connu la construction du beffroi de la Halle échevinale de Lille et de l’ancien beffroi de la Mairie de Lille au Palais Rihour. \r\n\r\nPar la suite, tous les deux ont été démolis. \r\n\r\nC’est le plus haut beffroi civil d’Europe. C’est un Monument Historique inscrit au Patrimoine mondial de l’UNESCO.&quot;','Auguste Perret','Jean Nouvel','Nicolas Michelin','Emile Dubuisson',4),(4,2,'Quel hauteur atteint le Beffroi ?','Le beffroi de Lille est également le plus haut bâtiment municipal de France.','99m','113m','104m','78m',3),(5,3,'A quelle date fut posée la première pierre de la Citadelle ?','Elle fut posée par le maitre-maçon lillois Simon Vollant.\r\n\r\n C&#039;est en pleine guerre contre les Espagnols que louis XIV ordonne la construction d&#039;une forteresse pour tenir la place forte de Lille.\r\n\r\n Les plans de Vauban furent retenus par le roi en octobre 1667. Le chantier de terrassement du sol marécageux commença dès décembre 1667.','17 juin 1667','17 juin 1668','17 juin 1669','17 juin 1670',2),(6,3,'Comment Vauban nomme-t-il la Citadelle ?','La citadelle de Lille est un ouvrage militaire bâti au XVIIe siècle pour la défense de Lille.\r\n\r\n« Je prétends vous faire tomber d&#039;accord avant votre départ que ce sera ici la reine des citadelles, à la prendre de toutes les manières. » \r\nVauban à Louvois, 1669.&quot;','Reine des citadelles','Reine des abeilles','Reine des citronnades','Reine des paillettes',1),(7,5,'Quel autre nom a porté la Grand&#039;Place de Lille ?','lle prend ce nom en référence à la Colonne de la Déesse, statue qui prône au centre de la place.\r\n\r\nCe monument commémore l&#039;héroïsme des Lillois lors du siège de Lille de 1792 par l&#039;armée impériale romaine.\r\n\r\nEn hommage au natif lillois, elle est repabtisée place du Général de Gaulle en septembre 1944, après la libération de Lille. \r\n	\r\nBien que communémement, la Grand-Place soit encore très utilisée par les lillois !','Place d&#039;Or','Place Royale','Place du Welsh','Place de la déesse',4),(8,5,'Quel bâtiment trouve t-on sur la Grand&#039;Place ?','&quot;Située entre la Grand&#039;Place et la Place du Théâtre, elle est l&#039;un des témoins de l&#039;intense activité économique qui se déroulait à Lille durant le Grand Siècle. \r\n\r\nC&#039;est l&#039;un des plus prestigieux bâtiments de Lille, qui fut classé monument historique entre 1921 et 1923.\r\n\r\nIl prend le nom &#039;Vieille Bourse&#039; depuis la construction en face de la chambre du Commerce (ou &#039;Nouvelle Bourse&#039;) en 1715.','Le palais Rihour','Le théatre Sébastopol','La Vieille Bourse','L&#039;Opéra',3);
/*!40000 ALTER TABLE `quizz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-01 12:58:40
