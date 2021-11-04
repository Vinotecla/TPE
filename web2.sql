-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2021 a las 05:33:01
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_tipo` int(20) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_tipo`, `descripcion`, `tipo`) VALUES
(2, 'El cabernet ofrece un sabor balsámico, frutal, limpio y brillante ofreciendo una buena estructuración en la boca. La grosella negra y las moras resaltan en el paladar, además presenta una clara acidez.', 'Cabernet'),
(3, 'La característica más sobresaliente del Malbec es su color oscuro intenso. Los aromas del Malbec recuerdan a cerezas, frutillas o ciruelas, pasas de uva y pimienta negra en algunos casos con reminiscencias de frutas cocidas (por ejemplo, mermelada), dependiendo de cuándo se haya realizado la cosecha.\r\n', 'Malbec'),
(4, 'Es un vino intenso, de aromas frescos, con algunas notas cítricas y minerales perfectamente equilibradas con toques de frutos rojos, frambuesas y grosellas.\r\n', 'Rosado'),
(5, 'El vino blanco se produce por la fermentación alcohólica de la pulpa no coloreada de uvas que pueden ser tanto blancas como negras, porque es el único vino que se puede elaborar con cualquier tipo de uva, con independencia de su color.', 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `puntaje` int(11) NOT NULL,
  `id_vino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario`, `puntaje`, `id_vino`) VALUES
(33, '', 1, 96),
(36, '', 1, 96),
(43, '', 1, 106),
(44, '', 1, 106);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_users` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `Admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_users`, `email`, `password`, `Admin`) VALUES
(12, 'admin', '$2y$10$zv3icaqL2.m1/eDYewfwyOdH.yrG6EhVpqYQHseBLWB2uvEn0MJWa', 1),
(13, 'noadmin', '$2y$10$0tFeBRXcKEuM2U50KpR7k.8nOiZ8zVdwcgJurpaEa1RONaYW/WTpS', NULL),
(16, 'Chau@gmail.com', '$2y$10$fH4aViJcm4wm9y0kVqHibeVbtWs9Qg0LSGEINgYCXPj0AeDN/ItWK', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vino`
--

CREATE TABLE `vino` (
  `id_vinos` int(11) NOT NULL,
  `id_tipo` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contenido` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vino`
--

INSERT INTO `vino` (`id_vinos`, `id_tipo`, `nombre`, `contenido`, `precio`) VALUES
(96, 3, 'Toro Viejo', 786, 400),
(98, 4, 'Benjamin', 1000, 1000),
(106, 4, 'Santa Julia', 750, 0),
(109, 4, 'Dada', 0, 0),
(110, 5, '´Alaris', 0, 0),
(112, 5, 'Benjamin', 750, 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_users`);

--
-- Indices de la tabla `vino`
--
ALTER TABLE `vino`
  ADD PRIMARY KEY (`id_vinos`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_tipo_2` (`id_tipo`),
  ADD KEY `id_tipo_3` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_tipo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_users` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `vino`
--
ALTER TABLE `vino`
  MODIFY `id_vinos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vino`
--
ALTER TABLE `vino`
  ADD CONSTRAINT `vino_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `categoria` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
