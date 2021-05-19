<?php

class BpPage {

    public $count_rows;
    public $count_rows_to_page;
    public $module;
    public $action;

    public function __construct($count_rows, $count_rows_to_page) {
        $this->count_rows = $count_rows;
        $this->count_rows_to_page = $count_rows_to_page;
    }

    public function setModule($module) {
        $this->module = $module;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function getCountRows() {
        return $this->count_rows;
    }

    public function getCountPage() {
        return ceil($this->count_rows / $this->count_rows_to_page);
    }

    public function getListPageArray() {
        $request = sfContext::getInstance()->getRequest();

        $page_li = array();
        if ($this->count_rows > sfConfig::get('bpcms_post_max_count_to_page')) {
            for ($i = 1; $i <= $this->getCountPage(); $i++) {
                if (sfContext::getInstance()->getRequest()->getParameter('page') == $i) {
                    $active = 'active';
                } else {
                    unset($active);
                }

                $page_li[$i]['href'] = '#';
                $page_li[$i]['text'] = $i;
            }
            return $page_li;
        }
    }

    public function getListPage() {
        $request = sfContext::getInstance()->getRequest();

        if ($this->count_rows > sfConfig::get('bpcms_post_max_count_to_page')) {
            for ($i = 1; $i <= $this->getCountPage(); $i++) {
                if (sfContext::getInstance()->getRequest()->getParameter('page') == $i) {
                    $active = 'active';
                } else {
                    unset($active);
                }
                $url = explode('strona', $_SERVER['REQUEST_URI']);
                if (sfContext::getInstance()->getRequest()->getParameter('page') != '') {
                    $url_old = substr($url['0'], 0, -1);
                } else {
                    $url_old = $url['0'];
                }
                if (sfContext::getInstance()->getRequest()->getParameter('submit') == 'szukaj') {
                    $tmp .= '<li><a href="' . $_SERVER['REMOTE_HOST'] . 'search?keywords=' . sfContext::getInstance()->getRequest()->getParameter('keywords') . '&submit=szukaj&page=' . $i . '" ' . $active . ' class="default-transition-effect ' . $active . '">' . $i . '</a></li>';
                } else {
                    $tmp .= '<li><a href="' . str_replace('.html', '', $url_old) . '/strona/' . $i . '.html" class="default-transition-effect ' . $active . '">' . $i . '</a></li>';
                }
            }
            return $tmp;
        }
    }

    public function getOfset() {
        if (sfContext::getInstance()->getRequest()->getParameter('page') != '') {
            return $this->count_rows_to_page * (sfContext::getInstance()->getRequest()->getParameter('page') - 1);
        } else {
            return $this->count_rows_to_page * 0;
        }
    }

    public function getLinkNext() {
        $request = sfContext::getInstance()->getRequest();
        $page = sfContext::getInstance()->getRequest()->getParameter('page') ? sfContext::getInstance()->getRequest()->getParameter('page') : 0;

        if ($page < $this->getCountPage() && $this->count_rows > sfConfig::get('bpcms_post_max_count_to_page')) {
            if ($request->getParameter('module') == 'post' && $request->getParameter('action') == 'list') {
                $string = 'post_catalog_page' . ($request->getParameter('culture') ? '_lang?culture=' . $request->getParameter('culture') . '&' : '?') . 'page=' . ($page + 1) . '&idpost_catalog=' . $request->getParameter('idpost_catalog') . '&name=' . $request->getParameter('name');

                $url = '@' . $string;
            }

            if ($request->getParameter('module') == 'post' && $request->getParameter('action') == 'index') {
                $string = 'post_page' . ($request->getParameter('culture') ? '_lang?culture=' . $request->getParameter('culture') . '&' : '?') . 'page=' . ($page ? ($page + 1) : 2);

                $url = '@' . $string;
            }
            
            if ($request->getParameter('module') == 'bpcmsYtMovies' && $request->getParameter('action') == 'index') {
                $string = 'yt_movies_page' . ($request->getParameter('culture') ? '_lang?culture=' . $request->getParameter('culture') . '&' : '?') . 'page=' . ($page ? ($page + 1) : 2);

                $url = '@' . $string;
            }            

            return '<li class="next default-transition-effect">' . link_to('<i class="icon-chevron-right"></i>', $url) . '</li>';
        }
    }

    public function getLinkPrev() {
        $request = sfContext::getInstance()->getRequest();
        $page = sfContext::getInstance()->getRequest()->getParameter('page') ? sfContext::getInstance()->getRequest()->getParameter('page') : 0;

        if ($page > 1 && $this->count_rows > sfConfig::get('bpcms_post_max_count_to_page')) {

            if ($request->getParameter('module') == 'post' && $request->getParameter('action') == 'list') {
                $string = 'post_catalog_page' . ($request->getParameter('culture') ? '_lang?culture=' . $request->getParameter('culture') . '&' : '?') . 'page=' . ($page - 1) . '&idpost_catalog=' . $request->getParameter('idpost_catalog') . '&name=' . $request->getParameter('name');

                $url = '@' . $string;
            }

            if ($request->getParameter('module') == 'post' && $request->getParameter('action') == 'index') {
                $string = 'post_page' . ($request->getParameter('culture') ? '_lang?culture=' . $request->getParameter('culture') . '&' : '?') . 'page=' . ($page - 1);

                $url = '@' . $string;
            }
            
            if ($request->getParameter('module') == 'bpcmsYtMovies' && $request->getParameter('action') == 'index') {
                $string = 'yt_movies_page' . ($request->getParameter('culture') ? '_lang?culture=' . $request->getParameter('culture') . '&' : '?') . 'page=' . ($page - 1);

                $url = '@' . $string;
            }
            
            return '<li class="next default-transition-effect">' . link_to('<i class="icon-chevron-left"></i>', $url) . '</li>';
        }
    }

}
