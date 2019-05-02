-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2019 a las 15:31:50
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

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
  `idVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`idBoleto`, `numboc`, `numero`, `fecha`, `idFuncion`, `idUsuario`, `idAsiento`, `numeroFuncion`, `numeroSala`, `serieTarifa`, `codigoSala`, `fechaFuncion`, `horaFuncion`, `fila`, `columna`, `costo`, `titulo`, `devuelto`, `idVenta`) VALUES
(33, '3508562019041702w-1', 1, '2019-04-17 11:45:42', 43, 1, NULL, 0, 3, '2w', 50856, '2019-04-17', '18:00:00', 1, 8, 40, 'CAPITANA MARVEL 3D', 'NO', 15),
(34, '3508562019041702w-2', 2, '2019-04-17 11:45:42', 43, 1, NULL, 0, 3, '2w', 50856, '2019-04-17', '18:00:00', 1, 7, 40, 'CAPITANA MARVEL 3D', 'NO', 15),
(35, '3508562019041702w-3', 3, '2019-04-17 11:45:42', 43, 1, NULL, 0, 3, '2w', 50856, '2019-04-17', '18:00:00', 1, 9, 40, 'CAPITANA MARVEL 3D', 'NO', 15),
(36, '3508562019041702w-1', 1, '2019-04-17 11:45:42', 49, 1, NULL, 0, 3, '2w', 50856, '2019-04-17', '10:00:00', 3, 3, 40, 'DUMBO 3D', 'NO', 15),
(37, '150850201904171ww-1', 1, '2019-04-17 11:45:42', 51, 1, NULL, 1, 1, 'ww', 50850, '2019-04-17', '10:00:00', 5, 13, 30, 'Avenger end game 2D', 'NO', 15),
(40, '150850201904191ww-1', 1, '2019-04-17 15:19:31', 53, 1, NULL, 1, 1, 'ww', 50850, '2019-04-19', '10:00:00', 6, 12, 30, 'Avenger end game 2D', 'NO', 18),
(41, '150850201904191ww-2', 2, '2019-04-17 15:19:31', 53, 1, NULL, 1, 1, 'ww', 50850, '2019-04-19', '10:00:00', 6, 11, 30, 'Avenger end game 2D', 'NO', 18),
(44, '1508502019042124w-3', 3, '2019-04-17 15:30:20', 62, 1, NULL, 2, 1, '4w', 50850, '2019-04-21', '13:00:00', 6, 12, 50, 'Avenger end game 3D', 'NO', 20),
(45, '1508502019041824w-1', 1, '2019-04-17 18:17:49', 59, 1, NULL, 2, 1, '4w', 50850, '2019-04-18', '13:00:00', 6, 11, 50, 'Avenger end game 3D', 'NO', 21),
(46, '1508502019041824w-2', 2, '2019-04-17 18:17:49', 59, 1, NULL, 2, 1, '4w', 50850, '2019-04-18', '13:00:00', 6, 12, 50, 'Avenger end game 3D', 'NO', 21),
(47, '150850201904201ww-1', 1, '2019-04-18 09:03:14', 54, 1, NULL, 1, 1, 'ww', 50850, '2019-04-20', '10:00:00', 7, 11, 30, 'Avenger end game 2D', 'NO', 22),
(48, '150850201904201ww-2', 2, '2019-04-18 09:03:14', 54, 1, NULL, 1, 1, 'ww', 50850, '2019-04-20', '10:00:00', 7, 10, 30, 'Avenger end game 2D', 'NO', 22),
(49, '1508502019042324w-1', 1, '2019-04-23 16:52:43', 64, 1, 743, 2, 1, '4w', 50850, '2019-04-23', '13:00:00', 7, 12, 50, 'Avenger end game 3D', 'NO', 23),
(50, '1508502019042324w-2', 2, '2019-04-23 16:52:44', 64, 1, 742, 2, 1, '4w', 50850, '2019-04-23', '13:00:00', 7, 11, 50, 'Avenger end game 3D', 'NO', 23),
(51, '150850201904231ww-1', 1, '2019-04-23 16:55:35', 57, 1, 663, 1, 1, 'ww', 50850, '2019-04-23', '10:00:00', 3, 8, 30, 'Avenger end game 2D', 'NO', 24),
(52, '150850201904231ww-2', 2, '2019-04-23 16:55:35', 57, 1, 662, 1, 1, 'ww', 50850, '2019-04-23', '10:00:00', 3, 7, 30, 'Avenger end game 2D', 'NO', 24),
(53, '1508502019042504w-1', 1, '2019-04-24 09:03:16', 8, 1, 708, 0, 1, '4w', 50850, '2019-04-25', '00:01:00', 5, 15, 50, 'Avenger end game 3D', 'NO', 25),
(54, '1508502019042504w-2', 2, '2019-04-24 09:03:16', 8, 1, 707, 0, 1, '4w', 50850, '2019-04-25', '00:01:00', 5, 14, 50, 'Avenger end game 3D', 'NO', 25),
(55, '1508502019042504w-3', 3, '2019-04-25 10:55:36', 8, 1, 761, 0, 1, '4w', 50850, '2019-04-25', '00:01:00', 8, 11, 50, 'Avenger end game 3D', 'NO', 26),
(56, '1508502019042504w-4', 4, '2019-04-25 10:55:36', 8, 1, 760, 0, 1, '4w', 50850, '2019-04-25', '00:01:00', 8, 10, 50, 'Avenger end game 3D', 'NO', 26),
(57, '1508502019042504w-5', 5, '2019-04-25 11:37:52', 8, 1, 743, 0, 1, '4w', 50850, '2019-04-25', '00:01:00', 7, 12, 50, 'Avenger end game 3D', 'NO', 27),
(58, '250852201904261ww-1', 1, '2019-04-26 09:29:19', 65, 1, 579, 1, 2, 'ww', 50852, '2019-04-26', '10:00:00', 4, 13, 30, 'LA LLORONA 3D', 'NO', 28),
(59, '250852201904261ww-2', 2, '2019-04-26 09:33:59', 65, 1, 558, 1, 2, 'ww', 50852, '2019-04-26', '10:00:00', 3, 9, 30, 'LA LLORONA 3D', 'NO', 29),
(60, '250852201904261ww-3', 3, '2019-04-26 09:33:59', 65, 1, 557, 1, 2, 'ww', 50852, '2019-04-26', '10:00:00', 3, 8, 30, 'LA LLORONA 3D', 'NO', 29),
(61, '250852201904261ww-4', 4, '2019-04-26 09:36:01', 65, 1, 591, 1, 2, 'ww', 50852, '2019-04-26', '10:00:00', 5, 8, 30, 'LA LLORONA 3D', 'NO', 30),
(62, '250852201904261ww-5', 5, '2019-04-26 09:36:02', 65, 1, 592, 1, 2, 'ww', 50852, '2019-04-26', '10:00:00', 5, 9, 30, 'LA LLORONA 3D', 'NO', 30),
(63, '250852201904301ww-1', 1, '2019-04-30 14:54:59', 69, 1, 575, 1, 2, 'ww', 50852, '2019-04-30', '10:00:00', 4, 9, 30, 'LA LLORONA 3D', 'NO', 31),
(64, '250852201904301ww-2', 2, '2019-04-30 14:54:59', 69, 1, 574, 1, 2, 'ww', 50852, '2019-04-30', '10:00:00', 4, 8, 30, 'LA LLORONA 3D', 'NO', 31),
(65, '250852201905011ww-1', 1, '2019-04-30 14:55:43', 70, 1, 591, 1, 2, 'ww', 50852, '2019-05-01', '10:00:00', 5, 8, 30, 'LA LLORONA 3D', 'NO', 32),
(66, '250852201905011ww-2', 2, '2019-04-30 14:55:43', 70, 1, 592, 1, 2, 'ww', 50852, '2019-05-01', '10:00:00', 5, 9, 30, 'LA LLORONA 3D', 'NO', 32);

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
(23, '123456', 'MARIA', 'ESCALERA', '', NULL, '', NULL, NULL, NULL);

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
  `idFuncion` int(11) DEFAULT NULL,
  `idPelicula` int(11) DEFAULT NULL,
  `motivo` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 8, 1, '2019-04-22 16:34:00');

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
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `nroFactura` int(11) NOT NULL DEFAULT '0',
  `tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dosificacion`
--

INSERT INTO `dosificacion` (`idDosif`, `nroTramite`, `nroAutorizacion`, `nroFactIni`, `llaveDosif`, `fechaDesde`, `fechaHasta`, `leyenda`, `activo`, `nroFactura`, `tipo`) VALUES
(1, 123456, 77888888, 1, 'ss4s4s4', '2019-03-12 00:00:00', '2019-03-13 00:00:00', 'ass', 0, 0, ''),
(3, 1235553, 778888880, 1, 'ss4s4s4', '2019-03-12 00:00:00', '2019-03-13 00:00:00', 'ass', 0, 0, ''),
(5, 55555, 666, 7777, 'dfdfdfdf', '2019-03-14 00:00:00', '2019-03-28 00:00:00', 'ddd', 0, 0, ''),
(6, 400001984457, 332401900008210, 1, '38@#I#(Z95qd-@=2ja2JLFUUN)G6GBWCZE#-SVEDHgtQBh@qV_UHPqXSEvnCZJBB', '2019-04-02 00:00:00', '2019-09-26 00:00:00', 'ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY Ley N° 453: Tienes derecho a un trato equitativo sin discriminacion en la oferta de servicios.', 1, 16, 'BOLETERIA');

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
  `subtitulada` tinyint(1) NOT NULL,
  `numerada` tinyint(1) NOT NULL,
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
(1, '2019-03-27', '10:00:00', '11:30:00', 0, 0, 1, 15, 50850, 1, 'ACTIVADO', '2019-03-28 16:41:20', 1),
(2, '2019-04-02', '14:00:00', '15:00:00', 0, 0, 1, 15, 50850, 2, 'ACTIVADO', '2019-03-29 11:37:09', 5),
(8, '2019-04-25', '00:01:00', '03:03:00', 0, 0, 1, 17, 50850, 0, 'ACTIVADO', '2019-04-03 09:28:18', 6),
(9, '2019-04-04', '19:00:00', '22:02:00', 0, 0, 1, 18, 50850, 0, 'ACTIVADO', '2019-04-04 08:46:13', 6),
(10, '2019-04-05', '19:00:00', '22:02:00', 0, 0, 1, 18, 50850, 0, 'ACTIVADO', '2019-04-04 08:46:13', 6),
(11, '2019-04-06', '19:00:00', '22:02:00', 0, 0, 1, 18, 50850, 0, 'ACTIVADO', '2019-04-04 08:46:13', 6),
(12, '2019-04-07', '19:00:00', '22:02:00', 0, 0, 1, 18, 50850, 0, 'ACTIVADO', '2019-04-04 08:46:13', 6),
(13, '2019-04-08', '19:00:00', '22:02:00', 0, 0, 1, 18, 50850, 0, 'ACTIVADO', '2019-04-04 08:46:13', 6),
(14, '2019-04-09', '19:00:00', '22:02:00', 0, 0, 1, 18, 50850, 0, 'ACTIVADO', '2019-04-04 08:46:13', 6),
(15, '2019-04-10', '19:00:00', '22:02:00', 0, 0, 1, 18, 50850, 0, 'ACTIVADO', '2019-04-04 08:46:13', 6),
(16, '2019-04-04', '10:00:00', '13:20:00', 0, 0, 1, 20, 50852, 0, 'ACTIVADO', '2019-04-04 09:13:40', 1),
(17, '2019-04-05', '10:00:00', '13:20:00', 0, 0, 1, 20, 50852, 0, 'ACTIVADO', '2019-04-04 09:13:40', 1),
(18, '2019-04-06', '10:00:00', '13:20:00', 0, 0, 1, 20, 50852, 0, 'ACTIVADO', '2019-04-04 09:13:40', 1),
(19, '2019-04-07', '10:00:00', '13:20:00', 0, 0, 1, 20, 50852, 0, 'ACTIVADO', '2019-04-04 09:13:40', 1),
(20, '2019-04-08', '10:00:00', '13:20:00', 0, 0, 1, 20, 50852, 0, 'ACTIVADO', '2019-04-04 09:13:40', 1),
(21, '2019-04-09', '10:00:00', '13:20:00', 0, 0, 1, 20, 50852, 0, 'ACTIVADO', '2019-04-04 09:13:40', 1),
(22, '2019-04-10', '10:00:00', '13:20:00', 0, 0, 1, 20, 50852, 0, 'ACTIVADO', '2019-04-04 09:13:40', 1),
(23, '2019-04-04', '14:00:00', '17:20:00', 0, 0, 1, 19, 50852, 0, 'ACTIVADO', '2019-04-04 09:14:53', 6),
(24, '2019-04-05', '14:00:00', '17:20:00', 0, 0, 1, 19, 50852, 0, 'ACTIVADO', '2019-04-04 09:14:53', 6),
(25, '2019-04-06', '14:00:00', '17:20:00', 0, 0, 1, 19, 50852, 0, 'ACTIVADO', '2019-04-04 09:14:53', 6),
(26, '2019-04-07', '14:00:00', '17:20:00', 0, 0, 1, 19, 50852, 0, 'ACTIVADO', '2019-04-04 09:14:53', 6),
(27, '2019-04-08', '14:00:00', '17:20:00', 0, 0, 1, 19, 50852, 0, 'ACTIVADO', '2019-04-04 09:14:53', 6),
(28, '2019-04-09', '14:00:00', '17:20:00', 0, 0, 1, 19, 50852, 0, 'ACTIVADO', '2019-04-04 09:14:53', 6),
(29, '2019-04-10', '14:00:00', '17:20:00', 0, 0, 1, 19, 50852, 0, 'ACTIVADO', '2019-04-04 09:14:53', 6),
(30, '2019-04-04', '18:00:00', '21:20:00', 0, 0, 1, 19, 50850, 0, 'ACTIVADO', '2019-04-04 09:15:42', 6),
(31, '2019-04-05', '18:00:00', '21:20:00', 0, 0, 1, 19, 50850, 0, 'ACTIVADO', '2019-04-04 09:15:42', 6),
(32, '2019-04-06', '18:00:00', '21:20:00', 0, 0, 1, 19, 50850, 0, 'ACTIVADO', '2019-04-04 09:15:42', 6),
(33, '2019-04-07', '18:00:00', '21:20:00', 0, 0, 1, 19, 50850, 0, 'ACTIVADO', '2019-04-04 09:15:42', 6),
(34, '2019-04-08', '18:00:00', '21:20:00', 0, 0, 1, 19, 50850, 0, 'ACTIVADO', '2019-04-04 09:15:42', 6),
(35, '2019-04-09', '18:00:00', '21:20:00', 0, 0, 1, 19, 50850, 0, 'ACTIVADO', '2019-04-04 09:15:43', 6),
(36, '2019-04-10', '18:00:00', '21:20:00', 0, 0, 1, 19, 50850, 0, 'ACTIVADO', '2019-04-04 09:15:43', 6),
(37, '2019-04-11', '18:00:00', '20:12:00', 0, 0, 1, 16, 50856, 0, 'ACTIVADO', '2019-04-11 12:06:57', 5),
(38, '2019-04-12', '18:00:00', '20:12:00', 0, 0, 1, 16, 50856, 0, 'ACTIVADO', '2019-04-11 12:06:57', 5),
(39, '2019-04-13', '18:00:00', '20:12:00', 0, 0, 1, 16, 50856, 0, 'ACTIVADO', '2019-04-11 12:06:57', 5),
(40, '2019-04-14', '18:00:00', '20:12:00', 0, 0, 1, 16, 50856, 0, 'ACTIVADO', '2019-04-11 12:06:58', 5),
(41, '2019-04-15', '18:00:00', '20:12:00', 0, 0, 1, 16, 50856, 0, 'ACTIVADO', '2019-04-11 12:06:58', 5),
(42, '2019-04-16', '18:00:00', '20:12:00', 0, 0, 1, 16, 50856, 0, 'ACTIVADO', '2019-04-11 12:06:58', 5),
(43, '2019-04-17', '18:00:00', '20:12:00', 0, 0, 1, 16, 50856, 0, 'ACTIVADO', '2019-04-11 12:06:58', 5),
(44, '2019-04-12', '10:00:00', '13:20:00', 0, 0, 1, 19, 50856, 0, 'ACTIVADO', '2019-04-12 09:29:21', 5),
(45, '2019-04-13', '10:00:00', '13:20:00', 0, 0, 1, 19, 50856, 0, 'ACTIVADO', '2019-04-12 09:29:21', 5),
(46, '2019-04-14', '10:00:00', '13:20:00', 0, 0, 1, 19, 50856, 0, 'ACTIVADO', '2019-04-12 09:29:21', 5),
(47, '2019-04-15', '10:00:00', '13:20:00', 0, 0, 1, 19, 50856, 0, 'ACTIVADO', '2019-04-12 09:29:21', 5),
(48, '2019-04-16', '10:00:00', '13:20:00', 0, 0, 1, 19, 50856, 0, 'ACTIVADO', '2019-04-12 09:29:21', 5),
(49, '2019-04-17', '10:00:00', '13:20:00', 0, 0, 1, 19, 50856, 0, 'ACTIVADO', '2019-04-12 09:29:21', 5),
(50, '2019-04-18', '10:00:00', '13:20:00', 0, 0, 1, 19, 50856, 0, 'ACTIVADO', '2019-04-12 09:29:21', 5),
(51, '2019-04-17', '10:00:00', '13:02:00', 0, 0, 1, 18, 50850, 1, 'ACTIVADO', '2019-04-17 10:56:27', 1),
(52, '2019-04-18', '10:00:00', '13:02:00', 0, 0, 1, 18, 50850, 1, 'ACTIVADO', '2019-04-17 10:56:27', 1),
(53, '2019-04-19', '10:00:00', '13:02:00', 0, 0, 1, 18, 50850, 1, 'ACTIVADO', '2019-04-17 10:56:27', 1),
(54, '2019-04-20', '10:00:00', '13:02:00', 0, 0, 1, 18, 50850, 1, 'ACTIVADO', '2019-04-17 10:56:27', 1),
(55, '2019-04-21', '10:00:00', '13:02:00', 0, 0, 1, 18, 50850, 1, 'ACTIVADO', '2019-04-17 10:56:27', 1),
(56, '2019-04-22', '10:00:00', '13:02:00', 0, 0, 1, 18, 50850, 1, 'ACTIVADO', '2019-04-17 10:56:27', 1),
(57, '2019-04-23', '10:00:00', '13:02:00', 0, 0, 1, 18, 50850, 1, 'ACTIVADO', '2019-04-17 10:56:27', 1),
(58, '2019-04-17', '13:00:00', '16:02:00', 0, 0, 1, 17, 50850, 2, 'ACTIVADO', '2019-04-17 10:57:08', 6),
(59, '2019-04-18', '13:00:00', '16:02:00', 0, 0, 1, 17, 50850, 2, 'ACTIVADO', '2019-04-17 10:57:08', 6),
(60, '2019-04-19', '13:00:00', '16:02:00', 0, 0, 1, 17, 50850, 2, 'ACTIVADO', '2019-04-17 10:57:08', 6),
(61, '2019-04-20', '13:00:00', '16:02:00', 0, 0, 1, 17, 50850, 2, 'ACTIVADO', '2019-04-17 10:57:08', 6),
(62, '2019-04-21', '13:00:00', '16:02:00', 0, 0, 1, 17, 50850, 2, 'ACTIVADO', '2019-04-17 10:57:08', 6),
(63, '2019-04-22', '13:00:00', '16:02:00', 0, 0, 1, 17, 50850, 2, 'ACTIVADO', '2019-04-17 10:57:08', 6),
(64, '2019-04-23', '13:00:00', '16:02:00', 0, 0, 1, 17, 50850, 2, 'ACTIVADO', '2019-04-17 10:57:08', 6),
(65, '2019-04-26', '10:00:00', '13:40:00', 0, 0, 1, 21, 50852, 1, 'ACTIVADO', '2019-04-26 09:28:30', 1),
(66, '2019-04-27', '10:00:00', '13:40:00', 0, 0, 1, 21, 50852, 1, 'ACTIVADO', '2019-04-26 09:28:30', 1),
(67, '2019-04-28', '10:00:00', '13:40:00', 0, 0, 1, 21, 50852, 1, 'ACTIVADO', '2019-04-26 09:28:30', 1),
(68, '2019-04-29', '10:00:00', '13:40:00', 0, 0, 1, 21, 50852, 1, 'ACTIVADO', '2019-04-26 09:28:30', 1),
(69, '2019-04-30', '10:00:00', '13:40:00', 0, 0, 1, 21, 50852, 1, 'ACTIVADO', '2019-04-26 09:28:30', 1),
(70, '2019-05-01', '10:00:00', '13:40:00', 0, 0, 1, 21, 50852, 1, 'ACTIVADO', '2019-04-26 09:28:30', 1),
(71, '2019-05-02', '10:00:00', '13:40:00', 0, 0, 1, 21, 50852, 1, 'ACTIVADO', '2019-04-26 09:28:30', 1);

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
(10, '', '5', 'nnnnn', 155, 'sdf', 'Accion', 1, 0, '', 0, NULL, '2019-03-15 16:22:19', '2019-03-15 16:22:19', 2, '+13'),
(13, '', 'fff', 'nnnn', 155, 'mmmm', 'Accion', 0, 0, '', 0, NULL, '2019-03-15 16:25:46', '2019-03-15 16:25:46', 2, '+13'),
(15, '', '', 'AQUAMAN 3D DOBLADA', 180, 'pru', 'Accion', 1, 1, '', 0, NULL, '2019-03-27 17:35:12', '2019-03-27 17:35:12', 2, '+13'),
(16, '', '', 'CAPITANA MARVEL', 132, '', 'Accion', 1, 1, '', 0, NULL, '2019-03-27 17:36:05', '2019-03-27 17:36:05', 2, '+13'),
(17, '', '', 'Avenger end game', 182, 'Usa', 'Accion', 1, 1, '', 0, NULL, '2019-04-03 09:17:03', '2019-04-03 09:17:03', 2, 'ATP'),
(18, '', '', 'Avenger end game', 182, 'Usa', 'Accion', 1, 0, '', 0, NULL, '2019-04-03 09:17:31', '2019-04-03 09:17:31', 2, 'ATP'),
(19, '', '', 'DUMBO', 200, 'BOLIVIA', 'Ciencia Ficcion', 1, 1, '', 0, NULL, '2019-04-04 09:12:36', '2019-04-04 09:12:36', 2, 'ATP'),
(20, '', '', 'DUMBO', 200, 'BOLIVIA', 'Ciencia Ficcion', 1, 0, '', 0, NULL, '2019-04-04 09:13:09', '2019-04-04 09:13:09', 2, 'ATP'),
(21, '', '', 'LA LLORONA', 220, 'USA', 'Terror', 1, 1, '', 0, NULL, '2019-04-26 09:27:52', '2019-04-26 09:27:52', 2, '+18');

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
(1155, 1, 1),
(1156, 2, 1),
(1157, 3, 1),
(1158, 4, 1),
(1159, 5, 1),
(1160, 6, 1),
(1161, 7, 1),
(1162, 8, 1),
(1163, 9, 1),
(1164, 10, 1),
(1165, 11, 1),
(1166, 12, 1),
(1167, 13, 1),
(1168, 14, 1),
(1169, 15, 1),
(1170, 16, 1),
(1171, 17, 1),
(1172, 18, 1),
(1173, 19, 1),
(1174, 20, 1),
(1175, 21, 1),
(1176, 22, 1),
(1177, 23, 1),
(1178, 24, 1),
(1179, 25, 1),
(1180, 26, 1),
(1181, 27, 1),
(1182, 28, 1),
(1183, 29, 1),
(1184, 30, 1),
(1185, 31, 1),
(1186, 32, 1),
(1187, 33, 1),
(1188, 34, 1),
(1189, 35, 1),
(1190, 36, 1),
(1191, 37, 1),
(1192, 38, 1),
(1193, 39, 1),
(1194, 40, 1),
(1195, 41, 1),
(1196, 42, 1),
(1197, 43, 1),
(1198, 44, 1),
(1199, 45, 1),
(1200, 46, 1),
(1201, 47, 1),
(1202, 48, 1),
(1203, 49, 1),
(1204, 50, 1),
(1205, 51, 1),
(1206, 52, 1),
(1207, 53, 1),
(1208, 54, 1),
(1209, 55, 1),
(1210, 56, 1),
(1211, 57, 1),
(1212, 58, 1),
(1213, 59, 1),
(1214, 60, 1),
(1215, 61, 1),
(1216, 62, 1),
(1217, 63, 1),
(1218, 64, 1),
(1219, 65, 1),
(1220, 66, 1),
(1221, 67, 1),
(1222, 68, 1),
(1223, 69, 1),
(1224, 70, 1),
(1225, 71, 1),
(1226, 72, 1),
(1227, 73, 1),
(1228, 74, 1),
(1229, 75, 1),
(1230, 76, 1),
(1231, 77, 1),
(1232, 78, 1),
(1233, 79, 1),
(1234, 80, 1),
(1235, 81, 1),
(1236, 82, 1),
(1237, 83, 1),
(1238, 84, 1),
(1239, 85, 1),
(1240, 86, 1),
(1241, 87, 1),
(1242, 88, 1),
(1243, 89, 1),
(1244, 90, 1),
(1245, 91, 1),
(1246, 92, 1),
(1247, 93, 1),
(1248, 94, 1),
(1249, 95, 1),
(1250, 96, 1),
(1251, 97, 1),
(1252, 98, 1),
(1253, 99, 1),
(1254, 100, 1),
(1255, 101, 1),
(1256, 102, 1),
(1257, 103, 1),
(1258, 104, 1),
(1259, 105, 1),
(1260, 106, 1),
(1261, 107, 1);

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
(1, 1, 'SALA 1', 12, 12, 75, 120),
(3, 2, 'SALA 2', 10, 10, 50, 120),
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
(8, '444', 'dfdf', 33, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

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

--
-- Volcado de datos para la tabla `temporal`
--

INSERT INTO `temporal` (`idTemporal`, `fecha`, `idAsiento`, `idFuncion`, `numeroFuncion`, `numeroSala`, `serieTarifa`, `codSala`, `fechaFuncion`, `horaFuncion`, `idUser`, `fila`, `columna`, `costo`, `titulo`) VALUES
(71, '2019-05-02 08:58:13', 565, 71, 1, 2, 'ww', 50852, '2019-05-02', '10:00:00', 1, 3, 16, 30, 'LA LLORONA 3D');

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
  `idDosif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `fechaVenta`, `total`, `codigoControl`, `codigoQR`, `nroComprobante`, `tipoVenta`, `estado`, `idUsuario`, `idCliente`, `idDosif`) VALUES
(8, '2019-04-17 10:21:04', 40, '', '', 3, 'RECIBO', 'ANULADO', 1, 22, 6),
(15, '2019-04-17 11:45:42', 190, '28-79-B3-DB', '329448023|6|332401900008210|20190417|190|190|28-79-B3-DB|0|0|0|0|0.00', 7, 'FACTURA', 'ACTIVO', 1, 22, 6),
(17, '2019-04-17 15:15:28', 60, '', '', 4, 'RECIBO', 'ACTIVO', 1, 22, 6),
(18, '2019-04-17 15:19:31', 60, '', '', 5, 'RECIBO', 'ACTIVO', 1, 22, 6),
(20, '2019-04-17 15:30:20', 50, '2A-31-66-52-41', '329448023|9|332401900008210|20190417|50|50|2A-31-66-52-41|5769706|0|0|0|0.00', 10, 'FACTURA', 'ACTIVO', 1, 14, 6),
(21, '2019-04-17 18:17:49', 100, '52-DA-55-AE-83', '329448023|10|332401900008210|20190417|100|100|52-DA-55-AE-83|123456|0|0|0|0.00', 11, 'FACTURA', 'ACTIVO', 1, 23, 6),
(22, '2019-04-18 09:03:14', 60, '', '', 6, 'RECIBO', 'ACTIVO', 1, 22, 6),
(23, '2019-04-23 16:52:43', 100, '', '', 7, 'RECIBO', 'ACTIVO', 1, 22, 6),
(24, '2019-04-23 16:55:35', 60, 'B5-01-0F-97-C0', '329448023|11|332401900008210|20190423|60|60|B5-01-0F-97-C0|5769706|0|0|0|0.00', 12, 'FACTURA', 'ACTIVO', 1, 14, 6),
(25, '2019-04-24 09:03:16', 100, 'B9-E6-57-AA-E5', '329448023|13|332401900008210|20190424|100|100|B9-E6-57-AA-E5|5769706|0|0|0|0.00', 13, 'FACTURA', 'ACTIVO', 1, 14, 6),
(26, '2019-04-25 10:55:36', 100, '9C-85-F6-FD-1E', '329448023|14|332401900008210|20190425|100|100|9C-85-F6-FD-1E|5769706|0|0|0|0.00', 14, 'FACTURA', 'ACTIVO', 1, 14, 6),
(27, '2019-04-25 11:37:52', 50, '04-7B-C7-53-FA', '329448023|15|332401900008210|20190425|50|50|04-7B-C7-53-FA|5769706|0|0|0|0.00', 15, 'FACTURA', 'ACTIVO', 1, 14, 6),
(28, '2019-04-26 09:29:19', 30, 'EF-FD-0D-E1-6B', '329448023|16|332401900008210|20190426|30|30|EF-FD-0D-E1-6B|5769706|0|0|0|0.00', 16, 'FACTURA', 'ACTIVO', 1, 14, 6),
(29, '2019-04-26 09:33:59', 60, '', '', 8, 'RECIBO', 'ACTIVO', 1, 22, 6),
(30, '2019-04-26 09:36:01', 60, '', '', 9, 'RECIBO', 'ACTIVO', 1, 22, 6),
(31, '2019-04-30 14:54:59', 60, '', '', 10, 'RECIBO', 'ACTIVO', 1, 22, 6),
(32, '2019-04-30 14:55:42', 60, '', '', 11, 'RECIBO', 'ACTIVO', 1, 22, 6);

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
  MODIFY `idBoleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `butaca`
--
ALTER TABLE `butaca`
  MODIFY `idButaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  MODIFY `idCosto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `idFuncion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1262;

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
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `idTemporal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
