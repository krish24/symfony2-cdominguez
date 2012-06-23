-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2012 a las 23:37:55
-- Versión del servidor: 5.1.63
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `wimmtk_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`) VALUES
(4, 'Almuerzo'),
(5, 'Pases'),
(6, 'Mamá'),
(7, 'Mamá Luisa'),
(8, 'Curso de ingles'),
(9, 'Prestamos'),
(10, 'Celular'),
(11, 'Perfume'),
(12, 'Compras'),
(13, 'Pases'),
(14, 'Desayuno'),
(15, 'Regalos'),
(16, 'Pases');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE IF NOT EXISTS `gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddetalle` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AE43DA145F3D2E5E` (`iddetalle`),
  KEY `IDX_AE43DA14FD61E233` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id`, `iddetalle`, `idusuario`, `cantidad`, `fecha`) VALUES
(7, 6, 1, 2000, '2012-06-15 12:00:00'),
(8, 7, 1, 275, '2012-06-14 18:53:00'),
(9, 8, 1, 30000, '2012-06-14 20:55:00'),
(10, 9, 1, 15000, '2012-06-14 18:59:00'),
(11, 10, 1, 82000, '2012-06-15 18:01:00'),
(12, 11, 1, 275, '2012-06-15 07:03:00'),
(13, 12, 1, 590, '2012-06-15 07:04:00'),
(14, 13, 1, 590, '2012-06-15 18:06:00'),
(15, 14, 1, 590, '2012-06-15 18:08:00'),
(16, 7, 1, 275, '2012-06-15 18:09:00'),
(17, 15, 1, 2000, '2012-06-17 09:11:00'),
(18, 16, 1, 1000, '2012-06-17 12:23:00'),
(19, 11, 1, 275, '2012-06-17 13:15:00'),
(20, 17, 1, 7150, '2012-06-17 14:04:00'),
(21, 18, 1, 520, '2012-06-17 14:06:00'),
(22, 19, 1, 350, '2012-06-17 14:09:00'),
(23, 20, 1, 210, '2012-06-17 14:49:00'),
(24, 21, 2, 1340, '2012-06-18 05:56:00'),
(25, 22, 1, 610, '2012-06-18 07:19:00'),
(26, 23, 1, 390, '2012-06-18 07:47:00'),
(27, 24, 2, 1200, '2012-06-18 09:38:00'),
(28, 6, 1, 2000, '2012-06-18 13:29:00'),
(29, 25, 2, 390, '2012-06-18 17:29:00'),
(30, 26, 2, 7900, '2012-06-18 18:56:00'),
(31, 27, 2, 670, '2012-06-18 18:57:00'),
(32, 7, 1, 275, '2012-06-18 19:06:00'),
(33, 7, 1, 275, '2012-06-18 19:06:00'),
(34, 28, 3, 275, '2012-06-19 10:16:00'),
(35, 11, 1, 275, '2012-06-19 06:48:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastodetalle`
--

CREATE TABLE IF NOT EXISTS `gastodetalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_12EAB70B300BBBD8` (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `gastodetalle`
--

INSERT INTO `gastodetalle` (`id`, `idcategoria`, `descripcion`) VALUES
(6, 4, 'Colegio de médicos'),
(7, 5, 'San José a Purral'),
(8, 6, 'Casa'),
(9, 7, 'Ayuda'),
(10, 8, 'Mensualidad'),
(11, 5, 'Purral a San José'),
(12, 5, 'San José a Sabana'),
(13, 5, 'Trabajo al Curso de Ingles'),
(14, 5, 'Curso de ingles a San José'),
(15, 9, 'Mamá'),
(16, 10, 'Recarga'),
(17, 11, 'Recarga'),
(18, 5, 'San José a Cartago'),
(19, 12, 'Chicles'),
(20, 5, 'Cartago a Paraiso'),
(21, 13, 'Paraiso - San Jose'),
(22, 5, 'Tres Ríos - San José'),
(23, 5, 'Sabana - Trabajo'),
(24, 14, 'Empanada - frutas'),
(25, 13, 'Sabana - San José'),
(26, 15, 'Día del padre'),
(27, 13, 'San José - Paraíso'),
(28, 16, 'Purral san jose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayname` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05DF85E0677` (`username`),
  UNIQUE KEY `UNIQ_2265B05DE7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `displayname`, `username`, `salt`, `password`, `email`) VALUES
(1, 'Carlos Dominguez', 'c', ' ', 'c', 'krlosnando@gmail.com'),
(2, 'Yuliana Arias', 'y', ' ', 'y', 'yuli0192@hotmail.com'),
(3, 'Clifford Vado', 'cliff', ' ', 'cliff', 'cliff@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_categoria`
--

CREATE TABLE IF NOT EXISTS `usuario_categoria` (
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`categoria_id`),
  KEY `IDX_C72BF83FDB38439E` (`usuario_id`),
  KEY `IDX_C72BF83F3397707A` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_categoria`
--

INSERT INTO `usuario_categoria` (`usuario_id`, `categoria_id`) VALUES
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(2, 13),
(2, 14),
(2, 15),
(3, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_gastodetalle`
--

CREATE TABLE IF NOT EXISTS `usuario_gastodetalle` (
  `usuario_id` int(11) NOT NULL,
  `gastodetalle_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`gastodetalle_id`),
  KEY `IDX_18D232DEDB38439E` (`usuario_id`),
  KEY `IDX_18D232DE814F19DA` (`gastodetalle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_gastodetalle`
--

INSERT INTO `usuario_gastodetalle` (`usuario_id`, `gastodetalle_id`) VALUES
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 22),
(1, 23),
(2, 21),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(3, 28);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD CONSTRAINT `FK_AE43DA145F3D2E5E` FOREIGN KEY (`iddetalle`) REFERENCES `gastodetalle` (`id`),
  ADD CONSTRAINT `FK_AE43DA14FD61E233` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `gastodetalle`
--
ALTER TABLE `gastodetalle`
  ADD CONSTRAINT `FK_12EAB70B300BBBD8` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  ADD CONSTRAINT `FK_C72BF83F3397707A` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C72BF83FDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario_gastodetalle`
--
ALTER TABLE `usuario_gastodetalle`
  ADD CONSTRAINT `FK_18D232DE814F19DA` FOREIGN KEY (`gastodetalle_id`) REFERENCES `gastodetalle` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_18D232DEDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
