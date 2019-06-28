  -- MySQL Script generated by MySQL Workbench
  -- qui 12 out 2017 20:56:08 -03
  -- Model: New Model    Version: 1.0
  -- MySQL Workbench Forward Engineering

  SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
  SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
  SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

  -- -----------------------------------------------------
  -- Schema mydb
  -- -----------------------------------------------------
  -- -----------------------------------------------------
  -- Schema medicos
  -- -----------------------------------------------------
  DROP DATABASE IF EXISTS `medicos` ;

  -- -----------------------------------------------------
  -- Schema medicos
  -- -----------------------------------------------------
  CREATE DATABASE IF NOT EXISTS `medicos` DEFAULT CHARACTER SET utf8 ;
  USE `medicos` ;

  -- -----------------------------------------------------
  -- Table `medicos`.`medico`
  -- -----------------------------------------------------
  DROP TABLE IF EXISTS `medicos`.`medicos` ;

  CREATE TABLE IF NOT EXISTS `medicos`.`medicos` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(50) NOT NULL,
    `crm` VARCHAR(15) NOT NULL,

    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `deleted_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
  )ENGINE = InnoDB;


  -- -----------------------------------------------------
  -- Table `medicos`.`especialidades`
  -- -----------------------------------------------------
  DROP TABLE IF EXISTS `medicos`.`especialidades` ;

  CREATE TABLE IF NOT EXISTS `medicos`.`especialidades` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(150) NOT NULL,

    PRIMARY KEY (`id`)
  )ENGINE = InnoDB;


  -- -----------------------------------------------------
  -- Table `medicos`.`telefones`
  -- -----------------------------------------------------
  DROP TABLE IF EXISTS `medicos`.`telefones` ;

  CREATE TABLE IF NOT EXISTS `medicos`.`telefones` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `tipo_telefone_id` INT(11) UNSIGNED NOT NULL,
    `numero` VARCHAR(20) NOT NULL,
    `medico_id` INT(11) UNSIGNED NOT NULL,

    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `deleted_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
  )ENGINE = InnoDB;

  -- -----------------------------------------------------
  -- Table `medicos`.`telefones`
  -- -----------------------------------------------------
  DROP TABLE IF EXISTS `medicos`.`tipos_telefone` ;

  CREATE TABLE IF NOT EXISTS `medicos`.`tipos_telefone` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(20) NOT NULL,

    PRIMARY KEY (`id`)
  )ENGINE = InnoDB;


  -- -----------------------------------------------------
  -- Table `medicos`.`medicos_especialidades`
  -- -----------------------------------------------------
  DROP TABLE IF EXISTS `medicos`.`medicos_especialidades` ;

  CREATE TABLE IF NOT EXISTS `medicos`.`medicos_especialidades` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `medico_id` INT(11) UNSIGNED NOT NULL,
    `especialidade_id` INT(11) UNSIGNED NOT NULL,

    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `deleted_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
  )ENGINE = InnoDB;

  ALTER TABLE `telefones` ADD CONSTRAINT `telefones_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

  ALTER TABLE `telefones` ADD CONSTRAINT `telefones_tipo_telefone_id_foreign` FOREIGN KEY (`tipo_telefone_id`) REFERENCES `tipos_telefone`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

  ALTER TABLE `medicos_especialidades` ADD CONSTRAINT `medicos_especialidades_especialidade_id_foreign` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

  ALTER TABLE `medicos_especialidades` ADD CONSTRAINT `medicos_especialidades_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

  -- -----------------------------------------------------
  -- Inserção de dados
  -- -----------------------------------------------------

  INSERT INTO `medicos`.`especialidades`(`id`, `nome`) VALUES (1, 'ALERGOLOGIA'), (2, 'ANGIOLOGIA'), (3, 'BUCO MAXILO'), (4, 'CARDIOLOGIA CLINICA'), (5, 'CARDIOLOGIA INFANTIL'), (6, 'CIRURGIA CABEÇA E PESCOÇO'), (7, 'CIRURGIA CARDÍACA'), (8, 'CIRURGIA DE CABEÇA/PESCOÇO'), (9, 'CIRURGIA DE TORÁX'), (10, 'CIRURGIA GERAL'), (11, 'CIRURGIA PEDIÁTRICA'), (12, 'CIRURGIA PLÁSTICA'), (13, 'CIRURGIA TORÁCICA'), (14, 'CIRURGIA VASCULAR'), (15, 'CLINICA MEDICA');

  INSERT INTO `medicos`.`tipos_telefone`(`id`, `nome`) VALUES (1, 'RESIDENCIAL'), (2, 'CELULAR'), (3, 'OUTROS');
