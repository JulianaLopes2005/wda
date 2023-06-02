-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2023 às 04:17
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
(14, 'Arqueiro', 'arqueirooficial@gmail.com', '(85) 67688-8787', 'arqueiroedt.com'),
(15, 'Galera', 'galera@gmail.com', '(85) 97564-5678', 'galera.com'),
(16, 'Bertrand', 'bertofic@gmail.com', '(85) 67777-6506', 'bertrand.com'),
(17, 'Companhia das Letras', 'CompanhiadaLetras@gmail.com', '(85) 02744-6764', 'completras.com'),
(18, 'Suma', 'sumaofc@gmail.com', '(85) 28475-6829', 'suma.com'),
(19, 'Intrínseca', 'intrinseca@gmail.com', '(85) 98723-4433', 'Intrínseca.com');

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
(31, 5, 'A biblioteca da meia-noite', 20, 'Alan Castro', '2023-06-07', '0000-00-00', 0, ''),
(32, 5, 'A biblioteca da meia-noite', 18, 'Renato', '2023-06-05', '0000-00-00', 0, ''),
(33, 1, 'Corte de espinhos e rosas', 20, 'Alan Castro', '2023-06-07', '0000-00-00', 0, ''),
(35, 1, 'Corte de espinhos e rosas', 18, 'Renato', '0000-00-00', '0000-00-00', 0, ''),
(36, 8, 'Um passo de sorte', 27, 'Luisa Vieira', '2023-06-11', '0000-00-00', 0, ''),
(37, 7, 'Trono de vidro', 25, 'Vivian Mota', '2023-06-02', '0000-00-00', 0, '');

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
  `estoque` int(11) NOT NULL,
  `novo_estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autor`, `editora`, `datalanc`, `estoque`, `novo_estoque`) VALUES
(1, 'Corte de espinhos e rosas', 'Sarah J.M', 'Galera', '2018-05-10', 7, 9),
(5, 'A biblioteca da meia-noite', 'Matt Haig', 'Bertrand', '2021-09-20', 2, 0),
(6, 'Verity  ', ' Colleen Hoover ', 'Galera', '2020-03-09', 8, 0),
(7, 'Trono de vidro', 'Sarah J. Mass', 'Galera', '2013-07-17', 5, 0),
(8, 'Um passo de sorte', 'Jojo Moyes', 'Intrínseca', '2018-06-05', 4, 0),
(9, 'Como investir', 'David M.', 'Intrínseca', '2023-01-03', 3, 0),
(10, 'IT a coisa', 'Stephen King', 'Suma', '2016-02-08', 9, 0);

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
(18, 'Renato', 'jovem@gmail.com', '(85) 45678-9045', 'bairro belas flores, rua 3, casa 55', '123.456.545-40'),
(21, 'Claudio Soares', 'claudio@gmail.com', '(85) 76327-3739', 'bairro Jereissati, rua 4, casa 22', '456.723.487-34'),
(22, 'Priscila Campos', 'priscila@gmail.com', '(85) 36543-4683', 'bairro Nova Avenida, rua 43, casa 7', '990.456.006-54'),
(24, 'Alan Castro', 'alanc@gmail.com', '(85) 23987-4567', 'bairro São Jesus, rua 3, casa 8', '098.734.567-89'),
(25, 'Vivian Mota', 'vivi@gmail.com', '(85) 67876-3456', 'bairro São Jesus, rua 5, casa 5', '753.784.895-67'),
(26, 'Danilo Pereira', 'danpereira@gmail.com', '(86) 34576-5409', 'bairro Para Sempre, rua 6, casa 33', '976.567.090-00'),
(27, 'Luisa Vieira', 'luizav@gmail.com', '(86) 34587-8934', 'bairro Nova Avenida, rua 4, casa 9', '873.498.632-06'),
(28, 'Mariana Lorenzo', 'marimari@gmail.com', '(85) 67800-0873', 'bairro belas flores, rua 6, casa 45', '658.645.825-65');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
