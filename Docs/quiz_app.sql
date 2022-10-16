-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2022 at 02:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `avoir_reponse`
--

CREATE TABLE `avoir_reponse` (
  `idReponse` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `lib` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competence`
--

INSERT INTO `competence` (`id`, `idModule`, `lib`) VALUES
(1, 1, 'comp 1'),
(2, 1, 'comp 2'),
(3, 2, 'comp1'),
(4, 2, 'comp 2'),
(5, 2, 'comp3');

-- --------------------------------------------------------

--
-- Table structure for table `etre_choisi`
--

CREATE TABLE `etre_choisi` (
  `idEvaluation` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `idStagiaire` int(11) NOT NULL,
  `idExamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `idCompetence` int(11) NOT NULL,
  `lib` varchar(255) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `datePassation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examen`
--

INSERT INTO `examen` (`id`, `idCompetence`, `lib`, `dateCreation`, `datePassation`) VALUES
(1, 1, 'examen 1', '2022-10-13', '2022-10-17'),
(2, 2, 'examen 1', '2022-10-14', '2022-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `lib` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id`, `lib`) VALUES
(1, 'dev. dig.'),
(2, 'E.S.A'),
(3, 'G.E'),
(4, 'E.I');

-- --------------------------------------------------------

--
-- Table structure for table `formateur`
--

CREATE TABLE `formateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formateur`
--

INSERT INTO `formateur` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(2, 'ayadi', 'oussama', 'ayadi.oussama', 'ayadi');

-- --------------------------------------------------------

--
-- Table structure for table `formateur_filiere`
--

CREATE TABLE `formateur_filiere` (
  `idFormateur` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formateur_filiere`
--

INSERT INTO `formateur_filiere` (`idFormateur`, `idFiliere`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  `lib` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id`, `idFiliere`, `lib`) VALUES
(1, 1, 'dev101'),
(2, 1, 'dev102'),
(3, 1, 'dev201'),
(4, 1, 'dev202');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `lib` varchar(255) DEFAULT NULL,
  `idFiliere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `lib`, `idFiliere`) VALUES
(1, 'Approche Agile', 1),
(2, 'Back End', 1),
(3, 'Front End', 1),
(4, 'Gere DonneeS', 1),
(5, 'Python', 1),
(6, 'Algorithm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_assurer`
--

CREATE TABLE `module_assurer` (
  `idFormateur` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_assurer`
--

INSERT INTO `module_assurer` (`idFormateur`, `idModule`, `idGroup`) VALUES
(2, 1, 3),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pour`
--

CREATE TABLE `pour` (
  `idExamen` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `idReponse` int(11) DEFAULT NULL,
  `lib` text DEFAULT NULL,
  `idCompetence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `idReponse`, `lib`, `idCompetence`) VALUES
(11, NULL, 'question 2', 1),
(12, NULL, 'question 3', 1),
(13, NULL, 'question 4', 2),
(14, NULL, 'question 5', 3),
(15, NULL, 'question 6', 4),
(16, NULL, 'question 7', 5),
(17, NULL, 'question 8', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `lib` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stagiaire`
--

INSERT INTO `stagiaire` (`id`, `nom`, `prenom`, `email`, `password`, `idGroupe`) VALUES
(1, 'ermich', 'reda', 'ermich.reda', 'reda', 3),
(2, 'ayadi', 'oussama', 'oussama.ayadi', 'ayadi', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avoir_reponse`
--
ALTER TABLE `avoir_reponse`
  ADD PRIMARY KEY (`idReponse`,`idQuestion`),
  ADD KEY `FK_AVOIR_R` (`idQuestion`);

--
-- Indexes for table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_COMPOSER` (`idModule`);

--
-- Indexes for table `etre_choisi`
--
ALTER TABLE `etre_choisi`
  ADD PRIMARY KEY (`idEvaluation`,`idQuestion`),
  ADD KEY `fk_proposer_question1` (`idQuestion`),
  ADD KEY `fk_proposer_reponse1` (`idReponse`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evaluation_stagiaire1` (`idStagiaire`),
  ADD KEY `fk_evaluation_examen1` (`idExamen`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CONCERNER` (`idCompetence`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formateur_filiere`
--
ALTER TABLE `formateur_filiere`
  ADD PRIMARY KEY (`idFormateur`,`idFiliere`),
  ADD KEY `FORMATEUR_FILIERE_ibfk_1` (`idFiliere`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_INCLURE` (`idFiliere`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MODULE_ibfk_1` (`idFiliere`);

--
-- Indexes for table `module_assurer`
--
ALTER TABLE `module_assurer`
  ADD PRIMARY KEY (`idModule`,`idGroup`),
  ADD KEY `ModuleAssurer_ibfk_1` (`idFormateur`),
  ADD KEY `ModuleAssurer_ibfk_2` (`idGroup`);

--
-- Indexes for table `pour`
--
ALTER TABLE `pour`
  ADD PRIMARY KEY (`idExamen`,`idQuestion`),
  ADD KEY `FK_POUR` (`idQuestion`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avoir_rc` (`idReponse`),
  ADD KEY `fk_question_competence1` (`idCompetence`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stagiaire_groupe1` (`idGroupe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avoir_reponse`
--
ALTER TABLE `avoir_reponse`
  ADD CONSTRAINT `FK_AVOIR_R` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_AVOIR_R2` FOREIGN KEY (`idReponse`) REFERENCES `reponse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `FK_COMPOSER` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`);

--
-- Constraints for table `etre_choisi`
--
ALTER TABLE `etre_choisi`
  ADD CONSTRAINT `fk_proposer_evaluation1` FOREIGN KEY (`idEvaluation`) REFERENCES `evaluation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proposer_question1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proposer_reponse1` FOREIGN KEY (`idReponse`) REFERENCES `reponse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `fk_evaluation_examen1` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluation_stagiaire1` FOREIGN KEY (`idStagiaire`) REFERENCES `stagiaire` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `FK_CONCERNER` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`id`);

--
-- Constraints for table `formateur_filiere`
--
ALTER TABLE `formateur_filiere`
  ADD CONSTRAINT `FORMATEUR_FILIERE_ibfk_1` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`id`),
  ADD CONSTRAINT `FORMATEUR_FILIERE_ibfk_2` FOREIGN KEY (`idFormateur`) REFERENCES `formateur` (`id`);

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `FK_INCLURE` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`id`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `MODULE_ibfk_1` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`id`);

--
-- Constraints for table `module_assurer`
--
ALTER TABLE `module_assurer`
  ADD CONSTRAINT `ModuleAssurer_ibfk_1` FOREIGN KEY (`idFormateur`) REFERENCES `formateur` (`id`),
  ADD CONSTRAINT `ModuleAssurer_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `ModuleAssurer_ibfk_3` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`);

--
-- Constraints for table `pour`
--
ALTER TABLE `pour`
  ADD CONSTRAINT `FK_POUR` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `FK_POUR2` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_avoir_rc` FOREIGN KEY (`idReponse`) REFERENCES `reponse` (`id`),
  ADD CONSTRAINT `fk_question_competence1` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `fk_stagiaire_groupe1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
