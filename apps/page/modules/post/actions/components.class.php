<?php

/**
 * post actions.
 *
 * @package    blackcms
 * @subpackage post
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postComponents extends sfComponents {

    public function executePremium(sfWebRequest $request) {
        $post_premium = Doctrine_Core::getTable('Post')->createQuery('a');
        $post_premium->where('a.recommended = ?', 1);
        $post_premium->orderBy('a.created_at DESC');

        $this->post_premiums = $post_premium->execute();
    }

    public function executeSimilar(sfWebRequest $request) {
        $post_show = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost')));

        $post = Doctrine_Core::getTable('Post')->createQuery('a');
        $post->where('a.post_catalog_idpost_catalog = ?', $post_show->getPostCatalogIdpostCatalog());
        $post->whereNotIn('a.idpost', $request->getParameter('idpost'));
        $post->orderBy('a.created_at DESC');
        $post->limit(3);

        $this->posts = $post->execute();
    }

    public function executeSocial(sfWebRequest $request) {

    }

    public function executeGallery(sfWebRequest $request) {
        $this->post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost')));

        $this->gallery_array = $this->post->getGallerys(6);
    }

    public function executePostFilters(sfWebRequest $request) {
        $post = Doctrine_Core::getTable('PostCatalog')->createQuery('a');
        $post->where('a.publication = ?', 1);

        $this->post_catalogs = $post->execute();

        $this->url = $_SERVER['REQUEST_URI'];
    }

    public function executeMetaSocial(sfWebRequest $request) {

    }
}
