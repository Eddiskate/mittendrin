<?php

/**
 * BpcmsCartI18n form base class.
 *
 * @method BpcmsCartI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsCartI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cart_idcart'                  => new sfWidgetFormInputHidden(),
      'lang_cart_name'               => new sfWidgetFormInputText(),
      'lang_title_alt'               => new sfWidgetFormInputText(),
      'lang_title_page'              => new sfWidgetFormInputText(),
      'lang_cart_name_title'         => new sfWidgetFormInputText(),
      'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
      'name_url'                     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cart_idcart'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cart_idcart')), 'empty_value' => $this->getObject()->get('cart_idcart'), 'required' => false)),
      'lang_cart_name'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_title_alt'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_title_page'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_cart_name_title'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'bpcms_lang_install_signature' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'name_url'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_cart_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsCartI18n';
  }

}
