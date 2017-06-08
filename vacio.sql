CREATE TABLE `alerta` (
  `id_alerta` int(4) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


CREATE TABLE `camiseta_equipo` (
  `id_camiseta` int(5) NOT NULL DEFAULT '0',
  `id_equipo` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `equipo` (
  `id_equipo` int(5) NOT NULL,
  `club_seleccion` varchar(50) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `continente` varchar(200) DEFAULT NULL,
  `imagen_equipo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `usuario` (
  `id_user` int(3) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL,
  `mail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `alerta`
  ADD PRIMARY KEY (`id_alerta`),
  ADD KEY `id_equipo` (`id_equipo`);


ALTER TABLE `camiseta`
  ADD PRIMARY KEY (`id_camiseta`);


ALTER TABLE `camiseta_equipo`
  ADD PRIMARY KEY (`id_camiseta`,`id_equipo`),
  ADD KEY `id_equipo` (`id_equipo`);

ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `alerta`
  MODIFY `id_alerta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `camiseta`
  MODIFY `id_camiseta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

ALTER TABLE `equipo`
  MODIFY `id_equipo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `usuario`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `alerta`
  ADD CONSTRAINT `alerta_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);

ALTER TABLE `camiseta_equipo`
  ADD CONSTRAINT `camiseta_equipo_ibfk_1` FOREIGN KEY (`id_camiseta`) REFERENCES `camiseta` (`id_camiseta`),
  ADD CONSTRAINT `camiseta_equipo_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);
