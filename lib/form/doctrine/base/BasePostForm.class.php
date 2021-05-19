<?php

/**
 * Post form base class.
 *
 * @method Post getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpost'                      => new sfWidgetFormInputHidden(),
      'title'                       => new sfWidgetFormInputText(),
      'description'                 => new sfWidgetFormTextarea(),
      'created_at'                  => new sfWidgetFormInputText(),
      'archiv'                      => new sfWidgetFormInputText(),
      'newsletter'                  => new sfWidgetFormInputText(),
      'avatar'                      => new sfWidgetFormInputText(),
      'post_catalog_idpost_catalog' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PostCatalog'), 'add_empty' => false)),
      'users_idusers'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Users'), 'add_empty' => false)),
      'column_type'                 => new sfWidgetFormInputText(),
      'recommended'                 => new sfWidgetFormInputText(),
      'title_header'                => new sfWidgetFormInputText(),
      'title_recommended'           => new sfWidgetFormInputText(),
      'publication'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idpost'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpost')), 'empty_value' => $this->getObject()->get('idpost'), 'required' => false)),
      'title'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'                 => new sfValidatorString(array('required' => false)),
      'created_at'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'archiv'                      => new sfValidatorInteger(array('required' => false)),
      'newsletter'                  => new sfValidatorInteger(array('required' => false)),
      'avatar'                      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'post_catalog_idpost_catalog' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PostCatalog'))),
      'users_idusers'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Users'))),
      'column_type'                 => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'recommended'                 => new sfValidatorInteger(array('required' => false)),
      'title_header'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title_recommended'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'                 => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }

}
