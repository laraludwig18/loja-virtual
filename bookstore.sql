-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03/07/2019 às 05:37
-- Versão do servidor: 10.1.38-MariaDB
-- Versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bookstore`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `client`
--

CREATE TABLE `client` (
  `clientId` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL,
  `birthDate` date NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `client`
--

INSERT INTO `client` (`clientId`, `name`, `email`, `phoneNumber`, `birthDate`, `cpf`, `address`, `password`, `type`) VALUES
(65, 'admin', 'admin@gmail.com', '', '0000-00-00', '', '', '$2y$10$u7l89KxbCxsJcrbC/VQV3evFHpOWk1eURDSS1syumaxr8YnZOmDca', 'admin'),
(67, 'lara ludwig', 'laraludwig90@gmail.com', '(51) 99363-3650', '1999-04-30', '015.454.623-90', 'sdsdsddsdsdsd', '$2y$10$ZM76sm4REFwkzU9flQ0nUOGAAD.D3hx24jc5DThKvKMMwtRTxa0NK', 'normal');

-- --------------------------------------------------------

--
-- Estrutura para tabela `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `author` varchar(70) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(70) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `imageUrl` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `product`
--

INSERT INTO `product` (`productId`, `name`, `author`, `description`, `category`, `quantity`, `price`, `imageUrl`, `creationDate`) VALUES
(15, 'A revoluÃ§Ã£o dos bichos', 'George Orwell', 'Narra a insurreiÃ§Ã£o dos animais de uma granja contra seus donos.', 'Literatura Estrangeira', 90, 31.9, 'https://i.imgur.com/JjQUPEn.jpg', '2019-07-03 01:57:13'),
(16, 'Vidas Secas', 'Graciliano Ramos', 'Vidas secas acompanha a trajetÃ³ria da famÃ­lia de Fabiano, Sinha VitÃ³ria, os dois filhos do casal e a cachorra Baleia na fuga do sertÃ£o em busca de oportunidades.', 'Literatura Brasileira', 42, 35.92, 'https://i.imgur.com/XVM2FE3.jpg', '2019-07-03 02:05:52'),
(17, 'Novos Vingadores - Mundos Paralelos', 'Simone Bianchi', 'Os Illuminati se reÃºnem para estudar os pontos de IncursÃ£o â€” onde mÃºltiplas Terras se encontram em rota de colisÃ£o â€” e outros seres que ameaÃ§am o Multiverso.', 'HQs', 63, 18.9, 'https://i.imgur.com/pbnKtoI.jpg', '2019-07-03 02:10:52'),
(18, 'Box - O Essencial da PolÃ­tica - 3 Volumes', 'Rousseau PlatÃ£o', 'Apologia de SÃ³crates: SÃ³crates, de certa forma, estava em Guerra com a tradiÃ§Ã£o poÃ©tica grega. O mÃ©todo de SÃ³crates era o oposto da narrativa Ã©pica de Homero.', 'Politica', 45, 2.19, 'https://i.imgur.com/5T7jRAY.png', '2019-07-03 02:13:53'),
(19, 'O Adulto', 'Gillian Flynn', 'Uma jovem ganha a vida praticando pequenas fraudes. Seu principal talento Ã© a capacidade de dizer Ã s pessoas exatamente o que elas querem ouvir, e sua mais recente ocupaÃ§Ã£o consiste em se passar por vidente, oferecendo o serviÃ§o de leitura de aura pa', 'Romance', 12, 14.9, 'https://i.imgur.com/v6tIZH6.jpg', '2019-07-03 02:17:41'),
(20, 'A Garota do Lago', 'Charlie Donlea', 'a. Duas semanas atrÃ¡s, a estudante de direito Becca Eckersley foi brutalmente assassinada em uma dessas casas.', 'Suspense', 4, 11.9, 'https://i.imgur.com/bejAEAg.jpg', '2019-07-03 02:20:00'),
(21, 'A AssombraÃ§Ã£o da Casa da Colina', 'Shirley Jackson', 'ackson entrega um livro perturbador sobre a relaÃ§Ã£o entre a loucura e o sobrenatural. Sozinha no mundo, Eleanor fica encantada ao receber uma carta do dr.', 'Terror', 90, 45.91, 'https://i.imgur.com/7b3yeBO.jpg', '2019-07-03 02:36:10');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientId`);

--
-- Índices de tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `client`
--
ALTER TABLE `client`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
