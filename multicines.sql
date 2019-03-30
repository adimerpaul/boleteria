-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2019 a las 23:58:37
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `multicines`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `idAsiento` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL,
  `letra` varchar(5) NOT NULL,
  `activo` varchar(30) NOT NULL,
  `idSala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asiento`
--

INSERT INTO `asiento` (`idAsiento`, `fila`, `columna`, `letra`, `activo`, `idSala`) VALUES
(101, 1, 1, 'A', 'INACTIVO', 7),
(102, 1, 2, 'A', 'ACTIVO', 7),
(103, 1, 3, 'A', 'ACTIVO', 7),
(104, 1, 4, 'A', 'ACTIVO', 7),
(105, 1, 5, 'A', 'ACTIVO', 7),
(106, 1, 6, 'A', 'ACTIVO', 7),
(107, 1, 7, 'A', 'ACTIVO', 7),
(108, 1, 8, 'A', 'ACTIVO', 7),
(109, 1, 9, 'A', 'ACTIVO', 7),
(110, 1, 10, 'A', 'ACTIVO', 7),
(111, 2, 1, 'B', 'ACTIVO', 7),
(112, 2, 2, 'B', 'INACTIVO', 7),
(113, 2, 3, 'B', 'ACTIVO', 7),
(114, 2, 4, 'B', 'ACTIVO', 7),
(115, 2, 5, 'B', 'ACTIVO', 7),
(116, 2, 6, 'B', 'ACTIVO', 7),
(117, 2, 7, 'B', 'ACTIVO', 7),
(118, 2, 8, 'B', 'ACTIVO', 7),
(119, 2, 9, 'B', 'ACTIVO', 7),
(120, 2, 10, 'B', 'ACTIVO', 7),
(121, 3, 1, 'C', 'ACTIVO', 7),
(122, 3, 2, 'C', 'ACTIVO', 7),
(123, 3, 3, 'C', 'INACTIVO', 7),
(124, 3, 4, 'C', 'ACTIVO', 7),
(125, 3, 5, 'C', 'ACTIVO', 7),
(126, 3, 6, 'C', 'ACTIVO', 7),
(127, 3, 7, 'C', 'ACTIVO', 7),
(128, 3, 8, 'C', 'ACTIVO', 7),
(129, 3, 9, 'C', 'ACTIVO', 7),
(130, 3, 10, 'C', 'ACTIVO', 7),
(131, 4, 1, 'D', 'ACTIVO', 7),
(132, 4, 2, 'D', 'ACTIVO', 7),
(133, 4, 3, 'D', 'ACTIVO', 7),
(134, 4, 4, 'D', 'INACTIVO', 7),
(135, 4, 5, 'D', 'ACTIVO', 7),
(136, 4, 6, 'D', 'ACTIVO', 7),
(137, 4, 7, 'D', 'ACTIVO', 7),
(138, 4, 8, 'D', 'ACTIVO', 7),
(139, 4, 9, 'D', 'ACTIVO', 7),
(140, 4, 10, 'D', 'ACTIVO', 7),
(141, 5, 1, 'E', 'ACTIVO', 7),
(142, 5, 2, 'E', 'ACTIVO', 7),
(143, 5, 3, 'E', 'ACTIVO', 7),
(144, 5, 4, 'E', 'ACTIVO', 7),
(145, 5, 5, 'E', 'INACTIVO', 7),
(146, 5, 6, 'E', 'ACTIVO', 7),
(147, 5, 7, 'E', 'ACTIVO', 7),
(148, 5, 8, 'E', 'ACTIVO', 7),
(149, 5, 9, 'E', 'ACTIVO', 7),
(150, 5, 10, 'E', 'ACTIVO', 7),
(151, 6, 1, 'F', 'ACTIVO', 7),
(152, 6, 2, 'F', 'ACTIVO', 7),
(153, 6, 3, 'F', 'ACTIVO', 7),
(154, 6, 4, 'F', 'ACTIVO', 7),
(155, 6, 5, 'F', 'ACTIVO', 7),
(156, 6, 6, 'F', 'INACTIVO', 7),
(157, 6, 7, 'F', 'ACTIVO', 7),
(158, 6, 8, 'F', 'ACTIVO', 7),
(159, 6, 9, 'F', 'ACTIVO', 7),
(160, 6, 10, 'F', 'ACTIVO', 7),
(161, 7, 1, 'G', 'ACTIVO', 7),
(162, 7, 2, 'G', 'ACTIVO', 7),
(163, 7, 3, 'G', 'ACTIVO', 7),
(164, 7, 4, 'G', 'ACTIVO', 7),
(165, 7, 5, 'G', 'ACTIVO', 7),
(166, 7, 6, 'G', 'ACTIVO', 7),
(167, 7, 7, 'G', 'INACTIVO', 7),
(168, 7, 8, 'G', 'ACTIVO', 7),
(169, 7, 9, 'G', 'ACTIVO', 7),
(170, 7, 10, 'G', 'ACTIVO', 7),
(171, 8, 1, 'H', 'ACTIVO', 7),
(172, 8, 2, 'H', 'ACTIVO', 7),
(173, 8, 3, 'H', 'ACTIVO', 7),
(174, 8, 4, 'H', 'ACTIVO', 7),
(175, 8, 5, 'H', 'ACTIVO', 7),
(176, 8, 6, 'H', 'ACTIVO', 7),
(177, 8, 7, 'H', 'ACTIVO', 7),
(178, 8, 8, 'H', 'INACTIVO', 7),
(179, 8, 9, 'H', 'ACTIVO', 7),
(180, 8, 10, 'H', 'ACTIVO', 7),
(181, 9, 1, 'I', 'ACTIVO', 7),
(182, 9, 2, 'I', 'ACTIVO', 7),
(183, 9, 3, 'I', 'ACTIVO', 7),
(184, 9, 4, 'I', 'ACTIVO', 7),
(185, 9, 5, 'I', 'ACTIVO', 7),
(186, 9, 6, 'I', 'ACTIVO', 7),
(187, 9, 7, 'I', 'ACTIVO', 7),
(188, 9, 8, 'I', 'ACTIVO', 7),
(189, 9, 9, 'I', 'INACTIVO', 7),
(190, 9, 10, 'I', 'ACTIVO', 7),
(191, 10, 1, 'J', 'ACTIVO', 7),
(192, 10, 2, 'J', 'ACTIVO', 7),
(193, 10, 3, 'J', 'ACTIVO', 7),
(194, 10, 4, 'J', 'ACTIVO', 7),
(195, 10, 5, 'J', 'ACTIVO', 7),
(196, 10, 6, 'J', 'ACTIVO', 7),
(197, 10, 7, 'J', 'ACTIVO', 7),
(198, 10, 8, 'J', 'ACTIVO', 7),
(199, 10, 9, 'J', 'ACTIVO', 7),
(200, 10, 10, 'J', 'INACTIVO', 7),
(201, 1, 1, 'A', 'INACTIVO', 8),
(202, 1, 2, 'A', 'INACTIVO', 8),
(203, 1, 3, 'A', 'INACTIVO', 8),
(204, 1, 4, 'A', 'INACTIVO', 8),
(205, 1, 5, 'A', 'INACTIVO', 8),
(206, 1, 6, 'A', 'INACTIVO', 8),
(207, 1, 7, 'A', 'INACTIVO', 8),
(208, 1, 8, 'A', 'INACTIVO', 8),
(209, 1, 9, 'A', 'INACTIVO', 8),
(210, 1, 10, 'A', 'INACTIVO', 8),
(211, 2, 1, 'B', 'ACTIVO', 8),
(212, 2, 2, 'B', 'ACTIVO', 8),
(213, 2, 3, 'B', 'ACTIVO', 8),
(214, 2, 4, 'B', 'ACTIVO', 8),
(215, 2, 5, 'B', 'ACTIVO', 8),
(216, 2, 6, 'B', 'ACTIVO', 8),
(217, 2, 7, 'B', 'ACTIVO', 8),
(218, 2, 8, 'B', 'ACTIVO', 8),
(219, 2, 9, 'B', 'ACTIVO', 8),
(220, 2, 10, 'B', 'INACTIVO', 8),
(221, 3, 1, 'C', 'ACTIVO', 8),
(222, 3, 2, 'C', 'ACTIVO', 8),
(223, 3, 3, 'C', 'ACTIVO', 8),
(224, 3, 4, 'C', 'ACTIVO', 8),
(225, 3, 5, 'C', 'ACTIVO', 8),
(226, 3, 6, 'C', 'ACTIVO', 8),
(227, 3, 7, 'C', 'ACTIVO', 8),
(228, 3, 8, 'C', 'ACTIVO', 8),
(229, 3, 9, 'C', 'ACTIVO', 8),
(230, 3, 10, 'C', 'INACTIVO', 8),
(231, 4, 1, 'D', 'ACTIVO', 8),
(232, 4, 2, 'D', 'ACTIVO', 8),
(233, 4, 3, 'D', 'ACTIVO', 8),
(234, 4, 4, 'D', 'ACTIVO', 8),
(235, 4, 5, 'D', 'ACTIVO', 8),
(236, 4, 6, 'D', 'ACTIVO', 8),
(237, 4, 7, 'D', 'ACTIVO', 8),
(238, 4, 8, 'D', 'ACTIVO', 8),
(239, 4, 9, 'D', 'ACTIVO', 8),
(240, 4, 10, 'D', 'INACTIVO', 8),
(241, 5, 1, 'E', 'ACTIVO', 8),
(242, 5, 2, 'E', 'ACTIVO', 8),
(243, 5, 3, 'E', 'ACTIVO', 8),
(244, 5, 4, 'E', 'ACTIVO', 8),
(245, 5, 5, 'E', 'ACTIVO', 8),
(246, 5, 6, 'E', 'ACTIVO', 8),
(247, 5, 7, 'E', 'ACTIVO', 8),
(248, 5, 8, 'E', 'ACTIVO', 8),
(249, 5, 9, 'E', 'ACTIVO', 8),
(250, 5, 10, 'E', 'INACTIVO', 8),
(251, 6, 1, 'F', 'ACTIVO', 8),
(252, 6, 2, 'F', 'ACTIVO', 8),
(253, 6, 3, 'F', 'ACTIVO', 8),
(254, 6, 4, 'F', 'ACTIVO', 8),
(255, 6, 5, 'F', 'ACTIVO', 8),
(256, 6, 6, 'F', 'ACTIVO', 8),
(257, 6, 7, 'F', 'ACTIVO', 8),
(258, 6, 8, 'F', 'ACTIVO', 8),
(259, 6, 9, 'F', 'ACTIVO', 8),
(260, 6, 10, 'F', 'INACTIVO', 8),
(261, 7, 1, 'G', 'ACTIVO', 8),
(262, 7, 2, 'G', 'ACTIVO', 8),
(263, 7, 3, 'G', 'ACTIVO', 8),
(264, 7, 4, 'G', 'ACTIVO', 8),
(265, 7, 5, 'G', 'ACTIVO', 8),
(266, 7, 6, 'G', 'ACTIVO', 8),
(267, 7, 7, 'G', 'ACTIVO', 8),
(268, 7, 8, 'G', 'ACTIVO', 8),
(269, 7, 9, 'G', 'ACTIVO', 8),
(270, 7, 10, 'G', 'INACTIVO', 8),
(271, 8, 1, 'H', 'ACTIVO', 8),
(272, 8, 2, 'H', 'ACTIVO', 8),
(273, 8, 3, 'H', 'ACTIVO', 8),
(274, 8, 4, 'H', 'ACTIVO', 8),
(275, 8, 5, 'H', 'ACTIVO', 8),
(276, 8, 6, 'H', 'ACTIVO', 8),
(277, 8, 7, 'H', 'ACTIVO', 8),
(278, 8, 8, 'H', 'ACTIVO', 8),
(279, 8, 9, 'H', 'ACTIVO', 8),
(280, 8, 10, 'H', 'INACTIVO', 8),
(281, 9, 1, 'I', 'ACTIVO', 8),
(282, 9, 2, 'I', 'ACTIVO', 8),
(283, 9, 3, 'I', 'ACTIVO', 8),
(284, 9, 4, 'I', 'ACTIVO', 8),
(285, 9, 5, 'I', 'ACTIVO', 8),
(286, 9, 6, 'I', 'ACTIVO', 8),
(287, 9, 7, 'I', 'ACTIVO', 8),
(288, 9, 8, 'I', 'ACTIVO', 8),
(289, 9, 9, 'I', 'ACTIVO', 8),
(290, 9, 10, 'I', 'INACTIVO', 8),
(291, 10, 1, 'J', 'ACTIVO', 8),
(292, 10, 2, 'J', 'ACTIVO', 8),
(293, 10, 3, 'J', 'ACTIVO', 8),
(294, 10, 4, 'J', 'ACTIVO', 8),
(295, 10, 5, 'J', 'ACTIVO', 8),
(296, 10, 6, 'J', 'ACTIVO', 8),
(297, 10, 7, 'J', 'ACTIVO', 8),
(298, 10, 8, 'J', 'ACTIVO', 8),
(299, 10, 9, 'J', 'ACTIVO', 8),
(300, 10, 10, 'J', 'ACTIVO', 8),
(301, 1, 1, 'A', 'ACTIVO', 9),
(302, 1, 2, 'A', 'ACTIVO', 9),
(303, 1, 3, 'A', 'ACTIVO', 9),
(304, 1, 4, 'A', 'ACTIVO', 9),
(305, 1, 5, 'A', 'ACTIVO', 9),
(306, 1, 6, 'A', 'ACTIVO', 9),
(307, 1, 7, 'A', 'ACTIVO', 9),
(308, 1, 8, 'A', 'ACTIVO', 9),
(309, 1, 9, 'A', 'ACTIVO', 9),
(310, 1, 10, 'A', 'ACTIVO', 9),
(311, 2, 1, 'B', 'ACTIVO', 9),
(312, 2, 2, 'B', 'ACTIVO', 9),
(313, 2, 3, 'B', 'ACTIVO', 9),
(314, 2, 4, 'B', 'ACTIVO', 9),
(315, 2, 5, 'B', 'ACTIVO', 9),
(316, 2, 6, 'B', 'ACTIVO', 9),
(317, 2, 7, 'B', 'ACTIVO', 9),
(318, 2, 8, 'B', 'ACTIVO', 9),
(319, 2, 9, 'B', 'ACTIVO', 9),
(320, 2, 10, 'B', 'ACTIVO', 9),
(321, 3, 1, 'C', 'ACTIVO', 9),
(322, 3, 2, 'C', 'ACTIVO', 9),
(323, 3, 3, 'C', 'INACTIVO', 9),
(324, 3, 4, 'C', 'ACTIVO', 9),
(325, 3, 5, 'C', 'ACTIVO', 9),
(326, 3, 6, 'C', 'ACTIVO', 9),
(327, 3, 7, 'C', 'ACTIVO', 9),
(328, 3, 8, 'C', 'ACTIVO', 9),
(329, 3, 9, 'C', 'ACTIVO', 9),
(330, 3, 10, 'C', 'ACTIVO', 9),
(331, 4, 1, 'D', 'ACTIVO', 9),
(332, 4, 2, 'D', 'INACTIVO', 9),
(333, 4, 3, 'D', 'ACTIVO', 9),
(334, 4, 4, 'D', 'INACTIVO', 9),
(335, 4, 5, 'D', 'ACTIVO', 9),
(336, 4, 6, 'D', 'ACTIVO', 9),
(337, 4, 7, 'D', 'ACTIVO', 9),
(338, 4, 8, 'D', 'ACTIVO', 9),
(339, 4, 9, 'D', 'ACTIVO', 9),
(340, 4, 10, 'D', 'ACTIVO', 9),
(341, 5, 1, 'E', 'ACTIVO', 9),
(342, 5, 2, 'E', 'INACTIVO', 9),
(343, 5, 3, 'E', 'INACTIVO', 9),
(344, 5, 4, 'E', 'INACTIVO', 9),
(345, 5, 5, 'E', 'ACTIVO', 9),
(346, 5, 6, 'E', 'ACTIVO', 9),
(347, 5, 7, 'E', 'ACTIVO', 9),
(348, 5, 8, 'E', 'ACTIVO', 9),
(349, 5, 9, 'E', 'ACTIVO', 9),
(350, 5, 10, 'E', 'ACTIVO', 9),
(351, 6, 1, 'F', 'ACTIVO', 9),
(352, 6, 2, 'F', 'INACTIVO', 9),
(353, 6, 3, 'F', 'ACTIVO', 9),
(354, 6, 4, 'F', 'INACTIVO', 9),
(355, 6, 5, 'F', 'ACTIVO', 9),
(356, 6, 6, 'F', 'ACTIVO', 9),
(357, 6, 7, 'F', 'ACTIVO', 9),
(358, 6, 8, 'F', 'ACTIVO', 9),
(359, 6, 9, 'F', 'ACTIVO', 9),
(360, 6, 10, 'F', 'ACTIVO', 9),
(361, 7, 1, 'G', 'ACTIVO', 9),
(362, 7, 2, 'G', 'INACTIVO', 9),
(363, 7, 3, 'G', 'ACTIVO', 9),
(364, 7, 4, 'G', 'INACTIVO', 9),
(365, 7, 5, 'G', 'ACTIVO', 9),
(366, 7, 6, 'G', 'ACTIVO', 9),
(367, 7, 7, 'G', 'ACTIVO', 9),
(368, 7, 8, 'G', 'ACTIVO', 9),
(369, 7, 9, 'G', 'ACTIVO', 9),
(370, 7, 10, 'G', 'ACTIVO', 9),
(371, 8, 1, 'H', 'ACTIVO', 9),
(372, 8, 2, 'H', 'ACTIVO', 9),
(373, 8, 3, 'H', 'ACTIVO', 9),
(374, 8, 4, 'H', 'ACTIVO', 9),
(375, 8, 5, 'H', 'ACTIVO', 9),
(376, 8, 6, 'H', 'ACTIVO', 9),
(377, 8, 7, 'H', 'ACTIVO', 9),
(378, 8, 8, 'H', 'ACTIVO', 9),
(379, 8, 9, 'H', 'ACTIVO', 9),
(380, 8, 10, 'H', 'ACTIVO', 9),
(381, 9, 1, 'I', 'ACTIVO', 9),
(382, 9, 2, 'I', 'ACTIVO', 9),
(383, 9, 3, 'I', 'ACTIVO', 9),
(384, 9, 4, 'I', 'ACTIVO', 9),
(385, 9, 5, 'I', 'ACTIVO', 9),
(386, 9, 6, 'I', 'ACTIVO', 9),
(387, 9, 7, 'I', 'ACTIVO', 9),
(388, 9, 8, 'I', 'ACTIVO', 9),
(389, 9, 9, 'I', 'ACTIVO', 9),
(390, 9, 10, 'I', 'ACTIVO', 9),
(391, 10, 1, 'J', 'ACTIVO', 9),
(392, 10, 2, 'J', 'ACTIVO', 9),
(393, 10, 3, 'J', 'ACTIVO', 9),
(394, 10, 4, 'J', 'ACTIVO', 9),
(395, 10, 5, 'J', 'ACTIVO', 9),
(396, 10, 6, 'J', 'ACTIVO', 9),
(397, 10, 7, 'J', 'ACTIVO', 9),
(398, 10, 8, 'J', 'ACTIVO', 9),
(399, 10, 9, 'J', 'ACTIVO', 9),
(400, 10, 10, 'J', 'ACTIVO', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butaca`
--

CREATE TABLE `butaca` (
  `idButaca` int(11) NOT NULL,
  `nombreBut` varchar(45) NOT NULL,
  `descripcionBut` varchar(450) DEFAULT NULL,
  `activoBut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `butaca`
--

INSERT INTO `butaca` (`idButaca`, `nombreBut`, `descripcionBut`, `activoBut`) VALUES
(1, 'General', 'asiento general', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `cinit` varchar(200) NOT NULL,
  `nombreCl` varchar(200) NOT NULL,
  `apellidoCl` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `telefono` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `sexo` varchar(200) DEFAULT NULL,
  `codigoTarjeta` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `cinit`, `nombreCl`, `apellidoCl`, `email`, `fechaNac`, `telefono`, `direccion`, `sexo`, `codigoTarjeta`) VALUES
(1, '5555', 'fernando', 'a', '', '0000-00-00', '', '', 'M', NULL),
(2, '55551', 'ale', 'lopez', '', '0000-00-00', '', '', 'M', NULL),
(11, '3333', 'prueba', '', '', '0000-00-00', '', '', 'M', NULL),
(12, '3332', 'zz', '', '', '0000-00-00', '', '', 'M', NULL),
(13, '123', 'aaaav', '', '', '0000-00-00', '', '', 'M', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costobutaca`
--

CREATE TABLE `costobutaca` (
  `idCosto` int(11) NOT NULL,
  `idButaca` int(11) NOT NULL,
  `idTarifa` int(11) NOT NULL,
  `idFuncion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_festivo`
--

CREATE TABLE `dia_festivo` (
  `idFestivo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dia_festivo`
--

INSERT INTO `dia_festivo` (`idFestivo`, `fecha`, `descripcion`, `activo`) VALUES
(1, '2019-03-23', '123450', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `idDistrib` int(11) NOT NULL,
  `nombreDis` varchar(250) NOT NULL,
  `direccionDis` varchar(250) NOT NULL,
  `localidadDis` varchar(200) NOT NULL,
  `nit` varchar(200) NOT NULL,
  `telefonoDis` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `responsable` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`idDistrib`, `nombreDis`, `direccionDis`, `localidadDis`, `nit`, `telefonoDis`, `email`, `responsable`) VALUES
(2, 'universal', 'nnnn', 'ddddd', '4545545', '3333', NULL, '0'),
(3, 'distrib', 'aaa', 'lk', '3333', '', '', ''),
(4, 'distrib', 'aaa', 'lk', '3333', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosificacion`
--

CREATE TABLE `dosificacion` (
  `idDosif` int(11) NOT NULL,
  `nroTramite` bigint(20) NOT NULL,
  `nroAutorizacion` bigint(20) NOT NULL,
  `nroFactIni` bigint(20) NOT NULL,
  `llaveDosif` varchar(450) NOT NULL,
  `fechaDesde` datetime NOT NULL,
  `fechaHasta` datetime NOT NULL,
  `leyenda` varchar(1000) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dosificacion`
--

INSERT INTO `dosificacion` (`idDosif`, `nroTramite`, `nroAutorizacion`, `nroFactIni`, `llaveDosif`, `fechaDesde`, `fechaHasta`, `leyenda`, `activo`) VALUES
(1, 123456, 77888888, 1, 'ss4s4s4', '2019-03-12 00:00:00', '2019-03-13 00:00:00', 'ass', 0),
(3, 1235553, 778888880, 1, 'ss4s4s4', '2019-03-12 00:00:00', '2019-03-13 00:00:00', 'ass', 0),
(5, 55555, 666, 7777, 'dfdfdfdf', '2019-03-14 00:00:00', '2019-03-28 00:00:00', 'ddd', 1),
(10, 555554, 666, 7777, 'dfdfdfdf', '2019-03-14 00:00:00', '2019-03-28 00:00:00', 'ddd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `codigo` varchar(200) NOT NULL,
  `razonSocial` varchar(200) DEFAULT NULL,
  `nombreFant` varchar(200) DEFAULT NULL,
  `nombreSuc` varchar(200) DEFAULT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `localidad` varchar(200) DEFAULT NULL,
  `ci_nit` varchar(100) DEFAULT NULL,
  `ingresoBruto` varchar(200) DEFAULT NULL,
  `agenciaAfip` int(11) DEFAULT NULL,
  `urlDominio` varchar(200) DEFAULT NULL,
  `fidelizacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `codigo`, `razonSocial`, `nombreFant`, `nombreSuc`, `telefono`, `direccion`, `localidad`, `ci_nit`, `ingresoBruto`, `agenciaAfip`, `urlDominio`, `fidelizacion`) VALUES
(22, '600970', 'MULTISALAS SRL.', 'Multisalas', NULL, '5454', '', '', '', NULL, NULL, NULL, 'Ninguno'),
(23, '1010', 'comesmo fulanito', 'nom', NULL, '526451', 'b', 'dsad', '', NULL, NULL, NULL, 'Siempre'),
(24, '1010', 'comesmo fulanito', 'prueba2', NULL, '526451', 'a', 'dsad', '', NULL, NULL, NULL, 'Siempre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `idFuncion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `subtitulada` varchar(10) NOT NULL,
  `numerada` varchar(10) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `nroFuncion` int(11) NOT NULL,
  `activa` varchar(10) NOT NULL DEFAULT 'ACTIVADO',
  `fechaAlta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idTarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`idFuncion`, `fecha`, `horaInicio`, `horaFin`, `subtitulada`, `numerada`, `idUsuario`, `idPelicula`, `idSala`, `nroFuncion`, `activa`, `fechaAlta`, `idTarifa`) VALUES
(24, '2019-03-30', '01:00:00', '04:00:00', 'on', 'on', 1, 15, 8, 0, 'ACTIVADO', '2019-03-30 10:25:58', 1),
(25, '2019-03-31', '01:00:00', '04:00:00', 'on', 'on', 1, 15, 8, 0, 'ACTIVADO', '2019-03-30 10:25:58', 1),
(26, '2019-04-01', '01:00:00', '04:00:00', 'on', 'on', 1, 15, 8, 0, 'ACTIVADO', '2019-03-30 10:25:58', 1),
(27, '2019-04-02', '01:00:00', '04:00:00', 'on', 'on', 1, 15, 8, 0, 'ACTIVADO', '2019-03-30 10:25:58', 1),
(28, '2019-04-03', '01:00:00', '04:00:00', 'on', 'on', 1, 15, 8, 0, 'ACTIVADO', '2019-03-30 10:25:58', 1),
(29, '2019-04-04', '01:00:00', '04:00:00', 'on', 'on', 1, 15, 8, 0, 'ACTIVADO', '2019-03-30 10:25:58', 1),
(30, '2019-04-05', '01:00:00', '04:00:00', 'on', 'on', 1, 15, 8, 0, 'ACTIVADO', '2019-03-30 10:25:59', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idPelicula` int(11) NOT NULL,
  `codigoIncaa` varchar(200) NOT NULL,
  `codUltracine` varchar(200) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `duracion` int(11) NOT NULL,
  `paisOrigen` varchar(250) NOT NULL,
  `genero` varchar(250) NOT NULL,
  `cartelera` tinyint(1) NOT NULL,
  `formato` tinyint(1) NOT NULL,
  `sipnosis` text NOT NULL,
  `urlTrailer` int(11) NOT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `fechaCr` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaMod` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idDistrib` int(11) NOT NULL,
  `clasificacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `codigoIncaa`, `codUltracine`, `nombre`, `duracion`, `paisOrigen`, `genero`, `cartelera`, `formato`, `sipnosis`, `urlTrailer`, `imagen`, `fechaCr`, `fechaMod`, `idDistrib`, `clasificacion`) VALUES
(15, '', '', 'AQUAMAN 3D DOBLADA', 180, 'pru', 'Accion', 1, 1, '', 0, NULL, '2019-03-27 17:35:12', '2019-03-27 17:35:12', 2, '+13'),
(16, '', '', 'CAPITANA MARVEL', 132, '', 'Accion', 1, 1, '', 0, NULL, '2019-03-27 17:36:05', '2019-03-27 17:36:05', 2, '+13'),
(17, '', '', 'DUMBO', 140, '', 'Animacion', 0, 1, '', 0, NULL, '2019-03-29 19:52:11', '2019-03-29 19:52:11', 2, '+13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idPermiso` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idPermiso`, `idSeccion`, `idUsuario`) VALUES
(1098, 1, 1),
(1099, 2, 1),
(1100, 18, 1),
(1101, 19, 1),
(1141, 1, 6),
(1142, 2, 6),
(1143, 3, 6),
(1144, 4, 6),
(1145, 18, 6),
(1146, 19, 6),
(1147, 21, 6),
(1148, 22, 6),
(1149, 23, 6),
(1150, 28, 6),
(1151, 29, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `idSala` int(11) NOT NULL,
  `nroSala` int(11) NOT NULL,
  `nombreSala` varchar(45) NOT NULL,
  `nroFila` int(11) NOT NULL,
  `nroColumna` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `invert` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`idSala`, `nroSala`, `nombreSala`, `nroFila`, `nroColumna`, `capacidad`, `invert`) VALUES
(7, 1010, 'SALA 1', 10, 10, 90, 0),
(8, 2020, 'SALA 2', 10, 10, 82, 0),
(9, 3030, 'SALA 3', 10, 10, 90, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `idSeccion` int(11) NOT NULL,
  `nombreSec` varchar(200) NOT NULL,
  `seccion_padre_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`idSeccion`, `nombreSec`, `seccion_padre_id`) VALUES
(1, 'Inicio', '0'),
(2, 'Empresas', '0'),
(3, 'Peliculas', '0'),
(4, 'Distribuidoras', '0'),
(5, 'Salas', '0'),
(6, 'Tarifas', '0'),
(7, 'Programacion', '0'),
(8, 'Ventas', '0'),
(9, 'Estadisticas', '0'),
(10, 'Usuarios', '0'),
(11, 'Caja', '0'),
(12, 'ControlIngreso', '0'),
(13, 'LibroIVA', '0'),
(14, 'Cupones', '0'),
(15, 'Clientes', '0'),
(16, 'DiasFestivos', '0'),
(17, 'DatosDosificacion', '0'),
(18, 'RegistrarNuevaEmpresa', '2'),
(19, 'VerEmpresas', '2'),
(20, 'ModificarEmpresa', '2'),
(21, 'EliminarEmpresa', '2'),
(22, 'RegistrarNuevaPelicula', '3'),
(23, 'VerPeliculas', '3'),
(24, 'ImagenesPelicula', '3'),
(25, 'ModificarPelicula', '3'),
(26, 'EliminarPelicula', '3'),
(27, 'SacarCartelera', '3'),
(28, 'RegistrarNuevaDistribuidora', '4'),
(29, 'VerDistribuidoras', '4'),
(30, 'ModificarDistribuidora', '4'),
(31, 'EliminarDistribuidora', '4'),
(32, 'RegistrarNuevaSala', '5'),
(33, 'VerSalas', '5'),
(34, 'ModificarSala', '5'),
(35, 'EliminarSala', '5'),
(36, 'RegistrarNuevaTarifa', '6'),
(37, 'VerTarifas', '6'),
(38, 'ModificarTarifa', '6'),
(39, 'EliminarTarifa', '6'),
(40, 'VerTarifasInactivas', '6'),
(41, 'RegistrarNuevaProgramacion', '7'),
(42, 'VerProgramacion', '7'),
(43, 'ModificarProgramacion', '7'),
(44, 'EliminarProgramacion', '7'),
(45, 'PanelVentas', '8'),
(46, 'PanelDevoluciones', '8'),
(47, 'DevolverEntrada', '8'),
(48, 'DevolverFuncion', '8'),
(49, 'VolverImprimirEntrada', '8'),
(50, 'VolverImprimirDevolucion', '8'),
(51, 'PanelVentasWeb', '8'),
(52, 'ConsultarVentaWeb', '8'),
(53, 'RegistrarEntradaWeb', '8'),
(54, 'VerPanelVentasWeb', '8'),
(55, 'VerEntradasVendidas', '8'),
(56, 'ReactivarEntradaWeb', '8'),
(57, 'VerPanelVentasWeb', '8'),
(58, 'FormularioF710', '8'),
(59, 'sadaic', '8'),
(60, 'DetallesVentaWeb', '8'),
(61, 'VerPanelVentas', '8'),
(62, 'DetallesVenta', '8'),
(63, 'FormularioF700', '9'),
(64, 'ResumenDelDia', '9'),
(65, 'BorderauxFuncion', '9'),
(66, 'BorderauxRecaudacion', '9'),
(67, 'BorderauxDistribuidor', '9'),
(68, 'F700Diario', '9'),
(69, 'FormularioF700DiarioExcel', '9'),
(70, 'VerVentasVendedor', '9'),
(71, 'VerResumenVentas', '9'),
(72, 'FormularioF710', '9'),
(73, 'sadaic', '9'),
(74, 'Ultracine', '9'),
(75, 'VerResumenVentas', '9'),
(76, 'VerResumenVentasBoxOffice', '9'),
(77, 'RegistrarNuevoUsuario', '10'),
(78, 'VerUsuarios', '10'),
(79, 'ModificarUsuario', '10'),
(80, 'EliminarUsuario', '10'),
(81, 'ModificarPassword', '10'),
(82, 'RegistrarNuevaCaja', '11'),
(83, 'VerCaja', '11'),
(84, 'ModificarCaja', '11'),
(85, 'EliminarCaja', '11'),
(86, 'CerrarCaja', '11'),
(87, 'VerControlesIngreso', '12'),
(88, 'RegistrarNuevoControlIngreso', '12'),
(89, 'DetallesControlIngreso', '12'),
(90, 'VerLibroIVAVentas', '13'),
(91, 'RegistrarNuevoCupon', '14'),
(92, 'ModificarCupon', '14'),
(93, 'EliminarCupon', '14'),
(94, 'VerCupones', '14'),
(95, 'RegistrarNuevoCliente', '15'),
(96, 'ModificarCliente', '15'),
(97, 'EliminarCliente', '15'),
(98, 'VerClientes', '15'),
(99, 'VerClientesInactivos', '15'),
(100, 'RegistrarNuevoDiaFestivo', '16'),
(101, 'ModificarDiaFestivo', '16'),
(102, 'VerDiasFestivos', '16'),
(103, 'VerDiasFestivosInactivos', '16'),
(104, 'EliminarDiaFestivo', '16'),
(105, 'RegistrarNuevoDatoDosificacion', '17'),
(106, 'VerDatosDosificacion', '17'),
(107, 'ModificarDatoDosificacion', '17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(11) NOT NULL,
  `serie` varchar(5) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` double NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `defecto` tinyint(1) NOT NULL,
  `ventaWeb` tinyint(1) NOT NULL,
  `mostrarBol` tinyint(1) NOT NULL,
  `d2` tinyint(1) NOT NULL,
  `d3` tinyint(1) NOT NULL,
  `lunes` tinyint(1) NOT NULL,
  `martes` tinyint(1) NOT NULL,
  `miercoles` tinyint(1) NOT NULL,
  `jueves` tinyint(1) NOT NULL,
  `viernes` tinyint(1) NOT NULL,
  `sabado` tinyint(1) NOT NULL,
  `domingo` tinyint(1) NOT NULL,
  `diaFestivo` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`idTarifa`, `serie`, `descripcion`, `precio`, `tv`, `defecto`, `ventaWeb`, `mostrarBol`, `d2`, `d3`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `diaFestivo`, `activo`) VALUES
(1, 'ww', 'prueba', 30, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, '2w', '555', 40, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 1, 1, 0, 1, 1),
(6, '4w', '3333', 50, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0),
(7, 'vv', ' mmm', 10, 0, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1),
(8, '444', 'dfdf', 33, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(9, '2w', '555', 40, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUser` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUser`, `user`, `password`) VALUES
(1, 'administrador', 'admin', 'admin'),
(6, 'prueba', 'pr1', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`idAsiento`),
  ADD KEY `idSala` (`idSala`);

--
-- Indices de la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD PRIMARY KEY (`idButaca`) USING BTREE;

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `cinit` (`cinit`);

--
-- Indices de la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  ADD PRIMARY KEY (`idCosto`),
  ADD KEY `idButaca` (`idButaca`),
  ADD KEY `idTarifa` (`idTarifa`),
  ADD KEY `idFuncion` (`idFuncion`) USING BTREE;

--
-- Indices de la tabla `dia_festivo`
--
ALTER TABLE `dia_festivo`
  ADD PRIMARY KEY (`idFestivo`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`idDistrib`);

--
-- Indices de la tabla `dosificacion`
--
ALTER TABLE `dosificacion`
  ADD PRIMARY KEY (`idDosif`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`) USING BTREE;

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`idFuncion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`),
  ADD KEY `idSala` (`idSala`),
  ADD KEY `idTarifa` (`idTarifa`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idPelicula`),
  ADD KEY `idDistrib` (`idDistrib`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `idSeccion` (`idSeccion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`idSeccion`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idTarifa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`) USING BTREE,
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `idAsiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT de la tabla `butaca`
--
ALTER TABLE `butaca`
  MODIFY `idButaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  MODIFY `idCosto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dia_festivo`
--
ALTER TABLE `dia_festivo`
  MODIFY `idFestivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `idDistrib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dosificacion`
--
ALTER TABLE `dosificacion`
  MODIFY `idDosif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `idFuncion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1152;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `asiento_ibfk_1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD CONSTRAINT `funcion_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcion_ibfk_2` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcion_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcion_ibfk_4` FOREIGN KEY (`idTarifa`) REFERENCES `tarifa` (`idTarifa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`idDistrib`) REFERENCES `distribuidor` (`idDistrib`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`idSeccion`) REFERENCES `seccion` (`idSeccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
