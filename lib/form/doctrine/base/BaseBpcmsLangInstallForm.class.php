<?php

/**
 * BpcmsLangInstall form base class.
 *
 * @method BpcmsLangInstall getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsLangInstallForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormInputText(),
      'signature'   => new sfWidgetFormInputHidden(),
      'active'      => new sfWidgetFormInputText(),
      'publication' => new sfWidgetFormInputText(),
      'lang_icons'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'signature'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('signature')), 'empty_value' => $this->getObject()->get('signature'), 'required' => false)),
      'active'      => new sfValidatorInteger(array('required' => false)),
      'publication' => new sfValidatorInteger(array('required' => false)),
      'lang_icons'  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_lang_install[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsLangInstall';
  }

}
