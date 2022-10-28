-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29-Mar-2022 às 15:07
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `psicologa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `consulta_id` int(11) NOT NULL,
  `consulta_nome` varchar(100) NOT NULL,
  `consulta_dtNasc` date NOT NULL,
  `consulta_sexo` char(1) NOT NULL,
  `consulta_demanda` varchar(500) NOT NULL,
  `consulta_praquem` varchar(50) NOT NULL,
  `consulta_dia` date NOT NULL,
  `consulta_hora` time NOT NULL,
  `consulta_modalidade` varchar(50) NOT NULL,
  `consulta_plataforma` varchar(50) NOT NULL,
  `consulta_usuario_id` int(11) NOT NULL,
  `consulta_aprovada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `psicologa`
--

CREATE TABLE `psicologa` (
  `psicologa_id` int(11) NOT NULL,
  `psicologa_nome` varchar(100) NOT NULL,
  `psicologa_email` varchar(100) NOT NULL,
  `psicologa_formacao` varchar(100) NOT NULL,
  `psicologa_telefone` char(15) NOT NULL,
  `psicologa_senha` varchar(100) NOT NULL,
  `psicologa_adm` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nome` varchar(100) NOT NULL,
  `usuario_dtNasc` date NOT NULL,
  `usuario_sexo` varchar(2) NOT NULL,
  `usuario_endereco` varchar(100) NOT NULL,
  `usuario_pais` varchar(50) NOT NULL,
  `usuario_telefone` char(11) NOT NULL,
  `usuario_email` varchar(100) NOT NULL,
  `usuario_senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`consulta_id`);

--
-- Índices para tabela `psicologa`
--
ALTER TABLE `psicologa`
  ADD PRIMARY KEY (`psicologa_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `consulta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `psicologa`
--
ALTER TABLE `psicologa`
  MODIFY `psicologa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
