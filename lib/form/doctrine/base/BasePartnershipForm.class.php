<?php

/**
 * Partnership form base class.
 *
 * @method Partnership getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePartnershipForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpartnership' => new sfWidgetFormInputHidden(),
      'logo'          => new sfWidgetFormInputText(),
      'firm_name'     => new sfWidgetFormInputText(),
      'logo_title'    => new sfWidgetFormInputText(),
      'publication'   => new sfWidgetFormInputText(),
      'url_for_page'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idpartnership' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpartnership')), 'empty_value' => $this->getObject()->get('idpartnership'), 'required' => false)),
      'logo'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'firm_name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'logo_title'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'   => new sfValidatorInteger(array('required' => false)),
      'url_for_page'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('partnership[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partnership';
  }

}
