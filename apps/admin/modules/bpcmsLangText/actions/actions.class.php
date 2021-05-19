<?php

/**
 * bpcmsLangText actions.
 *
 * @package    blackcms
 * @subpackage bpcmsLangText
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsLangTextActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->bpcms_lang_texts = Doctrine_Core::getTable('BpcmsLangText')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new BpcmsLangTextForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BpcmsLangTextForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($this->bpcms_lang_text = Doctrine_Core::getTable('BpcmsLangText')->find(array($request->getParameter('text_name'))), sprintf('Object bpcms_lang_text does not exist (%s).', $request->getParameter('text_name')));
        $this->form = new BpcmsLangTextForm($this->bpcms_lang_text);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_lang_text = Doctrine_Core::getTable('BpcmsLangText')->find(array($request->getParameter('text_name'))), sprintf('Object bpcms_lang_text does not exist (%s).', $request->getParameter('text_name')));
        $this->form = new BpcmsLangTextForm($bpcms_lang_text);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_lang_text = Doctrine_Core::getTable('BpcmsLangText')->find(array($request->getParameter('text_name'))), sprintf('Object bpcms_lang_text does not exist (%s).', $request->getParameter('text_name')));
        $bpcms_lang_text->delete();

        $this->redirect('bpcmsLangText/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_lang_text = $form->save();

            $this->getUser()->setFlash('success', 'Zmienna została zapisana!');

            $this->redirect('bpcmsLangText/edit?text_name=' . $bpcms_lang_text->getTextName());
        }
    }

}
