-- MySQL Script generated by MySQL Workbench
-- Sat Nov 23 22:11:47 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_buffast
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_buffast` ;

-- -----------------------------------------------------
-- Schema db_buffast
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_buffast` DEFAULT CHARACTER SET utf8 ;
USE `db_buffast` ;

-- -----------------------------------------------------
-- Table `db_buffast`.`tb_buffet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_buffast`.`tb_buffet` ;

CREATE TABLE IF NOT EXISTS `db_buffast`.`tb_buffet` (
  `cd_buffet` VARCHAR(36) NOT NULL,
  `nome_buffet` VARCHAR(120) NOT NULL,
  `cnpj` VARCHAR(120) NOT NULL,
  `url_pfp` VARCHAR(200) NULL,
  `senha` VARCHAR(120) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `status_buffet` CHAR(1) NOT NULL DEFAULT 'P',
  `data_registro` DATETIME NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`cd_buffet`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_buffast`.`tb_estoque`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_buffast`.`tb_estoque` ;

CREATE TABLE IF NOT EXISTS `db_buffast`.`tb_estoque` (
  `cd_estoque` VARCHAR(36) NOT NULL,
  `id_produto` VARCHAR(36) NOT NULL,
  INDEX `fk_tb_estoque_tb_produto1_idx` (`id_produto` ASC) ,
  PRIMARY KEY (`cd_estoque`),
  CONSTRAINT `fk_tb_estoque_tb_produto1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `db_buffast`.`tb_produto` (`cd_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_buffast`.`tb_festa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_buffast`.`tb_festa` ;

CREATE TABLE IF NOT EXISTS `db_buffast`.`tb_festa` (
  `cd_festa` VARCHAR(36) NOT NULL,
  `nome_aniversariante` VARCHAR(120) NOT NULL,
  `data_aniversario` VARCHAR(120) NOT NULL,
  `convidados` TINYINT UNSIGNED NOT NULL,
  `nome_responsavel` VARCHAR(120) NOT NULL,
  `cpf_responsavel` VARCHAR(120) NOT NULL,
  `inicio` DATETIME NOT NULL,
  `fim` DATETIME NOT NULL,
  `id_buffet` VARCHAR(36) NOT NULL,
  PRIMARY KEY (`cd_festa`),
  INDEX `fk_tb_festa_tb_buffet_idx` (`id_buffet` ASC) ,
  CONSTRAINT `fk_tb_festa_tb_buffet`
    FOREIGN KEY (`id_buffet`)
    REFERENCES `db_buffast`.`tb_buffet` (`cd_buffet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_buffast`.`tb_mesa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_buffast`.`tb_mesa` ;

CREATE TABLE IF NOT EXISTS `db_buffast`.`tb_mesa` (
  `cd_mesa` VARCHAR(36) NOT NULL,
  `numero_mesa` TINYINT UNSIGNED NOT NULL,
  `id_buffet` VARCHAR(36) NOT NULL,
  PRIMARY KEY (`cd_mesa`),
  INDEX `fk_tb_mesa_tb_buffet1_idx` (`id_buffet` ASC) ,
  CONSTRAINT `fk_tb_mesa_tb_buffet1`
    FOREIGN KEY (`id_buffet`)
    REFERENCES `db_buffast`.`tb_buffet` (`cd_buffet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_buffast`.`tb_pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_buffast`.`tb_pedido` ;

CREATE TABLE IF NOT EXISTS `db_buffast`.`tb_pedido` (
  `cd_pedido` VARCHAR(36) NOT NULL COMMENT '		',
  `data_pedido` DATETIME NOT NULL DEFAULT (curdate()),
  `status_pedido` CHAR(1) NOT NULL DEFAULT 'P',
  `id_mesa` VARCHAR(36) NOT NULL,
  `id_festa` VARCHAR(36) NOT NULL,
  PRIMARY KEY (`cd_pedido`),
  INDEX `fk_tb_pedido_tb_mesa1_idx` (`id_mesa` ASC) ,
  INDEX `fk_tb_pedido_tb_festa1_idx` (`id_festa` ASC) ,
  CONSTRAINT `fk_tb_pedido_tb_mesa1`
    FOREIGN KEY (`id_mesa`)
    REFERENCES `db_buffast`.`tb_mesa` (`cd_mesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_pedido_tb_festa1`
    FOREIGN KEY (`id_festa`)
    REFERENCES `db_buffast`.`tb_festa` (`cd_festa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_buffast`.`tb_produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_buffast`.`tb_produto` ;

CREATE TABLE IF NOT EXISTS `db_buffast`.`tb_produto` (
  `cd_produto` VARCHAR(36) NOT NULL,
  `nome_produto` VARCHAR(40) NOT NULL,
  `quantidade_pote` TINYINT UNSIGNED NOT NULL,
  `url_imagem` VARCHAR(300) NOT NULL,
  `id_buffet` VARCHAR(36) NOT NULL,
  PRIMARY KEY (`cd_produto`),
  INDEX `fk_tb_produto_tb_buffet1_idx` (`id_buffet` ASC) ,
  CONSTRAINT `fk_tb_produto_tb_buffet1`
    FOREIGN KEY (`id_buffet`)
    REFERENCES `db_buffast`.`tb_buffet` (`cd_buffet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_buffast`.`tb_produto_has_tb_pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_buffast`.`tb_produto_has_tb_pedido` ;

CREATE TABLE IF NOT EXISTS `db_buffast`.`tb_produto_has_tb_pedido` (
  `id_produto` VARCHAR(36) NOT NULL,
  `id_pedido` VARCHAR(36) NOT NULL,
  PRIMARY KEY (`id_produto`, `id_pedido`),
  INDEX `fk_tb_produto_has_tb_pedido_tb_pedido1_idx` (`id_pedido` ASC) ,
  INDEX `fk_tb_produto_has_tb_pedido_tb_produto1_idx` (`id_produto` ASC) ,
  CONSTRAINT `fk_tb_produto_has_tb_pedido_tb_produto1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `db_buffast`.`tb_produto` (`cd_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_produto_has_tb_pedido_tb_pedido1`
    FOREIGN KEY (`id_pedido`)
    REFERENCES `db_buffast`.`tb_pedido` (`cd_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
