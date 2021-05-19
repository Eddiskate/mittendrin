<?php

/**
 * BpcmsAlbumMonth form base class.
 *
 * @method BpcmsAlbumMonth getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsAlbumMonthForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idbpcms_album_month' => new sfWidgetFormInputHidden(),
      'title'               => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormTextarea(),
      'link'                => new sfWidgetFormInputText(),
      'publication'         => new sfWidgetFormInputText(),
      'avatar'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idbpcms_album_month' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_album_month')), 'empty_value' => $this->getObject()->get('idbpcms_album_month'), 'required' => false)),
      'title'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'         => new sfValidatorString(array('required' => false)),
      'link'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'         => new sfValidatorInteger(array('required' => false)),
      'avatar'              => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_album_month[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsAlbumMonth';
  }

}
