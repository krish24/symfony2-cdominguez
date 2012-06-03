-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cdominguezapp
--

CREATE DATABASE IF NOT EXISTS cdominguezapp;
USE cdominguezapp;

--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`,`descripcion`) VALUES 
 (1,'Celular'),
 (2,'Almuerzo');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Definition of table `gasto`
--

DROP TABLE IF EXISTS `gasto`;
CREATE TABLE `gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddetalle` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6F82F5105F3D2E5E` (`iddetalle`),
  CONSTRAINT `FK_6F82F5105F3D2E5E` FOREIGN KEY (`iddetalle`) REFERENCES `gastodetalle` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gasto`
--

/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
INSERT INTO `gasto` (`id`,`iddetalle`,`cantidad`,`fecha`) VALUES 
 (1,1,1000,'2012-06-03 07:02:26'),
 (2,1,100000,'2012-06-03 07:21:33'),
 (3,1,100000,'2012-06-03 07:21:59'),
 (4,1,5456,'2012-06-03 07:23:33'),
 (5,1,4551,'2012-06-03 07:27:08'),
 (6,2,50000,'2012-06-03 07:27:34'),
 (7,2,4343,'2012-06-03 07:28:38'),
 (8,2,451,'2012-06-03 07:29:46'),
 (9,3,2000,'2012-06-03 07:30:22'),
 (10,3,5000,'2012-06-03 07:31:07');
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;


--
-- Definition of table `gastodetalle`
--

DROP TABLE IF EXISTS `gastodetalle`;
CREATE TABLE `gastodetalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C566556F300BBBD8` (`idcategoria`),
  CONSTRAINT `FK_C566556F300BBBD8` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gastodetalle`
--

/*!40000 ALTER TABLE `gastodetalle` DISABLE KEYS */;
INSERT INTO `gastodetalle` (`id`,`idcategoria`,`descripcion`) VALUES 
 (1,1,'Recarga'),
 (2,1,'Nuevo celular'),
 (3,2,'Comida colegio de medicos');
/*!40000 ALTER TABLE `gastodetalle` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
