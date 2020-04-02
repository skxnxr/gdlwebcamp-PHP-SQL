-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-04-2020 a las 21:44:53
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime DEFAULT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(1, 'admin', 'Skyner', '$2y$10$/wzeqr3EP2OsKylCeImzheW3S7GstFfaIl3zaNXyCS2fcU671YWvm', '2020-03-28 01:37:38', 1),
(5, 'admin5', 'Skyner', '$2y$10$eCwuA3FheoZ1BQWQGqDfjed5tmIhw8bZObO5Kk9TdTCcDZFuQaTFa', '2020-03-28 01:37:38', 0),
(16, 'Admin10', 'Pablo200', '$2y$12$ylF/kq7QlAooI8KX3Ft2geLI70uAiTLBPHI0H6qWo43EdBhU54FxO', '2020-03-28 01:45:44', 0),
(18, 'ww', 'ww', '$2y$10$ou71qhepFkT57zbadIlUOOcQJ25CkVw7gdUHRM1lC75EgWylRXAOm', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminario', 'fa-university', NULL),
(2, 'Conferencias', 'fa-comment', '2020-04-01 04:40:51'),
(3, 'Talleres', 'fa-code', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(200) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(47, 'Responsive Web Design', '2020-05-01', '10:00:00', 3, 1, 'taller_01', NULL),
(48, 'Flexbox', '2020-05-01', '12:00:00', 3, 2, 'taller_02', NULL),
(49, 'HTML5 y CSS3', '2020-05-01', '14:00:00', 3, 3, 'taller_03', NULL),
(50, 'Drupal', '2020-05-01', '17:00:00', 3, 4, 'taller_04', NULL),
(51, 'WordPress', '2020-05-01', '19:00:00', 3, 5, 'taller_05', NULL),
(52, 'Como ser freelancer', '2020-05-01', '10:00:00', 2, 6, 'conf_01', NULL),
(53, 'Tecnologías del Futuro', '2020-05-01', '17:00:00', 2, 1, 'conf_02', NULL),
(54, 'Seguridad en la Web 2.0', '2020-05-01', '19:00:00', 2, 2, 'conf_03', '2020-03-30 01:46:56'),
(55, 'Diseño UI y UX para móviles', '2020-05-01', '10:00:00', 1, 6, 'sem_01', NULL),
(56, 'AngularJS', '2020-05-02', '10:00:00', 3, 1, 'taller_06', NULL),
(57, 'PHP y MySQL', '2020-05-02', '12:00:00', 3, 2, 'taller_07', NULL),
(58, 'JavaScript Avanzado', '2020-05-02', '14:00:00', 3, 3, 'taller_08', NULL),
(59, 'SEO en Google', '2020-05-02', '17:00:00', 3, 4, 'taller_09', NULL),
(60, 'De Photoshop a HTML5 y CSS3', '2020-05-02', '19:00:00', 3, 5, 'taller_10', NULL),
(61, 'PHP Intermedio y Avanzado', '2020-05-02', '21:00:00', 3, 6, 'taller_11', NULL),
(62, 'Como crear una tienda online que venda millones en pocos días', '2020-05-02', '10:00:00', 2, 6, 'conf_04', NULL),
(63, 'Los mejores lugares para encontrar trabajo', '2020-05-02', '17:00:00', 2, 1, 'conf_05', NULL),
(64, 'Pasos para crear un negocio rentable ', '2020-05-02', '19:00:00', 2, 2, 'conf_06', NULL),
(65, 'Aprende a Programar en una mañana', '2020-05-02', '10:00:00', 1, 3, 'sem_02', NULL),
(66, 'Diseño UI y UX para móviles', '2020-05-02', '17:00:00', 1, 5, 'sem_03', NULL),
(67, 'Laravel', '2020-05-03', '10:00:00', 3, 1, 'taller_12', NULL),
(68, 'Crea tu propia API', '2020-05-03', '12:00:00', 3, 2, 'taller_13', NULL),
(69, 'JavaScript y jQuery', '2020-05-03', '14:00:00', 3, 3, 'taller_14', NULL),
(70, 'Creando Plantillas para WordPress', '2020-05-03', '17:00:00', 3, 4, 'taller_15', NULL),
(71, 'Tiendas Virtuales en Magento', '2020-05-03', '19:00:00', 3, 5, 'taller_16', NULL),
(72, 'Como hacer Marketing en línea', '2020-05-03', '10:00:00', 2, 6, 'conf_07', NULL),
(73, '¿Con que lenguaje debo empezar?', '2020-05-03', '17:00:00', 2, 2, 'conf_08', NULL),
(74, 'Frameworks y librerias Open Source', '2020-05-03', '19:00:00', 2, 3, 'conf_09', NULL),
(75, 'Creando una App en Android en una mañana', '2020-05-03', '10:00:00', 1, 4, 'sem_04', NULL),
(76, 'Creando una App en iOS en una tarde', '2020-05-03', '17:00:00', 1, 1, 'sem_05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL,
  `editado` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`, `editado`) VALUES
(1, 'Rafael', 'Bautista', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado1.jpg', NULL),
(2, 'Shari', 'Herrera', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado2.jpg', NULL),
(3, 'Gregorio', 'Sanchez', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado3.jpg', NULL),
(4, 'Susana', 'Rivera', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado4.jpg', NULL),
(5, 'Harold', 'Garcia', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado5.jpg', NULL),
(6, 'Susan ', 'Sanchez', 'Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado6.jpg', NULL),
(7, 'Juan Pablo', 'De la ', 'qwqws', '1491635_784977631515939_1795067403_n.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `id_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Bolígrafo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `id_registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`id_registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`) VALUES
(1, 'Skyner', 'Alvarez', 'sacwks@gmail.com', '2020-04-03 17:24:40', '{\"un_dia\":2,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\",\"conf_03\",\"conf_05\",\"conf_08\"]}', 2, '166.3', 0),
(2, 'Skyner', 'Alvarez', 'sacwks@gmail.com', '2020-03-19 17:24:56', '{\"un_dia\":2,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\",\"conf_03\",\"conf_05\",\"conf_08\"]}', 2, '166.3', 1),
(3, 'A40 Pedro', 's', 'alvarezskarlyn@gmail.com', '2020-03-17 17:40:10', '{\"un_dia\":1,\"camisas\":1}', '{\"eventos\":[\"taller_01\",\"conf_03\",\"sem_01\"]}', 2, '39.3', 1),
(25, 'Skyner', 'Alvarez', 'sacwks@gmail.com', '2020-03-25 02:33:09', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1}', '{\"eventos\":[\"taller_01\"]}', 2, '30', 1),
(26, 'Skyner', 'Alvarez', 'sacwks@gmail.com', '2020-03-25 02:38:31', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1}', '{\"eventos\":[\"taller_04\",\"taller_05\"]}', 2, '30', 1),
(27, 'Chino', 'Alvarez', 'taylorhcasio@gmail.com', '2020-03-25 02:53:11', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1}', '{\"eventos\":[\"conf_01\"]}', 2, '30', 0),
(28, 'Chino', 'ALVAREZ CARVAJAL', 'sacwks@gmail.com', '2020-03-25 03:00:59', '{\"un_dia\":{\"cantidad\":\"\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '[]', 3, '0', 1),
(29, 'Skyner', 's', 'sacwks@gmail.com', '2020-03-25 03:20:29', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1}', '{\"eventos\":[\"taller_05\"]}', 2, '30', 0),
(30, 'Skyner', 'Alvarez', 'sacwks@gmail.com', '2020-03-25 03:25:56', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1}', '{\"eventos\":[\"taller_01\"]}', 1, '30', 0),
(31, 'a', 'Alvarez', 'sacwks@gmail.com', '2020-03-25 03:28:13', '{\"un_dia\":{\"cantidad\":\"\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '[]', 1, '0', 1),
(32, 'Skyner', 'Alvarez', 'sacwks@gmail.com', '2020-03-25 03:31:27', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1}', '{\"eventos\":[\"conf_01\"]}', 2, '30', 1),
(33, '', '', '', '2020-04-01 19:31:42', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1}', '{\"eventos\":[\"65\",\"75\"]}', 3, '59.3', 1),
(34, 'Skyner', 'Alvarez', 'sacwks@gmail.com', '2020-04-01 19:17:37', '{\"un_dia\":{\"cantidad\":\"\"},\"pase_completo\":{\"cantidad\":\"1\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"52\",\"54\"]}', 2, '50', 1),
(35, 'Chino', 'ALVAREZ CARVAJAL', 'sacwks@gmail.com', '2020-04-01 19:20:21', '{\"un_dia\":{\"cantidad\":\"\"},\"pase_completo\":{\"cantidad\":\"1\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1}', '{\"eventos\":[\"55\",\"54\"]}', 2, '59.3', 1),
(36, 'Chinoox', 'Alvarez', 'sacwks@gmail.com', '2020-04-01 20:45:21', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"1\"},\"pase_2dias\":{\"cantidad\":\"1\"},\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"55\",\"63\",\"61\",\"71\"]}', 1, '136.3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_inv` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`id_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`id_registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `id_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `id_registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`id_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
