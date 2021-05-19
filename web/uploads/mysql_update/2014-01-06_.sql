SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `bpcms_page`.`bpcms_post_i18n` 
ADD PRIMARY KEY (`post_idpost`, `bpcms_lang_install_signature`);

ALTER TABLE `bpcms_page`.`bpcms_post_catalog_i18n` 
ADD PRIMARY KEY (`post_catalog_idpost_catalog`, `bpcms_lang_install_signature`);

ALTER TABLE `bpcms_page`.`bpcms_gallery_category_i18n` 
ADD PRIMARY KEY (`gallery_category_idgallery_category`, `bpcms_lang_install_signature`);

ALTER TABLE `bpcms_page`.`bpcms_gallery_catalog_i18n` 
ADD PRIMARY KEY (`gallery_catalog_idgallery_catalog`, `bpcms_lang_install_signature`);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
