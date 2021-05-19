SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `bpcms_page`.`gallery` 
DROP INDEX `fk_gallery_gallery_category1` ,
ADD INDEX `fk_gallery_gallery_category1_idx` (`gallery_category_idgallery_category` ASC);

ALTER TABLE `bpcms_page`.`gallery_category` 
DROP INDEX `fk_gallery_category_gallery_catalog1` ,
ADD INDEX `fk_gallery_category_gallery_catalog1_idx` (`gallery_catalog_idgallery_catalog` ASC);

ALTER TABLE `bpcms_page`.`gallery_to_page` 
DROP INDEX `fk_gallery_to_page_page1` ,
ADD INDEX `fk_gallery_to_page_page1_idx` (`page_idpage` ASC),
DROP INDEX `fk_gallery_to_page_gallery_category1` ,
ADD INDEX `fk_gallery_to_page_gallery_category1_idx` (`gallery_category_idgallery_category` ASC);

ALTER TABLE `bpcms_page`.`gallery_to_post` 
DROP INDEX `fk_gallery_to_post_post1` ,
ADD INDEX `fk_gallery_to_post_post1_idx` (`post_idpost` ASC),
DROP INDEX `fk_gallery_to_post_gallery_category1` ,
ADD INDEX `fk_gallery_to_post_gallery_category1_idx` (`gallery_category_idgallery_category` ASC);

ALTER TABLE `bpcms_page`.`page` 
DROP INDEX `fk_page_cart` ,
ADD INDEX `fk_page_cart_idx` (`cart_idcart` ASC);

ALTER TABLE `bpcms_page`.`post` 
DROP INDEX `fk_post_post_catalog1` ,
ADD INDEX `fk_post_post_catalog1_idx` (`post_catalog_idpost_catalog` ASC);

ALTER TABLE `bpcms_page`.`slideshow` 
DROP COLUMN `body_p`,
DROP COLUMN `body_h1`,
ADD COLUMN `body_h1` VARCHAR(255) NULL DEFAULT NULL AFTER `file_name`,
ADD COLUMN `body_p` VARCHAR(255) NULL DEFAULT NULL AFTER `body_h1`;

ALTER TABLE `bpcms_page`.`post_catalog` 
CHANGE COLUMN `publication` `publication` INT(11) NULL DEFAULT 0 ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
