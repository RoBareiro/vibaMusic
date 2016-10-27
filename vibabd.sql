-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 27-10-2016 a las 04:23:30
=======
-- Tiempo de generación: 25-10-2016 a las 20:54:44
>>>>>>> parent of b9fcee8... BD usuario con dos campos mas (estado_activo / clave_momentanea)
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
<<<<<<< HEAD
  `cantidad_playlist` int(255) DEFAULT NULL,
  `estado_activo` varchar(1) NOT NULL,
  `clave_momentanea` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
=======
  `cantidad_playlist` int(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
>>>>>>> parent of b9fcee8... BD usuario con dos campos mas (estado_activo / clave_momentanea)

--
-- Volcado de datos para la tabla `usuario`
--

<<<<<<< HEAD
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `rol`, `foto_de_perfil`, `pais`, `localidad`, `cantidad_playlist`, `estado_activo`, `clave_momentanea`) VALUES
(77, 'RocÃ­o', 'Bareiro', 'bareiro.rsb@hotmail.com', 'rocio', '325daa03a34823cef2fc367c779561ba', 'usuario', '', '', 0, 0, '1', 'a0064ac145ee9f807f09e1cf06f22c32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE IF NOT EXISTS `voto` (
  `id_voto` int(255) NOT NULL COMMENT 'AA???',
  `id_playlist` int(255) NOT NULL COMMENT 'AA???'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
=======
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `rol`, `foto_de_perfil`, `pais`, `localidad`, `cantidad_playlist`) VALUES
(1, 'Rocio', 'Bareiro', 'asdas@hotmaill.com', '0', 'd58e3582af', 'usuario', '', '', 0, 0),
(2, 'Roci', 'sdfsdf', 'rocio_la2287@hotmail.com', '4545', '4220aa6fda', 'usuario', '', '', 0, 0),
(3, 'Rocio', 'Bareiro', 'rocio_la2287@hotmail.com', '123123', '33e78d60bc', 'usuario', '', '', 0, 0),
(4, 'rocio', 'Bareiro', 'asdas@hotmaill.com', '657567', '6c0cbf5029', 'usuario', '', '', 0, 0),
(5, 'rwasdasd', 'werasdasd', 'rocio_la2287@hotmail.com', '453645', '7df605f8b8', 'usuario', '', '', 0, 0),
(6, 'dsadasdas', 'dasdasdasd', 'rocio_la2287@hotmail.com', 'asdasdasd', 'a3dcb4d229', 'usuario', '', '', 0, 0),
(7, 'camila', 'tarata', 'rocio_la2287@hotmail.com', 'asdqwe', 'e10adc3949', 'usuario', '', '', 0, 0),
(8, 'wqeqweqw', 'qweqweq', 'rocio_la2287@hotmail.com', 'sdfsdfsdf', '8c71fb3f75', 'usuario', '', '', 0, 0),
(9, 'Rocio', 'Bareiro', 'rocio_la2287@hotmail.com', 'ro_7', '22a4d9b04f', 'usuario', '', '', 0, 0),
(10, 'rocio', 'bareiro', 'rocio_la2287@hotmail.com', 'rocio712', 'fae6845f7a', 'usuario', '', '', 0, 0),
(11, 'rocio', 'rocio', 'rocio_la2287@hotmail.com', 'rocio', '325daa03a3', 'usuario', '', '', 0, 0);
>>>>>>> parent of b9fcee8... BD usuario con dos campos mas (estado_activo / clave_momentanea)

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
<<<<<<< HEAD
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
=======
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
>>>>>>> parent of b9fcee8... BD usuario con dos campos mas (estado_activo / clave_momentanea)
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
