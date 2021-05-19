<?php

/**
 * download actions.
 *
 * @package    blackcms
 * @subpackage download
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class downloadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->downloads = Doctrine_Core::getTable('Download')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DownloadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DownloadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($download = Doctrine_Core::getTable('Download')->find(array($request->getParameter('iddownload'))), sprintf('Object download does not exist (%s).', $request->getParameter('iddownload')));
    $this->form = new DownloadForm($download);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($download = Doctrine_Core::getTable('Download')->find(array($request->getParameter('iddownload'))), sprintf('Object download does not exist (%s).', $request->getParameter('iddownload')));
    $this->form = new DownloadForm($download);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($download = Doctrine_Core::getTable('Download')->find(array($request->getParameter('iddownload'))), sprintf('Object download does not exist (%s).', $request->getParameter('iddownload')));
    $download->delete();

    $this->redirect('download/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $download = $form->save();

      $this->redirect('download/edit?iddownload='.$download->getIddownload());
    }
  }
}
