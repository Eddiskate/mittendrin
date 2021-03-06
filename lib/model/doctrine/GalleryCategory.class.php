<?php

/**
 * GalleryCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class GalleryCategory extends BaseGalleryCategory {

    public function __toString() {
        return parent::getCategoryName();
    }

    public function getTag() {
        return '{GALLERY_' . parent::getIdgalleryCategory() . '}';
    }

    public function getStatus() {
        if (parent::getPublication() == 1) {
            return 'widoczny na stronie';
        } else {
            return 'ukryty';
        }
    }

    public function getCategoryNameDefault() {
        if (parent::getCategoryName() == 'no_category') {
            return 'wszystkie';
        } else {
            return parent::getCategoryName();
        }
    }

    public function getCatalogNameWithIdpage() {
        $page = Doctrine_Core::getTable('Page')->findOneBy('idpage', parent::getCategoryName());

        if (!$page) {
            return parent::getCategoryNameDefault();
        }
        return $page;
    }

    public function getLangCategoryName() {
        $bpcms_gallery_category_i18n = Doctrine_Core::getTable('BpcmsGalleryCategoryI18n')->createQuery('a')
                ->where('a.gallery_category_idgallery_category = ?', parent::getIdgalleryCategory())
                ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
                ->fetchOne();

        if ($bpcms_gallery_category_i18n) {
            return $bpcms_gallery_category_i18n->getLangCategoryName() ? $bpcms_gallery_category_i18n->getLangCategoryName() : parent::getCategoryName();
        } else {
            return parent::getCategoryName();
        }
    }

}
