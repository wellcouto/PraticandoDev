-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/06/2023 às 03:48
-- Versão do servidor: 8.0.31
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_compra`
--

create database loja;
use loja;

CREATE TABLE `tbl_compra` (
  `id` int NOT NULL,
  `id_produto` int NOT NULL,
  `email` varchar(300) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `latitude` decimal(10,4) NOT NULL,
  `longitude` decimal(10,4) NOT NULL
);

--
-- Despejando dados para a tabela `tbl_compra`
--

INSERT INTO `tbl_compra` (`id`, `id_produto`, `email`, `total`, `latitude`, `longitude`) VALUES
(12, 19, 'valdecicarrasco@gmail.com', 17.00, -15.8290, -48.0502),
(14, 22, 'ruanteles@gmail.com', 2500.00, -15.8290, -48.0502),
(15, 18, 'mariaeduarda@gmail.com', 170.00, -15.8290, -48.0502),
(16, 20, 'guilhermeoliveira@gmail.com', 70.00, -15.8290, -48.0502),
(17, 26, 'guilhermeoliveira@gmail.com', 10.00, -15.8290, -48.0502);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_produto`
--

CREATE TABLE `tbl_produto` (
  `id` int NOT NULL,
  `nome` varchar(300) NOT NULL,
  `imagem` varchar(100) NULL,
  `valor` decimal(10,2) NOT NULL
);

--
-- Despejando dados para a tabela `tbl_produto`
--

INSERT INTO `tbl_produto` (`id`, `nome`, `imagem`, `valor`) VALUES
(16, 'Corte a Seco', '../../public/img/corte_a_seco.jpg', 9.99),
(17, 'Maquina', '../../public/img/corte_maquina_1.jpg', 49.99),
(18, 'Corte Estilizado', '../../public/img/corte_estilizado_1.jpg', 16.99),
(19, 'Escova', '../../public/img/escova.jpeg', 16.99),
(20, 'Tratamento Capilar', '../../public/img/tratamento_capilar.jpg', 69.99),
(21, 'Mechas/ Luzes/ Reflexo', '../../public/img/mechas_luzes_reflexos.jpg', 89.99),
(22, 'Progressiva', '../../public/img/progressiva.jpg', 49.99),
(23, 'Coloração', '../../public/img/coloracao.jpg', 99.99),
(24, 'Depilação', '../../public/img/depilacao.jpg', 49.99),
(25, 'Sombrancelha', '../../public/img/sombrancelha.jpg', 16.99),
(26, 'Manicure e Pedicure', '../../public/img/manicure_pedicure.jpg', 9.99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `idade` int NOT NULL,
  `endereco` text,
  `telefone` varchar(30) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL
);

--
-- Despejando dados para a tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `email`, `senha`, `idade`, `endereco`, `telefone`, `sexo`, `tipo`) VALUES
(18, 'David Galeno', 'davidgaleno@gmail.com', 'ipe@2023ABC', 20, 'QNJ 35 Lote 2 Casa 1', '61985120006', 'masculino', 'admin'),
(19, 'Ruan Teles', 'ruanteles@gmail.com', 'ipe@2023ABC', 20, 'QNJ 35 Lote 2  Casa 1', '6198512006', 'feminino', 'usuario'),
(20, 'Guilherme Oliveira', 'guilhermeoliveira@gmail.com', 'ipe@2023ABC', 19, 'QNJ 35 Lote 2 Casa 1', '61985120006', 'feminino', 'usuario'),
(21, 'Debora Martins ', 'deboramartins@gmail.com', 'ipe@2023ABC', 19, 'QNJ 35 Lote 2 Casa 1', '61985120006', 'feminino', 'usuario'),
(22, 'Daniel Carlos', 'danielcarlos@gmail.com', 'ipe@2023ABC', 21, 'QNJ 35 Lote 2 Casa 1', '61985120006', 'masculino', 'usuario'),
(23, 'Marcos Vinicius', 'marcosvinicius@gmail.com', 'ipe@2023ABC', 24, 'QNJ 35 Lote 2 Casa 1 ', '61985120006', 'masculino', 'usuario'),
(24, 'JessicaAlbernaz@gmail.com', 'jessicaalbernaz@gmail.com', 'ipe@2023ABC', 32, 'QNJ 35 Lote 2 Casa 1', '61985120006', 'feminino', 'usuario'),
(25, 'Maria Eduarda', 'mariaeduarda@gmail.com', 'ipe@2023ABC', 19, 'QNJ 35 Lote 2 Casa 1 ', '61985120006', 'feminino', 'usuario'),
(26, 'Gabriel Caldas', 'davidgaleno411@gmail.com', 'ipe@2023ABC', 20, 'QNJ 35 Lote 2 Casa 1 ', '61985120006', 'masculino', 'usuario'),
(28, 'Valdeci Carrasco', 'valdecicarrasco@gmail.com', 'ipe@2023ABC', 20, 'QNJ 35 Lote 2 Casa 1', '61985120006', 'masculino', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_compra`
--
ALTER TABLE `tbl_compra`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_compra`
--
ALTER TABLE `tbl_compra`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;