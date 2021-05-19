<?php

/**
 * plugin actions.
 *
 * @package    blackcms
 * @subpackage plugin
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pluginComponents extends sfComponents
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeSlideshow(sfWebRequest $request)
    {
        $slideshows = Doctrine_Core::getTable('Slideshow')
            ->createQuery('a')
            ->leftJoin('a.BpcmsSlideshowI18n bsi WITH bsi.bpcms_lang_install_signature = ?', $request->getParameter('culture'))
            ->where('a.publication = ?', 1)
            ->fetchArray();

        $slideshow_array = array();

        foreach ($slideshows as $lp => $slideshow) {
            $slideshow_array[$lp]['file_name'] = $slideshow['BpcmsSlideshowI18n']['0']['lang_file_name'] ? $slideshow['BpcmsSlideshowI18n']['0']['lang_file_name'] : $slideshow['file_name'];
            $slideshow_array[$lp]['body_h1'] = $slideshow['BpcmsSlideshowI18n']['0']['lang_body_h1'] ? $slideshow['BpcmsSlideshowI18n']['0']['lang_body_h1'] : $slideshow['body_h1'];
            $slideshow_array[$lp]['body_link'] = $slideshow['BpcmsSlideshowI18n']['0']['lang_body_link'] ? $slideshow['BpcmsSlideshowI18n']['0']['lang_body_link'] : $slideshow['body_link'];
            if ($lp == 0) {
                $slideshow_array[$lp]['active'] = 'active';
            }

        }

        $this->slideshows = $slideshow_array;
    }

    public function executePost(sfWebRequest $request)
    {
        $this->posts = Doctrine_Core::getTable('Post')
            ->createQuery('a')
            ->innerJoin('a.PostCatalog pc')
            ->where('a.publication = ? AND pc.homepage_publication = ?', array(1, 1))
            ->limit(sfConfig::get('bpcms_homepage_posts_per_page'))
            ->orderBy('a.idpost DESC')
            ->execute();
    }

    public function executePostcatalog(sfWebRequest $request)
    {
        $this->post_catalogs = Doctrine_Core::getTable('PostCatalog')
            ->createQuery('a')
            ->orderBy('a.homepage_row ASC')
            ->execute();
    }

    public function executeAlbummonth(sfWebRequest $request)
    {
        $this->bpcms_album_month = Doctrine_Core::getTable('BpcmsAlbumMonth')
            ->createQuery('a')
            ->where('a.publication = ?', 1)
            ->fetchOne();
    }

    public function executeRadiopage(sfWebRequest $request)
    {
        switch ($this->getUser()->getAttribute('lang_content_id')) {
            case "20":
                $this->radio_stations = Doctrine_Core::getTable('RadioStation')
                    ->createQuery('rs')
                    ->where('rs.idradio_station = ?', 1)
                    ->execute();
                break;
            case "21":
                $this->radio_stations = Doctrine_Core::getTable('RadioStation')
                    ->createQuery('rs')
                    ->where('rs.idradio_station = ?', 2)
                    ->execute();
                break;
        }

        $this->col = 12;
    }

    public function executeRadioprogram(sfWebRequest $request)
    {
        $this->bpcms_playlists = Doctrine_Core::getTable('BpcmsPlaylist')
            ->createQuery('a')
            ->where('a.page_idpage = ? AND a.publication = ?', array($request->getParameter('idpage'), 1))
            ->orderBy('a.idbpcms_playlist DESC')
            ->execute();
    }

    public function executeSocialpostshere(sfWebRequest $request)
    {
        if ($request->getParameter('module') == 'post' && $request->getParameter('action') == 'show') {
            $this->post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('idpost')));
        }
    }

    public function executeLoaderjs(sfWebRequest $request)
    {

    }

    public function executeRadio(sfWebRequest $request)
    {

    }

    public function executePartners(sfWebRequest $request)
    {
        $this->gallerys = Doctrine_Core::getTable('Gallery')
            ->createQuery('a')
            ->where('a.gallery_category_idgallery_category = ?', 2)
            ->fetchArray();
    }

    public function executePostTags(sfWebRequest $request)
    {
        $this->post_tagss = Doctrine_Core::getTable('PostTags')
            ->createQuery('a')
            ->execute();
    }


}
