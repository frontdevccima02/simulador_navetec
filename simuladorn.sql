-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2023 a las 18:33:23
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simuladorn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `lote` int(11) DEFAULT NULL,
  `desarrollo` varchar(100) DEFAULT NULL,
  `condominio` varchar(100) DEFAULT NULL,
  `descuento` decimal(10,2) DEFAULT NULL,
  `metros` decimal(10,2) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `precioU` decimal(10,2) DEFAULT NULL,
  `precioUD` decimal(10,2) DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `mes1` decimal(10,2) DEFAULT NULL,
  `mes2` decimal(10,2) DEFAULT NULL,
  `mes3` decimal(10,2) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `engancheE` decimal(10,2) DEFAULT NULL,
  `desenganche` decimal(10,2) DEFAULT NULL,
  `engancheEx` decimal(10,2) DEFAULT NULL,
  `engancheP` decimal(10,2) DEFAULT NULL,
  `totalP` decimal(10,2) DEFAULT NULL,
  `Importe` decimal(10,2) DEFAULT NULL,
  `mens1` decimal(10,2) DEFAULT NULL,
  `mens2` decimal(10,2) DEFAULT NULL,
  `mens3` decimal(10,2) DEFAULT NULL,
  `fech` date DEFAULT NULL,
  `dato` date DEFAULT NULL,
  `pdenganche` double NOT NULL,
  `penganchee` double NOT NULL,
  `penganchep` double NOT NULL,
  `enganchet` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollo`
--

CREATE TABLE `desarrollo` (
  `id_desarrollo` int(3) NOT NULL,
  `desarrollo` varchar(50) NOT NULL,
  `cluster` varchar(50) NOT NULL,
  `messi` int(3) NOT NULL,
  `mes1` int(3) NOT NULL,
  `mes2` int(3) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desarrollo`
--

INSERT INTO `desarrollo` (`id_desarrollo`, `desarrollo`, `cluster`, `messi`, `mes1`, `mes2`, `estado`) VALUES
(16, 'Porttoblanco Cimatario', 'Estepa 1', 0, 0, 0, 'inhabilitado'),
(17, 'Porttoblanco Cimatario', 'Estepa 2', 0, 0, 0, 'inhabilitado'),
(18, 'Porttoblanco Cimatario', 'Estepa 3', 0, 0, 0, 'inhabilitado'),
(19, 'Porttoblanco Cimatario', 'Paramo A', 0, 0, 0, 'inhabilitado'),
(20, 'Porttoblanco Cimatario', 'Paramo B', 0, 0, 0, 'inhabilitado'),
(21, 'Porttoblanco Cimatario', 'Manglar A', 0, 0, 0, 'inhabilitado'),
(22, 'Porttoblanco Cimatario', 'Desierto 1', 25, 95, 0, 'activo'),
(23, 'Porttoblanco Cimatario', 'Desierto 2', 25, 95, 0, 'activo'),
(24, 'Porttoblanco Cimatario', 'Desierto 3', 25, 95, 0, 'activo'),
(25, 'Porttoblanco Cimatario', 'Desierto 4 ', 25, 95, 0, 'activo'),
(26, 'Porttoblanco Cimatario', 'Taiga 1', 27, 93, 0, 'activo'),
(27, 'Porttoblanco Cimatario', 'Taiga 2', 27, 93, 0, 'activo'),
(28, 'Porttoblanco Cimatario', 'Taiga 3', 27, 93, 0, 'activo'),
(29, 'Porttoblanco Cimatario', 'Selva 1', 36, 84, 60, 'activo'),
(30, 'Porttoblanco Cimatario', 'Selva 2', 36, 84, 60, 'activo'),
(31, 'Porttoblanco Cimatario', 'Selva 3', 36, 84, 60, 'activo'),
(32, 'Porttoblanco Cimatario', 'Selva 4', 36, 84, 60, 'activo'),
(33, 'Porttoblanco Cimatario', 'Bosque 1', 36, 84, 60, 'activo'),
(34, 'Porttoblanco Cimatario', 'Bosque 2', 36, 84, 60, 'activo'),
(35, 'Porttoblanco Cimatario', 'Bosque 3', 36, 84, 60, 'activo'),
(36, 'Porttoblanco Cimatario', 'Bosque 4', 36, 84, 60, 'activo'),
(41, 'Porttoblanco Cimatario', 'Paramo 1', 30, 90, 0, 'activo'),
(42, 'Porttoblanco Cimatario', 'Paramo 2', 30, 90, 0, 'activo'),
(43, 'Porttoblanco Cimatario', 'Paramo 3', 30, 90, 0, 'activo'),
(66, 'Porttoblanco Cimatario', 'Lago 1', 40, 80, 120, 'activo'),
(67, 'Porttoblanco Cimatario', 'Lago 2', 48, 72, 120, 'activo'),
(68, 'Porttoblanco Cimatario', 'Manglar 1', 48, 72, 120, 'activo'),
(69, 'Porttoblanco Cimatario', 'Manglar 2', 48, 72, 120, 'activo'),
(73, 'Porttoblanco Cimatario', 'Arrecife 3', 48, 72, 120, 'activo'),
(80, 'Porttoblanco Bernal', 'Amatista 1', 48, 72, 120, 'activo'),
(81, 'Porttoblanco Bernal', 'Amatista 2', 48, 72, 120, 'activo'),
(82, 'Porttoblanco Bernal', 'Zafiro 1', 48, 72, 120, 'activo'),
(83, 'Porttoblanco Bernal', 'Zafiro 2', 48, 72, 120, 'activo'),
(84, 'Porttoblanco Bernal', 'Malaquita 1', 48, 72, 120, 'activo'),
(85, 'Porttoblanco Bernal', 'Malaquita 2', 48, 72, 120, 'activo'),
(86, 'Lomas de Porttoblanco', 'Lomas 1', 48, 72, 60, 'activo'),
(87, 'Lomas de Porttoblanco', 'Lomas 2', 48, 72, 60, 'activo'),
(88, 'Lomas de Porttoblanco', 'Lomas 3', 48, 72, 60, 'activo'),
(89, 'Lomas de Porttoblanco', 'Lomas 4 ', 0, 0, 0, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financiamiento`
--

CREATE TABLE `financiamiento` (
  `id_financiamiento` int(11) NOT NULL,
  `financiamiento1` double NOT NULL,
  `financiamiento2` double NOT NULL,
  `financiamiento3` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `financiamiento`
--

INSERT INTO `financiamiento` (`id_financiamiento`, `financiamiento1`, `financiamiento2`, `financiamiento3`) VALUES
(1, 0, 1, 1.25);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `desarrollo`
--
ALTER TABLE `desarrollo`
  ADD PRIMARY KEY (`id_desarrollo`);

--
-- Indices de la tabla `financiamiento`
--
ALTER TABLE `financiamiento`
  ADD PRIMARY KEY (`id_financiamiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `desarrollo`
--
ALTER TABLE `desarrollo`
  MODIFY `id_desarrollo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `financiamiento`
--
ALTER TABLE `financiamiento`
  MODIFY `id_financiamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
