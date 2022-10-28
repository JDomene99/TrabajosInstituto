-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2022 a las 12:17:01
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
-- Base de datos: `pelis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `seccion` varchar(4000) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `imagen` varchar(70) NOT NULL,
  `autor` varchar(11) NOT NULL,
  `valoracion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`idArticle`, `date`, `seccion`, `tittle`, `imagen`, `autor`, `valoracion`) VALUES
(1, '2022-10-02 00:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'What is Lorem Ipsum?', 'pug.png', '1', 0),
(44, '2022-10-27 16:21:03', 'fasdfa', 'dasf', 'contacta con nosotros.png', '1', 0),
(45, '2022-10-26 21:21:26', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.', 'test 2', 'descarga2.jfif', '1', 0),
(46, '2022-10-26 21:21:54', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32', 'test3', 'descarga3.jfif', '1', 0),
(48, '2022-10-26 21:22:37', 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).', 'test 4', 'descarga4.jfif', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(10) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `hora` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comment`, `idUser`, `idArticle`, `comment`, `hora`, `estado`) VALUES
(2, 1, 1, 'adas', '2022-10-27 16:50:37', 1),
(3, 1, 1, 'dadas', '2022-10-27 17:11:15', 1),
(4, 1, 1, 'test', '2022-10-27 17:13:56', 1),
(6, 1, 1, 'saddfsfadSFDVF', '2022-10-27 17:22:19', 1),
(7, 1, 1, 'dadas', '2022-10-27 17:28:46', 1),
(8, 1, 1, 'dasda', '2022-10-27 17:33:10', 1),
(9, 1, 1, '1', '2022-10-27 17:33:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelis`
--

CREATE TABLE `pelis` (
  `name` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `imagen` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `name`) VALUES
(1, 'admin'),
(2, 'normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `image` varchar(50) NOT NULL,
  `id_rol` int(10) NOT NULL,
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `image`, `id_rol`, `valoracion`) VALUES
(1, 'jose', '123', 'profile1.png', 1, 0),
(4, 'paco', '123', 'profile2.png', 1, 0),
(5, 'javi', '123', 'profile.png', 2, 0),
(6, 'manuel', '123', 'profile.png', 2, 0),
(7, 'victorManuel', '123', 'profile.png', 2, 0),
(8, 'tomas', '123', 'profile.png', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `valoracion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id_user`, `id_article`, `valoracion`) VALUES
(1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `idUser` (`autor`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `idArticle` (`idArticle`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD UNIQUE KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`id_rol`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_article` (`id_article`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `idArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `id_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
