<?php

/**
 * home actions.
 *
 * @package    blackcms
 * @subpackage home
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

  }

  public function executeGeneratePageNameUrl(sfWebRequest $request)
  {
        $pages = Doctrine_Core::getTable('Page')->createQuery('p')->execute();

        foreach ($pages as $page) {
            $page_name = $page['page_name'];

            if($page == 'default_page') {
                $page_name = $page['page_title'];
            }
            $page->setPageNameUrl(Configuration::generateSeoURL($page_name));
            $page->save();
        }

        echo 'gotowe';die;
  }
}
