SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `bpcms_page`.`bpcms_post_i18n` 
DROP FOREIGN KEY `fk_bpcms_post_i18n_bpcms_lang_install1`;

ALTER TABLE `bpcms_page`.`bpcms_post_catalog_i18n` 
DROP FOREIGN KEY `fk_bpcms_post_catalog_i18n_bpcms_lang_install1`;

ALTER TABLE `bpcms_page`.`bpcms_gallery_category_i18n` 
DROP FOREIGN KEY `fk_bpcms_gallery_category_i18n_bpcms_lang_install1`;

ALTER TABLE `bpcms_page`.`bpcms_gallery_catalog_i18n` 
DROP FOREIGN KEY `fk_bpcms_gallery_catalog_i18n_bpcms_lang_install1`;

ALTER TABLE `bpcms_page`.`bpcms_download_catalog_i18n` 
DROP FOREIGN KEY `fk_bpcms_download_catalog_i18n_download_catalog1`,
DROP FOREIGN KEY `fk_bpcms_download_catalog_i18n_bpcms_lang_install1`;

ALTER TABLE `bpcms_page`.`bpcms_download_i18n` 
DROP FOREIGN KEY `fk_bpcms_download_i18n_download1`,
DROP FOREIGN KEY `fk_bpcms_download_i18n_bpcms_lang_install1`;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_text_i18n` (
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_text_value` TEXT NULL DEFAULT NULL,
  `bpcms_lang_text_name` INT(11) NOT NULL,
  PRIMARY KEY (`bpcms_lang_install_signature`, `bpcms_lang_text_name`),
  INDEX `fk_bpcms_text_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  INDEX `fk_bpcms_text_i18n_bpcms_lang_text1_idx` (`bpcms_lang_text_name` ASC),
  CONSTRAINT `fk_bpcms_text_i18n_bpcms_lang_install1`
    FOREIGN KEY (`bpcms_lang_install_signature`)
    REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_text_i18n_bpcms_lang_text1`
    FOREIGN KEY (`bpcms_lang_text_name`)
    REFERENCES `bpcms_page`.`bpcms_lang_text` (`text_name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_lang_text` (
  `text_name` INT(11) NOT NULL,
  PRIMARY KEY (`text_name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `bpcms_page`.`bpcms_post_i18n` 
DROP FOREIGN KEY `fk_bpcms_post_i18n_post1`;

ALTER TABLE `bpcms_page`.`bpcms_post_i18n` ADD CONSTRAINT `fk_bpcms_post_i18n_post1`
  FOREIGN KEY (`post_idpost`)
  REFERENCES `bpcms_page`.`post` (`idpost`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bpcms_post_i18n_bpcms_lang_install1`
  FOREIGN KEY (`bpcms_lang_install_signature`)
  REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `bpcms_page`.`bpcms_post_catalog_i18n` 
DROP FOREIGN KEY `fk_bpcms_post_catalog_i18n_post_catalog1`;

ALTER TABLE `bpcms_page`.`bpcms_post_catalog_i18n` ADD CONSTRAINT `fk_bpcms_post_catalog_i18n_post_catalog1`
  FOREIGN KEY (`post_catalog_idpost_catalog`)
  REFERENCES `bpcms_page`.`post_catalog` (`idpost_catalog`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bpcms_post_catalog_i18n_bpcms_lang_install1`
  FOREIGN KEY (`bpcms_lang_install_signature`)
  REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `bpcms_page`.`bpcms_gallery_category_i18n` 
DROP FOREIGN KEY `fk_bpcms_gallery_category_i18n_gallery_category1`;

ALTER TABLE `bpcms_page`.`bpcms_gallery_category_i18n` ADD CONSTRAINT `fk_bpcms_gallery_category_i18n_gallery_category1`
  FOREIGN KEY (`gallery_category_idgallery_category`)
  REFERENCES `bpcms_page`.`gallery_category` (`idgallery_category`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bpcms_gallery_category_i18n_bpcms_lang_install1`
  FOREIGN KEY (`bpcms_lang_install_signature`)
  REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `bpcms_page`.`bpcms_gallery_catalog_i18n` 
DROP FOREIGN KEY `fk_bpcms_gallery_catalog_i18n_gallery_catalog1`;

ALTER TABLE `bpcms_page`.`bpcms_gallery_catalog_i18n` ADD CONSTRAINT `fk_bpcms_gallery_catalog_i18n_gallery_catalog1`
  FOREIGN KEY (`gallery_catalog_idgallery_catalog`)
  REFERENCES `bpcms_page`.`gallery_catalog` (`idgallery_catalog`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bpcms_gallery_catalog_i18n_bpcms_lang_install1`
  FOREIGN KEY (`bpcms_lang_install_signature`)
  REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `bpcms_page`.`bpcms_download_catalog_i18n` 
ADD CONSTRAINT `fk_bpcms_download_catalog_i18n_download_catalog1`
  FOREIGN KEY (`download_catalog_iddownload_catalog`)
  REFERENCES `bpcms_page`.`download_catalog` (`iddownload_catalog`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bpcms_download_catalog_i18n_bpcms_lang_install1`
  FOREIGN KEY (`bpcms_lang_install_signature`)
  REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `bpcms_page`.`bpcms_download_i18n` 
ADD CONSTRAINT `fk_bpcms_download_i18n_download1`
  FOREIGN KEY (`download_iddownload`)
  REFERENCES `bpcms_page`.`download` (`iddownload`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bpcms_download_i18n_bpcms_lang_install1`
  FOREIGN KEY (`bpcms_lang_install_signature`)
  REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
