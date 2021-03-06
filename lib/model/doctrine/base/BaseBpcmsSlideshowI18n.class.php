<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BpcmsSlideshowI18n', 'doctrine');

/**
 * BaseBpcmsSlideshowI18n
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $bpcms_lang_install_signature
 * @property integer $slideshow_idslideshow
 * @property string $lang_body_h1
 * @property string $lang_body_link
 * @property string $lang_file_name
 * @property BpcmsLangInstall $BpcmsLangInstall
 * @property Slideshow $Slideshow
 * 
 * @method string             getBpcmsLangInstallSignature()    Returns the current record's "bpcms_lang_install_signature" value
 * @method integer            getSlideshowIdslideshow()         Returns the current record's "slideshow_idslideshow" value
 * @method string             getLangBodyH1()                   Returns the current record's "lang_body_h1" value
 * @method string             getLangBodyLink()                 Returns the current record's "lang_body_link" value
 * @method string             getLangFileName()                 Returns the current record's "lang_file_name" value
 * @method BpcmsLangInstall   getBpcmsLangInstall()             Returns the current record's "BpcmsLangInstall" value
 * @method Slideshow          getSlideshow()                    Returns the current record's "Slideshow" value
 * @method BpcmsSlideshowI18n setBpcmsLangInstallSignature()    Sets the current record's "bpcms_lang_install_signature" value
 * @method BpcmsSlideshowI18n setSlideshowIdslideshow()         Sets the current record's "slideshow_idslideshow" value
 * @method BpcmsSlideshowI18n setLangBodyH1()                   Sets the current record's "lang_body_h1" value
 * @method BpcmsSlideshowI18n setLangBodyLink()                 Sets the current record's "lang_body_link" value
 * @method BpcmsSlideshowI18n setLangFileName()                 Sets the current record's "lang_file_name" value
 * @method BpcmsSlideshowI18n setBpcmsLangInstall()             Sets the current record's "BpcmsLangInstall" value
 * @method BpcmsSlideshowI18n setSlideshow()                    Sets the current record's "Slideshow" value
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBpcmsSlideshowI18n extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bpcms_slideshow_i18n');
        $this->hasColumn('bpcms_lang_install_signature', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('slideshow_idslideshow', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('lang_body_h1', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('lang_body_link', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('lang_file_name', 'string', 255, array(
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

        $this->hasOne('Slideshow', array(
             'local' => 'slideshow_idslideshow',
             'foreign' => 'idslideshow'));
    }
}