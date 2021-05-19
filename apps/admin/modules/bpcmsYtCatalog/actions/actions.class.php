<?php

/**
 * bpcmsYtCatalog actions.
 *
 * @package    blackcms
 * @subpackage bpcmsYtCatalog
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsYtCatalogActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->bpcms_yt_catalogs = Doctrine_Core::getTable('BpcmsYtCatalog')
            ->createQuery('a')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new BpcmsYtCatalogForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BpcmsYtCatalogForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($bpcms_yt_catalog = Doctrine_Core::getTable('BpcmsYtCatalog')->find(array($request->getParameter('idbpcms_yt_catalog'))), sprintf('Object bpcms_yt_catalog does not exist (%s).', $request->getParameter('idbpcms_yt_catalog')));
        $this->form = new BpcmsYtCatalogForm($bpcms_yt_catalog);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
            ->createQuery('a')
            ->whereNotIn('a.signature', 'pl_PL')
            ->execute();
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_yt_catalog = Doctrine_Core::getTable('BpcmsYtCatalog')->find(array($request->getParameter('idbpcms_yt_catalog'))), sprintf('Object bpcms_yt_catalog does not exist (%s).', $request->getParameter('idbpcms_yt_catalog')));
        $this->form = new BpcmsYtCatalogForm($bpcms_yt_catalog);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_yt_catalog = Doctrine_Core::getTable('BpcmsYtCatalog')->find(array($request->getParameter('idbpcms_yt_catalog'))), sprintf('Object bpcms_yt_catalog does not exist (%s).', $request->getParameter('idbpcms_yt_catalog')));
        $bpcms_yt_catalog->delete();

        $this->getUser()->setFlash('success', GLOBAL_DELETE_SUCCESS);

        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_yt_catalog = $form->save();

            $this->getUser()->setFlash('success', GLOBAL_SAVE_SUCCESS);

            $this->redirect('bpcmsYtCatalog/edit?idbpcms_yt_catalog=' . $bpcms_yt_catalog->getIdbpcmsYtCatalog());
        }
    }
}
