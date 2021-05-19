<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BpcmsGalleryI18n', 'doctrine');

/**
 * BaseBpcmsGalleryI18n
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $gallery_idgallery
 * @property string $bpcms_lang_install_signature
 * @property string $lang_file_title
 * @property BpcmsLangInstall $BpcmsLangInstall
 * @property Gallery $Gallery
 * 
 * @method integer          getGalleryIdgallery()             Returns the current record's "gallery_idgallery" value
 * @method string           getBpcmsLangInstallSignature()    Returns the current record's "bpcms_lang_install_signature" value
 * @method string           getLangFileTitle()                Returns the current record's "lang_file_title" value
 * @method BpcmsLangInstall getBpcmsLangInstall()             Returns the current record's "BpcmsLangInstall" value
 * @method Gallery          getGallery()                      Returns the current record's "Gallery" value
 * @method BpcmsGalleryI18n setGalleryIdgallery()             Sets the current record's "gallery_idgallery" value
 * @method BpcmsGalleryI18n setBpcmsLangInstallSignature()    Sets the current record's "bpcms_lang_install_signature" value
 * @method BpcmsGalleryI18n setLangFileTitle()                Sets the current record's "lang_file_title" value
 * @method BpcmsGalleryI18n setBpcmsLangInstall()             Sets the current record's "BpcmsLangInstall" value
 * @method BpcmsGalleryI18n setGallery()                      Sets the current record's "Gallery" value
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBpcmsGalleryI18n extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bpcms_gallery_i18n');
        $this->hasColumn('gallery_idgallery', 'integer', 4, array(
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
        $this->hasColumn('lang_file_title', 'string', 255, array(
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

        $this->hasOne('Gallery', array(
             'local' => 'gallery_idgallery',
             'foreign' => 'idgallery'));
    }
}