<?php

/**
 * Schedule form base class.
 *
 * @method Schedule getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseScheduleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idschedule'              => new sfWidgetFormInputHidden(),
      'date'                    => new sfWidgetFormInputText(),
      'hour'                    => new sfWidgetFormInputText(),
      'publication'             => new sfWidgetFormInputText(),
      'broadcasts_idbroadcasts' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Broadcasts'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idschedule'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idschedule')), 'empty_value' => $this->getObject()->get('idschedule'), 'required' => false)),
      'date'                    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'hour'                    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'publication'             => new sfValidatorInteger(array('required' => false)),
      'broadcasts_idbroadcasts' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Broadcasts'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('schedule[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Schedule';
  }

}
