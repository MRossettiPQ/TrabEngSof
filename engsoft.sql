-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 13-Jun-2019 às 22:47
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engsoft`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

DROP TABLE IF EXISTS `aluguel`;
CREATE TABLE IF NOT EXISTS `aluguel` (
  `FK_Livro_idLivro` int(11) DEFAULT NULL,
  `FK_Usuario_idUser` int(11) DEFAULT NULL,
  `idAluguel` int(11) NOT NULL AUTO_INCREMENT,
  `dataAluguel` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `prazoAluguel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAluguel`),
  KEY `FK_aluguel_1` (`FK_Livro_idLivro`),
  KEY `FK_aluguel_2` (`FK_Usuario_idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluguel`
--

INSERT INTO `aluguel` (`FK_Livro_idLivro`, `FK_Usuario_idUser`, `idAluguel`, `dataAluguel`, `prazoAluguel`) VALUES
(1, 5, 8, '2019-06-13 01:07:07', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comenta`
--

DROP TABLE IF EXISTS `comenta`;
CREATE TABLE IF NOT EXISTS `comenta` (
  `FK_Usuario_idUser` int(11) DEFAULT NULL,
  `FK_Livro_idLivro` int(11) DEFAULT NULL,
  `idComenta` int(11) NOT NULL AUTO_INCREMENT,
  `contComenta` varchar(300) DEFAULT NULL,
  `notaComenta` float DEFAULT NULL,
  `dataComenta` date DEFAULT NULL,
  PRIMARY KEY (`idComenta`),
  KEY `FK_comenta_1` (`FK_Usuario_idUser`),
  KEY `FK_comenta_2` (`FK_Livro_idLivro`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comenta`
--

INSERT INTO `comenta` (`FK_Usuario_idUser`, `FK_Livro_idLivro`, `idComenta`, `contComenta`, `notaComenta`, `dataComenta`) VALUES
(1, 1, 1, 'BAITA DUM LIVRO', 8, '2019-06-09'),
(2, 1, 5, 'DOIS LIVROOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO', 6, '2019-06-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escreve`
--

DROP TABLE IF EXISTS `escreve`;
CREATE TABLE IF NOT EXISTS `escreve` (
  `FK_Autor_idAutor` int(11) DEFAULT NULL,
  `FK_Livro_idLivro` int(11) DEFAULT NULL,
  KEY `FK_escreve_0` (`FK_Autor_idAutor`),
  KEY `FK_escreve_1` (`FK_Livro_idLivro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

DROP TABLE IF EXISTS `livro`;
CREATE TABLE IF NOT EXISTS `livro` (
  `idLivro` int(11) NOT NULL AUTO_INCREMENT,
  `nomeLivro` text,
  `lancLivro` date DEFAULT NULL,
  `descLivro` text,
  `localLivro` text,
  `classLivro` int(11) NOT NULL,
  `editoraLivro` text NOT NULL,
  `generoLivro` text NOT NULL,
  `custoLivro` float NOT NULL,
  `autorLivro` text NOT NULL,
  PRIMARY KEY (`idLivro`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`idLivro`, `nomeLivro`, `lancLivro`, `descLivro`, `localLivro`, `classLivro`, `editoraLivro`, `generoLivro`, `custoLivro`, `autorLivro`) VALUES
(1, 'A Guerra dos Tronos', '1996-08-01', 'Quando Eddard Stark, lorde do castelo de Winterfell, aceita a prestigiada posição de Mão do Rei oferecida pelo velho amigo, o rei Robert Baratheon, não desconfia que sua vida está prestes a ruir em sucessivas tragédias. Sabe-se que Lorde Stark aceitou a proposta porque desconfia que o dono anterior do título fora envenenado pela manipuladora rainha - uma cruel mulher do clã Lannister. E sua intenção é proteger o rei. Mas ter como inimigo os Lannister pode ser fatal: a ambição dessa família pelo poder parece não ter limites e o rei corre grande perigo. Agora, sozinho na corte, Eddard percebe que não só o rei está em apuros, mas também ele e toda a sua família. Quem vencerá a guerra dos tronos?', 'Estados Unidos', 16, 'Grupo Editorial Record', 'Romance', 2.5, 'George R. R. Martin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nickUser` varchar(60) DEFAULT NULL,
  `nomeUser` varchar(60) DEFAULT NULL,
  `passUser` varchar(60) DEFAULT NULL,
  `nascUser` date DEFAULT NULL,
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUser` int(11) DEFAULT NULL,
  `emailUser` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nickUser`, `nomeUser`, `passUser`, `nascUser`, `idUser`, `tipoUser`, `emailUser`) VALUES
('user', 'user', 'user', '2019-06-09', 1, 0, 'user@user'),
('MRossettiPQ', 'Matheus Rossetti', '63a9f0ea7bb98050796b649e85481845', '1995-11-09', 2, 2, 'matheus@rossetti.com'),
('rturibio', 'Matheus Rossetti', '63a9f0ea7bb98050796b649e85481845', '1994-05-24', 3, 1, 'matheus@rossetti.com'),
('Admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', '1995-11-09', 5, 1, 'admin@admin.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
