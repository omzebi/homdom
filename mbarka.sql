-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2018 a las 20:12:24
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


dddd



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mbarka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_arduinos`
--

CREATE TABLE `ot_arduinos` (
  `id` int(11) NOT NULL,
  `mac` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_attempts`
--

CREATE TABLE `ot_attempts` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_background`
--

CREATE TABLE `ot_background` (
  `id` int(11) NOT NULL,
  `img` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_background`
--

INSERT INTO `ot_background` (`id`, `img`, `title`, `status`) VALUES
(1, 'domotica1.jpg', '', 1),
(2, 'domotica2.jpg', '', 1),
(3, 'domotica3.jpg', '', 1),
(4, 'domotica4.jpg', '', 1),
(5, 'domotica5.jpg', '', 1),
(6, 'domotica6.jpg', '', 1),
(7, 'domotica7.jpg', '', 1),
(8, 'domotica8.jpg', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_colors`
--

CREATE TABLE `ot_colors` (
  `id` int(11) NOT NULL,
  `color1` varchar(30) NOT NULL,
  `color2` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_colors`
--

INSERT INTO `ot_colors` (`id`, `color1`, `color2`, `status`) VALUES
(1, '#205BAD', '#ffffff', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_devices`
--

CREATE TABLE `ot_devices` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `idarduino` int(11) NOT NULL,
  `idplace` int(11) NOT NULL,
  `auto` enum('s','n') NOT NULL,
  `position` enum('','l','r') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_devices`
--

INSERT INTO `ot_devices` (`id`, `name`, `idarduino`, `idplace`, `auto`, `position`) VALUES
(1, 'TV salón', 0, 0, 's', 'l'),
(2, 'LIGHTS Hall', 0, 0, 's', 'l'),
(3, 'DOORWAY', 0, 0, 's', 'l'),
(4, 'ALARM', 0, 0, 's', 'r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_htmlplan`
--

CREATE TABLE `ot_htmlplan` (
  `id` int(11) NOT NULL,
  `plan` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_places`
--

CREATE TABLE `ot_places` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_profiles`
--

CREATE TABLE `ot_profiles` (
  `id` int(11) NOT NULL,
  `profil` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_scenes`
--

CREATE TABLE `ot_scenes` (
  `id` int(11) NOT NULL,
  `idplace` int(11) NOT NULL,
  `idarduino` int(11) NOT NULL,
  `iddevice` int(11) NOT NULL,
  `command` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_usermenu`
--

CREATE TABLE `ot_usermenu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_usermenu`
--

INSERT INTO `ot_usermenu` (`id`, `menu`, `url`, `image`, `description`, `status`) VALUES
(1, 'HOME', 'ot-home.php', '', '', 1),
(2, 'PLAN', 'ot-plan.php', '', '', 1),
(3, 'SETTINGS', 'ot-settings.php', '', '', 1),
(4, 'SCENES', 'ot-scenes.php', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_users`
--

CREATE TABLE `ot_users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `sex` enum('M','W','O') NOT NULL DEFAULT 'O',
  `identification` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_usersprofiles`
--

CREATE TABLE `ot_usersprofiles` (
  `idusers` int(11) NOT NULL,
  `idprofiles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ot_arduinos`
--
ALTER TABLE `ot_arduinos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_attempts`
--
ALTER TABLE `ot_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_background`
--
ALTER TABLE `ot_background`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_colors`
--
ALTER TABLE `ot_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_devices`
--
ALTER TABLE `ot_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_htmlplan`
--
ALTER TABLE `ot_htmlplan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_places`
--
ALTER TABLE `ot_places`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_profiles`
--
ALTER TABLE `ot_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_scenes`
--
ALTER TABLE `ot_scenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_usermenu`
--
ALTER TABLE `ot_usermenu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_users`
--
ALTER TABLE `ot_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_usersprofiles`
--
ALTER TABLE `ot_usersprofiles`
  ADD PRIMARY KEY (`idusers`,`idprofiles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ot_arduinos`
--
ALTER TABLE `ot_arduinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ot_attempts`
--
ALTER TABLE `ot_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ot_background`
--
ALTER TABLE `ot_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ot_colors`
--
ALTER TABLE `ot_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ot_devices`
--
ALTER TABLE `ot_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ot_htmlplan`
--
ALTER TABLE `ot_htmlplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ot_places`
--
ALTER TABLE `ot_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ot_profiles`
--
ALTER TABLE `ot_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ot_scenes`
--
ALTER TABLE `ot_scenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ot_usermenu`
--
ALTER TABLE `ot_usermenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ot_users`
--
ALTER TABLE `ot_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
