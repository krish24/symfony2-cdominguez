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
-- Create schema wqfemegb_dbcarlos
--

CREATE DATABASE IF NOT EXISTS wqfemegb_dbcarlos;
USE wqfemegb_dbcarlos;

--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayname` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05DF85E0677` (`username`),
  UNIQUE KEY `UNIQ_2265B05DE7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`,`displayname`,`username`,`salt`,`password`,`email`) VALUES 
 (1,'Carlos Dominguez','c',' ','c','krlosnando@gmail.com'),
 (2,'Yuliana Arias','y',' ','y','yuli0192@hotmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Definition of table `gastodetalle`
--

DROP TABLE IF EXISTS `gastodetalle`;
CREATE TABLE `gastodetalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_12EAB70B300BBBD8` (`idcategoria`),
  CONSTRAINT `FK_12EAB70B300BBBD8` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gastodetalle`
--

/*!40000 ALTER TABLE `gastodetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastodetalle` ENABLE KEYS */;

--
-- Definition of table `gasto`
--

DROP TABLE IF EXISTS `gasto`;
CREATE TABLE `gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddetalle` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AE43DA145F3D2E5E` (`iddetalle`),
  KEY `IDX_AE43DA14FD61E233` (`idusuario`),
  CONSTRAINT `FK_AE43DA14FD61E233` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `FK_AE43DA145F3D2E5E` FOREIGN KEY (`iddetalle`) REFERENCES `gastodetalle` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gasto`
--

/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;


--
-- Definition of table `usuario_categoria`
--

DROP TABLE IF EXISTS `usuario_categoria`;
CREATE TABLE `usuario_categoria` (
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`categoria_id`),
  KEY `IDX_C72BF83FDB38439E` (`usuario_id`),
  KEY `IDX_C72BF83F3397707A` (`categoria_id`),
  CONSTRAINT `FK_C72BF83F3397707A` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C72BF83FDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario_categoria`
--

/*!40000 ALTER TABLE `usuario_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_categoria` ENABLE KEYS */;


--
-- Definition of table `usuario_gastodetalle`
--

DROP TABLE IF EXISTS `usuario_gastodetalle`;
CREATE TABLE `usuario_gastodetalle` (
  `usuario_id` int(11) NOT NULL,
  `gastodetalle_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`gastodetalle_id`),
  KEY `IDX_18D232DEDB38439E` (`usuario_id`),
  KEY `IDX_18D232DE814F19DA` (`gastodetalle_id`),
  CONSTRAINT `FK_18D232DE814F19DA` FOREIGN KEY (`gastodetalle_id`) REFERENCES `gastodetalle` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_18D232DEDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario_gastodetalle`
--

/*!40000 ALTER TABLE `usuario_gastodetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_gastodetalle` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
