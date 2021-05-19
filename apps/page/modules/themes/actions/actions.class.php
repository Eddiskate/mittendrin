<?php

/**
 * home actions.
 *
 * @package    blackcms
 * @subpackage home
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class themesActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeHomepage(sfWebRequest $request)
    {

    }

    public function executeSearchOnPage(sfWebRequest $request)
    {
        $search_keywords = '%'.$request->getParameter('search').'%';

        $this->posts = Doctrine_Core::getTable('Post')->createQuery('p')
            ->where('p.title LIKE ? OR p.description LIKE ?', array($search_keywords,$search_keywords))
            ->execute();

        $this->pages = Doctrine_Core::getTable('Page')->createQuery('p')
            ->where('p.page_name LIKE ? OR p.page_title LIKE ? OR p.body LIKE ?', array($search_keywords,$search_keywords,$search_keywords))
            ->execute();
    }
}