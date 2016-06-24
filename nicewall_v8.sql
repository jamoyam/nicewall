-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2016 a las 02:56:30
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nicewall`
--
CREATE DATABASE IF NOT EXISTS `nicewall` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nicewall`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `descripcion`) VALUES
(0, 'Pizarra'),
(3, 'Infantil'),
(4, 'Comercios'),
(5, 'Otros Espacios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `rut`, `nombre`, `apellido`, `email`, `celular`, `Direccion_idDireccion`) VALUES
(10, '13413113', 'jose', 'moya', 'jamoyam@gmail.com', '992179094', 1),
(11, '134131136', 'jose', 'moya', 'jamoyam@gmail.com', '123456789', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `idColor` int(11) NOT NULL,
  `descripcionColor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idColor`, `descripcionColor`) VALUES
(1, 'Rojo'),
(2, 'Azul'),
(3, 'Verde'),
(4, 'Amarillo'),
(5, 'Negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleproducto`
--

DROP TABLE IF EXISTS `detalleproducto`;
CREATE TABLE IF NOT EXISTS `detalleproducto` (
  `iddetalleProducto` int(11) NOT NULL,
  `tipoDetalle` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `Producto_idProducto` int(11) NOT NULL,
  `Color_idColor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id_detalle` int(11) NOT NULL,
  `nombreProducto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE IF NOT EXISTS `direccion` (
  `idDireccion` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `descripcion`) VALUES
(1, 'Conchali'),
(2, 'Renca'),
(4, 'Huechuraba'),
(5, 'Providencia'),
(6, 'Las Condes'),
(7, 'Macul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `idPerfil` int(11) NOT NULL,
  `tipoPerfil` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `tipoPerfil`, `Descripcion`) VALUES
(1, 'Administrador', 'Super Administrador'),
(2, 'Cliente', 'Cliente solo realiza compras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre_producto`, `descripcion`, `image`, `precio`, `stock`, `id_color`, `Categoria_idCategoria`) VALUES
(1000, 'Pizarra Circular', 'Pizzarra Circular PequeÃ±a', '../Resources/images/pz5.jpg', 1000, 10, 1, 0),
(1001, 'Pizarra Castillo', 'Pizarra Castillo Grande', '../Resources/images/pz4.jpg', 200, 20, 4, 0),
(1002, 'Aviones de Papel', 'Aviones de Papel PequeÃ±os', '../Resources/images/04.jpg', 3000, 30, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(45) NOT NULL,
  `users` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `Perfil_idPerfil` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `users`, `pass`, `Perfil_idPerfil`) VALUES
(11, 'administrador', 'admin', '123', 1),
(12, 'jose', 'jamoyam', '1234', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idventa` int(11) NOT NULL,
  `fechaVenta` datetime NOT NULL,
  `totalVenta` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalleproducto`
--

DROP TABLE IF EXISTS `venta_detalleproducto`;
CREATE TABLE IF NOT EXISTS `venta_detalleproducto` (
  `venta_idventa` int(11) NOT NULL,
  `venta_Cliente_idCliente` int(11) NOT NULL,
  `venta_Direccion_idDireccion` int(11) NOT NULL,
  `detalleProducto_has_Color_detalleProducto_iddetalleProducto` int(11) NOT NULL,
  `detalleProducto_has_Color_detalleProducto_Producto_idProducto` int(11) NOT NULL,
  `detalleProducto_has_Color_detalleProducto_Color_idColor` int(11) NOT NULL,
  `detalleProducto_has_Color_Color_idColor` int(11) NOT NULL,
  `valorVentaProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`,`Direccion_idDireccion`),
  ADD KEY `Direccion_idDireccion` (`Direccion_idDireccion`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idColor`);

--
-- Indices de la tabla `detalleproducto`
--
ALTER TABLE `detalleproducto`
  ADD PRIMARY KEY (`iddetalleProducto`,`Producto_idProducto`,`Color_idColor`),
  ADD KEY `fk_detalleProducto_Producto1_idx` (`Producto_idProducto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `fk_detalle_venta_venta` (`id_venta`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`,`Categoria_idCategoria`),
  ADD KEY `fk_Producto_Categoria1_idx` (`Categoria_idCategoria`),
  ADD KEY `id_color` (`id_color`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`,`Perfil_idPerfil`),
  ADD KEY `fk_Usuario_Perfil_idx` (`Perfil_idPerfil`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`,`Cliente_idCliente`),
  ADD KEY `fk_venta_Cliente1_idx` (`Cliente_idCliente`);

--
-- Indices de la tabla `venta_detalleproducto`
--
ALTER TABLE `venta_detalleproducto`
  ADD PRIMARY KEY (`venta_idventa`,`venta_Cliente_idCliente`,`venta_Direccion_idDireccion`,`detalleProducto_has_Color_detalleProducto_iddetalleProducto`,`detalleProducto_has_Color_detalleProducto_Producto_idProducto`,`detalleProducto_has_Color_detalleProducto_Color_idColor`,`detalleProducto_has_Color_Color_idColor`),
  ADD KEY `fk_venta_has_detalleProducto_has_Color_detalleProducto_has__idx` (`detalleProducto_has_Color_detalleProducto_iddetalleProducto`,`detalleProducto_has_Color_detalleProducto_Producto_idProducto`,`detalleProducto_has_Color_detalleProducto_Color_idColor`,`detalleProducto_has_Color_Color_idColor`),
  ADD KEY `fk_venta_has_detalleProducto_has_Color_venta1_idx` (`venta_idventa`,`venta_Cliente_idCliente`,`venta_Direccion_idDireccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`);

--
-- Filtros para la tabla `detalleproducto`
--
ALTER TABLE `detalleproducto`
  ADD CONSTRAINT `fk_detalleProducto_Producto1` FOREIGN KEY (`Producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta_venta` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `color` (`idColor`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Perfil` FOREIGN KEY (`Perfil_idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
