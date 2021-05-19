<?php

/**
 * bpcmsYtMovies actions.
 *
 * @package    blackcms
 * @subpackage bpcmsYtMovies
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsYtMoviesActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->bpcms_yt_catalogs = Doctrine_Core::getTable('BpcmsYtCatalog')
                ->createQuery('a')
                ->execute();
    }

    public function executeList(sfWebRequest $request) {
        $this->bpcms_yt_catalog = Doctrine_Core::getTable('BpcmsYtCatalog')->find(array($request->getParameter('idbpcms_yt_catalog')));

        $this->bpcms_yt_moviess = Doctrine_Core::getTable('BpcmsYtMovies')
                ->createQuery('a')
                ->where('a.bpcms_yt_catalog_idbpcms_yt_catalog = ?', $request->getParameter('idbpcms_yt_catalog'))
                ->orderBy('a.created_at DESC')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new BpcmsYtMoviesForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BpcmsYtMoviesForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($bpcms_yt_movies = Doctrine_Core::getTable('BpcmsYtMovies')->find(array($request->getParameter('idbpcms_yt_movies'))), sprintf('Object bpcms_yt_movies does not exist (%s).', $request->getParameter('idbpcms_yt_movies')));
        $this->form = new BpcmsYtMoviesForm($bpcms_yt_movies);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
            ->createQuery('a')
            ->whereNotIn('a.signature', 'pl_PL')
            ->execute();
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_yt_movies = Doctrine_Core::getTable('BpcmsYtMovies')->find(array($request->getParameter('idbpcms_yt_movies'))), sprintf('Object bpcms_yt_movies does not exist (%s).', $request->getParameter('idbpcms_yt_movies')));
        $this->form = new BpcmsYtMoviesForm($bpcms_yt_movies);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeRemoveavatar(sfWebRequest $request) {
        $this->forward404Unless($bpcms_yt_movies = Doctrine_Core::getTable('BpcmsYtMovies')->find(array($request->getParameter('idbpcms_yt_movies'))), sprintf('Object post does not exist (%s).', $request->getParameter('idbpcms_yt_movies')));

        unlink(sfConfig::get('sf_web_dir') . '/yt_movies/' . $bpcms_yt_movies->getAvatar());

        $bpcms_yt_movies->setAvatar();
        $bpcms_yt_movies->save();

        $this->getUser()->setFlash('success', 'Zdjęcie zostało usunięte!');

        $this->redirect($request->getReferer());
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_yt_movies = Doctrine_Core::getTable('BpcmsYtMovies')->find(array($request->getParameter('idbpcms_yt_movies'))), sprintf('Object bpcms_yt_movies does not exist (%s).', $request->getParameter('idbpcms_yt_movies')));
        $bpcms_yt_movies->delete();

        $this->getUser()->setFlash('success', GLOBAL_DELETE_SUCCESS);

        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_yt_movies = $form->save();

            $this->getUser()->setFlash('success', GLOBAL_SAVE_SUCCESS);

            $this->redirect('bpcmsYtMovies/edit?idbpcms_yt_movies=' . $bpcms_yt_movies->getIdbpcmsYtMovies());
        }
    }

}
