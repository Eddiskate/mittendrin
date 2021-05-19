<?php

/**
 * BpcmsPlaylist form base class.
 *
 * @method BpcmsPlaylist getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsPlaylistForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idbpcms_playlist' => new sfWidgetFormInputHidden(),
      'page_idpage'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => false)),
      'plate_title'      => new sfWidgetFormInputText(),
      'plate_artist'     => new sfWidgetFormInputText(),
      'plate_file'       => new sfWidgetFormInputText(),
      'plate_cover'      => new sfWidgetFormInputText(),
      'plate_buy_link'   => new sfWidgetFormInputText(),
      'publication'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idbpcms_playlist' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_playlist')), 'empty_value' => $this->getObject()->get('idbpcms_playlist'), 'required' => false)),
      'page_idpage'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Page'))),
      'plate_title'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'plate_artist'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'plate_file'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'plate_cover'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'plate_buy_link'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_playlist[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsPlaylist';
  }

}
