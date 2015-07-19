-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2015 a las 01:40:32
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `exacomp`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_cuestionarios_cons`(
in criterio varchar(20),
in valor varchar(20)
)
BEGIN
case criterio
	when 'materia'
    then 
		Select cuestionario.*, 
        materias.* 
        from cuestionario 
        left join materias  on materias.id_materias=cuestionario.id_materia
        where Materia like CONCAT('%', valor, '%');
	when 'user'
    then
		Select cuestionario.*,materias.*
        from cuestionario 
        left join materias  on materias.id_materias=cuestionario.id_materia
		left join titulacion on materias.id_titulacion=titulacion.id_Titulacion
		left join usuarios_titulacion on usuarios_titulacion.id_titulacion=titulacion.id_Titulacion
		left join usuarios on usuarios.id_usuario=usuarios_titulacion.id_usuarios
        where  usuarios.id_usuario = valor;
	when 'estudiante'
    then
		Select cuestionario.*,materias.*
        from cuestionario 
        left join materias  on materias.id_materias=cuestionario.id_materia
		left join titulacion on materias.id_titulacion=titulacion.id_Titulacion
		left join usuarios_titulacion on usuarios_titulacion.id_titulacion=titulacion.id_Titulacion
		left join usuarios on usuarios.id_usuario=usuarios_titulacion.id_usuarios
        where  usuarios.id_usuario = valor
        and cuestionario.estado=1;
	when 'pendientes'
    then
		Select cuestionario.*,materias.*
        from cuestionario 
        left join materias  on materias.id_materias=cuestionario.id_materia
		left join titulacion on materias.id_titulacion=titulacion.id_Titulacion
		left join usuarios_titulacion on usuarios_titulacion.id_titulacion=titulacion.id_Titulacion
		left join usuarios on usuarios.id_usuario=usuarios_titulacion.id_usuarios
        where  usuarios.id_usuario = valor
        and cuestionario.estado=0;
	when 'id'
    then 
		Select cuestionario.*,materias.* 
        from cuestionario 
        left join materias  on materias.id_materias=cuestionario.id_cuestionario
        where cuestionario.id_cuestionario=valor;
end case;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_cuestionarios_del`(
in id int(11)
)
BEGIN
	delete from cuestionario where id_cuestionario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_cuestionarios_ins`(
in in_cuestionario varchar(45),
in in_materia int(11)
)
BEGIN
	insert into cuestionario(cuestionario,id_materia) values
    (in_cuestionario,in_materia);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_cuestionario_aprobar`(
in in_id int(11)
)
BEGIN
	update cuestionario set estado=1 where  id_cuestionario=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_materias_cons`(
in criterio varchar(20),
in valor varchar(20)
)
BEGIN
case criterio
when 'titulacion'
then
	select * from materias where id_titulacion=valor;
when 'id'
then
	select * from materias where id_materias=valor;
when ''
then
	select * from materias;
end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_materias_ins`(
in in_materia varchar(20),
in titulacion int(11)
)
BEGIN
insert into materias(Materia,id_titulacion) values (in_materia,titulacion);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_materia_del`(
in in_id int(11)
)
BEGIN
	delete from materias where id_materias=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_nivel_cons`(
in criterio varchar(20),
 in valor varchar(20)
 )
BEGIN
case criterio 
when 'id'
then
	select rol from roles where id_rol=valor;
when ''
then
	select * from roles;
end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_preguntas_cons`(
in criterio varchar(20),
in valor varchar(120)
)
BEGIN
case criterio
when 'cuestionario'
then
	Select preguntas.* from preguntas where id_cuestionario=valor;
when 'id'
then 
	Select preguntas.* from preguntas where id_pregunta=valor;
when 'enunciado'
then
	Select preguntas.* from preguntas where pregunta=valor;
end case;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_preguntas_del`(
in in_id int(11)
)
BEGIN
	delete from preguntas where id_pregunta=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_preguntas_ins`(
in in_pregunta varchar(120),
in in_cuestionario int(11)
)
BEGIN
insert into preguntas(pregunta,id_cuestionario)
values (in_pregunta,in_cuestionario);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_preguntas_upd`(
in in_id int(11),
in in_pregunta varchar(120),
in in_id_cuestionario int(11)
)
BEGIN
update preguntas set 
	pregunta=in_pregunta,
    id_cuestionario=in_id_cuestionario
    where id_pregunta=in_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_respuestas_cons`(
	in criterio varchar (20),
    in valor varchar(20)
)
BEGIN
case criterio
	when 'pregunta'
    then
		select * from respuestas where id_pregunta=valor;

end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_respuestas_ins`(
in in_respuesta varchar(60),in in_correcta tinyint(1),
in  in_id_pregunta int (11)
)
BEGIN
	insert into respuestas(respuesta,correcta,id_pregunta)
    values (in_respuesta,in_correcta,in_id_pregunta);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_respuestas_upd`(
in in_id int(11),
in in_respuesta varchar(120),
in in_correcta tinyint(1),
in in_id_pregunta int(11)
)
BEGIN
update respuestas set 
	respuesta=in_respuesta,
    correcta=in_correcta,
    id_pregunta=in_id_pregunta
    where id_respuesta=in_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_titulaciones_cons`(
in criterio varchar(20),
in valor varchar(20)
)
BEGIN
case criterio
	when 'id'
	then
		select * from titulacion where id_Titulacion=valor;
	when ''
    then
		select * from titulacion;
end case;        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_titulaciones_ins`(
in in_malla varchar(45)
)
BEGIN
	insert into titulacion(Titulacion) values (in_malla);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_usuarios_find`(
in in_user varchar(20),
in in_pass varchar(20)
)
BEGIN
  SELECT * FROM usuarios WHERE username=in_user 
  and pwd=in_pass; 	
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE IF NOT EXISTS `cuestionario` (
`id_cuestionario` int(11) NOT NULL,
  `cuestionario` varchar(45) DEFAULT NULL,
  `id_materia` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`id_cuestionario`, `cuestionario`, `id_materia`, `estado`) VALUES
(1, 'Programacion_cuestionario', 1, 1),
(4, 'Bdd_cuestionario 1', 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
`id_materias` int(11) NOT NULL,
  `Materia` varchar(45) DEFAULT NULL,
  `id_titulacion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materias`, `Materia`, `id_titulacion`) VALUES
(1, 'Programacion', 1),
(5, 'Base de datos', 1),
(7, 'Ingenieria de softwa', 1),
(8, 'Gestion de TI', 1),
(11, 'Cuestionario Contabi', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
`id_pregunta` int(11) NOT NULL,
  `pregunta` varchar(120) DEFAULT NULL,
  `id_cuestionario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`, `id_cuestionario`) VALUES
(4, 'Los objetos son...', 1),
(6, 'Un array es.....', 1),
(7, 'Una clase abstracta es....', 1),
(9, 'Que es una base de datos', 4),
(10, 'Que es una clave primaria', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE IF NOT EXISTS `respuestas` (
`id_respuesta` int(11) NOT NULL,
  `respuesta` varchar(120) DEFAULT NULL,
  `correcta` tinyint(1) DEFAULT '0',
  `id_pregunta` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `respuesta`, `correcta`, `id_pregunta`) VALUES
(2, 'las instancias de una clase', 1, 4),
(3, 'una abstraccion de algo real', 0, 4),
(4, 'una clase', 0, 4),
(5, '4', 1, NULL),
(6, '6', 0, NULL),
(7, '8', 0, NULL),
(8, 'un conjunto de valores', 1, 6),
(9, 'un tipo de dato', 0, 6),
(10, 'una funcion', 0, 6),
(11, 'Una clase sin atributos', 0, 7),
(12, 'Una clase que declara la existencia de métodos pero no la implementación de dichos métodos', 1, 7),
(13, 'Una clase sin métodos', 0, 7),
(14, 'Una coleccion de datos', 1, NULL),
(15, 'Un archivo', 0, NULL),
(16, 'Una clase', 0, NULL),
(17, 'Una coleccion de datos', 1, 9),
(18, 'Un archivo', 0, 9),
(19, 'una funcion', 0, 9),
(20, 'Un atributo', 0, 10),
(21, 'Un identificador unico de columna', 1, 10),
(22, 'Una clave que sirve para relacionarse con otras tablas', 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_usuarios`
--

CREATE TABLE IF NOT EXISTS `respuesta_usuarios` (
`id_respuesta_usuario` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  `id_simulacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
`id_resultado` int(11) NOT NULL,
  `detalle` varchar(60) DEFAULT NULL,
  `id_simulacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Estudiante'),
(3, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simulacion`
--

CREATE TABLE IF NOT EXISTS `simulacion` (
`id_simulacion` int(11) NOT NULL,
  `simulacion` varchar(45) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `id_resultado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulacion`
--

CREATE TABLE IF NOT EXISTS `titulacion` (
`id_Titulacion` int(11) NOT NULL,
  `Titulacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `titulacion`
--

INSERT INTO `titulacion` (`id_Titulacion`, `Titulacion`) VALUES
(1, 'Sistemas Informáticos'),
(2, 'Contabilidad'),
(3, 'Administracion de empresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `pwd`, `rol`) VALUES
(1, 'Admin', 'Admin', 1),
(2, 'adplascencia', 'adplascencia', 2),
(3, 'docente', 'docente', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_titulacion`
--

CREATE TABLE IF NOT EXISTS `usuarios_titulacion` (
  `id_usuarios` int(11) NOT NULL,
  `id_titulacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_titulacion`
--

INSERT INTO `usuarios_titulacion` (`id_usuarios`, `id_titulacion`) VALUES
(1, 2),
(1, 3),
(1, 1),
(3, 1),
(2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
 ADD PRIMARY KEY (`id_cuestionario`), ADD KEY `FK_cuestionario_materia_idx` (`id_materia`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
 ADD PRIMARY KEY (`id_materias`), ADD KEY `Fk_Materia_titulacion_idx` (`id_titulacion`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
 ADD PRIMARY KEY (`id_pregunta`), ADD KEY `FK_pregunta_cuestionario_idx` (`id_cuestionario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
 ADD PRIMARY KEY (`id_respuesta`), ADD KEY `FK_respuesta_pregunta_idx` (`id_pregunta`);

--
-- Indices de la tabla `respuesta_usuarios`
--
ALTER TABLE `respuesta_usuarios`
 ADD PRIMARY KEY (`id_respuesta_usuario`), ADD KEY `FK_resusu_respuesta_idx` (`id_respuesta`), ADD KEY `FK_resusu_simulacion_idx` (`id_simulacion`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
 ADD PRIMARY KEY (`id_resultado`), ADD KEY `FK_resultado_simulacion_idx` (`id_simulacion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `simulacion`
--
ALTER TABLE `simulacion`
 ADD PRIMARY KEY (`id_simulacion`), ADD KEY `FK_simulacion_usuario_idx` (`id_usuario`);

--
-- Indices de la tabla `titulacion`
--
ALTER TABLE `titulacion`
 ADD PRIMARY KEY (`id_Titulacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`), ADD KEY `FK_usuario_rol_idx` (`rol`);

--
-- Indices de la tabla `usuarios_titulacion`
--
ALTER TABLE `usuarios_titulacion`
 ADD KEY `FK_titulacion_idx` (`id_titulacion`), ADD KEY `FK_usuario_idx` (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
MODIFY `id_cuestionario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
MODIFY `id_materias` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `respuesta_usuarios`
--
ALTER TABLE `respuesta_usuarios`
MODIFY `id_respuesta_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `simulacion`
--
ALTER TABLE `simulacion`
MODIFY `id_simulacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `titulacion`
--
ALTER TABLE `titulacion`
MODIFY `id_Titulacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
ADD CONSTRAINT `FK_cuestionario_materia` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materias`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
ADD CONSTRAINT `FK_materia_titulacion` FOREIGN KEY (`id_titulacion`) REFERENCES `titulacion` (`id_Titulacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
ADD CONSTRAINT `FK_pregunta_cuestionario` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionario` (`id_cuestionario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
ADD CONSTRAINT `FK_respuesta_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta_usuarios`
--
ALTER TABLE `respuesta_usuarios`
ADD CONSTRAINT `FK_resusu_respuesta` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id_respuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `FK_resusu_simulacion` FOREIGN KEY (`id_simulacion`) REFERENCES `simulacion` (`id_simulacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
ADD CONSTRAINT `FK_resultado_simulacion` FOREIGN KEY (`id_simulacion`) REFERENCES `simulacion` (`id_simulacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `simulacion`
--
ALTER TABLE `simulacion`
ADD CONSTRAINT `FK_simulacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_titulacion`
--
ALTER TABLE `usuarios_titulacion`
ADD CONSTRAINT `FK_titulacion` FOREIGN KEY (`id_titulacion`) REFERENCES `titulacion` (`id_Titulacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
