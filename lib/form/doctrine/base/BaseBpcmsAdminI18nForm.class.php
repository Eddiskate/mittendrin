<?php

/**
 * BpcmsAdminI18n form base class.
 *
 * @method BpcmsAdminI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsAdminI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
      'lang_text_value'              => new sfWidgetFormTextarea(),
      'bpcms_lang_admin_text_name'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'bpcms_lang_install_signature' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'lang_text_value'              => new sfValidatorString(array('required' => false)),
      'bpcms_lang_admin_text_name'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_admin_text_name')), 'empty_value' => $this->getObject()->get('bpcms_lang_admin_text_name'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_admin_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsAdminI18n';
  }

}
