<?php

/**
 * bpcmsAlbumMonth actions.
 *
 * @package    blackcms
 * @subpackage bpcmsAlbumMonth
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsAlbumMonthActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->bpcms_album_months = Doctrine_Core::getTable('BpcmsAlbumMonth')
            ->createQuery('a')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new BpcmsAlbumMonthForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BpcmsAlbumMonthForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($bpcms_album_month = Doctrine_Core::getTable('BpcmsAlbumMonth')->find(array($request->getParameter('idbpcms_album_month'))), sprintf('Object bpcms_album_month does not exist (%s).', $request->getParameter('idbpcms_album_month')));
        $this->form = new BpcmsAlbumMonthForm($bpcms_album_month);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
            ->createQuery('a')
            ->whereNotIn('a.signature', 'pl_PL')
            ->execute();
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($bpcms_album_month = Doctrine_Core::getTable('BpcmsAlbumMonth')->find(array($request->getParameter('idbpcms_album_month'))), sprintf('Object bpcms_album_month does not exist (%s).', $request->getParameter('idbpcms_album_month')));
        $this->form = new BpcmsAlbumMonthForm($bpcms_album_month);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeRemoveavatar(sfWebRequest $request) {
        $this->forward404Unless($bpcms_album_month = Doctrine_Core::getTable('BpcmsAlbumMonth')->find(array($request->getParameter('idbpcms_album_month'))), sprintf('Object post does not exist (%s).', $request->getParameter('idbpcms_album_month')));

        unlink(sfConfig::get('sf_web_dir').'/album_month/'.$bpcms_album_month->getAvatar());

        $bpcms_album_month->setAvatar();
        $bpcms_album_month->save();

        $this->getUser()->setFlash('success', 'Zdjęcie zostało usunięte!');

        $this->redirect($request->getReferer());
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($bpcms_album_month = Doctrine_Core::getTable('BpcmsAlbumMonth')->find(array($request->getParameter('idbpcms_album_month'))), sprintf('Object bpcms_album_month does not exist (%s).', $request->getParameter('idbpcms_album_month')));
        $bpcms_album_month->delete();

        $this->redirect('bpcmsAlbumMonth/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $bpcms_album_month = $form->save();

            if ($form->getValue('avatar_db') != '') {
                $bpcms_album_month->setAvatar($form->getValue('avatar_db'));
                copy(sfConfig::get('sf_web_dir') . '/images/gallery/' . $form->getValue('avatar_db'), sfConfig::get('sf_web_dir') . '/images/album_month/' . $form->getValue('avatar_db'));
            }

            $bpcms_album_month->save();

            $this->getUser()->setFlash('success', 'Zmiany zostały zapisane.');

            $this->redirect('bpcmsAlbumMonth/edit?idbpcms_album_month=' . $bpcms_album_month->getIdbpcmsAlbumMonth());
        }
    }
}
