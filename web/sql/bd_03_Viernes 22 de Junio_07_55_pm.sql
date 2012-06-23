-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2012 a las 21:53:04
-- Versión del servidor: 5.1.63
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `zpfnlfqm_dbcdapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Estructura de tabla para la tabla `gastodetalle`
--

CREATE TABLE IF NOT EXISTS `gastodetalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_12EAB70B300BBBD8` (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `displayname`, `username`, `salt`, `password`, `email`) VALUES
(1, 'Carlos Dominguez', 'c', ' ', 'c', 'krlosnando@gmail.com'),
(2, 'Yuliana Arias', 'y', ' ', 'y', 'yuli0192@hotmail.com');

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
