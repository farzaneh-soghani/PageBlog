-- MySQL dump 10.13  Distrib 5.7.24, for osx11.1 (x86_64)
--
-- Host: 127.0.0.1    Database: chris
-- ------------------------------------------------------
-- Server version	5.5.5-10.11.6-MariaDB-0+deb12u1

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
-- Table structure for table `Artikel`
--

DROP TABLE IF EXISTS `Artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Artikel` (
  `ArtikelID` int(11) NOT NULL AUTO_INCREMENT,
  `Titel` varchar(200) DEFAULT NULL,
  `BilderID` int(11) DEFAULT NULL,
  `Text` text DEFAULT NULL,
  `AutorID` int(11) DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Carousel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ArtikelID`),
  KEY `Artikel_Bilder_BilderID_fk` (`BilderID`),
  CONSTRAINT `Artikel_Bilder_BilderID_fk` FOREIGN KEY (`BilderID`) REFERENCES `Bilder` (`BilderID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Artikel`
--

LOCK TABLES `Artikel` WRITE;
/*!40000 ALTER TABLE `Artikel` DISABLE KEYS */;
INSERT INTO `Artikel` (`ArtikelID`, `Titel`, `BilderID`, `Text`, `AutorID`, `Datum`, `Carousel`) VALUES (1,'Test',1,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   \n\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet.',1,NULL,NULL);
/*!40000 ALTER TABLE `Artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Autoren`
--

DROP TABLE IF EXISTS `Autoren`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Autoren` (
  `AutorID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`AutorID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Autoren`
--

LOCK TABLES `Autoren` WRITE;
/*!40000 ALTER TABLE `Autoren` DISABLE KEYS */;
INSERT INTO `Autoren` (`AutorID`, `Name`) VALUES (1,'Chris');
/*!40000 ALTER TABLE `Autoren` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Bilder`
--

DROP TABLE IF EXISTS `Bilder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bilder` (
  `BilderID` int(11) NOT NULL AUTO_INCREMENT,
  `Pfad` varchar(200) DEFAULT NULL,
  `AltText` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`BilderID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bilder`
--

LOCK TABLES `Bilder` WRITE;
/*!40000 ALTER TABLE `Bilder` DISABLE KEYS */;
INSERT INTO `Bilder` (`BilderID`, `Pfad`, `AltText`) VALUES (1,'https://picsum.photos/150/125','Bild');
/*!40000 ALTER TABLE `Bilder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Kategorie_Artikel`
--

DROP TABLE IF EXISTS `Kategorie_Artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kategorie_Artikel` (
  `KategorieID` int(11) NOT NULL,
  `ArtikelID` int(11) NOT NULL,
  PRIMARY KEY (`KategorieID`,`ArtikelID`),
  KEY `Kategorie_Artikel_Artikel_ArtikelID_fk` (`ArtikelID`),
  CONSTRAINT `Kategorie_Artikel_Artikel_ArtikelID_fk` FOREIGN KEY (`ArtikelID`) REFERENCES `Artikel` (`ArtikelID`),
  CONSTRAINT `Kategorie_Artikel_Kategorien_KategorieID_fk` FOREIGN KEY (`KategorieID`) REFERENCES `Kategorien` (`KategorieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kategorie_Artikel`
--

LOCK TABLES `Kategorie_Artikel` WRITE;
/*!40000 ALTER TABLE `Kategorie_Artikel` DISABLE KEYS */;
INSERT INTO `Kategorie_Artikel` (`KategorieID`, `ArtikelID`) VALUES (1,1);
/*!40000 ALTER TABLE `Kategorie_Artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Kategorien`
--

DROP TABLE IF EXISTS `Kategorien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kategorien` (
  `KategorieID` int(11) NOT NULL AUTO_INCREMENT,
  `Bezeichnung` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`KategorieID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kategorien`
--

LOCK TABLES `Kategorien` WRITE;
/*!40000 ALTER TABLE `Kategorien` DISABLE KEYS */;
INSERT INTO `Kategorien` (`KategorieID`, `Bezeichnung`) VALUES (1,'Kategorie 1');
/*!40000 ALTER TABLE `Kategorien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Kommentare`
--

DROP TABLE IF EXISTS `Kommentare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kommentare` (
  `KommentarID` int(11) NOT NULL AUTO_INCREMENT,
  `KommentierenderID` int(11) DEFAULT NULL,
  `Betreff` varchar(200) DEFAULT NULL,
  `Kommentar` text DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  PRIMARY KEY (`KommentarID`),
  KEY `Kommentare_Kommentierende_KommentierenderID_fk` (`KommentierenderID`),
  CONSTRAINT `Kommentare_Kommentierende_KommentierenderID_fk` FOREIGN KEY (`KommentierenderID`) REFERENCES `Kommentierende` (`KommentierenderID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kommentare`
--

LOCK TABLES `Kommentare` WRITE;
/*!40000 ALTER TABLE `Kommentare` DISABLE KEYS */;
INSERT INTO `Kommentare` (`KommentarID`, `KommentierenderID`, `Betreff`, `Kommentar`, `Datum`) VALUES (1,1,'Test','Test123','2024-07-16'),(2,4,'Das ist ein Betreff','Das ist der Kommentar dazu!','2024-07-16'),(3,5,'Betreff','Kommentar!','2024-07-16'),(4,6,'Das ist ein Betreff','Und das hier ist der Kommentar!','2024-07-17');
/*!40000 ALTER TABLE `Kommentare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Kommentare_Artikel`
--

DROP TABLE IF EXISTS `Kommentare_Artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kommentare_Artikel` (
  `KommentarID` int(11) NOT NULL,
  `ArtikelID` int(11) NOT NULL,
  PRIMARY KEY (`ArtikelID`,`KommentarID`),
  KEY `Kommentare_Artikel_Kommentare_KommentarID_fk` (`KommentarID`),
  CONSTRAINT `Kommentare_Artikel_Artikel_ArtikelID_fk` FOREIGN KEY (`ArtikelID`) REFERENCES `Artikel` (`ArtikelID`),
  CONSTRAINT `Kommentare_Artikel_Kommentare_KommentarID_fk` FOREIGN KEY (`KommentarID`) REFERENCES `Kommentare` (`KommentarID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kommentare_Artikel`
--

LOCK TABLES `Kommentare_Artikel` WRITE;
/*!40000 ALTER TABLE `Kommentare_Artikel` DISABLE KEYS */;
INSERT INTO `Kommentare_Artikel` (`KommentarID`, `ArtikelID`) VALUES (3,1),(4,1);
/*!40000 ALTER TABLE `Kommentare_Artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Kommentierende`
--

DROP TABLE IF EXISTS `Kommentierende`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kommentierende` (
  `KommentierenderID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(120) NOT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Homepage` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`KommentierenderID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kommentierende`
--

LOCK TABLES `Kommentierende` WRITE;
/*!40000 ALTER TABLE `Kommentierende` DISABLE KEYS */;
INSERT INTO `Kommentierende` (`KommentierenderID`, `Name`, `Email`, `Homepage`) VALUES (1,'Testname','testm@il.com','http://dasisteinte.st'),(2,'Testname2','testm@il.com','http://dasisteinte.st'),(3,'Testname3','testm@il.com','http://dasisteinte.st'),(4,'Chris','habe@i.ch','http://christasche.ovh'),(5,'Testname','test@test.te','http://dieu.rl'),(6,'Chris','kontakt@christasche.ovh','http://christasche.ovh');
/*!40000 ALTER TABLE `Kommentierende` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-18  9:08:34
