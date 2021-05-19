<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Users', 'doctrine');

/**
 * BaseUsers
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idusers
 * @property string $name
 * @property string $lastname
 * @property string $mail
 * @property integer $active
 * @property string $passwd
 * @property Doctrine_Collection $Post
 * 
 * @method integer             getIdusers()  Returns the current record's "idusers" value
 * @method string              getName()     Returns the current record's "name" value
 * @method string              getLastname() Returns the current record's "lastname" value
 * @method string              getMail()     Returns the current record's "mail" value
 * @method integer             getActive()   Returns the current record's "active" value
 * @method string              getPasswd()   Returns the current record's "passwd" value
 * @method Doctrine_Collection getPost()     Returns the current record's "Post" collection
 * @method Users               setIdusers()  Sets the current record's "idusers" value
 * @method Users               setName()     Sets the current record's "name" value
 * @method Users               setLastname() Sets the current record's "lastname" value
 * @method Users               setMail()     Sets the current record's "mail" value
 * @method Users               setActive()   Sets the current record's "active" value
 * @method Users               setPasswd()   Sets the current record's "passwd" value
 * @method Users               setPost()     Sets the current record's "Post" collection
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUsers extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('users');
        $this->hasColumn('idusers', 'integer', 4, array(
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
        $this->hasColumn('lastname', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('mail', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('active', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('passwd', 'string', 255, array(
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
        $this->hasMany('Post', array(
             'local' => 'idusers',
             'foreign' => 'users_idusers'));
    }
}