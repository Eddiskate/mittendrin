<?php

/**
 * home actions.
 *
 * @package    blackcms
 * @subpackage home
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsYtMoviesActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $bpcms_yt_movies = Doctrine_Core::getTable('BpcmsYtMovies')->createQuery('a');
        $bpcms_yt_movies->where('a.publication = ?', 1);
        $this->page = new BpPage($bpcms_yt_movies->count(), sfConfig::get('bpcms_post_max_count_to_page'));
        $this->page->setModule('tv-mittendrin');
        $bpcms_yt_movies->offset($this->page->getOfset());
        $bpcms_yt_movies->limit(sfConfig::get('bpcms_post_max_count_to_page'));
        $bpcms_yt_movies->orderBy('a.created_at DESC');

        $this->bpcms_yt_moviess = $bpcms_yt_movies->execute();

        $this->bpcms_yt_movies_recommendeds = Doctrine_Core::getTable('BpcmsYtMovies')->createQuery('a')
                ->where('a.recommended = ?', 1)
                ->orderBy('a.created_at DESC')
                ->execute();

        $this->getUser()->setAttribute('cart_active', 3);
    }

    public function executeShow(sfWebRequest $request) {
        $this->bpcms_yt_movies = Doctrine_Core::getTable('BpcmsYtMovies')->find(array($request->getParameter('idbpcms_yt_movies')));

        $this->bpcms_yt_movies_recommendeds = Doctrine_Core::getTable('BpcmsYtMovies')->createQuery('a')
                ->where('a.bpcms_yt_catalog_idbpcms_yt_catalog = ?', $this->bpcms_yt_movies->getBpcmsYtCatalogIdbpcmsYtCatalog())
                ->orderBy('a.created_at DESC')
                ->execute();
    }

    public function executeShowcatalog(sfWebRequest $request) {
        $this->bpcms_yt_moviess = Doctrine_Core::getTable('BpcmsYtMovies')->createQuery('a')
                ->where('a.publication = ?', 1)
                ->andWhere('a.bpcms_yt_catalog_idbpcms_yt_catalog = ?', $request->getParameter('idbpcms_yt_catalog'))
                ->orderBy('a.created_at DESC')
                ->execute();

//        $this->bpcms_yt_movies_recommendeds = Doctrine_Core::getTable('BpcmsYtMovies')->createQuery('a')
//                ->where('a.bpcms_yt_catalog_idbpcms_yt_catalog = ?', $this->bpcms_yt_movies->getBpcmsYtCatalogIdbpcmsYtCatalog())
//                ->orderBy('a.created_at DESC')
//                ->execute();

        $this->setTemplate('index');
    }

}
