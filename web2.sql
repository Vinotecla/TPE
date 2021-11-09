-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2021 a las 04:48:15
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
(43, '', 1, 106),
(44, '', 1, 106),
(78, 'BUEN SABOR', 3, 96),
(79, 'NO BORRA', 3, 96),
(80, 'SARASA', 3, 96),
(81, 'ENVIANDO', 5, 96),
(82, 'SATURNO', 4, 96),
(83, 'SILVER', 4, 96),
(84, 'ONE', 1, 96),
(97, 'SARASA', 1, 113),
(98, 'NO BORRA', 5, 113),
(99, 'ahora', 3, 113),
(100, 'BUEN SABOR', 1, 98),
(101, 'SARASA', 4, 98),
(102, 'NO BORRA', 2, 98),
(103, 'INTENSO', 1, 106),
(104, 'INTENSO', 1, 106),
(105, 'SUAVE', 5, 106),
(106, 'CREMOSO', 2, 106),
(107, 'SABADO', 1, 109),
(108, 'LECHUGA', 3, 109),
(109, 'NORUEGA', 4, 109),
(110, 'BUEN SABOR', 4, 110),
(111, 'RITMO', 3, 110),
(112, 'SARASA', 2, 110);

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
(13, 'noadmin', '$2y$10$0tFeBRXcKEuM2U50KpR7k.8nOiZ8zVdwcgJurpaEa1RONaYW/WTpS', NULL);

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
(110, 2, 'Alaris', 1000, 200);

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
  MODIFY `id_tipo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_users` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `vino`
--
ALTER TABLE `vino`
  MODIFY `id_vinos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

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
