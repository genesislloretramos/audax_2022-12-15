-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-12-2022 a las 19:27:57
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `audax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `info` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id`, `user`, `date`, `info`, `url`) VALUES
(5, 11, '2022-12-15 18:31:25', 'ID: 11\nnombre: asd\nemail: asd@asd.asd\nnumero de contrato: 167112548516711254852580', 'docs/167112548516711254852580.pdf'),
(6, 11, '2022-12-15 18:32:02', 'ID: 11\nnombre: asd\nemail: asd@asd.asd\nnumero de contrato: 167112552216711255222087', 'docs/167112552216711255222087.pdf'),
(7, 11, '2022-12-15 18:32:03', 'ID: 11\nnombre: asd\nemail: asd@asd.asd\nnumero de contrato: 167112552316711255238112', 'docs/167112552316711255238112.pdf'),
(8, 11, '2022-12-15 18:32:04', 'ID: 11\nnombre: asd\nemail: asd@asd.asd\nnumero de contrato: 167112552416711255246856', 'docs/167112552416711255246856.pdf'),
(9, 11, '2022-12-15 18:32:05', 'ID: 11\nnombre: asd\nemail: asd@asd.asd\nnumero de contrato: 167112552516711255253874', 'docs/167112552516711255253874.pdf'),
(10, 11, '2022-12-15 18:32:06', 'ID: 11\nnombre: asd\nemail: asd@asd.asd\nnumero de contrato: 167112552616711255263413', 'docs/167112552616711255263413.pdf'),
(11, 11, '2022-12-15 18:32:06', 'ID: 11\nnombre: asd\nemail: asd@asd.asd\nnumero de contrato: 167112552616711255269355', 'docs/167112552616711255269355.pdf'),
(12, 15, '2022-12-15 19:25:17', 'ID: 15\nnombre: genesis\nemail: genesislloret@gmail.com\nnumero de contrato: 167112871716711287172871', 'docs/167112871716711287172871.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(11, 'asd', 'asd@asd.asd', 'a8f5f167f44f4964e6c998dee827110c'),
(14, 'qwe@qwe.qwe', 'qwe@qwe.qwe', 'b30e10606090ad4f797ecc115199699f'),
(15, 'genesis', 'genesislloret@gmail.com', '4297f44b13955235245b2497399d7a93');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
