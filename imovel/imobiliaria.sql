-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 12:09 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `autenticacao`
--

CREATE TABLE `autenticacao` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autenticacao`
--

INSERT INTO `autenticacao` (`id_usuario`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'Teste1', 'teste1@teste.teste', 'teste1', 'Senhorio'),
(2, 'teste2', 'teste2@teste.teste', 'teste2', 'Inquilino'),
(3, 'teste3', 'teste3@teste.teste', 'teste3', 'Inquilino'),
(4, 'teste4', 'teste4@teste.teste', 'teste4', 'Inquilino');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `cpf` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `email_contato` varchar(100) NOT NULL,
  `tel_contato` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_completo`, `cpf`, `rg`, `email_contato`, `tel_contato`, `id_usuario`) VALUES
(1, 'nome1', 1111, 111111, 'email1', 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL,
  `id_proprietario` int(11) NOT NULL,
  `id_inquilino` int(11) NOT NULL,
  `id_imovel` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imovel`
--

CREATE TABLE `imovel` (
  `id_imovel` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `n_quartos` int(11) NOT NULL,
  `n_banheiros` int(11) NOT NULL,
  `area` float NOT NULL,
  `cep` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `email_contato` varchar(100) NOT NULL,
  `tel_contato` int(11) NOT NULL,
  `disponivel` tinyint(1) NOT NULL DEFAULT '1',
  `preco` float NOT NULL,
  `tipo` varchar(11) NOT NULL,
  `imagem1` mediumblob,
  `imagem2` mediumblob,
  `imagem3` mediumblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imovel`
--

INSERT INTO `imovel` (`id_imovel`, `id_responsavel`, `n_quartos`, `n_banheiros`, `area`, `cep`, `rua`, `bairro`, `cidade`, `email_contato`, `tel_contato`, `disponivel`, `preco`, `tipo`, `imagem1`, `imagem2`, `imagem3`) VALUES
INSERT INTO `imovel` (`id_imovel`, `id_responsavel`, `n_quartos`, `n_banheiros`, `area`, `cep`, `rua`, `bairro`, `cidade`, `email_contato`, `tel_contato`, `disponivel`, `preco`, `tipo`, `imagem1`, `imagem2`, `imagem3`) VALUES
INSERT INTO `imovel` (`id_imovel`, `id_responsavel`, `n_quartos`, `n_banheiros`, `area`, `cep`, `rua`, `bairro`, `cidade`, `email_contato`, `tel_contato`, `disponivel`, `preco`, `tipo`, `imagem1`, `imagem2`, `imagem3`) VALUES

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autenticacao`
--
ALTER TABLE `autenticacao`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indexes for table `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`id_imovel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autenticacao`
--
ALTER TABLE `autenticacao`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imovel`
--
ALTER TABLE `imovel`
  MODIFY `id_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;