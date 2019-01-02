-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 23 Février 2018 à 19:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `date` datetime NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `idCategorie`) VALUES
(8, 'Brigitte', 'ici nous avons une petite fille fille bien gentille qui viens de passer le concours de la FSMB de Dschamg', '2018-02-04 23:55:29', 1),
(11, 'carel', 'A lï¿½occasion de la semaine de la jeunesse, nos ï¿½lï¿½ves et nous irons en excursion au musï¿½e national le 07 fï¿½vrier 2018 de 8h ï¿½ 14h. A cet effet, nous vous prions de nous envoyer une modique somme de 1 200 FCFA pour (frais de transport, sandwich, entrï¿½e).', '2018-02-04 23:56:30', 3),
(16, 'jordan', 'jsksjsbjbkdjsdbksjdbskjdbsd', '0000-00-00 00:00:00', 2),
(18, 'Melvine', 'mon bÃ©bÃ© a  moi je t''aime', '0000-00-00 00:00:00', 2),
(19, 'Melvine', 'mon bÃ©bÃ© a  moi je t''aime', '0000-00-00 00:00:00', 2),
(20, 'Melvine', 'mon bÃ©bÃ© a  moi je t''aime', '0000-00-00 00:00:00', 2),
(21, 'Melvine', 'mon bÃ©bÃ© a  moi je t''aime', '0000-00-00 00:00:00', 2),
(22, 'jeruscha', 'loooooooooooooooooooooooooool', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`) VALUES
(1, 'Piscine'),
(2, 'Jacousie'),
(3, 'benoire');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`) VALUES
(1, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
