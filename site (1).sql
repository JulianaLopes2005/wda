-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Maio-2023 às 05:18
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolvidos`
--

CREATE TABLE `devolvidos` (
  `id` int(11) NOT NULL,
  `livros_id` int(11) NOT NULL,
  `prazo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `devolvidos`
--

INSERT INTO `devolvidos` (`id`, `livros_id`, `prazo`) VALUES
(1, 12, '0000-00-00'),
(2, 13, '0000-00-00'),
(3, 19, '0000-00-00'),
(4, 21, 'sim'),
(5, 20, 'nao'),
(6, 22, 'nao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `nome_editora` text NOT NULL,
  `email_editora` text NOT NULL,
  `telefone` text NOT NULL,
  `site_editora` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`id`, `nome_editora`, `email_editora`, `telefone`, `site_editora`) VALUES
(3, 'Pirulito POP', 'pirulitopop1234@gmail.com', '8734662341', 'pirulitopopforever'),
(4, 'Arqueiro', 'arqueirooficial@gmail.com', '8734662341', 'arqueiroedt'),
(5, 'lopes', 'loiyt@gmail.com', '8734662341', 'rtyu'),
(7, 'papel', 'loiyt@gmail.com', '40028922', 'rtyu.com'),
(8, 'Galera', 'galera@gmail.com', '85234587345', 'galera.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL,
  `livro_nome` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `usuario_nome` text NOT NULL,
  `prazo_entrega` date NOT NULL,
  `data_emprestimo` date NOT NULL,
  `devolvido` int(11) NOT NULL,
  `cpf_usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id`, `livro_id`, `livro_nome`, `usuario_id`, `usuario_nome`, `prazo_entrega`, `data_emprestimo`, `devolvido`, `cpf_usuario`) VALUES
(23, 1, 'Corte de espinhos e rosas', 2, 'Juliana', '2023-05-08', '2023-05-09', 0, '784456987446');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `autor` text NOT NULL,
  `editora` text NOT NULL,
  `datalanc` date NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autor`, `editora`, `datalanc`, `estoque`) VALUES
(1, 'Corte de espinhos e rosas', 'Sarah J.M', 'Galera', '2018-05-10', 7),
(3, 'olhos de fogo', 'to nem ai', 'lopes', '2023-05-01', 3),
(4, 'Duas vidas', 'fghgfnh', 'Arqueiro', '2023-05-08', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `celular` text NOT NULL,
  `endereco` text NOT NULL,
  `cpf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `celular`, `endereco`, `cpf`) VALUES
(2, 'Juliana', 'jujuba@gmail.com', '944441534', 'vcrb fcb ,fcb ,f f,cc ,f', '784456987446'),
(3, 'Paulo Cleiton Rasta', 'pirulitopop123@gmail.com', '944441534', 'vcrb fcb ,fcb ,f f,cc ,f', '784456987446'),
(5, 'Carlos de Carlos', 'Cunha@gmail.com', '2345678', 'vcrb fcb ,fcb ,f f,cc ,f', '784456987446'),
(6, 'Paloma Freitas', 'palomaf@gmail.com', '8576327373', 'casa 3, bairro jereissati', '0987567234');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `devolvidos`
--
ALTER TABLE `devolvidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `devolvidos`
--
ALTER TABLE `devolvidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;