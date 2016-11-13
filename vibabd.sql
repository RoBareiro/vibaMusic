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
  `pais` int(100) DEFAULT NULL,
  `cantidad_playlist` int(255) DEFAULT NULL,
  `estado_activo` varchar(1) NOT NULL,
  `clave_momentanea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `rol`, `foto_de_perfil`, `latitud`, `longitud`, `pais`, `cantidad_playlist`, `estado_activo`, `clave_momentanea`) VALUES
(01, 'Rocío', 'Bareiro', 'bareiro.rsb@hotmail.com', 'rocio', '325daa03a34823cef2fc367c779561ba', 'admin', '', '', 0, 0, 0, '1', 'a0064ac145ee9f807f09e1cf06f22c32'),
(02, 'Rocío', 'Castañer', 'rncastaniervivas@hotmail.com.ar', 'rocho', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', 0, 0, 0, '1', '05a7ba2633a7056a74aef8038eb5bdac');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id_pais` varchar(3) NOT NULL,
  `pais` varchar(100) NOT NULL,
  PRIMARY KEY (`pais`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Paises`
--

INSERT INTO `pais` (`id_pais`, `pais`) VALUES
(1, 'Australia'),
(2, 'Austria'),
(3, 'Azerbaiyán'),
(4, 'Anguilla'),
(5, 'Argentina'),
(6, 'Armenia'),
(7, 'Bielorrusia'),
(8, 'Belice'),
(9, 'Bélgica'),
(10, 'Bermudas'),
(11, 'Bulgaria'),
(12, 'Brasil'),
(13, 'Reino Unido'),
(14, 'Hungría'),
(15, 'Vietnam'),
(16, 'Haiti'),
(17, 'Guadalupe'),
(18, 'Alemania'),
(19, 'Países Bajos, Holanda'),
(20, 'Grecia'),
(21, 'Georgia'),
(22, 'Dinamarca'),
(23, 'Egipto'),
(24, 'Israel'),
(25, 'India'),
(26, 'Irán'),
(27, 'Irlanda'),
(28, 'España'),
(29, 'Italia'),
(30, 'Kazajstán'),
(31, 'Camerún'),
(32, 'Canadá'),
(33, 'Chipre'),
(34, 'Kirguistán'),
(35, 'China'),
(36, 'Costa Rica'),
(37, 'Kuwait'),
(38, 'Letonia'),
(39, 'Libia'),
(40, 'Lituania'),
(41, 'Luxemburgo'),
(42, 'México'),
(43, 'Moldavia'),
(44, 'Mónaco'),
(45, 'Nueva Zelanda'),
(46, 'Noruega'),
(47, 'Polonia'),
(48, 'Portugal'),
(49, 'Reunión'),
(50, 'Rusia'),
(51, 'El Salvador'),
(52, 'Eslovaquia'),
(53, 'Eslovenia'),
(54, 'Surinam'),
(55, 'Estados Unidos'),
(56, 'Tadjikistan'),
(57, 'Turkmenistan'),
(58, 'Islas Turcas y Caicos'),
(59, 'Turquía'),
(60, 'Uganda'),
(61, 'Uzbekistán'),
(62, 'Ucrania'),
(63, 'Finlandia'),
(64, 'Francia'),
(65, 'República Checa'),
(66, 'Suiza'),
(67, 'Suecia'),
(68, 'Estonia'),
(69, 'Corea del Sur'),
(70, 'Japón'),
(71, 'Croacia'),
(72, 'Rumanía'),
(73, 'Hong Kong'),
(74, 'Indonesia'),
(75, 'Jordania'),
(76, 'Malasia'),
(77, 'Singapur'),
(78, 'Taiwan'),
(79, 'Bosnia y Herzegovina'),
(80, 'Bahamas'),
(81, 'Chile'),
(82, 'Colombia'),
(83, 'Islandia'),
(84, 'Corea del Norte'),
(85, 'Macedonia'),
(86, 'Malta'),
(87, 'Pakistán'),
(88, 'Papúa-Nueva Guinea'),
(89, 'Perú'),
(90, 'Filipinas'),
(91, 'Arabia Saudita'),
(92, 'Tailandia'),
(93, 'Emiratos árabes Unidos'),
(94, 'Groenlandia'),
(95, 'Venezuela'),
(96, 'Zimbabwe'),
(97, 'Kenia'),
(98, 'Algeria'),
(99, 'Líbano'),
(100, 'Botsuana'),
(101, 'Tanzania'),
(102, 'Namibia'),
(103, 'Ecuador'),
(104, 'Marruecos'),
(105, 'Ghana'),
(106, 'Siria'),
(107, 'Nepal'),
(108, 'Mauritania'),
(109, 'Seychelles'),
(110, 'Paraguay'),
(111, 'Uruguay'),
(112, 'Congo (Brazzaville)'),
(113, 'Cuba'),
(114, 'Albania'),
(115, 'Nigeria'),
(116, 'Zambia'),
(117, 'Mozambique'),
(119, 'Angola'),
(120, 'Sri Lanka'),
(121, 'Etiopía'),
(122, 'Túnez'),
(123, 'Bolivia'),
(124, 'Panamá'),
(125, 'Malawi'),
(126, 'Liechtenstein'),
(127, 'Bahrein'),
(128, 'Barbados'),
(130, 'Chad'),
(131, 'Man, Isla de'),
(132, 'Jamaica'),
(133, 'Malí'),
(134, 'Madagascar'),
(135, 'Senegal'),
(136, 'Togo'),
(137, 'Honduras'),
(138, 'República Dominicana'),
(139, 'Mongolia'),
(140, 'Irak'),
(141, 'Sudáfrica'),
(142, 'Aruba'),
(143, 'Gibraltar'),
(144, 'Afganistán'),
(145, 'Andorra'),
(147, 'Antigua y Barbuda'),
(149, 'Bangladesh'),
(151, 'Benín'),
(152, 'Bután'),
(154, 'Islas Virgenes Británicas'),
(155, 'Brunéi'),
(156, 'Burkina Faso'),
(157, 'Burundi'),
(158, 'Camboya'),
(159, 'Cabo Verde'),
(164, 'Comores'),
(165, 'Congo (Kinshasa)'),
(166, 'Cook, Islas'),
(168, 'Costa de Marfil'),
(169, 'Djibouti, Yibuti'),
(171, 'Timor Oriental'),
(172, 'Guinea Ecuatorial'),
(173, 'Eritrea'),
(175, 'Feroe, Islas'),
(176, 'Fiyi'),
(178, 'Polinesia Francesa'),
(180, 'Gabón'),
(181, 'Gambia'),
(184, 'Granada'),
(185, 'Guatemala'),
(186, 'Guernsey'),
(187, 'Guinea'),
(188, 'Guinea-Bissau'),
(189, 'Guyana'),
(193, 'Jersey'),
(195, 'Kiribati'),
(196, 'Laos'),
(197, 'Lesotho'),
(198, 'Liberia'),
(200, 'Maldivas'),
(201, 'Martinica'),
(202, 'Mauricio'),
(205, 'Myanmar'),
(206, 'Nauru'),
(207, 'Antillas Holandesas'),
(208, 'Nueva Caledonia'),
(209, 'Nicaragua'),
(210, 'Níger'),
(212, 'Norfolk Island'),
(213, 'Omán'),
(215, 'Isla Pitcairn'),
(216, 'Qatar'),
(217, 'Ruanda'),
(218, 'Santa Elena'),
(219, 'San Cristobal y Nevis'),
(220, 'Santa Lucía'),
(221, 'San Pedro y Miquelón'),
(222, 'San Vincente y Granadinas'),
(223, 'Samoa'),
(224, 'San Marino'),
(225, 'San Tomé y Príncipe'),
(226, 'Serbia y Montenegro'),
(227, 'Sierra Leona'),
(228, 'Islas Salomón'),
(229, 'Somalia'),
(232, 'Sudán'),
(234, 'Swazilandia'),
(235, 'Tokelau'),
(236, 'Tonga'),
(237, 'Trinidad y Tobago'),
(239, 'Tuvalu'),
(240, 'Vanuatu'),
(241, 'Wallis y Futuna'),
(242, 'Sáhara Occidental'),
(243, 'Yemen'),
(246, 'Puerto Rico');


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
