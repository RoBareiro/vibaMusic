-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2016 a las 17:39:46
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

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

CREATE TABLE `banneado` (
  `id_banneado` int(11) NOT NULL,
  `id_denunciante` int(255) NOT NULL,
  `id_denunciado` int(255) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `fecha_denuncia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorita`
--

CREATE TABLE `favorita` (
  `id_favorita` int(11) NOT NULL,
  `id_playlist` int(255) NOT NULL,
  `fecha_favorita` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(100) NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_reproduccion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `codigo_qr` int(11) NOT NULL,
  `fecha_creacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist_cancion`
--

CREATE TABLE `playlist_cancion` (
  `id_cancion` int(255) NOT NULL,
  `id_playlist` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reproduccion`
--

CREATE TABLE `reproduccion` (
  `id_reproduccion` int(11) NOT NULL,
  `id_playlist` int(255) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue_a`
--

CREATE TABLE `sigue_a` (
  `id_seguimiento` int(255) NOT NULL COMMENT 'NOS FALTO AGREGAR ESTO',
  `id_seguidor` int(255) NOT NULL,
  `id_seguido` int(255) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(255) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(11) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `foto_de_perfil` varchar(100) DEFAULT NULL,
  `latitud` varchar(100) DEFAULT NULL,
  `longitud` int(100) DEFAULT NULL,
  `cantidad_playlist` int(255) DEFAULT NULL,
  `estado_activo` varchar(1) NOT NULL,
  `clave_momentanea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `rol`, `foto_de_perfil`, `latitud`, `longitud`, `cantidad_playlist`, `estado_activo`, `clave_momentanea`) VALUES
(01, 'Rocío', 'Bareiro', 'bareiro.rsb@hotmail.com', 'rocio', '325daa03a34823cef2fc367c779561ba', 'admin', '', '', 0, 0, '1', 'a0064ac145ee9f807f09e1cf06f22c32'),
(02, 'Rocío', 'Castañer', 'rncastaniervivas@hotmail.com.ar', 'rocho', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', 0, 0, '1', '05a7ba2633a7056a74aef8038eb5bdac');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE `voto` (
  `id_voto` int(255) NOT NULL COMMENT 'AA???',
  `id_playlist` int(255) NOT NULL COMMENT 'AA???'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=03;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
