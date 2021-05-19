<?php

/**
 * Configuration form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ConfigurationForm extends BaseConfigurationForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'idconfiguration' => new sfWidgetFormInputHidden(),
      'config_name'     => new sfWidgetFormInputText(array('label' => 'Nazwa zmiennej')),
      'config_option'   => new sfWidgetFormInputText(array('label' => 'Nazwa systemowa')),
      'config_value'    => new sfWidgetFormTextarea(array('label' => 'Wartość zmiennej')),
      'config_on'       => new sfWidgetFormInputCheckbox(array('label' => 'Aktywne'), array('value' => 1)),
    ));

    $this->setValidators(array(
      'idconfiguration' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idconfiguration')), 'empty_value' => $this->getObject()->get('idconfiguration'), 'required' => false)),
      'config_name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'config_option'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'config_value'    => new sfValidatorString(array('required' => false)),
      'config_on'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('configuration[%s]');	  
  }
}
