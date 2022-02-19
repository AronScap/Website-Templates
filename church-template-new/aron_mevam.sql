-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Nov-2020 às 21:06
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aron_mevam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_banners`
--

CREATE TABLE `sp_banners` (
  `id` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `link` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_beneficios`
--

CREATE TABLE `sp_beneficios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_beneficios`
--

INSERT INTO `sp_beneficios` (`id`, `titulo`, `descricao`, `foto`) VALUES
(4, 'Exclusividade', 'O San Simone é um privilégio criado para um número limitado de famílias\r\n\r\n', 'beneficios__1567128809_.webp'),
(5, 'Segurança', 'Vigilância e monitoramento 24 horas, para que sua família tenha privacidade e tranquilidade, Sempre.\r\n\r\n', 'beneficios__1567128822_.webp'),
(6, 'Localização', 'Ir e vir para casa nunca foi tão fácil. Almoce com a família todos os dias, sem precisar sair 10 minutos mais cedo ou se atrasar\r\n', 'beneficios__1567128838_.webp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_blog`
--

CREATE TABLE `sp_blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricaoinicial` varchar(1255) NOT NULL,
  `descricao` text CHARACTER SET utf8 NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_blog`
--

INSERT INTO `sp_blog` (`id`, `titulo`, `descricaoinicial`, `descricao`, `data_cadastro`, `video`) VALUES
(21, 'Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                                    cillum dolore eu fugiat nulla pariatur. ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '2020-03-21 17:07:15', ''),
(30, 'Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.', '<p>Lorem ipsum dolor sit amet, consectetur aLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.dipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.ur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.</p>', '2019-08-21 17:07:42', ''),
(31, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                                    cillum dolore eu fugiat nulla pariatur. ', '<p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin. Praesent at tempus lectus, eleifend blandit felis. Fusce augue arcu, consequat a nisl aliquet, consectetur elementum turpis. Donec iaculis lobortis nisl, et viverra risus imperdiet eu. Etiam mollis posuere elit non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis arcu a magna sodales venenatis. Integer non diam sit amet magna luctus mollis ac eu nisi. In accumsan tellus ut dapibus blandit.</p>\r\n<blockquote>\r\n<h6>Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus.</h6>\r\nLiam Neeson</blockquote>\r\n<p>Praesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna. Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>', '2019-08-21 17:07:29', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_blog_fotos`
--

CREATE TABLE `sp_blog_fotos` (
  `id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `capa` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_blog_fotos`
--

INSERT INTO `sp_blog_fotos` (`id`, `id_blog`, `foto`, `capa`) VALUES
(29, 21, 'blog_21_1603483635_aguia.jpg', 0),
(30, 31, 'blog_31_1603483649_leao.jpg', 0),
(31, 30, 'blog_30_1603483662_capa.png', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_blog_tags`
--

CREATE TABLE `sp_blog_tags` (
  `id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_blog_tags`
--

INSERT INTO `sp_blog_tags` (`id`, `id_blog`, `id_tag`) VALUES
(8, 30, 1),
(9, 30, 2),
(10, 30, 3),
(12, 31, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_categorias`
--

CREATE TABLE `sp_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `destaque` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sp_categorias`
--

INSERT INTO `sp_categorias` (`id`, `nome`, `destaque`) VALUES
(1, 'Contrução Civil', 1),
(2, 'Decoração e Acabamento', 1),
(3, 'Chapas, painéis e placas', 0),
(4, 'Isolamento térmico', 0),
(5, 'Caixas térmicas', 0),
(6, 'Embalagens Industriais', 0),
(7, 'Utilidades', 1),
(8, 'Cortes personalizados', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_contatos`
--

CREATE TABLE `sp_contatos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_depoimentos`
--

CREATE TABLE `sp_depoimentos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `cargo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_depoimentos`
--

INSERT INTO `sp_depoimentos` (`id`, `titulo`, `foto`, `data_cadastro`, `facebook`, `instagram`, `linkedin`, `email`, `descricao`, `cargo`) VALUES
(5, 'aron scapin', 'depoimentos_16034155305f922dead6902.png', '0000-00-00 00:00:00', '', '', '', '', 'teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste ', 'asdas d asd asdas'),
(6, 'teste teste', 'depoimentos_16034856105f933faa22031.jpg', '0000-00-00 00:00:00', '', '', '', '', 'asd asdas da sasd asdas da sasd asdas da sasd asdas da sasd asdas da s', 'teste cargo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_empresa`
--

CREATE TABLE `sp_empresa` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `googleAnalytics` text NOT NULL,
  `sobre` text NOT NULL,
  `fotosobre` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `missao` text NOT NULL,
  `visao` text NOT NULL,
  `valores` text NOT NULL,
  `capacita` text NOT NULL,
  `fomenta` text NOT NULL,
  `transforma` text NOT NULL,
  `conecta` text NOT NULL,
  `endereco` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_empresa`
--

INSERT INTO `sp_empresa` (`id`, `titulo`, `googleAnalytics`, `sobre`, `fotosobre`, `video`, `missao`, `visao`, `valores`, `capacita`, `fomenta`, `transforma`, `conecta`, `endereco`) VALUES
(39, 'O QUE SOMOS?', '', 'Somos uma rede de inovação e empreendedorismo que acredita no senso de comunidade, no brilho no olho e nas conexões entre ideias e pessoas. Nos conectamos para transformar as comunidades onde estamos inseridos, capacitar nossos membros e fomentar a inovação.\r\n', '', 'Cq1l76Y8GqQ', 'Promover a inovação e o empreendedorismo para o desenvolvimento sustentável de comunidades vibrantes conforme as vocações locais.', 'Ser nacionalmente reconhecido como um ecossistema que integre regiões em desenvolvimento aos principais hubs de inovação e empreendedorismo do país nos próximos três anos.', 'Ética, transparência, desenvolvimento sustentável, confiança e colaboração.', 'A Strive capacita a equipe da sua empresa ou elenca novos profissionais. Talentos aptos aos novos modelos de trabalho e desafios do mundo conectado.', 'A Strive capacita a equipe da sua empresa ou elenca novos profissionais. Talentos aptos aos novos modelos de trabalho e desafios do mundo conectado.', 'A Strive capacita a equipe da sua empresa ou elenca novos profissionais. Talentos aptos aos novos modelos de trabalho e desafios do mundo conectado.', 'A Strive capacita a equipe da sua empresa ou elenca novos profissionais. Talentos aptos aos novos modelos de trabalho e desafios do mundo conectado.', 'Rua asdasasd Bairro Teste teste. Tubarão - SC, CEP 32806');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_equipe`
--

CREATE TABLE `sp_equipe` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT '',
  `data_cadastro` datetime NOT NULL,
  `cargo` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sp_equipe`
--

INSERT INTO `sp_equipe` (`id`, `titulo`, `foto`, `data_cadastro`, `cargo`) VALUES
(4, 'Pr. Claudir e Pra. Carla', 'equipe_16043466505fa0631ae4f1b.png', '0000-00-00 00:00:00', ''),
(5, 'Pr. Ricardo e Pra. Raquel', 'equipe_16043466645fa06328401ec.png', '0000-00-00 00:00:00', ''),
(6, 'Pr. Renir e Pra. Jonara', 'equipe_16043466975fa0634988fec.png', '0000-00-00 00:00:00', ''),
(7, 'Pr. Everaldo e Pra. Dianês', 'equipe_16043467105fa06356709cb.png', '0000-00-00 00:00:00', ''),
(8, 'Pr. Marcos e Pra. Alexsandra', 'equipe_16043467265fa06366b3b54.png', '0000-00-00 00:00:00', ''),
(9, 'Pr. Luiz e Pra. Gabrielly', 'equipe_16043467385fa063725c52a.png', '0000-00-00 00:00:00', ''),
(10, 'Pr. Valdir e Pra. Angela', 'equipe_16043467485fa0637cda9ce.png', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_galeria`
--

CREATE TABLE `sp_galeria` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `fotomaior` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_galeria`
--

INSERT INTO `sp_galeria` (`id`, `foto`, `fotomaior`) VALUES
(20, 'galeria1__1567128905_.webp', 'galeria2__1567128905_.webp'),
(21, 'galeria1__1567128937_.webp', 'galeria2__1567128937_.webp'),
(22, 'galeria1__1567128975_.webp', 'galeria2__1567128975_.webp'),
(23, 'galeria1__1567129017_.webp', 'galeria2__1567129017_.webp'),
(24, 'galeria1__1567129131_.webp', 'galeria2__1567129131_.webp'),
(25, 'galeria1__1567129190_.webp', 'galeria2__1567129190_.webp'),
(26, 'galeria1__1567129272_.webp', 'galeria2__1567129272_.webp'),
(27, 'galeria1__1567129316_.webp', 'galeria2__1567129316_.webp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_gerais`
--

CREATE TABLE `sp_gerais` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `imagemfundobanner` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `titulobanner` varchar(1231) NOT NULL DEFAULT '',
  `subtitulobanner` varchar(3231) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_gerais`
--

INSERT INTO `sp_gerais` (`id`, `email`, `imagemfundobanner`, `facebook`, `instagram`, `youtube`, `telefone`, `titulobanner`, `subtitulobanner`) VALUES
(18, 'contato@mevamchapeco.org', '', 'https://www.facebook.com/mevamchapeco', 'https://www.instagram.com/mevamchapeco', 'https://www.youtube.com/channel/UC3Y-RZEu6x4DNVfggGCsvJQ?sub_confirmation=1', '(49) 9826-1883', 'Lorem ipsum asdas', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISICING ELIT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_newsletter`
--

CREATE TABLE `sp_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_planos`
--

CREATE TABLE `sp_planos` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `tipodeplanoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sp_planos`
--

INSERT INTO `sp_planos` (`id`, `nome`, `tipodeplanoID`) VALUES
(2, 'MEMBRO STRIVER', 1),
(3, 'DIÁRIAS/TURNOS', 1),
(4, 'PACOTE ROTATIVO STRIVE', 1),
(5, 'PACOTE EXCLUSIVO PRO', 1),
(6, 'PLANO PERSONALIZADO', 1),
(7, 'OFFICE 4', 2),
(8, 'OFFICE 6', 2),
(9, 'OFFICE 8', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_portfolio`
--

CREATE TABLE `sp_portfolio` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT '',
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sp_portfolio`
--

INSERT INTO `sp_portfolio` (`id`, `foto`, `titulo`, `subtitulo`) VALUES
(54, 'portfolio_1594042466_17023818269d10192ae6f3a4ded137f637c73a5159.jpg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(55, 'portfolio_1594042466_19085281579d10192ae6f3a4ded137f637c73a5159.jpeg', 'Náutico', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(56, 'portfolio_1594042466_143262809d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(57, 'portfolio_1594042466_19071213309d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(58, 'portfolio_1594042466_11815965949d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(59, 'portfolio_1594042466_2191508329d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(60, 'portfolio_1594042466_6176174809d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(61, 'portfolio_1594042466_14721151229d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(62, 'portfolio_1594042466_805530799d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(63, 'portfolio_1594042466_6446618539d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(64, 'portfolio_1594042466_528898949d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(65, 'portfolio_1594042466_20054947019d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(66, 'portfolio_1594042466_21009510729d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(67, 'portfolio_1594042466_13599094439d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
(68, 'portfolio_1594042466_11346170609d10192ae6f3a4ded137f637c73a5159.jpeg', 'Residencial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_produtos`
--

CREATE TABLE `sp_produtos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `categoriaID` int(11) NOT NULL,
  `subcategoriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sp_produtos`
--

INSERT INTO `sp_produtos` (`id`, `titulo`, `descricao`, `data_cadastro`, `categoriaID`, `subcategoriaID`) VALUES
(1, 'Teste produto 1', '<p>teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1</p>\r\n<p>teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1teste 1teste1</p>', '2019-08-23 10:23:58', 8, 1),
(2, 'Teste produto 2', '<p>Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2</p>\r\n<p>Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2Teste produto 2&nbsp;Teste produto 2</p>', '2019-08-23 11:13:23', 5, 0),
(3, 'teste 3', '<p>teste</p>', '2019-08-23 11:49:32', 5, 0),
(4, 'teste 4', '<p>dasadsda dsadsa</p>', '2019-08-23 11:49:43', 5, 0),
(5, 'teste 5', '<p>adssadsa&nbsp;</p>', '2019-08-23 11:49:51', 5, 0),
(6, 'teste 6', '', '2019-08-23 11:49:57', 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_produtos_fotos`
--

CREATE TABLE `sp_produtos_fotos` (
  `id` int(11) NOT NULL,
  `produtoID` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sp_produtos_fotos`
--

INSERT INTO `sp_produtos_fotos` (`id`, `produtoID`, `foto`) VALUES
(1, 1, 'produtos_1_1566567354_8515'),
(2, 6, 'produtos_6_1566576530_5019'),
(4, 6, 'produtos_6_1566578715_7975');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_servicos`
--

CREATE TABLE `sp_servicos` (
  `id` int(11) NOT NULL,
  `fotoservico` varchar(255) NOT NULL,
  `titulo` varchar(1055) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_servicos`
--

INSERT INTO `sp_servicos` (`id`, `fotoservico`, `titulo`, `descricao`) VALUES
(9, 'servico9_16035376105f940aca4f3dc.png', 'WORKSHOPS DE INOVAÇÃO', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p>'),
(10, 'servico10_16035376625f940afee82a8.png', 'CONSULTORIAS', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p>'),
(11, 'servico_16035376775f940b0d40d3d.png', 'EVENTOS', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p>'),
(12, 'servico_16035376925f940b1c7dff5.png', 'PROGRAMAS DE CAPACITAÇÃO', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p>'),
(13, 'servico_16035377075f940b2b5a399.png', 'COWORKING', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_servicos_fotos`
--

CREATE TABLE `sp_servicos_fotos` (
  `id` int(11) NOT NULL,
  `servicoID` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sp_servicos_fotos`
--

INSERT INTO `sp_servicos_fotos` (`id`, `servicoID`, `foto`) VALUES
(5, 9, 'blog_9_1594214241_9695776265b73d95735dcb5ae2a4fb3d836168667.jpg'),
(6, 9, 'blog_9_1594214241_5648835015b73d95735dcb5ae2a4fb3d836168667.jpeg'),
(7, 9, 'blog_9_1594214241_18062696645b73d95735dcb5ae2a4fb3d836168667.jpeg'),
(8, 9, 'blog_9_1594214241_14051861655b73d95735dcb5ae2a4fb3d836168667.jpeg'),
(9, 9, 'blog_9_1594214241_21387741405b73d95735dcb5ae2a4fb3d836168667.jpeg'),
(10, 9, 'blog_9_1594214242_1951167244ca42bae6badcb63319d96ccade2e74c1.jpeg'),
(11, 9, 'blog_9_1594214242_1015716344ca42bae6badcb63319d96ccade2e74c1.jpeg'),
(12, 9, 'blog_9_1594214242_967470420ca42bae6badcb63319d96ccade2e74c1.jpeg'),
(13, 10, 'blog_10_1594214258_11779827493da3fdaf27ee0280782dd7aee65d4524.jpeg'),
(14, 10, 'blog_10_1594214258_5093073113da3fdaf27ee0280782dd7aee65d4524.jpeg'),
(15, 10, 'blog_10_1594214258_10243777553da3fdaf27ee0280782dd7aee65d4524.jpeg'),
(16, 10, 'blog_10_1594214258_20966333523da3fdaf27ee0280782dd7aee65d4524.jpeg'),
(17, 10, 'blog_10_1594214258_9114365963da3fdaf27ee0280782dd7aee65d4524.jpeg'),
(18, 10, 'blog_10_1594214258_4695542083da3fdaf27ee0280782dd7aee65d4524.jpeg'),
(19, 10, 'blog_10_1594214258_129392873da3fdaf27ee0280782dd7aee65d4524.jpeg'),
(20, 10, 'blog_10_1594214258_9780208843da3fdaf27ee0280782dd7aee65d4524.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_striverclube`
--

CREATE TABLE `sp_striverclube` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nome` varchar(1000) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sp_striverclube`
--

INSERT INTO `sp_striverclube` (`id`, `foto`, `nome`, `link`) VALUES
(1, 'striverclube_16035360095f940489b7ab5.png', 'donuz', ''),
(2, 'striverclube_16035360685f9404c4e689e.png', 'Fideleco', 'https://www.fideleco.com.br/'),
(3, 'striverclube_16035361455f940511363ff.png', 'Conexa', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_subcategorias`
--

CREATE TABLE `sp_subcategorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sp_subcategorias`
--

INSERT INTO `sp_subcategorias` (`id`, `nome`, `categoriaID`) VALUES
(1, 'Letras e Logotipos', 8),
(3, 'Pranchas e flutuadores', 8),
(4, 'Pieres', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_tags`
--

CREATE TABLE `sp_tags` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_tags`
--

INSERT INTO `sp_tags` (`id`, `nome`) VALUES
(1, 'teste1'),
(2, 'teste2'),
(3, 'Dentes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_tiposdeplanos`
--

CREATE TABLE `sp_tiposdeplanos` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sp_tiposdeplanos`
--

INSERT INTO `sp_tiposdeplanos` (`id`, `nome`) VALUES
(1, 'PLANO DE COWORKING'),
(2, 'PLANO OFFICE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_usuarios`
--

CREATE TABLE `sp_usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_usuarios`
--

INSERT INTO `sp_usuarios` (`id`, `login`, `senha`, `status`) VALUES
(1, 'aron', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(2, 'admin', '8263b2aa4fae520e1b1af763d4ceeb51c7d75a1d', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sp_videos`
--

CREATE TABLE `sp_videos` (
  `id` int(11) NOT NULL,
  `vyt` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `sp_videos`
--

INSERT INTO `sp_videos` (`id`, `vyt`) VALUES
(3, 'kSJJEOwJbLA');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sp_banners`
--
ALTER TABLE `sp_banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_beneficios`
--
ALTER TABLE `sp_beneficios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_blog`
--
ALTER TABLE `sp_blog`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_blog_fotos`
--
ALTER TABLE `sp_blog_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_blog_tags`
--
ALTER TABLE `sp_blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_categorias`
--
ALTER TABLE `sp_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_contatos`
--
ALTER TABLE `sp_contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_depoimentos`
--
ALTER TABLE `sp_depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_empresa`
--
ALTER TABLE `sp_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_equipe`
--
ALTER TABLE `sp_equipe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_galeria`
--
ALTER TABLE `sp_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_gerais`
--
ALTER TABLE `sp_gerais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_newsletter`
--
ALTER TABLE `sp_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_planos`
--
ALTER TABLE `sp_planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_portfolio`
--
ALTER TABLE `sp_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_produtos`
--
ALTER TABLE `sp_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_produtos_fotos`
--
ALTER TABLE `sp_produtos_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_servicos`
--
ALTER TABLE `sp_servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_servicos_fotos`
--
ALTER TABLE `sp_servicos_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_striverclube`
--
ALTER TABLE `sp_striverclube`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_subcategorias`
--
ALTER TABLE `sp_subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_tags`
--
ALTER TABLE `sp_tags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_tiposdeplanos`
--
ALTER TABLE `sp_tiposdeplanos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_usuarios`
--
ALTER TABLE `sp_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sp_videos`
--
ALTER TABLE `sp_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sp_banners`
--
ALTER TABLE `sp_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sp_beneficios`
--
ALTER TABLE `sp_beneficios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sp_blog`
--
ALTER TABLE `sp_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `sp_blog_fotos`
--
ALTER TABLE `sp_blog_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `sp_blog_tags`
--
ALTER TABLE `sp_blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `sp_categorias`
--
ALTER TABLE `sp_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `sp_contatos`
--
ALTER TABLE `sp_contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sp_depoimentos`
--
ALTER TABLE `sp_depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sp_empresa`
--
ALTER TABLE `sp_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `sp_equipe`
--
ALTER TABLE `sp_equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `sp_galeria`
--
ALTER TABLE `sp_galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `sp_gerais`
--
ALTER TABLE `sp_gerais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `sp_newsletter`
--
ALTER TABLE `sp_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sp_planos`
--
ALTER TABLE `sp_planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `sp_portfolio`
--
ALTER TABLE `sp_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `sp_produtos`
--
ALTER TABLE `sp_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sp_produtos_fotos`
--
ALTER TABLE `sp_produtos_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sp_servicos`
--
ALTER TABLE `sp_servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `sp_servicos_fotos`
--
ALTER TABLE `sp_servicos_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `sp_striverclube`
--
ALTER TABLE `sp_striverclube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sp_subcategorias`
--
ALTER TABLE `sp_subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sp_tags`
--
ALTER TABLE `sp_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sp_tiposdeplanos`
--
ALTER TABLE `sp_tiposdeplanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sp_usuarios`
--
ALTER TABLE `sp_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sp_videos`
--
ALTER TABLE `sp_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
