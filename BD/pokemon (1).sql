-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 14:20:48
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
-- Estructura de tabla para la tabla `pokedex`
--

CREATE TABLE `pokedex` (
  `id_pokedex` int(11) NOT NULL,
  `id_pokemon` int(11) NOT NULL,
  `id_maestro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokedex`
--

INSERT INTO `pokedex` (`id_pokedex`, `id_pokemon`, `id_maestro`) VALUES
(13, 62, 11),
(16, 63, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id_pokemon` int(11) NOT NULL,
  `id_maestro` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `type` varchar(400) NOT NULL,
  `image` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id_pokemon`, `id_maestro`, `name`, `type`, `image`) VALUES
(62, 11, 'charmander', 'fuego', '004.png'),
(63, 11, 'bulbasur', 'planta', '001.png'),
(64, 11, 'squirtle', 'agua', 'Squirtle.png'),
(65, 12, 'pidgeot', 'volador', 'Pidgeot.webp'),
(66, 11, 'charmander2', 'fuego', '17024.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `name` varchar(110) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `name`) VALUES
(0, 'admin'),
(1, 'maestroPokemon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `id_maestro` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`id_team`, `id_maestro`, `name`) VALUES
(112, 11, 'aa'),
(113, 11, 'equipo5'),
(114, 11, 'aaa'),
(115, 11, '');

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
(40, 112, 62),
(41, 112, 63),
(47, 112, 64),
(48, 112, 64),
(49, 112, 64),
(50, 113, 62),
(61, 113, 64),
(62, 113, 64),
(63, 113, 66),
(64, 113, 64),
(65, 114, 62),
(66, 114, 63),
(67, 114, 64),
(68, 114, 66),
(69, 114, 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`, `id_rol`) VALUES
(11, 'jose', '123', 0),
(12, 'pedro', '123', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokedex`
--
ALTER TABLE `pokedex`
  ADD PRIMARY KEY (`id_pokedex`),
  ADD KEY `id_user` (`id_maestro`),
  ADD KEY `id_pokemon` (`id_pokemon`);

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id_pokemon`),
  ADD KEY `id_user1` (`id_maestro`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`),
  ADD KEY `idUser` (`id_maestro`);

--
-- Indices de la tabla `team_pokemon`
--
ALTER TABLE `team_pokemon`
  ADD PRIMARY KEY (`id_team_pokemon`),
  ADD KEY `id_team` (`id_team`),
  ADD KEY `idpokemon` (`id_pokemon`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokedex`
--
ALTER TABLE `pokedex`
  MODIFY `id_pokedex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id_pokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `team_pokemon`
--
ALTER TABLE `team_pokemon`
  MODIFY `id_team_pokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pokedex`
--
ALTER TABLE `pokedex`
  ADD CONSTRAINT `id_pokemon` FOREIGN KEY (`id_pokemon`) REFERENCES `pokemon` (`id_pokemon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_maestro`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `id_user1` FOREIGN KEY (`id_maestro`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`id_maestro`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `team_pokemon`
--
ALTER TABLE `team_pokemon`
  ADD CONSTRAINT `id_team` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idpokemon` FOREIGN KEY (`id_pokemon`) REFERENCES `pokemon` (`id_pokemon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
