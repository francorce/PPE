-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 30 nov. 2020 à 17:48
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
-- Base de données :  `ppegsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` char(4) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('RB', 'Remboursée'),
('VA', 'Validée et mise en paiement');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE `fichefrais` (
  `idVisiteur` int(11) NOT NULL,
  `idFicheFrais` int(11) NOT NULL,
  `mois` date NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(4) DEFAULT 'CR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

CREATE TABLE `fraisforfait` (
  `id` int(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
(10, 'Forfait Etape', '110.00'),
(11, 'KM', '50.00');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

CREATE TABLE `lignefraisforfait` (
  `idVisiteur` int(11) NOT NULL,
  `mois` date NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

CREATE TABLE `lignefraishorsforfait` (
  `id` int(11) NOT NULL,
  `idVisiteur` int(11) NOT NULL,
  `mois` date NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `type`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`) VALUES
(528, 3, 'admin', 'admin', 'ADMIN', 'www', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD PRIMARY KEY (`idVisiteur`,`mois`),
  ADD KEY `idEtat` (`idEtat`),
  ADD KEY `idFicheFrais` (`idFicheFrais`);

--
-- Index pour la table `fraisforfait`
--
ALTER TABLE `fraisforfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`),
  ADD KEY `idFraisForfait` (`idFraisForfait`);

--
-- Index pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVisiteur` (`idVisiteur`,`mois`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  MODIFY `idFicheFrais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fraisforfait`
--
ALTER TABLE `fraisforfait`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
