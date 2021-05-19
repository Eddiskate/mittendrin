SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_gallery_i18n` (
  `gallery_idgallery` INT(11) NOT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_file_title` VARCHAR(255) NULL DEFAULT NULL,
  INDEX `fk_bpcms_gallery_i18n_gallery1_idx` (`gallery_idgallery` ASC),
  INDEX `fk_bpcms_gallery_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  PRIMARY KEY (`bpcms_lang_install_signature`, `gallery_idgallery`),
  CONSTRAINT `fk_bpcms_gallery_i18n_gallery1`
    FOREIGN KEY (`gallery_idgallery`)
    REFERENCES `bpcms_page`.`gallery` (`idgallery`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_gallery_i18n_bpcms_lang_install1`
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
