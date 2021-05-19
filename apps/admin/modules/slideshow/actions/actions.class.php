<?php

/**
 * slideshow actions.
 *
 * @package    blackcms
 * @subpackage slideshow
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class slideshowActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->slideshows = Doctrine_Core::getTable('Slideshow')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new SlideshowForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new SlideshowForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($slideshow = Doctrine_Core::getTable('Slideshow')->find(array($request->getParameter('idslideshow'))), sprintf('Object slideshow does not exist (%s).', $request->getParameter('idslideshow')));
        $this->form = new SlideshowForm($slideshow);

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
            ->createQuery('a')
            ->whereNotIn('a.signature', 'pl_PL')
            ->execute();
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($slideshow = Doctrine_Core::getTable('Slideshow')->find(array($request->getParameter('idslideshow'))), sprintf('Object slideshow does not exist (%s).', $request->getParameter('idslideshow')));
        $this->form = new SlideshowForm($slideshow);
        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($slideshow = Doctrine_Core::getTable('Slideshow')->find(array($request->getParameter('idslideshow'))), sprintf('Object slideshow does not exist (%s).', $request->getParameter('idslideshow')));

        unlink(sfConfig::get('sf_web_dir') . '/images/slideshow/' . $slideshow->getFileName());

        $slideshow->delete();

        $this->getUser()->setFlash('monit', 'Zmiany zostały zapisane');

        $this->redirect('slideshow/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $slideshow = $form->save();

            $this->getUser()->setFlash('monit', 'Zmiany zostały zapisane');

            $this->redirect('slideshow/edit?idslideshow=' . $slideshow->getIdslideshow());
        }
    }

}
