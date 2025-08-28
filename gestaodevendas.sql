-- Arquivo corrigido para MySQL
-- Codificação: UTF-8

START TRANSACTION;

-- Tabela: produto
DROP TABLE IF EXISTS produto;
CREATE TABLE produto (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  comissao DECIMAL(5,2),
  estoque INT,
  precocusto DECIMAL(10,2),
  precovenda DECIMAL(10,2)
);
INSERT INTO produto (id, nome, preco, comissao, estoque, precocusto, precovenda) VALUES
(6, 'CICLANTHUR', 11.9, 0.5, 1004, 5.9, 11.9),
(18, 'CURAE', 11.9, 0.5, 178, NULL, NULL),
(19, 'ENDECTHOR', 11.9, 0.5, 250, NULL, NULL),
(20, 'HEPATHOR', 11.9, 0.5, 150, NULL, NULL),
(21, 'MASTHE', 11.9, 0.5, 200, NULL, NULL),
(22, 'MAXIMO C', 11.9, 0.5, 100, NULL, NULL),
(23, 'MAXIMO L', 11.9, 0.5, 1750, NULL, NULL),
(24, 'VERRUTHER', 11.9, 0.5, 50, NULL, NULL),
(25, 'DYNAMIS', 38.0, 0.5, 650, NULL, NULL),
(26, 'MAXIMO BABY', 19.0, 0.5, 150, NULL, NULL),
(27, 'REPRODUCA GOLD', 0.0, 0.5, 50, NULL, NULL),
(28, 'ECTHOR POURON', 0.0, 0.5, 9, NULL, NULL),
(29, 'ECTHOR BANHO', 0.0, 0.5, 0, NULL, NULL);

-- Tabela: vendedor
DROP TABLE IF EXISTS vendedor;
CREATE TABLE vendedor (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL
);
INSERT INTO vendedor (id, nome) VALUES
(1, 'Jovas'),
(2, 'Lúcio'),
(3, 'Matheus'),
(4, 'Emerson');

-- Tabela: admissao
DROP TABLE IF EXISTS admissao;
CREATE TABLE admissao (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idproduto INT NOT NULL,
  dataentrada DATE NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  quantidade INT NOT NULL,
  FOREIGN KEY (idproduto) REFERENCES produto(id)
);
INSERT INTO admissao (id, idproduto, dataentrada, preco, quantidade) VALUES
(4, 6, '2024-09-25', 11.9, 1);

-- Tabela: tipodespesa
DROP TABLE IF EXISTS tipodespesa;
CREATE TABLE tipodespesa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL
);
INSERT INTO tipodespesa (id, nome) VALUES
(6, 'Alimentação'),
(7, 'Gasolina'),
(8, 'Manutenção Veiculo'),
(9, 'Hotel'),
(10, 'Telefone'),
(11, 'Escola'),
(12, 'Luz'),
(13, 'INSS'),
(14, 'Cartão');

-- Tabela: despesa
DROP TABLE IF EXISTS despesa;
CREATE TABLE despesa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idtipodespesa INT,
  data DATE,
  valor DECIMAL(10,2),
  observacao VARCHAR(255),
  FOREIGN KEY (idtipodespesa) REFERENCES tipodespesa(id)
);
INSERT INTO despesa (id, idtipodespesa, data, valor, observacao) VALUES
(1, 6, '2025-06-07', 1200.0, 'Teste'),
(2, 6, '2006-05-04', 1200.0, 'Teste');

-- Tabela: usuario
DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  master ENUM('S','N') NOT NULL
);
INSERT INTO usuario (id, nome, email, senha, master) VALUES
(7, 'Administrador', 'admin@gmail.com', '123', 'S'),
(12, 'Lima', 'limadev100@gmail.com', '123', 'N'),
(15, 'Joao Victor', 'joao.victormartinsest@gmail.com', 'eusoulindo', 'S');

-- Tabela: venda
DROP TABLE IF EXISTS venda;
CREATE TABLE venda (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idproduto INT,
  idvendedor INT,
  quantidade INT NOT NULL,
  datavenda DATE,
  FOREIGN KEY (idproduto) REFERENCES produto(id),
  FOREIGN KEY (idvendedor) REFERENCES vendedor(id)
);
INSERT INTO venda (id, idproduto, idvendedor, quantidade, datavenda) VALUES
(1, 6, 1, 6, '2025-05-25');

COMMIT;
