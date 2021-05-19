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

    public function executeShow(sfWebRequest $request) {
        if ($request->getParameter('idcart')) {
            $this->forward404Unless($cart = Doctrine_Core::getTable('Cart')->find(array($request->getParameter('idcart'))), sprintf('Object cart does not exist (%s).', $request->getParameter('idcart')));
            $this->page = Doctrine_Core::getTable('Page')
                    ->createQuery('a')
                    ->where('a.cart_idcart = ?', $request->getParameter('idcart'))
                    ->andWhere('a.page_default = ?', 1)
                    ->fetchOne();

            $idcart = $request->getParameter('idcart');

            define('PAGE_TITLE', $this->page->getPageTitle() ? $this->page->getPageTitle() : $this->page->getPageName());
            if (!$this->page) {
                $this->forward('default', '404');
            }
        }

        if ($request->getParameter('idpage')) {
            $this->forward404Unless($this->page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('idpage'))), sprintf('Object cart does not exist (%s).', $request->getParameter('idpage')));
            define('PAGE_TITLE', $this->page->getPageTitle() ? $this->page->getPageTitle() : $this->page->getPageName());
            
            $idcart = $this->page->getCartIdcart();
            
            if (!$this->page) {
                $this->forward('default', '404');
            }
        }

        if ($request->getParameter('page_name_url')) {
            $this->cms = array();

            switch ($request->getParameter('culture')) {
                case "de":
                    $cart = Doctrine_Core::getTable('Cart')->createQuery('c')
                        ->leftJoin('c.BpcmsCartI18n bci WITH bci.bpcms_lang_install_signature = ?', $request->getParameter('culture'))
                        ->innerJoin('c.Page p')
                        ->leftJoin('p.BpcmsPageI18n bpi WITH bci.bpcms_lang_install_signature = ?', $request->getParameter('culture'))
                        ->where('bci.name_url = ? AND p.page_default = ?', array($request->getParameter('page_name_url'), 1))
                        ->fetchOne(array(), Doctrine_Core::HYDRATE_ARRAY);

                    $this->cms['body'] = $cart['Page']['0']['BpcmsPageI18n']['0']['lang_body'] ? $cart['Page']['0']['BpcmsPageI18n']['0']['lang_body'] : $cart['Page']['0']['body'];

                    break;
                default:
                    $cart = Doctrine_Core::getTable('Cart')->createQuery('c')
                        ->where('c.name_url = ? AND p.page_default = ?', array($request->getParameter('page_name_url'),1))
                        ->innerJoin('c.Page p')
                        ->fetchOne(array(), Doctrine_Core::HYDRATE_ARRAY);

                    $this->cms['body'] = $cart['Page']['0']['body'];
                    break;
            }

            if($cart) {
                $this->getUser()->setAttribute('lang_content_id', $cart['idcart']);
                $this->getUser()->setAttribute('lang_content_table', 'Cart');
            } else {
                switch ($request->getParameter('culture')) {
                    case "de":
                        $page = Doctrine_Core::getTable('Page')->createQuery('p')
                            ->leftJoin('p.BpcmsPageI18n bpi WITH bpi.bpcms_lang_install_signature = ?', $request->getParameter('culture'))
                            ->where('p.page_name_url = ?', $request->getParameter('page_name_url'))
                            ->fetchOne(array(), Doctrine_Core::HYDRATE_ARRAY);

                        $this->cms['body'] = $page['BpcmsPageI18n']['0']['lang_body'] ? $page['BpcmsPageI18n']['0']['lang_body'] : $page['body'];

                        break;
                    default:
                        $page = Doctrine_Core::getTable('Page')->createQuery('p')
                            ->where('p.page_name_url = ?', $request->getParameter('page_name_url'))
                            ->fetchOne(array(), Doctrine_Core::HYDRATE_ARRAY);

                        $this->cms['body'] = $page['body'];
                        break;
                }

                if($page) {
                    $this->getUser()->setAttribute('lang_content_id', $page['idpage']);
                    $this->getUser()->setAttribute('lang_content_table', 'Page');
                }
            }



//            if(!$page) {
//
//                echo $request->getParameter('culture');
//                echo $request->getParameter('page_name_url');
//                echo 'tu';die;
//                $this->getUser()->setAttribute('lang_content_id', $cart['idcart']);
//                $this->getUser()->setAttribute('lang_content_table', 'Cart');
//
//                $this->page = Doctrine_Core::getTable('Page')->createQuery('p')
//                    ->innerJoin('p.Cart c')
//                    ->innerJoin('p.BpcmsPageI18n bpi WITH bpi.bpcms_lang_install_signature = ?', $request->getParameter('culture'))
//                    ->where('bpi.lang_page_name_url = ?', $request->getParameter('page_name_url'))
//                    ->fetchOne();
//            }

//            if ($this->page) {
//                $page_name = $this->page['page_title'] ? $this->page['page_title'] : $this->page['page_name'];
//
//                defined('PAGE_TITLE', $page_name);
//
//                $this->getUser()->setFlash('page_name', $this->page['page_title'] ? $this->page['page_title'] : $this->page['page_name']);
//
//                $idcart = $this->page['Cart']['idcart'];
//                $request->setParameter('idpage', $this->page['idpage']);
//
//                sfConfig::set('bpcms_header_title', $this->page['page_name']);
//                sfConfig::set('selected_cart_name', '/'.strtolower($request->getParameter('page_name_url')).'.html');
//
//                if($this->page['page_name'] == 'default_page') {
//                    sfConfig::set('bpcms_header_title', $this->page['Cart']['cart_name']);
//                }
//
//                $breadcrumbs['home'] = '/';
//                $breadcrumbs[mb_strtolower($page_name, 'utf8')] = $request->getUri();
//
//                sfConfig::set('bpcms_header_breadcrumbs', $breadcrumbs);
////                sfConfig::set('bpcms_header_background_image', $this->page['header_background_image'] ? $this->page['header_background_image'] : $this->page['Cart']['header_background_image']);
//
//                if (sfConfig::get('bpcms_contact_page') == $this->page['idpage']) {
//                    $this->contact_page = 1;
//                }
//
//                if (!$this->page) {
//                    $this->forward('default', '404');
//                }
//            } else {
//                sfConfig::set('selected_cart_name', '/'.$request->getParameter('page_name_url').'.html');
//            }

        }

        $this->getUser()->setAttribute('cart_active', $idcart);
    }

}
