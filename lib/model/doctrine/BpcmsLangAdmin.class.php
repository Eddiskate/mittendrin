<?php

/**
 * BpcmsLangAdmin
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class BpcmsLangAdmin extends BaseBpcmsLangAdmin
{
    public function getLangTextValue() {
        $bpcms_text_i18n = Doctrine_Core::getTable('BpcmsAdminI18n')->createQuery('a')
            ->where('a.bpcms_lang_admin_text_name = ?', parent::getTextName())
            ->andWhere('a.bpcms_lang_install_signature = ?', sfContext::getInstance()->getRequest()->getParameter('culture') ? sfContext::getInstance()->getRequest()->getParameter('culture') : sfContext::getInstance()->getUser()->getCulture())
            ->fetchOne();

        if ($bpcms_text_i18n) {
            return $bpcms_text_i18n->getLangTextValue() ? $bpcms_text_i18n->getLangTextValue() : parent::getTextValue();
        } else {
            return parent::getTextValue();
        }
    }
}
