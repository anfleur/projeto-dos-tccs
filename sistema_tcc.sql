-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Nov-2022 às 01:00
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `NOME` varchar(200) NOT NULL,
  `EIXO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`ID`, `NOME`, `EIXO_ID`) VALUES
(1, 'Administrador', 1),
(2, 'DS', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eixo`
--

CREATE TABLE `eixo` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eixo`
--

INSERT INTO `eixo` (`ID`, `TITULO`) VALUES
(1, 'Adm'),
(2, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc`
--

CREATE TABLE `tcc` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(200) NOT NULL,
  `ANO` int(11) NOT NULL,
  `RESUMO` longtext NOT NULL,
  `COORIENTADOR` varchar(200) NOT NULL,
  `ORIENTADOR` varchar(200) NOT NULL,
  `ARQUIVO` varchar(255) NOT NULL,
  `CURSO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tcc`
--

INSERT INTO `tcc` (`ID`, `TITULO`, `ANO`, `RESUMO`, `COORIENTADOR`, `ORIENTADOR`, `ARQUIVO`, `CURSO_ID`) VALUES
(22, 'Informatica', 2020, ' hjhgjhjjj', 'Thiago Seti', 'Adriano Castro', '1667068653635d72edd74c9.pdf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`ID`, `NOME`) VALUES
(1, 'Admin'),
(2, 'Aluno'),
(3, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `TIPO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `NOME`, `EMAIL`, `SENHA`, `LOGIN`, `TIPO_ID`) VALUES
(17, 'Ana Beatriz', 'ana.zgermano2005@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ana', 3);

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
-- Índices para tabela `eixo`
--
ALTER TABLE `eixo`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tcc`
--
ALTER TABLE `tcc`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `idtcc_UNIQUE` (`ID`),
  ADD KEY `fk_tcc_curso_idx` (`CURSO_ID`) USING BTREE;

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `eixo`
--
ALTER TABLE `eixo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tcc`
--
ALTER TABLE `tcc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tcc`
--
ALTER TABLE `tcc`
  ADD CONSTRAINT `fk_tcc_curso` FOREIGN KEY (`CURSO_ID`) REFERENCES `curso` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
