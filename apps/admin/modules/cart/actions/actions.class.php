<?php

/**
 * cart actions.
 *
 * @package    blackcms
 * @subpackage cart
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cartActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->carts = Doctrine_Core::getTable('Cart')
            ->createQuery('a')
            ->orderBy('a.position_row ASC')
            ->execute();
        /*
         * kasujemy tmp dla galerii
         */
        $this->getUser()->getAttributeHolder()->remove('tmp_gallery_select');
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new CartForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CartForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($cart = Doctrine_Core::getTable('Cart')->find(array($request->getParameter('idcart'))), sprintf('Object cart does not exist (%s).', $request->getParameter('idcart')));
        $this->form = new CartForm($cart);
        
        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();        
    }

    public function executePublication(sfWebRequest $request) {
        $this->forward404Unless($cart = Doctrine_Core::getTable('Cart')->find(array($request->getParameter('idcart'))), sprintf('Object cart does not exist (%s).', $request->getParameter('idcart')));

        if ($cart->getPublication() == 1) {
            $cart->setPublication(0);
        } else {
            $cart->setPublication(1);
        }
        $cart->save();

        $this->getUser()->setFlash('monit', 'Zmiany zostałe poprawnie zapisane');

        $this->redirect('cart/index');
    }

    public function executeNopage(sfWebRequest $request) {
        $this->forward404Unless($cart = Doctrine_Core::getTable('Cart')->find(array($request->getParameter('idcart'))), sprintf('Object cart does not exist (%s).', $request->getParameter('idcart')));

        if ($cart->getNoPage() == 1) {
            $cart->setNoPage(0);
        } else {
            $cart->setNoPage(1);
        }
        $cart->save();

        $this->getUser()->setFlash('monit', 'Zmiany zostałe poprawnie zapisane');

        $this->redirect('cart/index');
    }

    public function executeLinkactive(sfWebRequest $request) {
        $this->forward404Unless($cart = Doctrine_Core::getTable('Cart')->find(array($request->getParameter('idcart'))), sprintf('Object cart does not exist (%s).', $request->getParameter('idcart')));

        if ($cart->getLinkActive() == 1) {
            $cart->setLinkActive(0);
        } else {
            $cart->setLinkActive(1);
        }
        $cart->save();

        $this->getUser()->setFlash('monit', 'Zmiany zostałe poprawnie zapisane');

        $this->redirect('cart/index');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cart = Doctrine_Core::getTable('Cart')->find(array($request->getParameter('idcart'))), sprintf('Object cart does not exist (%s).', $request->getParameter('idcart')));
        $this->form = new CartForm($cart);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cart = Doctrine_Core::getTable('Cart')->find(array($request->getParameter('idcart'))), sprintf('Object cart does not exist (%s).', $request->getParameter('idcart')));

        $page = Doctrine_Core::getTable('Page')->findBy('cart_idcart', $request->getParameter('idcart'));
        foreach ($page as $page) {
            $page->delete();
        }

        $cart->delete();

        $this->getUser()->setFlash('monit', 'Zmiany zostałe poprawnie zapisane');

        $this->redirect('cart/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $cart = $form->save();
            if ($cart->getPositionOrder() == 0) {
                $cart->setPositionOrder($cart->getNumberWithAllPosition());
                $cart->save();
            }

            $this->getUser()->setFlash('monit', 'Zmianny zostały zapisane!');

            $this->redirect('@homepage');
        }
    }

}
