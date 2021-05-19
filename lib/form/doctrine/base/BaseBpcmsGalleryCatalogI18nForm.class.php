<?php

/**
 * BpcmsGalleryCatalogI18n form base class.
 *
 * @method BpcmsGalleryCatalogI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsGalleryCatalogI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gallery_catalog_idgallery_catalog' => new sfWidgetFormInputHidden(),
      'bpcms_lang_install_signature'      => new sfWidgetFormInputHidden(),
      'lang_catalog_name'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'gallery_catalog_idgallery_catalog' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('gallery_catalog_idgallery_catalog')), 'empty_value' => $this->getObject()->get('gallery_catalog_idgallery_catalog'), 'required' => false)),
      'bpcms_lang_install_signature'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'lang_catalog_name'                 => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_gallery_catalog_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsGalleryCatalogI18n';
  }

}
