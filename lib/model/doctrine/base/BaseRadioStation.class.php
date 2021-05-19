<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RadioStation', 'doctrine');

/**
 * BaseRadioStation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idradio_station
 * @property string $name
 * @property string $title
 * @property string $description
 * @property integer $publication
 * @property integer $position_row
 * @property string $avatar
 * @property Doctrine_Collection $MittendrinStats
 * @property Doctrine_Collection $RadioStationI18n
 * @property Doctrine_Collection $RadioStationSchedule
 * 
 * @method integer             getIdradioStation()       Returns the current record's "idradio_station" value
 * @method string              getName()                 Returns the current record's "name" value
 * @method string              getTitle()                Returns the current record's "title" value
 * @method string              getDescription()          Returns the current record's "description" value
 * @method integer             getPublication()          Returns the current record's "publication" value
 * @method integer             getPositionRow()          Returns the current record's "position_row" value
 * @method string              getAvatar()               Returns the current record's "avatar" value
 * @method Doctrine_Collection getMittendrinStats()      Returns the current record's "MittendrinStats" collection
 * @method Doctrine_Collection getRadioStationI18n()     Returns the current record's "RadioStationI18n" collection
 * @method Doctrine_Collection getRadioStationSchedule() Returns the current record's "RadioStationSchedule" collection
 * @method RadioStation        setIdradioStation()       Sets the current record's "idradio_station" value
 * @method RadioStation        setName()                 Sets the current record's "name" value
 * @method RadioStation        setTitle()                Sets the current record's "title" value
 * @method RadioStation        setDescription()          Sets the current record's "description" value
 * @method RadioStation        setPublication()          Sets the current record's "publication" value
 * @method RadioStation        setPositionRow()          Sets the current record's "position_row" value
 * @method RadioStation        setAvatar()               Sets the current record's "avatar" value
 * @method RadioStation        setMittendrinStats()      Sets the current record's "MittendrinStats" collection
 * @method RadioStation        setRadioStationI18n()     Sets the current record's "RadioStationI18n" collection
 * @method RadioStation        setRadioStationSchedule() Sets the current record's "RadioStationSchedule" collection
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRadioStation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('radio_station');
        $this->hasColumn('idradio_station', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
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
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
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
        $this->hasColumn('position_row', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('avatar', 'string', 45, array(
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
        $this->hasMany('MittendrinStats', array(
             'local' => 'idradio_station',
             'foreign' => 'radio_station_idradio_station'));

        $this->hasMany('RadioStationI18n', array(
             'local' => 'idradio_station',
             'foreign' => 'radio_station_idradio_station'));

        $this->hasMany('RadioStationSchedule', array(
             'local' => 'idradio_station',
             'foreign' => 'radio_station_idradio_station'));
    }
}