-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2019 a las 23:12:08
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
(940, 7, 19, 'G', 'ACTIVO', 50856),
(941, 1, 1, 'A', 'INACTIVO', 50857),
(942, 1, 2, 'A', 'INACTIVO', 50857),
(943, 1, 3, 'A', 'INACTIVO', 50857),
(944, 1, 4, 'A', 'INACTIVO', 50857),
(945, 1, 5, 'A', 'ACTIVO', 50857),
(946, 1, 6, 'A', 'ACTIVO', 50857),
(947, 1, 7, 'A', 'ACTIVO', 50857),
(948, 1, 8, 'A', 'ACTIVO', 50857),
(949, 1, 9, 'A', 'ACTIVO', 50857),
(950, 1, 10, 'A', 'ACTIVO', 50857),
(951, 1, 11, 'A', 'ACTIVO', 50857),
(952, 1, 12, 'A', 'ACTIVO', 50857),
(953, 1, 13, 'A', 'ACTIVO', 50857),
(954, 1, 14, 'A', 'ACTIVO', 50857),
(955, 1, 15, 'A', 'ACTIVO', 50857),
(956, 1, 16, 'A', 'ACTIVO', 50857),
(957, 1, 17, 'A', 'INACTIVO', 50857),
(958, 1, 18, 'A', 'INACTIVO', 50857),
(959, 1, 19, 'A', 'INACTIVO', 50857),
(960, 2, 1, 'B', 'INACTIVO', 50857),
(961, 2, 2, 'B', 'INACTIVO', 50857),
(962, 2, 3, 'B', 'INACTIVO', 50857),
(963, 2, 4, 'B', 'INACTIVO', 50857),
(964, 2, 5, 'B', 'ACTIVO', 50857),
(965, 2, 6, 'B', 'ACTIVO', 50857),
(966, 2, 7, 'B', 'ACTIVO', 50857),
(967, 2, 8, 'B', 'ACTIVO', 50857),
(968, 2, 9, 'B', 'ACTIVO', 50857),
(969, 2, 10, 'B', 'ACTIVO', 50857),
(970, 2, 11, 'B', 'ACTIVO', 50857),
(971, 2, 12, 'B', 'ACTIVO', 50857),
(972, 2, 13, 'B', 'ACTIVO', 50857),
(973, 2, 14, 'B', 'ACTIVO', 50857),
(974, 2, 15, 'B', 'ACTIVO', 50857),
(975, 2, 16, 'B', 'ACTIVO', 50857),
(976, 2, 17, 'B', 'ACTIVO', 50857),
(977, 2, 18, 'B', 'INACTIVO', 50857),
(978, 2, 19, 'B', 'INACTIVO', 50857),
(979, 3, 1, 'C', 'INACTIVO', 50857),
(980, 3, 2, 'C', 'INACTIVO', 50857),
(981, 3, 3, 'C', 'INACTIVO', 50857),
(982, 3, 4, 'C', 'INACTIVO', 50857),
(983, 3, 5, 'C', 'ACTIVO', 50857),
(984, 3, 6, 'C', 'ACTIVO', 50857),
(985, 3, 7, 'C', 'ACTIVO', 50857),
(986, 3, 8, 'C', 'ACTIVO', 50857),
(987, 3, 9, 'C', 'ACTIVO', 50857),
(988, 3, 10, 'C', 'ACTIVO', 50857),
(989, 3, 11, 'C', 'ACTIVO', 50857),
(990, 3, 12, 'C', 'ACTIVO', 50857),
(991, 3, 13, 'C', 'ACTIVO', 50857),
(992, 3, 14, 'C', 'ACTIVO', 50857),
(993, 3, 15, 'C', 'ACTIVO', 50857),
(994, 3, 16, 'C', 'ACTIVO', 50857),
(995, 3, 17, 'C', 'ACTIVO', 50857),
(996, 3, 18, 'C', 'INACTIVO', 50857),
(997, 3, 19, 'C', 'INACTIVO', 50857),
(998, 4, 1, 'D', 'INACTIVO', 50857),
(999, 4, 2, 'D', 'INACTIVO', 50857),
(1000, 4, 3, 'D', 'INACTIVO', 50857),
(1001, 4, 4, 'D', 'INACTIVO', 50857),
(1002, 4, 5, 'D', 'ACTIVO', 50857),
(1003, 4, 6, 'D', 'ACTIVO', 50857),
(1004, 4, 7, 'D', 'ACTIVO', 50857),
(1005, 4, 8, 'D', 'ACTIVO', 50857),
(1006, 4, 9, 'D', 'ACTIVO', 50857),
(1007, 4, 10, 'D', 'ACTIVO', 50857),
(1008, 4, 11, 'D', 'ACTIVO', 50857),
(1009, 4, 12, 'D', 'ACTIVO', 50857),
(1010, 4, 13, 'D', 'ACTIVO', 50857),
(1011, 4, 14, 'D', 'ACTIVO', 50857),
(1012, 4, 15, 'D', 'ACTIVO', 50857),
(1013, 4, 16, 'D', 'ACTIVO', 50857),
(1014, 4, 17, 'D', 'ACTIVO', 50857),
(1015, 4, 18, 'D', 'INACTIVO', 50857),
(1016, 4, 19, 'D', 'INACTIVO', 50857),
(1017, 5, 1, 'E', 'INACTIVO', 50857),
(1018, 5, 2, 'E', 'INACTIVO', 50857),
(1019, 5, 3, 'E', 'INACTIVO', 50857),
(1020, 5, 4, 'E', 'INACTIVO', 50857),
(1021, 5, 5, 'E', 'ACTIVO', 50857),
(1022, 5, 6, 'E', 'ACTIVO', 50857),
(1023, 5, 7, 'E', 'ACTIVO', 50857),
(1024, 5, 8, 'E', 'ACTIVO', 50857),
(1025, 5, 9, 'E', 'ACTIVO', 50857),
(1026, 5, 10, 'E', 'ACTIVO', 50857),
(1027, 5, 11, 'E', 'ACTIVO', 50857),
(1028, 5, 12, 'E', 'ACTIVO', 50857),
(1029, 5, 13, 'E', 'ACTIVO', 50857),
(1030, 5, 14, 'E', 'ACTIVO', 50857),
(1031, 5, 15, 'E', 'ACTIVO', 50857),
(1032, 5, 16, 'E', 'ACTIVO', 50857),
(1033, 5, 17, 'E', 'ACTIVO', 50857),
(1034, 5, 18, 'E', 'INACTIVO', 50857),
(1035, 5, 19, 'E', 'INACTIVO', 50857),
(1036, 6, 1, 'F', 'INACTIVO', 50857),
(1037, 6, 2, 'F', 'INACTIVO', 50857),
(1038, 6, 3, 'F', 'INACTIVO', 50857),
(1039, 6, 4, 'F', 'INACTIVO', 50857),
(1040, 6, 5, 'F', 'ACTIVO', 50857),
(1041, 6, 6, 'F', 'ACTIVO', 50857),
(1042, 6, 7, 'F', 'ACTIVO', 50857),
(1043, 6, 8, 'F', 'ACTIVO', 50857),
(1044, 6, 9, 'F', 'ACTIVO', 50857),
(1045, 6, 10, 'F', 'ACTIVO', 50857),
(1046, 6, 11, 'F', 'ACTIVO', 50857),
(1047, 6, 12, 'F', 'ACTIVO', 50857),
(1048, 6, 13, 'F', 'ACTIVO', 50857),
(1049, 6, 14, 'F', 'ACTIVO', 50857),
(1050, 6, 15, 'F', 'ACTIVO', 50857),
(1051, 6, 16, 'F', 'ACTIVO', 50857),
(1052, 6, 17, 'F', 'ACTIVO', 50857),
(1053, 6, 18, 'F', 'INACTIVO', 50857),
(1054, 6, 19, 'F', 'INACTIVO', 50857),
(1055, 7, 1, 'G', 'INACTIVO', 50857),
(1056, 7, 2, 'G', 'INACTIVO', 50857),
(1057, 7, 3, 'G', 'INACTIVO', 50857),
(1058, 7, 4, 'G', 'INACTIVO', 50857),
(1059, 7, 5, 'G', 'ACTIVO', 50857),
(1060, 7, 6, 'G', 'ACTIVO', 50857),
(1061, 7, 7, 'G', 'ACTIVO', 50857),
(1062, 7, 8, 'G', 'ACTIVO', 50857),
(1063, 7, 9, 'G', 'ACTIVO', 50857),
(1064, 7, 10, 'G', 'ACTIVO', 50857),
(1065, 7, 11, 'G', 'ACTIVO', 50857),
(1066, 7, 12, 'G', 'ACTIVO', 50857),
(1067, 7, 13, 'G', 'ACTIVO', 50857),
(1068, 7, 14, 'G', 'ACTIVO', 50857),
(1069, 7, 15, 'G', 'ACTIVO', 50857),
(1070, 7, 16, 'G', 'ACTIVO', 50857),
(1071, 7, 17, 'G', 'ACTIVO', 50857),
(1072, 7, 18, 'G', 'INACTIVO', 50857),
(1073, 7, 19, 'G', 'INACTIVO', 50857),
(1074, 8, 1, 'H', 'ACTIVO', 50857),
(1075, 8, 2, 'H', 'ACTIVO', 50857),
(1076, 8, 3, 'H', 'INACTIVO', 50857),
(1077, 8, 4, 'H', 'INACTIVO', 50857),
(1078, 8, 5, 'H', 'ACTIVO', 50857),
(1079, 8, 6, 'H', 'ACTIVO', 50857),
(1080, 8, 7, 'H', 'ACTIVO', 50857),
(1081, 8, 8, 'H', 'ACTIVO', 50857),
(1082, 8, 9, 'H', 'ACTIVO', 50857),
(1083, 8, 10, 'H', 'ACTIVO', 50857),
(1084, 8, 11, 'H', 'ACTIVO', 50857),
(1085, 8, 12, 'H', 'ACTIVO', 50857),
(1086, 8, 13, 'H', 'ACTIVO', 50857),
(1087, 8, 14, 'H', 'ACTIVO', 50857),
(1088, 8, 15, 'H', 'ACTIVO', 50857),
(1089, 8, 16, 'H', 'ACTIVO', 50857),
(1090, 8, 17, 'H', 'ACTIVO', 50857),
(1091, 8, 18, 'H', 'INACTIVO', 50857),
(1092, 8, 19, 'H', 'INACTIVO', 50857),
(1093, 9, 1, 'I', 'ACTIVO', 50857),
(1094, 9, 2, 'I', 'ACTIVO', 50857),
(1095, 9, 3, 'I', 'INACTIVO', 50857),
(1096, 9, 4, 'I', 'INACTIVO', 50857),
(1097, 9, 5, 'I', 'ACTIVO', 50857),
(1098, 9, 6, 'I', 'ACTIVO', 50857),
(1099, 9, 7, 'I', 'ACTIVO', 50857),
(1100, 9, 8, 'I', 'ACTIVO', 50857),
(1101, 9, 9, 'I', 'ACTIVO', 50857),
(1102, 9, 10, 'I', 'ACTIVO', 50857),
(1103, 9, 11, 'I', 'ACTIVO', 50857),
(1104, 9, 12, 'I', 'ACTIVO', 50857),
(1105, 9, 13, 'I', 'ACTIVO', 50857),
(1106, 9, 14, 'I', 'ACTIVO', 50857),
(1107, 9, 15, 'I', 'ACTIVO', 50857),
(1108, 9, 16, 'I', 'ACTIVO', 50857),
(1109, 9, 17, 'I', 'ACTIVO', 50857),
(1110, 9, 18, 'I', 'INACTIVO', 50857),
(1111, 9, 19, 'I', 'INACTIVO', 50857),
(1112, 10, 1, 'J', 'ACTIVO', 50857),
(1113, 10, 2, 'J', 'ACTIVO', 50857),
(1114, 10, 3, 'J', 'ACTIVO', 50857),
(1115, 10, 4, 'J', 'ACTIVO', 50857),
(1116, 10, 5, 'J', 'ACTIVO', 50857),
(1117, 10, 6, 'J', 'ACTIVO', 50857),
(1118, 10, 7, 'J', 'ACTIVO', 50857),
(1119, 10, 8, 'J', 'ACTIVO', 50857),
(1120, 10, 9, 'J', 'ACTIVO', 50857),
(1121, 10, 10, 'J', 'ACTIVO', 50857),
(1122, 10, 11, 'J', 'ACTIVO', 50857),
(1123, 10, 12, 'J', 'ACTIVO', 50857),
(1124, 10, 13, 'J', 'ACTIVO', 50857),
(1125, 10, 14, 'J', 'ACTIVO', 50857),
(1126, 10, 15, 'J', 'ACTIVO', 50857),
(1127, 10, 16, 'J', 'ACTIVO', 50857),
(1128, 10, 17, 'J', 'ACTIVO', 50857),
(1129, 10, 18, 'J', 'ACTIVO', 50857),
(1130, 10, 19, 'J', 'ACTIVO', 50857),
(1131, 1, 1, 'A', 'INACTIVO', 50858),
(1132, 1, 2, 'A', 'INACTIVO', 50858),
(1133, 1, 3, 'A', 'ACTIVO', 50858),
(1134, 1, 4, 'A', 'ACTIVO', 50858),
(1135, 1, 5, 'A', 'ACTIVO', 50858),
(1136, 1, 6, 'A', 'ACTIVO', 50858),
(1137, 1, 7, 'A', 'ACTIVO', 50858),
(1138, 1, 8, 'A', 'ACTIVO', 50858),
(1139, 1, 9, 'A', 'ACTIVO', 50858),
(1140, 1, 10, 'A', 'ACTIVO', 50858),
(1141, 1, 11, 'A', 'ACTIVO', 50858),
(1142, 1, 12, 'A', 'ACTIVO', 50858),
(1143, 1, 13, 'A', 'ACTIVO', 50858),
(1144, 1, 14, 'A', 'ACTIVO', 50858),
(1145, 1, 15, 'A', 'ACTIVO', 50858),
(1146, 1, 16, 'A', 'ACTIVO', 50858),
(1147, 1, 17, 'A', 'ACTIVO', 50858),
(1148, 2, 1, 'B', 'INACTIVO', 50858),
(1149, 2, 2, 'B', 'INACTIVO', 50858),
(1150, 2, 3, 'B', 'ACTIVO', 50858),
(1151, 2, 4, 'B', 'ACTIVO', 50858),
(1152, 2, 5, 'B', 'ACTIVO', 50858),
(1153, 2, 6, 'B', 'ACTIVO', 50858),
(1154, 2, 7, 'B', 'ACTIVO', 50858),
(1155, 2, 8, 'B', 'ACTIVO', 50858),
(1156, 2, 9, 'B', 'ACTIVO', 50858),
(1157, 2, 10, 'B', 'ACTIVO', 50858),
(1158, 2, 11, 'B', 'ACTIVO', 50858),
(1159, 2, 12, 'B', 'ACTIVO', 50858),
(1160, 2, 13, 'B', 'ACTIVO', 50858),
(1161, 2, 14, 'B', 'ACTIVO', 50858),
(1162, 2, 15, 'B', 'ACTIVO', 50858),
(1163, 2, 16, 'B', 'ACTIVO', 50858),
(1164, 2, 17, 'B', 'ACTIVO', 50858),
(1165, 3, 1, 'C', 'INACTIVO', 50858),
(1166, 3, 2, 'C', 'INACTIVO', 50858),
(1167, 3, 3, 'C', 'ACTIVO', 50858),
(1168, 3, 4, 'C', 'ACTIVO', 50858),
(1169, 3, 5, 'C', 'ACTIVO', 50858),
(1170, 3, 6, 'C', 'ACTIVO', 50858),
(1171, 3, 7, 'C', 'ACTIVO', 50858),
(1172, 3, 8, 'C', 'ACTIVO', 50858),
(1173, 3, 9, 'C', 'ACTIVO', 50858),
(1174, 3, 10, 'C', 'ACTIVO', 50858),
(1175, 3, 11, 'C', 'ACTIVO', 50858),
(1176, 3, 12, 'C', 'ACTIVO', 50858),
(1177, 3, 13, 'C', 'ACTIVO', 50858),
(1178, 3, 14, 'C', 'ACTIVO', 50858),
(1179, 3, 15, 'C', 'ACTIVO', 50858),
(1180, 3, 16, 'C', 'ACTIVO', 50858),
(1181, 3, 17, 'C', 'ACTIVO', 50858),
(1182, 4, 1, 'D', 'INACTIVO', 50858),
(1183, 4, 2, 'D', 'INACTIVO', 50858),
(1184, 4, 3, 'D', 'ACTIVO', 50858),
(1185, 4, 4, 'D', 'ACTIVO', 50858),
(1186, 4, 5, 'D', 'ACTIVO', 50858),
(1187, 4, 6, 'D', 'ACTIVO', 50858),
(1188, 4, 7, 'D', 'ACTIVO', 50858),
(1189, 4, 8, 'D', 'ACTIVO', 50858),
(1190, 4, 9, 'D', 'ACTIVO', 50858),
(1191, 4, 10, 'D', 'ACTIVO', 50858),
(1192, 4, 11, 'D', 'ACTIVO', 50858),
(1193, 4, 12, 'D', 'ACTIVO', 50858),
(1194, 4, 13, 'D', 'ACTIVO', 50858),
(1195, 4, 14, 'D', 'ACTIVO', 50858),
(1196, 4, 15, 'D', 'ACTIVO', 50858),
(1197, 4, 16, 'D', 'ACTIVO', 50858),
(1198, 4, 17, 'D', 'ACTIVO', 50858),
(1199, 5, 1, 'E', 'INACTIVO', 50858),
(1200, 5, 2, 'E', 'INACTIVO', 50858),
(1201, 5, 3, 'E', 'ACTIVO', 50858),
(1202, 5, 4, 'E', 'ACTIVO', 50858),
(1203, 5, 5, 'E', 'ACTIVO', 50858),
(1204, 5, 6, 'E', 'ACTIVO', 50858),
(1205, 5, 7, 'E', 'ACTIVO', 50858),
(1206, 5, 8, 'E', 'ACTIVO', 50858),
(1207, 5, 9, 'E', 'ACTIVO', 50858),
(1208, 5, 10, 'E', 'ACTIVO', 50858),
(1209, 5, 11, 'E', 'ACTIVO', 50858),
(1210, 5, 12, 'E', 'ACTIVO', 50858),
(1211, 5, 13, 'E', 'ACTIVO', 50858),
(1212, 5, 14, 'E', 'ACTIVO', 50858),
(1213, 5, 15, 'E', 'ACTIVO', 50858),
(1214, 5, 16, 'E', 'ACTIVO', 50858),
(1215, 5, 17, 'E', 'ACTIVO', 50858),
(1216, 6, 1, 'F', 'ACTIVO', 50858),
(1217, 6, 2, 'F', 'ACTIVO', 50858),
(1218, 6, 3, 'F', 'ACTIVO', 50858),
(1219, 6, 4, 'F', 'ACTIVO', 50858),
(1220, 6, 5, 'F', 'ACTIVO', 50858),
(1221, 6, 6, 'F', 'ACTIVO', 50858),
(1222, 6, 7, 'F', 'ACTIVO', 50858),
(1223, 6, 8, 'F', 'ACTIVO', 50858),
(1224, 6, 9, 'F', 'ACTIVO', 50858),
(1225, 6, 10, 'F', 'ACTIVO', 50858),
(1226, 6, 11, 'F', 'ACTIVO', 50858),
(1227, 6, 12, 'F', 'ACTIVO', 50858),
(1228, 6, 13, 'F', 'ACTIVO', 50858),
(1229, 6, 14, 'F', 'ACTIVO', 50858),
(1230, 6, 15, 'F', 'ACTIVO', 50858),
(1231, 6, 16, 'F', 'ACTIVO', 50858),
(1232, 6, 17, 'F', 'ACTIVO', 50858),
(1233, 1, 1, 'A', 'INACTIVO', 50859),
(1234, 1, 2, 'A', 'INACTIVO', 50859),
(1235, 1, 3, 'A', 'ACTIVO', 50859),
(1236, 1, 4, 'A', 'ACTIVO', 50859),
(1237, 1, 5, 'A', 'ACTIVO', 50859),
(1238, 1, 6, 'A', 'ACTIVO', 50859),
(1239, 1, 7, 'A', 'ACTIVO', 50859),
(1240, 1, 8, 'A', 'ACTIVO', 50859),
(1241, 1, 9, 'A', 'ACTIVO', 50859),
(1242, 1, 10, 'A', 'ACTIVO', 50859),
(1243, 1, 11, 'A', 'ACTIVO', 50859),
(1244, 1, 12, 'A', 'ACTIVO', 50859),
(1245, 1, 13, 'A', 'ACTIVO', 50859),
(1246, 1, 14, 'A', 'ACTIVO', 50859),
(1247, 1, 15, 'A', 'ACTIVO', 50859),
(1248, 1, 16, 'A', 'ACTIVO', 50859),
(1249, 1, 17, 'A', 'ACTIVO', 50859),
(1250, 1, 18, 'A', 'INACTIVO', 50859),
(1251, 1, 19, 'A', 'INACTIVO', 50859),
(1252, 2, 1, 'B', 'INACTIVO', 50859),
(1253, 2, 2, 'B', 'INACTIVO', 50859),
(1254, 2, 3, 'B', 'ACTIVO', 50859),
(1255, 2, 4, 'B', 'ACTIVO', 50859),
(1256, 2, 5, 'B', 'ACTIVO', 50859),
(1257, 2, 6, 'B', 'ACTIVO', 50859),
(1258, 2, 7, 'B', 'ACTIVO', 50859),
(1259, 2, 8, 'B', 'ACTIVO', 50859),
(1260, 2, 9, 'B', 'ACTIVO', 50859),
(1261, 2, 10, 'B', 'ACTIVO', 50859),
(1262, 2, 11, 'B', 'ACTIVO', 50859),
(1263, 2, 12, 'B', 'ACTIVO', 50859),
(1264, 2, 13, 'B', 'ACTIVO', 50859),
(1265, 2, 14, 'B', 'ACTIVO', 50859),
(1266, 2, 15, 'B', 'ACTIVO', 50859),
(1267, 2, 16, 'B', 'ACTIVO', 50859),
(1268, 2, 17, 'B', 'ACTIVO', 50859),
(1269, 2, 18, 'B', 'INACTIVO', 50859),
(1270, 2, 19, 'B', 'INACTIVO', 50859),
(1271, 3, 1, 'C', 'INACTIVO', 50859),
(1272, 3, 2, 'C', 'INACTIVO', 50859),
(1273, 3, 3, 'C', 'ACTIVO', 50859),
(1274, 3, 4, 'C', 'ACTIVO', 50859),
(1275, 3, 5, 'C', 'ACTIVO', 50859),
(1276, 3, 6, 'C', 'ACTIVO', 50859),
(1277, 3, 7, 'C', 'ACTIVO', 50859),
(1278, 3, 8, 'C', 'ACTIVO', 50859),
(1279, 3, 9, 'C', 'ACTIVO', 50859),
(1280, 3, 10, 'C', 'ACTIVO', 50859),
(1281, 3, 11, 'C', 'ACTIVO', 50859),
(1282, 3, 12, 'C', 'ACTIVO', 50859),
(1283, 3, 13, 'C', 'ACTIVO', 50859),
(1284, 3, 14, 'C', 'ACTIVO', 50859),
(1285, 3, 15, 'C', 'ACTIVO', 50859),
(1286, 3, 16, 'C', 'ACTIVO', 50859),
(1287, 3, 17, 'C', 'ACTIVO', 50859),
(1288, 3, 18, 'C', 'INACTIVO', 50859),
(1289, 3, 19, 'C', 'INACTIVO', 50859),
(1290, 4, 1, 'D', 'INACTIVO', 50859),
(1291, 4, 2, 'D', 'INACTIVO', 50859),
(1292, 4, 3, 'D', 'ACTIVO', 50859),
(1293, 4, 4, 'D', 'ACTIVO', 50859),
(1294, 4, 5, 'D', 'ACTIVO', 50859),
(1295, 4, 6, 'D', 'ACTIVO', 50859),
(1296, 4, 7, 'D', 'ACTIVO', 50859),
(1297, 4, 8, 'D', 'ACTIVO', 50859),
(1298, 4, 9, 'D', 'ACTIVO', 50859),
(1299, 4, 10, 'D', 'ACTIVO', 50859),
(1300, 4, 11, 'D', 'ACTIVO', 50859),
(1301, 4, 12, 'D', 'ACTIVO', 50859),
(1302, 4, 13, 'D', 'ACTIVO', 50859),
(1303, 4, 14, 'D', 'ACTIVO', 50859),
(1304, 4, 15, 'D', 'ACTIVO', 50859),
(1305, 4, 16, 'D', 'ACTIVO', 50859),
(1306, 4, 17, 'D', 'ACTIVO', 50859),
(1307, 4, 18, 'D', 'INACTIVO', 50859),
(1308, 4, 19, 'D', 'INACTIVO', 50859),
(1309, 5, 1, 'E', 'INACTIVO', 50859),
(1310, 5, 2, 'E', 'INACTIVO', 50859),
(1311, 5, 3, 'E', 'ACTIVO', 50859),
(1312, 5, 4, 'E', 'ACTIVO', 50859),
(1313, 5, 5, 'E', 'ACTIVO', 50859),
(1314, 5, 6, 'E', 'ACTIVO', 50859),
(1315, 5, 7, 'E', 'ACTIVO', 50859),
(1316, 5, 8, 'E', 'ACTIVO', 50859),
(1317, 5, 9, 'E', 'ACTIVO', 50859),
(1318, 5, 10, 'E', 'ACTIVO', 50859),
(1319, 5, 11, 'E', 'ACTIVO', 50859),
(1320, 5, 12, 'E', 'ACTIVO', 50859),
(1321, 5, 13, 'E', 'ACTIVO', 50859),
(1322, 5, 14, 'E', 'ACTIVO', 50859),
(1323, 5, 15, 'E', 'ACTIVO', 50859),
(1324, 5, 16, 'E', 'ACTIVO', 50859),
(1325, 5, 17, 'E', 'ACTIVO', 50859),
(1326, 5, 18, 'E', 'INACTIVO', 50859),
(1327, 5, 19, 'E', 'INACTIVO', 50859),
(1328, 6, 1, 'F', 'INACTIVO', 50859),
(1329, 6, 2, 'F', 'INACTIVO', 50859),
(1330, 6, 3, 'F', 'ACTIVO', 50859),
(1331, 6, 4, 'F', 'ACTIVO', 50859),
(1332, 6, 5, 'F', 'ACTIVO', 50859),
(1333, 6, 6, 'F', 'ACTIVO', 50859),
(1334, 6, 7, 'F', 'ACTIVO', 50859),
(1335, 6, 8, 'F', 'ACTIVO', 50859),
(1336, 6, 9, 'F', 'ACTIVO', 50859),
(1337, 6, 10, 'F', 'ACTIVO', 50859),
(1338, 6, 11, 'F', 'ACTIVO', 50859),
(1339, 6, 12, 'F', 'ACTIVO', 50859),
(1340, 6, 13, 'F', 'ACTIVO', 50859),
(1341, 6, 14, 'F', 'ACTIVO', 50859),
(1342, 6, 15, 'F', 'ACTIVO', 50859),
(1343, 6, 16, 'F', 'ACTIVO', 50859),
(1344, 6, 17, 'F', 'ACTIVO', 50859),
(1345, 6, 18, 'F', 'INACTIVO', 50859),
(1346, 6, 19, 'F', 'INACTIVO', 50859),
(1347, 7, 1, 'G', 'ACTIVO', 50859),
(1348, 7, 2, 'G', 'ACTIVO', 50859),
(1349, 7, 3, 'G', 'ACTIVO', 50859),
(1350, 7, 4, 'G', 'ACTIVO', 50859),
(1351, 7, 5, 'G', 'ACTIVO', 50859),
(1352, 7, 6, 'G', 'ACTIVO', 50859),
(1353, 7, 7, 'G', 'ACTIVO', 50859),
(1354, 7, 8, 'G', 'ACTIVO', 50859),
(1355, 7, 9, 'G', 'ACTIVO', 50859),
(1356, 7, 10, 'G', 'ACTIVO', 50859),
(1357, 7, 11, 'G', 'ACTIVO', 50859),
(1358, 7, 12, 'G', 'ACTIVO', 50859),
(1359, 7, 13, 'G', 'ACTIVO', 50859),
(1360, 7, 14, 'G', 'ACTIVO', 50859),
(1361, 7, 15, 'G', 'ACTIVO', 50859),
(1362, 7, 16, 'G', 'ACTIVO', 50859),
(1363, 7, 17, 'G', 'ACTIVO', 50859),
(1364, 7, 18, 'G', 'ACTIVO', 50859),
(1365, 7, 19, 'G', 'ACTIVO', 50859);

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
  `idCupon` int(11) DEFAULT NULL,
  `tipoCompra` varchar(10) NOT NULL,
  `idTarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boleto`
--


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
(22, '0', 'SN', 'SN', '', '0000-00-00', '', '', 'M', NULL),
(3237, '7371317', NULL, 'MAMANI', NULL, NULL, NULL, NULL, NULL, NULL),
(9176, '595249', '', 'CLAROS', NULL, NULL, NULL, NULL, NULL, NULL),
(9177, '5733257', '', 'RODRIGUEZ', '', NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo`
--

CREATE TABLE `combo` (
  `idCombo` int(11) NOT NULL,
  `nombreCombo` varchar(200) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `activo` varchar(10) NOT NULL DEFAULT 'on',
  `precioCosto` decimal(10,2) NOT NULL,
  `utilidad` decimal(10,2) DEFAULT NULL,
  `precioVenta` decimal(10,2) NOT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `fondoColor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `combo`
--

INSERT INTO `combo` (`idCombo`, `nombreCombo`, `descripcion`, `activo`, `precioCosto`, `utilidad`, `precioVenta`, `imagen`, `fondoColor`) VALUES
(1, 'COMBO_1', 'COMBO PEQUE', 'on', '10.00', '7.40', '20.00', 'TIPA4.png', 'yellow'),
(2, 'COMBO_2', '', 'on', '20.00', '6.10', '30.00', 'COMBO5.png', 'yellow'),
(3, 'COMBO_3', '', 'on', '25.00', '5.45', '35.00', 'COMBO5.png', 'yellow'),
(5, 'COMBO_NACHO', '', 'on', '20.00', '1.75', '25.00', 'Nachos.png', 'red');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comboproducto`
--

CREATE TABLE `comboproducto` (
  `idCombo` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comboproducto`
--

INSERT INTO `comboproducto` (`idCombo`, `idProducto`, `cantidad`) VALUES
(1, 2, 1),
(1, 6, 1),
(2, 2, 3),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controlingreso`
--

CREATE TABLE `controlingreso` (
  `idControlIngreso` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detalle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `controlingreso`
--

INSERT INTO `controlingreso` (`idControlIngreso`, `idUsuario`, `fecha`, `detalle`) VALUES
(1, 11, '2019-05-24 12:03:45', 'ingreso al sistema'),
(4, 10, '2019-05-27 09:17:32', 'ingreso al sistema'),
(6, 12, '2019-05-27 09:34:03', 'ingreso al sistema'),
(8, 12, '2019-05-27 09:37:03', 'ingreso al sistema'),
(10, 12, '2019-05-27 09:38:09', 'ingreso al sistema'),
(12, 12, '2019-05-27 10:31:01', 'ingreso al sistema'),
(14, 11, '2019-05-27 10:38:04', 'ingreso al sistema'),
(15, 11, '2019-05-27 10:38:09', 'ingreso al sistema'),
(16, 12, '2019-05-27 10:40:02', 'ingreso al sistema'),
(18, 10, '2019-05-27 10:47:37', 'ingreso al sistema'),
(20, 10, '2019-05-28 09:12:40', 'ingreso al sistema'),
(21, 12, '2019-05-28 11:34:06', 'ingreso al sistema'),
(22, 10, '2019-05-28 11:36:23', 'ingreso al sistema'),
(23, 10, '2019-05-29 09:04:38', 'ingreso al sistema'),
(24, 10, '2019-05-29 09:06:22', 'ingreso al sistema'),
(25, 10, '2019-05-29 09:13:29', 'ingreso al sistema'),
(26, 10, '2019-05-29 09:56:45', 'ingreso al sistema'),
(27, 10, '2019-05-29 10:10:06', 'ingreso al sistema'),
(28, 10, '2019-05-29 10:31:16', 'ingreso al sistema'),
(29, 10, '2019-05-29 10:48:44', 'ingreso al sistema'),
(30, 10, '2019-05-29 14:47:58', 'ingreso al sistema'),
(31, 10, '2019-05-29 14:54:42', 'ingreso al sistema'),
(32, 10, '2019-05-29 16:15:53', 'ingreso al sistema'),
(33, 10, '2019-05-29 18:07:14', 'ingreso al sistema'),
(34, 10, '2019-05-29 18:44:05', 'ingreso al sistema'),
(35, 10, '2019-05-30 08:45:23', 'ingreso al sistema'),
(36, 13, '2019-05-30 08:46:36', 'ingreso al sistema'),
(37, 11, '2019-05-30 08:47:27', 'ingreso al sistema'),
(38, 13, '2019-05-30 08:50:30', 'ingreso al sistema'),
(39, 11, '2019-05-30 08:52:02', 'ingreso al sistema'),
(40, 13, '2019-05-30 08:53:18', 'ingreso al sistema'),
(41, 13, '2019-05-30 08:53:51', 'ingreso al sistema'),
(42, 11, '2019-05-30 09:23:23', 'ingreso al sistema'),
(43, 13, '2019-05-30 09:24:35', 'ingreso al sistema'),
(44, 11, '2019-05-30 09:26:26', 'ingreso al sistema'),
(45, 13, '2019-05-30 09:27:37', 'ingreso al sistema'),
(46, 14, '2019-05-30 09:41:58', 'ingreso al sistema'),
(47, 13, '2019-05-30 09:50:01', 'ingreso al sistema'),
(48, 14, '2019-05-30 09:52:24', 'ingreso al sistema'),
(49, 13, '2019-05-30 09:56:26', 'ingreso al sistema'),
(50, 14, '2019-05-30 09:57:57', 'ingreso al sistema'),
(51, 11, '2019-05-30 10:25:28', 'ingreso al sistema'),
(52, 13, '2019-05-30 10:40:10', 'ingreso al sistema'),
(53, 11, '2019-05-30 10:41:54', 'ingreso al sistema'),
(54, 12, '2019-05-30 10:54:03', 'ingreso al sistema'),
(55, 10, '2019-05-30 10:54:31', 'ingreso al sistema'),
(56, 12, '2019-05-30 10:54:56', 'ingreso al sistema'),
(57, 10, '2019-05-30 10:55:33', 'ingreso al sistema'),
(58, 12, '2019-05-30 10:56:41', 'ingreso al sistema'),
(59, 10, '2019-05-30 10:58:14', 'ingreso al sistema'),
(60, 12, '2019-05-30 11:01:23', 'ingreso al sistema'),
(61, 12, '2019-05-30 11:02:17', 'ingreso al sistema'),
(62, 12, '2019-05-30 11:02:21', 'ingreso al sistema'),
(63, 10, '2019-05-30 11:11:46', 'ingreso al sistema'),
(64, 13, '2019-05-30 11:12:10', 'ingreso al sistema'),
(65, 13, '2019-05-30 11:38:22', 'ingreso al sistema'),
(66, 13, '2019-05-30 11:41:51', 'ingreso al sistema'),
(67, 10, '2019-05-30 12:07:18', 'ingreso al sistema'),
(68, 10, '2019-05-30 12:53:06', 'ingreso al sistema'),
(69, 10, '2019-05-30 12:55:22', 'ingreso al sistema'),
(70, 10, '2019-05-30 15:04:28', 'ingreso al sistema'),
(71, 10, '2019-05-30 15:11:29', 'ingreso al sistema'),
(72, 10, '2019-05-30 15:12:43', 'ingreso al sistema'),
(73, 10, '2019-05-30 15:16:18', 'ingreso al sistema'),
(74, 10, '2019-05-30 15:16:44', 'ingreso al sistema'),
(75, 10, '2019-05-30 15:18:25', 'ingreso al sistema'),
(76, 10, '2019-05-30 15:39:15', 'ingreso al sistema'),
(77, 10, '2019-05-30 16:07:24', 'ingreso al sistema'),
(78, 10, '2019-05-30 18:41:52', 'ingreso al sistema'),
(79, 10, '2019-05-30 19:33:42', 'ingreso al sistema'),
(80, 10, '2019-05-30 21:29:52', 'ingreso al sistema'),
(81, 10, '2019-05-30 22:06:57', 'ingreso al sistema'),
(82, 10, '2019-05-30 23:40:21', 'ingreso al sistema'),
(83, 10, '2019-05-31 02:38:53', 'ingreso al sistema'),
(84, 10, '2019-05-31 02:51:30', 'ingreso al sistema'),
(85, 10, '2019-05-31 05:24:27', 'ingreso al sistema'),
(86, 10, '2019-05-31 05:34:49', 'ingreso al sistema'),
(87, 10, '2019-05-31 09:14:13', 'ingreso al sistema'),
(88, 10, '2019-05-31 16:28:12', 'ingreso al sistema'),
(89, 15, '2019-05-31 16:32:09', 'ingreso al sistema'),
(90, 10, '2019-05-31 16:38:21', 'ingreso al sistema'),
(91, 16, '2019-05-31 16:39:36', 'ingreso al sistema'),
(92, 10, '2019-05-31 16:40:57', 'ingreso al sistema'),
(93, 10, '2019-05-31 16:43:38', 'ingreso al sistema'),
(94, 16, '2019-05-31 16:46:47', 'ingreso al sistema'),
(95, 10, '2019-05-31 16:47:38', 'ingreso al sistema'),
(96, 16, '2019-05-31 16:48:55', 'ingreso al sistema'),
(97, 10, '2019-05-31 16:56:24', 'ingreso al sistema'),
(98, 10, '2019-05-31 16:57:21', 'ingreso al sistema'),
(99, 10, '2019-05-31 17:03:12', 'ingreso al sistema'),
(100, 10, '2019-05-31 17:04:25', 'ingreso al sistema'),
(101, 15, '2019-05-31 17:04:42', 'ingreso al sistema'),
(102, 10, '2019-05-31 17:05:54', 'ingreso al sistema'),
(103, 10, '2019-05-31 17:13:33', 'ingreso al sistema'),
(104, 16, '2019-05-31 17:13:42', 'ingreso al sistema'),
(105, 10, '2019-05-31 17:18:03', 'ingreso al sistema'),
(106, 15, '2019-05-31 17:19:13', 'ingreso al sistema'),
(107, 10, '2019-05-31 17:19:56', 'ingreso al sistema'),
(108, 15, '2019-05-31 17:22:06', 'ingreso al sistema'),
(109, 10, '2019-05-31 17:24:45', 'ingreso al sistema'),
(110, 10, '2019-05-31 17:36:18', 'ingreso al sistema'),
(111, 10, '2019-05-31 17:39:04', 'ingreso al sistema'),
(112, 10, '2019-05-31 18:30:22', 'ingreso al sistema'),
(113, 10, '2019-05-31 18:52:34', 'ingreso al sistema'),
(114, 10, '2019-05-31 18:53:56', 'ingreso al sistema'),
(115, 10, '2019-05-31 20:17:52', 'ingreso al sistema'),
(116, 10, '2019-05-31 21:38:40', 'ingreso al sistema'),
(117, 10, '2019-05-31 21:48:20', 'ingreso al sistema'),
(118, 10, '2019-05-31 23:24:16', 'ingreso al sistema'),
(119, 10, '2019-05-31 23:32:06', 'ingreso al sistema'),
(120, 10, '2019-05-31 23:34:28', 'ingreso al sistema'),
(121, 10, '2019-05-31 23:38:50', 'ingreso al sistema'),
(122, 15, '2019-05-31 23:42:09', 'ingreso al sistema'),
(123, 10, '2019-05-31 23:42:39', 'ingreso al sistema'),
(124, 10, '2019-05-31 23:43:20', 'ingreso al sistema'),
(125, 17, '2019-05-31 23:43:52', 'ingreso al sistema'),
(126, 17, '2019-05-31 23:44:29', 'ingreso al sistema'),
(127, 10, '2019-05-31 23:47:32', 'ingreso al sistema'),
(128, 10, '2019-05-31 23:48:20', 'ingreso al sistema'),
(129, 10, '2019-05-31 23:49:24', 'ingreso al sistema'),
(130, 17, '2019-05-31 23:51:24', 'ingreso al sistema'),
(131, 18, '2019-05-31 23:51:48', 'ingreso al sistema'),
(132, 10, '2019-05-31 23:54:45', 'ingreso al sistema'),
(133, 15, '2019-05-31 23:55:55', 'ingreso al sistema'),
(134, 10, '2019-05-31 23:57:59', 'ingreso al sistema'),
(135, 10, '2019-06-01 00:00:39', 'ingreso al sistema'),
(136, 10, '2019-06-01 00:08:22', 'ingreso al sistema'),
(137, 10, '2019-06-01 00:32:32', 'ingreso al sistema'),
(138, 10, '2019-06-01 01:24:38', 'ingreso al sistema'),
(139, 10, '2019-05-31 20:30:27', 'ingreso al sistema'),
(140, 10, '2019-05-31 21:24:25', 'ingreso al sistema'),
(141, 10, '2019-05-31 21:25:43', 'ingreso al sistema'),
(142, 10, '2019-05-31 21:33:48', 'ingreso al sistema'),
(143, 10, '2019-05-31 22:15:43', 'ingreso al sistema'),
(144, 10, '2019-05-31 22:20:59', 'ingreso al sistema'),
(145, 17, '2019-05-31 22:21:08', 'ingreso al sistema'),
(146, 10, '2019-05-31 22:37:18', 'ingreso al sistema'),
(147, 16, '2019-05-31 23:10:08', 'ingreso al sistema'),
(148, 10, '2019-05-31 23:39:59', 'ingreso al sistema'),
(149, 10, '2019-06-01 08:36:50', 'ingreso al sistema'),
(150, 10, '2019-06-01 08:46:00', 'ingreso al sistema'),
(151, 10, '2019-06-01 09:23:11', 'ingreso al sistema'),
(152, 10, '2019-06-01 09:59:24', 'ingreso al sistema'),
(153, 19, '2019-06-01 10:00:27', 'ingreso al sistema'),
(154, 16, '2019-06-01 10:06:20', 'ingreso al sistema'),
(155, 10, '2019-06-01 10:14:07', 'ingreso al sistema'),
(156, 10, '2019-06-01 10:16:31', 'ingreso al sistema'),
(157, 10, '2019-06-01 10:18:32', 'ingreso al sistema'),
(158, 18, '2019-06-01 10:21:40', 'ingreso al sistema'),
(159, 10, '2019-06-01 10:24:11', 'ingreso al sistema'),
(160, 18, '2019-06-01 10:49:27', 'ingreso al sistema'),
(161, 10, '2019-06-01 10:53:45', 'ingreso al sistema'),
(162, 10, '2019-06-01 10:53:54', 'ingreso al sistema'),
(163, 16, '2019-06-01 10:55:38', 'ingreso al sistema'),
(164, 10, '2019-06-01 10:56:37', 'ingreso al sistema'),
(165, 16, '2019-06-01 10:58:34', 'ingreso al sistema'),
(166, 10, '2019-06-01 11:00:15', 'ingreso al sistema'),
(167, 16, '2019-06-01 11:12:06', 'ingreso al sistema'),
(168, 10, '2019-06-01 11:13:33', 'ingreso al sistema'),
(169, 16, '2019-06-01 12:00:29', 'ingreso al sistema'),
(170, 10, '2019-06-01 12:04:41', 'ingreso al sistema'),
(171, 10, '2019-06-01 12:40:57', 'ingreso al sistema'),
(172, 16, '2019-06-01 14:09:19', 'ingreso al sistema'),
(173, 10, '2019-06-01 15:40:15', 'ingreso al sistema'),
(174, 10, '2019-06-01 15:47:54', 'ingreso al sistema'),
(175, 20, '2019-06-01 15:49:37', 'ingreso al sistema'),
(176, 10, '2019-06-01 15:50:13', 'ingreso al sistema'),
(177, 20, '2019-06-01 15:51:44', 'ingreso al sistema'),
(178, 16, '2019-06-01 16:41:39', 'ingreso al sistema'),
(179, 15, '2019-06-01 16:47:54', 'ingreso al sistema'),
(180, 20, '2019-06-01 16:51:28', 'ingreso al sistema'),
(181, 10, '2019-06-01 16:52:23', 'ingreso al sistema'),
(182, 10, '2019-06-01 16:53:27', 'ingreso al sistema'),
(183, 10, '2019-06-01 16:55:10', 'ingreso al sistema'),
(184, 21, '2019-06-01 16:56:37', 'ingreso al sistema'),
(185, 17, '2019-06-01 17:01:10', 'ingreso al sistema'),
(186, 10, '2019-06-01 17:01:12', 'ingreso al sistema'),
(187, 16, '2019-06-01 17:04:01', 'ingreso al sistema'),
(188, 17, '2019-06-01 17:08:46', 'ingreso al sistema'),
(189, 10, '2019-06-01 17:12:55', 'ingreso al sistema'),
(190, 16, '2019-06-01 17:16:10', 'ingreso al sistema'),
(191, 17, '2019-06-01 17:24:13', 'ingreso al sistema'),
(192, 10, '2019-06-01 17:33:55', 'ingreso al sistema'),
(193, 16, '2019-06-01 17:35:52', 'ingreso al sistema'),
(194, 20, '2019-06-01 17:36:03', 'ingreso al sistema'),
(195, 21, '2019-06-01 17:38:02', 'ingreso al sistema'),
(196, 16, '2019-06-01 17:45:37', 'ingreso al sistema'),
(197, 16, '2019-06-01 17:47:32', 'ingreso al sistema'),
(198, 10, '2019-06-01 17:56:58', 'ingreso al sistema'),
(199, 16, '2019-06-01 18:00:50', 'ingreso al sistema'),
(200, 16, '2019-06-01 18:05:52', 'ingreso al sistema'),
(201, 10, '2019-06-01 18:07:16', 'ingreso al sistema'),
(202, 16, '2019-06-01 18:10:21', 'ingreso al sistema'),
(203, 10, '2019-06-01 18:11:26', 'ingreso al sistema'),
(204, 10, '2019-06-01 18:13:49', 'ingreso al sistema'),
(205, 21, '2019-06-01 18:14:27', 'ingreso al sistema'),
(206, 10, '2019-06-01 18:18:53', 'ingreso al sistema'),
(207, 22, '2019-06-01 18:20:07', 'ingreso al sistema'),
(208, 16, '2019-06-01 18:22:44', 'ingreso al sistema'),
(209, 22, '2019-06-01 18:23:45', 'ingreso al sistema'),
(210, 10, '2019-06-01 19:06:20', 'ingreso al sistema'),
(211, 21, '2019-06-01 19:10:08', 'ingreso al sistema'),
(212, 10, '2019-06-01 19:13:25', 'ingreso al sistema'),
(213, 21, '2019-06-01 19:30:56', 'ingreso al sistema'),
(214, 22, '2019-06-01 19:54:10', 'ingreso al sistema'),
(215, 16, '2019-06-01 19:57:43', 'ingreso al sistema'),
(216, 22, '2019-06-01 19:58:27', 'ingreso al sistema'),
(217, 22, '2019-06-01 20:42:56', 'ingreso al sistema'),
(218, 10, '2019-06-01 21:14:43', 'ingreso al sistema'),
(219, 10, '2019-06-01 21:17:39', 'ingreso al sistema'),
(220, 10, '2019-06-01 21:18:28', 'ingreso al sistema'),
(221, 10, '2019-06-01 21:20:10', 'ingreso al sistema'),
(222, 21, '2019-06-01 22:27:56', 'ingreso al sistema'),
(223, 16, '2019-06-01 22:43:50', 'ingreso al sistema'),
(224, 21, '2019-06-01 23:06:17', 'ingreso al sistema'),
(225, 21, '2019-06-01 23:10:39', 'ingreso al sistema'),
(226, 22, '2019-06-01 23:15:16', 'ingreso al sistema'),
(227, 16, '2019-06-02 10:13:21', 'ingreso al sistema'),
(228, 19, '2019-06-02 10:20:44', 'ingreso al sistema'),
(229, 19, '2019-06-02 10:25:40', 'ingreso al sistema'),
(230, 21, '2019-06-02 10:27:20', 'ingreso al sistema'),
(231, 16, '2019-06-02 10:35:15', 'ingreso al sistema'),
(232, 21, '2019-06-02 10:41:50', 'ingreso al sistema'),
(233, 16, '2019-06-02 10:43:52', 'ingreso al sistema'),
(234, 18, '2019-06-02 10:44:02', 'ingreso al sistema'),
(235, 21, '2019-06-02 10:48:44', 'ingreso al sistema'),
(236, 16, '2019-06-02 10:49:30', 'ingreso al sistema'),
(237, 16, '2019-06-02 10:50:48', 'ingreso al sistema'),
(238, 16, '2019-06-02 10:54:07', 'ingreso al sistema'),
(239, 16, '2019-06-02 10:55:57', 'ingreso al sistema'),
(240, 18, '2019-06-02 10:56:06', 'ingreso al sistema'),
(241, 16, '2019-06-02 10:58:52', 'ingreso al sistema'),
(242, 16, '2019-06-02 11:16:59', 'ingreso al sistema'),
(243, 18, '2019-06-02 11:40:47', 'ingreso al sistema'),
(244, 16, '2019-06-02 11:41:06', 'ingreso al sistema'),
(245, 21, '2019-06-02 12:12:20', 'ingreso al sistema'),
(246, 16, '2019-06-02 12:24:27', 'ingreso al sistema'),
(247, 18, '2019-06-02 13:04:45', 'ingreso al sistema'),
(248, 19, '2019-06-02 13:45:37', 'ingreso al sistema'),
(249, 21, '2019-06-02 14:05:01', 'ingreso al sistema'),
(250, 10, '2019-06-02 15:28:29', 'ingreso al sistema'),
(251, 10, '2019-06-02 15:47:06', 'ingreso al sistema'),
(252, 10, '2019-06-02 15:53:26', 'ingreso al sistema'),
(253, 10, '2019-06-02 16:00:46', 'ingreso al sistema'),
(254, 16, '2019-06-02 16:36:11', 'ingreso al sistema'),
(255, 17, '2019-06-02 16:49:01', 'ingreso al sistema'),
(256, 15, '2019-06-02 16:57:48', 'ingreso al sistema'),
(257, 19, '2019-06-02 17:03:43', 'ingreso al sistema'),
(258, 21, '2019-06-02 17:13:16', 'ingreso al sistema'),
(259, 16, '2019-06-02 17:19:53', 'ingreso al sistema'),
(260, 18, '2019-06-02 17:20:54', 'ingreso al sistema'),
(261, 21, '2019-06-02 17:21:38', 'ingreso al sistema'),
(262, 21, '2019-06-02 17:32:20', 'ingreso al sistema'),
(263, 21, '2019-06-02 17:49:36', 'ingreso al sistema'),
(264, 15, '2019-06-02 18:05:10', 'ingreso al sistema'),
(265, 21, '2019-06-02 18:12:59', 'ingreso al sistema'),
(266, 16, '2019-06-02 18:17:32', 'ingreso al sistema'),
(267, 10, '2019-06-02 19:35:58', 'ingreso al sistema'),
(268, 16, '2019-06-02 19:37:34', 'ingreso al sistema'),
(269, 21, '2019-06-02 19:42:22', 'ingreso al sistema'),
(270, 21, '2019-06-02 19:44:55', 'ingreso al sistema'),
(271, 16, '2019-06-02 21:01:20', 'ingreso al sistema'),
(272, 21, '2019-06-02 21:03:29', 'ingreso al sistema'),
(273, 10, '2019-06-02 21:50:47', 'ingreso al sistema'),
(274, 16, '2019-06-02 21:51:28', 'ingreso al sistema'),
(275, 21, '2019-06-02 22:44:30', 'ingreso al sistema'),
(276, 16, '2019-06-02 22:46:28', 'ingreso al sistema'),
(277, 21, '2019-06-02 22:50:57', 'ingreso al sistema'),
(278, 21, '2019-06-02 22:54:23', 'ingreso al sistema'),
(279, 21, '2019-06-02 23:04:41', 'ingreso al sistema'),
(280, 21, '2019-06-02 23:08:47', 'ingreso al sistema'),
(281, 16, '2019-06-02 23:30:59', 'ingreso al sistema'),
(282, 16, '2019-06-03 00:10:28', 'ingreso al sistema'),
(283, 21, '2019-06-03 00:15:01', 'ingreso al sistema'),
(284, 21, '2019-06-03 00:54:01', 'ingreso al sistema'),
(285, 16, '2019-06-03 00:54:03', 'ingreso al sistema'),
(286, 21, '2019-06-03 01:58:14', 'ingreso al sistema'),
(287, 21, '2019-06-03 09:07:25', 'ingreso al sistema'),
(288, 19, '2019-06-03 10:08:01', 'ingreso al sistema'),
(289, 18, '2019-06-03 10:13:15', 'ingreso al sistema'),
(290, 10, '2019-06-03 10:19:42', 'ingreso al sistema'),
(291, 16, '2019-06-03 10:19:57', 'ingreso al sistema'),
(292, 21, '2019-06-03 10:38:02', 'ingreso al sistema'),
(293, 10, '2019-06-03 10:38:06', 'ingreso al sistema'),
(294, 10, '2019-06-03 10:54:18', 'ingreso al sistema'),
(295, 10, '2019-06-03 11:45:55', 'ingreso al sistema'),
(296, 10, '2019-06-03 14:48:44', 'ingreso al sistema'),
(297, 10, '2019-06-03 15:25:18', 'ingreso al sistema'),
(298, 10, '2019-06-03 16:20:02', 'ingreso al sistema'),
(299, 10, '2019-06-03 16:50:40', 'ingreso al sistema'),
(300, 10, '2019-06-03 16:55:50', 'ingreso al sistema'),
(301, 10, '2019-06-03 17:10:51', 'ingreso al sistema'),
(302, 10, '2019-06-03 17:15:32', 'ingreso al sistema'),
(303, 10, '2019-06-03 17:30:14', 'ingreso al sistema'),
(304, 21, '2019-06-03 18:12:17', 'ingreso al sistema'),
(305, 21, '2019-06-03 18:13:53', 'ingreso al sistema'),
(306, 21, '2019-06-03 18:29:43', 'ingreso al sistema'),
(307, 16, '2019-06-03 21:11:58', 'ingreso al sistema'),
(308, 21, '2019-06-03 22:15:16', 'ingreso al sistema'),
(309, 21, '2019-06-03 22:30:36', 'ingreso al sistema'),
(310, 21, '2019-06-03 22:55:37', 'ingreso al sistema'),
(311, 16, '2019-06-03 23:10:49', 'ingreso al sistema'),
(312, 21, '2019-06-03 23:12:24', 'ingreso al sistema'),
(313, 21, '2019-06-03 23:22:11', 'ingreso al sistema'),
(314, 21, '2019-06-03 23:42:49', 'ingreso al sistema'),
(315, 21, '2019-06-03 23:48:51', 'ingreso al sistema'),
(316, 21, '2019-06-03 23:57:42', 'ingreso al sistema'),
(317, 16, '2019-06-04 00:36:15', 'ingreso al sistema'),
(318, 16, '2019-06-04 14:16:54', 'ingreso al sistema'),
(319, 17, '2019-06-04 14:22:08', 'ingreso al sistema'),
(320, 15, '2019-06-04 14:22:53', 'ingreso al sistema'),
(321, 10, '2019-06-04 14:46:12', 'ingreso al sistema'),
(322, 16, '2019-06-04 15:53:03', 'ingreso al sistema'),
(323, 15, '2019-06-04 16:04:52', 'ingreso al sistema'),
(324, 16, '2019-06-04 16:05:49', 'ingreso al sistema'),
(325, 15, '2019-06-04 16:07:27', 'ingreso al sistema'),
(326, 21, '2019-06-04 18:03:18', 'ingreso al sistema'),
(327, 21, '2019-06-04 18:06:42', 'ingreso al sistema'),
(328, 16, '2019-06-04 18:08:37', 'ingreso al sistema'),
(329, 21, '2019-06-04 18:17:53', 'ingreso al sistema'),
(330, 15, '2019-06-04 18:57:28', 'ingreso al sistema'),
(331, 15, '2019-06-04 20:53:57', 'ingreso al sistema'),
(332, 15, '2019-06-04 21:17:54', 'ingreso al sistema'),
(333, 15, '2019-06-04 21:20:40', 'ingreso al sistema'),
(334, 21, '2019-06-04 21:31:36', 'ingreso al sistema'),
(335, 16, '2019-06-04 22:24:21', 'ingreso al sistema'),
(336, 21, '2019-06-04 22:28:09', 'ingreso al sistema'),
(337, 21, '2019-06-04 22:43:35', 'ingreso al sistema'),
(338, 16, '2019-06-04 23:51:13', 'ingreso al sistema'),
(339, 21, '2019-06-04 23:58:18', 'ingreso al sistema'),
(340, 16, '2019-06-05 08:37:49', 'ingreso al sistema'),
(341, 10, '2019-06-05 08:48:52', 'ingreso al sistema'),
(342, 19, '2019-06-05 09:13:55', 'ingreso al sistema'),
(343, 16, '2019-06-05 09:23:33', 'ingreso al sistema'),
(344, 20, '2019-06-05 09:44:40', 'ingreso al sistema'),
(345, 18, '2019-06-05 10:22:10', 'ingreso al sistema'),
(346, 22, '2019-06-05 10:29:24', 'ingreso al sistema'),
(347, 10, '2019-06-05 10:35:14', 'ingreso al sistema'),
(348, 18, '2019-06-05 10:36:53', 'ingreso al sistema'),
(349, 20, '2019-06-05 10:41:48', 'ingreso al sistema'),
(350, 20, '2019-06-05 10:46:16', 'ingreso al sistema'),
(351, 18, '2019-06-05 10:52:17', 'ingreso al sistema'),
(352, 19, '2019-06-05 11:26:49', 'ingreso al sistema'),
(353, 16, '2019-06-05 11:30:11', 'ingreso al sistema'),
(354, 16, '2019-06-05 11:36:20', 'ingreso al sistema'),
(355, 22, '2019-06-05 11:37:15', 'ingreso al sistema'),
(356, 10, '2019-06-05 11:38:41', 'ingreso al sistema'),
(357, 10, '2019-06-05 11:51:01', 'ingreso al sistema'),
(358, 22, '2019-06-05 11:52:20', 'ingreso al sistema'),
(359, 16, '2019-06-05 11:56:39', 'ingreso al sistema'),
(360, 22, '2019-06-05 11:57:44', 'ingreso al sistema'),
(361, 16, '2019-06-05 12:07:09', 'ingreso al sistema'),
(362, 22, '2019-06-05 12:07:54', 'ingreso al sistema'),
(363, 10, '2019-06-05 12:18:02', 'ingreso al sistema'),
(364, 22, '2019-06-05 12:20:47', 'ingreso al sistema'),
(365, 10, '2019-06-05 12:28:10', 'ingreso al sistema'),
(366, 10, '2019-06-05 12:53:13', 'ingreso al sistema'),
(367, 10, '2019-06-05 12:56:47', 'ingreso al sistema'),
(368, 10, '2019-06-05 12:59:52', 'ingreso al sistema'),
(369, 11, '2019-06-05 13:04:31', 'ingreso al sistema'),
(370, 10, '2019-06-05 13:04:55', 'ingreso al sistema'),
(371, 11, '2019-06-05 13:05:46', 'ingreso al sistema'),
(372, 10, '2019-06-05 13:15:07', 'ingreso al sistema'),
(373, 10, '2019-06-05 14:04:57', 'ingreso al sistema'),
(374, 10, '2019-06-05 14:28:29', 'ingreso al sistema'),
(375, 22, '2019-06-05 14:44:37', 'ingreso al sistema'),
(376, 10, '2019-06-05 15:03:51', 'ingreso al sistema'),
(377, 16, '2019-06-05 16:04:03', 'ingreso al sistema'),
(378, 15, '2019-06-05 16:23:27', 'ingreso al sistema'),
(379, 15, '2019-06-05 16:45:47', 'ingreso al sistema'),
(380, 17, '2019-06-05 17:02:20', 'ingreso al sistema'),
(381, 20, '2019-06-05 17:06:03', 'ingreso al sistema'),
(382, 21, '2019-06-05 17:18:44', 'ingreso al sistema'),
(383, 16, '2019-06-05 17:22:50', 'ingreso al sistema'),
(384, 16, '2019-06-05 17:43:06', 'ingreso al sistema'),
(385, 21, '2019-06-05 18:05:13', 'ingreso al sistema'),
(386, 20, '2019-06-05 18:14:35', 'ingreso al sistema'),
(387, 21, '2019-06-05 18:17:13', 'ingreso al sistema'),
(388, 17, '2019-06-05 18:22:12', 'ingreso al sistema'),
(389, 21, '2019-06-05 18:37:56', 'ingreso al sistema'),
(390, 16, '2019-06-05 18:42:39', 'ingreso al sistema'),
(391, 21, '2019-06-05 19:23:01', 'ingreso al sistema'),
(392, 10, '2019-06-05 19:50:21', 'ingreso al sistema'),
(393, 16, '2019-06-05 20:38:22', 'ingreso al sistema'),
(394, 21, '2019-06-05 20:45:56', 'ingreso al sistema'),
(395, 21, '2019-06-05 23:44:01', 'ingreso al sistema'),
(396, 16, '2019-06-06 00:06:08', 'ingreso al sistema'),
(397, 21, '2019-06-06 00:09:40', 'ingreso al sistema'),
(398, 21, '2019-06-06 00:22:00', 'ingreso al sistema'),
(399, 21, '2019-06-06 00:37:05', 'ingreso al sistema'),
(400, 16, '2019-06-06 02:09:58', 'ingreso al sistema'),
(401, 21, '2019-06-06 02:39:15', 'ingreso al sistema'),
(402, 21, '2019-06-06 02:45:47', 'ingreso al sistema'),
(403, 16, '2019-06-06 08:31:51', 'ingreso al sistema'),
(404, 10, '2019-06-06 08:38:00', 'ingreso al sistema'),
(405, 16, '2019-06-06 08:50:31', 'ingreso al sistema'),
(406, 20, '2019-06-06 10:21:00', 'ingreso al sistema'),
(407, 19, '2019-06-06 10:26:39', 'ingreso al sistema'),
(408, 18, '2019-06-06 11:10:37', 'ingreso al sistema'),
(409, 10, '2019-06-06 14:52:49', 'ingreso al sistema'),
(410, 20, '2019-06-06 15:06:25', 'ingreso al sistema'),
(411, 10, '2019-06-06 15:46:22', 'ingreso al sistema'),
(412, 10, '2019-06-06 16:36:28', 'ingreso al sistema'),
(413, 17, '2019-06-06 16:46:01', 'ingreso al sistema'),
(414, 19, '2019-06-06 17:03:58', 'ingreso al sistema'),
(415, 21, '2019-06-06 17:04:01', 'ingreso al sistema'),
(416, 17, '2019-06-06 17:04:17', 'ingreso al sistema'),
(417, 20, '2019-06-06 17:05:34', 'ingreso al sistema'),
(418, 15, '2019-06-06 17:06:37', 'ingreso al sistema'),
(419, 17, '2019-06-06 17:07:52', 'ingreso al sistema'),
(420, 10, '2019-06-06 17:10:19', 'ingreso al sistema'),
(421, 21, '2019-06-06 17:13:31', 'ingreso al sistema'),
(422, 15, '2019-06-06 17:45:26', 'ingreso al sistema'),
(423, 10, '2019-06-06 17:46:04', 'ingreso al sistema'),
(424, 21, '2019-06-06 18:14:42', 'ingreso al sistema'),
(425, 16, '2019-06-06 18:35:49', 'ingreso al sistema'),
(426, 16, '2019-06-06 18:37:33', 'ingreso al sistema'),
(427, 17, '2019-06-06 18:38:36', 'ingreso al sistema'),
(428, 15, '2019-06-06 19:29:22', 'ingreso al sistema'),
(429, 21, '2019-06-06 22:17:42', 'ingreso al sistema'),
(430, 21, '2019-06-06 22:19:20', 'ingreso al sistema'),
(431, 15, '2019-06-06 22:25:52', 'ingreso al sistema'),
(432, 21, '2019-06-06 22:28:04', 'ingreso al sistema'),
(433, 16, '2019-06-06 22:38:30', 'ingreso al sistema'),
(434, 21, '2019-06-06 22:42:22', 'ingreso al sistema'),
(435, 15, '2019-06-06 22:44:19', 'ingreso al sistema'),
(436, 21, '2019-06-06 22:45:08', 'ingreso al sistema'),
(437, 21, '2019-06-06 23:26:07', 'ingreso al sistema'),
(438, 15, '2019-06-06 23:48:52', 'ingreso al sistema'),
(439, 21, '2019-06-07 00:05:04', 'ingreso al sistema'),
(440, 21, '2019-06-07 00:40:36', 'ingreso al sistema'),
(441, 16, '2019-06-07 02:03:10', 'ingreso al sistema'),
(442, 16, '2019-06-07 08:27:25', 'ingreso al sistema'),
(443, 10, '2019-06-07 08:58:19', 'ingreso al sistema'),
(444, 19, '2019-06-07 09:48:35', 'ingreso al sistema'),
(445, 16, '2019-06-07 09:53:58', 'ingreso al sistema'),
(446, 10, '2019-06-07 10:06:54', 'ingreso al sistema'),
(447, 18, '2019-06-07 10:13:20', 'ingreso al sistema'),
(448, 10, '2019-06-07 14:41:15', 'ingreso al sistema'),
(449, 10, '2019-06-07 15:28:25', 'ingreso al sistema'),
(450, 16, '2019-06-07 16:20:51', 'ingreso al sistema'),
(451, 15, '2019-06-07 17:02:11', 'ingreso al sistema');

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
(1, '2019-06-01 17:35:25', '2019-10-31 00:00:00', 10, 'tarjeta VIP MP001', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalle` int(11) NOT NULL,
  `idVentaCandy` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idCombo` int(11) DEFAULT NULL,
  `esCombo` varchar(10) NOT NULL DEFAULT 'NO',
  `cantidad` int(11) NOT NULL,
  `pUnitario` decimal(10,2) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombreP` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `idDevolucion` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaReg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `motivo` varchar(200) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `devolucion`
--

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
(7, 'WARNER BROS-MEDIA WORLD', 'UNITEL SANTA CRUZ', 'SANTA CRUZ BOLIVIA', '295756020', '3565909', 'rolando.bottler@rola.la', 'ROLANDO BOTTLER'),
(8, 'WALT DISNEY - MEDIA WORLD', 'UNITEL SANTACRUZ', 'SANTA CRUZ', '0', '', '', ''),
(9, 'COLUMBIA - MANFER FILMS', 'SANTA CRUZ', 'SA', '0', '', '', ''),
(10, '20TH CENTURY FOX - MANFER FILMS', 'SANTA CRUZ', 'SANTA CRUZ', '0', '', '', ''),
(11, 'MANFER/IDC - MANFER FILMS', 'SANTA CRUZ', 'SANTA CRUZ', '0', '', '', ''),
(12, 'DIAMOND FILMS', 'SANTA CRUZ', 'SANTA CRUZ', '0', '', '', ''),
(13, 'BF DISTRIBUTION', 'SANTA CRUZ', 'SANTA CRUZ', '0', '', '', ''),
(14, 'PARAMOUNT - ANDES FILM', 'SANTA CRUZ', 'SANTA CRUZ', ' 0', '', '', ''),
(15, 'UNIVERSAL - ANDES FILM', 'SANTA CRUZ', 'SANTA CRUZ', '0', '', '', ''),
(16, 'ANDES FILMS - ANDES FILM', 'SANTA CRUZ', 'SANTA CRUZ', '0', '', '', ''),
(17, 'DISTRIFILMS', 'SANTA CRUZ', 'SANTA CRUZ', '0', '', '', '');

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
(6, 400001984457, 332401900008210, 1, '38@#I#(Z95qd-@=2ja2JLFUUN)G6GBWCZE#-SVEDHgtQBh@qV_UHPqXSEvnCZJBB', '2019-04-02', '2019-09-26', 'Ley N° 453: Tienes derecho a un trato equitativo sin discriminacion en la oferta de servicios.', 1, 13663, 'BOLETERIA'),
(8, 400001987959, 269401900145618, 1, '5J33rUwCgMeMsNZwxrxr*c78%[LS2rjbuBN@n{sneR@9kM[@2)\\SF7@GE23VNTQ3', '2019-05-27', '2019-09-29', 'Ley N° 453: Tienes derecho a un trato equitativo sin discriminacion en la oferta de servicios.', 1, 13110, 'CANDY');

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
-- Estructura de tabla para la tabla `envase`
--

CREATE TABLE `envase` (
  `idEnvase` int(11) NOT NULL,
  `nombreEnv` varchar(200) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `precioCosto` decimal(10,2) DEFAULT NULL,
  `activo` varchar(5) NOT NULL,
  `stockActual` int(11) NOT NULL,
  `stockRec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `fechaAlta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`idFuncion`, `fecha`, `horaInicio`, `horaFin`, `subtitulada`, `numerada`, `idUsuario`, `idPelicula`, `idSala`, `nroFuncion`, `activa`, `fechaAlta`) VALUES
(145, '2019-05-30', '10:30:00', '12:40:00', 'on', 'on', 10, 29, 50856, 1, 'ACTIVADO', '2019-05-30 23:22:27'),
(146, '2019-05-31', '10:30:00', '12:40:00', 'on', 'on', 10, 29, 50856, 1, 'ACTIVADO', '2019-05-30 23:22:27'),
(147, '2019-06-01', '10:30:00', '12:40:00', 'on', 'on', 10, 29, 50856, 1, 'ACTIVADO', '2019-05-30 23:22:27'),
(148, '2019-06-02', '10:30:00', '12:40:00', 'on', 'on', 10, 29, 50856, 1, 'ACTIVADO', '2019-05-30 23:22:27'),
(149, '2019-06-03', '10:30:00', '12:40:00', 'on', 'on', 10, 29, 50856, 1, 'ACTIVADO', '2019-05-30 23:22:27'),
(150, '2019-06-04', '10:30:00', '12:40:00', 'on', 'on', 10, 29, 50856, 1, 'ACTIVADO', '2019-05-30 23:22:27'),
(151, '2019-06-05', '10:30:00', '12:40:00', 'on', 'on', 16, 29, 50856, 1, 'ACTIVADO', '2019-05-30 23:22:27'),
(152, '2019-05-30', '10:45:00', '12:24:00', 'on', 'on', 10, 35, 50852, 1, 'ACTIVADO', '2019-05-30 23:23:34'),
(153, '2019-05-31', '10:45:00', '12:24:00', 'on', 'on', 10, 35, 50852, 1, 'ACTIVADO', '2019-05-30 23:23:34'),
(154, '2019-06-01', '10:45:00', '12:24:00', 'on', 'on', 10, 35, 50852, 1, 'ACTIVADO', '2019-05-30 23:23:34'),
(155, '2019-06-02', '10:45:00', '12:24:00', 'on', 'on', 10, 35, 50852, 1, 'ACTIVADO', '2019-05-30 23:23:34'),
(156, '2019-06-03', '10:45:00', '12:24:00', 'on', 'on', 10, 35, 50852, 1, 'ACTIVADO', '2019-05-30 23:23:34'),
(157, '2019-06-04', '10:45:00', '12:24:00', 'on', 'on', 10, 35, 50852, 1, 'ACTIVADO', '2019-05-30 23:23:35'),
(158, '2019-06-05', '10:45:00', '12:24:00', 'on', 'on', 16, 35, 50852, 1, 'ACTIVADO', '2019-05-30 23:23:35'),
(159, '2019-05-30', '11:00:00', '12:44:00', 'on', 'on', 10, 31, 50850, 1, 'ACTIVADO', '2019-05-30 23:24:16'),
(160, '2019-05-31', '11:00:00', '12:44:00', 'on', 'on', 10, 31, 50850, 1, 'ACTIVADO', '2019-05-30 23:24:16'),
(161, '2019-06-01', '11:00:00', '12:44:00', 'on', 'on', 10, 31, 50850, 1, 'ACTIVADO', '2019-05-30 23:24:16'),
(162, '2019-06-02', '11:00:00', '12:44:00', 'on', 'on', 10, 31, 50850, 1, 'ACTIVADO', '2019-05-30 23:24:16'),
(163, '2019-06-03', '11:00:00', '12:44:00', 'on', 'on', 10, 31, 50850, 1, 'ACTIVADO', '2019-05-30 23:24:16'),
(164, '2019-06-04', '11:00:00', '12:44:00', 'on', 'on', 10, 31, 50850, 1, 'ACTIVADO', '2019-05-30 23:24:16'),
(165, '2019-06-05', '11:00:00', '12:44:00', 'on', 'on', 16, 31, 50850, 1, 'ACTIVADO', '2019-05-30 23:24:16'),
(166, '2019-05-30', '12:30:00', '14:18:00', 'on', 'on', 10, 34, 50852, 2, 'ACTIVADO', '2019-05-30 23:24:47'),
(167, '2019-05-31', '12:30:00', '14:18:00', 'on', 'on', 10, 34, 50852, 2, 'ACTIVADO', '2019-05-30 23:24:47'),
(168, '2019-06-01', '12:30:00', '14:18:00', 'on', 'on', 10, 34, 50852, 2, 'ACTIVADO', '2019-05-30 23:24:47'),
(169, '2019-06-02', '12:30:00', '14:18:00', 'on', 'on', 10, 34, 50852, 2, 'ACTIVADO', '2019-05-30 23:24:47'),
(170, '2019-06-03', '12:30:00', '14:18:00', 'on', 'on', 10, 34, 50852, 2, 'ACTIVADO', '2019-05-30 23:24:48'),
(171, '2019-06-04', '12:30:00', '14:18:00', 'on', 'on', 10, 34, 50852, 2, 'ACTIVADO', '2019-05-30 23:24:48'),
(172, '2019-06-05', '12:30:00', '14:18:00', 'on', 'on', 16, 34, 50852, 2, 'ACTIVADO', '2019-05-30 23:24:48'),
(173, '2019-05-30', '12:50:00', '14:34:00', 'on', 'on', 10, 32, 50856, 2, 'ACTIVADO', '2019-05-30 23:25:17'),
(174, '2019-05-31', '12:50:00', '14:34:00', 'on', 'on', 10, 32, 50856, 2, 'ACTIVADO', '2019-05-30 23:25:17'),
(175, '2019-06-01', '12:50:00', '14:34:00', 'on', 'on', 10, 32, 50856, 2, 'ACTIVADO', '2019-05-30 23:25:17'),
(176, '2019-06-02', '12:50:00', '14:34:00', 'on', 'on', 10, 32, 50856, 2, 'ACTIVADO', '2019-05-30 23:25:17'),
(177, '2019-06-03', '12:50:00', '14:34:00', 'on', 'on', 10, 32, 50856, 2, 'ACTIVADO', '2019-05-30 23:25:17'),
(178, '2019-06-04', '12:50:00', '14:34:00', 'on', 'on', 10, 32, 50856, 2, 'ACTIVADO', '2019-05-30 23:25:17'),
(179, '2019-06-05', '12:50:00', '14:34:00', 'on', 'on', 16, 32, 50856, 2, 'ACTIVADO', '2019-05-30 23:25:17'),
(180, '2019-05-30', '13:00:00', '15:15:00', 'on', 'on', 10, 33, 50850, 2, 'ACTIVADO', '2019-05-30 23:25:46'),
(181, '2019-05-31', '13:00:00', '15:15:00', 'on', 'on', 10, 33, 50850, 2, 'ACTIVADO', '2019-05-30 23:25:46'),
(182, '2019-06-01', '13:00:00', '15:15:00', 'on', 'on', 10, 33, 50850, 2, 'ACTIVADO', '2019-05-30 23:25:46'),
(183, '2019-06-02', '13:00:00', '15:15:00', 'on', 'on', 10, 33, 50850, 2, 'ACTIVADO', '2019-05-30 23:25:46'),
(184, '2019-06-03', '13:00:00', '15:15:00', 'on', 'on', 10, 33, 50850, 2, 'ACTIVADO', '2019-05-30 23:25:46'),
(185, '2019-06-04', '13:00:00', '15:15:00', 'on', 'on', 10, 33, 50850, 2, 'ACTIVADO', '2019-05-30 23:25:46'),
(186, '2019-06-05', '13:00:00', '15:15:00', 'on', 'on', 10, 33, 50850, 2, 'ACTIVADO', '2019-05-30 23:25:46'),
(187, '2019-05-30', '14:30:00', '16:40:00', 'on', 'on', 10, 28, 50852, 3, 'ACTIVADO', '2019-05-30 23:26:23'),
(188, '2019-05-31', '14:30:00', '16:40:00', 'on', 'on', 10, 28, 50852, 3, 'ACTIVADO', '2019-05-30 23:26:23'),
(189, '2019-06-01', '14:30:00', '16:40:00', 'on', 'on', 10, 28, 50852, 3, 'ACTIVADO', '2019-05-30 23:26:23'),
(190, '2019-06-02', '14:30:00', '16:40:00', 'on', 'on', 10, 28, 50852, 3, 'ACTIVADO', '2019-05-30 23:26:23'),
(191, '2019-06-03', '14:30:00', '16:40:00', 'on', 'on', 10, 28, 50852, 3, 'ACTIVADO', '2019-05-30 23:26:23'),
(192, '2019-06-04', '14:30:00', '16:40:00', 'on', 'on', 10, 28, 50852, 3, 'ACTIVADO', '2019-05-30 23:26:23'),
(193, '2019-06-05', '14:30:00', '16:40:00', 'on', 'on', 16, 28, 50852, 3, 'ACTIVADO', '2019-05-30 23:26:23'),
(194, '2019-05-30', '15:00:00', '16:48:00', 'on', 'on', 10, 34, 50856, 3, 'ACTIVADO', '2019-05-30 23:27:01'),
(195, '2019-05-31', '15:00:00', '16:48:00', 'on', 'on', 10, 34, 50856, 3, 'ACTIVADO', '2019-05-30 23:27:01'),
(196, '2019-06-01', '15:00:00', '16:48:00', 'on', 'on', 10, 34, 50856, 3, 'ACTIVADO', '2019-05-30 23:27:01'),
(197, '2019-06-02', '15:00:00', '16:48:00', 'on', 'on', 10, 34, 50856, 3, 'ACTIVADO', '2019-05-30 23:27:01'),
(198, '2019-06-03', '15:00:00', '16:48:00', 'on', 'on', 10, 34, 50856, 3, 'ACTIVADO', '2019-05-30 23:27:01'),
(199, '2019-06-04', '15:00:00', '16:48:00', 'on', 'on', 10, 34, 50856, 3, 'ACTIVADO', '2019-05-30 23:27:02'),
(200, '2019-06-05', '15:00:00', '16:48:00', 'on', 'on', 16, 34, 50856, 3, 'ACTIVADO', '2019-05-30 23:27:02'),
(201, '2019-05-30', '16:00:00', '18:15:00', 'on', 'on', 10, 33, 50850, 3, 'ACTIVADO', '2019-05-30 23:27:28'),
(202, '2019-05-31', '16:00:00', '18:15:00', 'on', 'on', 10, 33, 50850, 3, 'ACTIVADO', '2019-05-30 23:27:29'),
(203, '2019-06-01', '16:00:00', '18:15:00', 'on', 'on', 10, 33, 50850, 3, 'ACTIVADO', '2019-05-30 23:27:29'),
(204, '2019-06-02', '16:00:00', '18:15:00', 'on', 'on', 10, 33, 50850, 3, 'ACTIVADO', '2019-05-30 23:27:29'),
(205, '2019-06-03', '16:00:00', '18:15:00', 'on', 'on', 10, 33, 50850, 3, 'ACTIVADO', '2019-05-30 23:27:29'),
(206, '2019-06-04', '16:00:00', '18:15:00', 'on', 'on', 10, 33, 50850, 3, 'ACTIVADO', '2019-05-30 23:27:29'),
(207, '2019-06-05', '16:00:00', '18:15:00', 'on', 'on', 10, 33, 50850, 3, 'ACTIVADO', '2019-05-30 23:27:29'),
(208, '2019-05-30', '17:00:00', '18:44:00', 'on', 'on', 10, 31, 50852, 4, 'ACTIVADO', '2019-05-30 23:27:51'),
(209, '2019-05-31', '17:00:00', '18:44:00', 'on', 'on', 10, 31, 50852, 4, 'ACTIVADO', '2019-05-30 23:27:51'),
(210, '2019-06-01', '17:00:00', '18:44:00', 'on', 'on', 10, 31, 50852, 4, 'ACTIVADO', '2019-05-30 23:27:51'),
(211, '2019-06-02', '17:00:00', '18:44:00', 'on', 'on', 10, 31, 50852, 4, 'ACTIVADO', '2019-05-30 23:27:52'),
(212, '2019-06-03', '17:00:00', '18:44:00', 'on', 'on', 10, 31, 50852, 4, 'ACTIVADO', '2019-05-30 23:27:52'),
(213, '2019-06-04', '17:00:00', '18:44:00', 'on', 'on', 10, 31, 50852, 4, 'ACTIVADO', '2019-05-30 23:27:52'),
(214, '2019-06-05', '17:00:00', '18:44:00', 'on', 'on', 16, 31, 50852, 4, 'ACTIVADO', '2019-05-30 23:27:52'),
(215, '2019-05-30', '17:30:00', '19:40:00', 'on', 'on', 10, 29, 50856, 4, 'ACTIVADO', '2019-05-30 23:28:16'),
(216, '2019-05-31', '17:30:00', '19:40:00', 'on', 'on', 10, 29, 50856, 4, 'ACTIVADO', '2019-05-30 23:28:16'),
(217, '2019-06-01', '17:30:00', '19:40:00', 'on', 'on', 10, 29, 50856, 4, 'ACTIVADO', '2019-05-30 23:28:16'),
(218, '2019-06-02', '17:30:00', '19:40:00', 'on', 'on', 10, 29, 50856, 4, 'ACTIVADO', '2019-05-30 23:28:16'),
(219, '2019-06-03', '17:30:00', '19:40:00', 'on', 'on', 10, 29, 50856, 4, 'ACTIVADO', '2019-05-30 23:28:17'),
(220, '2019-06-04', '17:30:00', '19:40:00', 'on', 'on', 10, 29, 50856, 4, 'ACTIVADO', '2019-05-30 23:28:17'),
(221, '2019-06-05', '17:30:00', '19:40:00', 'on', 'on', 16, 29, 50856, 4, 'ACTIVADO', '2019-05-30 23:28:17'),
(222, '2019-05-30', '18:30:00', '20:40:00', 'on', 'on', 10, 28, 50850, 4, 'ACTIVADO', '2019-05-30 23:28:41'),
(223, '2019-05-31', '18:30:00', '20:40:00', 'on', 'on', 10, 28, 50850, 4, 'ACTIVADO', '2019-05-30 23:28:41'),
(224, '2019-06-01', '18:30:00', '20:40:00', 'on', 'on', 10, 28, 50850, 4, 'ACTIVADO', '2019-05-30 23:28:41'),
(225, '2019-06-02', '18:30:00', '20:40:00', 'on', 'on', 10, 28, 50850, 4, 'ACTIVADO', '2019-05-30 23:28:41'),
(226, '2019-06-03', '18:30:00', '20:40:00', 'on', 'on', 10, 28, 50850, 4, 'ACTIVADO', '2019-05-30 23:28:41'),
(227, '2019-06-04', '18:30:00', '20:40:00', 'on', 'on', 10, 28, 50850, 4, 'ACTIVADO', '2019-05-30 23:28:41'),
(228, '2019-06-05', '18:30:00', '20:40:00', 'on', 'on', 16, 28, 50850, 4, 'ACTIVADO', '2019-05-30 23:28:41'),
(229, '2019-05-30', '19:00:00', '21:15:00', 'on', 'on', 10, 33, 50852, 5, 'ACTIVADO', '2019-05-30 23:28:59'),
(230, '2019-05-31', '19:00:00', '21:15:00', 'on', 'on', 10, 33, 50852, 5, 'ACTIVADO', '2019-05-30 23:28:59'),
(231, '2019-06-01', '19:00:00', '21:15:00', 'on', 'on', 10, 33, 50852, 5, 'ACTIVADO', '2019-05-30 23:29:00'),
(232, '2019-06-02', '19:00:00', '21:15:00', 'on', 'on', 10, 33, 50852, 5, 'ACTIVADO', '2019-05-30 23:29:00'),
(233, '2019-06-03', '19:00:00', '21:15:00', 'on', 'on', 10, 33, 50852, 5, 'ACTIVADO', '2019-05-30 23:29:00'),
(234, '2019-06-04', '19:00:00', '21:15:00', 'on', 'on', 10, 33, 50852, 5, 'ACTIVADO', '2019-05-30 23:29:00'),
(235, '2019-06-05', '19:00:00', '21:15:00', 'on', 'on', 10, 33, 50852, 5, 'ACTIVADO', '2019-05-30 23:29:00'),
(236, '2019-05-30', '20:00:00', '22:01:00', 'on', 'on', 10, 36, 50856, 5, 'ACTIVADO', '2019-05-30 23:29:21'),
(237, '2019-05-31', '20:00:00', '22:01:00', 'on', 'on', 10, 36, 50856, 5, 'ACTIVADO', '2019-05-30 23:29:21'),
(238, '2019-06-01', '20:00:00', '22:01:00', 'on', 'on', 10, 36, 50856, 5, 'ACTIVADO', '2019-05-30 23:29:21'),
(240, '2019-06-03', '20:00:00', '22:01:00', 'on', 'on', 10, 36, 50856, 5, 'ACTIVADO', '2019-05-30 23:29:21'),
(241, '2019-06-04', '20:00:00', '22:01:00', 'on', 'on', 10, 36, 50856, 5, 'ACTIVADO', '2019-05-30 23:29:21'),
(243, '2019-05-30', '21:00:00', '23:15:00', 'on', 'on', 10, 33, 50850, 5, 'ACTIVADO', '2019-05-30 23:41:24'),
(244, '2019-05-31', '21:00:00', '23:15:00', 'on', 'on', 10, 33, 50850, 5, 'ACTIVADO', '2019-05-30 23:41:24'),
(245, '2019-06-01', '21:00:00', '23:15:00', 'on', 'on', 10, 33, 50850, 5, 'ACTIVADO', '2019-05-30 23:41:24'),
(246, '2019-06-02', '21:00:00', '23:10:00', 'on', 'on', 16, 28, 50850, 5, 'ACTIVADO', '2019-05-30 23:41:24'),
(247, '2019-06-03', '21:00:00', '23:15:00', 'on', 'on', 10, 33, 50850, 5, 'ACTIVADO', '2019-05-30 23:41:24'),
(248, '2019-06-04', '21:00:00', '23:15:00', 'on', 'on', 10, 33, 50850, 5, 'ACTIVADO', '2019-05-30 23:41:24'),
(249, '2019-06-05', '21:00:00', '23:15:00', 'on', 'on', 10, 33, 50850, 5, 'ACTIVADO', '2019-05-30 23:41:24'),
(250, '2019-05-30', '21:30:00', '00:30:00', 'on', 'on', 10, 30, 50852, 6, 'ACTIVADO', '2019-05-30 23:44:02'),
(251, '2019-05-31', '21:30:00', '00:30:00', 'on', 'on', 10, 30, 50852, 6, 'ACTIVADO', '2019-05-30 23:44:03'),
(252, '2019-06-01', '21:30:00', '00:30:00', 'on', 'on', 10, 30, 50852, 6, 'ACTIVADO', '2019-05-30 23:44:03'),
(253, '2019-06-02', '21:30:00', '00:30:00', 'on', 'on', 10, 30, 50852, 6, 'ACTIVADO', '2019-05-30 23:44:03'),
(254, '2019-06-03', '21:30:00', '00:30:00', 'on', 'on', 10, 30, 50852, 6, 'ACTIVADO', '2019-05-30 23:44:03'),
(255, '2019-06-04', '21:30:00', '00:30:00', 'on', 'on', 10, 30, 50852, 6, 'ACTIVADO', '2019-05-30 23:44:03'),
(256, '2019-06-05', '21:30:00', '00:30:00', 'on', 'on', 16, 30, 50852, 6, 'ACTIVADO', '2019-05-30 23:44:03'),
(257, '2019-05-30', '22:10:00', '23:49:00', 'on', 'on', 10, 35, 50856, 6, 'ACTIVADO', '2019-05-30 23:45:07'),
(258, '2019-05-31', '22:10:00', '23:49:00', 'on', 'on', 10, 35, 50856, 6, 'ACTIVADO', '2019-05-30 23:45:07'),
(261, '2019-06-03', '22:10:00', '23:49:00', 'on', 'on', 10, 35, 50856, 6, 'ACTIVADO', '2019-05-30 23:45:07'),
(262, '2019-06-04', '22:10:00', '23:49:00', 'on', 'on', 10, 35, 50856, 6, 'ACTIVADO', '2019-05-30 23:45:07'),
(264, '2019-06-01', '22:10:00', '00:20:00', 'off', 'on', 16, 29, 50856, 7, 'ACTIVADO', '2019-06-01 14:15:52'),
(265, '2019-06-02', '20:00:00', '22:10:00', 'off', 'on', 16, 29, 50856, 5, 'ACTIVADO', '2019-06-02 10:45:56'),
(266, '2019-06-02', '22:15:00', '00:25:00', 'off', 'on', 16, 29, 50856, 6, 'ACTIVADO', '2019-06-02 19:41:48'),
(267, '2019-06-05', '20:00:00', '22:10:00', 'on', 'on', 16, 29, 50856, 5, 'ACTIVADO', '2019-06-05 11:30:57'),
(268, '2019-06-05', '22:10:00', '00:00:00', 'on', 'on', 10, 37, 50856, 6, 'ACTIVADO', '2019-06-05 11:42:18'),
(269, '2019-06-05', '23:10:00', '01:20:00', 'off', 'on', 16, 28, 50850, 6, 'ACTIVADO', '2019-06-05 17:24:56'),
(270, '2019-06-06', '12:00:00', '13:44:00', 'off', 'on', 16, 31, 50850, 1, 'ACTIVADO', '2019-06-06 02:15:39'),
(271, '2019-06-06', '16:30:00', '18:40:00', 'off', 'on', 16, 28, 50850, 2, 'ACTIVADO', '2019-06-06 02:16:45'),
(272, '2019-06-06', '21:30:00', '23:45:00', 'off', 'on', 16, 33, 50850, 3, 'ACTIVADO', '2019-06-06 02:17:15'),
(273, '2019-06-06', '10:30:00', '12:31:00', 'off', 'on', 16, 36, 50852, 1, 'ACTIVADO', '2019-06-06 02:18:05'),
(274, '2019-06-06', '12:35:00', '15:35:00', 'off', 'on', 16, 30, 50852, 2, 'ACTIVADO', '2019-06-06 02:18:33'),
(275, '2019-06-06', '20:00:00', '22:10:00', 'off', 'on', 16, 28, 50852, 3, 'ACTIVADO', '2019-06-06 02:19:12'),
(282, '2019-06-06', '10:30:00', '12:40:00', 'off', 'on', 16, 29, 50856, 1, 'ACTIVADO', '2019-06-06 02:21:53'),
(283, '2019-06-06', '12:50:00', '14:29:00', 'off', 'on', 16, 35, 50856, 2, 'ACTIVADO', '2019-06-06 02:22:29'),
(284, '2019-06-06', '21:15:00', '23:25:00', 'off', 'on', 16, 29, 50856, 3, 'ACTIVADO', '2019-06-06 02:23:13'),
(285, '2019-06-06', '14:00:00', '16:00:00', 'off', 'on', 16, 41, 50850, 4, 'ACTIVADO', '2019-06-06 08:51:33'),
(286, '2019-06-07', '14:00:00', '16:00:00', 'off', 'on', 16, 41, 50850, 1, 'ACTIVADO', '2019-06-06 08:51:33'),
(287, '2019-06-08', '14:00:00', '16:00:00', 'off', 'on', 16, 41, 50850, 1, 'ACTIVADO', '2019-06-06 08:51:33'),
(288, '2019-06-09', '14:00:00', '16:00:00', 'off', 'on', 16, 41, 50850, 1, 'ACTIVADO', '2019-06-06 08:51:33'),
(289, '2019-06-10', '14:00:00', '16:00:00', 'off', 'on', 16, 41, 50850, 1, 'ACTIVADO', '2019-06-06 08:51:33'),
(290, '2019-06-11', '14:00:00', '16:00:00', 'off', 'on', 16, 41, 50850, 1, 'ACTIVADO', '2019-06-06 08:51:33'),
(291, '2019-06-12', '14:00:00', '16:00:00', 'off', 'on', 16, 41, 50850, 1, 'ACTIVADO', '2019-06-06 08:51:33'),
(292, '2019-06-06', '19:00:00', '21:00:00', 'off', 'on', 16, 41, 50850, 5, 'ACTIVADO', '2019-06-06 08:52:06'),
(293, '2019-06-07', '19:00:00', '21:00:00', 'off', 'on', 16, 41, 50850, 2, 'ACTIVADO', '2019-06-06 08:52:06'),
(294, '2019-06-08', '19:00:00', '21:00:00', 'off', 'on', 16, 41, 50850, 2, 'ACTIVADO', '2019-06-06 08:52:06'),
(295, '2019-06-09', '19:00:00', '21:00:00', 'off', 'on', 16, 41, 50850, 2, 'ACTIVADO', '2019-06-06 08:52:07'),
(296, '2019-06-10', '19:00:00', '21:00:00', 'off', 'on', 16, 41, 50850, 2, 'ACTIVADO', '2019-06-06 08:52:07'),
(297, '2019-06-11', '19:00:00', '21:00:00', 'off', 'on', 16, 41, 50850, 2, 'ACTIVADO', '2019-06-06 08:52:07'),
(298, '2019-06-12', '19:00:00', '21:00:00', 'off', 'on', 16, 41, 50850, 2, 'ACTIVADO', '2019-06-06 08:52:07'),
(299, '2019-06-06', '16:00:00', '17:30:00', 'off', 'on', 16, 40, 50852, 4, 'ACTIVADO', '2019-06-06 08:52:51'),
(300, '2019-06-07', '16:00:00', '17:30:00', 'off', 'on', 16, 40, 50852, 1, 'ACTIVADO', '2019-06-06 08:52:51'),
(301, '2019-06-08', '16:00:00', '17:30:00', 'off', 'on', 16, 40, 50852, 1, 'ACTIVADO', '2019-06-06 08:52:51'),
(302, '2019-06-09', '16:00:00', '17:30:00', 'off', 'on', 16, 40, 50852, 1, 'ACTIVADO', '2019-06-06 08:52:51'),
(303, '2019-06-10', '16:00:00', '17:30:00', 'off', 'on', 16, 40, 50852, 1, 'ACTIVADO', '2019-06-06 08:52:51'),
(304, '2019-06-11', '16:00:00', '17:30:00', 'off', 'on', 16, 40, 50852, 1, 'ACTIVADO', '2019-06-06 08:52:51'),
(305, '2019-06-12', '16:00:00', '17:30:00', 'off', 'on', 16, 40, 50852, 1, 'ACTIVADO', '2019-06-06 08:52:51'),
(306, '2019-06-06', '17:45:00', '19:45:00', 'off', 'on', 16, 41, 50852, 5, 'ACTIVADO', '2019-06-06 08:53:15'),
(307, '2019-06-07', '17:45:00', '19:45:00', 'off', 'on', 16, 41, 50852, 2, 'ACTIVADO', '2019-06-06 08:53:15'),
(308, '2019-06-08', '17:45:00', '19:45:00', 'off', 'on', 16, 41, 50852, 2, 'ACTIVADO', '2019-06-06 08:53:15'),
(309, '2019-06-09', '17:45:00', '19:45:00', 'off', 'on', 16, 41, 50852, 2, 'ACTIVADO', '2019-06-06 08:53:15'),
(310, '2019-06-10', '17:45:00', '19:45:00', 'off', 'on', 16, 41, 50852, 2, 'ACTIVADO', '2019-06-06 08:53:15'),
(311, '2019-06-11', '17:45:00', '19:45:00', 'off', 'on', 16, 41, 50852, 2, 'ACTIVADO', '2019-06-06 08:53:15'),
(312, '2019-06-12', '17:45:00', '19:45:00', 'off', 'on', 16, 41, 50852, 2, 'ACTIVADO', '2019-06-06 08:53:15'),
(313, '2019-06-06', '14:45:00', '17:00:00', 'on', 'on', 16, 38, 50856, 4, 'ACTIVADO', '2019-06-06 08:53:43'),
(314, '2019-06-07', '14:45:00', '17:00:00', 'on', 'on', 16, 38, 50856, 1, 'ACTIVADO', '2019-06-06 08:53:43'),
(315, '2019-06-08', '14:45:00', '17:00:00', 'on', 'on', 16, 38, 50856, 1, 'ACTIVADO', '2019-06-06 08:53:43'),
(316, '2019-06-09', '14:45:00', '17:00:00', 'on', 'on', 16, 38, 50856, 1, 'ACTIVADO', '2019-06-06 08:53:43'),
(317, '2019-06-10', '14:45:00', '17:00:00', 'on', 'on', 16, 38, 50856, 1, 'ACTIVADO', '2019-06-06 08:53:43'),
(318, '2019-06-11', '14:45:00', '17:00:00', 'on', 'on', 16, 38, 50856, 1, 'ACTIVADO', '2019-06-06 08:53:43'),
(319, '2019-06-12', '14:45:00', '17:00:00', 'on', 'on', 16, 38, 50856, 1, 'ACTIVADO', '2019-06-06 08:53:43'),
(320, '2019-06-06', '17:15:00', '19:05:00', 'off', 'on', 16, 39, 50856, 5, 'ACTIVADO', '2019-06-06 08:54:06'),
(321, '2019-06-07', '17:15:00', '19:05:00', 'off', 'on', 16, 39, 50856, 2, 'ACTIVADO', '2019-06-06 08:54:06'),
(322, '2019-06-08', '17:15:00', '19:05:00', 'off', 'on', 16, 39, 50856, 2, 'ACTIVADO', '2019-06-06 08:54:06'),
(323, '2019-06-09', '17:15:00', '19:05:00', 'off', 'on', 16, 39, 50856, 2, 'ACTIVADO', '2019-06-06 08:54:06'),
(324, '2019-06-10', '17:15:00', '19:05:00', 'off', 'on', 16, 39, 50856, 2, 'ACTIVADO', '2019-06-06 08:54:06'),
(325, '2019-06-11', '17:15:00', '19:05:00', 'off', 'on', 16, 39, 50856, 2, 'ACTIVADO', '2019-06-06 08:54:06'),
(326, '2019-06-12', '17:15:00', '19:05:00', 'off', 'on', 16, 39, 50856, 2, 'ACTIVADO', '2019-06-06 08:54:06'),
(327, '2019-06-06', '19:30:00', '21:00:00', 'off', 'on', 16, 40, 50852, 6, 'ACTIVADO', '2019-06-06 08:54:40'),
(328, '2019-06-07', '19:30:00', '21:00:00', 'off', 'on', 16, 40, 50852, 3, 'ACTIVADO', '2019-06-06 08:54:40'),
(331, '2019-06-10', '19:30:00', '21:00:00', 'off', 'on', 16, 40, 50852, 3, 'ACTIVADO', '2019-06-06 08:54:40'),
(332, '2019-06-11', '19:30:00', '21:00:00', 'off', 'on', 16, 40, 50852, 3, 'ACTIVADO', '2019-06-06 08:54:40'),
(334, '2019-06-07', '12:00:00', '13:44:00', 'off', 'on', 16, 31, 50850, 3, 'ACTIVADO', '2019-06-07 08:28:08'),
(335, '2019-06-08', '12:00:00', '13:44:00', 'off', 'on', 16, 31, 50850, 3, 'ACTIVADO', '2019-06-07 08:28:08'),
(336, '2019-06-09', '12:00:00', '13:44:00', 'off', 'on', 16, 31, 50850, 3, 'ACTIVADO', '2019-06-07 08:28:08'),
(337, '2019-06-10', '12:00:00', '13:44:00', 'off', 'on', 16, 31, 50850, 3, 'ACTIVADO', '2019-06-07 08:28:08'),
(338, '2019-06-11', '12:00:00', '13:44:00', 'off', 'on', 16, 31, 50850, 3, 'ACTIVADO', '2019-06-07 08:28:08'),
(339, '2019-06-12', '12:00:00', '13:44:00', 'off', 'on', 16, 31, 50850, 3, 'ACTIVADO', '2019-06-07 08:28:09'),
(340, '2019-06-07', '16:30:00', '18:40:00', 'on', 'on', 16, 28, 50850, 4, 'ACTIVADO', '2019-06-07 08:28:42'),
(341, '2019-06-08', '16:30:00', '18:40:00', 'on', 'on', 16, 28, 50850, 4, 'ACTIVADO', '2019-06-07 08:28:42'),
(342, '2019-06-09', '16:30:00', '18:40:00', 'on', 'on', 16, 28, 50850, 4, 'ACTIVADO', '2019-06-07 08:28:42'),
(343, '2019-06-10', '16:30:00', '18:40:00', 'on', 'on', 16, 28, 50850, 4, 'ACTIVADO', '2019-06-07 08:28:42'),
(344, '2019-06-11', '16:30:00', '18:40:00', 'on', 'on', 16, 28, 50850, 4, 'ACTIVADO', '2019-06-07 08:28:42'),
(345, '2019-06-12', '16:30:00', '18:40:00', 'on', 'on', 16, 28, 50850, 4, 'ACTIVADO', '2019-06-07 08:28:42'),
(346, '2019-06-07', '21:30:00', '23:45:00', 'off', 'on', 16, 33, 50850, 5, 'ACTIVADO', '2019-06-07 08:29:10'),
(347, '2019-06-08', '21:30:00', '23:45:00', 'off', 'on', 16, 33, 50850, 5, 'ACTIVADO', '2019-06-07 08:29:10'),
(348, '2019-06-09', '21:30:00', '23:45:00', 'off', 'on', 16, 33, 50850, 5, 'ACTIVADO', '2019-06-07 08:29:10'),
(349, '2019-06-10', '21:30:00', '23:45:00', 'off', 'on', 16, 33, 50850, 5, 'ACTIVADO', '2019-06-07 08:29:11'),
(350, '2019-06-11', '21:30:00', '23:45:00', 'off', 'on', 16, 33, 50850, 5, 'ACTIVADO', '2019-06-07 08:29:11'),
(351, '2019-06-12', '21:30:00', '23:45:00', 'off', 'on', 16, 33, 50850, 5, 'ACTIVADO', '2019-06-07 08:29:11'),
(353, '2019-06-07', '10:30:00', '12:31:00', 'on', 'on', 16, 36, 50852, 4, 'ACTIVADO', '2019-06-07 08:29:40'),
(354, '2019-06-08', '10:30:00', '12:31:00', 'on', 'on', 16, 36, 50852, 3, 'ACTIVADO', '2019-06-07 08:29:40'),
(355, '2019-06-09', '10:30:00', '12:31:00', 'on', 'on', 16, 36, 50852, 3, 'ACTIVADO', '2019-06-07 08:29:40'),
(356, '2019-06-10', '10:30:00', '12:31:00', 'on', 'on', 16, 36, 50852, 4, 'ACTIVADO', '2019-06-07 08:29:40'),
(357, '2019-06-11', '10:30:00', '12:31:00', 'on', 'on', 16, 36, 50852, 4, 'ACTIVADO', '2019-06-07 08:29:40'),
(358, '2019-06-12', '10:30:00', '12:31:00', 'on', 'on', 16, 36, 50852, 3, 'ACTIVADO', '2019-06-07 08:29:41'),
(359, '2019-06-07', '12:35:00', '15:35:00', 'on', 'on', 16, 30, 50852, 5, 'ACTIVADO', '2019-06-07 09:54:37'),
(360, '2019-06-08', '12:35:00', '15:35:00', 'on', 'on', 16, 30, 50852, 4, 'ACTIVADO', '2019-06-07 09:54:37'),
(361, '2019-06-09', '12:35:00', '15:35:00', 'on', 'on', 16, 30, 50852, 4, 'ACTIVADO', '2019-06-07 09:54:37'),
(362, '2019-06-10', '12:35:00', '15:35:00', 'on', 'on', 16, 30, 50852, 5, 'ACTIVADO', '2019-06-07 09:54:37'),
(363, '2019-06-11', '12:35:00', '15:35:00', 'on', 'on', 16, 30, 50852, 5, 'ACTIVADO', '2019-06-07 09:54:37'),
(364, '2019-06-12', '12:35:00', '15:35:00', 'on', 'on', 16, 30, 50852, 4, 'ACTIVADO', '2019-06-07 09:54:37'),
(365, '2019-06-07', '20:00:00', '22:10:00', 'off', 'on', 16, 28, 50852, 6, 'ACTIVADO', '2019-06-07 09:55:26'),
(366, '2019-06-08', '20:00:00', '22:10:00', 'off', 'on', 16, 28, 50852, 5, 'ACTIVADO', '2019-06-07 09:55:26'),
(367, '2019-06-09', '20:00:00', '22:10:00', 'off', 'on', 16, 28, 50852, 5, 'ACTIVADO', '2019-06-07 09:55:26'),
(368, '2019-06-10', '20:00:00', '22:10:00', 'off', 'on', 16, 28, 50852, 6, 'ACTIVADO', '2019-06-07 09:55:27'),
(369, '2019-06-11', '20:00:00', '22:10:00', 'off', 'on', 16, 28, 50852, 6, 'ACTIVADO', '2019-06-07 09:55:27'),
(370, '2019-06-12', '20:00:00', '22:10:00', 'off', 'on', 16, 28, 50852, 5, 'ACTIVADO', '2019-06-07 09:55:27'),
(371, '2019-06-07', '10:30:00', '12:40:00', 'on', 'on', 16, 29, 50856, 3, 'ACTIVADO', '2019-06-07 09:55:52'),
(372, '2019-06-08', '10:30:00', '12:40:00', 'on', 'on', 16, 29, 50856, 3, 'ACTIVADO', '2019-06-07 09:55:52'),
(373, '2019-06-09', '10:30:00', '12:40:00', 'on', 'on', 16, 29, 50856, 3, 'ACTIVADO', '2019-06-07 09:55:52'),
(374, '2019-06-10', '10:30:00', '12:40:00', 'on', 'on', 16, 29, 50856, 3, 'ACTIVADO', '2019-06-07 09:55:52'),
(375, '2019-06-11', '10:30:00', '12:40:00', 'on', 'on', 16, 29, 50856, 3, 'ACTIVADO', '2019-06-07 09:55:52'),
(376, '2019-06-12', '10:30:00', '12:40:00', 'on', 'on', 16, 29, 50856, 3, 'ACTIVADO', '2019-06-07 09:55:52'),
(377, '2019-06-07', '12:50:00', '14:29:00', 'on', 'on', 16, 35, 50856, 4, 'ACTIVADO', '2019-06-07 09:56:23'),
(378, '2019-06-08', '12:50:00', '14:29:00', 'on', 'on', 16, 35, 50856, 4, 'ACTIVADO', '2019-06-07 09:56:23'),
(379, '2019-06-09', '12:50:00', '14:29:00', 'on', 'on', 16, 35, 50856, 4, 'ACTIVADO', '2019-06-07 09:56:23'),
(380, '2019-06-10', '12:50:00', '14:29:00', 'on', 'on', 16, 35, 50856, 4, 'ACTIVADO', '2019-06-07 09:56:23'),
(381, '2019-06-11', '12:50:00', '14:29:00', 'on', 'on', 16, 35, 50856, 4, 'ACTIVADO', '2019-06-07 09:56:23'),
(382, '2019-06-12', '12:50:00', '14:29:00', 'on', 'on', 16, 35, 50856, 4, 'ACTIVADO', '2019-06-07 09:56:23'),
(383, '2019-06-07', '21:15:00', '23:25:00', 'off', 'on', 16, 29, 50856, 5, 'ACTIVADO', '2019-06-07 09:58:15'),
(384, '2019-06-08', '21:15:00', '23:25:00', 'off', 'on', 16, 29, 50856, 5, 'ACTIVADO', '2019-06-07 09:58:15'),
(385, '2019-06-09', '21:15:00', '23:25:00', 'off', 'on', 16, 29, 50856, 5, 'ACTIVADO', '2019-06-07 09:58:15'),
(386, '2019-06-10', '21:15:00', '23:25:00', 'off', 'on', 16, 29, 50856, 5, 'ACTIVADO', '2019-06-07 09:58:15'),
(387, '2019-06-11', '21:15:00', '23:25:00', 'off', 'on', 16, 29, 50856, 5, 'ACTIVADO', '2019-06-07 09:58:15'),
(388, '2019-06-12', '21:15:00', '23:25:00', 'off', 'on', 16, 29, 50856, 5, 'ACTIVADO', '2019-06-07 09:58:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciontarifa`
--

CREATE TABLE `funciontarifa` (
  `idFuncion` int(11) NOT NULL,
  `idTarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funciontarifa`
--

INSERT INTO `funciontarifa` (`idFuncion`, `idTarifa`) VALUES
(145, 21),
(146, 21),
(147, 21),
(148, 21),
(149, 21),
(152, 21),
(153, 21),
(154, 21),
(155, 21),
(156, 21),
(159, 21),
(160, 21),
(161, 21),
(162, 21),
(163, 21),
(166, 21),
(167, 21),
(168, 21),
(169, 21),
(170, 21),
(173, 21),
(174, 21),
(175, 21),
(176, 21),
(177, 21),
(180, 19),
(181, 19),
(182, 19),
(183, 19),
(187, 20),
(188, 20),
(189, 20),
(190, 20),
(194, 21),
(195, 21),
(196, 21),
(197, 21),
(198, 21),
(201, 19),
(202, 19),
(203, 19),
(204, 19),
(205, 19),
(208, 21),
(209, 21),
(210, 21),
(211, 21),
(212, 21),
(215, 21),
(216, 21),
(217, 21),
(218, 21),
(219, 21),
(222, 20),
(223, 20),
(224, 20),
(225, 20),
(226, 20),
(229, 19),
(230, 19),
(231, 19),
(232, 19),
(233, 19),
(236, 21),
(237, 21),
(238, 21),
(240, 21),
(243, 19),
(244, 19),
(245, 19),
(247, 19),
(250, 17),
(251, 17),
(252, 17),
(253, 17),
(254, 17),
(257, 21),
(258, 21),
(261, 21),
(264, 21),
(265, 21),
(246, 20),
(266, 21),
(150, 24),
(157, 24),
(164, 24),
(171, 24),
(178, 24),
(185, 22),
(262, 24),
(255, 25),
(248, 22),
(241, 24),
(192, 23),
(199, 24),
(191, 20),
(184, 19),
(206, 22),
(213, 24),
(220, 24),
(227, 23),
(234, 22),
(151, 15),
(158, 15),
(165, 15),
(179, 15),
(172, 15),
(193, 16),
(200, 15),
(214, 15),
(221, 15),
(228, 16),
(256, 26),
(249, 17),
(235, 17),
(207, 17),
(186, 17),
(267, 15),
(268, 26),
(269, 16),
(271, 20),
(274, 17),
(275, 20),
(282, 21),
(283, 21),
(284, 21),
(285, 19),
(286, 19),
(287, 19),
(288, 19),
(289, 19),
(291, 19),
(292, 19),
(293, 19),
(294, 19),
(295, 19),
(296, 19),
(298, 19),
(306, 19),
(307, 19),
(308, 19),
(309, 19),
(310, 19),
(312, 19),
(313, 21),
(314, 21),
(315, 21),
(316, 21),
(317, 21),
(319, 21),
(320, 21),
(321, 21),
(322, 21),
(323, 21),
(324, 21),
(326, 21),
(327, 21),
(328, 21),
(331, 21),
(299, 21),
(300, 21),
(301, 21),
(302, 21),
(304, 21),
(305, 21),
(273, 21),
(290, 22),
(318, 24),
(303, 24),
(325, 24),
(311, 22),
(297, 22),
(332, 24),
(272, 20),
(270, 21),
(334, 21),
(335, 21),
(336, 21),
(337, 21),
(338, 21),
(339, 21),
(340, 20),
(341, 20),
(342, 20),
(343, 20),
(344, 20),
(345, 20),
(346, 20),
(347, 20),
(348, 20),
(349, 20),
(350, 20),
(351, 20),
(353, 21),
(354, 21),
(359, 17),
(360, 17),
(361, 17),
(362, 17),
(363, 17),
(364, 17),
(365, 20),
(366, 20),
(367, 20),
(368, 20),
(369, 20),
(370, 20),
(371, 21),
(372, 21),
(373, 21),
(374, 21),
(375, 21),
(376, 21),
(355, 21),
(377, 21),
(378, 21),
(379, 21),
(380, 21),
(381, 21),
(382, 21),
(356, 21),
(357, 21),
(358, 21),
(383, 21),
(384, 21),
(385, 21),
(386, 21),
(387, 21),
(388, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idPelicula` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `duracion` int(11) NOT NULL,
  `paisOrigen` varchar(250) NOT NULL,
  `genero` varchar(250) NOT NULL,
  `cartelera` tinyint(1) NOT NULL,
  `formato` tinyint(1) NOT NULL,
  `sipnosis` text NOT NULL,
  `urlTrailer` varchar(200) NOT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `fechaCr` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaMod` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idDistrib` int(11) NOT NULL,
  `clasificacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `nombre`, `duracion`, `paisOrigen`, `genero`, `cartelera`, `formato`, `sipnosis`, `urlTrailer`, `imagen`, `fechaCr`, `fechaMod`, `idDistrib`, `clasificacion`) VALUES
(28, 'ALADDIN', 130, 'ESTADOS UNIDOS', 'Aventuras', 1, 1, '', '0', NULL, '2019-05-30 22:56:56', '2019-05-30 22:56:56', 8, 'ATP'),
(29, 'ALADDIN', 130, 'ESTADOS UNIDOS', 'Aventura', 1, 0, '', '0', NULL, '2019-05-30 22:57:31', '2019-05-30 22:57:31', 8, '+13'),
(30, 'AVENGERS: END GAME', 180, 'ESTADOS UNIDOS', 'Ciencia Ficcion', 1, 1, '', '0', NULL, '2019-05-30 23:00:10', '2019-05-30 23:00:10', 8, 'ATP'),
(31, 'DETECTIVE PIKACHU', 104, 'ESTADOS UNIDOS', 'Aventura', 1, 1, '', '0', NULL, '2019-05-30 23:01:32', '2019-05-30 23:01:32', 7, 'ATP'),
(32, 'DETECTIVE PIKACHU', 104, 'ESTADOS UNIDOS', 'Aventura', 1, 0, '', '0', NULL, '2019-05-30 23:02:03', '2019-05-30 23:02:03', 7, 'ATP'),
(33, 'GODZILLA 2: EL REY DE LOS MONSTRUOS', 135, 'ESTADOS UNIDOS', 'Ciencia Ficcion', 1, 1, '', '0', NULL, '2019-05-30 23:03:35', '2019-05-30 23:03:35', 7, 'ATP'),
(34, 'LA RAZON DE ESTAR CONTIGO', 108, 'ESTADOS UNIDOS', 'Drama', 1, 0, '', '0', NULL, '2019-05-30 23:05:12', '2019-05-30 23:05:12', 15, 'ATP'),
(35, 'MA', 99, 'ESTADOS UNIDOS', 'Suspenso', 1, 0, '', '0', NULL, '2019-05-30 23:06:13', '2019-05-30 23:06:13', 15, '+13'),
(36, 'ROCKETMAN', 121, 'ESTADOS UNIDOS', 'Musical', 1, 0, '', '0', NULL, '2019-05-30 23:07:27', '2019-05-30 23:07:27', 14, '+13 C/R'),
(37, 'AVENGERS: END GAME', 180, 'ESTADOS UNIDOS', 'Ciencia Ficcion', 1, 0, '', '0', NULL, '2019-06-05 11:41:30', '2019-06-05 11:41:30', 7, '+13'),
(38, 'GODZILLA 2: EL REY DE LOS MONSTRUOS', 135, 'e', 'Ciencia Ficcion', 1, 0, '', '0', NULL, '2019-06-06 08:39:16', '2019-06-06 08:39:16', 7, 'ATP'),
(39, 'PEQUEÑA OTRA VEZ', 110, 'ESTADOS UNIDOS', 'Comedia', 1, 0, '', '0', NULL, '2019-06-06 08:41:38', '2019-06-06 08:41:38', 15, 'ATP'),
(40, 'UN PANDA EN APUROS', 90, 'ESTADOS UNIDOS', 'Infantil', 1, 0, '', '0', NULL, '2019-06-06 08:45:44', '2019-06-06 08:45:44', 16, 'ATP'),
(41, 'X-MEN: DARK PHOENIX', 120, 'ESTADOS UNIDOS', 'Ciencia Ficcion', 1, 1, '', '0', NULL, '2019-06-06 08:48:04', '2019-06-06 08:48:04', 10, 'ATP'),
(42, 'X-MEN: DARK PHOENIX', 120, 'ESTADOS UNIDOS', 'Ciencia Ficcion', 1, 0, '', '0', NULL, '2019-06-06 08:48:42', '2019-06-06 08:48:42', 10, 'ATP');

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
(1745, 1, 11),
(1746, 3, 11),
(1747, 4, 11),
(1748, 5, 11),
(1749, 6, 11),
(1750, 7, 11),
(1751, 8, 11),
(1752, 9, 11),
(1753, 11, 11),
(1754, 13, 11),
(1755, 14, 11),
(1756, 16, 11),
(1757, 22, 11),
(1758, 23, 11),
(1759, 24, 11),
(1760, 25, 11),
(1761, 26, 11),
(1762, 27, 11),
(1763, 28, 11),
(1764, 29, 11),
(1765, 30, 11),
(1766, 31, 11),
(1767, 32, 11),
(1768, 33, 11),
(1769, 34, 11),
(1770, 35, 11),
(1771, 36, 11),
(1772, 37, 11),
(1773, 38, 11),
(1774, 39, 11),
(1775, 40, 11),
(1776, 41, 11),
(1777, 42, 11),
(1778, 43, 11),
(1779, 44, 11),
(1780, 45, 11),
(1781, 47, 11),
(1782, 49, 11),
(1783, 53, 11),
(1784, 54, 11),
(1785, 55, 11),
(1786, 61, 11),
(1787, 62, 11),
(1788, 64, 11),
(1789, 65, 11),
(1790, 66, 11),
(1791, 67, 11),
(1792, 70, 11),
(1793, 71, 11),
(1794, 76, 11),
(1795, 82, 11),
(1796, 90, 11),
(1797, 91, 11),
(1798, 92, 11),
(1799, 93, 11),
(1800, 94, 11),
(1801, 100, 11),
(1802, 101, 11),
(1803, 102, 11),
(1804, 103, 11),
(1805, 104, 11),
(1806, 1, 10),
(1807, 2, 10),
(1808, 3, 10),
(1809, 4, 10),
(1810, 5, 10),
(1811, 6, 10),
(1812, 7, 10),
(1813, 8, 10),
(1814, 9, 10),
(1815, 10, 10),
(1816, 11, 10),
(1817, 12, 10),
(1818, 13, 10),
(1819, 14, 10),
(1820, 15, 10),
(1821, 16, 10),
(1822, 17, 10),
(1823, 19, 10),
(1824, 20, 10),
(1825, 21, 10),
(1826, 22, 10),
(1827, 23, 10),
(1828, 24, 10),
(1829, 25, 10),
(1830, 26, 10),
(1831, 27, 10),
(1832, 28, 10),
(1833, 29, 10),
(1834, 30, 10),
(1835, 31, 10),
(1836, 32, 10),
(1837, 33, 10),
(1838, 34, 10),
(1839, 35, 10),
(1840, 36, 10),
(1841, 37, 10),
(1842, 38, 10),
(1843, 39, 10),
(1844, 40, 10),
(1845, 41, 10),
(1846, 42, 10),
(1847, 43, 10),
(1848, 44, 10),
(1849, 45, 10),
(1850, 47, 10),
(1851, 49, 10),
(1852, 53, 10),
(1853, 54, 10),
(1854, 55, 10),
(1855, 61, 10),
(1856, 62, 10),
(1857, 64, 10),
(1858, 65, 10),
(1859, 66, 10),
(1860, 67, 10),
(1861, 70, 10),
(1862, 71, 10),
(1863, 76, 10),
(1864, 77, 10),
(1865, 78, 10),
(1866, 79, 10),
(1867, 80, 10),
(1868, 81, 10),
(1869, 82, 10),
(1870, 83, 10),
(1871, 87, 10),
(1872, 88, 10),
(1873, 89, 10),
(1874, 90, 10),
(1875, 91, 10),
(1876, 92, 10),
(1877, 93, 10),
(1878, 94, 10),
(1879, 95, 10),
(1880, 96, 10),
(1881, 97, 10),
(1882, 98, 10),
(1883, 99, 10),
(1884, 100, 10),
(1885, 101, 10),
(1886, 102, 10),
(1887, 103, 10),
(1888, 104, 10),
(1889, 105, 10),
(1890, 106, 10),
(1891, 107, 10),
(1892, 108, 10),
(1893, 109, 10),
(1894, 110, 10),
(1895, 111, 10),
(1896, 112, 10),
(1897, 113, 10),
(1898, 114, 10),
(1899, 115, 10),
(1900, 116, 10),
(1901, 117, 10),
(1902, 118, 10),
(1903, 119, 10),
(1904, 120, 10),
(1905, 121, 10),
(1906, 122, 10),
(1907, 123, 10),
(1908, 124, 10),
(1909, 126, 10),
(1910, 127, 10),
(1911, 128, 10),
(1912, 129, 10),
(1913, 130, 10),
(1914, 132, 10),
(1915, 133, 10),
(1916, 134, 10),
(1917, 135, 10),
(1918, 136, 10),
(1919, 137, 10),
(1920, 138, 10),
(1921, 139, 10),
(1922, 140, 10),
(1923, 142, 10),
(1924, 143, 10),
(1925, 144, 10),
(1926, 145, 10),
(1927, 146, 10),
(1928, 147, 10),
(1929, 8, 13),
(1930, 45, 13),
(1931, 143, 14),
(1932, 144, 14),
(1975, 1, 12),
(1976, 9, 12),
(1977, 11, 12),
(1978, 13, 12),
(1979, 64, 12),
(1980, 83, 12),
(1981, 108, 12),
(1982, 109, 12),
(1983, 110, 12),
(1984, 111, 12),
(1985, 112, 12),
(1986, 113, 12),
(1987, 114, 12),
(1988, 115, 12),
(1989, 116, 12),
(1990, 117, 12),
(1991, 118, 12),
(1992, 119, 12),
(1993, 120, 12),
(1994, 121, 12),
(1995, 122, 12),
(1996, 123, 12),
(1997, 124, 12),
(1998, 126, 12),
(1999, 127, 12),
(2000, 128, 12),
(2001, 129, 12),
(2002, 130, 12),
(2003, 132, 12),
(2004, 133, 12),
(2005, 134, 12),
(2006, 135, 12),
(2007, 136, 12),
(2008, 137, 12),
(2009, 138, 12),
(2010, 139, 12),
(2011, 140, 12),
(2012, 142, 12),
(2013, 143, 12),
(2014, 144, 12),
(2015, 145, 12),
(2016, 146, 12),
(2017, 147, 12),
(2024, 8, 18),
(2025, 45, 18),
(2026, 143, 18),
(2027, 144, 18),
(2028, 8, 15),
(2029, 45, 15),
(2030, 143, 15),
(2031, 144, 15),
(2062, 8, 17),
(2063, 45, 17),
(2064, 143, 17),
(2065, 144, 17),
(2120, 8, 20),
(2121, 11, 20),
(2122, 45, 20),
(2123, 55, 20),
(2124, 61, 20),
(2125, 62, 20),
(2126, 82, 20),
(2127, 83, 20),
(2128, 143, 20),
(2129, 144, 20),
(2130, 147, 20),
(2137, 8, 21),
(2138, 11, 21),
(2139, 45, 21),
(2140, 82, 21),
(2141, 83, 21),
(2142, 143, 21),
(2143, 144, 21),
(2144, 8, 22),
(2145, 9, 22),
(2146, 45, 22),
(2147, 65, 22),
(2148, 5, 16),
(2149, 6, 16),
(2150, 7, 16),
(2151, 8, 16),
(2152, 9, 16),
(2153, 32, 16),
(2154, 33, 16),
(2155, 34, 16),
(2156, 36, 16),
(2157, 37, 16),
(2158, 41, 16),
(2159, 42, 16),
(2160, 43, 16),
(2161, 44, 16),
(2162, 45, 16),
(2163, 47, 16),
(2164, 49, 16),
(2165, 55, 16),
(2166, 61, 16),
(2167, 62, 16),
(2168, 65, 16),
(2169, 143, 16),
(2170, 144, 16),
(2171, 145, 16),
(2172, 146, 16),
(2173, 147, 16),
(2174, 8, 19),
(2175, 45, 19),
(2176, 143, 19),
(2177, 144, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencia`
--

CREATE TABLE `preferencia` (
  `idPreferencia` int(11) NOT NULL,
  `nombrePref` varchar(200) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `activa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preferencia`
--

INSERT INTO `preferencia` (`idPreferencia`, `nombrePref`, `descripcion`, `activa`) VALUES
(1, 'COCA COLA', 'soda', 'on'),
(3, 'SPRITE', '', 'on'),
(4, 'FANTA', '', 'on'),
(5, 'ZERO', '', 'on'),
(6, 'DULCE', '', 'on'),
(7, 'SALADO', '', 'on'),
(8, 'AQU POMELO', '', 'on'),
(9, 'AQU MANZANA', '', 'on'),
(10, 'AQU PERA', '', 'on'),
(11, 'AQU NARANJA', '', 'on'),
(12, 'Natural', '', 'on'),
(13, 'HABURGUESA DE POLLO', '', 'on'),
(14, 'HABURGUESA DE CARNE', '', 'on'),
(15, 'PIPOCA SALADA', '', 'on'),
(16, 'PIPOCA DULCE', '', 'on'),
(17, 'NACHO SIMPLE', '', 'on');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProd` varchar(200) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `precioCosto` decimal(10,2) NOT NULL,
  `utilidad` decimal(10,2) NOT NULL,
  `activo` varchar(10) NOT NULL DEFAULT 'on',
  `imagen` varchar(250) DEFAULT NULL,
  `colorFondo` varchar(200) NOT NULL,
  `precioVenta` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `idRubro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProd`, `descripcion`, `precioCosto`, `utilidad`, `activo`, `imagen`, `colorFondo`, `precioVenta`, `cantidad`, `idRubro`) VALUES
(2, 'SODA', 'REFRESCO', '5.00', '2.83', 'on', 'Botellita.png', 'blue', '9.00', 102, 3),
(3, 'AQUARIUS', 'coca cola company', '4.70', '3.13', 'on', 'Aquiarius.png', 'yellow', '9.00', 100, 3),
(5, 'CAJA NACHOS', '', '2.00', '12.79', 'on', 'Nachos.png', 'red', '17.00', 50, 5),
(6, 'PIPOCAS PEQUEÑAS', '', '1.00', '9.44', 'on', 'Bag Popcorn Chic.jpg', 'blue', '12.00', 100, 5),
(7, 'PIPOCA MEDIANA', '', '1.00', '12.92', 'on', 'Bag Popcorn.png', 'blue', '16.00', 100, 5),
(8, 'PIPOCA GRANDE', '', '1.00', '16.40', 'on', 'BALDE.png', 'blue', '20.00', 100, 5),
(9, 'AGUA 500ML', 'AGUA 500 ML', '5.00', '1.96', 'on', 'Aguamineral.png', 'grey', '8.00', 100, 3),
(11, 'GRANIZADO', '', '5.00', '3.70', 'on', 'Icee.jpg', 'red', '10.00', 100, 4),
(14, 'HOT DOG', '', '5.00', '3.70', 'on', 'Hotd.jpg', 'purple', '10.00', 10, 6),
(15, 'MyM', 'CHOCOLATE', '5.00', '3.70', 'on', 'Arcor.jpg', 'yellow', '10.00', 1, 9),
(16, 'SNICKERS', '', '5.00', '3.70', 'on', 'Arcor.jpg', 'blue', '10.00', 1, 9),
(17, 'SKITTLES', '', '5.00', '3.70', 'on', 'Golosinas.png', 'red', '10.00', 1, 9),
(18, 'MyM MINI', '', '5.00', '3.70', 'on', 'Golosinas.png', 'purple', '10.00', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productopreferencia`
--

CREATE TABLE `productopreferencia` (
  `idProducto` int(11) NOT NULL,
  `idPreferencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productopreferencia`
--

INSERT INTO `productopreferencia` (`idProducto`, `idPreferencia`) VALUES
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(3, 8),
(3, 9),
(3, 10),
(6, 15),
(6, 16),
(7, 15),
(7, 16),
(8, 15),
(8, 16),
(9, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `razonSocial` varchar(200) NOT NULL,
  `nitProv` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `activo` varchar(10) NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `razonSocial`, `nitProv`, `email`, `telefono`, `direccion`, `activo`) VALUES
(1, 'Martin', '2', 'Bardanarg@hotmail.com', '5', 'a', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedorenvase`
--

CREATE TABLE `proveedorenvase` (
  `idPrEnv` int(11) NOT NULL,
  `idEnvase` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `costo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `idRubro` int(11) NOT NULL,
  `nombreRubro` varchar(200) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `rubroPadre` int(11) DEFAULT NULL,
  `activo` varchar(10) NOT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `colorFondo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`idRubro`, `nombreRubro`, `descripcion`, `rubroPadre`, `activo`, `imagen`, `colorFondo`) VALUES
(3, 'BEBIDAS', 'refrescos', NULL, 'on', 'VASO COCA 750.png', 'blue'),
(4, 'GRANIZADO', '', NULL, 'on', 'Icee.jpg', 'blue'),
(5, 'PIPOCAS', '', NULL, 'on', 'Pochoclo1.png', 'purple'),
(6, 'HOT DOG', '', NULL, 'on', 'Hotdog2.png', 'purple'),
(9, 'DULCES', 'VARIOS', NULL, 'on', 'Arcor.jpg', 'yellow');

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
(50850, 1, 'SALA 1', 10, 19, 139, 0),
(50852, 2, 'SALA 2', 6, 17, 92, 0),
(50856, 3, 'SALA 3', 7, 19, 109, 0),
(50857, 4, 'SALA 4', 10, 19, 139, 0),
(50858, 5, 'SALA 5', 6, 17, 92, 0),
(50859, 5, 'SALA 6', 7, 19, 109, 0);

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
(47, 'DevolverEntrada', '8'),
(49, 'VolverImprimirEntrada', '8'),
(53, 'RegistrarEntradaWeb', '8'),
(54, 'VerPanelVentasWeb', '8'),
(55, 'VerEntradasVendidas', '8'),
(61, 'VerPanelVentas', '8'),
(62, 'DetallesVenta', '8'),
(64, 'ResumenDelDia', '9'),
(65, 'BorderauxFuncion', '9'),
(66, 'BorderauxRecaudacion', '9'),
(67, 'BorderauxDistribuidor', '9'),
(70, 'VerVentasVendedor', '9'),
(71, 'VerResumenSemana', '9'),
(76, 'VerResumenVentasBoxOffice', '9'),
(77, 'RegistrarNuevoUsuario', '10'),
(78, 'VerUsuarios', '10'),
(79, 'ModificarUsuario', '10'),
(80, 'EliminarUsuario', '10'),
(81, 'ModificarPassword', '10'),
(82, 'RegistrarNuevaCaja', '11'),
(83, 'CajaCandy', '11'),
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
(107, 'ModificarDatoDosificacion', '17'),
(108, 'LibroIVACandy', '13'),
(109, 'Proveedor', '0'),
(110, 'NuevoProveedor', '109'),
(111, 'VerProveedor', '109'),
(112, 'ModificarProveedor', '109'),
(113, 'EliminarProveedor', '109'),
(114, 'Productos', '0'),
(115, 'NuevoProducto', '114'),
(116, 'VerProducto', '114'),
(117, 'ModificarProducto', '114'),
(118, 'EliminarProducto', '114'),
(119, 'Rubros', '0'),
(120, 'NuevoRubro', '119'),
(121, 'VerRubro', '119'),
(122, 'ModificarRubro', '119'),
(123, 'EliminarRubro', '119'),
(124, 'Preferencias', '0'),
(126, 'NuevaPreferencia', '124'),
(127, 'VerPreferencia', '124'),
(128, 'ModificarPreferencia', '124'),
(129, 'EliminarPreferencia', '124'),
(130, 'Combos', '0'),
(132, 'NuevoCombo', '130'),
(133, 'VerCombo', '130'),
(134, 'ModificarCombo', '130'),
(135, 'EliminarCombo', '130'),
(136, 'Imagenes', '0'),
(137, 'CargarImagen', '136'),
(138, 'VerImagenes', '136'),
(139, 'ProductosMasVendidos', '9'),
(140, 'ResumenVentasCandy', '9'),
(142, 'VerVenta', '9'),
(143, 'VentaCandy', '0'),
(144, 'PanelVenta', '143'),
(145, 'Devolucion', '143'),
(146, 'Reimpresion', '143'),
(147, 'Listado Candy', '143');

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
(1, '2019-06-01 17:35:25', 'ACTIVO', 1),
(2, '2019-06-01 17:35:25', 'ACTIVO', 1),
(3, '2019-06-01 17:35:25', 'ACTIVO', 1),
(4, '2019-06-01 17:35:26', 'ACTIVO', 1),
(5, '2019-06-01 17:35:26', 'ACTIVO', 1),
(6, '2019-06-01 17:35:26', 'ACTIVO', 1),
(7, '2019-06-01 17:35:26', 'ACTIVO', 1),
(8, '2019-06-01 17:35:26', 'ACTIVO', 1),
(9, '2019-06-01 17:35:26', 'ACTIVO', 1),
(10, '2019-06-01 17:35:26', 'ACTIVO', 1),
(11, '2019-06-01 17:35:26', 'ACTIVO', 1),
(12, '2019-06-01 17:35:26', 'ACTIVO', 1),
(13, '2019-06-01 17:35:26', 'ACTIVO', 1),
(14, '2019-06-01 17:35:26', 'ACTIVO', 1),
(15, '2019-06-01 17:35:26', 'ACTIVO', 1),
(16, '2019-06-01 17:35:26', 'ACTIVO', 1),
(17, '2019-06-01 17:35:26', 'ACTIVO', 1),
(18, '2019-06-01 17:35:26', 'ACTIVO', 1),
(19, '2019-06-01 17:35:26', 'ACTIVO', 1),
(20, '2019-06-01 17:35:26', 'ACTIVO', 1),
(21, '2019-06-01 17:35:26', 'ACTIVO', 1),
(22, '2019-06-01 17:35:26', 'ACTIVO', 1),
(23, '2019-06-01 17:35:26', 'ACTIVO', 1),
(24, '2019-06-01 17:35:26', 'ACTIVO', 1),
(25, '2019-06-01 17:35:26', 'ACTIVO', 1),
(26, '2019-06-01 17:35:26', 'ACTIVO', 1),
(27, '2019-06-01 17:35:26', 'ACTIVO', 1),
(28, '2019-06-01 17:35:26', 'ACTIVO', 1),
(29, '2019-06-01 17:35:26', 'ACTIVO', 1),
(30, '2019-06-01 17:35:26', 'ACTIVO', 1),
(31, '2019-06-01 17:35:26', 'ACTIVO', 1),
(32, '2019-06-01 17:35:26', 'ACTIVO', 1),
(33, '2019-06-01 17:35:26', 'ACTIVO', 1),
(34, '2019-06-01 17:35:26', 'ACTIVO', 1),
(35, '2019-06-01 17:35:26', 'ACTIVO', 1),
(36, '2019-06-01 17:35:26', 'ACTIVO', 1),
(37, '2019-06-01 17:35:26', 'ACTIVO', 1),
(38, '2019-06-01 17:35:26', 'ACTIVO', 1),
(39, '2019-06-01 17:35:26', 'ACTIVO', 1),
(40, '2019-06-01 17:35:26', 'ACTIVO', 1),
(41, '2019-06-01 17:35:26', 'ACTIVO', 1),
(42, '2019-06-01 17:35:26', 'ACTIVO', 1),
(43, '2019-06-01 17:35:26', 'ACTIVO', 1),
(44, '2019-06-01 17:35:26', 'ACTIVO', 1),
(45, '2019-06-01 17:35:26', 'ACTIVO', 1),
(46, '2019-06-01 17:35:26', 'ACTIVO', 1),
(47, '2019-06-01 17:35:26', 'ACTIVO', 1),
(48, '2019-06-01 17:35:26', 'ACTIVO', 1),
(49, '2019-06-01 17:35:26', 'ACTIVO', 1),
(50, '2019-06-01 17:35:26', 'ACTIVO', 1),
(51, '2019-06-01 17:35:26', 'ACTIVO', 1),
(52, '2019-06-01 17:35:26', 'ACTIVO', 1),
(53, '2019-06-01 17:35:26', 'ACTIVO', 1),
(54, '2019-06-01 17:35:26', 'ACTIVO', 1),
(55, '2019-06-01 17:35:26', 'ACTIVO', 1),
(56, '2019-06-01 17:35:26', 'ACTIVO', 1),
(57, '2019-06-01 17:35:26', 'ACTIVO', 1),
(58, '2019-06-01 17:35:26', 'ACTIVO', 1),
(59, '2019-06-01 17:35:26', 'ACTIVO', 1),
(60, '2019-06-01 17:35:26', 'ACTIVO', 1),
(61, '2019-06-01 17:35:26', 'ACTIVO', 1),
(62, '2019-06-01 17:35:26', 'ACTIVO', 1),
(63, '2019-06-01 17:35:26', 'ACTIVO', 1),
(64, '2019-06-01 17:35:26', 'ACTIVO', 1),
(65, '2019-06-01 17:35:26', 'ACTIVO', 1),
(66, '2019-06-01 17:35:26', 'ACTIVO', 1),
(67, '2019-06-01 17:35:27', 'ACTIVO', 1),
(68, '2019-06-01 17:35:27', 'ACTIVO', 1),
(69, '2019-06-01 17:35:27', 'ACTIVO', 1),
(70, '2019-06-01 17:35:27', 'ACTIVO', 1),
(71, '2019-06-01 17:35:27', 'ACTIVO', 1),
(72, '2019-06-01 17:35:27', 'ACTIVO', 1),
(73, '2019-06-01 17:35:27', 'ACTIVO', 1),
(74, '2019-06-01 17:35:27', 'ACTIVO', 1),
(75, '2019-06-01 17:35:27', 'ACTIVO', 1),
(76, '2019-06-01 17:35:27', 'ACTIVO', 1),
(77, '2019-06-01 17:35:27', 'ACTIVO', 1),
(78, '2019-06-01 17:35:27', 'ACTIVO', 1),
(79, '2019-06-01 17:35:27', 'ACTIVO', 1),
(80, '2019-06-01 17:35:27', 'ACTIVO', 1),
(81, '2019-06-01 17:35:27', 'ACTIVO', 1),
(82, '2019-06-01 17:35:27', 'ACTIVO', 1),
(83, '2019-06-01 17:35:27', 'ACTIVO', 1),
(84, '2019-06-01 17:35:27', 'ACTIVO', 1),
(85, '2019-06-01 17:35:27', 'ACTIVO', 1),
(86, '2019-06-01 17:35:27', 'ACTIVO', 1),
(87, '2019-06-01 17:35:27', 'ACTIVO', 1),
(88, '2019-06-01 17:35:27', 'ACTIVO', 1),
(89, '2019-06-01 17:35:27', 'ACTIVO', 1),
(90, '2019-06-01 17:35:27', 'ACTIVO', 1),
(91, '2019-06-01 17:35:27', 'ACTIVO', 1),
(92, '2019-06-01 17:35:27', 'ACTIVO', 1),
(93, '2019-06-01 17:35:27', 'ACTIVO', 1),
(94, '2019-06-01 17:35:27', 'ACTIVO', 1),
(95, '2019-06-01 17:35:27', 'ACTIVO', 1),
(96, '2019-06-01 17:35:27', 'ACTIVO', 1),
(97, '2019-06-01 17:35:27', 'ACTIVO', 1),
(98, '2019-06-01 17:35:27', 'ACTIVO', 1),
(99, '2019-06-01 17:35:27', 'ACTIVO', 1),
(100, '2019-06-01 17:35:27', 'ACTIVO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(11) NOT NULL,
  `serie` varchar(5) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
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
  `activo` tinyint(1) NOT NULL,
  `promo` varchar(5) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`idTarifa`, `serie`, `descripcion`, `precio`, `tv`, `defecto`, `ventaWeb`, `mostrarBol`, `d2`, `d3`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `diaFestivo`, `activo`, `promo`) VALUES
(6, '4w', '3333', '50.00', 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 'off'),
(15, 'MD', 'MIERCOLES', '15.00', 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'off'),
(16, 'ES', 'PRECIO 2X1 ESTRENO', '17.50', 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'off'),
(17, 'WV', 'CONTRATO', '20.00', 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'off'),
(18, 'EE', 'ESTRENOS', '50.00', 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'off'),
(19, 'WW', 'WWW', '40.00', 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'off'),
(20, 'W1', 'W1111', '35.00', 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'off'),
(21, 'W2', 'W2', '30.00', 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'off'),
(22, 'D40', 'PROMO MARTES', '40.00', 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 'on'),
(23, 'D35', 'PROMO MARTES', '35.00', 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 'on'),
(24, 'D30', 'PROMO MARTES', '30.00', 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 'on'),
(25, 'D20', 'PROMO MARTES', '20.00', 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 'on'),
(26, 'W10', 'MIERCOLES 2X1', '10.00', 0, 0, 0, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 'off');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tempdetallepref`
--

CREATE TABLE `tempdetallepref` (
  `idtemdetpref` int(11) NOT NULL,
  `idPreferencia` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idDtemporal` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `titulo` varchar(200) NOT NULL,
  `idTarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temporal`
--


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
(10, 'Administrador', 'SuperAdm', 'superadmin'),
(11, 'AdmBoleteria', 'ADMBOL', '123456'),
(12, 'ADMCANDY', 'ADMCANDY', '123456'),
(13, 'boleteria', 'boleteria', 'boleteria'),
(14, 'candy', 'candy', 'candy'),
(15, 'MARY VILLANUEVA', 'MVILLANUEVA', '7360599'),
(16, 'OMAR LUIZAGA', 'OLUIZAGA', '123456'),
(17, 'PABLO PADILLA', 'PPADILLA', '0611555'),
(18, 'ABIGAIL SALAZAR', 'ASALAZAR', '7380122ABY'),
(19, 'MISHELLE MIRANDA', 'MMIRANDA', '9996667'),
(20, 'DANIELA ALBERTO', 'DALBERTO', '7283230'),
(21, 'JUAN PABLO CUAQUIRA', 'PCUAQUIRA', 'PABLEX123'),
(22, 'JHOSUE MOISES MERCADO GARCIA', 'MMERCADO', 'MERCADO12345');

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
  `idCupon` int(11) DEFAULT NULL,
  `cancelado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estructura de tabla para la tabla `ventacandy`
--

CREATE TABLE `ventacandy` (
  `idVentaCandy` int(11) NOT NULL,
  `fechaVenta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) NOT NULL,
  `tipoVenta` varchar(20) NOT NULL DEFAULT 'FACTURA',
  `codigoControl` varchar(100) NOT NULL,
  `codigoQR` varchar(200) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'ACTIVO',
  `idCliente` int(11) NOT NULL,
  `idDosif` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nroComprobante` int(11) NOT NULL,
  `cancelado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Volcado de datos para la tabla `venta`
--

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
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idTa` (`idTarifa`);

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
-- Indices de la tabla `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`idCombo`);

--
-- Indices de la tabla `comboproducto`
--
ALTER TABLE `comboproducto`
  ADD PRIMARY KEY (`idCombo`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `controlingreso`
--
ALTER TABLE `controlingreso`
  ADD PRIMARY KEY (`idControlIngreso`),
  ADD KEY `idUsuario` (`idUsuario`);

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
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idVentaCandy` (`idVentaCandy`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idCombo` (`idCombo`);

--
-- Indices de la tabla `detallepreferencia`
--
ALTER TABLE `detallepreferencia`
  ADD PRIMARY KEY (`idDetPref`),
  ADD KEY `idDetalle` (`idDetalle`),
  ADD KEY `idPreferencia` (`idPreferencia`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `detalletemporal`
--
ALTER TABLE `detalletemporal`
  ADD PRIMARY KEY (`idDtemporal`);

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
-- Indices de la tabla `envase`
--
ALTER TABLE `envase`
  ADD PRIMARY KEY (`idEnvase`);

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`idFuncion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`),
  ADD KEY `idSala` (`idSala`);

--
-- Indices de la tabla `funciontarifa`
--
ALTER TABLE `funciontarifa`
  ADD KEY `idFuncion` (`idFuncion`),
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
-- Indices de la tabla `preferencia`
--
ALTER TABLE `preferencia`
  ADD PRIMARY KEY (`idPreferencia`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idR` (`idRubro`);

--
-- Indices de la tabla `productopreferencia`
--
ALTER TABLE `productopreferencia`
  ADD PRIMARY KEY (`idProducto`,`idPreferencia`),
  ADD KEY `idPreferencia` (`idPreferencia`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `proveedorenvase`
--
ALTER TABLE `proveedorenvase`
  ADD PRIMARY KEY (`idPrEnv`),
  ADD KEY `idEnvase` (`idEnvase`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`idRubro`);

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
-- Indices de la tabla `tempdetallepref`
--
ALTER TABLE `tempdetallepref`
  ADD PRIMARY KEY (`idtemdetpref`),
  ADD KEY `idTempProd` (`idDtemporal`);

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
-- Indices de la tabla `ventacandy`
--
ALTER TABLE `ventacandy`
  ADD PRIMARY KEY (`idVentaCandy`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idDosif` (`idDosif`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `idAsiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1366;

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `idBoleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4594;

--
-- AUTO_INCREMENT de la tabla `butaca`
--
ALTER TABLE `butaca`
  MODIFY `idButaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9178;

--
-- AUTO_INCREMENT de la tabla `combo`
--
ALTER TABLE `combo`
  MODIFY `idCombo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `controlingreso`
--
ALTER TABLE `controlingreso`
  MODIFY `idControlIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- AUTO_INCREMENT de la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  MODIFY `idCosto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `idCupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2236;

--
-- AUTO_INCREMENT de la tabla `detallepreferencia`
--
ALTER TABLE `detallepreferencia`
  MODIFY `idDetPref` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalletemporal`
--
ALTER TABLE `detalletemporal`
  MODIFY `idDtemporal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=967;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `dia_festivo`
--
ALTER TABLE `dia_festivo`
  MODIFY `idFestivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `idDistrib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `dosificacion`
--
ALTER TABLE `dosificacion`
  MODIFY `idDosif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `envase`
--
ALTER TABLE `envase`
  MODIFY `idEnvase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `idFuncion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2178;

--
-- AUTO_INCREMENT de la tabla `preferencia`
--
ALTER TABLE `preferencia`
  MODIFY `idPreferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedorenvase`
--
ALTER TABLE `proveedorenvase`
  MODIFY `idPrEnv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `idRubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50860;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `subcupon`
--
ALTER TABLE `subcupon`
  MODIFY `idsubcupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tempdetallepref`
--
ALTER TABLE `tempdetallepref`
  MODIFY `idtemdetpref` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `idTemporal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2194;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1603;

--
-- AUTO_INCREMENT de la tabla `ventacandy`
--
ALTER TABLE `ventacandy`
  MODIFY `idVentaCandy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1797;

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
-- Filtros para la tabla `comboproducto`
--
ALTER TABLE `comboproducto`
  ADD CONSTRAINT `comboproducto_ibfk_1` FOREIGN KEY (`idCombo`) REFERENCES `combo` (`idCombo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comboproducto_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `controlingreso`
--
ALTER TABLE `controlingreso`
  ADD CONSTRAINT `controlingreso_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD CONSTRAINT `cupon_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idVentaCandy`) REFERENCES `ventacandy` (`idVentaCandy`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallepreferencia`
--
ALTER TABLE `detallepreferencia`
  ADD CONSTRAINT `detallepreferencia_ibfk_1` FOREIGN KEY (`idDetalle`) REFERENCES `detalle` (`idDetalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallepreferencia_ibfk_2` FOREIGN KEY (`idPreferencia`) REFERENCES `preferencia` (`idPreferencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallepreferencia_ibfk_3` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD CONSTRAINT `funcion_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcion_ibfk_2` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcion_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funciontarifa`
--
ALTER TABLE `funciontarifa`
  ADD CONSTRAINT `funciontarifa_ibfk_1` FOREIGN KEY (`idFuncion`) REFERENCES `funcion` (`idFuncion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funciontarifa_ibfk_2` FOREIGN KEY (`idTarifa`) REFERENCES `tarifa` (`idTarifa`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idRubro`) REFERENCES `rubro` (`idRubro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productopreferencia`
--
ALTER TABLE `productopreferencia`
  ADD CONSTRAINT `productopreferencia_ibfk_1` FOREIGN KEY (`idPreferencia`) REFERENCES `preferencia` (`idPreferencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productopreferencia_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcupon`
--
ALTER TABLE `subcupon`
  ADD CONSTRAINT `subcupon_ibfk_1` FOREIGN KEY (`idcupon`) REFERENCES `cupon` (`idCupon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tempdetallepref`
--
ALTER TABLE `tempdetallepref`
  ADD CONSTRAINT `tempdetallepref_ibfk_1` FOREIGN KEY (`idDtemporal`) REFERENCES `detalletemporal` (`idDtemporal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idDosif`) REFERENCES `dosificacion` (`idDosif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventacandy`
--
ALTER TABLE `ventacandy`
  ADD CONSTRAINT `ventacandy_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventacandy_ibfk_2` FOREIGN KEY (`idDosif`) REFERENCES `dosificacion` (`idDosif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventacandy_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
