-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/07/2024 às 19:43
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Banco de dados: `aula`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
    `id` int(11) NOT NULL,
    `nome_prod` varchar(255) DEFAULT NULL,
    `qtd_prod` int(11) DEFAULT NULL,
    `valor_prod` float DEFAULT NULL,
    `valor_total` float DEFAULT NULL,
    `nome_usuario` varchar(255) DEFAULT NULL,
    `id_usuario` int(11) DEFAULT NULL,
    `img_prod` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
    `id` int(11) NOT NULL,
    `nome` varchar(50) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `data_nasc` varchar(10) DEFAULT NULL,
    `senha` varchar(255) DEFAULT NULL,
    `imagem` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO
    `pessoa` (
        `id`,
        `nome`,
        `email`,
        `data_nasc`,
        `senha`,
        `imagem`
    )
VALUES (
        1,
        'teste',
        'teste@teste.com',
        '2024-07-01',
        '601f1889667efaebb33b8c12572835da3f027f78',
        'IMG-20230315-WA0013.jpg'
    );

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
    `id` int(11) NOT NULL,
    `nome` varchar(50) DEFAULT NULL,
    `descricao` varchar(100) DEFAULT NULL,
    `imagem` varchar(100) DEFAULT NULL,
    `valor` float DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO
    `produto` (
        `id`,
        `nome`,
        `descricao`,
        `imagem`,
        `valor`
    )
VALUES (
        50,
        'Camisa',
        'Boa',
        'camisa_pretajpeg.jpeg',
        43.56
    ),
    (
        51,
        'Vestido',
        'top ',
        'images (1).jpeg',
        69.99
    ),
    (
        52,
        'Calça Jeans',
        'boladao',
        'download (13).jpeg',
        105.22
    );

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
ADD PRIMARY KEY (`id`),
ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa` ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 133;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 53;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `pessoa` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;