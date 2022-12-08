-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2022 às 10:08
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
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(225) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `TIPO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`ID`, `NOME`, `EMAIL`, `SENHA`, `LOGIN`, `TIPO_ID`) VALUES
(0, 'Marli', 'marli@gmail.com', '202cb962ac59075b964b07152d234b70', 'marli', 1);

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
(11, 'Desenvolvimento de Sistemas', 11),
(34, 'Enfermagem', 10),
(35, 'Marketing', 11),
(40, 'Edificacoes', 11);

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
(10, 'Saude'),
(11, 'Tecnologia'),
(12, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc`
--

CREATE TABLE `tcc` (
  `ID` int(11) NOT NULL,
  `VALIDACAO` int(1) NOT NULL,
  `TITULO` varchar(200) NOT NULL,
  `ANO` int(11) NOT NULL,
  `RESUMO` longtext NOT NULL,
  `AUTOR_1` varchar(100) DEFAULT NULL,
  `AUTOR_2` varchar(100) DEFAULT NULL,
  `AUTOR_3` varchar(100) DEFAULT NULL,
  `AUTOR_4` varchar(100) DEFAULT NULL,
  `COORIENTADOR` varchar(200) NOT NULL,
  `ORIENTADOR` varchar(200) NOT NULL,
  `ARQUIVO` varchar(255) NOT NULL,
  `CURSO_ID` int(11) NOT NULL,
  `STATUS` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tcc`
--

INSERT INTO `tcc` (`ID`, `VALIDACAO`, `TITULO`, `ANO`, `RESUMO`, `AUTOR_1`, `AUTOR_2`, `AUTOR_3`, `AUTOR_4`, `COORIENTADOR`, `ORIENTADOR`, `ARQUIVO`, `CURSO_ID`, `STATUS`) VALUES
(41, 2, 'Sistema de Agendamento de Coleta de Ãleo', 2021, 'Em uma era digital, a tecnologia tem sido grande aliada na resoluÃ§Ã£o de questÃµes socioambientais. Pensando nisso, o De Ãleo no Futuro Ã© uma ferramenta que visa sistematizar o processo de coleta de Ã³leo de cozinha usado, incentivando sua\r\nreciclagem e promovendo maior eficÃ¡cia no procedimento de recolhimento. Para tal, foi utilizado no desenvolvimento a plataforma Adalo, uma tecnologia no-code capaz de atender Ã s necessidades do projeto. A proposta Ã© alinhar a tecnologia com questÃµes sustentÃ¡veis, a fim de garantir um futuro limpo para o planeta. ', 'Bruno Hideki Sato Misufara', 'Henrique Pinto Ferreira', 'JoÃ£o Pedro dos Santos Silva', 'Julio Cesar Carrillo de Oliveira', 'Thiago Seti Patricio', ' Diego Henrique Emygdio LÃ¡zaro', '167046238463913bb0d583a.pdf', 11, NULL),
(43, 2, 'Sistema Gerenciador de TCCs', 2022, 'Na contemporaneidade, as Tecnologias da InformaÃ§Ã£o e da ComunicaÃ§Ã£o (TICâs) crescem exponencialmente, e com destaque especial para o campo da educaÃ§Ã£o. Logo, muitas escolas adotam tecnologias em seus processos de ensino e aprendizagem, tais como o uso de sites, plataformas de aprendizagem, redes e mÃ­dias sociais, entre outros. A Escola TÃ©cnica de Lins (Etec) se configura como um bom exemplo do uso de tecnologias, visto o uso de aplicaÃ§Ã£o web, redes e mÃ­dias sociais, e de cursos no eixo de Tecnologia da InformaÃ§Ã£o (TI). Partindo desse princÃ­pio, a Etec, como escola tÃ©cnica e profissionalizante, tem como requisitos, ao final de seus cursos, trabalhos denominados de conclusÃ£o de curso, ou TCC, cujo foco Ã© a sistematizaÃ§Ã£o do aprendizado do aluno em um trabalho acadÃªmico e cientÃ­fico, que nos cursos de tecnologia, devem abarcar uma aplicaÃ§Ã£o fundamentada em aparatos tecnolÃ³gicos. Ao fazer estudos de campo e entrevistas pessoais com a bibliotecÃ¡ria da referida unidade, constatou-se que a Etec nÃ£o possui um sistema informatizado para a digitalizaÃ§Ã£o e controle de TCCâs, e que tal sistema, de acordo com formulÃ¡rio de pesquisa pelo Google Forms realizado com alunos, docentes e coordenadores da escola, seria de bastante utilidade, vide a facilidade de consulta e de controle dos trabalhos, que atualmente sÃ£o feitos por meio de gravaÃ§Ã£o destes em mÃ­dia fÃ­sica tais como CDâs. Assim, o grupo teve a ideia de dar aos alunos acesso mais rÃ¡pido a todos os trabalhos escolares anteriores jÃ¡ concluÃ­dos, isso Ã© feito pelo bibliotecÃ¡rio, armazenando os TCCâs aprovados em formato digital, o que, por sua vez, irÃ¡ permitir que estudantes e pÃºblico acessem facilmente pesquisas e consultas acadÃªmicas, graÃ§as ao sistema.\r\n', 'Ana Beatriz Germano', 'Luana Ferreira', 'Anna Laura Amorin', 'Deverson Kaua', 'Thiago Seti', 'Adriano Castro', '16704885276391a1cfef69b.pdf', 11, NULL);

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
(1, 'Administrador'),
(2, 'Aluno'),
(7, 'Professor');

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
(23, 'user', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 3),
(24, 'Ana Beatriz', 'ana.zgermano2005@gmail.com', '7a0f29f6c0ae1509404460affeefa4ce', 'ana', 2);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `eixo`
--
ALTER TABLE `eixo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tcc`
--
ALTER TABLE `tcc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
