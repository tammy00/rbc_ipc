-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Fev-2017 às 05:45
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rbc_ipc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(255) NOT NULL,
  `codigo_curso` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome_curso`, `codigo_curso`) VALUES
(1, 'MISTA', ''),
(2, 'MATEMÁTICA APLICADA', ''),
(3, 'ENGENHARIA ELÉTRICA', ''),
(4, 'FÍSICA NOTURNO', ''),
(5, 'CURSO EXPERIMENTAL 1', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricaoproblema`
--

CREATE TABLE `descricaoproblema` (
  `id_descProblema` int(11) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `topico` varchar(150) NOT NULL,
  `estiloAprendizagem` varchar(100) NOT NULL,
  `descrProblema` varchar(1000) NOT NULL,
  `naturezaProblema` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `descricaoproblema`
--

INSERT INTO `descricaoproblema` (`id_descProblema`, `tema`, `topico`, `estiloAprendizagem`, `descrProblema`, `naturezaProblema`) VALUES
(1, 'Variáveis', 'Variáveis', 'Reflexivo', 'não sei como declarar corretamente as variáveis', 'Programação'),
(2, 'Variáveis', 'Variáveis', 'Ativo', ' o que é uma variável?', 'Lógica'),
(3, 'Variáveis', 'Tipos de Variáveis', 'Verbal', 'não entendi o que uma variável constante', 'Lógica'),
(4, 'Variáveis', 'Tipos de Variáveis', 'Visual', 'não entendi a diferença entre float e double', 'Matemática'),
(5, 'Variáveis', 'Tipos de Variáveis', 'Global', 'não sei diferenciar os tipos de variáveis', 'Programação'),
(6, 'Variáveis', 'Tipos de Variáveis', 'Sequencial', 'não entendi os tipos numéricos (reais, inteiro e ponto flutuante)', 'Matemática'),
(7, 'Variáveis', 'Strings', 'Verbal', 'não sei declarar uma string', 'Programação'),
(8, 'Variáveis', 'Variáveis', 'Verbal', 'não entendi como uma variável pode ser declarada e usada', 'Programação'),
(9, 'Variáveis', 'Entrada de Dados', 'Reflexivo', 'não entendi como declarar a entrada e saída de dados', 'Programação'),
(10, 'Variáveis', 'Entrada de Dados', 'Global', 'não sei quais são os comandos de entrada', 'Programação'),
(11, 'Variáveis', 'Bibliotecas', 'Intuitivo', 'não sei como utilizar corretamente as bibliotecas', 'Programação'),
(12, 'Variáveis', 'Comentários', 'Verbal', 'como faço para adicionar comentários no código', 'Programação'),
(13, 'Variáveis', 'Comentários', 'Reflexivo', 'como fazer comentários na linguagem C', 'Programação'),
(14, 'Estrutura Condicional', 'Estrutura Condicional Simples (Comando if)', 'Visual', 'como é a estrutura de uma condicional', 'Lógica'),
(15, 'Variáveis', 'Variáveis', 'Sequencial', 'não entendi o conceito de algoritmo', 'Lógica'),
(16, 'Variáveis', 'Variáveis', 'Global', 'não entendi como utilizar os comandos de atribuição', 'Programação'),
(17, 'Variáveis', 'Variáveis', 'Visual', 'tenho dificuldade em usar os comandos de entrada e saida', 'Programação'),
(18, 'Estrutura Condicional', 'Operadores Relacionais', 'Reflexivo', 'tenho dificuldade em usar os operadores relacionais', 'Lógica'),
(19, 'Estrutura Condicional', 'Estrutura Condicional Simples (Comando if)', 'Global', 'não consigo compreender a sequência do if', 'Lógica'),
(20, 'Estrutura Condicional', 'Prioridade de Operadores', 'Verbal', 'nunca sei qual é a ordem dos operadores < > >=', 'Lógica'),
(21, 'Estrutura Condicional', 'Estruturas Condicionais Composta (Comando if e else)', 'Intuitivo', 'não entendi a estrutura de condicionais compostas', 'Lógica'),
(22, 'Estrutura Condicional', 'Estruturas Condicionais Composta (Comando if e else)', 'Sensitivo', 'não entendi como deve ser usado os comandos', 'Programação'),
(23, 'Estruturas Condicionais Encadeadas', 'Funções round e abs', 'Visual', 'para que serve a função round', 'Matemática'),
(24, 'Estruturas Condicionais Encadeadas', 'Estruturas Condicionais Encadeadas (Comando if e else aninhados)', 'Ativo', 'não entendi a estutura das condicionais encadeadas', 'Lógica'),
(25, 'Variáveis', 'Operadores Lógicos', 'Sequencial', 'não entendeu a diferença entre and e or', 'Lógica'),
(26, 'Repetição por Condição', 'Repetição por Condição (Comando while)', 'Sequencial', 'não entendi como criar uma repetição por condição', 'Programação'),
(27, 'Repetição por Condição', 'Repetição por Condição (Comando while)', 'Verbal', 'não entendi qual a diferença do if para o while', 'Programação'),
(28, 'Repetição por Condição', 'Repetição por Condição (Comando while)', 'Global', 'gostaria de mais exemplos da Repetição por Condição', 'Programação'),
(29, 'Estrutura Condicional', 'Estrutura Condicional Simples (Comando if)', 'Reflexivo', 'preciso de mais exemplos do if por que ainda não entendi', 'Programação'),
(30, 'Repetição por Condição', 'Repeticao aninhados', 'Verbal', 'não entendi a estrutura da repeticao aninhados', 'Programação'),
(31, 'Vetores', 'Vetores', 'Intuitivo', 'não entendi o que e um vetor', 'Programação'),
(32, 'Vetores', 'Vetores', 'Ativo', 'não sei declarar um vetor', 'Programação'),
(33, 'Vetores', 'Vetores', 'Reflexivo', 'como declarar um vetor', 'Programação'),
(34, 'Vetores', 'Vetores', 'Global', 'como percorrer um vetor', 'Programação'),
(35, 'Vetores', 'Vetores', 'Intuitivo', ' não estou entendendo como realiza busca dentro de um vetor', 'Programação'),
(36, 'Vetores', 'Vetores', 'Reflexivo', 'não sei como ler um valor do teclado', 'Programação'),
(37, 'Strings', 'Strings', 'Sequencial', 'não entendi o conceito de strings', 'Programação'),
(38, ' Strings', 'Strings', 'Visual', 'como saber o tamanho de uma string', 'Programação'),
(39, 'Strings', 'Strings', 'Verbal', ' não sei como saber o primeiro digito da strings', 'Programação'),
(40, 'Strings', 'Strings', 'Global', 'como comparar duas strings', 'Programação'),
(41, 'Strings', 'Strings', 'Reflexivo', ' estou com dificuldade em concatenar duas strings', 'Programação'),
(42, 'Strings', 'Strings', 'Sequencial', 'como realizar copia de string', 'Programação'),
(43, 'Strings', 'Strings', 'Intuitivo', 'como verificar se todas as letras da strigs sao do alfabeto', 'Programação'),
(44, 'Strings', 'Strings', 'Visual', 'como verificar se todos os digitos sao numeros', 'Programação'),
(45, 'Strings', 'Strings', 'Intuitivo', 'como verificar se todos os digitos sao alfanumericos', 'Programação'),
(46, 'Strings', 'Strings', 'Sequencial', 'como mudar strings para numeros', 'Programação'),
(47, 'Repetição por Contagem', 'Repetição por Contagem (comando for)', 'Intuitivo', 'não entendi como usar o for', 'Programação'),
(48, 'Repetição por Contagem', 'Repetição por Contagem (comando for)', 'Intuitivo', 'quando usar o for ou o while ', 'Programação'),
(49, 'Repetição por Contagem', 'Repetição por Contagem (comando for)', 'Intuitivo', 'preciso de exemplos para compreender o for', 'Programação'),
(50, 'Matrizes', 'Matrizes', 'Sensitivo', 'não entendi o conceito de matriz', 'Programação'),
(51, ' Matrizes', 'Matrizes', 'Reflexivo', 'não sei declarar matrizes', 'Programação'),
(52, 'Matrizes', 'Matrizes', 'Visual', 'preciso de mais exemplos de matrizes', 'Programação'),
(53, 'Matrizes', 'Matrizes', 'Reflexivo', 'sempre me confundo linhas e colunas de uma matriz', 'Programação'),
(54, 'Matrizes', 'Matrizes', 'Intuitivo', ' não consigo entender matrizes', 'Programação'),
(55, 'Variáveis', 'Variáveis', 'Ativo', ' não entendi o que é um algoritmo', 'Lógica'),
(56, 'Variáveis', 'Variáveis', 'Reflexivo', 'não entendi o que é uma variável', 'Lógica'),
(57, 'Vetores', 'Vetores', 'Reflexivo', 'não compreendi o por que de utilizar vetores', 'Lógica'),
(58, 'Repetição por Condição', 'Repetição aninhados', 'Verbal', 'ainda não sei utilizar repetições aninhadas', 'Programação'),
(59, 'Repetição por Contagem', 'Repetição por Contagem (Comando for)', 'Intuitivo', 'Não sei como usar o for', 'Programação'),
(60, 'Variáveis', 'Variáveis', 'Verbal', 'Não sei como declarar', 'Programação'),
(61, 'Estrutura Condicional', 'Estrutura Condicional Simples (Comando if)', 'Verbal', 'Não sei como usar', 'Programação'),
(62, 'Matrizes', 'Matrizes', 'Verbal', 'Não sei a diferença entre matrizes e vetores', 'Lógica'),
(63, 'Vetores', 'Vetores', 'Verbal', 'Não sei a diferença entre matrizes e vetores', 'Lógica'),
(64, 'Vetores', 'Vetores', 'Verbal', 'Não sei a diferença entre matrizes e vetores', 'Lógica'),
(65, 'Estruturas Condicionais Encadeadas', 'Estruturas Condicionais Encadeadas (Comando if e else aninhados)', 'Verbal', 'Não sei se else vem antes do if', 'Lógica'),
(66, 'Strings', 'Strings', 'Verbal', 'Não sei como fazer concatenação de uma ou mais strings', 'Programação'),
(67, 'Repetição por Contagem', 'Repetição por Contagem (Comando for)', 'Verbal', 'Não sei a diferença entre usar o for e o while', 'Lógica'),
(68, 'Repetição por Condição', 'Repetição aninhados', 'Verbal', 'Como usar o while em repetição aninhada', 'Programação'),
(69, 'Vetores', 'Vetores', 'Verbal', 'Não sei a diferença entre matrizes e vetores', 'Lógica'),
(70, 'Matrizes', 'Matrizes', 'Verbal', 'Não sei como declarar', 'Programação'),
(71, 'Variáveis', 'Variáveis', 'Verbal', 'Não sei como declarar', 'Programação'),
(72, 'Vetores', 'Vetores', 'Verbal', 'Não sei como declarar', 'Programação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(255) NOT NULL,
  `codigo_disciplina` varchar(8) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `turma` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome_disciplina`, `codigo_disciplina`, `curso_id`, `turma`) VALUES
(1, 'INTRODUÇÃO À PROGRAMAÇÃO DE COMPUTADORES', 'IEC037', 1, 'EB01'),
(2, 'INTRODUÇÃO À PROGRAMAÇÃO DE COMPUTADORES', 'IEC081', 1, 'FL01'),
(3, 'INTRODUÇÃO À PROGRAMAÇÃO DE COMPUTADORES', 'IEC901', 2, 'MA01'),
(4, 'INTRODUÇÃO À PROGRAMAÇÃO DE COMPUTADORES', 'IEC081', 3, '01A/B/C'),
(5, 'INTRODUÇÃO À PROGRAMAÇÃO DE COMPUTADORES', 'IEC081', 4, 'FL11'),
(6, 'INTRODUÇÃO À PROGRAMAÇÃO DE COMPUTADORES', 'IPC001', 5, 'TE01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estilo`
--

CREATE TABLE `estilo` (
  `id_estilo` int(11) NOT NULL,
  `nome_estilo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estilo`
--

INSERT INTO `estilo` (`id_estilo`, `nome_estilo`) VALUES
(1, 'Ativo'),
(2, 'Reflexivo'),
(3, 'Sensorial'),
(4, 'Intuitivo'),
(5, 'Visual'),
(6, 'Verbal'),
(7, 'Sequencial'),
(8, 'Global');

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetosaprendizagem`
--

CREATE TABLE `objetosaprendizagem` (
  `id_objeto` int(11) NOT NULL,
  `estilo_objeto` varchar(50) DEFAULT NULL,
  `estilo_objeto2` varchar(50) DEFAULT NULL,
  `estilo_objeto3` varchar(50) DEFAULT NULL,
  `descricao_objeto` varchar(1000) DEFAULT NULL,
  `formato_objeto` varchar(100) DEFAULT NULL,
  `localizacao_objeto` varchar(100) DEFAULT NULL,
  `idioma_objeto` varchar(100) DEFAULT NULL,
  `titulo_objeto` varchar(100) NOT NULL,
  `palavraschaves_objeto` varchar(200) DEFAULT NULL,
  `tamanho_objeto` varchar(50) DEFAULT NULL,
  `requisitos_objeto` varchar(100) DEFAULT NULL,
  `tipointeratividade_objeto` varchar(100) DEFAULT NULL,
  `dificuldade_objeto` varchar(100) DEFAULT NULL,
  `estrutura_objeto` varchar(100) DEFAULT NULL,
  `recurso_objeto` varchar(100) DEFAULT NULL,
  `pathArquivo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `objetosaprendizagem`
--

INSERT INTO `objetosaprendizagem` (`id_objeto`, `estilo_objeto`, `estilo_objeto2`, `estilo_objeto3`, `descricao_objeto`, `formato_objeto`, `localizacao_objeto`, `idioma_objeto`, `titulo_objeto`, `palavraschaves_objeto`, `tamanho_objeto`, `requisitos_objeto`, `tipointeratividade_objeto`, `dificuldade_objeto`, `estrutura_objeto`, `recurso_objeto`, `pathArquivo`) VALUES
(1, 'Ativo', 'Sensitivo', 'Visual', 'O AnimA-K é um objeto de aprendizagem ou um recurso tecnológico que permite ao aluno da Ciência da Computação (ou de outras áreas das Ciências) explorar os fundamentos básicos para a construção de algoritmos computacionais\n', 'vídeo\r\n', 'http://nuted.ufrgs.br/oa/animak/atividades_basico_jogo.php\n', 'Português', 'Anima-k\r\n', 'Algoritmos, Construção, Lógica\r\n', 'N/D', 'N/D', 'Ativo, misto \r\n', 'Básico, Médio, Alto\r\n', 'linear \r\n', 'Simulação\r\n', NULL),
(2, 'Verbal', 'Reflexivo', '', 'Objeto de aprendizagem que tem como base o cenário de roupas em um varal e colocadas em um armário. Essas atividades são associadas com instruções computacionais na representação de estruturas de dados homogêneos (vetores) de acordo com a sintaxe e a semântica da Linguagem C\n', 'swf', NULL, 'Português', 'Varal de Roupas\r\n', 'Linguagem C, Indexação, Vetores\r\n', '6,7 MB', 'Flash\r\n', 'Expositivo\r\n', 'Fácil\r\n', 'linear\r\n', 'Animação\r\n', 'uploads/loms/2.exe'),
(3, 'Verbal ', 'Reflexivo', '', 'Abrange o conceito de variáveis, estruturas de decisão e repetição\n', 'swf\r\n', NULL, 'Português ', 'O construtor\r\n', 'Alocação de memória, if, for, do while, while\r\n', '4,7 MB', 'Flash\r\n', 'Expositivo\r\n', 'Fácil\r\n', 'linear \r\n', 'Animação\r\n', 'uploads/loms/3.exe'),
(4, 'Verbal', 'Reflexivo', '', '\r\n', 'wmv\r\n', 'http://www.dominiopublico.gov.br/pesquisa/DetalheObraForm.do?select_action=&co_obra=50487', 'Português', 'Medidas \r\n', 'Medidas, matemática, cálculos\r\n', '153,94 MB', 'player de vídeo\r\n', 'Expositivo\r\n', 'Fácil\r\n', 'linear \r\n', 'vídeo', NULL),
(5, 'Sensorial', 'Reflexivo', '', 'Definição de um algoritmo\r\n', 'wmv\r\n', 'https://www.youtube.com/watch?v=CvSOaYi89B4', 'Inglês', 'O que é um algoritmo\r\n', 'Algoritmos, Construção, Lógica\r\n', NULL, NULL, 'expositivo\r\n', 'fácil\r\n', 'linear \r\n', 'vídeo', NULL),
(6, 'Verbal', 'Reflexivo', '', 'Definição de uma variável \r\n', 'HTML \r\n', 'http://oa-logicadeprogramacao.zip.net/', 'Português', 'Variáveis \r\n', 'Variáveis \r\n', NULL, NULL, 'Expositivo', 'Fácil\r\n', 'linear \r\n', 'Animação\r\n', NULL),
(7, 'Verbal', 'Reflexivo', '', 'Como declarar variavéis na linguagem c\r\n', 'wmv\r\n', 'https://www.youtube.com/watch?v=q51cHsgRHU4\r\n', 'Português', 'Linguagem C descomplicada - Variaveis \r\n', 'Variáveis, C ', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear \r\n', 'vídeo \r\n', NULL),
(8, 'Verbal', 'Reflexivo', '', 'Como utilizar o printf\r\n', 'wmv\r\n', 'http://www.youtube.com/watch?v=07YPObbEpU8', 'Português', 'Linguagem C descomplicada -Printf\r\n', 'printf, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo \r\n', NULL),
(9, 'Verbal', 'Reflexivo', '', 'Como utilizar o scanf \r\n', 'wmv\r\n', 'https://www.youtube.com/watch?v=yQx8sD6vK6M', 'Português', 'Linguagem C descomplicada - Scanf\r\n', 'scanf, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo', NULL),
(10, 'Verbal ', 'Reflexivo', '', 'Como utilizar os operadores de atribuição\r\n', 'wmv', 'http://www.youtube.com/watch?v=tQhnuVR2gc4', 'Português', 'Linguagem C descomplicada - Operadores de Atribuição', 'operadores de atribuição, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo', NULL),
(11, 'Verbal', 'Reflexivo', '', 'Como utilizar constantes\r\n', 'wmv\r\n', 'http://youtu.be/GdjGrVjRgTI', 'Português', 'Linguagem C descomplicada - Constantes\r\n', 'constantes, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear\r\n', 'vídeo', NULL),
(12, 'Verbal', 'Reflexivo', '', 'Como utilizar os operadores aritméticos \r\n', 'wmv\r\n', 'http://youtu.be/NsRwpFNZhJs', 'Português', 'Linguagem C descomplicada- Operadores Aritméticos \r\n', 'operadores aritméticos, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil \r\n', 'linear', 'vídeo', NULL),
(13, 'Verbal', 'Reflexivo', '', 'Como utilizar os comentários\r\n', 'wmv', 'http://youtu.be/8PAWmHdreoc', 'Português', 'Linguagem C descomplicada - Comentários\r\n', 'comentários, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo', NULL),
(14, 'Verbal', 'Reflexivo', '', 'Como utilizar o pré e pós incremento\r\n', 'wmv', 'http://youtu.be/YbVmQKTuajY', 'Português', 'Linguagem C descomplicada - Pré e Pós Incremento\r\n', 'pré, pós, incremento, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil \r\n', 'linear', 'vídeo', NULL),
(15, 'Verbal', 'Reflexivo', '', 'Como realizar atribuições\r\n', 'wmv', 'http://youtu.be/x0uEgxYtW-E', 'Português', 'Linguagem C descomplicada - Atribuição Simplificada\r\n', 'atribuição, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo', NULL),
(16, 'Verbal', 'Reflexivo', '', 'Como utilizar operadores relacionais \r\n', 'wmv', 'http://youtu.be/TlIEIMmutQo', 'Português', 'Linguagem C descomplicada - Operadores Relacionais \r\n', 'operadores relacionais, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo', NULL),
(17, 'Verbal', 'Reflexivo', '', 'Como utilizar o if\r\n', 'wmv', 'http://youtu.be/84mgFRR_ODo', 'Português', 'Linguagem C descomplicada - IF\r\n', 'if, se,  C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo \r\n', NULL),
(18, 'Verbal', 'Reflexivo', '', 'Como utilizar o else \r\n', 'wmv', 'http://youtu.be/YR-ku4OdPJU', 'Português', 'Linguagem C descomplicada- else \r\n', 'else, senão, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil \r\n', 'linear', 'vídeo', NULL),
(19, 'Verbal', 'Reflexivo', '', 'Como fazer aninhamento de if-else \r\n', 'wmv', 'http://youtu.be/JBFgiNJevqc', 'Português', 'Linguagem C descomplicada- aninhamento if-else\r\n', 'if, else, se, senão, aninhamento, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear\r\n', 'vídeo', NULL),
(20, 'Verbal', 'Reflexivo', '', 'Como utilizar o switch \r\n', 'wmv', 'http://youtu.be/z395-PmpzlI', 'Português', 'Linguagem C descomplicada - switch\r\n', 'switch, C\r\n', NULL, NULL, 'Expositivo \r\n', 'Fácil', 'linear', 'vídeo', NULL),
(21, 'Verbal', 'Reflexivo', '', 'Como utilizar o While \r\n\r\n', 'wmv', 'http://youtu.be/3pftIJjsk30', 'Português', 'Linguagem C descomplicada- While\r\n', 'while, enquanto, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo', NULL),
(22, 'Verbal', 'Reflexivo', '', 'Como utilizar o For\r\n', 'wmv', 'http://youtu.be/tlagnwiiIqE', 'Português', 'Linguagem C descomplicada - For\r\n', 'For, para, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo', NULL),
(23, 'Verbal', 'Reflexivo', '', 'Como utilizar o Do While\r\n', 'wmv', 'http://youtu.be/VH6AycSgjN0', 'Português', 'Linguagem C descomplicada- do While\r\n', 'do, while, faça, enquanto, C\r\n', NULL, NULL, NULL, 'Fácil\r\n', 'linear', 'vídeo', NULL),
(24, 'Verbal', 'Reflexivo', '', 'Como utilizar o aninhamento de repetições\r\n', 'wmv', 'http://youtu.be/LXg3HtMbP8E', 'Português', 'Linguagem C descomplicada- aninhamento de repetições\n', 'aninhamento, repetições, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil', 'linear', 'vídeo', NULL),
(25, 'Verbal', 'Reflexivo', '', 'Como utilizar Array e Vetores\r\n', 'wmv', 'http://youtu.be/CtM7o2rsTic', 'Português', 'Linguagem C descomplicada- Array e Vetor\r\n', 'array, vetores, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil', 'linear', 'vídeo', NULL),
(26, 'Verbal', 'Reflexivo', '', 'Como utilizar Array e Matrizes\r\n', 'wmv', 'http://youtu.be/3TP0e-bfdfw', 'Português', 'Linguagem C descomplicada- Array e Matriz\r\n', 'array, matriz, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil\r\n', 'linear', 'vídeo', NULL),
(27, 'Verbal', 'Reflexivo', '', 'Como utilizar Strings\r\n', 'wmv', 'https://youtu.be/5mJZh_ikDaQ', 'Português', 'Linguagem C descomplicada- String\r\n', 'String, C\r\n', NULL, NULL, 'Expositivo\r\n', 'Fácil \r\n', 'linear', 'vídeo', NULL),
(28, 'Verbal', 'Reflexivo', NULL, 'Variáveis e Constantes', 'wmv', 'https://youtu.be/vp4jgXA_BB0', 'Português', 'Lógica de programação - Aula 04 - Variáveis e constantes ', 'Variáveis,constantes, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'vídeo', NULL),
(29, 'Visual', 'Verbal', NULL, 'Os tipos de float e double', 'HTML', 'http://www.cprogressivo.net/2012/12/Os-tipos-float-e-double-numeros-decimais-reais-em-C.html', 'Português', 'Os tipos de float e double', 'Os tipos de float e double', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(30, 'Verbal', 'Reflexivo', NULL, 'Strings', 'wmv', 'https://youtu.be/5-79AxJKfHA', 'Português', 'Curso de lógica de programação em C - Aula 35 - Strings: comandos gets e puts ', 'gets,puts,strings, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'vídeo', NULL),
(31, 'Verbal', 'Reflexivo', NULL, 'Entrada e saída de dados ', 'wmv', 'https://youtu.be/sh_fBYbWXSA', 'Português', 'Entrada e saída de dados ', 'entrada, saída, dados, algoritmo', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'vídeo', NULL),
(32, 'Global', 'Intuitivo', NULL, 'Apostila de Lógica de Programação', 'HTML', 'http://www.inf.ufsc.br/~vania.bogorny/teaching/ine5231/Logica.pdf', 'Português', 'Apostila de Lógica de Programação', 'lógica, programação', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'pdf', NULL),
(33, 'Visual', 'Intuitivo', NULL, 'A biblioteca padrão da linguagem C', 'HTML', 'http://linguagemc.com.br/a-biblioteca-padrao-da-linguagem-c/', 'Português', 'A biblioteca padrão da Linguagem C', 'biblioteca, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página web', NULL),
(34, 'Global', 'Visual', NULL, 'Algoritmo - Comandos de Atribuição/Entrada/Saida ', 'wmv', 'http://espacosi.blogspot.com/2011/02/algoritmo-comandos-de.html', 'Português', 'Algoritmo - Comandos de Atribuição/Entrada/Saida ', 'comandos, atribuição, entrada, saída', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(35, 'Verbal', 'Reflexivo', NULL, 'Quer aprender a programar? Aula 3 - Variáveis, comando de atribuição e comando de leitura. Pascal. ', 'wmv', 'https://youtu.be/760DJEZWP9o', 'Português', 'Quer aprender a programar? Aula 3 - Variáveis, comando de atribuição e comando de leitura. Pascal. ', 'variáveis, comandos de atribuição, comando de leitura', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'vídeo', NULL),
(36, 'Intuitivo', 'Visual', 'Ativo', 'Condicional Composta', 'HTML', 'https://quetalumprograma.wordpress.com/estrutura-condicional/composta/', 'Português', 'Condicional Composta', 'condicional composta, if, else', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(37, 'Visual', 'Ativo', 'Intuitivo', 'round', 'HTML', 'https://help.scilab.org/docs/5.5.1/pt_BR/round.html', 'Português', 'Round()', 'round, abs, rand', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(38, 'Visual', 'Intuitivo', 'Ativo', 'Estruturas condicionais', 'HTML', 'http://estruturacondicional.blogspot.com.br/2008/07/estrutura-condicional-encadeada.html', 'Português', 'Estruturas condicionais', 'estruturas condicionais, if, else, se, senão', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(39, 'Visual', 'Ativo', 'Verbal', 'Operador lógico ''E'' em linguagem C: &&', 'HTML', 'http://www.cprogressivo.net/2013/01/Operadores-logicos-E-OU-e-negacao.html', NULL, 'Operador lógico ''E'' em linguagem C: &&', 'operador lógico, e, &&, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(40, 'Sequencial', 'Visual', 'Ativo', 'Comandos de Repetição', 'HTML', 'http://www.inf.pucrs.br/~pinho/LaproI/ComandosDeRepeticao/Repeticao.html', 'Portugu?s', 'Comandos de Repetição', 'comando de repetição, while, do-while, for', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(41, 'Global', 'Visual', 'Ativo', 'Comando de repetição while', 'HTML', 'https://www.ime.usp.br/~elo/IntroducaoComputacao/Comando%20de%20repeticao%20while.htm', 'Portugu?s', 'Comando de repetição while', 'while, comando de repetição', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(42, 'Verbal ', 'Ativo', 'Visual', '\r\nLógica de Programação: Vetores e Matrizes\r\n', 'HTML', 'http://www.revistabw.com.br/revistabw/vetores-e-matrizes/', 'Português', '\r\nLógica de Programação: Vetores e Matrizes\r\n', 'vetores, matrizes, lógica de programação', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(43, 'Global', 'VIsual', 'Ativo', 'Vetores', 'pdf', 'https://www.ime.usp.br/~hitoshi/introducao/18-vetor.pdf', 'Português', 'Vetores', 'vetores, c', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(44, 'Sequencial', 'Ativo', 'Visual', 'Strings e Caracteres', 'HTML', 'http://www.cprogressivo.net/p/strings-e-caracteres-em-c.html', 'Português', 'Strings e Caracteres', 'strings, caracteres, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(45, 'Global', 'Ativo', 'Visual', 'Comparando palavras em C', 'HTML', 'https://tentandoblogar.wordpress.com/2009/03/15/comparando-palavras-em-c-a-funcao-strcmp/', 'Português', 'Comparando palavras em C: A função strcmp()', 'strcmp(). comparar strings', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(46, 'Reflexivo', 'Ativo', 'Visual', 'Função strcat()', 'HTML', 'http://www.br-c.org/doku.php?id=strcat', 'Português', 'Função strcat()', 'strcat, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web ', NULL),
(47, 'Verbal', 'Visual', 'Ativo', 'Como copiar uma string em C ', 'HTML', 'http://www.cprogressivo.net/2013/03/strcpy-Como-copiar-uma-String-em-C.html', 'Portugu?s', 'Como copiar uma string em C ', 'copiar string, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(48, 'Sequencial', 'Visual', 'Verbal', 'Strings', 'power point ', 'http://pt.slideshare.net/elainececiliagatto/pc-strings', 'Português', 'Strings', 'strings, c', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'apresentação', NULL),
(49, 'Intuitivo', 'Visual', 'Verbal', 'Estrutura de repetição - FOR', 'HTML', 'http://www.tiexpert.net/programacao/c/for.php', 'Português', 'Estrutura de repetição - FOR', 'estrutura de repetição, for, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(50, 'Intuitivo', 'Verbal', 'Visual', 'O comando for em C', 'HTML', 'http://linguagemc.com.br/a-estrutura-de-repeticao-for-em-c/', 'Portugu?s', 'O comando for em C', 'for, C', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(51, 'Visual', 'Verbal', 'Intuitivo', 'Vetores e Matrizes', 'HTML', 'http://linguagemc.com.br/a-estrutura-de-repeticao-for-em-c/', 'Português', 'http://www.slideshare.net/regispires/linguagem-c-05-vetores-e-matrizes-presentation', 'vetores, matrizes', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'página da web', NULL),
(52, 'Visual', 'Verbal', 'Intuitivo', 'Matrizes', 'HTML', 'http://pt.slideshare.net/bosontreinamentos/lgica-de-programao-matrizes-visualg', 'Português', 'Matrizes', 'Matrizes, c', NULL, NULL, 'Expositivo', 'Fácil', 'linear', 'apresentação', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto_estilo`
--

CREATE TABLE `objeto_estilo` (
  `id_objeto_estilo` int(11) NOT NULL,
  `id_objeto` int(11) NOT NULL,
  `id_estilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `objeto_estilo`
--

INSERT INTO `objeto_estilo` (`id_objeto_estilo`, `id_objeto`, `id_estilo`) VALUES
(1, 5, 1),
(7, 6, 2),
(8, 6, 6),
(9, 7, 6),
(10, 7, 2),
(11, 8, 3),
(12, 8, 2),
(13, 9, 6),
(14, 9, 2),
(15, 10, 3),
(16, 10, 2),
(17, 11, 6),
(18, 11, 2),
(19, 12, 6),
(20, 12, 2),
(21, 13, 6),
(22, 13, 2),
(23, 14, 6),
(24, 14, 2),
(25, 15, 2),
(26, 15, 6),
(27, 16, 2),
(28, 16, 6),
(29, 17, 2),
(30, 17, 6),
(31, 18, 2),
(32, 18, 6),
(33, 19, 2),
(34, 19, 6),
(35, 20, 2),
(36, 20, 6),
(37, 21, 2),
(38, 21, 6),
(39, 22, 2),
(40, 22, 6),
(41, 23, 2),
(42, 23, 6),
(43, 24, 2),
(44, 24, 6),
(45, 25, 2),
(46, 25, 6),
(47, 26, 2),
(48, 26, 6),
(49, 27, 2),
(50, 27, 6),
(51, 28, 2),
(52, 28, 6),
(53, 29, 2),
(54, 29, 6),
(55, 30, 2),
(56, 30, 6),
(57, 31, 2),
(58, 31, 6),
(59, 32, 1),
(60, 32, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisas`
--

CREATE TABLE `pesquisas` (
  `id_log` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `natureza` varchar(100) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `topico` varchar(150) NOT NULL,
  `solucao_id` int(11) NOT NULL,
  `duvida` varchar(1000) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `acao` varchar(1000) DEFAULT NULL,
  `data_criacao` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `turma` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pesquisas`
--

INSERT INTO `pesquisas` (`id_log`, `aluno_id`, `natureza`, `tema`, `topico`, `solucao_id`, `duvida`, `feedback`, `acao`, `data_criacao`, `status`, `turma`) VALUES
(1, 3, 'Programação', 'Variáveis', 'Variáveis', 8, 'Não sei como declarar', '', NULL, '2017-02-04', 'N/S', 'TE01'),
(2, 3, 'Programação', 'Estrutura Condicional', 'Estrutura Condicional Simples (Comando if)', 29, 'Não sei como usar', '', NULL, '2017-02-04', 'N/S', 'TE01'),
(3, 3, 'Lógica', 'Matrizes', 'Matrizes', 52, 'Não sei a diferença entre matrizes e vetores', '', NULL, '2017-02-04', 'N/S', 'TE01'),
(4, 3, 'Lógica', 'Vetores', 'Vetores', 64, 'Não sei a diferença entre matrizes e vetores', '', NULL, '2017-02-04', 'N/S', 'TE01'),
(5, 3, 'Lógica', 'Estruturas Condicionais Encadeadas', 'Estruturas Condicionais Encadeadas (Comando if e else aninhados)', 65, 'Não sei se else vem antes do if', 'Dificuldade em ordenar if e else', NULL, '2017-02-04', 'Resolvido', 'TE01'),
(6, 3, 'Programação', 'Strings', 'Strings', 66, 'Não sei como fazer concatenação de uma ou mais strings', '', NULL, '2017-02-04', 'N/S', 'TE01'),
(7, 3, 'Lógica', 'Vetores', 'Vetores', 69, 'Não sei a diferença entre matrizes e vetores', '', 'açãaaaaaaaaaaaaoooooooooo', '2017-02-04', 'Resolvido', 'TE01'),
(8, 3, 'Programação', 'Repetição por Condição', 'Repetição aninhados', 68, 'Como usar o while em repetição aninhada', '', 'uma ação pedagógica', '2017-02-04', 'Resolvido', 'TE01'),
(9, 3, 'Lógica', 'Repetição por Contagem', 'Repetição por Contagem (Comando for)', 67, 'Não sei a diferença entre usar o for e o while', '', 'Mande-me um e-mail para combinarmos um horário na minha sala', '2017-02-04', 'Resolvido', 'TE01'),
(10, 3, 'Programação', 'Variáveis', 'Variáveis', 71, 'Não sei como declarar', '0', 'Mande-me um e-mail para combinarmos um horário na minha sala', '2017-02-05', 'Resolvido', 'TE01'),
(11, 3, 'Programação', 'Matrizes', 'Matrizes', 70, 'Não sei como declarar', 'GAHHHHH', 'GAHHHH', '2017-02-05', 'Resolvido', 'TE01'),
(12, 3, 'Programação', 'Variáveis', 'Variáveis', 60, 'Não sei como declarar', '', '', '2017-02-05', 'Submetido', 'TE01'),
(13, 3, 'Lógica', 'Variáveis', 'Variáveis', 60, 'Não sei como declarar', '', '', '2017-02-05', 'Submetido', 'TE01'),
(14, 3, 'Programação', 'Vetores', 'Vetores', 72, 'Não sei como declarar', 'aluno com dificuldade na declaração de variáveis', 'Mande-me um e-mail para combinarmos um horário na minha sala', '2017-02-05', 'Resolvido', 'TE01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solucaoproblema`
--

CREATE TABLE `solucaoproblema` (
  `id_solucaoProblema` int(11) NOT NULL,
  `diagnostico` varchar(255) NOT NULL,
  `acaoPedagogica` varchar(1000) NOT NULL,
  `objetoAprendizagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solucaoproblema`
--

INSERT INTO `solucaoproblema` (`id_solucaoProblema`, `diagnostico`, `acaoPedagogica`, `objetoAprendizagem`) VALUES
(1, 'aluno com dificuldade na declaração de variáveis', 'assistir vídeo sobre variáveis', 28),
(2, 'aluno não compreendeu o conceito de variável', 'Recomendo a leitura do capítulo 3, Livro introdução a programação-Autor Nilo Ney Coutinho Menezes', NULL),
(3, 'aluno não entendeu sobre constantes', 'assistir vídeo sobre constantes', 11),
(4, 'usuário não compreendeu a diferença entre os tipos de variáveis', 'acessar o link sobre essa diferença entre os tipos de variáveis', 29),
(5, 'Aluno necessita de reforço no conteúdo de tipos de variáveis', 'acessar o slide da Aula 01 - Variáveis', NULL),
(6, 'aluno precisa de reforço no conteúdo tipos numéricos', 'acessar o slide da Aula 01- Variáveis', NULL),
(7, 'aluno compreendeu como declarar uma variável do tipo string', 'assistir vídeo sobre string', 30),
(8, 'aluno com dificuldade em compreender o conceito de variável', 'utilizar um simulador', 2),
(9, 'aluno com dificuldade em compreender os conceitos', 'assistir vídeo sobre o conceito de entrada e saída de dados', 31),
(10, 'aluno com dificuldade em comandos de entrada', 'Apostila de lógica de programação', 32),
(11, 'reforço nas bibliotecas', 'acessar o site sobre bibliotecas', 33),
(12, 'usuário não sabe como utilizar os comentários', 'vídeo sobre comentários em C', 13),
(13, 'aluno não sabe como utilizar os comentários', 'assistir vídeo', 13),
(14, 'aluno com dificuldade em compreender a estrutura do if', 'assistir um vídeo sobre estrutura do if', 17),
(15, 'aluno necessita de reforço no conceito de algoritmo', 'assistir vídeo sobre algoritmos', 5),
(16, 'aluno com dificuldade nos comandos de atribuição', 'acessar site relacionado a comandos de atribuição', 34),
(17, 'usuário necessita de reforço nos comandos de entrada e saída', 'video sobre  Variaveis comando de atribuicao e comando de leitura', 35),
(18, 'aluno precisar reforçar o estudo em operadores relacionais', 'vídeo sobre sobre operadores relacionais', 16),
(19, 'aluno com dificuldade no entendimento do fluxograma do comando if', 'veja a imagem do slide da aula 02', NULL),
(20, 'usuário necessita de um reforço em operadores', 'vídeo sobre operadores', 12),
(21, 'não entendi a estrutura de condicionais composta', 'visualizar o fluxograma da página web', 36),
(22, 'não entendi como deve ser usado os comandos', 'aluno necessita de reforço no conteúdo de estruturas condicionais composta', 36),
(23, 'aluno com dificuldade na função round ()', 'analisar a explicação da página', 37),
(24, 'aluno com dificuldade em estruturas condicionais encadeadas', 'visitar o link recomendado', 38),
(25, 'aluno com dificuldade em operadores lógicos', 'visitar o link recomendado', 39),
(26, 'usuário com dificuldade em estruturas de repetição', 'visualizar o site recomendado', 40),
(27, 'aluno necessita de um reforço em repetição por condição', 'assistir um vídeo', 17),
(28, 'aluno necessita de exemplos para sua compreensão', 'analisar os exemplos comentados da página', 41),
(29, 'aluno deseja mais exemplos de estrutura condicional simples', 'assistir vídeo', 17),
(30, 'aluno com dificuldade em compreender a estrutura de repetição aninhados', 'assistir vídeo', 24),
(31, 'compreender a estrutura de um vetor', 'analisar o conteúdo do link', 42),
(32, 'aluno com dificuldade em vetores', 'analisar o conteúdo do link', 42),
(33, 'aluno necessita de um reforço em vetores', 'assistir vídeo sobre vetores', 25),
(34, 'usuário com dificuldade em vetores', 'analisar o link', 43),
(35, 'auxilio ao aluno na compreensão de busca em vetor', 'analisar o link', 43),
(36, 'reforço no módulo de vetores', 'assistir vídeo sobre vetores', 19),
(37, 'aluno necessita reforço em strings', 'visualizar o link recomendado', 44),
(38, 'aluno com dificuldade em strings', 'acessar a página recomendada', 44),
(39, 'aluno necessita de reforço em strings', 'assistir o vídeo', 27),
(40, 'usuário precisa de auxílio em strings', 'acessar o link recomendado', 45),
(41, 'aluno necessita de auxilio em strings', 'acessar o link recomendado', 46),
(42, 'aluno necessita de apoio em strings', 'acessar o link recomendado', 47),
(43, 'usuário necessita de apoio em strings', 'acessar o slide da aula 05', NULL),
(44, 'aluno necessita de reforço no conteúdo de strings', 'acessar o slide da aula 05', NULL),
(45, 'aluno necessita de reforço no conteúdo de strings', 'visualizar pagina 24 da apresentação', 48),
(46, 'aluno nessita de auxílio em estruturas de repetição', 'acessar o fórum', NULL),
(47, 'aluno nessita de auxílio em estruturas de repetição', 'acessar o slide da aula 06', NULL),
(48, 'aluno com dificuldade em estruturas de repetição', 'acessar o site', 50),
(49, 'aluno com dificuldade em estruturas de repetição', 'acessar o site', 50),
(50, 'aluno com dificuldade em matrizes', 'assistir vídeo', 26),
(51, 'aluno com dificuldade em matrizes', 'assistir vídeo', 26),
(52, 'aluno necessita de reforço em matrizes', 'visualizar a apresentação', 51),
(53, 'aluno necessita de reforço em matrizes', 'assistir vídeo recomendado', 26),
(54, 'aluno necessita de reforço em matrizes', 'visualizar a apresentação', 52),
(55, 'aluno não compreendeu o conceito de algoritmos', 'utilizar um objeto de aprendizagem', 1),
(56, 'aluno não compreendeu o conceito de variável', 'utilizar um objeto de aprendizagem', 6),
(57, 'aluno não compreendeu o conceito de vetores', 'assistir vídeo sobre vetores', 25),
(58, 'ainda não sei utilizar repetições aninhadas', 'assistir vídeo sobre repetições aninhadas', 24),
(59, 'aluno com dificuldade na declaração de variáveis', 'assistir vídeo sobre variáveis', 28),
(60, 'aluno com dificuldade em compreender o conceito de variável', 'utilizar um simulador', 2),
(61, 'aluno deseja mais exemplos de estrutura condicional simples', 'assistir vídeo', 17),
(62, 'aluno necessita de reforço em matrizes', 'visualizar a apresentação', 51),
(63, 'aluno necessita de reforço em matrizes', 'visualizar a apresentação', 51),
(64, 'aluno necessita de reforço em matrizes', 'visualizar a apresentação', 51),
(65, 'Dificuldade em ordenar if e else', 'Mande-me um e-mail para combinarmos um horário na minha sala', NULL),
(66, 'aluno necessita de reforço em strings', 'assistir o vídeo', 27),
(67, 'UM DIAGNOSTICOOOO', 'Mande-me um e-mail para combinarmos um horário na minha sala', NULL),
(68, 'Diagnósticooooooooooooooooooo', 'uma ação pedagógica', NULL),
(69, 'GAHHHHH', 'açãaaaaaaaaaaaaoooooooooo', NULL),
(70, 'GAHHHHH', 'GAHHHH', NULL),
(71, '0', 'Mande-me um e-mail para combinarmos um horário na minha sala', NULL),
(72, 'aluno com dificuldade na declaração de variáveis', 'Mande-me um e-mail para combinarmos um horário na minha sala', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `disciplina_id` int(11) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `estilo` varchar(45) DEFAULT NULL,
  `perfil` varchar(45) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `termo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `curso_id`, `disciplina_id`, `cpf`, `idade`, `estilo`, `perfil`, `senha`, `password_reset_token`, `auth_key`, `termo`) VALUES
(1, 'Aluno Teste', 'priscilla.batista18@hotmail.com', 3, 6, '02806338239', 22, 'Ativo', 'Aluno', '55ef6c7261d3b4f59258af40b8d61435', '', '', 1),
(2, 'Professor Teste', 'tammyhikari@gmail.com', 5, 6, '38236712345', 22, NULL, 'Professor', '55ef6c7261d3b4f59258af40b8d61435', '', '', NULL),
(3, 'TAMMY HIKARI', 'hikari_tammy@hotmail.com', NULL, 6, NULL, NULL, 'Verbal', 'Aluno', '55ef6c7261d3b4f59258af40b8d61435', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `descricaoproblema`
--
ALTER TABLE `descricaoproblema`
  ADD PRIMARY KEY (`id_descProblema`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `fk_id_curso_idx` (`curso_id`);

--
-- Indexes for table `estilo`
--
ALTER TABLE `estilo`
  ADD PRIMARY KEY (`id_estilo`);

--
-- Indexes for table `objetosaprendizagem`
--
ALTER TABLE `objetosaprendizagem`
  ADD PRIMARY KEY (`id_objeto`);

--
-- Indexes for table `objeto_estilo`
--
ALTER TABLE `objeto_estilo`
  ADD PRIMARY KEY (`id_objeto_estilo`);

--
-- Indexes for table `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_idAluno_Log_idx` (`aluno_id`),
  ADD KEY `fk_idSolucao_Log_idx` (`solucao_id`);

--
-- Indexes for table `solucaoproblema`
--
ALTER TABLE `solucaoproblema`
  ADD PRIMARY KEY (`id_solucaoProblema`),
  ADD KEY `fk_idObjeto_Solucao_idx` (`objetoAprendizagem`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_idCurso_Usuario_idx` (`curso_id`),
  ADD KEY `fk_idDisc_Usuario_idx` (`disciplina_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `descricaoproblema`
--
ALTER TABLE `descricaoproblema`
  MODIFY `id_descProblema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `estilo`
--
ALTER TABLE `estilo`
  MODIFY `id_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `objetosaprendizagem`
--
ALTER TABLE `objetosaprendizagem`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `objeto_estilo`
--
ALTER TABLE `objeto_estilo`
  MODIFY `id_objeto_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `pesquisas`
--
ALTER TABLE `pesquisas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `solucaoproblema`
--
ALTER TABLE `solucaoproblema`
  MODIFY `id_solucaoProblema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_idCurso_Disciplina` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id_curso`);

--
-- Limitadores para a tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD CONSTRAINT `fk_idAluno_Log` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_idSolucao_Log` FOREIGN KEY (`solucao_id`) REFERENCES `solucaoproblema` (`id_solucaoProblema`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
