<?php

/**
 * gallery actions.
 *
 * @package    blackcms
 * @subpackage gallery
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galleryActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        define('PAGE_TITLE', Configuration::getOptionValue('module_gallery'));
        $this->gallery_catalogs = Doctrine_Core::getTable('GalleryCatalog')
                ->createQuery('a')
                ->where('a.publication = ?', 1)
                ->execute();
    }

    public function executeList(sfWebRequest $request) {
        define('PAGE_TITLE', Configuration::getOptionValue('module_gallery'));
        $this->gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('idgallery_category', $request->getParameter('idgallery_category'));

        $this->gallerys = Doctrine_Core::getTable('Gallery')
                ->createQuery('a')
                ->where('a.gallery_category_idgallery_category = ?', $request->getParameter('idgallery_category'))
                ->execute();
    }

}
