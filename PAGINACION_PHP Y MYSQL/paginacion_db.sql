-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2015 a las 22:28:05
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `paginacion_db`
--
CREATE DATABASE IF NOT EXISTS `paginacion_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `paginacion_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE IF NOT EXISTS `seguidores` (
  `cod_seguidor` int(11) NOT NULL AUTO_INCREMENT,
  `nom_seguidor` varchar(20) NOT NULL,
  `ape_seguidor` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_seguidor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `seguidores`
--

INSERT INTO `seguidores` (`cod_seguidor`, `nom_seguidor`, `ape_seguidor`) VALUES
(1, 'santy', 'moreno'),
(2, 'jesus', 'salatiel'),
(3, 'fraanck', 'saavedra'),
(4, 'Miguelito', 'sanz'),
(5, 'manuel', 'hernandez'),
(6, 'yudith synthia', 'salvatierra'),
(7, 'Andreli', 'Quilca'),
(8, 'andres', 'castillo'),
(9, 'faby', 'herlopp'),
(10, 'cesar', 'rojas'),
(11, 'mary', 'zarate'),
(12, 'daniel', 'vasquez'),
(13, 'ramses', 'sanchez'),
(14, 'andrew', 'varela'),
(15, 'katts', 'miller mor'),
(16, 'jose', 'cruz solar'),
(17, 'ricardo', 'barrios'),
(18, 'nieves', 'edgar'),
(19, 'gerardo', 'barrios'),
(20, 'dyana', 'alvarez');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
