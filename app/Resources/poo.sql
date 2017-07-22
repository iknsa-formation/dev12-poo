-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 21 juil. 2017 à 17:20
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `poo`
--
CREATE DATABASE IF NOT EXISTS `poo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `poo`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `auteur` varchar(256) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `auteur`, `date`, `message`) VALUES
(23, 'Mon deuxieme titref ', 'Inconnu  2', '2017-07-21 13:27:34', 'un texte fsdfdsdf'),
(25, 'Mon troisieme titre zezefze', 'Inconnu  3', '2017-07-20 09:59:59', 'Un message zefzaefz');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom`, `prenom`, `fonction`) VALUES
(1, 'Almasy zrezf', 'Paul', 'Photographe 2'),
(2, 'Goupy', 'Didier', 'Photographe'),
(3, 'Le Danvic', 'Daniel', 'Photographe'),
(4, 'Turk', 'Philippe', 'Illustrateur'),
(5, 'Van Eersel', 'Patrice', 'Interviewer'),
(6, 'Ayrault', 'Philippe', 'Photographe'),
(7, 'Grillo', 'Alex', 'Musicien'),
(8, 'Vidard', 'Mathieu', 'Interviewer'),
(9, 'Stewart', 'Rob', 'Photographe'),
(10, 'Langot', 'Michel', 'Photographe'),
(11, 'Francq', 'Philippe', 'Illustrateur'),
(12, 'Fournier', 'Alain', 'Photographe'),
(13, 'Vezon', 'Thierry', 'Photographe'),
(14, 'Montvalon', 'Dominique de', 'Interviewer'),
(15, 'Blondeau', 'Manuel', 'Photographe'),
(16, 'Brinkmann', 'Bettina', 'Photographe'),
(17, 'Bartoli', 'Georges', 'Photographe'),
(18, 'Paoluzzo', 'Marco', 'Photographe'),
(19, 'Vallorani', 'Jean-Pierre', 'Photographe'),
(20, 'Chandelier', 'Estelle', 'Maquettiste'),
(21, 'Weber', 'Bob', 'Interviewer'),
(22, 'Le Scanff', 'Gilles', 'Photographe'),
(23, 'Sander', 'Eric', 'Photographe'),
(24, 'Salvat', 'Philippe', 'Photographe'),
(25, 'Scope image', '', 'Photographe'),
(26, 'Bednorz', 'Achim', 'Photographe'),
(27, 'Calm', 'Nathalie', 'Interviewer'),
(28, 'Lismonde', 'Pascale', 'Interviewer'),
(29, 'Diluka', 'Shani', 'Musicien'),
(30, 'ffff', 'fff', 'ffff'),
(31, 'ffff', 'ffff', 'ffff'),
(32, 'aaaa', 'aaaa', 'aaa'),
(33, 'AAAAA BBB', 'FFFFF', 'FFFFF'),
(34, 'Keefe', 'John', 'Photographe'),
(35, 'Stegassy', 'Ruth', 'Interviewer'),
(36, 'Damase', 'Jo', 'Photographe'),
(37, 'Varilh', 'Clarisse', 'Musicien'),
(38, 'Enthoven', 'Rapha', 'Interviewer'),
(39, 'Hazan', 'Muriel', 'Photographe'),
(40, 'Aubin', 'Antoine', 'Illustrateur'),
(43, 'Jean', 'Neymar', 'Footer'),
(44, 'A', 'aaa', 'aaa'),
(45, '11111d', '444ddd', 'dddd4dd'),
(46, 'Jean', 'Neymar', 'Footer'),
(47, 'Lionel', 'Lionel', 'Foot'),
(48, 'ffff', 'rrevre', 'ceece'),
(49, 'ffff', 'rrevreeazeazezcz', 'dddd'),
(50, 'ffff', 'rrevrehg', 'ceececccc');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
