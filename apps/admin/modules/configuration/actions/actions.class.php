<?php

/**
 * configuration actions.
 *
 * @package    blackcms
 * @subpackage configuration
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class configurationActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->configurations = Doctrine_Core::getTable('Configuration')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ConfigurationForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ConfigurationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($configuration = Doctrine_Core::getTable('Configuration')->find(array($request->getParameter('idconfiguration'))), sprintf('Object configuration does not exist (%s).', $request->getParameter('idconfiguration')));
    $this->form = new ConfigurationForm($configuration);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($configuration = Doctrine_Core::getTable('Configuration')->find(array($request->getParameter('idconfiguration'))), sprintf('Object configuration does not exist (%s).', $request->getParameter('idconfiguration')));
    $this->form = new ConfigurationForm($configuration);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($configuration = Doctrine_Core::getTable('Configuration')->find(array($request->getParameter('idconfiguration'))), sprintf('Object configuration does not exist (%s).', $request->getParameter('idconfiguration')));
    $configuration->delete();

    $this->redirect('configuration/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $configuration = $form->save();

	  $this->getUser()->setFlash('monit', 'Zmiany zostały zapisane!');
	  
      $this->redirect('configuration/edit?idconfiguration='.$configuration->getIdconfiguration());
    }
  }
}
