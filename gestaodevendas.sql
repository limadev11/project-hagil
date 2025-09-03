-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03/09/2025 às 02:02
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
-- Banco de dados: `gestaodevendas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admissao`
--

CREATE TABLE `admissao` (
  `id` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `dataentrada` date NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admissao`
--

INSERT INTO `admissao` (`id`, `idproduto`, `dataentrada`, `preco`, `quantidade`) VALUES
(4, 6, '2024-09-25', 11.90, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `whatsapp` varchar(12) NOT NULL,
  `endereco` varchar(4) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `whatsapp`, `endereco`, `bairro`, `cidade`, `uf`) VALUES
(1, 'Joao Victor', 'joaolindodegv@gmail.com', '33984022391', '345', 'santa rita', 'governador valadares', 'mg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesa`
--

CREATE TABLE `despesa` (
  `id` int(11) NOT NULL,
  `idtipodespesa` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `despesa`
--

INSERT INTO `despesa` (`id`, `idtipodespesa`, `data`, `valor`, `observacao`) VALUES
(1, 6, '2025-06-07', 1200.00, 'Teste'),
(2, 6, '2006-05-04', 1200.00, 'Teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `comissao` decimal(5,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `precocusto` decimal(10,2) DEFAULT NULL,
  `precovenda` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `comissao`, `estoque`, `precocusto`, `precovenda`) VALUES
(6, 'CICLANTHUR', 11.90, 0.50, 1004, 5.90, 11.90),
(18, 'CURAE', 11.90, 0.50, 178, NULL, NULL),
(19, 'ENDECTHOR', 11.90, 0.50, 250, NULL, NULL),
(20, 'HEPATHOR', 11.90, 0.50, 150, NULL, NULL),
(21, 'MASTHE', 11.90, 0.50, 200, NULL, NULL),
(22, 'MAXIMO C', 11.90, 0.50, 100, NULL, NULL),
(23, 'MAXIMO L', 11.90, 0.50, 1750, NULL, NULL),
(24, 'VERRUTHER', 11.90, 0.50, 50, NULL, NULL),
(25, 'DYNAMIS', 38.00, 0.50, 650, NULL, NULL),
(26, 'MAXIMO BABY', 19.00, 0.50, 150, NULL, NULL),
(27, 'REPRODUCA GOLD', 0.00, 0.50, 50, NULL, NULL),
(28, 'ECTHOR POURON', 0.00, 0.50, 9, NULL, NULL),
(29, 'ECTHOR BANHO', 0.00, 0.50, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipodespesa`
--

CREATE TABLE `tipodespesa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipodespesa`
--

INSERT INTO `tipodespesa` (`id`, `nome`) VALUES
(6, 'Alimentação'),
(7, 'Gasolina'),
(8, 'Manutenção Veiculo'),
(9, 'Hotel'),
(10, 'Telefone'),
(11, 'Escola'),
(12, 'Luz'),
(13, 'INSS'),
(14, 'Cartão');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `master` enum('S','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `master`) VALUES
(7, 'Administrador', 'admin@gmail.com', '123', 'S'),
(12, 'Lima', 'limadev100@gmail.com', '123', 'N'),
(15, 'Joao Victor', 'joao.victormartinsest@gmail.com', 'eusoulindo', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `idvendedor` int(11) DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `datavenda` date DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `valortotal` decimal(10,2) GENERATED ALWAYS AS (`quantidade` * `preco`) STORED,
  `precocusto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`id`, `idproduto`, `idvendedor`, `idcliente`, `quantidade`, `datavenda`, `preco`, `precocusto`) VALUES
(1, 6, 1, 1, 6, '2025-05-25', 15.00, 5.00),
(2, 18, 4, 0, 7, '2025-09-01', 13.00, 0.00),
(3, 18, 4, 0, 7, '2025-09-01', 13.75, 0.00),
(4, 6, 1, 0, 5, '2025-09-18', 20.00, 10.00),
(5, 27, 5, 1, 10, '2025-10-08', 6.00, 3.50);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendedor`
--

INSERT INTO `vendedor` (`id`, `nome`) VALUES
(1, 'Jovas'),
(2, 'Lúcio'),
(3, 'Matheus'),
(4, 'Emerson'),
(5, 'João Victor do Nascimento Martins');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admissao`
--
ALTER TABLE `admissao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduto` (`idproduto`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipodespesa` (`idtipodespesa`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tipodespesa`
--
ALTER TABLE `tipodespesa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduto` (`idproduto`),
  ADD KEY `idvendedor` (`idvendedor`);

--
-- Índices de tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admissao`
--
ALTER TABLE `admissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tipodespesa`
--
ALTER TABLE `tipodespesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `admissao`
--
ALTER TABLE `admissao`
  ADD CONSTRAINT `admissao_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`);

--
-- Restrições para tabelas `despesa`
--
ALTER TABLE `despesa`
  ADD CONSTRAINT `despesa_ibfk_1` FOREIGN KEY (`idtipodespesa`) REFERENCES `tipodespesa` (`id`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`idvendedor`) REFERENCES `vendedor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
