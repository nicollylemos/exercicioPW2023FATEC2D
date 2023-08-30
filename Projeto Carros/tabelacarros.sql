-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Maio-2017 às 21:25
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `banco`
--

create database banco;
use banco;
-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelaimg`
--

CREATE TABLE IF NOT EXISTS `tabelacarros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `datacad` date NOT NULL,
  `ano` int NOT NULL,
  `imagem` varchar(50) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tabelaimg`
--

INSERT INTO `tabelacarros` (`id`, `modelo`, `marca`, `datacad`, `ano`,`imagem`) VALUES
(1, 'Chevrolet Camaro', 'Chevrolet', '2017-05-01', '2009', 'camaro.png');

INSERT INTO `tabelacarros` (`id`, `modelo`, `marca`,  `datacad`, `ano`,`imagem`) VALUES
(2, 'McLaren Speedtail', 'Mercedes-Benz','2023-04-02', '2020', 'mclaren.png');

INSERT INTO `tabelacarros` (`id`, `modelo`, `marca`, `datacad`, `ano`,`imagem`) VALUES
(3, ' Maserati granturismo', 'Maserati', '2023-06-11', '2020', 'maserati.png');

INSERT INTO `tabelacarros` (`id`, `modelo`, `marca`, `datacad`, `ano`,`imagem`) VALUES
(4, ' Lamborghini Aventador', 'Lamborghini', '2023-06-12', '2011', 'lamborghini.png');

INSERT INTO `tabelacarros` (`id`, `modelo`, `marca`, `datacad`, `ano`,`imagem`) VALUES
(5, ' Drako GTE ', 'Drako Motors', '2023-05-11', '2020', 'drako.png');

INSERT INTO `tabelacarros` (`id`, `modelo`, `marca`, `datacad`, `ano`,`imagem`) VALUES
(6, ' Czinger 21C ', ' Czinger', '2023-04-11', '2020', 'czinger.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
