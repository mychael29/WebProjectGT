-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2017 a las 17:02:10
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `v1_golterra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

CREATE TABLE `canchas` (
  `idcancha_` int(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `afiliacion` varchar(100) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `propietario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenadas_canchas`
--

CREATE TABLE `coordenadas_canchas` (
  `idcancha_` int(9) NOT NULL,
  `cancha_long` int(200) NOT NULL,
  `cancha_lat` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_item`
--

CREATE TABLE `evento_item` (
  `ideventoitem_` int(9) NOT NULL,
  `date_time` datetime(6) NOT NULL,
  `cancha` varchar(200) NOT NULL,
  `modalidad` varchar(100) NOT NULL,
  `vigencia` datetime(6) NOT NULL,
  `actividad` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_afiliacion_cancha`
--

CREATE TABLE `user_afiliacion_cancha` (
  `idusercancha_` int(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `cancha` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser_` int(9) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`iduser_`, `username`, `email`, `password`, `photo`, `nombres`, `region`) VALUES
(1, 'admin', 'admin@golterra.com', 'admin', NULL, NULL, NULL),
(2, 'mychael29 ', 'mychael29@hotmail.com ', 'mychael29', NULL, 'Maycol Meza Roque', NULL),
(78, NULL, 'fate@konichiwai.pe', 'grfsdsd', 'image_profile/Fate Stay Night.jpg', 'Fate Stay Night', NULL),
(79, NULL, 'zero@fate.jp', 'aaaaa', 'image_profile/Fate Zero.jpg', 'Fate Zero', NULL),
(93, NULL, 'mychael29@gmail.com', 'resident', 'image_profile/Maycol Meza Roque.jpg', 'Maycol Meza Roque', NULL),
(94, NULL, 'rinasuzuki@android.jp', 'admin', 'image_profile/Rina Suzuki.jpg', 'Rina Suzuki', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canchas`
--
ALTER TABLE `canchas`
  ADD PRIMARY KEY (`idcancha_`);

--
-- Indices de la tabla `evento_item`
--
ALTER TABLE `evento_item`
  ADD PRIMARY KEY (`ideventoitem_`);

--
-- Indices de la tabla `user_afiliacion_cancha`
--
ALTER TABLE `user_afiliacion_cancha`
  ADD PRIMARY KEY (`idusercancha_`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser_`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canchas`
--
ALTER TABLE `canchas`
  MODIFY `idcancha_` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evento_item`
--
ALTER TABLE `evento_item`
  MODIFY `ideventoitem_` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user_afiliacion_cancha`
--
ALTER TABLE `user_afiliacion_cancha`
  MODIFY `idusercancha_` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser_` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
