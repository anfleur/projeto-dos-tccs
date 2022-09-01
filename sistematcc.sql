-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sistema_tcc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sistema_tcc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistema_tcc` DEFAULT CHARACTER SET utf8 ;
USE `sistema_tcc` ;

-- --------------------------f--------------------------
-- Table `sistema_tcc`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_tcc`.`curso` (
  `idcurso` INT NOT NULL AUTO_INCREMENT,
  `nome_curso` VARCHAR(200) NOT NULL,
  `eixo_curso` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcurso`),
  UNIQUE INDEX `idcurso_UNIQUE` (`idcurso` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_tcc`.`tcc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_tcc`.`tcc` (
  `idtcc` INT NOT NULL AUTO_INCREMENT,
  `status_tcc` INT(1) NOT NULL,
  `nome_tcc` VARCHAR(200) NOT NULL,
  `ano_tcc` YEAR NOT NULL,
  `descricao_tcc` VARCHAR(500) NOT NULL,
  `curso_idcurso` INT NOT NULL,
  PRIMARY KEY (`idtcc`),
  UNIQUE INDEX `idtcc_UNIQUE` (`idtcc` ASC),
  INDEX `fk_tcc_curso_idx` (`curso_idcurso` ASC),
  CONSTRAINT `fk_tcc_curso`
    FOREIGN KEY (`curso_idcurso`)
    REFERENCES `sistema_tcc`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_tcc`.`professores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_tcc`.`professores` (
  `ra_professor` VARCHAR(10) NOT NULL,
  `nome_professor` VARCHAR(200) NOT NULL,
  `email_professor` VARCHAR(200) NOT NULL,
  `senha_professor` VARCHAR(100) NOT NULL,
  `isadmin` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`ra_professor`),
  UNIQUE INDEX `ra_professor_UNIQUE` (`ra_professor` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_tcc`.`alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_tcc`.`alunos` (
  `rm_aluno` VARCHAR(10) NOT NULL,
  `nome_aluno` VARCHAR(200) NOT NULL,
  `email_aluno` VARCHAR(200) NOT NULL,
  `senha_aluno` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`rm_aluno`),
  UNIQUE INDEX `rm_aluno_UNIQUE` (`rm_aluno` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_tcc`.`tcc_alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_tcc`.`tcc_alunos` (
  `alunos_rm_aluno` VARCHAR(10) NOT NULL,
  `tcc_idtcc` INT NOT NULL,
  PRIMARY KEY (`alunos_rm_aluno`, `tcc_idtcc`),
  INDEX `fk_alunos_has_tcc_tcc1_idx` (`tcc_idtcc` ASC),
  INDEX `fk_alunos_has_tcc_alunos1_idx` (`alunos_rm_aluno` ASC),
  CONSTRAINT `fk_alunos_has_tcc_alunos1`
    FOREIGN KEY (`alunos_rm_aluno`)
    REFERENCES `sistema_tcc`.`alunos` (`rm_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alunos_has_tcc_tcc1`
    FOREIGN KEY (`tcc_idtcc`)
    REFERENCES `sistema_tcc`.`tcc` (`idtcc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_tcc`.`tcc_professores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_tcc`.`tcc_professores` (
  `professores_ra_professor` VARCHAR(10) NOT NULL,
  `tcc_idtcc` INT NOT NULL,
  PRIMARY KEY (`professores_ra_professor`, `tcc_idtcc`),
  INDEX `fk_professores_has_tcc_tcc1_idx` (`tcc_idtcc` ASC),
  INDEX `fk_professores_has_tcc_professores1_idx` (`professores_ra_professor` ASC),
  CONSTRAINT `fk_professores_has_tcc_professores1`
    FOREIGN KEY (`professores_ra_professor`)
    REFERENCES `sistema_tcc`.`professores` (`ra_professor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professores_has_tcc_tcc1`
    FOREIGN KEY (`tcc_idtcc`)
    REFERENCES `sistema_tcc`.`tcc` (`idtcc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
