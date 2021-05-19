<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Partnership', 'doctrine');

/**
 * BasePartnership
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idpartnership
 * @property string $logo
 * @property string $firm_name
 * @property string $logo_title
 * @property integer $publication
 * @property string $url_for_page
 * 
 * @method integer     getIdpartnership() Returns the current record's "idpartnership" value
 * @method string      getLogo()          Returns the current record's "logo" value
 * @method string      getFirmName()      Returns the current record's "firm_name" value
 * @method string      getLogoTitle()     Returns the current record's "logo_title" value
 * @method integer     getPublication()   Returns the current record's "publication" value
 * @method string      getUrlForPage()    Returns the current record's "url_for_page" value
 * @method Partnership setIdpartnership() Sets the current record's "idpartnership" value
 * @method Partnership setLogo()          Sets the current record's "logo" value
 * @method Partnership setFirmName()      Sets the current record's "firm_name" value
 * @method Partnership setLogoTitle()     Sets the current record's "logo_title" value
 * @method Partnership setPublication()   Sets the current record's "publication" value
 * @method Partnership setUrlForPage()    Sets the current record's "url_for_page" value
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePartnership extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('partnership');
        $this->hasColumn('idpartnership', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('logo', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('firm_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('logo_title', 'string', 255, array(
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
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('url_for_page', 'string', 255, array(
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
        
    }
}