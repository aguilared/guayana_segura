-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2015 a las 19:46:19
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
  `delito_id` int(11) DEFAULT NULL,
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
  `delito_detalle_id` int(11) DEFAULT NULL,
  `delito_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `delitos_detalles`
--

INSERT INTO `delitos_detalles` (`delito_detalle_id`, `delito_id`, `descripcion`) VALUES
(1, 1, 'Secuestro'),
(2, 1, 'Ataque a medios'),
(3, 1, 'Golpes'),
(4, 1, 'Robo o destrucción de equipo'),
(5, 1, 'Tortura'),
(6, 1, 'Desaparicion'),
(7, 1, 'Homicidio'),
(8, 2, 'Detención arbitraria'),
(9, 2, 'Acoso legal'),
(10, 3, 'Amenaza'),
(11, 3, 'Ataques verbales'),
(12, 3, 'Campaña de desprestigio'),
(13, 3, 'Cobertura forzada'),
(14, 4, 'Robo o destrucción de archivos electrónicos'),
(15, 4, 'Espionaje'),
(16, 4, 'Ataques cibernéticos'),
(17, 4, 'Penetración de cuenta'),
(18, 4, 'Alteración del sitio web');

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
(1, 1, '#http://elfortindeguayana.com/78334-vecinos-de-los-olivos-protestan-esta-tarde-a-las-tres-frente-a-la-arepera-de-mon/#', 1, 'Asesinado del Señor Mon'),
(2, 1, 'dsdsd#http://dsdsd#', 2, 'Asesinado Mon'),
(3, 14, '#http://www.correodelcaroni.com/index.php/sucesos/item/28987-ladrones-matan-de-un-tiro-a-una-de-sus-victimas-durante-corte-de-luz#', NULL, NULL),
(4, 15, '#http://www.correodelcaroni.com/index.php/sucesos/item/28986-matan-a-brasileno-en-la-via-a-caruachi#', NULL, NULL),
(5, 16, '#http://www.correodelcaroni.com/index.php/sucesos/item/28971-dos-amigos-mueren-al-recibir-mas-de-40-disparos#', NULL, NULL),
(6, 17, '#http://www.correodelcaroni.com/index.php/sucesos/item/28916-le-dispararon-porque-la-moto-no-prendio#', NULL, NULL),
(7, 18, '#http://www.correodelcaroni.com/index.php/sucesos/item/17987-acribillado-en-cambalache#', NULL, NULL),
(8, 16, '#http://nuevaprensa.com.ve/Acribillaron%20a%20dos%20hombres%20en%20Ciudad%20Bendita#', NULL, NULL),
(9, 19, '#http://nuevaprensa.com.ve/Matan%20a%20dirigente%20de%20UBCh#', NULL, NULL),
(10, 20, '#http://nuevaprensa.com.ve/Ultiman%20a%20trabajador%20de%20la%20Polar%20en%20Francisca%20Duarte#', NULL, NULL);

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
  `histo_id` int(11) DEFAULT NULL,
  `estado_id` smallint(6) DEFAULT NULL,
  `municipio_id` smallint(6) DEFAULT NULL,
  `ano` smallint(6) DEFAULT NULL,
  `delito_id` int(11) DEFAULT NULL,
  `delito_detalle_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
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
  `homicidios_menores` smallint(6) DEFAULT NULL,
  `homicidios_mujeres` smallint(6) DEFAULT NULL,
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
  `total_ano_anterior` int(11) DEFAULT NULL,
  `acumulado_a_la_fecha` int(11) DEFAULT NULL,
  `links` mediumtext COLLATE utf8_unicode_ci,
  `fecha_ingreso_data` datetime DEFAULT NULL,
  `usuario` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `histo_homicidios`
--

INSERT INTO `histo_homicidios` (`histo_id`, `estado_id`, `municipio_id`, `ano`, `delito_id`, `delito_detalle_id`, `total`, `total_vzla`, `total_resueltos`, `total_resueltos_vzla`, `impunidad`, `impunidad_vzla`, `tasa_x_100k`, `tasa_x_100k_caracas`, `tasa_x_100k_vzla`, `ranking_mundial`, `ranking_mundial_caracas`, `homicidios_menores`, `homicidios_mujeres`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total_ano_anterior`, `acumulado_a_la_fecha`, `links`, `fecha_ingreso_data`, `usuario`) VALUES
(1, 7, 4, 2014, 1, 7, 537, 24980, 87, NULL, NULL, NULL, NULL, NULL, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5940, '#http://www.correodelcaroni.com/index.php/sucesos/item/28846-siguen-impunes-450-homicidios-cometidos-en-caroni-durante-2014#', NULL, NULL),
(2, 7, 4, 2015, 1, 7, 138, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, 50, 45, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6078, NULL, NULL, NULL),
(3, 7, 4, 2005, 1, 7, 520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 7, 4, 2006, 1, 7, 605, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 7, 4, 2007, 1, 7, 677, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 7, 4, 2008, 1, 7, 645, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, 4, 2009, 1, 7, 631, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 7, 4, 2010, 1, 7, 634, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 7, 4, 2011, 1, 7, 565, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 7, 4, 2012, 1, 7, 585, 16072, NULL, NULL, NULL, NULL, NULL, NULL, 53.7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 7, 4, 2013, 1, 7, 592, 24763, NULL, NULL, NULL, NULL, NULL, NULL, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `parroquia_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `estado_id` smallint(6) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `parroquias`
--

INSERT INTO `parroquias` (`parroquia_id`, `municipio_id`, `estado_id`, `descripcion`) VALUES
(711, 1, 7, 'AGUA SALADA'),
(712, 1, 7, 'CATEDRAL'),
(713, 1, 7, 'JOSE ANTONIO PAEZ'),
(714, 1, 7, 'LA SABANITA'),
(715, 1, 7, 'MARHUANTA'),
(716, 1, 7, 'ORINOCO'),
(717, 1, 7, 'PANAPANA'),
(718, 1, 7, 'VISTA HERMOSA'),
(719, 1, 7, 'ZEA'),
(721, 2, 7, 'CIUDAD PIAR'),
(722, 2, 7, 'BARCELONETA'),
(723, 2, 7, 'SAN FRANCISCO'),
(724, 2, 7, 'SANTA BARBARA'),
(731, 3, 7, 'CACHAMAY'),
(732, 3, 7, 'CHIRICA'),
(733, 3, 7, 'DALLA COSTA'),
(734, 3, 7, 'ONCE DE ABRIL'),
(735, 3, 7, 'POZO VERDE'),
(736, 3, 7, 'SIMON BOLIVAR'),
(737, 3, 7, 'UNARE'),
(738, 3, 7, 'UNIVERSIDAD'),
(739, 3, 7, 'VISTA AL SOL'),
(741, 4, 7, 'CAICARA DEL ORINOCO'),
(742, 4, 7, 'ALTAGRACIA'),
(743, 4, 7, 'ASCENSION FARRERAS'),
(744, 4, 7, 'GUANIAMO'),
(745, 4, 7, 'LA URBANA'),
(746, 4, 7, 'PIJIGUAOS'),
(751, 5, 7, 'EL CALLAO'),
(761, 6, 7, 'EL CALLAOSANTA ELENA DE UAIREN'),
(762, 6, 7, 'IKABARU'),
(771, 7, 7, 'EL PALMAR'),
(781, 8, 7, 'EL PALMARUPATA'),
(782, 8, 7, 'ANDRES ELOY BLANCO'),
(783, 8, 7, 'PEDRO COVA'),
(791, 9, 7, 'GUASIPATI'),
(792, 9, 7, 'SALOM'),
(7101, 10, 7, 'TUMEREMO'),
(7102, 10, 7, 'DALLA COSTA'),
(7103, 10, 7, 'SAN ISIDRO'),
(7111, 11, 7, 'MARIPA'),
(7112, 11, 7, 'ARIPAO'),
(7113, 11, 7, 'LAS MAJADAS'),
(7114, 11, 7, 'MOITACO'),
(7310, 3, 7, 'YOCOIMA');

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
  `fuente` mediumtext COLLATE utf8_unicode_ci,
  `otras_fuentes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_arma` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT NULL,
  `municipio_id` smallint(6) DEFAULT NULL,
  `parroquia_id` smallint(6) DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `sector` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creado` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sucesos`
--

INSERT INTO `sucesos` (`suceso_id`, `fecha_suceso`, `delito_id`, `delito_detalle_id`, `titulo`, `fuente`, `otras_fuentes`, `nombre`, `sexo`, `edad`, `tipo_arma`, `estado`, `municipio_id`, `parroquia_id`, `latitud`, `longitud`, `sector`, `usuario`, `fecha_creado`) VALUES
(1, '2015-06-05 00:00:00', 1, 7, 'Secuestro y persecuciÃ³n culminÃ³ con delincuente muerto y comerciante herido', 'http://elfortindeguayana.com/88970-secuestro-y-persecucion-culmino-con-delincuente-muerto-y-comerciante-herido/', '', 'epales', '1', '45', 1, 7, 3, 731, 45, 45, 'el hueco', '9504', '2015-06-05 14:08:19'),
(2, '2015-06-04 00:00:00', 1, 7, 'Mueren dos jÃ³venes en hechos de violencias en Tumeremo y Upata', 'http://elfortindeguayana.com/89049-mueren-dos-jovenes-en-hechos-de-violencias-en-tumeremo-y-upata/', '', 'epales', '1', '45', 1, 7, 3, 731, 45, 45, 'el hueco', '9504', '2015-06-05 14:33:45'),
(3, '2015-06-04 00:00:00', 1, 7, 'Mueren dos jÃ³venes en hechos de violencias en Tumeremo y Upata', 'http://elfortindeguayana.com/89049-mueren-dos-jovenes-en-hechos-de-violencias-en-tumeremo-y-upata/', '', 'epales', '1', '45', 1, 7, 3, 731, 45, 45, 'el hueco', '9504', '2015-06-05 14:35:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
 ADD PRIMARY KEY (`municipio_id`,`estado_id`);

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
MODIFY `suceso_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
