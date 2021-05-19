<?php

/**
 * RadioStationSchedule form base class.
 *
 * @method RadioStationSchedule getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRadioStationScheduleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idradio_station_schedule'      => new sfWidgetFormInputHidden(),
      'title'                         => new sfWidgetFormInputText(),
      'description'                   => new sfWidgetFormInputText(),
      'broadcast_hour'                => new sfWidgetFormInputText(),
      'broadcast_day_a_week'          => new sfWidgetFormInputText(),
      'position_row'                  => new sfWidgetFormInputText(),
      'radio_station_idradio_station' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RadioStation'), 'add_empty' => false)),
      'publication'                   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idradio_station_schedule'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idradio_station_schedule')), 'empty_value' => $this->getObject()->get('idradio_station_schedule'), 'required' => false)),
      'title'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'broadcast_hour'                => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'broadcast_day_a_week'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'position_row'                  => new sfValidatorInteger(array('required' => false)),
      'radio_station_idradio_station' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RadioStation'))),
      'publication'                   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('radio_station_schedule[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RadioStationSchedule';
  }

}
