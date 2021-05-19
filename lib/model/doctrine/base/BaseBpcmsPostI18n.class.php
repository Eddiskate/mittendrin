<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BpcmsPostI18n', 'doctrine');

/**
 * BaseBpcmsPostI18n
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $post_idpost
 * @property string $bpcms_lang_install_signature
 * @property string $lang_title
 * @property string $lang_description
 * @property string $lang_title_recommended
 * @property string $lang_title_header
 * @property BpcmsLangInstall $BpcmsLangInstall
 * @property Post $Post
 * 
 * @method integer          getPostIdpost()                   Returns the current record's "post_idpost" value
 * @method string           getBpcmsLangInstallSignature()    Returns the current record's "bpcms_lang_install_signature" value
 * @method string           getLangTitle()                    Returns the current record's "lang_title" value
 * @method string           getLangDescription()              Returns the current record's "lang_description" value
 * @method string           getLangTitleRecommended()         Returns the current record's "lang_title_recommended" value
 * @method string           getLangTitleHeader()              Returns the current record's "lang_title_header" value
 * @method BpcmsLangInstall getBpcmsLangInstall()             Returns the current record's "BpcmsLangInstall" value
 * @method Post             getPost()                         Returns the current record's "Post" value
 * @method BpcmsPostI18n    setPostIdpost()                   Sets the current record's "post_idpost" value
 * @method BpcmsPostI18n    setBpcmsLangInstallSignature()    Sets the current record's "bpcms_lang_install_signature" value
 * @method BpcmsPostI18n    setLangTitle()                    Sets the current record's "lang_title" value
 * @method BpcmsPostI18n    setLangDescription()              Sets the current record's "lang_description" value
 * @method BpcmsPostI18n    setLangTitleRecommended()         Sets the current record's "lang_title_recommended" value
 * @method BpcmsPostI18n    setLangTitleHeader()              Sets the current record's "lang_title_header" value
 * @method BpcmsPostI18n    setBpcmsLangInstall()             Sets the current record's "BpcmsLangInstall" value
 * @method BpcmsPostI18n    setPost()                         Sets the current record's "Post" value
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBpcmsPostI18n extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bpcms_post_i18n');
        $this->hasColumn('post_idpost', 'integer', 4, array(
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
        $this->hasColumn('lang_title', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('lang_description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('lang_title_recommended', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('lang_title_header', 'string', 255, array(
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

        $this->hasOne('Post', array(
             'local' => 'post_idpost',
             'foreign' => 'idpost'));
    }
}