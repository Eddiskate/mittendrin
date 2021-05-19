<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PostHasPostTags', 'doctrine');

/**
 * BasePostHasPostTags
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $post_idpost
 * @property integer $post_tags_idpost_tags
 * @property Post $Post
 * @property PostTags $PostTags
 * 
 * @method integer         getPostIdpost()            Returns the current record's "post_idpost" value
 * @method integer         getPostTagsIdpostTags()    Returns the current record's "post_tags_idpost_tags" value
 * @method Post            getPost()                  Returns the current record's "Post" value
 * @method PostTags        getPostTags()              Returns the current record's "PostTags" value
 * @method PostHasPostTags setPostIdpost()            Sets the current record's "post_idpost" value
 * @method PostHasPostTags setPostTagsIdpostTags()    Sets the current record's "post_tags_idpost_tags" value
 * @method PostHasPostTags setPost()                  Sets the current record's "Post" value
 * @method PostHasPostTags setPostTags()              Sets the current record's "PostTags" value
 * 
 * @package    blackcms
 * @subpackage model
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePostHasPostTags extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('post_has_post_tags');
        $this->hasColumn('post_idpost', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('post_tags_idpost_tags', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Post', array(
             'local' => 'post_idpost',
             'foreign' => 'idpost'));

        $this->hasOne('PostTags', array(
             'local' => 'post_tags_idpost_tags',
             'foreign' => 'idpost_tags'));
    }
}