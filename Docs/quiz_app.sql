-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 30 sep. 2022 à 19:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quiz_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `ASSURER`
--

CREATE TABLE `ASSURER` (
  `idFormateur` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `AVOIR_R`
--

CREATE TABLE `AVOIR_R` (
  `idReponse` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `COMPETENCE`
--

CREATE TABLE `COMPETENCE` (
  `id` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `libCompetence` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `COMPETENCE`
--

INSERT INTO `COMPETENCE` (`id`, `idModule`, `libCompetence`) VALUES
(1, 1, 'comp1'),
(2, 2, 'comp2'),
(3, 2, 'comp3'),
(4, 2, 'comp4'),
(5, 3, 'comp5'),
(6, 3, 'comp6'),
(7, 2, 'comp7'),
(8, 2, 'comp8');

-- --------------------------------------------------------

--
-- Structure de la table `ETRE_SELECTIONNER`
--

CREATE TABLE `ETRE_SELECTIONNER` (
  `idEvaluation` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `EVALUATION`
--

CREATE TABLE `EVALUATION` (
  `id` int(11) NOT NULL,
  `idEvaluation` int(11) NOT NULL,
  `idStagiaire` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `EXAMEN`
--

CREATE TABLE `EXAMEN` (
  `id` int(11) NOT NULL,
  `idCompetence` int(11) NOT NULL,
  `libExamen` varchar(255) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `datePassation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `EXAMEN`
--

INSERT INTO `EXAMEN` (`id`, `idCompetence`, `libExamen`, `dateCreation`, `datePassation`) VALUES
(1, 1, 'C1', '2022-09-01', '2022-10-04'),
(2, 2, 'C2', '2022-09-01', '2022-10-01'),
(3, 1, 'C3', '2022-09-01', '2022-10-01'),
(4, 2, 'C4', '2022-09-01', '2022-10-01'),
(5, 3, 'C5 ', '2022-09-01', '2022-10-01'),
(6, 3, 'C6', '2022-09-01', '2022-10-01'),
(7, 5, 'C7', '2022-09-01', '2022-10-01');

-- --------------------------------------------------------

--
-- Structure de la table `FILIERE`
--

CREATE TABLE `FILIERE` (
  `id` int(11) NOT NULL,
  `libFiliere` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FILIERE`
--

INSERT INTO `FILIERE` (`id`, `libFiliere`) VALUES
(1, 'DEV DEG'),
(2, 'DEV FULL STACK');

-- --------------------------------------------------------

--
-- Structure de la table `FORMATEUR`
--

CREATE TABLE `FORMATEUR` (
  `id` int(11) NOT NULL,
  `nom` char(20) DEFAULT NULL,
  `prenom` char(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORMATEUR`
--

INSERT INTO `FORMATEUR` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'ayadi', 'oussama', 'ayadi.oussama', 'ayadi'),
(2, 'maach', 'hamza', 'maach.hamza', 'maach');

-- --------------------------------------------------------

--
-- Structure de la table `FORMATEUR_FILIERE`
--

CREATE TABLE `FORMATEUR_FILIERE` (
  `idFormateur` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORMATEUR_FILIERE`
--

INSERT INTO `FORMATEUR_FILIERE` (`idFormateur`, `idFiliere`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `GROUPE`
--

CREATE TABLE `GROUPE` (
  `id` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  `libGroupe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `GROUPE`
--

INSERT INTO `GROUPE` (`id`, `idFiliere`, `libGroupe`) VALUES
(1, 1, 'DEV101'),
(2, 1, 'DEV102'),
(3, 1, 'DEV201'),
(4, 1, 'DEV202');

-- --------------------------------------------------------

--
-- Structure de la table `MODULE`
--

CREATE TABLE `MODULE` (
  `id` int(11) NOT NULL,
  `libModule` char(10) DEFAULT NULL,
  `idFiliere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `MODULE`
--

INSERT INTO `MODULE` (`id`, `libModule`, `idFiliere`) VALUES
(1, 'POO', 1),
(2, 'PHP', 1),
(3, 'javascript', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ModuleAssurer`
--

CREATE TABLE `ModuleAssurer` (
  `idFormateur` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ModuleAssurer`
--

INSERT INTO `ModuleAssurer` (`idFormateur`, `idModule`, `idGroup`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(2, 1, 2),
(2, 2, 2),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `POUR`
--

CREATE TABLE `POUR` (
  `idEvaluation` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `QUESTION`
--

CREATE TABLE `QUESTION` (
  `id` int(11) NOT NULL,
  `idReponse` int(11) DEFAULT NULL,
  `libQuestion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `REPONSE`
--

CREATE TABLE `REPONSE` (
  `id` int(11) NOT NULL,
  `libReponse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `STAGIAIRE`
--

CREATE TABLE `STAGIAIRE` (
  `id` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `STAGIAIRE`
--

INSERT INTO `STAGIAIRE` (`id`, `idGroupe`, `nom`, `email`, `password`) VALUES
(1, 1, 'oussama', 'ayadi.oussama1', 'ayadi'),
(2, 1, 'maach', 'hamza.maach', 'maach');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ASSURER`
--
ALTER TABLE `ASSURER`
  ADD PRIMARY KEY (`idFormateur`,`idModule`,`idGroupe`),
  ADD KEY `FK_ASSURER` (`idGroupe`),
  ADD KEY `FK_ASSURER3` (`idModule`);

--
-- Index pour la table `AVOIR_R`
--
ALTER TABLE `AVOIR_R`
  ADD PRIMARY KEY (`idReponse`,`idQuestion`),
  ADD KEY `FK_AVOIR_R` (`idQuestion`);

--
-- Index pour la table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_COMPOSER` (`idModule`);

--
-- Index pour la table `ETRE_SELECTIONNER`
--
ALTER TABLE `ETRE_SELECTIONNER`
  ADD PRIMARY KEY (`idEvaluation`,`idReponse`,`idQuestion`),
  ADD KEY `FK_ETRE_SELECTIONNER` (`idQuestion`),
  ADD KEY `FK_ETRE_SELECTIONNER3` (`idReponse`);

--
-- Index pour la table `EVALUATION`
--
ALTER TABLE `EVALUATION`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DE` (`idEvaluation`),
  ADD KEY `FK_FAIRE` (`idStagiaire`);

--
-- Index pour la table `EXAMEN`
--
ALTER TABLE `EXAMEN`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CONCERNER` (`idCompetence`);

--
-- Index pour la table `FILIERE`
--
ALTER TABLE `FILIERE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `FORMATEUR`
--
ALTER TABLE `FORMATEUR`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `FORMATEUR_FILIERE`
--
ALTER TABLE `FORMATEUR_FILIERE`
  ADD PRIMARY KEY (`idFormateur`,`idFiliere`),
  ADD KEY `idFiliere` (`idFiliere`);

--
-- Index pour la table `GROUPE`
--
ALTER TABLE `GROUPE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_INCLURE` (`idFiliere`);

--
-- Index pour la table `MODULE`
--
ALTER TABLE `MODULE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `isFiliere` (`idFiliere`);

--
-- Index pour la table `ModuleAssurer`
--
ALTER TABLE `ModuleAssurer`
  ADD PRIMARY KEY (`idFormateur`,`idModule`,`idGroup`),
  ADD KEY `idGroup` (`idGroup`),
  ADD KEY `idModule` (`idModule`);

--
-- Index pour la table `POUR`
--
ALTER TABLE `POUR`
  ADD PRIMARY KEY (`idEvaluation`,`idQuestion`),
  ADD KEY `FK_POUR` (`idQuestion`);

--
-- Index pour la table `QUESTION`
--
ALTER TABLE `QUESTION`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AVOIR_RC` (`idReponse`);

--
-- Index pour la table `REPONSE`
--
ALTER TABLE `REPONSE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `STAGIAIRE`
--
ALTER TABLE `STAGIAIRE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_APPARTENIR` (`idGroupe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `GROUPE`
--
ALTER TABLE `GROUPE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `STAGIAIRE`
--
ALTER TABLE `STAGIAIRE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `AVOIR_R`
--
ALTER TABLE `AVOIR_R`
  ADD CONSTRAINT `FK_AVOIR_R` FOREIGN KEY (`idQuestion`) REFERENCES `QUESTION` (`id`),
  ADD CONSTRAINT `FK_AVOIR_R2` FOREIGN KEY (`idReponse`) REFERENCES `REPONSE` (`id`);

--
-- Contraintes pour la table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  ADD CONSTRAINT `FK_COMPOSER` FOREIGN KEY (`idModule`) REFERENCES `MODULE` (`id`);

--
-- Contraintes pour la table `ETRE_SELECTIONNER`
--
ALTER TABLE `ETRE_SELECTIONNER`
  ADD CONSTRAINT `FK_ETRE_SELECTIONNER` FOREIGN KEY (`idQuestion`) REFERENCES `QUESTION` (`id`),
  ADD CONSTRAINT `FK_ETRE_SELECTIONNER2` FOREIGN KEY (`idEvaluation`) REFERENCES `EVALUATION` (`id`),
  ADD CONSTRAINT `FK_ETRE_SELECTIONNER3` FOREIGN KEY (`idReponse`) REFERENCES `REPONSE` (`id`);

--
-- Contraintes pour la table `EXAMEN`
--
ALTER TABLE `EXAMEN`
  ADD CONSTRAINT `FK_CONCERNER` FOREIGN KEY (`idCompetence`) REFERENCES `COMPETENCE` (`id`);

--
-- Contraintes pour la table `FORMATEUR_FILIERE`
--
ALTER TABLE `FORMATEUR_FILIERE`
  ADD CONSTRAINT `FORMATEUR_FILIERE_ibfk_1` FOREIGN KEY (`idFiliere`) REFERENCES `FILIERE` (`id`),
  ADD CONSTRAINT `FORMATEUR_FILIERE_ibfk_2` FOREIGN KEY (`idFormateur`) REFERENCES `FORMATEUR` (`id`);

--
-- Contraintes pour la table `GROUPE`
--
ALTER TABLE `GROUPE`
  ADD CONSTRAINT `FK_INCLURE` FOREIGN KEY (`idFiliere`) REFERENCES `FILIERE` (`id`);

--
-- Contraintes pour la table `MODULE`
--
ALTER TABLE `MODULE`
  ADD CONSTRAINT `MODULE_ibfk_1` FOREIGN KEY (`idFiliere`) REFERENCES `FILIERE` (`id`);

--
-- Contraintes pour la table `ModuleAssurer`
--
ALTER TABLE `ModuleAssurer`
  ADD CONSTRAINT `ModuleAssurer_ibfk_1` FOREIGN KEY (`idFormateur`) REFERENCES `FORMATEUR` (`id`),
  ADD CONSTRAINT `ModuleAssurer_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `GROUPE` (`id`),
  ADD CONSTRAINT `ModuleAssurer_ibfk_3` FOREIGN KEY (`idModule`) REFERENCES `MODULE` (`id`);

--
-- Contraintes pour la table `POUR`
--
ALTER TABLE `POUR`
  ADD CONSTRAINT `FK_POUR` FOREIGN KEY (`idQuestion`) REFERENCES `QUESTION` (`id`),
  ADD CONSTRAINT `FK_POUR2` FOREIGN KEY (`idEvaluation`) REFERENCES `EXAMEN` (`id`);

--
-- Contraintes pour la table `QUESTION`
--
ALTER TABLE `QUESTION`
  ADD CONSTRAINT `FK_AVOIR_RC` FOREIGN KEY (`idReponse`) REFERENCES `REPONSE` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
