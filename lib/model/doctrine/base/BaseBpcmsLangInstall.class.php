<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BpcmsLangInstall', 'doctrine');

/**
 * BaseBpcmsLangInstall
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $signature
 * @property integer $active
 * @property integer $publication
 * @property string $lang_icons
 * @property Doctrine_Collection $BpcmsAlbumMonthI18n
 * @property Doctrine_Collection $BpcmsCartI18n
 * @property Doctrine_Collection $BpcmsDownloadCatalogI18n
 * @property Doctrine_Collection $BpcmsDownloadI18n
 * @property Doctrine_Collection $BpcmsGalleryCatalogI18n
 * @property Doctrine_Collection $BpcmsGalleryCategoryI18n
 * @property Doctrine_Collection $BpcmsGalleryI18n
 * @property Doctrine_Collection $BpcmsPageI18n
 * @property Doctrine_Collection $BpcmsPostCatalogI18n
 * @property Doctrine_Collection $BpcmsPostI18n
 * @property Doctrine_Collection $BpcmsSlideshowI18n
 * @property Doctrine_Collection $BpcmsTextI18n
 * @property Doctrine_Collection $BpcmsYtCatalogI18n
 * @property Doctrine_Collection $BpcmsYtMoviesI18n
 * @property Doctrine_Collection $RadioStationI18n
 * @property Doctrine_Collection $RadioStationScheduleI18n
 * 
 * @method string              getName()                     Returns the current record's "name" value
 * @method string              getSignature()                Returns the current record's "signature" value
 * @method integer             getActive()                   Returns the current record's "active" value
 * @method integer             getPublication()              Returns the current record's "publication" value
 * @method string              getLangIcons()                Returns the current record's "lang_icons" value
 * @method Doctrine_Collection getBpcmsAlbumMonthI18n()      Returns the current record's "BpcmsAlbumMonthI18n" collection
 * @method Doctrine_Collection getBpcmsCartI18n()            Returns the current record's "BpcmsCartI18n" collection
 * @method Doctrine_Collection getBpcmsDownloadCatalogI18n() Returns the current record's "BpcmsDownloadCatalogI18n" collection
 * @method Doctrine_Collection getBpcmsDownloadI18n()        Returns the current record's "BpcmsDownloadI18n" collection
 * @method Doctrine_Collection getBpcmsGalleryCatalogI18n()  Returns the current record's "BpcmsGalleryCatalogI18n" collection
 * @method Doctrine_Collection getBpcmsGalleryCategoryI18n() Returns the current record's "BpcmsGalleryCategoryI18n" collection
 * @method Doctrine_Collection getBpcmsGalleryI18n()         Returns the current record's "BpcmsGalleryI18n" collection
 * @method Doctrine_Collection getBpcmsPageI18n()            Returns the current record's "BpcmsPageI18n" collection
 * @method Doctrine_Collection getBpcmsPostCatalogI18n()     Returns the current record's "BpcmsPostCatalogI18n" collection
 * @method Doctrine_Collection getBpcmsPostI18n()            Returns the current record's "BpcmsPostI18n" collection
 * @method Doctrine_Collection getBpcmsSlideshowI18n()       Returns the current record's "BpcmsSlideshowI18n" collection
 * @method Doctrine_Collection getBpcmsTextI18n()            Returns the current record's "BpcmsTextI18n" collection
 * @method Doctrine_Collection getBpcmsYtCatalogI18n()       Returns the current record's "BpcmsYtCatalogI18n" collection
 * @method Doctrine_Collection getBpcmsYtMoviesI18n()        Returns the current record's "BpcmsYtMoviesI18n" collection
 * @method Doctrine_Collection getRadioStationI18n()         Returns the current record's "RadioStationI18n" collection
 * @method Doctrine_Collection getRadioStationScheduleI18n() Returns the current record's "RadioStationScheduleI18n" collection
 * @method BpcmsLangInstall    setName()                     Sets the current record's "name" value
 * @method BpcmsLangInstall    setSignature()                Sets the current record's "signature" value
 * @method BpcmsLangInstall    setActive()                   Sets the current record's "active" value
 * @method BpcmsLangInstall    setPublication()              Sets the current record's "publication" value
 * @method BpcmsLangInstall    setLangIcons()                Sets the current record's "lang_icons" value
 * @method BpcmsLangInstall    setBpcmsAlbumMonthI18n()      Sets the current record's "BpcmsAlbumMonthI18n" collection
 * @method BpcmsLangInstall    setBpcmsCartI18n()            Sets the current record's "BpcmsCartI18n" collection
 * @method BpcmsLangInstall    setBpcmsDownloadCatalogI18n() Sets the current record's "BpcmsDownloadCatalogI18n" collection
 * @method BpcmsLangInstall    setBpcmsDownloadI18n()        Sets the current record's "BpcmsDownloadI18n" collection
 * @method BpcmsLangInstall    setBpcmsGalleryCatalogI18n()  Sets the current record's "BpcmsGalleryCatalogI18n" collection
 * @method BpcmsLangInstall    setBpcmsGalleryCategoryI18n() Sets the current record's "BpcmsGalleryCategoryI18n" collection
 * @method BpcmsLangInstall    setBpcmsGalleryI18n()         Sets the current record's "BpcmsGalleryI18n" collection
 * @method BpcmsLangInstall    setBpcmsPageI18n()            Sets the current record's "BpcmsPageI18n" collection
 * @method BpcmsLangInstall    setBpcmsPostCatalogI18n()     Sets the current record's "BpcmsPostCatalogI18n" collection
 * @method BpcmsLangInstall    setBpcmsPostI18n()            Sets the current record's "BpcmsPostI18n" collection
 * @method BpcmsLangInstall    setBpcmsSlideshowI18n()       Sets the current record's "BpcmsSlideshowI18n" collection
 * @method BpcmsLangInstall    setBpcmsTextI18n()            Sets the current record's "BpcmsTextI18n" collection
 * @method BpcmsLangInstall    setBpcmsYtCatalogI18n()       Sets the current record's "BpcmsYtCatalogI18n" collection
 * @method BpcmsLangInstall    setBpcmsYtMoviesI18n()        Sets the current record's "BpcmsYtMoviesI18n" collection
 * @method BpcmsLangInstall    setRadioStationI18n()         Sets the current record's "RadioStationI18n" collection
 * @method BpcmsLangInstall    setRadioStationScheduleI18n() Sets the current record's "RadioStationScheduleI18n" collection
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBpcmsLangInstall extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bpcms_lang_install');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('signature', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('active', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('publication', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('lang_icons', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('BpcmsAlbumMonthI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsCartI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsDownloadCatalogI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsDownloadI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsGalleryCatalogI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsGalleryCategoryI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsGalleryI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsPageI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsPostCatalogI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsPostI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsSlideshowI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsTextI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsYtCatalogI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('BpcmsYtMoviesI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('RadioStationI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));

        $this->hasMany('RadioStationScheduleI18n', array(
             'local' => 'signature',
             'foreign' => 'bpcms_lang_install_signature'));
    }
}