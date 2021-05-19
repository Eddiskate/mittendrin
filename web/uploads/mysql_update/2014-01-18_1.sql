SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE TABLE IF NOT EXISTS `bpcms_page`.`download` (
  `iddownload` INT(11) NOT NULL AUTO_INCREMENT,
  `file_name` VARCHAR(45) NULL DEFAULT NULL,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `publication` INT(11) NULL DEFAULT NULL,
  `download_catalog_iddownload_catalog` INT(11) NOT NULL,
  PRIMARY KEY (`iddownload`),
  INDEX `fk_download_download_catalog1_idx` (`download_catalog_iddownload_catalog` ASC),
  CONSTRAINT `fk_download_download_catalog1`
    FOREIGN KEY (`download_catalog_iddownload_catalog`)
    REFERENCES `bpcms_page`.`download_catalog` (`iddownload_catalog`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`download_catalog` (
  `iddownload_catalog` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `publication` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`iddownload_catalog`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_download_catalog_i18n` (
  `download_catalog_iddownload_catalog` INT(11) NOT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_name` VARCHAR(255) NULL DEFAULT NULL,
  INDEX `fk_bpcms_download_catalog_i18n_download_catalog1_idx` (`download_catalog_iddownload_catalog` ASC),
  INDEX `fk_bpcms_download_catalog_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  PRIMARY KEY (`download_catalog_iddownload_catalog`, `bpcms_lang_install_signature`),
  CONSTRAINT `fk_bpcms_download_catalog_i18n_download_catalog1`
    FOREIGN KEY (`download_catalog_iddownload_catalog`)
    REFERENCES `bpcms_page`.`download_catalog` (`iddownload_catalog`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_download_catalog_i18n_bpcms_lang_install1`
    FOREIGN KEY (`bpcms_lang_install_signature`)
    REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_download_i18n` (
  `download_iddownload` INT(11) NOT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_title` VARCHAR(255) NULL DEFAULT NULL,
  INDEX `fk_bpcms_download_i18n_download1_idx` (`download_iddownload` ASC),
  INDEX `fk_bpcms_download_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  PRIMARY KEY (`bpcms_lang_install_signature`, `download_iddownload`),
  CONSTRAINT `fk_bpcms_download_i18n_download1`
    FOREIGN KEY (`download_iddownload`)
    REFERENCES `bpcms_page`.`download` (`iddownload`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_download_i18n_bpcms_lang_install1`
    FOREIGN KEY (`bpcms_lang_install_signature`)
    REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
