SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `bpcms_page`.`bpcms_text_i18n` 
DROP FOREIGN KEY `fk_bpcms_text_i18n_bpcms_lang_text1`;

ALTER TABLE `bpcms_page`.`bpcms_text_i18n` 
DROP COLUMN `bpcms_lang_text_name`,
ADD COLUMN `bpcms_lang_text_text_name` VARCHAR(200) NOT NULL AFTER `lang_text_value`,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`bpcms_lang_install_signature`),
ADD INDEX `fk_bpcms_text_i18n_bpcms_lang_text1_idx` (`bpcms_lang_text_text_name` ASC),
DROP INDEX `fk_bpcms_text_i18n_bpcms_lang_text1_idx` ;

ALTER TABLE `bpcms_page`.`bpcms_lang_text` 
CHANGE COLUMN `text_name` `text_name` VARCHAR(200) NOT NULL ;

ALTER TABLE `bpcms_page`.`bpcms_text_i18n` 
ADD CONSTRAINT `fk_bpcms_text_i18n_bpcms_lang_text1`
  FOREIGN KEY (`bpcms_lang_text_text_name`)
  REFERENCES `bpcms_page`.`bpcms_lang_text` (`text_name`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
