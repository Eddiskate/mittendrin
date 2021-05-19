<?php

/**
 * RadioStationScheduleI18n form base class.
 *
 * @method RadioStationScheduleI18n getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRadioStationScheduleI18nForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'radio_station_schedule_idradio_station_schedule' => new sfWidgetFormInputHidden(),
      'bpcms_lang_install_signature'                    => new sfWidgetFormInputHidden(),
      'lang_title'                                      => new sfWidgetFormInputText(),
      'lang_description'                                => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'radio_station_schedule_idradio_station_schedule' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('radio_station_schedule_idradio_station_schedule')), 'empty_value' => $this->getObject()->get('radio_station_schedule_idradio_station_schedule'), 'required' => false)),
      'bpcms_lang_install_signature'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('bpcms_lang_install_signature')), 'empty_value' => $this->getObject()->get('bpcms_lang_install_signature'), 'required' => false)),
      'lang_title'                                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang_description'                                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('radio_station_schedule_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RadioStationScheduleI18n';
  }

}
