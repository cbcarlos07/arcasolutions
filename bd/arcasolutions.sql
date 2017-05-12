-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Maio-2017 às 18:23
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arcasolutions`
--
CREATE SCHEMA IF NOT EXISTS `arcasolutions` DEFAULT CHARACTER SET utf8 ;
USE `arcasolutions` ;
-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `CD_CATEGORIA` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DS_CATEGORIA` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CD_CATEGORIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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

CREATE TABLE IF NOT EXISTS `empresa` (
  `CD_EMPRESA` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DS_TITULO` varchar(45) DEFAULT NULL,
  `NR_TELEFONE` varchar(20) DEFAULT NULL,
  `DS_ENDERECO` varchar(90) DEFAULT NULL,
  `NR_CEP` varchar(8) DEFAULT NULL,
  `DS_CIDADE` varchar(45) DEFAULT NULL,
  `DS_ESTADO` varchar(45) DEFAULT NULL,
  `DS_DESCRICAO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CD_EMPRESA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`CD_EMPRESA`, `DS_TITULO`, `NR_TELEFONE`, `DS_ENDERECO`, `NR_CEP`, `DS_CIDADE`, `DS_ESTADO`, `DS_DESCRICAO`) VALUES
(1, 'Bambina Pizzaria', '(14) 3223-1', 'Rua Alfredo FontÃ£o, 6-80 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(2, 'Donatello Pizzarias', '(14) 3223 -', 'Rua Alfredo FontÃ£o, 6-90 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(3, 'Augustas'' Pizzaria', '(14) 3223-1', 'Rua Alfredo FontÃ£o, 8-48 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(4, 'Pizzaria Mamma Mia', '(14) 3223-2000', 'Rua Alfredo FontÃ£o, 0 - 10 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(5, 'Pizaria e Restaurante Ninu''s', '(14) 3223 - 2300', 'Rua Alfredo FontÃ£o, 0 - 15 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(6, 'Pizzaria Passione Bauru', '(14) 3223-2001', 'Rua Alfredo FontÃ£o, 9-19 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(7, 'Donatello Pizzarias', '(14) 3223-2008', 'Rua Alfredo FontÃ£o - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(8, 'Pizzaria Vila Rica', '(14) 3223-2011', 'Rua Alfredo FontÃ£o, 88 - 90 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(9, 'Di Forni Pizzaria', '(14) 3223-0000', 'Rua Alfredo FontÃ£o - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(10, 'Capadocia Pizzaria Bauru', '(14) 3223-2012', 'Rua Alfredo FontÃ£o, 35-40 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(11, 'Cinema Bauru', '(14) 3223-1313', 'Rua Alfredo FontÃ£o, 0-7 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Pizzaria oferece pizzas clÃ¡ssicas e especiais em amplo salÃ£o em ambiente externo com muito verde tropical'),
(12, 'Auto peÃ§as Bauru', '(14) 3223-0599', 'Rua Alfredo FontÃ£o, 8-99 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Sua loja agora mais prÃ³xima de vocÃª'),
(13, 'ClÃ­nica Santa Barbara', '(14) 3223-8000', 'Rua Alfredo FontÃ£o, 30 -40 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Invista na sua saÃºde'),
(14, 'Soccer Shop', '(14) 3223-3000', 'Rua Alfredo FontÃ£o, 1 - 5 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Compre materiais para o seu time pelo melhor preÃ§o'),
(15, 'Bauru Trip', '(14) 3223-1819', 'Rua Lagoa Vermelhar, 5 - 5 - Zumbi dos Palmares', '69.084-1', 'Manaus', 'AM', 'Compre suas passagens conosco e concorra a mais milhas'),
(16, 'Barbearia FontÃ£o', '(14) 3223-1000', 'Rua Alfredo FontÃ£o, 5 -10 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Cortes com os melhores preÃ§os do mercado.'),
(17, 'AutopeÃ§as Bauru ', '(14) 3223-8888', 'Rua Alfredo FontÃ£o, 6 - 16 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Compre as peÃ§as de seu automÃ³vel conosco'),
(18, 'Beauty Maria', '(14) 3223-9895', 'Rua Alfredo FontÃ£o, 90 - 100 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Defrizagem em geral'),
(19, 'Academia Bauru', '(14) 3223 - 1999', 'Rua Alfredo FontÃ£o, 6 -99 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Perca peso com saude'),
(20, 'Cinemark Bauru', '(14) 3223-9088', 'Rua Alfredo FontÃ£o, 88-99 - Jardim Paulista', '17.017-2', 'Bauru', 'SP', 'Cine');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_categoria`
--

CREATE TABLE IF NOT EXISTS `empresa_categoria` (
  `CD_EMPRESA` int(10) unsigned NOT NULL,
  `CD_CATEGORIA` int(10) unsigned NOT NULL,
  PRIMARY KEY (`CD_EMPRESA`,`CD_CATEGORIA`),
  KEY `fk_empresa_categoria_categoria1_idx` (`CD_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa_categoria`
--

INSERT INTO `empresa_categoria` (`CD_EMPRESA`, `CD_CATEGORIA`) VALUES
(2, 1),
(5, 1),
(6, 1),
(9, 1),
(10, 1),
(12, 1),
(17, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(6, 2),
(10, 2),
(16, 2),
(18, 2),
(19, 2),
(1, 3),
(3, 3),
(4, 3),
(5, 3),
(11, 3),
(20, 3),
(7, 4),
(8, 4),
(9, 4),
(13, 5),
(7, 6),
(14, 6),
(15, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `CD_USUARIO` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DS_LOGIN` varchar(45) DEFAULT NULL,
  `DS_SENHA` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CD_USUARIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CD_USUARIO`, `DS_LOGIN`, `DS_SENHA`) VALUES
(0000000001, 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
