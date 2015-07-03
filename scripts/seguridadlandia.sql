-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2015 a las 14:20:53
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `seguridadlandia3.3`
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

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`) VALUES
(1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- RELACIONES PARA LA TABLA `camaras`:
--   `sistema_id`
--       `sistema` -> `id`
--

--
-- Volcado de datos para la tabla `camaras`
--

INSERT INTO `camaras` (`id`, `descripcion`, `permitir_monitoreo`, `url`, `sistema_id`) VALUES
(1, 'pasillo', 0, 'www.cam1.com', 2),
(2, 'patio', 1, 'www.cam2.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(30) NOT NULL,
  `telefono` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `cliente`:
--   `id`
--       `usuario` -> `id`
--

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `telefono`) VALUES
(2, 44860299),
(4, 46695003),
(5, 45896965),
(6, 4887956),
(7, 45687897),
(8, 45688789),
(9, 42115555);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
`id` int(30) NOT NULL,
  `cantidad` int(30) NOT NULL,
  `producto_id` int(30) NOT NULL,
  `factura_id` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

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

INSERT INTO `detalle` (`id`, `cantidad`, `producto_id`, `factura_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 4, 1),
(5, 2, 5, 1),
(6, 1, 8, 1),
(7, 1, 9, 1),
(8, 1, 1, 2),
(9, 1, 2, 2),
(10, 1, 3, 2),
(11, 4, 4, 2),
(12, 4, 5, 2),
(13, 2, 6, 2),
(14, 1, 8, 2),
(15, 1, 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disparo`
--

CREATE TABLE IF NOT EXISTS `disparo` (
`id` int(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `factor` tinyint(1) NOT NULL,
  `sistema_id` int(30) NOT NULL,
  `evento_id` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `disparo`:
--   `sistema_id`
--       `sistema` -> `id`
--   `evento_id`
--       `evento` -> `id`
--

--
-- Volcado de datos para la tabla `disparo`
--

INSERT INTO `disparo` (`id`, `fecha`, `factor`, `sistema_id`, `evento_id`) VALUES
(1, '2015-06-22 00:00:00', 1, 1, 1),
(2, '2015-06-22 00:00:00', 0, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
`id` int(30) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `nombre`) VALUES
(1, 'falta220v'),
(2, 'reingreso_clave_erronea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
`id` int(30) NOT NULL,
  `fecha` date NOT NULL,
  `cliente_id` int(30) NOT NULL,
  `pago_id` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- RELACIONES PARA LA TABLA `factura`:
--   `cliente_id`
--       `cliente` -> `id`
--   `pago_id`
--       `pago` -> `id`
--

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `cliente_id`, `pago_id`) VALUES
(1, '2015-06-20', 2, 1),
(2, '2015-06-21', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
`id` int(30) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `nombre`) VALUES
(1, 'Castelar'),
(2, 'Haedo'),
(3, 'Morón'),
(4, 'Ramos Mejía'),
(5, 'San Justo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitoreador`
--

CREATE TABLE IF NOT EXISTS `monitoreador` (
  `id` int(30) NOT NULL,
  `turno` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'mañana - noche'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `monitoreador`:
--   `id`
--       `usuario` -> `id`
--

--
-- Volcado de datos para la tabla `monitoreador`
--

INSERT INTO `monitoreador` (`id`, `turno`) VALUES
(2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
`id` int(30) NOT NULL,
  `nombre_tarjeta` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numero_tarjeta` int(30) NOT NULL,
  `codigo_seguridad` int(30) NOT NULL,
  `otros_detalles` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `nombre_tarjeta`, `numero_tarjeta`, `codigo_seguridad`, `otros_detalles`) VALUES
(1, 'Visa', 2147483647, 587, ''),
(2, 'Mastercard', 2147483647, 478, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(30) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`) VALUES
(1, 'cliente'),
(2, 'monitoreador'),
(3, 'administrador');

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
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`) VALUES
(1, 'Router centralizador de seguridad', '1299.00'),
(2, 'Alarma blindada', '5835.00'),
(3, 'Batería de sistema de seguridad', '210.00'),
(4, 'Sensor de precencia', '189.00'),
(5, 'Sensor de cierre de apertura', '316.00'),
(6, 'Cámara IP', '1395.00'),
(7, 'Comunicador 3G', '1890.00'),
(8, 'Costo de instalación', '250.00'),
(9, 'Cuota Classic', '200.00'),
(10, 'Cuota Gold', '400.00'),
(11, 'Cuota Platinum', '650.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensores_de_apertura`
--

CREATE TABLE IF NOT EXISTS `sensores_de_apertura` (
`id` int(30) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sistema_id` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- RELACIONES PARA LA TABLA `sensores_de_apertura`:
--   `sistema_id`
--       `sistema` -> `id`
--

--
-- Volcado de datos para la tabla `sensores_de_apertura`
--

INSERT INTO `sensores_de_apertura` (`id`, `descripcion`, `sistema_id`) VALUES
(1, 'puerta_entrada', 1),
(2, 'ventana_frente', 1),
(3, 'puerta_fondo', 2),
(4, 'puerta_entrada', 2),
(5, 'ventana_comedor', 2),
(6, 'ventana_patio', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensores_de_presencia`
--

CREATE TABLE IF NOT EXISTS `sensores_de_presencia` (
`id` int(30) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sistema_id` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- RELACIONES PARA LA TABLA `sensores_de_presencia`:
--   `sistema_id`
--       `sistema` -> `id`
--

--
-- Volcado de datos para la tabla `sensores_de_presencia`
--

INSERT INTO `sensores_de_presencia` (`id`, `descripcion`, `sistema_id`) VALUES
(1, 'dormitorio_1', 1),
(2, 'comedor', 1),
(3, 'dormitorio_1', 2),
(4, 'dormitorio_2', 2),
(5, 'pasillo', 2),
(6, 'living', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
`id` int(30) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_desbloqueo` int(100) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `cliente_id` int(30) NOT NULL,
  `localidad_id` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

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

INSERT INTO `sistema` (`id`, `direccion`, `codigo_desbloqueo`, `estado`, `cliente_id`, `localidad_id`) VALUES
(1, 'Jujuy 924', 4568, 1, 2, 1),
(2, 'Salta 1900', 8879, 1, 4, 2),
(3, 'arenas 4589', 21, 1, 5, 3),
(4, 'catamarca 132', 0, 1, 6, 3),
(5, 'mendoza 45', 6, 1, 7, 2),
(6, 'pujol 54', 4438, 1, 8, 5),
(7, 'jujuy 56', 4731, 1, 9, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- RELACIONES PARA LA TABLA `usuario`:
--   `perfil_id`
--       `perfil` -> `id`
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `clave`, `dni`, `nombre`, `apellido`, `mail`, `registro`, `estado`, `perfil_id`) VALUES
(1, 'pepe1234', '81dc9bdb52d04dc20036dbd8313ed055', 23434565, 'Pedro', 'Ramirez', 'pedror@hotmail.com', '2015-04-01', 1, 3),
(2, 'caro5421', '07dbd9a180c7cc69cada7b982c5ae82c', 33548668, 'Carolina', 'Gonzalez', 'caro1985@gmail.com', '2015-02-14', 1, 1),
(3, 'guille5788', '967edfdcdfbcc3b2d253fac24326e5b5', 33569854, 'Guillermo', 'Moreyra', 'elguille@gmail.com', '2015-03-15', 1, 2),
(4, 'eva5641', '48fbab00052197bc8bd943498b89dd71', 30566875, 'Evangelina', 'Otamendi', 'eva.55@gmail.com', '2015-02-22', 1, 1),
(5, 'lola7878', '21c3134ee5edcb618c4f9aae358d73a7', 30569874, 'lola', 'gonzalez', 'lola@hotmail.com', '2015-07-01', 1, 1),
(6, 'paco8888', 'cf79ae6addba60ad018347359bd144d2', 20546978, 'paco', 'perez', 'pacol@yahoo.com.ar', '2015-07-01', 1, 1),
(7, 'hugo7474', '6a30e32e56fce5cf381895dfe6ca7b6f', 10548698, 'hugo', 'lugano', 'hugo@gmail.com', '2015-07-01', 1, 1),
(8, 'gonzalo2222', '934b535800b1cba8f96a5d72f72f1611', 23654558, 'gonzalo', 'farias', 'gonzard@yahoo.com', '2015-07-01', 1, 1),
(9, 'pepe5544', '97785e0500ad16c18574c64189ccf4b4', 21546879, 'pepa', 'perez', 'pepa@gmail.com', '2015-07-01', 1, 1);

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
 ADD PRIMARY KEY (`id`), ADD KEY `factura_ibfk_1` (`cliente_id`), ADD KEY `factura_ibfk_2` (`pago_id`);

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
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
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
-- Indices de la tabla `sensores_de_apertura`
--
ALTER TABLE `sensores_de_apertura`
 ADD PRIMARY KEY (`id`), ADD KEY `aberturas_ibfk_1` (`sistema_id`);

--
-- Indices de la tabla `sensores_de_presencia`
--
ALTER TABLE `sensores_de_presencia`
 ADD PRIMARY KEY (`id`), ADD KEY `habitaciones_ibfk_1` (`sistema_id`);

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
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `disparo`
--
ALTER TABLE `disparo`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sensores_de_apertura`
--
ALTER TABLE `sensores_de_apertura`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sensores_de_presencia`
--
ALTER TABLE `sensores_de_presencia`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `sistema`
--
ALTER TABLE `sistema`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`pago_id`) REFERENCES `pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `monitoreador`
--
ALTER TABLE `monitoreador`
ADD CONSTRAINT `monitoreador_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sensores_de_apertura`
--
ALTER TABLE `sensores_de_apertura`
ADD CONSTRAINT `sensores_de_apertura_ibfk_1` FOREIGN KEY (`sistema_id`) REFERENCES `sistema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sensores_de_presencia`
--
ALTER TABLE `sensores_de_presencia`
ADD CONSTRAINT `sensores_de_presencia_ibfk_1` FOREIGN KEY (`sistema_id`) REFERENCES `sistema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
