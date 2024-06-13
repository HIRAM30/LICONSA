-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-06-2024 a las 04:26:24
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liconsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenacia`
--

DROP TABLE IF EXISTS `asistenacia`;
CREATE TABLE IF NOT EXISTS `asistenacia` (
  `Id_Beneficiario` int(11) NOT NULL,
  `Asistencia` int(3) NOT NULL,
  `Asistenciapormes` int(10) NOT NULL,
  KEY `Id_tarjeta` (`Id_Beneficiario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

DROP TABLE IF EXISTS `beneficiario`;
CREATE TABLE IF NOT EXISTS `beneficiario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Foto` varchar(50) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Curp` varchar(18) NOT NULL,
  `Edad` int(11) NOT NULL,
  `NumPersonasDependen` int(11) NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `Telefono` bigint(10) NOT NULL,
  `CorreoElectronico` varchar(60) NOT NULL,
  `Contrasena` varchar(15) NOT NULL,
  `Dias` int(2) NOT NULL,
  `TipoUsuario` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TipoUsuario` (`TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `beneficiario`
--
DROP TRIGGER IF EXISTS `after_beneficiario_insert`;
DELIMITER $$
CREATE TRIGGER `after_beneficiario_insert` AFTER INSERT ON `beneficiario` FOR EACH ROW BEGIN
    
    IF NEW.TipoUsuario = 1 OR NEW.TipoUsuario = 'beneficiario' THEN
        
        INSERT INTO tarjeta (idTarjeta, idBeneficiario, Status)
        VALUES (NEW.id, NEW.id, 'Activo');
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_beneficiario_insert_asistencia`;
DELIMITER $$
CREATE TRIGGER `after_beneficiario_insert_asistencia` AFTER INSERT ON `beneficiario` FOR EACH ROW BEGIN
    
    INSERT INTO asistenacia (Id_Beneficiario, Asistencia)
    VALUES (NEW.id, 0);

    
    SET @asistenciapormes = NEW.NumPersonasDependen * 4;

    
    UPDATE asistenacia
    SET Asistenciapormes = @asistenciapormes
    WHERE Id_Beneficiario = NEW.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idTarjeta` int(11) NOT NULL,
  `FechaCompra` date NOT NULL,
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `compra`
--
DROP TRIGGER IF EXISTS `after_compra_insert`;
DELIMITER $$
CREATE TRIGGER `after_compra_insert` AFTER INSERT ON `compra` FOR EACH ROW BEGIN
    DECLARE existe_beneficiario INT;
    
    
    SELECT COUNT(*) INTO existe_beneficiario
    FROM asistenacia
    WHERE Id_Beneficiario = NEW.idTarjeta;
    
    
    IF existe_beneficiario > 0 THEN
        UPDATE asistenacia
        SET Asistencia = Asistencia + 1
        WHERE Id_Beneficiario = NEW.idTarjeta;
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_mes_termina`;
DELIMITER $$
CREATE TRIGGER `after_mes_termina` AFTER INSERT ON `compra` FOR EACH ROW BEGIN
    DECLARE total_asistencias INT;
    DECLARE asistencias_realizadas INT;
    DECLARE porcentaje_asistencias FLOAT;

    
    SELECT SUM(Asistenciapormes), SUM(Asistencia) INTO total_asistencias, asistencias_realizadas
    FROM asistenacia;

    
    IF total_asistencias > 0 THEN
        SET porcentaje_asistencias = (asistencias_realizadas / total_asistencias) * 100;
    ELSE
        SET porcentaje_asistencias = 0;
    END IF;

    
    IF porcentaje_asistencias < 70 THEN
        UPDATE tarjeta
        SET Status = 'Bloqueada'
        WHERE idTarjeta = NEW.idTarjeta;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependientes`
--

DROP TABLE IF EXISTS `dependientes`;
CREATE TABLE IF NOT EXISTS `dependientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBeneficiario` int(11) DEFAULT NULL,
  `NombreCompleto` varchar(255) NOT NULL,
  `Curp` varchar(18) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idBeneficiario` (`idBeneficiario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

DROP TABLE IF EXISTS `tarjeta`;
CREATE TABLE IF NOT EXISTS `tarjeta` (
  `idTarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `idBeneficiario` int(11) DEFAULT NULL,
  `Status` varchar(25) NOT NULL,
  PRIMARY KEY (`idTarjeta`),
  KEY `idBeneficiario` (`idBeneficiario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `id` int(2) NOT NULL,
  `TipoUsuario` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `TipoUsuario`) VALUES
(1, 'Beneficiario'),
(2, 'Administrador'),
(3, 'Jefe de Turno');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistenacia`
--
ALTER TABLE `asistenacia`
  ADD CONSTRAINT `asistenacia_ibfk_1` FOREIGN KEY (`Id_Beneficiario`) REFERENCES `beneficiario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipousuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dependientes`
--
ALTER TABLE `dependientes`
  ADD CONSTRAINT `dependientes_ibfk_1` FOREIGN KEY (`idBeneficiario`) REFERENCES `beneficiario` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `tarjeta_ibfk_1` FOREIGN KEY (`idBeneficiario`) REFERENCES `beneficiario` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
