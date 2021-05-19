<?php

/**
 * BpcmsPageI18n form base class.
 *
 * @method BpcmsPageI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsPageI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'page_idpage'                  => new sfWidgetFormInputHidden(),
      'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
      'lang_page_name'               => new sfWidgetFormInputText(),
      'lang_page_title'              => new sfWidgetFormInputText(),
      'lang_body'                    => new sfWidgetFormTextarea(),
      'lang_page_name_url'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'page_idpage'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('page_idpage')), 'empty_value' => $this->getObject()->get('page_idpage'), 'required' => false)),
      'bpcms_lang_install_signature' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'lang_page_name'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_page_title'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_body'                    => new sfValidatorString(array('required' => false)),
      'lang_page_name_url'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_page_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsPageI18n';
  }

}
