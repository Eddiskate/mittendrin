<?php

/**
 * BpcmsLangText form base class.
 *
 * @method BpcmsLangText getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsLangTextForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'text_name'  => new sfWidgetFormInputHidden(),
      'text_value' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'text_name'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('text_name')), 'empty_value' => $this->getObject()->get('text_name'), 'required' => false)),
      'text_value' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_lang_text[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsLangText';
  }

}
