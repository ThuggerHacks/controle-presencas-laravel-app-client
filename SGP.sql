-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2022 at 10:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SGP`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aula`
--

CREATE TABLE `tbl_aula` (
  `codigo_aula` int(11) NOT NULL,
  `data_aula` varchar(40) DEFAULT NULL,
  `tema_aula` varchar(400) DEFAULT NULL,
  `fk_tbl_disciplina_codigo_disciplina` int(11) DEFAULT NULL,
  `fk_codigo_curso_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aula`
--

INSERT INTO `tbl_aula` (`codigo_aula`, `data_aula`, `tema_aula`, `fk_tbl_disciplina_codigo_disciplina`, `fk_codigo_curso_disciplina`) VALUES
(204832, '2022/03/07', 'Modelagem de banco de dados', NULL, 87877788),
(475001, '2022/05/12', 'Classes e objectos', NULL, 45488787),
(691569, '2022/05/12', 'Modelo de negocio', NULL, 87877788),
(784665, '2022/03/22', 'Aula justificada', NULL, 45488787),
(802222, '2022/03/21', 'Desenvolvimento de sistemas', NULL, 87877788),
(879325, '2022/01/10', NULL, NULL, 87877788),
(959144, '2022/03/14', 'Centro de dados e bancos de dados', NULL, 87877788);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curso`
--

CREATE TABLE `tbl_curso` (
  `nome_curso` varchar(90) DEFAULT NULL,
  `codigo_curso` int(11) NOT NULL,
  `fk_tbl_departamento_codigo_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_curso`
--

INSERT INTO `tbl_curso` (`nome_curso`, `codigo_curso`, `fk_tbl_departamento_codigo_departamento`) VALUES
('Engenharia mecatronica', 1245555, 21455),
('Engenharia Informatica', 1245666, 1245663),
('Engenharia civil', 1451545, 1254789),
('Ciencia de dados', 1452245, 1245663),
('Redes de comunicaco', 1452488, 1245663),
('Medicina geral', 1453333, 1254789),
('Engenharia de sofware', 1543324, 1245663),
('Direito', 2545545, 214555),
('Ciencias actuariais', 4512245, 1254789),
('Arquitetura', 4544445, 1236547),
('Engenharia de computacao', 4561123, 1245663),
('Contabilidade e financas', 11233333, 7845547);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curso_disciplina`
--

CREATE TABLE `tbl_curso_disciplina` (
  `fk_tbl_curso_codigo_curso` int(11) DEFAULT NULL,
  `fk_tbl_disciplina_codigo_disciplina` int(11) DEFAULT NULL,
  `fk_codigo_docente` int(11) DEFAULT NULL,
  `codigo_curso_disciplina` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_curso_disciplina`
--

INSERT INTO `tbl_curso_disciplina` (`fk_tbl_curso_codigo_curso`, `fk_tbl_disciplina_codigo_disciplina`, `fk_codigo_docente`, `codigo_curso_disciplina`, `created_at`) VALUES
(4512245, 1452224, NULL, 585855, '2022-03-22 10:31:07'),
(1245666, 4544445, 202254888, 1458745, '2021-03-22 10:06:37'),
(1451545, 1452224, NULL, 4547778, '2022-03-22 10:31:07'),
(1245666, 4225555, 202254888, 5848778, '2021-03-22 10:07:17'),
(1245666, 4545557, 202254888, 45488787, '2021-03-22 10:08:25'),
(1245666, 1225550, 202254888, 56898894, '2021-03-22 10:07:17'),
(1245666, 4112222, 20224545, 78498755, '2021-03-22 10:08:25'),
(1245666, 4565551, 20224545, 84544488, '2021-03-22 10:07:52'),
(1245666, 1442525, 20224545, 87788458, '2021-03-22 10:07:52'),
(1245666, 1225554, 20224545, 87877788, '2021-03-22 10:09:15'),
(1245666, 1452224, 202254888, 548784455, '2021-03-22 10:06:37'),
(1245666, 1234444, 202254888, 887888445, '2021-03-22 10:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `nome_departamento` varchar(100) DEFAULT NULL,
  `codigo_departamento` int(11) NOT NULL,
  `fk_tbl_faculdade_codigo_faculdade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_departamento`
--

INSERT INTO `tbl_departamento` (`nome_departamento`, `codigo_departamento`, `fk_tbl_faculdade_codigo_faculdade`) VALUES
('Departamento de engenharia mecatronica', 21455, 4569877),
('Departamento de direito', 214555, 1023200),
('Departamento de gestao', 1235467, 1023200),
('Departamento de Arquitetura', 1236547, 4569877),
('Departamento de medicina dentaria', 1245557, 8549775),
('Departamento de engenharia informatica', 1245663, 4569877),
('Departamento de engenharia civil', 1254789, 4569877),
('Departamento de medicina geral', 4557881, 8549775),
('Departamento de farmacia', 4568977, 8549775),
('Departamento de contabilidade', 7845547, 1023200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disciplina`
--

CREATE TABLE `tbl_disciplina` (
  `nome_disciplina` varchar(100) DEFAULT NULL,
  `codigo_disciplina` int(11) NOT NULL,
  `nivel_disciplina` varchar(40) DEFAULT NULL,
  `fk_tbl_docente_codigo_docente` int(11) DEFAULT NULL,
  `hora_total_disciplina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_disciplina`
--

INSERT INTO `tbl_disciplina` (`nome_disciplina`, `codigo_disciplina`, `nivel_disciplina`, `fk_tbl_docente_codigo_docente`, `hora_total_disciplina`) VALUES
('Fisica', 1224444, '1', NULL, 100),
('Inteligencia artificial', 1224455, '3', NULL, 89),
('Base de dados 2', 1225550, '2', NULL, 85),
('Sistemas de informacao', 1225554, '3', NULL, 85),
('Analise Matematica', 1234444, '1', NULL, 80),
('Programacao web', 1442525, '2', NULL, 50),
('Compiladores', 1445552, '3', NULL, 50),
('Informatica II', 1452224, '1', NULL, 55),
('Programacao orientada a objectos 2', 4112222, '2', NULL, 120),
('Base de dados 1', 4225555, NULL, NULL, 100),
('Informatica I', 4544445, '1', NULL, 80),
('Programacao orientada a objectos 1', 4545557, '2', NULL, 100),
('Estrutura de dados e algoritmos', 4565551, '3', NULL, 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disciplina_estudante`
--

CREATE TABLE `tbl_disciplina_estudante` (
  `fk_codigo_estudante` int(11) NOT NULL,
  `fk_codigo_disciplina` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `fk_codigo_curso_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_disciplina_estudante`
--

INSERT INTO `tbl_disciplina_estudante` (`fk_codigo_estudante`, `fk_codigo_disciplina`, `codigo`, `fk_codigo_curso_disciplina`) VALUES
(78455456, 4225555, 878522, 5848778),
(451021444, NULL, 45566655, 45488787),
(51002255, 4565551, 48444455, 84544488),
(7894562, 4565551, 48477788, 84544488),
(7894562, 1225554, 78444455, 87877788),
(51002255, 4545557, 78488899, 45488787),
(78455456, NULL, 78499565, 87877788),
(45477788, 4545557, 78499965, 45488787),
(78455456, 4544445, 78585875, 1458745),
(78455456, 4545557, 78944455, 45488787),
(451021444, 1225554, 78944566, 87877788),
(7845559, NULL, 78999565, 84544488),
(7845559, 1225554, 84599966, 87877788),
(45477788, 1225554, 84754448, 87877788),
(51002255, 1234444, 87844456, 887888445),
(51002255, 1225554, 789444555, 87877788);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disciplina_horario`
--

CREATE TABLE `tbl_disciplina_horario` (
  `fk_tbl_horario_codigo_` int(11) DEFAULT NULL,
  `fk_tbl_disciplina_codigo_disciplina` int(11) DEFAULT NULL,
  `fk_codigo_curso_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_disciplina_horario`
--

INSERT INTO `tbl_disciplina_horario` (`fk_tbl_horario_codigo_`, `fk_tbl_disciplina_codigo_disciplina`, `fk_codigo_curso_disciplina`) VALUES
(74993, NULL, 87877788),
(53667, NULL, 87877788),
(57445, NULL, 87877788),
(28946, NULL, 87877788),
(61432, NULL, 87877788),
(84111, NULL, 45488787),
(57778, NULL, 45488787),
(29268, NULL, 45488787),
(68311, NULL, 45488787),
(15528, NULL, 45488787);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_docente`
--

CREATE TABLE `tbl_docente` (
  `nome_docente` varchar(30) DEFAULT NULL,
  `celular_docente` int(11) DEFAULT NULL,
  `codigo_docente` int(11) NOT NULL,
  `senha_docente` varchar(40) DEFAULT NULL,
  `email_docente` varchar(40) DEFAULT NULL,
  `contratado` tinyint(1) DEFAULT NULL,
  `salario_docente` decimal(10,0) DEFAULT NULL,
  `nivel_docente` varchar(40) DEFAULT NULL,
  `docente_fingerprint` varchar(100) DEFAULT NULL,
  `reset_fingerprint` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_docente`
--

INSERT INTO `tbl_docente` (`nome_docente`, `celular_docente`, `codigo_docente`, `senha_docente`, `email_docente`, `contratado`, `salario_docente`, `nivel_docente`, `docente_fingerprint`, `reset_fingerprint`) VALUES
('Braimo Selimane', 848499142, 20224545, 'e10adc3949ba59abbe56e057f20f883e', 'imolast66@gmail.com', 0, '1000', '4', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 0),
('Belcio Nhanombe', 858599142, 202254888, 'e10adc3949ba59abbe56e057f20f883e', 'belcio@gmail.com', 0, '5000', '1', 'eeeeeeeeeeeeee', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_estudante`
--

CREATE TABLE `tbl_estudante` (
  `nome_estudante` varchar(40) DEFAULT NULL,
  `codigo_estudante` int(11) NOT NULL,
  `email_estudante` varchar(40) DEFAULT NULL,
  `senha_estudante` varchar(40) DEFAULT NULL,
  `fk_tbl_curso_codigo_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_estudante`
--

INSERT INTO `tbl_estudante` (`nome_estudante`, `codigo_estudante`, `email_estudante`, `senha_estudante`, `fk_tbl_curso_codigo_curso`) VALUES
('Paulo Tinga', 7845559, 'paulo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1245666),
('Quito Silva', 7894562, 'quito@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1245666),
('Keven Jose', 45477788, 'keven@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1245666),
('Lucas Luis Paunde', 51002255, 'lucas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1245666),
('Kelven Bulha', 78455456, 'kelven@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1245666),
('Lingui Moiana', 451021444, 'lingui@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1245666);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculdade`
--

CREATE TABLE `tbl_faculdade` (
  `nome_faculdade` varchar(40) DEFAULT NULL,
  `codigo_faculdade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculdade`
--

INSERT INTO `tbl_faculdade` (`nome_faculdade`, `codigo_faculdade`) VALUES
('Faculdade de ciencias sociais e humanas', 1023200),
('Faculdade de ciencias e tecnologia', 4569877),
('Faculdade de ciencias e saude', 8549775);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_falta_docente`
--

CREATE TABLE `tbl_falta_docente` (
  `codigo_presenca` int(11) NOT NULL,
  `fk_codigo_disciplina` int(11) NOT NULL,
  `fk_codigo_aula` int(11) NOT NULL,
  `data_falta` varchar(15) NOT NULL,
  `presente` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feriados`
--

CREATE TABLE `tbl_feriados` (
  `codigo_feriado` int(11) NOT NULL,
  `data_feriado` varchar(15) DEFAULT NULL,
  `full_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feriados`
--

INSERT INTO `tbl_feriados` (`codigo_feriado`, `data_feriado`, `full_date`) VALUES
(1452226, '6/25', ''),
(7845554, '4/7', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `inicio` varchar(10) DEFAULT NULL,
  `dia_semana` int(1) DEFAULT NULL,
  `termino` varchar(10) DEFAULT NULL,
  `codigo_` int(11) NOT NULL,
  `fk_codigo_disciplina` int(11) DEFAULT NULL,
  `fk_codigo_curso_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_horario`
--

INSERT INTO `tbl_horario` (`inicio`, `dia_semana`, `termino`, `codigo_`, `fk_codigo_disciplina`, `fk_codigo_curso_disciplina`) VALUES
('', 5, '', 15528, NULL, 45488787),
('09:45:00', 4, '12:15:00', 28946, NULL, 87877788),
('', 3, '', 29268, NULL, 45488787),
('', 2, '', 53667, NULL, 87877788),
('', 3, '', 57445, NULL, 87877788),
('07:00:00', 2, '09:35:00', 57778, NULL, 45488787),
('', 5, '', 61432, NULL, 87877788),
('09:10:00', 4, '11:30:00', 68311, NULL, 45488787),
('08:20:00', 1, '12:15:00', 74993, NULL, 87877788),
('', 1, '', 84111, NULL, 45488787);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inscricao`
--

CREATE TABLE `tbl_inscricao` (
  `fk_tbl_disciplina_codigo_disciplina` int(11) DEFAULT NULL,
  `fk_tbl_estudante_codigo_estudante` int(11) DEFAULT NULL,
  `ano_inscricao` varchar(40) DEFAULT NULL,
  `estado_inscricao` varchar(40) DEFAULT NULL,
  `estado_estudante` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_presenca`
--

CREATE TABLE `tbl_presenca` (
  `fk_tbl_aula_codigo_aula` int(11) DEFAULT NULL,
  `fk_tbl_estudante_codigo_estudante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_presenca`
--

INSERT INTO `tbl_presenca` (`fk_tbl_aula_codigo_aula`, `fk_tbl_estudante_codigo_estudante`) VALUES
(802222, 7894562),
(802222, 7845559),
(802222, 51002255),
(959144, 7894562),
(959144, 51002255),
(204832, 7894562),
(204832, 7845559),
(691569, 78455456),
(691569, 51002255),
(475001, 451021444),
(475001, 45477788),
(475001, 51002255);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_presenca_docente_mobile`
--

CREATE TABLE `tbl_presenca_docente_mobile` (
  `codigo_presenca` int(11) NOT NULL,
  `codigo_funcionario` int(11) DEFAULT NULL,
  `data_presenca` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entrada` varchar(20) DEFAULT '0000-00-00 00:00:00',
  `saida` varchar(20) DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timer`
--

CREATE TABLE `tbl_timer` (
  `hora` varchar(8) DEFAULT '0',
  `id_presenca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario_departamento`
--

CREATE TABLE `tbl_usuario_departamento` (
  `nome_usuario_departamento` varchar(40) DEFAULT NULL,
  `codigo_usuario_departamento` int(11) NOT NULL,
  `senha_usuario_departamento` varchar(40) DEFAULT NULL,
  `email_usuario_departamento` varchar(40) DEFAULT NULL,
  `celular_usuario_departamento` int(11) DEFAULT NULL,
  `fk_tbl_departamento_codigo_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usuario_departamento`
--

INSERT INTO `tbl_usuario_departamento` (`nome_usuario_departamento`, `codigo_usuario_departamento`, `senha_usuario_departamento`, `email_usuario_departamento`, `celular_usuario_departamento`, `fk_tbl_departamento_codigo_departamento`) VALUES
('Amilton Januario', 7894561, 'e10adc3949ba59abbe56e057f20f883e', 'amilton@gmail.com', 868699142, 21455),
('Renato Meque', 8479552, 'e10adc3949ba59abbe56e057f20f883e', 'Renato@gmail.com', 878799142, 1245663),
('Patrick M\'pinga', 8487778, 'e10adc3949ba59abbe56e057f20f883e', 'patrick@gmail.com', 858599142, 1254789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aula`
--
ALTER TABLE `tbl_aula`
  ADD PRIMARY KEY (`codigo_aula`),
  ADD KEY `FK_tbl_aula_2` (`fk_tbl_disciplina_codigo_disciplina`),
  ADD KEY `fk_codigo_curso_disciplina` (`fk_codigo_curso_disciplina`);

--
-- Indexes for table `tbl_curso`
--
ALTER TABLE `tbl_curso`
  ADD PRIMARY KEY (`codigo_curso`),
  ADD KEY `FK_tbl_curso_2` (`fk_tbl_departamento_codigo_departamento`);

--
-- Indexes for table `tbl_curso_disciplina`
--
ALTER TABLE `tbl_curso_disciplina`
  ADD PRIMARY KEY (`codigo_curso_disciplina`),
  ADD KEY `IFK_tbl_curso_disciplina_1` (`fk_tbl_curso_codigo_curso`),
  ADD KEY `IFK_tbl_curso_disciplina_2` (`fk_tbl_disciplina_codigo_disciplina`),
  ADD KEY `fk_codigo_docente` (`fk_codigo_docente`);

--
-- Indexes for table `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD PRIMARY KEY (`codigo_departamento`),
  ADD KEY `FK_tbl_departamento_2` (`fk_tbl_faculdade_codigo_faculdade`);

--
-- Indexes for table `tbl_disciplina`
--
ALTER TABLE `tbl_disciplina`
  ADD PRIMARY KEY (`codigo_disciplina`),
  ADD KEY `FK_tbl_disciplina_2` (`fk_tbl_docente_codigo_docente`);

--
-- Indexes for table `tbl_disciplina_estudante`
--
ALTER TABLE `tbl_disciplina_estudante`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_codigo_estudante` (`fk_codigo_estudante`),
  ADD KEY `fk_codigo_disciplina` (`fk_codigo_disciplina`),
  ADD KEY `fk_codigo_curso_disciplina` (`fk_codigo_curso_disciplina`);

--
-- Indexes for table `tbl_disciplina_horario`
--
ALTER TABLE `tbl_disciplina_horario`
  ADD KEY `FK_tbl_disciplina_horario_1` (`fk_tbl_horario_codigo_`),
  ADD KEY `FK_tbl_disciplina_horario_2` (`fk_tbl_disciplina_codigo_disciplina`),
  ADD KEY `fk_codigo_curso_disciplina` (`fk_codigo_curso_disciplina`);

--
-- Indexes for table `tbl_docente`
--
ALTER TABLE `tbl_docente`
  ADD PRIMARY KEY (`codigo_docente`);

--
-- Indexes for table `tbl_estudante`
--
ALTER TABLE `tbl_estudante`
  ADD PRIMARY KEY (`codigo_estudante`),
  ADD KEY `FK_tbl_estudante_2` (`fk_tbl_curso_codigo_curso`);

--
-- Indexes for table `tbl_faculdade`
--
ALTER TABLE `tbl_faculdade`
  ADD PRIMARY KEY (`codigo_faculdade`);

--
-- Indexes for table `tbl_falta_docente`
--
ALTER TABLE `tbl_falta_docente`
  ADD PRIMARY KEY (`codigo_presenca`),
  ADD KEY `fk_codigo_disciplina` (`fk_codigo_disciplina`),
  ADD KEY `fk_codigo_aula` (`fk_codigo_aula`);

--
-- Indexes for table `tbl_feriados`
--
ALTER TABLE `tbl_feriados`
  ADD PRIMARY KEY (`codigo_feriado`);

--
-- Indexes for table `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD PRIMARY KEY (`codigo_`),
  ADD KEY `fk_codigo_disciplina` (`fk_codigo_disciplina`),
  ADD KEY `fk_codigo_curso_disciplina` (`fk_codigo_curso_disciplina`);

--
-- Indexes for table `tbl_inscricao`
--
ALTER TABLE `tbl_inscricao`
  ADD KEY `IFK_tbl_inscricao_1` (`fk_tbl_disciplina_codigo_disciplina`),
  ADD KEY `FK_tbl_inscricao_2` (`fk_tbl_estudante_codigo_estudante`);

--
-- Indexes for table `tbl_presenca`
--
ALTER TABLE `tbl_presenca`
  ADD KEY `FK_tbl_presenca_1` (`fk_tbl_aula_codigo_aula`),
  ADD KEY `FK_tbl_presenca_2` (`fk_tbl_estudante_codigo_estudante`);

--
-- Indexes for table `tbl_presenca_docente_mobile`
--
ALTER TABLE `tbl_presenca_docente_mobile`
  ADD PRIMARY KEY (`codigo_presenca`),
  ADD KEY `codigo_funcionario` (`codigo_funcionario`);

--
-- Indexes for table `tbl_timer`
--
ALTER TABLE `tbl_timer`
  ADD KEY `id_presenca` (`id_presenca`);

--
-- Indexes for table `tbl_usuario_departamento`
--
ALTER TABLE `tbl_usuario_departamento`
  ADD PRIMARY KEY (`codigo_usuario_departamento`),
  ADD KEY `FK_tbl_usuario_departamento_2` (`fk_tbl_departamento_codigo_departamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_disciplina_estudante`
--
ALTER TABLE `tbl_disciplina_estudante`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=789444556;

--
-- AUTO_INCREMENT for table `tbl_falta_docente`
--
ALTER TABLE `tbl_falta_docente`
  MODIFY `codigo_presenca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feriados`
--
ALTER TABLE `tbl_feriados`
  MODIFY `codigo_feriado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7845555;

--
-- AUTO_INCREMENT for table `tbl_presenca_docente_mobile`
--
ALTER TABLE `tbl_presenca_docente_mobile`
  MODIFY `codigo_presenca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_aula`
--
ALTER TABLE `tbl_aula`
  ADD CONSTRAINT `FK_tbl_aula_2` FOREIGN KEY (`fk_tbl_disciplina_codigo_disciplina`) REFERENCES `tbl_disciplina` (`codigo_disciplina`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_aula_ibfk_1` FOREIGN KEY (`fk_codigo_curso_disciplina`) REFERENCES `tbl_curso_disciplina` (`codigo_curso_disciplina`);

--
-- Constraints for table `tbl_curso`
--
ALTER TABLE `tbl_curso`
  ADD CONSTRAINT `FK_tbl_curso_2` FOREIGN KEY (`fk_tbl_departamento_codigo_departamento`) REFERENCES `tbl_departamento` (`codigo_departamento`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_curso_disciplina`
--
ALTER TABLE `tbl_curso_disciplina`
  ADD CONSTRAINT `IFK_tbl_curso_disciplina_1` FOREIGN KEY (`fk_tbl_curso_codigo_curso`) REFERENCES `tbl_curso` (`codigo_curso`),
  ADD CONSTRAINT `IFK_tbl_curso_disciplina_2` FOREIGN KEY (`fk_tbl_disciplina_codigo_disciplina`) REFERENCES `tbl_disciplina` (`codigo_disciplina`),
  ADD CONSTRAINT `tbl_curso_disciplina_ibfk_1` FOREIGN KEY (`fk_codigo_docente`) REFERENCES `tbl_docente` (`codigo_docente`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD CONSTRAINT `FK_tbl_departamento_2` FOREIGN KEY (`fk_tbl_faculdade_codigo_faculdade`) REFERENCES `tbl_faculdade` (`codigo_faculdade`);

--
-- Constraints for table `tbl_disciplina`
--
ALTER TABLE `tbl_disciplina`
  ADD CONSTRAINT `FK_tbl_disciplina_2` FOREIGN KEY (`fk_tbl_docente_codigo_docente`) REFERENCES `tbl_docente` (`codigo_docente`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_disciplina_estudante`
--
ALTER TABLE `tbl_disciplina_estudante`
  ADD CONSTRAINT `tbl_disciplina_estudante_ibfk_1` FOREIGN KEY (`fk_codigo_estudante`) REFERENCES `tbl_estudante` (`codigo_estudante`),
  ADD CONSTRAINT `tbl_disciplina_estudante_ibfk_2` FOREIGN KEY (`fk_codigo_disciplina`) REFERENCES `tbl_disciplina` (`codigo_disciplina`),
  ADD CONSTRAINT `tbl_disciplina_estudante_ibfk_3` FOREIGN KEY (`fk_codigo_curso_disciplina`) REFERENCES `tbl_curso_disciplina` (`codigo_curso_disciplina`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_disciplina_horario`
--
ALTER TABLE `tbl_disciplina_horario`
  ADD CONSTRAINT `FK_tbl_disciplina_horario_1` FOREIGN KEY (`fk_tbl_horario_codigo_`) REFERENCES `tbl_horario` (`codigo_`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_tbl_disciplina_horario_2` FOREIGN KEY (`fk_tbl_disciplina_codigo_disciplina`) REFERENCES `tbl_disciplina` (`codigo_disciplina`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_disciplina_horario_ibfk_1` FOREIGN KEY (`fk_codigo_curso_disciplina`) REFERENCES `tbl_curso_disciplina` (`codigo_curso_disciplina`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_estudante`
--
ALTER TABLE `tbl_estudante`
  ADD CONSTRAINT `FK_tbl_estudante_2` FOREIGN KEY (`fk_tbl_curso_codigo_curso`) REFERENCES `tbl_curso` (`codigo_curso`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_falta_docente`
--
ALTER TABLE `tbl_falta_docente`
  ADD CONSTRAINT `tbl_falta_docente_ibfk_1` FOREIGN KEY (`fk_codigo_disciplina`) REFERENCES `tbl_disciplina` (`codigo_disciplina`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_falta_docente_ibfk_2` FOREIGN KEY (`fk_codigo_aula`) REFERENCES `tbl_aula` (`codigo_aula`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD CONSTRAINT `tbl_horario_ibfk_1` FOREIGN KEY (`fk_codigo_disciplina`) REFERENCES `tbl_disciplina` (`codigo_disciplina`),
  ADD CONSTRAINT `tbl_horario_ibfk_2` FOREIGN KEY (`fk_codigo_curso_disciplina`) REFERENCES `tbl_curso_disciplina` (`codigo_curso_disciplina`);

--
-- Constraints for table `tbl_inscricao`
--
ALTER TABLE `tbl_inscricao`
  ADD CONSTRAINT `FK_tbl_inscricao_2` FOREIGN KEY (`fk_tbl_estudante_codigo_estudante`) REFERENCES `tbl_estudante` (`codigo_estudante`) ON DELETE SET NULL,
  ADD CONSTRAINT `IFK_tbl_inscricao_1` FOREIGN KEY (`fk_tbl_disciplina_codigo_disciplina`) REFERENCES `tbl_disciplina` (`codigo_disciplina`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_presenca`
--
ALTER TABLE `tbl_presenca`
  ADD CONSTRAINT `FK_tbl_presenca_1` FOREIGN KEY (`fk_tbl_aula_codigo_aula`) REFERENCES `tbl_aula` (`codigo_aula`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_tbl_presenca_2` FOREIGN KEY (`fk_tbl_estudante_codigo_estudante`) REFERENCES `tbl_estudante` (`codigo_estudante`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_presenca_docente_mobile`
--
ALTER TABLE `tbl_presenca_docente_mobile`
  ADD CONSTRAINT `tbl_presenca_docente_mobile_ibfk_1` FOREIGN KEY (`codigo_funcionario`) REFERENCES `tbl_docente` (`codigo_docente`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_timer`
--
ALTER TABLE `tbl_timer`
  ADD CONSTRAINT `tbl_timer_ibfk_1` FOREIGN KEY (`id_presenca`) REFERENCES `tbl_presenca_docente_mobile` (`codigo_presenca`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_usuario_departamento`
--
ALTER TABLE `tbl_usuario_departamento`
  ADD CONSTRAINT `FK_tbl_usuario_departamento_2` FOREIGN KEY (`fk_tbl_departamento_codigo_departamento`) REFERENCES `tbl_departamento` (`codigo_departamento`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
