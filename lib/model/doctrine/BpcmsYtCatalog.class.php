<?php

/**
 * BpcmsYtCatalog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class BpcmsYtCatalog extends BaseBpcmsYtCatalog
{
    public function getStatus() {
        $status = new Status(parent::getPublication());
        
        return $status->getPublication();
    }

    public function getCountMovies() {
        $bpcms_yt_movies = Doctrine_Core::getTable('BpcmsYtMovies')->createQuery('a')
            ->where('a.bpcms_yt_catalog_idbpcms_yt_catalog = ?', parent::getIdbpcmsYtCatalog())
            ->count();

        return $bpcms_yt_movies;
    }

    public function getLinkToShowCatalogUrl() {
        $request = sfContext::getInstance()->getRequest();

        sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url'));

        $string = 'yt_movies_show_catalog' . ($request->getParameter('culture') ? '_lang?culture=' . $request->getParameter('culture') . '&' : '?') . 'idbpcms_yt_catalog=' . parent::getIdbpcmsYtCatalog() . '&name=' . Configuration::getStringAndReplace(parent::getLangName());

        return url_for('@' . $string);
    }

    public function getLangName()
    {
        $bpcms_yt_catalog_i18n = Doctrine_Core::getTable('BpcmsYtCatalogI18n')->createQuery('a')
            ->where('a.bpcms_yt_catalog_idbpcms_yt_catalog = ?', parent::getIdbpcmsYtCatalog())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_yt_catalog_i18n) {
            return $bpcms_yt_catalog_i18n->getLangName() ? $bpcms_yt_catalog_i18n->getLangName() : parent::getName();
        } else {
            return parent::getName();
        }
    }
}