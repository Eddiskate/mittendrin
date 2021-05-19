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
        /*
         * kasujemy dane sesji aby wrocic do galeri nie na podstrone
         */
        $this->getUser()->getAttributeHolder()->remove('tmp_forward_edit_page');

        $this->gallery_catalogs = Doctrine_Core::getTable('GalleryCatalog')
                ->createQuery('a')
                ->execute();
    }

    public function executeCategory(sfWebRequest $request) {
        $this->gallery_catalog = Doctrine_Core::getTable('GalleryCatalog')->findOneBy('idgallery_catalog', $request->getParameter('idgallery_catalog'));

        $this->gallery_categorys = Doctrine_Core::getTable('GalleryCategory')
                ->createQuery('a')
                ->where('a.gallery_catalog_idgallery_catalog = ?', $request->getParameter('idgallery_catalog'))
                ->execute();
    }

    public function executeList(sfWebRequest $request) {
        $this->gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('idgallery_category', $request->getParameter('idgallery_category'));

        $this->gallerys = Doctrine_Core::getTable('Gallery')
                ->createQuery('a')
                ->where('a.gallery_category_idgallery_category = ?', $request->getParameter('idgallery_category'))
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new GalleryForm();

        if ($request->getParameter('idpage')) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('category_name', $request->getParameter('idpage'));
            if (!$gallery_category) {
                $gallery_category = new GalleryCategory();
                $gallery_category->setCategoryName($request->getParameter('idpage'));
                $gallery_category->setPublication(0);
                $gallery_category->setGalleryCatalogIdgalleryCatalog(13);
                $gallery_category->save();
            }
            $this->idgallery_category = $gallery_category->getIdgalleryCategory();
        } else {
            $this->idgallery_category = $request->getParameter('idgallery_category');
        }
    }

    public function executeAdd(sfWebRequest $request) {
        $this->form = new GalleryForm();

        $idpost = $request->getParameter('idpost');

        if ($idpost) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('category_name', $idpost);
            if (!$gallery_category) {
                $gallery_category = new GalleryCategory();
                $gallery_category->setCategoryName($idpost);
                $gallery_category->setPublication(0);
                $gallery_category->setGalleryCatalogIdgalleryCatalog(2);
                $gallery_category->save();
            }

            $this->idgallery_category = $gallery_category->getIdgalleryCategory();

            $this->post = Doctrine_Core::getTable('Post')->find(array($idpost));
        }

        if ($request->getParameter('idpage')) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('category_name', $request->getParameter('idpage'));
            if (!$gallery_category) {
                $gallery_category = new GalleryCategory();
                $gallery_category->setCategoryName($request->getParameter('idpage'));
                $gallery_category->setPublication(0);
                $gallery_category->setGalleryCatalogIdgalleryCatalog(3);
                $gallery_category->save();
            }

            $this->idgallery_category = $gallery_category->getIdgalleryCategory();

            $this->gallery_category = Doctrine_Core::getTable('GalleryCategory')->find(array($this->idgallery_category));

        }

        if($request->getParameter('idgallery_category')) {

            $this->gallery_category = Doctrine_Core::getTable('GalleryCategory')->find(array($request->getParameter('idgallery_category')));

            if($this->gallery_category) {
                $this->idgallery_category = $this->gallery_category->getIdgalleryCategory();
            }


        }

        define('PAGE_MODULE', 'Galeria realizacji: dodaj zdjęcia.');
        $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
        $max_file_size = 1024 * 100; //100 kb
        $path = sfConfig::get('sf_web_dir') . "/images/gallery/"; // Upload directory
        $count = 0;

        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" && $this->idgallery_category != '') {
            $count = 0;
            foreach ($_FILES['files']['name'] as $f => $name) {
                if ($_FILES['files']['error'][$f] == 0) {
                    $gallery = new Gallery();

                    $name_explode = explode(".", $name);

                    $md5_file_name = md5($name_explode['0']) . '.' . $name_explode['1'];

                    $gallery->setFileName($md5_file_name);
                    $gallery->setGalleryCategoryIdgalleryCategory($this->idgallery_category);
                    $gallery->save();

                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $md5_file_name))
                        $count++; // Number of successfully uploaded file

//                    $image_dir = sfConfig::get('sf_web_dir') . '/images/gallery/';

                    $image_dir = sfConfig::get('sf_web_dir') . '/images/gallery/';
                    $image = new Image();
                    $image->load($image_dir . $gallery->getFileName());
                    $image->resizeToWith(1980);
                    $image->save($image_dir . $gallery->getFileName());

//                    $bpcms_image = new BpImages($image_dir, $gallery->getFileName());
//                    $bpcms_image->execute();

                } else {
                    echo 'blad';
                    die;
                }
            }

            if ($count == 0) {
                $log = 'Za dużo plików! jednorazowo max 30 plików lub max 30 MB';
            } else {
                $log = $count . ' zdjęć zostało zapisanych!';
            }

            $this->getUser()->setFlash('success', $log);

            if($idpost != '') {
                $this->redirect('post/edit?idpost=' . $idpost);
            } else {
                $this->redirect('gallery/list?idgallery_category=' . $this->idgallery_category);
            }

        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->gallery_category_id = $this->getUser()->getAttribute('idgallery_category');

        $this->form = new GalleryForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($gallery = Doctrine_Core::getTable('Gallery')->find(array($request->getParameter('idgallery'))), sprintf('Object gallery does not exist (%s).', $request->getParameter('idgallery')));
        $this->form = new GalleryForm($gallery);
        $this->form_lang = new BpcmsGalleryI18nForm();

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($gallery = Doctrine_Core::getTable('Gallery')->find(array($request->getParameter('idgallery'))), sprintf('Object gallery does not exist (%s).', $request->getParameter('idgallery')));
        $this->form = new GalleryForm($gallery);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($gallery = Doctrine_Core::getTable('Gallery')->find(array($request->getParameter('idgallery'))), sprintf('Object gallery does not exist (%s).', $request->getParameter('idgallery')));
        $gallery->delete();

        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $gallery = $form->save();

            $image_dir = sfConfig::get('sf_web_dir') . '/images/gallery/';
            $image = new Image();
            $image->load($image_dir . $gallery->getFileName());
            if ($image->getHeight() >= 480) {
                $image->resizeToHeight(480);
                $image->save($image_dir . $gallery->getFileName());
            }

            $image = new Image();
            $image->load($image_dir . $gallery->getFileName());
            if ($image->getWidth() >= 110) {
                $image->resizeToWidth(110);
                $image->save($image_dir . 'thumbs/' . $gallery->getFileName());
            }
            $this->getUser()->setFlash('monit', 'Zdjęcie zostało poprawnie zapisane!');

            if ($this->getUser()->hasAttribute('tmp_forward_edit_page')) {
                $this->redirect($this->getUser()->getAttribute('tmp_forward_edit_page'));
            }

            $this->redirect('gallery/list?idgallery_category=' . $gallery->getGalleryCategoryIdgalleryCategory());
        }
    }

}
