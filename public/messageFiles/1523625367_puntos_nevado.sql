-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2018 a las 16:55:38
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `puntos_nevado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromisos`
--

CREATE TABLE `compromisos` (
  `codigo` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `naturaleza` varchar(120) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `intrumento` varchar(25) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `recaudo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compromisos`
--

INSERT INTO `compromisos` (`codigo`, `tipo`, `naturaleza`, `intrumento`, `recaudo`) VALUES
('CONADE', 'CONTRATOS', 'Adendum de Contratos', 'Punto de Cuenta', 'Informe ó Exposición de Motivos para justificar la modificación del Contrato (Tiempo de ejecución, aumentos de montos, trabajos adicionales, etc)||Comunicación del Proveedor ó Contratista solicitando la modificación respectivacontratación'),
('CONJUR', 'CONTRATOS', 'Persona Jurídicas', 'Punto de Cuenta', 'Informe de Selección del Proveedor y/o Exposición de Motivos para justificar la Contratación||Ofertas de Servicios (Mínimo tres (3)||Términos de Referencia o solicitud detallada del servicio y los productos a obtener||Informe'),
('CONLIC', 'CONTRATOS', 'Licitaciones', 'Punto de Cuenta', 'Costos Referenciales (Estimados)||Exposición de motivos o Informe de justificación de la necesidad de la compra o contratación'),
('CONPER', 'CONTRATOS', 'Persona Natural', 'Punto de Cuenta', 'Memo de Solicitud y Justificación de la Contratación con Detalle de los Servicios y/o Productos a contratar||Oferta de Servicio||Curriculum Vitae||Copia de la Cédula de Identidad||Currículo Vital||Título Universitario para los casos de Honorarios Profesionales'),
('CONSEP', 'CONTRATOS', 'Servicios Profesionales', 'Punto de Cuenta', 'Términos de Referencia'),
('INGNOM', 'INGRESOS DE NOMINA Y MOVIMIENTOS DE PERSONAL', 'Personal Fijo', 'Punto de Cuenta', 'Curriculum Vitae||Soportes del Curriculum Vitae||Copia de Cedula de Identidad'),
('NOCPRE', 'S/C', 'Sin Compromiso Presupuestario', 'Punto de Cuenta', ''),
('OTROS', 'OTROS', 'Otros', 'Punto de Cuenta', ''),
('VIAATC', 'VIÁTICOS INTERNACIONALES', 'Asistencia Técnica por Convenios', 'Punto de Cuenta', 'Solicitud vía Sistema Puntos de Cuenta'),
('VIACRS', 'CURSOS', 'Personal del INCES y Relacionados (Contratados, Misiones Asignadas, etc).', 'Punto de Cuenta', 'Postulación||Programa y oferta del curso\r\n'),
('VIACUR', 'VIÁTICOS INTERNACIONALES', 'Para Cursos', 'Punto de Cuenta', 'Postulación y Justificación||Programa'),
('VIAEVE', 'VIÁTICOS INTERNACIONALES', 'Para Eventos', 'Punto de Cuenta', 'Postulación y Justificación||Programa||Invitación con detalles de gastos a sufragar por el CNTI y por la Empresa ó Institución Anfitriona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `codigo` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`codigo`, `nombre`) VALUES
('DEJAPR', 'Aprobado'),
('DEJDIF', 'Diferido'),
('DEJNEG', 'Negado'),
('DEJVIS', 'Visto'),
('GERDEJ', 'Enviado a la Dir. Ejec.'),
('GERELI', 'Eliminado'),
('GERPRO', 'Enviado a presupuesto'),
('GERREG', 'Registrado'),
('PREAPR', 'Aprobado'),
('PREDEV', 'Devuelto'),
('PRSAPR', 'Aprobado'),
('PRSDIF', 'Diferido'),
('PRSNEG', 'Negado'),
('PRSVIS', 'Visto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerencias`
--

CREATE TABLE `gerencias` (
  `codigo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `cuenta` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gerencias`
--

INSERT INTO `gerencias` (`codigo`, `nombre`, `cuenta`) VALUES
('ATCIU', 'Atención Al Ciudadano', NULL),
('AUD', 'Auditoria', NULL),
('CJUR', 'Consultoría Jurídica', NULL),
('COOP', 'Cooperacion Internacional', NULL),
('DIREJEC', 'Dirección Ejecutiva', NULL),
('FIN', 'Finanzas', NULL),
('FORPROF', 'Formación Profesional', NULL),
('ger', 'gerencia', 'ger'),
('INCMIL', 'Inces Militar', NULL),
('INFRA', 'Infraestructura Y Servicios', NULL),
('INFREL', 'Información Y Relaciones', NULL),
('INFSIS', 'Informática Y Sistemas', 'jquintero'),
('PLANF', 'Planificación', NULL),
('PRES', 'Presidencia', NULL),
('RRHH', 'Recursos Humanos', NULL),
('TRIBUTO', 'Tributo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `codigo` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `posicion` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `habilitado` char(1) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`codigo`, `nombre`, `posicion`, `habilitado`) VALUES
('ADM', 'Administración del Sistema', '6', 'S'),
('AUT', 'Auditoria', '7', 'S'),
('DEJ', 'Direcci¢n Ejecutiva', '4', 'S'),
('GER', 'Gerencias', '1', 'S'),
('PRE', 'Presupuesto', '3', 'S'),
('PRS', 'Presidencia', '5', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillas`
--

CREATE TABLE `plantillas` (
  `codigo` int(11) NOT NULL,
  `gerencia` varchar(4) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `anno` varchar(4) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `asunto` varchar(120) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `justificacion` text COLLATE utf8_spanish_ci NOT NULL,
  `monto` varchar(14) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0,00',
  `presentado` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `compromiso` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `consulta` varchar(4) COLLATE utf8_spanish_ci DEFAULT '',
  `pep_orden_ccosto` text COLLATE utf8_spanish_ci,
  `imp_presupuestaria` text COLLATE utf8_spanish_ci,
  `doc_reserva` text COLLATE utf8_spanish_ci,
  `faltantes` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `monto` varchar(14) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0,00',
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `monto_dir` varchar(14) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0,00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`monto`, `fecha`, `monto_dir`) VALUES
('16000000', '2018-03-21 14:15:41', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `cod_proyecto` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `cuenta` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`cod_proyecto`, `cuenta`, `nombre`) VALUES
('PROY1', 'aamarista', 'Proyecto 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE `puntos` (
  `codigo` int(11) NOT NULL,
  `numero` varchar(24) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `asunto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `justificacion` text COLLATE utf8_spanish_ci NOT NULL,
  `monto` varchar(14) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0,00',
  `presentado` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `compromiso` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `consulta` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `pep_orden_ccosto` text COLLATE utf8_spanish_ci NOT NULL,
  `imp_presupuestaria` text COLLATE utf8_spanish_ci NOT NULL,
  `doc_reserva` text COLLATE utf8_spanish_ci NOT NULL,
  `faltantes` text COLLATE utf8_spanish_ci NOT NULL,
  `usu_ger` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_proyecto` varchar(24) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ger_pres` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`codigo`, `numero`, `usuario`, `asunto`, `fecha`, `estatus`, `descripcion`, `justificacion`, `monto`, `presentado`, `compromiso`, `consulta`, `pep_orden_ccosto`, `imp_presupuestaria`, `doc_reserva`, `faltantes`, `usu_ger`, `cod_proyecto`, `ger_pres`) VALUES
(1, 'INFSIS-1/2018', 'aamarista', 'gsdfgsdfgsdf', '2018-03-17 11:25:25', 'GERDEJ', 'sdfgsdfgsfdgs<br />', 'sfgsdfgsdfg<br />', '0', 'Presidente', 'NOCPRE', 'DIREJEC', '00000<br>', '00000<br>', '', 'sfgsdfgsfdg<br />', 'aamarista', 'PROY1', 'jquintero'),
(3, 'INFSIS-2/2018', 'jquintero', 'opioupio', '2018-03-17 11:32:24', 'GERELI', 'uoiyru<span style="color: rgb(255, 110, 38);">yurtyu</span><br />', 'adsfasdfasdfasdf<br />', '0', 'Presidente', 'NOCPRE', 'FIN', '00000<br>', '00000<br>', '', 'asdfasdfasdfasdfa<br />', 'aamarista', 'PROY1', 'jquintero'),
(5, 'INFSIS-3/2018', 'aamarista', 'hdfghdgf', '2018-03-17 11:52:21', 'GERELI', 'dfghhdfghdfghdfghdfghdfgh<br />', 'dfghdgdfg<br />', '0', 'Presidente', 'NOCPRE', 'COOP', '00000<br>', '00000<br>', '', '', 'aamarista', 'PROY1', 'jquintero'),
(7, 'INFSIS-4/2018', 'aamarista', 'fgsfdgsf', '2018-03-17 12:02:00', 'GERDEJ', 'sfdgsdfg<br />', 'sdfgsdfg<br />', '0', 'Presidente', 'NOCPRE', 'INFSIS', '00000<br>', '00000<br>', '', 'dsfgsdfgs<br />', 'aamarista', 'PROY1', 'jquintero'),
(8, 'INFSIS-5/2018', 'aamarista', 'cvxc', '2018-03-21 16:08:35', 'GERREG', 'xcvb<br />', 'nbvn<br />', '0', 'Presidente', 'NOCPRE', 'ATCIU', '00000<br>', '00000<br>', '', 'kjg<br />', 'aamarista', 'PROY1', 'jquintero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_detalles`
--

CREATE TABLE `puntos_detalles` (
  `numero` varchar(24) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `comentarios` text COLLATE utf8_spanish_ci NOT NULL,
  `pep_orden_ccosto` text COLLATE utf8_spanish_ci NOT NULL,
  `imp_presupuestaria` text COLLATE utf8_spanish_ci NOT NULL,
  `doc_reserva` text COLLATE utf8_spanish_ci NOT NULL,
  `faltantes` text COLLATE utf8_spanish_ci,
  `usuario` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `puntos_detalles`
--

INSERT INTO `puntos_detalles` (`numero`, `fecha`, `estatus`, `comentarios`, `pep_orden_ccosto`, `imp_presupuestaria`, `doc_reserva`, `faltantes`, `usuario`) VALUES
('INFSIS-1/2018', '2018-03-17 11:26:40', 'GERREG', '', '', '', '', NULL, 'aamarista'),
('INFSIS-1/2018', '2018-03-17 11:28:50', 'GERDEJ', '', '', '', '', NULL, 'jquintero'),
('INFSIS-2/2018', '2018-03-17 11:33:08', 'GERREG', '', '', '', '', NULL, 'jquintero'),
('INFSIS-2/2018', '2018-03-17 11:35:40', 'GERELI', '', '', '', '', NULL, 'jquintero'),
('INFSIS-3/2018', '2018-03-17 11:53:48', 'GERREG', '', '', '', '', NULL, 'aamarista'),
('INFSIS-3/2018', '2018-03-17 12:00:45', 'GERELI', '', '', '', '', NULL, 'aamarista'),
('INFSIS-4/2018', '2018-03-17 12:02:24', 'GERREG', '', '', '', '', NULL, 'aamarista'),
('INFSIS-4/2018', '2018-03-17 12:04:01', 'GERDEJ', '', '', '', '', NULL, 'jquintero'),
('INFSIS-5/2018', '2018-03-21 16:09:03', 'GERREG', '', '', '', '', NULL, 'aamarista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cuenta` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `gerencia` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `activo` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Y',
  `esgerente` varchar(1) COLLATE utf8_spanish_ci DEFAULT '1',
  `aut_ldap` varchar(1) COLLATE utf8_spanish_ci DEFAULT '1',
  `login_ldap` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cuenta`, `contrasena`, `nombre`, `apellido`, `gerencia`, `perfil`, `cedula`, `direccion`, `telefono`, `email`, `activo`, `esgerente`, `aut_ldap`, `login_ldap`) VALUES
('aamarista', 'c33367701511b4f6020ec61ded352059', 'Argenis', 'Amarista', 'INFSIS', 'GER', '16901304', 'Su Casa', '02122345239', 'asdfasdq@correo5.com', 'Y', '1', '1', ''),
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Admin', 'ger', 'ADM', '444', '444', '4444', '444@cantv.net', 'Y', '1', '1', 'admin'),
('jquintero', 'e3ceb5881a0a1fdaad01296d7554868d', 'Jonathan', 'Quintero', 'INFSIS', 'GER', '76681234', 'Su Casa 2', '1234567', 'asdfasdq@correo3.com', 'Y', '2', '1', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `gerencias`
--
ALTER TABLE `gerencias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `ger_ind` (`gerencia`),
  ADD KEY `usu_ind` (`usuario`),
  ADD KEY `est_ind` (`estatus`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`fecha`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`cod_proyecto`);

--
-- Indices de la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `num_ind` (`numero`),
  ADD KEY `usu_ind` (`usuario`),
  ADD KEY `est_ind` (`estatus`),
  ADD KEY `com_ind` (`compromiso`);

--
-- Indices de la tabla `puntos_detalles`
--
ALTER TABLE `puntos_detalles`
  ADD PRIMARY KEY (`numero`,`fecha`),
  ADD KEY `usu_ind` (`usuario`),
  ADD KEY `est_ind` (`estatus`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cuenta`),
  ADD KEY `ger_ind` (`gerencia`),
  ADD KEY `per_ind` (`perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puntos`
--
ALTER TABLE `puntos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD CONSTRAINT `plantillas_ibfk_1` FOREIGN KEY (`gerencia`) REFERENCES `gerencias` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantillas_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantillas_ibfk_3` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD CONSTRAINT `puntos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puntos_ibfk_2` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puntos_ibfk_3` FOREIGN KEY (`compromiso`) REFERENCES `compromisos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntos_detalles`
--
ALTER TABLE `puntos_detalles`
  ADD CONSTRAINT `puntos_detalles_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puntos_detalles_ibfk_2` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`gerencia`) REFERENCES `gerencias` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`perfil`) REFERENCES `perfiles` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
