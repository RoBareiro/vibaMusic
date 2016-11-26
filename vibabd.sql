-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2016 a las 01:57:31
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
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE IF NOT EXISTS `artista` (
  `idArtista` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`idArtista`, `nombre`) VALUES
(1, 'Ariana Grande'),
(2, 'Rihanna'),
(3, 'Nick Jonas'),
(4, 'Shakira'),
(5, 'Drake'),
(6, 'The Weeknd'),
(7, 'J Balvin'),
(8, 'DNCE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banneado`
--

CREATE TABLE IF NOT EXISTS `banneado` (
  `id_banneado` int(11) NOT NULL,
  `id_denunciado` int(255) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `fecha_banneo` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banneado`
--

INSERT INTO `banneado` (`id_banneado`, `id_denunciado`, `motivo`, `fecha_banneo`) VALUES
(1, 25, 'prueba\r\n', '16-11-15'),
(2, 23, 'Material Inapropiado', '16-11-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE IF NOT EXISTS `cancion` (
  `idCancion` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `idArtista` int(11) NOT NULL,
  `album` varchar(50) COLLATE utf8_bin NOT NULL,
  `duracion` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_genero` int(11) NOT NULL,
  `archivo` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`idCancion`, `titulo`, `idArtista`, `album`, `duracion`, `id_genero`, `archivo`) VALUES
(1, 'Greedy', 1, 'Dangerous Woman', '3:35', 1, 'http://localhost/vibaMusic/uploads/Greedy.mp3'),
(2, 'Kiss It Better', 2, 'ANTI', '4:13', 3, 'http://localhost/vibaMusic/uploads/Kiss It Better.mp3'),
(3, 'Bacon', 3, 'Last Year Was Complicated', '3:02', 1, 'http://localhost/vibaMusic/uploads/Bacon.mp3'),
(4, 'Chantaje', 4, 'Chantaje Single', '3:16', 6, 'http://localhost/vibaMusic/uploads/Chantaje.mp3'),
(5, 'Hotline Bling', 5, 'Views', '4:27', 3, 'http://localhost/vibaMusic/uploads/Hotline Bling.mp3'),
(6, 'Safari', 7, 'Energía', '3:24', 6, 'http://localhost/vibaMusic/uploads/Safari.mp3'),
(7, 'Starboy', 6, 'Starboy Single', '3:50', 9, 'http://localhost/vibaMusic/uploads/Starboy.mp3'),
(8, 'Body Moves', 8, 'DNCE', '3:56', 1, 'http://localhost/vibaMusic/uploads/Body Moves.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorita`
--

CREATE TABLE IF NOT EXISTS `favorita` (
  `id_favorita` int(11) NOT NULL,
  `id_playlist` int(255) NOT NULL,
  `fecha_favorita` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(100) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'R&B'),
(4, 'Rap'),
(5, 'Hip-Hop'),
(6, 'Reaggeton'),
(7, 'Reagge'),
(8, 'Balada'),
(9, 'Electro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_reproduccion` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `codigo_qr` int(100) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `imagen` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `id_usuario`, `id_genero`, `id_reproduccion`, `nombre`, `codigo_qr`, `fecha_creacion`, `imagen`, `link`, `tipo`) VALUES
(88, 24, 5, 0, 'Para Coreo', 0, '2016-11-25', '../imgPlaylist/907319hiphop.jpeg', 'NULL', 'publica'),
(89, 24, 1, 0, 'Lentos', 0, '2016-11-25', '../imgPlaylist/824341lentos.jpg', 'NULL', 'publica'),
(90, 24, 1, 0, 'Pop', 0, '2016-11-25', '../imgPlaylist/667389pop1.jpg', 'NULL', 'publica'),
(91, 24, 6, 0, 'Reggaeton', 0, '2016-11-25', '../imgPlaylist/544006playlist.jpg', 'NULL', 'publica'),
(92, 26, 9, 0, 'TaLadrando', 0, '2016-11-25', '../imgPlaylist/985260seSaleFuerte1.jpg', 'NULL', 'misSeguidores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist_cancion`
--

CREATE TABLE IF NOT EXISTS `playlist_cancion` (
  `id_cancion` int(255) NOT NULL,
  `id_playlist` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `playlist_cancion`
--

INSERT INTO `playlist_cancion` (`id_cancion`, `id_playlist`) VALUES
(1, 88),
(5, 88),
(3, 88),
(5, 89),
(2, 89),
(1, 90),
(8, 90),
(7, 90),
(6, 91),
(4, 91),
(8, 92),
(7, 92);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reproduccion`
--

CREATE TABLE IF NOT EXISTS `reproduccion` (
  `id_reproduccion` int(11) NOT NULL,
  `id_playlist` int(255) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue_a`
--

CREATE TABLE IF NOT EXISTS `sigue_a` (
  `id_seguimiento` int(255) NOT NULL COMMENT 'NOS FALTO AGREGAR ESTO',
  `id_seguidor` int(255) NOT NULL,
  `id_seguido` int(255) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `id_playlist` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sigue_a`
--

INSERT INTO `sigue_a` (`id_seguimiento`, `id_seguidor`, `id_seguido`, `estado`, `id_playlist`) VALUES
(43, 26, 24, 'sigue', 88),
(44, 26, 24, 'sigue', 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(255) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(11) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `foto_de_perfil` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `cantidad_playlist` int(255) DEFAULT NULL,
  `estado_activo` varchar(1) NOT NULL,
  `clave_momentanea` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `rol`, `foto_de_perfil`, `pais`, `cantidad_playlist`, `estado_activo`, `clave_momentanea`) VALUES
(1, 'Rocío', 'Bareiro', 'bareiro.rsb@hotmail.com', 'rocio', '325daa03a34823cef2fc367c779561ba', 'admin', '../imgPerfil/338043breaking_bad__jesse_pinkman__by_fiikii-d8prnhz.jpg', 'Argentina', 0, '1', 'a0064ac145ee9f807f09e1cf06f22c32'),
(2, 'Rocío', 'Castañer', 'rncastaniervivas@hotmail.com.ar', 'rocho', '21232f297a57a5a743894a0e4a801fc3', 'admin', '../imgPerfil/breaking_bad__heisenberg__by_fiikii-d8prnb4.jpg', 'Argentina', 0, '1', '05a7ba2633a7056a74aef8038eb5bdac'),
(23, 'Morita', 'Castañer', 'rocio_la2287@hotmail.com', 'morita', 'f8032d5cae3de20fcec887f395ec9a6a', 'usuario', '../imgPerfil/655884IMG-20160910-WA0003.jpg', 'Argentina', 0, '1', 'c2418619f445f5405aa4f5b4837efea8'),
(24, 'Jake', 'Kodish', 'rous_nc_712@hotmail.com', 'jake', '1200cf8ad328a60559cf5e7c5f46ee6d', 'usuario', '../imgPerfil/659912tumblr_inline_ntly73H11h1ttabe2_500.jpg', 'Estados Unidos', 0, '1', 'bf7a5c46723b9ba4ae5cd28855e324f0'),
(25, 'Soledad', 'Miño', 'bareiro.rsb@gmail.com', 'sole', 'beb7f7a395dc21ad97425bbc061afbaf', 'usuario', '../imgPerfil/61453320150430_174828.jpg', 'Brasil', 0, '1', '7ee08ce728cdf9aefd6e80fe3c825e17'),
(26, 'Olivia', 'Milo', 'rsb.bareiro@live.com.ar', 'milo', '4bbe97464db8b8665411740d5c2a5e4a', 'usuario', '../imgPerfil/691712IMG_20160603_135153.jpg', 'Uruguay', 0, '1', 'f27d4998e8222424384a9c580acbe6eb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE IF NOT EXISTS `voto` (
  `id_voto` int(255) NOT NULL COMMENT 'AA???',
  `id_playlist` int(255) NOT NULL COMMENT 'AA???'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`idArtista`);

--
-- Indices de la tabla `banneado`
--
ALTER TABLE `banneado`
  ADD PRIMARY KEY (`id_banneado`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`idCancion`);

--
-- Indices de la tabla `favorita`
--
ALTER TABLE `favorita`
  ADD PRIMARY KEY (`id_favorita`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`);

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
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `idArtista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `banneado`
--
ALTER TABLE `banneado`
  MODIFY `id_banneado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `idCancion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `favorita`
--
ALTER TABLE `favorita`
  MODIFY `id_favorita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT de la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  MODIFY `id_reproduccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sigue_a`
--
ALTER TABLE `sigue_a`
  MODIFY `id_seguimiento` int(255) NOT NULL AUTO_INCREMENT COMMENT 'NOS FALTO AGREGAR ESTO',AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
