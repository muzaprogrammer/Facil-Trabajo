-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: pdb9.awardspace.net
-- Generation Time: Mar 20, 2018 at 05:35 AM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2467275_faciltrabajo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoriasOfertas`
--

CREATE TABLE `categoriasOfertas` (
  `idCategoriaOferta` int(11) NOT NULL,
  `nombreCategoria` varchar(45) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoriasOfertas`
--

INSERT INTO `categoriasOfertas` (`idCategoriaOferta`, `nombreCategoria`, `estado`) VALUES
(1, 'Informatica', 1),
(2, 'Ingenieria Industrial', 1);

-- --------------------------------------------------------

--
-- Table structure for table `datos_personales`
--

CREATE TABLE `datos_personales` (
  `idDatoPersonal` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tipo_documento` int(11) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `descripcion` longtext,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datos_personales`
--

INSERT INTO `datos_personales` (`idDatoPersonal`, `idUsuario`, `tipo_documento`, `documento`, `descripcion`, `telefono1`, `telefono2`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL),
(3, 4, NULL, NULL, NULL, NULL, NULL),
(4, 5, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`idDepartamento`, `nombre`, `estado`) VALUES
(1, 'Ahuachapán', 1),
(2, 'Cabañas', 1),
(3, 'Chalatenango', 1),
(4, 'Cuscatlán', 1),
(5, 'Morazán', 1),
(6, 'La Libertad', 1),
(7, 'La Paz', 1),
(8, 'La Unión', 1),
(9, 'San Miguel', 1),
(10, 'San Salvador', 1),
(11, 'San Vicente', 1),
(12, 'Santa Ana', 1),
(13, 'Sonsonate', 1),
(14, 'Usulután', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE `documentos` (
  `idDocumento` int(11) NOT NULL,
  `nombreDocumento` varchar(25) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `nombreEmpresa` varchar(45) NOT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `descripcion` text,
  `correo` varchar(55) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `direccion` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `idDepartamento`, `nombreEmpresa`, `telefono`, `descripcion`, `correo`, `logo`, `estado`, `direccion`) VALUES
(1, 10, 'Almacenes Siman S.A de C.V', '22124123', '', 'siman@almacenesiman.com', '', 1, 'Direccion de prueba'),
(2, 10, 'Grupo .A deTreming S.A. de C.V.', '', NULL, '', NULL, 1, ''),
(3, 10, 'Grupo Satelite', NULL, NULL, NULL, NULL, 1, NULL),
(4, 10, 'Tecnologias Innovadoras S.A. de C.V.', NULL, NULL, NULL, NULL, 1, NULL),
(5, 10, 'Jomi, S.A. de C.V.', NULL, NULL, NULL, NULL, 1, NULL),
(6, 10, 'Fabrica Procesadora de Alimentos S.A. DE CV.', NULL, NULL, NULL, NULL, 1, NULL),
(7, 10, 'Comercializadora Internacional de GLP', NULL, NULL, NULL, NULL, 1, NULL),
(8, 10, 'Contrataciones Empresariales S.A. de C.V.', NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ofertasEmpleo`
--

CREATE TABLE `ofertasEmpleo` (
  `idofertasEmpleo` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `cargoOferta` varchar(60) NOT NULL,
  `idCategoriaEmpleo` int(11) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `fechaContratacion` date NOT NULL,
  `vacantes` tinyint(4) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ofertasEmpleo`
--

INSERT INTO `ofertasEmpleo` (`idofertasEmpleo`, `idEmpresa`, `cargoOferta`, `idCategoriaEmpleo`, `fechaPublicacion`, `fechaContratacion`, `vacantes`, `salario`, `descripcion`, `estado`, `idDepartamento`) VALUES
(1, 1, 'Programador .NET', 1, '2017-11-26', '2017-11-30', 1, 300.00, '<h3>Descripción</h3>\n                        <li>Estudiante Graduado de Técnico ó Estudiante  de 3er año Ingeniería en Sistemas.<br />Edad: Indiferente<br />Genero: Indiferente<br />Experiencia de 1 año en adelante como analista programador con el uso de la siguiente tecnología:<br /><br />•	Web Java<br />•	Frameworks Spring<br />•	JPA<br />•	Base de datos Oracle<br />•	Programación PL/SQL<br />•	Manejo de IDES : Eclipse, JDeveloper<br /><br />Competencias:<br />•	Pro activo<br />•	Responsable<br />•	Enfocado a resultados<br />•	Puntual<br />•	Facilidad para resolver problema<br /></li>', 1, 10),
(2, 1, 'Analista Programador JAVA', 1, '2017-11-27', '2017-11-30', 1, 600.00, 'Ninguna', 1, 10),
(3, 2, 'Desarrollador Web / Programador', 1, '2017-11-29', '2017-12-15', 2, 0.00, '', 1, 10),
(4, 4, 'Programador RPG en AS400', 1, '2017-11-29', '2017-12-10', 1, 800.00, '', 1, 10),
(5, 8, 'Motorista - Licencia pesada', 1, '2017-11-29', '2017-12-10', 1, 450.00, '', 1, 10),
(6, 7, 'Mensajero motorista - Licencia de moto y liviana', 1, '2017-11-29', '2017-12-12', 1, 350.00, '', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `postulacionesUsuarios`
--

CREATE TABLE `postulacionesUsuarios` (
  `idPostulacionUsuario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idOfertaEmpleo` int(11) NOT NULL,
  `fechaPostulacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `postulacionesUsuarios`
--

INSERT INTO `postulacionesUsuarios` (`idPostulacionUsuario`, `idUsuario`, `idOfertaEmpleo`, `fechaPostulacion`) VALUES
(1, 1, 1, '2017-11-29'),
(7, 1, 4, '2017-12-03'),
(8, 1, 5, '2017-12-03'),
(9, 1, 6, '2017-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `correo` varchar(55) NOT NULL,
  `contra` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = Inactivo\n1 = Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombres`, `apellidos`, `correo`, `contra`, `estado`) VALUES
(1, 'Ricardo Alcides', 'Castillo Rogel', 'racastillo26@outlook.com', '884af38f25b14b3b28295a169b808e5f', 1),
(2, 'Jose Vladimir', 'Reyes Domínguez', 'reyes_vladimir2@hotmail.com', 'ff17f4b3021dab74ae915625f5136532', 1),
(3, 'Maria de los Angeles', 'Maldonado Martinez', 'mmaldonadomartinezm@hotmail.com', '884af38f25b14b3b28295a169b808e5f', 1),
(4, 'melvin', 'menjivar', 'melvin1j@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'Mario', 'Hernandez', 'mail@mail.com', '25d55ad283aa400af464c76d713c07ad', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoriasOfertas`
--
ALTER TABLE `categoriasOfertas`
  ADD PRIMARY KEY (`idCategoriaOferta`),
  ADD UNIQUE KEY `idcategoriasOfertas_UNIQUE` (`idCategoriaOferta`);

--
-- Indexes for table `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`idDatoPersonal`),
  ADD UNIQUE KEY `idDatoPersonal_UNIQUE` (`idDatoPersonal`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`idDepartamento`),
  ADD UNIQUE KEY `iddepartamentos_UNIQUE` (`idDepartamento`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDocumento`),
  ADD UNIQUE KEY `iddocumentos_UNIQUE` (`idDocumento`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`,`idDepartamento`),
  ADD UNIQUE KEY `idempresas_UNIQUE` (`idEmpresa`);

--
-- Indexes for table `ofertasEmpleo`
--
ALTER TABLE `ofertasEmpleo`
  ADD PRIMARY KEY (`idofertasEmpleo`,`idCategoriaEmpleo`,`idDepartamento`),
  ADD UNIQUE KEY `idofertasEmpleo_UNIQUE` (`idofertasEmpleo`);

--
-- Indexes for table `postulacionesUsuarios`
--
ALTER TABLE `postulacionesUsuarios`
  ADD PRIMARY KEY (`idPostulacionUsuario`,`idUsuario`),
  ADD UNIQUE KEY `idpostulacionesUsuarios_UNIQUE` (`idPostulacionUsuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario_UNIQUE` (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoriasOfertas`
--
ALTER TABLE `categoriasOfertas`
  MODIFY `idCategoriaOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `idDatoPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `idDocumento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ofertasEmpleo`
--
ALTER TABLE `ofertasEmpleo`
  MODIFY `idofertasEmpleo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `postulacionesUsuarios`
--
ALTER TABLE `postulacionesUsuarios`
  MODIFY `idPostulacionUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
