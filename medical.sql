-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-03-2025 a las 07:49:44
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medical`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `diagnostico` int(11) NOT NULL,
  `observaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `id_paciente`, `diagnostico`, `observaciones`, `estatus`) VALUES
(1, '2021-11-24', 123000, 1, 1, 'NA', 1),
(2, '2021-11-25', 101500, 2, 1, '2', 0),
(3, '2021-11-29', 120000, 2, 1, 'na', 0),
(4, '2021-11-30', 123300, 1, 1, 'SDSD', 1),
(5, '2021-12-01', 20200, 2, 1, 'SS', 0),
(6, '2021-12-03', 43000, 1, 1, 'FGD', 1),
(7, '2021-11-30', 10200, 1, 1, '33', 1),
(8, '2021-11-30', 30300, 2, 1, 'JJ', 1),
(9, '2022-01-01', 30300, 1, 1, 'JJ', 1),
(10, '2021-12-06', 50500, 1, 1, 'NA', 0),
(11, '2025-02-26', 22, 2, 1, 'na 11', 0),
(12, '2025-02-26', 11, 2, 1, 'x', 1),
(13, '2025-02-26', 10, 1, 1, 'q', 1),
(14, '2025-03-06', 8, 1, 1, 'Dolor remitido', 1),
(15, '2025-03-06', 9, 2, 1, 'dolor reportado', 1),
(16, '2025-03-06', 17, 3, 1, 's', 1),
(17, '2025-03-06', 10, 1, 1, 'dos', 1),
(18, '2025-02-26', 8, 2, 1, 'tres', 0),
(20, '2025-03-24', 8, 3, 1, 'x', 1),
(21, '2025-03-24', 12, 3, 1, 'x', 1),
(22, '2025-03-24', 9, 3, 1, 'x', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`id`, `nombre`, `categoria`) VALUES
(1, 'Caries', 'Bucal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `alergias` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `estatura` decimal(10,0) NOT NULL,
  `tipo_sangre` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_emergencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_emergencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `apellido`, `nombre`, `direccion`, `telefono`, `edad`, `peso`, `sexo`, `alergias`, `estatura`, `tipo_sangre`, `email`, `nombre_emergencia`, `telefono_emergencia`) VALUES
(1, 'Leaños', 'Rodolfo', 'El salero', '9999999', 40, 100, 1, 'Ninguna', '2', 1, 'jesusrlv@gmail.com', 'Ninguno', '9999999'),
(2, 'Leaños Villegas', 'Jesus', 'El salero', '9999999', 40, 102, 1, 'Ninguna', '2', 1, 'jesusrlv@gmail.com', 'Ninguno', '9999999'),
(3, 'LeañosVillegas', 'Jesus', 'El salero', '9999999', 9, 9, 1, 'Ninguna', '2', 1, 'jesusrlv@gmail.com', 'Ninguno', '999999997');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id` int(11) NOT NULL,
  `diagnostico` int(11) NOT NULL,
  `descripción` date NOT NULL,
  `id_ext` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr`
--

CREATE TABLE `usr` (
  `id` int(11) NOT NULL,
  `usr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `privilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usr`
--

INSERT INTO `usr` (`id`, `usr`, `pwd`, `privilegio`) VALUES
(1, 'admin', '123456789', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
