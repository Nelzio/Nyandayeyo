-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 18, 2018 at 07:15 PM
-- Server version: 10.0.32-MariaDB-0+deb8u1
-- PHP Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nyandayeyo`
--
CREATE DATABASE IF NOT EXISTS `Nyandayeyo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Nyandayeyo`;

-- --------------------------------------------------------

--
-- Table structure for table `bairro`
--

CREATE TABLE `bairro` (
  `id` int(11) NOT NULL,
  `idDistrito` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bairro`
--

INSERT INTO `bairro` (`id`, `idDistrito`, `nome`, `lat`, `lng`) VALUES
(1, 1, 'Ferroviario', 546444, 45556),
(2, 1, 'Mahotas', 246444, 43556),
(3, 1, 'Albazine', 326444, 313556),
(4, 2, 'Alto Mae', 3264004, 313500),
(5, 2, 'Central', 2164004, 513500),
(6, 2, 'Polana Cimento', 2064004, 203500);

-- --------------------------------------------------------

--
-- Table structure for table `casa`
--

CREATE TABLE `casa` (
  `id` int(11) NOT NULL,
  `idQuarteirao` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `denuncia`
--

CREATE TABLE `denuncia` (
  `id` int(11) NOT NULL,
  `idEndereco` int(11) DEFAULT NULL,
  `idDenunciante` int(11) NOT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `tipoViolencia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `denuncia`
--

INSERT INTO `denuncia` (`id`, `idEndereco`, `idDenunciante`, `descricao`, `tipoViolencia`) VALUES
(1, 1, 1, 'asdasdasdas', '2'),
(3, 1, 1, 'asdasdasdas', '2'),
(4, 1, 2, 'asdasdasdas', '2'),
(5, 2, 1, 'asdasdasdas', '2'),
(6, 14, 1, 'asdasdasdas', '2'),
(7, 16, 15, 'asdasdasdas', '2'),
(8, 17, 16, '', '1'),
(9, 18, 17, 'ghdgthdg', '3'),
(10, 19, 18, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `denunciante`
--

CREATE TABLE `denunciante` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `tipoDenunciante` int(2) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `denunciante`
--

INSERT INTO `denunciante` (`id`, `nome`, `sexo`, `tipoDenunciante`, `telefone`) VALUES
(1, 'asdaasd', 'm', 1, '32323'),
(2, 'asdaasd', 'm', 1, '32323'),
(3, 'asdaasd', 'm', 2, '32323'),
(4, 'asdaasd', 'f', 2, '32323'),
(5, 'asdaasd', 'f', 2, '32323'),
(6, 'asdaasd', 'f', 2, '32323'),
(7, 'asdaasd', 'f', 2, '32323'),
(8, 'asdaasd', 'f', 2, '32323'),
(9, 'asdaasd', 'f', 2, '32323'),
(10, 'asdaasd', 'f', 2, '32323'),
(11, 'asdaasd', 'f', 2, '32323'),
(12, 'asdaasd', 'f', 2, '32323'),
(13, 'asdaasd', 'f', 2, '32323'),
(14, 'asdaasd', 'f', 2, '32323'),
(15, 'asdaasd', 'f', 2, '32323'),
(16, '', NULL, NULL, ''),
(17, 'aaaaa', 'm', 1, '1212'),
(18, '', 'f', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distrito`
--

INSERT INTO `distrito` (`id`, `idProvincia`, `nome`, `lat`, `lng`) VALUES
(1, 1, 'Ka-Mavota', 45465, 54545),
(2, 1, 'Ka-Mpfumo', 15465, 14545);

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `idProvincia` int(11) DEFAULT NULL,
  `idDistrito` int(11) DEFAULT NULL,
  `idBairro` int(11) DEFAULT NULL,
  `idQuarteirao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id`, `idProvincia`, `idDistrito`, `idBairro`, `idQuarteirao`) VALUES
(1, NULL, 1, 1, NULL),
(2, 1, 1, 1, NULL),
(3, 1, 1, 1, NULL),
(4, 1, 1, 1, NULL),
(5, 1, 1, 1, NULL),
(6, 1, 1, 1, NULL),
(7, 1, 1, 1, NULL),
(8, 1, 1, 1, NULL),
(9, 1, 1, 1, NULL),
(10, 1, 1, 1, NULL),
(11, 1, 1, 1, NULL),
(12, 1, 1, 1, NULL),
(13, 1, 1, 1, NULL),
(14, 1, 1, 1, NULL),
(15, 1, 1, 1, NULL),
(16, 1, 1, 1, NULL),
(17, 1, 1, 1, NULL),
(18, 1, 1, 2, NULL),
(19, 1, 2, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provincia`
--

INSERT INTO `provincia` (`id`, `nome`, `lat`, `lng`) VALUES
(1, 'Maputo', 121222, 1215454);

-- --------------------------------------------------------

--
-- Table structure for table `quarteirao`
--

CREATE TABLE `quarteirao` (
  `id` int(11) NOT NULL,
  `idBairro` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_distrito` (`idDistrito`);

--
-- Indexes for table `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quarteirao` (`idQuarteirao`);

--
-- Indexes for table `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_endereco` (`idEndereco`),
  ADD KEY `fk_denunciante` (`idDenunciante`);

--
-- Indexes for table `denunciante`
--
ALTER TABLE `denunciante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_provincia` (`idProvincia`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_provincia_end` (`idProvincia`),
  ADD KEY `fk_distrito_end` (`idDistrito`),
  ADD KEY `fk_bairro_end` (`idBairro`),
  ADD KEY `fk_quarteirao_end` (`idQuarteirao`);

--
-- Indexes for table `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarteirao`
--
ALTER TABLE `quarteirao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bairro` (`idBairro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `casa`
--
ALTER TABLE `casa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `denunciante`
--
ALTER TABLE `denunciante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quarteirao`
--
ALTER TABLE `quarteirao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `fk_distrito` FOREIGN KEY (`idDistrito`) REFERENCES `distrito` (`id`);

--
-- Constraints for table `casa`
--
ALTER TABLE `casa`
  ADD CONSTRAINT `fk_quarteirao` FOREIGN KEY (`idQuarteirao`) REFERENCES `quarteirao` (`id`);

--
-- Constraints for table `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `fk_denunciante` FOREIGN KEY (`idDenunciante`) REFERENCES `denunciante` (`id`),
  ADD CONSTRAINT `fk_endereco` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`id`);

--
-- Constraints for table `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `fk_provincia` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`id`);

--
-- Constraints for table `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_bairro_end` FOREIGN KEY (`idBairro`) REFERENCES `bairro` (`id`),
  ADD CONSTRAINT `fk_distrito_end` FOREIGN KEY (`idDistrito`) REFERENCES `distrito` (`id`),
  ADD CONSTRAINT `fk_provincia_end` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`id`),
  ADD CONSTRAINT `fk_quarteirao_end` FOREIGN KEY (`idQuarteirao`) REFERENCES `quarteirao` (`id`);

--
-- Constraints for table `quarteirao`
--
ALTER TABLE `quarteirao`
  ADD CONSTRAINT `fk_bairro` FOREIGN KEY (`idBairro`) REFERENCES `bairro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
