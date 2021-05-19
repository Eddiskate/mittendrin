<?php

/**
 * bpcmsPlaylist actions.
 *
 * @package    blackcms
 * @subpackage bpcmsPlaylist
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsPlaylistActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->bpcms_playlists = Doctrine_Core::getTable('BpcmsPlaylist')
                ->createQuery('a')
                ->orderBy('a.idbpcms_playlist DESC')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new BpcmsPlaylistForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BpcmsPlaylistForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($bpcms_playlist = Doctrine_Core::getTable('BpcmsPlaylist')->find(array($request->getParameter('idbpcms_playlist'))), sprintf('Object bpcms_playlist does not exist (%s).', $request->getParameter('idbpcms_playlist')));
        $this->form = new BpcmsPlaylistForm($bpcms_playlist);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_playlist = Doctrine_Core::getTable('BpcmsPlaylist')->find(array($request->getParameter('idbpcms_playlist'))), sprintf('Object bpcms_playlist does not exist (%s).', $request->getParameter('idbpcms_playlist')));
        $this->form = new BpcmsPlaylistForm($bpcms_playlist);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_playlist = Doctrine_Core::getTable('BpcmsPlaylist')->find(array($request->getParameter('idbpcms_playlist'))), sprintf('Object bpcms_playlist does not exist (%s).', $request->getParameter('idbpcms_playlist')));
        $bpcms_playlist->delete();

        $this->redirect('bpcmsPlaylist/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_playlist = $form->save();

            $this->getUser()->setFlash('success', 'Zmiany zostały zapisane.');

            $this->redirect('bpcmsPlaylist/index');
        }
    }

}
