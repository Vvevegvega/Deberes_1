-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2026 a las 11:12:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` tinyint(4) NOT NULL,
  `max_lote` int(11) NOT NULL,
  `num_emojis` int(11) NOT NULL,
  `max_contactos` int(11) NOT NULL
) ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `max_lote`, `num_emojis`, `max_contactos`) VALUES
(1, 3, 10, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `codigousu` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` char(9) NOT NULL,
  `email` varchar(80) NOT NULL,
  `emoji` varchar(8) NOT NULL,
  `fecha` datetime NOT NULL
) ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `codigousu`, `nombre`, `apellidos`, `telefono`, `email`, `emoji`, `fecha`) VALUES
(1, 2, 'Laura', 'García Pérez', '612345678', 'laura.garcia@mail.com', '👽', '2026-11-01 10:15:00'),
(2, 2, 'Carlos', 'Martínez López', '623456789', 'carlos.martinez@mail.com', '🤖', '2026-11-05 18:30:00'),
(3, 2, 'Ana', 'Fernández Ruiz', '634567890', 'ana.fernandez@mail.com', '😾', '2026-11-12 09:45:00'),
(4, 2, 'Pablo', 'Sánchez Gómez', '645678901', 'pablo.sanchez@mail.com', '🧙‍♂️', '2026-11-20 20:10:00'),
(5, 3, 'María', 'Rodríguez Díaz', '656789012', 'maria.rodriguez@mail.com', '🌈', '2026-11-03 12:00:00'),
(6, 3, 'Jorge', 'Álvarez Torres', '667890123', 'jorge.alvarez@mail.com', '😆', '2026-11-18 16:25:00'),
(7, 2, 'Ivan', 'Vega', '666911485', 'esxivy11@gmail.com', '😾', '2026-11-25 11:11:10'),
(8, 2, 'Tania', 'Vega', '654397608', 'taniita@gmail.com', '🤺', '2026-11-25 11:11:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` tinyint(4) NOT NULL
) ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombre`, `clave`, `rol`) VALUES
(1, 'admin', '$2y$10$gUOFO1BpTz6YCSGsFgq2euoXytsEVnxpH9tG3se4XtYIeXgg6q51a', 1),
(2, 'usuario1', '$2y$10$ayXjAs7Adq8rsZyunMLAt.Q4NaW6fH0aDpWI6SWalfH.UonG6diN.', 0),
(3, 'usuario2', '$2y$10$CdtcZHvdwlq21YFuhb8nk.jacjOjKnE92JSawPaLk2c6krxYiS2Pe', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkContactosUsuarios` (`codigousu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `fkContactosUsuarios` FOREIGN KEY (`codigousu`) REFERENCES `usuarios` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
