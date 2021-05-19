<?php

/**
 * Post
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Post extends BasePost
{

    public function getCreated()
    {
        return date('d-m-Y', parent::getCreatedAt());
    }

    public function getCreatedTime()
    {
        return date('Y-m-d H:i:s', parent::getCreatedAt());
    }

    public function getMonthLang()
    {
        $month_to = date('M', parent::getCreatedAt());

        $month['pl']['Jan'] = 'Styczeń';
        $month['pl']['Feb'] = 'Luty';
        $month['pl']['Mar'] = 'Marzec';
        $month['pl']['Apr'] = 'Kwiecień';
        $month['pl']['May'] = 'Maj';
        $month['pl']['Jun'] = 'Czerwiec';
        $month['pl']['Jul'] = 'Lipiec';
        $month['pl']['Aug'] = 'Śierpień';
        $month['pl']['Sep'] = 'Wrześień';
        $month['pl']['Oct'] = 'Paździęrnik';
        $month['pl']['Nov'] = 'Listopad';
        $month['pl']['Dec'] = 'Grudzień';

        return $month['pl'][$month_to];
    }

    public function getCreatedText()
    {
        return date('d', parent::getCreatedAt()) . ' ' . self::getMonthLang() . ' ' . date('Y', parent::getCreatedAt());
    }

    public function getPhoto($width = '100%', $height = null)
    {
        if (file_exists(sfConfig::get('sf_web_dir') . '/images/post/' . parent::getAvatar())) {
            return image_tag('post/' . parent::getAvatar());
        }
    }

    public function getPhotoLink($width = null, $height = null)
    {
        return link_to(self::getPhoto($width, $height), 'post/show?idpost=' . parent::getIdpost());
    }

    public function getLangTitle()
    {
        $bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->createQuery('a')
            ->where('a.post_idpost = ?', parent::getIdpost())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_post_i18n) {
            return $bpcms_post_i18n->getLangTitle() ? $bpcms_post_i18n->getLangTitle() : parent::getTitle();
        } else {
            return parent::getTitle();
        }
    }

    public function getLangTitleHeader()
    {
        $bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->createQuery('a')
            ->where('a.post_idpost = ?', parent::getIdpost())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_post_i18n) {
            $content = $bpcms_post_i18n->getLangTitleHeader() ? $bpcms_post_i18n->getLangTitleHeader() : parent::getTitleHeader();
        } else {
            $content = parent::getTitleHeader();
        }

        $content = trim($content);
        $content = strip_tags($content);

        if (mb_strlen($content, 'utf-8') > 150) {
            $content = mb_substr(str_replace('&shy;', '-', $content), 0, 150, 'utf-8') . '...</p>';
        }

        return $content;
    }

    public function getLangTitleRecommended()
    {
        $bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->createQuery('a')
            ->where('a.post_idpost = ?', parent::getIdpost())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_post_i18n) {
            return $bpcms_post_i18n->getLangTitleRecommended() ? $bpcms_post_i18n->getLangTitleRecommended() : parent::getTitleRecommended();
        } else {
            return parent::getTitleRecommended();
        }
    }

    public function getLangDescription()
    {
        $bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->createQuery('a')
            ->where('a.post_idpost = ?', parent::getIdpost())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_post_i18n) {
            return $bpcms_post_i18n->getLangDescription() ? $bpcms_post_i18n->getLangDescription() : parent::getDescription();
        } else {
            return parent::getDescription();
        }
    }

    public function getLangDescriptionHeader()
    {
        $bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->createQuery('a')
            ->where('a.post_idpost = ?', parent::getIdpost())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_post_i18n) {
            $content = $bpcms_post_i18n->getLangDescription() ? $bpcms_post_i18n->getLangDescription() : parent::getDescription();
        } else {
            $content = parent::getDescription();
        }

//        if(mb_strlen(trim($content), 'utf-8') > 100) {
//            $content = mb_substr(str_replace('&shy;','',$content),0,150, 'utf-8').'...</p>';
//        }

        $ex = explode("</p>", $content);

        return $ex['0'] . '</p>';
    }

    public function getLangDescriptionLongShowPost()
    {
        $bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->createQuery('a')
            ->where('a.post_idpost = ?', parent::getIdpost())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_post_i18n) {
            $content = $bpcms_post_i18n->getLangDescription() ? $bpcms_post_i18n->getLangDescription() : parent::getDescription();
        } else {
            $content = parent::getDescription();
        }

        $ex = explode("</p>", $content);

        for ($lp = 1; $lp < count($ex); $lp++) {
            $content_return .= $ex[$lp] . '</p>';
        }

        return $content_return;
    }

    public function getLangDescriptionLong($strlen_count)
    {
        $bpcms_post_i18n = Doctrine_Core::getTable('BpcmsPostI18n')->createQuery('a')
            ->where('a.post_idpost = ?', parent::getIdpost())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_post_i18n) {
            $content = $bpcms_post_i18n->getLangDescription() ? $bpcms_post_i18n->getLangDescription() : parent::getDescription();
        } else {
            $content = parent::getDescription();
        }

        if ($strlen_count != '') {
            $clear_html = strip_tags($content);

            if (strlen($clear_html) > $strlen_count) {
                $str_add = '...';
            } else {
                $str_add = '';
            }

            return '<p>' . mb_substr($clear_html, 0, $strlen_count, 'utf-8') . $str_add . '</p>';
        } else {
            return $content;
        }
    }

    public function getLinkPostShowUrl()
    {
        sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url'));

        $request = sfContext::getInstance()->getRequest();

        $string = 'post_show' . ($request->getParameter('culture') ? '_lang?culture=' . $request->getParameter('culture') . '&' : '?') . 'idpost=' . parent::getIdpost() . '&title=' . Configuration::getStringAndReplace(parent::getLangTitle());

        return url_for('@' . $string);
    }

    public function getLinkPostCatalogUrl()
    {
        $request = sfContext::getInstance()->getRequest();

        return parent::getPostCatalog()->getLinkUrl();
    }

    public function getLinkPostCatalogNameUrl()
    {
        $request = sfContext::getInstance()->getRequest();

        return parent::getPostCatalog()->getName();
    }

    public function getStatusRecommended()
    {
        $status = new Status(parent::getRecommended());

        return $status->getPublication();
    }

    public function getStatusPublication()
    {
        $status = new Status(parent::getPublication());

        return $status->getPublication();
    }

    public function getGallerys($limit = null)
    {
        if (parent::getIdpost()) {
            $gallery_category = Doctrine_Core::getTable('GalleryCategory')->findOneBy('category_name', parent::getIdpost());

            if ($gallery_category) {
                if (sfConfig::get('sf_app') == 'page') {
                    $gallery_sql = Doctrine_Core::getTable('Gallery')->createQuery('a');
                    $gallery_sql->where('a.gallery_category_idgallery_category = ? AND a.default_gallery = ?', array($gallery_category->getIdgalleryCategory(), 0));
                    $gallery_sql->orWhere('a.gallery_category_idgallery_category = ? AND a.default_gallery = ? AND a.default_gallery_off = ?', array($gallery_category->getIdgalleryCategory(), 1, 1));
                    if ($limit) {
                        $gallery_sql->limit($limit);
                    }
                    $gallery_sql->orderBy('a.position_row ASC,a.idgallery ASC');
                    $gallery = $gallery_sql->fetchArray();
                } else {
                    $gallery_sql = Doctrine_Core::getTable('Gallery')->createQuery('a');
                    $gallery_sql->where('a.gallery_category_idgallery_category = ?', $gallery_category->getIdgalleryCategory());
                    if ($limit) {
                        $gallery_sql->limit($limit);
                    }
                    $gallery_sql->orderBy('a.position_row ASC,a.idgallery ASC');
                    $gallery = $gallery_sql->fetchArray();
                }

                return $gallery;
            }
        }
    }
}