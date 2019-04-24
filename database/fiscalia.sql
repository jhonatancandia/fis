-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2019 a las 21:38:25
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fiscalia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficio`
--

CREATE TABLE `beneficio` (
  `cod_beneficio` int(11) NOT NULL,
  `tipo_beneficio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `beneficio`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `nro_item` int(11) NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cargo_tipo_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cas`
--

CREATE TABLE `cas` (
  `cod_cas` int(11) NOT NULL,
  `cas` int(11) NOT NULL,
  `inicio` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_beneficio`
--

CREATE TABLE `empleado_beneficio` (
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_beneficio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_cargo`
--

CREATE TABLE `empleado_cargo` (
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `nro_item` int(11) NOT NULL,
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado_cargo`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_cas`
--

CREATE TABLE `empleado_cas` (
  `cod_cas` int(11) NOT NULL,
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado_cas`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_hoja_ruta`
--

CREATE TABLE `empleado_hoja_ruta` (
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_ruta` int(11) NOT NULL,
  `destino` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_permiso`
--

CREATE TABLE `empleado_permiso` (
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_permiso` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_fin` date NOT NULL,
  `fecha_inicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_situacion`
--

CREATE TABLE `empleado_situacion` (
  `cod_situacion` int(11) NOT NULL,
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado_situacion`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_unidad`
--

CREATE TABLE `empleado_unidad` (
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_unidad` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado_unidad`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_vacacion`
--

CREATE TABLE `empleado_vacacion` (
  `ci` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_vacacion` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_ruta`
--

CREATE TABLE `hoja_ruta` (
  `cod_ruta` int(11) NOT NULL,
  `objeto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `cod_permiso` int(11) NOT NULL,
  `cant_dias` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `gestion` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `cod_rol` int(11) NOT NULL,
  `tipo_rol` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacion`
--

CREATE TABLE `situacion` (
  `cod_situacion` int(11) NOT NULL,
  `tipo_situacion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `situacion`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cargo`
--

CREATE TABLE `tipo_cargo` (
  `cod_tipo_cargo` int(11) NOT NULL,
  `tipo_cargo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_cargo`
--

INSERT INTO `tipo_cargo` (`cod_tipo_cargo`, `tipo_cargo`) VALUES
(1, 'Fiscal'),
(2, 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `cod_unidad` int(11) NOT NULL,
  `nombre_unidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `unidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacacion`
--

CREATE TABLE `vacacion` (
  `cod_vacacion` int(11) NOT NULL,
  `cant_dias` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `gestion` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  ADD PRIMARY KEY (`cod_beneficio`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`nro_item`),
  ADD KEY `cargo_tipo_cargo` (`cargo_tipo_cargo`);

--
-- Indices de la tabla `cas`
--
ALTER TABLE `cas`
  ADD PRIMARY KEY (`cod_cas`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `empleado_beneficio`
--
ALTER TABLE `empleado_beneficio`
  ADD KEY `ci` (`ci`),
  ADD KEY `cod_beneficio` (`cod_beneficio`);

--
-- Indices de la tabla `empleado_cargo`
--
ALTER TABLE `empleado_cargo`
  ADD KEY `nro_item` (`nro_item`),
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `empleado_cas`
--
ALTER TABLE `empleado_cas`
  ADD KEY `cas` (`cod_cas`),
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `empleado_hoja_ruta`
--
ALTER TABLE `empleado_hoja_ruta`
  ADD KEY `ci` (`ci`),
  ADD KEY `cod_ruta` (`cod_ruta`);

--
-- Indices de la tabla `empleado_permiso`
--
ALTER TABLE `empleado_permiso`
  ADD KEY `ci` (`ci`),
  ADD KEY `cod_permiso` (`cod_permiso`);

--
-- Indices de la tabla `empleado_situacion`
--
ALTER TABLE `empleado_situacion`
  ADD KEY `cod_situacion` (`cod_situacion`),
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `empleado_unidad`
--
ALTER TABLE `empleado_unidad`
  ADD KEY `ci` (`ci`),
  ADD KEY `cod_unidad` (`cod_unidad`);

--
-- Indices de la tabla `empleado_vacacion`
--
ALTER TABLE `empleado_vacacion`
  ADD KEY `ci` (`ci`),
  ADD KEY `cod_vacacion` (`cod_vacacion`);

--
-- Indices de la tabla `hoja_ruta`
--
ALTER TABLE `hoja_ruta`
  ADD PRIMARY KEY (`cod_ruta`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`cod_permiso`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `situacion`
--
ALTER TABLE `situacion`
  ADD PRIMARY KEY (`cod_situacion`);

--
-- Indices de la tabla `tipo_cargo`
--
ALTER TABLE `tipo_cargo`
  ADD PRIMARY KEY (`cod_tipo_cargo`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`cod_unidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `cod_rol` (`cod_rol`);

--
-- Indices de la tabla `vacacion`
--
ALTER TABLE `vacacion`
  ADD PRIMARY KEY (`cod_vacacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  MODIFY `cod_beneficio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cas`
--
ALTER TABLE `cas`
  MODIFY `cod_cas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hoja_ruta`
--
ALTER TABLE `hoja_ruta`
  MODIFY `cod_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `cod_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `cod_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `situacion`
--
ALTER TABLE `situacion`
  MODIFY `cod_situacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_cargo`
--
ALTER TABLE `tipo_cargo`
  MODIFY `cod_tipo_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `cod_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vacacion`
--
ALTER TABLE `vacacion`
  MODIFY `cod_vacacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`cargo_tipo_cargo`) REFERENCES `tipo_cargo` (`cod_tipo_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_beneficio`
--
ALTER TABLE `empleado_beneficio`
  ADD CONSTRAINT `empleado_beneficio_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_beneficio_ibfk_2` FOREIGN KEY (`cod_beneficio`) REFERENCES `beneficio` (`cod_beneficio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_cargo`
--
ALTER TABLE `empleado_cargo`
  ADD CONSTRAINT `empleado_cargo_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_cargo_ibfk_2` FOREIGN KEY (`nro_item`) REFERENCES `cargo` (`nro_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_cas`
--
ALTER TABLE `empleado_cas`
  ADD CONSTRAINT `empleado_cas_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_cas_ibfk_2` FOREIGN KEY (`cod_cas`) REFERENCES `cas` (`cod_cas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_hoja_ruta`
--
ALTER TABLE `empleado_hoja_ruta`
  ADD CONSTRAINT `empleado_hoja_ruta_ibfk_1` FOREIGN KEY (`cod_ruta`) REFERENCES `hoja_ruta` (`cod_ruta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_hoja_ruta_ibfk_2` FOREIGN KEY (`ci`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_permiso`
--
ALTER TABLE `empleado_permiso`
  ADD CONSTRAINT `empleado_permiso_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_permiso_ibfk_2` FOREIGN KEY (`cod_permiso`) REFERENCES `permiso` (`cod_permiso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_situacion`
--
ALTER TABLE `empleado_situacion`
  ADD CONSTRAINT `empleado_situacion_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_situacion_ibfk_2` FOREIGN KEY (`cod_situacion`) REFERENCES `situacion` (`cod_situacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_unidad`
--
ALTER TABLE `empleado_unidad`
  ADD CONSTRAINT `empleado_unidad_ibfk_1` FOREIGN KEY (`cod_unidad`) REFERENCES `unidad` (`cod_unidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_unidad_ibfk_2` FOREIGN KEY (`ci`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_vacacion`
--
ALTER TABLE `empleado_vacacion`
  ADD CONSTRAINT `empleado_vacacion_ibfk_1` FOREIGN KEY (`cod_vacacion`) REFERENCES `vacacion` (`cod_vacacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_vacacion_ibfk_2` FOREIGN KEY (`ci`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_rol`) REFERENCES `rol` (`cod_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
