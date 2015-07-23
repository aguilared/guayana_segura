-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2015 a las 14:20:40
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `guayana_segura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delitos`
--

CREATE TABLE IF NOT EXISTS `delitos` (
  `delito_id` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `delitos`
--

INSERT INTO `delitos` (`delito_id`, `descripcion`) VALUES
(1, 'Agresion Fisica'),
(2, 'Agresion Juridica'),
(3, 'Agresion Psicologica'),
(4, 'Agresion Digital'),
(5, 'Agresion derechos humanos'),
(6, 'Agresion Especulativa'),
(7, 'Agresion a la autoridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delitos_detalles`
--

CREATE TABLE IF NOT EXISTS `delitos_detalles` (
  `delito_detalle_id` int(11) NOT NULL DEFAULT '0',
  `delito_id` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `delitos_detalles`
--

INSERT INTO `delitos_detalles` (`delito_detalle_id`, `delito_id`, `descripcion`) VALUES
(1, 1, 'Secuestro'),
(5, 1, 'Tortura'),
(6, 1, 'Desaparicion'),
(7, 1, 'Homicidio'),
(8, 1, 'Ahogamiento'),
(9, 1, 'Accidente Transito'),
(10, 1, 'Electrocutado'),
(11, 1, 'Suicidio'),
(12, 1, 'Arrollamiento'),
(22, 2, 'Detención arbitraria'),
(23, 2, 'Acoso legal'),
(30, 3, 'Amenaza'),
(31, 3, 'Ataques verbales'),
(32, 3, 'Campaña de desprestigio'),
(33, 3, 'Cobertura forzada'),
(41, 4, 'Robo o destrucción de archivos electrónicos'),
(42, 4, 'Espionaje'),
(43, 4, 'Ataques cibernéticos'),
(44, 4, 'Penetración de cuenta'),
(45, 4, 'Alteración del sitio web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `estado_id` smallint(6) DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_municipios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`estado_id`, `descripcion`, `cantidad_municipios`) VALUES
(1, 'Distrito Capital', 1),
(2, 'Amazonas', 7),
(3, 'Anzoátegui', 21),
(4, 'Apure', 7),
(5, 'Aragua', 18),
(6, 'Barinas', 12),
(7, 'Bolívar', 11),
(8, 'Carabobo', 14),
(9, 'Cojedes', 9),
(10, 'Delta Amacuro', 4),
(11, 'Falcón', 25),
(12, 'Guárico', 15),
(13, 'Lara', 9),
(14, 'Mérida', 23),
(15, 'Miranda', 21),
(16, 'Monagas', 13),
(17, 'Nueva Esparta', 11),
(18, 'Portuguesa', 14),
(19, 'Sucre', 15),
(20, 'Táchira', 29),
(21, 'Trujillo', 20),
(22, 'Vargas', 1),
(23, 'Yaracuy', 14),
(24, 'Zulia', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes`
--

CREATE TABLE IF NOT EXISTS `fuentes` (
  `fuente_id` int(11) DEFAULT NULL,
  `suceso_id` int(11) DEFAULT NULL,
  `link` mediumtext COLLATE utf8_unicode_ci,
  `periodico_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fuentes`
--

INSERT INTO `fuentes` (`fuente_id`, `suceso_id`, `link`, `periodico_id`, `titulo`) VALUES
(3, 14, '#http://www.correodelcaroni.com/index.php/sucesos/item/28987-ladrones-matan-de-un-tiro-a-una-de-sus-victimas-durante-corte-de-luz#', NULL, NULL),
(4, 15, '#http://www.correodelcaroni.com/index.php/sucesos/item/28986-matan-a-brasileno-en-la-via-a-caruachi#', NULL, NULL),
(5, 16, '#http://www.correodelcaroni.com/index.php/sucesos/item/28971-dos-amigos-mueren-al-recibir-mas-de-40-disparos#', NULL, NULL),
(6, 17, '#http://www.correodelcaroni.com/index.php/sucesos/item/28916-le-dispararon-porque-la-moto-no-prendio#', NULL, NULL),
(7, 18, '#http://www.correodelcaroni.com/index.php/sucesos/item/17987-acribillado-en-cambalache#', NULL, NULL),
(8, 16, '#http://nuevaprensa.com.ve/Acribillaron%20a%20dos%20hombres%20en%20Ciudad%20Bendita#', NULL, NULL),
(9, 19, '#http://nuevaprensa.com.ve/Matan%20a%20dirigente%20de%20UBCh#', NULL, NULL),
(10, 20, '#http://nuevaprensa.com.ve/Ultiman%20a%20trabajador%20de%20la%20Polar%20en%20Francisca%20Duarte#', NULL, NULL),
(NULL, 29, '#http://www.eldiariodeguayana.com.ve/sucesos/16700-nino-muere-tiroteado-en-fuego-cruzado.html#', NULL, NULL),
(NULL, 26, '#http://www.eldiariodeguayana.com.ve/sucesos/16700-nino-muere-tiroteado-en-fuego-cruzado.html#', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes_histo_homicidios`
--

CREATE TABLE IF NOT EXISTS `fuentes_histo_homicidios` (
  `fuente_id` int(11) DEFAULT NULL,
  `histo_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `link` mediumtext COLLATE utf8_unicode_ci,
  `periodico_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fuentes_histo_homicidios`
--

INSERT INTO `fuentes_histo_homicidios` (`fuente_id`, `histo_id`, `fecha`, `link`, `periodico_id`, `titulo`) VALUES
(1, 1, '2015-03-15 00:00:00', '#http://www.correodelcaroni.com/index.php/sucesos/item/28846-siguen-impunes-450-homicidios-cometidos-en-caroni-durante-2014#', 1, 'Siguen impunes 450 homicidios cometidos en Caroní durante 2014'),
(3, 2, NULL, '#http://www.nuevaprensa.com.ve/133%20familias%20sin%20justicia%20en%20lo%20que%20va%20de%20a%C3%B1o%20en%20Ciudad%20Guayana#', 3, '133 familias sin justicia en lo que va de año en Ciudad Guayana'),
(4, 1, '2014-12-07 00:00:00', '#http://www.correodelcaroni.com/index.php/sucesos/secuelas-de-la-impunidad#', 1, 'SECUELAS DE LA IMPUNIDAD'),
(5, 1, '2014-04-10 00:00:00', '#http://www.el-nacional.com/bbc_mundo/Venezuela-segundo-pais-homicidios-mundo_0_388761202.html#', 5, 'Venezuela es el segundo país con más homicidios en el mundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histo_homicidios`
--

CREATE TABLE IF NOT EXISTS `histo_homicidios` (
  `histo_id` int(11) NOT NULL DEFAULT '0',
  `estado_id` smallint(6) DEFAULT NULL,
  `municipio_id` smallint(6) DEFAULT NULL,
  `ano` smallint(6) DEFAULT NULL,
  `delito_id` int(11) DEFAULT NULL,
  `delito_detalle_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `total_semestre_1` smallint(6) DEFAULT NULL,
  `total_semestre_2` smallint(6) DEFAULT NULL,
  `total_vzla` int(11) DEFAULT NULL,
  `total_resueltos` smallint(6) DEFAULT NULL,
  `total_resueltos_vzla` int(11) DEFAULT NULL,
  `impunidad` smallint(6) DEFAULT NULL,
  `impunidad_vzla` int(11) DEFAULT NULL,
  `tasa_x_100k` float DEFAULT NULL,
  `tasa_x_100k_caracas` float DEFAULT NULL,
  `tasa_x_100k_vzla` float DEFAULT NULL,
  `ranking_mundial` int(11) DEFAULT NULL,
  `ranking_mundial_caracas` int(11) DEFAULT NULL,
  `hombres` smallint(6) DEFAULT NULL,
  `menores` smallint(6) DEFAULT NULL,
  `mujeres` smallint(6) DEFAULT NULL,
  `edad_promedio` decimal(2,1) NOT NULL,
  `arma_d_fuego` smallint(6) DEFAULT NULL,
  `en_san_felix` smallint(6) DEFAULT NULL,
  `en_puerto_ordaz` smallint(6) DEFAULT NULL,
  `arma_blanca` smallint(6) DEFAULT NULL,
  `arma_contusa` smallint(6) DEFAULT NULL,
  `enero` smallint(6) DEFAULT NULL,
  `febrero` smallint(6) DEFAULT NULL,
  `marzo` smallint(6) DEFAULT NULL,
  `abril` smallint(6) DEFAULT NULL,
  `mayo` smallint(6) DEFAULT NULL,
  `junio` smallint(6) DEFAULT NULL,
  `julio` int(11) DEFAULT NULL,
  `agosto` smallint(6) DEFAULT NULL,
  `septiembre` smallint(6) DEFAULT NULL,
  `octubre` smallint(6) DEFAULT NULL,
  `noviembre` smallint(6) DEFAULT NULL,
  `diciembre` smallint(6) DEFAULT NULL,
  `pa_cachamay` smallint(6) DEFAULT NULL,
  `pa_chirica` smallint(6) DEFAULT NULL,
  `pa_dalla_costa` smallint(6) DEFAULT NULL,
  `pa_once_de_abril` smallint(6) DEFAULT NULL,
  `pa_pozo_verde` smallint(6) DEFAULT NULL,
  `pa_simon_bolivar` smallint(6) DEFAULT NULL,
  `pa_unare` smallint(6) DEFAULT NULL,
  `pa_universidad` smallint(6) DEFAULT NULL,
  `pa_vista_al_sol` smallint(6) DEFAULT NULL,
  `pa_yocoima` smallint(6) DEFAULT NULL,
  `total_ano_anterior` int(11) DEFAULT NULL,
  `acumulado_a_la_fecha` int(11) DEFAULT NULL,
  `fuente` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otra_fuente1` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otra_fuente2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_ingreso_data` datetime DEFAULT NULL,
  `fecha_modifi_data` datetime DEFAULT NULL,
  `usuario` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `histo_homicidios`
--

INSERT INTO `histo_homicidios` (`histo_id`, `estado_id`, `municipio_id`, `ano`, `delito_id`, `delito_detalle_id`, `total`, `total_semestre_1`, `total_semestre_2`, `total_vzla`, `total_resueltos`, `total_resueltos_vzla`, `impunidad`, `impunidad_vzla`, `tasa_x_100k`, `tasa_x_100k_caracas`, `tasa_x_100k_vzla`, `ranking_mundial`, `ranking_mundial_caracas`, `hombres`, `menores`, `mujeres`, `edad_promedio`, `arma_d_fuego`, `en_san_felix`, `en_puerto_ordaz`, `arma_blanca`, `arma_contusa`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `pa_cachamay`, `pa_chirica`, `pa_dalla_costa`, `pa_once_de_abril`, `pa_pozo_verde`, `pa_simon_bolivar`, `pa_unare`, `pa_universidad`, `pa_vista_al_sol`, `pa_yocoima`, `total_ano_anterior`, `acumulado_a_la_fecha`, `fuente`, `otra_fuente1`, `otra_fuente2`, `fecha_ingreso_data`, `fecha_modifi_data`, `usuario`) VALUES
(1, 7, 4, 2014, 1, 7, 537, NULL, NULL, 24980, 87, NULL, NULL, NULL, NULL, NULL, 82, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5940, 'http://www.correodelcaroni.com/index.php/sucesos/item/28846-siguen-impunes-450-homicidios-cometidos-', 'http://www.lapatilla.com/site/2015/06/29/cifras-rojas-en-revolucion-venezuela-cuadruplica-tasa-de-ho', NULL, NULL, NULL, '9504'),
(2, 7, 4, 2015, 1, NULL, 274, NULL, NULL, 12200, 10, NULL, 194, NULL, NULL, NULL, NULL, 12, NULL, 261, 19, 13, '0.0', 249, 194, 80, 13, 12, 55, 47, 42, 43, 44, 43, NULL, NULL, NULL, NULL, NULL, NULL, 8, 36, 34, 42, 9, 32, 69, 6, 29, 7, NULL, 6078, 'http://correodelcaroni.com/index.php/sucesos/item/33886-la-muerte-los-prefiere-de-26', 'http://nuevaprensa.com.ve/269 asesinatos en el primer semestre del aÃ±o', 'http://correodelcaroni.com/index.php/sucesos?start=7', '2015-07-04 00:00:00', '2015-07-05 00:00:00', '9504'),
(3, 7, 4, 2005, 1, 7, 520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504'),
(4, 7, 4, 2006, 1, 7, 605, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504'),
(5, 7, 4, 2007, 1, 7, 677, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504'),
(6, 7, 4, 2008, 1, 7, 645, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504'),
(7, 7, 4, 2009, 1, 7, 631, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504'),
(8, 7, 4, 2010, 1, 7, 634, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504'),
(9, 7, 4, 2011, 1, 7, 565, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504'),
(10, 7, 4, 2012, 1, 7, 585, NULL, NULL, 16072, NULL, NULL, NULL, NULL, NULL, NULL, 53.7, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504'),
(11, 7, 4, 2013, 1, 7, 592, NULL, NULL, 24763, NULL, NULL, NULL, NULL, NULL, NULL, 79, NULL, NULL, NULL, NULL, NULL, '0.0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9504');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `municipio_id` smallint(6) NOT NULL DEFAULT '0',
  `estado_id` smallint(6) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`municipio_id`, `estado_id`, `descripcion`) VALUES
(1, 7, 'HERES'),
(2, 7, 'BLVNO ANGOSTURA'),
(3, 7, 'CARONI'),
(4, 7, 'CEDE#O'),
(5, 7, 'EL CALLAO'),
(6, 7, 'GRAN SABANA'),
(7, 7, 'PADRE PEDRO CHIEN'),
(8, 7, 'PIAR'),
(9, 7, 'ROSCIO'),
(10, 7, 'SIFONTES'),
(11, 7, 'SUCRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE IF NOT EXISTS `parroquias` (
  `parroquia_id` int(11) NOT NULL DEFAULT '0',
  `municipio_id` int(11) DEFAULT NULL,
  `estado_id` smallint(6) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capital_sector` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `latitud2` float DEFAULT NULL,
  `longitud2` float DEFAULT NULL,
  `latitud3` float DEFAULT NULL,
  `longitud3` float DEFAULT NULL,
  `latitud4` float DEFAULT NULL,
  `longitud4` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `parroquias`
--

INSERT INTO `parroquias` (`parroquia_id`, `municipio_id`, `estado_id`, `descripcion`, `capital_sector`, `latitud`, `longitud`, `latitud2`, `longitud2`, `latitud3`, `longitud3`, `latitud4`, `longitud4`) VALUES
(711, 1, 7, 'AGUA SALADA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(712, 1, 7, 'CATEDRAL', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(713, 1, 7, 'JOSE ANTONIO PAEZ', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(714, 1, 7, 'LA SABANITA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(715, 1, 7, 'MARHUANTA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(716, 1, 7, 'ORINOCO', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(717, 1, 7, 'PANAPANA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(718, 1, 7, 'VISTA HERMOSA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(719, 1, 7, 'ZEA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(721, 2, 7, 'CIUDAD PIAR', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(722, 2, 7, 'BARCELONETA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(723, 2, 7, 'SAN FRANCISCO', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(724, 2, 7, 'SANTA BARBARA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(731, 3, 7, 'CACHAMAY', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(732, 3, 7, 'CHIRICA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(733, 3, 7, 'DALLA COSTA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(734, 3, 7, 'ONCE DE ABRIL', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(735, 3, 7, 'POZO VERDE', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(736, 3, 7, 'SIMON BOLIVAR', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(737, 3, 7, 'UNARE', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(738, 3, 7, 'UNIVERSIDAD', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(739, 3, 7, 'VISTA AL SOL', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(741, 4, 7, 'CAICARA DEL ORINOCO', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(742, 4, 7, 'ALTAGRACIA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(743, 4, 7, 'ASCENSION FARRERAS', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(744, 4, 7, 'GUANIAMO', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(745, 4, 7, 'LA URBANA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(746, 4, 7, 'PIJIGUAOS', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(751, 5, 7, 'EL CALLAO', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(761, 6, 7, 'EL CALLAOSANTA ELENA DE UAIREN', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(762, 6, 7, 'IKABARU', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(771, 7, 7, 'EL PALMAR', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(781, 8, 7, 'EL PALMARUPATA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(782, 8, 7, 'ANDRES ELOY BLANCO', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(783, 8, 7, 'PEDRO COVA', 'Upata', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(791, 9, 7, 'GUASIPATI', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(792, 9, 7, 'SALOM', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7101, 10, 7, 'TUMEREMO', 'Tumeremo', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7102, 10, 7, 'DALLA COSTA', 'El Dorado', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7103, 10, 7, 'SAN ISIDRO', 'Las Claritas', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7111, 11, 7, 'MARIPA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7112, 11, 7, 'ARIPAO', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7113, 11, 7, 'LAS MAJADAS', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7114, 11, 7, 'MOITACO', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7310, 3, 7, 'YOCOIMA', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodicos`
--

CREATE TABLE IF NOT EXISTS `periodicos` (
  `periodico_id` int(11) DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `periodicos`
--

INSERT INTO `periodicos` (`periodico_id`, `descripcion`) VALUES
(1, 'Correo del Caroni'),
(2, 'Elfortindeguayana'),
(3, 'Nueva Prensa'),
(4, 'Primicia'),
(5, 'El Nacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucesos`
--

CREATE TABLE IF NOT EXISTS `sucesos` (
`suceso_id` int(11) NOT NULL,
  `fecha_suceso` datetime DEFAULT NULL,
  `delito_id` int(11) DEFAULT NULL,
  `delito_detalle_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fuente` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otra_fuente1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otra_fuente2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otra_fuente3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_victima` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `tipo_arma` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT NULL,
  `municipio_id` smallint(6) DEFAULT NULL,
  `parroquia_id` smallint(6) DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `sector` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mi_reseña` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creado` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sucesos`
--

INSERT INTO `sucesos` (`suceso_id`, `fecha_suceso`, `delito_id`, `delito_detalle_id`, `titulo`, `fuente`, `otra_fuente1`, `otra_fuente2`, `otra_fuente3`, `nombre_victima`, `sexo`, `edad`, `tipo_arma`, `estado`, `municipio_id`, `parroquia_id`, `latitud`, `longitud`, `sector`, `usuario`, `mi_reseña`, `observaciones`, `fecha_creado`) VALUES
(1, '2015-06-05 00:00:00', 1, 7, 'Secuestro y persecuciÃ³n culminÃ³ con delincuente muerto y comerciante herido', 'http://elfortindeguayana.com/88970-secuestro-y-persecucion-culmino-con-delincuente-muerto-y-comercia', '', '', NULL, 'Sin identificacion', 'M', 0, 1, 7, 3, 731, 45, 45, 'el hueco', '9504', '', '', '2015-06-05 14:08:19'),
(2, '2015-06-04 00:00:00', 1, 7, 'Mueren dos jÃ³venes en hechos de violencias', 'http://elfortindeguayana.com/89049-mueren-dos-jovenes-en-hechos-de-violencias-en-tumeremo-y-upata/', '', '', NULL, 'Oscar Manzano Arrieta', 'M', 23, 1, 7, 8, 783, 45, 45, 'el hueco', '9504', '', '', '2015-06-05 14:33:45'),
(3, '2015-06-04 00:00:00', 1, 7, 'Mueren dos jÃ³venes en hechos de violencias en Tumeremo y Upata', 'http://elfortindeguayana.com/89049-mueren-dos-jovenes-en-hechos-de-violencias-en-tumeremo-y-upata/', '', '', NULL, 'Yensi Muñoz Torres', 'M', 24, 1, 7, 8, 782, 45, 45, 'el hueco', '9504', '', '', '2015-06-05 14:35:27'),
(16, '2015-06-04 00:00:00', 1, 7, 'Asesinado dentro de la mina San Pollo', 'http://nuevaprensa.com.ve/Asesinado dentro de la mina San Pollo', '', '', NULL, 'Carlos Jesus Vizcaino', 'M', 57, 1, 7, 0, 7103, 45, 45, 'el hueco', '9504', '', '', '2015-06-06 20:17:30'),
(17, '2015-06-05 00:00:00', 1, 7, 'Muerto a puñaladas en Los Arenales', 'http://www.primicia.com.ve/sucesos/muerto-a-punaladas-en-los-arenales.html', '', '', NULL, 'Joel Jose Jimenez Alvarezl', 'M', 30, 1, 7, 3, 731, 45, 45, 'el hueco', '9504', '', '', '2015-06-07 18:54:11'),
(19, '2015-06-06 00:00:00', 1, 7, 'Otro doble homicidio en Guasipati No.2', 'http://nuevaprensa.com.ve/Otro doble homicidio en Guasipati', '', '', NULL, 'Sin identificar', 'M', 100, 1, 7, 9, 791, 45, 45, 'el hueco', '9504', '', '', '2015-06-08 21:34:18'),
(23, '2015-06-06 00:00:00', 1, 7, 'Otro doble homicidio en Guasipati No.1', 'http://nuevaprensa.com.ve/Otro doble homicidio en Guasipati', '', '', NULL, 'Alexander José Solano Rojas', 'M', 34, 1, 7, 9, 791, 45, 45, 'el hueco', '9504', '', '', '2015-06-08 21:56:44'),
(24, '2015-06-06 00:00:00', 1, 7, 'Ex Coronel asesinado', 'http://www.correodelcaroni.com/index.php/sucesos/item/32768-breves-policiales', '', '', NULL, 'Jorge Rivas Orcila', 'M', 45, 1, 7, 8, 783, 45, 45, 'el hueco', '9504', '', '', '2015-06-09 14:03:51'),
(26, '2015-06-10 00:00:00', 1, 7, 'Niño de 11 años muere en medio de un sicariato', 'http://correodelcaroni.com/index.php/sucesos/item/32937-nino-de-11-anos-muere-por-bala-perdida-en-un', '', '', NULL, 'Adriel Daniel Cabeza Rodríguez', 'M', 11, 1, 7, 3, 733, 45, 45, 'calle principal del sector Las Bombitas, en San Félix', '9504', '', '', '2015-06-12 12:08:39'),
(27, '2015-03-17 00:00:00', 1, 7, 'Ejecutan con mÃ¡s de 40 balazos a dos jÃ³venes en la vÃ­a a Upata No 11', 'http://www.correodelcaroni.com/index.php/sucesos/item/28971-dos-amigos-mueren-al-recibir-mas-de-40-d', '', '', NULL, ' Irwin Marcan', 'M', 26, 1, 7, 3, 739, 45, 45, 'el hueco', '9504', '', '', '2015-06-13 15:46:24'),
(28, '2015-03-17 00:00:00', 1, 7, 'Ejecutan con mÃ¡s de 40 balazos a dos jÃ³venes en la vÃ­a a Upata No 2', 'http://www.correodelcaroni.com/index.php/sucesos/item/28971-dos-amigos-mueren-al-recibir-mas-de-40-d', '', '', NULL, 'Jhon Peter DÃ­az', 'M', 19, 1, 7, 3, 739, 45, 45, 'el hueco', '9504', '', '', '2015-06-13 15:48:04'),
(29, '2015-06-10 00:00:00', 1, 7, 'Asesinado sujeto que tenÃ­a seis meses de haber salido de Vista Hermosa', 'http://elfortindeguayana.com/89804-asesinado-sujeto-que-tenia-seis-meses-de-haber-salido-de-vista-he', '', '', NULL, 'Yorvis JosÃ© MÃ©ndez,', 'M', 25, 1, 7, 3, 733, 45, 45, 'el hueco', '9504', '', '', '2015-06-13 16:41:10'),
(30, '2015-06-11 00:00:00', 1, 7, 'Asesinado adolescente a manos de â€œEl Menorâ€', 'http://www.eldiariodeguayana.com.ve/sucesos/16770-asesinado-adolescente-a-manos-de-el-menor.html', '', '', NULL, 'William Blanco', 'M', 16, 1, 7, 3, 739, 45, 45, 'el hueco', '9504', '', '', '2015-06-13 19:32:49'),
(31, '2015-06-13 00:00:00', 1, 7, 'Lo asesinaron en pleno matinÃ©', 'http://www.eldiariodeguayana.com.ve/sucesos/16837-lo-asesinaron-en-pleno-matine.html', '', '', NULL, 'Cristian JosÃ© Andarria Salazar ', 'M', 20, 1, 7, 3, 739, 45, 45, 'el hueco', '9504', '', '', '2015-06-15 20:19:39'),
(32, '2015-06-14 00:00:00', 1, 7, 'Asesinado flaco tato', 'http://www.eldiariodeguayana.com.ve/sucesos/16836-asesinaron-a-flaco-taco-en-cambalache.html', '', '', NULL, 'JosÃ© Alberto Carpintero', 'M', 35, 2, 7, 3, 731, 45, 45, 'penduxxxxxsssssssaaaa', '9504', '', '', '2015-06-15 21:22:15'),
(33, '2015-06-07 00:00:00', 1, 7, 'Hombre apuÃ±alado en Upata era jubilado de Alcasa', 'http://correodelcaroni.com/index.php/sucesos/item/32905-hombre-apunalado-en-upata-era-jubilado-de-al', '', '', NULL, 'Argenio JosÃ© ChachÃ¡', 'M', 45, 1, 7, 8, 783, 45, 45, '', '', '', '', '2015-06-16 12:46:29'),
(34, '2015-06-14 00:00:00', 1, 7, 'Hallan cadÃ¡ver de un hombre en Los Alacranes', 'http://www.correodelcaroni.com/index.php/sucesos/item/33073-hallan-cadaver-de-un-hombre-en-los-alacr', '', '', NULL, 's/n', 'M', 0, 1, 7, 3, 736, 45, 45, '', '9504', '', '', '2015-06-16 12:49:14'),
(35, '2015-06-11 00:00:00', 1, 7, 'Hallan cadÃ¡ver en la vÃ­a al cementerio de Puerto Ordaz', 'http://correodelcaroni.com/index.php/sucesos/item/32991-hallan-cadaver-en-la-via-al-cementerio-de-pu', '', '', NULL, 's/n', 'M', 0, NULL, 7, 3, 731, 45, 45, '', '', '', '', '2015-06-16 12:55:38'),
(36, '2015-06-14 00:00:00', 1, 7, 'Doble homicidio en la frontera de Guaiparo victi. 1', 'http://www.eldiariodeguayana.com.ve/sucesos/16891-doble-homicidio-en-la-frontera-de-guaiparo.html', '', '', NULL, 'Carlos Gabriel Ugas', 'M', 20, NULL, 7, 3, 733, 45, 45, '', '', '', '', '2015-06-16 13:03:14'),
(37, '2015-06-14 00:00:00', 1, 7, 'Doble homicidio en la frontera de Guaiparo victi. 2', 'http://www.eldiariodeguayana.com.ve/sucesos/16891-doble-homicidio-en-la-frontera-de-guaiparo.html', '', '', NULL, 'Gabriel Ugas', 'M', 24, NULL, 7, 3, 733, 45, 45, '', '', '', '', '2015-06-16 13:04:47'),
(38, '2015-06-16 00:00:00', 1, 7, 'Dos GNB y un civil asesinan a ciclista', 'http://www.correodelcaroni.com/index.php/sucesos/item/33162-senalan-de-robo-y-homicidio-a-funcionari', 'http://www.eldiariodeguayana.com.ve/sucesos/16942-roban-y-asesinan-a-hombre-en-manoa.html,   http://', '', NULL, 'Oscar Eloy Palmares Sifontes', 'M', 44, 2, 7, 3, 736, 45, 45, '', '9504', '', '', '2015-06-17 13:00:16'),
(39, '2015-06-17 00:00:00', 1, 7, 'Caen abatidos integrantes de la banda de â€œEl Ãngeloâ€ vict 1', 'http://www.eldiariodeguayana.com.ve/sucesos/17004-caen-abatidos-integrantes-de-la-banda-de-el-angelo', '', '', NULL, 'Gregori AgustÃ­n FortÃ­n Sifones', 'M', 22, NULL, 7, 5, 751, 45, 45, 'vÃ­a El Choco, sector La Iguana, de El Callao', '9504', '', '', '2015-06-18 16:55:45'),
(40, '2015-06-17 00:00:00', 1, 7, 'Caen abatidos integrantes de la banda de â€œEl Ãngeloâ€ vict 2', 'http://www.eldiariodeguayana.com.ve/sucesos/17004-caen-abatidos-integrantes-de-la-banda-de-el-angelo', '', '', NULL, 'Randy JesÃºs Basanta Range', 'M', 23, NULL, 7, 5, 751, 45, 45, '', '9504', '', '', '2015-06-18 16:57:26'),
(41, '2015-06-17 00:00:00', 1, 7, 'Caen abatidos integrantes de la banda de â€œEl Ãngeloâ€ vict 3', 'http://www.eldiariodeguayana.com.ve/sucesos/17004-caen-abatidos-integrantes-de-la-banda-de-el-angelo', '', '', NULL, 'AndrÃ©s Alexander Ramos Salinas', 'M', 28, NULL, 7, 5, 751, 45, 45, '', '9504', '', '', '2015-06-18 16:58:48'),
(42, '2015-06-10 00:00:00', 1, 7, 'Golpean y asesinan a joven estudiante', 'http://www.eldiariodeguayana.com.ve/sucesos/16652-golpean-y-asesinan-a-joven-estudiante.html', 'http://www.eldiariodeguayana.com.ve/sucesos/16937-quiero-limpiar-el-nombre-de-mi-hijo.html', 'http://www.eldiariodeguayana.com.ve/sucesos/16937-quiero-limpiar-el-nombre-de-mi-hijo.html', NULL, 'Carlos Augusto Villalba', 'M', 23, 2, 7, 3, 737, 45, 45, '', '9504', '', '', '2015-06-18 20:58:47'),
(43, '2015-06-17 00:00:00', 1, 7, 'Joven es asesinado en un taller de sonidos', 'http://nuevaprensa.com.ve/Joven es asesinado en un taller de sonidos', NULL, NULL, NULL, 'Glengel JesÃºs PÃ©rez Cordero', 'M', 23, 2, 7, 1, 714, 45, 45, 'avenida BolÃ­var de la capital del estado', '9504', '', '', '2015-06-19 16:38:30'),
(44, '2015-06-18 00:00:00', 1, 7, 'Asesinado en la Victoria', 'http://nuevaprensa.com.ve/Tiroteado en La Victoria', 'http://www.eldiariodeguayana.com.ve/sucesos/17089-de-un-tiro-en-la-cabeza-asesinan-a-hombre-en-la-vi', NULL, NULL, 'VÃ­ctor JosÃ© Salazar MartÃ­nez', 'M', 26, 2, 7, 3, 739, 45, 45, 'n la manzana nÃºmero 62 del sector I de La Victoria', '9504', '', '', '2015-06-19 16:47:33'),
(45, '2015-06-18 00:00:00', 1, 7, 'Motorizados acribillan a hombre en Villa BahÃ­a', 'http://www.eldiariodeguayana.com.ve/sucesos/17139-motorizados-acribillan-a-hombre-en-villa-bahia.htm', NULL, NULL, NULL, 'Deivis Junior AlcalÃ¡ Azocar', 'M', 20, NULL, 7, 3, 737, 45, 45, ' avenida principal de Villa BahÃ­a, muy cerca de la parada usada por los mototaxistas del sector', '9504', '', '', '2015-06-20 15:02:38'),
(46, '2015-06-19 00:00:00', 1, 7, 'Asesinan a jubilado de Alcasa en Villa BahÃ­a', 'http://nuevaprensa.com.ve/Asesinan a jubilado de Alcasa en Villa BahÃ­a', NULL, NULL, NULL, 'Eloy Rafael Brown LÃ³pez', 'M', 63, NULL, 7, 3, 737, 45, 45, '', '9504', '', '', '2015-06-23 01:44:13'),
(47, '2015-06-20 00:00:00', 1, 7, 'Ultimado â€œel Guachiâ€ en La Unidad', 'http://nuevaprensa.com.ve/Ultimado â€œel Guachiâ€ en La Unidad', NULL, NULL, NULL, 'Miguel Ãngel Guilarte Almarza', 'M', 24, NULL, 7, 3, 736, 45, 45, '', '9504', '', '', '2015-06-23 01:46:58'),
(49, '2015-06-20 00:00:00', 1, 7, 'Liquidaron a hombre en Lomas del CaronÃ­', 'http://nuevaprensa.com.ve/Liquidaron a hombre en Lomas del CaronÃ­', NULL, NULL, NULL, 'Lervis JosÃ© Barrios Zerpa', 'M', 27, NULL, 7, 3, 737, 45, 45, '', '9504', '', '', '2015-06-23 01:53:26'),
(50, '2015-06-20 00:00:00', 1, 7, 'En menos de seis horas se registraron dos muertes en San FÃ©lix. vict 1', 'http://nuevaprensa.com.ve/En menos de seis horas se registraron dos muertes en San FÃ©lix', NULL, NULL, NULL, 'Jean Carlos GonzÃ¡lez', 'M', 39, 2, 7, 3, 739, 45, 45, '', '9504', '', '', '2015-06-23 01:56:29'),
(51, '2015-06-20 00:00:00', 1, 7, 'En menos de seis horas se registraron dos muertes en San FÃ©lix. vict 2', 'http://nuevaprensa.com.ve/En menos de seis horas se registraron dos muertes en San FÃ©lix', NULL, NULL, NULL, 'Yeisael ValentÃ­n CedeÃ±o', 'M', 18, NULL, 7, 3, 739, 45, 45, 'adyacencias del Colegio Mario BriceÃ±o Iragorry,', '9504', '', '', '2015-06-23 02:01:33'),
(52, '2015-06-20 00:00:00', 1, 7, 'Doble homicidio en Ciudad BolÃ­var. vict 1', 'http://nuevaprensa.com.ve/node/1692', NULL, NULL, NULL, 'Enrique HernÃ¡ndez Rojas', 'M', 26, NULL, 7, 1, 714, 45, 45, '', '9504', '', '', '2015-06-23 02:06:39'),
(53, '2015-06-20 00:00:00', 1, 7, 'Doble homicidio en Ciudad BolÃ­var. vict 2', 'http://nuevaprensa.com.ve/node/1692', NULL, NULL, NULL, 'JosÃ© Manuel ZacarÃ­as', '0', 20, NULL, 7, 1, 714, 45, 45, ' vereda II del sector 05 de la urbanizaciÃ³n El PerÃº', '9504', '', '', '2015-06-23 02:08:26'),
(54, '2015-06-21 00:00:00', 1, 7, 'Tres asesinatos en el municipio Sifontes', 'http://nuevaprensa.com.ve/Tres asesinatos en el municipio Sifontes', NULL, NULL, NULL, 'Luis Gustavo BolÃ­var MalavÃ©', 'M', 42, NULL, 7, 10, 7101, 45, 45, ' calle Zea frente al hotel Miranda', '9504', '', '', '2015-06-23 02:11:36'),
(55, '2015-06-21 00:00:00', 1, 7, 'Tres asesinatos en el municipio Sifontes vict 2', 'http://nuevaprensa.com.ve/Tres asesinatos en el municipio Sifontes', NULL, NULL, NULL, 'Frank Manuel BolÃ­var Aguinalde', 'M', 41, NULL, 7, 10, 7101, 45, 45, 'Licoeweia alle Zea frente al hotel Miranda, en el centro de la ciudad.', '9504', '', '', '2015-06-23 02:13:13'),
(56, '2015-06-21 00:00:00', 1, 7, 'Tres asesinatos en el municipio Sifontes vict 3', 'http://nuevaprensa.com.ve/Tres asesinatos en el municipio Sifontes', 'http://www.eldiariodeguayana.com.ve/sucesos/17288-asesinan-a-otro-minero-en-el-88.html', NULL, NULL, 'Yersi Caminero', 'M', 18, 2, 7, 10, 7101, 45, 45, 'zona boscosa del sector Los Cuatro Muertos.', '9504', '', '', '2015-06-23 02:15:22'),
(57, '2015-06-21 00:00:00', 1, 7, 'Aniquilan a joven mientras dormÃ­a ', 'http://nuevaprensa.com.ve/Aniquilan a joven mientras dormÃ­a', 'http://www.eldiariodeguayana.com.ve/sucesos/17277-ultimado-dentro-de-su-casa.html', NULL, NULL, 'Jhoner Alejandro Romero', 'F', 24, 2, 7, 3, 737, 45, 45, 'la manzana 39 de la invasiÃ³n Barrio Chino, ubicada en el sector UD-338 de Puerto Ordaz.', '9504', '', '', '2015-06-25 01:04:00'),
(58, '2015-06-21 00:00:00', 1, 7, 'Abatido menor de 13 aÃ±os en atraco', 'http://nuevaprensa.com.ve/Abatido menor de 13 aÃ±os en atraco', NULL, NULL, NULL, 'sin identificacion', 'M', 13, NULL, 7, 10, 7101, 45, 45, 'un cyber ubicado en las adyacencias de la plaza BolÃ­var', '9504', '', '', '2015-06-25 01:07:55'),
(59, '2015-06-20 00:00:00', 1, 7, 'Asesinan estudiante del Inces', 'http://nuevaprensa.com.ve/Asesinan estudiante del Inces', NULL, NULL, NULL, 'Brayan JosÃ© PÃ©rez', 'M', 21, NULL, 7, 3, 736, 45, 45, 'la avenida 3, del sector I de Los Alacranes, San FÃ©lix', '9504', '', '', '2015-06-25 01:12:35'),
(61, '2015-06-24 00:00:00', 1, 7, 'Fue asesinada por defender a su hija', 'http://www.eldiariodeguayana.com.ve/sucesos/17407-fue-asesinada-por-defender-a-su-hija.html', 'http://nuevaprensa.com.ve/node/1860', 'http://correodelcaroni.com/index.php/sucesos/item/33564-asesinan-a-madre-de-hija-que-bailo-con-un-ho', NULL, 'Yulimar del Valle Meza Freites', 'F', 36, 2, 7, 3, 739, 45, 45, ' sector Villa la Manga, en San FÃ©lix', '9504', '', '', '2015-06-25 14:04:33'),
(62, '2015-06-24 00:00:00', 1, 7, 'Localizan cadÃ¡ver descompuesto en Ciudad Bendita', 'http://nuevaprensa.com.ve/node/1859', 'http://www.eldiariodeguayana.com.ve/sucesos/17403-encuentran-cuerpo-en-avanzado-estado-de-descomposi', 'http://nuevaprensa.com.ve/Joven hallado en Ciudad Bendita era de Tumeremo', NULL, 'Danny JosÃ© Ochoa Ascaneo', 'M', 20, 2, 7, 3, 732, 45, 45, 'comunidad campesina Ciudad Bendita, ubicada vÃ­a a El Rosario', '9504', '', '', '2015-06-25 14:11:30'),
(63, '2015-06-24 00:00:00', 1, 7, 'Ultimado en Chirica Vieja', 'http://www.eldiariodeguayana.com.ve/sucesos/17406-ultimado-en-chirica-vieja.html', NULL, NULL, NULL, 'Wilfredo Rafael Salazar Vallera', 'M', 32, NULL, 7, 3, 732, 45, 45, '', '9504', '', '', '2015-06-25 14:15:37'),
(64, '2015-06-24 00:00:00', 1, 7, 'Hechos violentos ascienden en Ciudad Guayana', 'http://nuevaprensa.com.ve/Hechos violentos ascienden en Ciudad Guayana', NULL, NULL, NULL, 'Antony Barrios', 'M', 20, NULL, 7, 3, 737, 45, 45, 'cercanÃ­as de Parques del Cementerio Jardines del Orinoco en la vÃ­a Caracas, Puerto Ordaz.', '9504', '', '', '2015-06-25 14:18:45'),
(65, '2015-06-24 00:00:00', 1, 7, 'Cinco muertes en Guasipai', 'http://nuevaprensa.com.ve/Cinco muertos en Guasipati', NULL, NULL, NULL, 'Elvis Manuel PÃ©rez Flores', 'M', 21, 2, 7, 9, 791, 45, 45, 'sector Vista Hermosa', '9504', '', '', '2015-06-26 19:24:57'),
(66, '2015-06-25 00:00:00', 1, 7, 'MuriÃ³ joven baleado en Unare', 'http://nuevaprensa.com.ve/MuriÃ³ joven baleado en Unare', NULL, NULL, NULL, 'Romaldi CedeÃ±o', 'M', 20, NULL, 7, 3, 737, 45, 45, '', '9504', '', '', '2015-06-27 15:35:34'),
(67, '2015-06-24 00:00:00', 1, 7, 'Cinco muertos en Guasipati Vict. 1', 'http://localhost/guayana_s/sucesos/index.php', 'http://localhost/guayana_s/sucesos/index.php', 'http://localhost/guayana_s/sucesos/index.php', NULL, 'Wuares Alexander Correa Chaura', 'M', 18, NULL, 7, 9, 791, 45, 45, 'sector Vista Hermosa', '9504', '', '', '2015-06-27 18:00:30'),
(68, '2015-06-27 00:00:00', 1, 7, 'Hombre asesinado durante fiesta en Toro Muerto', 'http://nuevaprensa.com.ve/Hombre asesinado durante fiesta en Toro Muerto', '', '', NULL, 'Anderson Leonel Naranjo SuÃ¡rez', 'M', 37, NULL, 7, 3, 737, 45, 45, 'sector La Hoyada de Toro Muerto.', '9504', '', '', '2015-06-29 13:36:56'),
(69, '2015-05-13 00:00:00', 1, 7, 'Capturados homicidas de taxista en la Ruta II de Vista al Sol', 'http://nuevaprensa.com.ve/Capturados homicidas de taxista en la Ruta II de Vista al Sol', '', '', NULL, 'JosÃ© AsunciÃ³n Suniaga RodrÃ­guez', 'M', 24, NULL, 7, 3, 739, 45, 45, 'vereda 22 del sector El Hueco, ubicado en Vista al Sol', '9504', '', '', '2015-06-29 13:43:34'),
(71, '2015-06-27 00:00:00', 1, 7, 'Degollado un hombre en Buen Retiro', 'http://nuevaprensa.com.ve/Degollado un hombre en Buen Retiro', 'http://correodelcaroni.com/index.php/sucesos/item/33751-encuentran-hombre-degollado-cerca-de-colegio', 'http://correodelcaroni.com/index.php/sucesos/item/33791-identifican-cadaver-hallado-en-buen-retiro', NULL, 'Miguel David RondÃ³n Barrios', 'M', 18, 2, 7, 3, 732, 45, 45, 'parte del preescolar Nazareno en Buen Retiro', '9504', '', '', '2015-06-29 13:52:12'),
(72, '2015-06-28 00:00:00', 1, 7, 'Matan a un joven en la UD-146', 'http://nuevaprensa.com.ve/Matan a un joven en la UD-146', '', '', NULL, 'Sami Alexander JimÃ©nez MartÃ­nez', 'M', 20, 2, 7, 3, 731, 45, 45, 'sector  UD-146...', '9504', '', '', '2015-06-29 13:54:58'),
(73, '2015-06-28 00:00:00', 1, 7, 'Dos hombres fueron asesinados en Ciudad BolÃ­var vict 1', 'http://correodelcaroni.com/index.php/sucesos/item/33747-dos-hombres-fueron-asesinados-en-ciudad-boli', '', '', NULL, 'Reinaldo Clina Valor', 'M', 22, 2, 7, 0, 0, 45, 45, 'callejÃ³n Ezequiel Zamora, barrio Casanova Sur, en Ciudad BolÃ­var', '9504', '', '', '2015-06-29 23:41:12'),
(74, '2015-06-28 00:00:00', 1, 7, 'Dos hombres fueron asesinados en Ciudad BolÃ­var vict 2', 'http://correodelcaroni.com/index.php/sucesos/item/33747-dos-hombres-fueron-asesinados-en-ciudad-boli', '', '', NULL, 'Manuel Ortega Castillo', 'M', 23, NULL, 7, 1, 711, 45, 45, 'en la plaza 12 de Octubre, sector Brisas del Orinoco.', '9504', '', '', '2015-06-29 23:43:18'),
(75, '2015-06-28 00:00:00', 1, 7, 'De dos disparos matan a joven que trasladaba a votantes del PSUV', 'http://correodelcaroni.com/index.php/sucesos/item/33792-de-dos-disparos-matan-a-joven-que-trasladaba', '', '', NULL, ' Miguel Antonio Aray VelÃ¡zquez.', 'M', 27, NULL, 7, 3, 733, 45, 45, 'sector La Laguna, de San FÃ©lix. ', '9504', '', '', '2015-06-30 13:46:15'),
(76, '2015-06-29 00:00:00', 1, 7, 'Hallan adolescente calcinado en maleta de vehÃ­culo', 'http://nuevaprensa.com.ve/Hallan adolescente calcinado en maleta de vehÃ­culo', '', '', NULL, 'Orangel JosuÃ© Bastardo Ojeda', 'M', 17, 2, 7, 3, 734, 45, 45, 'Laguna de Hato Borges, 25 de Marzo,', '9504', '', '', '2015-07-02 12:46:13'),
(77, '2015-07-02 00:00:00', 1, 7, 'A mansalva asesinan a joven de 15 aÃ±os al huir de delincuentes', 'http://www.correodelcaroni.com/index.php/sucesos/item/33989-a-mansalva-asesinan-a-joven-de-15-anos-a', 'http://nuevaprensa.com.ve/Adolescente asesinado tras resistirse al asalto', '', NULL, 'Jean Paul Misael De La Rosa', 'M', 15, 2, 7, 3, 737, 45, 45, 'conjunto residencial RÃ­o de Villa IkabarÃº, en la parroquia Unare,', '9504', '', '', '2015-07-04 15:20:34'),
(78, '2015-06-19 00:00:00', 1, 7, 'MÃ¡s de cinco implicados en secuestro y homicidio de transportista', 'http://nuevaprensa.com.ve/MÃ¡s de cinco implicados en secuestro y homicidio de transportista', '', '', NULL, 'Juan Carlos Contreras DÃ­az', 'M', 50, NULL, 7, 3, 734, 45, 45, 'Chaguaramas, los pozos, estado Monagas,', '9504', '', '', '2015-07-04 16:14:47'),
(79, '2015-06-30 00:00:00', 1, 7, 'Identifican cadÃ¡ver abandonado en Los Arenales', 'http://nuevaprensa.com.ve/Identifican cadÃ¡ver abandonado en Los Arenales', 'http://nuevaprensa.com.ve/Sujeto muere tiroteado luego de bajarlo de un vehÃ­culo', '', NULL, 'ArquÃ­medes RodrÃ­guez Quino', 'M', 35, 2, 7, 3, 733, 45, 45, 'al final de la lÃ­nea del tren del sector II de Los Arenales, en San FÃ©lix ', '9504', '', '', '2015-07-04 16:48:03'),
(80, '2015-07-01 00:00:00', 1, 7, 'De un tiro mataron trabajador de Comsigu', 'http://nuevaprensa.com.ve/node/2230', '', '', NULL, 'Euler Armando RamÃ­rez Delgado', 'M', 35, NULL, 7, 3, 735, 45, 45, ' sector Bajo Grande de la vÃ­a El Pao', '9504', '', '', '2015-07-04 16:51:02'),
(81, '2015-07-01 00:00:00', 1, 7, 'Ultimado conductor en el sector Mi Campito', 'http://nuevaprensa.com.ve/node/2228', '', '', NULL, 'Armando PÃ©rez', 'M', 60, NULL, 7, 1, 711, 45, 45, ' sector Mi Campito', '9504', '', '', '2015-07-04 16:57:44'),
(82, '2015-06-28 00:00:00', 1, 7, 'Mataron hombre para robarle la moto', 'http://nuevaprensa.com.ve/Mataron hombre para robarle la moto', '', '', NULL, 'Jhonny Antonio Ortega RodrÃ­guez', 'M', 22, NULL, 7, 3, 736, 45, 45, 'por la avenida Principal del barrio MoscÃº, parroquia Vista al Sol', '9504', '', '', '2015-07-04 17:08:27'),
(83, '2015-07-01 00:00:00', 1, 7, 'Acribillado minero en La Floresta', 'http://nuevaprensa.com.ve/node/2225', '', '', NULL, ' Nerio Girdado Guerrero MÃ¡rquez', 'M', 25, NULL, 7, 8, 782, 45, 45, 'sector La Floresta.', '9504', '', '', '2015-07-04 17:11:25'),
(84, '2015-07-03 00:00:00', 1, 7, 'Patrullero de CaronÃ­ y delincuente fallecieron en un duelo a muerte', 'http://nuevaprensa.com.ve/Patrullero de CaronÃ­ y delincuente fallecieron en un duelo a muerte', '', 'http://nuevaprensa.com.ve/node/2421', NULL, 'Jaimer JesÃºs Caldera Herrera', 'M', 24, 2, 7, 3, 734, 45, 45, 'comida llamado Looney Toon, situado en la conocida â€œesquina CaronÃ­â€ de la comunidad Bella Vista', '9504', '', '', '2015-07-06 14:10:56'),
(85, '2015-07-03 00:00:00', 1, 7, 'Patrullero de CaronÃ­ y delincuente fallecieron en un duelo a muerte, Vict 2', 'http://nuevaprensa.com.ve/Patrullero de CaronÃ­ y delincuente fallecieron en un duelo a muerte', '', '', NULL, 'Jesus Alberto  Hernandez', 'M', 24, 2, 7, 3, 734, 45, 45, 'comida llamado Looney Toon, situado en la conocida â€œesquina CaronÃ­â€ de la comunidad Bella Vista', '9504', '', '', '2015-07-06 14:13:49'),
(86, '2015-01-18 00:00:00', 1, 7, 'Capturan a homicida de joven de 14 aÃ±os', 'http://nuevaprensa.com.ve/Capturan a homicida de joven de 14 aÃ±os', '', '', NULL, 'JosÃ© AlemÃ¡n Diguera', 'M', 14, NULL, 7, 3, 0, 45, 45, '', '9504', '', '', '2015-07-06 14:20:04'),
(87, '2015-01-18 00:00:00', 0, 0, 'Capturan a homicida de joven de 14 aÃ±os', 'http://nuevaprensa.com.ve/Capturan a homicida de joven de 14 aÃ±os', '', '', NULL, 'JosÃ© AlemÃ¡n Diguera', 'M', 14, NULL, 7, 3, 734, 45, 45, 'calle Salena de 25 de Marzo', '9504', '', '', '2015-07-06 14:32:22'),
(88, '2015-07-04 00:00:00', 0, 7, 'Joven ultimado frente de su pareja en Cambalache', 'http://nuevaprensa.com.ve/Joven ultimado frente de su pareja en Cambalache', '', '', NULL, 'HÃ©ctor EfraÃ­n Torres Barrios', 'M', 23, 2, 7, 3, 737, 45, 45, 'sector cinco de Cambalache, en Puerto Ordaz', '9504', '', '', '2015-07-06 14:37:29'),
(89, '2015-07-03 00:00:00', 1, 7, 'Sujeto acribillado en carrera Upata', 'http://nuevaprensa.com.ve/Sujeto acribillado en carrera Upata', '', 'http://nuevaprensa.com.ve/node/2422', NULL, 'Argelio Maiz', 'M', 24, 2, 7, 3, 731, 45, 45, 'restaurante Rica Arepa, ubicado en la carrera Upata del centro de Puerto Ordaz ', '9504', '', '', '2015-07-06 14:41:17'),
(90, '2015-07-02 00:00:00', 1, 7, 'Dos homicidios en Ciudad BolÃ­var', 'http://nuevaprensa.com.ve/Dos homicidios en Ciudad BolÃ­var', '', '', NULL, 'Yaneth Aquino', 'F', 26, NULL, 7, 1, 713, 45, 45, 'calle principal del Barrio JosÃ© Antonio PÃ¡ez', '9504', '', '', '2015-07-06 14:45:39'),
(91, '2015-07-03 00:00:00', 1, 7, 'Dos homicidios en Ciudad BolÃ­var', 'http://nuevaprensa.com.ve/Dos homicidios en Ciudad BolÃ­var', '', '', NULL, 'Franklin JesÃºs Coa', 'M', 40, NULL, 7, 1, 711, 45, 45, 'puesto de venta de parrillas, propiedad de Coa', '9504', '', '', '2015-07-06 14:47:54'),
(92, '2015-07-05 00:00:00', 1, 7, 'Pistoleros tirotearon a dos personas en el sector Guaicaro', 'http://nuevaprensa.com.ve/node/2420', '', '', NULL, 'Erick Leomar AmundaraÃ­n GonzÃ¡lez', 'M', 32, 2, 7, 3, 732, 45, 45, 'vivienda 1-19 ubicada en la curva de la calle Guaicaipuro', '9504', '', '', '2015-07-06 14:50:51'),
(93, '2015-07-05 00:00:00', 1, 7, 'Pistoleros tirotearon a dos personas en el sector Guaicaro. Vict 2', 'http://nuevaprensa.com.ve/node/2420', '', '', NULL, 'Yosmer Marcano Parra', 'M', 26, NULL, 7, 3, 732, 45, 45, 'vivienda 1-19 ubicada en la curva de la calle Guaicaipuro', '9504', '', '', '2015-07-06 14:53:22'),
(94, '2015-07-04 00:00:00', 1, 7, 'Abatidos dos reos fugados de El Dorado en enfrentamiento policia, 1', 'http://nuevaprensa.com.ve/node/2424', '', '', NULL, 'SaÃºl Quiroga Galiano', 'M', 61, NULL, 7, 10, 7101, 45, 45, 'poblaciÃ³n El Choco, un sector de la zona sur del estado', '9504', '', '', '2015-07-06 15:04:10'),
(95, '2015-07-04 00:00:00', 1, 7, 'Abatidos dos reos fugados de El Dorado en enfrentamiento policia, vict 2', 'http://nuevaprensa.com.ve/node/2424', '', '', NULL, 'juber Albeiro MejÃ­as RamÃ­rez', 'M', 41, 2, 7, 10, 7101, 45, 45, 'El choco. fundo La Aurora,', '9504', '', '', '2015-07-06 15:05:56'),
(96, '2015-07-04 00:00:00', 1, 7, 'Cuatro vÃ­ctimas tras enfrentamiento en El Callao. Vict 1', 'http://nuevaprensa.com.ve/node/2423', '', '', NULL, 'Ernesto Luis Azocar', 'M', 24, NULL, 7, 5, 751, 45, 45, 'calle Principal del sector Chile', '9504', '', '', '2015-07-06 15:08:35'),
(97, '2015-07-04 00:00:00', 1, 7, 'Cuatro vÃ­ctimas tras enfrentamiento en El Callao. Vict 2', 'http://nuevaprensa.com.ve/node/2423', '', '', NULL, 'Sin identificar', 'M', 99, NULL, 7, 5, 751, 45, 45, 'zona boscosa del sector El PerÃº', '9504', '', '', '2015-07-06 15:10:40'),
(98, '2015-07-06 00:00:00', 1, 7, 'Asesinan a joven frente a su casa', 'http://www.correodelcaroni.com/index.php/sucesos/item/34136-asesinan-a-joven-frente-a-su-casa', 'http://nuevaprensa.com.ve/Asesinan  hombre en Guaiparito', '', NULL, 'Edward Enrique Cabrito Pugarita', 'M', 19, 2, 7, 3, 733, 45, 45, 'La calle Francisco Cierto de Guaiparito, en San FÃ©lix - ', '9504', '', '', '2015-07-08 14:08:21'),
(99, '2015-07-05 00:00:00', 1, 7, 'Ejecutan a â€œEl Indioâ€ por quemar a su hija', 'http://nuevaprensa.com.ve/Ejecutan a â€œEl Indioâ€ por quemar a su hija', '', '', NULL, 'JosÃ© Gregorio SÃ¡nchez', 'M', 42, 2, 7, 3, 739, 45, 45, 'comunidad de El Cerrito, ubicado en La Victoria, San FÃ©lix, ', '9504', '', '', '2015-07-08 14:15:34'),
(100, '2015-07-06 00:00:00', 1, 7, 'AsesinÃ³ a su hermano en medio de una pelea', 'http://nuevaprensa.com.ve/AsesinÃ³ a su hermano en medio de una pelea', '', '', NULL, 'Darvin Johan Basanta', 'M', 22, NULL, 7, 8, 782, 45, 45, 'La calle principal del sector rural Santa Maria, ubicado a las afueras de Upata', '9504', '', '', '2015-07-08 14:18:39'),
(101, '2015-07-06 00:00:00', 1, 7, 'Ultimado un hombre en la vÃ­a El Pao', 'http://www.nuevaprensa.com.ve/Ultimado un hombre en la vÃ­a El Pao', 'http://www.nuevaprensa.com.ve/Ultimado un hombre en la vÃ­a El Pao', '', NULL, 'sin identificar', '0', 99, NULL, 7, 3, 735, 45, 45, 'sector dos del asentamiento campesino 19 de Abril, zona boscosa en la vÃ­a Upata, La PorfÃ­a, lugar cercano al peaje. - ', '9504', '', '', '2015-07-08 14:22:28'),
(102, '2015-07-07 00:00:00', 1, 7, 'En Guasipati matan a joven de 21 aÃ±os de 9 tiros', 'http://elfortindeguayana.com/93306-en-guasipati-matan-a-joven-de-21-anos-de-9-tiros/', '', '', NULL, 'Anderson SerÃ³n', 'M', 21, NULL, 7, 9, 791, 45, 45, 'Guasipati, cancha de futbol', '9504', '', '', '2015-07-08 14:28:16'),
(103, '2015-07-08 00:00:00', 1, 7, 'Mototaxista asesinado en medio de robo', 'http://www.nuevaprensa.com.ve/Mototaxista asesinado en medio de robo', 'http://www.correodelcaroni.com/index.php/sucesos/item/34207-pasajero-asesina-a-mototaxista', '', NULL, 'Orlando Alexis Veliz GonzÃ¡lez', 'M', 30, 2, 7, 3, 736, 45, 45, 'LicorerÃ­a Mario, cerca parada de mototaxis el mirador, Bella Vista', '9504', '', '', '2015-07-09 14:13:26'),
(104, '2015-07-08 00:00:00', 1, 7, 'Cinco vÃ­ctimas por balacera en 11 de Abril, Vict 1', 'http://www.nuevaprensa.com.ve/Cinco vÃ­ctimas por balacera en 11 de Abril', '', '', NULL, 'JesÃºs Manuel Malpica,', 'M', 25, 2, 7, 3, 734, 45, 45, 'la calle PerÃº, justo frente a la iglesia Vida y Paz, 11 de abril', '9504', '', '', '2015-07-09 14:19:22'),
(105, '2015-07-10 00:00:00', 1, 7, 'Pistoleros asesinan a joven en Riberas del CaronÃ­', 'http://www.nuevaprensa.com.ve/Pistoleros asesinan a joven en Riberas del CaronÃ­', 'http://www.primicia.com.ve/sucesos/matan-futbolista-en-riberas-del-caroni.html', 'http://www.eldiariodeguayana.com.ve/sucesos/18352-asesinaron-a-futbolista-en-riberas-del-caroni.html', NULL, 'JosÃ© Enrique Gil Figueroa', 'M', 19, 2, 7, 3, 737, 45, 45, 'local ubicado en la avenida principal de Riberas del CaronÃ­, en Puerto Ordaz.', '9504', '', '', '2015-07-11 15:39:51'),
(106, '2015-07-08 00:00:00', 1, 7, 'Hallan muerto a Teniente secuestrado en GuÃ¡rico', 'http://www.correodelcaroni.com/index.php/sucesos/item/34247-hallan-muerto-a-hombre-secuestrado-en-gu', 'http://www.nuevaprensa.com.ve/Raptan a Tte. Cnel. de la base aÃ©rea de Puerto Ordaz', 'https://avanceinformativojr.wordpress.com/2015/07/10/asesinado-brutalmente-teniente-coronel-activo-d', NULL, 'Onyx Requena Castro', 'M', 41, 2, 7, 3, 737, 45, 45, 'Chaguaramas, estado GuÃ¡rico,  cercanÃ­as de El Sombrero. carretera Chaguaramas â€“ Libertad de Orituco', '9504', '', '', '2015-07-11 15:43:05'),
(107, '2015-07-10 00:00:00', 1, 7, 'Dos tiroteados en El Manteco, Vict 1', 'http://www.primicia.com.ve/sucesos/dos-tiroteados-en-el-manteco.html', '', '', NULL, 'RubÃ©n Abelardo Lezama MuÃ±oz', 'M', 17, NULL, 7, 8, 782, 45, 45, 'sector Valle Encantado, de El Manteco, en el municipio Piar,', '9504', '', '', '2015-07-11 15:50:46'),
(108, '2015-07-10 00:00:00', 1, 7, 'Dos tiroteados en El Manteco, Vict 2', 'http://www.primicia.com.ve/sucesos/dos-tiroteados-en-el-manteco.html', '', '', NULL, 'NÃ©stor TerÃ¡n JimÃ©nez', 'M', 19, 2, 7, 8, 782, 45, 45, 'sector Valle Encantado, de El Manteco, en el municipio Piar,', '9504', '', '', '2015-07-11 15:52:26'),
(109, '2015-07-09 00:00:00', 1, 7, 'Matan a GNB Zodi', 'http://www.primicia.com.ve/sucesos/matan-a-gnb-zodi.html', '', '', NULL, 'Enrique Javier FarÃ­as Solorzano', 'M', 26, NULL, 7, 1, 712, 45, 45, 'Avenida Costanera - Barcelona', '9504', '', '', '2015-07-11 16:12:43'),
(110, '2015-07-12 00:00:00', 1, 7, 'Matan a mototaxista en Sabana de Piedra', 'http://nuevaprensa.com.ve/Matan a mototaxista en Sabana de Piedra', 'http://www.primicia.com.ve/sucesos/exconvicto-juro-matar-a-electricista-y-lo-cumplio.html', 'http://www.eldiariodeguayana.com.ve/sucesos/18433-asesinan-a-electricista-en-sabana-de-piedra.html', NULL, 'Daniel Armando Manzano Mendoza', 'M', 30, 2, 7, 3, 733, 45, 45, ' la invasiÃ³n Sabana de Piedra, parroquia Dalla Costa, San FÃ©lix..', '9504', '', '', '2015-07-13 16:01:38'),
(111, '2015-07-11 00:00:00', 1, 7, 'FalleciÃ³ tras recibir una descarga elÃ©ctrica', 'http://nuevaprensa.com.ve/FalleciÃ³ tras recibir una descarga elÃ©ctrica', '', '', NULL, 'Javier JosÃ© Rojas Salazar,', 'M', 44, 2, 7, 3, 737, 45, 45, ' calle Los Mangos de la comunidad Lomas Bolivarianas en El Renacer de Minifincas - Toro muerto', '9504', '', '', '2015-07-13 19:09:48'),
(112, '2015-07-12 00:00:00', 1, 12, 'NiÃ±a de seis aÃ±os muere arrollada', 'http://www.eldiariodeguayana.com.ve/sucesos/18467-nina-de-seis-anos-muere-arrollada.html', 'http://correodelcaroni.com/index.php/sucesos/item/34406-muere-nina-al-ser-arrollada-por-su-vecina', 'http://nuevaprensa.com.ve/Mata a una niÃ±a aprendiendo a conducir', NULL, 'Yoliangel Rivas', 'F', 6, 2, 7, 8, 783, 45, 45, 'poblaciÃ³n de El Manteco, calle Carolina, del municipio Piar.', '9504', '', '', '2015-07-14 02:24:18'),
(113, '2015-07-14 00:00:00', 1, 1, 'Tres muertes violentas se registraron en Ciudad Guayana - Vict 1', 'http://nuevaprensa.com.ve/Tres muertes violentas se registraron en Ciudad Guayana', 'http://www.primicia.com.ve/sucesos/sentenciado-a-tiros.html', '', NULL, 'Freddy JosÃ© Montoya Manjarrez,', 'M', 31, 2, 7, 3, 731, 45, 45, 'calle Barrancas de la urbanizaciÃ³n Orinoco, frente al colegio Fe y AlegrÃ­a Mendoza. ', '9504', '', '', '2015-07-16 14:21:26'),
(114, '2015-07-14 00:00:00', 1, 1, 'Tres muertes violentas se registraron en Ciudad Guayana - Vict 2', 'http://nuevaprensa.com.ve/Tres muertes violentas se registraron en Ciudad Guayana', 'http://www.primicia.com.ve/sucesos/mataron-a-el-granitero.html', '', NULL, 'Silgifredo Rafael Zambrano Marcano', 'M', 38, 2, 7, 3, 731, 45, 45, ' sector 5 de Villa BahÃ­a, frontera con El Llanito', '9504', '', '', '2015-07-16 14:23:29'),
(115, '2015-07-15 00:00:00', 1, 1, 'CayÃ³ El Ronald al enfrentar a la PEB', 'http://www.primicia.com.ve/sucesos/cayo-el-ronald-al-enfrentar-a-la-peb.html', '', '', NULL, 'Ronald BermÃºdez', 'M', 29, NULL, 7, 1, 711, 45, 45, 'en el sector Maipure y Los Caobos', '9504', '', '', '2015-07-17 16:31:21'),
(116, '2015-07-16 00:00:00', 1, 1, 'Lo mataron frente a sus hijos ', 'http://www.primicia.com.ve/sucesos/lo-mataron-frente-a-sus-hijos.html', 'http://nuevaprensa.com.ve/Dos muertes violentas en Puerto Ordaz', '', NULL, 'Daniel JosÃ© Carvo BriceÃ±o', 'M', 28, 2, 7, 3, 737, 45, 45, 'casa NÂº 17, de la manzana 68, en Core 8', '9504', '', '', '2015-07-17 16:41:07'),
(117, '2015-07-17 00:00:00', 1, 7, 'Asesinada funcionaria de la PEB en Upata', 'http://www.nuevaprensa.com.ve/Asesinada funcionaria de la PEB en Upata', '', '', NULL, 'Mariangel Carolina Rivas MuÃ±oz', 'F', 23, 2, 7, 8, 783, 45, 45, 'plaza militar de la avenida Valmore RodrÃ­guez', '9504', '', '', '2015-07-20 13:57:08'),
(118, '2015-07-18 00:00:00', 1, 1, 'Ajusticiado en Los Sabanales', 'http://www.nuevaprensa.com.ve/Ajusticiado en Los Sabanales', 'http://correodelcaroni.com/index.php/sucesos/item/34641-tres-muertes-violentas-en-caroni-en-menos-de', '', NULL, 'Melvin GonzÃ¡lez', 'M', 23, 2, 7, 3, 733, 45, 45, 'l sector Los Sabanales, en San FÃ©lix, especÃ­ficamente detrÃ¡s del supermercado progreso', '9504', '', '', '2015-07-20 14:03:28'),
(119, '2015-07-17 00:00:00', 1, 1, 'Baleado en bodega', 'http://www.primicia.com.ve/sucesos/baleado-en-bodega.html', 'www.primicia.com.ve/sucesos/baleado-en-bodega.html', '', NULL, 'Luis JosÃ© GuzmÃ¡n', 'M', 19, 2, 7, 3, 737, 45, 45, 'Bodega, manzana 32 del sector Las Amazonas.', '9504', '', '', '2015-07-20 14:08:31'),
(120, '2015-07-18 00:00:00', 1, 1, 'Asesinado joven por los mcgive', 'http://www.primicia.com.ve/sucesos/asesinado-joven-por-los-mcgiver.html', '', '', NULL, 'Antonio Rafael Aguilera', 'M', 18, NULL, 7, 3, 0, 45, 45, 'sector I de La Victoria por la manzana 73 - ', '9504', '', '', '2015-07-20 14:11:25'),
(121, '2015-07-18 00:00:00', 1, 1, 'Asesinado joven por Los Mcgiver', 'http://www.primicia.com.ve/sucesos/asesinado-joven-por-los-mcgiver.html', '', '', NULL, 'Antonio Rafael Aguilera', 'M', 18, NULL, 7, 3, 739, 45, 45, 'sector I de La Victoria. manzana 73', '9504', '', '', '2015-07-20 14:14:33'),
(122, '2015-07-18 00:00:00', 1, 1, 'Ultiman albaÃ±il', 'http://www.primicia.com.ve/sucesos/ultiman-albanil.html', '', '', NULL, 'Luis Antonio Vega', 'M', 29, NULL, 7, 3, 737, 45, 45, 'sector Villa Celestial en Core 8,', '9504', '', '', '2015-07-20 14:17:29'),
(123, '2015-07-19 00:00:00', 1, 1, 'Asesinado de un balazo en el rostro', 'http://www.primicia.com.ve/sucesos/asesinado-de-un-balazo-en-el-rostro.html', 'http://nuevaprensa.com.ve/Joven asesinado en Las Casitas del Core 8', 'http://correodelcaroni.com/index.php/sucesos/item/34641-tres-muertes-violentas-en-caroni-en-menos-de', NULL, 'Roberto Antonio HernÃ¡ndez', 'M', 25, 2, 7, 3, 737, 45, 45, 'entrada principal del sector Las Casitas de Core 8', '9504', '', '', '2015-07-20 14:19:59'),
(124, '2015-07-16 00:00:00', 1, 1, 'Asesinan a Tito frente a su quiosco', 'http://www.primicia.com.ve/sucesos/asesinan-a-tito-frente-a-su-quiosco.html', 'http://nuevaprensa.com.ve/Dos muertes violentas en Puerto Ordaz', 'http://correodelcaroni.com/index.php/sucesos/item/34591-asesinan-a-perrocalentero-en-castillito', NULL, 'Guillermo AndrÃ©s Ruiz Ensiso', 'M', 26, 2, 7, 3, 731, 45, 45, ' calle La Urbana, cruce con Arpao de Castillito, diagonal al Hotel Embajador. ', '', '', '', '2015-07-20 14:57:45'),
(125, '2015-07-18 00:00:00', 1, 1, 'Sin identificar cadÃ¡ver hallado en Villa Tablita', 'http://nuevaprensa.com.ve/Sin identificar cadÃ¡ver hallado en Villa Tablita', 'http://correodelcaroni.com/index.php/sucesos/item/34641-tres-muertes-violentas-en-caroni-en-menos-de', '', NULL, 'sin identificar', 'M', 32, 2, 7, 3, 734, 45, 45, 'zona boscosa de la invasiÃ³n Villa Tablita, en el sector JosÃ© Tadeo Monagas, en San FÃ©lix. -', '9504', '', '', '2015-07-20 15:24:52'),
(126, '2015-07-18 00:00:00', 1, 1, 'Abaten a dos delincuentes en enfrentamiento con la PEB', 'http://correodelcaroni.com/index.php/sucesos/item/34668-abaten-a-dos-delincuentes-en-enfrentamiento-', '', '', NULL, 'Arnol Farid Pertuz Orozco', 'M', 30, 2, 7, 8, 782, 45, 45, '', '9504', '', '', '2015-07-20 15:32:39'),
(127, '2015-07-20 00:00:00', 1, 1, 'Asesinan a hombre en La PorfÃ­a III', 'http://nuevaprensa.com.ve/Asesinan a hombre en La PorfÃ­a III', 'http://nuevaprensa.com.ve/Hombre asesinado en La PorfÃ­a era taxista', 'http://correodelcaroni.com/index.php/sucesos/item/34736-hombre-asesinado-en-la-via-upata-era-taxista', NULL, 'Jennis JesÃºs BermÃºdez', 'M', 39, 2, 7, 3, 7310, 45, 45, 'La porfia III', '9504', '', '', '2015-07-22 01:44:01'),
(128, '2015-07-20 00:00:00', 1, 1, 'Un muerto en enfrentamiento en Villa Colombia', 'http://nuevaprensa.com.ve/Un muerto en enfrentamiento en Villa Colombia', 'http://www.primicia.com.ve/sucesos/abatido-en-villa-colombia.html', 'http://nuevaprensa.com.ve/DesmintiÃ³ que su hijo fuese delincuente', NULL, 'Alexander JosÃ© MartÃ­nez GonzÃ¡lez,', 'M', 20, 2, 7, 3, 731, 45, 45, 'Villa Colombia', '9504', '', '', '2015-07-22 01:45:40'),
(129, '2015-07-20 00:00:00', 1, 1, 'Hallan cadÃ¡ver descompuesto de fraile desaparecido', 'http://nuevaprensa.com.ve/Hallan cadÃ¡ver descompuesto de fraile desaparecido', 'http://elfortindeguayana.com/94274-via-puerto-ordaz-encontraron-tiroteado-cadaver-del-cura-de-vista-', 'http://www.primicia.com.ve/sucesos/hallan-fraile-muerto.html', NULL, 'Alex Rafael Pinto', 'M', 50, 2, 7, 1, 715, 45, 45, 'en el Km 19 de la carretera vieja Ciudad BolÃ­var â€“ Puerto Ordaz, - See more at: http://nuevaprensa.com.ve/Hallan cadÃ¡ver descompuesto de fraile desaparecido#sthash.BY55yH2K.dpuf', '9504', '', '', '2015-07-22 01:49:42'),
(130, '2015-07-21 00:00:00', 1, 1, 'PolicÃ­a mata a un joven tras forcejeo en una cola por mantequilla y pasta', 'http://correodelcaroni.com/index.php/sucesos/item/34806-arrestan-a-uniformado-de-la-peb-por-disparar', 'http://www.primicia.com.ve/sucesos/hombre-ajusticiado-en-una-cola.html', 'http://elfortindeguayana.com/94509-peb-mato-accidentalmente-a-bachaquero-e-hirio-a-dos-mas/', NULL, 'Cristian JosÃ© Maraguacare GuardiÃ¡n', 'M', 26, 2, 7, 3, 734, 45, 45, 'Comercial China La Sinceridad, en la vÃ­a a Upata, en San FÃ©lix', '9504', '', '', '2015-07-23 13:23:09'),
(131, '2015-07-21 00:00:00', 1, 1, 'Mujer muere quemada por su pareja', 'http://correodelcaroni.com/index.php/sucesos/item/34805-mujer-muere-quemada-por-su-pareja', 'http://www.primicia.com.ve/sucesos/mato-a-su-mujer-en-upata.html', '', NULL, 'Mildred Josefina RodrÃ­guez BolÃ­var', 'F', 30, 2, 7, 8, 783, 45, 45, ' sector La Llovizna, en la calle Barcelona, en Upata,', '9504', '', '', '2015-07-23 13:26:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `delitos`
--
ALTER TABLE `delitos`
 ADD PRIMARY KEY (`delito_id`);

--
-- Indices de la tabla `delitos_detalles`
--
ALTER TABLE `delitos_detalles`
 ADD PRIMARY KEY (`delito_detalle_id`,`delito_id`);

--
-- Indices de la tabla `histo_homicidios`
--
ALTER TABLE `histo_homicidios`
 ADD PRIMARY KEY (`histo_id`), ADD UNIQUE KEY `ano` (`ano`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
 ADD PRIMARY KEY (`municipio_id`,`estado_id`);

--
-- Indices de la tabla `parroquias`
--
ALTER TABLE `parroquias`
 ADD PRIMARY KEY (`parroquia_id`);

--
-- Indices de la tabla `sucesos`
--
ALTER TABLE `sucesos`
 ADD UNIQUE KEY `suceso_id` (`suceso_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sucesos`
--
ALTER TABLE `sucesos`
MODIFY `suceso_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=132;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
