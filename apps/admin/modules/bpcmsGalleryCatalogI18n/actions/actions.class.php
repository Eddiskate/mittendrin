<?php

/**
 * bpcmsGalleryCatalogI18n actions.
 *
 * @package    blackcms
 * @subpackage bpcmsGalleryCatalogI18n
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsGalleryCatalogI18nActions extends sfActions
{
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BpcmsGalleryCatalogI18nForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BpcmsGalleryCatalogI18nForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($bpcms_gallery_catalog_i18n = Doctrine_Core::getTable('BpcmsGalleryCatalogI18n')->find(array($request->getParameter('gallery_catalog_idgallery_catalog'),
$request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_gallery_catalog_i18n does not exist (%s).', $request->getParameter('gallery_catalog_idgallery_catalog'),
$request->getParameter('bpcms_lang_install_signature')));
    $this->form = new BpcmsGalleryCatalogI18nForm($bpcms_gallery_catalog_i18n);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($bpcms_gallery_catalog_i18n = Doctrine_Core::getTable('BpcmsGalleryCatalogI18n')->find(array($request->getParameter('gallery_catalog_idgallery_catalog'),
$request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_gallery_catalog_i18n does not exist (%s).', $request->getParameter('gallery_catalog_idgallery_catalog'),
$request->getParameter('bpcms_lang_install_signature')));
    $this->form = new BpcmsGalleryCatalogI18nForm($bpcms_gallery_catalog_i18n);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $bpcms_gallery_catalog_i18n = $form->save();

      $this->getUser()->setFlash('success', 'Zmiany zosta??y zapisane!');
      
      $this->redirect($request->getReferer());
    }
  }
}
