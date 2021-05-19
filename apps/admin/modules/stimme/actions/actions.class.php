<?php

/**
 * stimme actions.
 *
 * @package    mittendrin
 * @subpackage stimme
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class stimmeActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->stimmes = Doctrine::getTable('Stimme')
                ->createQuery('a')
                ->orderBy('a.idstimme DESC')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new StimmeForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new StimmeForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($stimme = Doctrine::getTable('Stimme')->find(array($request->getParameter('idstimme'))), sprintf('Object stimme does not exist (%s).', $request->getParameter('idstimme')));
        $this->form = new StimmeForm($stimme);
    }

    public function executeThankyou(sfWebRequest $request) {
        $this->forward404Unless($stimme = Doctrine::getTable('Stimme')->find(array($request->getParameter('idstimme'))), sprintf('Object stimme does not exist (%s).', $request->getParameter('idstimme')));
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($stimme = Doctrine::getTable('Stimme')->find(array($request->getParameter('idstimme'))), sprintf('Object stimme does not exist (%s).', $request->getParameter('idstimme')));
        $this->form = new StimmeForm($stimme);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($stimme = Doctrine::getTable('Stimme')->find(array($request->getParameter('idstimme'))), sprintf('Object stimme does not exist (%s).', $request->getParameter('idstimme')));
        $stimme->delete();

        $this->getUser()->setFlash('success', GLOBAL_DELETE_SUCCESS);
        
        $this->redirect('stimme/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $stimme = $form->save();

            $html = '<p>Dodano nowe zyczenia dodane: '.date('Y-m-d H:i:s').', dostępne są w panelu CMS.</p><p>miłego dnia. Vader</p>';
            
            $message = Swift_Message::newInstance();
            $message->setSubject('Stime - nowe życzenia');
            $message->setBody($html, 'text/html');
            $message->setFrom(array('no-reply@mittendrin.pl' => 'automat - mittendrin.pl'));
            $message->setTo(sfConfig::get('bpcms_stime_mail_info'));

            $massage_status = sfContext::getInstance()->getMailer()->send($message);

            $this->redirect('stimme/index');
        }
    }

}
