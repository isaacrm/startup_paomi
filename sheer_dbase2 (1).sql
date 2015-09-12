-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2015 a las 22:36:30
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sheer_dbase2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_emp`
--

CREATE TABLE IF NOT EXISTS `cargo_emp` (
`id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo_emp`
--

INSERT INTO `cargo_emp` (`id_cargo`, `nombre_cargo`, `descripcion`) VALUES
(1, 'Comerciante', 'Comerciante vendedor'),
(3, 'gerente', 'bcufubfc'),
(4, 'Admin', 'fcrgftgtg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellidos_cliente` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `Dui_cliente` int(8) NOT NULL,
  `direccion_cliente` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo_cliente` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contrasena_cliente` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_cliente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellidos_cliente`, `fecha_nacimiento`, `Dui_cliente`, `direccion_cliente`, `correo_cliente`, `nombre_usuario`, `contrasena_cliente`, `id_tipo_cliente`) VALUES
(1, 'Michelle', 'Sorto', '1997-12-21', 92830, 'La Sabana', 'micheelle.Sorto96@ho', 'Zeeck', 'Sealone1231', 1),
(2, 'michelle alejandra', 'guevara rodriguez', '2015-01-05', 43546527, 'dwdwdwd', 'michelle@gmail.com', 'michy', '123456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
`id_empleado` int(11) NOT NULL,
  `nombres_empleado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellidos_empleado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad_empleado` int(11) NOT NULL,
  `DUI_empleado` int(8) NOT NULL,
  `direccion_empleado` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo_empleado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contra_empleado` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cargo_empleado` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_empleado` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombres_empleado`, `apellidos_empleado`, `fecha_nacimiento`, `edad_empleado`, `DUI_empleado`, `direccion_empleado`, `correo_empleado`, `contra_empleado`, `cargo_empleado`, `usuario_empleado`) VALUES
(3, 'paola melissa', 'marinero hernandez', '2015-07-08', 0, 32424342, 'ddnidndneidne', 'alwaysmarinero@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Comerciant', 'paola'),
(4, 'paola ariel', 'portillo marinero', '2015-01-05', 0, 54454545, ' cvfv gbb t ttb tbbtb', 'ariel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Comerciant', 'ariel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id_producto` int(11) NOT NULL,
  `precio` double NOT NULL,
  `nombre_producto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marca_producto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_producto` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `precio`, `nombre_producto`, `marca_producto`, `id_tipo_producto`) VALUES
(1, 22, 'Maquillaje', 'Mac', 2),
(3, 33, 'Conceller', 'Sephora', 2),
(4, 645747, 'jmbjabaf', 'yh tjst', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
`id_servicios` int(11) NOT NULL,
  `servicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE IF NOT EXISTS `tipo_cliente` (
`id_tipo_cliente` int(11) NOT NULL,
  `tipo_cliente` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`id_tipo_cliente`, `tipo_cliente`, `descripcion`) VALUES
(1, 'Frecuente', 'hola'),
(5, 'Premium', 'refefdfe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_productos`
--

CREATE TABLE IF NOT EXISTS `tipo_productos` (
`id_tipo_producto` int(11) NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo_producto` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_productos`
--

INSERT INTO `tipo_productos` (`id_tipo_producto`, `descripcion`, `tipo_producto`) VALUES
(2, 'BAse', 'Base'),
(5, ' myumm', 'nuj ku');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`id_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `hora_venta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo_emp`
--
ALTER TABLE `cargo_emp`
 ADD PRIMARY KEY (`id_cargo`), ADD UNIQUE KEY `nombre_cargo` (`nombre_cargo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id_cliente`), ADD KEY `id_tipo_cliente` (`id_tipo_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`), ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
 ADD PRIMARY KEY (`id_servicios`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
 ADD PRIMARY KEY (`id_tipo_cliente`);

--
-- Indices de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
 ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo_emp`
--
ALTER TABLE `cargo_emp`
MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
MODIFY `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_tipo_cliente`) REFERENCES `tipo_cliente` (`id_tipo_cliente`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_productos` (`id_tipo_producto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
