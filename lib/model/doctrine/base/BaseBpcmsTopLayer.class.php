<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BpcmsTopLayer', 'doctrine');

/**
 * BaseBpcmsTopLayer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idbpcms_top_layer
 * @property string $name
 * @property string $file_name
 * @property integer $publication
 * 
 * @method integer       getIdbpcmsTopLayer()   Returns the current record's "idbpcms_top_layer" value
 * @method string        getName()              Returns the current record's "name" value
 * @method string        getFileName()          Returns the current record's "file_name" value
 * @method integer       getPublication()       Returns the current record's "publication" value
 * @method BpcmsTopLayer setIdbpcmsTopLayer()   Sets the current record's "idbpcms_top_layer" value
 * @method BpcmsTopLayer setName()              Sets the current record's "name" value
 * @method BpcmsTopLayer setFileName()          Sets the current record's "file_name" value
 * @method BpcmsTopLayer setPublication()       Sets the current record's "publication" value
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBpcmsTopLayer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bpcms_top_layer');
        $this->hasColumn('idbpcms_top_layer', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('file_name', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
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
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}