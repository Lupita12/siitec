SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `accion`;

CREATE TABLE `accion` (
  `clave` varchar(20) default NULL,
  `id_meta` int(20) NOT NULL,
  `nombre` varchar(200) default NULL,
  `descripcion` varchar(500) default NULL,
  `monto` double default NULL,
  `ingreso_propio_ene_jun` double default NULL,
  `ingreso_propio_jul_dic` double default NULL,
  `gasto_directo_ene_jun` double default NULL,
  `gasto_directo_jul_dic` double default NULL,
  `vigencia` date default NULL,
  `periodo` varchar(20) default NULL,
  `id_accion` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_accion`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `accion_capitulo`;

CREATE TABLE `accion_capitulo` (
  `id_accion` int(11) NOT NULL,
  `id_capitulo` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `enero_junio` int(11) NOT NULL,
  `julio_diciembre` int(11) NOT NULL,
  `porcentaje_enero_junio` int(11) NOT NULL,
  PRIMARY KEY  (`id_accion`,`id_capitulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `almacen`;

CREATE TABLE `almacen` (
  `folio` int(11) NOT NULL,
  `departamento` varchar(200) default NULL,
  `clave_factura` int(11) default NULL,
  `proveedor` varchar(200) default NULL,
  `fecha_entrada` date default NULL,
  `fecha_salida` date default NULL,
  `autorizado` int(11) default NULL,
  `proyecto` varchar(200) default NULL,
  `id_almacen` int(11) NOT NULL,
  PRIMARY KEY  (`id_almacen`),
  KEY `i_folio` (`folio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `altadireccion`;

CREATE TABLE `altadireccion` (
  `clave` varchar(20) NOT NULL,
  `nombre` varchar(200) default NULL,
  `vigencia` date default NULL,
  `monto` double default NULL,
  `gasto_propio` double default NULL,
  `periodo` varchar(20) default NULL,
  `id_altadireccion` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_altadireccion`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `articulo`;

CREATE TABLE `articulo` (
  `clave` varchar(20) NOT NULL,
  `nivel` int(11) default NULL,
  `id_partida` int(11) default NULL,
  `codigo` int(11) default NULL,
  `descripcion` varchar(200) default NULL,
  `id_tipoarticulo` varchar(20) default NULL,
  `id_articulo` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_articulo`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `articulo_clasificacion`;

CREATE TABLE `articulo_clasificacion` (
  `id_articulo` varchar(20) NOT NULL,
  `id_clasificacion` int(11) NOT NULL,
  PRIMARY KEY  (`id_articulo`,`id_clasificacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `articulo_marca`;

CREATE TABLE `articulo_marca` (
  `id_articulo` varchar(20) NOT NULL,
  `id_marca` int(11) NOT NULL,
  PRIMARY KEY  (`id_articulo`,`id_marca`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `articulo_unidadmedida`;

CREATE TABLE `articulo_unidadmedida` (
  `id_articulo` varchar(20) NOT NULL,
  `id_unidadmedida` int(11) NOT NULL,
  PRIMARY KEY  (`id_articulo`,`id_unidadmedida`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `autorizador`;

CREATE TABLE `autorizador` (
  `id_autorizador` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY  (`id_autorizador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `califica_evalpro`;

CREATE TABLE `califica_evalpro` (
  `clave` int(11) default NULL,
  `criterio` int(11) default NULL,
  `calificacion` int(11) default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=17 ROW_FORMAT=FIXED;


DROP TABLE IF EXISTS `capitulo`;

CREATE TABLE `capitulo` (
  `clave` int(11) NOT NULL,
  `nombre` varchar(500) default NULL,
  `descripcion` longtext,
  `ingresos_propios` double default NULL,
  `gasto_directo` double default NULL,
  `vigencia` date default NULL,
  `periodo` varchar(20) default NULL,
  `id_capitulo` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_capitulo`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `capitulo5000`;

CREATE TABLE `capitulo5000` (
  `clave_departamento` int(11) NOT NULL,
  `clave_meta` varchar(20) default NULL,
  `clave_partida` int(11) default NULL,
  `nombre_del_bien` varchar(200) default NULL,
  `denominacion_del_bien` varchar(200) default NULL,
  `cantidad` int(11) default NULL,
  `costo_unitario` double default NULL,
  `costo_total` double default NULL,
  `justificacion` varchar(500) default NULL,
  `id_capitulo5000` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_capitulo5000`),
  KEY `i_clave` (`clave_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `clasificacion`;

CREATE TABLE `clasificacion` (
  `clave` int(11) NOT NULL,
  `nombre` varchar(30) default NULL,
  `descripcion` varchar(200) default NULL,
  `imagen` varchar(200) default NULL,
  `id_clasificacion` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_clasificacion`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `contrarecibo`;

CREATE TABLE `contrarecibo` (
  `clave_contra_recibo` int(11) NOT NULL,
  `clave_factura` int(11) default NULL,
  `fecha_entrega` date default NULL,
  `fecha_limite` date default NULL,
  `monto` double default NULL,
  PRIMARY KEY  (`clave_contra_recibo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `criterios_evalpro`;

CREATE TABLE `criterios_evalpro` (
  `id_criterio` int(11) default NULL,
  `valor` varchar(20) default NULL,
  `puntos` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `criterios_selpro`;

CREATE TABLE `criterios_selpro` (
  `id_criterio` int(11) default NULL,
  `valor` varchar(20) default NULL,
  `puntos` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `clave` int(11) NOT NULL,
  `nombre` varchar(200) default NULL,
  `vigencia` date default NULL,
  `monto` double default NULL,
  `periodo` varchar(20) default NULL,
  `id_departamento` int(11) NOT NULL auto_increment,
  `id_altadireccion` int(11) default NULL,
  `poa` int(11) default NULL,
  PRIMARY KEY  (`id_departamento`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `descripcion`;

CREATE TABLE `descripcion` (
  `id_descripcion` int(11) NOT NULL auto_increment,
  `descripcion` text,
  `id_articulo` int(11) default NULL,
  `precio` varchar(20) default NULL,
  PRIMARY KEY  (`id_descripcion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `encargado`;

CREATE TABLE `encargado` (
  `clave` varchar(15) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `firma` varchar(20) default NULL,
  `tipo` varchar(20) NOT NULL default '',
  `periodo` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_encargado` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_encargado`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `evaluacionproveedor`;

CREATE TABLE `evaluacionproveedor` (
  `clave` int(11) NOT NULL auto_increment,
  `nombre_del_proveedor` varchar(200) default NULL,
  `rfc` varchar(20) default NULL,
  `calle_numero` varchar(200) default NULL,
  `colonia` varchar(200) default NULL,
  `numero_telefonico` varchar(20) default NULL,
  `numero_fax` varchar(20) default NULL,
  `actividad_comercial` varchar(200) default NULL,
  `fecha` date default NULL,
  `email` varchar(20) default NULL,
  `propietario_representante_legal` varchar(200) default NULL,
  `calificacion` int(11) default NULL,
  `autorizado` int(11) default NULL,
  PRIMARY KEY  (`clave`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `clave` int(11) NOT NULL,
  `fecha_realizacion` date default NULL,
  `imagen` varchar(200) default NULL,
  PRIMARY KEY  (`clave`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `gastodirecto`;

CREATE TABLE `gastodirecto` (
  `clave` varchar(50) default NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` longtext NOT NULL,
  `vigencia` date NOT NULL,
  `monto` double NOT NULL,
  `fecha_inicial` varchar(20) NOT NULL,
  `fecha_final` varchar(20) NOT NULL,
  `id_gastodirecto` int(11) NOT NULL auto_increment,
  `fecha_expedicion` date NOT NULL,
  `fecha_recibido` date NOT NULL,
  PRIMARY KEY  (`id_gastodirecto`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `gastodirecto_capitulo`;

CREATE TABLE `gastodirecto_capitulo` (
  `id_gasto_directo` varchar(50) NOT NULL,
  `id_meta` varchar(20) NOT NULL,
  `id_capitulo` varchar(45) NOT NULL,
  `vigencia` date default NULL,
  `monto` double default NULL,
  `id_gastodirecto_capitulo` int(11) NOT NULL auto_increment,
  `id_accion` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_partida` int(11) NOT NULL,
  `gastado` double(15,3) default NULL,
  `comprometido` double(15,3) default NULL,
  PRIMARY KEY  (`id_gastodirecto_capitulo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `gastodirecto_partida`;

CREATE TABLE `gastodirecto_partida` (
  `id_gasto_directo` varchar(50) NOT NULL,
  `id_meta` varchar(20) NOT NULL,
  `id_partida` int(11) NOT NULL,
  `vigencia` date default NULL,
  `monto` double default NULL,
  `id_gastodirecto_partida` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_gastodirecto_partida`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `clave` int(11) NOT NULL,
  `nombre` varchar(30) default NULL,
  `descripcion` varchar(200) default NULL,
  `id_marca` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_marca`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `meta`;

CREATE TABLE `meta` (
  `clave` varchar(20) default NULL,
  `nombre` varchar(200) default NULL,
  `descripcion_numero` varchar(500) default NULL,
  `unidad_de_medida` varchar(200) default NULL,
  `cantidad` varchar(200) default NULL,
  `vigencia` date default NULL,
  `monto` double default NULL,
  `periodo` varchar(20) default NULL,
  `ingreso_propio_ene_jun` double default NULL,
  `ingreso_propio_jul_dic` double default NULL,
  `gasto_directo_ene_jun` double default NULL,
  `gasto_directo_jul_dic` double default NULL,
  `id_encargado` int(11) default NULL,
  `id_meta` int(11) NOT NULL auto_increment,
  `descripcion` varchar(500) NOT NULL,
  PRIMARY KEY  (`id_meta`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `meta_capitulo`;

CREATE TABLE `meta_capitulo` (
  `id_meta` int(20) NOT NULL,
  `id_capitulo` int(11) NOT NULL,
  `ingreso_propio` double default NULL,
  `gasto_directo` double default NULL,
  `ene_jun` double default NULL,
  `jul_dic` double default NULL,
  `monto_total` double default NULL,
  `periodo` varchar(20) default NULL,
  PRIMARY KEY  (`id_meta`,`id_capitulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `meta_departamento`;

CREATE TABLE `meta_departamento` (
  `id_departamento` int(11) NOT NULL,
  `id_meta` int(20) NOT NULL,
  `monto` double default NULL,
  `periodo` varchar(20) default NULL,
  `clave_departamento` int(11) NOT NULL,
  `clave_meta` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_meta`,`id_departamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `partida`;

CREATE TABLE `partida` (
  `clave` int(11) NOT NULL,
  `id_subcapitulo` int(11) default NULL,
  `nombre` varchar(200) default NULL,
  `descripcion` longtext,
  `ingreso_propio` double default NULL,
  `gasto_directo` double default NULL,
  `vigencia` date default NULL,
  `periodo` varchar(20) default NULL,
  `id_partida` int(11) NOT NULL auto_increment,
  `estado` int(11) NOT NULL,
  `restringir` int(11) default NULL,
  PRIMARY KEY  (`id_partida`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `partida_departamento`;

CREATE TABLE `partida_departamento` (
  `id_meta` int(20) NOT NULL,
  `id_partida` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `ingreso_propio` double default NULL,
  `vigencia` date default NULL,
  `gastado` double default NULL,
  `comprometido` double default NULL,
  `periodo` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_meta`,`id_partida`,`id_departamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `presupuestoinicial`;

CREATE TABLE `presupuestoinicial` (
  `clave` int(11) NOT NULL auto_increment,
  `vigencia` date default NULL,
  `monto` double default NULL,
  `periodo` varchar(20) default NULL,
  PRIMARY KEY  (`clave`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `procesoclave`;

CREATE TABLE `procesoclave` (
  `clave` varchar(11) NOT NULL,
  `id_procesoestrategico` int(11) default NULL,
  `nombre` varchar(200) default NULL,
  `descripcion` varchar(500) default NULL,
  `vigencia` date default NULL,
  `monto` double default NULL,
  `periodo` varchar(20) default NULL,
  `ingreso_propio` double default NULL,
  `gasto_directo` double default NULL,
  `gf` int(11) default NULL,
  `fn` int(11) default NULL,
  `sf` int(11) default NULL,
  `ai` int(11) default NULL,
  `pp` varchar(255) default NULL,
  `codigo` int(11) default NULL,
  `id_procesoclave` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_procesoclave`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `procesoclave_meta`;

CREATE TABLE `procesoclave_meta` (
  `id_procesoclave` int(11) NOT NULL,
  `id_meta` int(20) NOT NULL,
  `monto` double default NULL,
  `periodo` varchar(20) default NULL,
  PRIMARY KEY  (`id_procesoclave`,`id_meta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `procesoestrategico`;

CREATE TABLE `procesoestrategico` (
  `clave` varchar(11) NOT NULL,
  `nombre` varchar(200) default NULL,
  `descripcion` varchar(500) default NULL,
  `vigencia` date default NULL,
  `monto` double default NULL,
  `periodo` varchar(20) default NULL,
  `id_procesoestrategico` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_procesoestrategico`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `clave` int(11) default NULL,
  `nombre_proveedor` varchar(200) default NULL,
  `rfc` varchar(100) default NULL,
  `domicilio` varchar(200) default NULL,
  `telefono` varchar(50) default NULL,
  `fax` varchar(50) default NULL,
  `actividades_comerciales` varchar(500) default NULL,
  `correo_electronico` varchar(100) default NULL,
  `fecha` varchar(50) default NULL,
  `ciudad` varchar(50) default NULL,
  `estatus` int(11) default NULL,
  `id_proveedor` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_proveedor`),
  UNIQUE KEY `id_proveedor` (`id_proveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `requisicion`;

CREATE TABLE `requisicion` (
  `folio` varchar(20) default NULL,
  `fecha` date default NULL,
  `autorizado` int(11) default NULL,
  `nombre_director` varchar(200) default NULL,
  `tipo_de_contemplacion` int(11) default NULL,
  `id_traspaso` int(11) default NULL,
  `id_meta` int(11) default NULL,
  `id_departamento` int(11) default NULL,
  `id_requisicion` int(11) NOT NULL auto_increment,
  UNIQUE KEY `id_requisicion` (`id_requisicion`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `requisicion_accion`;

CREATE TABLE `requisicion_accion` (
  `id_requisicion` int(11) NOT NULL,
  `id_accion` int(11) NOT NULL,
  PRIMARY KEY  (`id_requisicion`,`id_accion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `requisicion_articulo`;

CREATE TABLE `requisicion_articulo` (
  `folio_requisicion` int(11) default '0',
  `id_articulo` varchar(20) default '',
  `id_partida` int(11) default NULL,
  `id_marca` int(11) default NULL,
  `id_clasificacion` int(11) default NULL,
  `id_unidaddemedida` int(11) default NULL,
  `cantidad` int(11) default NULL,
  `descripcion` varchar(200) default NULL,
  `precio` float(9,3) default NULL,
  `total` float(9,3) default NULL,
  `id_shuffle` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_shuffle`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `requisicion_departamento`;

CREATE TABLE `requisicion_departamento` (
  `folio_requisicion` int(11) NOT NULL,
  `clave_departamento` int(11) NOT NULL,
  PRIMARY KEY  (`folio_requisicion`,`clave_departamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `requisicion_meta`;

CREATE TABLE `requisicion_meta` (
  `folio_requisicion` int(11) NOT NULL,
  `clave_meta` varchar(20) NOT NULL,
  PRIMARY KEY  (`folio_requisicion`,`clave_meta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `requisicion_partida`;

CREATE TABLE `requisicion_partida` (
  `folio_requisicion` int(11) NOT NULL,
  `clave_partida` int(11) NOT NULL,
  PRIMARY KEY  (`folio_requisicion`,`clave_partida`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `seleccionproveedor`;

CREATE TABLE `seleccionproveedor` (
  `clave` int(11) NOT NULL auto_increment,
  `nombre_del_proveedor` varchar(200) default NULL,
  `rfc` varchar(20) default NULL,
  `calle_numero` varchar(200) default NULL,
  `colonia` varchar(200) default NULL,
  `numero_telefonico` varchar(20) default NULL,
  `numero_fax` varchar(20) default NULL,
  `actividad_comercial` varchar(200) default NULL,
  `fecha` date default NULL,
  `email` varchar(20) default NULL,
  `propietario_representante_legal` varchar(200) default NULL,
  `calificacion` int(11) default NULL,
  `autorizado` int(11) default NULL,
  PRIMARY KEY  (`clave`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `clave` int(11) NOT NULL auto_increment,
  `folio_requisicion` int(11) default NULL,
  `tipo_de_status` varchar(200) default NULL,
  PRIMARY KEY  (`clave`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `subcapitulo`;

CREATE TABLE `subcapitulo` (
  `clave` int(11) NOT NULL,
  `id_capitulo` int(11) default NULL,
  `nombre` varchar(500) default NULL,
  `vigencia` date default NULL,
  `periodo` varchar(20) default NULL,
  `id_subcapitulo` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_subcapitulo`),
  KEY `i_clave` (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `subcapitulo2`;

CREATE TABLE `subcapitulo2` (
  `clave` int(11) NOT NULL,
  `id_subcapitulo` int(11) default NULL,
  `nombre` longtext,
  `descripcion` longtext,
  `periodo` varchar(20) default NULL,
  `id_subcapitulo2` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_subcapitulo2`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tipoarticulo`;

CREATE TABLE `tipoarticulo` (
  `clave` varchar(20) default NULL,
  `descripcion` varchar(200) default NULL,
  `id_tipoarticulo` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_tipoarticulo`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `traspasos`;

CREATE TABLE `traspasos` (
  `clave_departamento` int(11) default NULL,
  `clave_requisicion` int(11) NOT NULL,
  `clave_meta` varchar(20) default NULL,
  `clave_partida` int(11) default NULL,
  `monto` double default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `unidadmedida`;

CREATE TABLE `unidadmedida` (
  `clave` int(11) NOT NULL,
  `nombre` varchar(30) default NULL,
  `descripcion` varchar(200) default NULL,
  `id_unidadmedida` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_unidadmedida`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


SET FOREIGN_KEY_CHECKS = 1;
