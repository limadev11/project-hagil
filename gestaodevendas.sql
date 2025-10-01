-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Out-2025 às 02:49
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
(1, 'Joao Victor', 'joaolindodegv@gmail.com', '33984022391', '345', 'santa rita', 'governador valadares', 'mg'),
(2, 'João Victor do Nascimento Martins', 'joaovictor@gmail.com', '338435897237', 'bgjd', 'jsdhfusd', 'governador valadares ', 'MG'),
(3, 'Maximiliano Domingos de Souza Freitas', 'troleikkkk@gmail.com', '3389237824', 'eu s', 'befhu sadfsd', 'São Sebastião do Alto do Monte das Palmeiras do Va', 'MG'),
(4, 'Carlos Ferreira', 'carlos.ferreira1@email.com', '92913111657', 'Rua ', 'Savassi', 'Recife', 'PE'),
(5, 'Juliana Gomes', 'juliana.gomes2@email.com', '71925693977', 'Rua ', 'Centro', 'Porto Alegre', 'RS'),
(6, 'Rafael Santos', 'rafael.santos3@email.com', '11950555830', 'Av. ', 'Jardins', 'Fortaleza', 'CE'),
(7, 'Carlos Almeida', 'carlos.almeida4@email.com', '61913243223', 'Rua ', 'Copacabana', 'Fortaleza', 'CE'),
(8, 'João Ferreira', 'joão.ferreira5@email.com', '11993902783', 'Rua ', 'Jardins', 'Curitiba', 'PR'),
(9, 'Pedro Ribeiro', 'pedro.ribeiro6@email.com', '61992575384', 'Rua ', 'Jardins', 'Salvador', 'BA'),
(10, 'Ana Pereira', 'ana.pereira7@email.com', '71952566082', 'Rua ', 'Copacabana', 'São Paulo', 'SP'),
(11, 'Fernanda Santos', 'fernanda.santos8@email.com', '71901711079', 'Rua ', 'Santa Cecília', 'Porto Alegre', 'RS'),
(12, 'Pedro Pereira', 'pedro.pereira9@email.com', '11911446089', 'Av. ', 'Centro', 'Curitiba', 'PR'),
(13, 'Pedro Almeida', 'pedro.almeida10@email.com', '92900539459', 'Av. ', 'Savassi', 'Porto Alegre', 'RS'),
(14, 'Ana Almeida', 'ana.almeida11@email.com', '71915219987', 'Rua ', 'Pinheiros', 'Porto Alegre', 'RS'),
(15, 'João Souza', 'joão.souza12@email.com', '81982821625', 'Rua ', 'Savassi', 'São Paulo', 'SP'),
(16, 'Lucas Ribeiro', 'lucas.ribeiro13@email.com', '92978948888', 'Rua ', 'Copacabana', 'Salvador', 'BA'),
(17, 'Rafael Ferreira', 'rafael.ferreira14@email.com', '71977254991', 'Av. ', 'Pinheiros', 'Porto Alegre', 'RS'),
(18, 'Carlos Gomes', 'carlos.gomes15@email.com', '51955314679', 'Rua ', 'Copacabana', 'Recife', 'PE'),
(19, 'Ana Almeida', 'ana.almeida16@email.com', '41904053814', 'Rua ', 'Jardins', 'Rio de Janeiro', 'RJ'),
(20, 'Pedro Gomes', 'pedro.gomes17@email.com', '31924781700', 'Av. ', 'Icaraí', 'Fortaleza', 'CE'),
(21, 'Lucas Gomes', 'lucas.gomes18@email.com', '41954219585', 'Rua ', 'Jardins', 'Curitiba', 'PR'),
(22, 'Juliana Martins', 'juliana.martins19@email.com', '11923644464', 'Rua ', 'Icaraí', 'Manaus', 'AM'),
(23, 'Carlos Oliveira', 'carlos.oliveira20@email.com', '21991591247', 'Av. ', 'Copacabana', 'Rio de Janeiro', 'RJ'),
(24, 'Beatriz Ferreira', 'beatriz.ferreira21@email.com', '85928547053', 'Av. ', 'Copacabana', 'Fortaleza', 'CE'),
(25, 'Carlos Santos', 'carlos.santos22@email.com', '85976584956', 'Av. ', 'Trindade', 'Fortaleza', 'CE'),
(26, 'Beatriz Gomes', 'beatriz.gomes23@email.com', '41993649257', 'Rua ', 'Copacabana', 'Curitiba', 'PR'),
(27, 'Rafael Ferreira', 'rafael.ferreira24@email.com', '21971639586', 'Av. ', 'Moema', 'Rio de Janeiro', 'RJ'),
(28, 'Fernanda Pereira', 'fernanda.pereira25@email.com', '92923277635', 'Av. ', 'Pinheiros', 'Porto Alegre', 'RS'),
(29, 'Pedro Ferreira', 'pedro.ferreira26@email.com', '11936461224', 'Rua ', 'Jardins', 'Curitiba', 'PR'),
(30, 'Juliana Oliveira', 'juliana.oliveira27@email.com', '41907554036', 'Av. ', 'Boa Viagem', 'Porto Alegre', 'RS'),
(31, 'Pedro Costa', 'pedro.costa28@email.com', '81912616293', 'Av. ', 'Icaraí', 'Rio de Janeiro', 'RJ'),
(32, 'Ana Santos', 'ana.santos29@email.com', '61909612259', 'Av. ', 'Savassi', 'Recife', 'PE'),
(33, 'Fernanda Santos', 'fernanda.santos30@email.com', '85989105691', 'Av. ', 'Boa Viagem', 'Porto Alegre', 'RS'),
(34, 'Carlos Almeida', 'carlos.almeida31@email.com', '51923628146', 'Rua ', 'Moema', 'Salvador', 'BA'),
(35, 'Mariana Gomes', 'mariana.gomes32@email.com', '31905077835', 'Rua ', 'Jardins', 'Fortaleza', 'CE'),
(36, 'Ana Ribeiro', 'ana.ribeiro33@email.com', '85986617912', 'Av. ', 'Icaraí', 'Recife', 'PE'),
(37, 'Beatriz Ribeiro', 'beatriz.ribeiro34@email.com', '61977548849', 'Av. ', 'Moema', 'São Paulo', 'SP'),
(38, 'Juliana Ribeiro', 'juliana.ribeiro35@email.com', '71928595024', 'Av. ', 'Moema', 'Belo Horizonte', 'MG'),
(39, 'Fernanda Souza', 'fernanda.souza36@email.com', '85997159241', 'Av. ', 'Copacabana', 'Fortaleza', 'CE'),
(40, 'Beatriz Martins', 'beatriz.martins37@email.com', '51992958439', 'Rua ', 'Moema', 'São Paulo', 'SP'),
(41, 'Fernanda Oliveira', 'fernanda.oliveira38@email.com', '85993041792', 'Av. ', 'Jardins', 'Rio de Janeiro', 'RJ'),
(42, 'Rafael Oliveira', 'rafael.oliveira39@email.com', '71913495988', 'Rua ', 'Pinheiros', 'São Paulo', 'SP'),
(43, 'Lucas Souza', 'lucas.souza40@email.com', '21978971276', 'Av. ', 'Icaraí', 'Salvador', 'BA'),
(44, 'Pedro Ferreira', 'pedro.ferreira41@email.com', '71997250674', 'Rua ', 'Icaraí', 'Porto Alegre', 'RS'),
(45, 'João Gomes', 'joão.gomes42@email.com', '41998763727', 'Rua ', 'Jardins', 'Porto Alegre', 'RS'),
(46, 'João Ferreira', 'joão.ferreira43@email.com', '71911264013', 'Rua ', 'Santa Cecília', 'Manaus', 'AM'),
(47, 'Fernanda Gomes', 'fernanda.gomes44@email.com', '21906104742', 'Rua ', 'Pinheiros', 'Manaus', 'AM'),
(48, 'Rafael Gomes', 'rafael.gomes45@email.com', '71934582494', 'Rua ', 'Icaraí', 'Fortaleza', 'CE'),
(49, 'Ana Costa', 'ana.costa46@email.com', '21994864936', 'Rua ', 'Jardins', 'São Paulo', 'SP'),
(50, 'Carlos Ferreira', 'carlos.ferreira47@email.com', '41930845133', 'Av. ', 'Centro', 'Porto Alegre', 'RS'),
(51, 'Ana Ribeiro', 'ana.ribeiro48@email.com', '11946726568', 'Rua ', 'Santa Cecília', 'Belo Horizonte', 'MG'),
(52, 'Beatriz Costa', 'beatriz.costa49@email.com', '41903380251', 'Av. ', 'Centro', 'Recife', 'PE'),
(53, 'João Gomes', 'joão.gomes50@email.com', '92912097619', 'Rua ', 'Santa Cecília', 'Manaus', 'AM'),
(54, 'Fernanda Pereira', 'fernanda.pereira51@email.com', '51980655553', 'Av. ', 'Moema', 'São Paulo', 'SP'),
(55, 'João Pereira', 'joão.pereira52@email.com', '51957844813', 'Av. ', 'Jardins', 'São Paulo', 'SP'),
(56, 'Pedro Costa', 'pedro.costa53@email.com', '51945987754', 'Av. ', 'Santa Cecília', 'Curitiba', 'PR'),
(57, 'João Ferreira', 'joão.ferreira54@email.com', '81985637016', 'Av. ', 'Pinheiros', 'Porto Alegre', 'RS'),
(58, 'Pedro Martins', 'pedro.martins55@email.com', '31997371107', 'Rua ', 'Icaraí', 'Fortaleza', 'CE'),
(59, 'Mariana Ribeiro', 'mariana.ribeiro56@email.com', '21984755726', 'Rua ', 'Moema', 'Salvador', 'BA'),
(60, 'Fernanda Ferreira', 'fernanda.ferreira57@email.com', '92913969664', 'Rua ', 'Jardins', 'Recife', 'PE'),
(61, 'Beatriz Almeida', 'beatriz.almeida58@email.com', '85972038725', 'Av. ', 'Boa Viagem', 'Curitiba', 'PR'),
(62, 'Ana Souza', 'ana.souza59@email.com', '31968345023', 'Rua ', 'Pinheiros', 'Curitiba', 'PR'),
(63, 'Fernanda Santos', 'fernanda.santos60@email.com', '92900943187', 'Av. ', 'Pinheiros', 'Fortaleza', 'CE'),
(64, 'Pedro Martins', 'pedro.martins61@email.com', '31908029109', 'Rua ', 'Boa Viagem', 'Manaus', 'AM'),
(65, 'Mariana Almeida', 'mariana.almeida62@email.com', '31932636800', 'Rua ', 'Pinheiros', 'Brasília', 'DF'),
(66, 'Ana Almeida', 'ana.almeida63@email.com', '41903234807', 'Rua ', 'Santa Cecília', 'Curitiba', 'PR'),
(67, 'Ana Almeida', 'ana.almeida64@email.com', '21986257821', 'Rua ', 'Copacabana', 'Manaus', 'AM'),
(68, 'Pedro Pereira', 'pedro.pereira65@email.com', '81930344259', 'Rua ', 'Santa Cecília', 'Curitiba', 'PR'),
(69, 'João Santos', 'joão.santos66@email.com', '85949518627', 'Av. ', 'Trindade', 'Fortaleza', 'CE'),
(70, 'Lucas Oliveira', 'lucas.oliveira67@email.com', '92912505118', 'Av. ', 'Moema', 'Rio de Janeiro', 'RJ'),
(71, 'Ana Martins', 'ana.martins68@email.com', '61967252859', 'Rua ', 'Icaraí', 'Salvador', 'BA'),
(72, 'Rafael Pereira', 'rafael.pereira69@email.com', '92928910161', 'Av. ', 'Boa Viagem', 'São Paulo', 'SP'),
(73, 'Rafael Costa', 'rafael.costa70@email.com', '11964465689', 'Av. ', 'Savassi', 'Porto Alegre', 'RS'),
(74, 'Rafael Ferreira', 'rafael.ferreira71@email.com', '31949424348', 'Rua ', 'Moema', 'Rio de Janeiro', 'RJ'),
(75, 'Lucas Ferreira', 'lucas.ferreira72@email.com', '21965965480', 'Rua ', 'Jardins', 'Salvador', 'BA'),
(76, 'Lucas Gomes', 'lucas.gomes73@email.com', '21992322833', 'Rua ', 'Copacabana', 'Fortaleza', 'CE'),
(77, 'Beatriz Santos', 'beatriz.santos74@email.com', '41924946149', 'Rua ', 'Moema', 'Fortaleza', 'CE'),
(78, 'Juliana Santos', 'juliana.santos75@email.com', '81996668304', 'Av. ', 'Santa Cecília', 'Manaus', 'AM'),
(79, 'Ana Santos', 'ana.santos76@email.com', '11963872178', 'Rua ', 'Centro', 'Porto Alegre', 'RS'),
(80, 'Beatriz Souza', 'beatriz.souza77@email.com', '71980047457', 'Rua ', 'Trindade', 'Manaus', 'AM'),
(81, 'Ana Ribeiro', 'ana.ribeiro78@email.com', '21973377055', 'Rua ', 'Savassi', 'Curitiba', 'PR'),
(82, 'Fernanda Pereira', 'fernanda.pereira79@email.com', '51925927154', 'Av. ', 'Icaraí', 'Manaus', 'AM'),
(83, 'Rafael Gomes', 'rafael.gomes80@email.com', '61966323118', 'Rua ', 'Savassi', 'Salvador', 'BA'),
(84, 'Juliana Costa', 'juliana.costa81@email.com', '31995695309', 'Rua ', 'Boa Viagem', 'Manaus', 'AM'),
(85, 'Rafael Almeida', 'rafael.almeida82@email.com', '51971915766', 'Av. ', 'Boa Viagem', 'Salvador', 'BA'),
(86, 'João Pereira', 'joão.pereira83@email.com', '21981168815', 'Rua ', 'Jardins', 'Rio de Janeiro', 'RJ'),
(87, 'João Gomes', 'joão.gomes84@email.com', '51949173400', 'Av. ', 'Pinheiros', 'Manaus', 'AM'),
(88, 'Pedro Costa', 'pedro.costa85@email.com', '71995433429', 'Rua ', 'Jardins', 'Brasília', 'DF'),
(89, 'Rafael Ribeiro', 'rafael.ribeiro86@email.com', '71975525036', 'Rua ', 'Icaraí', 'Fortaleza', 'CE'),
(90, 'Fernanda Ferreira', 'fernanda.ferreira87@email.com', '81945155439', 'Rua ', 'Moema', 'Manaus', 'AM'),
(91, 'Rafael Costa', 'rafael.costa88@email.com', '21913089102', 'Rua ', 'Pinheiros', 'Rio de Janeiro', 'RJ'),
(92, 'Rafael Almeida', 'rafael.almeida89@email.com', '81985554594', 'Rua ', 'Pinheiros', 'Rio de Janeiro', 'RJ'),
(93, 'Juliana Oliveira', 'juliana.oliveira90@email.com', '21934855140', 'Rua ', 'Jardins', 'Rio de Janeiro', 'RJ'),
(94, 'Beatriz Oliveira', 'beatriz.oliveira91@email.com', '11976230220', 'Av. ', 'Savassi', 'Brasília', 'DF'),
(95, 'Carlos Souza', 'carlos.souza92@email.com', '71969551577', 'Av. ', 'Moema', 'Recife', 'PE'),
(96, 'Fernanda Pereira', 'fernanda.pereira93@email.com', '92995575236', 'Rua ', 'Icaraí', 'Belo Horizonte', 'MG'),
(97, 'Mariana Pereira', 'mariana.pereira94@email.com', '31939122390', 'Av. ', 'Savassi', 'Salvador', 'BA'),
(98, 'Carlos Ribeiro', 'carlos.ribeiro95@email.com', '41937638752', 'Rua ', 'Icaraí', 'Fortaleza', 'CE'),
(99, 'João Ribeiro', 'joão.ribeiro96@email.com', '41931863309', 'Rua ', 'Boa Viagem', 'Fortaleza', 'CE'),
(100, 'Ana Gomes', 'ana.gomes97@email.com', '81948444484', 'Rua ', 'Jardins', 'Rio de Janeiro', 'RJ'),
(101, 'Juliana Oliveira', 'juliana.oliveira98@email.com', '51909879433', 'Rua ', 'Jardins', 'Recife', 'PE'),
(102, 'Mariana Ribeiro', 'mariana.ribeiro99@email.com', '51919071037', 'Rua ', 'Trindade', 'Fortaleza', 'CE'),
(103, 'Beatriz Ferreira', 'beatriz.ferreira100@email.com', '41995409363', 'Av. ', 'Savassi', 'Curitiba', 'PR'),
(104, 'Mariana Almeida', 'mariana.almeida101@email.com', '92931101221', 'Rua ', 'Copacabana', 'Brasília', 'DF'),
(105, 'Ana Costa', 'ana.costa102@email.com', '81960615238', 'Rua ', 'Santa Cecília', 'Curitiba', 'PR'),
(106, 'Rafael Ferreira', 'rafael.ferreira103@email.com', '81985654751', 'Rua ', 'Boa Viagem', 'Fortaleza', 'CE'),
(107, 'Rafael Costa', 'rafael.costa104@email.com', '92938629512', 'Rua ', 'Jardins', 'Rio de Janeiro', 'RJ'),
(108, 'Mariana Pereira', 'mariana.pereira105@email.com', '71984556701', 'Av. ', 'Jardins', 'São Paulo', 'SP'),
(109, 'Lucas Ribeiro', 'lucas.ribeiro106@email.com', '11951147765', 'Rua ', 'Icaraí', 'Fortaleza', 'CE'),
(110, 'Juliana Almeida', 'juliana.almeida107@email.com', '51978833441', 'Rua ', 'Jardins', 'Rio de Janeiro', 'RJ'),
(111, 'Juliana Souza', 'juliana.souza108@email.com', '31942732923', 'Av. ', 'Copacabana', 'Porto Alegre', 'RS'),
(112, 'Beatriz Costa', 'beatriz.costa109@email.com', '51963916766', 'Rua ', 'Pinheiros', 'Brasília', 'DF'),
(113, 'Rafael Pereira', 'rafael.pereira110@email.com', '21925113251', 'Rua ', 'Copacabana', 'Rio de Janeiro', 'RJ'),
(114, 'João Souza', 'joão.souza111@email.com', '31954404968', 'Rua ', 'Boa Viagem', 'São Paulo', 'SP'),
(115, 'Ana Ferreira', 'ana.ferreira112@email.com', '21927490291', 'Av. ', 'Icaraí', 'São Paulo', 'SP'),
(116, 'Fernanda Oliveira', 'fernanda.oliveira113@email.com', '61914076290', 'Rua ', 'Copacabana', 'Manaus', 'AM'),
(117, 'Beatriz Almeida', 'beatriz.almeida114@email.com', '85949105154', 'Av. ', 'Moema', 'Salvador', 'BA'),
(118, 'Fernanda Costa', 'fernanda.costa115@email.com', '21963872906', 'Rua ', 'Icaraí', 'Porto Alegre', 'RS'),
(119, 'Carlos Almeida', 'carlos.almeida116@email.com', '71939685935', 'Rua ', 'Jardins', 'Recife', 'PE'),
(120, 'Ana Gomes', 'ana.gomes117@email.com', '61963712693', 'Rua ', 'Centro', 'Fortaleza', 'CE'),
(121, 'João Martins', 'joão.martins118@email.com', '51944347593', 'Rua ', 'Trindade', 'Fortaleza', 'CE'),
(122, 'João Ribeiro', 'joão.ribeiro119@email.com', '61985873015', 'Rua ', 'Moema', 'Recife', 'PE'),
(123, 'Carlos Ferreira', 'carlos.ferreira120@email.com', '71990952457', 'Rua ', 'Trindade', 'Rio de Janeiro', 'RJ'),
(124, 'Carlos Oliveira', 'carlos.oliveira121@email.com', '51919964675', 'Av. ', 'Trindade', 'Fortaleza', 'CE'),
(125, 'Fernanda Ribeiro', 'fernanda.ribeiro122@email.com', '85948560243', 'Av. ', 'Boa Viagem', 'Recife', 'PE'),
(126, 'Beatriz Ferreira', 'beatriz.ferreira123@email.com', '71944082354', 'Av. ', 'Icaraí', 'Salvador', 'BA'),
(127, 'Fernanda Souza', 'fernanda.souza124@email.com', '61963732276', 'Av. ', 'Icaraí', 'São Paulo', 'SP'),
(128, 'Rafael Almeida', 'rafael.almeida125@email.com', '51939741293', 'Rua ', 'Jardins', 'São Paulo', 'SP'),
(129, 'Rafael Ribeiro', 'rafael.ribeiro126@email.com', '41908945089', 'Rua ', 'Trindade', 'Curitiba', 'PR'),
(130, 'Pedro Ribeiro', 'pedro.ribeiro127@email.com', '31978991011', 'Av. ', 'Santa Cecília', 'Recife', 'PE'),
(131, 'Lucas Oliveira', 'lucas.oliveira128@email.com', '61939513408', 'Rua ', 'Boa Viagem', 'Recife', 'PE'),
(132, 'Carlos Martins', 'carlos.martins129@email.com', '61985179216', 'Rua ', 'Moema', 'Curitiba', 'PR'),
(133, 'João Oliveira', 'joão.oliveira130@email.com', '92901313011', 'Rua ', 'Boa Viagem', 'Rio de Janeiro', 'RJ'),
(134, 'Carlos Oliveira', 'carlos.oliveira131@email.com', '61954190966', 'Rua ', 'Boa Viagem', 'Belo Horizonte', 'MG'),
(135, 'Mariana Souza', 'mariana.souza132@email.com', '81991211224', 'Rua ', 'Copacabana', 'Curitiba', 'PR'),
(136, 'Carlos Ferreira', 'carlos.ferreira133@email.com', '21977349912', 'Rua ', 'Icaraí', 'Curitiba', 'PR'),
(137, 'Juliana Almeida', 'juliana.almeida134@email.com', '31911310924', 'Rua ', 'Savassi', 'Recife', 'PE'),
(138, 'Mariana Gomes', 'mariana.gomes135@email.com', '92987667730', 'Rua ', 'Centro', 'Porto Alegre', 'RS'),
(139, 'Beatriz Gomes', 'beatriz.gomes136@email.com', '51992088766', 'Rua ', 'Moema', 'Manaus', 'AM'),
(140, 'Juliana Martins', 'juliana.martins137@email.com', '41937980081', 'Rua ', 'Copacabana', 'Manaus', 'AM'),
(141, 'João Martins', 'joão.martins138@email.com', '51955479346', 'Rua ', 'Icaraí', 'Curitiba', 'PR'),
(142, 'Ana Ferreira', 'ana.ferreira139@email.com', '31970403829', 'Rua ', 'Savassi', 'Recife', 'PE'),
(143, 'Rafael Martins', 'rafael.martins140@email.com', '92914125086', 'Av. ', 'Boa Viagem', 'São Paulo', 'SP'),
(144, 'João Gomes', 'joão.gomes141@email.com', '21985403397', 'Av. ', 'Savassi', 'Rio de Janeiro', 'RJ'),
(145, 'Juliana Almeida', 'juliana.almeida142@email.com', '81951083379', 'Rua ', 'Savassi', 'Fortaleza', 'CE'),
(146, 'Pedro Santos', 'pedro.santos143@email.com', '31987760672', 'Av. ', 'Santa Cecília', 'Salvador', 'BA'),
(147, 'Juliana Pereira', 'juliana.pereira144@email.com', '51916682777', 'Rua ', 'Moema', 'Belo Horizonte', 'MG'),
(148, 'Rafael Almeida', 'rafael.almeida145@email.com', '85947737195', 'Av. ', 'Jardins', 'Manaus', 'AM'),
(149, 'Carlos Costa', 'carlos.costa146@email.com', '61974391841', 'Av. ', 'Centro', 'Belo Horizonte', 'MG'),
(150, 'Fernanda Martins', 'fernanda.martins147@email.com', '92923919588', 'Rua ', 'Copacabana', 'Brasília', 'DF'),
(151, 'Lucas Oliveira', 'lucas.oliveira148@email.com', '21998782880', 'Rua ', 'Centro', 'São Paulo', 'SP'),
(152, 'Ana Ferreira', 'ana.ferreira149@email.com', '92977623778', 'Rua ', 'Pinheiros', 'Manaus', 'AM'),
(153, 'Fernanda Santos', 'fernanda.santos150@email.com', '51932353984', 'Rua ', 'Savassi', 'Brasília', 'DF');

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
(2, 6, '2006-05-04', 1200.00, 'Teste'),
(5, 7, '2025-05-10', 10.00, 'as dydafbsad'),
(6, 11, '2015-02-05', 20.00, 'ywegfywef'),
(7, 7, '2024-10-17', 174.54, 'Valor pago referente a gasolina utilizado no período de October/2024'),
(8, 9, '2025-10-26', 1816.51, 'Valor pago referente a hotel utilizado no período de October/2025'),
(9, 11, '2025-03-19', 1030.48, 'Despesa programada de escola paga em March/2025'),
(10, 11, '2024-03-11', 1781.87, 'Valor pago referente a escola utilizado no período de March/2024'),
(11, 11, '2024-07-18', 1930.49, 'Valor pago referente a escola utilizado no período de July/2024'),
(12, 13, '2024-07-09', 772.07, 'Pagamento mensal referente ao mês de July de 2024'),
(13, 12, '2025-12-15', 516.82, 'Despesa programada de luz paga em December/2025'),
(14, 15, '2024-05-14', 1401.59, 'Conta de dever o joão martins emitida no mês de May/2024'),
(15, 13, '2024-03-24', 482.00, 'Despesa extra registrada em March/2024 devido a inss'),
(16, 12, '2024-01-14', 862.12, 'Conta de luz emitida no mês de January/2024'),
(17, 10, '2024-07-04', 367.69, 'Despesa extra registrada em July/2024 devido a telefone'),
(18, 15, '2025-11-15', 682.98, 'Valor pago referente a dever o joão martins utilizado no período de November/2025'),
(19, 14, '2025-05-06', 3368.54, 'Conta de cartão emitida no mês de May/2025'),
(20, 10, '2024-11-19', 230.08, 'Conta de telefone emitida no mês de November/2024'),
(21, 12, '2024-06-29', 562.12, 'Quitação da fatura de luz no mês de June/2024'),
(22, 15, '2025-04-07', 886.67, 'Pagamento mensal referente ao mês de April de 2025'),
(23, 12, '2024-02-09', 497.15, 'Valor pago referente a luz utilizado no período de February/2024'),
(24, 9, '2024-01-20', 695.38, 'Pagamento parcelado de hotel, parcela referente a January/2024'),
(25, 7, '2025-02-19', 358.33, 'Reembolso de gasolina ocorrido em February/2025'),
(26, 15, '2025-06-18', 872.13, 'Valor pago referente a dever o joão martins utilizado no período de June/2025'),
(27, 13, '2024-11-22', 480.05, 'Valor pago referente a inss utilizado no período de November/2024'),
(28, 11, '2025-12-17', 921.50, 'Quitação da fatura de escola no mês de December/2025'),
(29, 12, '2025-06-04', 940.43, 'Gasto corporativo com luz realizado em June/2025'),
(30, 13, '2025-01-22', 840.67, 'Valor pago referente a inss utilizado no período de January/2025'),
(31, 7, '2025-08-23', 243.74, 'Pagamento parcelado de gasolina, parcela referente a August/2025'),
(32, 10, '2025-07-10', 157.57, 'Conta de telefone emitida no mês de July/2025'),
(33, 9, '2024-04-12', 1344.55, 'Gasto corporativo com hotel realizado em April/2024'),
(34, 12, '2025-09-04', 658.33, 'Conta de luz emitida no mês de September/2025'),
(35, 10, '2024-07-29', 172.23, 'Conta de telefone emitida no mês de July/2024'),
(36, 13, '2025-10-08', 691.47, 'Despesa extra registrada em October/2025 devido a inss'),
(37, 15, '2025-09-23', 1625.60, 'Gasto corporativo com dever o joão martins realizado em September/2025'),
(38, 14, '2025-05-02', 2141.63, 'Valor pago referente a cartão utilizado no período de May/2025'),
(39, 13, '2024-05-24', 124.92, 'Valor pago referente a inss utilizado no período de May/2024'),
(40, 7, '2025-12-27', 183.45, 'Pagamento parcelado de gasolina, parcela referente a December/2025'),
(41, 8, '2024-07-01', 1395.43, 'Pagamento mensal referente ao mês de July de 2024'),
(42, 7, '2025-07-02', 191.01, 'Despesa programada de gasolina paga em July/2025'),
(43, 14, '2024-07-19', 2248.45, 'Reembolso de cartão ocorrido em July/2024'),
(44, 14, '2025-04-05', 1759.95, 'Conta de cartão emitida no mês de April/2025'),
(45, 7, '2024-10-02', 222.00, 'Pagamento parcelado de gasolina, parcela referente a October/2024'),
(46, 11, '2024-09-28', 1446.89, 'Quitação da fatura de escola no mês de September/2024'),
(47, 7, '2024-07-16', 194.25, 'Reembolso de gasolina ocorrido em July/2024'),
(48, 10, '2024-05-24', 348.73, 'Quitação da fatura de telefone no mês de May/2024'),
(49, 9, '2024-07-31', 1567.76, 'Valor pago referente a hotel utilizado no período de July/2024'),
(50, 7, '2025-09-24', 175.52, 'Quitação da fatura de gasolina no mês de September/2025'),
(51, 8, '2024-04-04', 602.00, 'Reembolso de manutenção veículo ocorrido em April/2024'),
(52, 11, '2025-05-29', 1006.64, 'Pagamento mensal referente ao mês de May de 2025'),
(53, 15, '2024-06-19', 1836.58, 'Reembolso de dever o joão martins ocorrido em June/2024'),
(54, 10, '2025-11-26', 331.41, 'Quitação da fatura de telefone no mês de November/2025'),
(55, 7, '2024-10-27', 89.28, 'Despesa extra registrada em October/2024 devido a gasolina'),
(56, 10, '2025-05-05', 223.13, 'Conta de telefone emitida no mês de May/2025'),
(57, 15, '2025-05-12', 1087.89, 'Valor pago referente a dever o joão martins utilizado no período de May/2025'),
(58, 9, '2024-07-29', 495.48, 'Reembolso de hotel ocorrido em July/2024'),
(59, 11, '2025-10-30', 1235.06, 'Valor pago referente a escola utilizado no período de October/2025'),
(60, 15, '2024-09-19', 1166.46, 'Pagamento parcelado de dever o joão martins, parcela referente a September/2024'),
(61, 11, '2025-01-02', 832.10, 'Conta de escola emitida no mês de January/2025'),
(62, 13, '2024-11-30', 1074.30, 'Reembolso de inss ocorrido em November/2024'),
(63, 12, '2024-06-04', 278.39, 'Gasto corporativo com luz realizado em June/2024'),
(64, 13, '2024-03-25', 223.72, 'Valor pago referente a inss utilizado no período de March/2024'),
(65, 15, '2025-03-31', 1717.68, 'Gasto corporativo com dever o joão martins realizado em March/2025'),
(66, 12, '2025-02-08', 850.95, 'Conta de luz emitida no mês de February/2025'),
(67, 7, '2024-11-19', 154.73, 'Quitação da fatura de gasolina no mês de November/2024'),
(68, 8, '2025-12-29', 835.03, 'Gasto corporativo com manutenção veículo realizado em December/2025'),
(69, 14, '2025-05-01', 538.70, 'Pagamento mensal referente ao mês de May de 2025'),
(70, 8, '2025-07-07', 2737.30, 'Conta de manutenção veículo emitida no mês de July/2025'),
(71, 14, '2025-10-08', 4892.98, 'Reembolso de cartão ocorrido em October/2025'),
(72, 9, '2024-12-11', 844.42, 'Pagamento parcelado de hotel, parcela referente a December/2024'),
(73, 11, '2024-03-26', 1565.84, 'Reembolso de escola ocorrido em March/2024'),
(74, 12, '2024-07-25', 720.47, 'Reembolso de luz ocorrido em July/2024'),
(75, 8, '2024-01-01', 305.40, 'Conta de manutenção veículo emitida no mês de January/2024'),
(76, 11, '2024-07-06', 1889.56, 'Reembolso de escola ocorrido em July/2024'),
(77, 7, '2025-09-01', 174.86, 'Conta de gasolina emitida no mês de September/2025'),
(78, 12, '2024-08-19', 379.92, 'Gasto corporativo com luz realizado em August/2024'),
(79, 15, '2024-09-13', 847.75, 'Reembolso de dever o joão martins ocorrido em September/2024'),
(80, 8, '2025-10-24', 1474.10, 'Quitação da fatura de manutenção veículo no mês de October/2025'),
(81, 11, '2024-07-05', 1253.71, 'Despesa extra registrada em July/2024 devido a escola'),
(82, 12, '2024-11-28', 870.06, 'Pagamento parcelado de luz, parcela referente a November/2024'),
(83, 8, '2024-08-01', 2695.53, 'Despesa programada de manutenção veículo paga em August/2024'),
(84, 14, '2025-02-20', 2445.38, 'Despesa programada de cartão paga em February/2025'),
(85, 15, '2025-04-21', 809.39, 'Gasto corporativo com dever o joão martins realizado em April/2025'),
(86, 14, '2024-05-10', 2431.92, 'Conta de cartão emitida no mês de May/2024'),
(87, 10, '2024-02-19', 379.78, 'Gasto corporativo com telefone realizado em February/2024'),
(88, 14, '2025-12-24', 921.72, 'Conta de cartão emitida no mês de December/2025'),
(89, 9, '2024-10-18', 365.76, 'Pagamento mensal referente ao mês de October de 2024'),
(90, 9, '2024-12-16', 1855.39, 'Pagamento mensal referente ao mês de December de 2024'),
(91, 7, '2025-08-18', 93.67, 'Gasto corporativo com gasolina realizado em August/2025'),
(92, 9, '2025-11-02', 1941.34, 'Gasto corporativo com hotel realizado em November/2025'),
(93, 14, '2024-04-14', 1898.42, 'Pagamento mensal referente ao mês de April de 2024'),
(94, 11, '2024-12-28', 1768.96, 'Reembolso de escola ocorrido em December/2024'),
(95, 10, '2025-12-14', 395.75, 'Conta de telefone emitida no mês de December/2025'),
(96, 11, '2024-02-23', 1726.22, 'Conta de escola emitida no mês de February/2024'),
(97, 7, '2025-03-11', 381.99, 'Reembolso de gasolina ocorrido em March/2025'),
(98, 14, '2024-02-19', 2424.96, 'Pagamento parcelado de cartão, parcela referente a February/2024'),
(99, 11, '2025-03-22', 1696.16, 'Pagamento mensal referente ao mês de March de 2025'),
(100, 15, '2025-05-28', 438.80, 'Despesa programada de dever o joão martins paga em May/2025'),
(101, 8, '2025-02-09', 1219.13, 'Gasto corporativo com manutenção veículo realizado em February/2025'),
(102, 15, '2024-09-19', 1441.57, 'Pagamento mensal referente ao mês de September de 2024'),
(103, 13, '2025-12-12', 209.23, 'Pagamento parcelado de inss, parcela referente a December/2025'),
(104, 10, '2024-05-06', 223.58, 'Quitação da fatura de telefone no mês de May/2024'),
(105, 13, '2024-05-11', 682.58, 'Pagamento parcelado de inss, parcela referente a May/2024'),
(106, 14, '2025-10-17', 4781.47, 'Gasto corporativo com cartão realizado em October/2025'),
(107, 15, '2025-01-06', 797.46, 'Pagamento parcelado de dever o joão martins, parcela referente a January/2025'),
(108, 14, '2025-08-11', 4089.97, 'Despesa extra registrada em August/2025 devido a cartão'),
(109, 12, '2024-02-12', 262.92, 'Reembolso de luz ocorrido em February/2024'),
(110, 10, '2024-10-04', 269.57, 'Pagamento parcelado de telefone, parcela referente a October/2024'),
(111, 12, '2025-09-15', 268.87, 'Valor pago referente a luz utilizado no período de September/2025'),
(112, 12, '2024-07-13', 218.40, 'Reembolso de luz ocorrido em July/2024'),
(113, 13, '2024-02-27', 761.42, 'Pagamento parcelado de inss, parcela referente a February/2024'),
(114, 15, '2024-03-21', 1340.68, 'Pagamento parcelado de dever o joão martins, parcela referente a March/2024'),
(115, 15, '2025-08-01', 1386.59, 'Pagamento parcelado de dever o joão martins, parcela referente a August/2025'),
(116, 7, '2024-10-13', 163.83, 'Gasto corporativo com gasolina realizado em October/2024'),
(117, 9, '2025-04-03', 1448.42, 'Reembolso de hotel ocorrido em April/2025'),
(118, 9, '2025-06-26', 934.75, 'Valor pago referente a hotel utilizado no período de June/2025'),
(119, 11, '2025-12-16', 1179.02, 'Gasto corporativo com escola realizado em December/2025'),
(120, 9, '2025-02-05', 1511.51, 'Valor pago referente a hotel utilizado no período de February/2025'),
(121, 15, '2025-08-17', 388.59, 'Despesa extra registrada em August/2025 devido a dever o joão martins'),
(122, 10, '2024-02-08', 286.31, 'Quitação da fatura de telefone no mês de February/2024'),
(123, 10, '2024-02-23', 89.49, 'Pagamento parcelado de telefone, parcela referente a February/2024'),
(124, 14, '2024-03-23', 1448.89, 'Gasto corporativo com cartão realizado em March/2024'),
(125, 13, '2024-05-03', 449.02, 'Reembolso de inss ocorrido em May/2024'),
(126, 15, '2024-08-13', 444.79, 'Reembolso de dever o joão martins ocorrido em August/2024'),
(127, 10, '2024-06-26', 324.47, 'Valor pago referente a telefone utilizado no período de June/2024'),
(128, 14, '2024-01-02', 682.81, 'Gasto corporativo com cartão realizado em January/2024'),
(129, 9, '2024-07-09', 313.22, 'Quitação da fatura de hotel no mês de July/2024'),
(130, 7, '2024-11-20', 79.66, 'Pagamento mensal referente ao mês de November de 2024'),
(131, 12, '2025-10-11', 532.31, 'Reembolso de luz ocorrido em October/2025'),
(132, 13, '2024-08-01', 1070.79, 'Gasto corporativo com inss realizado em August/2024'),
(133, 15, '2024-05-14', 1236.14, 'Despesa programada de dever o joão martins paga em May/2024'),
(134, 11, '2025-06-04', 1468.32, 'Despesa extra registrada em June/2025 devido a escola'),
(135, 8, '2025-05-02', 877.13, 'Pagamento parcelado de manutenção veículo, parcela referente a May/2025'),
(136, 14, '2025-09-30', 2029.29, 'Despesa extra registrada em September/2025 devido a cartão'),
(137, 15, '2025-05-31', 1299.20, 'Quitação da fatura de dever o joão martins no mês de May/2025'),
(138, 11, '2025-08-09', 1144.21, 'Despesa programada de escola paga em August/2025'),
(139, 11, '2025-10-26', 1233.20, 'Quitação da fatura de escola no mês de October/2025'),
(140, 9, '2025-03-22', 912.19, 'Valor pago referente a hotel utilizado no período de March/2025'),
(141, 13, '2024-01-31', 178.33, 'Pagamento parcelado de inss, parcela referente a January/2024'),
(142, 8, '2024-05-20', 1048.67, 'Pagamento mensal referente ao mês de May de 2024'),
(143, 15, '2025-02-28', 1101.33, 'Valor pago referente a dever o joão martins utilizado no período de February/2025'),
(144, 14, '2025-12-11', 538.56, 'Reembolso de cartão ocorrido em December/2025'),
(145, 10, '2024-10-05', 105.66, 'Reembolso de telefone ocorrido em October/2024'),
(146, 10, '2025-11-07', 113.27, 'Conta de telefone emitida no mês de November/2025'),
(147, 7, '2025-03-02', 120.42, 'Despesa programada de gasolina paga em March/2025'),
(148, 8, '2024-08-12', 2769.21, 'Despesa programada de manutenção veículo paga em August/2024'),
(149, 14, '2024-07-17', 3934.42, 'Quitação da fatura de cartão no mês de July/2024'),
(150, 7, '2025-02-22', 333.77, 'Valor pago referente a gasolina utilizado no período de February/2025'),
(151, 9, '2024-04-15', 1403.02, 'Reembolso de hotel ocorrido em April/2024'),
(152, 9, '2024-11-20', 1036.65, 'Pagamento mensal referente ao mês de November de 2024'),
(153, 13, '2024-03-26', 218.97, 'Reembolso de inss ocorrido em March/2024'),
(154, 15, '2025-01-28', 697.07, 'Conta de dever o joão martins emitida no mês de January/2025'),
(155, 8, '2024-06-22', 677.77, 'Reembolso de manutenção veículo ocorrido em June/2024'),
(156, 9, '2025-06-27', 1589.09, 'Despesa extra registrada em June/2025 devido a hotel'),
(157, 13, '2024-01-11', 335.23, 'Gasto corporativo com inss realizado em January/2024'),
(158, 8, '2025-08-27', 311.13, 'Conta de manutenção veículo emitida no mês de August/2025'),
(159, 7, '2025-08-14', 206.93, 'Valor pago referente a gasolina utilizado no período de August/2025'),
(160, 10, '2024-05-02', 146.17, 'Gasto corporativo com telefone realizado em May/2024'),
(161, 14, '2024-09-09', 2469.51, 'Pagamento mensal referente ao mês de September de 2024'),
(162, 13, '2025-10-24', 116.57, 'Valor pago referente a inss utilizado no período de October/2025'),
(163, 12, '2024-10-12', 943.57, 'Valor pago referente a luz utilizado no período de October/2024'),
(164, 11, '2025-08-19', 1133.58, 'Reembolso de escola ocorrido em August/2025'),
(165, 15, '2025-04-25', 937.80, 'Valor pago referente a dever o joão martins utilizado no período de April/2025'),
(166, 9, '2024-12-15', 1308.50, 'Pagamento parcelado de hotel, parcela referente a December/2024'),
(167, 11, '2025-04-02', 1602.52, 'Pagamento parcelado de escola, parcela referente a April/2025'),
(168, 15, '2025-05-29', 1896.90, 'Despesa extra registrada em May/2025 devido a dever o joão martins'),
(169, 15, '2025-10-11', 234.03, 'Quitação da fatura de dever o joão martins no mês de October/2025'),
(170, 8, '2024-06-27', 1774.31, 'Pagamento parcelado de manutenção veículo, parcela referente a June/2024'),
(171, 12, '2025-03-04', 493.46, 'Conta de luz emitida no mês de March/2025'),
(172, 8, '2024-04-14', 1498.65, 'Despesa programada de manutenção veículo paga em April/2024'),
(173, 10, '2024-07-30', 362.72, 'Despesa programada de telefone paga em July/2024'),
(174, 7, '2024-08-02', 319.57, 'Pagamento mensal referente ao mês de August de 2024'),
(175, 13, '2024-07-01', 1165.32, 'Pagamento mensal referente ao mês de July de 2024'),
(176, 7, '2025-08-05', 120.39, 'Valor pago referente a gasolina utilizado no período de August/2025'),
(177, 12, '2024-11-13', 530.13, 'Conta de luz emitida no mês de November/2024'),
(178, 9, '2024-06-29', 1576.40, 'Pagamento parcelado de hotel, parcela referente a June/2024'),
(179, 14, '2024-03-25', 3796.39, 'Reembolso de cartão ocorrido em March/2024'),
(180, 11, '2025-11-22', 1972.85, 'Despesa programada de escola paga em November/2025'),
(181, 13, '2025-06-18', 1120.22, 'Reembolso de inss ocorrido em June/2025'),
(182, 8, '2024-11-08', 340.69, 'Reembolso de manutenção veículo ocorrido em November/2024'),
(183, 12, '2025-07-24', 374.87, 'Pagamento parcelado de luz, parcela referente a July/2025'),
(184, 7, '2024-11-27', 69.10, 'Conta de gasolina emitida no mês de November/2024'),
(185, 8, '2024-03-25', 338.42, 'Quitação da fatura de manutenção veículo no mês de March/2024'),
(186, 12, '2025-11-13', 651.85, 'Quitação da fatura de luz no mês de November/2025'),
(187, 7, '2025-01-20', 61.52, 'Despesa programada de gasolina paga em January/2025'),
(188, 7, '2024-06-30', 235.17, 'Gasto corporativo com gasolina realizado em June/2024'),
(189, 14, '2025-10-19', 4613.37, 'Conta de cartão emitida no mês de October/2025'),
(190, 9, '2024-01-02', 705.51, 'Despesa programada de hotel paga em January/2024'),
(191, 12, '2025-08-09', 264.64, 'Pagamento parcelado de luz, parcela referente a August/2025'),
(192, 8, '2024-05-09', 1862.22, 'Reembolso de manutenção veículo ocorrido em May/2024'),
(193, 13, '2024-05-02', 595.74, 'Valor pago referente a inss utilizado no período de May/2024'),
(194, 11, '2025-07-20', 1717.58, 'Reembolso de escola ocorrido em July/2025'),
(195, 12, '2024-08-27', 198.80, 'Conta de luz emitida no mês de August/2024'),
(196, 11, '2025-03-30', 1578.21, 'Conta de escola emitida no mês de March/2025'),
(197, 7, '2025-01-06', 73.72, 'Gasto corporativo com gasolina realizado em January/2025'),
(198, 7, '2025-06-25', 180.18, 'Pagamento parcelado de gasolina, parcela referente a June/2025'),
(199, 15, '2024-06-01', 884.97, 'Gasto corporativo com dever o joão martins realizado em June/2024'),
(200, 8, '2025-09-15', 2453.58, 'Pagamento parcelado de manutenção veículo, parcela referente a September/2025'),
(201, 11, '2025-10-28', 998.16, 'Quitação da fatura de escola no mês de October/2025'),
(202, 14, '2025-12-09', 1815.52, 'Gasto corporativo com cartão realizado em December/2025'),
(203, 15, '2024-06-01', 1014.12, 'Despesa programada de dever o joão martins paga em June/2024'),
(204, 11, '2024-12-08', 1496.11, 'Gasto corporativo com escola realizado em December/2024'),
(205, 14, '2025-05-06', 974.35, 'Pagamento parcelado de cartão, parcela referente a May/2025'),
(206, 13, '2025-09-21', 782.84, 'Despesa extra registrada em September/2025 devido a inss');

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
(3, 20, '2025-02-25', 10, 10),
(4, 23, '2025-02-20', 50, 150),
(5, 26, '2025-07-01', 17, 136),
(6, 31, '2025-07-17', 45, 280),
(7, 25, '2025-09-08', 34, 245),
(9, 41, '2025-11-15', 24, 500),
(11, 18, '2024-12-02', 12, 251),
(12, 18, '2025-02-19', 10, 458),
(13, 24, '2025-01-09', 11, 59),
(14, 37, '2024-07-03', 35, 46),
(15, 24, '2025-10-13', 13, 438),
(16, 36, '2024-09-16', 57, 96),
(18, 22, '2024-12-22', 10, 14),
(19, 23, '2024-11-25', 11, 345),
(20, 19, '2024-06-09', 14, 294),
(23, 31, '2024-04-12', 57, 326),
(25, 35, '2025-04-25', 29, 212),
(26, 23, '2025-11-04', 12, 273),
(29, 30, '2025-04-17', 43, 96),
(30, 33, '2025-02-11', 43, 70),
(32, 6, '2024-03-13', 12, 30),
(35, 38, '2024-12-20', 41, 309),
(36, 38, '2024-05-28', 39, 175),
(37, 6, '2024-02-16', 14, 38),
(38, 37, '2025-10-08', 35, 370),
(39, 21, '2024-09-05', 12, 157),
(40, 20, '2024-05-01', 12, 53),
(41, 36, '2025-10-08', 48, 347),
(43, 40, '2025-10-30', 67, 335),
(47, 40, '2024-09-18', 52, 433),
(48, 33, '2024-08-03', 38, 280),
(49, 32, '2024-02-13', 11, 181),
(51, 19, '2024-05-27', 12, 297),
(54, 22, '2024-10-31', 10, 450),
(55, 28, '2024-09-25', 25, 314),
(56, 26, '2025-07-01', 17, 136),
(57, 31, '2025-07-17', 45, 280),
(58, 25, '2025-09-08', 34, 245),
(60, 41, '2025-11-15', 24, 500),
(62, 18, '2024-12-02', 12, 251),
(63, 18, '2025-02-19', 10, 458),
(64, 24, '2025-01-09', 11, 59),
(65, 37, '2024-07-03', 35, 46),
(66, 24, '2025-10-13', 13, 438),
(67, 36, '2024-09-16', 57, 96),
(69, 22, '2024-12-22', 10, 14),
(70, 23, '2024-11-25', 11, 345),
(71, 19, '2024-06-09', 14, 294),
(74, 31, '2024-04-12', 57, 326),
(76, 35, '2025-04-25', 29, 212),
(77, 23, '2025-11-04', 12, 273),
(80, 30, '2025-04-17', 43, 96),
(81, 33, '2025-02-11', 43, 70),
(83, 6, '2024-03-13', 12, 30),
(86, 38, '2024-12-20', 41, 309),
(87, 38, '2024-05-28', 39, 175),
(88, 6, '2024-02-16', 14, 38),
(89, 37, '2025-10-08', 35, 370),
(90, 21, '2024-09-05', 12, 157),
(91, 20, '2024-05-01', 12, 53),
(92, 36, '2025-10-08', 48, 347),
(94, 40, '2025-10-30', 67, 335),
(98, 40, '2024-09-18', 52, 433),
(99, 33, '2024-08-03', 38, 280),
(100, 32, '2024-02-13', 11, 181),
(102, 19, '2024-05-27', 12, 297),
(105, 22, '2024-10-31', 10, 450),
(106, 28, '2024-09-25', 25, 314),
(107, 26, '2025-07-01', 17, 136),
(108, 31, '2025-07-17', 45, 280),
(109, 25, '2025-09-08', 34, 245),
(111, 41, '2025-11-15', 24, 500),
(113, 18, '2024-12-02', 12, 251),
(114, 18, '2025-02-19', 10, 458),
(115, 24, '2025-01-09', 11, 59),
(116, 37, '2024-07-03', 35, 46),
(117, 24, '2025-10-13', 13, 438),
(118, 36, '2024-09-16', 57, 96),
(120, 22, '2024-12-22', 10, 14),
(121, 23, '2024-11-25', 11, 345),
(122, 19, '2024-06-09', 14, 294),
(125, 31, '2024-04-12', 57, 326),
(127, 35, '2025-04-25', 29, 212),
(128, 23, '2025-11-04', 12, 273),
(131, 30, '2025-04-17', 43, 96),
(132, 33, '2025-02-11', 43, 70),
(134, 6, '2024-03-13', 12, 30),
(137, 38, '2024-12-20', 41, 309),
(138, 38, '2024-05-28', 39, 175),
(139, 6, '2024-02-16', 14, 38),
(140, 37, '2025-10-08', 35, 370),
(141, 21, '2024-09-05', 12, 157),
(142, 20, '2024-05-01', 12, 53),
(143, 36, '2025-10-08', 48, 347),
(145, 40, '2025-10-30', 67, 335),
(149, 40, '2024-09-18', 52, 433),
(150, 33, '2024-08-03', 38, 280),
(151, 32, '2024-02-13', 11, 181),
(153, 19, '2024-05-27', 12, 297),
(156, 22, '2024-10-31', 10, 450),
(157, 28, '2024-09-25', 25, 314),
(158, 26, '2025-07-01', 17, 136),
(159, 31, '2025-07-17', 45, 280),
(160, 25, '2025-09-08', 34, 245),
(162, 41, '2025-11-15', 24, 500),
(164, 18, '2024-12-02', 12, 251),
(165, 18, '2025-02-19', 10, 458),
(166, 24, '2025-01-09', 11, 59),
(167, 37, '2024-07-03', 35, 46),
(168, 24, '2025-10-13', 13, 438),
(169, 36, '2024-09-16', 57, 96),
(171, 22, '2024-12-22', 10, 14),
(172, 23, '2024-11-25', 11, 345),
(173, 19, '2024-06-09', 14, 294),
(176, 31, '2024-04-12', 57, 326),
(178, 35, '2025-04-25', 29, 212),
(179, 23, '2025-11-04', 12, 273),
(182, 30, '2025-04-17', 43, 96),
(183, 33, '2025-02-11', 43, 70),
(185, 6, '2024-03-13', 12, 30),
(188, 38, '2024-12-20', 41, 309),
(189, 38, '2024-05-28', 39, 175),
(190, 6, '2024-02-16', 14, 38),
(191, 37, '2025-10-08', 35, 370),
(192, 21, '2024-09-05', 12, 157),
(193, 20, '2024-05-01', 12, 53),
(194, 36, '2025-10-08', 48, 347),
(196, 40, '2025-10-30', 67, 335),
(200, 40, '2024-09-18', 52, 433),
(201, 33, '2024-08-03', 38, 280),
(202, 32, '2024-02-13', 11, 181),
(204, 19, '2024-05-27', 12, 297),
(207, 22, '2024-10-31', 10, 450),
(208, 28, '2024-09-25', 25, 314),
(277, 6, '2025-09-30', 12, 1004),
(475, 26, '2025-07-01', 17, 136),
(476, 31, '2025-07-17', 45, 280),
(477, 25, '2025-09-08', 34, 245),
(479, 41, '2025-11-15', 24, 500),
(481, 18, '2024-12-02', 12, 251),
(482, 18, '2025-02-19', 10, 458),
(483, 24, '2025-01-09', 11, 59),
(484, 37, '2024-07-03', 35, 46),
(485, 24, '2025-10-13', 13, 438),
(486, 36, '2024-09-16', 57, 96),
(488, 22, '2024-12-22', 10, 14),
(489, 23, '2024-11-25', 11, 345),
(490, 19, '2024-06-09', 14, 294),
(493, 31, '2024-04-12', 57, 326),
(495, 35, '2025-04-25', 29, 212),
(496, 23, '2025-11-04', 12, 273),
(499, 30, '2025-04-17', 43, 96),
(500, 33, '2025-02-11', 43, 70),
(502, 6, '2024-03-13', 12, 30),
(505, 38, '2024-12-20', 41, 309),
(506, 38, '2024-05-28', 39, 175),
(507, 6, '2024-02-16', 14, 38),
(508, 37, '2025-10-08', 35, 370),
(509, 21, '2024-09-05', 12, 157),
(510, 20, '2024-05-01', 12, 53),
(511, 36, '2025-10-08', 48, 347),
(513, 40, '2025-10-30', 67, 335),
(517, 40, '2024-09-18', 52, 433),
(518, 33, '2024-08-03', 38, 280),
(519, 32, '2024-02-13', 11, 181),
(521, 19, '2024-05-27', 12, 297),
(524, 22, '2024-10-31', 10, 450),
(525, 28, '2024-09-25', 25, 314),
(661, 34, '2025-08-07', 54, 10),
(662, 33, '2025-05-10', 45, 20),
(663, 36, '2025-12-20', 15, 15),
(664, 18, '2025-12-05', 10, 10),
(732, 18, '2025-09-30', 57, 40),
(733, 19, '2025-09-30', 10, 14),
(734, 20, '2025-10-01', 12, 100),
(735, 21, '2025-10-01', 12, 1750),
(736, 22, '2025-10-01', 12, 50),
(737, 23, '2025-10-01', 38, 650),
(738, 24, '2025-10-01', 19, 150),
(739, 25, '2025-10-01', 0, 50),
(740, 26, '2025-10-01', 0, 9),
(741, 27, '2025-10-01', 0, 0),
(742, 28, '2025-10-01', 39, 1574),
(743, 29, '2025-10-01', 48, 1024),
(744, 30, '2025-10-01', 13, 1998),
(745, 31, '2025-10-01', 46, 706),
(746, 32, '2025-10-01', 52, 696),
(747, 33, '2025-10-01', 26, 1139),
(748, 34, '2025-10-01', 58, 1460),
(749, 35, '2025-10-01', 36, 864),
(750, 36, '2025-10-01', 39, 473),
(751, 37, '2025-10-01', 33, 1434),
(752, 38, '2025-10-01', 58, 922),
(753, 39, '2025-10-01', 21, 694),
(754, 6, '2025-10-02', 12, 1050),
(755, 18, '2025-10-02', 57, 45),
(756, 19, '2025-10-02', 10, 15),
(757, 20, '2025-10-02', 12, 110),
(758, 21, '2025-10-02', 12, 1800),
(759, 22, '2025-10-02', 12, 60),
(760, 23, '2025-10-02', 38, 660),
(761, 24, '2025-10-02', 19, 155),
(762, 25, '2025-10-02', 0, 55),
(763, 26, '2025-10-02', 0, 10),
(764, 27, '2025-10-02', 0, 5),
(765, 28, '2025-10-02', 39, 1580),
(766, 29, '2025-10-02', 48, 1030),
(767, 30, '2025-10-02', 13, 2005),
(768, 31, '2025-10-02', 46, 710),
(769, 32, '2025-10-02', 52, 700),
(770, 33, '2025-10-02', 26, 1140),
(771, 34, '2025-10-02', 58, 1470),
(772, 35, '2025-10-02', 36, 870),
(773, 36, '2025-10-02', 39, 480),
(774, 37, '2025-10-02', 33, 1450),
(775, 38, '2025-10-02', 58, 925),
(776, 39, '2025-10-02', 21, 700);

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
(25, 'DYNAMIS', 38.00, 0.50, 650, 6.00, 12.00),
(26, 'MAXIMO BABY', 19.00, 0.50, 150, NULL, NULL),
(27, 'REPRODUCA GOLD', 0.00, 0.50, 50, NULL, NULL),
(28, 'ECTHOR POURON', 0.00, 0.50, 9, NULL, NULL),
(29, 'ECTHOR BANHO', 0.00, 0.50, 0, NULL, NULL),
(30, 'VITAMAX PLUS', 39.46, 0.50, 1574, 17.62, 26.90),
(31, 'CARDIOTRON', 47.72, 0.50, 1024, NULL, NULL),
(32, 'NEUROVIT', 12.54, 0.50, 1998, 3.99, 7.58),
(33, 'DERMALIS', 45.60, 0.50, 706, 25.87, 45.47),
(34, 'IMUNOTHOR', 51.54, 0.50, 696, NULL, NULL),
(35, 'BIOENERGEX', 26.40, 0.50, 1139, 11.78, 26.41),
(36, 'HEMATOX', 57.93, 0.50, 1460, 24.32, 54.24),
(37, 'OCULAREX', 35.54, 0.50, 864, 13.57, 33.76),
(38, 'RENALIS', 38.63, 0.50, 473, 18.12, 42.20),
(39, 'GASTRIL', 32.76, 0.50, 1434, 10.19, 15.50),
(40, 'BRONCOVIT', 57.80, 0.50, 922, 26.55, 54.54),
(41, 'OSTEOFORT', 21.12, 0.50, 694, 11.57, 22.67),
(42, 'CALCIUM D3', 55.40, 0.50, 1594, 21.84, 35.26),
(43, 'MAGNEX', 29.47, 0.50, 1548, NULL, NULL),
(44, 'OMEGAFORCE', 45.34, 0.50, 1662, 16.71, 35.77),
(45, 'CARTILHEX', 18.85, 0.50, 1598, NULL, NULL),
(46, 'PROSTALIN', 20.79, 0.50, 1141, 10.38, 22.35),
(47, 'CEREBRIUM', 35.89, 0.50, 574, 11.84, 29.20),
(48, 'VIGORMAX', 43.79, 0.50, 1797, NULL, NULL),
(49, 'SLEEPHARMONY', 6.34, 0.50, 625, NULL, NULL),
(50, 'ANTI-OXI', 57.66, 0.50, 522, 32.45, 65.49);

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
(7, 'Gasolina'),
(8, 'Manutenção Veiculo'),
(9, 'Hotel'),
(10, 'Telefone'),
(11, 'Escola'),
(12, 'Luz'),
(13, 'INSS'),
(14, 'Cartão'),
(15, 'Dever o João Martins');

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
(7, 'Jovas', 'admin@gmail.com', '123', 'S'),
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
(11, 24, 4, 1, 5, '2025-06-20', 10.00, 5.00),
(13, 6, 1, 1, 10, '2025-05-05', 10.00, 5.00),
(14, 6, 1, 1, 10, '2025-05-05', 10.00, 5.00),
(15, 6, 1, 1, 10, '2025-05-05', 10.00, 5.00),
(17, 22, 2, 1, 100, '2025-02-08', 100.00, 10.00),
(18, 19, 3, 2, 10, '2025-05-25', 20.00, 10.00),
(19, 23, 3, 3, 10, '2025-05-20', 20.00, 10.00),
(20, 12, 1, 3, 5, '2025-09-25', 18.50, 7.20),
(21, 22, 4, 7, 2, '2025-09-26', 42.30, 20.00),
(22, 31, 2, 11, 10, '2025-09-27', 15.75, 5.50),
(23, 45, 6, 2, 1, '2025-09-28', 89.99, 50.00),
(24, 18, 3, 5, 6, '2025-09-29', 33.20, 12.50),
(25, 29, 5, 9, 8, '2025-09-30', 27.45, 9.80),
(26, 36, 7, 1, 4, '2025-10-01', 57.93, 24.32),
(27, 14, 2, 8, 3, '2025-10-02', 22.10, 8.40),
(28, 41, 4, 6, 2, '2025-10-03', 21.12, 11.57),
(29, 33, 1, 10, 7, '2025-10-04', 16.90, 6.50),
(30, 25, 5, 12, 15, '2025-10-05', 38.00, 6.00),
(31, 47, 6, 4, 2, '2025-10-06', 35.89, 11.84),
(32, 19, 3, 9, 5, '2025-10-07', 44.20, 20.50),
(33, 32, 2, 5, 8, '2025-10-08', 12.54, 3.99),
(34, 21, 7, 11, 3, '2025-10-09', 29.99, 12.00),
(35, 28, 4, 3, 6, '2025-10-10', 18.75, 7.30),
(36, 37, 1, 2, 1, '2025-10-11', 52.10, 25.00),
(37, 23, 5, 8, 4, '2025-10-12', 24.99, 10.00),
(38, 39, 6, 7, 2, '2025-10-13', 48.50, 22.00),
(39, 16, 3, 10, 9, '2025-10-14', 19.90, 8.50),
(40, 26, 2, 1, 3, '2025-10-15', 31.20, 12.00),
(41, 34, 4, 6, 7, '2025-10-16', 17.80, 6.75),
(42, 11, 1, 9, 5, '2025-10-17', 14.50, 5.20),
(43, 44, 5, 12, 2, '2025-10-18', 61.99, 30.00),
(44, 30, 6, 3, 8, '2025-10-19', 28.50, 11.00),
(45, 38, 7, 5, 6, '2025-10-20', 42.30, 19.50),
(46, 15, 2, 8, 4, '2025-10-21', 21.75, 9.00),
(47, 17, 3, 2, 7, '2025-10-22', 25.90, 11.50),
(48, 35, 1, 7, 3, '2025-10-23', 33.99, 15.00),
(49, 40, 5, 10, 1, '2025-10-24', 55.50, 27.50),
(50, 13, 6, 4, 9, '2025-10-25', 19.80, 8.00),
(51, 27, 7, 12, 2, '2025-10-26', 36.40, 14.90),
(52, 24, 2, 6, 5, '2025-10-27', 29.50, 12.00),
(53, 42, 4, 1, 3, '2025-10-28', 49.99, 22.50),
(54, 20, 1, 9, 6, '2025-10-29', 23.80, 10.50),
(55, 46, 5, 11, 2, '2025-10-30', 58.30, 25.00),
(56, 43, 6, 3, 4, '2025-10-31', 37.25, 15.20),
(57, 48, 7, 8, 7, '2025-11-01', 44.50, 18.90),
(58, 10, 2, 5, 5, '2025-11-02', 13.90, 5.50),
(59, 49, 3, 2, 3, '2025-11-03', 51.75, 23.00),
(60, 50, 1, 4, 2, '2025-11-04', 39.80, 16.50),
(61, 9, 5, 6, 6, '2025-11-05', 20.50, 9.00),
(62, 7, 6, 12, 1, '2025-11-06', 15.99, 7.50),
(63, 8, 7, 7, 4, '2025-11-07', 22.40, 10.00),
(64, 5, 2, 10, 5, '2025-11-08', 17.30, 7.20),
(65, 6, 3, 3, 2, '2025-11-09', 18.50, 8.00),
(66, 1, 1, 11, 3, '2025-11-10', 12.90, 5.00),
(67, 2, 5, 1, 7, '2025-11-11', 24.99, 11.00),
(68, 3, 6, 8, 4, '2025-11-12', 16.50, 7.50),
(69, 4, 7, 9, 6, '2025-11-13', 28.75, 12.00),
(70, 35, 2, 2, 5, '2025-11-14', 33.99, 15.00),
(71, 44, 3, 5, 3, '2025-11-15', 61.99, 30.00);

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
(0, 'Alex Cabeção'),
(1, 'Jovas'),
(2, 'Lúcio'),
(3, 'Matheus'),
(5, 'Kauan Andrade Junior'),
(6, 'Didico da Leste'),
(7, 'Junior Santos Silva'),
(8, 'Ester Rodrigues Azevedo'),
(9, 'Lucas Marques Oliveira');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de tabela `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT de tabela `entradaestoque`
--
ALTER TABLE `entradaestoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=777;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `tipodespesa`
--
ALTER TABLE `tipodespesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
