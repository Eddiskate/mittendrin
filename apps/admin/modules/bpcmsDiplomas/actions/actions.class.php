<?php

/**
 * bpcmsDiplomas actions.
 *
 * @package    blackcms
 * @subpackage bpcmsDiplomas
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsDiplomasActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->bpcms_diplomass = Doctrine_Core::getTable('BpcmsDiplomas')
            ->createQuery('a')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new BpcmsDiplomasForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BpcmsDiplomasForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($bpcms_diplomas = Doctrine_Core::getTable('BpcmsDiplomas')->find(array($request->getParameter('idbpcms_diplomas'))), sprintf('Object bpcms_diplomas does not exist (%s).', $request->getParameter('idbpcms_diplomas')));
        $this->form = new BpcmsDiplomasForm($bpcms_diplomas);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_diplomas = Doctrine_Core::getTable('BpcmsDiplomas')->find(array($request->getParameter('idbpcms_diplomas'))), sprintf('Object bpcms_diplomas does not exist (%s).', $request->getParameter('idbpcms_diplomas')));
        $this->form = new BpcmsDiplomasForm($bpcms_diplomas);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_diplomas = Doctrine_Core::getTable('BpcmsDiplomas')->find(array($request->getParameter('idbpcms_diplomas'))), sprintf('Object bpcms_diplomas does not exist (%s).', $request->getParameter('idbpcms_diplomas')));
        unlink(sfConfig::get('sf_web_dir').'/images/diplomas/'.$bpcms_diplomas->getImage());
        $bpcms_diplomas->delete();

        $this->getUser()->setFlash('success', GLOBAL_FORM_SAVE);

        $this->redirect($request->getReferer());
    }

    public function executeRemovePdfFile(sfWebRequest $request)
    {
        $this->forward404Unless($bpcms_diplomas = Doctrine_Core::getTable('BpcmsDiplomas')->find(array($request->getParameter('idbpcms_diplomas'))), sprintf('Object bpcms_diplomas does not exist (%s).', $request->getParameter('idbpcms_diplomas')));

        unlink(sfConfig::get('sf_web_dir').'/images/diplomas/'.$bpcms_diplomas->getImage());
        $bpcms_diplomas->setImage();
        $bpcms_diplomas->save();

        $this->getUser()->setFlash('success', GLOBAL_FORM_SAVE);

        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_diplomas = $form->save();

            $bpcms_diplomas->setReceived(strtotime($bpcms_diplomas->getReceived()));
            $bpcms_diplomas->save();

            $this->getUser()->setFlash('success', GLOBAL_FORM_SAVE);

            $this->redirect('bpcmsDiplomas/index');
        }
    }
}
