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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin@admin.fr','$2y$10$M9qBC745lt5WdoEXMtEzGewhYrWxN6BezplWc9SWjbGp.DPVrWGNK');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anecdote`
--

DROP TABLE IF EXISTS `anecdote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anecdote` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_QUESTION` int(11) NOT NULL,
  `ID_LIEU` int(11) NOT NULL,
  `CONTENT` varchar(1200) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `question` (`ID_QUESTION`),
  KEY `lieu_anecdote` (`ID_LIEU`),
  CONSTRAINT `lieu_anecdote` FOREIGN KEY (`ID_LIEU`) REFERENCES `lieu` (`ID`),
  CONSTRAINT `question` FOREIGN KEY (`ID_QUESTION`) REFERENCES `quizz` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lieu`
--

LOCK TABLES `lieu` WRITE;
/*!40000 ALTER TABLE `lieu` DISABLE KEYS */;
INSERT INTO `lieu` VALUES (1,'Vieux-Lille',1),(2,'Beffroi',1),(3,'Citadelle',1),(4,'Esplanade de Lille',1),(5,'place du Général de Gaulle',1),(6,'Parc des Géants',3),(7,'Jardin aux plantes',3),(8,'Jardin Vauban',3),(9,'Jardin Lorem',3),(10,'Jardin Ipsum',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizz`
--

LOCK TABLES `quizz` WRITE;
/*!40000 ALTER TABLE `quizz` DISABLE KEYS */;
INSERT INTO `quizz` VALUES (1,1,'Quelle est la caractéristique de la rue Petit Paon ?','D&#039;après le site Vozer, le nom actuel de la rue &quot;Petit Paon&quot; viendrait d’un cabaret aujourd&#039;hui disparu qui s’y trouvait et qui s&#039;appelait tout simplement &quot;Le Petit Paon&quot;.','Le Général-de-Gaulle y a vécu','C&#039;est la plus colorée','C&#039;est la plus petite rue de Lille','Autrefois, un marché de Paon y existait',3),(2,1,'Quel surnom donne t-on au quartier du Vieux-Lille','Il s’agit du quartier le plus charmant de la ville avec ses ruelles pavées et ses petites places.\r\n \r\nEn outre, ce secteur de Lille est propice aux promenades et à la flânerie, et compte de très bonnes adresses.','Le triangle d&#039;or','Le quartier d&#039;or','Le carré d&#039;or','Le viel or',1),(3,2,'Quel est l&#039;architecte qui a conçu le Beffroi ?','L’actuel Beffroi de Lille n’est pas le premier de la ville. \r\n	Avant sa construction, la ville a connu la construction du beffroi de la Halle échevinale de Lille et de l’ancien beffroi de la Mairie de Lille au Palais Rihour. \r\n\r\nPar la suite, tous les deux ont été démolis. \r\n\r\nC’est le plus haut beffroi civil d’Europe. C’est un Monument Historique inscrit au Patrimoine mondial de l’UNESCO.&quot;','Auguste Perret','Jean Nouvel','Nicolas Michelin','Emile Dubuisson',4),(4,2,'Quel hauteur atteint le Beffroi ?','Le beffroi de Lille est également le plus haut bâtiment municipal de France.','99m','113m','104m','78m',3),(5,3,'A quelle date fut posée la première pierre de la Citadelle ?','Elle fut posée par le maitre-maçon lillois Simon Vollant.\r\n\r\n C&#039;est en pleine guerre contre les Espagnols que louis XIV ordonne la construction d&#039;une forteresse pour tenir la place forte de Lille.\r\n\r\n Les plans de Vauban furent retenus par le roi en octobre 1667. Le chantier de terrassement du sol marécageux commença dès décembre 1667.','17 juin 1667','17 juin 1668','17 juin 1669','17 juin 1670',2),(6,3,'Comment Vauban nomme-t-il la Citadelle ?','La citadelle de Lille est un ouvrage militaire bâti au XVIIe siècle pour la défense de Lille.\r\n\r\n« Je prétends vous faire tomber d&#039;accord avant votre départ que ce sera ici la reine des citadelles, à la prendre de toutes les manières. » \r\nVauban à Louvois, 1669.&quot;','Reine des citadelles','Reine des abeilles','Reine des citronnades','Reine des paillettes',1),(7,5,'Quel autre nom a porté la Grand&#039;Place de Lille ?','lle prend ce nom en référence à la Colonne de la Déesse, statue qui prône au centre de la place.\r\n\r\nCe monument commémore l&#039;héroïsme des Lillois lors du siège de Lille de 1792 par l&#039;armée impériale romaine.\r\n\r\nEn hommage au natif lillois, elle est repabtisée place du Général de Gaulle en septembre 1944, après la libération de Lille. \r\n	\r\nBien que communémement, la Grand-Place soit encore très utilisée par les lillois !','Place d&#039;Or','Place Royale','Place du Welsh','Place de la déesse',4),(8,5,'Quel bâtiment trouve t-on sur la Grand&#039;Place ?','&quot;Située entre la Grand&#039;Place et la Place du Théâtre, elle est l&#039;un des témoins de l&#039;intense activité économique qui se déroulait à Lille durant le Grand Siècle. \r\n\r\nC&#039;est l&#039;un des plus prestigieux bâtiments de Lille, qui fut classé monument historique entre 1921 et 1923.\r\n\r\nIl prend le nom &#039;Vieille Bourse&#039; depuis la construction en face de la chambre du Commerce (ou &#039;Nouvelle Bourse&#039;) en 1715.','Le palais Rihour','Le théatre Sébastopol','La Vieille Bourse','L&#039;Opéra',3),(9,4,'A qui rend hommage ce monument ?','Non ce n&#039;est pas une blague ! \r\nElle rend un double hommage : le premier aux oiseaux ayant permis les communications pendant la Grande Guerre \r\net le second à leurs propriétaires.\r\n\r\nLe rôle des pigeons pendant la première guerre mondiale est relativement méconnu mais il faut savoir qu&#039;en 1914, \r\nalors que les communications modernes sont encore balbutiantes, plusieurs dizaines de milliers de pigeons \r\nsont réquisitionnés et se livrent à une guerre du renseignement. \r\n\r\nAinsi, plus de 20.000 pigeons sont morts pour la patrie.\r\nSeul Lille, leur rend hommage à travers un monument dédié. Insolite !','Au général de Gaulle','Aux pigeons (d&#039;où le nom)','Aux anciens combattants','A la liberté de la Presse',2),(10,4,'Combien de fois fut reconstruit le pont de Napoleon ?','Hommage aux victoires de Napoléon Bonaparte, le pont fut construit en 1812.\r\nFait de bois, il se détériore rapidement, demandant une première dès 1850.\r\n\r\nIl est détruit deux fois par les Allemands, lors des Guerres Mondiales en 1918 et 1944.\r\nA sa dernière reconstruction, quatre sphinghes furent ajoutées et finalisent l&#039;identité de ce lieu.','1','5','7','Demandez à Nathan',4),(12,6,'Pourquoi appelle t-on ce parc, le Parc des Géants ?','Les Géants  Les Géants représentent des héros imaginaires, des personnages historiques ou même des animaux. \r\nVéritables symboles des cités, ils en sont les fondateurs et les protecteurs. \r\nChaque année un défilé des Géants a lieu sur le boulevard de Liberté.','En hommage à l&#039;histoire régionale et locale','En référence au folklore littéraire de Lille','A cause des constructions géantes présentes dans le parc','Et pourquoi pas, d&#039;abord ?',1),(13,1,'Combien d&#039;espèces différentes de plantes sont recensés dans ce jardin ?','C&#039;est en tout 45.000 végétaux qui habitent ce jardin, essentiellement composés d&#039;essences horticoles :\r\nmetasequoia, magnolia, arbre aux mouchoirs, bambous, plantes vivaces, bulbeuses, aquatiques ou encore grimpantes !','250','300','350','400',2),(14,7,'Quand fut créé le jardin aux plantes ?','Le Jardin des plantes a été aménagé par l&#039;architecte Jean Dubuisson et le paysagiste Jacques Marquis,\r\nsur une parcelle de près de 11 hectares à l&#039;emplacement des anciennes fortifications du sud-est de la ville et \r\nsituée entre les portes de Douai et d&#039;Arras. \r\n \r\nUne orangerie est construite en 1952. \r\nUne serre équatoriale, conçue par l&#039;architecte Jean-Pierre Secq, en 1970, \r\na rassemblé toutes les plantes qui avaient été ramenées par les explorateurs ...','1944','1946','1948','1950',3),(15,7,'Quelle anecdote sur le jardin est vraie ?','Le jardin et ses aménagements sont aujourd’hui inscrits au titre des monuments historiques \r\nselon la définition suivante : « le Jardin des Plantes, dans son tracé, avec les bassins, le péristyle, \r\nles vases et les statuaires : inscription par arrêté du 1er décembre 1997 ».','Sa serre equatoriale a accueilli l&#039;un des derniers musée colonial français','Il a servi de base à la Résistance pendant la Seconde Guerre Mondiale','Il accueille chaque année, le concours du plus gros mangeur de welsh, une spécialité régionale.','Il est inscrit comme monument historique',4),(16,8,'D&#039;avril à mai, s&#039;y tient un évènement spécial. Quel est-il ?','Appelé le P&#039;tit Jacques, il relate les aventures du héros éponyme.  \r\n\r\nIl traverse, à la manière d’un Tintin reporter, toutes les aventures de Chèvreville et connait maintes situations délicates. \r\n\r\nLe spectacle a lieu dans l&#039;ancien Chalet des Chèvres.','Un spectacle de marionnettes','Un spectacle aquatique','Un apparition des Géants, symbole folklorique régionale','La floraison d&#039;une fleur très particulière',1),(17,8,'Quel lieu insolite peut-on retrouver dans ce jardin ?','Il s&#039;agit d&#039;une grotte totalement artificiel, très secret et loin regards indiscrets... Le rendez-vous idéal\r\npour déclarer sa flamme à l&#039;être aimé','La cabane des pigeons','La grotte des amoureux','Le chalet des moutons','Le sanctuaire des Géants',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1);
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

-- Dump completed on 2022-10-13 12:08:26
