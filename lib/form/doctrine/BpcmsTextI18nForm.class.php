<?php

/**
 * BpcmsTextI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsTextI18nForm extends BaseBpcmsTextI18nForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
      'lang_text_value'              => new sfWidgetFormTextarea(array('label' => 'Wartość taga')),
      'bpcms_lang_text_text_name'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BpcmsLangText'), 'add_empty' => false, 'label' => 'Nazwa systemowa')),
    ));

    $this->setValidators(array(
      'bpcms_lang_install_signature' => new sfValidatorString(array('required' => false)),
      'lang_text_value'              => new sfValidatorString(array('required' => false)),
      'bpcms_lang_text_text_name'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_text_i18n[%s]');      
  }
}
