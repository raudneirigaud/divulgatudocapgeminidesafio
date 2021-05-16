-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2021 às 21:39
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `divulgatudo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `nome` varchar(255) NOT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `datainicio` date DEFAULT NULL,
  `datafim` date DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`nome`, `cliente`, `datainicio`, `datafim`, `valor`) VALUES
('Ad01', 'Raudnei', '2021-05-01', '2021-05-02', 1),
('ad02', 'Raudnei', '2021-05-01', '2021-05-07', 1),
('ad03', 'Rigaud', '2021-06-01', '2021-06-15', 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
