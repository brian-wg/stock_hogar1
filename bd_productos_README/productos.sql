-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2022 a las 22:36:16
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(50) NOT NULL,
  `usuario_fk` int(10) UNSIGNED DEFAULT NULL,
  `producto` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `cantidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `usuario_fk`, `producto`, `marca`, `cantidad`) VALUES
(5, NULL, 'Arroz', 'gallo', 2),
(6, NULL, 'milanga', 'paladini', 50),
(7, 13, 'salsa', 'chancha', 40),
(8, 13, 'salame', 'paladini', 60),
(9, 1, 'milanga', 'paladini', 2),
(10, 13, 'fideos', 'matarazzo', 4),
(11, 13, 'cafe', 'la virginia', 8),
(12, 13, 'pan', 'fargo', 1),
(13, 1, 'azucar', 'chango', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `email`) VALUES
(1, 'brian_wg', '$2y$10$FKUlL7j6zM44HU6xE4ED4e7iuTjKIAyP2FEOtqPaArACwRFcuReqy', 'brian', 'villarreal', 'brian_wg@hotmail.com'),
(2, 'maria_db', '$2y$10$6I.X3d7vf9mCLrf3rTQrgOT5HhVcqOmkeMsIclr4n59vveL61px.m', 'maria', 'db', 'mariadb@gmail.com'),
(3, 'roberto12', '$2y$10$VHKltay14k7048rQwRgRaeYAzcXszvet3qFttGsB.eF0kLRCC2M/.', 'roberto', 'vazquez', 'robert@gmail.com'),
(8, 'pipo1234', '$2y$10$bDehLWrmmrRP3KjTSXQUy.63ArDXOiAlpyeQSNHABbFM2a6kjzquy', 'pipo', '1234', 'asdasd@hotmail.com'),
(9, 'pepo1234', '$2y$10$WO20HxvH0Zp9SfMjl1Nh4OnLetMZF.0NI1FbTJLolYZwxexpMXi2q', 'pepo', '1234', 'aasdasdsdasd@hotmail.com'),
(10, 'popo1234', '$2y$10$/v/E9xRr4MB7i6EpWzkSZODp2u0EWj5y3bUbq2mt4GuNLP9rUxfRy', 'popo', '1234', 'aasdasdsdddasd@hotmail.com'),
(13, 'b2', '$2y$10$ZxDOpDJO3QqsWPaGLoCc1eGT8ek/1I2gRa0rO4bvg62qC3Sedeh1e', 'Brian', 'Denis Villarreal', 'Brian_wg@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `usuario` (`usuario_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`usuario_fk`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
