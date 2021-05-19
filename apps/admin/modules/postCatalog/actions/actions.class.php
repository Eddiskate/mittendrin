<?php

/**
 * postCatalog actions.
 *
 * @package    blackcms
 * @subpackage postCatalog
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postCatalogActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->post_catalogs = Doctrine_Core::getTable('PostCatalog')
            ->createQuery('a')
            ->orderBy('a.homepage_row ASC')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new PostCatalogForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new PostCatalogForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($post_catalog = Doctrine_Core::getTable('PostCatalog')->find(array($request->getParameter('idpost_catalog'))), sprintf('Object post_catalog does not exist (%s).', $request->getParameter('idpost_catalog')));
        $this->form = new PostCatalogForm($post_catalog);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
            ->createQuery('a')
            ->whereNotIn('a.signature', 'pl_PL')
            ->execute();
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($post_catalog = Doctrine_Core::getTable('PostCatalog')->find(array($request->getParameter('idpost_catalog'))), sprintf('Object post_catalog does not exist (%s).', $request->getParameter('idpost_catalog')));
        $this->form = new PostCatalogForm($post_catalog);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($post_catalog = Doctrine_Core::getTable('PostCatalog')->find(array($request->getParameter('idpost_catalog'))), sprintf('Object post_catalog does not exist (%s).', $request->getParameter('idpost_catalog')));
        $post_catalog->delete();

        $this->redirect('postCatalog/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $post_catalog = $form->save();

            $this->getUser()->setFlash('success', 'Katalog został utworzony!');

            $this->redirect('postCatalog/edit?idpost_catalog=' . $post_catalog->getIdpostCatalog());
        }
    }
}
