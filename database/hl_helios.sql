-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2020 a las 17:32:28
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hl_helios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caso_id` bigint(20) UNSIGNED NOT NULL,
  `lider_usuario_id` bigint(20) UNSIGNED NOT NULL,
  `coordinador_asignante_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `caso_id`, `lider_usuario_id`, `coordinador_asignante_id`, `created_at`, `updated_at`) VALUES
(1, 11, 4, 1, '2020-03-13 15:53:20', '2020-03-13 15:53:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avances`
--

CREATE TABLE `avances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avances_imagenes`
--

CREATE TABLE `avances_imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avances_id` bigint(20) UNSIGNED NOT NULL,
  `imagenes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso`
--

CREATE TABLE `caso` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `correctivo` bigint(20) NOT NULL,
  `orden` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_fin` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sintoma` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prioridad` enum('normal','urgente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `siniestro` enum('si','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `u_tecnica` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inmueble` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `planta` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oficina` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ceco` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emplazamiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinador_bbva` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinador_jhcp_id` int(11) NOT NULL,
  `operador_creador_id` int(11) NOT NULL,
  `disponibilidad` enum('disponible','asignado','ejecutando','evaluando','esperando aprobación','en espera del cliente','culminado','cancelado','cerrado por lider','cerrado por coord') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `caso`
--

INSERT INTO `caso` (`id`, `correctivo`, `orden`, `fecha`, `fecha_fin`, `sintoma`, `prioridad`, `siniestro`, `motivo`, `descripcion`, `usuario`, `telefono`, `u_tecnica`, `inmueble`, `planta`, `oficina`, `ceco`, `emplazamiento`, `coordinador_bbva`, `coordinador_jhcp_id`, `operador_creador_id`, `disponibilidad`, `created_at`, `updated_at`) VALUES
(1, 91273431, 'Mckayla Brakus', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Katheryn Jaskolski', 'normal', 'no', 'Osvaldo Gulgowski', '88398 Jarret Terrace\nMorissettestad, WA 21644-5613', 'Ondricka', 67956431150, 'Akeem McLaughlin II', 'Mae Volkman', 'alta', '0000', 'Sammie Gerlach Sr.', 'Prof. Lexus Doyle II', 'Velva Renner', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(2, 10168214, 'Dr. Alex Bernhard', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Clemmie Lind PhD', 'normal', 'no', 'Hermann Shields', '3430 Lang Mountain Apt. 978\nNorth Jeffreyport, PA 74565', 'Hartmann', 85102840371, 'Mrs. Violet Rempel Sr.', 'Prof. Tony Olson MD', 'alta', '0000', 'Prof. Jazmin Haag IV', 'Bernard Ruecker', 'Jordon Botsford', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(3, 44437876, 'Mr. Jerry Douglas II', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Emily McClure', 'normal', 'no', 'Dax Predovic', '5496 Schroeder Fort Suite 237\nBlockchester, OK 90378', 'Russel', 13376759162, 'Bridgette Herzog Sr.', 'Lacey Little', 'alta', '0000', 'Ashtyn Hudson', 'Jadyn Nienow PhD', 'Stephon Durgan II', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(4, 40401183, 'Justus Jast II', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Cooper Mraz', 'normal', 'no', 'Jenifer Hills', '4772 Blanche Meadow Apt. 659\nRogahnmouth, NM 48635', 'Schinner', 62647550440, 'Horacio Price III', 'Mr. Jeffry Tillman', 'alta', '0000', 'Odessa Rogahn MD', 'Miss Karina Rowe', 'Miss Kyla Hoeger', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(5, 32119755, 'Jennie Dach', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Noel Upton', 'normal', 'no', 'Jacky Bradtke', '203 Aurelie Turnpike Suite 881\nNorth Weldon, ID 74476-4497', 'Altenwerth', 46970058839, 'Brayan Cummerata III', 'Darrin Crist', 'alta', '0000', 'Oliver Lueilwitz', 'Destinee Upton', 'Therese Kreiger', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(6, 73110110, 'Harold Torphy', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Kaitlin Wiza', 'normal', 'no', 'Carrie Tromp', '4273 Pollich Street\nCorwinmouth, MO 54306-2281', 'Harber', 61412188517, 'Dr. Margaret Ebert DVM', 'Amara Haag', 'alta', '0000', 'Alena Goldner', 'Howell Kuhn', 'Willow Kozey', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(7, 21544142, 'Iliana Hessel Sr.', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Dr. Narciso Welch', 'normal', 'no', 'Adella Ebert II', '729 Yundt Parks\nWest Gloriafurt, IA 37197', 'Brakus', 26977073108, 'Abe Gaylord Sr.', 'Conner Schiller', 'alta', '0000', 'Tony Bechtelar', 'Verner Okuneva', 'Jerry Stiedemann', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(8, 36496749, 'Prof. Alanis Greenfelder', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Jada Smith', 'normal', 'no', 'Fern Buckridge', '32989 Sabryna Station Apt. 211\nEast Claudinemouth, CT 49673-7136', 'Jast', 37615494731, 'Elta Rodriguez', 'Vickie Ryan', 'alta', '0000', 'Hadley Schinner V', 'Kieran Conroy', 'Orland Beer', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(9, 35833285, 'Prof. Judd Pollich Sr.', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Mr. Donnell Prohaska DVM', 'normal', 'no', 'Prof. Gavin Raynor I', '7137 Nolan Trafficway Suite 802\nKuphalshire, TN 13023-6678', 'Brown', 86896983774, 'Mr. Kayley Herman', 'Alexander Bergstrom V', 'alta', '0000', 'Teresa Runolfsson', 'Bethel Huels', 'Georgiana Greenfelder', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(10, 22028948, 'Prof. Donato Connelly', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Lelia Stanton', 'normal', 'no', 'Morris Barton IV', '4213 Lueilwitz Plains Apt. 808\nNew Billie, WI 78838', 'Brakus', 50493931707, 'Mr. Tavares Glover DDS', 'Judd Hayes', 'alta', '0000', 'Al Ledner', 'Evie Boyer', 'Colt Pollich MD', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11'),
(11, 11069691, 'Eliseo Brakus', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Lavinia Smith', 'normal', 'no', 'Elroy Kris', '12001 Abbie Run Suite 682\r\nMaxineshire, AK 80650', 'Rath', 52423335522, 'Elvis Waters DVM', 'Maia Gibson I', 'alta', '0000', 'Mathew Thiel', 'Lilly Parisian', 'Prof. Brendan Kertzmann II', 3, 1, 'en espera del cliente', '2020-03-13 14:58:11', '2020-03-13 19:47:45'),
(12, 65428229, 'Carmella Luettgen', '2020-03-13 10:58:11', '2020-03-13 10:58:11', 'Braeden Mills IV', 'normal', 'no', 'Erika Trantow', '12686 Herman Creek Suite 952\nSimonisview, MI 29425', 'Armstrong', 85092241806, 'Reggie Hintz', 'Dr. Harry Nitzsche', 'alta', '0000', 'Kristian Stanton', 'Mrs. Teagan Lynch', 'Eloisa Mante', 1, 1, 'disponible', '2020-03-13 14:58:11', '2020-03-13 14:58:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `crear_usuarios` tinyint(1) NOT NULL DEFAULT '0',
  `modificar_usuario` tinyint(1) NOT NULL DEFAULT '0',
  `rehabilitar_usuario` tinyint(1) NOT NULL DEFAULT '0',
  `deshabilitar_usuarios` tinyint(1) NOT NULL DEFAULT '0',
  `acceso_preciario` tinyint(1) NOT NULL DEFAULT '0',
  `cargar_preciario` tinyint(1) NOT NULL DEFAULT '0',
  `modificar_preciario` tinyint(1) NOT NULL DEFAULT '0',
  `eliminar_preciario` tinyint(1) NOT NULL DEFAULT '0',
  `habilitar_politicas` tinyint(1) NOT NULL DEFAULT '0',
  `crear_politicas` tinyint(1) NOT NULL DEFAULT '0',
  `modificar_politicas` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general`
--

CREATE TABLE `general` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clave_general` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `general`
--

INSERT INTO `general` (`id`, `clave_general`, `created_at`, `updated_at`) VALUES
(1, 'jhcp2019', '2020-03-13 14:58:11', '2020-03-13 14:58:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruta_imagenes` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_seguimiento`
--

CREATE TABLE `imagenes_seguimiento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagenes_id` bigint(20) UNSIGNED NOT NULL,
  `seguimiento_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levantamiento`
--

CREATE TABLE `levantamiento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `asignacion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `levantamiento`
--

INSERT INTO `levantamiento` (`id`, `descripcion`, `asignacion_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, '2020-03-13 18:28:55', '2020-03-13 18:28:55');

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
(75, '2014_10_12_000000_create_users_table', 1),
(76, '2019_09_02_190615_general', 1),
(77, '2019_09_18_183842_operador', 1),
(78, '2019_10_03_141435_asignacion', 1),
(79, '2019_10_03_142521_vista', 1),
(80, '2019_10_14_182506_levantamiento', 1),
(81, '2019_10_16_184450_requerimiento', 1),
(82, '2019_10_29_202001_precios', 1),
(83, '2019_11_22_135146_avances', 1),
(84, '2019_11_22_135829_imagenes', 1),
(85, '2019_11_25_153902_observacion', 1),
(86, '2020_01_09_152658_usuario_imagen', 1),
(87, '2020_01_14_183343_seguimiento', 1),
(88, '2020_01_20_185943_imagenes_seguimiento', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `observacion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aprobado','cancelado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `caso_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_permisos` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operador` tinyint(1) DEFAULT '0',
  `ope_create` tinyint(1) DEFAULT '0',
  `ope_read` tinyint(1) DEFAULT '0',
  `ope_update` tinyint(1) DEFAULT '0',
  `ope_delete` tinyint(1) DEFAULT '0',
  `ope_permiso` tinyint(1) DEFAULT '0',
  `ope_cerrar` tinyint(1) DEFAULT '0',
  `coordinador` tinyint(1) DEFAULT '0',
  `coord_listado` tinyint(1) DEFAULT '0',
  `coord_selection` tinyint(1) DEFAULT '0',
  `coord_consult` tinyint(1) DEFAULT '0',
  `coord_update` tinyint(1) DEFAULT '0',
  `coord_send` tinyint(1) DEFAULT '0',
  `coord_print` tinyint(1) DEFAULT '0',
  `cuadrilla` tinyint(1) DEFAULT '0',
  `cua_print` tinyint(1) DEFAULT '0',
  `cua_create` tinyint(1) DEFAULT '0',
  `cua_read` tinyint(1) DEFAULT '0',
  `cua_update` tinyint(1) DEFAULT '0',
  `cua_delete` tinyint(1) DEFAULT '0',
  `cua_finish` tinyint(1) DEFAULT '0',
  `configuracion` tinyint(1) DEFAULT '0',
  `conf_create` tinyint(1) DEFAULT '0',
  `conf_modify` tinyint(1) DEFAULT '0',
  `conf_show` tinyint(1) DEFAULT '0',
  `conf_rehability` tinyint(1) DEFAULT '0',
  `conf_deshability` tinyint(1) DEFAULT '0',
  `conf_access_pre` tinyint(1) DEFAULT '0',
  `conf_charge_pre` tinyint(1) DEFAULT '0',
  `conf_modify_pre` tinyint(1) DEFAULT '0',
  `conf_del_pre` tinyint(1) DEFAULT '0',
  `conf_hab_pol` tinyint(1) DEFAULT '0',
  `conf_con_pol` tinyint(1) DEFAULT '0',
  `conf_mod_pol` tinyint(1) DEFAULT '0',
  `conf_masterk` tinyint(1) DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre_permisos`, `operador`, `ope_create`, `ope_read`, `ope_update`, `ope_delete`, `ope_permiso`, `ope_cerrar`, `coordinador`, `coord_listado`, `coord_selection`, `coord_consult`, `coord_update`, `coord_send`, `coord_print`, `cuadrilla`, `cua_print`, `cua_create`, `cua_read`, `cua_update`, `cua_delete`, `cua_finish`, `configuracion`, `conf_create`, `conf_modify`, `conf_show`, `conf_rehability`, `conf_deshability`, `conf_access_pre`, `conf_charge_pre`, `conf_modify_pre`, `conf_del_pre`, `conf_hab_pol`, `conf_con_pol`, `conf_mod_pol`, `conf_masterk`, `estado`) VALUES
(1, 'Administrador', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'activo'),
(2, 'Operador', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'activo'),
(3, 'Coordinador', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'activo'),
(4, 'Lider de cuadrilla', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'activo');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `permiso_coordinador`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `permiso_coordinador` (
`id` bigint(20) unsigned
,`name` varchar(100)
,`lastname` varchar(100)
,`nombre_permisos` varchar(60)
,`acceso_coord` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `permiso_lider`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `permiso_lider` (
`id` bigint(20) unsigned
,`name` varchar(100)
,`lastname` varchar(100)
,`nombre_permisos` varchar(60)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `permiso_operador`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `permiso_operador` (
`id` bigint(20) unsigned
,`name` varchar(100)
,`lastname` varchar(100)
,`nombre_permisos` varchar(60)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `costo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asignacion_id` bigint(20) UNSIGNED NOT NULL,
  `coord_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id`, `costo`, `asignacion_id`, `coord_id`, `created_at`, `updated_at`) VALUES
(1, '222200', 1, 3, '2020-03-13 19:47:44', '2020-03-13 19:47:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimiento`
--

CREATE TABLE `requerimiento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_producto` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metrica` enum('M','PZA','SAL','M2','SERV','M3','ML','KG','Otros') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `levantamiento_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `requerimiento`
--

INSERT INTO `requerimiento` (`id`, `nombre_producto`, `metrica`, `cantidad`, `levantamiento_id`, `created_at`, `updated_at`) VALUES
(2, 'aed ut perspiciatis unde omnis', 'M', '1', 1, '2020-03-13 19:14:30', '2020-03-13 19:46:26'),
(3, 'rrr perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'Otros', '3', 1, '2020-03-13 19:22:22', '2020-03-13 20:28:39'),
(5, 'dsdsdvdv', 'SERV', '3', 1, '2020-03-13 20:33:43', '2020-03-13 20:33:43'),
(6, 'scsa caaca scasc', 'M3', '5', 1, '2020-03-13 20:37:11', '2020-03-13 21:29:50'),
(7, 'css acasc', 'M3', '3', 1, '2020-03-13 20:38:49', '2020-03-13 20:38:49'),
(8, 'nuevo', 'SAL', '2', 1, '2020-03-13 21:34:20', '2020-03-13 21:34:26'),
(9, 'nuevo 3', 'Otros', '4', 1, '2020-03-13 21:34:47', '2020-03-13 21:34:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avance` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotografo` bigint(20) NOT NULL,
  `caso_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_imagen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `permisos_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `email_verified_at`, `password`, `nombre_imagen`, `remember_token`, `created_at`, `updated_at`, `estado`, `permisos_id`) VALUES
(1, 'admin', 'principal', 'admin@admin', '2020-03-13 14:58:11', '$2y$10$40aE0nkSkhHY74fFzfom5e/BqAZk/0nW9KLRUgehlG0PxM42Ibl9K', 'imagenes/sistemas/user.png', 'qbXlRbQaPTn4oxhJdyZeiJFqiZPo4357YSObb1Uw0EnMO8kpd0mHGfldBAVm', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(2, 'operador', 'operador', 'operador@operador', '2020-03-13 14:58:11', '$2y$10$CV63tsX8aO7lg1LAtJ0BT.yLX4GFUB97LGcu4XcjGX9P2lI1MNZYG', 'imagenes/sistemas/user.png', 'tgMDsBxIJK', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 2),
(3, 'coord', 'coordinador', 'coord@coord', '2020-03-13 14:58:11', '$2y$10$.587plHXVrOC29sESjBLNOjr1wJ5ewhcwNj98kD2liCCfHhgwqFCW', 'imagenes/sistemas/user.png', 'B1Rk9UMn51wtmwl7LX1wEHNbPxj3Z0FZ31BZ0gJ9hYdrr3GakYGoebnGptWu', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 3),
(4, 'lider', 'cuadrilla', 'lider@lider', '2020-03-13 14:58:11', '$2y$10$X7XirSt6shNSQO4ND9CaF.3udfZp0x5vwgLt1sw5p89Xlxa4vdxoy', 'imagenes/sistemas/user.png', 'zDUZb7P4tm7fzaNaHzb7BqsfvXPMzvkWCpOBjSf6rHQ4TsKohns6wJUhITWU', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 4),
(5, 'Noble Strosin', 'Leannon', 'phahn@example.org', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 'RcQrv0OTmi', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(6, 'Rosalee Bechtelar', 'Rutherford', 'bettye02@example.net', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 'a9RjeUgHOl', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(7, 'Mr. Hank Nitzsche Sr.', 'Crooks', 'kulas.melisa@example.net', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 'b7UQAUYI31', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(8, 'Lee Blick', 'Lubowitz', 'kamron.cummerata@example.com', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 'cayq4kLnfe', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(9, 'Ladarius Brekke IV', 'Konopelski', 'freeda.harris@example.org', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 's9Tx8lfCle', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(10, 'Lyda Kerluke DDS', 'Dach', 'rschulist@example.com', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 'gKnbsZ1ReG', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(11, 'Prof. Valerie Goodwin PhD', 'Hansen', 'kulas.emile@example.com', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 'dkhRdkgaxQ', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(12, 'Sigrid Lang', 'Luettgen', 'qdickens@example.net', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 'hgfaDccD2U', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1),
(13, 'Prof. Kayden Price MD', 'Treutel', 'cloyd.kuphal@example.net', '2020-03-13 14:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imagenes/sistemas/user.png', 'l3Om2Oflpy', '2020-03-13 14:58:11', '2020-03-13 14:58:11', 'activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_imagen`
--

CREATE TABLE `usuario_imagen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `imagenes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_asignacion_index`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_asignacion_index` (
`id` bigint(20) unsigned
,`correctivo` bigint(20)
,`sintoma` varchar(100)
,`disponibilidad` enum('disponible','asignado','ejecutando','evaluando','esperando aprobación','en espera del cliente','culminado','cancelado','cerrado por lider','cerrado por coord')
,`coordinador_jhcp_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_img`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_img` (
`id_img` bigint(20) unsigned
,`id_seg` bigint(20) unsigned
,`ruta` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_levantamiento`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_levantamiento` (
`id_caso` bigint(20) unsigned
,`correctivo` bigint(20)
,`orden` varchar(60)
,`fecha` varchar(22)
,`sintoma` varchar(100)
,`prioridad` enum('normal','urgente')
,`siniestro` enum('si','no')
,`motivo` varchar(100)
,`caso_descripcion` varchar(250)
,`usuario` varchar(50)
,`telefono` bigint(20)
,`u_tecnica` varchar(100)
,`inmueble` varchar(100)
,`planta` varchar(60)
,`oficina` varchar(20)
,`ceco` varchar(60)
,`emplazamiento` varchar(100)
,`coordinador_bbva` varchar(60)
,`coordinador_jhcp_id` int(11)
,`operador_creador_id` int(11)
,`disponibilidad` enum('disponible','asignado','ejecutando','evaluando','esperando aprobación','en espera del cliente','culminado','cancelado','cerrado por lider','cerrado por coord')
,`id_asignacion` bigint(20) unsigned
,`caso_id` bigint(20) unsigned
,`lider_usuario_id` bigint(20) unsigned
,`coordinador_asignante_id` bigint(20)
,`id_levantamiento` bigint(20) unsigned
,`levantamiento_descripcion` longtext
,`asignacion_id` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_levantamiento_index`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_levantamiento_index` (
`id_caso` bigint(20) unsigned
,`correctivo` bigint(20)
,`orden` varchar(60)
,`fecha` varchar(22)
,`sintoma` varchar(100)
,`prioridad` enum('normal','urgente')
,`siniestro` enum('si','no')
,`motivo` varchar(100)
,`descripcion` varchar(250)
,`usuario` varchar(50)
,`telefono` bigint(20)
,`u_tecnica` varchar(100)
,`inmueble` varchar(100)
,`planta` varchar(60)
,`oficina` varchar(20)
,`ceco` varchar(60)
,`emplazamiento` varchar(100)
,`coordinador_bbva` varchar(60)
,`coordinador_jhcp_id` int(11)
,`operador_creador_id` int(11)
,`disponibilidad` enum('disponible','asignado','ejecutando','evaluando','esperando aprobación','en espera del cliente','culminado','cancelado','cerrado por lider','cerrado por coord')
,`id_users` bigint(20) unsigned
,`name` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`estado` enum('activo','inactivo')
,`lider_usuario_id` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_lista_imagenes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_lista_imagenes` (
`id` bigint(20) unsigned
,`ruta_imagen` varchar(200)
,`seguimiento_id` bigint(20) unsigned
,`caso_id` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_mini_levantamiento_index`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_mini_levantamiento_index` (
`id` bigint(20) unsigned
,`correctivo` bigint(20)
,`sintoma` varchar(100)
,`disponibilidad` enum('disponible','asignado','ejecutando','evaluando','esperando aprobación','en espera del cliente','culminado','cancelado','cerrado por lider','cerrado por coord')
,`lider_usuario_id` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_permiso_coordinador`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_permiso_coordinador` (
`id` bigint(20) unsigned
,`name` varchar(100)
,`lastname` varchar(100)
,`nombre_permisos` varchar(60)
,`acceso_coord` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_permiso_lider`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_permiso_lider` (
`id` bigint(20) unsigned
,`name` varchar(100)
,`lastname` varchar(100)
,`nombre_permisos` varchar(60)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_permiso_operador`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_permiso_operador` (
`id` bigint(20) unsigned
,`name` varchar(100)
,`lastname` varchar(100)
,`nombre_permisos` varchar(60)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_primera_lista_imagenes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_primera_lista_imagenes` (
`id` bigint(20) unsigned
,`nombre` varchar(201)
,`imagen` varchar(100)
,`avance` longtext
,`caso_id` bigint(20) unsigned
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_procedimiento_general`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_procedimiento_general` (
`id_operador` bigint(20) unsigned
,`correctivo` bigint(20)
,`orden` varchar(60)
,`fecha` varchar(22)
,`fecha_fin` varchar(22)
,`sintoma` varchar(100)
,`prioridad` enum('normal','urgente')
,`siniestro` enum('si','no')
,`motivo` varchar(100)
,`descripcion` varchar(250)
,`usuario` varchar(50)
,`telefono` bigint(20)
,`u_tecnica` varchar(100)
,`inmueble` varchar(100)
,`planta` varchar(60)
,`oficina` varchar(20)
,`ceco` varchar(60)
,`emplazamiento` varchar(100)
,`coordinador_bbva` varchar(60)
,`coordinador_jhcp_id` int(11)
,`operador_creador_id` int(11)
,`lider_usuario_id` bigint(20) unsigned
,`disponibilidad` enum('disponible','asignado','ejecutando','evaluando','esperando aprobación','en espera del cliente','culminado','cancelado','cerrado por lider','cerrado por coord')
,`id_levantamiento` bigint(20) unsigned
,`lev_descripcion` longtext
,`apro_repro_observacion` longtext
,`costos` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `permiso_coordinador`
--
DROP TABLE IF EXISTS `permiso_coordinador`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `permiso_coordinador`  AS  select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`lastname` AS `lastname`,`permisos`.`nombre_permisos` AS `nombre_permisos`,`permisos`.`coord_listado` AS `acceso_coord` from (`users` join `permisos` on((`permisos`.`id` = `users`.`permisos_id`))) where ((`users`.`estado` = 'activo') and (`permisos`.`coordinador` = 1)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `permiso_lider`
--
DROP TABLE IF EXISTS `permiso_lider`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `permiso_lider`  AS  select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`lastname` AS `lastname`,`permisos`.`nombre_permisos` AS `nombre_permisos` from (`users` join `permisos` on((`permisos`.`id` = `users`.`permisos_id`))) where ((`users`.`estado` = 'activo') and (`permisos`.`cuadrilla` = 1)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `permiso_operador`
--
DROP TABLE IF EXISTS `permiso_operador`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `permiso_operador`  AS  select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`lastname` AS `lastname`,`permisos`.`nombre_permisos` AS `nombre_permisos` from (`users` join `permisos` on((`permisos`.`id` = `users`.`permisos_id`))) where ((`users`.`estado` = 'activo') and (`permisos`.`operador` = 1)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_asignacion_index`
--
DROP TABLE IF EXISTS `vw_asignacion_index`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_asignacion_index`  AS  select `caso`.`id` AS `id`,`caso`.`correctivo` AS `correctivo`,`caso`.`sintoma` AS `sintoma`,`caso`.`disponibilidad` AS `disponibilidad`,`caso`.`coordinador_jhcp_id` AS `coordinador_jhcp_id` from `caso` where (`caso`.`disponibilidad` = 'disponible') order by `caso`.`id` desc limit 10 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_img`
--
DROP TABLE IF EXISTS `vw_img`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_img`  AS  select `imagenes`.`id` AS `id_img`,`seguimiento`.`id` AS `id_seg`,`imagenes`.`ruta_imagenes` AS `ruta` from ((`imagenes_seguimiento` join `imagenes` on((`imagenes_seguimiento`.`imagenes_id` = `imagenes`.`id`))) join `seguimiento` on((`imagenes_seguimiento`.`seguimiento_id` = `seguimiento`.`id`))) order by `imagenes`.`id` desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_levantamiento`
--
DROP TABLE IF EXISTS `vw_levantamiento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_levantamiento`  AS  select `caso`.`id` AS `id_caso`,`caso`.`correctivo` AS `correctivo`,`caso`.`orden` AS `orden`,`caso`.`fecha` AS `fecha`,`caso`.`sintoma` AS `sintoma`,`caso`.`prioridad` AS `prioridad`,`caso`.`siniestro` AS `siniestro`,`caso`.`motivo` AS `motivo`,`caso`.`descripcion` AS `caso_descripcion`,`caso`.`usuario` AS `usuario`,`caso`.`telefono` AS `telefono`,`caso`.`u_tecnica` AS `u_tecnica`,`caso`.`inmueble` AS `inmueble`,`caso`.`planta` AS `planta`,`caso`.`oficina` AS `oficina`,`caso`.`ceco` AS `ceco`,`caso`.`emplazamiento` AS `emplazamiento`,`caso`.`coordinador_bbva` AS `coordinador_bbva`,`caso`.`coordinador_jhcp_id` AS `coordinador_jhcp_id`,`caso`.`operador_creador_id` AS `operador_creador_id`,`caso`.`disponibilidad` AS `disponibilidad`,`asignacion`.`id` AS `id_asignacion`,`asignacion`.`caso_id` AS `caso_id`,`asignacion`.`lider_usuario_id` AS `lider_usuario_id`,`asignacion`.`coordinador_asignante_id` AS `coordinador_asignante_id`,`levantamiento`.`id` AS `id_levantamiento`,`levantamiento`.`descripcion` AS `levantamiento_descripcion`,`levantamiento`.`asignacion_id` AS `asignacion_id` from ((`levantamiento` left join `asignacion` on((`asignacion`.`id` = `levantamiento`.`asignacion_id`))) left join `caso` on((`asignacion`.`caso_id` = `caso`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_levantamiento_index`
--
DROP TABLE IF EXISTS `vw_levantamiento_index`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_levantamiento_index`  AS  select `caso`.`id` AS `id_caso`,`caso`.`correctivo` AS `correctivo`,`caso`.`orden` AS `orden`,`caso`.`fecha` AS `fecha`,`caso`.`sintoma` AS `sintoma`,`caso`.`prioridad` AS `prioridad`,`caso`.`siniestro` AS `siniestro`,`caso`.`motivo` AS `motivo`,`caso`.`descripcion` AS `descripcion`,`caso`.`usuario` AS `usuario`,`caso`.`telefono` AS `telefono`,`caso`.`u_tecnica` AS `u_tecnica`,`caso`.`inmueble` AS `inmueble`,`caso`.`planta` AS `planta`,`caso`.`oficina` AS `oficina`,`caso`.`ceco` AS `ceco`,`caso`.`emplazamiento` AS `emplazamiento`,`caso`.`coordinador_bbva` AS `coordinador_bbva`,`caso`.`coordinador_jhcp_id` AS `coordinador_jhcp_id`,`caso`.`operador_creador_id` AS `operador_creador_id`,`caso`.`disponibilidad` AS `disponibilidad`,`users`.`id` AS `id_users`,`users`.`name` AS `name`,`users`.`lastname` AS `lastname`,`users`.`email` AS `email`,`users`.`estado` AS `estado`,`asignacion`.`lider_usuario_id` AS `lider_usuario_id` from ((`caso` join `asignacion` on((`caso`.`id` = `asignacion`.`caso_id`))) join `users` on((`users`.`id` = `asignacion`.`lider_usuario_id`))) order by `caso`.`id` desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_lista_imagenes`
--
DROP TABLE IF EXISTS `vw_lista_imagenes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lista_imagenes`  AS  select `imagenes`.`id` AS `id`,`imagenes`.`ruta_imagenes` AS `ruta_imagen`,`imagenes_seguimiento`.`seguimiento_id` AS `seguimiento_id`,`seguimiento`.`caso_id` AS `caso_id` from (((`imagenes_seguimiento` join `imagenes` on((`imagenes_seguimiento`.`imagenes_id` = `imagenes`.`id`))) join `seguimiento` on((`imagenes_seguimiento`.`seguimiento_id` = `seguimiento`.`id`))) join `caso` on((`caso`.`id` = `seguimiento`.`caso_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_mini_levantamiento_index`
--
DROP TABLE IF EXISTS `vw_mini_levantamiento_index`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_mini_levantamiento_index`  AS  select `caso`.`id` AS `id`,`caso`.`correctivo` AS `correctivo`,`caso`.`sintoma` AS `sintoma`,`caso`.`disponibilidad` AS `disponibilidad`,`asignacion`.`lider_usuario_id` AS `lider_usuario_id` from (`caso` join `asignacion` on((`caso`.`id` = `asignacion`.`caso_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_permiso_coordinador`
--
DROP TABLE IF EXISTS `vw_permiso_coordinador`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_permiso_coordinador`  AS  select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`lastname` AS `lastname`,`permisos`.`nombre_permisos` AS `nombre_permisos`,`permisos`.`coord_listado` AS `acceso_coord` from (`users` join `permisos` on((`permisos`.`id` = `users`.`permisos_id`))) where ((`users`.`estado` = 'activo') and (`permisos`.`coordinador` = '1')) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_permiso_lider`
--
DROP TABLE IF EXISTS `vw_permiso_lider`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_permiso_lider`  AS  select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`lastname` AS `lastname`,`permisos`.`nombre_permisos` AS `nombre_permisos` from (`users` join `permisos` on((`permisos`.`id` = `users`.`permisos_id`))) where ((`users`.`estado` = 'activo') and (`permisos`.`cuadrilla` = '1')) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_permiso_operador`
--
DROP TABLE IF EXISTS `vw_permiso_operador`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_permiso_operador`  AS  select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`lastname` AS `lastname`,`permisos`.`nombre_permisos` AS `nombre_permisos` from (`users` join `permisos` on((`permisos`.`id` = `users`.`permisos_id`))) where ((`users`.`estado` = 'activo') and (`permisos`.`operador` = '1')) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_primera_lista_imagenes`
--
DROP TABLE IF EXISTS `vw_primera_lista_imagenes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_primera_lista_imagenes`  AS  select `seguimiento`.`id` AS `id`,concat(`users`.`name`,' ',`users`.`lastname`) AS `nombre`,`users`.`nombre_imagen` AS `imagen`,`seguimiento`.`avance` AS `avance`,`seguimiento`.`caso_id` AS `caso_id`,`seguimiento`.`created_at` AS `created_at` from (`users` join `seguimiento` on((`seguimiento`.`fotografo` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_procedimiento_general`
--
DROP TABLE IF EXISTS `vw_procedimiento_general`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_procedimiento_general`  AS  select `caso`.`id` AS `id_operador`,`caso`.`correctivo` AS `correctivo`,`caso`.`orden` AS `orden`,`caso`.`fecha` AS `fecha`,`caso`.`fecha_fin` AS `fecha_fin`,`caso`.`sintoma` AS `sintoma`,`caso`.`prioridad` AS `prioridad`,`caso`.`siniestro` AS `siniestro`,`caso`.`motivo` AS `motivo`,`caso`.`descripcion` AS `descripcion`,`caso`.`usuario` AS `usuario`,`caso`.`telefono` AS `telefono`,`caso`.`u_tecnica` AS `u_tecnica`,`caso`.`inmueble` AS `inmueble`,`caso`.`planta` AS `planta`,`caso`.`oficina` AS `oficina`,`caso`.`ceco` AS `ceco`,`caso`.`emplazamiento` AS `emplazamiento`,`caso`.`coordinador_bbva` AS `coordinador_bbva`,`caso`.`coordinador_jhcp_id` AS `coordinador_jhcp_id`,`caso`.`operador_creador_id` AS `operador_creador_id`,`asignacion`.`lider_usuario_id` AS `lider_usuario_id`,`caso`.`disponibilidad` AS `disponibilidad`,`levantamiento`.`id` AS `id_levantamiento`,`levantamiento`.`descripcion` AS `lev_descripcion`,`observacion`.`observacion` AS `apro_repro_observacion`,`precios`.`costo` AS `costos` from ((((`caso` left join `observacion` on((`caso`.`id` = `observacion`.`caso_id`))) left join `asignacion` on((`asignacion`.`caso_id` = `caso`.`id`))) left join `levantamiento` on((`levantamiento`.`asignacion_id` = `asignacion`.`id`))) left join `precios` on((`precios`.`asignacion_id` = `asignacion`.`id`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignacion_caso_id_foreign` (`caso_id`),
  ADD KEY `asignacion_lider_usuario_id_foreign` (`lider_usuario_id`);

--
-- Indices de la tabla `avances`
--
ALTER TABLE `avances`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avances_imagenes`
--
ALTER TABLE `avances_imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avances_imagenes_avances_id_foreign` (`avances_id`),
  ADD KEY `avances_imagenes_imagenes_id_foreign` (`imagenes_id`);

--
-- Indices de la tabla `caso`
--
ALTER TABLE `caso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_seguimiento`
--
ALTER TABLE `imagenes_seguimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_seguimiento_imagenes_id_foreign` (`imagenes_id`),
  ADD KEY `imagenes_seguimiento_seguimiento_id_foreign` (`seguimiento_id`);

--
-- Indices de la tabla `levantamiento`
--
ALTER TABLE `levantamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levantamiento_asignacion_id_foreign` (`asignacion_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `observacion_caso_id_foreign` (`caso_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `precios_asignacion_id_foreign` (`asignacion_id`);

--
-- Indices de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requerimiento_levantamiento_id_foreign` (`levantamiento_id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguimiento_caso_id_foreign` (`caso_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_permisos_id_foreign` (`permisos_id`);

--
-- Indices de la tabla `usuario_imagen`
--
ALTER TABLE `usuario_imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_imagen_usuario_id_foreign` (`usuario_id`),
  ADD KEY `usuario_imagen_imagenes_id_foreign` (`imagenes_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `avances`
--
ALTER TABLE `avances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `avances_imagenes`
--
ALTER TABLE `avances_imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caso`
--
ALTER TABLE `caso`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `general`
--
ALTER TABLE `general`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_seguimiento`
--
ALTER TABLE `imagenes_seguimiento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `levantamiento`
--
ALTER TABLE `levantamiento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario_imagen`
--
ALTER TABLE `usuario_imagen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_caso_id_foreign` FOREIGN KEY (`caso_id`) REFERENCES `caso` (`id`),
  ADD CONSTRAINT `asignacion_lider_usuario_id_foreign` FOREIGN KEY (`lider_usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `avances_imagenes`
--
ALTER TABLE `avances_imagenes`
  ADD CONSTRAINT `avances_imagenes_avances_id_foreign` FOREIGN KEY (`avances_id`) REFERENCES `avances` (`id`),
  ADD CONSTRAINT `avances_imagenes_imagenes_id_foreign` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`);

--
-- Filtros para la tabla `imagenes_seguimiento`
--
ALTER TABLE `imagenes_seguimiento`
  ADD CONSTRAINT `imagenes_seguimiento_imagenes_id_foreign` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`),
  ADD CONSTRAINT `imagenes_seguimiento_seguimiento_id_foreign` FOREIGN KEY (`seguimiento_id`) REFERENCES `seguimiento` (`id`);

--
-- Filtros para la tabla `levantamiento`
--
ALTER TABLE `levantamiento`
  ADD CONSTRAINT `levantamiento_asignacion_id_foreign` FOREIGN KEY (`asignacion_id`) REFERENCES `asignacion` (`id`);

--
-- Filtros para la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `observacion_caso_id_foreign` FOREIGN KEY (`caso_id`) REFERENCES `caso` (`id`);

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_asignacion_id_foreign` FOREIGN KEY (`asignacion_id`) REFERENCES `asignacion` (`id`);

--
-- Filtros para la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  ADD CONSTRAINT `requerimiento_levantamiento_id_foreign` FOREIGN KEY (`levantamiento_id`) REFERENCES `levantamiento` (`id`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_caso_id_foreign` FOREIGN KEY (`caso_id`) REFERENCES `caso` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_permisos_id_foreign` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`);

--
-- Filtros para la tabla `usuario_imagen`
--
ALTER TABLE `usuario_imagen`
  ADD CONSTRAINT `usuario_imagen_imagenes_id_foreign` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`),
  ADD CONSTRAINT `usuario_imagen_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
