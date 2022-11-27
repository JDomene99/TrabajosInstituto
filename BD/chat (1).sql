-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2022 a las 12:40:11
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_chat`, `id_user1`, `id_user2`) VALUES
(39, 1, 2),
(40, 1, 2),
(41, 1, 2),
(42, 1, 2),
(43, 1, 2),
(44, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `message` varchar(40) NOT NULL,
  `incoming_msg` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_chat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id_message`, `message`, `incoming_msg`, `id_sala`, `date`, `id_chat`) VALUES
(54, 'manuel', 1, 0, '2022-11-24 17:14:02', 0),
(55, 'maquina', 1, 0, '2022-11-24 17:14:15', 0),
(56, 'maquina', 1, 0, '2022-11-24 17:14:21', 0),
(61, 'fiera', 1, 16, '2022-11-24 17:35:57', 0),
(64, 'eqeqw', 1, 16, '2022-11-24 17:42:29', 0),
(72, 'dads', 1, 16, '2022-11-24 17:49:08', 0),
(73, 'dads', 1, 16, '2022-11-24 17:49:27', 0),
(74, 'dad', 1, 16, '2022-11-24 17:49:31', 0),
(75, 'eqweq', 1, 2, '2022-11-24 17:51:59', 0),
(76, 'maquina', 1, 2, '2022-11-24 17:52:14', 0),
(77, 'dasa', 1, 2, '2022-11-24 17:55:10', 0),
(78, 'dad', 1, 2, '2022-11-24 17:56:36', 0),
(79, 'reqew', 1, 2, '2022-11-24 17:57:15', 0),
(80, 'dadas', 1, 2, '2022-11-24 17:57:50', 0),
(81, 'dasdada', 1, 2, '2022-11-24 17:59:17', 0),
(82, '31312', 1, 2, '2022-11-24 18:30:45', 0),
(83, 'afaef', 3, 2, '2022-11-24 18:38:18', 0),
(84, 'daddaa', 1, 19, '2022-11-24 18:42:46', 0),
(85, 'khuhuuhhu', 3, 24, '2022-11-24 18:43:08', 0),
(86, 'daddaa', 1, 19, '2022-11-24 18:43:14', 0),
(87, 'daddaa', 1, 19, '2022-11-24 18:43:20', 0),
(88, 'daddaa', 1, 19, '2022-11-24 18:43:22', 0),
(89, 'igig', 1, 16, '2022-11-24 18:49:06', 0),
(90, 'iugigi', 1, 25, '2022-11-24 18:49:26', 0),
(91, 'hola', 4, 21, '2022-11-24 19:01:28', 0),
(92, 'eqeqe', 1, 27, '2022-11-24 19:06:15', 0),
(93, 'eqeefqgfqwniq', 1, 28, '2022-11-24 19:07:10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `name` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `name`) VALUES
(0, 0),
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id_sala`, `id_user`, `name`) VALUES
(2, 1, 'sala1'),
(16, 1, 'sala6'),
(17, 1, 'adaddads'),
(18, 1, 'eqeqqe'),
(19, 4, 'te han hackeado'),
(20, 4, 'hola'),
(21, 4, 'hola'),
(22, 1, 'dad'),
(23, 4, 'hola'),
(24, 4, 'asdasd'),
(25, 4, 'asd'),
(26, 4, 'sda'),
(27, 4, 'ads'),
(28, 4, 'DROP TABLE users'),
(29, 4, 'xxx@xxx.xxx’ OR 1 = 1 LIMIT 1 '),
(30, 4, 'Qadir * DELETE FROM users'),
(31, 4, '\"sala\"; DROP TABLE room');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `online` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`, `id_rol`, `online`) VALUES
(1, 'jose', '123', 0, 1),
(2, 'pedro', '123', 0, 1),
(3, 'Rafa', 'hola', 0, 0),
(4, 'robert', '123', 0, 0),
(5, '“”=”', '123', 0, 0),
(6, '\" OR \"\"=\"', '\" OR \"\"=\"', 0, 0),
(7, '\"SELECT MAX(`timestamp`) FROM `entries', '123', 0, 0),
(8, 'Juanmi', '1234', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_user1` (`id_user1`),
  ADD KEY `id_user2` (`id_user2`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `idUser` (`incoming_msg`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `id_user1` FOREIGN KEY (`id_user1`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_user2` FOREIGN KEY (`id_user2`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`incoming_msg`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `salas`
--
ALTER TABLE `salas`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
