-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2016 a las 18:05:21
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vibabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banneado`
--

CREATE TABLE IF NOT EXISTS `banneado` (
  `id_banneado` int(11) NOT NULL,
  `id_denunciante` int(255) NOT NULL,
  `id_denunciado` int(255) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `fecha_denuncia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorita`
--

CREATE TABLE IF NOT EXISTS `favorita` (
  `id_favorita` int(11) NOT NULL,
  `id_playlist` int(255) NOT NULL,
  `fecha_favorita` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(100) NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_reproduccion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `codigo_qr` int(11) NOT NULL,
  `fecha_creacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist_cancion`
--

CREATE TABLE IF NOT EXISTS `playlist_cancion` (
  `id_cancion` int(255) NOT NULL,
  `id_playlist` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reproduccion`
--

CREATE TABLE IF NOT EXISTS `reproduccion` (
  `id_reproduccion` int(11) NOT NULL,
  `id_playlist` int(255) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue_a`
--

CREATE TABLE IF NOT EXISTS `sigue_a` (
  `id_seguimiento` int(255) NOT NULL COMMENT 'NOS FALTO AGREGAR ESTO',
  `id_seguidor` int(255) NOT NULL,
  `id_seguido` int(255) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(255) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `usuario` varchar(11) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `foto_de_perfil` varchar(100) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `localidad` int(20) DEFAULT NULL,
  `cantidad_playlist` int(255) DEFAULT NULL,
  `estado_activo` int(1) NOT NULL,
  `clave_momentanea` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `rol`, `foto_de_perfil`, `pais`, `localidad`, `cantidad_playlist`, `estado_activo`, `clave_momentanea`) VALUES
(27, 'RocÃ­o', 'Bareiro', 'rous_nc_712@hotmail.com', 'rocio', '325daa03a34823cef2fc367c779561ba', 'usuario', '', '', 0, 0, 0, 'bf7a5c46723b9ba4ae5cd28855e324f0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE IF NOT EXISTS `voto` (
  `id_voto` int(255) NOT NULL COMMENT 'AA???',
  `id_playlist` int(255) NOT NULL COMMENT 'AA???'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favorita`
--
ALTER TABLE `favorita`
  ADD PRIMARY KEY (`id_favorita`);

--
-- Indices de la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  ADD PRIMARY KEY (`id_reproduccion`);

--
-- Indices de la tabla `sigue_a`
--
ALTER TABLE `sigue_a`
  ADD PRIMARY KEY (`id_seguimiento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favorita`
--
ALTER TABLE `favorita`
  MODIFY `id_favorita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  MODIFY `id_reproduccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sigue_a`
--
ALTER TABLE `sigue_a`
  MODIFY `id_seguimiento` int(255) NOT NULL AUTO_INCREMENT COMMENT 'NOS FALTO AGREGAR ESTO';
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
