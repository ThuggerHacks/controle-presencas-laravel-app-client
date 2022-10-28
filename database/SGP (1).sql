-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2022 at 01:07 PM
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
(234223, '2022/10/14', NULL, NULL, 858889),
(289691, '2021/03/08', 'EDWEED', NULL, 858889),
(390539, '2021/03/15', NULL, NULL, 858889),
(425735, '2021/04/02', 'hhrhrhththr', NULL, 858889),
(432613, '2021/03/26', 'Aula justificada', NULL, 858889),
(439298, '2021/03/15', NULL, NULL, 858889),
(470417, '2021/03/15', 'ggerg', NULL, 2722852),
(495226, '2021/03/15', NULL, NULL, 858889),
(563982, '2021/03/15', NULL, NULL, 858889),
(568697, '2022/10/28', NULL, NULL, 858889),
(637973, '2021/03/15', NULL, NULL, 858889),
(653763, '2021/03/19', 'egegrerrgrerrg', NULL, 858889),
(815798, '2021/03/15', 'Aula justificada', NULL, 858889),
(852420, '2021/03/12', NULL, NULL, 858889);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curso`
--

CREATE TABLE `tbl_curso` (
  `nome_curso` varchar(40) DEFAULT NULL,
  `codigo_curso` int(11) NOT NULL,
  `fk_tbl_departamento_codigo_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_curso`
--

INSERT INTO `tbl_curso` (`nome_curso`, `codigo_curso`, `fk_tbl_departamento_codigo_departamento`) VALUES
('Ciencia da computacao', 45775, 52445),
('Engenharia Civil', 54545, 45511),
('Engenharia Informatica', 545112, 52445);

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
(54545, 54555, 36355, 785522, '2021-03-17 22:12:54'),
(545112, 87945, 580045, 858889, '2021-03-17 22:29:47'),
(54545, 88884, 580045, 2241589, '2021-03-17 22:12:54'),
(54545, 87945, 580045, 2722852, '2021-03-17 22:26:40'),
(45775, 87945, 1254, 7215414, '2021-03-17 22:12:54'),
(45775, 235478, 25241, 8224715, '2021-03-17 22:12:54'),
(45775, 25889, 580045, 22828141, '2021-03-17 22:12:54'),
(545112, 57855, 580045, 85675785, '2021-03-17 22:12:54'),
(545112, 4665, 580045, 85757875, '2021-03-17 22:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `nome_departamento` varchar(40) DEFAULT NULL,
  `codigo_departamento` int(11) NOT NULL,
  `fk_tbl_faculdade_codigo_faculdade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_departamento`
--

INSERT INTO `tbl_departamento` (`nome_departamento`, `codigo_departamento`, `fk_tbl_faculdade_codigo_faculdade`) VALUES
('Engenharia Civil', 45511, 4558),
('Engenharia Informatica', 52445, 4558);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disciplina`
--

CREATE TABLE `tbl_disciplina` (
  `nome_disciplina` varchar(40) DEFAULT NULL,
  `codigo_disciplina` int(11) NOT NULL,
  `nivel_disciplina` varchar(40) DEFAULT NULL,
  `fk_tbl_docente_codigo_docente` int(11) DEFAULT NULL,
  `hora_total_disciplina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_disciplina`
--

INSERT INTO `tbl_disciplina` (`nome_disciplina`, `codigo_disciplina`, `nivel_disciplina`, `fk_tbl_docente_codigo_docente`, `hora_total_disciplina`) VALUES
('POO', 4665, '2', 580045, 55),
('PDSI', 25441, '2', 580045, 55),
('BADA II', 25889, '2', 36355, 89),
('Fisica II', 54555, '1', 585445, 55),
('SIIF', 57855, '3', 585445, 80),
('Informatica II', 87945, '1', 485112, 50),
('Mecanica dos solidos', 88884, '1', 580045, 50),
('Computacao grafica', 235478, '4', 25241, 36);

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
(51002255, NULL, 878522, 858889),
(78283893, NULL, 2757252, 858889),
(45102144, NULL, 52227882, 2722852);

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
(75105, NULL, 858889),
(29725, NULL, 858889),
(28725, NULL, 858889),
(12236, NULL, 858889),
(92414, NULL, 858889),
(59690, NULL, 2722852),
(89085, NULL, 2722852),
(36869, NULL, 2722852),
(66475, NULL, 2722852),
(58629, NULL, 2722852);

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
('Alima', 848499142, 1254, 'e10adc3949ba59abbe56e057f20f883e', 'alima@gmail.com', 1, '1000', '4', '', 0),
('Renato', 878799142, 25241, 'e10adc3949ba59abbe56e057f20f883e', 'renato@gmail.com', 0, '5000', '1', '6u6u56u6', NULL),
('Belcio Nhanombe', 868699142, 36355, 'e10adc3949ba59abbe56e057f20f883e', 'belcio@gmail.com', 1, '1000', '4', '555555555555555555555555555555555555', NULL),
('Keven Jose', 848499142, 485112, 'e10adc3949ba59abbe56e057f20f883e', 'keven@gmail.com', 0, '1000', '4', '', 0),
('Braimo Selimane', 848499142, 580045, 'e10adc3949ba59abbe56e057f20f883e', 'braimo@gmail.com', 0, '1000', '4', 'TECNO/KG6-GL/TECNO-KG6:11/RP1A.200720.011/211013V455:user/release-keys', 0),
('Francisco Cisco', 848499142, 585445, 'e10adc3949ba59abbe56e057f20f883e', 'francisco@gmail.com', 0, '1000', '4', 'samsung/a12nnxx/a12:11/RP1A.200720.012/A125FXXU2BVG6:user/release-keys', 0);

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
('Belcio', 45102144, 'belcio@uzambeze.ac.mz', 'e10adc3949ba59abbe56e057f20f883e', 54545),
('Braimo Selimane', 51002255, 'braimo@uzambeze.ac.mz', 'e10adc3949ba59abbe56e057f20f883e', 545112),
('Alima Braimo', 78283893, 'braimo@uzambeze.ac.mz', '123456', 545112);

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
('FCSH', 1445),
('FCT', 4558);

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
  `data_feriado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feriados`
--

INSERT INTO `tbl_feriados` (`codigo_feriado`, `data_feriado`) VALUES
(3, '10/21');

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
('', 4, '', 12236, NULL, 858889),
('', 3, '', 28725, NULL, 858889),
('', 2, '', 29725, NULL, 858889),
('', 3, '', 36869, NULL, 2722852),
('', 5, '', 58629, NULL, 2722852),
('10:00:00', 1, '14:00:00', 59690, NULL, 2722852),
('', 4, '', 66475, NULL, 2722852),
('11:00:00', 1, '12:00:00', 75105, NULL, 858889),
('', 2, '', 89085, NULL, 2722852),
('08:00:00', 5, '12:15:00', 92414, NULL, 858889);

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
(289691, 51002255),
(653763, 51002255),
(425735, 78283893);

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

--
-- Dumping data for table `tbl_presenca_docente_mobile`
--

INSERT INTO `tbl_presenca_docente_mobile` (`codigo_presenca`, `codigo_funcionario`, `data_presenca`, `entrada`, `saida`) VALUES
(67, 580045, '2022-09-23 00:11:17', '02:10:51', '02:11:17'),
(123, 580045, '2022-09-22 08:23:02', '10:10:00', '10:30:30'),
(124, 580045, '2022-09-23 22:39:00', '00:38:07', '00:39:00'),
(126, 580045, '2022-09-25 19:23:24', '00:58:36', '21:23:24'),
(133, 1254, '2022-09-25 21:10:55', '23:10:55', NULL),
(134, 485112, '2022-09-25 21:12:03', '23:11:53', '23:12:03'),
(171, 580045, '2022-10-02 12:31:29', '09:13:06', '09:25:34'),
(172, 1254, '2022-10-02 12:31:59', '09:13:06', '09:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timer`
--

CREATE TABLE `tbl_timer` (
  `hora` varchar(8) DEFAULT '0',
  `id_presenca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_timer`
--

INSERT INTO `tbl_timer` (`hora`, `id_presenca`) VALUES
('14:26:02', 171),
('09:22:09', 171),
('09:22:26', 171);

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
('usuario departamento 2', 51445, 'e10adc3949ba59abbe56e057f20f883e', 'usuario@gmail.com', 878799142, 45511),
('usuario departamento', 54485, 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 848499142, 52445);

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
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78585876;

--
-- AUTO_INCREMENT for table `tbl_falta_docente`
--
ALTER TABLE `tbl_falta_docente`
  MODIFY `codigo_presenca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feriados`
--
ALTER TABLE `tbl_feriados`
  MODIFY `codigo_feriado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
