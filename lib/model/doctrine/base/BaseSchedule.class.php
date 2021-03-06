<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Schedule', 'doctrine');

/**
 * BaseSchedule
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idschedule
 * @property string $date
 * @property string $hour
 * @property integer $publication
 * @property integer $broadcasts_idbroadcasts
 * @property Broadcasts $Broadcasts
 * 
 * @method integer    getIdschedule()              Returns the current record's "idschedule" value
 * @method string     getDate()                    Returns the current record's "date" value
 * @method string     getHour()                    Returns the current record's "hour" value
 * @method integer    getPublication()             Returns the current record's "publication" value
 * @method integer    getBroadcastsIdbroadcasts()  Returns the current record's "broadcasts_idbroadcasts" value
 * @method Broadcasts getBroadcasts()              Returns the current record's "Broadcasts" value
 * @method Schedule   setIdschedule()              Sets the current record's "idschedule" value
 * @method Schedule   setDate()                    Sets the current record's "date" value
 * @method Schedule   setHour()                    Sets the current record's "hour" value
 * @method Schedule   setPublication()             Sets the current record's "publication" value
 * @method Schedule   setBroadcastsIdbroadcasts()  Sets the current record's "broadcasts_idbroadcasts" value
 * @method Schedule   setBroadcasts()              Sets the current record's "Broadcasts" value
 * 
 * @package    mittendrin
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSchedule extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('schedule');
        $this->hasColumn('idschedule', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('date', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('hour', 'string', 45, array(
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
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('broadcasts_idbroadcasts', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Broadcasts', array(
             'local' => 'broadcasts_idbroadcasts',
             'foreign' => 'idbroadcasts'));
    }
}