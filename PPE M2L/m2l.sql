-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 16 sep. 2020 à 14:19
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `Num_Candidat` int(10) NOT NULL,
  `Nom_Candidat` varchar(30) DEFAULT NULL,
  `Prenom_Candidat` varchar(30) DEFAULT NULL,
  `Ville_Candidat` varchar(30) DEFAULT NULL,
  `Telephone_Candidat` int(10) DEFAULT NULL,
  `Num_competition` int(10) DEFAULT NULL,
  `Num_equipe` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`Num_Candidat`, `Nom_Candidat`, `Prenom_Candidat`, `Ville_Candidat`, `Telephone_Candidat`, `Num_competition`, `Num_equipe`) VALUES
(1, 'Micas', 'Titouan', 'Gap', 102030405, 2, 1),
(2, 'Bonjour', 'William', 'Briançon', 547842585, 2, 1),
(3, 'Maman', 'Alexandre', 'Gap', 657596547, 2, 2),
(4, 'Andre', 'François', 'Gap', 515158485, 2, 2),
(5, 'jean', 'raymond', 'Paris', 546848478, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `Num_competition` int(10) NOT NULL,
  `Nom_competition` varchar(30) DEFAULT NULL,
  `Date` date NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`Num_competition`, `Nom_competition`, `Date`, `Type`) VALUES
(1, 'Tennisotronfaz', '2020-02-22', 'Solo'),
(2, 'BowlingLand', '2020-02-18', 'Solo');

-- --------------------------------------------------------

--
-- Structure de la table `competitionequipe`
--

CREATE TABLE `competitionequipe` (
  `NumCompetition_Equipe` int(30) NOT NULL,
  `Nom_CompetitionEquipe` varchar(30) DEFAULT NULL,
  `Date` date NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competitionequipe`
--

INSERT INTO `competitionequipe` (`NumCompetition_Equipe`, `Nom_CompetitionEquipe`, `Date`, `Type`) VALUES
(1, 'SuperHot', '2020-02-21', 'Equipe'),
(2, 'ChasseDino', '2020-02-21', 'Equipe');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `Num_equipe` int(10) NOT NULL,
  `Nom_equipe` varchar(30) DEFAULT NULL,
  `NumCompetition` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`Num_equipe`, `Nom_equipe`, `NumCompetition`) VALUES
(1, 'DreamTeam', 2),
(2, 'sharingan', 1),
(3, 'Ouais', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`Num_Candidat`),
  ADD KEY `FK_Candidat_Num_competition` (`Num_competition`),
  ADD KEY `FK_Candidat_Num_equipe` (`Num_equipe`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`Num_competition`);

--
-- Index pour la table `competitionequipe`
--
ALTER TABLE `competitionequipe`
  ADD PRIMARY KEY (`NumCompetition_Equipe`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`Num_equipe`),
  ADD KEY `FK_Equipe_Num` (`NumCompetition`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `Num_Candidat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `Num_competition` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `competitionequipe`
--
ALTER TABLE `competitionequipe`
  MODIFY `NumCompetition_Equipe` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `Num_equipe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `FK_Candidat_Num_competition` FOREIGN KEY (`Num_competition`) REFERENCES `competition` (`Num_competition`),
  ADD CONSTRAINT `FK_Candidat_Num_equipe` FOREIGN KEY (`Num_equipe`) REFERENCES `equipe` (`Num_equipe`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `FK_Equipe_Num` FOREIGN KEY (`NumCompetition`) REFERENCES `competitionequipe` (`NumCompetition_Equipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
