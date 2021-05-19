<?php

/**
 * Stimme form.
 *
 * @package    mittendrin
 * @subpackage form
 * @author     Damian Kania@eddi
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StimmeForm extends BaseStimmeForm {

    public function configure() {
        $this->setWidgets(array(
            'idstimme' => new sfWidgetFormInputHidden(),
            'description' => new sfWidgetFormTextarea(array('label' => LANG_STIMME_FORM_LABEL_DESCRIPTION), array('rows' => 10, 'cols' => 35)),
            'created_at' => new sfWidgetFormInputHidden(array('default' => date('Y-m-d h:m:s'))),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Opublikowane')),
            'webusers_idwebusers' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Webusers'), 'add_empty' => false)),
            'name' => new sfWidgetFormInputText(array('label' => LANG_STIMME_FORM_LABEL_NAME)),
            'city' => new sfWidgetFormInputText(array('label' => LANG_STIMME_FORM_LABEL_PLACE_OF_RESIDENCE)),
            'age' => new sfWidgetFormInputText(array('label' => 'Wiek')),
            'occasion' => new sfWidgetFormInputText(array('label' => LANG_STIMME_ON_THE_OCCASION_OF)),
            'when_birthday' => new sfWidgetFormInputText(array('label' => 'Kiedy')),
            'music_service' => new sfWidgetFormInputText(array('label' => LANG_STIMME_FORM_LABEL_MUSIC_SERVICE), array('size' => 40)),
            'submit_requests' => new sfWidgetFormInputText(array('label' => LANG_STIMME_FORM_LABEL_SUBMIT_REQUESTS)),
        ));

        $error = '<span class="error">Uzupełnij pole!</span>';

        $this->setValidators(array(
            'idstimme' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idstimme')), 'empty_value' => $this->getObject()->get('idstimme'), 'required' => false)),
            'date' => new sfValidatorDate(array('required' => true), array('required' => $error)),
            'description' => new sfValidatorString(array('required' => true), array('required' => $error)),
            'created_at' => new sfValidatorDateTime(array('required' => false)),
            'publication' => new sfValidatorString(array('required' => true), array('required' => 'Aby dodać pozdrowienia musisz akceptować regulamin!')),
            'webusers_idwebusers' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Webusers'))),
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => $error)),
            'city' => new sfValidatorString(array('max_length' => 95, 'required' => true), array('required' => $error)),
            'age' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'occasion' => new sfValidatorString(array('max_length' => 45, 'required' => true), array('required' => $error)),
            'when_birthday' => new sfValidatorString(array('max_length' => 45, 'required' => false), array('required' => $error)),
            'music_service' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'submit_requests' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => $error)),
        ));

        $this->widgetSchema->setNameFormat('stimme[%s]');
    }

}
