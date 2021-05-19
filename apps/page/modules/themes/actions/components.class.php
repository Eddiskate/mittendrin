<?php

/**
 * plugin actions.
 *
 * @package    blackcms
 * @subpackage plugin
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class themesComponents extends sfComponents
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeLayout(sfWebRequest $request)
    {

    }

    public function executeLayoutHomepage(sfWebRequest $request)
    {
        $this->slideshows = Doctrine_Core::getTable('Slideshow')->createQuery('s')
            ->where('s.publication = ?', 1)
            ->fetchArray();

//        $this->post_lasts = Doctrine_Core::getTable('Post')->createQuery('p')
//            ->innerJoin('p.PostCatalog pc')
//            ->where('p.publication = ? AND p.created_at <= ? AND (p.publication_end IS NOT NULL AND p.publication_end >= ? OR p.publication_end IS NULL OR p.publication_end = ?)', array(1, time(), time(), ''))
//            ->orderBy('p.promoted DESC')
//            ->addOrderBy('p.created_at DESC')
//            ->limit(3)
//            ->execute();
    }

    public function executeLayoutPeople(sfWebRequest $request)
    {
        $this->bpcms_peoples = Doctrine_Core::getTable('BpcmsPeople')->createQuery('bp')
            ->where('bp.publication = ?', 1)
            ->orderBy('bp.position_row ASC')
            ->fetchArray();

        $this->bpcms_people_view = new BpcmsPeopleView();
    }

    public function executePostEvent(sfWebRequest $request)
    {
        $this->posts = Doctrine_Core::getTable('Post')->createQuery('p')
            ->innerJoin('p.PostCatalog pc')
            ->where('p.publication = ? AND p.post_catalog_idpost_catalog = ? AND p.publication_end > ?', array(1, 5, time()))
            ->limit(3)
            ->orderBy('p.publication_end ASC')
            ->execute();
    }

    public function executeHead(sfWebRequest $request)
    {

    }

    public function executeBody(sfWebRequest $request)
    {

    }

    public function executeMenuTop(sfWebRequest $request)
    {
        $this->post_catalogs = Doctrine_Core::getTable('PostCatalog')
            ->createQuery('a')
            ->where('a.publication = ?', 1)
            ->execute();

        $carts = Doctrine_Core::getTable('Cart')
            ->createQuery('a')
            ->leftJoin('a.BpcmsCartI18n bci WITH bci.bpcms_lang_install_signature = ?', $request->getParameter('culture'))
            ->leftJoin('a.Page p')
            ->where('a.publication = ?', 1)
            ->andWhere('a.position = ? OR a.position = ?', array(0, 2))
            ->orderBy('a.position_row ASC')
            ->fetchArray();

        $cart_array = array();

        foreach ($carts as $cart) {
            $cart_array[$cart['idcart']]['name'] = $cart['BpcmsCartI18n']['0']['lang_cart_name'] ? $cart['BpcmsCartI18n']['0']['lang_cart_name'] : $cart['cart_name'];;

            if ($cart['redirect_to_url']) {
                $cart_array[$cart['idcart']]['href'] = ($request->getParameter('culture') ? '/'.$request->getParameter('culture') : '').$cart['redirect_to_url'];
            } else {
                if($request->getParameter('culture')) {
                    $cart_array[$cart['idcart']]['href'] = url_for('@cms_page_name_url_lang?page_name_url=' . Configuration::getStringAndReplace($cart_array[$cart['idcart']]['name']).'&culture='.$request->getParameter('culture'));
                } else {
                    $cart_array[$cart['idcart']]['href'] = url_for('@cms_page_name_url?page_name_url=' . Configuration::getStringAndReplace($cart_array[$cart['idcart']]['name']));
                }
            }

            if (sfConfig::get('selected_cart_name') == $cart_array[$cart['idcart']]['href']) {
                $cart_array[$cart['idcart']]['class'] = 'active';
            }

            if ($cart['Page']) {
                foreach ($cart['Page'] as $lp => $page) {
                    if ($page['page_default'] == 0) {
                        $cart_array[$cart['idcart']]['page_list'][$page['idpage']]['name'] = $page['page_name'];

                        if($request->getParameter('culture')) {
                            $cart_array[$cart['idcart']]['page_list'][$page['idpage']]['href'] = url_for('@cms_page_name_url_lang?page_name_url=' . Configuration::getStringAndReplace($page['page_name']).'&culture='.$request->getParameter('culture'));
                        } else {
                            $cart_array[$cart['idcart']]['page_list'][$page['idpage']]['href'] = url_for('@cms_page_name_url?page_name_url=' . Configuration::getStringAndReplace($page['page_name']));
                        }
                    }

                    if ($page['page_default'] == 1) {
                        if($request->getParameter('culture')) {
                            $cart_array[$cart['idcart']]['href'] = url_for('@cms_page_name_url_lang?page_name_url=' . Configuration::getStringAndReplace($page['page_name']).'&culture='.$request->getParameter('culture'));
                        } else {
                            $cart_array[$cart['idcart']]['href'] = url_for('@cms_page_name_url?page_name_url=' . Configuration::getStringAndReplace($page['page_name']));
                        }
                    }
                }
            }
        }

        $this->structure_cms = $cart_array;
    }

    public function executeMenuBottom(sfWebRequest $request)
    {
        $carts = Doctrine_Core::getTable('Cart')
            ->createQuery('a')
            ->leftJoin('a.BpcmsCartI18n bci WITH bci.bpcms_lang_install_signature = ?', $request->getParameter('culture'))
            ->leftJoin('a.Page p')
            ->leftJoin('p.BpcmsPageI18n bpi WITH bci.bpcms_lang_install_signature = ?', $request->getParameter('culture'))
            ->where('a.publication = ?', 1)
            ->andWhere('a.position = ? OR a.position = ?', array(1, 2))
            ->orderBy('a.position_row ASC')
            ->fetchArray();

        $cart_array = array();

        foreach ($carts as $cart) {
            $cart_array[$cart['idcart']]['name'] = $cart['BpcmsCartI18n']['0']['lang_cart_name'] ? $cart['BpcmsCartI18n']['0']['lang_cart_name'] : $cart['cart_name'];
            $cart_array[$cart['idcart']]['name_url'] = $cart['BpcmsCartI18n']['0']['name_url'] ? $cart['BpcmsCartI18n']['0']['name_url'] : $cart['name_url'];

            if ($cart['redirect_to_url']) {
                $cart_array[$cart['idcart']]['href'] = ($request->getParameter('culture') ? '/'.$request->getParameter('culture') : '').$cart['redirect_to_url'];
            } else {
                if($request->getParameter('culture')) {
                    $cart_array[$cart['idcart']]['href'] = url_for('@cms_page_name_url_lang?page_name_url=' . $cart_array[$cart['idcart']]['name_url'].'&culture='.$request->getParameter('culture'));
                } else {
                    $cart_array[$cart['idcart']]['href'] = url_for('@cms_page_name_url?page_name_url=' . $cart_array[$cart['idcart']]['name_url']);
                }

                if (false !== strpos($request->getUri(), $cart_array[$cart['idcart']]['href'])) {
                    $cart_array[$cart['idcart']]['class'] = 'active';
                }
            }

            if ($cart['Page']) {
                foreach ($cart['Page'] as $page) {
                    if ($page['page_default'] == 0) {
                        $cart_array[$cart['idcart']]['page_list'][$page['idpage']]['name'] = $page['page_name'];
                        if($request->getParameter('culture')) {
                            $cart_array[$cart['idcart']]['page_list'][$page['idpage']]['href'] = url_for('@cms_page_name_url_lang?page_name_url=' . Configuration::getStringAndReplace($page['BpcmsPageI18n']['0']['lang_page_name_url'] ? $page['BpcmsPageI18n']['0']['lang_page_name_url'] : $page['page_name']).'&culture='.$request->getParameter('culture'));
                        } else {
                            $cart_array[$cart['idcart']]['page_list'][$page['idpage']]['href'] = url_for('@cms_page_name_url?page_name_url=' . Configuration::getStringAndReplace($page['page_name']));
                        }

                        if (false !== strpos($request->getUri(), $cart_array[$cart['idcart']]['page_list'][$page['idpage']]['href'])) {
                            $cart_array[$cart['idcart']]['class'] = 'active';
                        }
                    } else {
                        if($request->getParameter('culture')) {
                            //$cart_array[$cart['idcart']]['href'] = url_for('@cms_page_name_url_lang?page_name_url=' . Configuration::getStringAndReplace($page['BpcmsPageI18n']['0']['lang_page_name_url'] ? $page['BpcmsPageI18n']['0']['lang_page_name_url'] : ($page['name_url'] ? $page['name_url'] : $page['name_page'])).'&culture='.$request->getParameter('culture'));
                        } else {
                            //$cart_array[$cart['idcart']]['href'] = url_for('@cms_page_name_url?page_name_url=' . Configuration::getStringAndReplace(($page['name_url'] ? $page['name_url'] : $page['page_name'])));
                        }
                    }
                }
            }
        }

        $this->structure_cms = $cart_array;
    }

    public function executeBreadcrumb(sfWebRequest $request)
    {
        $location = array();

        $location['0']['name'] = 'home';
        $location['0']['href'] = url_for('@homepage');

        switch ($request->getParameter('module')) {
            case "cart":
                switch ($request->getParameter('action')) {
                    case "show":
                        $page = Doctrine_Core::getTable('Page')->createQuery('p')
                            ->innerJoin('p.Cart c')
                            ->where('p.page_name_url = ?', $request->getParameter('page_name_url'))
                            ->fetchOne(array(), Doctrine_Core::HYDRATE_ARRAY);

                        if ($page['page_default'] == 1) {
                            $location['1']['name'] = $page['Cart']['cart_name'];
                        } else {
                            $location['1']['name'] = $page['page_name'];
                        }

                        break;
                    case "people":
                        $location['1']['name'] = '<a href="/kadra.html">kadra</a>';
                        $location['2']['name'] = $request->getParameter('people_name');

                        break;
                }
                break;
            case "post":
                switch ($request->getParameter('action')) {
                    case "list":
                        $post_catalog = Doctrine_Core::getTable('PostCatalog')->find(array($this->request->getParameter('idpost_catalog')));

                        $location['1']['name'] = 'aktualności';
                        $location['1']['href'] = '/aktualnosci.html';

                        if ($post_catalog) {
                            $location['2']['name'] = $post_catalog->getName();
                        }

                        break;
                    case "show":
                        $post = Doctrine_Core::getTable('Post')->find(array($this->request->getParameter('idpost')));

                        $location['1']['name'] = 'aktualności';
                        $location['1']['href'] = '/aktualnosci.html';

                        $location['2']['name'] = $post->getPostCatalog()->getName();
                        $location['2']['href'] = $post->getPostCatalog()->getLinkUrl();

                        $location['3']['name'] = $post['title'];
                        break;
                    default:
                        $location['1']['name'] = 'aktualności';
                        break;
                }
                break;
            case "gallery":
                switch ($request->getParameter('action')) {
                    case "index":
                        $location['1']['name'] = 'aktualności';
                        $location['1']['href'] = '/aktualnosci.html';
                        break;
                    case "category":
                        die;
                        break;
                }
                break;
        }

        if ($request->getParameter('module') != 'home') {
            $this->location = $location;
        }
    }

    function array_orderby()
    {
        $args = func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = array();
                foreach ($data as $key => $row)
                    $tmp[$key] = $row[$field];
                $args[$n] = $tmp;
            }
        }
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
    }

    public function executeLayoutGrafik(sfWebRequest $request)
    {
        $bpcms_calendars = Doctrine_Core::getTable('BpcmsCalendar')->createQuery('bc')
            ->innerJoin('bc.BpcmsCalendarHasWeekDay bchwd')
            ->innerJoin('bc.BpcmsCalendarCity bcc')
            ->innerJoin('bc.BpcmsCalendarTag bct')
            ->where('bc.publication = ?', 1)
            ->orderBy('bchwd.day_number,bc.time_start ASC')
            ->fetchArray();

        $bpcms_calendar_list = array();
        $bpcms_calendar_tag = array();

        foreach ($bpcms_calendars as $bpcms_calendar) {
            $bpcms_calendar_list[$bpcms_calendar['BpcmsCalendarHasWeekDay']['0']['day_number']][$bpcms_calendar['idbpcms_calendar']]['name'] = $bpcms_calendar['name'];
            $bpcms_calendar_list[$bpcms_calendar['BpcmsCalendarHasWeekDay']['0']['day_number']][$bpcms_calendar['idbpcms_calendar']]['city'] = $bpcms_calendar['BpcmsCalendarCity']['name'];
            $bpcms_calendar_list[$bpcms_calendar['BpcmsCalendarHasWeekDay']['0']['day_number']][$bpcms_calendar['idbpcms_calendar']]['background_color'] = $bpcms_calendar['BpcmsCalendarTag']['hex_background_color'];
            $bpcms_calendar_list[$bpcms_calendar['BpcmsCalendarHasWeekDay']['0']['day_number']][$bpcms_calendar['idbpcms_calendar']]['idbpcms_calendar_tag'] = $bpcms_calendar['BpcmsCalendarTag']['idbpcms_calendar_tag'];
            $bpcms_calendar_list[$bpcms_calendar['BpcmsCalendarHasWeekDay']['0']['day_number']][$bpcms_calendar['idbpcms_calendar']]['idbpcms_calendar_city'] = $bpcms_calendar['BpcmsCalendarCity']['idbpcms_calendar_city'];
            $bpcms_calendar_list[$bpcms_calendar['BpcmsCalendarHasWeekDay']['0']['day_number']][$bpcms_calendar['idbpcms_calendar']]['time_start'] = $bpcms_calendar['time_start'];
            $bpcms_calendar_list[$bpcms_calendar['BpcmsCalendarHasWeekDay']['0']['day_number']][$bpcms_calendar['idbpcms_calendar']]['time_end'] = $bpcms_calendar['time_end'];
            $bpcms_calendar_list[$bpcms_calendar['BpcmsCalendarHasWeekDay']['0']['day_number']][$bpcms_calendar['idbpcms_calendar']]['room_number'] = $bpcms_calendar['room_number'];

            $bpcms_calendar_tag[$bpcms_calendar['BpcmsCalendarTag']['idbpcms_calendar_tag']]['name'] = $bpcms_calendar['BpcmsCalendarTag']['name'];
            $bpcms_calendar_tag[$bpcms_calendar['BpcmsCalendarTag']['idbpcms_calendar_tag']]['hex_background_color'] = $bpcms_calendar['BpcmsCalendarTag']['hex_background_color'];

            $bpcms_calendar_city[$bpcms_calendar['BpcmsCalendarCity']['idbpcms_calendar_city']]['idbpcms_calendar_city'] = $bpcms_calendar['idbpcms_calendar_city'];
            $bpcms_calendar_city[$bpcms_calendar['BpcmsCalendarCity']['idbpcms_calendar_city']]['name'] = $bpcms_calendar['BpcmsCalendarCity']['name'];
            $bpcms_calendar_city[$bpcms_calendar['BpcmsCalendarCity']['idbpcms_calendar_city']]['position_row'] = $bpcms_calendar['BpcmsCalendarCity']['position_row'];
        }

        $this->bpcms_calendar_lists = $bpcms_calendar_list;
        $this->bpcms_calendar_tags = $bpcms_calendar_tag;
        $this->bpcms_calendar_citys = $this->array_orderby($bpcms_calendar_city, 'position_row', SORT_ASC);
    }

    public function executeHeaderBreadcrumbs(sfWebRequest $request)
    {
        $this->header_background_image = (sfConfig::get('bpcms_header_background_image') ? '/images/header_background/' . sfConfig::get('bpcms_header_background_image') : '/themes/' . sfConfig::get('bpcms_themes_dir_name') . '/images/background-header-default.jpg');
        $this->bpcms_header_breadcrumbs = sfConfig::get('bpcms_header_breadcrumbs');
    }


    public function executeModuleDiplomas(sfWebRequest $request)
    {
        $diplomas = array();

        $diplomas_lists = Doctrine_Core::getTable('BpcmsDiplomas')->createQuery('bd')
            ->orderBy('bd.received DESC')
            ->fetchArray();

        foreach ($diplomas_lists as $diplomas_list) {
            $diplomas[date('Y', $diplomas_list['received'])][$diplomas_list['idbpcms_diplomas']]['name'] = $diplomas_list['name'];
            $diplomas[date('Y', $diplomas_list['received'])][$diplomas_list['idbpcms_diplomas']]['title'] = $diplomas_list['title'];
            $diplomas[date('Y', $diplomas_list['received'])][$diplomas_list['idbpcms_diplomas']]['image'] = $diplomas_list['image'];
        }

        $this->bpcms_diplomas = $diplomas;
    }

    public function executeModuleGallery(sfWebRequest $request)
    {
        $this->gallery_catalogs = Doctrine_Core::getTable('GalleryCatalog')
            ->createQuery('a')
            ->where('a.publication = ?', 1)
            ->execute();
    }

    public function executeModuleGalleryPage(sfWebRequest $request)
    {
        $page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('idpage')));

        $category_name = $page['page_name'] . ' - strona ID: ' . $page['idpage'];

        $this->gallerys = Doctrine_Core::getTable('Gallery')
            ->createQuery('a')
            ->innerJoin('a.GalleryCategory pcategory')
            ->where('pcategory.category_name = ?', $category_name)
            ->execute();
    }

    public function executeModuleCalendar(sfWebRequest $request)
    {

    }

    public function executeModuleDownload(sfWebRequest $request)
    {
        $this->downloads = Doctrine_Core::getTable('Download')
            ->createQuery('a')
            ->where('a.download_catalog_iddownload_catalog = ?', 1)
            ->execute();
    }

}
