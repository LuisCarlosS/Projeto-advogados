-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Dez-2021 às 14:55
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoadvogados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbadvogado`
--

DROP TABLE IF EXISTS `tbadvogado`;
CREATE TABLE IF NOT EXISTS `tbadvogado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_adv` varchar(100) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `nr_oab` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nr_oab` (`nr_oab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbadvogado`
--

INSERT INTO `tbadvogado` (`id`, `nome_adv`, `usuario`, `senha`, `nr_oab`) VALUES
(3, 'Luis Carlos', 'lcsantos', '30081995', '65146582'),
(4, 'Helvis', 'haraujo', 'alipiojr', '230898');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbaudiencia`
--

DROP TABLE IF EXISTS `tbaudiencia`;
CREATE TABLE IF NOT EXISTS `tbaudiencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_audiencia` date DEFAULT NULL,
  `hr_audiencia` time DEFAULT NULL,
  `descricao` text NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `vara_id` int(11) DEFAULT NULL,
  `processo_id` int(11) DEFAULT NULL,
  `advogado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vara_audiencia` (`vara_id`),
  KEY `processo_audiencia` (`processo_id`),
  KEY `advogado_audiencia` (`advogado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbaudiencia`
--

INSERT INTO `tbaudiencia` (`id`, `dt_audiencia`, `hr_audiencia`, `descricao`, `status`, `vara_id`, `processo_id`, `advogado_id`) VALUES
(3, '2022-01-26', '10:00:00', 'Trabalhista.', 'ACONTECER', 1, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
CREATE TABLE IF NOT EXISTS `tbcliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`id`, `nome`, `cpf`, `email`) VALUES
(3, 'Antonio', '651.684.168-16', 'antonio@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmensagem`
--

DROP TABLE IF EXISTS `tbmensagem`;
CREATE TABLE IF NOT EXISTS `tbmensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbmensagem`
--

INSERT INTO `tbmensagem` (`id`, `email`, `assunto`, `mensagem`) VALUES
(1, 'luiscarlossantos.lcs.16@gmail.com', 'Direitos', 'Ã‰ um fato estabelecido hÃ¡ muito tempo que um leitor se distrairÃ¡ com o conteÃºdo legÃ­vel de uma pÃ¡gina ao examinar seu layout.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprocesso`
--

DROP TABLE IF EXISTS `tbprocesso`;
CREATE TABLE IF NOT EXISTS `tbprocesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_processo` varchar(50) DEFAULT NULL,
  `dt_inicio` date DEFAULT NULL,
  `dt_termino` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  `vl_processo` double(10,2) DEFAULT NULL,
  `vl_custo` double(10,2) DEFAULT NULL,
  `descricao` text NOT NULL,
  `advogado_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `advogado_processo` (`advogado_id`),
  KEY `cliente_processo` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbprocesso`
--

INSERT INTO `tbprocesso` (`id`, `nr_processo`, `dt_inicio`, `dt_termino`, `status`, `pago`, `vl_processo`, `vl_custo`, `descricao`, `advogado_id`, `cliente_id`) VALUES
(1, '651351', '2021-12-01', '2021-12-08', 'ganho', 1000, 1000.00, 500.00, 'Trabalhista.', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvara`
--

DROP TABLE IF EXISTS `tbvara`;
CREATE TABLE IF NOT EXISTS `tbvara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_vara` varchar(70) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `telefone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbvara`
--

INSERT INTO `tbvara` (`id`, `nome_vara`, `endereco`, `telefone`) VALUES
(1, 'Bocaina', 'Rua 10 de abril S/N', '(66)81684-6845');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbaudiencia`
--
ALTER TABLE `tbaudiencia`
  ADD CONSTRAINT `advogado_audiencia` FOREIGN KEY (`advogado_id`) REFERENCES `tbadvogado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `processo_audiencia` FOREIGN KEY (`processo_id`) REFERENCES `tbprocesso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vara_audiencia` FOREIGN KEY (`vara_id`) REFERENCES `tbvara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbprocesso`
--
ALTER TABLE `tbprocesso`
  ADD CONSTRAINT `advogado_processo` FOREIGN KEY (`advogado_id`) REFERENCES `tbadvogado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_processo` FOREIGN KEY (`cliente_id`) REFERENCES `tbcliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
