-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Nov-2022 às 10:31
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
-- Banco de dados: `controledeusuarios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `user_password` varchar(500) NOT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `date_cadastre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `firstname`, `lastname`, `email`, `date_birth`, `user_password`, `gender`, `date_cadastre`) VALUES
(1, 'AntÃ´nio', 'NacÃ©lio', 'nd7058898@gmail.com', '2005-04-29', '$2y$10$QmNx8lR7uCgfRDIFW0rGB.yCxeRLj9ijA7vMZhoXm/YOuJeWo06Oa', 'male', '2022-11-19 21:52:57'),
(11, 'Alvaro', 'Nogueira', 'agostinho@gmail.com', '2005-05-01', '$2y$10$f4qyF9rHdRrvC2NexBbgwOpmmmeUKkQot1i6maFH32lkKOnGVgkGW', 'male', '2022-11-22 12:48:08'),
(10, 'Daniel', 'Mota', 'dm@gmail.com', '2003-08-19', '$2y$10$.KA8zTpOxjxshEA0X5pyoubllUa9vPg0OAeZIma4NEUpMbv/dunvC', 'male', '2022-11-22 12:40:50'),
(5, 'Samira', 'Lima', 'samira@gmail.com', '2005-11-28', '$2y$10$klCN0H6UTBBo6t2rR4YHpeQbB1PMx/e1ZHLaCSkHksrjsGFtbs/t6', 'female', '2022-11-21 16:26:32'),
(12, 'test', 'user', 'testeuser@gmail.com', '1212-12-12', '$2y$10$NqDOfpM8E1mLj5Fle1C2UujSou4WsbsumEvZZfjBbPUFUgYoIpMaO', 'none', '2022-11-22 14:38:32'),
(7, 'Admin', 'admin', 'administrador@admin.com', '2005-04-29', '$2y$10$dtYAMiwXzgYDcRPGd61YUedX9aUZZiQc17YcBwX8/05rT7zktvW0G', 'none', '2022-11-21 22:56:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
