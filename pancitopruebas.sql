-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2020 a las 00:32:23
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pancitopruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajero`
--

CREATE TABLE `cajero` (
  `VNDCEDULA` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `VNDNOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `VNDAPELLIDO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `VNDUSUARIO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `VNDCONTRA` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `VNDCORREO` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `VNDESTADO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cajero`
--

INSERT INTO `cajero` (`VNDCEDULA`, `VNDNOMBRE`, `VNDAPELLIDO`, `VNDUSUARIO`, `VNDCONTRA`, `VNDCORREO`, `VNDESTADO`) VALUES
('1724482094', 'Jefferson', 'Ona', 'jeffqev', '12345', 'jeff.qev@gmail.com', 1),
('1724482096', 'Jefferson', 'Lascano', 'admin', 'admin', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CLIECEDULA` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `CLIENOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CLIEAPELLIDO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CLIENACIMIENTO` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CLIECORREO` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `CLIEDIRECCION` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `CLIECIUDAD` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CLIEPROVINCIA` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CLIETELEFONO` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CLIEESTADO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CLIECEDULA`, `CLIENOMBRE`, `CLIEAPELLIDO`, `CLIENACIMIENTO`, `CLIECORREO`, `CLIEDIRECCION`, `CLIECIUDAD`, `CLIEPROVINCIA`, `CLIETELEFONO`, `CLIEESTADO`) VALUES
('1724033046', 'Jefferson', 'Gonzalo', '1994-12-18', 'jfcrew@live.com', 'av.alonso de angulo', 'Quito', 'Quito', '0978798832', 1),
('1724482080', 'Gonzalo ', 'Lascano', '1996-12-29', 'asdad@asdahsd.com', 'av.alonso de angulo', 'Quito', 'Quito', '0837138593', 1),
('1724482094', 'Jefferson', 'Diaz', '2019-07-22 01:02:57', 'jeff.qev@gmail.com', 'La ecuatoriana', 'Quito', 'Pichincha', '0932384523', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `DETID` int(11) NOT NULL,
  `PRODID` int(11) DEFAULT NULL,
  `FACTNUM` int(11) DEFAULT NULL,
  `DETCANTIDAD` int(11) NOT NULL,
  `DETPRECIOVENTA` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`DETID`, `PRODID`, `FACTNUM`, `DETCANTIDAD`, `DETPRECIOVENTA`) VALUES
(0, 0, 1, 2, '0.24'),
(1, 1, 1, 1, '0.15'),
(2, 1, 0, 2, '0.30'),
(3, 0, 0, 1, '0.12'),
(4, 5, 2, 1, '0.80'),
(5, 3, 2, 2, '0.24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `FACTNUM` int(11) NOT NULL,
  `CLIECEDULA` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `VNDCEDULA` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FACTFECHA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FACTTOTAL` decimal(10,2) DEFAULT NULL,
  `FACTESTADO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`FACTNUM`, `CLIECEDULA`, `VNDCEDULA`, `FACTFECHA`, `FACTTOTAL`, `FACTESTADO`) VALUES
(0, '1724482094', '1724482094', '2019-07-26 05:58:12', '0.42', 1),
(1, '1724482094', '1724482094', '2019-07-26 05:53:06', '0.39', 1),
(2, '1724033046', '1724482094', '2019-07-26 21:21:34', '1.04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `INGID` int(11) NOT NULL,
  `MPID` int(11) DEFAULT NULL,
  `RECID` int(11) DEFAULT NULL,
  `INGCANTIDAD` decimal(10,0) NOT NULL,
  `INGCOSTO` decimal(11,2) NOT NULL,
  `INGESTADO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`INGID`, `MPID`, `RECID`, `INGCANTIDAD`, `INGCOSTO`, `INGESTADO`) VALUES
(0, 1, 2, '1', '2.00', 1),
(1, 1, 2, '1', '2.00', 1),
(2, 3, 4, '1', '0.80', 1),
(3, 1, 2, '1', '2.00', 1),
(4, 3, 5, '1', '0.80', 1),
(5, 4, 5, '1', '2.00', 1),
(6, 1, 6, '1', '2.00', 1),
(7, 3, 6, '1', '1.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima`
--

CREATE TABLE `materiaprima` (
  `MPID` int(11) NOT NULL,
  `MEDID` int(11) DEFAULT NULL,
  `PROVRUC` char(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MPDECIPCION` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `MPCOSTO` decimal(10,2) NOT NULL,
  `MPCANTIDAD` decimal(10,0) NOT NULL,
  `MPESTADO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materiaprima`
--

INSERT INTO `materiaprima` (`MPID`, `MEDID`, `PROVRUC`, `MPDECIPCION`, `MPCOSTO`, `MPCANTIDAD`, `MPESTADO`) VALUES
(1, 1, '1723491238', 'Harina', '2.34', '1', 1),
(2, 1, '1723491238', 'Harina Integral', '3.50', '1', 1),
(3, 1, '1723491238', 'Leche', '0.80', '1', 1),
(4, 1, '124i53235', 'Anis', '4.00', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `MEDID` int(11) NOT NULL,
  `MEDTIPO` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medida`
--

INSERT INTO `medida` (`MEDID`, `MEDTIPO`) VALUES
(1, 'kg'),
(2, 'lt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `PRODID` int(11) NOT NULL,
  `RECID` int(11) DEFAULT NULL,
  `PRODFECHA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PRODCANTIDAD` int(11) NOT NULL,
  `PRODESTADO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`PRODID`, `RECID`, `PRODFECHA`, `PRODCANTIDAD`, `PRODESTADO`) VALUES
(0, 1, '2019-07-21 09:12:26', 5, 1),
(1, 2, '2019-07-21 08:17:06', 5, 1),
(2, 2, '2019-07-26 10:12:11', 3, 1),
(3, 4, '2019-07-26 20:47:29', 3, 1),
(4, 5, '2019-07-26 21:19:39', 2, 1),
(5, 5, '2019-07-26 21:19:50', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `PROVRUC` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `PROVNOMBRE` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `PROVCORREO` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `PROVDIRECCION` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `PROVESTADO` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`PROVRUC`, `PROVNOMBRE`, `PROVCORREO`, `PROVDIRECCION`, `PROVESTADO`) VALUES
('124i53235', 'Dialpi', 'Dialpi@gmail.com', 'villaflora', '1'),
('1723491238', 'Prodicerea', 'ajskda@ash', 'napo', '1'),
('1743213235', 'Ogiberri', 'Ogiberri@gmail.com', 'bella vista', '1'),
('1743253235', 'Dulces Artesanos', 'dulcear@gmail.com', 'parque ejido', '1'),
('1754i53235', 'Panabad', 'Panabad@gmail.com', 'Real audiencia', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `RECID` int(11) NOT NULL,
  `RECNOMBRE` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `RECCOSTO` decimal(10,2) NOT NULL,
  `RECESTADO` int(11) DEFAULT NULL,
  `RECPRECIO` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`RECID`, `RECNOMBRE`, `RECCOSTO`, `RECESTADO`, `RECPRECIO`) VALUES
(1, 'Pan de migas', '0.00', 1, '0.12'),
(2, 'Pan cachito', '0.00', 1, '0.15'),
(3, 'Pan Integral', '0.00', 1, '0.14'),
(4, 'Pan rosa', '0.00', 1, '0.12'),
(5, 'Pancake', '0.00', 1, '0.80'),
(6, 'Enrollado de dulce', '0.00', 1, '0.30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajero`
--
ALTER TABLE `cajero`
  ADD PRIMARY KEY (`VNDCEDULA`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CLIECEDULA`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`DETID`),
  ADD KEY `FK_RELATIONSHIP_4` (`PRODID`),
  ADD KEY `FK_RELATIONSHIP_5` (`FACTNUM`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`FACTNUM`),
  ADD KEY `FK_RELATIONSHIP_6` (`CLIECEDULA`),
  ADD KEY `FK_RELATIONSHIP_7` (`VNDCEDULA`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`INGID`),
  ADD KEY `FK_RELATIONSHIP_1` (`MPID`),
  ADD KEY `FK_RELATIONSHIP_2` (`RECID`);

--
-- Indices de la tabla `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`MPID`),
  ADD KEY `FK_RELATIONSHIP_8` (`MEDID`),
  ADD KEY `FK_RELATIONSHIP_9` (`PROVRUC`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`MEDID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`PRODID`),
  ADD KEY `FK_RELATIONSHIP_3` (`RECID`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`PROVRUC`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`RECID`),
  ADD UNIQUE KEY `RECNOMBRE` (`RECNOMBRE`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`PRODID`) REFERENCES `producto` (`PRODID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`FACTNUM`) REFERENCES `factura` (`FACTNUM`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`CLIECEDULA`) REFERENCES `cliente` (`CLIECEDULA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`VNDCEDULA`) REFERENCES `cajero` (`VNDCEDULA`);

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`MPID`) REFERENCES `materiaprima` (`MPID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`RECID`) REFERENCES `receta` (`RECID`);

--
-- Filtros para la tabla `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`MEDID`) REFERENCES `medida` (`MEDID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`PROVRUC`) REFERENCES `proveedores` (`PROVRUC`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`RECID`) REFERENCES `receta` (`RECID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
