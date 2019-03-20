-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2019 a las 17:09:45
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `multicines`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `idAsiento` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL,
  `letra` varchar(5) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butaca`
--

CREATE TABLE `butaca` (
  `idButaca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(450) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costobutaca`
--

CREATE TABLE `costobutaca` (
  `idCosto` int(11) NOT NULL,
  `idButaca` int(11) NOT NULL,
  `idTarifa` int(11) NOT NULL,
  `idFuncion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `idDistrib` int(11) NOT NULL,
  `nombreDis` varchar(250) NOT NULL,
  `direccionDis` varchar(250) NOT NULL,
  `localidadDis` varchar(200) NOT NULL,
  `nit` varchar(200) NOT NULL,
  `telefonoDis` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `responsable` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`idDistrib`, `nombreDis`, `direccionDis`, `localidadDis`, `nit`, `telefonoDis`, `email`, `responsable`) VALUES
(1, 'sony', 'aaa', 'm', '454', NULL, NULL, '0'),
(2, 'universal', 'nnnn', 'ddddd', '4545545', '3333', NULL, '0'),
(3, 'distrib', 'aaa', 'lk', '3333', '', '', ''),
(4, 'distrib', 'aaa', 'lk', '3333', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosificacion`
--

CREATE TABLE `dosificacion` (
  `idDosif` int(11) NOT NULL,
  `nroTramite` bigint(20) NOT NULL,
  `nroAutorizacion` bigint(20) NOT NULL,
  `nroFactIni` bigint(20) NOT NULL,
  `llaveDosif` varchar(450) NOT NULL,
  `fechaDesde` datetime NOT NULL,
  `fechaHasta` datetime NOT NULL,
  `leyenda` varchar(1000) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dosificacion`
--

INSERT INTO `dosificacion` (`idDosif`, `nroTramite`, `nroAutorizacion`, `nroFactIni`, `llaveDosif`, `fechaDesde`, `fechaHasta`, `leyenda`, `activo`) VALUES
(1, 123456, 77888888, 1, 'ss4s4s4', '2019-03-12 00:00:00', '2019-03-13 00:00:00', 'ass', 0),
(3, 1235553, 778888880, 1, 'ss4s4s4', '2019-03-12 00:00:00', '2019-03-13 00:00:00', 'ass', 0),
(5, 55555, 666, 7777, 'dfdfdfdf', '2019-03-14 00:00:00', '2019-03-28 00:00:00', 'ddd', 1),
(10, 555554, 666, 7777, 'dfdfdfdf', '2019-03-14 00:00:00', '2019-03-28 00:00:00', 'ddd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `codigo` varchar(200) NOT NULL,
  `razonSocial` varchar(200) DEFAULT NULL,
  `nombreFant` varchar(200) DEFAULT NULL,
  `nombreSuc` varchar(200) DEFAULT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `localidad` varchar(200) DEFAULT NULL,
  `ci_nit` varchar(100) DEFAULT NULL,
  `ingresoBruto` varchar(200) DEFAULT NULL,
  `agenciaAfip` int(11) DEFAULT NULL,
  `urlDominio` varchar(200) DEFAULT NULL,
  `fidelizacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `codigo`, `razonSocial`, `nombreFant`, `nombreSuc`, `telefono`, `direccion`, `localidad`, `ci_nit`, `ingresoBruto`, `agenciaAfip`, `urlDominio`, `fidelizacion`) VALUES
(22, '600970', 'MULTISALAS SRL.', 'Multisalas', NULL, '5454', '', '', '', NULL, NULL, NULL, 'Ninguno'),
(23, '1010', 'comesmo fulanito', 'nom', NULL, '526451', 'b', 'dsad', '', NULL, NULL, NULL, 'Siempre'),
(24, '1010', 'comesmo fulanito', 'prueba2', NULL, '526451', 'a', 'dsad', '', NULL, NULL, NULL, 'Siempre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `idFuncion` int(11) NOT NULL,
  `fechaFunc` date NOT NULL,
  `horaFunc` time NOT NULL,
  `subtitulada` tinyint(1) NOT NULL,
  `numerada` tinyint(1) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `nroFuncion` int(11) NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `fechaAlta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idPelicula` int(11) NOT NULL,
  `codigoIncaa` varchar(200) NOT NULL,
  `codUltracine` varchar(200) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `duracion` int(11) NOT NULL,
  `paisOrigen` varchar(250) NOT NULL,
  `genero` varchar(250) NOT NULL,
  `acuerdoAgent` tinyint(1) NOT NULL,
  `cartelera` tinyint(1) NOT NULL,
  `formato` tinyint(1) NOT NULL,
  `sipnosis` text NOT NULL,
  `urlTrailer` int(11) NOT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `fechaCr` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaMod` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idDistrib` int(11) NOT NULL,
  `clasificacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `codigoIncaa`, `codUltracine`, `nombre`, `duracion`, `paisOrigen`, `genero`, `acuerdoAgent`, `cartelera`, `formato`, `sipnosis`, `urlTrailer`, `imagen`, `fechaCr`, `fechaMod`, `idDistrib`, `clasificacion`) VALUES
(1, '0', '0', 'aaa', 768, 'oruro', 'Accion', 1, 0, 0, '', 0, NULL, '2019-03-15 11:18:43', '2019-03-15 11:18:43', 1, ''),
(2, '0', '0', 'fds', 3, 'sdf', 'Accion', 1, 0, 0, '', 0, NULL, '2019-03-15 11:30:33', '2019-03-15 11:30:33', 1, ''),
(3, '0', '0', 'fds', 3, 'sdf', 'Accion', 1, 1, 1, '', 0, NULL, '2019-03-15 11:34:25', '2019-03-15 11:34:25', 1, ''),
(4, '0', '0', 'vcvc', 3535, 'eew', 'Accion', 1, 0, 0, '', 0, NULL, '2019-03-15 11:34:40', '2019-03-15 11:34:40', 1, ''),
(5, '0', '0', 'saf', 34, 'asd', 'Accion', 0, 0, 1, '', 0, NULL, '2019-03-15 11:35:25', '2019-03-15 11:35:25', 1, ''),
(6, '0', '0', 'saf', 34, 'asd', 'Accion', 0, 0, 1, '', 0, NULL, '2019-03-15 11:36:36', '2019-03-15 11:36:36', 1, ''),
(7, '0', '0', 'tttt', 444, 'bbbb', 'Accion', 0, 0, 1, '', 0, NULL, '2019-03-15 11:36:51', '2019-03-15 11:36:51', 1, ''),
(8, '0', '0', 'tttt', 444, 'bbbb', 'Accion', 0, 0, 1, '', 0, NULL, '2019-03-15 12:13:57', '2019-03-15 12:13:57', 1, '+13'),
(9, '0', '0', 'fds', 3, 'sdf', 'Accion', 0, 0, 1, '', 0, NULL, '2019-03-15 16:17:10', '2019-03-15 16:17:10', 1, '+13 C/R'),
(10, '', '5', 'nnnnn', 155, 'sdf', 'Accion', 0, 0, 0, '', 0, NULL, '2019-03-15 16:22:19', '2019-03-15 16:22:19', 2, '+13'),
(11, '', '', 'prueba', 45, 'ffff', 'Accion', 1, 0, 0, '', 0, NULL, '2019-03-15 16:23:35', '2019-03-15 16:23:35', 2, '+13'),
(12, '', 's', 'wewe', 155, 'sdsdsd', 'Accion', 0, 0, 1, '', 0, NULL, '2019-03-15 16:24:48', '2019-03-15 16:24:48', 2, '+13'),
(13, '', 'fff', 'nnnn', 155, 'mmmm', 'Accion', 1, 1, 1, '', 0, NULL, '2019-03-15 16:25:46', '2019-03-15 16:25:46', 2, '+13'),
(14, '', 'aa', 'dfdfdf', 155, 'sdf', 'Western', 0, 1, 1, '', 0, NULL, '2019-03-15 16:34:56', '2019-03-15 16:34:56', 2, 'ATP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idPermiso` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idPermiso`, `idSeccion`, `idUsuario`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 22, 1),
(4, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `idSala` int(11) NOT NULL,
  `nroSala` int(11) NOT NULL,
  `nombreSala` varchar(45) NOT NULL,
  `nroFila` int(11) NOT NULL,
  `nroColumna` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `invert` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`idSala`, `nroSala`, `nombreSala`, `nroFila`, `nroColumna`, `capacidad`, `invert`) VALUES
(1, 1010, 'SALA 1', 12, 12, 75, 120),
(3, 2020, 'SALA 2', 10, 10, 50, 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `idSeccion` int(11) NOT NULL,
  `nombreSec` varchar(200) NOT NULL,
  `seccion_padre_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`idSeccion`, `nombreSec`, `seccion_padre_id`) VALUES
(1, 'inicio', NULL),
(2, 'empresas', NULL),
(4, 'peliculas', NULL),
(5, 'distribuidoras', NULL),
(6, 'salas', NULL),
(7, 'tarifas', NULL),
(8, 'programacion', NULL),
(9, 'ventas', NULL),
(10, 'estadisticas', NULL),
(11, 'usuarios', NULL),
(12, 'caja', NULL),
(13, 'banners', NULL),
(14, 'controlingreso', NULL),
(15, 'libroiva', NULL),
(16, 'tiposbutaca', NULL),
(17, 'notificaciones', NULL),
(18, 'cupones', NULL),
(19, 'clientes', NULL),
(20, 'diasfestivos', NULL),
(21, 'datosdosificacion', NULL),
(22, 'registrarnuevaempresa', '2'),
(23, 'verempresa', '2'),
(24, 'modificarempresa', '2'),
(25, 'eliminarempresa', '2'),
(26, 'registrarnuevapelicula', '3'),
(27, 'verpeliculas', '3'),
(28, 'imagenespelicula', '3'),
(29, 'modificarpelicula', '3'),
(30, 'eliminarpelicula', '3'),
(31, 'sacarcartelera', '3'),
(32, 'registrarnuevadistribuidora', '4'),
(33, 'verdistribuidoras', '4'),
(34, 'modificardistribuidora', '4'),
(35, 'eliminardistribuidora', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(11) NOT NULL,
  `serie` varchar(5) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` double NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `defecto` tinyint(1) NOT NULL,
  `ventaWeb` tinyint(1) NOT NULL,
  `mostrarBol` tinyint(1) NOT NULL,
  `2d` tinyint(1) NOT NULL,
  `3d` tinyint(1) NOT NULL,
  `lunes` tinyint(1) NOT NULL,
  `martes` tinyint(1) NOT NULL,
  `miercoles` tinyint(1) NOT NULL,
  `jueves` tinyint(1) NOT NULL,
  `viernes` tinyint(1) NOT NULL,
  `sabado` tinyint(1) NOT NULL,
  `domingo` tinyint(1) NOT NULL,
  `diaFestivo` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUser` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUser`, `user`, `password`) VALUES
(1, 'administrador', 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`idAsiento`);

--
-- Indices de la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD PRIMARY KEY (`idButaca`);

--
-- Indices de la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  ADD PRIMARY KEY (`idCosto`),
  ADD KEY `idButaca` (`idButaca`),
  ADD KEY `idTarifa` (`idTarifa`),
  ADD KEY `idFuncion` (`idFuncion`) USING BTREE;

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`idDistrib`);

--
-- Indices de la tabla `dosificacion`
--
ALTER TABLE `dosificacion`
  ADD PRIMARY KEY (`idDosif`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`) USING BTREE;

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`idFuncion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`),
  ADD KEY `idSala` (`idSala`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idPelicula`),
  ADD KEY `idDistrib` (`idDistrib`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `idSeccion` (`idSeccion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`idSeccion`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idTarifa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `idAsiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  MODIFY `idCosto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `idDistrib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dosificacion`
--
ALTER TABLE `dosificacion`
  MODIFY `idDosif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `idFuncion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  ADD CONSTRAINT `costobutaca_ibfk_1` FOREIGN KEY (`idTarifa`) REFERENCES `tarifa` (`idTarifa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `costobutaca_ibfk_2` FOREIGN KEY (`idButaca`) REFERENCES `butaca` (`idButaca`) ON DELETE CASCADE,
  ADD CONSTRAINT `costobutaca_ibfk_3` FOREIGN KEY (`idFuncion`) REFERENCES `funcion` (`idFuncion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD CONSTRAINT `funcion_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcion_ibfk_2` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcion_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`idDistrib`) REFERENCES `distribuidor` (`idDistrib`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`idSeccion`) REFERENCES `seccion` (`idSeccion`),
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
