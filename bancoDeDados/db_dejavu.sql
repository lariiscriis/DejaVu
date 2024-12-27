-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2024 at 01:48 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dejavu`
--

-- --------------------------------------------------------

--
-- Table structure for table `artista`
--

CREATE TABLE `artista` (
  `cd_artista` varchar(277) COLLATE utf8_bin NOT NULL,
  `nm_artista` varchar(277) COLLATE utf8_bin DEFAULT NULL,
  `nm_website_artista` varchar(277) COLLATE utf8_bin DEFAULT NULL,
  `ds_informacao_artista` varchar(277) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `artista`
--

INSERT INTO `artista` (`cd_artista`, `nm_artista`, `nm_website_artista`, `ds_informacao_artista`) VALUES
('CLAS111', 'Ludwig van Beethoven', 'https://www.beethoven.com', 'Compositor e pianista alemão, um dos maiores compositores da história da música clássica, conhecido por sua \"Sinfonia No. 5\".'),
('CLAS211', 'Richard Wagner', 'https://www.wagner.com', 'Compositor alemão, famoso por suas óperas épicas, como \"O Anel do Nibelungo\".'),
('CLAS222', 'Johann Sebastian Bach', 'https://www.bach.com', 'Compositor e músico alemão, conhecido por suas obras-primas como \"Concerto de Brandemburgo\".'),
('CLAS333', 'Wolfgang Amadeus Mozart', 'https://www.mozart.com', 'Compositor austríaco, considerado um dos maiores músicos da história, famoso por suas óperas e sinfonias.'),
('CLAS444', 'Pyotr Ilyich Tchaikovsky', 'https://www.tchaikovsky.com', 'Compositor russo, famoso por suas obras como \"O Lago dos Cisnes\" e \"A Abertura 1812\".'),
('CLAS555', 'Frédéric Chopin', 'https://www.chopin.com', 'Compositor e pianista polonês, conhecido por suas obras para piano solo, como \"Nocturnes\" e \"Preludes\".'),
('CLAS666', 'Antonio Vivaldi', 'https://www.vivaldi.com', 'Compositor e violinista italiano, famoso por sua obra \"As Quatro Estações\".'),
('CLAS777', 'Claude Debussy', 'https://www.debussy.com', 'Compositor francês, conhecido por sua música impressionista, incluindo \"Clair de Lune\" e \"La Mer\".'),
('CLAS888', 'Giuseppe Verdi', 'https://www.verdi.com', 'Compositor italiano, famoso por suas óperas, como \"La Traviata\" e \"Aida\".'),
('CLAS999', 'Gustav Mahler', 'https://www.mahler.com', 'Compositor austríaco, famoso por suas sinfonias e por sua obra \"Sinfonia No. 2\" (Ressurreição).'),
('HIPHOP111', 'Tupac Shakur', 'https://www.2pac.com', 'Rapero americano e ativista, considerado um dos maiores nomes do hip-hop, com álbuns icônicos como \"All Eyez on Me\".'),
('HIPHOP211', 'Rick Ross', 'https://www.rickross.co', 'Rapper e empresário, conhecido por sua gravadora Maybach Music Group e álbuns como \"Deeper Than Rap\".'),
('HIPHOP222', 'Jay-Z', 'https://www.jay-z.com', 'Rapper, empresário e mogul, um dos artistas mais bem-sucedidos da história do hip-hop, conhecido por \"The Blueprint\" e \"Empire State of Mind\".'),
('HIPHOP333', 'Kanye West', 'https://www.kanyewest.com', 'Rapper e produtor musical, famoso por seus álbuns inovadores como \"My Beautiful Dark Twisted Fantasy\" e \"The College Dropout\".'),
('HIPHOP444', 'Nas', 'https://www.nasirjones.com', 'Rapper americano, conhecido por suas habilidades líricas e álbuns influentes como \"Illmatic\" e \"Stillmatic\".'),
('HIPHOP555', 'Drake', 'https://www.drakeofficial.com', 'Rapper canadense e um dos artistas mais influentes do hip-hop contemporâneo, com hits como \"Hotline Bling\" e \"In My Feelings\".'),
('HIPHOP666', 'Eminem', 'https://www.eminem.com', 'Rapper e compositor americano, conhecido por seu estilo provocador e álbuns como \"The Marshall Mathers LP\".'),
('HIPHOP777', 'Kendrick Lamar', 'https://www.kendricklamar.com', 'Rapper americano e vencedor de prêmios Grammy, conhecido por álbuns como \"To Pimp a Butterfly\" e \"DAMN.\"'),
('HIPHOP888', 'J. Cole', 'https://www.jcolemusic.com', 'Rapper e produtor musical americano, conhecido por álbuns como \"2014 Forest Hills Drive\" e \"KOD\".'),
('HIPHOP999', 'Lil Wayne', 'https://www.lilwayneofficial.com', 'Rapper americano, conhecido por sua carreira solo e também por ser um dos maiores influenciadores do rap moderno.'),
('POP111', 'Ariana Grande', 'https://www.arianagrande.com', 'Cantora e atriz americana, conhecida por sua voz poderosa e seus hits pop como \"Thank U, Next\" e \"Into You\".'),
('POP211', 'Lady Gaga', 'https://www.ladygaga.com', 'Cantora, atriz e ativista, conhecida por sua música pop extravagante e hits como \"Poker Face\" e \"Bad Romance\".'),
('POP222', 'Taylor Swift', 'https://www.taylorswift.com', 'Cantora e compositora americana que faz sucesso com suas músicas pop e country, como \"Shake It Off\" e \"Love Story\".'),
('POP333', 'Dua Lipa', 'https://www.dualipa.com', 'Cantora e compositora britânica, conhecida por seu estilo de música pop e disco, incluindo o hit \"New Rules\".'),
('POP444', 'Billie Eilish', 'https://www.billieeilish.com', 'Cantora e compositora americana, famosa por seu estilo único de pop alternativo e músicas como \"Bad Guy\" e \"Ocean Eyes\".'),
('POP555', 'Ed Sheeran', 'https://www.edsheeran.com', 'Cantor e compositor britânico, conhecido por hits como \"Shape of You\" e \"Castle on the Hill\".'),
('POP666', 'Adele', 'https://www.adele.com', 'Cantora britânica famosa por suas baladas emocionais e poderosas, incluindo \"Someone Like You\" e \"Hello\".'),
('POP777', 'Olivia Rodrigo', 'https://www.oliviarodrigo.com', 'Cantora e atriz americana, conhecida por seu álbum de estreia \"SOUR\", com faixas como \"drivers license\" e \"good 4 u\".'),
('POP888', 'Shawn Mendes', 'https://www.shawnmendesofficial.com', 'Cantor canadense que ganhou fama com hits como \"Stitches\" e \"Señorita\", uma colaboração com Camila Cabello.'),
('POP999', 'Katy Perry', 'https://www.katyperry.com', 'Cantora e compositora americana conhecida por sua imagem vibrante e hits como \"Roar\" e \"Teenage Dream\".'),
('ROCK111', 'Pink Floyd', 'https://www.pinkfloyd.com', 'Banda britânica icônica, conhecida por sua música progressiva e álbuns lendários como \"The Dark Side of the Moon\".'),
('ROCK211', 'The Clash', 'https://www.theclash.com', 'Banda britânica de punk rock formada nos anos 70, com músicas como \"London Calling\" e \"Should I Stay or Should I Go\".'),
('ROCK222', 'Nirvana', 'https://www.nirvana.com', 'Banda grunge americana liderada por Kurt Cobain, famosa pelo álbum \"Nevermind\" e pelo hit \"Smells Like Teen Spirit\".'),
('ROCK333', 'The Rolling Stones', 'https://www.rollingstones.com', 'Banda britânica de rock formada nos anos 60, com uma carreira de sucessos, incluindo \"Satisfaction\" e \"Paint It Black\".'),
('ROCK444', 'Led Zeppelin', 'https://www.ledzeppelin.com', 'Banda britânica de rock formada nos anos 60, com álbuns clássicos e a famosa \"Stairway to Heaven\".'),
('ROCK555', 'Foo Fighters', 'https://www.foofighters.com', 'Banda americana formada por Dave Grohl, com hits como \"Learn to Fly\" e \"Everlong\".'),
('ROCK666', 'Radiohead', 'https://www.radiohead.com', 'Banda britânica experimental, conhecida por álbuns como \"OK Computer\" e \"Kid A\".'),
('ROCK777', 'U2', 'https://www.u2.com', 'Banda de rock irlandesa formada nos anos 70, com hits como \"With or Without You\" e \"I Still Haven\'t Found What I\'m Looking For\".'),
('ROCK888', 'The White Stripes', 'https://www.whitestripes.com', 'Banda americana de rock formada por Jack White, famosa pela música \"Seven Nation Army\".'),
('ROCK999', 'David Bowie', 'https://www.davidbowie.com', 'Cantor, compositor e ator britânico, um dos maiores ícones do rock, conhecido por sua música e imagem extravagantes.'),
('artista_674da4e3cca1f0.83317703', 'Beyoncé', NULL, NULL),
('artista_674da62f978c65.19440871', 'Beyoncé', NULL, NULL),
('artista_674da67d3e3244.42655472', 'Beyoncé', NULL, NULL),
('artista_674da7690685b1.38434209', 'Beyoncé', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `nm_email` varchar(277) COLLATE utf8_bin DEFAULT NULL,
  `cd_cliente` int(11) NOT NULL,
  `nm_usuario` varchar(277) COLLATE utf8_bin DEFAULT NULL,
  `nm_senha` varchar(277) COLLATE utf8_bin DEFAULT NULL,
  `nm_endereco` varchar(277) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`nm_email`, `cd_cliente`, `nm_usuario`, `nm_senha`, `nm_endereco`) VALUES
('sasa@fatec', 1, 'sabrina', '$2y$10$MGhZaLm5F/iDQBJDXd9b9Ooy5mVk0hF5PCvB57wXlEvIYTd9OQDae', NULL),
('juju@fatec', 2, 'Julia', '$2y$10$X2F1FSBDezYEWpuvd1OHzeJMJtW5SGRX8h9njN3zHFtnnbz6QyDAS', NULL),
('aluno@fate', 3, 'aluno', '$2y$10$QvW5lwCy0GzP9ZnNgeK9POvGoY4URmf9Rw/btlFDOV29hqau01WBq', NULL),
('bentolaris', 4, 'Larissa', '2', NULL),
('sasa@fatec.com', 5, 'sabrina', '$2y$10$23PVa5deG.7.d2uKW0n9UOvTpeINnMVbWwi.HE0Es5IUkRcZ7nv4O', NULL),
('teste@teste', 6, 'teste', '$2y$10$f7F1ytHp718r6osv6dP0teXrBkU0aCd71dvT6VVx/v5iJJStQZmU.', NULL),
('larissa3@gmail', 7, 'larissa2', '$2y$10$/2OQUMMMeDIgQgKkd6VXDeP84fmu59/vO1rKh8UnKR8cmBSaumP4e', NULL),
('larissa2@gmail', 8, 'larissa2', '$2y$10$ewckUQr3LuKWDO2il7Qd2uQCmGgMxdZJLvGteR5LvYcIuDmHB3JRK', NULL),
('larissa4@gmail', 9, 'larissa4', '$2y$10$Q9EXq2U.yVwkpgNcETLWr.AMJbUSAF7NPU2edvYfzR/A30s7KYDTm', NULL),
('lar@lar', 10, 'lar', '$2y$10$U.tacVB6BpGGoeEpRiCCfu7xuNYRdLDw/VkRX.gpRsz7gz1ASgzam', NULL),
('lari5@l', 11, 'lll', '$2y$10$VzBdFy2hn.5UhW1PzFy5DO4U0dtnMIE9bUqIc9/9HKrBPShfbNRs2', NULL),
('Rod@rod', 13, 'Rodrigo Paulo Santana', '$2y$10$ItNKlpIndgT4uTDwCZuE4OEwHaqM3OIdfMqSbnSR1XB3EdkyBzZhi', 'Avenida Clodoardo Amaral'),
('keren1422bento@gmail.com', 14, 'keren1422bento@gmail.com', '$2y$10$biLAtTcBeBm/ytl.8Iq1jOff9osyZnm3QHwuhQCK4c3rVTtDphD0O', '06 Avenida Clodoardo Amaral'),
('larissa@gmail.com', 15, 'Larissa Cristina Bento Santana', '$2y$10$J4MvQThd1GktoQKYGrzBE.JxGwPnDYunl.DLHrVbTeJzmZuBtbdfG', '06 Avenida Clodoardo Amaral'),
('l@l', 16, 'Larissa Cristina Bento Santana', '$2y$10$5i62GC5y7bG.TUwwvZmSJOlXp5u5YVokiyRv09Z1p8e/pXitIZzz2', '06 Avenida Clodoardo Amaral'),
('adm123@gmail.com', 18, 'adm', '$2y$10$EDV0haLzl21EQ8qlrT0fd.kcho/HMWAgndpLWN5tGb9.y2xNNW8Wy', 'Fatec - Praia Grande'),
('larissa13@gmail', 21, 'larissa12', '$2y$10$d2C1/ysScMZkeTMQHww5lOy1UxIfm9ceV0a/dxmExGYbubUKCmMMS', '06 Avenida Clodoardo Amaral'),
('conta2@gmail.com', 22, 'conta2', '$2y$10$oac7RSmwDrkgr2E7x4/preW9x2vG.XJKjt.wFbgH4FHEdlknP/Cle', '06 Avenida Clodoardo Amaral');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `cd_newsletter` int(11) NOT NULL,
  `nm_cliente_newsletter` varchar(255) COLLATE utf8_bin NOT NULL,
  `nm_email_newsletter` varchar(255) COLLATE utf8_bin NOT NULL,
  `nm_telefone_newsletter` varchar(20) COLLATE utf8_bin NOT NULL,
  `ds_mensagem_newsletter` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`cd_newsletter`, `nm_cliente_newsletter`, `nm_email_newsletter`, `nm_telefone_newsletter`, `ds_mensagem_newsletter`) VALUES
(1, 'Larissa Cristina', 'larissa.santana.ae2020@gmail.com', '13992013328', 'Primeira mensagem de teste para o newsletter'),
(2, 'Larissa Cristina Bento Santana', 'larissa.santana.ae2020@gmail.com', '13992013328', 'Teste de mensagem no newsletter');

-- --------------------------------------------------------

--
-- Table structure for table `pagamento_pedido`
--

CREATE TABLE `pagamento_pedido` (
  `cd_pagamento` int(11) NOT NULL,
  `vl_pagamento` decimal(10,2) DEFAULT NULL,
  `dt_pagamento` datetime DEFAULT NULL,
  `nm_metodo_pagamento` varchar(255) DEFAULT NULL,
  `vl_total_pedido` decimal(10,2) DEFAULT NULL,
  `cd_cliente` int(11) DEFAULT NULL,
  `cd_vinil` varchar(277) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pagamento_pedido`
--

INSERT INTO `pagamento_pedido` (`cd_pagamento`, `vl_pagamento`, `dt_pagamento`, `nm_metodo_pagamento`, `vl_total_pedido`, `cd_cliente`, `cd_vinil`, `quantidade`) VALUES
(1, '46.00', '2024-12-02 01:31:50', 'Boleto', '46.00', 1, 'POP001', 1),
(2, '300.00', '2024-12-02 01:32:19', 'Pix', '300.00', 1, 'POP002', 6),
(3, '50.00', '2024-12-02 05:20:24', 'Boleto', '50.00', 1, 'POP002', 1),
(4, '96.00', '2024-12-02 05:29:28', 'Pix', '96.00', 1, 'POP001', 1),
(5, '96.00', '2024-12-02 05:29:28', 'Pix', '96.00', 1, 'POP002', 1),
(6, '200.00', '2024-12-21 19:43:09', 'Paypal', '200.00', 22, 'HIPHOP001', 2),
(7, '200.00', '2024-12-21 19:43:11', 'Paypal', '200.00', 22, 'CLAS002', 1),
(8, '80.00', '2024-12-26 16:03:36', 'Cartão De Crédito', '80.00', 22, 'CLAS001', 1),
(9, '100.00', '2024-12-26 22:32:16', 'Paypal', '100.00', 22, 'vinil_674da62f978905.19989685', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vinil`
--

CREATE TABLE `vinil` (
  `cd_vinil` varchar(277) COLLATE utf8_bin NOT NULL,
  `dt_lancamento_vinil` datetime DEFAULT NULL,
  `im_vinil` varchar(277) COLLATE utf8_bin DEFAULT NULL,
  `nm_titulo_vinil` varchar(277) COLLATE utf8_bin DEFAULT NULL,
  `categoria_vinil` varchar(277) COLLATE utf8_bin NOT NULL,
  `ds_informacoes_vinil` varchar(277) COLLATE utf8_bin DEFAULT NULL,
  `qt_estoque_vinil` decimal(10,0) DEFAULT NULL,
  `vl_preco_unitario_vinil` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vinil`
--

INSERT INTO `vinil` (`cd_vinil`, `dt_lancamento_vinil`, `im_vinil`, `nm_titulo_vinil`, `categoria_vinil`, `ds_informacoes_vinil`, `qt_estoque_vinil`, `vl_preco_unitario_vinil`) VALUES
('CLAS001', '1974-01-01 00:00:00', 'https://i.ebayimg.com/images/g/-P8AAOSwg0FgLVcd/s-l1600.webp', 'Ludwig van Beethoven - Symphony No. 5', 'CLÁSSICA', 'Uma das sinfonias mais famosas de Beethoven, com sua imortal \"Ode to Joy\".', '10', '80'),
('CLAS002', '1961-07-30 00:00:00', 'https://eu.rarevinyl.com/cdn/shop/products/johann-sebastian-bach-brandenburg-concertos-1-2-and-3-uk-vinyl-lp-album-record-ccv5007-595022_1000x993.jpg?v=1709048008', 'Johann Sebastian Bach - Brandenburg Concertos', 'CLÁSSICA', 'Álbum com as obras-primas de Bach, incluindo os Concerto de Brandemburgo.', '12', '90'),
('CLAS003', '1978-10-21 00:00:00', 'https://imusic.b-cdn.net/images/item/original/346/0190296611346.jpg?nikolaus-harnoncourt-2021-mozart-requiem-lp&class=scaled&v=1628470373', 'Wolfgang Amadeus Mozart - Requiem', 'CLÁSSICA', 'Álbum clássico com a famosa obra de Mozart, o Requiem.', '15', '85'),
('CLAS004', '1985-05-20 00:00:00', 'https://imusic.b-cdn.net/images/item/original/203/0190295892203.jpg?andre-previn-2017-tchaikovsky-swan-lake-lp&class=scaled&v=1488057388', 'Pyotr Ilyich Tchaikovsky - Swan Lake', 'CLÁSSICA', 'Uma das mais belas composições de Tchaikovsky, incluindo a famosa dança do cisne.', '18', '95'),
('CLAS005', '1990-06-15 00:00:00', 'https://universalmusic.vtexassets.com/arquivos/ids/183514-800-auto?v=638254721690570000&width=800&height=auto&aspect=true', 'Frédéric Chopin - Nocturnes', 'CLÁSSICA', 'Álbum com as mais belas peças para piano solo de Chopin.', '10', '92'),
('CLAS006', '2000-03-10 00:00:00', 'https://imusic.b-cdn.net/images/item/original/201/0190295317201.jpg?itzhak-perlman-2020-vivaldi-the-four-seasons-vin-lp&class=scaled&v=1594890947', 'Antonio Vivaldi - The Four Seasons', 'CLÁSSICA', 'As famosas estações de Vivaldi, tocadas em diferentes épocas do ano.', '20', '85'),
('CLAS007', '1963-01-20 00:00:00', 'https://universalmusic.vtexassets.com/arquivos/ids/179373-800-auto?v=638060247469200000&width=800&height=auto&aspect=true', 'Claude Debussy - Clair de Lune', 'CLÁSSICA', 'A famosa peça para piano de Debussy, tocada por grandes músicos.', '15', '80'),
('CLAS008', '1972-09-14 00:00:00', 'https://vinils3.s3.amazonaws.com/wp-content/uploads/2021/02/22121522/33-9.png', 'Giuseppe Verdi - La Traviata', 'CLÁSSICA', 'Ópera famosa de Verdi, com melodias inesquecíveis e um enredo dramático.', '13', '100'),
('CLAS009', '2008-04-10 00:00:00', 'https://vinils3.s3.amazonaws.com/wp-content/uploads/2021/03/12170029/c1-7.png', 'Gustav Mahler - Symphony No. 2', 'CLÁSSICA', 'A famosa \"Sinfonia da Ressurreição\" de Mahler.', '10', '105'),
('CLAS010', '2012-09-11 00:00:00', 'https://m.media-amazon.com/images/I/511HMGzqgWL._SX300_SY300_QL70_FMwebp_.jpg', 'Richard Wagner - The Ring Cycle', 'CLÁSSICA', 'Ciclo de óperas épicas de Wagner, considerado uma das maiores obras da música clássica.', '12', '120'),
('HIPHOP001', '1996-02-13 00:00:00', 'https://m.media-amazon.com/images/I/61+qKiRPXlL._AC_SX679_.jpg', 'Tupac - All Eyez on Me', 'HIPHOP', 'Álbum duplo de Tupac, considerado um dos maiores álbuns do hip-hop de todos os tempos.', '18', '55'),
('HIPHOP002', '2003-03-23 00:00:00', 'https://universalmusic.vtexassets.com/arquivos/ids/173532-800-auto?v=637834794924500000&width=800&height=auto&aspect=true', 'Jay-Z - The Black Album', 'HIPHOP', 'Álbum de sucesso de Jay-Z, com faixas como \"99 Problems\" e \"Encore\".', '20', '60'),
('HIPHOP003', '2010-11-22 00:00:00', 'https://m.media-amazon.com/images/I/71BjhQlaLPL.__AC_SX300_SY300_QL70_ML2_.jpg', 'Kanye West - My Beautiful Dark Twisted Fantasy', 'HIPHOP', 'Álbum de Kanye West, com influências do rock e do soul, incluindo \"Runaway\" e \"Power\".', '25', '70'),
('HIPHOP004', '2001-10-23 00:00:00', 'https://imusic.b-cdn.net/images/item/original/113/0664425145113.jpg?nas-2020-stillmatic-lp&class=scaled&v=1576796582', 'Nas - Stillmatic', 'HIPHOP', 'Álbum clássico de Nas, com faixas como \"One Mic\" e \"Ether\".', '15', '50'),
('HIPHOP005', '2015-09-04 00:00:00', 'https://imusic.b-cdn.net/images/item/original/450/0602547973450.jpg?drake-2016-if-youre-reading-this-its-too-late-lp&class=scaled&v=1475772560', 'Drake - If You\'re Reading This It\'s Too Late', 'HIPHOP', 'Álbum de Drake, com faixas como \"Energy\" e \"Know Yourself\".', '22', '60'),
('HIPHOP006', '2004-11-23 00:00:00', 'https://imusic.b-cdn.net/images/item/original/013/0606949329013.jpg?eminem-2002-the-eminem-show-lp&class=scaled&v=1089209201', 'Eminem - The Eminem Show', 'HIPHOP', 'Álbum de Eminem, considerado um dos melhores da carreira, incluindo \"Lose Yourself\" e \"Without Me\".', '18', '65'),
('HIPHOP007', '2011-06-14 00:00:00', 'https://i.discogs.com/YfRyxz8o7OAoEkfXf8peNTxDdezyb1ItSRHAIpEo84s/rs:fit/g:sm/q:90/h:586/w:600/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTE0NzQ2/NjcxLTE1ODA3NzIx/ODMtNTU4My5qcGVn.jpeg', 'Kendrick Lamar - Section.80', 'HIPHOP', 'Álbum de Kendrick Lamar que marcou o início da sua ascensão ao topo do hip-hop.', '20', '55'),
('HIPHOP008', '2017-04-14 00:00:00', 'https://m.media-amazon.com/images/I/81fvHieWxRL.__AC_SX300_SY300_QL70_ML2_.jpg', 'J. Cole - 4 Your Eyez Only', 'HIPHOP', 'Álbum com temas introspectivos de J. Cole, incluindo \"Deja Vu\" e \"Neighbors\".', '16', '60'),
('HIPHOP009', '2007-03-13 00:00:00', 'https://m.media-amazon.com/images/I/71m3GANMwEL._AC_SX679_.jpg', 'Lil Wayne - Tha Carter III', 'HIPHOP', 'Álbum de Lil Wayne, incluindo hits como \"A Milli\" e \"Lollipop\".', '30', '50'),
('HIPHOP010', '2009-11-24 00:00:00', 'https://m.media-amazon.com/images/I/61q-w5evEbL._SX300_SY300_QL70_FMwebp_.jpg', 'Rick Ross - Deeper Than Rap', 'HIPHOP', 'Álbum de Rick Ross, com faixas como \"Maybach Music\" e \"Luxury Tax\".', '20', '55'),
('POP001', '2023-01-01 00:00:00', 'https://m.media-amazon.com/images/I/813UN+yulaL._AC_SL1500_.jpg', 'Ariana Grande - Dangerous Woman', 'POP', 'Álbum de Ariana Grande, lançado em 2016, com hits como \"Dangerous Woman\" e \"Into You\".', '20', '50'),
('POP002', '2019-06-14 00:00:00', 'https://m.media-amazon.com/images/I/81jw1bKlYyL._AC_SY355_.jpg', 'Taylor Swift - 1989', 'POP', 'Álbum icônico de Taylor Swift de 2014, com grandes sucessos pop como \"Shake It Off\".', '15', '50'),
('POP004', '2020-03-27 00:00:00', 'https://m.media-amazon.com/images/I/51HxNhN0pOL.__AC_SY300_SX300_QL70_ML2_.jpg', 'Billie Eilish - When We All Fall Asleep, Where Do We Go?', 'POP', 'Álbum de Billie Eilish com uma sonoridade única, incluindo \"Bad Guy\" e \"Bury A Friend\".', '45', '60'),
('POP005', '2017-04-21 00:00:00', 'https://m.media-amazon.com/images/I/B1HYJn9MrPS._AC_SY450_.jpg', 'Ed Sheeran - ÷ (Divide)', 'POP', 'Álbum de Ed Sheeran, com sucessos como \"Shape of You\" e \"Castle on the Hill\".', '22', '48'),
('POP006', '2015-10-23 00:00:00', 'https://m.media-amazon.com/images/I/71VcJXBDgEL.__AC_SY300_SX300_QL70_ML2_.jpg', 'Adele - 25', 'POP', 'Álbum de Adele, ganhador de prêmios, com faixas como \"Hello\" e \"When We Were Young\".', '30', '52'),
('POP007', '2021-12-03 00:00:00', 'https://m.media-amazon.com/images/I/61Rkt8HXA2L.__AC_SX300_SY300_QL70_ML2_.jpg', 'Olivia Rodrigo - SOUR', 'POP', 'Álbum de estreia de Olivia Rodrigo, com faixas como \"drivers license\" e \"good 4 u\".', '17', '48'),
('POP008', '2020-11-27 00:00:00', 'https://m.media-amazon.com/images/I/614iRecyucL.__AC_SX300_SY300_QL70_ML2_.jpg', 'Shawn Mendes - Wonder', 'POP', 'Álbum de Shawn Mendes, com temas de amor e autodescoberta, incluindo \"Wonder\" e \"Monster\".', '20', '53'),
('POP009', '2018-12-14 00:00:00', 'https://m.media-amazon.com/images/I/619UX17tADL.__AC_SX300_SY300_QL70_ML2_.jpg', 'Katy Perry - Witness', 'POP', 'Álbum de Katy Perry com influências de pop alternativo, incluindo \"Chained to the Rhythm\".', '19', '44'),
('POP010', '2016-11-04 00:00:00', 'https://m.media-amazon.com/images/I/81facJjZCQL._AC_SX450_.jpg', 'Lady Gaga - Joanne', 'POP', 'Álbum pop e country de Lady Gaga, com faixas como \"Million Reasons\" e \"Perfect Illusion\".', '16', '50'),
('ROCK001', '1975-09-12 00:00:00', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTbwxC5elWdTwLC0c4qAoirgdhulmV_VoUBQMH5Ur3jSkMFwIBZkwUhbPdwgwxYlxSb_3t2RCi7r1CGaALcF9tFJxRCy4J4fg&usqp=CAY', 'Pink Floyd - The Dark Side of the Moon', 'ROCK', 'Um dos álbuns mais icônicos da história do rock, lançado por Pink Floyd em 1973.', '10', '120'),
('ROCK002', '1991-08-23 00:00:00', 'https://http2.mlstatic.com/D_NQ_NP_947849-MLU72798991874_112023-O.webp', 'Nirvana - Nevermind', 'ROCK', 'Álbum revolucionário de Nirvana, incluindo o famoso hit \"Smells Like Teen Spirit\".', '14', '100'),
('ROCK003', '1980-07-25 00:00:00', 'https://universalmusic.vtexassets.com/arquivos/ids/188166-800-auto?v=638622002594430000&width=800&height=auto&aspect=true', 'The Rolling Stones - Back In Black', 'ROCK', 'Álbum clássico da banda The Rolling Stones, considerado um dos melhores de todos os tempos.', '12', '115'),
('ROCK004', '1969-08-31 00:00:00', 'https://http2.mlstatic.com/D_NQ_NP_805647-MLB70405278880_072023-O.webp', 'Led Zeppelin - Led Zeppelin IV', 'ROCK', 'Álbum lendário de Led Zeppelin, com faixas como \"Stairway to Heaven\".', '18', '130'),
('ROCK005', '2002-06-04 00:00:00', 'https://m.media-amazon.com/images/I/71x6Gi-bWqL.__AC_SY300_SX300_QL70_ML2_.jpg', 'Foo Fighters - One by One', 'ROCK', 'Álbum da banda Foo Fighters, com hits como \"All My Life\" e \"Times Like These\".', '22', '95'),
('ROCK006', '1997-11-05 00:00:00', 'https://m.media-amazon.com/images/I/71I9+iFh8hL._SX300_.jpg', 'Radiohead - OK Computer', 'ROCK', 'Álbum experimental de Radiohead, considerado um marco no rock alternativo dos anos 90.', '20', '110'),
('ROCK007', '1987-12-09 00:00:00', 'https://imusic.b-cdn.net/images/item/original/448/0602557498448.jpg?u2-2017-the-joshua-tree-lp&class=scaled&v=1493730923', 'U2 - The Joshua Tree', 'ROCK', 'Álbum emblemático do U2, com faixas como \"With or Without You\" e \"I Still Haven\'t Found What I\'m Looking For\".', '15', '105'),
('ROCK008', '2003-10-07 00:00:00', 'https://imusic.b-cdn.net/images/item/original/577/0810074421577.jpg?the-white-stripes-2023-elephant-lp&class=scaled&v=1678700953', 'The White Stripes - Elephant', 'ROCK', 'Álbum de sucesso dos White Stripes, com o famoso hit \"Seven Nation Army\".', '10', '125'),
('ROCK009', '1973-02-20 00:00:00', 'https://imusic.b-cdn.net/images/item/original/140/5054197183140.jpg?david-bowie-2023-aladdin-sane-lp&class=scaled&v=1673532887', 'David Bowie - Aladdin Sane', 'ROCK', 'Álbum de David Bowie, com sua personalidade excêntrica e faixas como \"The Jean Genie\".', '17', '140'),
('ROCK010', '1976-09-25 00:00:00', 'https://m.media-amazon.com/images/I/81r24tldvxL.__AC_SX300_SY300_QL70_ML2_.jpg', 'The Clash - London Calling', 'ROCK', 'Álbum seminal da banda The Clash, com músicas icônicas como \"London Calling\" e \"Train in Vain\".', '14', '100'),
('vinil_674da62f978905.19989685', '2024-03-29 00:00:00', 'https://s2-g1.glbimg.com/OVLUbfQKpKOM63l9e8pM9srB-CU=/0x0:1599x1599/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2024/z/K/bYpLeUQyAsUcHptaw5cw/beyonce-capa.jpg', 'Cowboy Carter', 'POP', '\"COWBOY CARTER\", produzido executivamente por Beyoncé, trata de gêneros, todos eles, enquanto está profundamente enraizado no Country', '100', '100'),
('vinil_674da67d3e30d9.46809701', '2024-03-29 00:00:00', 'https://upload.wikimedia.org/wikipedia/pt/6/6b/Capa_de_Lemonade.png', 'Lemonade', 'POP', 'Lemonade é o sexto álbum de estúdio da artista musical estadunidense Beyoncé.', '100', '100'),
('vinil_674da769068247.12707516', '2024-03-29 00:00:00', 'https://upload.wikimedia.org/wikipedia/pt/7/7a/4_%28Deluxe_Edition%29.jpg', '4 \'Four\'', 'POP', '4 é o quarto álbum de estúdio da artista musical estadunidense Beyoncé', '35', '100');

-- --------------------------------------------------------

--
-- Table structure for table `vinil_artista`
--

CREATE TABLE `vinil_artista` (
  `cd_vinil` varchar(277) COLLATE utf8_bin NOT NULL,
  `cd_artista` varchar(277) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vinil_artista`
--

INSERT INTO `vinil_artista` (`cd_vinil`, `cd_artista`) VALUES
('POP001', 'POP111'),
('POP002', 'POP222'),
('POP004', 'POP444'),
('POP005', 'POP555'),
('POP006', 'POP666'),
('POP007', 'POP777'),
('POP008', 'POP888'),
('POP009', 'POP999'),
('ROCK001', 'ROCK111'),
('ROCK002', 'ROCK222'),
('ROCK003', 'ROCK333'),
('ROCK004', 'ROCK444'),
('ROCK005', 'ROCK555'),
('ROCK006', 'ROCK666'),
('ROCK007', 'ROCK777'),
('ROCK008', 'ROCK888'),
('ROCK009', 'ROCK999'),
('HIPHOP001', 'HIPHOP111'),
('HIPHOP002', 'HIPHOP222'),
('HIPHOP003', 'HIPHOP333'),
('HIPHOP004', 'HIPHOP444'),
('HIPHOP005', 'HIPHOP555'),
('HIPHOP006', 'HIPHOP666'),
('HIPHOP007', 'HIPHOP777'),
('HIPHOP008', 'HIPHOP888'),
('HIPHOP009', 'HIPHOP999'),
('CLAS001', 'CLAS111'),
('CLAS002', 'CLAS222'),
('CLAS003', 'CLAS333'),
('CLAS004', 'CLAS444'),
('CLAS005', 'CLAS555'),
('CLAS006', 'CLAS666'),
('CLAS007', 'CLAS777'),
('CLAS008', 'CLAS888'),
('CLAS009', 'CLAS999'),
('vinil_674da62f978905.19989685', 'artista_674da62f978c65.19440871'),
('vinil_674da67d3e30d9.46809701', 'artista_674da67d3e3244.42655472'),
('vinil_674da769068247.12707516', 'artista_674da7690685b1.38434209');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`cd_artista`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cd_cliente`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`cd_newsletter`);

--
-- Indexes for table `pagamento_pedido`
--
ALTER TABLE `pagamento_pedido`
  ADD PRIMARY KEY (`cd_pagamento`),
  ADD KEY `cd_vinil` (`cd_vinil`),
  ADD KEY `cd_cliente` (`cd_cliente`);

--
-- Indexes for table `vinil`
--
ALTER TABLE `vinil`
  ADD PRIMARY KEY (`cd_vinil`);

--
-- Indexes for table `vinil_artista`
--
ALTER TABLE `vinil_artista`
  ADD KEY `vinil_artista_ibfk_1` (`cd_vinil`),
  ADD KEY `vinil_artista_ibfk_2` (`cd_artista`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cd_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `cd_newsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pagamento_pedido`
--
ALTER TABLE `pagamento_pedido`
  MODIFY `cd_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pagamento_pedido`
--
ALTER TABLE `pagamento_pedido`
  ADD CONSTRAINT `cd_cliente` FOREIGN KEY (`cd_cliente`) REFERENCES `cliente` (`cd_cliente`),
  ADD CONSTRAINT `cd_vinil` FOREIGN KEY (`cd_vinil`) REFERENCES `vinil` (`cd_vinil`);

--
-- Constraints for table `vinil_artista`
--
ALTER TABLE `vinil_artista`
  ADD CONSTRAINT `vinil_artista_ibfk_1` FOREIGN KEY (`cd_vinil`) REFERENCES `vinil` (`cd_vinil`),
  ADD CONSTRAINT `vinil_artista_ibfk_2` FOREIGN KEY (`cd_artista`) REFERENCES `artista` (`cd_artista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
