<?php

/**
 * galleryCatalog actions.
 *
 * @package    blackcms
 * @subpackage galleryCatalog
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galleryCatalogActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->gallery_catalogs = Doctrine_Core::getTable('GalleryCatalog')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new GalleryCatalogForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new GalleryCatalogForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($gallery_catalog = Doctrine_Core::getTable('GalleryCatalog')->find(array($request->getParameter('idgallery_catalog'))), sprintf('Object gallery_catalog does not exist (%s).', $request->getParameter('idgallery_catalog')));
        $this->form = new GalleryCatalogForm($gallery_catalog);
        $this->form_lang = new BpcmsGalleryCatalogI18nForm();

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($gallery_catalog = Doctrine_Core::getTable('GalleryCatalog')->find(array($request->getParameter('idgallery_catalog'))), sprintf('Object gallery_catalog does not exist (%s).', $request->getParameter('idgallery_catalog')));
        $this->form = new GalleryCatalogForm($gallery_catalog);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($gallery_catalog = Doctrine_Core::getTable('GalleryCatalog')->find(array($request->getParameter('idgallery_catalog'))), sprintf('Object gallery_catalog does not exist (%s).', $request->getParameter('idgallery_catalog')));

        $gallery_category = Doctrine_Core::getTable('GalleryCategory')->findBy('gallery_catalog_idgallery_catalog', $request->getParameter('idgallery_catalog'));

        foreach ($gallery_category as $gallery_category) {
            $gallery = Doctrine_Core::getTable('Gallery')->findBy('gallery_category_idgallery_category', $gallery_category->getIdgalleryCategory());

            foreach ($gallery as $gallery) {
                unlink(sfConfig::get('sf_web_dir') . '/images/gallery/' . $gallery->getFileName());
                unlink(sfConfig::get('sf_web_dir') . '/images/gallery/thumbs/' . $gallery->getFileName());
                $gallery->delete();
            }

            $gallery_category->delete();
        }

        $gallery_catalog->delete();

        $this->getUser()->setFlash('monit', 'Galeria oraz jej zawartość została poprawnie usunięta.');

        $this->redirect('gallery/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $gallery_catalog = $form->save();

            if ($gallery_catalog->getNoCategory() == 1) {
                $gallery_category = Doctrine_Core::getTable('GalleryCategory')
                        ->createQuery('a')
                        ->where('a.gallery_catalog_idgallery_catalog = ?', $gallery_catalog->getIdgalleryCatalog())
                        ->andWhere('a.category_name = ?', 'no_category')
                        ->fetchOne();
                if (!$gallery_category) {
                    $gallery_category = new GalleryCategory();
                }
                $gallery_category->setCategoryName('no_category');
                $gallery_category->setGalleryCatalogIdgalleryCatalog($gallery_catalog->getIdgalleryCatalog());
                $gallery_category->setPublication(0);
                $gallery_category->save();

                $this->redirect('gallery/list?idgallery_category=' . $gallery_category->getIdgalleryCategory());
            }

            $this->redirect('gallery/category?idgallery_catalog=' . $gallery_catalog->getIdgalleryCatalog());
        }
    }

}
