<?php

/**
 * security actions.
 *
 * @package    BlackCMS
 * @subpackage security
 * @author     Damian Kania @ Eddi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class securityActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $mail = $request->getParameter('mail');
        $passwd = $request->getParameter('passwd');

        if ($mail != '' && $passwd != '') {
            $users = Doctrine_Core::getTable('Users')
                    ->createQuery('a')
                    ->where('a.mail = ?', $mail)
                    ->andWhere('a.passwd = ?', md5($passwd))
                    ->andWhere('a.active = ?', 1)
                    ->fetchOne();

            if ($users) {
                $this->getUser()->setAuthenticated(true);
                $this->getUser()->setAttribute('idusers', $users->getIdusers());
                $this->getUser()->setAttribute('name', $users->getName() . ' ' . $users->getLastname());

                $this->redirect('@homepage');
            }
        }
    }

    public function executeLogout() {
        $this->getUser()->setAuthenticated(false);
        $this->getUser()->getAttributeHolder()->remove('idusers');
        $this->getUser()->getAttributeHolder()->remove('name');

        $this->getUser()->clearCredentials();

        $this->redirect('security/index');
    }

}
