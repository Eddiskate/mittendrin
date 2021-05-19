SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_lang_install` (
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `signature` VARCHAR(45) NOT NULL,
  `active` INT(11) NULL DEFAULT NULL,
  `publication` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`signature`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_cart_i18n` (
  `cart_idcart` INT(11) NOT NULL,
  `lang_cart_name` VARCHAR(255) NULL DEFAULT NULL,
  `lang_title_alt` VARCHAR(255) NULL DEFAULT NULL,
  `lang_title_page` VARCHAR(255) NULL DEFAULT NULL,
  `lang_cart_name_title` VARCHAR(45) NULL DEFAULT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  INDEX `fk_cart_i18n_cart1_idx` (`cart_idcart` ASC),
  INDEX `fk_bpcms_cart_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  PRIMARY KEY (`bpcms_lang_install_signature`, `cart_idcart`),
  CONSTRAINT `fk_cart_i18n_cart1`
    FOREIGN KEY (`cart_idcart`)
    REFERENCES `bpcms_page`.`cart` (`idcart`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_cart_i18n_bpcms_lang_install1`
    FOREIGN KEY (`bpcms_lang_install_signature`)
    REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_page_i18n` (
  `page_idpage` INT(11) NOT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_page_name` VARCHAR(255) NULL DEFAULT NULL,
  `lang_page_title` VARCHAR(255) NULL DEFAULT NULL,
  `lang_body` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `fk_bpcms_page_i18n_page1_idx` (`page_idpage` ASC),
  INDEX `fk_bpcms_page_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  PRIMARY KEY (`page_idpage`, `bpcms_lang_install_signature`),
  CONSTRAINT `fk_bpcms_page_i18n_page1`
    FOREIGN KEY (`page_idpage`)
    REFERENCES `bpcms_page`.`page` (`idpage`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_page_i18n_bpcms_lang_install1`
    FOREIGN KEY (`bpcms_lang_install_signature`)
    REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_post_i18n` (
  `post_idpost` INT(11) NOT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_title` VARCHAR(255) NULL DEFAULT NULL,
  `lang_description` TEXT NULL DEFAULT NULL,
  INDEX `fk_bpcms_post_i18n_post1_idx` (`post_idpost` ASC),
  INDEX `fk_bpcms_post_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  CONSTRAINT `fk_bpcms_post_i18n_post1`
    FOREIGN KEY (`post_idpost`)
    REFERENCES `bpcms_page`.`post` (`idpost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_post_i18n_bpcms_lang_install1`
    FOREIGN KEY (`bpcms_lang_install_signature`)
    REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_post_catalog_i18n` (
  `post_catalog_idpost_catalog` INT(11) NOT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_name` VARCHAR(255) NULL DEFAULT NULL,
  INDEX `fk_bpcms_post_catalog_i18n_post_catalog1_idx` (`post_catalog_idpost_catalog` ASC),
  INDEX `fk_bpcms_post_catalog_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  CONSTRAINT `fk_bpcms_post_catalog_i18n_post_catalog1`
    FOREIGN KEY (`post_catalog_idpost_catalog`)
    REFERENCES `bpcms_page`.`post_catalog` (`idpost_catalog`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_post_catalog_i18n_bpcms_lang_install1`
    FOREIGN KEY (`bpcms_lang_install_signature`)
    REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_gallery_category_i18n` (
  `gallery_category_idgallery_category` INT(11) NOT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_category_name` VARCHAR(255) NULL DEFAULT NULL,
  INDEX `fk_bpcms_gallery_category_i18n_gallery_category1_idx` (`gallery_category_idgallery_category` ASC),
  INDEX `fk_bpcms_gallery_category_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  CONSTRAINT `fk_bpcms_gallery_category_i18n_gallery_category1`
    FOREIGN KEY (`gallery_category_idgallery_category`)
    REFERENCES `bpcms_page`.`gallery_category` (`idgallery_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_gallery_category_i18n_bpcms_lang_install1`
    FOREIGN KEY (`bpcms_lang_install_signature`)
    REFERENCES `bpcms_page`.`bpcms_lang_install` (`signature`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bpcms_page`.`bpcms_gallery_catalog_i18n` (
  `gallery_catalog_idgallery_catalog` INT(11) NOT NULL,
  `bpcms_lang_install_signature` VARCHAR(45) NOT NULL,
  `lang_catalog_name` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `fk_bpcms_gallery_catalog_i18n_gallery_catalog1_idx` (`gallery_catalog_idgallery_catalog` ASC),
  INDEX `fk_bpcms_gallery_catalog_i18n_bpcms_lang_install1_idx` (`bpcms_lang_install_signature` ASC),
  CONSTRAINT `fk_bpcms_gallery_catalog_i18n_gallery_catalog1`
    FOREIGN KEY (`gallery_catalog_idgallery_catalog`)
    REFERENCES `bpcms_page`.`gallery_catalog` (`idgallery_catalog`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bpcms_gallery_catalog_i18n_bpcms_lang_install1`
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
