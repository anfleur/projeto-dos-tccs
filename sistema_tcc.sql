-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 12:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_tcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `EIXO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`ID`, `NOME`, `EIXO_ID`) VALUES
(1, 'Administrador', 1),
(2, 'DS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `eixo`
--

CREATE TABLE `eixo` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eixo`
--

INSERT INTO `eixo` (`ID`, `TITULO`) VALUES
(1, 'Adm'),
(2, 'Tecnologia');

-- --------------------------------------------------------

--
-- Table structure for table `tcc`
--

CREATE TABLE `tcc` (
  `IDTCC` int(11) NOT NULL,
  `TITULO` varchar(200) NOT NULL,
  `ANO` year(4) NOT NULL,
  `RESUMO` varchar(255) NOT NULL,
  `ARQUIVO` varchar(255) NOT NULL,
  `CURSO_IDCURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`ID`, `NOME`) VALUES
(1, 'Admin'),
(2, 'Aluno'),
(3, 'Professor'),
(4, 'Tecnologia');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `TIPO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOME`, `EMAIL`, `SENHA`, `LOGIN`, `TIPO_ID`) VALUES
(7, 'Laura', 'annalauraamorim063@gmail.com', '202cb962ac59075b964b07152d234b70', 'Laura', 4),
(8, 'Anna Laura', 'annalauraamorim063@gmail.com', '202cb962ac59075b964b07152d234b70', 'Anna Laura', 7),
(9, 'anna', 'annalauraamorim063@gmail.com', '202cb962ac59075b964b07152d234b70', 'anna', 8),
(10, 'Anna Laura', 'annalauraamorim063@gmail.com', '202cb962ac59075b964b07152d234b70', 'Anna Laura', 4),
(11, 'Anna Laura', 'annalauraamorim063@gmail.com', '202cb962ac59075b964b07152d234b70', 'Anna Laura', 3),
(12, 'Admin', 'annalauraamorim063@gmail.com', '202cb962ac59075b964b07152d234b70', 'Lara', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `idcurso_UNIQUE` (`ID`);

--
-- Indexes for table `eixo`
--
ALTER TABLE `eixo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tcc`
--
ALTER TABLE `tcc`
  ADD PRIMARY KEY (`IDTCC`),
  ADD UNIQUE KEY `idtcc_UNIQUE` (`IDTCC`),
  ADD KEY `fk_tcc_curso_idx` (`CURSO_IDCURSO`) USING BTREE;

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eixo`
--
ALTER TABLE `eixo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tcc`
--
ALTER TABLE `tcc`
  MODIFY `IDTCC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tcc`
--
ALTER TABLE `tcc`
  ADD CONSTRAINT `fk_tcc_curso` FOREIGN KEY (`CURSO_IDCURSO`) REFERENCES `curso` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
