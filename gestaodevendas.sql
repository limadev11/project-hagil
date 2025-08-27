-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Out-2024 às 01:05
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
-- Estrutura da tabela `admissao`
--

CREATE TABLE `admissao` (
  `id` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `dataentrada` date NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admissao`
--

INSERT INTO `admissao` (`id`, `idproduto`, `dataentrada`, `preco`, `quantidade`) VALUES
(4, 0, '2024-09-25', '11.90', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `id` int(11) NOT NULL,
  `idtipodespesa` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `observacao` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancdespesa`
--

CREATE TABLE `lancdespesa` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `iddespesa` int(11) NOT NULL,
  `datadespesa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lancdespesa`
--

INSERT INTO `lancdespesa` (`id`, `nome`, `valor`, `iddespesa`, `datadespesa`) VALUES
(6, 'Alimentação', '600.00', 6, '2024-09-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `comissao` decimal(10,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `precocusto` decimal(10,2) DEFAULT NULL,
  `precovenda` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `comissao`, `estoque`, `precocusto`, `precovenda`) VALUES
(6, 'CICLANTHUR', '11.90', '0.50', 1004, '5.90', '11.90'),
(18, 'CURAE', '11.90', '0.50', 178, NULL, NULL),
(19, 'ENDECTHOR', '11.90', '0.50', 250, NULL, NULL),
(20, 'HEPATHOR', '11.90', '0.50', 150, NULL, NULL),
(21, 'MASTHE', '11.90', '0.50', 200, NULL, NULL),
(22, 'MAXIMO C', '11.90', '0.50', 100, NULL, NULL),
(23, 'MAXIMO L', '11.90', '0.50', 1750, NULL, NULL),
(24, 'VERRUTHER', '11.90', '0.50', 50, NULL, NULL),
(25, 'DYNAMIS', '38.00', '0.50', 650, NULL, NULL),
(26, 'MAXIMO BABY', '19.00', '0.50', 150, NULL, NULL),
(27, 'REPRODUCA GOLD', '0.00', '0.50', 50, NULL, NULL),
(28, 'ECTHOR POURON', '0.00', '0.50', 9, NULL, NULL),
(29, 'ECTHOR BANHO', '0.00', '0.50', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipodespesa`
--

CREATE TABLE `tipodespesa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `master` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `master`) VALUES
(7, 'Administrador', 'admin@gmail.com', '123', 'S'),
(12, 'Lima', 'limadev100@gmail.com', '123', 'N'),
(15, 'Joao Victor', 'joao.victormartinsest@gmail.com', 'eusoulindo', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `idvendedor` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `valortotal` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `datavenda` date DEFAULT NULL,
  `vlrcomissao` decimal(10,2) DEFAULT NULL,
  `vlddesconto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Índices para tabela `admissao`
--
ALTER TABLE `admissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipodespesa` (`idtipodespesa`);

--
-- Índices para tabela `lancdespesa`
--
ALTER TABLE `lancdespesa`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `admissao`
--
ALTER TABLE `admissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lancdespesa`
--
ALTER TABLE `lancdespesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tipodespesa`
--
ALTER TABLE `tipodespesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `despesa`
--
ALTER TABLE `despesa`
  ADD CONSTRAINT `despesa_ibfk_1` FOREIGN KEY (`idtipodespesa`) REFERENCES `tipodespesa` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`idvendedor`) REFERENCES `vendedor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
