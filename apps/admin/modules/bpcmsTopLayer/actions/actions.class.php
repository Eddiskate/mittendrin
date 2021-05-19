<?php

/**
 * bpcmsTopLayer actions.
 *
 * @package    blackcms
 * @subpackage bpcmsTopLayer
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsTopLayerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->bpcms_top_layers = Doctrine_Core::getTable('BpcmsTopLayer')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BpcmsTopLayerForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BpcmsTopLayerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($bpcms_top_layer = Doctrine_Core::getTable('BpcmsTopLayer')->find(array($request->getParameter('idbpcms_top_layer'))), sprintf('Object bpcms_top_layer does not exist (%s).', $request->getParameter('idbpcms_top_layer')));
    $this->form = new BpcmsTopLayerForm($bpcms_top_layer);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($bpcms_top_layer = Doctrine_Core::getTable('BpcmsTopLayer')->find(array($request->getParameter('idbpcms_top_layer'))), sprintf('Object bpcms_top_layer does not exist (%s).', $request->getParameter('idbpcms_top_layer')));
    $this->form = new BpcmsTopLayerForm($bpcms_top_layer);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($bpcms_top_layer = Doctrine_Core::getTable('BpcmsTopLayer')->find(array($request->getParameter('idbpcms_top_layer'))), sprintf('Object bpcms_top_layer does not exist (%s).', $request->getParameter('idbpcms_top_layer')));
    $bpcms_top_layer->delete();

    $this->redirect('bpcmsTopLayer/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $bpcms_top_layer = $form->save();

      $this->getUser()->setFlash('success', 'Zmiany zostały zapisane!');
      
      $this->redirect('bpcmsTopLayer/edit?idbpcms_top_layer='.$bpcms_top_layer->getIdbpcmsTopLayer());
    }
  }
}
