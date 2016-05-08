-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2016 a las 22:38:04
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `demousb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_llave`
--

CREATE TABLE IF NOT EXISTS `usuarios_llave` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Serial` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_llave`
--

INSERT INTO `usuarios_llave` (`ID`, `Nombre`, `Serial`) VALUES
(1, 'Rolando', '001BFC3653C4BDB189C14DE4'),
(2, 'Ricardo', 'AC220B280602BE70E99A936B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_pass`
--

CREATE TABLE IF NOT EXISTS `usuarios_pass` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_pass`
--

INSERT INTO `usuarios_pass` (`ID`, `Nombre`, `Email`, `Password`) VALUES
(1, 'Jorge', 'jorge@gmail.com', '123'),
(2, 'Mauricio', 'miaw@gmail.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios_llave`
--
ALTER TABLE `usuarios_llave`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios_pass`
--
ALTER TABLE `usuarios_pass`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios_llave`
--
ALTER TABLE `usuarios_llave`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios_pass`
--
ALTER TABLE `usuarios_pass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
