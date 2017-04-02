-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-03-2017 a las 11:46:15
-- Versión del servidor: 5.6.33
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `camisetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `id_alerta` int(4) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`id_alerta`, `id_equipo`, `mail`) VALUES
(1, 6, 'rot2@gamil.com'),
(4, 4, 'mailfalso123'),
(11, 0, 'asdf@sadf'),
(12, 2, 'asfda@asdf'),
(13, 20, 'dani@paco'),
(15, 2, 'dani@asir.petao'),
(16, 21, 'sergio@camas'),
(17, 19, 'fran@oli');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiseta`
--

CREATE TABLE `camiseta` (
  `id_camiseta` int(5) NOT NULL,
  `jugador` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dorsal` int(3) DEFAULT NULL,
  `marca` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `publicidad` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `temporada` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `competicion` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `imagen` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `camiseta`
--

INSERT INTO `camiseta` (`id_camiseta`, `jugador`, `dorsal`, `marca`, `publicidad`, `temporada`, `competicion`, `imagen`, `observaciones`) VALUES
(1, '', NULL, 'joma', '', '2001-02', 'liga_española', 'img/sevilla_1.jpg', 'blanca'),
(2, '', NULL, 'joma', '', '2001-02', 'liga_española', 'img/sevilla_2.jpg', 'azul'),
(3, '', NULL, 'joma', '', '2001-02', 'liga_española', 'img/sevilla_3.jpg', 'portero, autografo notario'),
(4, 'julio_baptista', 10, '', '', '2004-05', 'liga_española', 'img/sevilla_4_julio_baptista_10.jpg', ''),
(5, '', NULL, 'adidas', 'abn_amro', '2001-02', 'liga_holandesa', 'img/ajax_2.jpg', ''),
(6, '', NULL, '', 'abn_amro', '2004-05', 'liga_holandesa', 'img/ajax_3.jpg', ''),
(7, 'dani', 11, 'umbro', 'alpine', '2002-03', 'liga_española', 'img/alaves_1_dani_11.jpg', ''),
(8, 'schweinsteiger', 7, 'adidas', '', '2008', 'eurocopa_2008', 'img/alemania_1_schweinsteiger_7.jpg', ''),
(9, 'muller', 13, 'adidas', '', '2010', 'mundial_2010', 'img/alemania_2_muller_13.jpg', ''),
(10, 'aimar', 16, 'adidas', '', '2002', 'mundial_2002', 'img/argentina_1_aimar_16.jpg', ''),
(11, '', NULL, 'adidas', '', '2009-10', 'mundial_2010_clasificacion', 'img/argentina_3.jpg', ''),
(12, '', NULL, 'hummel', '', '2009-10', 'mundial_2010_clasificacion', 'img/armenia.jpg', ''),
(13, 'henry', 14, '', 'o2', '2004-05', 'liga_inglesa', 'img/arsenal_3_henry_14.jpg', ''),
(14, '', NULL, 'nike', 'o2', '2004-05', 'liga_inglesa', 'img/arsenal_4.jpg', ''),
(15, '', NULL, 'nike', '32red.com', '2007-08', 'liga_inglesa', 'img/aston_villa_1.jpg', ''),
(16, '', NULL, 'reebok', '', '1999-00', 'liga_española', 'img/atletico_madrid_1.jpg', ''),
(17, '', NULL, 'nike', '', '2002-03', 'liga_española', 'img/barcelona_1.jpg', ''),
(18, 'dani_alves', 20, 'nike', 'unicef', '2008-09', 'liga_española', 'img/barcelona_3_dani_alves_ 20.jpg', 'sextete'),
(19, 'ibrahimovic', 9, 'nike', 'unicef', '2009-10', 'liga_española', 'img/barcelona_4_ibrahimovic_9.jpg', 'tv3'),
(20, 'messi', 10, 'nike', 'unicef', '2010-11', 'liga_española', 'img/barcelona_5_messi_10.jpg', 'campeon_clubes'),
(21, '', NULL, 'errea', '', '2010-11', 'liga_italiana', 'img/bari.jpg', ''),
(22, '', NULL, '', 'rwe', '2004-06', 'liga_alemana', 'img/bayer_leverkusen_1.jpg', ''),
(23, '', NULL, 'adidas', 't_com', '2004-05', 'liga_alemana', 'img/bayern_munich_1.jpg', ''),
(24, '', NULL, 'adidas', 'vodafone', '2004-05', 'liga_portuguesa', 'img/benfica_1.gif', 'centenario'),
(25, '', NULL, 'adidas', 'vodafone', '2004-05', 'liga_portuguesa', 'img/benfica_2.gif', 'centenario'),
(26, 'holosko', 23, 'umbro', 'cola_turka', '2008-09', 'liga_turca', 'img/besiktas_1_holosko_23.jpg', 'avea'),
(27, '', NULL, 'kappa', 'el_monte', '2005', 'copa_del_rey_2004-05', 'img/betis_1.jpg', 'final_copa_rey'),
(28, '', NULL, 'nike', 'pepsi', '2003-04', 'liga_argentina', 'img/boca_juniors_1.jpg', ''),
(29, '', NULL, 'nike', 'megatone', '2008-09', 'liga_argentina', 'img/boca_juniors_2.jpg', ''),
(30, '', NULL, 'reebok', 'rbk', '2006-07', 'liga_inglesa', 'img/bolton_wanderers_1.jpg', ''),
(31, '', NULL, 'nike', 'e_on', '2004-05', 'liga_alemana', 'img/borussia_dortmund_1.jpg', ''),
(32, 'ronaldinho', 10, 'nike', '', '2004', 'copa_america_2004', 'img/brasil_1_ronaldinho_10.jpg', ''),
(33, 'neymar', 11, 'nike', '', '2011', 'copa_america_2011', 'img/brasil_2_neymar_11.jpg', ''),
(34, '', NULL, 'puma', '', '2004', 'eurocopa_2004', 'img/bulgaria_1.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiseta_equipo`
--

CREATE TABLE `camiseta_equipo` (
  `id_camiseta` int(5) NOT NULL DEFAULT '0',
  `id_equipo` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camiseta_equipo`
--

INSERT INTO `camiseta_equipo` (`id_camiseta`, `id_equipo`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 3),
(8, 4),
(9, 4),
(10, 5),
(11, 5),
(12, 6),
(13, 7),
(14, 7),
(15, 8),
(16, 9),
(17, 10),
(18, 10),
(19, 10),
(20, 10),
(21, 11),
(22, 12),
(23, 13),
(24, 14),
(25, 14),
(26, 15),
(27, 16),
(28, 17),
(29, 17),
(30, 18),
(31, 19),
(32, 20),
(33, 20),
(34, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(5) NOT NULL,
  `club_seleccion` varchar(50) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `continente` varchar(200) DEFAULT NULL,
  `imagen_equipo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `club_seleccion`, `nombre`, `pais`, `continente`, `imagen_equipo`) VALUES
(1, 'club', 'sevilla_fc', 'españa', 'europa', 'img/escudo_sevilla1.png'),
(2, 'club', 'ajax', 'holanda', 'europa', 'img/escudo_ajax1.png'),
(3, 'club', 'alaves', 'españa', 'europa', 'img/escudo_alaves1.png'),
(4, 'seleccion', 'alemania', 'alemania', 'europa', 'img/escudo_alemania1.png'),
(5, 'seleccion', 'argentina', 'argentina', 'america_del_sur', 'img/escudo_argentina1.png'),
(6, 'seleccion', 'armenia', 'armenia', 'europa', 'img/escudo_armenia1.png'),
(7, 'club', 'arsenal_fc', 'inglaterra', 'europa', 'img/escudo_arsenal1.png'),
(8, 'club', 'aston_villa', 'inglaterra', 'europa', 'img/escudo_aston_villa1.png'),
(9, 'club', 'atletico_madrid', 'españa', 'europa', 'img/escudo_atletico_madrid1.png'),
(10, 'club', 'barcelona', 'españa', 'europa', 'img/escudo_barcelona1.png'),
(11, 'club', 'as_bari', 'italia', 'europa', 'img/escudo_bari1.png'),
(12, 'club', 'bayer_leverkusen', 'alemania', 'europa', 'img/escudo_bayer_leverkusen1.png'),
(13, 'club', 'bayern_munich', 'alemania', 'europa', 'img/escudo_bayern_munich1.png'),
(14, 'club', 'benfica', 'portugal', 'europa', 'img/escudo_benfica1.png'),
(15, 'club', 'besiktas', 'turquia', 'europa', 'img/escudo_besiktas1.jpg'),
(16, 'club', 'real_betis', 'españa', 'europa', 'img/escudo_betis1.png'),
(17, 'club', 'boca_juniors', 'argentina', 'america_del_sur', 'img/escudo_boca_juniors1.png'),
(18, 'club', 'bolton_wanderers', 'inglaterra', 'europa', 'img/escudo_bolton1.png'),
(19, 'club', 'borussia_dortmund', 'alemania', 'europa', 'img/escudo_borussia_dortmund1.png'),
(20, 'seleccion', 'brasil', 'brasil', 'america_del_sur', 'img/escudo_brasil1.png'),
(21, 'seleccion', 'bulgaria', 'bulgaria', 'europa', 'img/escudo_bulgaria1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(3) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL,
  `mail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `user`, `password`, `mail`) VALUES
(1, 'dani', 'e10adc3949ba59abbe56e057f20f883e', 'dani@dani.com'),
(2, 'paco', 'e10adc3949ba59abbe56e057f20f883e', 'paco@fritos'),
(7, 'jesus', 'e10adc3949ba59abbe56e057f20f883e', 'gsus@365'),
(8, 'fran', 'e10adc3949ba59abbe56e057f20f883e', ''),
(10, 'felipe', 'e10adc3949ba59abbe56e057f20f883e', ''),
(11, 'sergio', 'e10adc3949ba59abbe56e057f20f883e', 'dani@petao');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`id_alerta`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `camiseta`
--
ALTER TABLE `camiseta`
  ADD PRIMARY KEY (`id_camiseta`);

--
-- Indices de la tabla `camiseta_equipo`
--
ALTER TABLE `camiseta_equipo`
  ADD PRIMARY KEY (`id_camiseta`,`id_equipo`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `id_alerta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `camiseta`
--
ALTER TABLE `camiseta`
  MODIFY `id_camiseta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD CONSTRAINT `alerta_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);

--
-- Filtros para la tabla `camiseta_equipo`
--
ALTER TABLE `camiseta_equipo`
  ADD CONSTRAINT `camiseta_equipo_ibfk_1` FOREIGN KEY (`id_camiseta`) REFERENCES `camiseta` (`id_camiseta`),
  ADD CONSTRAINT `camiseta_equipo_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
