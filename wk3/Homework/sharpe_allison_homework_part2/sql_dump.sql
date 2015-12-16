# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: SSL
# Generation Time: 2015-12-10 22:49:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table fruit_table
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fruit_table`;

CREATE TABLE `fruit_table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `fruit_table` WRITE;
/*!40000 ALTER TABLE `fruit_table` DISABLE KEYS */;

INSERT INTO `fruit_table` (`id`, `name`, `color`)
VALUES
	(1,'Apple','Red'),
	(2,'Apple','Green'),
	(3,'Banana','Yellow');

/*!40000 ALTER TABLE `fruit_table` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table fruits
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fruits`;

CREATE TABLE `fruits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fruitname` varchar(50) DEFAULT NULL,
  `fruitcolor` varchar(50) DEFAULT NULL,
  `fruitimage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `fruits` WRITE;
/*!40000 ALTER TABLE `fruits` DISABLE KEYS */;

INSERT INTO `fruits` (`id`, `fruitname`, `fruitcolor`, `fruitimage`)
VALUES
	(1,'Banana','Yellow','https://www.google.com/url?sa=i&rct=j&q=&esrc=s&so'),
	(2,'Apple','Red','https://www.google.com/url?sa=i&rct=j&q=&esrc=s&so'),
	(3,'Green Apple','Green','https://www.google.com/url?sa=i&rct=j&q=&esrc=s&so');

/*!40000 ALTER TABLE `fruits` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users101
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users101`;

CREATE TABLE `users101` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users101` WRITE;
/*!40000 ALTER TABLE `users101` DISABLE KEYS */;

INSERT INTO `users101` (`userid`, `username`, `password`, `avatar`)
VALUES
	(13,'Allison1995','9b78f8ec92ae800623828932a0475046',''),
	(19,'Ally23','bba96327c3da027020c30d148124178d','cutepenguin.png'),
	(20,'Allison95','9b78f8ec92ae800623828932a0475046','cutepenguin.png');

/*!40000 ALTER TABLE `users101` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
