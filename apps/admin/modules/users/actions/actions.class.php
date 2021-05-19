<?php

/**
 * users actions.
 *
 * @package    blackcms
 * @subpackage users
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usersActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->userss = Doctrine_Core::getTable('Users')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new UsersForm();
        $this->getUser()->setAttribute('passwd_new', 1);
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new UsersForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($users = Doctrine_Core::getTable('Users')->find(array($request->getParameter('idusers'))), sprintf('Object users does not exist (%s).', $request->getParameter('idusers')));
        $this->form = new UsersForm($users);
    }

    public function executePasswdremove(sfWebRequest $request) {
        $this->forward404Unless($users = Doctrine_Core::getTable('Users')->find(array($request->getParameter('idusers'))), sprintf('Object users does not exist (%s).', $request->getParameter('idusers')));
        $users->setPasswd();
        $users->save();

        $this->getUser()->setFlash('success', 'Hasło zostało usunięte, podaj koniecznie nowe!');
        $this->getUser()->setAttribute('passwd_new', 1);

        $this->redirect($request->getReferer());
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($users = Doctrine_Core::getTable('Users')->find(array($request->getParameter('idusers'))), sprintf('Object users does not exist (%s).', $request->getParameter('idusers')));
        $this->form = new UsersForm($users);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($users = Doctrine_Core::getTable('Users')->find(array($request->getParameter('idusers'))), sprintf('Object users does not exist (%s).', $request->getParameter('idusers')));
        $users->delete();

        $this->redirect('users/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {

            $users_passwd = $form->getObject()->getPasswd();

            $users = $form->save();

            if (strlen($users_passwd) == 0) {
                $users->setPasswd(md5($form->getValue('passwd')));
                $users->save();
            }

            $this->getUser()->setFlash('success', 'Zmiany zostały zapisane!');
            $this->getUser()->getAttributeHolder()->remove('passwd_new');

            $this->redirect('users/edit?idusers=' . $users->getIdusers());
        }
    }

}
