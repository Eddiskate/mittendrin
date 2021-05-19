<?php

/**
 * plugin actions.
 *
 * @package    blackcms
 * @subpackage plugin
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pluginActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeOffer(sfWebRequest $request) {        
        $this->pagess = Doctrine_Core::getTable('Page')->createQuery('a')
                ->where('a.publication = ?', 1)
                ->andWhere('a.cart_idcart = ?', 9)
                ->orderBy('a.page_name ASC')
                ->execute();

        define('PAGE_TITLE', 'strona główna - racibórz');
    }

}

