-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2019 a las 15:30:28
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
  `idVenta` int(11) NOT NULL,
  `idCupon` int(11) DEFAULT NULL,
  `tipoCompra` varchar(10) NOT NULL,
  `idTarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`idBoleto`, `numboc`, `numero`, `fecha`, `idFuncion`, `idUsuario`, `idAsiento`, `numeroFuncion`, `numeroSala`, `serieTarifa`, `codigoSala`, `fechaFuncion`, `horaFuncion`, `fila`, `columna`, `costo`, `titulo`, `devuelto`, `idVenta`, `idCupon`, `tipoCompra`, `idTarifa`) VALUES
(73, '350856201905092EE-1', 1, '2019-05-06 10:17:00', 103, 1, 838, 2, 3, 'EE', 50856, '2019-05-09', '10:00:00', 2, 12, 50, 'CEMENTERIO MALDITO 2D', 'NO', 34, NULL, 'FACTURA', 13),
(74, '350856201905092MC-1', 1, '2019-05-06 10:17:00', 93, 1, 856, 2, 3, 'MC', 50856, '2019-05-09', '12:30:00', 3, 11, 25, 'DUMBO 2D', 'NO', 34, NULL, 'FACTURA', 12),
(75, '350856201905091MC-2', 2, '2019-05-06 10:17:00', 93, 1, 856, 1, 3, 'MC', 50856, '2019-05-09', '12:30:00', 3, 11, 25, 'DUMBO 2D', 'NO', 34, NULL, 'FACTURA', 12),
(76, '350856201905091MC-3', 3, '2019-05-06 10:39:53', 93, 1, 823, 1, 3, 'MC', 50856, '2019-05-09', '12:30:00', 1, 16, 25, 'DUMBO 2D', 'NO', 35, NULL, 'FACTURA', 12),
(77, '350856201905091MC-4', 4, '2019-05-06 10:39:53', 93, 1, 824, 1, 3, 'MC', 50856, '2019-05-09', '12:30:00', 1, 17, 25, 'DUMBO 2D', 'NO', 35, NULL, 'FACTURA', 12),
(78, '350856201905091EE-2', 2, '2019-05-06 10:39:53', 103, 1, 824, 1, 3, 'EE', 50856, '2019-05-09', '10:00:00', 1, 17, 50, 'CEMENTERIO MALDITO 2D', 'NO', 35, NULL, 'FACTURA', 12),
(79, '350856201905091EE-3', 3, '2019-05-06 10:39:53', 103, 1, 823, 1, 3, 'EE', 50856, '2019-05-09', '10:00:00', 1, 16, 50, 'CEMENTERIO MALDITO 2D', 'NO', 35, NULL, 'FACTURA', 12),
(81, '350856201905061EE-2', 2, '2019-05-06 10:55:16', 100, 1, 856, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 3, 11, 50, 'CEMENTERIO MALDITO 2D', 'NO', 37, NULL, 'FACTURA', 12),
(82, '350856201905061EE-3', 3, '2019-05-06 11:15:08', 100, 1, 854, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 3, 9, 50, 'CEMENTERIO MALDITO 2D', 'NO', 38, NULL, 'FACTURA', 12),
(83, '350856201905061EE-4', 4, '2019-05-06 11:17:44', 100, 1, 818, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 1, 11, 50, 'CEMENTERIO MALDITO 2D', 'NO', 39, NULL, 'FACTURA', 12),
(84, '350856201905061EE-5', 5, '2019-05-06 11:22:57', 100, 1, 834, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 2, 8, 50, 'CEMENTERIO MALDITO 2D', 'NO', 40, NULL, 'FACTURA', 12),
(85, '350856201905061EE-6', 6, '2019-05-06 11:25:49', 100, 1, 817, 1, 3, 'EE', 50856, '2019-05-06', '10:00:00', 1, 10, 50, 'CEMENTERIO MALDITO 2D', 'NO', 41, NULL, 'FACTURA', 12),
(86, '250852201905091PT-1', 1, '2019-05-07 09:20:26', 110, 1, 542, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 10, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(87, '250852201905091PT-2', 2, '2019-05-07 09:20:26', 110, 1, 539, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 7, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(88, '250852201905091PT-3', 3, '2019-05-07 09:20:26', 110, 1, 540, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 8, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(89, '250852201905091PT-4', 4, '2019-05-07 09:20:26', 110, 1, 541, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 9, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(90, '250852201905091PT-5', 5, '2019-05-07 09:20:26', 110, 1, 543, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 2, 11, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(91, '250852201905091PT-6', 6, '2019-05-07 09:20:27', 110, 1, 560, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 11, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(92, '250852201905091PT-7', 7, '2019-05-07 09:20:27', 110, 1, 559, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 10, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(93, '250852201905091PT-8', 8, '2019-05-07 09:20:27', 110, 1, 558, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 9, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(94, '250852201905091PT-9', 9, '2019-05-07 09:20:27', 110, 1, 557, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 8, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(95, '250852201905091PT-10', 10, '2019-05-07 09:20:27', 110, 1, 556, 1, 2, 'PT', 50852, '2019-05-09', '16:00:00', 3, 7, 50, 'DETECTIVE PIKACHU 3D', 'NO', 42, NULL, 'FACTURA', 12),
(96, '250856201905091EE-4', 4, '2019-05-07 09:20:27', 103, 1, 837, 1, 2, 'EE', 50856, '2019-05-09', '10:00:00', 2, 11, 50, 'CEMENTERIO MALDITO 2D', 'NO', 42, NULL, 'FACTURA', 12),
(97, '250856201905091EE-5', 5, '2019-05-07 09:20:27', 103, 1, 836, 1, 2, 'EE', 50856, '2019-05-09', '10:00:00', 2, 10, 50, 'CEMENTERIO MALDITO 2D', 'NO', 42, NULL, 'FACTURA', 12),
(100, '350856201905071EE-1', 1, '2019-05-07 09:30:00', 101, 1, 855, 1, 3, 'EE', 50856, '2019-05-07', '10:00:00', 3, 10, 50, 'CEMENTERIO MALDITO 2D', 'NO', 44, NULL, 'FACTURA', 12),
(101, '150850201905091PT-1', 1, '2019-05-09 09:19:01', 107, 1, NULL, 1, 1, 'PT', 50850, '2019-05-09', '19:30:00', 5, 10, 50, 'DETECTIVE PIKACHU 3D', 'SI', 45, NULL, 'FACTURA', 12),
(102, '350856201905092EE-6', 6, '2019-05-09 09:20:21', 103, 1, NULL, 2, 3, 'EE', 50856, '2019-05-09', '10:00:00', 4, 10, 50, 'CEMENTERIO MALDITO 2D', 'SI', 46, NULL, 'FACTURA', 12),
(103, '250852201905101PT-1', 1, '2019-05-10 09:01:15', 111, 1, 541, 1, 2, 'PT', 50852, '2019-05-10', '16:00:00', 2, 9, 50, 'DETECTIVE PIKACHU 3D', 'NO', 47, NULL, 'FACTURA', 12),
(104, '250852201905101MC-2', 2, '2019-05-10 18:12:08', 111, 1, 577, 1, 2, 'MC', 50852, '2019-05-10', '16:00:00', 4, 11, 25, 'DETECTIVE PIKACHU 3D', 'NO', 48, NULL, 'FACTURA', 12),
(105, '350856201905102PT-1', 1, '2019-05-10 19:12:01', 104, 1, 897, 2, 3, 'PT', 50856, '2019-05-10', '10:00:00', 5, 14, 50, 'CEMENTERIO MALDITO 2D', 'NO', 49, NULL, 'FACTURA', 13),
(106, '150850201905231EE-1', 1, '2019-05-23 09:30:16', 117, 1, 723, 1, 1, 'EE', 50850, '2019-05-23', '10:00:00', 6, 11, 50, 'DETECTIVE PIKACHU 3D', 'NO', 50, NULL, 'FACTURA', 11),
(107, '150850201905231EE-2', 2, '2019-05-23 09:40:44', 117, 1, 743, 1, 1, 'EE', 50850, '2019-05-23', '10:00:00', 7, 12, 50, 'DETECTIVE PIKACHU 3D', 'NO', 51, NULL, 'FACTURA', 11),
(108, '150850201905231EE-3', 3, '2019-05-23 09:40:44', 117, 1, 746, 1, 1, 'EE', 50850, '2019-05-23', '10:00:00', 7, 15, 50, 'DETECTIVE PIKACHU 3D', 'NO', 51, NULL, 'FACTURA', 11),
(109, '150850201905231EE-4', 4, '2019-05-23 09:40:44', 117, 1, 744, 1, 1, 'EE', 50850, '2019-05-23', '10:00:00', 7, 13, 50, 'DETECTIVE PIKACHU 3D', 'NO', 51, NULL, 'FACTURA', 11),
(110, '150850201905231EE-5', 5, '2019-05-23 09:40:44', 117, 1, 764, 1, 1, 'EE', 50850, '2019-05-23', '10:00:00', 8, 14, 50, 'DETECTIVE PIKACHU 3D', 'NO', 51, NULL, 'FACTURA', 11),
(111, '150850201905231EE-6', 6, '2019-05-23 09:40:44', 117, 1, 762, 1, 1, 'EE', 50850, '2019-05-23', '10:00:00', 8, 12, 50, 'DETECTIVE PIKACHU 3D', 'NO', 51, NULL, 'FACTURA', 11),
(112, '150850201905241EE-1', 1, '2019-05-24 19:56:55', 118, 1, 721, 1, 1, 'EE', 50850, '2019-05-24', '10:00:00', 6, 9, 50, 'DETECTIVE PIKACHU 3D', 'NO', 52, NULL, 'FACTURA', 11);

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
-- Estructura de tabla para la tabla `combo`
--

CREATE TABLE `combo` (
  `idCombo` int(11) NOT NULL,
  `nombreCombo` varchar(200) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `activo` varchar(10) NOT NULL,
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
(1, 'COMBO_M1', 'COMBO PEQUE', 'on', '10.00', '7.40', '20.00', 'TIPA4.png', 'blue');

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
(1, 2, 1);

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
(2, 1, '2019-05-24 19:56:31', 'ingreso al sistema'),
(3, 1, '2019-05-27 08:53:58', 'ingreso al sistema'),
(4, 10, '2019-05-27 09:17:32', 'ingreso al sistema');

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
(18, '2019-05-15 09:02:26', '2019-05-15 00:00:00', 1, 'DIA DEL NIÑO 2019', 'ACTIVO');

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

INSERT INTO `detalle` (`idDetalle`, `idVentaCandy`, `idProducto`, `idCombo`, `esCombo`, `cantidad`, `pUnitario`, `idUsuario`, `nombreP`, `fecha`) VALUES
(1, 1, 2, NULL, 'NO', 2, '10.00', 1, 'sodA', '2019-05-22 16:52:57'),
(2, 2, 3, NULL, 'NO', 1, '9.00', 1, 'aquarius', '2019-05-22 16:52:57'),
(3, 3, NULL, 1, 'SI', 3, '20.00', 1, 'n1', '2019-05-22 16:53:32'),
(4, 1, 8, NULL, 'NO', 2, '20.00', 1, 'pipoca grande', '2019-05-23 10:30:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepreferencia`
--

CREATE TABLE `detallepreferencia` (
  `idDetPref` int(11) NOT NULL,
  `idDetalle` int(11) NOT NULL,
  `idPreferencia` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalletemporal`
--

CREATE TABLE `detalletemporal` (
  `idDtemporal` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `pUnitario` decimal(10,2) NOT NULL,
  `tCantidad` int(11) NOT NULL,
  `nombreP` varchar(200) NOT NULL,
  `idCombo` int(11) DEFAULT NULL,
  `esCombo` varchar(10) NOT NULL DEFAULT 'NO',
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalletemporal`
--

INSERT INTO `detalletemporal` (`idDtemporal`, `idProducto`, `pUnitario`, `tCantidad`, `nombreP`, `idCombo`, `esCombo`, `idUsuario`) VALUES
(1, 2, '9.00', 2, 'SODA', NULL, 'NO', 10);

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
(6, 400001984457, 332401900008210, 1, '38@#I#(Z95qd-@=2ja2JLFUUN)G6GBWCZE#-SVEDHgtQBh@qV_UHPqXSEvnCZJBB', '2019-04-02', '2019-09-26', 'Ley N° 453: Tienes derecho a un trato equitativo sin discriminacion en la oferta de servicios.', 1, 26, 'BOLETERIA'),
(7, 2020, 438401600000456, 2256, '5bSK47QZB+8*[A5A2FAtMu4QrBp=GQfB6%B9X@#)mk5eEF5T9Z*zyg5kAF2W557A', '2016-01-01', '2019-05-13', 'Ley N 453 ', 0, 2255, 'BOLETERIA');

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
(93, '2019-05-09', '12:30:00', '14:10:00', 'on', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:57'),
(94, '2019-05-10', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:57'),
(95, '2019-05-11', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:57'),
(96, '2019-05-12', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:58'),
(97, '2019-05-13', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:58'),
(98, '2019-05-14', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:58'),
(99, '2019-05-15', '12:30:00', '14:10:00', 'off', 'off', 1, 23, 50856, 1, 'ACTIVADO', '2019-05-06 09:34:58'),
(100, '2019-05-06', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 1, 'ACTIVADO', '2019-05-06 10:15:56'),
(101, '2019-05-07', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 1, 'ACTIVADO', '2019-05-06 10:15:56'),
(102, '2019-05-08', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 1, 'ACTIVADO', '2019-05-06 10:15:56'),
(103, '2019-05-09', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 2, 'ACTIVADO', '2019-05-06 10:15:56'),
(104, '2019-05-10', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 2, 'ACTIVADO', '2019-05-06 10:15:56'),
(105, '2019-05-11', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 2, 'ACTIVADO', '2019-05-06 10:15:56'),
(106, '2019-05-12', '10:00:00', '11:40:00', 'on', 'on', 1, 24, 50856, 2, 'ACTIVADO', '2019-05-06 10:15:56'),
(107, '2019-05-09', '19:30:00', '21:14:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-07 09:11:49'),
(110, '2019-05-09', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:03'),
(111, '2019-05-10', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:03'),
(112, '2019-05-11', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:03'),
(113, '2019-05-12', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:04'),
(114, '2019-05-13', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:04'),
(115, '2019-05-14', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:04'),
(116, '2019-05-15', '16:00:00', '17:44:00', 'on', 'on', 1, 25, 50852, 1, 'ACTIVADO', '2019-05-07 09:16:04'),
(117, '2019-05-23', '10:00:00', '11:44:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-23 09:29:28'),
(118, '2019-05-24', '10:00:00', '11:44:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-23 09:29:29'),
(119, '2019-05-25', '10:00:00', '11:44:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-23 09:29:29'),
(120, '2019-05-26', '10:00:00', '11:44:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-23 09:29:29'),
(121, '2019-05-27', '10:00:00', '11:44:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-23 09:29:29'),
(122, '2019-05-28', '10:00:00', '11:44:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-23 09:29:29'),
(123, '2019-05-29', '10:00:00', '11:44:00', 'on', 'on', 1, 25, 50850, 1, 'ACTIVADO', '2019-05-23 09:29:29');

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
(93, 12),
(100, 12),
(101, 12),
(103, 13),
(107, 12),
(110, 12),
(111, 12),
(104, 13),
(111, 13),
(112, 13),
(113, 12),
(114, 12),
(114, 13),
(115, 12),
(116, 11),
(99, 10),
(99, 12),
(117, 11),
(118, 11),
(119, 11),
(120, 11),
(121, 11),
(122, 11),
(123, 11);

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

INSERT INTO `pelicula` (`idPelicula`, `nombre`, `duracion`, `paisOrigen`, `genero`, `cartelera`, `formato`, `sipnosis`, `urlTrailer`, `imagen`, `fechaCr`, `fechaMod`, `idDistrib`, `clasificacion`) VALUES
(22, 'DUMBO', 100, 'EEUU', 'Aventura', 1, 1, '', 0, NULL, '2019-05-06 09:21:49', '2019-05-06 09:21:49', 6, 'ATP'),
(23, 'DUMBO', 100, 'EEUU', 'Aventura', 1, 0, '', 0, NULL, '2019-05-06 09:22:30', '2019-05-06 09:22:30', 6, 'ATP'),
(24, 'CEMENTERIO MALDITO', 100, 'EEUU', 'Terror', 1, 0, '', 0, NULL, '2019-05-06 10:15:22', '2019-05-06 10:15:22', 6, '+13'),
(25, 'DETECTIVE PIKACHU', 104, 'EEUU', 'Animada', 1, 1, '', 0, NULL, '2019-05-07 09:00:44', '2019-05-07 09:00:44', 7, 'ATP'),
(27, 'DETECTIVE PIKACHU', 104, 'EEUU', 'Animada', 1, 0, '', 0, NULL, '2019-05-07 09:01:15', '2019-05-07 09:01:15', 7, 'ATP');

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
(1415, 47, 1),
(1417, 49, 1),
(1421, 53, 1),
(1422, 54, 1),
(1423, 55, 1),
(1429, 61, 1),
(1430, 62, 1),
(1432, 64, 1),
(1433, 65, 1),
(1434, 66, 1),
(1435, 67, 1),
(1438, 70, 1),
(1439, 71, 1),
(1444, 76, 1),
(1445, 77, 1),
(1446, 78, 1),
(1447, 79, 1),
(1448, 80, 1),
(1449, 81, 1),
(1450, 82, 1),
(1451, 83, 1),
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
(1480, 45, 8),
(1481, 9, 9),
(1482, 1, 10),
(1483, 2, 10),
(1484, 3, 10),
(1485, 4, 10),
(1486, 5, 10),
(1487, 6, 10),
(1488, 7, 10),
(1489, 8, 10),
(1490, 9, 10),
(1491, 10, 10),
(1492, 11, 10),
(1493, 12, 10),
(1494, 13, 10),
(1495, 14, 10),
(1496, 15, 10),
(1497, 16, 10),
(1498, 17, 10),
(1499, 19, 10),
(1500, 20, 10),
(1501, 21, 10),
(1502, 22, 10),
(1503, 23, 10),
(1504, 24, 10),
(1505, 25, 10),
(1506, 26, 10),
(1507, 27, 10),
(1508, 28, 10),
(1509, 29, 10),
(1510, 30, 10),
(1511, 31, 10),
(1512, 32, 10),
(1513, 33, 10),
(1514, 34, 10),
(1515, 35, 10),
(1516, 36, 10),
(1517, 37, 10),
(1518, 38, 10),
(1519, 39, 10),
(1520, 40, 10),
(1521, 41, 10),
(1522, 42, 10),
(1523, 43, 10),
(1524, 44, 10),
(1525, 45, 10),
(1526, 47, 10),
(1527, 49, 10),
(1528, 53, 10),
(1529, 54, 10),
(1530, 55, 10),
(1531, 61, 10),
(1532, 62, 10),
(1533, 64, 10),
(1534, 65, 10),
(1535, 66, 10),
(1536, 67, 10),
(1537, 70, 10),
(1538, 71, 10),
(1539, 76, 10),
(1540, 77, 10),
(1541, 78, 10),
(1542, 79, 10),
(1543, 80, 10),
(1544, 81, 10),
(1545, 82, 10),
(1546, 83, 10),
(1547, 87, 10),
(1548, 88, 10),
(1549, 89, 10),
(1550, 90, 10),
(1551, 91, 10),
(1552, 92, 10),
(1553, 93, 10),
(1554, 94, 10),
(1555, 95, 10),
(1556, 96, 10),
(1557, 97, 10),
(1558, 98, 10),
(1559, 99, 10),
(1560, 100, 10),
(1561, 101, 10),
(1562, 102, 10),
(1563, 103, 10),
(1564, 104, 10),
(1565, 105, 10),
(1566, 106, 10),
(1567, 107, 10),
(1568, 108, 10),
(1569, 109, 10),
(1570, 110, 10),
(1571, 111, 10),
(1572, 112, 10),
(1573, 113, 10),
(1574, 114, 10),
(1575, 115, 10),
(1576, 116, 10),
(1577, 117, 10),
(1578, 118, 10),
(1579, 119, 10),
(1580, 120, 10),
(1581, 121, 10),
(1582, 122, 10),
(1583, 123, 10),
(1584, 124, 10),
(1585, 126, 10),
(1586, 127, 10),
(1587, 128, 10),
(1588, 129, 10),
(1589, 130, 10),
(1590, 132, 10),
(1591, 133, 10),
(1592, 134, 10),
(1593, 135, 10),
(1594, 136, 10),
(1595, 137, 10),
(1596, 138, 10),
(1597, 139, 10),
(1598, 140, 10),
(1599, 142, 10),
(1600, 143, 10),
(1601, 144, 10),
(1602, 145, 10),
(1603, 146, 10),
(1704, 1, 12),
(1705, 9, 12),
(1706, 11, 12),
(1707, 13, 12),
(1708, 83, 12),
(1709, 108, 12),
(1710, 109, 12),
(1711, 110, 12),
(1712, 111, 12),
(1713, 112, 12),
(1714, 113, 12),
(1715, 114, 12),
(1716, 115, 12),
(1717, 116, 12),
(1718, 117, 12),
(1719, 118, 12),
(1720, 119, 12),
(1721, 120, 12),
(1722, 121, 12),
(1723, 122, 12),
(1724, 123, 12),
(1725, 124, 12),
(1726, 126, 12),
(1727, 127, 12),
(1728, 128, 12),
(1729, 129, 12),
(1730, 130, 12),
(1731, 132, 12),
(1732, 133, 12),
(1733, 134, 12),
(1734, 135, 12),
(1735, 136, 12),
(1736, 137, 12),
(1737, 138, 12),
(1738, 139, 12),
(1739, 140, 12),
(1740, 142, 12),
(1741, 143, 12),
(1742, 144, 12),
(1743, 145, 12),
(1744, 146, 12),
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
(1805, 104, 11);

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
(11, 'AQU NARANJA', '', 'on');

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
(5, 'Caja Nachos', '', '2.00', '12.79', 'on', 'Nachos.png', 'blue', '17.00', 50, 5),
(6, 'PIPOCAS PEQUEÑAS', '', '1.00', '9.44', 'on', 'Bag Popcorn Chic.jpg', 'yellow', '12.00', 100, 5),
(7, 'PIPOCA MEDIANA', '', '1.00', '12.92', 'on', 'Bag Popcorn.png', 'yellow', '16.00', 100, 5),
(8, 'PIPOCA GRANDE', '', '1.00', '16.40', 'on', 'BALDE.png', 'yellow', '20.00', 100, 5),
(9, 'AGUA 500ML', 'AGUA 500 ML', '5.00', '1.96', 'on', 'Aguamineral.png', 'grey', '8.00', 100, 3),
(10, 'SODA ESCOLAR', '', '4.00', '1.22', 'on', 'VASO COCA 750.png', 'green', '6.00', 100, 3),
(11, 'GRANIZADO ESCOLAR', '', '3.00', '1.35', 'on', 'Icee.jpg', 'grey', '5.00', 100, 4);

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
(10, 1),
(10, 3),
(10, 4);

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
(4, 'HELADO', '', NULL, 'on', 'Icee.jpg', 'blue'),
(5, 'PIPOCAS', '', NULL, 'on', 'Pochoclo1.png', 'purple'),
(6, 'HOT DOG', '', NULL, 'on', 'Hotdog2.png', 'purple');

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
(146, 'Reimpresion', '143');

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
(11, '2019-05-15 09:02:26', 'ACTIVO', 18),
(12, '2019-05-15 09:02:26', 'ACTIVO', 18),
(13, '2019-05-15 09:02:26', 'ACTIVO', 18);

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
(8, 'COSME FULANITO', 'cosme', '123456'),
(9, 'prueba', 'ppp', '123456'),
(10, 'Administrador', 'SuperAdm', 'superadmin'),
(11, 'AdmBoleteria', 'ADMBOL', 'boleteria'),
(12, 'ADMCANDY', 'ADMCANDY', 'candybar');

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
(47, '2019-05-10 09:01:15', 50, '5C-81-AB-40', '329448023|21|332401900008210|20190510|50|50|5C-81-AB-40|7336199|0|0|0|0.00', 21, 'FACTURA', 'ACTIVO', 1, 24, 6, 0),
(48, '2019-05-10 18:12:08', 25, 'AD-05-62-FC', '329448023|22|332401900008210|20190510|25|25|AD-05-62-FC|5769706|0|0|0|0.00', 22, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(49, '2019-05-10 19:12:01', 50, '0E-09-86-68', '329448023|23|332401900008210|20190510|50|50|0E-09-86-68|5769706|0|0|0|0.00', 23, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(50, '2019-05-23 09:30:16', 50, '3F-1D-F0-F4-B1', '329448023|24|332401900008210|20190523|50|50|3F-1D-F0-F4-B1|5769706|0|0|0|0.00', 24, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(51, '2019-05-23 09:40:44', 250, 'B7-5C-BA-17', '329448023|25|332401900008210|20190523|250|250|B7-5C-BA-17|5769706|0|0|0|0.00', 25, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL),
(52, '2019-05-24 19:56:54', 50, 'D5-B0-24-EB', '329448023|26|332401900008210|20190524|50|50|D5-B0-24-EB|5769706|0|0|0|0.00', 26, 'FACTURA', 'ACTIVO', 1, 14, 6, NULL);

-- --------------------------------------------------------

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
  `nroComprobante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventacandy`
--

INSERT INTO `ventacandy` (`idVentaCandy`, `fechaVenta`, `total`, `tipoVenta`, `codigoControl`, `codigoQR`, `estado`, `idCliente`, `idDosif`, `idUsuario`, `nroComprobante`) VALUES
(1, '2019-05-22 12:14:04', '100.00', 'FACTURA', 'a1a1a', 'aaa2222', 'ACTIVO', 14, 7, 1, 6),
(2, '2019-05-22 12:18:17', '72.00', 'FACTURA', 'a1a1aa1', '2a2a2a2a', 'ACTIVO', 14, 7, 1, 9),
(3, '2019-05-21 00:00:00', '25.00', 'FACTURA', 'b3b3b', 'q3qq3', 'ACTIVO', 14, 7, 1, 66);

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
  MODIFY `idAsiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=941;

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `idBoleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
-- AUTO_INCREMENT de la tabla `combo`
--
ALTER TABLE `combo`
  MODIFY `idCombo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `controlingreso`
--
ALTER TABLE `controlingreso`
  MODIFY `idControlIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `costobutaca`
--
ALTER TABLE `costobutaca`
  MODIFY `idCosto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `idCupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detallepreferencia`
--
ALTER TABLE `detallepreferencia`
  MODIFY `idDetPref` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalletemporal`
--
ALTER TABLE `detalletemporal`
  MODIFY `idDtemporal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idDosif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `idFuncion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1806;

--
-- AUTO_INCREMENT de la tabla `preferencia`
--
ALTER TABLE `preferencia`
  MODIFY `idPreferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `idRubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50857;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `subcupon`
--
ALTER TABLE `subcupon`
  MODIFY `idsubcupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tempdetallepref`
--
ALTER TABLE `tempdetallepref`
  MODIFY `idtemdetpref` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `idTemporal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `ventacandy`
--
ALTER TABLE `ventacandy`
  MODIFY `idVentaCandy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idVentaCandy`) REFERENCES `ventacandy` (`idVentaCandy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ibfk_3` FOREIGN KEY (`idCombo`) REFERENCES `combo` (`idCombo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE,
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
