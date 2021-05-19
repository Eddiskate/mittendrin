<?php

/**
 * bpcmsYtCatalogI18n actions.
 *
 * @package    blackcms
 * @subpackage bpcmsYtCatalogI18n
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsYtCatalogI18nActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->bpcms_yt_catalog_i18ns = Doctrine_Core::getTable('BpcmsYtCatalogI18n')
            ->createQuery('a')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new BpcmsYtCatalogI18nForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BpcmsYtCatalogI18nForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($bpcms_yt_catalog_i18n = Doctrine_Core::getTable('BpcmsYtCatalogI18n')->find(array($request->getParameter('bpcms_yt_catalog_idbpcms_yt_catalog'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_yt_catalog_i18n does not exist (%s).', $request->getParameter('bpcms_yt_catalog_idbpcms_yt_catalog'),
            $request->getParameter('bpcms_lang_install_signature')));
        $this->form = new BpcmsYtCatalogI18nForm($bpcms_yt_catalog_i18n);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_yt_catalog_i18n = Doctrine_Core::getTable('BpcmsYtCatalogI18n')->find(array($request->getParameter('bpcms_yt_catalog_idbpcms_yt_catalog'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_yt_catalog_i18n does not exist (%s).', $request->getParameter('bpcms_yt_catalog_idbpcms_yt_catalog'),
            $request->getParameter('bpcms_lang_install_signature')));
        $this->form = new BpcmsYtCatalogI18nForm($bpcms_yt_catalog_i18n);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_yt_catalog_i18n = Doctrine_Core::getTable('BpcmsYtCatalogI18n')->find(array($request->getParameter('bpcms_yt_catalog_idbpcms_yt_catalog'),
            $request->getParameter('bpcms_lang_install_signature'))), sprintf('Object bpcms_yt_catalog_i18n does not exist (%s).', $request->getParameter('bpcms_yt_catalog_idbpcms_yt_catalog'),
            $request->getParameter('bpcms_lang_install_signature')));
        $bpcms_yt_catalog_i18n->delete();

        $this->redirect('bpcmsYtCatalogI18n/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_yt_catalog_i18n = $form->save();

            $this->getUser()->setFlash('success', 'Zmiany zostały zapisane!');

            $this->redirect($request->getReferer());
        }
    }
}
