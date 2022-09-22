-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Set-2022 às 14:26
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eixos_curso`
--

CREATE TABLE `eixos_curso` (
  `ID` int(11) NOT NULL,
  `EIXO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc`
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
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID` int(11) NOT NULL,
  `TIPO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `idcurso_UNIQUE` (`ID`);

--
-- Índices para tabela `eixos_curso`
--
ALTER TABLE `eixos_curso`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tcc`
--
ALTER TABLE `tcc`
  ADD PRIMARY KEY (`IDTCC`),
  ADD UNIQUE KEY `idtcc_UNIQUE` (`IDTCC`),
  ADD KEY `fk_tcc_curso_idx` (`CURSO_IDCURSO`) USING BTREE;

--
-- Índices para tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eixos_curso`
--
ALTER TABLE `eixos_curso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tcc`
--
ALTER TABLE `tcc`
  MODIFY `IDTCC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tcc`
--
ALTER TABLE `tcc`
  ADD CONSTRAINT `fk_tcc_curso` FOREIGN KEY (`CURSO_IDCURSO`) REFERENCES `curso` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
