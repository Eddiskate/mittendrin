<?php

/**
 * BpcmsDownloadCatalogI18n form base class.
 *
 * @method BpcmsDownloadCatalogI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsDownloadCatalogI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'download_catalog_iddownload_catalog' => new sfWidgetFormInputHidden(),
      'bpcms_lang_install_signature'        => new sfWidgetFormInputHidden(),
      'lang_name'                           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'download_catalog_iddownload_catalog' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('download_catalog_iddownload_catalog')), 'empty_value' => $this->getObject()->get('download_catalog_iddownload_catalog'), 'required' => false)),
      'bpcms_lang_install_signature'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'lang_name'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_download_catalog_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsDownloadCatalogI18n';
  }

}
