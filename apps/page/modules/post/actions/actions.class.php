<?php

/**
 * post actions.
 *
 * @package    blackcms
 * @subpackage post
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $post = Doctrine_Core::getTable('Post')->createQuery('a');
        $post->where('a.publication = ?', 1);

        if ($request->getParameter('name_url') != '') {
            $post->innerJoin('a.PostHasPostTags phpt');
            $post->innerJoin('phpt.PostTags pt');
            $post->where('pt.name_url = ?', $request->getParameter('name_url'));
        }

        $this->post_count = $post->count();

        $post->limit(sfConfig::get('bpcms_post_max_count_to_page'));
        $post->orderBy('a.created_at DESC');

        $this->posts = $post->execute();

        sfConfig::set('selected_cart_name', '/wydarzenia.html');
    }

    public function executeList(sfWebRequest $request) {

        $post = Doctrine_Core::getTable('Post')->createQuery('a');
        $post->where('a.publication = ?', 1);
        $post->andWhere('a.post_catalog_idpost_catalog = ?', $request->getParameter('idpost_catalog'));

        if ($request->getParameter('name_url') != '') {
            $post->innerJoin('a.PostHasPostTags phpt');
            $post->innerJoin('phpt.PostTags pt');
            $post->andWhere('pt.name_url = ?', $request->getParameter('name_url'));
        }

        $this->post_count = $post->count();

        $post->limit(sfConfig::get('bpcms_post_max_count_to_page'));
        $post->orderBy('a.created_at DESC');

        $this->posts = $post->execute();

        $this->post_catalog = Doctrine_Core::getTable('PostCatalog')->find(array($request->getParameter('idpost_catalog')));

        $this->getUser()->setAttribute('lang_content_id', $this->post_catalog['idpost_catalog']);
        $this->getUser()->setAttribute('lang_content_table', 'PostCatalog');

        $this->setTemplate('index');

        sfConfig::set('selected_cart_name', '/wydarzenia.html');
    }

    public function executeTags(sfWebRequest $request) {
        $post = Doctrine_Core::getTable('Post')->createQuery('a');
        $post->where('a.publication = ?', 1);

        if ($request->getParameter('name_url') != '') {
            $post->innerJoin('a.PostHasPostTags phpt');
            $post->innerJoin('phpt.PostTags pt');
            $post->where('pt.name_url = ?', $request->getParameter('name_url'));
        }

        $this->post_count = $post->count();

        $post->offset(0);
        $post->limit(sfConfig::get('bpcms_post_max_count_to_page'));
        $post->orderBy('a.created_at DESC');

        $this->posts = $post->execute();

        $this->setTemplate('index');
    }
    
    public function executeShow(sfWebRequest $request) {
        $this->post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost')));

        $this->getUser()->setAttribute('lang_content_id', $this->post['idpost']);
        $this->getUser()->setAttribute('lang_content_table', 'Post');

        $request->setParameter('post_title', $this->post['title']);
        $request->setParameter('post_header', $this->post['title_header']);
        $request->setParameter('post_image', '/images/post/avatar/'.$this->post['avatar']);

        sfConfig::set('selected_cart_name', '/wydarzenia.html');
    }

    public function executeGallery(sfWebRequest $request)
    {
        $this->forward404Unless($this->post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost'))), sprintf('Object post does not exist (%s).', $request->getParameter('idpost')));

        $gallery_array = $this->post->getGallerys();

        $gallery['first'] = 1;
        $gallery['last'] = count($gallery_array);
        $gallery['use_id'] = $request->getParameter('id') ? $request->getParameter('id') : 1;
        $gallery['use_file_name'] = $gallery_array[($gallery['use_id']-1)]['file_name'];
        if($gallery['use_id'] > $gallery['first']) {
            $gallery['use_prev'] = $gallery['use_id']-1;
        }
        if($gallery['use_id'] < $gallery['last']) {
            $gallery['use_next'] = $gallery['use_id']+1;
        }

        $this->gallery = $gallery;
        $this->gallery_thumbs = $gallery_array;
//        BpDebug::printr($gallery);
    }
}
