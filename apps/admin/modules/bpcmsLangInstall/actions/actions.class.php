<?php

/**
 * bpcmsLangInstall actions.
 *
 * @package    blackcms
 * @subpackage bpcmsLangInstall
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsLangInstallActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->bpcms_lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new BpcmsLangInstallForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BpcmsLangInstallForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($bpcms_lang_install = Doctrine_Core::getTable('BpcmsLangInstall')->find(array($request->getParameter('signature'))), sprintf('Object bpcms_lang_install does not exist (%s).', $request->getParameter('signature')));
        $this->form = new BpcmsLangInstallForm($bpcms_lang_install);
    }

    public function executeRemoveicons(sfWebRequest $request) {
        $this->forward404Unless($bpcms_lang_install = Doctrine_Core::getTable('BpcmsLangInstall')->find(array($request->getParameter('signature'))), sprintf('Object bpcms_lang_install does not exist (%s).', $request->getParameter('signature')));
        
        unlink(sfConfig::get('sf_web_dir').'/images/lang_icons/'.$bpcms_lang_install->getLangIcons());
        $bpcms_lang_install->setLangIcons();
        $bpcms_lang_install->save();
        
        $this->redirect($request->getReferer());
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_lang_install = Doctrine_Core::getTable('BpcmsLangInstall')->find(array($request->getParameter('signature'))), sprintf('Object bpcms_lang_install does not exist (%s).', $request->getParameter('signature')));
        $this->form = new BpcmsLangInstallForm($bpcms_lang_install);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_lang_install = Doctrine_Core::getTable('BpcmsLangInstall')->find(array($request->getParameter('signature'))), sprintf('Object bpcms_lang_install does not exist (%s).', $request->getParameter('signature')));
        $bpcms_lang_install->delete();

        $this->getUser()->setFlash('success', 'Zmiany zostały zapisane!');

        $this->redirect('bpcmsLangInstall/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_lang_install = $form->save();

            $this->getUser()->setFlash('success', 'Zmiany zostały zapisane!');

            $this->redirect('bpcmsLangInstall/index');
        }
    }

    public function save(sfWebRequest $request, sfForm $form) {
        $translate_save = new $request->getParameter('table').'()';
        $translate_save->setBpcmsLangInstallSignature($request->getParameter('signature'));
        //$translate_save->set.  ucfirst($request->getParameter('content_id')).($request->getParameter('content_id'));
        $translate_save->set.$request->getParameter('column').($request->getParameter('content_id'));
        $translate_save->save();
        die;
    }
}
