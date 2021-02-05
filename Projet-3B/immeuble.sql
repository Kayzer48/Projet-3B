-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 fév. 2021 à 08:11
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immeuble`
--

-- --------------------------------------------------------

--
-- Structure de la table `ampoules`
--

DROP TABLE IF EXISTS `ampoules`;
CREATE TABLE IF NOT EXISTS `ampoules` (
  `id_ampoule` int(11) NOT NULL AUTO_INCREMENT,
  `changement_de_date` datetime NOT NULL,
  `etage` varchar(255) NOT NULL,
  `position_ampoule` varchar(255) NOT NULL,
  `prix_ampoule` float NOT NULL,
  PRIMARY KEY (`id_ampoule`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ampoules`
--

INSERT INTO `ampoules` (`id_ampoule`, `changement_de_date`, `etage`, `position_ampoule`, `prix_ampoule`) VALUES
(31, '2021-02-11 00:00:00', 'RDC', 'à droite', 15),
(43, '2021-02-10 00:00:00', 'RDC', 'au fond', 0.07),
(44, '2021-02-18 00:00:00', '9', 'à droite', 30),
(35, '2021-02-04 00:00:00', '6', 'à droite', 10.99),
(36, '2021-02-12 00:00:00', 'RDC', 'à gauche', 14.99),
(37, '2021-02-11 00:00:00', 'RDC', 'au fond', 333333),
(38, '2021-02-12 00:00:00', 'RDC', 'au fond', 30),
(39, '2021-02-26 00:00:00', 'RDC', 'au fond', 1),
(40, '2021-02-10 00:00:00', 'RDC', 'au fond', 30),
(41, '2021-02-10 00:00:00', 'RDC', 'au fond', 0.05),
(42, '2021-02-11 00:00:00', 'RDC', 'au fond', 0.05);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(25) NOT NULL,
  `mot_de_passe` varchar(25) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `mot_de_passe`) VALUES
(4, 'Williams', 'Guillaume'),
(3, 'Williams', 'Chau');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
