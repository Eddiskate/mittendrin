<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BpcmsPageI18n', 'doctrine');

/**
 * BaseBpcmsPageI18n
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $page_idpage
 * @property string $bpcms_lang_install_signature
 * @property string $lang_page_name
 * @property string $lang_page_title
 * @property string $lang_body
 * @property string $lang_page_name_url
 * @property BpcmsLangInstall $BpcmsLangInstall
 * @property Page $Page
 * 
 * @method integer          getPageIdpage()                   Returns the current record's "page_idpage" value
 * @method string           getBpcmsLangInstallSignature()    Returns the current record's "bpcms_lang_install_signature" value
 * @method string           getLangPageName()                 Returns the current record's "lang_page_name" value
 * @method string           getLangPageTitle()                Returns the current record's "lang_page_title" value
 * @method string           getLangBody()                     Returns the current record's "lang_body" value
 * @method string           getLangPageNameUrl()              Returns the current record's "lang_page_name_url" value
 * @method BpcmsLangInstall getBpcmsLangInstall()             Returns the current record's "BpcmsLangInstall" value
 * @method Page             getPage()                         Returns the current record's "Page" value
 * @method BpcmsPageI18n    setPageIdpage()                   Sets the current record's "page_idpage" value
 * @method BpcmsPageI18n    setBpcmsLangInstallSignature()    Sets the current record's "bpcms_lang_install_signature" value
 * @method BpcmsPageI18n    setLangPageName()                 Sets the current record's "lang_page_name" value
 * @method BpcmsPageI18n    setLangPageTitle()                Sets the current record's "lang_page_title" value
 * @method BpcmsPageI18n    setLangBody()                     Sets the current record's "lang_body" value
 * @method BpcmsPageI18n    setLangPageNameUrl()              Sets the current record's "lang_page_name_url" value
 * @method BpcmsPageI18n    setBpcmsLangInstall()             Sets the current record's "BpcmsLangInstall" value
 * @method BpcmsPageI18n    setPage()                         Sets the current record's "Page" value
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBpcmsPageI18n extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bpcms_page_i18n');
        $this->hasColumn('page_idpage', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('bpcms_lang_install_signature', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('lang_page_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('lang_page_title', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('lang_body', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('lang_page_name_url', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('BpcmsLangInstall', array(
             'local' => 'bpcms_lang_install_signature',
             'foreign' => 'signature'));

        $this->hasOne('Page', array(
             'local' => 'page_idpage',
             'foreign' => 'idpage'));
    }
}