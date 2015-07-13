-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2015 a las 06:30:12
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `asd2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `administrador`:
--   `id`
--       `usuario` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camaras`
--

CREATE TABLE IF NOT EXISTS `camaras` (
  `id` int(30) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `permitir_monitoreo` tinyint(1) NOT NULL COMMENT '0 no permitido - 1 permitido',
  `url` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'link de cam publica',
  `sistema_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `camaras`:
--   `sistema_id`
--       `sistema` -> `id`
--

--
-- Volcado de datos para la tabla `camaras`
--

INSERT INTO `camaras` (`id`, `descripcion`, `permitir_monitoreo`, `url`, `sistema_id`) VALUES
(1, ' ', 1, 'http://images.opentopia.com/cams/14362/big.jpg', 2),
(2, ' ', 1, 'http://217.7.233.140/cgi-bin/faststream.jpg?stream=full&fps=0', 2),
(3, ' ', 1, 'http://212.170.22.153:8080/mjpg/video.mjpg', 3),
(4, ' ', 1, 'http://62.145.183.146/mjpg/video.mjpg', 3),
(5, ' ', 1, 'http://202.142.12.41/nphMotionJpeg?Resolution=640x480&Quality=Clarity', 4),
(6, ' ', 1, 'http://173.13.70.121/-wvhttp-01-/GetOneShot?frame_count=no_limit', 4),
(7, ' ', 1, 'http://images.opentopia.com/cams/11727/big.jpg', 4),
(8, ' ', 1, 'http://98.101.223.10:8080/video.cgi', 4),
(9, ' ', 1, 'http://214.253.118.219.megaegg.ne.jp/-wvhttp-01-/GetOneShot?v=640&frame_count=no_limit', 4),
(10, ' ', 1, 'http://217.7.233.140/cgi-bin/faststream.jpg?stream=full&fps=0', 4),
(11, ' ', 1, 'http://205.157.152.230/mjpg/video.mjpg', 5),
(12, ' ', 1, 'http://images.opentopia.com/cams/11727/big.jpg', 5),
(13, ' ', 1, 'http://194.103.218.16/mjpg/video.mjpg', 5),
(14, ' ', 1, 'http://81.12.184.162/image', 5),
(15, ' ', 1, 'http://webcam.dundeecity.gov.uk/-wvhttp-01-/video.cgi', 5),
(16, ' ', 1, 'http://64.251.85.30/mjpg/video.mjpg', 5),
(17, ' ', 1, 'http://images.opentopia.com/cams/14362/big.jpg', 6),
(18, ' ', 1, 'http://noliakameran.net.umea.se/axis-cgi/mjpg/video.cgi', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(30) NOT NULL,
  `telefono` int(30) NOT NULL,
  `plan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `cliente`:
--   `id`
--       `usuario` -> `id`
--

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `telefono`, `plan`) VALUES
(3, 46965698, 1),
(4, 45856985, 2),
(5, 46698787, 2),
(6, 47458899, 3),
(7, 45887722, 3),
(8, 44856969, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `id` int(30) NOT NULL,
  `producto_id` int(30) NOT NULL,
  `factura_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `detalle`:
--   `factura_id`
--       `factura` -> `id`
--   `producto_id`
--       `producto` -> `id`
--

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `producto_id`, `factura_id`) VALUES
(1, 1, 1),
(2, 4, 1),
(3, 2, 2),
(4, 5, 2),
(5, 2, 3),
(6, 5, 3),
(7, 3, 4),
(8, 6, 4),
(9, 3, 5),
(10, 6, 5),
(11, 2, 6),
(12, 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disparo`
--

CREATE TABLE IF NOT EXISTS `disparo` (
  `id` int(30) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_finalizacion` datetime NOT NULL,
  `factor` tinyint(1) NOT NULL,
  `sistema_id` int(30) NOT NULL,
  `evento_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `disparo`:
--   `sistema_id`
--       `sistema` -> `id`
--   `evento_id`
--       `evento` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(30) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `evento`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id` int(30) NOT NULL,
  `fecha` date NOT NULL,
  `monto` int(11) NOT NULL,
  `nro_factura` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `cliente_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `factura`:
--   `cliente_id`
--       `cliente` -> `id`
--

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `monto`, `nro_factura`, `estado`, `cliente_id`) VALUES
(1, '2015-07-01', 4200, 1, 0, 3),
(2, '2015-07-01', 5400, 1, 0, 4),
(3, '2015-07-01', 5400, 1, 0, 5),
(4, '2015-07-01', 654, 1, 0, 6),
(5, '2015-07-01', 654, 1, 0, 7),
(6, '2015-07-01', 5400, 1, 0, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
  `id` int(30) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `localidad`:
--

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `nombre`) VALUES
(1, 'Casanova'),
(2, 'Castelar'),
(3, 'Haedo'),
(4, 'Ituzaingo'),
(5, 'Morón'),
(6, 'Ramos Mejía'),
(7, 'San Justo'),
(8, 'Villa Luzuriaga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitoreador`
--

CREATE TABLE IF NOT EXISTS `monitoreador` (
  `id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `monitoreador`:
--   `id`
--       `usuario` -> `id`
--

--
-- Volcado de datos para la tabla `monitoreador`
--

INSERT INTO `monitoreador` (`id`) VALUES
(2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(30) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `perfil`:
--

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`) VALUES
(1, 'Cliente'),
(2, 'Monitoreador'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(30) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `producto`:
--

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`) VALUES
(1, 'Plan Classic', '4000.00'),
(2, 'Plan Silver', '5000.00'),
(3, 'Plan Gold', '4.00'),
(4, 'Cuota Classic', '200.00'),
(5, 'Cuota Silver', '400.00'),
(6, 'Cuota Gold', '650.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `id` int(30) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `latitud` float(10,6) NOT NULL,
  `longitud` float(10,6) NOT NULL,
  `codigo_desbloqueo` int(100) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `cliente_id` int(30) NOT NULL,
  `localidad_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `sistema`:
--   `cliente_id`
--       `cliente` -> `id`
--   `localidad_id`
--       `localidad` -> `id`
--

--
-- Volcado de datos para la tabla `sistema`
--

INSERT INTO `sistema` (`id`, `direccion`, `latitud`, `longitud`, `codigo_desbloqueo`, `estado`, `cliente_id`, `localidad_id`) VALUES
(1, 'Aguero 578', -34.662930, -58.622738, 1447, 0, 3, 5),
(2, 'Avenida Don Bosco 2712', -34.658325, -58.591785, 7234, 0, 4, 1),
(3, 'Rawson 17', -34.649994, -58.554466, 7289, 0, 5, 6),
(4, 'América 1918', -34.659874, -58.574512, 8666, 0, 6, 7),
(5, 'Venezuela 5786', -34.693172, -58.601219, 3916, 0, 7, 1),
(6, '9 de Julio 736', -34.656956, -58.618603, 6877, 0, 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(30) NOT NULL,
  `nick` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `dni` int(30) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `registro` date NOT NULL,
  `estado` tinyint(1) NOT NULL COMMENT '0 de baja - 1 activo',
  `perfil_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `usuario`:
--   `perfil_id`
--       `perfil` -> `id`
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `clave`, `dni`, `nombre`, `apellido`, `mail`, `registro`, `estado`, `perfil_id`) VALUES
(1, 'pepe1234', '81dc9bdb52d04dc20036dbd8313ed055', 23556879, 'Pepe', 'Velazco', 'nachitop.-@hotmail.com', '2015-07-08', 1, 3),
(2, 'carla456', '250cf8b51c773f3f8dc8b4be867a9a02', 32548797, 'Carla', 'Benitez', 'caro@gmail.com', '2015-07-13', 1, 2),
(3, 'agus123', '202cb962ac59075b964b07152d234b70', 20546897, 'Agustin', 'Farías', 'agus@hotmail.com', '2015-07-13', 1, 1),
(4, 'guido1414', '7a674153c63cff1ad7f0e261c369ab2c', 30564231, 'Guido', 'Perez', 'guido@yahoo.com.ar', '2015-07-13', 1, 1),
(5, 'jose545', '647bba344396e7c8170902bcf2e15551', 35879454, 'Jose', 'Martinez', 'josesito@hotmail.com', '2015-07-13', 1, 1),
(6, 'david7777', 'd79c8788088c2193f0244d8f1f36d2db', 25656847, 'David', 'Gonzalez', 'david@yahoo.com.ar', '2015-07-13', 1, 1),
(7, 'silvia1212', 'a01610228fe998f515a72dd730294d87', 22564897, 'Silvia', 'Vaez', 'silvia@hotmail.com', '2015-07-13', 1, 1),
(8, 'laura2222', '934b535800b1cba8f96a5d72f72f1611', 45658787, 'Laura', 'Garcia', 'laura@gmail.com', '2015-07-13', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `camaras`
--
ALTER TABLE `camaras`
  ADD PRIMARY KEY (`id`), ADD KEY `camaras_ibfk_1` (`sistema_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`), ADD KEY `detalle_ibfk_1` (`factura_id`), ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `disparo`
--
ALTER TABLE `disparo`
  ADD PRIMARY KEY (`id`), ADD KEY `disparo_ibfk_1` (`sistema_id`), ADD KEY `disparo_ibfk_3` (`evento_id`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`), ADD KEY `factura_ibfk_1` (`cliente_id`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monitoreador`
--
ALTER TABLE `monitoreador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id`), ADD KEY `sistema_ibfk_1` (`cliente_id`), ADD KEY `sistema_ibfk_2` (`localidad_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nick` (`nick`), ADD KEY `usuario_ibfk_1` (`perfil_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camaras`
--
ALTER TABLE `camaras`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `disparo`
--
ALTER TABLE `disparo`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `camaras`
--
ALTER TABLE `camaras`
ADD CONSTRAINT `camaras_ibfk_1` FOREIGN KEY (`sistema_id`) REFERENCES `sistema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `disparo`
--
ALTER TABLE `disparo`
ADD CONSTRAINT `disparo_ibfk_2` FOREIGN KEY (`sistema_id`) REFERENCES `sistema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `disparo_ibfk_3` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `monitoreador`
--
ALTER TABLE `monitoreador`
ADD CONSTRAINT `monitoreador_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sistema`
--
ALTER TABLE `sistema`
ADD CONSTRAINT `sistema_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sistema_ibfk_2` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
