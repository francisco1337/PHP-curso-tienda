
CREATE TABLE `Usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ApPat` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ApMat` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Genero` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `FechaNac` date NOT NULL,
  `Telefono` decimal(10,0) NOT NULL,
  `Email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `NoTarjeta` int(16) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `Ciudad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Fraccionamiento` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Calle` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NumExt` tinyint(5) DEFAULT NULL,
  `NumInt` tinyint(3) DEFAULT NULL,
  `CodP` mediumint(5) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;