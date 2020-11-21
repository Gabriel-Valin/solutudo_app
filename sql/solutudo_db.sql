-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2020 às 02:51
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `solutudo_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `telefone`, `endereco`, `email`, `estado`, `cidade`) VALUES
(24, 'Facebook', '(14) 9999-8888', 'Avenida Maria Nazareth Roseiro, 204', 'markzuckenberg@facebook.com', 'SP', 'Botucatu'),
(25, 'Google+', '(51) 3882-9976', 'Avenida Santana, 203', 'google@gmail.com', 'SP', 'Lençóis Paulista'),
(26, 'Solutudo', '(14) 3815-2222', 'R. Azaléia, 399 - Chácara Floresta', 'desenvolvimento@solutudo.com', 'SP', 'Botucatu'),
(27, 'Distribuidora X', '(27) 9982-9089', 'Rua Jair Pereira, 1024', 'distribuidora@espiritosanto.com', 'ES', 'Vitória'),
(28, 'Super Mercado BOA COMPRA', '(28) 3815-9087', 'Avenida Major Nicolau, 790', 'supermercado@boacompra.com', 'ES', 'Vila Velha'),
(29, 'Ale Combustíveis', '(86) 3008-9876', 'Avenida Principal, 8', 'alecombustiveis@petrobras.com', 'PI', 'Piauí'),
(30, 'Cencosud', '(89) 3006-9983', 'Centro Principal, 809', 'cencosud@contato.com', 'PI', 'Piauí'),
(31, 'NWB', '(14) 9999-99999', 'Rua Presidente Do Brasil, 101', 'nwbenterprise@gmail.com', 'SP', 'São Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_admissao` varchar(255) NOT NULL,
  `foto_membro` varchar(255) NOT NULL,
  `nivel_acesso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`id`, `nome`, `celular`, `endereco`, `email`, `senha`, `data_admissao`, `foto_membro`, `nivel_acesso`) VALUES
(32, 'Bruno Montanha', '(14) 9982-8889', 'Vila Maria, 208', 'desenvolvimento@solutudo.com', '$2y$10$P8XdgyeZUZtL6eSmIgfrm.G0Bq/qlrmQ0QhfLGTGrGhTU4SK060TG', '19/11/2019', '', 'Gerente'),
(33, 'John Doe', '(14) 9999-9999', 'Jardim Cristina, 202', 'johndoe@gmail.com', '$2y$10$CLbI61sSvCL6Nc06xf8ZC.mEZXw4lDcZjxsqe.FLg5QcMYQRtcA4G', '18/07/2020', '', 'Vendedor'),
(34, 'Thais Fernandes', '(14) 9978-7677', 'Comerciários 3, 101', 'thaisfernandes@gmail.com', '$2y$10$r2eQONOP9WKtJMaTXysY8uaa/LNuQcR/ZbfIRxbbivRVufAQ.dzKK', '30/08/2020', '', 'Vendedor'),
(35, 'Murilo Stanzione', '(14) 9997-4889', 'Vila Maria, 308', 'murilo@gmail.com', '$2y$10$VW9J7uu7A/eUQ5Qh8g1MbOJ9W4EcTAhFI6rkZPq07yfWDSRzl55YC', '20/03/2020', '', 'Vendedor'),
(36, 'Beatriz Costa', '(14) 9878-6868', 'Avenida Santana, 193', 'beatrizcosta@gmail.com', '$2y$10$hLiwCtva9Ndtf2G3YaAMaOfgNLB8tAaDU0qU/APYD3DBJZm6E0DKm', '16/04/2020', '', 'Vendedor'),
(37, 'Thiago Stanzione', '(14) 9878-6787', 'Jardim Nicota de Barros, 250', 'thiagostanzione@gmail.com', '$2y$10$8CghNb8LH8moFOKN885t2u0mAvqy4RIqSsvcJdw5JCnPJg9NAVkr.', '05/01/2020', '', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `planos` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id`, `planos`, `valor`) VALUES
(2, 'Plano Prata', 'R$ 650,00'),
(3, 'Plano Ouro', 'R$ 900,00'),
(4, 'Plano Platina', 'R$ 1200,00'),
(5, 'Plano Bronze', 'R$ 450,00'),
(6, 'Plano Diamante', 'R$ 1.500,00'),
(8, 'Plano Premium', 'R$ 2.500,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `vendedor` varchar(255) NOT NULL,
  `plano` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data_venda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `empresa`, `vendedor`, `plano`, `valor`, `status`, `data_venda`) VALUES
(34, 'Facebook', 'Gabriel Valin', 'Plano Prata', 'R$ 600,00', 'Aprovado', '29/02/2020'),
(35, 'Google+', 'Gabriel Valin', 'Plano Diamante', 'R$ 1.500,00', 'Em Processo', '19/11/2020'),
(36, 'Super Mercado BOA COMPRA', 'Thais Fernandes', 'Plano Platina', 'R$ 1200,00', 'Em Processo', '19/11/2020'),
(37, 'Google+', 'Thais Fernandes', 'Plano Diamante', 'R$ 1.500,00', 'Aprovado', '20/11/2020'),
(38, 'Ale Combustíveis', 'Beatriz Costa', 'Plano Platina', 'R$ 1200,00', 'Negado', '10/11/2020');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
