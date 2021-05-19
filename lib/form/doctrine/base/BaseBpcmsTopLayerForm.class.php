<?php

/**
 * BpcmsTopLayer form base class.
 *
 * @method BpcmsTopLayer getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsTopLayerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idbpcms_top_layer' => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'file_name'         => new sfWidgetFormInputText(),
      'publication'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idbpcms_top_layer' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_top_layer')), 'empty_value' => $this->getObject()->get('idbpcms_top_layer'), 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'file_name'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'publication'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_top_layer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsTopLayer';
  }

}
