<?php

/**
 * cart actions.
 *
 * @package    blackcms
 * @subpackage cart
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cartComponents extends sfComponents
{

    public function executeMenutop(sfWebRequest $request)
    {
        $this->post_catalogs = Doctrine_Core::getTable('PostCatalog')
            ->createQuery('a')
            ->where('a.publication = ?', 1)
            ->orderBy('a.homepage_row ASC')
            ->execute();

        $this->carts = Doctrine_Core::getTable('Cart')
            ->createQuery('a')
            ->where('a.publication = ?', 1)
            ->andWhere('a.position = ? OR a.position = ?', array(0, 2))
            ->orderBy('a.position_row ASC')
            ->execute();

        $url_post_ex = explode("wydarzenia", $_SERVER['REQUEST_URI']);

        if (count($url_post_ex) == 2) {
            $this->getUser()->setAttribute('cart_active', 'wydarzenia');
            $this->post_active_class = 'active';
        }
    }

    public function executeMenuleft(sfWebRequest $request)
    {
        if ($request->getParameter('idpage') != '') {
            $page = Doctrine_Core::getTable('Page')->findOneBy('idpage', $request->getParameter('idpage'));
            $this->cart = Doctrine_Core::getTable('Cart')->findOneBy('idcart', $page->getCartIdcart());
            $cart_id = $page->getCartIdcart();
        }
        if ($request->getParameter('idcart') != '') {
            $this->cart = Doctrine_Core::getTable('Cart')->findOneBy('idcart', $request->getParameter('idcart'));
            $cart_id = $request->getParameter('idcart');
        }
        $page = Doctrine_Core::getTable('Page')->createQuery('a');
        $page->where('a.publication = ?', 1);
        $page->andWhere('a.cart_idcart = ?', $cart_id);
        $page->orderBy('a.page_name ASC');
        $this->count_page = $page->count();
        $this->pages = $page->execute();
    }

    public function executeMenubottom(sfWebRequest $request)
    {
        $this->post_catalogs = Doctrine_Core::getTable('PostCatalog')
            ->createQuery('a')
            ->where('a.publication = ?', 1)
            ->orderBy('a.homepage_row ASC')
            ->execute();

        $cart = Doctrine_Core::getTable('Cart')->createQuery('a');
        $cart->where('a.publication = ?', 1);
        $cart->andWhere('a.position = ? OR a.position = ?', array(1, 2));
        $this->carts = $cart->execute();
    }

}
