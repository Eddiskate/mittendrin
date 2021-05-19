<?php

/**
 * bpcmsPageI18n actions.
 *
 * @package    blackcms
 * @subpackage bpcmsPageI18n
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsPageI18nActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->bpcms_page_i18ns = Doctrine_Core::getTable('BpcmsPageI18n')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new BpcmsPageI18nForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form_lang = new BpcmsPageI18nForm();

        $this->processForm($request, $this->form_lang);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($bpcms_page_i18n = Doctrine_Core::getTable('BpcmsPageI18n')->find(array($request->getParameter('page_idpage'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_page_i18n does not exist (%s).', $request->getParameter('page_idpage'), $request->getParameter('bpcms_lang_install_signature')));
        $this->form_lang = new BpcmsPageI18nForm($bpcms_page_i18n);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_page_i18n = Doctrine_Core::getTable('BpcmsPageI18n')->find(array($request->getParameter('page_idpage'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_page_i18n does not exist (%s).', $request->getParameter('page_idpage'), $request->getParameter('bpcms_lang_install_signature')));
        $this->form_lang = new BpcmsPageI18nForm($bpcms_page_i18n);

        $this->processForm($request, $this->form_lang);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_page_i18n = Doctrine_Core::getTable('BpcmsPageI18n')->find(array($request->getParameter('page_idpage'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_page_i18n does not exist (%s).', $request->getParameter('page_idpage'), $request->getParameter('bpcms_lang_install_signature')));
        $bpcms_page_i18n->delete();

        $this->redirect('bpcmsPageI18n/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_page_i18n = $form->save();

            $this->getUser()->setFlash('success', 'Zmiany zostały zapisane!');

            $this->redirect($request->getReferer());
        }
    }

}
