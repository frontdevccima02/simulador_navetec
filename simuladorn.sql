-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2023 a las 16:23:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `nombre`, `fecha`, `lote`, `desarrollo`, `condominio`, `descuento`, `metros`, `tipo`, `precioU`, `precioUD`, `tiempo`, `mes1`, `mes2`, `mes3`, `monto`, `engancheE`, `desenganche`, `engancheEx`, `engancheP`, `totalP`, `Importe`, `mens1`, `mens2`, `mens3`, `fech`, `dato`, `pdenganche`, `penganchee`, `penganchep`, `enganchet`) VALUES
(1, 'hola', '2023-08-04', 16, 'Lomas de Porttoblanco', 'Lomas 1', 10.00, 150.00, 'premium', 4725.00, 472.50, 120, 48.00, 72.00, 0.00, 637875.00, 63787.50, 6378.75, 0.00, 0.00, 631496.25, 574087.50, 4784.06, 6734.11, 0.00, '2023-10-05', '2023-08-10', 10, 0, 9, 57408.75),
(2, 'hola', '2023-08-04', 16, 'Lomas de Porttoblanco', 'Lomas 1', 10.00, 150.00, 'estandar', 4500.00, 450.00, 240, 48.00, 72.00, 120.00, 607500.00, 60750.00, 6075.00, 0.00, 0.00, 601425.00, 546750.00, 2278.13, 5133.87, 5773.11, '2023-10-05', '2023-08-10', 10, 0, 9, 54675),
(3, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(4, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(5, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(6, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(7, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(8, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(9, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(10, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(11, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(12, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(13, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4),
(14, '10', '2023-08-07', 150, 'Selecciona tu desarrollo', 'Lomas 4', 12.00, 1.00, 'estandar', 4500.00, 540.00, 240, 0.00, 0.00, 240.00, 3960.00, 396.00, 39.60, 0.00, 0.00, 3920.40, 3564.00, 14.85, 39.24, 46.73, '2023-09-05', '0000-00-00', 10, 0, 9, 356.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financiamiento`
--

CREATE TABLE `financiamiento` (
  `id_financiamiento` int(11) NOT NULL,
  `financiamiento1` double NOT NULL,
  `financiamiento2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `financiamiento`
--

INSERT INTO `financiamiento` (`id_financiamiento`, `financiamiento1`, `financiamiento2`) VALUES
(1, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parque`
--

CREATE TABLE `parque` (
  `id_parque` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `meses` int(4) NOT NULL,
  `mensualidad1` float NOT NULL,
  `mensualidad2` float NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parque`
--

INSERT INTO `parque` (`id_parque`, `nombre`, `tipo`, `meses`, `mensualidad1`, `mensualidad2`, `estado`) VALUES
(1, 'celta', 'lote', 60, 36, 24, 'activo'),
(2, 'aereopuerto (naves)', 'naves', 120, 36, 84, 'activo'),
(3, 'aereopuerto (lote)', 'lote', 84, 36, 48, 'activo'),
(4, 'gamma II espeta 2', 'naves', 6, 6, 0, 'activo'),
(5, 'calamanda (nave)', 'naves', 60, 36, 24, 'activo'),
(6, 'calamanda (local)', 'local', 24, 24, 0, 'activo'),
(7, 'sur 57', 'naves', 120, 36, 84, 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `financiamiento`
--
ALTER TABLE `financiamiento`
  ADD PRIMARY KEY (`id_financiamiento`);

--
-- Indices de la tabla `parque`
--
ALTER TABLE `parque`
  ADD PRIMARY KEY (`id_parque`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `financiamiento`
--
ALTER TABLE `financiamiento`
  MODIFY `id_financiamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `parque`
--
ALTER TABLE `parque`
  MODIFY `id_parque` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
