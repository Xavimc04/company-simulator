-- --------------------------------------------------------
-- Host:                         212.227.227.190
-- Versión del servidor:         10.6.16-MariaDB-0ubuntu0.22.04.1 - Ubuntu 22.04
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para portal-empresarial
CREATE DATABASE IF NOT EXISTS `portal-empresarial` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci */;
USE `portal-empresarial`;

-- Volcando estructura para tabla portal-empresarial.announcements
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` varchar(50) DEFAULT 'draft',
  `level` int(11) DEFAULT 0,
  `fixed` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_announcements_user_id` (`user_id`),
  CONSTRAINT `fk_announcements_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.announcements: ~10 rows (aproximadamente)
INSERT INTO `announcements` (`id`, `user_id`, `title`, `content`, `status`, `level`, `fixed`, `created_at`, `updated_at`) VALUES
	(14, 12, 'Lorem Imsum', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'archived', 0, 0, '2023-11-30 15:42:04', '2024-02-02 11:49:05'),
	(15, 12, 'Lorem Imsum', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'archived', 1, 0, '2023-11-30 16:47:36', '2024-02-02 11:49:04'),
	(16, 12, 'Lorem Imsum', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'archived', 2, 0, '2023-11-30 16:48:04', '2024-02-02 11:49:04'),
	(17, 12, 'Lorem Imsum', 'Lorem Imsum', 'archived', 1, 0, '2023-11-30 16:48:28', '2024-02-02 11:49:03'),
	(18, 12, 'Lorem Imsum', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'archived', 0, 1, '2023-11-30 16:50:08', '2024-02-02 11:49:05'),
	(19, 12, 'Lorem Imsum', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'archived', 2, 1, '2023-11-30 17:00:00', '2024-02-02 11:49:03'),
	(20, 12, 'Reporte de incidencias', 'Buenos días, en caso de encontrar cualquier incidencia sobre el aplicativo podéis enviar un correo a portalempresarial@monlau.com o xaviermorcam@campus.monlau.com, os atenderé lo antes posible. ', 'published', 2, 1, '2024-02-02 11:50:02', '2024-02-02 11:51:01'),
	(21, 12, 'Responsive', 'Teóricamente el aplicativo lo he diseñado para todas las resoluciones habidas y por haber, en caso de no ver cualquier punto o consideráis que es erróneo o poco cómodo de cara al usuario en una resolución en específico podéis comentármelo al correo destacado. ', 'published', 0, 0, '2024-02-02 11:52:02', '2024-02-02 11:52:02'),
	(22, 12, 'Linkedin', 'Este proyecto tiene mucho trabajo detrás, os agradecería que me siguieseis en Linkedin... \n\nPerfil: linkedin.com/in/xavier-morell', 'published', 0, 1, '2024-02-02 11:53:36', '2024-02-02 11:53:40'),
	(23, 12, 'Proyecto y código fuente', 'No os olvidéis de darle una estrella en Github al proyecto en github.com/Xavimc04/company-simulator', 'published', 0, 1, '2024-02-02 11:54:44', '2024-02-02 11:54:45');

-- Volcando estructura para tabla portal-empresarial.centers
CREATE TABLE IF NOT EXISTS `centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.centers: ~4 rows (aproximadamente)
INSERT INTO `centers` (`id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Monlau Group', 'contacto@monlau.com', 'active', '2023-10-25 15:58:02', '2023-10-25 17:08:38'),
	(3, 'Application Owner', 'elpatrondev@gmail.com', 'active', '2023-10-25 16:01:09', '2024-01-11 20:30:24'),
	(4, 'Rodi Motor Services', 'services@rodi.es', 'inactive', '2023-10-25 16:26:16', '2023-11-09 15:27:31'),
	(6, 'Martinez S.L', 'mariomarmen@monlau.com', 'inactive', '2023-12-12 17:27:03', '2024-01-11 15:15:12');

-- Volcando estructura para tabla portal-empresarial.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `social_denomination` varchar(100) DEFAULT NULL,
  `sector` varchar(70) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'inactive',
  `cif` varchar(30) DEFAULT NULL,
  `icon` longtext DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `cp` varchar(15) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `form_level` varchar(100) DEFAULT NULL,
  `website` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_companies_center_id` (`center_id`),
  CONSTRAINT `fk_companies_center_id` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.companies: ~17 rows (aproximadamente)
INSERT INTO `companies` (`id`, `name`, `center_id`, `social_denomination`, `sector`, `status`, `cif`, `icon`, `phone`, `location`, `cp`, `city`, `contact_email`, `form_level`, `website`, `created_at`, `updated_at`) VALUES
	(1, 'Avancem amb vostè', 2, 'Avannubo', 'Educación', 'active', 'K8235310', 'FFwHDVc2lQYD6ZhNvDjOmngEhSaQB9hp50BTiLi8.jpg', '607824440', 'Carrer almogàvers, 7', '08923', 'Marina, Barcelona', 'xavier.morell@avannubo.com', 'Otros', 'https://avannubo.com', '2023-11-09 17:03:23', '2024-01-12 08:41:16'),
	(2, 'Apple', 2, 'Apple, INC', 'Informática', 'inactive', 'H8356240', 'WEqU0xl0GT0Lsuw0YqgbVToAB27nJCfUdAJIvoB6.png', NULL, NULL, NULL, NULL, 'contacto@apple.com', 'Bachillerato', 'https://aclaputra.github.io/company-profile/', '2023-11-23 16:42:56', '2024-01-30 15:16:45'),
	(3, 'Eventics', 2, 'Eventics,SL', 'Arte y cultura', 'active', 'B23901278', 'CbZYTj78pdMxLZforBLicAunzUHYmxzFXOeKiLdc.png', '933408204', 'C/Monlau, 6', '08027', 'Barcelona', 'info@eventics.com', 'CFGM Gestión Administrativa', NULL, '2024-01-31 17:27:03', '2024-01-31 17:36:24'),
	(4, 'Bless Design, SL', 2, 'Bless Design,SL', 'Material y mobiliario de oficina', 'active', 'B90762345', 'PtldPQ57DCnhfJ3TCpsGPjcoEyYKRq4ttmv0iT8n.png', '933408204', 'C/ Monlau, 6', '08027', 'Barcelona', NULL, 'CFGM Gestión Administrativa', NULL, '2024-01-31 17:56:41', '2024-01-31 17:58:19'),
	(5, 'Regreen Furniture', 2, 'Regreen Furniture,SL', 'Material y mobiliario de oficina', 'active', 'B67451234', 'TATf0dMDmti9iH0cGYlFjgDYSxpMGrOjXmBB6SJS.png', '933408204', 'C/Monlau, 6', '08027', 'Barcelona', NULL, 'CFGM Gestión Administrativa', NULL, '2024-01-31 18:00:17', '2024-01-31 18:16:14'),
	(6, 'SNAPSNACK', 2, 'SNAPSNACK,SL', 'Alimentación', 'active', 'B78650123', 'MGsWAQ0DJXkkRsANn7AJIWeAyJzxy9STzVHL0zoQ.png', '933408204', 'C/ Monlau,6', '08027', 'Barcelona', NULL, 'CFGM Gestión Administrativa', NULL, '2024-01-31 18:17:28', '2024-01-31 18:18:57'),
	(7, 'TURBOTECH', 2, 'TURBOTECH,SL', 'Transportes, logística y almacenamiento', 'active', 'B62390123', 'suwt0RzOwpTI1Soa7jtHpT7Ht30wQR2UbeOkjFiN.png', '933408204', 'C/ Monlau, 6', '08027', 'Barcelona', NULL, 'CFGM Gestión Administrativa', NULL, '2024-01-31 18:20:07', '2024-01-31 18:21:27'),
	(8, 'PBOOM OFFICE', 2, 'PBOOM OFFICE,SL', 'Material y mobiliario de oficina', 'active', 'B7823460', 'F3CfMwnN1Eg39CdyQm9YO14HgIUv4r62QvjMrSfE.png', '933408204', 'C/ Monlau,6', '08027', 'Barcelona', NULL, 'CFGM Gestión Administrativa', NULL, '2024-01-31 18:22:41', '2024-01-31 18:24:46'),
	(9, 'FEM FESTA', 2, 'FEM FESTA, SL', 'Ocio', 'active', 'B57901234', 'GqTuNgbi9mayRT3pMa1kfu86BElr0nMo5PvqLhFW.jpg', '933408204', 'C/ Monlau,6', '08027', 'Barcelona', NULL, 'Otros', NULL, '2024-02-02 11:30:45', '2024-02-02 11:32:02'),
	(10, 'TECNOFIX', 2, 'TECNOFIX,SL', 'Informática', 'active', 'B81257891', 'B0f8klHNlWwwF2VNmxUt3FKfu5suVvwhj3B3TcRX.png', '933408204', 'C/ Monlau, 6', '08027', 'BARCELONA', NULL, 'Otros', NULL, '2024-02-02 11:32:47', '2024-02-02 11:33:50'),
	(11, 'JOVAGGIO', 2, 'JOVAGGIO,SL', 'Informática', 'active', 'B51213490', '0k0gI9mZGhjlMjtSoBSy5T02LrFYRFn0MzHNuI8f.png', '933408204', 'C/ Monlau, 6', '08027', 'Barcelona', NULL, 'Otros', NULL, '2024-02-02 11:34:29', '2024-02-02 11:35:27'),
	(12, 'Keymouse', 2, 'Keymouse,SL', 'Informática', 'active', 'B54901827', 'LjmmXfA7JRJoCiHwV1X88EIreoKssIYe4CyyQx2B.png', '933408204', 'C/ Monlau, 6', '08027', 'Barcelona', NULL, 'CFGS Márketing y Publicidad', NULL, '2024-02-05 15:07:44', '2024-02-05 15:35:27'),
	(13, 'Elite Barber', 2, 'Elite Barber,SL', 'Moda', 'active', 'B18523100', 'fheO63wPWSpNUAlopRCTp5QXwsXGuHQVJNDp4XDJ.png', '933408204', 'C/ Monlau, 6', '08027', 'Barcelona', NULL, 'CFGS Márketing y Publicidad', NULL, '2024-02-05 15:09:04', '2024-02-05 15:43:29'),
	(14, 'Planchistería Gloria', 2, 'Planchistería Gloria,SL', 'Servicios a empresas', 'active', 'B85971354', 'S0udtfaCRU20VAscrywVUXHMEodBnJsJVrYmQATq.png', '933408204', 'C/ Monlau,6', '08027', 'Barcelona', NULL, 'CFGS Márketing y Publicidad', NULL, '2024-02-05 15:11:29', '2024-02-05 15:34:51'),
	(15, 'Montana', 2, 'Montana,SL', 'Moda', 'active', 'B25793614', '0kSqNmhLQUY1Ti9ZpWH3uY9WnNao7p3UobeDpQm6.png', '933408204', 'C/ Monlau, 6', '08027', 'Barcelona', NULL, 'CFGS Márketing y Publicidad', NULL, '2024-02-05 15:12:03', '2024-02-05 15:30:25'),
	(16, 'Tecof', 2, 'Tecof,SA', 'Material y mobiliario de oficina', 'active', 'A08534176', 'k4kReOWCVm1tMGmFFEJXjpnjz1pVI69f5jnzxpf6.png', '933408204', 'C/Monlau,6', '08027', 'Barcelona', NULL, 'CFGS Márketing y Publicidad', NULL, '2024-02-05 15:12:58', '2024-02-05 15:27:43'),
	(17, 'Aromes', 2, 'Aromes,SL', 'Alimentación', 'active', 'B89234812', 'IAxwoDEMzoNbjsfoSZWgY1bIXGAcyq5IFWoh5x7l.png', '933408204', 'C/Monlau,6', '08027', 'Barcelona', NULL, 'CFGS Márketing y Publicidad', NULL, '2024-02-05 15:13:26', '2024-02-05 15:26:19');

-- Volcando estructura para tabla portal-empresarial.company_employees
CREATE TABLE IF NOT EXISTS `company_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `boss` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_company_employees_company_id` (`company_id`),
  KEY `fk_company_employees_user_id` (`user_id`),
  CONSTRAINT `fk_company_employees_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_company_employees_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.company_employees: ~59 rows (aproximadamente)
INSERT INTO `company_employees` (`id`, `company_id`, `user_id`, `dept`, `boss`, `created_at`, `updated_at`) VALUES
	(2, 1, 17, 'Ventas', 1, '2023-11-23 17:05:08', '2024-01-08 17:08:15'),
	(6, 2, 17, 'Finanzas', 1, '2024-01-08 16:01:36', '2024-01-08 16:01:37'),
	(7, 2, 20, 'Ventas', 1, '2024-01-11 15:04:11', '2024-01-11 15:04:11'),
	(8, 3, 24, 'Compras', 0, '2024-01-31 17:51:48', '2024-01-31 17:51:48'),
	(9, 3, 28, 'Recursos humanos', 0, '2024-01-31 18:10:18', '2024-01-31 18:10:18'),
	(10, 3, 26, 'Ventas', 0, '2024-01-31 18:11:13', '2024-01-31 18:11:13'),
	(11, 3, 31, 'Finanzas', 0, '2024-01-31 18:13:35', '2024-01-31 18:13:43'),
	(12, 4, 40, 'Recursos humanos', 0, '2024-02-01 14:06:54', '2024-02-01 14:06:54'),
	(13, 7, 29, 'Finanzas', 0, '2024-02-01 14:10:27', '2024-02-01 14:13:24'),
	(14, 7, 30, 'Recepción', 0, '2024-02-01 14:10:51', '2024-02-01 14:13:34'),
	(15, 7, 32, 'Compras', 0, '2024-02-01 14:14:02', '2024-02-01 14:14:02'),
	(16, 8, 36, 'Recursos humanos', 0, '2024-02-01 14:14:33', '2024-02-01 14:14:33'),
	(17, 8, 37, 'Finanzas', 0, '2024-02-01 14:14:50', '2024-02-01 14:14:50'),
	(18, 5, 35, 'Recursos humanos', 0, '2024-02-01 14:15:56', '2024-02-01 14:15:56'),
	(19, 5, 41, 'Finanzas', 0, '2024-02-01 14:16:15', '2024-02-01 14:16:39'),
	(20, 5, 39, 'Compras', 0, '2024-02-01 14:16:31', '2024-02-01 14:16:31'),
	(21, 5, 38, 'Ventas', 0, '2024-02-01 14:17:08', '2024-02-01 14:17:08'),
	(22, 6, 34, 'Recursos humanos', 0, '2024-02-01 14:18:16', '2024-02-01 14:18:16'),
	(23, 6, 33, 'Compras', 0, '2024-02-01 14:18:34', '2024-02-01 14:18:34'),
	(25, 10, 59, 'Compras', 1, '2024-02-02 11:36:10', '2024-02-02 11:36:22'),
	(26, 10, 56, 'Ventas', 0, '2024-02-02 11:36:39', '2024-02-02 11:36:39'),
	(27, 10, 54, 'Recursos humanos', 0, '2024-02-02 11:36:56', '2024-02-02 11:36:56'),
	(28, 10, 53, 'Recepción', 0, '2024-02-02 11:37:15', '2024-02-02 11:37:15'),
	(29, 9, 52, 'Compras', 0, '2024-02-02 11:37:52', '2024-02-02 11:37:52'),
	(30, 9, 51, 'Ventas', 1, '2024-02-02 11:38:09', '2024-02-02 11:38:09'),
	(31, 9, 57, 'Recepción', 0, '2024-02-02 11:38:49', '2024-02-02 11:38:49'),
	(32, 11, 58, 'Finanzas', 0, '2024-02-02 11:39:21', '2024-02-02 11:39:21'),
	(33, 11, 50, 'Ventas', 1, '2024-02-02 11:39:37', '2024-02-02 11:39:37'),
	(34, 11, 55, 'Recepción', 0, '2024-02-02 11:40:23', '2024-02-02 11:40:23'),
	(35, 11, 49, 'Compras', 0, '2024-02-02 11:40:43', '2024-02-02 11:40:43'),
	(36, 9, 60, 'Finanzas', 0, '2024-02-02 11:42:59', '2024-02-02 11:42:59'),
	(37, 4, 42, 'Finanzas', 0, '2024-02-02 14:19:54', '2024-02-02 14:19:54'),
	(38, 4, 44, 'Recepción', 0, '2024-02-02 14:20:28', '2024-02-02 14:20:28'),
	(39, 4, 45, 'Recursos humanos', 0, '2024-02-02 14:20:58', '2024-02-02 14:20:58'),
	(40, 6, 43, 'Finanzas', 1, '2024-02-02 14:38:01', '2024-02-02 14:38:01'),
	(41, 8, 46, 'Recursos humanos', 0, '2024-02-02 14:40:42', '2024-02-02 14:40:42'),
	(42, 8, 47, 'Finanzas', 0, '2024-02-02 14:41:32', '2024-02-02 14:41:32'),
	(43, 14, 66, 'Recepción', 0, '2024-02-05 15:14:00', '2024-02-05 15:14:00'),
	(44, 14, 80, 'Recursos humanos', 0, '2024-02-05 15:14:30', '2024-02-05 15:14:30'),
	(45, 14, 64, 'Finanzas', 0, '2024-02-05 15:14:50', '2024-02-05 15:14:50'),
	(46, 13, 70, 'Recepción', 0, '2024-02-05 15:18:52', '2024-02-05 15:18:52'),
	(47, 13, 81, 'Recursos humanos', 0, '2024-02-05 15:19:36', '2024-02-05 15:19:36'),
	(48, 16, 67, 'Recursos humanos', 0, '2024-02-05 15:20:57', '2024-02-05 15:20:57'),
	(49, 16, 73, 'Finanzas', 0, '2024-02-05 15:21:12', '2024-02-05 15:21:12'),
	(50, 16, 72, 'Compras', 0, '2024-02-05 15:21:40', '2024-02-05 15:21:40'),
	(51, 16, 71, 'Finanzas', 0, '2024-02-05 15:25:17', '2024-02-05 15:25:17'),
	(52, 13, 84, 'Compras', 0, '2024-02-05 15:26:10', '2024-02-05 15:26:10'),
	(53, 17, 77, 'Ventas', 0, '2024-02-05 15:28:24', '2024-02-05 15:29:48'),
	(54, 17, 69, 'Compras', 0, '2024-02-05 15:29:11', '2024-02-05 15:30:20'),
	(55, 17, 63, 'Ventas', 0, '2024-02-05 15:31:20', '2024-02-05 15:31:20'),
	(56, 17, 62, 'Finanzas', 0, '2024-02-05 15:32:14', '2024-02-05 15:32:14'),
	(57, 12, 76, 'Recepción', 0, '2024-02-05 15:33:47', '2024-02-05 15:33:47'),
	(58, 12, 75, 'Finanzas', 0, '2024-02-05 15:34:07', '2024-02-05 15:35:09'),
	(59, 12, 59, 'Compras', 0, '2024-02-05 15:34:24', '2024-02-05 15:34:24'),
	(60, 12, 78, 'Recursos humanos', 0, '2024-02-05 15:34:46', '2024-02-05 15:34:46'),
	(61, 12, 82, 'Ventas', 0, '2024-02-05 15:35:00', '2024-02-05 15:35:00'),
	(62, 15, 65, 'Recepción', 0, '2024-02-05 15:35:41', '2024-02-05 15:35:41'),
	(63, 15, 74, 'Finanzas', 0, '2024-02-05 15:35:58', '2024-02-05 15:35:58'),
	(64, 15, 68, 'Compras', 0, '2024-02-05 15:36:34', '2024-02-05 15:36:34');

-- Volcando estructura para tabla portal-empresarial.company_market
CREATE TABLE IF NOT EXISTS `company_market` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `index` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_company_market_company_id` (`company_id`),
  CONSTRAINT `fk_company_market_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.company_market: ~2 rows (aproximadamente)
INSERT INTO `company_market` (`id`, `company_id`, `index`) VALUES
	(2, 1, 'messages'),
	(3, 1, 'english_availability'),
	(4, 1, 'public_email');

-- Volcando estructura para tabla portal-empresarial.company_teachers
CREATE TABLE IF NOT EXISTS `company_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_companies_teachers_user_id` (`user_id`),
  KEY `fk_companies_teachers_company_id` (`company_id`),
  CONSTRAINT `fk_companies_teachers_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_companies_teachers_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.company_teachers: ~0 rows (aproximadamente)
INSERT INTO `company_teachers` (`id`, `user_id`, `company_id`) VALUES
	(11, 16, 1);

-- Volcando estructura para tabla portal-empresarial.company_wholesalers
CREATE TABLE IF NOT EXISTS `company_wholesalers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `wholesaler_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_company_wholesalers_company_id` (`company_id`),
  KEY `fk_company_wholesalers_wholesaler_id` (`wholesaler_id`),
  CONSTRAINT `fk_company_wholesalers_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_company_wholesalers_wholesaler_id` FOREIGN KEY (`wholesaler_id`) REFERENCES `wholesalers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.company_wholesalers: ~1 rows (aproximadamente)
INSERT INTO `company_wholesalers` (`id`, `company_id`, `wholesaler_id`) VALUES
	(4, 1, 3);

-- Volcando estructura para tabla portal-empresarial.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla portal-empresarial.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla portal-empresarial.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla portal-empresarial.migrations: ~4 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Volcando estructura para tabla portal-empresarial.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(100) DEFAULT NULL,
  `seller_company_id` int(11) DEFAULT NULL,
  `buyer_company_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_seller_company_id` (`seller_company_id`),
  KEY `fk_orders_buyer_company_id` (`buyer_company_id`),
  KEY `fk_orders_user_id` (`user_id`),
  CONSTRAINT `fk_orders_buyer_company_id` FOREIGN KEY (`buyer_company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_seller_company_id` FOREIGN KEY (`seller_company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.orders: ~0 rows (aproximadamente)

-- Volcando estructura para tabla portal-empresarial.order_products
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_order_products_order_id` (`order_id`),
  KEY `fk_order_products_product_id` (`product_id`),
  CONSTRAINT `fk_order_products_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_products_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.order_products: ~0 rows (aproximadamente)

-- Volcando estructura para tabla portal-empresarial.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla portal-empresarial.password_reset_tokens: ~1 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `created_at`) VALUES
	(7, 'arnauruiroc@campus.monlau.com', '942bb0b268ea9fb58d620d9e586f742d8010666c09fa4eae6b8b7c133522c581', '2024-02-06 14:19:07');

-- Volcando estructura para tabla portal-empresarial.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active',
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_company_id` (`company_id`),
  KEY `fk_products_category_id` (`category_id`),
  CONSTRAINT `fk_products_category_id` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_products_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.products: ~10 rows (aproximadamente)
INSERT INTO `products` (`id`, `company_id`, `label`, `description`, `reference`, `price`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
	(4, 2, 'iPhone 14', 'The iPhone 14 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 6.06 inches diagonally ', 'iP14', 960.99, '2HqDB2VsYituAjRdaRaEqHvtIwcLD3179qzEXs1I.jpg', 'active', 3, '2024-01-10 14:43:16', '2024-01-12 15:05:45'),
	(5, 2, 'iPhone X', NULL, 'iPhX', 330.7, 'VI1Mneq5qWPOgPQkm15bHSCjkNBeAyJpWvWEnFVd.png', 'active', 3, '2024-01-10 14:44:02', '2024-01-10 14:44:02'),
	(6, 2, 'iPhone 13', NULL, 'iPh13', 640, NULL, 'active', 3, '2024-01-10 14:47:21', '2024-01-10 14:47:21'),
	(7, 2, 'MacBook', NULL, 'MacBook', 1399, NULL, 'active', 4, '2024-01-10 14:48:02', '2024-01-10 14:48:02'),
	(8, 2, 'Apple Watch', NULL, 'WatchSE', 350.7, NULL, 'active', 6, '2024-01-10 15:48:45', '2024-01-10 15:48:45'),
	(9, 1, 'Landing corporativa', 'Desarrollo integral de landings corporativas', 'LND-CRP', 160.5, NULL, 'active', 7, '2024-01-12 15:14:55', '2024-01-12 15:14:55'),
	(10, 1, 'VPS Deluxe 1', '3GB Ram, 4 Cores', 'REF', 60, '1M0L2pJErzVmJx7sVmRj1ejq0z3ELRVqRJWtueTa.jpg', 'active', 8, '2024-01-12 15:16:23', '2024-01-12 15:16:23'),
	(11, 1, 'VPS Deluxe 2', '6GB RAM, 12 Cores', 'DLX2', 75.99, 'SQWeDZ1J6zusvO4jiBEnkAAOhzSue9beNoog3DTx.jpg', 'active', 8, '2024-01-12 15:17:35', '2024-01-12 15:17:35'),
	(12, 2, 'Apple Watch SE', 'Todas las cajas del Apple Watch Series 9 son resistentes al agua y al polvo, y cuentan con pantallas resistentes a los golpes.Nota a pie de página11', 'ASE7', 399.6, '8DZ1IBOsztiF5e30E3FCQM0ESvuE9aOWn8EvIlpG.png', 'active', 6, '2024-01-29 15:21:19', '2024-01-29 15:21:19'),
	(13, 3, 'Altavoces', 'Alquiler altavoces', 'S102', 200, 'UWkgAJasVAmsZcMc4pHXol1DyvZ9w49z74SmAZK6.jpg', 'active', 12, '2024-02-02 14:31:13', '2024-02-02 14:31:13');

-- Volcando estructura para tabla portal-empresarial.product_categories
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `label` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_categories_company_id` (`company_id`),
  CONSTRAINT `fk_product_categories_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.product_categories: ~12 rows (aproximadamente)
INSERT INTO `product_categories` (`id`, `company_id`, `label`) VALUES
	(3, 2, 'Teléfonos'),
	(4, 2, 'Ordenadores'),
	(5, 2, 'Tablets'),
	(6, 2, 'Otros'),
	(7, 1, 'Servicios'),
	(8, 1, 'Servidores'),
	(9, 1, 'Instalaciones'),
	(10, 1, 'Telefonía'),
	(11, 3, 'Organización eventos'),
	(12, 3, 'Alquiler productos'),
	(13, 4, 'MOBILIARIO ECOLOGICO'),
	(14, 4, 'DISEÑO DE INTERIORES');

-- Volcando estructura para tabla portal-empresarial.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.roles: ~3 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(10, 'Administrador', '2023-10-25 14:44:19', '2023-10-25 14:44:19'),
	(11, 'Profesor', NULL, NULL),
	(12, 'Estudiante', NULL, NULL);

-- Volcando estructura para tabla portal-empresarial.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `current_company` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `profile_url` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_users_role_id` (`role_id`),
  KEY `fk_users_center_id` (`center_id`),
  CONSTRAINT `fk_users_center_id` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla portal-empresarial.users: ~83 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `center_id`, `current_company`, `status`, `profile_url`, `created_at`, `updated_at`) VALUES
	(12, 'Administrador', 'xaviermorcam@campus.monlau.com', '$2y$10$ogS5OpmfwVZnvtx1/274Tet87sN6qFLyO2Oeiq7kzU8XVU4iT1Bt2', 10, NULL, NULL, 'active', 'Hqyx4VwYcpGxICd6E7RNpk9CVeUG7RHxqQOwEt1D.png', '2023-10-25 14:44:19', '2023-11-30 15:30:58'),
	(16, 'Xavier Morell', 'xavimorellcampos@gmail.com', '$2y$10$Bqzm/aCfh.hmiPCoKFPu2uExNRhngYDzt969DnyBTn84aIJfqTC3u', 11, 2, 1, 'active', 'DXm0vuvCx8FyH7TX4AOxIKW6IyumfVl4F0i85inU.jpg', '2023-11-09 15:31:04', '2024-02-02 15:52:00'),
	(17, 'Javier Salvador', 'jsalvador@monlau.com', '$2y$10$VXiLKTSX9U44R5yCVZJbCOvqfDuMeg2FlfmwFymLURr1c.lCOoYNe', 12, 2, 1, 'active', 'eV98gHY2cCd3boMZsOXSyaSxEqxIrNcnHepMoU3B.png', '2023-11-20 15:52:14', '2024-02-06 14:13:59'),
	(20, 'Mario Martínez', 'mariomarmen@monlau.com', '$2y$10$np.PGRRFOEC4z8yZZkMT7enJqwIAKQ7Bh9r3fr8KADBIggvrDYjhS', 12, 2, 2, 'active', NULL, '2024-01-11 15:03:12', '2024-01-30 17:47:43'),
	(21, 'Alba Ferré', 'ferrea@monlau.com', '$2y$10$v97cuRBG3nmYcNrvtzJvfOyJKnt.Up9B2S27ae45mQLWVawShovmW', 11, 2, 15, 'active', 'OftHfgX8lIIfJn9lRs0HhCblZgNUGZyk8dsGWM5S.jpg', '2024-01-11 15:35:24', '2024-02-05 15:17:29'),
	(22, 'Roberto', 'mancar@monlau.com', '$2y$10$cYMYW3gc6KK8olhAbxtmkeRaUm3t96DOlRfwJz6e3eaXmHo91/9Q6', 11, 2, NULL, 'active', NULL, '2024-01-11 15:37:32', '2024-01-11 15:37:32'),
	(24, 'Aleix Hierro Mayol', 'aleixhiemay@campus.monlau.com', '$2y$10$o3PQxtcxu2AvTL/Qj.ZBBuwm/5OkzkvE42SjAqs7gLXI6yTzykPTK', 12, 2, 3, 'active', NULL, '2024-01-31 17:50:15', '2024-02-02 14:20:47'),
	(25, 'Susana Ortega', 'ortegas@monlau.com', '$2y$10$yqLDI5thUn12wRpzTtiWm.YNtmfUE4bBU7eExuDpAN1NJ1jiyxzKu', 11, 2, 14, 'active', NULL, '2024-01-31 17:58:56', '2024-02-05 15:17:36'),
	(26, 'derek higueras delgado', 'derekhigdel@campus.monlau.com', '$2y$10$LHBbGWpmah2.UlQKeg3yZOMxICT/v7nJhUGKoeutJpkOTxtegVFbm', 12, 2, 3, 'active', NULL, '2024-01-31 18:02:28', '2024-02-02 14:32:51'),
	(27, 'Elena de la Mota', 'delamotae@monlau.com', '$2y$10$s/fgqMVyrIf4RVfWGnSope4NkYHximniSURS5mCGRDPblMX3WQEQe', 11, 2, NULL, 'active', NULL, '2024-01-31 18:07:52', '2024-01-31 18:07:52'),
	(28, 'Marta', 'martagontor@campus.monlau.com', '$2y$10$nHcIyiPiEDaf7SoZmo4aQ.D5Kn0VQYAmlhRPh81xziNZF0ULAfLvG', 12, 2, 3, 'active', NULL, '2024-01-31 18:08:39', '2024-02-02 15:54:02'),
	(29, 'Hannah Heintz', 'hannahheijar@campus.monlau.com', '$2y$10$fNQaNVAyCchMOoUImSIwWuwZtlyaPqGE4Hu1kKRur2dvSn.UTW3/C', 12, 2, 7, 'active', NULL, '2024-01-31 18:11:40', '2024-02-02 15:31:59'),
	(30, 'Dan Marin', 'danmarjim@campus.monlau.com', '$2y$10$yaGt9IsN2M4qop.Jaei7tODrUM3Gaz6Y.BNIdgvFQ37WtKC1IWvAK', 12, 2, NULL, 'active', NULL, '2024-01-31 18:12:30', '2024-01-31 18:12:42'),
	(31, 'Javier Villena Galán', 'javiervilgal@campus.monlau.com', '$2y$10$h4fiaY0VgZRXDatWtJccm.EeX5G4rGL0FEnvG1dqhAMKqbe.S0WNe', 12, 2, 3, 'active', NULL, '2024-01-31 18:12:46', '2024-02-01 15:24:13'),
	(32, 'Leonardo Ribera Ibáñez', 'leonardoribiba@campus.monlau.com', '$2y$10$zynGjrsZNvnrvEUnTDKkI.tGvwYdZ.tEkh9AyTUouE5pasEk1hvUa', 12, 2, NULL, 'active', NULL, '2024-01-31 18:13:29', '2024-01-31 18:13:51'),
	(33, 'Daniel Ibañez', 'danielibamon@campus.monlau.com', '$2y$10$udzzj5hiNvRKI1CIh0K5Eengj/VOyC14Ck8N3Cpb6EDO0OoLRSef.', 12, 2, NULL, 'active', NULL, '2024-01-31 18:19:22', '2024-01-31 18:19:32'),
	(34, 'Raúl Moreno', 'raulmorcal@campus.monlau.com', '$2y$10$7ih7WUqBLxhhjiMp6IN.Vuu3MRSWFzQjU3ZLVWmetcGtwDdxt55C2', 12, 2, 6, 'active', NULL, '2024-01-31 18:19:34', '2024-02-02 16:00:40'),
	(35, 'Pol Garcia Gomez', 'polgargom@campus.monlau.com', '$2y$10$MOzO72wHdc6dKN6GWfCTKOVB2J8Od4FdIh5CmYdSSqvOFsVnNTzM.', 12, 2, 5, 'active', NULL, '2024-01-31 18:19:36', '2024-02-01 15:24:20'),
	(36, 'Marc Redondo Garcia', 'marcredgar@campus.monlau.com', '$2y$10$x2LleyIckbN8SzdltLn./ukonNu/V4FCaaRoJsfmfesx2z5sMa0Em', 12, 2, NULL, 'active', NULL, '2024-01-31 18:19:54', '2024-01-31 18:20:05'),
	(37, 'Oscar Liu', 'haowenliu@campus.monlau.com', '$2y$10$mMrriByIo/lG.p2g2HvWxu7FlIeZhvV5o50.uHzz999qpXwL7a.YS', 12, 2, NULL, 'active', NULL, '2024-01-31 18:20:25', '2024-01-31 18:20:40'),
	(38, 'Percy Villarroel Dominguez', 'percyvildom@campus.monlau.com', '$2y$10$8p32faFtX8tqcAxSMtWtbesj3xrrZ1q9l4vByHnpBZaJBIxYvU212', 12, 2, 5, 'active', NULL, '2024-01-31 18:20:26', '2024-02-01 15:22:59'),
	(39, 'Alejandro Prados Guisado', 'alejandropragui@campus.monlau.com', '$2y$10$f6tD0AncuHIxETgHyQkd9.gsRXWniV3bbYPu8GR/iWnkGhMUB6G9q', 12, 2, 5, 'active', NULL, '2024-01-31 18:20:26', '2024-02-01 15:24:21'),
	(40, 'Anavely Lopez Hurtado', 'anavelylophur@campus.monlau.com', '$2y$10$h9LbL90TOeRYSi1mVhDxBez7xQgajaLZmgeOu1fOq3kx7ISt4FfAe', 12, 2, NULL, 'active', NULL, '2024-01-31 18:22:43', '2024-01-31 18:23:01'),
	(41, 'Álvaro Piquer Archilla', 'alvaropiqarc@campus.monlau.com', '$2y$10$Bh6HzqHSLxyLZDVBxYEPK.mhxVIM/J0NnxnwRrwyFTTcxPePt7hKK', 12, 2, 5, 'active', NULL, '2024-01-31 18:23:22', '2024-02-01 15:31:18'),
	(42, 'Kate Diaz', 'jezraelladiarag@campus.monlau.com', '$2y$10$vbwOyRlvjA5R/vDxhEuT8.3vCg7XvFnCKdz4aJzyPSjlUf/zZcjBe', 12, 2, 4, 'active', NULL, '2024-02-01 14:19:00', '2024-02-02 15:57:36'),
	(43, 'Esther Ger ', 'esthergermor@campus.monlau.com', '$2y$10$BBtGhqEevQTLUp8tpVPZ1eIngAXlT5.bPfYHnSQz4LJv07GyMlnuS', 12, 2, 6, 'active', NULL, '2024-02-01 14:26:57', '2024-02-02 14:39:04'),
	(44, 'judit', 'judithandmar@campus.monlau.com', '$2y$10$CjTr5pGlWCyO4p1ffGhkBOn3PL1HYWGEm6nYrMYKmrUpwLKSFewdu', 12, 2, NULL, 'active', NULL, '2024-02-01 14:27:05', '2024-02-01 15:16:36'),
	(45, 'aitama', 'aitanaparmor@campus.monlau.com', '$2y$10$jzscanslZlahk7yv0k1Mr.2hbxLO2jE03fV.PhmUjUeK8TAoEEsQC', 12, 2, NULL, 'active', NULL, '2024-02-01 14:27:12', '2024-02-01 15:16:37'),
	(46, 'Petro Vanzuryak Kogut', 'petrovan@campus.monlau.com', '$2y$10$n.EFkrK2dydsnVa5jvSDUOV7i1DTWal3Zi4n/OZ7xurcte/YGfNDq', 12, 2, NULL, 'active', NULL, '2024-02-01 14:27:26', '2024-02-01 15:16:38'),
	(47, 'Jhoiner Daniel Paez Guerrero', 'danielpaegue@campus.monlau.com', '$2y$10$qhg9sVEk.7U8PDB/Wj0Nr.vIsi8yprxm1p1z84ZWO6VSg0nbbh0FW', 12, 2, NULL, 'active', NULL, '2024-02-01 14:27:41', '2024-02-01 15:16:39'),
	(48, 'Laura Llamas', 'llamasl@monlau.com', '$2y$10$s8zayuU7S.63ZRXxfIpG9OQ7noa2iBxbAzDDHFIF2xxLpyPS6YKU2', 11, 2, 2, 'active', NULL, '2024-02-01 15:16:15', '2024-02-02 17:00:45'),
	(49, 'Martí López Beltran', 'martilopbel@campus.monlau.com', '$2y$10$Ouvl2MEPUl.qvCD6G7uPX.Rt2YPLn.a5uWk1Bu2lbCWaNqInXfx9S', 12, 2, NULL, 'active', NULL, '2024-02-02 11:27:28', '2024-02-02 11:28:04'),
	(50, 'Daniel Garcia Brun', 'danielgarciabrun@gmail.com', '$2y$10$sX7//8dEwa.0Tz2.wO.2Qeb7Uak/HzwxqRd9DbsiMOTxu1YfQoSEu', 12, 2, NULL, 'active', NULL, '2024-02-02 11:27:56', '2024-02-02 11:28:03'),
	(51, 'Izan Pardell', 'izanparbla@campus.monlau.com', '$2y$10$C8NMKjsAiFyn//LuXfZNzevgELBE.hRu.mvdBa7CSYMg6z7ux./ZW', 12, 2, NULL, 'active', NULL, '2024-02-02 11:28:16', '2024-02-02 11:28:31'),
	(52, 'Aleix ROMERO', 'aleixrombla@campus.monlau.com', '$2y$10$mr3NyH8IPoTy7ztWrGCt7ujz3yrqF1edBQaCOqHbYf5B9C87oQvda', 12, 2, NULL, 'active', NULL, '2024-02-02 11:28:18', '2024-02-02 11:28:33'),
	(53, 'Daniel Ramos ', 'danielramcat@campus.monlau.com', '$2y$10$8hTravUlbJPfe7OVwul/uu5/6N6l4etAbqyDc2K6YC9.QtbFFsF6i', 12, 2, 10, 'active', NULL, '2024-02-02 11:28:24', '2024-02-02 12:13:53'),
	(54, 'Marta', 'martaandmar@campus.monlau.com', '$2y$10$luP1quJilQ4AZni5C/IWjemrpgFcUBa68/GLqwtJYVFyKgJS4JIG.', 12, 2, 10, 'active', NULL, '2024-02-02 11:28:26', '2024-02-02 12:12:30'),
	(55, 'Joan Berrio', 'Joanberale@campus.monlau.com', '$2y$10$7Aac9BjgytFqQhWuKFXeIutvirQplI.L7xDBIzIpSNfNdk5cipJ9y', 12, 2, NULL, 'active', NULL, '2024-02-02 11:28:27', '2024-02-02 11:28:50'),
	(56, 'Mario Alegre', 'marioaleigl@campus.monlau.com', '$2y$10$NYNCiMVxe9y3uxX5BKenO.5Z6v6OQGg1A8uA3S0Yk4dCMIYINsW76', 12, 2, 10, 'active', NULL, '2024-02-02 11:28:33', '2024-02-02 11:37:47'),
	(57, 'Hector Camps', 'hectorcamesp@campus.monlau.com', '$2y$10$X/HHkD3jLk/xu1W47zdEUO2SE/9SKFri5MV.ayjEoC/.z2wftOUgu', 12, 2, NULL, 'active', NULL, '2024-02-02 11:28:35', '2024-02-02 11:28:55'),
	(58, 'Anduàlem Cendoya', 'andualemcenbat@campus.monlau.com', '$2y$10$c7swLY1Gazu.crwHc/QKW.6Sr.S1YkgoeC6gOJJHvDj3nCY0A0hNy', 12, 2, 11, 'active', NULL, '2024-02-02 11:29:39', '2024-02-02 11:42:17'),
	(59, 'Marc Pérez', 'marcpercue@campus.monlau.com', '$2y$10$guKdHKIUXUEAKL7LVlSNu.jooZtfmyPS3dZbQKQKor8JaaWGthSQi', 12, 2, 10, 'active', NULL, '2024-02-02 11:29:39', '2024-02-02 12:05:29'),
	(60, 'Xavi Garnica Salvador', 'xavigarsal@campus.monlau.com', '$2y$10$yMaq1t9nX9lf0G3181mwAeC7y8KVVk6KAwy7g1tfjHcwZ6UZZUBt.', 12, 2, NULL, 'active', NULL, '2024-02-02 11:40:40', '2024-02-02 11:41:51'),
	(61, 'Pepi Corredera', 'correderap@monlau.com', '$2y$10$qdAft7DvCrnJRta9g0S93..MgMjC1s0F0w9niqQv4nD1y2WI8.klC', 11, 2, NULL, 'active', NULL, '2024-02-02 14:36:27', '2024-02-02 14:36:27'),
	(62, 'Marc Ullod', 'marcullace@monlau.com', '$2y$10$/WAyX2DJV3DIAvpJ70x8U.a.irn/uFKPrQYaTFQ3FbY00byM9XLzi', 12, 2, 17, 'active', NULL, '2024-02-05 15:00:10', '2024-02-05 15:32:41'),
	(63, 'Genís Borjas', 'borjasgenis@gmail.com', '$2y$10$vPt6MGsopTnXbCLivdq7UeawXfa0DtP4Nnk6pZcsOOc1o6jgjyKky', 12, 2, 17, 'active', NULL, '2024-02-05 15:00:18', '2024-02-05 15:32:57'),
	(64, 'Andrés González', 'andresgonrom@campus.monlau.com', '$2y$10$MXqf03XnWNqCnyXoXbSJEOQrXAS4MHJE2B6YCPNLiJsm90gOv0iZ.', 12, 2, 14, 'active', NULL, '2024-02-05 15:00:59', '2024-02-05 16:02:10'),
	(65, 'Joel Ibáñez', 'joelibaber@campus.monlau.com', '$2y$10$fRYlhsW6fXFM7GtJEpDxkuf/BGJ8wSYkE0mwll7MT0RLE82qEQt4u', 12, 2, NULL, 'active', NULL, '2024-02-05 15:01:08', '2024-02-05 15:02:12'),
	(66, 'Josep Rifà', 'joseprifcue@monlau.com', '$2y$10$jiAlfPBKMN4rW74gz.qFT.FZo31W.mnMN6u8POgQMNqZJfCnm/nJS', 12, 2, 14, 'active', NULL, '2024-02-05 15:01:23', '2024-02-05 15:22:48'),
	(67, 'Gerard Jimenez', 'gerardjimrui@campus.monlau.com', '$2y$10$zVm9h/LN/5WbqfImPufuKes.9AkzWB.S9PhW/oEPmI8mBuvPoc2Qi', 12, 2, NULL, 'active', NULL, '2024-02-05 15:01:24', '2024-02-05 15:02:16'),
	(68, 'Sofía Castellote', 'sofiacasper@campus.monlau.com', '$2y$10$Rj7hB4nPVGP5w1b/5CDPD.lnMqSqOMp5Uy4Iv84xuS07weJ13lTwy', 12, 2, NULL, 'active', NULL, '2024-02-05 15:01:27', '2024-02-05 15:02:18'),
	(69, 'Desireé De Los Reyes', 'desireereypen@campus.monlau.com', '$2y$10$DMwVaf/HvUqjw4V0XWlWHOiMvFFpSyj2XHn0ksevA/wrhhCnJ2tyG', 12, 2, NULL, 'active', NULL, '2024-02-05 15:01:31', '2024-02-05 15:02:54'),
	(70, 'Adrián Benalcazar', 'davidbencas@campus.monlau.com', '$2y$10$u4rPOKPmT0b2XGCHPD6FquMSwpHzmUsfoTEUo7ku9Egvu0O8tIYyW', 12, 2, 13, 'active', NULL, '2024-02-05 15:01:44', '2024-02-05 15:19:32'),
	(71, 'Marc Almarcha Vizcaya', 'marcalmviz@campus.monlau.com', '$2y$10$LYvUeVGiB3FxWIBtJ2oABOa6zs0MWY5Nc95KVZGktqHDdQwzCdYYC', 12, 2, NULL, 'active', NULL, '2024-02-05 15:01:52', '2024-02-05 15:03:00'),
	(72, 'Antoni Ji', 'antonijidon@campus.monlau.com', '$2y$10$zrKqVMQ0uyCL43W2ogoFm.UHOciuObkqnCmdy5f1Y7Cp/2tXhdEMq', 12, 2, 16, 'active', NULL, '2024-02-05 15:01:59', '2024-02-05 15:22:58'),
	(73, 'Sandra Isern', 'sandraiserod@campus.monlau.com', '$2y$10$ZT5Pedr4M378v4rNFTKeZOHgws3KGDbWNpdb3q9Pmfg7gTahzsaCS', 12, 2, NULL, 'active', NULL, '2024-02-05 15:02:49', '2024-02-05 15:03:04'),
	(74, 'Carla López', 'carlalopsal@campus.monlau.com', '$2y$10$RCfYAkOXPzK/cw71ef4PC.d3gSLAAC1i8RfKzVTV7cT5Fdf9Z7dSW', 12, 2, NULL, 'active', NULL, '2024-02-05 15:02:58', '2024-02-05 15:03:06'),
	(75, 'Gian Castro', 'giancasrab@campus.monlau.com', '$2y$10$1d8uSgG5yfLDeh4rZMz9UeellIp2XmHslctajENe9pflYhzmu8wBW', 12, 2, NULL, 'active', NULL, '2024-02-05 15:03:04', '2024-02-05 15:03:09'),
	(76, 'Jordi Gómez', 'jordigomsar@campus.monlau.com', '$2y$10$o8uHP1tCQLs8Fil907uOeuV087n/laknhpdFEick86Dnu7E0PEnx2', 12, 2, NULL, 'active', NULL, '2024-02-05 15:03:12', '2024-02-05 15:03:55'),
	(77, 'Adriana Gómez', 'adrianagomgar@monlau.com', '$2y$10$rDj3Hzjufng1BD.nIbCYV.sGvaUUZ2t36kaU.fDIaiAT4eCuPurxu', 12, 2, 17, 'active', NULL, '2024-02-05 15:03:16', '2024-02-05 15:32:33'),
	(78, 'Guillem Lorente', 'guillemlorsan@campus.monlau', '$2y$10$o69lQMpoEE4G5sWJszJOse5zI0WsrQl4L9vmLUBn1P8GzbJWrLyXy', 12, 2, NULL, 'active', NULL, '2024-02-05 15:03:19', '2024-02-05 15:03:58'),
	(79, 'Berta Medina', 'bertamedlop@campus.monlau.com', '$2y$10$x2Vg1wvPM/xBnY/LKKTJ3ORn5tInX5CnoSpkZigL2f/3GtuAszjT6', 12, 2, NULL, 'active', NULL, '2024-02-05 15:03:47', '2024-02-05 15:04:03'),
	(80, 'Achouak En nahal', 'achouakenn@campus.monlau.com', '$2y$10$wWhBhy4Ad37WvP/uGTso1eP.jrqcLtfusioGyf03QoUdMNFzfLy0e', 12, 2, NULL, 'active', NULL, '2024-02-05 15:03:48', '2024-02-05 15:04:05'),
	(81, 'Iker Barros Moral', 'ikerbarmor@monlau.com', '$2y$10$ANIJKC5itGmCCKKewNHGh.stNkMawtsy5DJ9YPszgdMctEPpXAdwu', 12, 2, NULL, 'active', NULL, '2024-02-05 15:05:25', '2024-02-05 15:05:58'),
	(82, 'Pau Gilart Real', 'paugilrea@campus.monlau.com', '$2y$10$.WhZPVmr19Hw3vt6sfl.Lu2Rf995AcfcOJ7u9bz09S4TFohiGwYpy', 12, 2, 12, 'active', NULL, '2024-02-05 15:05:43', '2024-02-05 15:36:52'),
	(84, 'Alex Gracia Fortuño', 'alexgrafor@campus.monlau.com', '$2y$10$ACRFez.k./CMgVdDLzYjbOpwlgAmG5I.uV5VeH1J.0PlXevAJDBHy', 12, 2, NULL, 'active', NULL, '2024-02-05 15:21:21', '2024-02-05 15:22:46'),
	(85, 'Marc Perez', 'marcperiba@campus.monlau.com', '$2y$10$YX8UOsl1mdDmSl3FuZfEIuzo81B9HoNBAW1fmItsK7myOdw0WyMlq', 12, 2, NULL, 'active', NULL, '2024-02-05 15:34:27', '2024-02-05 15:39:02'),
	(86, 'Mariona', 'marionabrabei@campus.monlau.com', '$2y$10$oSHSN8QSzN0ySUOm8A5BFuJMEdjuk/U2XCbjQjGurhcUjQMKeqdhO', 12, 2, NULL, 'active', NULL, '2024-02-06 14:04:18', '2024-02-06 14:04:45'),
	(87, 'Arnau', 'arnauruiroc@campus.monlau.com', '$2y$10$LE28tcTjFHgciFsVeyVEJOY37A6pnKgjACQdRyp/5hCNRbiFdZbyu', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:17:26', '2024-02-06 14:17:26'),
	(88, 'Zamira Sebis', 'zamirasebcol@campus.monlau.com', '$2y$10$vAkuLraWH2ZOuMXClEeRGO6te.nQNPcfSvBb/m2XEG9xNyi.Fzca.', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:17:46', '2024-02-06 14:17:46'),
	(89, 'Sergi Colobrans Ramírez', 'sergi09cr@gmail.com', '$2y$10$lfHABjvchgkSPg2Xnnfz7.8W/BiBAOI6rx38fr6uIqB4Ry892rpTa', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:17:49', '2024-02-06 14:17:49'),
	(90, 'Patricia', 'patriciajarbel@campus.monlau.com', '$2y$10$OEbiX1XpCwGBObrI9k7GBeUUwSBrRJnhpPwBrquIKunFjQ2I0v98G', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:17:57', '2024-02-06 14:17:57'),
	(91, 'Gerard Vacas Cantero', 'gerardvaccan@campus.monlau.com', '$2y$10$0sa64e.KahhIhq2cyXw7LOZPsZG71VVXWf3ud4Q.hlBRhxeRJ7ZNi', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:18:13', '2024-02-06 14:18:13'),
	(92, 'Arnau Becerril Marín', 'arnaubecmar@campus.monlau.com', '$2y$10$9g/KbvxquP1JTjZ.nyDG7enc1Te46/NuUVmH/SaaDjOHbQG7S6zpe', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:18:15', '2024-02-06 14:18:15'),
	(93, 'Joel Gómez', 'joelgomcol@campus.monlau.com', '$2y$10$ye.toNXNHtsSM7pX7DRuv.PctJp1eTFXguiLgswAregTt.cC5NDbi', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:18:39', '2024-02-06 14:18:39'),
	(94, 'Kevin Sánchez', 'kevinsandia@campus.monlau.com', '$2y$10$y3299H3vbQjC291kCQtwNO5u6dKFMRDkHTaeAGDMrqfHeMWTS2LUa', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:18:55', '2024-02-06 14:18:55'),
	(95, 'Alma De Haro', 'almahargon@monlau.com', '$2y$10$Q.ddwDhkwwODTK7K1mDTPeBAzlBNYamMKupca8caGsXZBg6gwfFEm', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:18:55', '2024-02-06 14:18:55'),
	(96, 'Ferran Garcia', 'ferrangarred@monlau.com', '$2y$10$p8Z3g4z6NXsbsYiO6uHk8.jVACZgZuZMYysb8LtbhgXI8Q8e3N.Ky', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:19:08', '2024-02-06 14:19:08'),
	(97, 'Xènia de Mier Pinto', 'xeniamiepin@campus.monlau.com', '$2y$10$dJYA8uc9k0T215n5Tb4xwuLVW7224p1qH9W8uLm2B/CR0/fecJzTq', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:19:36', '2024-02-06 14:19:36'),
	(98, 'Rachel', 'rachelsot@monlau.com', '$2y$10$CP4qRJ3xmf2oaj87e97y0OZEcXOlME7D/OiyuK3299UwaTjnBV59q', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:20:03', '2024-02-06 14:20:03'),
	(99, 'Berta', 'bertacamsel@campus.monlau.com', '$2y$10$uYfEaX4vqDISUEarOcs2U.bIwX5eXi4E9T9jrAwIbxOgri48B4JXW', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:21:38', '2024-02-06 14:21:38'),
	(100, 'Cristhina Cañizares', 'cristinacanizales2004@gmail.com', '$2y$10$YeKm11bbzNwEw0J6SMt1rOkiEPf1cZFBuERXGmEpEdnxBlcQAO1Dy', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:29:14', '2024-02-06 14:29:14'),
	(101, 'Pau', 'pauvinnog@campus.monlau.com', '$2y$10$7XSr86ClBG54/xfZrlAPp.gwAPT2OeRpCXmQbOdhpLJggtB.IBWEi', 12, 2, NULL, 'pending', NULL, '2024-02-06 14:36:33', '2024-02-06 14:36:33');

-- Volcando estructura para tabla portal-empresarial.user_cart_products
CREATE TABLE IF NOT EXISTS `user_cart_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_user_cart_products_users_user_id` (`user_id`),
  KEY `fk_user_cart_products_products_product_id` (`product_id`),
  CONSTRAINT `fk_user_cart_products_products_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_cart_products_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.user_cart_products: ~6 rows (aproximadamente)
INSERT INTO `user_cart_products` (`id`, `user_id`, `product_id`, `amount`) VALUES
	(1, 17, 5, 13),
	(3, 17, 4, 10),
	(4, 17, 12, 7),
	(6, 17, 6, 6),
	(7, 48, 4, 1),
	(10, 17, 11, 5);

-- Volcando estructura para tabla portal-empresarial.verification_codes
CREATE TABLE IF NOT EXISTS `verification_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(80) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `usages` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_verification_codes_center_id` (`center_id`),
  KEY `fk_verification_codes_role_id` (`role_id`),
  CONSTRAINT `fk_verification_codes_center_id` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_verification_codes_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.verification_codes: ~8 rows (aproximadamente)
INSERT INTO `verification_codes` (`id`, `code`, `center_id`, `role_id`, `usages`, `created_at`, `updated_at`) VALUES
	(18, '343370', 2, 12, 1, '2024-01-11 14:59:27', '2024-01-11 14:59:27'),
	(19, '126815', 2, 12, 1, '2024-01-11 14:59:51', '2024-01-11 14:59:51'),
	(23, '217056', 2, 11, 1, '2024-01-11 15:33:57', '2024-01-11 15:33:57'),
	(24, '183731', 2, 11, 1, '2024-01-11 15:34:18', '2024-01-11 15:34:18'),
	(25, '771701', 3, 11, 1, '2024-01-11 20:30:35', '2024-01-11 20:30:35'),
	(26, '954436', 2, 12, 31, '2024-01-23 15:16:28', '2024-02-06 14:36:33'),
	(27, '381854', 2, 12, 66, '2024-01-31 17:37:50', '2024-02-05 15:34:27'),
	(34, '831329', 2, 11, 5, '2024-02-01 15:15:59', '2024-02-01 15:15:59');

-- Volcando estructura para tabla portal-empresarial.wholesalers
CREATE TABLE IF NOT EXISTS `wholesalers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `center_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cif` varchar(100) DEFAULT NULL,
  `social_denomination` varchar(100) DEFAULT NULL,
  `transport` double DEFAULT 0,
  `location` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `icon` longtext DEFAULT NULL,
  `disccount` double DEFAULT 0,
  `payment_days` int(11) DEFAULT 7,
  `country` varchar(100) DEFAULT NULL,
  `tax` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wholesaler_centers_center_id` (`center_id`),
  CONSTRAINT `fk_wholesaler_centers_center_id` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla portal-empresarial.wholesalers: ~2 rows (aproximadamente)
INSERT INTO `wholesalers` (`id`, `center_id`, `name`, `cif`, `social_denomination`, `transport`, `location`, `city`, `icon`, `disccount`, `payment_days`, `country`, `tax`, `created_at`, `updated_at`) VALUES
	(3, 2, 'Mariscos Recio', 'G823476234', 'Mariscos Recio S.L', 9.6, 'Contubernio, 49', 'Madrid', 'YiUUGT1Zmt00obUcqk69mn5TWTnABIkvM3wPgHfk.jpg', 0, 7, 'España', 0, '2023-11-27 15:34:47', '2023-11-27 18:07:37'),
	(4, 2, 'Distribuciones Esteso', 'F284958458', 'Distribuciones Esteso S.L', 2.4, 'Plaza la Cazoleta', 'Lima', 'vihAjbaun0sv4hRlTMdGkTIo4pCc75adAXJ81vKQ.jpg', 1.8, 30, 'Perú', 1, '2023-11-27 15:42:15', '2023-11-27 18:07:12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
