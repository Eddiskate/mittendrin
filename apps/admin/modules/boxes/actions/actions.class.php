<?php

/**
 * boxes actions.
 *
 * @package    blackcms
 * @subpackage boxes
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class boxesActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->boxess = Doctrine_Core::getTable('Boxes')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new BoxesForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BoxesForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($boxes = Doctrine_Core::getTable('Boxes')->find(array($request->getParameter('idboxes'))), sprintf('Object boxes does not exist (%s).', $request->getParameter('idboxes')));
        $this->form = new BoxesForm($boxes);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($boxes = Doctrine_Core::getTable('Boxes')->find(array($request->getParameter('idboxes'))), sprintf('Object boxes does not exist (%s).', $request->getParameter('idboxes')));
        $this->form = new BoxesForm($boxes);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($boxes = Doctrine_Core::getTable('Boxes')->find(array($request->getParameter('idboxes'))), sprintf('Object boxes does not exist (%s).', $request->getParameter('idboxes')));
        
        unlink(sfConfig::get('sf_web_dir').'/images/boxes/'.$boxes->getImage());
        
        $boxes->delete();

        $this->getUser()->setFlash('monit', 'Zmiany zostały poprawnie zapisane!');

        $this->redirect('boxes/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $boxes = $form->save();
            
            $this->getUser()->setFlash('monit', 'Zmiany zostały poprawnie zapisane!');

            $this->redirect('boxes/edit?idboxes=' . $boxes->getIdboxes());
        }
    }

}
