-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 fév. 2021 à 16:18
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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ampoules`
--

INSERT INTO `ampoules` (`id_ampoule`, `changement_de_date`, `etage`, `position_ampoule`, `prix_ampoule`) VALUES
(28, '2021-01-26 00:00:00', 'RDC', 'fond', 1),
(27, '2021-02-04 00:00:00', 'RDC', 'fond', 1),
(29, '2021-02-18 00:00:00', '2', 'gauche', 333333),
(30, '2021-02-04 00:00:00', '9', 'gauche', 15),
(31, '2021-02-23 00:00:00', '6', 'gauche', 15),
(32, '2021-01-30 00:00:00', '5', 'fond', 15),
(33, '2021-02-06 00:00:00', '8', 'droite', 11),
(34, '2021-02-25 00:00:00', '4', 'fond', 19.99),
(35, '2021-02-04 00:00:00', '6', 'à droite', 10.99),
(36, '2021-02-05 00:00:00', '9', 'droite', 14.99);

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
