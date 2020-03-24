-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2020 a las 22:08:27
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cadmio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `ID_Cuestionario` int(10) UNSIGNED NOT NULL,
  `NombreCuestionario` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuestionarios`
--

INSERT INTO `cuestionarios` (`ID_Cuestionario`, `NombreCuestionario`, `created_at`, `updated_at`, `ID_User`) VALUES
(3, 'Una pregunta', '2020-03-15 15:42:18', '2020-03-15 15:42:18', 1),
(4, 'otra pregunta', '2020-03-15 15:42:28', '2020-03-15 15:42:28', 1),
(5, 'una', '2020-03-15 17:03:07', '2020-03-15 17:03:07', 1),
(6, 'Mi presentacion molecula', '2020-03-15 17:21:22', '2020-03-15 17:21:22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_preguntas`
--

CREATE TABLE `cuestionario_preguntas` (
  `ID_Cuestionario` int(10) UNSIGNED NOT NULL,
  `ID_Pregunta` int(10) UNSIGNED NOT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Recurso` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ID_NumPegunta` int(11) NOT NULL,
  `ID_Relacion_Pregunta_Cues` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuestionario_preguntas`
--

INSERT INTO `cuestionario_preguntas` (`ID_Cuestionario`, `ID_Pregunta`, `Porcentaje`, `Recurso`, `ID_NumPegunta`, `ID_Relacion_Pregunta_Cues`) VALUES
(3, 5, NULL, NULL, 6, 1),
(3, 3, NULL, NULL, 3, 3),
(3, 2, NULL, NULL, 2, 4),
(3, 1, 100, NULL, 0, 5),
(6, 12, NULL, NULL, 3, 6),
(3, 13, NULL, NULL, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diapositivas`
--

CREATE TABLE `diapositivas` (
  `ID_Dispositiva` int(10) UNSIGNED NOT NULL,
  `ID_Presentacion` int(10) UNSIGNED DEFAULT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `Texto` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `ID_Pregunta` int(10) UNSIGNED DEFAULT NULL,
  `Numero_De_diapositiva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `diapositivas`
--

INSERT INTO `diapositivas` (`ID_Dispositiva`, `ID_Presentacion`, `Nombre`, `updated_at`, `created_at`, `Texto`, `ID_Pregunta`, `Numero_De_diapositiva`) VALUES
(42, 3, 'Es la primera', '2020-03-24 20:21:31', '2020-03-24 19:42:38', '<b-carousel-slide  img-blank img-alt=\"Blank image\" >\r\n                <div class=\"continer-fluid p-0 m-0 w-100 text-dark h-100 pt-3\" style=\"height:500px !important; background-color:#781212!important; \" >\r\n                    <blockquote><p style=\"text-align:center;\"><span class=\"text-huge\" style=\"color:white;font-family:\'Trebuchet MS\', Helvetica, sans-serif;\"><s><strong><u>Este contenido no esta bieen</u></strong></s></span></p></blockquote>\r\n                </div>\r\n\r\n                </b-carousel-slide>', NULL, 3),
(43, 3, 'Esto sirve para subir una imagen', '2020-03-24 20:21:21', '2020-03-24 20:21:21', '<b-carousel-slide  img-blank   style=\"background-image:url(\'./images/Animacion/1crn_surf_map_1585081281.png\') !important; background-blend-mode: color;background: round;\" ></b-carousel-slide>\n', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_07_12_145959_create_permission_tables', 1),
(7, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(8, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(10, '2016_06_01_000004_create_oauth_clients_table', 2),
(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Roles-Permissions Manager Personal Access Client', 'PkZZOFVQcclZShpvlQQ6BxaS5Z07YNVkLxd8zQlq', 'http://localhost', 1, 0, 0, '2020-03-23 05:56:17', '2020-03-23 05:56:17'),
(2, NULL, 'Roles-Permissions Manager Password Grant Client', 'KGkJ9Bl6WYI420cLaIcEBIr0VF8mpNxN3PdOJFlq', 'http://localhost', 0, 1, 0, '2020-03-23 05:56:17', '2020-03-23 05:56:17'),
(3, NULL, 'Roles-Permissions Manager Personal Access Client', 'WfMnnGrp94YPz05gNDn09BV1eMDWnqrO76sN1XaT', 'http://localhost', 1, 0, 0, '2020-03-23 05:56:31', '2020-03-23 05:56:31'),
(4, NULL, 'Roles-Permissions Manager Password Grant Client', 'oREnq5OLv5Z6WswFzKwuA4VeL7DVQ7o8Fy4v9bj2', 'http://localhost', 0, 1, 0, '2020-03-23 05:56:31', '2020-03-23 05:56:31'),
(5, NULL, 'Cesar Admin', '3mGT6pL9i6lvArmnmTuwPdtYPxfpZgYMbi2fAWmZ', 'http://cadmio.localhost/auth/callback', 0, 0, 0, '2020-03-23 06:02:21', '2020-03-23 06:02:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-23 05:56:17', '2020-03-23 05:56:17'),
(2, 3, '2020-03-23 05:56:31', '2020-03-23 05:56:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users_manage', 'web', '2020-02-18 20:15:33', '2020-02-18 20:15:33'),
(2, 'Usuario', 'web', '2020-02-18 20:16:47', '2020-02-18 20:16:47'),
(3, 'Creador de Contenido', 'web', '2020-02-18 20:18:27', '2020-02-18 20:18:27'),
(4, 'Habitador de Contenido', 'web', '2020-02-18 20:18:55', '2020-02-18 20:18:55'),
(5, 'Crear Cuestionario', 'web', '2020-03-15 06:14:18', '2020-03-15 06:14:18'),
(7, 'Ver Temas', 'web', '2020-03-15 09:02:13', '2020-03-15 09:02:13'),
(8, 'Editar Temas', 'web', '2020-03-15 09:04:04', '2020-03-15 09:04:04'),
(9, 'Ver Cuestionarios', 'web', '2020-03-15 11:46:35', '2020-03-15 11:46:35'),
(10, 'Editar Cuestionarios', 'web', '2020-03-15 11:47:01', '2020-03-15 11:47:01'),
(11, 'Ver Preguntas', 'web', '2020-03-15 20:11:31', '2020-03-15 20:11:31'),
(12, 'Editar Preguntas', 'web', '2020-03-15 20:11:43', '2020-03-15 20:11:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `ID_Pregunta` int(11) UNSIGNED NOT NULL,
  `Enunciado` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `Recurso` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ID_Tipo` int(10) UNSIGNED DEFAULT NULL,
  `ID_Retro_Alimentacion` int(10) UNSIGNED DEFAULT NULL,
  `ID_Tema` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ID_User` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`ID_Pregunta`, `Enunciado`, `Recurso`, `ID_Tipo`, `ID_Retro_Alimentacion`, `ID_Tema`, `created_at`, `updated_at`, `ID_User`) VALUES
(1, '¿Por que lalo es tan Homosexual?', NULL, NULL, NULL, NULL, '2020-03-15 06:07:13', '2020-03-18 00:00:00', 1),
(2, '¿Como matar a un elefante en Frrancia?', NULL, 3, 1, NULL, '2020-03-16 01:45:36', '2020-03-16 01:45:36', NULL),
(3, 'sdsadad', NULL, 5, 2, NULL, '2020-03-16 01:47:09', '2020-03-16 01:47:09', NULL),
(4, 'Una  Super Pregunta', NULL, 6, 3, NULL, '2020-03-16 01:48:04', '2020-03-16 01:48:04', NULL),
(5, 'No se morir', NULL, 4, 4, NULL, '2020-03-16 02:05:24', '2020-03-16 02:05:24', NULL),
(6, 'Ya se que quiero ser', NULL, 8, 5, NULL, '2020-03-16 02:05:49', '2020-03-16 02:05:49', NULL),
(7, 'Un enunciado completo', NULL, 4, 6, NULL, '2020-03-16 14:42:40', '2020-03-16 14:42:40', NULL),
(8, 'Un enunciado completo', NULL, 4, 7, NULL, '2020-03-16 14:43:18', '2020-03-16 14:43:18', NULL),
(9, 'Un enunciado completo', NULL, 4, 8, NULL, '2020-03-16 14:46:01', '2020-03-16 14:46:01', NULL),
(10, 'Un enunciado completo', NULL, 4, 9, NULL, '2020-03-16 14:46:35', '2020-03-16 14:46:35', NULL),
(11, 'Un enunciado completo', NULL, 5, 10, NULL, '2020-03-16 14:46:58', '2020-03-16 14:46:58', NULL),
(12, 'Un enunciado completo', NULL, 5, 11, NULL, '2020-03-16 14:48:38', '2020-03-16 14:48:38', NULL),
(13, 'un tippo', 'public/recursos/13/5y2MLAMbsJMLZnY6ySnXl9gSTBlJ8tvxx0b5un8o.jpeg', 8, 12, NULL, '2020-03-16 21:38:08', '2020-03-16 22:50:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_respuestas`
--

CREATE TABLE `preguntas_respuestas` (
  `ID_Pregunta` int(10) UNSIGNED NOT NULL,
  `ID_Respuesta` int(10) UNSIGNED NOT NULL,
  `Numero` int(11) DEFAULT NULL,
  `ID_Relacion_Pregunta_Cues` int(11) NOT NULL,
  `ES_Correcta` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas_respuestas`
--

INSERT INTO `preguntas_respuestas` (`ID_Pregunta`, `ID_Respuesta`, `Numero`, `ID_Relacion_Pregunta_Cues`, `ES_Correcta`) VALUES
(2, 4, 5, 4, 0),
(2, 5, 23, 5, 0),
(5, 6, 1, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentaciones`
--

CREATE TABLE `presentaciones` (
  `ID_Presentacion` int(11) UNSIGNED NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presentaciones`
--

INSERT INTO `presentaciones` (`ID_Presentacion`, `Nombre`, `Descripcion`, `created_at`, `updated_at`) VALUES
(3, 'Esto si parece ser perfecto en todo el sentido de la palabra es muy hermoso', 'Lo es en vedad lo es amigo mio', '2020-03-24 02:37:11', '2020-03-24 05:03:29'),
(5, 'una nueva presentacion es demasiado linda es perfecta', 'una pequeña descripcion', '2020-03-24 04:42:36', '2020-03-24 04:42:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `ID_Respuesta` int(11) UNSIGNED NOT NULL,
  `Respuesta` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ID_User` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`ID_Respuesta`, `Respuesta`, `created_at`, `updated_at`, `ID_User`) VALUES
(1, 'Una respuesta', '2020-03-16 16:53:57', '2020-03-16 16:53:57', 1),
(2, 'otra respuesta', '2020-03-16 16:59:10', '2020-03-16 16:59:10', 1),
(3, 'Una Respuesta no es muy complicado verdad', '2020-03-16 17:09:17', '2020-03-16 17:09:17', 1),
(4, 'una respuestas', '2020-03-16 17:10:28', '2020-03-16 17:10:28', 1),
(5, 'jdsaf', '2020-03-16 17:10:35', '2020-03-16 17:10:35', 1),
(6, 'Esta es unaRespuesta a la Pregunta', '2020-03-16 23:51:37', '2020-03-16 23:51:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retro_infos`
--

CREATE TABLE `retro_infos` (
  `ID_Retro` int(10) UNSIGNED NOT NULL,
  `RetroAlimentacion` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `retro_infos`
--

INSERT INTO `retro_infos` (`ID_Retro`, `RetroAlimentacion`, `created_at`, `updated_at`, `ID_User`) VALUES
(1, 'No se puede Matar', '2020-03-16 01:45:36', '2020-03-16 01:45:36', NULL),
(2, 'sdasdjhkaj', '2020-03-16 01:47:09', '2020-03-16 01:47:09', NULL),
(3, 'No se puede Matar', '2020-03-16 01:48:03', '2020-03-16 01:48:03', NULL),
(4, 'sdfasdf', '2020-03-16 02:05:24', '2020-03-16 02:05:24', NULL),
(5, 'sdasdjhkaj', '2020-03-16 02:05:49', '2020-03-16 02:05:49', NULL),
(6, 'ESto se arma asi es demasiado grande', '2020-03-16 14:42:40', '2020-03-16 14:42:40', NULL),
(7, 'ESto se arma asi es demasiado grande', '2020-03-16 14:43:18', '2020-03-16 14:43:18', NULL),
(8, 'ESto se arma asi es demasiado grande', '2020-03-16 14:46:01', '2020-03-16 14:46:01', NULL),
(9, 'ESto se arma asi es demasiado grande', '2020-03-16 14:46:35', '2020-03-16 14:46:35', NULL),
(10, 'asdf', '2020-03-16 14:46:58', '2020-03-16 14:46:58', NULL),
(11, 'asdf', '2020-03-16 14:48:38', '2020-03-16 14:48:38', NULL),
(12, 'sdfadfas', '2020-03-16 21:38:08', '2020-03-16 21:38:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2020-02-18 20:15:33', '2020-02-18 20:15:33'),
(2, 'Usuario', 'web', '2020-02-18 20:19:29', '2020-02-18 20:19:29'),
(3, 'Creador de Contenido', 'web', '2020-03-15 23:27:03', '2020-03-15 23:27:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `ID_Tema` int(10) UNSIGNED NOT NULL,
  `ID_Tema_Prin` int(10) UNSIGNED DEFAULT NULL,
  `Nombre_Tema` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`ID_Tema`, `ID_Tema_Prin`, `Nombre_Tema`, `Descripcion`, `created_at`, `updated_at`, `ID_User`) VALUES
(1, NULL, 'Comunicacion', 'ddkdkdkd', '2020-03-18 07:17:25', NULL, NULL),
(4, 1, 'dsafdsaf', 'asdfasdfasf', '2020-03-15 05:33:10', '2020-03-15 05:33:29', 1),
(5, NULL, 'un tema', 'addds', '2020-03-16 22:12:30', '2020-03-16 22:12:30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dispositivas`
--

CREATE TABLE `tipo_dispositivas` (
  `ID_TipoDispositiva` int(10) UNSIGNED NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Habilitado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_resps`
--

CREATE TABLE `tipo_resps` (
  `ID_TipoRespuesta` int(11) UNSIGNED NOT NULL,
  `Tipo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ID_User` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_resps`
--

INSERT INTO `tipo_resps` (`ID_TipoRespuesta`, `Tipo`, `created_at`, `updated_at`, `ID_User`) VALUES
(3, 'Pregunta', '2020-03-16 00:14:08', '2020-03-16 15:19:16', 1),
(4, 'Recurso Con Pregunta', '2020-03-16 00:20:34', '2020-03-16 15:19:32', 1),
(5, 'Texto Con Pregunta', '2020-03-16 00:44:15', '2020-03-16 15:19:53', 1),
(6, 'Texto', '2020-03-16 00:50:12', '2020-03-16 15:20:17', 1),
(8, 'Recurso', '2020-03-16 00:50:34', '2020-03-16 17:12:59', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$GJVI8YB54w6HhOi2.Ju/wO2j1LIYwFM13KWKSYZSIhZkpaeBQoxQ6', NULL, '2020-02-18 20:15:34', '2020-02-18 20:15:34'),
(2, 'Cesar', 'Otros@Prueba.com', '$2y$10$igeFutezu9JeG/PtRxAmyO5FVRpacaoLKrNsAa8Z6IL2BgWp44U6O', NULL, '2020-03-15 00:04:22', '2020-03-15 00:06:19'),
(3, 'Miguel', 'miguel@prueba.com', '$2y$10$.3N72LyIN5.UCerocr76NOB/PdivoX7YgxG7Ox0tJk7AuROd9ByDS', NULL, '2020-03-15 23:27:42', '2020-03-15 23:27:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`ID_Cuestionario`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indices de la tabla `cuestionario_preguntas`
--
ALTER TABLE `cuestionario_preguntas`
  ADD PRIMARY KEY (`ID_Relacion_Pregunta_Cues`),
  ADD KEY `ID_Cuestionario` (`ID_Cuestionario`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`);

--
-- Indices de la tabla `diapositivas`
--
ALTER TABLE `diapositivas`
  ADD PRIMARY KEY (`ID_Dispositiva`),
  ADD KEY `ID_Dispositiva` (`ID_Dispositiva`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`),
  ADD KEY `ID_Presentacion` (`ID_Presentacion`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`ID_Pregunta`),
  ADD KEY `ID_Tipo` (`ID_Tipo`),
  ADD KEY `ID_Retro_Alimentacion` (`ID_Retro_Alimentacion`),
  ADD KEY `ID_Tema` (`ID_Tema`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indices de la tabla `preguntas_respuestas`
--
ALTER TABLE `preguntas_respuestas`
  ADD PRIMARY KEY (`ID_Relacion_Pregunta_Cues`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`),
  ADD KEY `ID_Respuesta` (`ID_Respuesta`);

--
-- Indices de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  ADD PRIMARY KEY (`ID_Presentacion`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`ID_Respuesta`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indices de la tabla `retro_infos`
--
ALTER TABLE `retro_infos`
  ADD PRIMARY KEY (`ID_Retro`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`ID_Tema`) USING BTREE,
  ADD KEY `Descripcion` (`Descripcion`),
  ADD KEY `ID_Tema_Prin` (`ID_Tema_Prin`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indices de la tabla `tipo_dispositivas`
--
ALTER TABLE `tipo_dispositivas`
  ADD KEY `ID_TipoDispositiva` (`ID_TipoDispositiva`);

--
-- Indices de la tabla `tipo_resps`
--
ALTER TABLE `tipo_resps`
  ADD PRIMARY KEY (`ID_TipoRespuesta`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `ID_Cuestionario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cuestionario_preguntas`
--
ALTER TABLE `cuestionario_preguntas`
  MODIFY `ID_Relacion_Pregunta_Cues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diapositivas`
--
ALTER TABLE `diapositivas`
  MODIFY `ID_Dispositiva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `ID_Pregunta` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `preguntas_respuestas`
--
ALTER TABLE `preguntas_respuestas`
  MODIFY `ID_Relacion_Pregunta_Cues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  MODIFY `ID_Presentacion` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `ID_Respuesta` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `retro_infos`
--
ALTER TABLE `retro_infos`
  MODIFY `ID_Retro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `ID_Tema` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_resps`
--
ALTER TABLE `tipo_resps`
  MODIFY `ID_TipoRespuesta` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD CONSTRAINT `cuestionarios_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `cuestionario_preguntas`
--
ALTER TABLE `cuestionario_preguntas`
  ADD CONSTRAINT `cuestionario_preguntas_ibfk_1` FOREIGN KEY (`ID_Cuestionario`) REFERENCES `cuestionarios` (`ID_Cuestionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuestionario_preguntas_ibfk_2` FOREIGN KEY (`ID_Pregunta`) REFERENCES `preguntas` (`ID_Pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diapositivas`
--
ALTER TABLE `diapositivas`
  ADD CONSTRAINT `diapositivas_ibfk_1` FOREIGN KEY (`ID_Pregunta`) REFERENCES `preguntas` (`ID_Pregunta`),
  ADD CONSTRAINT `diapositivas_ibfk_2` FOREIGN KEY (`ID_Presentacion`) REFERENCES `presentaciones` (`ID_Presentacion`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`ID_Tema`) REFERENCES `temas` (`ID_Tema`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`ID_Retro_Alimentacion`) REFERENCES `retro_infos` (`ID_Retro`),
  ADD CONSTRAINT `preguntas_ibfk_3` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipo_resps` (`ID_TipoRespuesta`),
  ADD CONSTRAINT `preguntas_ibfk_4` FOREIGN KEY (`ID_User`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `preguntas_respuestas`
--
ALTER TABLE `preguntas_respuestas`
  ADD CONSTRAINT `preguntas_respuestas_ibfk_1` FOREIGN KEY (`ID_Pregunta`) REFERENCES `preguntas` (`ID_Pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntas_respuestas_ibfk_2` FOREIGN KEY (`ID_Respuesta`) REFERENCES `respuestas` (`ID_Respuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `retro_infos`
--
ALTER TABLE `retro_infos`
  ADD CONSTRAINT `retro_infos_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_ibfk_1` FOREIGN KEY (`ID_Tema_Prin`) REFERENCES `temas` (`ID_Tema`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
