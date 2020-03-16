-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-03-2020 a las 16:42:57
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

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
-- Estructura de tabla para la tabla `categoria_evento`
--

DROP TABLE IF EXISTS `categoria_evento`;
CREATE TABLE IF NOT EXISTS `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`) VALUES
(1, 'Seminario', 'fa-university'),
(2, 'Conferencias', 'fa-comment'),
(3, 'Talleres', 'fa-code');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(200) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL,
  PRIMARY KEY (`evento_id`),
  KEY `id_cat_evento` (`id_cat_evento`),
  KEY `id_inv` (`id_inv`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES
(47, 'Responsive Web Design', '2020-05-01', '10:00:00', 3, 1, 'taller_01'),
(48, 'Flexbox', '2020-05-01', '12:00:00', 3, 2, 'taller_02'),
(49, 'HTML5 y CSS3', '2020-05-01', '14:00:00', 3, 3, 'taller_03'),
(50, 'Drupal', '2020-05-01', '17:00:00', 3, 4, 'taller_04'),
(51, 'WordPress', '2020-05-01', '19:00:00', 3, 5, 'taller_05'),
(52, 'Como ser freelancer', '2020-05-01', '10:00:00', 2, 6, 'conf_01'),
(53, 'Tecnologías del Futuro', '2020-05-01', '17:00:00', 2, 1, 'conf_02'),
(54, 'Seguridad en la Web', '2020-05-01', '19:00:00', 2, 2, 'conf_03'),
(55, 'Diseño UI y UX para móviles', '2020-05-01', '10:00:00', 1, 6, 'sem_01'),
(56, 'AngularJS', '2020-05-02', '10:00:00', 3, 1, 'taller_06'),
(57, 'PHP y MySQL', '2020-05-02', '12:00:00', 3, 2, 'taller_07'),
(58, 'JavaScript Avanzado', '2020-05-02', '14:00:00', 3, 3, 'taller_08'),
(59, 'SEO en Google', '2020-05-02', '17:00:00', 3, 4, 'taller_09'),
(60, 'De Photoshop a HTML5 y CSS3', '2020-05-02', '19:00:00', 3, 5, 'taller_10'),
(61, 'PHP Intermedio y Avanzado', '2020-05-02', '21:00:00', 3, 6, 'taller_11'),
(62, 'Como crear una tienda online que venda millones en pocos días', '2020-05-02', '10:00:00', 2, 6, 'conf_04'),
(63, 'Los mejores lugares para encontrar trabajo', '2020-05-02', '17:00:00', 2, 1, 'conf_05'),
(64, 'Pasos para crear un negocio rentable ', '2020-05-02', '19:00:00', 2, 2, 'conf_06'),
(65, 'Aprende a Programar en una mañana', '2020-05-02', '10:00:00', 1, 3, 'sem_02'),
(66, 'Diseño UI y UX para móviles', '2020-05-02', '17:00:00', 1, 5, 'sem_03'),
(67, 'Laravel', '2020-05-03', '10:00:00', 3, 1, 'taller_12'),
(68, 'Crea tu propia API', '2020-05-03', '12:00:00', 3, 2, 'taller_13'),
(69, 'JavaScript y jQuery', '2020-05-03', '14:00:00', 3, 3, 'taller_14'),
(70, 'Creando Plantillas para WordPress', '2020-05-03', '17:00:00', 3, 4, 'taller_15'),
(71, 'Tiendas Virtuales en Magento', '2020-05-03', '19:00:00', 3, 5, 'taller_16'),
(72, 'Como hacer Marketing en línea', '2020-05-03', '10:00:00', 2, 6, 'conf_07'),
(73, '¿Con que lenguaje debo empezar?', '2020-05-03', '17:00:00', 2, 2, 'conf_08'),
(74, 'Frameworks y librerias Open Source', '2020-05-03', '19:00:00', 2, 3, 'conf_09'),
(75, 'Creando una App en Android en una mañana', '2020-05-03', '10:00:00', 1, 4, 'sem_04'),
(76, 'Creando una App en iOS en una tarde', '2020-05-03', '17:00:00', 1, 1, 'sem_05'),
(77, 'Responsive Web Design', '2020-05-01', '10:00:00', 3, 1, 'taller_01'),
(78, 'Flexbox', '2020-05-01', '12:00:00', 3, 2, 'taller_02'),
(79, 'HTML5 y CSS3', '2020-05-01', '14:00:00', 3, 3, 'taller_03'),
(80, 'Drupal', '2020-05-01', '17:00:00', 3, 4, 'taller_04'),
(81, 'WordPress', '2020-05-01', '19:00:00', 3, 5, 'taller_05'),
(82, 'Como ser freelancer', '2020-05-01', '10:00:00', 2, 6, 'conf_01'),
(83, 'Tecnologías del Futuro', '2020-05-01', '17:00:00', 2, 1, 'conf_02'),
(84, 'Seguridad en la Web', '2020-05-01', '19:00:00', 2, 2, 'conf_03'),
(85, 'Diseño UI y UX para móviles', '2020-05-01', '10:00:00', 1, 6, 'sem_01'),
(86, 'AngularJS', '2020-05-02', '10:00:00', 3, 1, 'taller_06'),
(87, 'PHP y MySQL', '2020-05-02', '12:00:00', 3, 2, 'taller_07'),
(88, 'JavaScript Avanzado', '2020-05-02', '14:00:00', 3, 3, 'taller_08'),
(89, 'SEO en Google', '2020-05-02', '17:00:00', 3, 4, 'taller_09'),
(90, 'De Photoshop a HTML5 y CSS3', '2020-05-02', '19:00:00', 3, 5, 'taller_10'),
(91, 'PHP Intermedio y Avanzado', '2020-05-02', '21:00:00', 3, 6, 'taller_11'),
(92, 'Como crear una tienda online que venda millones en pocos días', '2020-05-02', '10:00:00', 2, 6, 'conf_04'),
(93, 'Los mejores lugares para encontrar trabajo', '2020-05-02', '17:00:00', 2, 1, 'conf_05'),
(94, 'Pasos para crear un negocio rentable ', '2020-05-02', '19:00:00', 2, 2, 'conf_06'),
(95, 'Aprende a Programar en una mañana', '2020-05-02', '10:00:00', 1, 3, 'sem_02'),
(96, 'Diseño UI y UX para móviles', '2020-05-02', '17:00:00', 1, 5, 'sem_03'),
(97, 'Laravel', '2020-05-03', '10:00:00', 3, 1, 'taller_12'),
(98, 'Crea tu propia API', '2020-05-03', '12:00:00', 3, 2, 'taller_13'),
(99, 'JavaScript y jQuery', '2020-05-03', '14:00:00', 3, 3, 'taller_14'),
(100, 'Creando Plantillas para WordPress', '2020-05-03', '17:00:00', 3, 4, 'taller_15'),
(101, 'Tiendas Virtuales en Magento', '2020-05-03', '19:00:00', 3, 5, 'taller_16'),
(102, 'Como hacer Marketing en línea', '2020-05-03', '10:00:00', 2, 6, 'conf_07'),
(103, '¿Con que lenguaje debo empezar?', '2020-05-03', '17:00:00', 2, 2, 'conf_08'),
(104, 'Frameworks y librerias Open Source', '2020-05-03', '19:00:00', 2, 3, 'conf_09'),
(105, 'Creando una App en Android en una mañana', '2020-05-03', '10:00:00', 1, 4, 'sem_04'),
(106, 'Creando una App en iOS en una tarde', '2020-05-03', '17:00:00', 1, 1, 'sem_05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

DROP TABLE IF EXISTS `invitados`;
CREATE TABLE IF NOT EXISTS `invitados` (
  `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`invitado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Rafael', 'Bautista', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado1.jpg'),
(2, 'Shari', 'Herrera', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado2.jpg'),
(3, 'Gregorio', 'Sanchez', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado3.jpg'),
(4, 'Susana', 'Rivera', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado4.jpg'),
(5, 'Harold', 'Garcia', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado5.jpg'),
(6, 'Susan ', 'Sanchez', 'Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado6.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
