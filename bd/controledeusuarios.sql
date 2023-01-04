-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Jan-2023 às 20:19
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
-- Banco de dados: `teste2`
--

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
  `gender` varchar(15) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date_cadastre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `level`, `firstname`, `lastname`, `email`, `date_birth`, `user_password`, `gender`, `image`, `date_cadastre`) VALUES
(17, 'user', 'AntÃ´nio', 'NacÃ©lio', 'nd7058898@gmail.com', '2005-04-29', '$2y$10$mRfzOx7H79roA7LBXn1ened0LAsTa8AQx6oWUESzOfI7xNIwFOhx2', 'male', 'uploaded-img/63b5dc59ddb81.jpg', '2023-01-04 18:23:35'),
(16, 'admin', 'Admin', 'admin', 'administrador@admin.com', '2005-04-29', '$2y$10$dtYAMiwXzgYDcRPGd61YUedX9aUZZiQc17YcBwX8/05rT7zktvW0G', 'none', '.png', '2023-01-04 18:19:57'),
(18, 'user', 'Samira', 'Lima', 'samira@gmail.com', '2005-11-28', '$2y$10$ORZM6wxEUDb.v76hcsVfFem6cvHd5361sfw/rva5BnzJymk34qnqa', 'female', 'uploaded-img/63b5dbc650aba.jpeg', '2023-01-04 18:24:54'),
(19, 'user', 'KK', 'KK', 'KK@gmail.com', '1212-12-12', '$2y$10$0cXMJSwEhXK8aM4J.Kd9sO2C3UxhNa8nnAgG.mFrImLeSX.PPslge', 'none', 'uploaded-img/63b5da66ca68e.png', '2023-01-04 18:26:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
