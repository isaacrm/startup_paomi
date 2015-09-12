-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2015 a las 19:30:26
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sheer_dbase`
--
CREATE DATABASE IF NOT EXISTS `sheer_dbase` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `sheer_dbase`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos_cliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `Dui_cliente` int(8) NOT NULL,
  `direccion_cliente` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `correo_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contraseña_cliente` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `comentario` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombres_empleado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos_empleado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad_empleado` int(11) NOT NULL,
  `DUI_empleado` int(8) NOT NULL,
  `direccion_empleado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo_empleado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contra_empleado` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_empleado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `marca_producto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `id_tipo_cliente` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `tipo_cliente` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_productos`
--

CREATE TABLE IF NOT EXISTS `tipo_productos` (
  `id_tipo_producto` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagen_tipo_producto` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_empleado` int(11) NOT NULL,
  `contra_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `hora_venta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id_cliente`), ADD UNIQUE KEY `Dui_cliente` (`Dui_cliente`), ADD KEY `nombre_usuario` (`nombre_usuario`), ADD KEY `id_tipo_cliente` (`id_tipo_cliente`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`id_comentario`), ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
 ADD PRIMARY KEY (`id_detalle_venta`), ADD KEY `id_producto` (`id_producto`), ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`id_empleado`), ADD UNIQUE KEY `DUI_empleado` (`DUI_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`), ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
 ADD PRIMARY KEY (`id_tipo_cliente`), ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
 ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`), ADD KEY `nombre_empleado` (`nombre_empleado`), ADD KEY `nombre_cliente` (`nombre_cliente`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`id_venta`), ADD KEY `id_cliente` (`id_cliente`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
ADD CONSTRAINT `fk_tipo_cliente` FOREIGN KEY (`id_tipo_cliente`) REFERENCES `tipo_cliente` (`id_tipo_cliente`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
ADD CONSTRAINT `fk_clientes_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
ADD CONSTRAINT `fk_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
ADD CONSTRAINT `fk_ventas` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `fk_tipo_productos` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_productos` (`id_tipo_producto`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `fk_clientes` FOREIGN KEY (`nombre_cliente`) REFERENCES `clientes` (`id_cliente`),
ADD CONSTRAINT `fk_nombre_empleado` FOREIGN KEY (`nombre_empleado`) REFERENCES `empleados` (`id_empleado`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
ADD CONSTRAINT `fk_clientes_` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
