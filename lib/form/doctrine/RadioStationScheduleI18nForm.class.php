<?php

/**
 * RadioStationScheduleI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RadioStationScheduleI18nForm extends BaseRadioStationScheduleI18nForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'radio_station_schedule_idradio_station_schedule' => new sfWidgetFormInputHidden(),
            'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
            'lang_title' => new sfWidgetFormInputText(array('label' => 'Tytuł'), array('class' => 'span8')),
            'lang_description' => new sfWidgetFormTextarea(array('label' => 'Opis'), array('class' => 'ckeditor')),
        ));

        $this->setValidators(array(
            'radio_station_schedule_idradio_station_schedule' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->setDefault('radio_station_schedule_idradio_station_schedule', sfContext::getInstance()->getRequest()->getParameter('idradio_station_schedule'));

        $this->widgetSchema->setNameFormat('radio_station_schedule_i18n[%s]');
    }
}
