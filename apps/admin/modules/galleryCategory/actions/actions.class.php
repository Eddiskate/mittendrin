<?php

/**
 * galleryCategory actions.
 *
 * @package    blackcms
 * @subpackage galleryCategory
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galleryCategoryActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->gallery_categorys = Doctrine_Core::getTable('GalleryCategory')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new GalleryCategoryForm();

        if ($request->getParameter('idgallery_catalog')) {
            $this->getUser()->setAttribute('idgallery_catalog', $request->getParameter('idgallery_catalog'));
        }
        $this->gallery_category_id = $this->getUser()->getAttribute('idgallery_catalog');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new GalleryCategoryForm();

        $this->gallery_category_id = $this->form->getObject()->getGalleryCatalogIdgalleryCatalog();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($gallery_category = Doctrine_Core::getTable('GalleryCategory')->find(array($request->getParameter('idgallery_category'))), sprintf('Object gallery_category does not exist (%s).', $request->getParameter('idgallery_category')));
        $this->gallery_category_id = $gallery_category->getGalleryCatalogIdgalleryCatalog();
        $this->form = new GalleryCategoryForm($gallery_category);       
        $this->form_lang = new BpcmsGalleryCategoryI18nForm();

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();        
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($gallery_category = Doctrine_Core::getTable('GalleryCategory')->find(array($request->getParameter('idgallery_category'))), sprintf('Object gallery_category does not exist (%s).', $request->getParameter('idgallery_category')));
        $this->form = new GalleryCategoryForm($gallery_category);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($gallery_category = Doctrine_Core::getTable('GalleryCategory')->find(array($request->getParameter('idgallery_category'))), sprintf('Object gallery_category does not exist (%s).', $request->getParameter('idgallery_category')));

        $gallery = Doctrine_Core::getTable('Gallery')->findBy('gallery_category_idgallery_category', $gallery_category->getIdgalleryCategory());

        foreach ($gallery as $gallery) {
            unlink(sfConfig::get('sf_web_dir') . '/images/gallery/' . $gallery->getFileName());
            unlink(sfConfig::get('sf_web_dir') . '/images/gallery/thumbs/' . $gallery->getFileName());
            $gallery->delete();
        }

        $gallery_category->delete();

        $this->getUser()->setFlash('monit', 'Galeria oraz jej zawartość została poprawnie usunięta.');

        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $gallery_category = $form->save();

            $this->redirect('gallery/category?idgallery_catalog=' . $gallery_category->getGalleryCatalogIdgalleryCatalog());
        }
    }

}
