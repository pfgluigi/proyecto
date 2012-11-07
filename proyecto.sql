-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-11-2012 a las 19:31:57
-- Versión del servidor: 5.5.22
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) NOT NULL,
  `frec` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `type` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `priority` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `associated_admin` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `title` varchar(41) COLLATE latin1_spanish_ci NOT NULL,
  `bugtext` varchar(251) COLLATE latin1_spanish_ci NOT NULL,
  `steps` varchar(251) COLLATE latin1_spanish_ci NOT NULL,
  `img1` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `img2` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `img3` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `frec`, `type`, `priority`, `associated_admin`, `title`, `bugtext`, `steps`, `img1`, `img2`, `img3`) VALUES
(1, 3, 'aleatorio', 'menor', 'baja', 'admin', 'Prueba', 'Esto es un ticket de prueba', 'Si, Es de prueba', 'minecraft.jpg', 'chromeinstall-7u7.exe', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `pass` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  `rank` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `rank`) VALUES
(2, 'admin', 'admin', 'pablofornes@gmail.com', 1),
(3, 'pablo', 'pablo123', 'pablofornes@outlook.com', 0),
(4, 'yolanda', 'yolanda', 'yomogan@gmail.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
