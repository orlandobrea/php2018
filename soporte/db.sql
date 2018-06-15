-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `pricing`;
CREATE DATABASE `pricing` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pricing`;

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `titulo_boton` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `producto` (`id`, `titulo`, `precio`, `titulo_boton`) VALUES
(1,	'Gratis',	0.00,	'Registrate gratis'),
(2,	'Pro',	15.00,	'Ver Pro'),
(3,	'Empresarial',	30.00,	'Ver empresarial');

DROP TABLE IF EXISTS `producto_caracteristica`;
CREATE TABLE `producto_caracteristica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(10) unsigned NOT NULL,
  `detalle` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `producto_caracteristica_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `producto_caracteristica` (`id`, `producto_id`, `detalle`) VALUES
(1,	1,	'1 Usuario incluido'),
(2,	1,	'2GB de capacidad'),
(3,	1,	'Soporte no incluido'),
(4,	2,	'20 Usuarios incluidos'),
(5,	2,	'20GB de almacenamiento'),
(6,	2,	'Soporte incluido'),
(7,	3,	'50 usuarios incluidos'),
(8,	3,	'50GB de almacenamiento'),
(9,	3,	'Soporte preferencial');

DROP TABLE IF EXISTS `producto_caracteristica_ampliada`;
CREATE TABLE `producto_caracteristica_ampliada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(10) unsigned NOT NULL,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto` (`producto`),
  CONSTRAINT `producto_caracteristica_ampliada_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `producto_caracteristica_ampliada` (`id`, `producto_id`, `detalle`) VALUES
(1,	1,	'1 Usuario incluido'),
(2,	1,	'2GB de capacidad'),
(3,	1,	'Soporte no incluido'),
(4,	1,	'Sin repositorios privados'),
(5,	1,	'SLA 98%'),
(6,	2,	'20 Usuario incluidos'),
(7,	2,	'20GB de almacenamiento'),
(8,	2,	'Soporte incluido'),
(9,	2,	'Hasta 2 repositorios privados'),
(10,	2,	'SLA 99%'),
(11,	3,	'50 Usuarios incluidos'),
(12,	3,	'50GB de almacenamiento'),
(13,	3,	'Soporte preferencial'),
(14,	3,	'Repositorios privados ilimitados'),
(15,	3,	'SLA 99.9%'),
(16,	3,	'Bonificación 10% por pago anual'),
(17,	2,	'Bonificación 3% pago anual');

-- 2018-06-13 16:28:42
