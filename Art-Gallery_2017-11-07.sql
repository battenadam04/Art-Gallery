# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.19-MariaDB)
# Database: Art-Gallery
# Generation Time: 2017-11-07 19:06:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Admin`;

CREATE TABLE `Admin` (
  `ID` int(10) NOT NULL,
  `Email` varchar(40) NOT NULL DEFAULT '',
  `Password` varchar(50) NOT NULL,
  `Name` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;

INSERT INTO `Admin` (`ID`, `Email`, `Password`, `Name`)
VALUES
	(0,'cathryngruhn@hotmail.co.uk','pass','Cathryn'),
	(1,'adambatten@live.co.uk','Davemirra1','Adam');

/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Artwork
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Artwork`;

CREATE TABLE `Artwork` (
  `ID` int(100) NOT NULL,
  `Source` varchar(100) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Artwork` WRITE;
/*!40000 ALTER TABLE `Artwork` DISABLE KEYS */;

INSERT INTO `Artwork` (`ID`, `Source`, `Title`, `Description`)
VALUES
	(0,'img/18.jpg','Title','Description'),
	(1,'img/2.jpg','Title','Description'),
	(2,'img/3.jpg','Title','Description'),
	(3,'img/4.jpg','Title','Description'),
	(4,'img/5.jpg','Title','Description'),
	(5,'img/6.jpg','Title','Description'),
	(6,'img/7.jpg','Title','Description'),
	(7,'img/8.jpg','Title','Description'),
	(8,'img/9.jpg','Title','Description'),
	(9,'img/10.jpg','Title','Description'),
	(10,'img/11.jpg','Title','Description'),
	(11,'img/12.jpg','Title','Description'),
	(12,'img/13.jpg','Title','Description'),
	(13,'img/14.jpg','Title','Description'),
	(14,'img/15.jpg','Title','Description'),
	(15,'img/16.jpg','Title','Description'),
	(16,'img/17.jpg','Title','Description'),
	(17,'img/1.jpg','Title','Description'),
	(18,'img/19.jpg','Title','Description'),
	(19,'img/20.jpg','Title','Description'),
	(20,'img/21.jpg','Title','Description');

/*!40000 ALTER TABLE `Artwork` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
