<?php

/**
 * BpcmsYtMoviesI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsYtMoviesI18nForm extends BaseBpcmsYtMoviesI18nForm
{
  public function configure()
  {
      $this->setWidgets(array(
          'bpcms_yt_movies_idbpcms_yt_movies' => new sfWidgetFormInputHidden(),
          'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
          'lang_title' => new sfWidgetFormInputText(array('label' => 'Tytuł postu')),
          'lang_description' => new sfWidgetFormTextarea(array('label' => 'Opis'), array('class' => 'ckeditor')),
      ));

      $this->setValidators(array(
          'bpcms_yt_movies_idbpcms_yt_movies' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'lang_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'lang_description' => new sfValidatorString(array('required' => false)),
      ));

      $this->setDefault('bpcms_yt_movies_idbpcms_yt_movies', sfContext::getInstance()->getRequest()->getParameter('idbpcms_yt_movies'));

      $this->widgetSchema->setNameFormat('bpcms_yt_movies_i18n[%s]');
  }
}
