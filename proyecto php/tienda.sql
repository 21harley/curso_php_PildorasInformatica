-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2020 a las 00:53:42
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `Serial` varchar(30) DEFAULT NULL,
  `Nombre_evento` varchar(50) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ubicacion` varchar(50) DEFAULT NULL,
  `Usuario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `Nombre` varchar(40) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Alto` int(11) DEFAULT NULL,
  `Medio` int(11) DEFAULT NULL,
  `VIP` int(11) DEFAULT NULL,
  `Platino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`Nombre`, `Fecha`, `Alto`, `Medio`, `VIP`, `Platino`) VALUES
('fiesta playera', '2020-04-05', 100, 49, 20, 10),
('fiesta de halloween', '2020-10-31', 100, 51, 20, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Cedula` varchar(12) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Sexo` varchar(10) DEFAULT NULL,
  `Telefono` varchar(12) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Usuario` varchar(10) DEFAULT NULL,
  `Clave` varchar(10) DEFAULT NULL,
  `Acceso` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nombres`, `Apellidos`, `Cedula`, `Direccion`, `Sexo`, `Telefono`, `Correo`, `Usuario`, `Clave`, `Acceso`) VALUES
('John', 'llanes', 'V30853320', 'valle', 'hombre', '04247322600', 'john.llanes.1996@gmail.com', 'john177', '177', 'a'),
('John', 'llanes', 'E30853321', 'Valler', 'hombre', '04247322601', 'john.llanes.1991@gmail.com', 'john21', '1478', 'u');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
