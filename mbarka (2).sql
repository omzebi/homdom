-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2018 a las 20:15:02
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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
  `name` varchar(50) NOT NULL,
  `mac` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_arduinos`
--

INSERT INTO `ot_arduinos` (`id`, `name`, `mac`, `ip`) VALUES
(1, 'arduino UNO', '', ''),
(2, 'arduino MEGA', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_attempts`
--

CREATE TABLE `ot_attempts` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_attempts`
--

INSERT INTO `ot_attempts` (`id`, `login`, `date`) VALUES
(6, 'prueba', '2018-03-18 13:27:10'),
(7, 'prueba', '2018-03-18 13:27:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_background`
--

CREATE TABLE `ot_background` (
  `id` int(11) NOT NULL,
  `img` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_background`
--

INSERT INTO `ot_background` (`id`, `img`, `title`, `status`) VALUES
(1, 'domotica1.jpg', '', '1'),
(2, 'domotica2.jpg', '', '1'),
(3, 'domotica3.jpg', '', '1'),
(4, 'domotica4.jpg', '', '1'),
(5, 'domotica5.jpg', '', '1'),
(6, 'domotica6.jpg', '', '1'),
(7, 'domotica7.jpg', '', '1'),
(8, 'domotica8.jpg', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_colors`
--

CREATE TABLE `ot_colors` (
  `id` int(11) NOT NULL,
  `color1` varchar(30) NOT NULL,
  `color2` varchar(30) NOT NULL,
  `color3` varchar(30) NOT NULL,
  `color4` varchar(30) NOT NULL,
  `color5` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_colors`
--

INSERT INTO `ot_colors` (`id`, `color1`, `color2`, `color3`, `color4`, `color5`) VALUES
(1, '#205BAD', '#ffffff', '#000000', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_devices`
--

CREATE TABLE `ot_devices` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `idplace` int(11) NOT NULL,
  `idport` char(2) NOT NULL,
  `pinInput` int(11) NOT NULL,
  `pinOutput` int(11) NOT NULL,
  `position` char(1) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `type` char(1) NOT NULL,
  `outstanding` char(1) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT '0',
  `pass` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_devices`
--

INSERT INTO `ot_devices` (`id`, `name`, `nickname`, `idplace`, `idport`, `pinInput`, `pinOutput`, `position`, `url`, `icon`, `type`, `outstanding`, `status`, `pass`) VALUES
(1, 'Living room light', 'ledA', 1, 'A', 13, 0, 'l', '', 'lightbulb-o', 'L', '1', '1', ''),
(2, 'Main door', '', 1, 'B', 4, 0, 'r', '', 'lock', '', '1', '0', ''),
(3, 'Camara', '', 1, 'A', 4, 0, 'l', '', 'video-camera', '', '1', '0', ''),
(4, 'Living room light', 'ledB', 1, 'B', 13, 0, 'r', '', 'lightbulb-o', 'L', '1', '1', '*1234#'),
(5, 'Camara', '', 1, 'B', 1, 0, 'r', '', 'video-camera', '', '1', '0', ''),
(6, 'Alarm', '', 1, 'B', 6, 0, 'r', '', 'bell', '', '1', '0', ''),
(7, 'Climat', '', 1, 'A', 6, 0, 'l', '', 'thermometer-quarter', '', '1', '0', ''),
(8, 'Calendar', '', 0, '', 0, 0, 'l', '', 'calendar', '', '1', '0', ''),
(9, 'Camara', '', 1, 'A', 5, 0, 'l', '', 'video-camera', '', '1', '0', ''),
(10, 'Camara', '', 2, 'B', 5, 0, 'r', '', 'video-camera', '', '1', '0', ''),
(11, 'BLIND', '', 2, 'A', 1, 0, 'l', '', 'columns', '', '1', '0', ''),
(14, 'Calendar', '', 0, 'A', 0, 0, 'r', '', 'calendar', '', '1', '0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_htmlplan`
--

CREATE TABLE `ot_htmlplan` (
  `id` int(11) NOT NULL,
  `plan` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_places`
--

CREATE TABLE `ot_places` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `pass` varchar(6) NOT NULL,
  `status` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_places`
--

INSERT INTO `ot_places` (`id`, `name`, `icon`, `pass`, `status`) VALUES
(1, 'SALON', 'television', '*1234#', '1'),
(2, 'HALL', 'lightbulb-o', '*4321#', '1'),
(3, 'GARAGE', 'building', '', '1'),
(4, 'KITCHEN', 'television', '', '1'),
(5, 'WAITING ROOM', 'coffee', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_ports`
--

CREATE TABLE `ot_ports` (
  `port` char(2) NOT NULL,
  `name` char(5) NOT NULL,
  `idarduino` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_ports`
--

INSERT INTO `ot_ports` (`port`, `name`, `idarduino`, `status`) VALUES
('A', 'COM4', 1, '1'),
('B', 'COM6', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_profiles`
--

CREATE TABLE `ot_profiles` (
  `id` int(11) NOT NULL,
  `profil` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_reminders`
--

CREATE TABLE `ot_reminders` (
  `id` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `btime` time NOT NULL,
  `edate` date NOT NULL,
  `etime` time NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(74) NOT NULL,
  `frequency` enum('H','D','W','M','Y','') NOT NULL,
  `remember` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_reminders`
--

INSERT INTO `ot_reminders` (`id`, `bdate`, `btime`, `edate`, `etime`, `title`, `description`, `frequency`, `remember`, `type`, `status`) VALUES
(1, '2018-04-02', '11:35:00', '0000-00-00', '00:00:00', 'CITA HOSPITAL MATERNO', 'Analis sanguineo en el hospital materno', 'H', '2018-04-01 00:00:00', 1, '1'),
(2, '2018-05-04', '09:45:00', '0000-00-00', '00:00:00', 'CITA CLINICA MARTI TORRES', 'Plaza de la constitución - zona Larios Málaga', 'D', '2018-05-04 00:00:00', 2, '1'),
(3, '2018-05-25', '12:15:00', '0000-00-00', '00:00:00', 'CITA HOSPITAL CARE', 'Revisión Anual', 'W', '2018-05-24 21:30:00', 3, '1'),
(5, '2018-05-10', '15:50:00', '2018-05-10', '16:00:00', 'otro', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos', 'Y', '2018-05-15 21:06:00', 8, '1');

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
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_scenes`
--

INSERT INTO `ot_scenes` (`id`, `idplace`, `idarduino`, `iddevice`, `command`, `status`) VALUES
(1, 1, 1, 1, '', '1'),
(2, 1, 2, 2, '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot_types`
--

CREATE TABLE `ot_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_types`
--

INSERT INTO `ot_types` (`id`, `type`, `icon`, `description`, `status`) VALUES
(1, 'Health', '<i class=\"fa fa-medkit fa-5x\" aria-hidden=\"true\"></i>', '', '1'),
(2, 'Travel', '<i class=\"fa fa-bus fa-5x\" aria-hidden=\"true\"></i>', '', '1'),
(3, 'Market', '<i class=\"fa fa-shopping-basket fa-5x\" aria-hidden=\"true\"></i>\n', '', '1'),
(4, 'School', '<i class=\"fa fa-university fa-5x\" aria-hidden=\"true\"></i>\n', '', '1'),
(5, 'Hospital', '<i class=\"fa fa-bed fa-5x\" aria-hidden=\"true\"></i>\n', '', '1'),
(6, 'Tribunal', '<i class=\"fa fa-gavel fa-5x\" aria-hidden=\"true\"></i>\n', '', '1'),
(7, 'Restaurant', '<i class=\"fa fa-cutlery fa-5x\" aria-hidden=\"true\"></i>\n', '', '1'),
(8, 'Birthday', '<i class=\"fa fa-birthday-cake fa-5x\" aria-hidden=\"true\"></i>\n', '', '1');

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
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_usermenu`
--

INSERT INTO `ot_usermenu` (`id`, `menu`, `url`, `image`, `description`, `status`) VALUES
(1, 'HOME', 'ot-home', '', '', '1'),
(2, 'PLAN', 'ot-plan', '', '', '1'),
(3, 'ALL DEVICES', 'ot-settings', '', '', '1'),
(4, 'SCENES', 'ot-scenes', '', '', '1'),
(5, 'USERS', 'ot-users', '', '', '1');

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
  `email` varchar(100) NOT NULL,
  `identification` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ot_users`
--

INSERT INTO `ot_users` (`id`, `login`, `password`, `name`, `surname`, `sex`, `email`, `identification`, `picture`, `status`) VALUES
(1, '', '', 'aaaa', 'aaaa', 'O', '', '', '', '1'),
(2, '', '', 'aaaa', 'aaaa', 'O', '', '', '', '1'),
(3, '', '', 'aaaa', 'aaaa', 'O', '', '', '', '1'),
(4, '', '', 'aaaa', 'aaaa', 'O', '', '', '', '1'),
(6, 'www', 'A123456a*', 'www', 'www', '', 'www@www.es', '', 'renting.jpg', '1'),
(7, 'omzebi', 'A123456a*', 'dsfds', 'wqswq', 'M', 'sfs@sfds.es', '', 'cursos-gratis.jpg', '0'),
(8, 'User', 'cbc124b9512cc2d4c6fbf996d31e94030794f9ec21e59a2a659d65f5c585b70985a1db00430d2c197cdd5adf0da20efc6fb69c28093f302371ad8717e35d64e3', 'Name', 'Surname', 'M', 'omzebi@gmail.com', '', 'FB_IMG_15249258109632379.jpg', '1');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE PORT` (`idport`,`pinInput`);

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
-- Indices de la tabla `ot_ports`
--
ALTER TABLE `ot_ports`
  ADD PRIMARY KEY (`port`),
  ADD UNIQUE KEY `port` (`name`);

--
-- Indices de la tabla `ot_profiles`
--
ALTER TABLE `ot_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_reminders`
--
ALTER TABLE `ot_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_scenes`
--
ALTER TABLE `ot_scenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ot_types`
--
ALTER TABLE `ot_types`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ot_attempts`
--
ALTER TABLE `ot_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ot_htmlplan`
--
ALTER TABLE `ot_htmlplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ot_places`
--
ALTER TABLE `ot_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ot_profiles`
--
ALTER TABLE `ot_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ot_reminders`
--
ALTER TABLE `ot_reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ot_scenes`
--
ALTER TABLE `ot_scenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ot_types`
--
ALTER TABLE `ot_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ot_usermenu`
--
ALTER TABLE `ot_usermenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ot_users`
--
ALTER TABLE `ot_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
