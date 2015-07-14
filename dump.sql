-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-07-2015 a las 15:40:17
-- Versión del servidor: 5.5.42-cll
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mimatexc_nf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `article` text,
  `users_admin_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_users_admin1_idx` (`users_admin_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles_comments`
--

CREATE TABLE IF NOT EXISTS `articles_comments` (
  `id` int(10) unsigned NOT NULL,
  `commets` text,
  `created_at` datetime DEFAULT NULL,
  `articles_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_comments_articles1_idx` (`articles_id`),
  KEY `fk_articles_comments_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL,
  `iso` varchar(12) DEFAULT NULL,
  `local_name` varchar(100) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `in_location` int(11) DEFAULT NULL,
  `geo_lat` varchar(45) DEFAULT NULL,
  `geo_lng` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  `locations_id` int(10) unsigned DEFAULT NULL,
  `description` text,
  `pets_status_id` tinyint(3) unsigned NOT NULL,
  `pets_races_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pets_users_idx` (`users_id`),
  KEY `fk_pets_locations1_idx` (`locations_id`),
  KEY `fk_pets_pets_status1_idx` (`pets_status_id`),
  KEY `fk_pets_pets_races1_idx` (`pets_races_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`id`, `created_at`, `updated_at`, `users_id`, `name`, `gender`, `locations_id`, `description`, `pets_status_id`, `pets_races_id`) VALUES
(16, '2015-07-13 04:51:15', NULL, 16, 'Lazi', NULL, NULL, 'Lo perdimos por flores', 3, 3),
(17, '2015-07-13 14:14:30', NULL, 30, 'kitty', NULL, NULL, 'es un gato macho, comor arena, se perdio en villa pueyrredon el 11 de julio del 2015', 3, 1),
(18, '2015-07-13 14:16:43', '2015-07-13 14:25:06', 30, 'Milo', NULL, NULL, 'lo encontre en Parque Sarmiento el 10 de julio, por el momento lo estoy cuidando yo, el collar dice Milo', 2, 1),
(19, '2015-07-13 14:21:42', '2015-07-13 14:32:54', 30, 'perritos en adopcion', NULL, NULL, 'Son 10 cachorros que tienen 2 meses, tienen las vacunas correspondientes, estan buscando un hogar, lamentablemente no puedo hacerme cargo de todos :(', 1, 1),
(20, '2015-07-13 15:35:25', NULL, 48, 'Lola', NULL, NULL, 'EncontrÃ© esta perra, perdida en la plaza arenales el dia Lunes 25/06/15, el Ãºnico dato es su collar roza y que tiene una chapa con su nombre.\r\nLa perra esta muy angustiada, se la pasa llorando, quiere recuperar a sus dueÃ±os \r\n', 2, 3),
(21, '2015-07-13 15:57:31', NULL, 51, 'N/N', NULL, NULL, 'Es de raza Beagle, debe tener unos 6 aÃ±os. Es cariÃ±oso pero estÃ¡ bastante inquieto, al parecer extraÃ±a a sus dueÃ±os. Fue encontrado cerca de la estaciÃ³n de trenes de Bernal. Por favor difundir!', 2, 3),
(22, '2015-07-13 16:05:52', '2015-07-13 16:06:12', 51, 'Toto', NULL, NULL, 'Se llama Toto, es un perro color marrÃ³n claro, no es de raza. Tiene apenas 1 aÃ±o, y se escapÃ³ de casa. Soy de Barracas, calles Brandsen y Hernandarias. No pudo haber llegado muy lejos, lo estamos buscando.\r\n\r\nContacto:\r\nPablo GarcÃ­a\r\nTel: 1524856789', 3, 3),
(23, '2015-07-13 16:15:02', NULL, 51, 'Sofi', NULL, NULL, 'Es una cachorrita, tiene 4 meses, estÃ¡ en adopciÃ³n porque no podemos tener mÃ¡s, es crÃ­a de mi perrita, la Ãºltima que quedÃ³.\r\nContacto:\r\nMariela\r\nTel: 1536458798\r\nZona: Palermo', 1, 1),
(24, '2015-07-13 16:25:14', NULL, 51, 'Lalo', NULL, NULL, 'Se perdiÃ³ el 11/06/15, en Parque Patricios, cerca del Parque Ameghino. TenÃ­a puesto el collar que se ve en la foto. Tiene 3 aÃ±os y se llama Lalo.\r\n\r\nContacto:\r\nMiguel\r\nTel: 1587898854', 3, 2),
(25, '2015-07-13 16:25:32', '2015-07-13 16:29:22', 54, 'coki', NULL, NULL, 'Coki se perdio el 1 de julio de 2015, por la zona de microcentro, por favor comunicarce al 1500114455', 3, 2),
(26, '2015-07-13 16:28:31', NULL, 54, 'Richard', NULL, NULL, 'Se perdio en paternal, a fines de Mayo', 3, 2),
(27, '2015-07-13 16:29:31', NULL, 51, 'Bianca', NULL, NULL, 'Es una cachorrita hermosa, de 2 meses, es muy chiquita y busca hogar. Estamos en Avellaneda, cerca de la plaza Alsina. Ya tiene las vacunas correspondientes a su edad.\r\n\r\nContacto:\r\nLuciana\r\nTel: 1598748654', 1, 3),
(28, '2015-07-13 16:34:04', NULL, 54, 'EMI', NULL, NULL, 'Lo encontre en la plaza echeverria el jueves 2 de julio, lo estoy cuidando el collar dice EMI', 2, 3),
(29, '2015-07-13 16:35:39', NULL, 54, 'Perritos en adopcion', NULL, NULL, 'Tienen 7 meses todas las vacunas y estan buscando un hogar', 1, 3),
(30, '2015-07-13 16:38:03', NULL, 54, '', NULL, NULL, 'Lo encontre en corrientes y callao el domingo 12, esta en la casa de un amigo que lo cuida, llamar al 1522234567', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets_pictures`
--

CREATE TABLE IF NOT EXISTS `pets_pictures` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pets_id` int(10) unsigned NOT NULL,
  `position` tinyint(4) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pets_pictures_pets1_idx` (`pets_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `pets_pictures`
--

INSERT INTO `pets_pictures` (`id`, `pets_id`, `position`, `title`, `img`) VALUES
(7, 16, 0, NULL, '/07-13/pets/bc8648b6.jpg'),
(8, 17, 0, NULL, '/07-13/pets/0d61d44b.jpg'),
(9, 18, 0, NULL, '/07-13/pets/2ab1a040.jpg'),
(10, 18, 0, NULL, '/07-13/pets/2ab1a040.jpg'),
(11, 19, 0, NULL, '/07-13/pets/bd8e9755.jpg'),
(12, 20, 0, NULL, '/07-13/pets/def906a7.jpg'),
(13, 21, 0, NULL, '/07-13/pets/737b751e.jpg'),
(14, 22, 0, NULL, '/07-13/pets/bd125ab8.jpg'),
(15, 22, 0, NULL, '/07-13/pets/bd125ab8.jpg'),
(16, 23, 0, NULL, '/07-13/pets/18e38b7c.jpg'),
(17, 24, 0, NULL, '/07-13/pets/d098d2dd.jpg'),
(18, 25, 0, NULL, '/07-13/pets/f4707b62.jpg'),
(19, 26, 0, NULL, '/07-13/pets/bf9e5383.jpg'),
(20, 25, 0, NULL, '/07-13/pets/5664cd78.jpg'),
(21, 25, 0, NULL, '/07-13/pets/5664cd78.jpg'),
(22, 27, 0, NULL, '/07-13/pets/0fc393fc.jpg'),
(23, 28, 0, NULL, '/07-13/pets/44735f7a.jpg'),
(24, 29, 0, NULL, '/07-13/pets/6cb4b242.jpg'),
(25, 30, 0, NULL, '/07-13/pets/a06d1953.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets_races`
--

CREATE TABLE IF NOT EXISTS `pets_races` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pets_types_id` tinyint(3) unsigned NOT NULL,
  `race` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pets_types_id` (`pets_types_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pets_races`
--

INSERT INTO `pets_races` (`id`, `pets_types_id`, `race`) VALUES
(1, 1, 'Chihuahua'),
(2, 1, 'Doberman'),
(3, 1, 'Labrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets_status`
--

CREATE TABLE IF NOT EXISTS `pets_status` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  `title` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pets_status`
--

INSERT INTO `pets_status` (`id`, `status`, `title`) VALUES
(1, 'adopted', 'En adopci&oacute;n'),
(2, 'located', 'Buscado'),
(3, 'lost', 'Perdido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets_status_date`
--

CREATE TABLE IF NOT EXISTS `pets_status_date` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pets_id` int(10) unsigned NOT NULL,
  `pets_status_id` tinyint(3) unsigned NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pets_status_date_pets1_idx` (`pets_id`),
  KEY `fk_pets_status_date_pets_status1_idx` (`pets_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets_type`
--

CREATE TABLE IF NOT EXISTS `pets_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pets_type`
--

INSERT INTO `pets_type` (`id`, `type`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `fb_name` varchar(45) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  `thumbnail` varchar(45) DEFAULT NULL,
  `locations_id` int(10) unsigned DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_users_locations1_idx` (`locations_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`, `first_name`, `last_name`, `fb_name`, `birthday`, `gender`, `thumbnail`, `locations_id`, `phone`) VALUES
(1, 'lumiz743@hotmail.com', '5e6312d18b262c95d266d67bbd04926c7acab368', '2015-06-04 00:00:00', NULL, 'Luciano', 'Arturo', NULL, NULL, 'm', NULL, NULL, NULL),
(16, 'lucianomizrahi@gmail.com', '1286fb4c96de1ce67e88252929839c044e171854', '2015-07-03 13:53:55', NULL, 'Luciano', 'Mizrahi', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'hacker@gmail.com', '1286fb4c96de1ce67e88252929839c044e171854', '2015-07-03 13:57:15', NULL, 'ñ á', 'El hacker', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'popi@bbb.com', '6f0d6c03c5d9289e1609295f3fb46c8a4d5c10cd', '2015-07-05 11:24:43', NULL, 'loli', 'popi', NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, '', '2015-07-07 09:03:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, '', '2015-07-07 09:03:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, '', '2015-07-07 09:04:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, '', '2015-07-07 09:04:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, '', '2015-07-07 09:04:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, '', '2015-07-13 14:11:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, '', '2015-07-13 14:11:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, '', '2015-07-13 14:11:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, '', '2015-07-13 14:12:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, '', '2015-07-13 14:12:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, '', '2015-07-13 14:12:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, '', '2015-07-13 14:12:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, '', '2015-07-13 15:15:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, '', '2015-07-13 15:15:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, '', '2015-07-13 15:15:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, '', '2015-07-13 15:15:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, '', '2015-07-13 15:15:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, '', '2015-07-13 15:16:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, '', '2015-07-13 15:16:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, '', '2015-07-13 15:16:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, '', '2015-07-13 15:16:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, '', '2015-07-13 15:23:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, '', '2015-07-13 15:23:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, '', '2015-07-13 15:23:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, '', '2015-07-13 15:24:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, '', '2015-07-13 15:24:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, NULL, '', '2015-07-13 15:26:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, NULL, '', '2015-07-13 15:26:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, NULL, '', '2015-07-13 15:26:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, '', '2015-07-13 15:27:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, '', '2015-07-13 15:29:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, '', '2015-07-13 15:30:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, '', '2015-07-13 15:39:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, '', '2015-07-13 16:19:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, '', '2015-07-13 16:19:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, NULL, '', '2015-07-13 16:19:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_admin`
--

CREATE TABLE IF NOT EXISTS `users_admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_users_admin1` FOREIGN KEY (`users_admin_email`) REFERENCES `users_admin` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articles_comments`
--
ALTER TABLE `articles_comments`
  ADD CONSTRAINT `fk_articles_comments_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `fk_pets_locations1` FOREIGN KEY (`locations_id`) REFERENCES `locations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pets_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`pets_races_id`) REFERENCES `pets_races` (`id`),
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`pets_status_id`) REFERENCES `pets_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pets_pictures`
--
ALTER TABLE `pets_pictures`
  ADD CONSTRAINT `pets_pictures_ibfk_1` FOREIGN KEY (`pets_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pets_races`
--
ALTER TABLE `pets_races`
  ADD CONSTRAINT `pets_races_ibfk_1` FOREIGN KEY (`pets_types_id`) REFERENCES `pets_type` (`id`);

--
-- Filtros para la tabla `pets_status_date`
--
ALTER TABLE `pets_status_date`
  ADD CONSTRAINT `pets_status_date_ibfk_1` FOREIGN KEY (`pets_status_id`) REFERENCES `pets_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pets_status_date_ibfk_2` FOREIGN KEY (`pets_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_locations1` FOREIGN KEY (`locations_id`) REFERENCES `locations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
