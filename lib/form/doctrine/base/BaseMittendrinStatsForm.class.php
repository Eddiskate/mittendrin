<?php

/**
 * MittendrinStats form base class.
 *
 * @method MittendrinStats getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMittendrinStatsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idmittendrin_stats'            => new sfWidgetFormInputHidden(),
      'ipaddr'                        => new sfWidgetFormInputText(),
      'open'                          => new sfWidgetFormInputText(),
      'close'                         => new sfWidgetFormInputText(),
      'created_at'                    => new sfWidgetFormInputText(),
      'http_user_agent'               => new sfWidgetFormInputText(),
      'city_name'                     => new sfWidgetFormInputText(),
      'country_name'                  => new sfWidgetFormInputText(),
      'radio_station_idradio_station' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RadioStation'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idmittendrin_stats'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idmittendrin_stats')), 'empty_value' => $this->getObject()->get('idmittendrin_stats'), 'required' => false)),
      'ipaddr'                        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'open'                          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'close'                         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'created_at'                    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'http_user_agent'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city_name'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'country_name'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'radio_station_idradio_station' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RadioStation'))),
    ));

    $this->widgetSchema->setNameFormat('mittendrin_stats[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MittendrinStats';
  }

}
