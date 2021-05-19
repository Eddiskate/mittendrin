<?php

/**
 * RadioStationSchedule form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RadioStationScheduleForm extends BaseRadioStationScheduleForm
{
    public function configure()
    {
        $sf_params = sfContext::getInstance()->getRequest();

        $this->setWidgets(array(
            'idradio_station_schedule' => new sfWidgetFormInputHidden(),
            'title' => new sfWidgetFormInputText(array('label' => 'Tytuł'), array('class' => 'span8')),
            'description' => new sfWidgetFormTextarea(array('label' => 'Opis'), array('class' => 'ckeditor')),
            'broadcast_hour' => new sfWidgetFormInputText(array('label' => 'Godzina'), array('class' => 'span1', 'placeholder' => '00:00')),
            'broadcast_day_a_week' => new sfWidgetFormChoice(array('choices' => array(1 => 'poniedziałek',2 => 'wtorek',3 => 'środa',4 => 'czwartek',5 => 'piątek',6 => 'sobota',7 => 'niedziela'))),
            'radio_station_idradio_station' => new sfWidgetFormInputHidden(),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => '1')),
        ));

        $this->setValidators(array(
            'idradio_station_schedule' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idradio_station_schedule')), 'empty_value' => $this->getObject()->get('idradio_station_schedule'), 'required' => false)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'description' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'broadcast_hour' => new sfValidatorString(array('max_length' => 45, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'broadcast_day_a_week' => new sfValidatorString(array('max_length' => 45, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'position_row' => new sfValidatorInteger(array('required' => false)),
            'radio_station_idradio_station' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RadioStation'))),
            'publication' => new sfValidatorInteger(array('required' => false)),
        ));

        $this->setDefaults(array(
            'publication' => 1,
            'radio_station_idradio_station' => $sf_params->getParameter('idradio_station')
        ));

        $this->widgetSchema->setNameFormat('radio_station_schedule[%s]');
    }
}
