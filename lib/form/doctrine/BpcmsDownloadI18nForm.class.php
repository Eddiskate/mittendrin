<?php

/**
 * BpcmsDownloadI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsDownloadI18nForm extends BaseBpcmsDownloadI18nForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'download_iddownload'          => new sfWidgetFormInputHidden(),
      'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
      'lang_title'                   => new sfWidgetFormInputText(array('label' => 'Nazwa pliku')),
    ));

    $this->setValidators(array(
      'download_iddownload'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'lang_title'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->setDefault('download_iddownload', sfContext::getInstance()->getRequest()->getParameter('iddownload'));

    $this->widgetSchema->setNameFormat('bpcms_download_i18n[%s]');      
  }
}
