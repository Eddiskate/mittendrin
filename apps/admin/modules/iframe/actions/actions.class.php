<?php

/**
 * iframe actions.
 *
 * @package    blackcms
 * @subpackage iframe
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class iframeActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeGallery(sfWebRequest $request) {
        if ($request->getParameter('idgallery_category') != '') {
            $this->getUser()->setAttribute('tmp_gallery_select', $request->getParameter('idgallery_category'));
        }

        $this->gallery_catalogs = Doctrine_Core::getTable('GalleryCatalog')->createQuery('a')
                ->execute();

        $gallerys = Doctrine_Core::getTable('Gallery')->createQuery('a');
        if($this->getUser()->getAttribute('tmp_gallery_select') != '') {
            $gallerys->where('a.gallery_category_idgallery_category = ?', $this->getUser()->getAttribute('tmp_gallery_select'));
        }
        $gallerys->orderBy('a.idgallery DESC');

        $this->gallerys = $gallerys->execute();

        $this->gallery_category_select = Doctrine_Core::getTable('GalleryCategory')->find(array($this->getUser()->getAttribute('tmp_gallery_select')));
    }

}
