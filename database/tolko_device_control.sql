-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2023 a las 06:47:14
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tolko_device_control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `idAdmin` int(25) NOT NULL,
  `nombreAdmin` varchar(500) NOT NULL,
  `usuarioAdmin` varchar(25) NOT NULL,
  `fk_nivelAdmin` int(1) NOT NULL,
  `passwordAdmin` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`idAdmin`, `nombreAdmin`, `usuarioAdmin`, `fk_nivelAdmin`, `passwordAdmin`, `createdAt`, `modifiedAt`) VALUES
(1, 'MARIO SANDOVAL VELÁZQUEZ', 'MSANDOVAL', 1, 'MSANDOVAL', '2022-07-26 17:14:16', '2022-08-10 14:16:57'),
(32, 'BRUNO SALGADO', 'BSALGADO', 1, 'Bsalgado1!', '2023-05-04 06:08:43', '2023-08-05 05:41:13'),
(33, 'NANCY SALAZAR', 'NSALAZAR', 1, 'Nsalazar1!', '2023-08-05 05:41:45', '2023-08-05 05:42:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_area`
--

CREATE TABLE `empresa_area` (
  `id_empresaArea` int(250) NOT NULL,
  `nombre_empresaArea` varchar(200) NOT NULL,
  `empresa_jefeArea` varchar(350) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_area`
--

INSERT INTO `empresa_area` (`id_empresaArea`, `nombre_empresaArea`, `empresa_jefeArea`, `createdAt`, `modifiedAt`) VALUES
(1, 'PROGRAMACIÓN', 'BRUNO SALGADO', '2022-07-28 20:45:36', '2023-08-05 05:39:37'),
(2, 'DISEÑO', 'SERGIO', '2022-07-28 20:45:36', '2023-08-05 05:38:58'),
(3, 'ANIMACIÓN', 'ELÍ', '2022-07-28 20:45:36', '2023-08-05 05:39:25'),
(4, 'POST - VENTA', 'Araecli Herrera Gómez', '2022-07-28 20:45:36', '2022-08-04 19:31:18'),
(5, 'RELACIONES INSTITUCIONALES', 'Christian Vargas Gómez', '2022-07-28 20:45:36', '2022-08-04 19:31:35'),
(6, 'TITULACION', 'Blanca Estela Reyes Abrego', '2022-07-28 20:45:36', '2022-08-04 19:31:43'),
(7, 'MECADOTECNIA', 'Elba Teresa Aguirre López', '2022-07-28 20:45:36', '2022-08-04 19:31:47'),
(8, 'RECURSOS HUMANOS', 'Rogelio Islas Gonzáles', '2022-07-28 20:45:36', '2022-08-04 19:31:54'),
(9, 'COORDINACION ADMINISTRATIVA', 'Gerardo López Gonzáles', '2022-07-28 20:45:36', '2022-08-04 19:32:16'),
(10, 'DIRECCION GENERAL', 'Ismael Banderas Peñaloza', '2022-07-28 20:45:36', '2022-08-04 19:32:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_estado`
--

CREATE TABLE `equipo_estado` (
  `id_equipoEstado` int(11) NOT NULL,
  `nombre_equipoEstado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_estado`
--

INSERT INTO `equipo_estado` (`id_equipoEstado`, `nombre_equipoEstado`) VALUES
(1, 'EN FUNCIONAMIENTO'),
(2, 'DESCOMPUESTO'),
(3, 'ROBADO'),
(5, 'EXTRAVIADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_marca`
--

CREATE TABLE `equipo_marca` (
  `idMarca` int(250) NOT NULL,
  `nombreMarca` varchar(250) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_marca`
--

INSERT INTO `equipo_marca` (`idMarca`, `nombreMarca`, `createdAt`, `modifiedAt`) VALUES
(1, 'DELL', '2022-08-15 18:28:16', NULL),
(2, 'SAMSUNG', '2022-08-15 18:28:27', NULL),
(3, 'TOSHIBA', '2022-08-15 18:29:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_modelo`
--

CREATE TABLE `equipo_modelo` (
  `idModelo` int(250) NOT NULL,
  `nombreModelo` varchar(250) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_modelo`
--

INSERT INTO `equipo_modelo` (`idModelo`, `nombreModelo`, `createdAt`, `modifiedAt`) VALUES
(1, 'COMPAQ CQ1500LA', '2022-08-15 18:15:54', NULL),
(2, 'DELL OPTIPLEX 7070', '2022-08-15 18:16:04', '2022-08-15 18:16:32'),
(3, 'DELL INSPIRON 15', '2022-08-15 18:16:45', NULL),
(4, 'DELL INSPIRON 14', '2022-08-15 18:16:59', NULL),
(5, 'SAMSUNG SYNCMASTER 701N', '2022-08-15 18:17:22', NULL),
(6, 'HP L1910', '2022-08-15 18:17:32', NULL),
(7, 'HP COMPAQ DC5800', '2022-08-15 18:17:44', NULL),
(8, 'DELL OPTIPLEX 390', '2022-08-15 18:18:17', NULL),
(9, 'PC GENERICA', '2022-08-15 18:18:34', NULL),
(10, 'IMPRESORA DE MATRIZ DE PUNTO P170B', '2022-08-15 18:18:53', NULL),
(11, 'IMPRESORA SAMSUNG ML-2525', '2022-08-15 18:19:06', NULL),
(12, 'PANASONIC KX-TA308LA', '2022-08-15 18:19:21', NULL),
(13, 'DELL INSPIRON 15 P39F', '2022-08-16 22:00:06', NULL),
(14, 'DELL INSPIRON 15 P75F', '2022-08-16 22:00:16', NULL),
(15, 'DELL INSPIRON 5437', '2022-08-16 22:00:30', NULL),
(16, 'DELL INSPIRON P66F', '2022-08-16 22:00:41', NULL),
(17, 'DELL LATITUDE 3510', '2022-08-16 22:00:52', NULL),
(18, 'DELL LATITUDE 3520', '2022-08-16 22:01:00', NULL),
(19, 'DELL LATITUDE 5400', '2022-08-16 22:01:09', NULL),
(20, 'DELL LATITUDE 5420', '2022-08-16 22:01:18', NULL),
(21, 'DELL VOSTRO 14', '2022-08-16 22:01:25', NULL),
(22, 'DELL VOSTRO 3460', '2022-08-16 22:01:32', NULL),
(23, 'HP 14-CK1023LA', '2022-08-16 22:01:38', NULL),
(24, 'HP 250 G7', '2022-08-16 22:01:44', NULL),
(25, 'TOSHIBA SATELLITE B40', '2022-08-16 22:01:54', NULL),
(26, 'TOSHIBA SATELLITE L305', '2022-08-16 22:02:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_tipo`
--

CREATE TABLE `equipo_tipo` (
  `id_tipoEquipo` int(20) NOT NULL,
  `nombre_tipoEquipo` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_tipo`
--

INSERT INTO `equipo_tipo` (`id_tipoEquipo`, `nombre_tipoEquipo`, `createdAt`, `modifiedAt`) VALUES
(1, 'LAPTOP', '2023-08-05 05:32:51', '2023-08-05 05:38:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(250) NOT NULL,
  `usuarioNombre` varchar(800) DEFAULT NULL,
  `fk_usuarioArea` int(10) DEFAULT NULL,
  `usuarioPuesto` text DEFAULT NULL,
  `equipoNombre` text DEFAULT NULL,
  `fk_equipoEstado` int(11) DEFAULT 1,
  `fk_equipoTipo` int(10) DEFAULT NULL,
  `equipoMarca` varchar(250) DEFAULT NULL,
  `equipoModelo` varchar(100) DEFAULT NULL,
  `equipoProcesador` varchar(10) DEFAULT NULL,
  `equipoRam` varchar(10) DEFAULT NULL,
  `equipoDiscoDuro` varchar(10) DEFAULT NULL,
  `equipoNoSerie` text NOT NULL,
  `equipoNoInventario` text NOT NULL,
  `equipoPrecio` text DEFAULT NULL,
  `equipoPrecioLetra` varchar(50) DEFAULT NULL,
  `prestamoOtorgamiento` date DEFAULT NULL,
  `equipoObservaciones` varchar(800) DEFAULT NULL,
  `prestamoResponsiva` varchar(500) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idInventario`, `usuarioNombre`, `fk_usuarioArea`, `usuarioPuesto`, `equipoNombre`, `fk_equipoEstado`, `fk_equipoTipo`, `equipoMarca`, `equipoModelo`, `equipoProcesador`, `equipoRam`, `equipoDiscoDuro`, `equipoNoSerie`, `equipoNoInventario`, `equipoPrecio`, `equipoPrecioLetra`, `prestamoOtorgamiento`, `equipoObservaciones`, `prestamoResponsiva`, `createdAt`, `modifiedAt`) VALUES
(65, 'MARIO SANDOVAL VELÁZQUEZ', 1, 'MARIO SANDOVAL VELÁZQUEZ', 'AAA', 1, 1, 'ASUS', 'VIVOBOOK', 'INTEL CORE', '12GB', '1TB', '123', '123', '16,000', 'DIESCISEIS MIL', '2023-08-05', '', NULL, '2023-08-05 14:30:41', '2023-08-05 14:38:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_nivel`
--

CREATE TABLE `usuario_nivel` (
  `idNivel` int(11) NOT NULL,
  `nombreNivel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_nivel`
--

INSERT INTO `usuario_nivel` (`idNivel`, `nombreNivel`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `usuario_fk_nivel` (`fk_nivelAdmin`);

--
-- Indices de la tabla `empresa_area`
--
ALTER TABLE `empresa_area`
  ADD PRIMARY KEY (`id_empresaArea`);

--
-- Indices de la tabla `equipo_estado`
--
ALTER TABLE `equipo_estado`
  ADD PRIMARY KEY (`id_equipoEstado`);

--
-- Indices de la tabla `equipo_marca`
--
ALTER TABLE `equipo_marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `equipo_modelo`
--
ALTER TABLE `equipo_modelo`
  ADD PRIMARY KEY (`idModelo`);

--
-- Indices de la tabla `equipo_tipo`
--
ALTER TABLE `equipo_tipo`
  ADD PRIMARY KEY (`id_tipoEquipo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `usaurioArea_fk_area` (`fk_usuarioArea`),
  ADD KEY `equipoMarca_fk_marca` (`equipoMarca`),
  ADD KEY `equipoModelo_fk_modelo` (`equipoModelo`),
  ADD KEY `equipoTipo_fk_tipo` (`fk_equipoTipo`),
  ADD KEY `equipoEstado_fk_equipoEstado` (`fk_equipoEstado`);

--
-- Indices de la tabla `usuario_nivel`
--
ALTER TABLE `usuario_nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `idAdmin` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `empresa_area`
--
ALTER TABLE `empresa_area`
  MODIFY `id_empresaArea` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `equipo_estado`
--
ALTER TABLE `equipo_estado`
  MODIFY `id_equipoEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `equipo_marca`
--
ALTER TABLE `equipo_marca`
  MODIFY `idMarca` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `equipo_modelo`
--
ALTER TABLE `equipo_modelo`
  MODIFY `idModelo` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `equipo_tipo`
--
ALTER TABLE `equipo_tipo`
  MODIFY `id_tipoEquipo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `usuario_nivel`
--
ALTER TABLE `usuario_nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `usuario_fk_nivel` FOREIGN KEY (`fk_nivelAdmin`) REFERENCES `usuario_nivel` (`idNivel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `equipoEstado_fk_equipoEstado` FOREIGN KEY (`fk_equipoEstado`) REFERENCES `equipo_estado` (`id_equipoEstado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipoTipo_fk_tipo` FOREIGN KEY (`fk_equipoTipo`) REFERENCES `equipo_tipo` (`id_tipoEquipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaurioArea_fk_area` FOREIGN KEY (`fk_usuarioArea`) REFERENCES `empresa_area` (`id_empresaArea`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
