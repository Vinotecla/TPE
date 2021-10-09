-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2021 a las 14:55:40
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_tipo` int(20) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_tipo`, `descripcion`, `tipo`) VALUES
(1, 'Un vino blanco se caracteriza por lo tanto, por su elaboración \"en virgen\", término con el que se define en enología la fermentación del mosto en ausencia de partes sólidas, a diferencia de un vino tinto o clarete donde la fermentación se realiza en presencia total o parcial de sus hollejos.\r\n', 'Blanco'),
(2, 'Es un vino de color rojo profundo con tonos violáceos. Se destaca por su gran intensidad aromática con notas de frutos negros y rojos, como cassis y grosellas maduras, muy bien ensambladas con especias dulces, pimiento rojo y notas características de la crianza en roble como vainilla y ahumados.\r\n', 'Cabernet'),
(3, 'La característica más sobresaliente del Malbec es su color oscuro intenso. Los aromas del Malbec recuerdan a cerezas, frutillas o ciruelas, pasas de uva y pimienta negra en algunos casos con reminiscencias de frutas cocidas (por ejemplo, mermelada), dependiendo de cuándo se haya realizado la cosecha.\r\n', 'Malbec'),
(4, 'Es un vino intenso, de aromas frescos, con algunas notas cítricas y minerales perfectamente equilibradas con toques de frutos rojos, frambuesas y grosellas.\r\n', 'Rosado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_users` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinos`
--

CREATE TABLE `vinos` (
  `id_vinos` int(11) NOT NULL,
  `id_tipo` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contenido` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vinos`
--

INSERT INTO `vinos` (`id_vinos`, `id_tipo`, `nombre`, `contenido`, `precio`) VALUES
(30, 3, 'ggg', 563, 53),
(31, 3, '53', 35, 543),
(32, 3, '453', 453, 453),
(37, 1, '', 0, 0),
(39, 4, '', 0, 0),
(45, 1, 'sg', 0, 0),
(46, 2, 'dh', 0, 0),
(47, 4, 'sdrh', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_users`);

--
-- Indices de la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD PRIMARY KEY (`id_vinos`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_tipo_2` (`id_tipo`),
  ADD KEY `id_tipo_3` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_tipo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_users` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vinos`
--
ALTER TABLE `vinos`
  MODIFY `id_vinos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD CONSTRAINT `vinos_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `categorias` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
