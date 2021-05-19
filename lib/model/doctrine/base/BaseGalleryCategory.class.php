<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GalleryCategory', 'doctrine');

/**
 * BaseGalleryCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idgallery_category
 * @property string $category_name
 * @property integer $publication
 * @property integer $gallery_catalog_idgallery_catalog
 * @property GalleryCatalog $GalleryCatalog
 * @property Doctrine_Collection $BpcmsGalleryCategoryI18n
 * @property Doctrine_Collection $Gallery
 * @property Doctrine_Collection $GalleryToPage
 * @property Doctrine_Collection $GalleryToPost
 * 
 * @method integer             getIdgalleryCategory()                 Returns the current record's "idgallery_category" value
 * @method string              getCategoryName()                      Returns the current record's "category_name" value
 * @method integer             getPublication()                       Returns the current record's "publication" value
 * @method integer             getGalleryCatalogIdgalleryCatalog()    Returns the current record's "gallery_catalog_idgallery_catalog" value
 * @method GalleryCatalog      getGalleryCatalog()                    Returns the current record's "GalleryCatalog" value
 * @method Doctrine_Collection getBpcmsGalleryCategoryI18n()          Returns the current record's "BpcmsGalleryCategoryI18n" collection
 * @method Doctrine_Collection getGallery()                           Returns the current record's "Gallery" collection
 * @method Doctrine_Collection getGalleryToPage()                     Returns the current record's "GalleryToPage" collection
 * @method Doctrine_Collection getGalleryToPost()                     Returns the current record's "GalleryToPost" collection
 * @method GalleryCategory     setIdgalleryCategory()                 Sets the current record's "idgallery_category" value
 * @method GalleryCategory     setCategoryName()                      Sets the current record's "category_name" value
 * @method GalleryCategory     setPublication()                       Sets the current record's "publication" value
 * @method GalleryCategory     setGalleryCatalogIdgalleryCatalog()    Sets the current record's "gallery_catalog_idgallery_catalog" value
 * @method GalleryCategory     setGalleryCatalog()                    Sets the current record's "GalleryCatalog" value
 * @method GalleryCategory     setBpcmsGalleryCategoryI18n()          Sets the current record's "BpcmsGalleryCategoryI18n" collection
 * @method GalleryCategory     setGallery()                           Sets the current record's "Gallery" collection
 * @method GalleryCategory     setGalleryToPage()                     Sets the current record's "GalleryToPage" collection
 * @method GalleryCategory     setGalleryToPost()                     Sets the current record's "GalleryToPost" collection
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGalleryCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('gallery_category');
        $this->hasColumn('idgallery_category', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('category_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
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
        $this->hasColumn('gallery_catalog_idgallery_catalog', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('GalleryCatalog', array(
             'local' => 'gallery_catalog_idgallery_catalog',
             'foreign' => 'idgallery_catalog'));

        $this->hasMany('BpcmsGalleryCategoryI18n', array(
             'local' => 'idgallery_category',
             'foreign' => 'gallery_category_idgallery_category'));

        $this->hasMany('Gallery', array(
             'local' => 'idgallery_category',
             'foreign' => 'gallery_category_idgallery_category'));

        $this->hasMany('GalleryToPage', array(
             'local' => 'idgallery_category',
             'foreign' => 'gallery_category_idgallery_category'));

        $this->hasMany('GalleryToPost', array(
             'local' => 'idgallery_category',
             'foreign' => 'gallery_category_idgallery_category'));
    }
}