<?php

/**
 * GalleryCatalog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class GalleryCatalog extends BaseGalleryCatalog {

    public function getLink() {
        if (parent::getNoCategory() == 1) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')
                    ->createQuery('a')
                    ->where('a.gallery_catalog_idgallery_catalog = ?', parent::getIdgalleryCatalog())
                    ->andWhere('a.category_name = ?', 'no_category')
                    ->fetchOne();
            return 'gallery/list?idgallery_category=' . $gallery_category->getIdgallery_category();
        } else {
            return 'gallery/category?idgallery_catalog=' . parent::getIdgalleryCatalog();
        }
    }

    public function getNameLink() {
        if (parent::getNoCategory() == 1) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')
                    ->createQuery('a')
                    ->where('a.gallery_catalog_idgallery_catalog = ?', parent::getIdgalleryCatalog())
                    ->andWhere('a.category_name = ?', 'no_category')
                    ->fetchOne();
            return link_to(parent::getCatalogName(), 'gallery/list?idgallery_category=' . $gallery_category->getIdgallery_category());
        } else {
            return link_to(parent::getCatalogName(), 'gallery/category?idgallery_catalog=' . parent::getIdgalleryCatalog());
        }
    }

    public function getAvatarFileList() {
        $gallery_category = Doctrine_Core::getTable('GalleryCategory')
                ->createQuery('a')
                ->where('a.gallery_catalog_idgallery_catalog = ?', parent::getIdgalleryCatalog())
                ->fetchOne();

        if ($gallery_category) {
            $gallerys = Doctrine_Core::getTable('Gallery')
                    ->createQuery('a')
                    ->where('a.gallery_category_idgallery_category = ?', $gallery_category->getIdgalleryCategory())
                    ->limit(5)
                    ->execute();
        }
        return $gallerys;
    }

    public function getTag() {
        if (parent::getNoCategory() == 1) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')
                    ->createQuery('a')
                    ->where('a.gallery_catalog_idgallery_catalog = ?', parent::getIdgalleryCatalog())
                    ->andWhere('a.category_name = ?', 'no_category')
                    ->fetchOne();
            
            return '{GALLERY_' . $gallery_category->getIdgallery_category() . '}';
        } else {
            return '<i>posiada kategorie</i>';
        }
    }

    public function getCategorys() {
        $gallery_category = Doctrine_Core::getTable('GalleryCategory')->createQuery('a')
                ->where('a.gallery_catalog_idgallery_catalog = ?', parent::getIdgalleryCatalog())
                ->execute();
        
        return $gallery_category;
    }
    
    public function getLangCatalogName() {
        $bpcms_gallery_catalog_i18n = Doctrine_Core::getTable('BpcmsGalleryCatalogI18n')->createQuery('a')
                ->where('a.gallery_catalog_idgallery_catalog = ?', parent::getIdgalleryCatalog())
                ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
                ->fetchOne();

        if ($bpcms_gallery_catalog_i18n) {
            return $bpcms_gallery_catalog_i18n->getLangCatalogName() ? $bpcms_gallery_catalog_i18n->getLangCatalogName() : parent::getCatalogName();
        } else {
            return parent::getCatalogName();
        }
    }    
}
