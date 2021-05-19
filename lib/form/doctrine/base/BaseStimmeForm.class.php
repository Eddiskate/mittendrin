<?php

/**
 * Stimme form base class.
 *
 * @method Stimme getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStimmeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idstimme'            => new sfWidgetFormInputHidden(),
      'date'                => new sfWidgetFormDate(),
      'description'         => new sfWidgetFormTextarea(),
      'created_at'          => new sfWidgetFormDateTime(),
      'publication'         => new sfWidgetFormInputText(),
      'name'                => new sfWidgetFormInputText(),
      'city'                => new sfWidgetFormInputText(),
      'age'                 => new sfWidgetFormInputText(),
      'occasion'            => new sfWidgetFormInputText(),
      'when_birthday'       => new sfWidgetFormInputText(),
      'music_service'       => new sfWidgetFormInputText(),
      'submit_requests'     => new sfWidgetFormInputText(),
      'webusers_idwebusers' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Webusers'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idstimme'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idstimme')), 'empty_value' => $this->getObject()->get('idstimme'), 'required' => false)),
      'date'                => new sfValidatorDate(array('required' => false)),
      'description'         => new sfValidatorString(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'publication'         => new sfValidatorInteger(array('required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'                => new sfValidatorString(array('max_length' => 95, 'required' => false)),
      'age'                 => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'occasion'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'when_birthday'       => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'music_service'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'submit_requests'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'webusers_idwebusers' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Webusers'))),
    ));

    $this->widgetSchema->setNameFormat('stimme[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stimme';
  }

}
