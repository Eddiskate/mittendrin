<?php

/**
 * Contact form base class.
 *
 * @method Contact getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idcontact' => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInputText(),
      'mail'      => new sfWidgetFormInputText(),
      'phone'     => new sfWidgetFormInputText(),
      'body'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'idcontact' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idcontact')), 'empty_value' => $this->getObject()->get('idcontact'), 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'body'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }

}
