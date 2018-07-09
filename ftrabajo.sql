# Host: medicprocloud.com  (Version 5.6.35)
# Date: 2017-12-28 21:10:09
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categoriasOfertas"
#

DROP TABLE IF EXISTS `categoriasOfertas`;
CREATE TABLE `categoriasOfertas` (
  `idCategoriaOferta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(45) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCategoriaOferta`),
  UNIQUE KEY `idcategoriasOfertas_UNIQUE` (`idCategoriaOferta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "categoriasOfertas"
#

INSERT INTO `categoriasOfertas` VALUES (1,'Informatica',1),(2,'Ingenieria Industrial',1);

#
# Structure for table "datos_personales"
#

DROP TABLE IF EXISTS `datos_personales`;
CREATE TABLE `datos_personales` (
  `idDatoPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `tipo_documento` int(11) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `descripcion` longtext,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDatoPersonal`),
  UNIQUE KEY `idDatoPersonal_UNIQUE` (`idDatoPersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "datos_personales"
#

INSERT INTO `datos_personales` VALUES (1,1,NULL,NULL,NULL,NULL,NULL),(2,2,NULL,NULL,NULL,NULL,NULL),(3,3,NULL,NULL,NULL,NULL,NULL),(4,4,NULL,NULL,NULL,NULL,NULL),(5,5,NULL,NULL,NULL,NULL,NULL),(6,6,NULL,NULL,NULL,NULL,NULL),(7,7,NULL,NULL,NULL,NULL,NULL),(8,8,NULL,NULL,NULL,NULL,NULL);

#
# Structure for table "departamentos"
#

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idDepartamento`),
  UNIQUE KEY `iddepartamentos_UNIQUE` (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "departamentos"
#

INSERT INTO `departamentos` VALUES (1,'Ahuachapán',1),(2,'Cabañas',1),(3,'Chalatenango',1),(4,'Cuscatlán',1),(5,'Morazán',1),(6,'La Libertad',1),(7,'La Paz',1),(8,'La Unión',1),(9,'San Miguel',1),(10,'San Salvador',1),(11,'San Vicente',1),(12,'Santa Ana',1),(13,'Sonsonate',1),(14,'Usulután',1);

#
# Structure for table "documentos"
#

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE `documentos` (
  `idDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDocumento` varchar(25) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idDocumento`),
  UNIQUE KEY `iddocumentos_UNIQUE` (`idDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "documentos"
#


#
# Structure for table "empresas"
#

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `idDepartamento` int(11) NOT NULL,
  `nombreEmpresa` varchar(45) NOT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `descripcion` text,
  `correo` varchar(55) DEFAULT NULL,
  `contra` text,
  `logo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `direccion` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`,`idDepartamento`),
  UNIQUE KEY `idempresas_UNIQUE` (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "empresas"
#

INSERT INTO `empresas` VALUES (1,10,'Almacenes Siman S.A de C.V','22124123','','siman@almacenesiman.com',NULL,'',1,'Direccion de prueba'),(2,10,'Grupo .A deTreming S.A. de C.V.','25647895','Programacion','treming','1234',NULL,1,'Escalon'),(3,10,'Grupo Satelite',NULL,NULL,NULL,NULL,NULL,1,NULL),(4,10,'Tecnologias Innovadoras S.A. de C.V.',NULL,NULL,NULL,NULL,NULL,1,NULL),(5,10,'Jomi, S.A. de C.V.',NULL,NULL,NULL,NULL,NULL,1,NULL),(6,10,'Fabrica Procesadora de Alimentos S.A. DE CV.',NULL,NULL,NULL,NULL,NULL,1,NULL),(7,10,'Comercializadora Internacional de GLP',NULL,NULL,NULL,NULL,NULL,1,NULL),(8,10,'Contrataciones Empresariales S.A. de C.V.',NULL,NULL,NULL,NULL,NULL,1,NULL),(9,3,'INGUNIXX','25369874','Empresa lider en informatica','ingunixx','123456',NULL,1,'123456'),(10,3,'Sistemas Digitales','2590-249','Empresa de Tecnologia','sidisa@gmail.com','1234567',NULL,1,'Calle maquilishuat, N°345. Barrio Candelaria,Chalatenan'),(11,10,'Conecta empresarial S.A. DE C.V.','25368741','Empresa de informatica','conecta@mail.com','1234',NULL,1,'Escalon'),(12,4,'Agro servicio la 1000pita','2512-256','Venta de productos Agropecuarios','la1000pita@gmail.com','1234567',NULL,1,'barrio la cruz N° 253, suchitoto'),(13,1,'HANDMADE SA de CV ','2257-777','Somos una empresa destinada a la fabricación  de adornos para ocaciones especiales como navidad, bodas, cumpleaños, etc.','handmade@mail.com','1234',NULL,1,'Ahuachapan '),(14,10,'Melvin S.A. DE C.V.','22736000','DISTRIBUCION DE ALIMENTOS','melvin@mail.com','123456789',NULL,1,'Escalon'),(15,9,'Distribuciones Diversas ','22252423','Distribucion de insumos','distribuciones@mail.com','123456789',NULL,1,'Escalon');

#
# Structure for table "ofertasEmpleo"
#

DROP TABLE IF EXISTS `ofertasEmpleo`;
CREATE TABLE `ofertasEmpleo` (
  `idofertasEmpleo` int(11) NOT NULL AUTO_INCREMENT,
  `idEmpresa` int(11) NOT NULL,
  `cargoOferta` varchar(60) NOT NULL,
  `idCategoriaEmpleo` int(11) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `fechaContratacion` date NOT NULL,
  `vacantes` tinyint(4) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idofertasEmpleo`,`idCategoriaEmpleo`,`idDepartamento`),
  UNIQUE KEY `idofertasEmpleo_UNIQUE` (`idofertasEmpleo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "ofertasEmpleo"
#

INSERT INTO `ofertasEmpleo` VALUES (1,2,'',0,'2017-12-06','0000-00-00',0,0.00,'',1,0),(2,2,'Analista Programador JAVA',1,'2017-11-27','2017-11-30',1,600.00,'Ninguna',1,8),(3,2,'Desarrollador Web / Programador',1,'2017-11-29','2017-12-15',2,0.00,'prueba',1,12),(4,4,'Programador RPG en AS400',1,'2017-11-29','2017-12-10',1,800.00,'',1,10),(5,8,'Motorista - Licencia pesada',1,'2017-11-29','2017-12-10',1,450.00,'',1,10),(6,7,'Mensajero motorista - Licencia de moto y liviana',1,'2017-11-29','2017-12-12',1,350.00,'',1,10),(7,2,'Vendedor',2,'2017-12-04','2017-01-01',1,500.00,'Ventas en cabañas',1,2),(8,2,'Rutero',2,'2017-12-04','2017-01-01',2,500.00,'Repartidor de insumos en el area metropolitana',1,7),(9,2,'',0,'2017-12-04','0000-00-00',0,0.00,'',1,0),(10,10,'Técnico en Mantenimiento de Computadoras',1,'2017-12-06','2017-12-06',2,0.00,'Se necesita tecnico para mantenimiento y reparacion de computadoras a domicilio con conocimiento de impresoras y demas perifericos.',1,3),(11,11,'Programador web',1,'2017-12-07','2017-02-02',5,300.00,'Desarollo web',1,9),(12,12,'Asistente de informatica',1,'2017-12-09','2017-12-11',1,0.00,'Soporte tecnico',1,4),(13,13,'Encargado de produccion',2,'2017-12-10','0000-00-00',2,500.00,'Encargado de supervisar la fabircacion de productos de plasticos en área de produccion',1,1),(14,14,'Rutero',1,'2017-12-10','2018-01-01',3,500.00,'Ventas en salvador',1,13),(15,15,'Programador para sistema de ruteo',1,'2017-12-10','2017-02-01',3,500.00,'Programador',1,5);

#
# Structure for table "postulacionesUsuarios"
#

DROP TABLE IF EXISTS `postulacionesUsuarios`;
CREATE TABLE `postulacionesUsuarios` (
  `idPostulacionUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idOfertaEmpleo` int(11) NOT NULL,
  `fechaPostulacion` date NOT NULL,
  PRIMARY KEY (`idPostulacionUsuario`,`idUsuario`),
  UNIQUE KEY `idpostulacionesUsuarios_UNIQUE` (`idPostulacionUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "postulacionesUsuarios"
#

INSERT INTO `postulacionesUsuarios` VALUES (1,1,1,'2017-11-29'),(2,2,2,'2017-11-29'),(3,2,2,'2017-11-29'),(4,3,1,'2017-11-29'),(5,1,2,'2017-11-29'),(6,2,4,'2017-12-07'),(7,2,7,'2017-12-07'),(8,2,13,'2017-12-10'),(9,2,6,'2017-12-10'),(10,8,5,'2017-12-10'),(11,8,8,'2017-12-10'),(12,8,15,'2017-12-10');

#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `correo` varchar(55) NOT NULL,
  `contra` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = Inactivo\n1 = Activo',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `idusuario_UNIQUE` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'Ricardo Alcides','Castillo Rogel','racastillo26@outlook.com','884af38f25b14b3b28295a169b808e5f',1),(2,'Jose Vladimir','Reyes Domínguez','reyes_vladimir2@hotmail.com','ff17f4b3021dab74ae915625f5136532',1),(3,'Vladimir','Reyes','reyesvladimir2@gmail.com','53a1de3be4dc472b1ddf598c6ee37b52',1),(6,'Mario','Hernandez','mario@gmail.com','0659c7992e268962384eb17fafe88364',1),(8,'Prueba','Prueba','prueba@mail.com','25d55ad283aa400af464c76d713c07ad',1);

#
# Structure for table "vitacora"
#

DROP TABLE IF EXISTS `vitacora`;
CREATE TABLE `vitacora` (
  `idvitacora` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL DEFAULT '00:00:00',
  `accion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idvitacora`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

#
# Data for table "vitacora"
#

/*!40000 ALTER TABLE `vitacora` DISABLE KEYS */;
INSERT INTO `vitacora` VALUES (1,NULL,'2017-12-04','20:51:52','Inició sesión.'),(2,'Grupo .A deTreming S.A. de C.V.','2017-12-04','20:56:40','Inició sesión.'),(3,'Grupo .A deTreming S.A. de C.V.','2017-12-04','20:56:40','Inició sesión.'),(4,'Grupo .A deTreming S.A. de C.V.','2017-12-04','21:00:29','Inició sesión.'),(5,'Grupo .A deTreming S.A. de C.V.','2017-12-04','21:00:29','Inició sesión.'),(6,'admin','2017-12-04','22:28:46','Se publico una oferta de empleo'),(7,'admin','2017-12-04','22:30:26','Se publico una oferta de empleo'),(8,'admin','2017-12-04','22:41:22','Se publico una oferta de empleo'),(9,'Grupo .A deTreming S.A. de C.V.','2017-12-04','22:43:53','Inició sesión.'),(10,'Grupo .A deTreming S.A. de C.V.','2017-12-04','22:43:53','Inició sesión.'),(11,'Grupo .A deTreming S.A. de C.V.','2017-12-04','22:47:51','Eliminar publicacion'),(12,'Grupo .A deTreming S.A. de C.V.','2017-12-05','08:13:38','Inició sesión.'),(13,'Grupo .A deTreming S.A. de C.V.','2017-12-05','08:13:38','Inició sesión.'),(14,'Grupo .A deTreming S.A. de C.V.','2017-12-05','08:15:06','Eliminar publicacion'),(15,'Grupo .A deTreming S.A. de C.V.','2017-12-06','18:12:28','Inició sesión.'),(16,'Grupo .A deTreming S.A. de C.V.','2017-12-06','18:12:28','Inició sesión.'),(17,'Grupo .A deTreming S.A. de C.V.','2017-12-06','18:14:05','Inició sesión.'),(18,'Grupo .A deTreming S.A. de C.V.','2017-12-06','18:14:05','Inició sesión.'),(19,'Grupo .A deTreming S.A. de C.V.','2017-12-06','20:45:53','Inició sesión.'),(20,'Grupo .A deTreming S.A. de C.V.','2017-12-06','20:45:53','Inició sesión.'),(21,'INGUNIXX','2017-12-06','21:38:18','Inició sesión.'),(22,'INGUNIXX','2017-12-06','21:38:18','Inició sesión.'),(23,'INGUNIXX','2017-12-06','21:40:08','Inició sesión.'),(24,'INGUNIXX','2017-12-06','21:40:08','Inició sesión.'),(25,'Grupo .A deTreming S.A. de C.V.','2017-12-06','22:00:31','Inició sesión.'),(26,'Grupo .A deTreming S.A. de C.V.','2017-12-06','22:00:31','Inició sesión.'),(27,'Grupo .A deTreming S.A. de C.V.','2017-12-06','22:03:31','Eliminar publicacion'),(28,'Grupo .A deTreming S.A. de C.V.','2017-12-06','22:05:00','Eliminar publicacion'),(29,'Grupo .A deTreming S.A. de C.V.','2017-12-06','22:05:55','Eliminar publicacion'),(30,'Grupo .A deTreming S.A. de C.V.','2017-12-06','22:07:52','Eliminar publicacion'),(31,'Sistemas Digitales','2017-12-06','23:05:30','Inició sesión.'),(32,'Sistemas Digitales','2017-12-06','23:05:30','Inició sesión.'),(33,'Sistemas Digitales','2017-12-06','23:09:45','Se publico una oferta de empleo'),(34,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:12:18','Edito una publicacion'),(35,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:15:26','Edito una publicacion'),(36,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:19:48','Edito una publicacion'),(37,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:20:08','Edito una publicacion'),(38,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:20:30','Edito una publicacion'),(39,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:26:06','Edito una publicacion'),(40,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:26:20','Edito una publicacion'),(41,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:27:52','Edito una publicacion'),(42,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:28:18','Edito una publicacion'),(43,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:30:27','Inició sesión.'),(44,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:30:27','Inició sesión.'),(45,'Grupo .A deTreming S.A. de C.V.','2017-12-06','23:49:28','Edito sus datos'),(46,'Conecta empresarial','2017-12-06','23:58:41','Inició sesión.'),(47,'Conecta empresarial','2017-12-06','23:58:41','Inició sesión.'),(48,'Conecta empresarial','2017-12-06','23:59:05','Edito sus datos'),(49,'Conecta empresarial S.A. DE C.V.','2017-12-06','23:59:18','Inició sesión.'),(50,'Conecta empresarial S.A. DE C.V.','2017-12-06','23:59:18','Inició sesión.'),(51,'Conecta empresarial S.A. DE C.V.','2017-12-07','00:00:13','Se publico una oferta de empleo'),(52,'Conecta empresarial S.A. DE C.V.','2017-12-07','00:00:25','Edito una publicacion'),(53,'Conecta empresarial S.A. DE C.V.','2017-12-07','00:00:32','Edito una publicacion'),(54,'Conecta empresarial S.A. DE C.V.','2017-12-07','00:00:36','Eliminar publicacion'),(55,'Sistemas Digitales','2017-12-09','21:42:17','Inició sesión.'),(56,'Sistemas Digitales','2017-12-09','21:42:17','Inició sesión.'),(57,'Agro servicio la 1000pita','2017-12-09','22:07:27','Inició sesión.'),(58,'Agro servicio la 1000pita','2017-12-09','22:07:27','Inició sesión.'),(59,'Agro servicio la 1000pita','2017-12-09','22:17:25','Se publico una oferta de empleo'),(60,'HANDMADE SA de CV ','2017-12-10','00:05:08','Inició sesión.'),(61,'HANDMADE SA de CV ','2017-12-10','00:05:08','Inició sesión.'),(62,'HANDMADE SA de CV ','2017-12-10','00:07:12','Se publico una oferta de empleo'),(63,'Melvin S.A. DE C.V.','2017-12-10','09:25:45','Inició sesión.'),(64,'Melvin S.A. DE C.V.','2017-12-10','09:25:45','Inició sesión.'),(65,'Melvin S.A. DE C.V.','2017-12-10','09:27:09','Se publico una oferta de empleo'),(66,'Melvin S.A. DE C.V.','2017-12-10','09:27:43','Edito una publicacion'),(67,'Distribuciones Diversas ','2017-12-10','10:23:21','Inició sesión.'),(68,'Distribuciones Diversas ','2017-12-10','10:23:21','Inició sesión.'),(69,'Distribuciones Diversas ','2017-12-10','10:23:37','Inició sesión.'),(70,'Distribuciones Diversas ','2017-12-10','10:23:37','Inició sesión.'),(71,'Distribuciones Diversas ','2017-12-10','10:24:43','Se publico una oferta de empleo');
/*!40000 ALTER TABLE `vitacora` ENABLE KEYS */;
