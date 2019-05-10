-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2019 a las 15:21:51
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
  `activo` varchar(10) NOT NULL DEFAULT 'ACTIVO',
  `idSala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asiento`
--

INSERT INTO `asiento` (`idAsiento`, `fila`, `columna`, `letra`, `activo`, `idSala`) VALUES
(516, 1, 1, 'A', 'INACTIVO', 50852),
(517, 1, 2, 'A', 'INACTIVO', 50852),
(518, 1, 3, 'A', 'ACTIVO', 50852),
(519, 1, 4, 'A', 'ACTIVO', 50852),
(520, 1, 5, 'A', 'ACTIVO', 50852),
(521, 1, 6, 'A', 'ACTIVO', 50852),
(522, 1, 7, 'A', 'ACTIVO', 50852),
(523, 1, 8, 'A', 'ACTIVO', 50852),
(524, 1, 9, 'A', 'ACTIVO', 50852),
(525, 1, 10, 'A', 'ACTIVO', 50852),
(526, 1, 11, 'A', 'ACTIVO', 50852),
(527, 1, 12, 'A', 'ACTIVO', 50852),
(528, 1, 13, 'A', 'ACTIVO', 50852),
(529, 1, 14, 'A', 'ACTIVO', 50852),
(530, 1, 15, 'A', 'ACTIVO', 50852),
(531, 1, 16, 'A', 'ACTIVO', 50852),
(532, 1, 17, 'A', 'ACTIVO', 50852),
(533, 2, 1, 'B', 'INACTIVO', 50852),
(534, 2, 2, 'B', 'INACTIVO', 50852),
(535, 2, 3, 'B', 'ACTIVO', 50852),
(536, 2, 4, 'B', 'ACTIVO', 50852),
(537, 2, 5, 'B', 'ACTIVO', 50852),
(538, 2, 6, 'B', 'ACTIVO', 50852),
(539, 2, 7, 'B', 'ACTIVO', 50852),
(540, 2, 8, 'B', 'ACTIVO', 50852),
(541, 2, 9, 'B', 'ACTIVO', 50852),
(542, 2, 10, 'B', 'ACTIVO', 50852),
(543, 2, 11, 'B', 'ACTIVO', 50852),
(544, 2, 12, 'B', 'ACTIVO', 50852),
(545, 2, 13, 'B', 'ACTIVO', 50852),
(546, 2, 14, 'B', 'ACTIVO', 50852),
(547, 2, 15, 'B', 'ACTIVO', 50852),
(548, 2, 16, 'B', 'ACTIVO', 50852),
(549, 2, 17, 'B', 'ACTIVO', 50852),
(550, 3, 1, 'C', 'INACTIVO', 50852),
(551, 3, 2, 'C', 'INACTIVO', 50852),
(552, 3, 3, 'C', 'ACTIVO', 50852),
(553, 3, 4, 'C', 'ACTIVO', 50852),
(554, 3, 5, 'C', 'ACTIVO', 50852),
(555, 3, 6, 'C', 'ACTIVO', 50852),
(556, 3, 7, 'C', 'ACTIVO', 50852),
(557, 3, 8, 'C', 'ACTIVO', 50852),
(558, 3, 9, 'C', 'ACTIVO', 50852),
(559, 3, 10, 'C', 'ACTIVO', 50852),
(560, 3, 11, 'C', 'ACTIVO', 50852),
(561, 3, 12, 'C', 'ACTIVO', 50852),
(562, 3, 13, 'C', 'ACTIVO', 50852),
(563, 3, 14, 'C', 'ACTIVO', 50852),
(564, 3, 15, 'C', 'ACTIVO', 50852),
(565, 3, 16, 'C', 'ACTIVO', 50852),
(566, 3, 17, 'C', 'ACTIVO', 50852),
(567, 4, 1, 'D', 'INACTIVO', 50852),
(568, 4, 2, 'D', 'INACTIVO', 50852),
(569, 4, 3, 'D', 'ACTIVO', 50852),
(570, 4, 4, 'D', 'ACTIVO', 50852),
(571, 4, 5, 'D', 'ACTIVO', 50852),
(572, 4, 6, 'D', 'ACTIVO', 50852),
(573, 4, 7, 'D', 'ACTIVO', 50852),
(574, 4, 8, 'D', 'ACTIVO', 50852),
(575, 4, 9, 'D', 'ACTIVO', 50852),
(576, 4, 10, 'D', 'ACTIVO', 50852),
(577, 4, 11, 'D', 'ACTIVO', 50852),
(578, 4, 12, 'D', 'ACTIVO', 50852),
(579, 4, 13, 'D', 'ACTIVO', 50852),
(580, 4, 14, 'D', 'ACTIVO', 50852),
(581, 4, 15, 'D', 'ACTIVO', 50852),
(582, 4, 16, 'D', 'ACTIVO', 50852),
(583, 4, 17, 'D', 'ACTIVO', 50852),
(584, 5, 1, 'E', 'INACTIVO', 50852),
(585, 5, 2, 'E', 'INACTIVO', 50852),
(586, 5, 3, 'E', 'ACTIVO', 50852),
(587, 5, 4, 'E', 'ACTIVO', 50852),
(588, 5, 5, 'E', 'ACTIVO', 50852),
(589, 5, 6, 'E', 'ACTIVO', 50852),
(590, 5, 7, 'E', 'ACTIVO', 50852),
(591, 5, 8, 'E', 'ACTIVO', 50852),
(592, 5, 9, 'E', 'ACTIVO', 50852),
(593, 5, 10, 'E', 'ACTIVO', 50852),
(594, 5, 11, 'E', 'ACTIVO', 50852),
(595, 5, 12, 'E', 'ACTIVO', 50852),
(596, 5, 13, 'E', 'ACTIVO', 50852),
(597, 5, 14, 'E', 'ACTIVO', 50852),
(598, 5, 15, 'E', 'ACTIVO', 50852),
(599, 5, 16, 'E', 'ACTIVO', 50852),
(600, 5, 17, 'E', 'ACTIVO', 50852),
(601, 6, 1, 'F', 'ACTIVO', 50852),
(602, 6, 2, 'F', 'ACTIVO', 50852),
(603, 6, 3, 'F', 'ACTIVO', 50852),
(604, 6, 4, 'F', 'ACTIVO', 50852),
(605, 6, 5, 'F', 'ACTIVO', 50852),
(606, 6, 6, 'F', 'ACTIVO', 50852),
(607, 6, 7, 'F', 'ACTIVO', 50852),
(608, 6, 8, 'F', 'ACTIVO', 50852),
(609, 6, 9, 'F', 'ACTIVO', 50852),
(610, 6, 10, 'F', 'ACTIVO', 50852),
(611, 6, 11, 'F', 'ACTIVO', 50852),
(612, 6, 12, 'F', 'ACTIVO', 50852),
(613, 6, 13, 'F', 'ACTIVO', 50852),
(614, 6, 14, 'F', 'ACTIVO', 50852),
(615, 6, 15, 'F', 'ACTIVO', 50852),
(616, 6, 16, 'F', 'ACTIVO', 50852),
(617, 6, 17, 'F', 'ACTIVO', 50852),
(618, 1, 1, 'A', 'INACTIVO', 50850),
(619, 1, 2, 'A', 'INACTIVO', 50850),
(620, 1, 3, 'A', 'INACTIVO', 50850),
(621, 1, 4, 'A', 'INACTIVO', 50850),
(622, 1, 5, 'A', 'ACTIVO', 50850),
(623, 1, 6, 'A', 'ACTIVO', 50850),
(624, 1, 7, 'A', 'ACTIVO', 50850),
(625, 1, 8, 'A', 'ACTIVO', 50850),
(626, 1, 9, 'A', 'ACTIVO', 50850),
(627, 1, 10, 'A', 'ACTIVO', 50850),
(628, 1, 11, 'A', 'ACTIVO', 50850),
(629, 1, 12, 'A', 'ACTIVO', 50850),
(630, 1, 13, 'A', 'ACTIVO', 50850),
(631, 1, 14, 'A', 'ACTIVO', 50850),
(632, 1, 15, 'A', 'ACTIVO', 50850),
(633, 1, 16, 'A', 'ACTIVO', 50850),
(634, 1, 17, 'A', 'INACTIVO', 50850),
(635, 1, 18, 'A', 'INACTIVO', 50850),
(636, 1, 19, 'A', 'INACTIVO', 50850),
(637, 2, 1, 'B', 'INACTIVO', 50850),
(638, 2, 2, 'B', 'INACTIVO', 50850),
(639, 2, 3, 'B', 'INACTIVO', 50850),
(640, 2, 4, 'B', 'INACTIVO', 50850),
(641, 2, 5, 'B', 'ACTIVO', 50850),
(642, 2, 6, 'B', 'ACTIVO', 50850),
(643, 2, 7, 'B', 'ACTIVO', 50850),
(644, 2, 8, 'B', 'ACTIVO', 50850),
(645, 2, 9, 'B', 'ACTIVO', 50850),
(646, 2, 10, 'B', 'ACTIVO', 50850),
(647, 2, 11, 'B', 'ACTIVO', 50850),
(648, 2, 12, 'B', 'ACTIVO', 50850),
(649, 2, 13, 'B', 'ACTIVO', 50850),
(650, 2, 14, 'B', 'ACTIVO', 50850),
(651, 2, 15, 'B', 'ACTIVO', 50850),
(652, 2, 16, 'B', 'ACTIVO', 50850),
(653, 2, 17, 'B', 'ACTIVO', 50850),
(654, 2, 18, 'B', 'INACTIVO', 50850),
(655, 2, 19, 'B', 'INACTIVO', 50850),
(656, 3, 1, 'C', 'INACTIVO', 50850),
(657, 3, 2, 'C', 'INACTIVO', 50850),
(658, 3, 3, 'C', 'INACTIVO', 50850),
(659, 3, 4, 'C', 'INACTIVO', 50850),
(660, 3, 5, 'C', 'ACTIVO', 50850),
(661, 3, 6, 'C', 'ACTIVO', 50850),
(662, 3, 7, 'C', 'ACTIVO', 50850),
(663, 3, 8, 'C', 'ACTIVO', 50850),
(664, 3, 9, 'C', 'ACTIVO', 50850),
(665, 3, 10, 'C', 'ACTIVO', 50850),
(666, 3, 11, 'C', 'ACTIVO', 50850),
(667, 3, 12, 'C', 'ACTIVO', 50850),
(668, 3, 13, 'C', 'ACTIVO', 50850),
(669, 3, 14, 'C', 'ACTIVO', 50850),
(670, 3, 15, 'C', 'ACTIVO', 50850),
(671, 3, 16, 'C', 'ACTIVO', 50850),
(672, 3, 17, 'C', 'ACTIVO', 50850),
(673, 3, 18, 'C', 'INACTIVO', 50850),
(674, 3, 19, 'C', 'INACTIVO', 50850),
(675, 4, 1, 'D', 'INACTIVO', 50850),
(676, 4, 2, 'D', 'INACTIVO', 50850),
(677, 4, 3, 'D', 'INACTIVO', 50850),
(678, 4, 4, 'D', 'INACTIVO', 50850),
(679, 4, 5, 'D', 'ACTIVO', 50850),
(680, 4, 6, 'D', 'ACTIVO', 50850),
(681, 4, 7, 'D', 'ACTIVO', 50850),
(682, 4, 8, 'D', 'ACTIVO', 50850),
(683, 4, 9, 'D', 'ACTIVO', 50850),
(684, 4, 10, 'D', 'ACTIVO', 50850),
(685, 4, 11, 'D', 'ACTIVO', 50850),
(686, 4, 12, 'D', 'ACTIVO', 50850),
(687, 4, 13, 'D', 'ACTIVO', 50850),
(688, 4, 14, 'D', 'ACTIVO', 50850),
(689, 4, 15, 'D', 'ACTIVO', 50850),
(690, 4, 16, 'D', 'ACTIVO', 50850),
(691, 4, 17, 'D', 'ACTIVO', 50850),
(692, 4, 18, 'D', 'INACTIVO', 50850),
(693, 4, 19, 'D', 'INACTIVO', 50850),
(694, 5, 1, 'E', 'INACTIVO', 50850),
(695, 5, 2, 'E', 'INACTIVO', 50850),
(696, 5, 3, 'E', 'INACTIVO', 50850),
(697, 5, 4, 'E', 'INACTIVO', 50850),
(698, 5, 5, 'E', 'ACTIVO', 50850),
(699, 5, 6, 'E', 'ACTIVO', 50850),
(700, 5, 7, 'E', 'ACTIVO', 50850),
(701, 5, 8, 'E', 'ACTIVO', 50850),
(702, 5, 9, 'E', 'ACTIVO', 50850),
(703, 5, 10, 'E', 'ACTIVO', 50850),
(704, 5, 11, 'E', 'ACTIVO', 50850),
(705, 5, 12, 'E', 'ACTIVO', 50850),
(706, 5, 13, 'E', 'ACTIVO', 50850),
(707, 5, 14, 'E', 'ACTIVO', 50850),
(708, 5, 15, 'E', 'ACTIVO', 50850),
(709, 5, 16, 'E', 'ACTIVO', 50850),
(710, 5, 17, 'E', 'ACTIVO', 50850),
(711, 5, 18, 'E', 'INACTIVO', 50850),
(712, 5, 19, 'E', 'INACTIVO', 50850),
(713, 6, 1, 'F', 'INACTIVO', 50850),
(714, 6, 2, 'F', 'INACTIVO', 50850),
(715, 6, 3, 'F', 'INACTIVO', 50850),
(716, 6, 4, 'F', 'INACTIVO', 50850),
(717, 6, 5, 'F', 'ACTIVO', 50850),
(718, 6, 6, 'F', 'ACTIVO', 50850),
(719, 6, 7, 'F', 'ACTIVO', 50850),
(720, 6, 8, 'F', 'ACTIVO', 50850),
(721, 6, 9, 'F', 'ACTIVO', 50850),
(722, 6, 10, 'F', 'ACTIVO', 50850),
(723, 6, 11, 'F', 'ACTIVO', 50850),
(724, 6, 12, 'F', 'ACTIVO', 50850),
(725, 6, 13, 'F', 'ACTIVO', 50850),
(726, 6, 14, 'F', 'ACTIVO', 50850),
(727, 6, 15, 'F', 'ACTIVO', 50850),
(728, 6, 16, 'F', 'ACTIVO', 50850),
(729, 6, 17, 'F', 'ACTIVO', 50850),
(730, 6, 18, 'F', 'INACTIVO', 50850),
(731, 6, 19, 'F', 'INACTIVO', 50850),
(732, 7, 1, 'G', 'INACTIVO', 50850),
(733, 7, 2, 'G', 'INACTIVO', 50850),
(734, 7, 3, 'G', 'INACTIVO', 50850),
(735, 7, 4, 'G', 'INACTIVO', 50850),
(736, 7, 5, 'G', 'ACTIVO', 50850),
(737, 7, 6, 'G', 'ACTIVO', 50850),
(738, 7, 7, 'G', 'ACTIVO', 50850),
(739, 7, 8, 'G', 'ACTIVO', 50850),
(740, 7, 9, 'G', 'ACTIVO', 50850),
(741, 7, 10, 'G', 'ACTIVO', 50850),
(742, 7, 11, 'G', 'ACTIVO', 50850),
(743, 7, 12, 'G', 'ACTIVO', 50850),
(744, 7, 13, 'G', 'ACTIVO', 50850),
(745, 7, 14, 'G', 'ACTIVO', 50850),
(746, 7, 15, 'G', 'ACTIVO', 50850),
(747, 7, 16, 'G', 'ACTIVO', 50850),
(748, 7, 17, 'G', 'ACTIVO', 50850),
(749, 7, 18, 'G', 'INACTIVO', 50850),
(750, 7, 19, 'G', 'INACTIVO', 50850),
(751, 8, 1, 'H', 'ACTIVO', 50850),
(752, 8, 2, 'H', 'ACTIVO', 50850),
(753, 8, 3, 'H', 'INACTIVO', 50850),
(754, 8, 4, 'H', 'INACTIVO', 50850),
(755, 8, 5, 'H', 'ACTIVO', 50850),
(756, 8, 6, 'H', 'ACTIVO', 50850),
(757, 8, 7, 'H', 'ACTIVO', 50850),
(758, 8, 8, 'H', 'ACTIVO', 50850),
(759, 8, 9, 'H', 'ACTIVO', 50850),
(760, 8, 10, 'H', 'ACTIVO', 50850),
(761, 8, 11, 'H', 'ACTIVO', 50850),
(762, 8, 12, 'H', 'ACTIVO', 50850),
(763, 8, 13, 'H', 'ACTIVO', 50850),
(764, 8, 14, 'H', 'ACTIVO', 50850),
(765, 8, 15, 'H', 'ACTIVO', 50850),
(766, 8, 16, 'H', 'ACTIVO', 50850),
(767, 8, 17, 'H', 'ACTIVO', 50850),
(768, 8, 18, 'H', 'INACTIVO', 50850),
(769, 8, 19, 'H', 'INACTIVO', 50850),
(770, 9, 1, 'I', 'ACTIVO', 50850),
(771, 9, 2, 'I', 'ACTIVO', 50850),
(772, 9, 3, 'I', 'INACTIVO', 50850),
(773, 9, 4, 'I', 'INACTIVO', 50850),
(774, 9, 5, 'I', 'ACTIVO', 50850),
(775, 9, 6, 'I', 'ACTIVO', 50850),
(776, 9, 7, 'I', 'ACTIVO', 50850),
(777, 9, 8, 'I', 'ACTIVO', 50850),
(778, 9, 9, 'I', 'ACTIVO', 50850),
(779, 9, 10, 'I', 'ACTIVO', 50850),
(780, 9, 11, 'I', 'ACTIVO', 50850),
(781, 9, 12, 'I', 'ACTIVO', 50850),
(782, 9, 13, 'I', 'ACTIVO', 50850),
(783, 9, 14, 'I', 'ACTIVO', 50850),
(784, 9, 15, 'I', 'ACTIVO', 50850),
(785, 9, 16, 'I', 'ACTIVO', 50850),
(786, 9, 17, 'I', 'ACTIVO', 50850),
(787, 9, 18, 'I', 'INACTIVO', 50850),
(788, 9, 19, 'I', 'INACTIVO', 50850),
(789, 10, 1, 'J', 'ACTIVO', 50850),
(790, 10, 2, 'J', 'ACTIVO', 50850),
(791, 10, 3, 'J', 'ACTIVO', 50850),
(792, 10, 4, 'J', 'ACTIVO', 50850),
(793, 10, 5, 'J', 'ACTIVO', 50850),
(794, 10, 6, 'J', 'ACTIVO', 50850),
(795, 10, 7, 'J', 'ACTIVO', 50850),
(796, 10, 8, 'J', 'ACTIVO', 50850),
(797, 10, 9, 'J', 'ACTIVO', 50850),
(798, 10, 10, 'J', 'ACTIVO', 50850),
(799, 10, 11, 'J', 'ACTIVO', 50850),
(800, 10, 12, 'J', 'ACTIVO', 50850),
(801, 10, 13, 'J', 'ACTIVO', 50850),
(802, 10, 14, 'J', 'ACTIVO', 50850),
(803, 10, 15, 'J', 'ACTIVO', 50850),
(804, 10, 16, 'J', 'ACTIVO', 50850),
(805, 10, 17, 'J', 'ACTIVO', 50850),
(806, 10, 18, 'J', 'ACTIVO', 50850),
(807, 10, 19, 'J', 'ACTIVO', 50850),
(808, 1, 1, 'A', 'INACTIVO', 50856),
(809, 1, 2, 'A', 'INACTIVO', 50856),
(810, 1, 3, 'A', 'ACTIVO', 50856),
(811, 1, 4, 'A', 'ACTIVO', 50856),
(812, 1, 5, 'A', 'ACTIVO', 50856),
(813, 1, 6, 'A', 'ACTIVO', 50856),
(814, 1, 7, 'A', 'ACTIVO', 50856),
(815, 1, 8, 'A', 'ACTIVO', 50856),
(816, 1, 9, 'A', 'ACTIVO', 50856),
(817, 1, 10, 'A', 'ACTIVO', 50856),
(818, 1, 11, 'A', 'ACTIVO', 50856),
(819, 1, 12, 'A', 'ACTIVO', 50856),
(820, 1, 13, 'A', 'ACTIVO', 50856),
(821, 1, 14, 'A', 'ACTIVO', 50856),
(822, 1, 15, 'A', 'ACTIVO', 50856),
(823, 1, 16, 'A', 'ACTIVO', 50856),
(824, 1, 17, 'A', 'ACTIVO', 50856),
(825, 1, 18, 'A', 'INACTIVO', 50856),
(826, 1, 19, 'A', 'INACTIVO', 50856),
(827, 2, 1, 'B', 'INACTIVO', 50856),
(828, 2, 2, 'B', 'INACTIVO', 50856),
(829, 2, 3, 'B', 'ACTIVO', 50856),
(830, 2, 4, 'B', 'ACTIVO', 50856),
(831, 2, 5, 'B', 'ACTIVO', 50856),
(832, 2, 6, 'B', 'ACTIVO', 50856),
(833, 2, 7, 'B', 'ACTIVO', 50856),
(834, 2, 8, 'B', 'ACTIVO', 50856),
(835, 2, 9, 'B', 'ACTIVO', 50856),
(836, 2, 10, 'B', 'ACTIVO', 50856),
(837, 2, 11, 'B', 'ACTIVO', 50856),
(838, 2, 12, 'B', 'ACTIVO', 50856),
(839, 2, 13, 'B', 'ACTIVO', 50856),
(840, 2, 14, 'B', 'ACTIVO', 50856),
(841, 2, 15, 'B', 'ACTIVO', 50856),
(842, 2, 16, 'B', 'ACTIVO', 50856),
(843, 2, 17, 'B', 'ACTIVO', 50856),
(844, 2, 18, 'B', 'INACTIVO', 50856),
(845, 2, 19, 'B', 'INACTIVO', 50856),
(846, 3, 1, 'C', 'INACTIVO', 50856),
(847, 3, 2, 'C', 'INACTIVO', 50856),
(848, 3, 3, 'C', 'ACTIVO', 50856),
(849, 3, 4, 'C', 'ACTIVO', 50856),
(850, 3, 5, 'C', 'ACTIVO', 50856),
(851, 3, 6, 'C', 'ACTIVO', 50856),
(852, 3, 7, 'C', 'ACTIVO', 50856),
(853, 3, 8, 'C', 'ACTIVO', 50856),
(854, 3, 9, 'C', 'ACTIVO', 50856),
(855, 3, 10, 'C', 'ACTIVO', 50856),
(856, 3, 11, 'C', 'ACTIVO', 50856),
(857, 3, 12, 'C', 'ACTIVO', 50856),
(858, 3, 13, 'C', 'ACTIVO', 50856),
(859, 3, 14, 'C', 'ACTIVO', 50856),
(860, 3, 15, 'C', 'ACTIVO', 50856),
(861, 3, 16, 'C', 'ACTIVO', 50856),
(862, 3, 17, 'C', 'ACTIVO', 50856),
(863, 3, 18, 'C', 'INACTIVO', 50856),
(864, 3, 19, 'C', 'INACTIVO', 50856),
(865, 4, 1, 'D', 'INACTIVO', 50856),
(866, 4, 2, 'D', 'INACTIVO', 50856),
(867, 4, 3, 'D', 'ACTIVO', 50856),
(868, 4, 4, 'D', 'ACTIVO', 50856),
(869, 4, 5, 'D', 'ACTIVO', 50856),
(870, 4, 6, 'D', 'ACTIVO', 50856),
(871, 4, 7, 'D', 'ACTIVO', 50856),
(872, 4, 8, 'D', 'ACTIVO', 50856),
(873, 4, 9, 'D', 'ACTIVO', 50856),
(874, 4, 10, 'D', 'ACTIVO', 50856),
(875, 4, 11, 'D', 'ACTIVO', 50856),
(876, 4, 12, 'D', 'ACTIVO', 50856),
(877, 4, 13, 'D', 'ACTIVO', 50856),
(878, 4, 14, 'D', 'ACTIVO', 50856),
(879, 4, 15, 'D', 'ACTIVO', 50856),
(880, 4, 16, 'D', 'ACTIVO', 50856),
(881, 4, 17, 'D', 'ACTIVO', 50856),
(882, 4, 18, 'D', 'INACTIVO', 50856),
(883, 4, 19, 'D', 'INACTIVO', 50856),
(884, 5, 1, 'E', 'INACTIVO', 50856),
(885, 5, 2, 'E', 'INACTIVO', 50856),
(886, 5, 3, 'E', 'ACTIVO', 50856),
(887, 5, 4, 'E', 'ACTIVO', 50856),
(888, 5, 5, 'E', 'ACTIVO', 50856),
(889, 5, 6, 'E', 'ACTIVO', 50856),
(890, 5, 7, 'E', 'ACTIVO', 50856),
(891, 5, 8, 'E', 'ACTIVO', 50856),
(892, 5, 9, 'E', 'ACTIVO', 50856),
(893, 5, 10, 'E', 'ACTIVO', 50856),
(894, 5, 11, 'E', 'ACTIVO', 50856),
(895, 5, 12, 'E', 'ACTIVO', 50856),
(896, 5, 13, 'E', 'ACTIVO', 50856),
(897, 5, 14, 'E', 'ACTIVO', 50856),
(898, 5, 15, 'E', 'ACTIVO', 50856),
(899, 5, 16, 'E', 'ACTIVO', 50856),
(900, 5, 17, 'E', 'ACTIVO', 50856),
(901, 5, 18, 'E', 'INACTIVO', 50856),
(902, 5, 19, 'E', 'INACTIVO', 50856),
(903, 6, 1, 'F', 'INACTIVO', 50856),
(904, 6, 2, 'F', 'INACTIVO', 50856),
(905, 6, 3, 'F', 'ACTIVO', 50856),
(906, 6, 4, 'F', 'ACTIVO', 50856),
(907, 6, 5, 'F', 'ACTIVO', 50856),
(908, 6, 6, 'F', 'ACTIVO', 50856),
(909, 6, 7, 'F', 'ACTIVO', 50856),
(910, 6, 8, 'F', 'ACTIVO', 50856),
(911, 6, 9, 'F', 'ACTIVO', 50856),
(912, 6, 10, 'F', 'ACTIVO', 50856),
(913, 6, 11, 'F', 'ACTIVO', 50856),
(914, 6, 12, 'F', 'ACTIVO', 50856),
(915, 6, 13, 'F', 'ACTIVO', 50856),
(916, 6, 14, 'F', 'ACTIVO', 50856),
(917, 6, 15, 'F', 'ACTIVO', 50856),
(918, 6, 16, 'F', 'ACTIVO', 50856),
(919, 6, 17, 'F', 'ACTIVO', 50856),
(920, 6, 18, 'F', 'INACTIVO', 50856),
(921, 6, 19, 'F', 'INACTIVO', 50856),
(922, 7, 1, 'G', 'ACTIVO', 50856),
(923, 7, 2, 'G', 'ACTIVO', 50856),
(924, 7, 3, 'G', 'ACTIVO', 50856),
(925, 7, 4, 'G', 'ACTIVO', 50856),
(926, 7, 5, 'G', 'ACTIVO', 50856),
(927, 7, 6, 'G', 'ACTIVO', 50856),
(928, 7, 7, 'G', 'ACTIVO', 50856),
(929, 7, 8, 'G', 'ACTIVO', 50856),
(930, 7, 9, 'G', 'ACTIVO', 50856),
(931, 7, 10, 'G', 'ACTIVO', 50856),
(932, 7, 11, 'G', 'ACTIVO', 50856),
(933, 7, 12, 'G', 'ACTIVO', 50856),
(934, 7, 13, 'G', 'ACTIVO', 50856),
(935, 7, 14, 'G', 'ACTIVO', 50856),
(936, 7, 15, 'G', 'ACTIVO', 50856),
(937, 7, 16, 'G', 'ACTIVO', 50856),
(938, 7, 17, 'G', 'ACTIVO', 50856),
(939, 7, 18, 'G', 'ACTIVO', 50856),
(940, 7, 19, 'G', 'ACTIVO', 50856);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `idBoleto` int(11) NOT NULL,
  `numboc` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idFuncion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAsiento` int(11) DEFAULT NULL,
  `numeroFuncion` int(11) NOT NULL,
  `numeroSala` int(11) NOT NULL,
  `serieTarifa` varchar(10) NOT NULL,
  `codigoSala` int(11) NOT NULL,
  `fechaFuncion` date NOT NULL,
  `horaFuncion` time NOT NULL,
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL,
  `costo` double NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `devuelto` varchar(10) NOT NULL DEFAULT 'NO',
  `idVenta` int(11) NOT NULL,
  `idCupon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`idBoleto`, `numboc`, `numero`, `fecha`, `idFuncion`, `idUsuario`, `idAsiento`, `numeroFuncion`, `numeroSala`, `serieTarifa`, `codigoSala`, `fechaFuncion`, `horaFuncion`, `fila`, `columna`, `costo`, `titulo`, `devuelto`, `idVenta`, `idCupon`) VALUES
(73, '350856201905092EE-1', 1, '2019-05-06 10:17:00', 103, 1, 838, 2, 3, 'EE', 50856, '2019-05-09', '10:00:00', 2, 12, 50, 'CEMENTERIO MALDITO 2D', 'NO', 34, 0),
(74, '350856201905092MC-1', 1, '2019-05-06 10:17:00', 93, 1, 856, 2, 3, 'MC', 50856, '2019-05-09', '12:30:00', 3, 11, 25, 'DUMBO 2D', 'NO', 34, 0),
(75, '350856201905091MC-2', 2, '2019-05-06 10:17:00', 93, 1, 856, 1, 3, 'MC', 50856, '2019-05-09', '12:30:00', 3, 11, 25, 'DUMBO 2D', 'NO', 34, 0),
(76, '350856201905091MC-3', 3, '2019-05-06 10:39:53', 93, 1, 823, 1, 3, 'MC', 50856, '2019-05-09', '12:30:00', 1, 16, 25, 'DUMBO 2D', 'NO', 35, 0),
(77, '350856201905091MC-4', 4, '2019-05-06 10:39:53', 93, 1, 824, 1, 3, 'MC', 50856, '2019-05-09', '12:30:00', 1, 17, 25, 'DUMBO 2D', 'NO', 35, 0),
(78, '350856201905091EE-2', 2, '2019-05-06 10:39:53', 103, 1, 824, 1, 3, 'EE', 50856, '2019-05-09', '10:00:00', 1, 17, 50, 'CEMENTERIO MALDITO 2D', 'NO', 35, 0),
(79, '350856201905091EE-3', 3, '2019-05-06 10:39:53', 103, 1, 823, 1, 3, 'EE', 50856, '2019-05-09', '10:00:00', 1, 16, 50, 'CEMENTERIO MALDITO 2D', 'NO', 35, 0),
(81, '350856201905061EE-2', 2, '2019-05-06 10:55:16', 100, 1, 856, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 3, 11, 50, 'CEMENTERIO MALDITO 2D', 'NO', 37, 10),
(82, '350856201905061EE-3', 3, '2019-05-06 11:15:08', 100, 1, 854, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 3, 9, 50, 'CEMENTERIO MALDITO 2D', 'NO', 38, 11),
(83, '350856201905061EE-4', 4, '2019-05-06 11:17:44', 100, 1, 818, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 1, 11, 50, 'CEMENTERIO MALDITO 2D', 'NO', 39, 12),
(84, '350856201905061EE-5', 5, '2019-05-06 11:22:57', 100, 1, 834, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 2, 8, 50, 'CEMENTERIO MALDITO 2D', 'NO', 40, 13),
(85, '350856201905061EE-6', 6, '2019-05-06 11:25:49', 100, 1, 817, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 1, 10, 50, 'CEMENTERIO MALDITO 2D', 'NO', 41, 14),
(86, '250852201905091PT-1', 1, '2019-05-07 09:20:26', 110, 1, 542, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 10, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(87, '250852201905091PT-2', 2, '2019-05-07 09:20:26', 110, 1, 539, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 7, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(88, '250852201905091PT-3', 3, '2019-05-07 09:20:26', 110, 1, 540, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 8, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(89, '250852201905091PT-4', 4, '2019-05-07 09:20:26', 110, 1, 541, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 9, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(90, '250852201905091PT-5', 5, '2019-05-07 09:20:26', 110, 1, 543, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 11, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(91, '250852201905091PT-6', 6, '2019-05-07 09:20:27', 110, 1, 560, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 11, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(92, '250852201905091PT-7', 7, '2019-05-07 09:20:27', 110, 1, 559, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 10, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(93, '250852201905091PT-8', 8, '2019-05-07 09:20:27', 110, 1, 558, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 9, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(94, '250852201905091PT-9', 9, '2019-05-07 09:20:27', 110, 1, 557, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 8, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(95, '250852201905091PT-10', 10, '2019-05-07 09:20:27', 110, 1, 556, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 7, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, 0),
(96, '250856201905091EE-4', 4, '2019-05-07 09:20:27', 103, 1, 837, 1, 2, 'EE', 50856, '2019-05-09', '10:00:00', 2, 11, 50, 'CEMENTERIO MALDITO 2D', 'NO', 42, 0),
(97, '250856201905091EE-5', 5, '2019-05-07 09:20:27', 103, 1, 836, 1, 2, 'EE', 50856, '2019-05-09', '10:00:00', 2, 10, 50, 'CEMENTERIO MALDITO 2D', 'NO', 42, 0),
(100, '350856201905071EE-1', 1, '2019-05-07 09:30:00', 101, 1, 855, 1, 3, 'EE', 50856, '2019-05-07', '10:00:00', 3, 10, 50, 'CEMENTERIO MALDITO 2D', 'NO', 44, 15),
(101, '150850201905091PT-1', 1, '2019-05-09 09:19:01', 107, 1, NULL, 1, 1, 'PT', 50850, '2019-05-09', '19:30:00', 5, 10, 50, 'DETECTIVE PIKACHU 3D', 'SI', 45, 0),
(102, '350856201905092EE-6', 6, '2019-05-09 09:20:21', 103, 1, NULL, 2, 3, 'EE', 50856, '2019-05-09', '10:00:00', 4, 10, 50, 'CEMENTERIO MALDITO 2D', 'SI', 46, 0),
(103, '250852201905101PT-1', 1, '2019-05-10 09:01:15', 111, 1, 541, 1, 2, 'PT', 50852, '2019-05-10', '16:00:00', 2, 9, 50, 'DETECTIVE PIKACHU 3D', 'NO', 47, 0);

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
  `nombreCl` varchar(200) DEFAULT NULL,
  `apellidoCl` varchar(200) NOT NULL,
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
(11, '3333', 'prueba', '', '', '0000-00-00', '', '', 'M', NULL),
(14, '5769706', 'Alejandro', 'Lopez', '', NULL, '', NULL, NULL, NULL),
(16, '1010', 'Juan', 'Perez', '', NULL, '', NULL, NULL, NULL),
(21, '69603027', 'ADIMER', 'CHAMBI', '', '0000-00-00', '', '', 'M', NULL),
(22, '0', 'SN', 'SN', '', '0000-00-00', '', '', 'M', NULL),
(23, '123456', 'MARIA', 'ESCALERA', '', NULL, '', NULL, NULL, NULL),
(24, '7336199', '', 'CHAMBI', '', NULL, '', NULL, NULL, NULL);

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
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE `cupon` (
  `idCupon` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaFin` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`idCupon`, `fechaInicio`, `fechaFin`, `idUsuario`, `motivo`, `estado`) VALUES
(10, '2019-05-06 10:54:23', '2019-05-12 00:00:00', 1, 'DIA DEL NIÑO', 'ACTIVO'),
(11, '2019-05-06 11:13:40', '2019-05-06 00:00:00', 1, 'dia del mar', 'ACTIVO'),
(12, '2019-05-06 11:17:26', '2019-05-06 00:00:00', 1, 'DIA MUNDIAL DE LA MUJER', 'ACTIVO'),
(13, '2019-05-06 11:22:38', '2019-05-06 00:00:00', 1, 'DIA DE BOLIVIA', 'ACTIVO'),
(14, '2019-05-06 11:25:31', '2019-05-06 00:00:00', 1, 'dia del mar', 'ACTIVO'),
(15, '2019-05-07 09:26:46', '2019-05-07 00:00:00', 1, 'DIA MUNDIAL DE LA MUJER', 'ACTIVO'),
(16, '2019-05-09 08:43:39', '2019-05-09 00:00:00', 1, 'DIA MUNDIAL DE LA MUJER', 'ACTIVO'),
(17, '2019-05-09 09:48:50', '2019-05-09 00:00:00', 1, 'DIA DEL NIÑO', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `idDevolucion` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaReg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`idDevolucion`, `idVenta`, `idUsuario`, `fechaReg`) VALUES
(1, 8, 1, '2019-04-22 16:34:00'),
(3, 45, 1, '2019-05-09 09:19:22'),
(4, 45, 1, '2019-05-09 09:19:30'),
(5, 46, 1, '2019-05-09 09:20:36');

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
(5, 'UNITED INTERNATIONAL PICTURES SRL.', 'AYACUCHO 520', '25 de mayo buenos aires', '33-52067017-9', '011-43730261/43746900', 'renato_scaglione@uip.com.ar', ''),
(6, '3C FILMS GROUP SRL', 'COLOMBRES 1333 PISO 2 OFICINA 33', 'Palermo Capital Federal', '30-70770701-8', '011-39685579', '', ''),
(7, 'WARNER BROS-MEDIA WORLD', 'UNITEL SANTA CRUZ', 'SANTA CRUZ BOLIVIA', '295756020', '3565909', 'rolando.bottler@rola.la', 'ROLANDO BOTTLER');

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
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `leyenda` varchar(1000) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `nroFactura` int(11) NOT NULL DEFAULT '0',
  `tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dosificacion`
--

INSERT INTO `dosificacion` (`idDosif`, `nroTramite`, `nroAutorizacion`, `nroFactIni`, `llaveDosif`, `fechaDesde`, `fechaHasta`, `leyenda`, `activo`, `nroFactura`, `tipo`) VALUES
(1, 123456, 77888888, 1, 'ss4s4s4', '2019-03-12', '2019-03-13', 'ass', 0, 0, ''),
(3, 1235553, 778888880, 1, 'ss4s4s4', '2019-03-12', '2019-03-13', 'ass', 0, 0, ''),
(5, 55555, 666, 7777, 'dfdfdfdf', '2019-03-14', '2019-03-28', 'ddd', 0, 0, ''),
(6, 400001984457, 332401900008210, 1, '38@#I#(Z95qd-@=2ja2JLFUUN)G6GBWCZE#-SVEDHgtQBh@qV_UHPqXSEvnCZJBB', '2019-04-02', '2019-09-26', 'Ley N° 453: Tienes derecho a un trato equitativo sin discriminacion en la oferta de servicios.', 1, 21, 'BOLETERIA');

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
(22, '600970', 'MULTISALAS S.R.L.', 'Multisalas', NULL, '591-25281290', 'Av. Tacna y Jaen', 'Oruro(Bolivia)', '329448023', NULL, NULL, NULL, 'Siempre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `idFuncion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `subtitulada` varchar(5) NOT NULL,
  `numerada` varchar(5) NOT NULL,
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
(93, '2019-05-09', '12:30:00', '14:10:00', 'on', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:57', 12),
(94, '2019-05-10', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:57', 12),
(95, '2019-05-11', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:57', 12),
(96, '2019-05-12', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:58', 12),
(97, '2019-05-13', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:58', 12),
(98, '2019-05-14', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:58', 12),
(99, '2019-05-15', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:58', 12),
(100, '2019-05-06', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 1, 'ACTIVADO', '2019-05-06 10:15:56', 11),
(101, '2019-05-07', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 1, 'ACTIVADO', '2019-05-06 10:15:56', 11),
(102, '2019-05-08', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 1, 'ACTIVADO', '2019-05-06 10:15:56', 11),
(103, '2019-05-09', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 2, 'ACTIVADO', '2019-05-06 10:15:56', 11),
(104, '2019-05-10', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 2, 'ACTIVADO', '2019-05-06 10:15:56', 11),
(105, '2019-05-11', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 2, 'ACTIVADO', '2019-05-06 10:15:56', 11),
(106, '2019-05-12', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 2, 'ACTIVADO', '2019-05-06 10:15:56', 11),
(107, '2019-05-09', '19:30:00', '21:14:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-07 09:11:49', 13),
(110, '2019-05-09', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:03', 13),
(111, '2019-05-10', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:03', 13),
(112, '2019-05-11', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:03', 13),
(113, '2019-05-12', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:04', 13),
(114, '2019-05-13', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:04', 13),
(115, '2019-05-14', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:04', 13),
(116, '2019-05-15', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:04', 13);

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
(22, '', '', 'DUMBO', 100, 'EEUU', 'Aventura', 1, 1, '', 0, NULL, '2019-05-06 09:21:49', '2019-05-06 09:21:49', 6, 'ATP'),
(23, '', '', 'DUMBO', 100, 'EEUU', 'Aventura', 1, 0, '', 0, NULL, '2019-05-06 09:22:30', '2019-05-06 09:22:30', 6, 'ATP'),
(24, '', '', 'CEMENTERIO MALDITO', 100, 'EEUU', 'Terror', 1, 0, '', 0, NULL, '2019-05-06 10:15:22', '2019-05-06 10:15:22', 6, '+13'),
(25, '', '', 'DETECTIVE PIKACHU', 104, 'EEUU', 'Animada', 1, 1, '', 0, NULL, '2019-05-07 09:00:44', '2019-05-07 09:00:44', 7, 'ATP'),
(27, '', '', 'DETECTIVE PIKACHU', 104, 'EEUU', 'Animada', 1, 0, '', 0, NULL, '2019-05-07 09:01:15', '2019-05-07 09:01:15', 7, 'ATP');

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
(1151, 29, 6),
(1368, 1, 7),
(1369, 1, 1),
(1370, 2, 1),
(1371, 3, 1),
(1372, 4, 1),
(1373, 5, 1),
(1374, 6, 1),
(1375, 7, 1),
(1376, 8, 1),
(1377, 9, 1),
(1378, 10, 1),
(1379, 11, 1),
(1380, 12, 1),
(1381, 13, 1),
(1382, 14, 1),
(1383, 15, 1),
(1384, 16, 1),
(1385, 17, 1),
(1386, 18, 1),
(1387, 19, 1),
(1388, 20, 1),
(1389, 21, 1),
(1390, 22, 1),
(1391, 23, 1),
(1392, 24, 1),
(1393, 25, 1),
(1394, 26, 1),
(1395, 27, 1),
(1396, 28, 1),
(1397, 29, 1),
(1398, 30, 1),
(1399, 31, 1),
(1400, 32, 1),
(1401, 33, 1),
(1402, 34, 1),
(1403, 35, 1),
(1404, 36, 1),
(1405, 37, 1),
(1406, 38, 1),
(1407, 39, 1),
(1408, 40, 1),
(1409, 41, 1),
(1410, 42, 1),
(1411, 43, 1),
(1412, 44, 1),
(1413, 45, 1),
(1414, 46, 1),
(1415, 47, 1),
(1416, 48, 1),
(1417, 49, 1),
(1418, 50, 1),
(1419, 51, 1),
(1420, 52, 1),
(1421, 53, 1),
(1422, 54, 1),
(1423, 55, 1),
(1424, 56, 1),
(1425, 57, 1),
(1426, 58, 1),
(1427, 59, 1),
(1428, 60, 1),
(1429, 61, 1),
(1430, 62, 1),
(1431, 63, 1),
(1432, 64, 1),
(1433, 65, 1),
(1434, 66, 1),
(1435, 67, 1),
(1436, 68, 1),
(1437, 69, 1),
(1438, 70, 1),
(1439, 71, 1),
(1440, 72, 1),
(1441, 73, 1),
(1442, 74, 1),
(1443, 75, 1),
(1444, 76, 1),
(1445, 77, 1),
(1446, 78, 1),
(1447, 79, 1),
(1448, 80, 1),
(1449, 81, 1),
(1450, 82, 1),
(1451, 83, 1),
(1452, 84, 1),
(1453, 85, 1),
(1454, 86, 1),
(1455, 87, 1),
(1456, 88, 1),
(1457, 89, 1),
(1458, 90, 1),
(1459, 91, 1),
(1460, 92, 1),
(1461, 93, 1),
(1462, 94, 1),
(1463, 95, 1),
(1464, 96, 1),
(1465, 97, 1),
(1466, 98, 1),
(1467, 99, 1),
(1468, 100, 1),
(1469, 101, 1),
(1470, 102, 1),
(1471, 103, 1),
(1472, 104, 1),
(1473, 105, 1),
(1474, 106, 1),
(1475, 107, 1),
(1476, 5, 8),
(1477, 8, 8),
(1478, 32, 8),
(1479, 33, 8),
(1480, 45, 8);

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
(50850, 1, 'SALA A', 10, 19, 139, 0),
(50852, 2, 'SALA B', 6, 17, 92, 0),
(50856, 3, 'SALA C', 7, 19, 109, 0);

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
-- Estructura de tabla para la tabla `subcupon`
--

CREATE TABLE `subcupon` (
  `idsubcupon` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(15) NOT NULL DEFAULT 'ACTIVO',
  `idcupon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcupon`
--

INSERT INTO `subcupon` (`idsubcupon`, `fecha`, `estado`, `idcupon`) VALUES
(1, '2019-05-09 09:48:50', 'ACTIVO', 17),
(2, '2019-05-09 09:48:50', 'ACTIVO', 17),
(3, '2019-05-09 09:48:50', 'ACTIVO', 17),
(4, '2019-05-09 09:48:50', 'ACTIVO', 17),
(5, '2019-05-09 09:48:50', 'ACTIVO', 17),
(6, '2019-05-09 09:48:50', 'ACTIVO', 17),
(7, '2019-05-09 09:48:50', 'ACTIVO', 17),
(8, '2019-05-09 09:48:50', 'ACTIVO', 17),
(9, '2019-05-09 09:48:50', 'ACTIVO', 17),
(10, '2019-05-09 09:48:50', 'ACTIVO', 17);

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
(6, '4w', '3333', 50, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0),
(10, 'ww', 'www', 40, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(11, 'EE', 'ESTRENOSW', 50, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(12, 'MC', 'TAQUILLA MITAD DE PRECIO', 25, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(13, 'PT', 'PELICULA TAQUIILLERA', 50, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `idTemporal` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idAsiento` int(11) NOT NULL,
  `idFuncion` int(11) NOT NULL,
  `numeroFuncion` int(11) NOT NULL,
  `numeroSala` int(11) NOT NULL,
  `serieTarifa` varchar(50) NOT NULL,
  `codSala` int(11) NOT NULL,
  `fechaFuncion` date NOT NULL,
  `horaFuncion` time NOT NULL,
  `idUser` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL,
  `costo` double NOT NULL,
  `titulo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 'prueba', 'pr1', '1234'),
(7, 'user2', 'user2', '123456'),
(8, 'COSME FULANITO', 'cosme', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `fechaVenta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` double NOT NULL,
  `codigoControl` varchar(100) DEFAULT NULL,
  `codigoQR` varchar(200) DEFAULT NULL,
  `nroComprobante` int(11) DEFAULT NULL,
  `tipoVenta` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'ACTIVO',
  `idUsuario` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idDosif` int(11) DEFAULT NULL,
  `idCupon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `fechaVenta`, `total`, `codigoControl`, `codigoQR`, `nroComprobante`, `tipoVenta`, `estado`, `idUsuario`, `idCliente`, `idDosif`, `idCupon`) VALUES
(8, '2019-04-17 10:21:04', 40, '', '', 3, 'RECIBO', 'ANULADO', 1, 22, 6, NULL),
(15, '2019-04-17 11:45:42', 190, '28-79-B3-DB', '329448023|6|332401900008210|20190417|190|190|28-79-B3-DB|0|0|0|0|0.00', 7, 'FACTURA', 'ACTIVO', 1, 22, 6, NULL),
(17, '2019-04-17 15:15:28', 60, '', '', 4, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(18, '2019-04-17 15:19:31', 60, '', '', 5, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(20, '2019-04-17 15:30:20', 50, '2A-31-66-52-41', '329448023|9|332401900008210|20190417|50|50|2A-31-66-52-41|5769706|0|0|0|0.00', 10, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(21, '2019-04-17 18:17:49', 100, '52-DA-55-AE-83', '329448023|10|332401900008210|20190417|100|100|52-DA-55-AE-83|123456|0|0|0|0.00', 11, 'FACTURA', 'ACTIVO', 1, 23, 6, NULL),
(22, '2019-04-18 09:03:14', 60, '', '', 6, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(23, '2019-04-23 16:52:43', 100, '', '', 7, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(24, '2019-04-23 16:55:35', 60, 'B5-01-0F-97-C0', '329448023|11|332401900008210|20190423|60|60|B5-01-0F-97-C0|5769706|0|0|0|0.00', 12, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(25, '2019-04-24 09:03:16', 100, 'B9-E6-57-AA-E5', '329448023|13|332401900008210|20190424|100|100|B9-E6-57-AA-E5|5769706|0|0|0|0.00', 13, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(26, '2019-04-25 10:55:36', 100, '9C-85-F6-FD-1E', '329448023|14|332401900008210|20190425|100|100|9C-85-F6-FD-1E|5769706|0|0|0|0.00', 14, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(27, '2019-04-25 11:37:52', 50, '04-7B-C7-53-FA', '329448023|15|332401900008210|20190425|50|50|04-7B-C7-53-FA|5769706|0|0|0|0.00', 15, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(28, '2019-04-26 09:29:19', 30, 'EF-FD-0D-E1-6B', '329448023|16|332401900008210|20190426|30|30|EF-FD-0D-E1-6B|5769706|0|0|0|0.00', 16, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(29, '2019-04-26 09:33:59', 60, '', '', 8, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(30, '2019-04-26 09:36:01', 60, '', '', 9, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(31, '2019-04-30 14:54:59', 60, '', '', 10, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(32, '2019-04-30 14:55:42', 60, '', '', 11, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(33, '2019-05-06 08:55:29', 50, '', '', 12, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(34, '2019-05-06 10:17:00', 75, '', '', 13, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(35, '2019-05-06 10:39:53', 150, '', '', 14, 'RECIBO', 'ACTIVO', 1, 24, 6, NULL),
(37, '2019-05-06 10:55:16', 0, '', '', 15, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(38, '2019-05-06 11:15:08', 0, '', '', 16, 'RECIBO', 'ACTIVO', 1, 22, 6, NULL),
(39, '2019-05-06 11:17:44', 0, '', '', 17, 'RECIBO', 'ACTIVO', 1, 22, 6, 12),
(40, '2019-05-06 11:22:56', 0, '', '', 18, 'RECIBO', 'ACTIVO', 1, 22, 6, 13),
(41, '2019-05-06 11:25:49', 0, '', '', 19, 'RECIBO', 'ACTIVO', 1, 22, 6, 14),
(42, '2019-05-07 09:20:26', 600, '', '', 20, 'RECIBO', 'ACTIVO', 1, 22, 6, 0),
(44, '2019-05-07 09:30:00', 0, '', '', 21, 'RECIBO', 'ACTIVO', 1, 22, 6, 15),
(45, '2019-05-09 09:19:01', 0, '9A-83-C7-26-BE', '329448023|19|332401900008210|20190509|50|50|9A-83-C7-26-BE|7336199|0|0|0|0.00', 19, 'FACTURA', 'ANULADO', 1, 24, 6, 0),
(46, '2019-05-09 09:20:21', 0, '3A-F0-3E-10-BA', '329448023|20|332401900008210|20190509|50|50|3A-F0-3E-10-BA|7336199|0|0|0|0.00', 20, 'FACTURA', 'ANULADO', 1, 24, 6, 0),
(47, '2019-05-10 09:01:15', 50, '5C-81-AB-40', '329448023|21|332401900008210|20190510|50|50|5C-81-AB-40|7336199|0|0|0|0.00', 21, 'FACTURA', 'ACTIVO', 1, 24, 6, 0);

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
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`idBoleto`),
  ADD KEY `idFuncion` (`idFuncion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAsiento` (`idAsiento`) USING BTREE,
  ADD KEY `idVenta` (`idVenta`);

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
-- Indices de la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`idCupon`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`idDevolucion`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idUsuario` (`idUsuario`);

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
-- Indices de la tabla `subcupon`
--
ALTER TABLE `subcupon`
  ADD PRIMARY KEY (`idsubcupon`),
  ADD KEY `idcupon` (`idcupon`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idTarifa`),
  ADD UNIQUE KEY `serie` (`serie`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`idTemporal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`) USING BTREE,
  ADD UNIQUE KEY `user` (`user`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idDosif` (`idDosif`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `idAsiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=941;

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `idBoleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `butaca`
--
ALTER TABLE `butaca`
  MODIFY `idButaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  MODIFY `idCosto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `idCupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dia_festivo`
--
ALTER TABLE `dia_festivo`
  MODIFY `idFestivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `idDistrib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `dosificacion`
--
ALTER TABLE `dosificacion`
  MODIFY `idDosif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `idFuncion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1481;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50857;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `subcupon`
--
ALTER TABLE `subcupon`
  MODIFY `idsubcupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `idTemporal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `asiento_ibfk_1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `boleto_ibfk_1` FOREIGN KEY (`idAsiento`) REFERENCES `asiento` (`idAsiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleto_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleto_ibfk_3` FOREIGN KEY (`idFuncion`) REFERENCES `funcion` (`idFuncion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleto_ibfk_4` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD CONSTRAINT `cupon_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Filtros para la tabla `subcupon`
--
ALTER TABLE `subcupon`
  ADD CONSTRAINT `subcupon_ibfk_1` FOREIGN KEY (`idcupon`) REFERENCES `cupon` (`idCupon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idDosif`) REFERENCES `dosificacion` (`idDosif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
