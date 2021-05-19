<?php

/**
 * page actions.
 *
 * @package    blackcms
 * @subpackage page
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->carts = Doctrine_Core::getTable('Cart')
                ->createQuery('a')
                ->execute();
    }

    public function executeList(sfWebRequest $request) {
        $this->pages = Doctrine_Core::getTable('Page')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new PageForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new PageForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('idpage'))), sprintf('Object page does not exist (%s).', $request->getParameter('idpage')));
        $this->form = new PageForm($page);

        $gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('category_name', $request->getParameter('idpage'));

        if ($gallery_category) {
            $this->getUser()->setAttribute('tmp_gallery_select', $gallery_category->getIdgalleryCategory());
        }
        $this->getUser()->setAttribute('tmp_forward_edit_page', '/admin.php/page/edit?idpage=' . $request->getParameter('idpage'));

        $this->lang_installs = Doctrine_Core::getTable('BpcmsLangInstall')
                ->createQuery('a')
                ->whereNotIn('a.signature', 'pl_PL')
                ->execute();
    }

    public function executeBackup(sfWebRequest $request) {
        $this->forward404Unless($page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('idpage'))), sprintf('Object page does not exist (%s).', $request->getParameter('idpage')));

        $page_backup = new PageBackup();
        $page_backup->setBody($page->getBody());
        $page_backup->setPageIdpage($request->getParameter('idpage'));
        $page_backup->setCreatedAt(time());
        $page_backup->save();

        $this->getUser()->setFlash('success', 'Kopia strony została zapisana!');

        $this->redirect($request->getReferer());
    }

    public function executeBackuplist(sfWebRequest $request) {
        $this->page_backups = Doctrine_Core::getTable('PageBackup')
                ->createQuery('a')
                ->where('a.page_idpage = ?', $request->getParameter('idpage'))
                ->execute();
    }

    public function executeBackuprestore(sfWebRequest $request) {
        $this->forward404Unless($page_backup = Doctrine_Core::getTable('PageBackup')->find(array($request->getParameter('idpage_backup'))), sprintf('Object page does not exist (%s).', $request->getParameter('idpage_backup')));

        $page = Doctrine_Core::getTable('Page')->find(array($page_backup->getPageIdpage()));
        $page->setBody($page_backup->getBody());
        $page->save();
                
        $this->getUser()->setFlash('success', 'Kopia strony została przywrocona!');

        $this->redirect('page/edit?idpage='.$page->getIdpage());
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('idpage'))), sprintf('Object page does not exist (%s).', $request->getParameter('idpage')));
        $this->form = new PageForm($page);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('idpage'))), sprintf('Object page does not exist (%s).', $request->getParameter('idpage')));
        $page->delete();

        $this->getUser()->setFlash('success', 'Strona została poprawnie usunięta.');
        
        $this->redirect($request->getReferer());
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $page = $form->save();

            $cart_pages = Doctrine_Core::getTable('Page')->createQuery('p')
                ->where('p.cart_idcart = ? AND p.idpage != ?', array($page['cart_idcart'], $page['idpage']))
                ->execute();

            foreach ($cart_pages as $cart_page) {
                $cart_page->setPageDefault(0);
                $cart_page->save();
            }

            $this->getUser()->setFlash('monit', 'Zmiany zostały poprawnie zapisane!');

            $this->redirect('cart/index');
        }
    }

}
