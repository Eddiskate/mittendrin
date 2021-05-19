<?php

/**
 * Users form base class.
 *
 * @method Users getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idusers'  => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'lastname' => new sfWidgetFormInputText(),
      'mail'     => new sfWidgetFormInputText(),
      'active'   => new sfWidgetFormInputText(),
      'passwd'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idusers'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idusers')), 'empty_value' => $this->getObject()->get('idusers'), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lastname' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'active'   => new sfValidatorInteger(array('required' => false)),
      'passwd'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }

}
