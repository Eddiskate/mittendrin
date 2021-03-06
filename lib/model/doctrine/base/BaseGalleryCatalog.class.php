<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GalleryCatalog', 'doctrine');

/**
 * BaseGalleryCatalog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idgallery_catalog
 * @property string $catalog_name
 * @property integer $no_category
 * @property integer $publication
 * @property Doctrine_Collection $BpcmsGalleryCatalogI18n
 * @property Doctrine_Collection $GalleryCategory
 * 
 * @method integer             getIdgalleryCatalog()        Returns the current record's "idgallery_catalog" value
 * @method string              getCatalogName()             Returns the current record's "catalog_name" value
 * @method integer             getNoCategory()              Returns the current record's "no_category" value
 * @method integer             getPublication()             Returns the current record's "publication" value
 * @method Doctrine_Collection getBpcmsGalleryCatalogI18n() Returns the current record's "BpcmsGalleryCatalogI18n" collection
 * @method Doctrine_Collection getGalleryCategory()         Returns the current record's "GalleryCategory" collection
 * @method GalleryCatalog      setIdgalleryCatalog()        Sets the current record's "idgallery_catalog" value
 * @method GalleryCatalog      setCatalogName()             Sets the current record's "catalog_name" value
 * @method GalleryCatalog      setNoCategory()              Sets the current record's "no_category" value
 * @method GalleryCatalog      setPublication()             Sets the current record's "publication" value
 * @method GalleryCatalog      setBpcmsGalleryCatalogI18n() Sets the current record's "BpcmsGalleryCatalogI18n" collection
 * @method GalleryCatalog      setGalleryCategory()         Sets the current record's "GalleryCategory" collection
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGalleryCatalog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('gallery_catalog');
        $this->hasColumn('idgallery_catalog', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('catalog_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('no_category', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('publication', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('BpcmsGalleryCatalogI18n', array(
             'local' => 'idgallery_catalog',
             'foreign' => 'gallery_catalog_idgallery_catalog'));

        $this->hasMany('GalleryCategory', array(
             'local' => 'idgallery_catalog',
             'foreign' => 'gallery_catalog_idgallery_catalog'));
    }
}