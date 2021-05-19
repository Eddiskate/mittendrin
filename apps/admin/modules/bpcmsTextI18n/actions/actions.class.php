<?php

/**
 * bpcmsTextI18n actions.
 *
 * @package    blackcms
 * @subpackage bpcmsTextI18n
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsTextI18nActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->bpcms_text_i18ns = Doctrine_Core::getTable('BpcmsTextI18n')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form_lang = new BpcmsTextI18nForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form_lang = new BpcmsTextI18nForm();

        $this->processForm($request, $this->form_lang);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($bpcms_text_i18n = Doctrine_Core::getTable('BpcmsTextI18n')->find(array($request->getParameter('bpcms_lang_install_signature'),
            $request->getParameter('bpcms_lang_text_name'))), sprintf('Object bpcms_text_i18n does not exist (%s).', $request->getParameter('bpcms_lang_install_signature'), $request->getParameter('bpcms_lang_text_name')));
        $this->form = new BpcmsTextI18nForm($bpcms_text_i18n);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_text_i18n = Doctrine_Core::getTable('BpcmsTextI18n')->find(array($request->getParameter('bpcms_lang_install_signature'),
            $request->getParameter('bpcms_lang_text_name'))), sprintf('Object bpcms_text_i18n does not exist (%s).', $request->getParameter('bpcms_lang_install_signature'), $request->getParameter('bpcms_lang_text_name')));
        $this->form = new BpcmsTextI18nForm($bpcms_text_i18n);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_text_i18n = Doctrine_Core::getTable('BpcmsTextI18n')->find(array($request->getParameter('bpcms_lang_install_signature'),
            $request->getParameter('bpcms_lang_text_name'))), sprintf('Object bpcms_text_i18n does not exist (%s).', $request->getParameter('bpcms_lang_install_signature'), $request->getParameter('bpcms_lang_text_name')));
        $bpcms_text_i18n->delete();

        $this->redirect('bpcmsTextI18n/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_text_i18n = $form->save();

            $this->getUser()->setFlash('success', 'Zmiany zostaly zapisane!');    
            
            $this->redirect($request->getReferer());
        }
    }

}
