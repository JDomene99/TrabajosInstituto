-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 00:57:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokemon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_pokemon`
--

CREATE TABLE `team_pokemon` (
  `id_team_pokemon` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `id_pokemon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `team_pokemon`
--

INSERT INTO `team_pokemon` (`id_team_pokemon`, `id_team`, `id_pokemon`) VALUES
(25, 102, 62),
(26, 102, 62),
(27, 102, 62),
(28, 102, 62),
(29, 102, 62);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `team_pokemon`
--
ALTER TABLE `team_pokemon`
  ADD PRIMARY KEY (`id_team_pokemon`),
  ADD KEY `id_team` (`id_team`),
  ADD KEY `idpokemon` (`id_pokemon`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `team_pokemon`
--
ALTER TABLE `team_pokemon`
  MODIFY `id_team_pokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `team_pokemon`
--
ALTER TABLE `team_pokemon`
  ADD CONSTRAINT `id_team` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idpokemon` FOREIGN KEY (`id_pokemon`) REFERENCES `pokemon` (`id_pokemon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
