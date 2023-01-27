-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Jan-2023 às 19:00
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `credenciamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sits_usuario`
--

DROP TABLE IF EXISTS `sits_usuario`;
CREATE TABLE IF NOT EXISTS `sits_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sits_usuario`
--

INSERT INTO `sits_usuario` (`id`, `nome_situacao`) VALUES
(1, 'Ativo'),
(2, 'Inativo'),
(3, 'Aguardando confirmação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `user_password` varchar(500) NOT NULL,
  `chave` varchar(220) DEFAULT NULL,
  `sits_usuario_id` int(11) NOT NULL DEFAULT '3',
  `gender` varchar(15) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date_cadastre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `level`, `firstname`, `lastname`, `email`, `date_birth`, `user_password`, `chave`, `sits_usuario_id`, `gender`, `image`, `date_cadastre`) VALUES
(16, 'admin', 'Admin', 'admin', 'administrador@admin.com', '2005-04-29', '$2y$10$dtYAMiwXzgYDcRPGd61YUedX9aUZZiQc17YcBwX8/05rT7zktvW0G', NULL, 1, 'none', '.png', '2023-01-04 18:19:57'),
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
