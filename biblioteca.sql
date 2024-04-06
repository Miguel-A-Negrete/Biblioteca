-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2024 a las 21:32:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `AutorID` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellido` varchar(255) DEFAULT NULL,
  `Bio` text DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Nacionalidad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`AutorID`, `Nombre`, `Apellido`, `Bio`, `FechaNacimiento`, `Nacionalidad`) VALUES
(1, 'juan', 'rodriguez', 'hhhhh', '2024-04-02', 'colombia'),
(6, 'Juan', 'Rodrigo', 'dsda', '2020-04-02', 'Peru');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `EditorialID` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Direccion` text DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SitioWeb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`EditorialID`, `Nombre`, `Direccion`, `Telefono`, `Email`, `SitioWeb`) VALUES
(2, 'kkkkkk', 'cll40', '52225', 'correoS.com', 'kkkkkkk.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `GeneroID` int(11) NOT NULL,
  `NombreGenero` varchar(255) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Popularidad` int(11) DEFAULT NULL,
  `CantidadLibros` int(11) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`GeneroID`, `NombreGenero`, `Descripcion`, `Popularidad`, `CantidadLibros`, `FechaCreacion`) VALUES
(1, 'accion', 'accion', 123, 23, '2024-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `LibroID` int(11) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `AutorID` int(11) DEFAULT NULL,
  `EditorialID` int(11) DEFAULT NULL,
  `GeneroID` int(11) DEFAULT NULL,
  `FechaPublicacion` date DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `CantidadStock` int(11) DEFAULT NULL,
  `Paginas` int(11) DEFAULT NULL,
  `Idioma` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`AutorID`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`EditorialID`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`GeneroID`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`LibroID`),
  ADD KEY `AutorID` (`AutorID`),
  ADD KEY `EditorialID` (`EditorialID`),
  ADD KEY `GeneroID` (`GeneroID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `AutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `EditorialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `GeneroID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `LibroID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`AutorID`) REFERENCES `autores` (`AutorID`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`EditorialID`) REFERENCES `editoriales` (`EditorialID`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`GeneroID`) REFERENCES `generos` (`GeneroID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
