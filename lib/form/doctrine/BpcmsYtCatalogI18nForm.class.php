<?php

/**
 * BpcmsYtCatalogI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsYtCatalogI18nForm extends BaseBpcmsYtCatalogI18nForm
{
  public function configure()
  {
      $this->setWidgets(array(
          'bpcms_yt_catalog_idbpcms_yt_catalog' => new sfWidgetFormInputHidden(),
          'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
          'lang_name' => new sfWidgetFormInputText(array('label' => 'Nazwa katalogu')),
      ));

      $this->setValidators(array(
          'bpcms_yt_catalog_idbpcms_yt_catalog' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'lang_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      ));

      $this->setDefault('bpcms_yt_catalog_idbpcms_yt_catalog', sfContext::getInstance()->getRequest()->getParameter('idbpcms_yt_catalog'));

      $this->widgetSchema->setNameFormat('bpcms_yt_catalog_i18n[%s]');
  }
}
