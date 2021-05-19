<?php

/**
 * BpcmsAlbumMonthI18n form base class.
 *
 * @method BpcmsAlbumMonthI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsAlbumMonthI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'album_month_idalbum_month'    => new sfWidgetFormInputHidden(),
      'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
      'lang_title'                   => new sfWidgetFormInputText(),
      'lang_description'             => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'album_month_idalbum_month'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('album_month_idalbum_month')), 'empty_value' => $this->getObject()->get('album_month_idalbum_month'), 'required' => false)),
      'bpcms_lang_install_signature' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'lang_title'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_description'             => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_album_month_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsAlbumMonthI18n';
  }

}
