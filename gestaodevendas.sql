-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Set-2025 às 02:27
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `cliente`
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
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `whatsapp`, `endereco`, `bairro`, `cidade`, `uf`) VALUES
(1, 'Joao Victor', 'joaolindodegv@gmail.com', '33984022391', '345', 'santa rita', 'governador valadares', 'mg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `id` int(11) NOT NULL,
  `idtipodespesa` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `despesa`
--

INSERT INTO `despesa` (`id`, `idtipodespesa`, `data`, `valor`, `observacao`) VALUES
(1, 6, '2025-06-07', 1200.00, 'Teste'),
(2, 6, '2006-05-04', 1200.00, 'Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradaestoque`
--

CREATE TABLE `entradaestoque` (
  `id` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `dataentrada` date NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `entradaestoque`
--

INSERT INTO `entradaestoque` (`id`, `idproduto`, `dataentrada`, `preco`, `quantidade`) VALUES
(2, 24, '2025-06-25', 50, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
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
-- Extraindo dados da tabela `produto`
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
-- Estrutura da tabela `tipodespesa`
--

CREATE TABLE `tipodespesa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipodespesa`
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
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `master` enum('S','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `master`) VALUES
(7, 'Administrador', 'admin@gmail.com', '123', 'S'),
(12, 'Lima', 'limadev100@gmail.com', '123', 'N'),
(15, 'Joao Victor', 'joao.victormartinsest@gmail.com', 'eusoulindo', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
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
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `idproduto`, `idvendedor`, `idcliente`, `quantidade`, `datavenda`, `preco`, `precocusto`) VALUES
(2, 18, 4, 0, 7, '2025-09-01', 13.00, 0.00),
(3, 18, 4, 0, 7, '2025-09-01', 13.75, 0.00),
(4, 6, 1, 0, 5, '2025-09-18', 20.00, 10.00),
(5, 6, 1, 0, 5, '2025-08-20', 10.00, 5.00),
(6, 6, 1, 0, 5, '2025-05-25', 10.00, 5.00),
(7, 6, 1, 0, 5, '2025-08-20', 10.00, 5.00),
(8, 6, 1, 0, 5, '2025-02-20', 20.00, 10.00),
(9, 27, 3, 1, 5, '2025-08-25', 10.00, 5.00),
(10, 22, 3, 1, 5, '2025-08-25', 20.00, 5.00),
(11, 24, 4, 1, 5, '2025-06-20', 10.00, 5.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id`, `nome`) VALUES
(1, 'Jovas'),
(2, 'Lúcio'),
(3, 'Matheus'),
(4, 'Emerson');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipodespesa` (`idtipodespesa`);

--
-- Índices para tabela `entradaestoque`
--
ALTER TABLE `entradaestoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduto` (`idproduto`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipodespesa`
--
ALTER TABLE `tipodespesa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduto` (`idproduto`),
  ADD KEY `idvendedor` (`idvendedor`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `entradaestoque`
--
ALTER TABLE `entradaestoque`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `entradaestoque`
--
ALTER TABLE `entradaestoque`
  ADD CONSTRAINT `entradaestoque_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
