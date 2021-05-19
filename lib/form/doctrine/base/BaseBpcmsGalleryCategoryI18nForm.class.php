<?php

/**
 * BpcmsGalleryCategoryI18n form base class.
 *
 * @method BpcmsGalleryCategoryI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsGalleryCategoryI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gallery_category_idgallery_category' => new sfWidgetFormInputHidden(),
      'bpcms_lang_install_signature'        => new sfWidgetFormInputHidden(),
      'lang_category_name'                  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'gallery_category_idgallery_category' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('gallery_category_idgallery_category')), 'empty_value' => $this->getObject()->get('gallery_category_idgallery_category'), 'required' => false)),
      'bpcms_lang_install_signature'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'lang_category_name'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_gallery_category_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsGalleryCategoryI18n';
  }

}
