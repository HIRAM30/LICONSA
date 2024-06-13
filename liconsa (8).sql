-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2024 a las 18:00:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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

CREATE TABLE `asistenacia` (
  `Id_Beneficiario` int(11) NOT NULL,
  `Asistencia` int(3) NOT NULL,
  `Asistenciapormes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistenacia`
--

INSERT INTO `asistenacia` (`Id_Beneficiario`, `Asistencia`, `Asistenciapormes`) VALUES
(27, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id` int(11) NOT NULL,
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
  `TipoUsuario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`id`, `Foto`, `Nombre`, `Apellidos`, `Curp`, `Edad`, `NumPersonasDependen`, `Direccion`, `Telefono`, `CorreoElectronico`, `Contrasena`, `Dias`, `TipoUsuario`) VALUES
(7, '', 'ANTONIO', 'SOTO', 'qwertyuio', 76, 6, 'DFGHJKLÑ', 2345678, 'hola@gmail.com', '12345', 0, 1),
(8, 'img/65e2381b875a0.jpg', 'SDFGHJ', 'sdfghj', 'ssdfghj', 34, 3, 'sdfghjkl', 4567890, 'hola2@gmail.com', '12345', 0, 1),
(9, 'img/65f1e604365f8.jpg', 'DFGH', 'GHJ', 'ERFGHJKL', 5, 3, 'GFHJ', 123456789, 'SDFGHJK@GHJKL', '12345678', 0, 1),
(10, 'uno.jpg', 'dddd', 'SSSSSSSSSS', 'asdfghjkl', 34, 2, 'SSSSSSSSSSSSSSS', 34567890, 'qqq@gmail.com|', '12345', 2, 1),
(26, 'img/65f7b9af1072a.jpg', 'www', 'wwwwwwwwww', 'wwwwwwwwwwwwww', 45, 4, 'wwwwwwwwwww', 5555555, 'www@gmail.com', '12345', 0, 1),
(27, 'img/661019671b6cf.jpg', 'ANTONIO', 'SOTO', 'asdfghjklñ', 19, 3, 'DFGHJKLÑ', 7896541233, 'antoniosotoacastenco150404@gmail.com', '12345', 0, 1);

--
-- Disparadores `beneficiario`
--
DELIMITER $$
CREATE TRIGGER `after_beneficiario_insert` AFTER INSERT ON `beneficiario` FOR EACH ROW BEGIN
    
    IF NEW.TipoUsuario = 1 OR NEW.TipoUsuario = 'beneficiario' THEN
        
        INSERT INTO tarjeta (idTarjeta, idBeneficiario, Status)
        VALUES (NEW.id, NEW.id, 'Activo');
    END IF;
END
$$
DELIMITER ;
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

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `idTarjeta` int(11) NOT NULL,
  `FechaCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `idTarjeta`, `FechaCompra`) VALUES
(3, 2147483647, '2024-03-16'),
(13, 26, '2024-04-05'),
(14, 27, '2024-04-05');

--
-- Disparadores `compra`
--
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

CREATE TABLE `dependientes` (
  `id` int(11) NOT NULL,
  `idBeneficiario` int(11) DEFAULT NULL,
  `NombreCompleto` varchar(255) NOT NULL,
  `Curp` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dependientes`
--

INSERT INTO `dependientes` (`id`, `idBeneficiario`, `NombreCompleto`, `Curp`) VALUES
(1, 9, 'fghjk', 'dfghjk'),
(2, 8, 'fghjkl', 'dfghjk'),
(3, 8, 'fghjkl', 'ertyui');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `idTarjeta` int(11) NOT NULL,
  `idBeneficiario` int(11) DEFAULT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`idTarjeta`, `idBeneficiario`, `Status`) VALUES
(10, 10, 'Activo'),
(26, 26, 'Bloqueada'),
(27, 27, 'Bloqueada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(2) NOT NULL,
  `TipoUsuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `TipoUsuario`) VALUES
(1, 'Beneficiario'),
(2, 'Administrador'),
(3, 'Jefe de Turno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistenacia`
--
ALTER TABLE `asistenacia`
  ADD KEY `Id_tarjeta` (`Id_Beneficiario`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TipoUsuario` (`TipoUsuario`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`);

--
-- Indices de la tabla `dependientes`
--
ALTER TABLE `dependientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBeneficiario` (`idBeneficiario`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`idTarjeta`),
  ADD KEY `idBeneficiario` (`idBeneficiario`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `dependientes`
--
ALTER TABLE `dependientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `idTarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
