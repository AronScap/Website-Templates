-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04-Dez-2020 às 13:36
-- Versão do servidor: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mevamcha_mevam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `bannerID` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `contatoID` int(11) NOT NULL,
  `nomecompleto` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `telefone` varchar(25) NOT NULL DEFAULT '',
  `lideranca` int(11) NOT NULL DEFAULT '0',
  `telefonelider` varchar(25) NOT NULL DEFAULT '',
  `ministerio` varchar(255) NOT NULL DEFAULT '',
  `datacadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`contatoID`, `nomecompleto`, `email`, `telefone`, `lideranca`, `telefonelider`, `ministerio`, `datacadastro`) VALUES
(1, 'Aron Scapinello', 'aronscapinello@yahoo.com.br', '(49) 99999-9999', 0, '', '', '2020-09-28 08:46:43'),
(2, 'Sara Murari Teres', 'saraterres59@gmail.com', '(49) 99954-7104', 1, '', 'MEVAM CHAPECÓ', '2020-09-30 08:54:43'),
(3, 'Aron Scapinello Selhorst', 'aronscapinello@gmail.com', '(49) 99993-4272', 0, '(49) 98829-4940', 'MEVAM CHAPECÓ', '2020-09-30 09:05:41'),
(4, 'Claudir José Gerhard', 'claudirgerhard@gmail.com', '049 98829-4940', 1, '', 'Mevam Chapecó', '2020-10-01 09:55:36'),
(5, 'Alexsandra Bergmann ', 'alexsandrabairros@gmail.com', '49988081831', 1, '', 'Mevam Chapecó ', '2020-10-01 11:28:12'),
(6, 'Michell Malkovski Schetz', 'prmichell@hotmail.com', '49988247171', 1, '49999247171', 'Caminho do Senhor-Caçador', '2020-10-01 11:57:40'),
(7, 'Marcos Felipe bergmann ', 'marcosfelipebergmann@gmail.com', '49988346690', 1, '', 'Mevam Chapecó ', '2020-10-01 11:59:41'),
(8, 'Débora Slotnicki', 'pradeboraslotnicki@gmail.com', '49988953333', 1, '49988247171', 'Caminho do Senhor-Caçador', '2020-10-01 12:01:32'),
(9, 'Sidnei Juliano Cavalet ', 'powertron.sc@hotmail.com', '49988247171', 1, '', 'Profético ', '2020-10-01 12:09:22'),
(10, 'Andréia Alves Da Conceição Cavalet ', 'cavaletandreia3@gmail.com', '49999516847', 1, '49988247171', 'Caminho do Senhor-Caçador ', '2020-10-01 12:15:20'),
(11, 'Tiago Brum', 'tiagobrum@redemetanoia.com.br', '49991261291', 1, '', 'Rede Metanoia ', '2020-10-01 12:24:02'),
(12, 'CRISTIANE APARECIDA VERTUOSO DE LAZZARI', 'crisdelazzari29@gmail.com', '49999079001', 1, '', 'Quadrangular', '2020-10-01 12:43:05'),
(13, 'Everaldo Adachinari', 'eveadachi@gmail.com', '(49) 98827-1408', 1, '', 'Diaconato', '2020-10-01 12:46:24'),
(14, 'Dianês Ana Schmitz Adachinari', 'dianes_sc@hotmail.com', '(49) 99931-8833', 1, '', 'Diaconato', '2020-10-01 12:48:37'),
(15, 'Ivan Eurico de Lazzari ', 'privandelazzari@hotmail.com', '49999707557', 1, '', 'Quadrangular ', '2020-10-01 12:58:04'),
(16, 'Ricardo Rodrigues Gervazio ', 'ricardo.gervazio@hotmail.com', '(49) 99127-7700', 1, '', 'Mevam', '2020-10-01 13:22:46'),
(17, 'SILVIO CORREA', 'silvioafcorrea@gmail.com', '(49) 99829-0039', 1, '', 'MINISTÉRIO DA RESTAURAÇÃO', '2020-10-01 13:58:08'),
(18, 'Francieli Rosa Selhorst', 'franrosafran92@gmail.com', '(49) 99990-9747', 0, '(49) 98829-4940', 'Mevam Chapecó', '2020-10-01 14:25:58'),
(19, 'Vanderlei gromoski', 'autopecassc@hotmail.com', '(49) 98887-8058', 1, '', 'Lar de Jesus', '2020-10-01 16:25:05'),
(20, 'Jean kelly', 'kellyjean.hti@gmail.com', '49984194335', 1, '', 'Igreja de Deus em Cristo de gosen', '2020-10-01 23:14:18'),
(21, 'Cristiane Pereira', 'venetoautopecas@hotmail.com', '(49) 98875-2751', 1, '', 'Lar de Jesus', '2020-10-02 07:54:44'),
(22, 'RAFAEL BERTOCCHI BELMONTE PAZ', 'rafaelpaz74@gmail.com', '49999765891', 1, '', 'Rede Metanoia', '2020-10-02 11:30:45'),
(23, 'Francisco cachoeira', 'franciscoacachoeira@gmail.com', '(49) 3322-3352', 1, '', 'Min. Rocha viva', '2020-10-02 12:35:43'),
(24, 'Aline T  Cachoeira ', 'atscachoeira@gmail.com', '49 989069824', 1, '', 'Min. Rocha viva', '2020-10-02 12:37:39'),
(25, 'Airton da Silva Carraro Junior ', 'airtoncarraro@hotmail.com', '(49) 9987-7892', 1, '', 'Igreja Quadrangular -Diretor de patrimônios e Diácono. ', '2020-10-02 13:10:13'),
(26, 'Juçara Rosa Marssona', 'marssona@hotmail.com', '49991994556', 1, '', 'Líder de louvor ', '2020-10-02 13:30:42'),
(27, 'Gabriel Henrique Gerhard gabrielgerhard10@gmail ', 'gabrielgerhard10@gmail.com', '49988148811', 0, '49988498189', 'MEVAM Chapecó ', '2020-10-02 16:11:12'),
(28, 'Atanil Maguerroski dos Santos', 'atanilmaguerroski@gmail.com', '49984252272', 1, '', 'Mevam Chapecó ', '2020-10-02 16:13:36'),
(29, 'Odete Ao Guedes Ruth dos Santos', 'guedesruthodete@gmail.com', '49984299669', 1, '', 'Mevam Chapecó ', '2020-10-02 16:32:05'),
(30, 'Carla Gerhard ', 'carlagerhard81@gmail.com', '49988098180', 1, '', 'Mevam Chapecó ', '2020-10-02 16:42:16'),
(31, 'Tiago André kachniasz Spinelli', 'tiagokspinelli@hotmail.com', '54999435147', 0, '49988294940', 'Mevam Chapecó', '2020-10-02 19:11:47'),
(32, 'Vanderson Almorin', 'almorin.vanderson@gmail.com', '49988596499', 1, '', 'Ministério da Família', '2020-10-02 19:32:11'),
(33, 'Márcia Sirtolli Almorin', 'marciasirtoli@hotmail.com', '49988161817', 1, '', 'Ministério da Família', '2020-10-02 19:51:08'),
(34, 'Clair Almorin', 'marciasirtoli@gmail.com', '(49)99830-6057', 1, '', 'Pastora', '2020-10-02 20:38:32'),
(35, 'Roselaine Aparecida Peixoto Barboza Spinelli', 'tiagospinelli1@gmail.com', '54999435147', 0, '', 'Mevam Chapecó', '2020-10-03 05:31:18'),
(36, 'Priscila Ruth Dos Santos Padilha ', 'priscilaruthdossantos@hotmail.com', '49984098772', 0, ' 49988294940', 'MEVAM', '2020-10-03 05:40:18'),
(37, 'Ana Karoline Peixoto Spinelli', 'tiagokspinelli2018@gmail.com', '54999435147', 0, '', 'Mevam Chapecó', '2020-10-03 05:41:10'),
(38, 'Volnei Dias Padilha', 'pri.ruthpadilha@gmail.com', '49989144611', 0, '', 'Mevam ', '2020-10-03 05:47:08'),
(39, 'Ivandro Borges da Silva', 'evandroborgesdasilva@hotmail.com', '49988588348', 1, '', 'Pastor', '2020-10-03 06:41:48'),
(40, 'Álvaro Júnior Dalemole', 'alvarojuniordalemole@gmail.com', '49988717994', 1, '', 'Louvor', '2020-10-03 06:44:18'),
(41, 'Marcelo Augusto Paza', 'marcelopaza7@gmail.com', '49985032580', 0, ' 49 8829-4940', 'Mevam', '2020-10-03 14:18:46'),
(42, 'Luana Ruth dos Santos Paza', 'luanaruth65@gmail.com', '49984077596', 0, '', 'Mevam', '2020-10-03 14:20:04'),
(43, 'Vilso de Souza', 'desouzavilso@gmail.com', '49 991824580', 1, '', 'VENHA O TEU REINO', '2020-10-03 17:02:59'),
(44, 'Luiza Teresinha Tapparello De Souza', 'luizatapparello@gmail.com', '49991020668', 1, '', 'VENHA O TEU REINO', '2020-10-03 17:05:50'),
(45, 'Lucas Arno Agrimpho ', 'lucasarnoagrimpho@gmail.com', '49999454063', 1, '', 'Mevam Chapecó ', '2020-10-03 17:45:23'),
(46, 'Gabriela Agrimpho Arno ', 'gaabiii@unochapeco.edu.br', '49999994063', 1, '', 'Mevam Chapecó ', '2020-10-03 17:47:56'),
(47, 'Daniel Leocir da Silva', 'dani.dav83@gmail.com', '49998118135', 1, '', 'Mevam Chapecó', '2020-10-03 18:02:11'),
(48, 'Ana Paula Romanzini da Silva ', 'ana.pneumo@gmail.com', '49998219893', 1, '', 'Mevam Chapecó ', '2020-10-03 18:06:33'),
(49, 'Vanderlei Joaquim', 'vanderlei.joaquim@hotmail.com', '(49) 99193-0069', 1, '', 'Mevan ', '2020-10-03 18:08:36'),
(50, 'Itamara Costa', 'tamaracosta31@yahoo.com.br', '(49) 98415-1987', 0, '(49) 98827-1408', 'Diaconato ', '2020-10-03 18:17:58'),
(51, 'MARIA APARECIDA RODRIGUES', 'rikrafacida@hotmail.com', '49 9991477788', 1, '', 'DIACONATO', '2020-10-03 18:21:54'),
(52, 'Pedro Henrique Ferreira do Prado ', 'pedrohenriqueferreiradoprado@gmail.com', '49988625828', 1, '', 'Mevam Chapecó ', '2020-10-03 18:22:15'),
(53, 'Anderson Luiz Vaz ', 'luandervaz@gmail.com', '49988856353', 0, '49988294940', 'Mevam ', '2020-10-03 18:25:38'),
(54, 'Renata Lepre Joaquim', 'renataleprejoaquim@gmail.com', '49991520023', 0, '49991930069', 'MEVAM', '2020-10-03 18:25:42'),
(55, 'Rafael Rodrigues Gervazio', 'rafaelrodriguesgervazio@gmail.com', '49992028768', 0, '49991277700', 'Mevam', '2020-10-03 18:26:02'),
(56, 'Daline Gonçalves Lobato Gervazio', 'dalinegoncalveslobato@gmail.com', '49991597972', 1, '', 'Mevam', '2020-10-03 18:27:46'),
(57, 'Julia Pacheco De Oliveira ', 'juliacbc@hotmail.com', '(49) 98855-5963', 0, '(49) 98855-5963', 'Intercessão ', '2020-10-03 18:29:54'),
(58, 'Alekssandro Reolon Jardim', 'alekssandroreolon@gmail.com', '49991561973', 0, '+5549991561973', 'Ministério Venha o Teu Reino', '2020-10-03 18:39:33'),
(59, 'Paulo Henrique da conceição Bruno', 'polooohcb@gmail.com', '(49) 99828-1423', 1, '', 'Ministério Venha o teu Reino ', '2020-10-03 18:40:58'),
(60, 'Ester de Menezes Reolon Jardim', 'esterdemenezesteka@gmail.com', '49991321103', 1, '', 'Ministério Venha o Teu Reino', '2020-10-03 18:41:09'),
(61, 'Jean do carmo', 'Jeandocarmo@ymail.com', '46 999207646', 1, '', 'Mep', '2020-10-03 18:53:05'),
(62, 'Lenir Alves Dos Santos ', 'leniracosta74@gmail.com', '988208593', 1, '', 'Intercessão ', '2020-10-03 18:53:37'),
(63, 'Grazi ', 'Jeandocarmo1@gmail.com', '46 999207646', 1, '', 'Mep', '2020-10-03 18:53:43'),
(64, 'Ana Cláudia Santos Salles Bruno', 'anphjesus@gmail.com', '49 998268636', 1, '', 'Ministério Venha o teu Reino ', '2020-10-03 19:06:21'),
(65, 'Siliandra Lorinava Piazza', 'siliandrajose0807@gmail.com', '49989182053', 0, '49988208593', 'Exército de Cristo', '2020-10-03 19:08:49'),
(66, 'Gabriel Marafon', 'gabriela-gasparetto@hotmail.com', '49998238442', 1, '', 'Louvor / crianças /dança ', '2020-10-03 19:17:46'),
(67, 'Célia Peccini', 'celiapeccini@gmail.com', '49999674353', 0, '49988208593', 'Exército de Cristo', '2020-10-03 19:18:17'),
(68, 'Gabriela Natália Gasparetto Marafon', 'marafongabriel24@gmail.com', '49999012795', 1, '', ' crianças /dança', '2020-10-03 19:21:32'),
(69, 'José Paulo Brandão Neves', 'josepaulobrandaoneves13@gmail.com', '91984367174', 0, '91985133179', 'Comunidade Evangélica Eterna Aliança', '2020-10-03 19:40:23'),
(70, 'Olavo Martins Brum Neto', 'olavo_brum@hotmail.com', '(49) 99918-7908', 1, '', 'Facilitador Mevam Academy ', '2020-10-03 20:50:06'),
(71, 'Igor Pizani Gonzaga', 'igorpizanigonzaga@gmail.com', '49989266516', 0, '49988294940', 'Mevam - Chapecó', '2020-10-03 21:08:28'),
(72, 'Lilian Eliza Pizani Gonzaga', 'pizanigonzaga@gmail.com', '49988367976', 0, '', 'Mevam - Chapecó', '2020-10-03 21:10:48'),
(73, 'Raquel Lima de Carvalho Gervazio', 'raquellima22@hotmail.com', '49991102210', 1, '', 'Mevam Chapecó', '2020-10-03 21:55:51'),
(74, 'Evandro Alex Nemerski', 'evandro_02@unochapeco.edu.br', '49998052648', 0, '49988294940', 'Mevam Chapecó', '2020-10-03 22:15:10'),
(75, 'Jamille Brandão Neves Nemerski', 'jamille.neves@unochapeco.edu.br', '49999777447', 0, '49988294940', 'Mevam Chapecó', '2020-10-03 22:17:52'),
(76, 'Itamar Adolfo', 'itaadolf@gmail.com', '49-999168563', 0, '49 988271408', 'Mevam Chapecó', '2020-10-03 23:29:13'),
(77, 'Noeli De Moras', 'noelimoras@gmail.com', '49 9988247132', 0, '49 988271408', 'Mevam Chapecó', '2020-10-03 23:32:38'),
(78, 'Junior Gonçalves', 'junniorgoncalves@hotmail.com', '46991347377', 1, '', 'Ministério Envagelistico Plenitude', '2020-10-03 23:49:36'),
(79, 'Marcelo Kuhn adachinari ', 'marceloadachinari@hotmail.com', '49988728553', 0, '989231961', 'Louvor', '2020-10-03 23:50:33'),
(80, 'Charlene F. adachinari ', 'cadachinari@hotmail.com', '49988728553', 0, '', 'Louvor', '2020-10-03 23:53:06'),
(81, 'Karine Carla Nemerski ', 'karinenemerski@gmail.com', '49 9 9969-7860 ', 1, '', 'Adolescentes', '2020-10-04 01:20:20'),
(82, 'Patrícia leme siqueira', 'patricia_vettori@hotmail.com', '49998177187', 1, '', 'Intercessão ', '2020-10-04 07:23:32'),
(83, 'Cacilda Quintanas Lopes', 'Cacildaquintas49@gmail.com', '49999580149', 0, '49988294940', 'Mevam', '2020-10-04 09:00:41'),
(84, 'Andréia Malagutti Carpes', 'andreia.malagutti@gmail.com', '(49) 99918-7901', 0, '(49) 98820-4002', 'Ministério de Dança ', '2020-10-04 09:50:20'),
(85, 'Ketlyn Lorany Tapparello Salles', 'ketlynlts@gmail.com', '(49) 99181-3344', 0, '(49) 99102-0668', 'Ministério Venha o Teu Reino', '2020-10-04 10:30:24'),
(86, 'Sandra Mara Teixeira Ferreora', 'sandraadservi@hotmail.com', '49989253621', 0, '49988294940', 'Mevam Chapeco', '2020-10-04 11:35:03'),
(87, 'Karina Aparecida Dias Devens', 'karinadias0102@gmail.com', '49999784340', 1, '', 'Mevam Chapecó', '2020-10-04 11:54:32'),
(88, 'Maykon Dias Devens', 'maykon-devens@outlook.com', '49999083288', 1, '', 'Mevam Chapecó ', '2020-10-04 11:55:59'),
(89, 'Yulixa Gomez Rivero Fecker', 'feckeryulixa47@gmail.com', '49-98926-7250', 0, '4999110-2210', 'Ministério de mulheres', '2020-10-04 13:08:50'),
(90, 'Emerson Fecker da Costa', 'emerson.fecker@gmail.com', '4998915-6515', 0, '4998829-4940', 'Mevam-Chapecó', '2020-10-04 13:19:10'),
(91, 'Renir José de bairros', 'rd-bairros@bol.com.br', '49998136167', 1, '', 'Convivo', '2020-10-04 15:12:56'),
(92, 'Tiago Rodrigo Batista', 'tiagobatist@gmail.com', '46991287073', 1, '', 'Ministério Evangelístico Plenitude', '2020-10-04 20:21:00'),
(93, 'Tiago Oliveira ', 'tiago.oliveira@grupohls.com.br', '(49) 99134-1306', 0, '(49) 98829-4940', 'MEVAM Chapecó ', '2020-10-04 21:20:16'),
(94, 'Débora de souza', 'deboraasza96@gmail.com', '37998411052', 0, '49988294940', 'Mevam', '2020-10-04 22:10:56'),
(95, 'Carlos laste', 'laste8548@hotmal.com', '49991162730', 0, '49991824580', 'Ministerio Venha o teu reino', '2020-10-05 11:47:09'),
(96, 'Idaiana Laste', 'idaianalaste@gmail.com', '4999077170', 0, '49991824580', 'Ministerio Venha o teu reino', '2020-10-05 11:54:14'),
(97, 'Vitor Laste', 'vitinhomatte444@gmail.com', '49991545436', 0, '49991824580', 'Ministerio Venha o teu reino', '2020-10-05 11:57:36'),
(98, 'Maria Jodite Cardoso De Souza Silva', 'maria.jodite@hotmail.com', '49999223407', 0, '49991824580', 'VENHA O TEU REINO', '2020-10-05 12:09:56'),
(99, 'Venilda Zanella', 'venildazanella1234@gmail.com', '49988189198', 1, '', 'Exército de Cristo', '2020-10-05 14:13:42'),
(100, 'Grazieli bertan do carmo ', 'grazibertan@gmail.com', '46991213993', 1, '', 'Minoaterio Plenitude ', '2020-10-05 14:30:28'),
(101, 'Luan Dos Santos ', 'luansloan.music@gmail.com', '49984127507', 0, '49984127507', 'Ainda  não tenho ministério, estou começando agora na carreira musical gospel.', '2020-10-06 01:27:29'),
(102, 'Marcos Antonio Rodrigues ', 'marcosrodrigues92053@gmail.com', '49988491135', 0, '', 'Mevan chapeco', '2020-10-06 07:51:03'),
(103, 'Kaylane Rodrigues', 'kaylanerodrigues010@gmail.com', '(49) 99950-4518', 1, '', 'Mevam ', '2020-10-06 11:23:31'),
(104, 'Lessandro dos Santos', 'lessandrosantos9@gmail.com', '49 988432359', 1, '', 'Diáconal', '2020-10-06 11:33:18'),
(105, 'MAICON RODRIGO VODZIK', 'maiconvodzik@gmail.com', '4989016363', 0, '4989016363', 'Mevan ', '2020-10-06 12:22:34'),
(106, 'Heloiza da Silva Silva ', 'heloiza_ss@hotmail.com', '4991641471', 1, '', 'Mevan ', '2020-10-06 13:14:36'),
(107, 'Marcelo Bertoncello ', 'gmbertoncello@gmail.com', '499917551153', 1, '', 'HB ', '2020-10-06 13:19:05'),
(108, 'Sandra Mara Teixeira Ferreira ', 'sandraadservi@hotmil.com', '49 89253621', 0, '88271408', 'Diaconato', '2020-10-06 15:23:58'),
(109, 'Leonardo Machado', 'leonardo.colibri2015@gmail.com', '49998329891', 1, '', 'Jovens', '2020-10-06 18:31:39'),
(110, 'Simone Batisti Giroldi', 'simonegiroldi@yahoo.com.br', '(49) 99139-1306', 0, '(49) 98829-4940', '(041 49) 98829-4940', '2020-10-07 07:46:58'),
(111, 'thiago bernardi', 'thiago.dai@hotmail.com', '49999332725', 0, '(49) 99933-2725', 'nao', '2020-10-07 08:04:14'),
(112, 'Rogerio Ernani Galon ', 'rogerio@ottimizza.com', '47 99653 0300', 0, '49 991277700', 'Mevam', '2020-10-07 09:09:43'),
(113, 'Jones Evandro Woloszyn', 'emilycarolinebw@gmail.com', '49988875335', 0, '49988294940', 'Mevam', '2020-10-08 11:08:58'),
(114, 'JEAN MICHEL ROTAVA', 'jeanrotava@hotmail.com', '(46) 99980-9999', 0, '(46) 99973-6000', 'igreja irmaos menonitas', '2020-10-09 10:47:50'),
(115, 'douglas rotta', 'douglas@rottatecnologia.com.br', '(46) 98803-7656', 0, '46 9973-6000', 'Igreja irmãos Menonitas', '2020-10-09 10:56:36'),
(116, 'Jorge Luis Fernandes da Silva', 'jordanfilhinha@bol.com.br', '49 999421044', 0, '49 984 117411', 'Assembleia de Deus Fé para as nações', '2020-10-09 12:41:32'),
(117, 'André Pagnussat', 'isosed.andrepagnussat@gmail.com', '(49) 98403-1098', 1, '', 'Isosed', '2020-10-09 17:53:13'),
(118, 'Anderson André Fernandes knechtel', 'andersonknechtel88@gmail.com.br', '49999547104', 0, '49999547104', 'MEVAM ', '2020-10-09 19:11:02'),
(119, 'Erma', 'erma.mcclemens@yahoo.com', '06-31253613', 0, '', '', '2020-10-13 10:39:04'),
(120, 'Nicholas', 'nicholas.mcaulay12@gmail.com', '66 519 74 37', 0, '', '', '2020-10-13 17:30:58'),
(121, 'WilliamArind', 'no-replyPaycle@gmail.com', '87653353688', 0, '', '', '2020-10-15 15:53:01'),
(122, 'Toney', 'information@mevamchapeco.org', '(03) 5350 8989', 0, '', '', '2020-10-24 16:14:20'),
(123, 'Eric', 'ericjonesonline@outlook.com', '555-555-1212', 0, '', '', '2020-11-15 11:00:14'),
(124, 'Alva', 'mevamchapeco.org@mevamchapeco.org', '062 924 34 22', 0, '', '', '2020-11-21 10:04:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatomsg`
--

CREATE TABLE `contatomsg` (
  `contatomsgID` int(11) NOT NULL,
  `contatoID` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `datacadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contatomsg`
--

INSERT INTO `contatomsg` (`contatomsgID`, `contatoID`, `mensagem`, `datacadastro`) VALUES
(2, 1, 'teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste ', '2020-09-28 08:51:56'),
(3, 1, 'asdsadsad', '2020-09-28 08:53:58'),
(4, 119, 'It is with great pleasure that we are announcing the public launch of UsualProspects.net, a solution to generate more leads.\r\n\r\nWe make lead generation much easier by giving you access to huge lists of leads that match your own criteria.\r\n\r\nBoost your company’s success by finding the right opportunities to grow within your own market.\r\n\r\nStart utilizing your newly generated lead data to convert your potential customers with easy to set up outreach campaigns.\r\n\r\nDiscover the power of better prospecting by trying Usual Prospects and see how much quicker you can generate prospects.\r\n\r\nLeave your competition far behind by finding the fresh opportunities in your market with Usual Prospects now.\r\n\r\nStart saving yourself hours a week by getting access to our tools at https://usualprospects.net', '2020-10-13 10:39:05'),
(5, 120, 'It is with great pleasure that we are announcing the public launch of UsualProspects.net, a solution to generate more leads.\r\n\r\nWe make lead generation much easier by giving you access to huge lists of leads that match your own criteria.\r\n\r\nBoost your company’s success by finding the right opportunities to grow within your own market.\r\n\r\nStart utilizing your newly generated lead data to convert your potential customers with easy to set up outreach campaigns.\r\n\r\nDiscover the power of better prospecting by trying Usual Prospects and see how much quicker you can generate prospects.\r\n\r\nLeave your competition far behind by finding the fresh opportunities in your market with Usual Prospects now.\r\n\r\nStart saving yourself hours a week by getting access to our tools at https://usualprospects.net', '2020-10-13 17:30:58'),
(6, 121, 'Good day!  mevamchapeco.org \r\n \r\nDid you know that it is possible to send business offer fully lawful? \r\nWe suggesting a new method of sending letter through contact forms. Such forms are located on many sites. \r\nWhen such commercial offers are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nalso, messages sent through feedback Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis letter is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693', '2020-10-15 15:53:02'),
(7, 122, 'ATT: mevamchapeco.org / Mevam Chapecó WEBSITE SOLUTIONS\r\nThis notification RUNS OUT ON: Oct 24, 2020\r\n\r\n\r\nWe have not gotten a settlement from you.\r\nWe  have actually attempted to contact you but were incapable to contact you.\r\n\r\n\r\nKindly Browse Through: https://grabify.link/N3I8SV .\r\n\r\nFor information and to process a discretionary payment for services.\r\n\r\n\r\n\r\n10242020085154.\r\n', '2020-10-24 16:14:21'),
(8, 123, 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at mevamchapeco.org.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=mevamchapeco.org\r\n', '2020-11-15 11:00:14'),
(9, 124, 'Your domain name: mevamchapeco.org\r\n\r\nNOTICE OF DISCONTINUATION of the following\r\n\r\nMevam Chapecó\r\n\r\nThis announcement ENDS ON: Nov 21, 2020!\r\n\r\n\r\nWe have actually not obtained a payment from you.\r\nWe\'ve attempted to email you yet were unable to reach you.\r\n\r\n\r\nPlease See:  https://cutt.ly/9hrnebB\r\n\r\n\r\nFor information and to process a discretionary settlement for solutions.\r\n\r\n\r\n11212020070428.\r\n', '2020-11-21 10:04:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `eventoID` int(11) NOT NULL,
  `datacadastro` date NOT NULL,
  `nome` varchar(1210) NOT NULL,
  `vagas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`eventoID`, `datacadastro`, `nome`, `vagas`) VALUES
(1, '2020-10-10', 'Café da Aliança', 140);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricaoevento`
--

CREATE TABLE `inscricaoevento` (
  `inscricaoeventoID` int(11) NOT NULL,
  `contatoID` int(11) NOT NULL,
  `datacadastro` datetime NOT NULL,
  `eventoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `inscricaoevento`
--

INSERT INTO `inscricaoevento` (`inscricaoeventoID`, `contatoID`, `datacadastro`, `eventoID`) VALUES
(2, 2, '2020-09-30 08:54:43', 1),
(3, 3, '2020-09-30 09:05:41', 1),
(4, 4, '2020-10-01 09:55:36', 1),
(5, 5, '2020-10-01 11:28:15', 1),
(6, 6, '2020-10-01 11:57:41', 1),
(7, 7, '2020-10-01 11:59:42', 1),
(8, 8, '2020-10-01 12:01:33', 1),
(9, 9, '2020-10-01 12:09:22', 1),
(10, 10, '2020-10-01 12:15:21', 1),
(12, 12, '2020-10-01 12:43:05', 1),
(13, 13, '2020-10-01 12:46:24', 1),
(14, 14, '2020-10-01 12:48:37', 1),
(15, 15, '2020-10-01 12:58:05', 1),
(16, 16, '2020-10-01 13:22:46', 1),
(17, 17, '2020-10-01 13:58:08', 1),
(18, 18, '2020-10-01 14:25:59', 1),
(19, 19, '2020-10-01 16:25:05', 1),
(20, 20, '2020-10-01 23:14:18', 1),
(21, 21, '2020-10-02 07:54:44', 1),
(22, 22, '2020-10-02 11:30:45', 1),
(23, 23, '2020-10-02 12:35:44', 1),
(24, 24, '2020-10-02 12:37:39', 1),
(25, 25, '2020-10-02 13:10:13', 1),
(26, 26, '2020-10-02 13:30:42', 1),
(27, 27, '2020-10-02 16:11:12', 1),
(28, 28, '2020-10-02 16:13:36', 1),
(29, 29, '2020-10-02 16:32:06', 1),
(30, 30, '2020-10-02 16:42:16', 1),
(31, 31, '2020-10-02 19:11:47', 1),
(32, 32, '2020-10-02 19:32:11', 1),
(33, 33, '2020-10-02 19:51:08', 1),
(34, 34, '2020-10-02 20:38:32', 1),
(35, 35, '2020-10-03 05:31:18', 1),
(36, 36, '2020-10-03 05:40:18', 1),
(37, 37, '2020-10-03 05:41:10', 1),
(38, 38, '2020-10-03 05:47:08', 1),
(39, 39, '2020-10-03 06:41:48', 1),
(40, 40, '2020-10-03 06:44:18', 1),
(41, 41, '2020-10-03 14:18:47', 1),
(42, 42, '2020-10-03 14:20:04', 1),
(43, 43, '2020-10-03 17:02:59', 1),
(44, 44, '2020-10-03 17:05:50', 1),
(47, 47, '2020-10-03 18:02:11', 1),
(48, 48, '2020-10-03 18:06:33', 1),
(49, 49, '2020-10-03 18:08:36', 1),
(50, 50, '2020-10-03 18:17:58', 1),
(51, 51, '2020-10-03 18:21:55', 1),
(52, 52, '2020-10-03 18:22:15', 1),
(53, 53, '2020-10-03 18:25:39', 1),
(54, 54, '2020-10-03 18:25:42', 1),
(55, 55, '2020-10-03 18:26:02', 1),
(57, 57, '2020-10-03 18:29:55', 1),
(58, 58, '2020-10-03 18:39:33', 1),
(59, 59, '2020-10-03 18:40:58', 1),
(60, 60, '2020-10-03 18:41:09', 1),
(61, 61, '2020-10-03 18:53:05', 1),
(62, 62, '2020-10-03 18:53:37', 1),
(63, 63, '2020-10-03 18:53:44', 1),
(64, 64, '2020-10-03 19:06:21', 1),
(66, 66, '2020-10-03 19:17:46', 1),
(67, 67, '2020-10-03 19:18:18', 1),
(68, 68, '2020-10-03 19:21:33', 1),
(69, 69, '2020-10-03 19:40:23', 1),
(70, 70, '2020-10-03 20:50:06', 1),
(71, 71, '2020-10-03 21:08:28', 1),
(72, 72, '2020-10-03 21:10:48', 1),
(73, 73, '2020-10-03 21:55:51', 1),
(74, 74, '2020-10-03 22:15:10', 1),
(75, 75, '2020-10-03 22:17:52', 1),
(76, 76, '2020-10-03 23:29:13', 1),
(77, 77, '2020-10-03 23:32:38', 1),
(78, 78, '2020-10-03 23:49:36', 1),
(79, 79, '2020-10-03 23:50:33', 1),
(80, 80, '2020-10-03 23:53:06', 1),
(81, 81, '2020-10-04 01:20:21', 1),
(82, 82, '2020-10-04 07:23:32', 1),
(83, 83, '2020-10-04 09:00:42', 1),
(85, 85, '2020-10-04 10:30:24', 1),
(86, 86, '2020-10-04 11:35:03', 1),
(87, 87, '2020-10-04 11:54:32', 1),
(88, 88, '2020-10-04 11:55:59', 1),
(91, 91, '2020-10-04 15:12:56', 1),
(92, 92, '2020-10-04 20:21:00', 1),
(94, 94, '2020-10-04 22:10:56', 1),
(95, 95, '2020-10-05 11:47:09', 1),
(96, 96, '2020-10-05 11:54:14', 1),
(97, 97, '2020-10-05 11:57:36', 1),
(98, 98, '2020-10-05 12:10:00', 1),
(99, 99, '2020-10-05 14:13:43', 1),
(100, 100, '2020-10-05 14:30:28', 1),
(101, 101, '2020-10-06 01:27:29', 1),
(102, 102, '2020-10-06 07:51:03', 1),
(103, 103, '2020-10-06 11:23:31', 1),
(104, 104, '2020-10-06 11:33:18', 1),
(105, 105, '2020-10-06 12:22:34', 1),
(106, 106, '2020-10-06 13:14:37', 1),
(107, 107, '2020-10-06 13:19:05', 1),
(108, 108, '2020-10-06 15:24:00', 1),
(109, 109, '2020-10-06 18:31:43', 1),
(110, 110, '2020-10-07 07:46:59', 1),
(111, 111, '2020-10-07 08:04:14', 1),
(112, 112, '2020-10-07 09:09:43', 1),
(113, 113, '2020-10-08 11:08:58', 1),
(114, 114, '2020-10-09 10:47:50', 1),
(115, 115, '2020-10-09 10:56:36', 1),
(116, 116, '2020-10-09 12:41:32', 1),
(117, 117, '2020-10-09 17:53:14', 1),
(118, 118, '2020-10-09 19:11:02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ministracao`
--

CREATE TABLE `ministracao` (
  `ministracaoID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL DEFAULT '',
  `datacadastro` date NOT NULL DEFAULT '0001-01-01',
  `pastorID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pastor`
--

CREATE TABLE `pastor` (
  `pastorID` int(11) NOT NULL,
  `nomecompleto` varchar(255) NOT NULL DEFAULT '',
  `fotoperfil` varchar(255) NOT NULL DEFAULT '',
  `casadocompastorID` int(11) NOT NULL DEFAULT '0',
  `sexo` varchar(25) NOT NULL DEFAULT '',
  `fotocasal` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sp_banners`
--

INSERT INTO `sp_banners` (`id`, `data_cadastro`, `link`, `foto`, `descricao`, `titulo`, `subtitulo`) VALUES
(1, '0000-00-00 00:00:00', '', 'banners_16044297935fa1a7e13e99c.jpg', '', 'ARREPENDEI-VOS', 'Porque é chegado o Reino dos Céus');

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
(20, 'contato@mevamchapeco.org', '', 'https://www.facebook.com/mevamchapeco', 'https://www.instagram.com/mevamchapeco', 'https://www.youtube.com/c/mevamchapeco?sub_confirmation=1', '(49) 9826-1883', '', '');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bannerID`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`contatoID`);

--
-- Indexes for table `contatomsg`
--
ALTER TABLE `contatomsg`
  ADD PRIMARY KEY (`contatomsgID`),
  ADD KEY `contato_contaomsg` (`contatoID`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`eventoID`);

--
-- Indexes for table `inscricaoevento`
--
ALTER TABLE `inscricaoevento`
  ADD PRIMARY KEY (`inscricaoeventoID`),
  ADD KEY `inscricaoevento_evento` (`eventoID`),
  ADD KEY `inscricao_contato` (`contatoID`);

--
-- Indexes for table `ministracao`
--
ALTER TABLE `ministracao`
  ADD PRIMARY KEY (`ministracaoID`);

--
-- Indexes for table `pastor`
--
ALTER TABLE `pastor`
  ADD PRIMARY KEY (`pastorID`),
  ADD KEY `pastor_pastorcasadocom` (`casadocompastorID`);

--
-- Indexes for table `sp_banners`
--
ALTER TABLE `sp_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_beneficios`
--
ALTER TABLE `sp_beneficios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_blog`
--
ALTER TABLE `sp_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_blog_fotos`
--
ALTER TABLE `sp_blog_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_blog_tags`
--
ALTER TABLE `sp_blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_categorias`
--
ALTER TABLE `sp_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_contatos`
--
ALTER TABLE `sp_contatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_depoimentos`
--
ALTER TABLE `sp_depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_empresa`
--
ALTER TABLE `sp_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_equipe`
--
ALTER TABLE `sp_equipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_galeria`
--
ALTER TABLE `sp_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_gerais`
--
ALTER TABLE `sp_gerais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_newsletter`
--
ALTER TABLE `sp_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_planos`
--
ALTER TABLE `sp_planos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_portfolio`
--
ALTER TABLE `sp_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_produtos`
--
ALTER TABLE `sp_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_produtos_fotos`
--
ALTER TABLE `sp_produtos_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_servicos`
--
ALTER TABLE `sp_servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_servicos_fotos`
--
ALTER TABLE `sp_servicos_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_striverclube`
--
ALTER TABLE `sp_striverclube`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_subcategorias`
--
ALTER TABLE `sp_subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_tags`
--
ALTER TABLE `sp_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_tiposdeplanos`
--
ALTER TABLE `sp_tiposdeplanos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_usuarios`
--
ALTER TABLE `sp_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_videos`
--
ALTER TABLE `sp_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bannerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `contatoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `contatomsg`
--
ALTER TABLE `contatomsg`
  MODIFY `contatomsgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `eventoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inscricaoevento`
--
ALTER TABLE `inscricaoevento`
  MODIFY `inscricaoeventoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `ministracao`
--
ALTER TABLE `ministracao`
  MODIFY `ministracaoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pastor`
--
ALTER TABLE `pastor`
  MODIFY `pastorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_banners`
--
ALTER TABLE `sp_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sp_beneficios`
--
ALTER TABLE `sp_beneficios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sp_blog`
--
ALTER TABLE `sp_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sp_blog_fotos`
--
ALTER TABLE `sp_blog_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sp_blog_tags`
--
ALTER TABLE `sp_blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sp_categorias`
--
ALTER TABLE `sp_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sp_contatos`
--
ALTER TABLE `sp_contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_depoimentos`
--
ALTER TABLE `sp_depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sp_empresa`
--
ALTER TABLE `sp_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sp_equipe`
--
ALTER TABLE `sp_equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sp_galeria`
--
ALTER TABLE `sp_galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sp_gerais`
--
ALTER TABLE `sp_gerais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sp_newsletter`
--
ALTER TABLE `sp_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_planos`
--
ALTER TABLE `sp_planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sp_portfolio`
--
ALTER TABLE `sp_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sp_produtos`
--
ALTER TABLE `sp_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sp_produtos_fotos`
--
ALTER TABLE `sp_produtos_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sp_servicos`
--
ALTER TABLE `sp_servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sp_servicos_fotos`
--
ALTER TABLE `sp_servicos_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sp_striverclube`
--
ALTER TABLE `sp_striverclube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sp_subcategorias`
--
ALTER TABLE `sp_subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sp_tags`
--
ALTER TABLE `sp_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sp_tiposdeplanos`
--
ALTER TABLE `sp_tiposdeplanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sp_usuarios`
--
ALTER TABLE `sp_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sp_videos`
--
ALTER TABLE `sp_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contatomsg`
--
ALTER TABLE `contatomsg`
  ADD CONSTRAINT `contato_contaomsg` FOREIGN KEY (`contatoID`) REFERENCES `contato` (`contatoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `inscricaoevento`
--
ALTER TABLE `inscricaoevento`
  ADD CONSTRAINT `inscricao_contato` FOREIGN KEY (`contatoID`) REFERENCES `contato` (`contatoID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscricaoevento_evento` FOREIGN KEY (`eventoID`) REFERENCES `evento` (`eventoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pastor`
--
ALTER TABLE `pastor`
  ADD CONSTRAINT `pastor_pastorcasadocom` FOREIGN KEY (`casadocompastorID`) REFERENCES `pastor` (`pastorID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
