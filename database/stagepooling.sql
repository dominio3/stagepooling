-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2018 a las 20:29:14
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stagepooling`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_10_14_162819_stagepooling', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parkings`
--

CREATE TABLE `parkings` (
  `id` int(11) NOT NULL,
  `parking_code` varchar(200) NOT NULL,
  `date_init` date NOT NULL,
  `hour_init` time NOT NULL,
  `date_end` date NOT NULL,
  `hour_end` time NOT NULL,
  `stages_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `state` enum('Disponible','Ocupado') NOT NULL DEFAULT 'Disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parkings`
--

INSERT INTO `parkings` (`id`, `parking_code`, `date_init`, `hour_init`, `date_end`, `hour_end`, `stages_id`, `users_id`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BUhdEFQBQe', '2018-10-14', '06:00:00', '2018-10-15', '10:00:00', 4, 2, 'Disponible', '2018-10-14 21:32:42', '2018-10-17 14:46:13', NULL),
(2, 'nt4VreCElq', '2018-10-08', '06:00:00', '2018-10-09', '07:00:00', 1, 0, 'Disponible', '2018-10-14 21:49:13', '2018-10-14 23:02:05', NULL),
(3, '7gr27JnvbH', '2018-10-14', '13:00:00', '2018-10-14', '15:00:00', 4, 1, 'Ocupado', '2018-10-14 23:44:58', '2018-10-15 19:29:26', NULL),
(4, '2PCC2srK23', '2018-10-15', '15:00:00', '2018-10-15', '17:00:00', 3, 1, 'Disponible', '2018-10-15 07:15:59', '2018-10-15 07:15:59', NULL),
(5, 'aZ6ePtkMkV', '2018-10-17', '15:00:00', '2018-10-17', '00:01:00', 5, 2, 'Ocupado', '2018-10-17 15:30:28', '2018-10-18 14:20:26', NULL),
(6, 'znmByuu4AR', '2018-10-17', '06:00:00', '2018-10-17', '15:00:00', 6, 3, 'Disponible', '2018-10-18 12:52:49', '2018-10-18 12:52:49', NULL),
(7, 'xUqKjT0FEl', '2018-10-23', '10:00:00', '2018-10-27', '00:00:00', 4, 1, 'Disponible', '2018-10-18 14:15:20', '2018-10-18 14:15:20', NULL),
(8, 'c899SPRPJL', '2018-10-18', '01:00:00', '2018-10-18', '02:00:00', 3, 1, 'Ocupado', '2018-10-18 14:17:47', '2018-10-19 18:26:41', NULL),
(9, 'hMhFibmfn', '2018-10-18', '03:00:00', '2018-10-18', '04:00:00', 4, 1, 'Disponible', '2018-10-18 14:18:47', '2018-10-18 14:18:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `reservation_code` varchar(200) NOT NULL,
  `parkings_id` int(11) NOT NULL,
  `vehicules_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `state` enum('Activa','Finalizada') NOT NULL DEFAULT 'Activa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`id`, `reservation_code`, `parkings_id`, `vehicules_id`, `users_id`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'gjVW8gHKaE', 5, 6, 3, 'Activa', '2018-10-18 12:56:24', '2018-10-18 12:56:24', NULL),
(5, 'WmXBVhfgFU', 5, 5, 1, 'Activa', '2018-10-18 14:20:26', '2018-10-18 14:20:26', NULL),
(6, '2QcCRo4lgC', 8, 5, 1, 'Activa', '2018-10-19 13:54:42', '2018-10-19 13:54:42', NULL),
(7, 'xYxr5JfoLZ', 8, 4, 1, 'Activa', '2018-10-19 14:17:00', '2018-10-19 14:17:00', NULL),
(8, 'x6sFd3Wr0V', 8, 1, 2, 'Activa', '2018-10-19 18:26:40', '2018-10-19 18:26:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stages`
--

CREATE TABLE `stages` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `observation` varchar(500) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `state` enum('Habilitado','Inhabilitado') DEFAULT 'Habilitado',
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stages`
--

INSERT INTO `stages` (`id`, `name`, `address`, `locality`, `province`, `zipcode`, `latitude`, `longitude`, `observation`, `photo`, `state`, `users_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Casa', 'Jose Ingenieros 1248', 'Florencio Varela', 'Buenos Aires', '1889', '-34.8267973', '-34.826814', 'Reja Negra', NULL, 'Habilitado', 2, '2018-10-13 03:19:33', '2018-10-14 20:45:27', NULL),
(2, 'Local', 'Avenida San Martin', 'Florencio Varela', 'Buenos Aires', '1889', '-34.7860605', '-58.3491684', 'Persiana Roja', NULL, 'Habilitado', 2, '2018-10-13 03:36:27', '2018-10-14 23:22:45', NULL),
(3, 'Casa', 'Camino General Belgrano 4252', 'Wilde', 'Buenos Aires', '1825', '-34.7187237', '-58.3452455', 'Preguntar Por Emilio', NULL, 'Habilitado', 1, '2018-10-13 04:02:54', '2018-10-18 18:15:57', NULL),
(4, 'Trabajo', 'Avenida San Juan', 'Lanus', 'Buenos Aires', '1824', '-34.8686417', '-58.1786205', NULL, NULL, 'Habilitado', 1, '2018-10-15 19:29:05', '2018-10-18 18:15:50', NULL),
(5, 'Trabajo', 'Ruta Provincial 36', 'El Pato', 'Buenos Aires', NULL, '-34.8686417', '-58.1786205', NULL, NULL, 'Habilitado', 2, '2018-10-17 15:28:59', '2018-10-17 15:40:01', NULL),
(6, 'Jorge Oscar Gamez', 'Jose Ingenieros', 'Florencio Varela', 'Buenos Aires', '1889', '-34.8267973', '-58.1786205', NULL, NULL, 'Inhabilitado', 3, '2018-10-18 11:10:39', '2018-10-18 12:52:50', NULL),
(7, 'Local', 'Avenida San Martin', 'Chascomus', 'Habilitado', '1889', '-35.5980509', '-58.0413546', NULL, NULL, 'Habilitado', 1, '2018-10-18 16:37:43', '2018-10-18 16:37:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Usuario','Administrador') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Usuario',
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `mobile`, `role`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jorge Oscar Gamez', 'jorgeoscargamez@gmail.com', '$2y$10$vjq/UMJy0rNCGnMlX9EzqOVBT.YO0l/5wW6/X5vvIKrZdNv14Eyu6', 'eDH5njWRIRRQg1b05i3a25l3Wzxs7al45gjpgTfBN9VPBeTKPWF58hLo8b5D', '+5401136751180', 'Administrador', '1539972344.png', '2018-10-13 00:11:52', '2018-10-19 18:05:44', NULL),
(2, 'test', 'test@test.com', '$2y$10$aGHfjQ9Rj/uSZcCOnX4yg.yP6htq6V74L8g40ac9Vro3.0TC7Hplm', 'oDWtqFGnJSKFj4Oe08r4mK2TGqXu2kQ2EeSV6350V4Y376hplupZGbsCy7Sf', '+5401155555555', 'Usuario', '1539962162.png', '2018-10-13 02:49:11', '2018-10-19 15:16:02', NULL),
(3, 'Admin', 'admin@gmail.com', '$2y$10$gkRBzPU7k6iv4LNMLTFaJOfh25k1ZgzDsX1D64xS67y19zQtZkNVq', 'FgwwBBJkqLWE8W7TxhWou0O60Fqrng7KBGmhXc8YGgdZk3NPsyRFYUDfwXpn', NULL, 'Administrador', 'default.jpg', '2018-10-15 02:00:17', '2018-10-19 11:06:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(10) NOT NULL,
  `patent` varchar(200) NOT NULL,
  `trademark` varchar(200) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `state` enum('En Reserva','Estacionado','Sin Reserva') DEFAULT 'Sin Reserva',
  `observation` varchar(500) DEFAULT NULL,
  `users_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehicules`
--

INSERT INTO `vehicules` (`id`, `patent`, `trademark`, `type`, `model`, `color`, `state`, `observation`, `users_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AA325MY', 'Renault', 'Logan', '2016', 'Blanco', 'En Reserva', NULL, 2, '2018-10-13 03:38:30', '2018-10-19 18:26:41', NULL),
(2, 'AB546YU', 'Chevrolet', 'Aguile', '2017', 'Azul', 'Sin Reserva', NULL, 2, '2018-10-13 03:39:04', '2018-10-14 23:22:29', NULL),
(3, 'AC555PO', 'Fiat', 'Uno', '2018', 'Rojo', 'Sin Reserva', NULL, 2, '2018-10-13 03:39:43', '2018-10-14 23:22:16', NULL),
(4, 'AB547YU', 'Chery', 'QQ', '2017', 'Gris', 'En Reserva', NULL, 1, '2018-10-13 03:41:28', '2018-10-19 14:17:00', NULL),
(5, 'AD358HG', 'Vento', 'Classic', '2018', 'Negro', 'En Reserva', NULL, 1, '2018-10-13 03:48:55', '2018-10-19 13:54:43', NULL),
(6, 'AA325MY', 'Renault', 'Logan', '2016', 'Blanco', 'En Reserva', NULL, 3, '2018-10-18 11:07:37', '2018-10-18 12:56:24', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parkings`
--
ALTER TABLE `parkings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stages_id` (`stages_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parkings_id` (`parkings_id`),
  ADD KEY `vehicules_id` (`vehicules_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `parkings`
--
ALTER TABLE `parkings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `parkings`
--
ALTER TABLE `parkings`
  ADD CONSTRAINT `parkings_ibfk_1` FOREIGN KEY (`stages_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`vehicules_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`parkings_id`) REFERENCES `parkings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `stages_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
