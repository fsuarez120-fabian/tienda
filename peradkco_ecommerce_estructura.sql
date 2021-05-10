-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-05-2021 a las 15:03:57
-- Versión del servidor: 10.2.37-MariaDB-cll-lve
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peradkco_ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE `administrator` (
  `idadministrator` int(11) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `name_admin` varchar(45) NOT NULL,
  `surname_admin` varchar(45) NOT NULL,
  `image_admin` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator_has_permission`
--

CREATE TABLE `administrator_has_permission` (
  `administrator_idadministrator` int(11) NOT NULL,
  `permission_idpermission` int(11) NOT NULL,
  `date_permission` varchar(45) NOT NULL,
  `active_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `name_category` varchar(45) NOT NULL,
  `price_category` double NOT NULL,
  `description_category` varchar(100) NOT NULL,
  `image_category` varchar(100) NOT NULL,
  `creationdate_category` varchar(45) NOT NULL,
  `route_category` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_has_size`
--

CREATE TABLE `category_has_size` (
  `category_idcategory` int(11) NOT NULL,
  `size_idsize` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `idcity` int(11) NOT NULL,
  `name_city` varchar(100) NOT NULL,
  `department_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `iddepartment` int(11) NOT NULL,
  `name_department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `link`
--

CREATE TABLE `link` (
  `id_link` int(11) NOT NULL,
  `url_link` varchar(100) NOT NULL,
  `order_link` varchar(45) NOT NULL,
  `date_link` varchar(45) NOT NULL,
  `hour_link` varchar(45) NOT NULL,
  `admin_link` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order`
--

CREATE TABLE `order` (
  `reference_order` varchar(45) NOT NULL,
  `date_order` varchar(45) NOT NULL,
  `product_price_order` double NOT NULL,
  `freight_price_order` double NOT NULL,
  `total_price_order` double NOT NULL,
  `state_order` varchar(45) NOT NULL,
  `shippinginfo_idshipinfo` varchar(45) NOT NULL,
  `consecutive_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_reference_order` varchar(45) NOT NULL,
  `product_reference` int(11) NOT NULL,
  `product_category_idcategory` int(11) NOT NULL,
  `size_idsize` varchar(45) NOT NULL,
  `quantity_orderdetails` int(11) NOT NULL,
  `unit_price_orderdetails` double NOT NULL,
  `observation_orderdetails` varchar(45) NOT NULL,
  `horma_orderdetails` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE `permission` (
  `idpermission` int(11) NOT NULL,
  `name_permission` varchar(45) NOT NULL,
  `description_permission` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `reference` int(11) NOT NULL,
  `category_idcategory` int(11) NOT NULL,
  `name_product` varchar(45) NOT NULL,
  `active_product` varchar(45) NOT NULL,
  `image_product` varchar(100) NOT NULL,
  `score_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servientrega`
--

CREATE TABLE `servientrega` (
  `idjourney` int(11) NOT NULL,
  `typejourney_idtypejourney` int(11) NOT NULL,
  `city_idcity_origin` int(11) NOT NULL,
  `city_idcity_destination` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shippinginfo`
--

CREATE TABLE `shippinginfo` (
  `idshipinfo` varchar(45) NOT NULL,
  `city_idcity` int(11) NOT NULL,
  `address_shippinginfo` varchar(100) NOT NULL,
  `neighborhood_shippinginfo` varchar(45) NOT NULL,
  `name_shippinginfo` varchar(45) NOT NULL,
  `surname_shippinginfo` varchar(45) NOT NULL,
  `typeid_shippinginfo` varchar(45) NOT NULL,
  `number_id_shippinginfo` varchar(45) NOT NULL,
  `number_phone_shippinginfo` varchar(45) NOT NULL,
  `email_shippinginfo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `size`
--

CREATE TABLE `size` (
  `idsize` varchar(45) NOT NULL,
  `description_size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sorteo`
--

CREATE TABLE `sorteo` (
  `id_sorteo` int(11) NOT NULL,
  `ip_sorteo` varchar(45) NOT NULL,
  `date_sorteo` varchar(45) NOT NULL,
  `hour_sorteo` varchar(45) NOT NULL,
  `id_order_sorteo` varchar(45) NOT NULL,
  `email_sorteo` varchar(45) NOT NULL,
  `price_order_sorteo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `idtransaction` varchar(45) NOT NULL,
  `reference_sale` varchar(45) DEFAULT NULL,
  `state_pol` varchar(45) DEFAULT NULL,
  `reference_pol` varchar(45) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `transaction_date` varchar(45) DEFAULT NULL,
  `cus` varchar(45) DEFAULT NULL,
  `pse_bank` varchar(45) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `payment_method_id` varchar(45) DEFAULT NULL,
  `response_message_pol` varchar(45) DEFAULT NULL,
  `payment_method_name` varchar(45) DEFAULT NULL,
  `sign` varchar(45) DEFAULT NULL,
  `key_sign` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typejourney`
--

CREATE TABLE `typejourney` (
  `idtypejourney` int(11) NOT NULL,
  `name_typejourney` varchar(45) NOT NULL,
  `price_typejourney` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idadministrator`);

--
-- Indices de la tabla `administrator_has_permission`
--
ALTER TABLE `administrator_has_permission`
  ADD PRIMARY KEY (`administrator_idadministrator`,`permission_idpermission`),
  ADD KEY `fk_administrator_has_permission_permission1` (`permission_idpermission`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indices de la tabla `category_has_size`
--
ALTER TABLE `category_has_size`
  ADD PRIMARY KEY (`category_idcategory`,`size_idsize`),
  ADD KEY `fk_category_has_size_size1` (`size_idsize`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idcity`),
  ADD KEY `department_city` (`department_city`) USING BTREE;

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`iddepartment`);

--
-- Indices de la tabla `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`),
  ADD KEY `fk_link_order` (`order_link`),
  ADD KEY `fk_link_admin` (`admin_link`);

--
-- Indices de la tabla `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`reference_order`),
  ADD KEY `fk_order_shippinginfo1` (`shippinginfo_idshipinfo`);

--
-- Indices de la tabla `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderdetails_order1` (`order_reference_order`),
  ADD KEY `fk_orderdetails_product1` (`product_reference`,`product_category_idcategory`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`idpermission`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`reference`,`category_idcategory`),
  ADD KEY `fk_product_category` (`category_idcategory`);

--
-- Indices de la tabla `servientrega`
--
ALTER TABLE `servientrega`
  ADD PRIMARY KEY (`idjourney`),
  ADD KEY `fk_servientrega_typejourney` (`typejourney_idtypejourney`),
  ADD KEY `fk_servientrega_city1` (`city_idcity_origin`),
  ADD KEY `fk_servientrega_city2` (`city_idcity_destination`);

--
-- Indices de la tabla `shippinginfo`
--
ALTER TABLE `shippinginfo`
  ADD PRIMARY KEY (`idshipinfo`),
  ADD KEY `fk_shippinginformation_city1` (`city_idcity`);

--
-- Indices de la tabla `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idsize`);

--
-- Indices de la tabla `sorteo`
--
ALTER TABLE `sorteo`
  ADD PRIMARY KEY (`id_sorteo`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`idtransaction`);

--
-- Indices de la tabla `typejourney`
--
ALTER TABLE `typejourney`
  ADD PRIMARY KEY (`idtypejourney`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission`
--
ALTER TABLE `permission`
  MODIFY `idpermission` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sorteo`
--
ALTER TABLE `sorteo`
  MODIFY `id_sorteo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `typejourney`
--
ALTER TABLE `typejourney`
  MODIFY `idtypejourney` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrator_has_permission`
--
ALTER TABLE `administrator_has_permission`
  ADD CONSTRAINT `fk_administrator_has_permission_administrator1` FOREIGN KEY (`administrator_idadministrator`) REFERENCES `administrator` (`idadministrator`),
  ADD CONSTRAINT `fk_administrator_has_permission_permission1` FOREIGN KEY (`permission_idpermission`) REFERENCES `permission` (`idpermission`);

--
-- Filtros para la tabla `category_has_size`
--
ALTER TABLE `category_has_size`
  ADD CONSTRAINT `fk_category_has_size_category1` FOREIGN KEY (`category_idcategory`) REFERENCES `category` (`idcategory`),
  ADD CONSTRAINT `fk_category_has_size_size1` FOREIGN KEY (`size_idsize`) REFERENCES `size` (`idsize`);

--
-- Filtros para la tabla `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`department_city`) REFERENCES `department` (`iddepartment`);

--
-- Filtros para la tabla `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `fk_link_admin` FOREIGN KEY (`admin_link`) REFERENCES `administrator` (`idadministrator`),
  ADD CONSTRAINT `fk_link_order` FOREIGN KEY (`order_link`) REFERENCES `order` (`reference_order`);

--
-- Filtros para la tabla `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_shippinginfo1` FOREIGN KEY (`shippinginfo_idshipinfo`) REFERENCES `shippinginfo` (`idshipinfo`);

--
-- Filtros para la tabla `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orderdetails_order1` FOREIGN KEY (`order_reference_order`) REFERENCES `order` (`reference_order`),
  ADD CONSTRAINT `fk_orderdetails_product1` FOREIGN KEY (`product_reference`,`product_category_idcategory`) REFERENCES `product` (`reference`, `category_idcategory`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_idcategory`) REFERENCES `category` (`idcategory`);

--
-- Filtros para la tabla `servientrega`
--
ALTER TABLE `servientrega`
  ADD CONSTRAINT `fk_servientrega_city1` FOREIGN KEY (`city_idcity_origin`) REFERENCES `city` (`idcity`),
  ADD CONSTRAINT `fk_servientrega_city2` FOREIGN KEY (`city_idcity_destination`) REFERENCES `city` (`idcity`),
  ADD CONSTRAINT `fk_servientrega_typejourney` FOREIGN KEY (`typejourney_idtypejourney`) REFERENCES `typejourney` (`idtypejourney`);

--
-- Filtros para la tabla `shippinginfo`
--
ALTER TABLE `shippinginfo`
  ADD CONSTRAINT `fk_shippinginformation_city1` FOREIGN KEY (`city_idcity`) REFERENCES `city` (`idcity`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
