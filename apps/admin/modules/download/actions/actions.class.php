<?php

/**
 * download actions.
 *
 * @package    blackcms
 * @subpackage download
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class downloadActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->download_catalogs = Doctrine_Core::getTable('DownloadCatalog')
                ->createQuery('a')
                ->execute();
    }

    public function executeList(sfWebRequest $request) {
        $this->download_catalog = Doctrine_Core::getTable('DownloadCatalog')->find(array($request->getParameter('iddownload_catalog')));
        
        $this->downloads = Doctrine_Core::getTable('Download')
                ->createQuery('a')
                ->where('a.download_catalog_iddownload_catalog = ?', $request->getParameter('iddownload_catalog'))
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->download_catalog = Doctrine_Core::getTable('DownloadCatalog')->find(array($request->getParameter('iddownload_catalog')));

        $this->form = new DownloadForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new DownloadForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($download = Doctrine_Core::getTable('Download')->find(array($request->getParameter('iddownload'))), sprintf('Object download does not exist (%s).', $request->getParameter('iddownload')));
        $this->form = new DownloadForm($download);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($download = Doctrine_Core::getTable('Download')->find(array($request->getParameter('iddownload'))), sprintf('Object download does not exist (%s).', $request->getParameter('iddownload')));
        $this->form = new DownloadForm($download);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($download = Doctrine_Core::getTable('Download')->find(array($request->getParameter('iddownload'))), sprintf('Object download does not exist (%s).', $request->getParameter('iddownload')));

        unlink(sfConfig::get('sf_web_dir') . '/uploads/files/' . $download->getFileName());

        $download->delete();

        $this->getUser()->setFlash('success', 'Plik został usuniety!');

        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $download = $form->save();

            $this->getUser()->setFlash('success', 'Plik został zapisany!');

            $this->redirect('download/edit?iddownload=' . $download->getIddownload());
        }
    }

}
