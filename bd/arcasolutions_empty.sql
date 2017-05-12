-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 12-Maio-2017 às 00:33
-- Versão do servidor: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arcasolutions`
--
CREATE SCHEMA IF NOT EXISTS `arcasolutions` DEFAULT CHARACTER SET utf8 ;
USE `arcasolutions` ;
-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `CD_CATEGORIA` int(10) UNSIGNED NOT NULL,
  `DS_CATEGORIA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`CD_CATEGORIA`, `DS_CATEGORIA`) VALUES
(1, 'Auto'),
(2, 'Beauty And Fitness'),
(3, 'Entertainment'),
(4, 'Food and Dining'),
(5, 'Health'),
(6, 'Sport'),
(7, 'Travel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `CD_EMPRESA` int(10) UNSIGNED ZEROFILL NOT NULL,
  `DS_TITULO` varchar(45) DEFAULT NULL,
  `NR_TELEFONE` varchar(11) DEFAULT NULL,
  `DS_ENDERECO` varchar(90) DEFAULT NULL,
  `NR_CEP` varchar(8) DEFAULT NULL,
  `DS_CIDADE` varchar(45) DEFAULT NULL,
  `DS_ESTADO` varchar(45) DEFAULT NULL,
  `DS_DESCRICAO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_categoria`
--

CREATE TABLE `empresa_categoria` (
  `CD_EMPRESA` int(10) UNSIGNED ZEROFILL NOT NULL,
  `CD_CATEGORIA` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CD_USUARIO` int(10) UNSIGNED ZEROFILL NOT NULL,
  `DS_LOGIN` varchar(45) DEFAULT NULL,
  `DS_SENHA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CD_USUARIO`, `DS_LOGIN`, `DS_SENHA`) VALUES
(0000000001, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CD_CATEGORIA`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`CD_EMPRESA`);

--
-- Indexes for table `empresa_categoria`
--
ALTER TABLE `empresa_categoria`
  ADD PRIMARY KEY (`CD_EMPRESA`,`CD_CATEGORIA`),
  ADD KEY `fk_empresa_categoria_categoria1_idx` (`CD_CATEGORIA`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CD_USUARIO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CD_CATEGORIA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `CD_EMPRESA` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CD_USUARIO` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `empresa_categoria`
--
ALTER TABLE `empresa_categoria`
  ADD CONSTRAINT `fk_empresa_categoria_categoria1` FOREIGN KEY (`CD_CATEGORIA`) REFERENCES `categoria` (`CD_CATEGORIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresa_categoria_empresa` FOREIGN KEY (`CD_EMPRESA`) REFERENCES `empresa` (`CD_EMPRESA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
