<?php

/**
 * Configuration form base class.
 *
 * @method Configuration getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConfigurationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idconfiguration' => new sfWidgetFormInputHidden(),
      'config_name'     => new sfWidgetFormInputText(),
      'config_option'   => new sfWidgetFormInputText(),
      'config_value'    => new sfWidgetFormTextarea(),
      'config_on'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idconfiguration' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idconfiguration')), 'empty_value' => $this->getObject()->get('idconfiguration'), 'required' => false)),
      'config_name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'config_option'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'config_value'    => new sfValidatorString(array('required' => false)),
      'config_on'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('configuration[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configuration';
  }

}
