<?php

/**
 * BpcmsSlideshowI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsSlideshowI18nForm extends BaseBpcmsSlideshowI18nForm
{
  public function configure()
  {
      $this->setWidgets(array(
          'slideshow_idslideshow' => new sfWidgetFormInputHidden(),
          'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
          'lang_file_name' => new sfWidgetFormInputFile(array('label' => 'Wybierz plik'), array('class' => 'span8')),
          'lang_body_h1' => new sfWidgetFormInputText(array('label' => 'Tytuł pozycji'), array('class' => 'span8')),
          'lang_body_link' => new sfWidgetFormInputText(array('label' => 'Link do strony'), array('class' => 'span8')),
      ));

      $this->setValidators(array(
          'slideshow_idslideshow' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'lang_file_name' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/images/slideshow/', 'required' => false)),
          'lang_body_h1' => new sfValidatorString(array('required' => false)),
          'lang_body_link' => new sfValidatorString(array('required' => false)),
      ));

      $this->setDefault('slideshow_idslideshow', sfContext::getInstance()->getRequest()->getParameter('idslideshow'));

      $this->widgetSchema->setNameFormat('bpcms_slideshow_i18n[%s]');
  }
}
