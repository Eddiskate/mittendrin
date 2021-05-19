<?php

/**
 * Broadcasts form base class.
 *
 * @method Broadcasts getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBroadcastsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idbroadcasts'   => new sfWidgetFormInputHidden(),
      'name_pl'        => new sfWidgetFormInputText(),
      'description_pl' => new sfWidgetFormTextarea(),
      'avatar'         => new sfWidgetFormTextarea(),
      'publication'    => new sfWidgetFormInputText(),
      'description_de' => new sfWidgetFormTextarea(),
      'name_de'        => new sfWidgetFormInputText(),
      'name_cz'        => new sfWidgetFormInputText(),
      'description_cz' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idbroadcasts'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbroadcasts')), 'empty_value' => $this->getObject()->get('idbroadcasts'), 'required' => false)),
      'name_pl'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description_pl' => new sfValidatorString(array('required' => false)),
      'avatar'         => new sfValidatorString(array('required' => false)),
      'publication'    => new sfValidatorInteger(array('required' => false)),
      'description_de' => new sfValidatorString(array('required' => false)),
      'name_de'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name_cz'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'description_cz' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('broadcasts[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Broadcasts';
  }

}
