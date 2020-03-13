-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2020 a las 20:07:21
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contexto`
--

CREATE TABLE `tbl_contexto` (
  `id_contexto` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `contextoimagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_contexto`
--

INSERT INTO `tbl_contexto` (`id_contexto`, `id_tema`, `descripcion`, `contextoimagen`) VALUES
(1, 1, 'Suma de Fracciones HomogÃ©neas', 'fraccioneshomogeneas1.PNG'),
(2, 1, 'Suma de Fracciones HomogÃ©neas', 'pregunta2f.PNG'),
(3, 1, 'Suma de Fracciones HomogÃ©neas', 'fraccionesd3.PNG'),
(4, 1, 'Suma de Fracciones HomogÃ©neas', 'pfvfracciones1.PNG'),
(5, 1, 'Suma de Fracciones HomogÃ©neas', 'fvfracciones2.PNG'),
(6, 1, 'Suma de Fracciones HomogÃ©neas', 'fvfracciones3.PNG'),
(7, 1, 'Resta de Fracciones HomogÃ©neas', 'restafraciones1.PNG'),
(8, 1, 'Resta de Fracciones HomogÃ©neas', 'restafraciones2r.PNG'),
(9, 1, 'Resta de Fracciones HomogÃ©neas', 'resta3rr.PNG'),
(11, 1, 'Resta de Fracciones HomogÃ©neas', 'fvpregunta1.PNG'),
(12, 1, 'Resta de Fracciones HomogÃ©neas', 'fvrespuesta2m.PNG'),
(13, 1, 'Resta de Fracciones HomogÃ©neas', 'fvpregunta3.PNG'),
(14, 1, 'Resta de Fracciones HomogÃ©neas', 'preguntasfvf.PNG'),
(15, 1, 'Resta de Fracciones HomogÃ©neas', 'preguntasfv2.PNG'),
(16, 1, 'Resta de Fracciones HomogÃ©neas', 'peruntasfv3.PNG'),
(17, 1, 'Suma de Fracciones HomogÃ©neas', 'fvsuma.PNG'),
(18, 1, 'Suma de Fracciones HomogÃ©neas', 'fvsuma2.PNG'),
(19, 1, 'Suma de Fracciones HomogÃ©neas', 'sumafv3.PNG'),
(20, 2, 'Fracciones Propias', ''),
(21, 2, 'Fracciones Propias', ''),
(22, 2, 'Fracciones Propias', ''),
(23, 2, 'Fracciones Propias', ''),
(25, 2, 'Numeros naturales ', ''),
(26, 2, 'Numeros Naturales', ''),
(27, 2, 'Fracciones Propias', 'imagenr4fp.PNG'),
(28, 2, 'Numeros Naturales', ''),
(29, 2, 'Numeros Naturales', ''),
(31, 2, 'Fracciones Propias', 'preguntpro.PNG'),
(32, 2, 'Fracciones Propias', ''),
(33, 2, 'Numeros Naturales', ''),
(34, 2, 'Numeros Naturales', ''),
(35, 2, 'Fracciones Propias', ''),
(36, 2, 'Fracciones Propias', ''),
(37, 1, 'Suma de Fracciones HomogÃ©neas', ''),
(38, 1, 'Suma de Fracciones HomogÃ©neas', 'nuevaimagensuma.PNG'),
(39, 2, 'Numeros Naturales', ''),
(40, 2, 'Numeros Naturales', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dificultad`
--

CREATE TABLE `tbl_dificultad` (
  `id_dificultad` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_dificultad`
--

INSERT INTO `tbl_dificultad` (`id_dificultad`, `nombres`) VALUES
(1, 'Facil'),
(2, 'Medio'),
(3, 'Dificil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evaluaciones`
--

CREATE TABLE `tbl_evaluaciones` (
  `id_evaluacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tituloevaluacion` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_evaluaciones`
--

INSERT INTO `tbl_evaluaciones` (`id_evaluacion`, `id_usuario`, `tituloevaluacion`, `estado`, `grado`) VALUES
(1, 1, 'Evaluacion Matematicas', 0, 7),
(2, 1, 'EVALUACION GRADO 6', 0, 6),
(3, 1, 'evaluaciÃ³n octavo', 0, 8),
(4, 1, 'evaluaciÃ³n grado 11', 0, 11),
(5, 1, 'evaluacion cicma', 0, 7),
(6, 1, 'Evaluacion grado 7 LC', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historialpreguntas`
--

CREATE TABLE `tbl_historialpreguntas` (
  `id_historial` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `cantidad_fallos` int(11) DEFAULT NULL,
  `cantidad_aciertos` int(11) DEFAULT NULL,
  `tiempo` time DEFAULT NULL,
  `cantidadcaracteres` int(11) DEFAULT NULL,
  `dificultadestudiante` double NOT NULL,
  `cantidadvotos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_historialpreguntas`
--

INSERT INTO `tbl_historialpreguntas` (`id_historial`, `id_pregunta`, `cantidad_fallos`, `cantidad_aciertos`, `tiempo`, `cantidadcaracteres`, `dificultadestudiante`, `cantidadvotos`) VALUES
(1, 1, 0, 25, '00:15:16', 46, 0.72901153564455, 18),
(2, 2, 1, 21, '00:16:12', 46, 1.0532836914062, 15),
(3, 3, 1, 36, '00:25:01', 46, 1.436644077301, 29),
(4, 4, 4, 30, '00:27:48', 58, 1.5751779526472, 28),
(5, 5, 3, 21, '00:10:07', 58, 1.040283203125, 14),
(6, 6, 9, 31, '00:21:04', 58, 2.3767046928406, 28),
(7, 7, 15, 6, '00:25:10', 46, 2.5654296875, 16),
(8, 8, 18, 20, '00:21:17', 46, 2.6527118682861, 21),
(9, 9, 4, 39, '00:32:50', 47, 1.1743203210644, 32),
(10, 11, 7, 21, '00:13:56', 58, 2.5866413116455, 21),
(11, 12, 6, 11, '00:09:42', 58, 2.99267578125, 13),
(12, 13, 8, 34, '00:33:27', 58, 2.0719768414274, 31),
(13, 14, 18, 22, '00:16:41', 58, 2.6431039571762, 24),
(14, 15, 8, 13, '00:10:23', 58, 2.4897003173828, 18),
(15, 16, 1, 29, '00:13:54', 58, 0.8824252486229, 26),
(16, 17, 18, 21, '00:22:18', 58, 2.0957698822022, 20),
(17, 18, 7, 18, '00:13:05', 58, 2.52685546875, 13),
(18, 19, 9, 29, '00:18:01', 58, 3.655717022717, 29),
(19, 20, 5, 10, '00:08:12', 70, 2.375, 6),
(20, 21, 4, 5, '00:03:52', 57, 2.375, 7),
(21, 22, 10, 2, '00:06:49', 40, 4.03125, 7),
(22, 23, 10, 3, '00:05:45', 41, 1.625, 6),
(23, 25, 4, 3, '00:02:12', 56, 3, 3),
(24, 26, 10, 16, '00:11:54', 135, 3.8125, 6),
(25, 27, 2, 15, '00:11:08', 53, 3.625, 5),
(26, 28, 11, 13, '00:22:11', 148, 0.8037109375, 11),
(27, 29, 11, 4, '00:11:46', 75, 3.359375, 9),
(28, 30, 0, 19, '00:07:15', 53, 0.71875, 7),
(29, 31, 18, 34, '00:39:20', 69, 2.1295260563493, 29),
(30, 32, 4, 46, '00:35:40', 110, 2.8456663782708, 32),
(31, 33, 3, 49, '00:23:49', 80, 1.2922066021711, 32),
(32, 34, 28, 22, '00:30:10', 82, 2.2594256401062, 22),
(33, 35, 36, 15, '00:30:39', 88, 2.9929747581482, 22),
(34, 36, 0, 0, '00:00:00', 139, 0, 0),
(35, 37, 6, 1, '00:00:00', 57, 3.359375, 6),
(36, 38, 0, 1, '00:00:00', 123, 2, 1),
(37, 39, 0, 0, '00:00:00', 127, 3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_opciones`
--

CREATE TABLE `tbl_opciones` (
  `id_opcion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `valor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_opciones`
--

INSERT INTO `tbl_opciones` (`id_opcion`, `id_pregunta`, `valor`, `respuesta`) VALUES
(1, 25, 'N', 'Correcta'),
(2, 25, 'n', ''),
(3, 25, 'Z', ''),
(4, 25, 'NN', ''),
(5, 26, '3', 'Correcta'),
(6, 26, '8', ''),
(7, 26, '5', ''),
(8, 26, '10', ''),
(9, 28, '50', ''),
(10, 28, '57', 'Correcta'),
(11, 28, '20', ''),
(12, 28, '60', ''),
(13, 29, '350', 'Correcta'),
(14, 29, '200', ''),
(15, 29, '450', ''),
(16, 29, '50', ''),
(19, 31, '50 m', ''),
(20, 31, '20 m', ''),
(21, 31, '12 m', 'Correcta'),
(22, 31, '5 m', ''),
(24, 32, '$ 30', ''),
(27, 32, '$ 25', 'Correcta'),
(28, 32, '$ 40', ''),
(29, 32, '$ 10', ''),
(30, 33, '5 lapiceros', 'Correcta'),
(31, 33, '2 lapiceros', ''),
(32, 33, '4 lapiceros', ''),
(33, 33, '7 lapiceros', ''),
(34, 34, '10', ''),
(35, 34, '12', 'Correcta'),
(36, 34, '20', ''),
(37, 34, '25', ''),
(38, 35, '30', ''),
(39, 35, '48', ''),
(40, 35, '29', ''),
(41, 35, '36', 'Correcta'),
(42, 38, '18.000 litros', 'Correcta'),
(43, 38, '20.000 litros', ''),
(44, 38, '10.000 litros', ''),
(45, 38, '25.000 litros', ''),
(46, 39, '500 botellas', ''),
(47, 39, '1.056 botellas', 'Correcta'),
(48, 39, '2500 botellas', ''),
(49, 39, '3500 botellas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_opcionesfv`
--

CREATE TABLE `tbl_opcionesfv` (
  `id_opcion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `valor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_opcionesfv`
--

INSERT INTO `tbl_opcionesfv` (`id_opcion`, `id_pregunta`, `valor`) VALUES
(1, 4, 'Verdadero'),
(2, 5, 'Verdadero'),
(3, 6, 'Verdadero'),
(4, 11, 'Verdadero'),
(5, 12, 'Verdadero'),
(6, 13, 'Verdadero'),
(7, 14, 'Falso'),
(8, 15, 'Falso'),
(9, 16, 'Falso'),
(10, 17, 'Falso'),
(11, 18, 'Falso'),
(12, 19, 'Falso'),
(13, 20, 'Verdadero'),
(14, 21, 'Verdadero'),
(15, 37, 'Verdadero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_opcionesimagen`
--

CREATE TABLE `tbl_opcionesimagen` (
  `id_imagen` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `respuesta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_opcionesimagen`
--

INSERT INTO `tbl_opcionesimagen` (`id_imagen`, `id_pregunta`, `imagen`, `respuesta`) VALUES
(1, 1, 'fraciones1r.PNG', ''),
(2, 1, 'fraciones2r.PNG', 'Correcta'),
(3, 1, 'fracciones3r.PNG', ''),
(4, 1, 'fracciones4r.PNG', ''),
(5, 2, 'fraccionesmr1.PNG', ''),
(6, 2, 'fracionesmr2.PNG', ''),
(7, 2, 'fracionesmr3.PNG', 'Correcta'),
(8, 2, 'fracionesmr4.PNG', ''),
(9, 3, 'fracionesrd1.PNG', 'Correcta'),
(10, 3, 'fracionesd2.PNG', ''),
(11, 3, 'fracionesd3.PNG', ''),
(12, 3, 'fracionesd4.PNG', ''),
(13, 7, 'restap1r.PNG', ''),
(14, 7, 'imacoorr.PNG', 'Correcta'),
(15, 7, 'restar2r.PNG', ''),
(16, 7, 'resta4r.PNG', ''),
(17, 8, 'resta2rr.PNG', 'Correcta'),
(18, 8, 'resta2r.PNG', ''),
(19, 8, 'resta4r.PNG', ''),
(20, 8, 'resta4r.PNG', ''),
(21, 9, 'restaa1.PNG', ''),
(22, 9, 'resta2b.PNG', ''),
(23, 9, 'resta3b.PNG', 'Correcta'),
(24, 9, 'resta4d.PNG', ''),
(25, 22, 'fa1.PNG', ''),
(26, 22, 'fr2.PNG', ''),
(27, 22, 'frc5.PNG', ''),
(28, 22, 'fr4.PNG', 'Correcta'),
(29, 23, 'imagen1.PNG', 'Correcta'),
(30, 23, 'imagen2.PNG', ''),
(31, 23, 'imagen3.PNG', ''),
(32, 23, 'imagen4.PNG', ''),
(33, 27, 'ppr1.PNG', ''),
(34, 27, 'pprr2.PNG', 'Correcta'),
(35, 27, 'preee3.PNG', ''),
(36, 27, 'pprt3.PNG', ''),
(37, 30, 'apregunta1.PNG', ''),
(38, 30, 'bpregun.PNG', ''),
(39, 30, 'cpregunta.PNG', 'Correcta'),
(40, 30, 'nueva4.PNG', ''),
(41, 36, 'pregunta1d.PNG', ''),
(42, 36, 'pregunta2dft.PNG', ''),
(43, 36, 'pregunta3dft.PNG', ''),
(44, 36, 'pregunta4dft.PNG', 'Correcta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas`
--

CREATE TABLE `tbl_preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `id_contexto` int(11) NOT NULL,
  `titulo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ayudaestudiante` varchar(255) DEFAULT NULL,
  `imagenpregunta` varchar(100) DEFAULT NULL,
  `id_tipo_pregunta` int(11) NOT NULL,
  `id_dificultad` int(11) NOT NULL,
  `cantidadcaracteres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_preguntas`
--

INSERT INTO `tbl_preguntas` (`id_pregunta`, `id_contexto`, `titulo`, `ayudaestudiante`, `imagenpregunta`, `id_tipo_pregunta`, `id_dificultad`, `cantidadcaracteres`) VALUES
(1, 1, 'Elige la respuesta correcta de la anterior operaciÃ³n', '', 'ayuda1.PNG', 3, 1, 0),
(2, 2, 'Elige la respuesta correcta de la anterior operaciÃ³n', '', 'ayuda1.PNG', 3, 2, 0),
(3, 3, 'Elige la respuesta correcta de la anterior operaciÃ³n', '', 'ayuda1.PNG', 3, 3, 0),
(4, 4, 'Responde falso o verdadero al  resultado de la siguiente operaciÃ³n:', '', 'ayuda1.PNG', 2, 1, 0),
(5, 5, 'Responde falso o verdadero al  resultado de la siguiente operaciÃ³n:', '', 'ayuda1.PNG', 2, 2, 0),
(6, 6, 'Responde falso o verdadero al  resultado de la siguiente operaciÃ³n:', '', 'ayuda1.PNG', 2, 3, 0),
(7, 7, 'Elige la respuesta correcta de la anterior operaciÃ³n', '', 'ayudaresta.PNG', 3, 1, 0),
(8, 8, 'Elige la respuesta correcta de la anterior operaciÃ³n', '', 'ayudaresta.PNG', 3, 2, 0),
(9, 9, 'Elige la respuesta correcta de la siguiente operaciÃ³n', '', 'ayudaresta.PNG', 3, 3, 0),
(11, 11, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayudaresta.PNG', 2, 1, 0),
(12, 12, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayudaresta.PNG', 2, 2, 0),
(13, 13, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayudaresta.PNG', 2, 3, 0),
(14, 14, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayudaresta.PNG', 2, 1, 0),
(15, 15, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayudaresta.PNG', 2, 2, 0),
(16, 16, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayudaresta.PNG', 2, 3, 0),
(17, 17, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayudaresta.PNG', 2, 1, 0),
(18, 18, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayuda1.PNG', 2, 2, 0),
(19, 19, 'Responde falso o verdadero al resultado de la siguiente operaciÃ³n:', '', 'ayuda1.PNG', 2, 3, 0),
(20, 20, 'Las fracciones que son mayores que 0 pero menores que 1 se llaman fracciones propias', '', 'propiaayuda.PNG', 2, 1, 0),
(21, 21, 'En las fracciones propias, el numerador es menor que el denominador', '', 'fraccionpropiaayuda2.PNG', 2, 1, 0),
(22, 22, 'Identificar la operaciÃ³n de fracciÃ³n propia', '', 'fraccionpropiaayuda2.PNG', 3, 1, 0),
(23, 23, 'Â¿ QuÃ© imagen pertenece a una fracciÃ³n propia?', 'Una fracciÃ³n se llama propia si su numerador es menor que su denominador', '', 3, 1, 0),
(25, 25, 'Â¿Los nÃºmeros naturales se representan con la letra manuscrita?', '', '', 1, 1, 0),
(26, 26, 'Ayer TomÃ¡s comprÃ³ una camiseta de 15 euros y una mochila de 23 euros, pero le hicieron un descuento y, en total, solo pagÃ³ 35 euros. Â¿CuÃ¡nto descuento obtuvo?', '', '', 1, 2, 0),
(27, 27, 'Elige la respuesta correcta  que represente la imagen anterior', '', 'fraccionpropiaayuda2.PNG', 3, 2, 0),
(28, 28, 'Gloria quiere hacer una colecciÃ³n de 27 libros. sÃ­ cada libro cuesta 9 â‚¬ y Gloria tiene 300 â‚¬ ahorrados ,Â¿cuÃ¡nto dinero le quedarÃ¡ despuÃ©s de acabar la colecciÃ³nâ€‹?', '', '', 1, 2, 0),
(29, 29, 'En una bolsa hay 20 caramelos de naranja y 30 de limÃ³n Â¿cuantos caramelos hay en 7 bolsas?', '', '', 1, 2, 0),
(30, 31, 'Elige la respuesta correcta que represente la imagen anterior', '', 'fraccionpropiaayuda2.PNG', 3, 2, 0),
(31, 32, 'De una pieza de tela de 48 m se cortan 3/4. Â¿CuÃ¡ntos metros mide el trozo restante?', 'Calculamos a cuÃ¡ntos metros equivalen 3/4 y se lo restamos a 48', '', 1, 3, 0),
(32, 33, 'Juan tiene  $ 85  y se ha comprado una chocolatina que le costÃ³ $ 35 y unos caramelos que le costaron $ 25 . Â¿CuÃ¡nto dinero le sobrarÃ¡?', '', '', 1, 3, 0),
(33, 34, 'GermÃ¡n tiene 12 lapiceros y Luis tiene 17. Â¿CuÃ¡ntos lapiceros tiene Luis mÃ¡s que GermÃ¡n?.', '', '', 1, 3, 0),
(34, 35, ' Una caja contiene 60 bombones. Eva se come 1/5 de los bombones.Â¿CuÃ¡ntos bombones se comiÃ³  Eva? ', '', '', 1, 3, 0),
(35, 36, 'Hace unos aÃ±os Pedro tenÃ­a 24 aÃ±os, que representan los 2/3 de su edad actual. Â¿QuÃ© edad tiene Pedro?', '24 equivale a dos partes de la edad', '', 1, 3, 0),
(36, 37, 'MarÃ­a y su esposo ayer cocinaron una tortilla, la dividieron en 6 partes\r\niguales. MarÃ­a comiÃ³\r\n2/6  y su esposo 3/6\r\n, Â¿QuÃ© fracciÃ³n de la tortilla sobrÃ³?\r\n', 'Entre ambos comieron 5/6\r\n', '', 3, 3, 0),
(37, 38, 'Responde falso o verdadero al resultado de la anterior operaciÃ³n:', '', 'ayuda1.PNG', 2, 1, 0),
(38, 39, ' Un camiÃ³n cisterna destinado al riego de un parque ha transportado 50400 litros de agua en 14 viajes.\r\nÂ¿CuÃ¡ntos litros llevarÃ¡ en 5 viajes? \r\n', '', '', 1, 1, 0),
(39, 40, 'Una vendedora de bebidas recibe todos los meses 3 cajas de 24 botellas cada una y 16 botellas sueltas.Â¿CuÃ¡ntas botellas recibirÃ¡n al cabo de un aÃ±o? ', 'MultiplicaciÃ³n de nÃºmeros naturales', '', 1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_resultadoevaluaciones`
--

CREATE TABLE `tbl_resultadoevaluaciones` (
  `id_resultados` int(11) NOT NULL,
  `id_evaluacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `preguntas_malas` int(11) NOT NULL,
  `preguntas_buenas` int(11) NOT NULL,
  `id_preguntasmalas` text NOT NULL,
  `id_preguntasbuenas` text NOT NULL,
  `tiempoevaluacion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_resultadoevaluaciones`
--

INSERT INTO `tbl_resultadoevaluaciones` (`id_resultados`, `id_evaluacion`, `id_usuario`, `preguntas_malas`, `preguntas_buenas`, `id_preguntasmalas`, `id_preguntasbuenas`, `tiempoevaluacion`) VALUES
(1, 2, 20, 2, 8, '8,35', '11,1,18,16,33,31,27,32', '00:04:11'),
(2, 2, 22, 1, 9, '35', '1,15,3,16,6,31,34,27,33', '00:09:57'),
(3, 2, 24, 1, 9, '35', '1,12,3,6,13,33,32,34,27', '00:10:01'),
(4, 2, 23, 5, 5, '13,35,28,22,21', '11,5,12,3,20', '00:15:47'),
(5, 2, 19, 3, 7, '34,26,23', '17,2,19,6,9,33,35', '00:14:15'),
(6, 2, 25, 3, 7, '13,35,31', '4,8,6,2,30,33,32', '00:06:17'),
(7, 2, 26, 4, 6, '6,35,31,26', '11,8,2,13,33,30', '00:07:22'),
(8, 2, 18, 2, 2, '20,25', '23,26', '00:05:12'),
(9, 2, 28, 5, 5, '18,7,35,26,22', '4,1,1,33,32', '00:09:15'),
(10, 2, 27, 3, 7, '7,33,26', '4,2,3,13,35,32,25', '00:08:32'),
(11, 2, 29, 5, 5, '2,7,32,29,27', '14,4,5,20,23', '00:05:43'),
(12, 3, 30, 1, 9, '35', '1,12,19,9,16,34,31,28,33', '00:07:04'),
(13, 3, 31, 3, 7, '6,35,31', '4,18,9,5,26,33,32', '00:08:38'),
(14, 3, 33, 6, 4, '14,11,7,17,34,29', '4,28,21,30', '00:04:47'),
(15, 3, 34, 4, 6, '34,29,22,20', '11,18,19,6,13,33', '00:09:20'),
(16, 3, 32, 1, 8, '7', '11,15,6,32,31,33,34,35', '00:07:14'),
(17, 3, 36, 2, 7, '7,11', '4,15,6,32,33,31,34', '00:05:55'),
(18, 3, 37, 1, 9, '35', '14,12,19,9,13,33,32,34,31', '00:06:45'),
(19, 3, 39, 3, 7, '13,31,34', '4,8,15,3,30,33,32', '00:04:08'),
(20, 3, 38, 4, 6, '7,35,28,21', '14,2,9,16,33,20', '00:06:46'),
(21, 4, 43, 0, 5, '', '17,2,6,3,9', '00:02:34'),
(22, 4, 48, 6, 4, '19,35,29,22,20,23', '4,2,18,3', '00:04:25'),
(23, 4, 42, 0, 10, '', '17,5,13,6,19,31,33,35,34,32', '00:09:15'),
(24, 4, 41, 1, 7, '35', '17,15,13,9,33,30,34', '00:06:16'),
(25, 4, 49, 1, 0, '14', '', '00:00:39'),
(26, 4, 53, 2, 8, '31,34', '4,18,9,3,19,27,33,30', '00:06:59'),
(27, 4, 50, 2, 5, '34,29', '11,5,19,6,16', '00:07:26'),
(28, 4, 47, 3, 7, '7,34,35', '17,2,9,19,31,26,27', '00:07:44'),
(29, 4, 51, 1, 9, '7', '14,5,3,6,35,34,31,32,33', '00:08:06'),
(30, 4, 44, 2, 8, '7,31', '17,12,13,6,33,28,34,32', '00:09:42'),
(31, 4, 49, 2, 8, '15,34', '14,1,18,6,31,33,27,35', '00:04:26'),
(32, 4, 46, 3, 7, '15,34,31', '11,4,8,6,32,29,35', '00:07:49'),
(33, 4, 54, 0, 10, '', '14,8,6,9,3,34,33,32,31,35', '00:05:17'),
(34, 4, 43, 1, 9, '31', '14,12,6,9,16,32,34,33,35', '00:05:56'),
(35, 4, 58, 6, 4, '19,18,23,22,28,25', '14,2,13,21', '00:03:31'),
(36, 4, 55, 2, 8, '14,15', '4,11,2,31,33,32,34,35', '00:04:24'),
(37, 4, 45, 4, 6, '13,34,35,28', '17,8,3,19,26,27', '00:03:50'),
(38, 4, 57, 2, 8, '7,34', '14,5,19,13,32,26,31,33', '00:06:38'),
(39, 4, 61, 0, 10, '', '11,8,6,16,9,35,32,34,31,33', '00:08:27'),
(40, 4, 50, 4, 6, '7,19,28,22', '11,8,3,25,30,32', '00:04:12'),
(41, 4, 52, 0, 10, '', '17,2,9,6,3,33,31,32,34,35', '00:02:36'),
(42, 4, 55, 1, 9, '7', '17,8,16,19,33,32,31,35,34', '00:04:36'),
(43, 4, 59, 7, 3, '3,15,14,29,23,21,22', '17,2,20', '00:06:54'),
(44, 4, 55, 0, 4, '', '1,2,9,6', '00:01:22'),
(45, 1, 62, 1, 9, '35', '11,12,9,16,13,33,31,30,34', '00:14:57'),
(46, 1, 65, 1, 8, '34', '11,8,3,13,31,32,33', '00:05:09'),
(47, 1, 67, 3, 7, '12,35,31', '14,1,15,16,26,34,33', '00:04:52'),
(49, 1, 69, 1, 9, '34', '14,15,19,13,16,31,29,33,32', '00:06:11'),
(51, 1, 63, 2, 8, '35,31', '17,8,9,16,13,34,33,30', '00:08:13'),
(52, 5, 74, 1, 8, '15', '14,17,5,9,13,16,6,16', '00:04:09'),
(53, 5, 70, 2, 8, '18', '11,1,5,13,9,19,16,9', '00:05:44'),
(54, 5, 72, 1, 9, '6', '11,18,9,3,9,8,19,16,9', '00:06:26'),
(55, 5, 75, 2, 8, '13,5', '11,12,3,16,13,3,3,14', '00:09:36'),
(56, 2, 78, 1, 8, '34', '4,18,13,19,9,33,32,31', '00:03:26'),
(57, 5, 81, 2, 8, '13,13', '4,12,2,5,9,16,13,3', '00:05:25'),
(58, 1, 64, 1, 9, '35', '14,8,6,9,19,32,31,29,33', '00:03:44'),
(59, 5, 79, 0, 10, '', '4,18,6,9,13,16,3,19,3,9', '00:11:43'),
(60, 1, 73, 0, 3, '', '20,30,31', '00:02:15'),
(61, 5, 71, 0, 2, '', '4,4', '00:00:28'),
(62, 5, 84, 3, 5, '5,15,19', '14,1,14,18,18', '00:04:06'),
(63, 5, 73, 0, 9, '', '11,18,3,13,16,13,19,3,9', '00:04:32'),
(64, 5, 77, 4, 6, '9,15,11,9', '4,5,7,5,6,13', '00:04:33'),
(65, 1, 84, 4, 6, '16,33,35,26', '4,12,18,13,28,34', '00:03:01'),
(66, 5, 71, 5, 5, '11,18,4,18,19', '1,1,1,2,15', '00:01:04'),
(67, 5, 83, 1, 9, '6', '1,15,19,13,16,16,9,13,19', '00:02:22'),
(68, 5, 80, 0, 1, '', '3', '00:00:27'),
(69, 5, 80, 1, 9, '35', '14,15,6,13,9,31,33,32,34', '00:04:52'),
(70, 5, 85, 2, 8, '8,34', '7,17,18,6,31,32,33,28', '00:03:09'),
(71, 5, 76, 3, 7, '19,34,35', '4,5,9,8,33,31,27', '00:04:12'),
(72, 5, 68, 2, 8, '19,35', '1,8,16,5,31,33,32,26', '00:01:44'),
(73, 5, 82, 3, 7, '19,34,26', '4,8,3,13,28,32,33', '00:01:21'),
(74, 5, 2, 0, 1, '', '4', '00:08:02'),
(75, 6, 90, 3, 7, '18,12,32,26', '4,11,14,30,20,28,20', '00:04:28'),
(76, 6, 89, 2, 8, '31,35', '1,2,13,19,6,28,32,30', '00:07:12'),
(77, 6, 92, 3, 7, '32,33,31', '14,2,19,16,3,29,26', '00:08:14'),
(78, 6, 91, 7, 3, '4,6,26,21,22,23,20', '7,18,3', '00:11:14'),
(79, 6, 93, 2, 8, '35,34', '1,2,19,6,13,33,26,31', '00:03:59'),
(80, 6, 94, 0, 10, '', '17,17,3,3,9,33,35,32,32,31', '00:11:01'),
(81, 6, 100, 2, 8, '31,34', '11,8,16,6,9,33,28,32', '00:10:25'),
(82, 6, 99, 3, 7, '6,31,35', '1,8,9,16,30,26,32', '00:05:40'),
(83, 6, 97, 4, 6, '31,29,25,28', '4,8,16,9,3,20', '00:07:23'),
(84, 6, 103, 3, 7, '12,18,34', '17,7,11,27,33,32,26', '00:07:30'),
(85, 6, 106, 5, 5, '17,12,14,34,35', '4,7,30,27,26', '00:04:49'),
(86, 6, 108, 1, 9, '35', '1,8,9,16,3,32,33,30,31', '00:04:29'),
(87, 6, 98, 4, 6, '7,14,8,35', '1,17,26,32,33,28', '00:10:43'),
(88, 6, 101, 5, 5, '5,11,4,34,31', '14,7,27,30,28', '00:06:27'),
(89, 6, 112, 2, 8, '35,34', '14,5,19,6,3,26,31,27', '00:03:38'),
(90, 6, 109, 4, 6, '35,29,27,23', '4,15,9,19,6,22', '00:08:13'),
(91, 6, 110, 6, 4, '15,17,7,14,22,31', '4,25,28,32', '00:04:33'),
(92, 6, 114, 2, 8, '34,35', '14,2,6,3,16,31,32,28', '00:03:55'),
(93, 6, 115, 3, 7, '35,34,26', '11,2,13,9,19,33,27', '00:03:10'),
(95, 6, 116, 4, 6, '13,35,28,23', '1,2,9,5,31,34', '00:04:51'),
(96, 6, 105, 4, 6, '6,34,28,23', '4,15,19,5,32,21', '00:05:38'),
(98, 6, 119, 5, 5, '11,9,29,32,26', '17,18,13,21,30', '00:03:14'),
(99, 6, 120, 7, 3, '8,12,4,25,22,20,23', '17,11,21', '00:02:23'),
(100, 6, 121, 4, 6, '14,12,31,29', '4,1,5,23,30,33', '00:02:56'),
(101, 6, 122, 2, 8, '6,28', '1,5,3,19,20,27,32,32', '00:05:32'),
(102, 6, 118, 2, 8, '19,34', '4,15,13,18,35,27,31,32', '00:03:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_seleccion`
--

CREATE TABLE `tbl_seleccion` (
  `id_seleccion` int(11) NOT NULL,
  `id_evaluacion` int(11) NOT NULL,
  `id_temas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_seleccion`
--

INSERT INTO `tbl_seleccion` (`id_seleccion`, `id_evaluacion`, `id_temas`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2),
(7, 4, 1),
(8, 4, 2),
(9, 5, 1),
(10, 5, 2),
(11, 6, 1),
(12, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_temas`
--

CREATE TABLE `tbl_temas` (
  `id_temas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tema` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_temas`
--

INSERT INTO `tbl_temas` (`id_temas`, `id_usuario`, `tema`) VALUES
(1, 1, 'Suma y Resta de Fracciones Homogeneas'),
(2, 1, 'Fracciones Propias y nÃºmeros naturales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `USU_ID` int(11) NOT NULL,
  `USU_DOCUMENTO` varchar(15) NOT NULL,
  `USU_NOMBRE` varchar(50) NOT NULL,
  `USU_APELLIDO` varchar(50) NOT NULL,
  `USU_CORREO` varchar(100) NOT NULL,
  `USU_GENERO` varchar(15) NOT NULL,
  `USU_TIPO_USUARIO` int(11) NOT NULL,
  `grado` int(11) DEFAULT NULL,
  `USU_INSTITUCION` varchar(256) NOT NULL,
  `USU_PASSWORD` varchar(30) NOT NULL,
  `USU_ACTIVACION` int(11) NOT NULL,
  `USU_TOKEN` int(40) DEFAULT NULL,
  `USU_ULTIMA_SESION` datetime DEFAULT NULL,
  `USU_SOLICITUD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`USU_ID`, `USU_DOCUMENTO`, `USU_NOMBRE`, `USU_APELLIDO`, `USU_CORREO`, `USU_GENERO`, `USU_TIPO_USUARIO`, `grado`, `USU_INSTITUCION`, `USU_PASSWORD`, `USU_ACTIVACION`, `USU_TOKEN`, `USU_ULTIMA_SESION`, `USU_SOLICITUD`) VALUES
(1, '1062780510', 'Haimer Andres ', 'Muse Quilindo', 'quilindo.haimer328@gmail.com', 'hombre', 3, 0, 'Popayan', '1062', 1, 262, '2020-03-11 13:55:22', 1),
(2, '1062', 'haimer', 'muse', 'andres@gmail.com', 'hombre', 2, 7, 'popayan', '123', 1, 0, '2020-03-11 13:53:29', 1),
(16, '1060990756', 'arnol', 'Narvaez H', 'arnolhigon@gmail.com', 'hombre', 2, 7, 'fup', '123', 1, 2813423, '2020-03-02 11:03:33', 1),
(17, '3134587693', 'kevin andres oino rojas', 'oino rojas', 'keviinandres@gmail.com', 'hombre', 2, 6, 'Liceo', '3134587693', 1, 55, '0000-00-00 00:00:00', 0),
(18, '3116561114', 'esteban', 'cantor', 'esteban@gmail', 'hombre', 2, 6, 'liceo', 'esteban', 1, 0, '2020-02-19 09:22:42', 1),
(19, '3148358686', 'stiven', 'hio pito', 'stiven@gmail.com', 'hombre', 2, 6, 'liceo', '123', 1, 6, '2020-02-19 08:40:46', 1),
(20, '3106175121', 'yohana oino rojas', 'oino rojas', 'yohana@gmail', 'Mujer', 2, 6, 'liceo', '1004248147', 1, 0, '2020-02-19 08:43:18', 1),
(21, '1112048198', 'juan sebastian', 'fernandez', 'juansebastianfernandez2008@gmail.com', 'hombre', 2, 6, 'eliseo', 'josse123', 1, 5, '0000-00-00 00:00:00', 0),
(22, '1029602132', 'SILVANA ANDREA', 'GUERRERO PAYAN', 'ZHARITOGUERRERO@GMAIL.COM', 'Mujer', 2, 6, 'LICEO ALEJANDRO DE HUMBOLTD', '1903', 1, 0, '2020-02-19 08:44:43', 1),
(23, '3135519636', 'laura', 'gomez ome', 'alexalaura@gmail.com', 'Mujer', 2, 6, 'l', '123456789', 1, 0, '2020-02-19 08:46:21', 1),
(24, '123454 ', 'alver joser', 'rodriguez', 'alver@gmail.com', 'hombre', 2, 6, 'liceo', '123', 1, 6, '2020-02-19 08:45:59', 1),
(25, '1061716685', 'Mayerli Andrea ', 'RAMIREZ ORTEGA', 'ORTEGA@GMAIL.COM', 'Mujer', 2, 6, 'LICEO', '123', 1, 0, '2020-02-19 08:49:20', 1),
(26, '3206701838', 'jamilton', 'grijalva hurtado', 'jamilton@gmal.com', 'hombre', 2, 6, 'liceo', '123456789', 1, 3, '2020-02-19 08:53:00', 1),
(27, '3208227927', 'yuli ketherine', 'urrutia dagua', 'yuli@gmail.com', 'Mujer', 2, 6, 'liceo', 'yuli', 1, 0, '2020-02-19 08:53:52', 1),
(28, '3106211455', 'YISON DARIO', 'GARSON PAME', 'YEISON@GMAIL.COM', 'hombre', 2, 6, 'LISEO ALEJANDRO  ', '123', 1, 0, '2020-02-19 08:58:21', 1),
(29, '3234797485', 'jhonatan', 'gurrute', 'jhonatan@gmail.com', 'hombre', 2, 6, 'liceo', '12345', 1, 0, '2020-02-19 09:01:22', 1),
(30, '1058967871', 'david', 'perez', 'davidperez@gmail.com', 'hombre', 2, 8, 'liceo alejandro de humbolt', 'dapp20.09', 1, 0, '2020-02-19 09:17:02', 1),
(31, '1058547952', 'karen tatiana', 'golomdrino muÃ±oz', 'karentatiana@gmail.com', 'Mujer', 2, 8, 'liceo alejandro de humboldt', 'karenmuÃ±oz', 1, 0, '2020-02-19 09:18:16', 1),
(32, '1060796959', 'juan camilo', 'martinez sanchez', 'martinez2@gmail.com', 'hombre', 2, 8, 'I E LICEO ALEJANDRO DE HUMBOLDT', 'JUANCAMILO', 1, 25915, '2020-02-19 09:21:57', 1),
(33, '3006779929', 'sharith sofia', 'valencia ', 'sofiavalencia@gmail.com', 'Mujer', 2, 8, 'liceo alejandro de humboldt', 'burakozcivit', 1, 132, '2020-02-19 09:22:55', 1),
(34, '3114015607', 'Laura Sofia', 'Vargas Causaya ', 'sofiavargas@gmail.com', 'Mujer', 2, 8, 'Liceo Alejandro De Humboldt', 'cristianlasso', 1, 36, '2020-02-19 09:23:00', 1),
(35, '1061709273', 'everth armando ', 'sanchez dorado', 'everrharmando123@gmail.com', 'hombre', 2, 8, 'liceo alejandro de humboldt', '2006', 1, 55, '2020-02-19 09:24:12', 1),
(36, '1126447026', 'JAIDER WILLY ', 'GASPAR ALDANA', 'JAIDER.GASPAR2018@GMAIL.COM', 'hombre', 2, 8, 'LICEO ALEANDRO DE HUMBOLDT', '12345', 1, 0, '2020-02-19 09:23:33', 1),
(37, '3219476949', 'jhon jaiver ', 'ruiz betancur ', 'ruiz@gmail.com', 'hombre', 2, 8, 'liceo alejandro de humbolt', '1234567', 1, 0, '2020-02-19 09:25:37', 1),
(38, '1060798344', 'DIANEY', 'ZUÃ‘IGA YANDI', 'DIANEYYANDI@GMAIL.COM', 'Mujer', 2, 8, 'LICEO', '123456', 1, 7, '2020-02-19 09:26:08', 1),
(39, '1123203112', 'jhon jarol', 'suarez rodriguez', 'jhon@gmail.com', 'hombre', 2, 8, 'liceo alejandro dehumboldt', '2005', 1, 0, '2020-02-19 09:28:02', 1),
(40, '1002959466', 'Brayan', 'Ramirez', 'brayanramirez@email.com', 'hombre', 2, 11, 'Liceo Alejandro de humboldt ', 'brayan007', 1, 0, '0000-00-00 00:00:00', 0),
(41, '1059902051', 'Natalia', 'Ruiz', 'natiruizortiz@gmail.com', 'Mujer', 2, 11, 'Liceo Alejandro de Humboldt', 'nataliaruiz123', 1, 0, '2020-02-19 11:56:06', 1),
(42, '1192740684', 'Esteban', 'Burbano', 'esteburaries@gmail.com', 'hombre', 2, 11, 'Liceo Alejandro de Humboldt', 'yoamoamifamilia4', 1, 52056, '2020-02-19 11:57:38', 1),
(43, '1061684104', 'Libardo andres', 'Holguin ante', 'andresholguin451@gmail.com', 'hombre', 2, 11, 'Liceo alejandro de humboldt', 'yera.andresH', 1, 0, '2020-02-19 11:57:59', 1),
(44, '1059474651', 'Estefania ', 'Noguera ', 'enogueranarvaez@gmail.com', 'Mujer', 2, 11, 'Liceo Alejandro de Humboldt ', '1059474651', 1, 0, '2020-02-19 11:57:41', 1),
(45, '1002965573', 'sebastian', 'rengifo bolaÃ±os', 'itachi117sebastian@gmail.com', 'hombre', 2, 11, 'Liceo Alejandro de humboldt', 'qwerty1234509876', 1, 9786, '2020-02-19 12:08:19', 1),
(46, '1002820256', 'Juan Manuel ', 'MejÃ­a trochez ', 'juanmanuelmejia2002@gmail.com', 'hombre', 2, 11, 'Liceo Alejandro de Humboldt ', 'halo123456789', 1, 60, '2020-02-19 11:57:40', 1),
(47, '1058546025', 'Katherin Andrea', 'PeÃ±a Martinez ', 'penakatherin3@gmail.com', 'Mujer', 2, 11, 'Liceo Alejando de Humbolt', 'america2015', 1, 8, '2020-02-19 11:58:02', 1),
(48, '1002964854', 'Karen', 'OrdÃ³Ã±ez ', 'karenpalechor70@gmail.com', 'Mujer', 2, 11, 'Liceo Alejandro de hombolt', '3146735624', 1, 0, '2020-02-19 11:58:15', 1),
(49, '3104123609', 'Hasly', 'NarvÃ¡ez', 'yusieth2016@gmail.com', 'Mujer', 2, 11, 'InstituciÃ³n educativa Liceo Alejandro De Humboldt', '3104123609', 1, 76, '2020-02-19 11:58:13', 1),
(50, '3013171976', 'Diana fernanda', 'Rojas catuche', 'dianafer608@gmail.com', 'Mujer', 2, 11, 'Liceo Alejandro de humboldt', 'dianafer15', 1, 0, '2020-02-19 11:59:05', 1),
(51, '1002966214', 'Juan jose', 'Vargas', 'vargascausa@gmail.com', 'hombre', 2, 11, 'Educativa liceo alejandro de humboldt', 'juanjovargas', 1, 0, '2020-02-19 11:58:51', 1),
(52, '1002948757', 'Alejandra', 'PeÃ±a', 'karen26cuchillo@gmail.com', 'Mujer', 2, 11, 'Institucion liceo Alejandro de humboldt', 'alejandra1626', 1, 8865, '2020-02-19 12:12:51', 1),
(53, '1002968083', 'Marcel yesid', 'David ohmen', 'pichita3.0@gmail.com', 'hombre', 2, 11, 'Liveo', 'melapelas', 1, 0, '2020-02-19 11:59:40', 1),
(54, '1004154122', 'Angela', 'Quilindo', 'angela20mosca@gmail.com', 'Mujer', 2, 11, 'Institucion liceo Alejandro de humboldt', 'angela01', 1, 6521, '2020-02-19 12:03:48', 1),
(55, '3136546648', 'Mercy', 'Agredo', 'rocioagredo132003@gmail.com', 'Mujer', 2, 11, 'Liceo Alejandro de Humbold', 'diosesamor', 1, 1, '2020-02-19 12:07:04', 1),
(56, '1007190552', 'Kevin', 'Riascos', 'kevinr68@gmail.com', 'hombre', 2, 11, 'Liceo Alejandro de humboldt', 'kevinriascos23', 1, 2147483647, '2020-02-19 12:02:45', 1),
(57, '3137163736', 'Katherine', 'MuÃ±os', 'kathe8377@gmail.com', 'Mujer', 2, 11, 'Liceo alejandro de humboldt', '09/09/18', 1, 0, '2020-02-19 12:06:12', 1),
(58, '1002967069', 'Andrea yineth', 'GarcÃ­a Escobar', 'garciaescobar18andrea@gmail.com', 'hombre', 2, 11, 'Liceo Alejandro de Humboldt', 'Andrea18', 1, 0, '2020-02-19 12:06:12', 1),
(59, '3233899954', 'Valentina', 'Cobo', 'valentinacobo206@gmail.com', 'Mujer', 2, 11, 'Liceo Alejandro de humboldt', '5221', 1, 208, '2020-02-19 12:17:39', 1),
(60, '1006813966', 'Jhon alexander', 'Rodriguez', 'jr33463107@gamil.com', 'hombre', 2, 11, 'Liceo Alejandro de humboldt', 'sapahp2002', 1, 0, '0000-00-00 00:00:00', 0),
(61, '1061693734', 'Alex David', 'Guaitarilla', 'davidguaitarilla17@gmail.con', 'hombre', 2, 11, 'Liceo Alejandro de Humboldt', 'artefacto', 1, 5893, '2020-02-19 12:12:05', 1),
(62, '1029600667', 'Maria Jose ', 'Molano Hurtado ', 'Majomolano1219@gmail.com', 'Mujer', 2, 7, 'CICMA', 'yh1029600667fm06', 1, 4853, '2020-02-20 12:09:18', 1),
(63, '1059238654', 'Valentina', 'Lopez', 'valentina.lopezbalcazar@gmail.com', 'Mujer', 2, 7, 'Cicma', 'odie11', 1, 7, '2020-02-20 12:32:53', 1),
(64, '1061704681', 'cristianalejandro', 'itaz palechor', 'alejandrocristian@gmail.com', '', 2, 7, 'cicma', 'contraseÃ±a', 1, 33, '2020-02-20 12:13:23', 1),
(65, '3105078641', 'Angie Camila', 'MuÃ±oz Joaqui', 'camilamuÃ±oz16205@gmail.com', 'Mujer', 2, 7, 'CICMA', '3105078641', 1, 4, '2020-02-20 12:14:01', 1),
(66, 'Carevergaas', 'Maria Camila ', 'Gonzalez Martinez', 'Camilagonzalez@gmail', 'Mujer', 2, 7, 'Cicma', 'Carepipis', 1, 1831, '0000-00-00 00:00:00', 0),
(67, '1029601427', 'eilyn gabriela', 'ipiales osorio', 'eilyngabrielaipiales@gmail.com', 'Mujer', 2, 7, 'CICMA', 'fernandomuÃ±oz', 1, 0, '2020-02-20 12:16:58', 1),
(68, '3215752013', 'alison ', 'potosi', 'alisortiz@gmal.com', 'Mujer', 2, 7, 'cicma', 'carepipis', 1, 69, '2020-02-21 11:30:30', 1),
(69, '3223903953', 'nicoll valeria', 'bolaÃ±os chilito', 'nicollvale@gmail.com', 'Mujer', 2, 7, 'CICMA', 'valeriasopavaleria', 1, 6, '2020-02-20 12:16:59', 1),
(70, '1061724847', 'natalia', 'potosi', 'potosinatalia4@gmail.com', 'Mujer', 2, 7, 'cicma', 'nada nada', 1, 89, '2020-02-20 12:19:17', 1),
(71, '1059239574', 'karen sofia ', 'orozco bolaÃ±os ', 'sofyoroz9999@gmail.com', 'Mujer', 2, 7, 'marinita otero cicma', 'karensofia', 1, 1, '2020-02-20 12:20:43', 1),
(72, '3139488109', 'vanessa', 'fernandez', 'valejandrafdez@gmail.com', 'Mujer', 2, 7, 'CICMA', 'password21', 1, 0, '2020-02-20 12:22:28', 1),
(73, '1029600503', 'juan esteban', 'jurado majin', 'Juradojuanesteban@gmail.com', 'hombre', 2, 7, 'centro inmaculado corazon de maria', 'Simona2.0', 1, 30, '2020-02-20 12:21:50', 1),
(74, '3226679016', 'Camila ', 'gonzalez', 'Camilagonzalez@gmail.com', 'Mujer', 2, 7, 'Cicma', 'camila', 1, 0, '2020-02-20 12:21:31', 1),
(75, '1080693291', 'Danna Sofia', 'Guerrrero Dejoy', 'monitadeseda01@gmail.com', 'Mujer', 2, 7, 'CICMA', '1407Danna', 1, 0, '2020-02-20 12:22:55', 1),
(76, '3105990144', 'juan manuel ', 'bravo lopez', 'bravolopezjuanmanuel73@gmail.com', 'hombre', 2, 7, 'CICMA', '3105990144', 1, 9, '2020-02-21 11:23:27', 1),
(77, '3113964801', 'anny valentina', 'sanchez laserna', 'anny123@gmail.com', 'Mujer', 2, 7, 'marinita otero cicma ', '123', 1, 9, '2020-02-20 12:34:37', 1),
(78, '3207508374', 'melissa', 'lenis garcia', 'melissalenisgarcia@gmail.com', 'Mujer', 2, 7, 'CICMA', 'luismiguel1', 1, 8, '2020-02-20 12:25:02', 1),
(79, '1058993442', 'juan esteban ', 'porras diaz', 'juanporras@gmail.com', 'hombre', 2, 7, 'colegio inmaculado corazon de maria', '1058993442', 1, 0, '2020-02-20 12:26:22', 1),
(80, '8366275', 'OSCAR JULIAN', 'CELY GOMEZ', 'OSCARJU27@GMAIL.COM', 'hombre', 2, 7, 'CENTRO INMACULADO CORAZON DE MARIA', 'OSCAR039', 1, 42260, '2020-02-21 11:00:14', 1),
(81, '1063454809', 'johan alejandro', 'ortega muÃ±oz ', 'originscreed2@gmail.com', 'hombre', 2, 7, 'CENTRO IMACULADO CORAZON DE MARIA', 'alejandro123', 1, 2147483647, '2020-02-20 12:27:08', 1),
(82, '3125189825', 'nikole valeria', 'euscategui rosales', 'valeriaEuscategui1223@gmail.com', 'Mujer', 2, 7, 'CICMA', 'valeriasopavaleria', 1, 2862054, '2020-02-21 11:38:05', 1),
(83, '3137285963', 'cristian camilo', 'sacanamboy martinez', 'cristiansacanamboy@gmail.com', 'hombre', 2, 7, 'CICMA', 'camilo.com', 1, 1, '2020-02-20 12:39:55', 1),
(84, '1000109118052', 'julian', 'gomez', 'gomez@gmail.com', 'hombre', 2, 7, 'cisma', '123', 1, 0, '2020-02-20 12:31:39', 1),
(85, 'samuel7', 'samuel ', 'medina ', 'samuelmedina@gmail.com', 'hombre', 2, 7, 'cicma', '1234', 1, 0, '2020-02-21 11:17:49', 1),
(89, '3013859047', 'mariela', 'diaz chavez', '0', 'Mujer', 2, 7, 'la cabaÃ±a', 'mari', 1, 56310, '2020-03-02 12:16:20', 1),
(90, '3218613685', 'yuli jimena', 'ruano meneses', '0', 'Mujer', 2, 7, 'educativa la cabaÃ±a', '3218613685', 1, 0, '2020-03-02 12:17:05', 1),
(91, '3186432437', 'wendy vanesa', 'mera bojorge', '0', 'Mujer', 2, 7, 'educativa la cabaÃ±a', 'vanessamera', 1, 0, '2020-03-02 12:17:46', 1),
(92, '323361658', 'laura vanesa ', 'acosta diaz', '0', 'Mujer', 2, 7, 'la cabaÃ±a', '34329897', 1, 5, '2020-03-02 12:18:10', 1),
(93, '3206336452', 'Anderson', 'DomÃ­nguez Samboni', '0', 'hombre', 2, 7, 'La cabaÃ±a', '12345', 1, 85, '2020-03-02 12:18:32', 1),
(94, '3122720442', 'angela dayana', 'madroÃ±ero belalcazar', '0', 'Mujer', 2, 7, 'educativa la cabaÃ±a', 'sara', 1, 0, '2020-03-02 12:19:23', 1),
(95, '3206336452', 'Anderson', 'DomÃ­nguez Samboni', '0', 'hombre', 2, 7, 'La cabaÃ±a', '12345', 1, 2147483647, '0000-00-00 00:00:00', 0),
(96, 'daniel astudill', 'daniel', 'astudillo', '0', 'hombre', 2, 7, 'institucion educativa lacabaÃ±a', 'danielastudillo', 1, 1, '0000-00-00 00:00:00', 0),
(97, '3144049249', 'Yisel ', 'Hurtado Salazar', '0', 'Mujer', 2, 7, 'educatiba lacabaÃ±a', 'yisel14', 1, 0, '2020-03-02 12:20:49', 1),
(98, '3207679862', 'Leider  yamir', 'paguatian', '0', 'hombre', 2, 7, 'la cabaÃ±a', 'leiderp', 1, 30, '2020-03-02 12:23:30', 1),
(99, '3006743432', 'Eduar alexis', 'muÃ±oz delgado', '0', 'hombre', 2, 7, 'institucion educatiba la cabaÃ±a', 'masmelo', 1, 0, '2020-03-02 12:21:49', 1),
(100, '3006593402', 'yina valeria', 'erazo velasco', '0', 'Mujer', 2, 7, 'educativa la cabaÃ±a', '1061728948', 1, 2147483647, '2020-03-02 12:22:53', 1),
(101, '3017346988', 'Elder Fabian', 'MuÃ±oz Delgado', '0', 'hombre', 2, 7, 'istitucion educativa la cabaÃ±a', 'fabian', 1, 0, '2020-03-02 12:25:09', 1),
(102, '3144049249', 'Yisel ', 'Hurtado Salazar ', '0', 'Mujer', 2, 7, 'educatiba la cabaÃ±a ', 'yisel14', 1, 0, '0000-00-00 00:00:00', 0),
(103, '4615959', 'leidy dayana ', 'molano meneses', '0', 'Mujer', 2, 7, 'institucion educativa la cabaa', 'samuelsantander', 1, 3, '2020-03-02 12:23:48', 1),
(104, '3017346988', 'stiven ', 'muÃ±oz', '0', 'hombre', 2, 7, 'institucion educativa la cabaÃ±a', 'muÃ±ozstiven', 1, 1, '0000-00-00 00:00:00', 0),
(105, '312 350 09 93', 'Margarita', 'Fernandez Astudillo', '0', 'Mujer', 2, 7, 'Educativa La CabaÃ±a Timbio', '1234', 1, 3, '2020-03-02 12:24:09', 1),
(106, '3207835355', 'Diego Alejandro ', 'Ortiz Sotelo', '0', 'hombre', 2, 7, 'institucion educativa la cabaÃ±a', '123', 1, 78003, '2020-03-02 12:25:25', 1),
(108, '3217393716', 'SERGIO ', 'MAPALLO MOSQUERA', '0', 'hombre', 2, 7, 'LA CABAÃ‘A TIMBIO', 'SERGIO1234', 1, 0, '2020-03-02 12:25:27', 1),
(109, '3226235716', 'jose alexis', 'potosÃ­ pacheco', '0', 'hombre', 2, 7, 'la cabaÃ±a', 'alexis', 1, 4, '2020-03-02 12:25:45', 1),
(110, '3234817174', 'deiner', 'leal', '0', 'hombre', 2, 7, 'educativa la cabaÃ±a', 'jurare', 1, 533, '2020-03-02 12:25:54', 1),
(111, '312 350 09 93', 'Margarita', 'Fernandez Astudillo', '0', 'Mujer', 2, 7, 'Educativa La CabaÃ±a Timbio', '1234', 1, 0, '0000-00-00 00:00:00', 0),
(112, '3176410308', 'alejandra', 'bojorge collazos', '0', 'Mujer', 2, 7, 'educativa la cabaÃ±a', 'santiago', 1, 6, '2020-03-02 12:27:05', 1),
(114, '1061713058', 'andres felipe ', 'muÃ±oz chavez', '0', 'hombre', 2, 7, 'la cabana', '1234', 1, 8, '2020-03-02 12:27:45', 1),
(115, 'daniel 12345', 'daniel', 'astudillo', '0', 'hombre', 2, 7, 'institucion educativa la cabaÃ±a', 'tu papi yt', 1, 37, '2020-03-02 12:28:12', 1),
(116, '30173469', 'Estiven', 'MuÃ±oz', '0', 'hombre', 2, 7, 'Lc', '123', 1, 3, '2020-03-02 12:29:21', 1),
(117, '312 350 09 93', 'MARGARITA ', 'FERNANDEZ ASTUDILLO', '0', 'Mujer', 2, 7, 'educativa la cabaÃ±a', '12345', 1, 0, '0000-00-00 00:00:00', 0),
(118, '3122866452', 'camila andrea', 'sanchez pino', '0', 'Mujer', 2, 7, 'educativa la cabaÃ±a', 'luisa', 1, 55, '2020-03-02 12:38:23', 1),
(119, '3017085721', 'luis f', 'cortes', '0', 'hombre', 2, 7, 'lc', '123', 1, 0, '2020-03-02 12:34:12', 1),
(120, '321613', 'laura sofia', 'dominguez mera', '0', 'Mujer', 2, 7, 'institucion educativa la cabana', '123', 1, 397, '2020-03-02 12:34:57', 1),
(121, '3024220877', 'nicol', 'agredo diaz', '0', 'Mujer', 2, 7, 'educativa la cabaÃ±a', 'nicol', 1, 72, '2020-03-02 12:36:58', 1),
(122, '3158067708', 'ROGER IVAN', 'SAMBONI GOMEZ', '0', 'hombre', 2, 7, 'LA CABAÃ‘A', '141993', 1, 416, '2020-03-02 12:37:03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta`
--

CREATE TABLE `tipo_pregunta` (
  `id_tipo_pregunta` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pregunta`
--

INSERT INTO `tipo_pregunta` (`id_tipo_pregunta`, `nombre`, `descripcion`) VALUES
(1, 'SelecciÃ³n mÃºltiple', 'Se podrÃ¡ escoger solo una opciÃ³n\r\nelemento input type radio'),
(2, 'Preguntas Falso Verdadero', 'Se podrÃ¡ escoger una opciÃ³n\r\nElemento select y option'),
(3, 'pregunta con imagenes', 'Se podrÃ¡ escoger mÃ¡s de una opciÃ³n\r\ninput type checkbox ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contexto`
--
ALTER TABLE `tbl_contexto`
  ADD PRIMARY KEY (`id_contexto`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `tbl_dificultad`
--
ALTER TABLE `tbl_dificultad`
  ADD PRIMARY KEY (`id_dificultad`);

--
-- Indices de la tabla `tbl_evaluaciones`
--
ALTER TABLE `tbl_evaluaciones`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_historialpreguntas`
--
ALTER TABLE `tbl_historialpreguntas`
  ADD PRIMARY KEY (`id_historial`),
  ADD UNIQUE KEY `id_pregunta_2` (`id_pregunta`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `tbl_opciones`
--
ALTER TABLE `tbl_opciones`
  ADD PRIMARY KEY (`id_opcion`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `tbl_opcionesfv`
--
ALTER TABLE `tbl_opcionesfv`
  ADD PRIMARY KEY (`id_opcion`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `tbl_opcionesimagen`
--
ALTER TABLE `tbl_opcionesimagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_contexto` (`id_contexto`),
  ADD KEY `id_tipo_pregunta` (`id_tipo_pregunta`),
  ADD KEY `id_dificultad` (`id_dificultad`);

--
-- Indices de la tabla `tbl_resultadoevaluaciones`
--
ALTER TABLE `tbl_resultadoevaluaciones`
  ADD PRIMARY KEY (`id_resultados`),
  ADD KEY `id_evaluacion` (`id_evaluacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_seleccion`
--
ALTER TABLE `tbl_seleccion`
  ADD PRIMARY KEY (`id_seleccion`),
  ADD KEY `id_evaluacion` (`id_evaluacion`);

--
-- Indices de la tabla `tbl_temas`
--
ALTER TABLE `tbl_temas`
  ADD PRIMARY KEY (`id_temas`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`USU_ID`);

--
-- Indices de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  ADD PRIMARY KEY (`id_tipo_pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contexto`
--
ALTER TABLE `tbl_contexto`
  MODIFY `id_contexto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `tbl_dificultad`
--
ALTER TABLE `tbl_dificultad`
  MODIFY `id_dificultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_evaluaciones`
--
ALTER TABLE `tbl_evaluaciones`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_historialpreguntas`
--
ALTER TABLE `tbl_historialpreguntas`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `tbl_opciones`
--
ALTER TABLE `tbl_opciones`
  MODIFY `id_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `tbl_opcionesfv`
--
ALTER TABLE `tbl_opcionesfv`
  MODIFY `id_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tbl_opcionesimagen`
--
ALTER TABLE `tbl_opcionesimagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `tbl_resultadoevaluaciones`
--
ALTER TABLE `tbl_resultadoevaluaciones`
  MODIFY `id_resultados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `tbl_seleccion`
--
ALTER TABLE `tbl_seleccion`
  MODIFY `id_seleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tbl_temas`
--
ALTER TABLE `tbl_temas`
  MODIFY `id_temas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `USU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  MODIFY `id_tipo_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_contexto`
--
ALTER TABLE `tbl_contexto`
  ADD CONSTRAINT `tbl_contexto_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `tbl_temas` (`id_temas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_evaluaciones`
--
ALTER TABLE `tbl_evaluaciones`
  ADD CONSTRAINT `tbl_evaluaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`USU_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_historialpreguntas`
--
ALTER TABLE `tbl_historialpreguntas`
  ADD CONSTRAINT `tbl_historialpreguntas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `tbl_preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_opciones`
--
ALTER TABLE `tbl_opciones`
  ADD CONSTRAINT `tbl_opciones_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `tbl_preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_opcionesfv`
--
ALTER TABLE `tbl_opcionesfv`
  ADD CONSTRAINT `tbl_opcionesfv_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `tbl_preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_opcionesimagen`
--
ALTER TABLE `tbl_opcionesimagen`
  ADD CONSTRAINT `tbl_opcionesimagen_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `tbl_preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  ADD CONSTRAINT `tbl_preguntas_ibfk_1` FOREIGN KEY (`id_contexto`) REFERENCES `tbl_contexto` (`id_contexto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_preguntas_ibfk_2` FOREIGN KEY (`id_tipo_pregunta`) REFERENCES `tipo_pregunta` (`id_tipo_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_preguntas_ibfk_3` FOREIGN KEY (`id_dificultad`) REFERENCES `tbl_dificultad` (`id_dificultad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_resultadoevaluaciones`
--
ALTER TABLE `tbl_resultadoevaluaciones`
  ADD CONSTRAINT `tbl_resultadoevaluaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`USU_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_resultadoevaluaciones_ibfk_2` FOREIGN KEY (`id_evaluacion`) REFERENCES `tbl_evaluaciones` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_seleccion`
--
ALTER TABLE `tbl_seleccion`
  ADD CONSTRAINT `tbl_seleccion_ibfk_1` FOREIGN KEY (`id_evaluacion`) REFERENCES `tbl_evaluaciones` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_temas`
--
ALTER TABLE `tbl_temas`
  ADD CONSTRAINT `tbl_temas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`USU_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
