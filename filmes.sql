-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/05/2025 às 01:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `filmes`
--
CREATE DATABASE IF NOT EXISTS `filmes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `filmes`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabfilmes`
--

CREATE TABLE `tabfilmes` (
  `id` int(10) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `filme` varchar(80) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `imdb` int(2) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `tabfilmes`
--

INSERT INTO `tabfilmes` (`id`, `codigo`, `filme`, `descricao`, `data`, `imdb`, `imagem`) VALUES
(1, 11, 'A bruxa', 'Filme de uma bruxa perversa', '2025-05-18', 10, 'a_bruxa.jpg'),
(2, 22, 'Django Livre', 'Filme de um ex excravo que luta  para libertar sua esposa', '2025-05-26', 9, 'django.jpg'),
(3, 33, 'Tumulo dos vagalumes', 'Horrores da segunda guerra mundial', '2025-05-16', 8, 'vagalumes.jpg'),
(5, 33, 'O senhor dos anéis', 'Show de bola', '2025-05-21', 10, 'senhor_aneis.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tabfilmes`
--
ALTER TABLE `tabfilmes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tabfilmes`
--
ALTER TABLE `tabfilmes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
