<?php

/**
 * BpcmsDiplomas form base class.
 *
 * @method BpcmsDiplomas getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsDiplomasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idbpcms_diplomas' => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'class'            => new sfWidgetFormInputText(),
      'title'            => new sfWidgetFormInputText(),
      'received'         => new sfWidgetFormInputText(),
      'image'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idbpcms_diplomas' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_diplomas')), 'empty_value' => $this->getObject()->get('idbpcms_diplomas'), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'class'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'received'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'image'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_diplomas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsDiplomas';
  }

}
