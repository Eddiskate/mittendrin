<?php

/**
 * post actions.
 *
 * @package    blackcms
 * @subpackage post
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bpcmsYtMoviesComponents extends sfComponents {

    public function executePremium(sfWebRequest $request) {
        $bpcms_yt_movies_premium = Doctrine_Core::getTable('BpcmsYtMovies')->createQuery('a');
        $bpcms_yt_movies_premium->where('a.recommended = ?', 1);
        $bpcms_yt_movies_premium->limit(5);
        $bpcms_yt_movies_premium->orderBy('a.created_at DESC');

        $this->bpcms_yt_movies_premiums = $bpcms_yt_movies_premium->execute();
    }

    public function executeCatalog(sfWebRequest $request) {
        $bpcms_yt_catalog = Doctrine_Core::getTable('BpcmsYtCatalog')->createQuery('a');
        $bpcms_yt_catalog->where('a.publication = ?', 1);
        $bpcms_yt_catalog->orderBy('a.name ASC');

        $this->bpcms_yt_catalogs = $bpcms_yt_catalog->execute();
    }

    public function executeSocial(sfWebRequest $request) {

    }
}
