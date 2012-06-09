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
-- Create schema carlos_bd_app
--

CREATE DATABASE IF NOT EXISTS carlos_bd_app;
USE carlos_bd_app;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayname` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(25) NOT NULL,
  `salt` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `displayname`, `password`, `email`, `username`, `salt` ) VALUES
(1, 'Carlos Dominguez', 'c', 'krlosnando@gmail.com', 'c', '');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `descripcion`) VALUES
(6, 'Pases'),
(7, 'Compras'),
(8, 'Cine'),
(9, 'Mi novi@'),
(10, 'Pastillas'),
(11, 'Desayuno'),
(12, 'Almuerzo'),
(13, 'Taxi');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gastodetalle`
--

/*!40000 ALTER TABLE `gastodetalle` DISABLE KEYS */;
INSERT INTO `gastodetalle` (`id`, `idcategoria`, `descripcion`) VALUES
(13, 6, 'Purral para ir al cine'),
(14, 7, 'Chicles'),
(15, 8, 'Palomitas y nachos'),
(16, 9, 'Almuhada que dice te amo '),
(17, 6, 'Zapote a San José'),
(18, 10, 'Tapsin día'),
(19, 6, 'San José a Purral'),
(20, 6, 'Purral a San José'),
(21, 6, 'Pavas a Sabana'),
(22, 11, 'Pan del lunes'),
(23, 12, 'Colegio de médicos'),
(24, 7, 'Tennis'),
(25, 6, 'Trabajo a curso de inglés'),
(26, 6, 'Pavas a San José'),
(27, 6, 'San José a San Pedro'),
(28, 13, 'Cenfotec a Casa'),
(29, 7, 'Curitas'),
(30, 11, 'Empanada'),
(31, 6, 'Tren Sabana a San José');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gasto`
--

/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
INSERT INTO `gasto` (`id`, `iddetalle`, `idusuario`, `cantidad`, `fecha`) VALUES
(19, 13, 1, 275, '2012-06-03 13:40:22'),
(20, 14, 1, 800, '2012-06-03 14:13:22'),
(21, 15, 1, 8100, '2012-06-03 17:49:54'),
(22, 16, 1, 9750, '2012-06-03 20:20:01'),
(23, 17, 1, 225, '2012-06-03 20:37:08'),
(24, 18, 1, 345, '2012-06-03 21:03:41'),
(25, 19, 1, 275, '2012-06-03 21:05:46'),
(26, 20, 1, 275, '2012-06-04 08:49:25'),
(27, 21, 1, 590, '2012-06-04 09:47:43'),
(28, 22, 1, 330, '2012-06-04 12:17:23'),
(29, 23, 1, 2000, '2012-06-04 15:40:47'),
(30, 24, 1, 23950, '2012-06-04 20:17:42'),
(31, 20, 1, 275, '2012-06-05 09:55:42'),
(32, 21, 1, 590, '2012-06-05 09:56:56'),
(33, 23, 1, 2000, '2012-06-05 17:14:54'),
(34, 25, 1, 295, '2012-06-05 20:15:49'),
(35, 26, 1, 295, '2012-06-05 22:02:35'),
(36, 27, 1, 260, '2012-06-06 00:47:11'),
(37, 28, 1, 1750, '2012-06-06 00:47:48'),
(38, 20, 1, 550, '2012-06-06 09:17:11'),
(39, 29, 1, 145, '2012-06-06 10:21:24'),
(40, 30, 1, 500, '2012-06-06 11:07:38'),
(41, 23, 1, 2000, '2012-06-06 14:39:16'),
(43, 31, 1, 880, '2012-06-06 19:29:19'),
(44, 19, 1, 275, '2012-06-06 20:13:09');
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
