-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema quiz_app
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema quiz_app
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `quiz_app` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `quiz_app` ;

-- -----------------------------------------------------
-- Table `quiz_app`.`reponse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`reponse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `lib` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`filiere`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`filiere` (
  `id` INT NOT NULL,
  `lib` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`module`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`module` (
  `id` INT NOT NULL,
  `lib` VARCHAR(255) NULL DEFAULT NULL,
  `idFiliere` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `MODULE_ibfk_1`
    FOREIGN KEY (`idFiliere`)
    REFERENCES `quiz_app`.`filiere` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`competence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`competence` (
  `id` INT NOT NULL,
  `idModule` INT NOT NULL,
  `lib` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_COMPOSER`
    FOREIGN KEY (`idModule`)
    REFERENCES `quiz_app`.`module` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`question` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idReponse` INT NULL DEFAULT NULL,
  `lib` TEXT NULL DEFAULT NULL,
  `idCompetence` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_AVOIR_RC`
    FOREIGN KEY (`idReponse`)
    REFERENCES `quiz_app`.`reponse` (`id`),
  CONSTRAINT `fk_question_competence1`
    FOREIGN KEY (`idCompetence`)
    REFERENCES `quiz_app`.`competence` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`avoir_reponse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`avoir_reponse` (
  `idReponse` INT NOT NULL,
  `idQuestion` INT NOT NULL,
  PRIMARY KEY (`idReponse`, `idQuestion`),
  CONSTRAINT `FK_AVOIR_R`
    FOREIGN KEY (`idQuestion`)
    REFERENCES `quiz_app`.`question` (`id`),
  CONSTRAINT `FK_AVOIR_R2`
    FOREIGN KEY (`idReponse`)
    REFERENCES `quiz_app`.`reponse` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`groupe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`groupe` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idFiliere` INT NOT NULL,
  `lib` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_INCLURE`
    FOREIGN KEY (`idFiliere`)
    REFERENCES `quiz_app`.`filiere` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`stagiaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`stagiaire` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `idGroupe` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_stagiaire_groupe1`
    FOREIGN KEY (`idGroupe`)
    REFERENCES `quiz_app`.`groupe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`examen` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idCompetence` INT NOT NULL,
  `lib` VARCHAR(255) NULL DEFAULT NULL,
  `dateCreation` DATE NULL DEFAULT NULL,
  `datePassation` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_CONCERNER`
    FOREIGN KEY (`idCompetence`)
    REFERENCES `quiz_app`.`competence` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`evaluation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`evaluation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NULL DEFAULT NULL,
  `score` INT NULL DEFAULT NULL,
  `idStagiaire` INT NOT NULL,
  `idExamen` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_evaluation_stagiaire1`
    FOREIGN KEY (`idStagiaire`)
    REFERENCES `quiz_app`.`stagiaire` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluation_examen1`
    FOREIGN KEY (`idExamen`)
    REFERENCES `quiz_app`.`examen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`formateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`formateur` (
  `id` INT NOT NULL,
  `nom` VARCHAR(255) NULL DEFAULT NULL,
  `prenom` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`formateur_filiere`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`formateur_filiere` (
  `idFormateur` INT NOT NULL,
  `idFiliere` INT NOT NULL,
  PRIMARY KEY (`idFormateur`, `idFiliere`),
  CONSTRAINT `FORMATEUR_FILIERE_ibfk_1`
    FOREIGN KEY (`idFiliere`)
    REFERENCES `quiz_app`.`filiere` (`id`),
  CONSTRAINT `FORMATEUR_FILIERE_ibfk_2`
    FOREIGN KEY (`idFormateur`)
    REFERENCES `quiz_app`.`formateur` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`module_assurer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`module_assurer` (
  `idFormateur` INT NOT NULL,
  `idModule` INT NOT NULL,
  `idGroup` INT NOT NULL,
  PRIMARY KEY (`idModule`, `idGroup`),
  CONSTRAINT `ModuleAssurer_ibfk_1`
    FOREIGN KEY (`idFormateur`)
    REFERENCES `quiz_app`.`formateur` (`id`),
  CONSTRAINT `ModuleAssurer_ibfk_2`
    FOREIGN KEY (`idGroup`)
    REFERENCES `quiz_app`.`groupe` (`id`),
  CONSTRAINT `ModuleAssurer_ibfk_3`
    FOREIGN KEY (`idModule`)
    REFERENCES `quiz_app`.`module` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`pour`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`pour` (
  `idEvaluation` INT NOT NULL,
  `idQuestion` INT NOT NULL,
  PRIMARY KEY (`idEvaluation`, `idQuestion`),
  CONSTRAINT `FK_POUR`
    FOREIGN KEY (`idQuestion`)
    REFERENCES `quiz_app`.`question` (`id`),
  CONSTRAINT `FK_POUR2`
    FOREIGN KEY (`idEvaluation`)
    REFERENCES `quiz_app`.`examen` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `quiz_app`.`etre_choisi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_app`.`etre_choisi` (
  `idEvaluation` INT NOT NULL,
  `idQuestion` INT NOT NULL,
  `idReponse` INT NOT NULL,
  PRIMARY KEY (`idEvaluation`, `idQuestion`),
  CONSTRAINT `fk_proposer_evaluation1`
    FOREIGN KEY (`idEvaluation`)
    REFERENCES `quiz_app`.`evaluation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposer_question1`
    FOREIGN KEY (`idQuestion`)
    REFERENCES `quiz_app`.`question` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposer_reponse1`
    FOREIGN KEY (`idReponse`)
    REFERENCES `quiz_app`.`reponse` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
