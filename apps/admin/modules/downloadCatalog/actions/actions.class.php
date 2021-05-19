<?php

/**
 * downloadCatalog actions.
 *
 * @package    blackcms
 * @subpackage downloadCatalog
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class downloadCatalogActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->download_catalogs = Doctrine_Core::getTable('DownloadCatalog')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DownloadCatalogForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DownloadCatalogForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($download_catalog = Doctrine_Core::getTable('DownloadCatalog')->find(array($request->getParameter('iddownload_catalog'))), sprintf('Object download_catalog does not exist (%s).', $request->getParameter('iddownload_catalog')));
    $this->form = new DownloadCatalogForm($download_catalog);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($download_catalog = Doctrine_Core::getTable('DownloadCatalog')->find(array($request->getParameter('iddownload_catalog'))), sprintf('Object download_catalog does not exist (%s).', $request->getParameter('iddownload_catalog')));
    $this->form = new DownloadCatalogForm($download_catalog);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($download_catalog = Doctrine_Core::getTable('DownloadCatalog')->find(array($request->getParameter('iddownload_catalog'))), sprintf('Object download_catalog does not exist (%s).', $request->getParameter('iddownload_catalog')));
    $download_catalog->delete();

    $this->redirect('downloadCatalog/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $download_catalog = $form->save();

      $this->redirect('downloadCatalog/edit?iddownload_catalog='.$download_catalog->getIddownloadCatalog());
    }
  }
}
