<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Stimme', 'doctrine');

/**
 * BaseStimme
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idstimme
 * @property date $date
 * @property string $description
 * @property timestamp $created_at
 * @property integer $publication
 * @property string $name
 * @property string $city
 * @property string $age
 * @property string $occasion
 * @property string $when_birthday
 * @property string $music_service
 * @property string $submit_requests
 * @property integer $webusers_idwebusers
 * @property Webusers $Webusers
 * 
 * @method integer   getIdstimme()            Returns the current record's "idstimme" value
 * @method date      getDate()                Returns the current record's "date" value
 * @method string    getDescription()         Returns the current record's "description" value
 * @method timestamp getCreatedAt()           Returns the current record's "created_at" value
 * @method integer   getPublication()         Returns the current record's "publication" value
 * @method string    getName()                Returns the current record's "name" value
 * @method string    getCity()                Returns the current record's "city" value
 * @method string    getAge()                 Returns the current record's "age" value
 * @method string    getOccasion()            Returns the current record's "occasion" value
 * @method string    getWhenBirthday()        Returns the current record's "when_birthday" value
 * @method string    getMusicService()        Returns the current record's "music_service" value
 * @method string    getSubmitRequests()      Returns the current record's "submit_requests" value
 * @method integer   getWebusersIdwebusers()  Returns the current record's "webusers_idwebusers" value
 * @method Webusers  getWebusers()            Returns the current record's "Webusers" value
 * @method Stimme    setIdstimme()            Sets the current record's "idstimme" value
 * @method Stimme    setDate()                Sets the current record's "date" value
 * @method Stimme    setDescription()         Sets the current record's "description" value
 * @method Stimme    setCreatedAt()           Sets the current record's "created_at" value
 * @method Stimme    setPublication()         Sets the current record's "publication" value
 * @method Stimme    setName()                Sets the current record's "name" value
 * @method Stimme    setCity()                Sets the current record's "city" value
 * @method Stimme    setAge()                 Sets the current record's "age" value
 * @method Stimme    setOccasion()            Sets the current record's "occasion" value
 * @method Stimme    setWhenBirthday()        Sets the current record's "when_birthday" value
 * @method Stimme    setMusicService()        Sets the current record's "music_service" value
 * @method Stimme    setSubmitRequests()      Sets the current record's "submit_requests" value
 * @method Stimme    setWebusersIdwebusers()  Sets the current record's "webusers_idwebusers" value
 * @method Stimme    setWebusers()            Sets the current record's "Webusers" value
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStimme extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('stimme');
        $this->hasColumn('idstimme', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('date', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
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
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
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
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('city', 'string', 95, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 95,
             ));
        $this->hasColumn('age', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('occasion', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('when_birthday', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('music_service', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('submit_requests', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('webusers_idwebusers', 'integer', 4, array(
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
        $this->hasOne('Webusers', array(
             'local' => 'webusers_idwebusers',
             'foreign' => 'idwebusers'));
    }
}