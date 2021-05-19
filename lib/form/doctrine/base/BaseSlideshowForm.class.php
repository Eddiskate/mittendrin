<?php

/**
 * Slideshow form base class.
 *
 * @method Slideshow getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSlideshowForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idslideshow'      => new sfWidgetFormInputHidden(),
      'file_name'        => new sfWidgetFormInputText(),
      'body_h1'          => new sfWidgetFormInputText(),
      'body_p'           => new sfWidgetFormInputText(),
      'publication'      => new sfWidgetFormInputText(),
      'default_position' => new sfWidgetFormInputText(),
      'body_link'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idslideshow'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idslideshow')), 'empty_value' => $this->getObject()->get('idslideshow'), 'required' => false)),
      'file_name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body_h1'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body_p'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'      => new sfValidatorInteger(array('required' => false)),
      'default_position' => new sfValidatorInteger(array('required' => false)),
      'body_link'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slideshow[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slideshow';
  }

}
