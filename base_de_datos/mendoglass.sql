-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2021 a las 02:27:05
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mendoglass`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_CLIENTE` int(11) NOT NULL,
  `CUIT_DNI` varchar(100) NOT NULL,
  `SITUACION_FISCAL` varchar(100) NOT NULL,
  `CLIENTE` varchar(100) NOT NULL,
  `TASA_ING_BRUTOS` int(11) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `CORREO` varchar(100) DEFAULT NULL,
  `TELEFONOS` varchar(100) DEFAULT NULL,
  `ACTIVIDAD` varchar(100) NOT NULL,
  `DESCUENTOS` int(11) DEFAULT NULL,
  `LOCALIDAD` varchar(100) NOT NULL,
  `PROVINCIA` varchar(100) NOT NULL,
  `NUMERO_ZONA` int(11) NOT NULL,
  `NRO_CUIT_DNI` varchar(100) NOT NULL,
  `NRO_CTA_CTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(100) NOT NULL,
  `rubro` varchar(100) NOT NULL,
  `articulo` varchar(100) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `costo` varchar(100) DEFAULT NULL,
  `precio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `clave`, `rol`, `mail`) VALUES
(1, 'martin', 'martin', 'administrador', 'martin@mendoglass.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
