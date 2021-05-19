<?php

/**
 * RadioStationI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RadioStationI18nForm extends BaseRadioStationI18nForm
{
  public function configure()
  {
      $this->setWidgets(array(
          'radio_station_idradio_station' => new sfWidgetFormInputHidden(),
          'bpcms_lang_install_signature'  => new sfWidgetFormInputHidden(),
          'lang_name' => new sfWidgetFormInputText(array('label' => 'Nazwa radia'), array('class' => 'span8')),
          'lang_title' => new sfWidgetFormInputText(array('label' => 'Tytuł'), array('class' => 'span8')),
          'lang_description' => new sfWidgetFormTextarea(array('label' => 'Opis stacji'), array('class' => 'span8 ckeditor')),
      ));

      $this->setValidators(array(
          'radio_station_idradio_station' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'bpcms_lang_install_signature'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'lang_name'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'lang_title'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'lang_description'              => new sfValidatorString(array('required' => false)),
      ));

      $this->setDefault('radio_station_idradio_station', sfContext::getInstance()->getRequest()->getParameter('idradio_station'));

      $this->widgetSchema->setNameFormat('radio_station_i18n[%s]');
  }
}
