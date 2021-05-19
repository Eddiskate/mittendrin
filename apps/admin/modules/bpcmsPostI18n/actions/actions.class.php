<?php

/**
 * bpcmsPostI18n actions.
 *
 * @package    blackcms
 * @subpackage bpcmsPostI18n
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsPostI18nActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->bpcms_post_i18ns = Doctrine_Core::getTable('BpcmsPostI18n')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form_lang = new BpcmsPostI18nForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form_lang = new BpcmsPostI18nForm();

        $this->processForm($request, $this->form_lang);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->find(array($request->getParameter('post_idpost'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_post_i18n does not exist (%s).', $request->getParameter('post_idpost'), $request->getParameter('bpcms_lang_install_signature')));
        $this->lang_form = new BpcmsPostI18nForm($bpcms_post_i18n);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->find(array($request->getParameter('post_idpost'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_post_i18n does not exist (%s).', $request->getParameter('post_idpost'), $request->getParameter('bpcms_lang_install_signature')));
        $this->form = new BpcmsPostI18nForm($bpcms_post_i18n);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_post_i18n = $form->save();

            $this->getUser()->setFlash('success', 'Zmiany zostały zapisane!');

            $this->redirect($request->getReferer());
        }
    }

}
