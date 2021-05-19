<?php

/**
 * RadioStation form base class.
 *
 * @method RadioStation getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRadioStationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idradio_station' => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'title'           => new sfWidgetFormInputText(),
      'description'     => new sfWidgetFormTextarea(),
      'publication'     => new sfWidgetFormInputText(),
      'position_row'    => new sfWidgetFormInputText(),
      'avatar'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idradio_station' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idradio_station')), 'empty_value' => $this->getObject()->get('idradio_station'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'     => new sfValidatorString(array('required' => false)),
      'publication'     => new sfValidatorInteger(array('required' => false)),
      'position_row'    => new sfValidatorInteger(array('required' => false)),
      'avatar'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('radio_station[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RadioStation';
  }

}
