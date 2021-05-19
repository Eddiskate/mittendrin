<?php

/**
 * Boxes form base class.
 *
 * @method Boxes getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBoxesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idboxes'       => new sfWidgetFormInputHidden(),
      'title'         => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'image'         => new sfWidgetFormInputText(),
      'url_for_page'  => new sfWidgetFormInputText(),
      'publication'   => new sfWidgetFormInputText(),
      'position_row'  => new sfWidgetFormInputText(),
      'target'        => new sfWidgetFormInputText(),
      'show_homepage' => new sfWidgetFormInputText(),
      'show_page'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idboxes'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idboxes')), 'empty_value' => $this->getObject()->get('idboxes'), 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'   => new sfValidatorString(array('required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url_for_page'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'   => new sfValidatorInteger(array('required' => false)),
      'position_row'  => new sfValidatorInteger(array('required' => false)),
      'target'        => new sfValidatorInteger(array('required' => false)),
      'show_homepage' => new sfValidatorInteger(array('required' => false)),
      'show_page'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('boxes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Boxes';
  }

}
