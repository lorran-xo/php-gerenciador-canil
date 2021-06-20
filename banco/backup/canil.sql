-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2021 às 22:52
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `canil`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acompanhamento`
--

CREATE TABLE `acompanhamento` (
  `id_veterinario` int(50) NOT NULL,
  `id_animal` int(50) NOT NULL,
  `data_acompanhamento` date DEFAULT NULL,
  `id_procedimento` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acompanhamento`
--

INSERT INTO `acompanhamento` (`id_veterinario`, `id_animal`, `data_acompanhamento`, `id_procedimento`) VALUES
(4, 1, '2021-06-02', 6),
(4, 5, '2021-06-07', 3),
(4, 1, '2021-06-19', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adocao`
--

CREATE TABLE `adocao` (
  `id_adocao` int(50) NOT NULL,
  `id_animal` int(50) NOT NULL,
  `id_pessoa` int(50) NOT NULL,
  `data_adocao` date NOT NULL,
  `data_retorno` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adocao`
--

INSERT INTO `adocao` (`id_adocao`, `id_animal`, `id_pessoa`, `data_adocao`, `data_retorno`) VALUES
(9, 5, 3, '2021-06-02', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(50) NOT NULL,
  `codigo` int(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nome_animal` varchar(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `idade` varchar(50) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `porte` varchar(50) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `comportamento` varchar(50) NOT NULL,
  `castrado` date DEFAULT NULL,
  `data_resgate` date NOT NULL,
  `responsavel_resgate` varchar(50) DEFAULT NULL,
  `descricao_resgate` varchar(100) DEFAULT NULL,
  `adotado` tinyint(100) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id_animal`, `codigo`, `tipo`, `nome_animal`, `sexo`, `idade`, `cor`, `porte`, `raca`, `comportamento`, `castrado`, `data_resgate`, `responsavel_resgate`, `descricao_resgate`, `adotado`) VALUES
(1, 416780, 'cachorro', 'Maylow', 'Macho', '12 anos', 'amarela', 'Médio', 'vira-lata', 'Calmo', '2021-04-23', '2021-04-23', 'Lorran Oliveira', 'Encontrado na rua', 1),
(2, 31456, 'gato', 'Hanna', 'Fêmea', '4 meses', 'preto', 'Pequeno', 'persa', 'Agitado', '2021-04-23', '2021-04-23', 'Maria Silva', 'perdida no canil ', 0),
(3, 45245, 'cachorro', 'Bob', 'Fêmea', '6 meses', 'amarelo', 'Pequeno', 'pinscher', 'Agressivo', '0000-00-00', '2021-04-23', 'Joao Silva', 'Fugiu', 0),
(4, 14752, 'gato', 'Luna', 'Fêmea', '3 anos', 'branca', 'Grande', 'indefinida', 'Agitado', '0000-00-00', '2021-04-23', 'Maria Silva', 'Perdido no canil', 0),
(5, 1234, 'cachorro', 'Ted', 'Macho', '5 anos', 'branco', 'Grande', 'pitbull', 'Agitado', '2021-04-23', '2021-04-23', 'Joao Silva', 'Dono entregou', 1),
(24, 123123, 'cachorro', 'Bob', 'Macho', '10', 'Preto', 'Médio', 'pitbull', 'Agitado', '2021-04-22', '2021-04-26', 'Lorran Oliveira', 'encontrado na rua', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `contato` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `cpf`, `contato`, `endereco`) VALUES
(1, 'Carlos Silva', '121.581.336-80', '32991211230', 'Belo Horizonte - MG'),
(2, 'Maria Teixeiras', '231.141.124-20', '32984521266', 'Juiz de Fora - MG'),
(3, 'Joao Silva', '121.581.631-809', '32954554541', 'Cataguases');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `id_procedimento` int(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `procedimento`
--

INSERT INTO `procedimento` (`id_procedimento`, `nome`, `descricao`) VALUES
(1, 'vacina antirrábica', 'vacina administrada por via intramuscular'),
(2, 'vacinas polivalentes', 'vacina via subcutânea ou intravascular'),
(3, 'vacina gripe canina', 'injetável ou intranasal'),
(4, 'vacina leishmaniose', 'via subcutânea '),
(5, 'vacina Giardíase', 'via subcutânea'),
(6, 'antipulgas e carrapatos', 'via oral'),
(8, 'tratamento de feridas', 'desinfecção e cicatrização'),
(9, 'exames iniciais', 'inspeção geral detalhada'),
(10, 'Rinotraqueíte felina', 'utilização de antibióticos'),
(11, 'panleucopenia felina', 'vacina intranasal'),
(12, 'calicivirose felina', 'utilização de antibióticos'),
(13, 'tratamento de Cinomose', 'utilização de antibióticos'),
(14, 'consulta periódica', 'exames de checkup padrão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `id_veterinario` int(50) NOT NULL,
  `nome_veterinario` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `crmv` varchar(50) DEFAULT NULL,
  `contato` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veterinario`
--

INSERT INTO `veterinario` (`id_veterinario`, `nome_veterinario`, `cpf`, `crmv`, `contato`) VALUES
(4, 'Maria Silva', '121.581.631-80', 'MG-5264', '32991433673'),
(7, 'João Pedro', '12132455880', 'MG-3220', '32984345424');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acompanhamento`
--
ALTER TABLE `acompanhamento`
  ADD KEY `id_procedimento_fk` (`id_procedimento`),
  ADD KEY `id_animal_fk` (`id_animal`),
  ADD KEY `id_veterinario_fk` (`id_veterinario`);

--
-- Índices para tabela `adocao`
--
ALTER TABLE `adocao`
  ADD PRIMARY KEY (`id_adocao`),
  ADD KEY `animal_id_fk` (`id_animal`),
  ADD KEY `pessoa_id_fk` (`id_pessoa`);

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Índices para tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`id_procedimento`);

--
-- Índices para tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id_veterinario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adocao`
--
ALTER TABLE `adocao`
  MODIFY `id_adocao` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id_procedimento` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `acompanhamento`
--
ALTER TABLE `acompanhamento`
  ADD CONSTRAINT `id_animal_fk` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_procedimento_fk` FOREIGN KEY (`id_procedimento`) REFERENCES `procedimento` (`id_procedimento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_veterinario_fk` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_veterinario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `adocao`
--
ALTER TABLE `adocao`
  ADD CONSTRAINT `animal_id_fk` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pessoa_id_fk` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
