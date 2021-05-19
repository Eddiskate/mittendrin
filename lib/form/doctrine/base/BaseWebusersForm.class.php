<?php

/**
 * Webusers form base class.
 *
 * @method Webusers getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWebusersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idwebusers'            => new sfWidgetFormInputHidden(),
      'email'                 => new sfWidgetFormInputText(),
      'passwd'                => new sfWidgetFormInputText(),
      'name'                  => new sfWidgetFormInputText(),
      'lastname'              => new sfWidgetFormInputText(),
      'active'                => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormInputText(),
      'post_city_idpost_city' => new sfWidgetFormInputText(),
      'default_city'          => new sfWidgetFormInputText(),
      'default_lang'          => new sfWidgetFormInputText(),
      'reg_accept'            => new sfWidgetFormInputText(),
      'status'                => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idwebusers'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idwebusers')), 'empty_value' => $this->getObject()->get('idwebusers'), 'required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'passwd'                => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lastname'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'active'                => new sfValidatorInteger(array('required' => false)),
      'created_at'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'post_city_idpost_city' => new sfValidatorInteger(array('required' => false)),
      'default_city'          => new sfValidatorInteger(array('required' => false)),
      'default_lang'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'reg_accept'            => new sfValidatorInteger(array('required' => false)),
      'status'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('webusers[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Webusers';
  }

}
