<?php

/**
 * BpcmsSlideshowI18n form base class.
 *
 * @method BpcmsSlideshowI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsSlideshowI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
      'slideshow_idslideshow'        => new sfWidgetFormInputHidden(),
      'lang_body_h1'                 => new sfWidgetFormInputText(),
      'lang_body_link'               => new sfWidgetFormInputText(),
      'lang_file_name'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'bpcms_lang_install_signature' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'slideshow_idslideshow'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('slideshow_idslideshow')), 'empty_value' => $this->getObject()->get('slideshow_idslideshow'), 'required' => false)),
      'lang_body_h1'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_body_link'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_file_name'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_slideshow_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsSlideshowI18n';
  }

}
