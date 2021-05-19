<?php

/**
 * BpcmsYtMovies form base class.
 *
 * @method BpcmsYtMovies getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBpcmsYtMoviesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idbpcms_yt_movies'                   => new sfWidgetFormInputHidden(),
      'title'                               => new sfWidgetFormInputText(),
      'description'                         => new sfWidgetFormTextarea(),
      'avatar'                              => new sfWidgetFormInputText(),
      'created_at'                          => new sfWidgetFormInputText(),
      'publication'                         => new sfWidgetFormInputText(),
      'bpcms_yt_catalog_idbpcms_yt_catalog' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BpcmsYtCatalog'), 'add_empty' => false)),
      'recommended'                         => new sfWidgetFormInputText(),
      'youtube_iframe'                      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'idbpcms_yt_movies'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_yt_movies')), 'empty_value' => $this->getObject()->get('idbpcms_yt_movies'), 'required' => false)),
      'title'                               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'                         => new sfValidatorString(array('required' => false)),
      'avatar'                              => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'created_at'                          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'publication'                         => new sfValidatorInteger(array('required' => false)),
      'bpcms_yt_catalog_idbpcms_yt_catalog' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BpcmsYtCatalog'))),
      'recommended'                         => new sfValidatorInteger(array('required' => false)),
      'youtube_iframe'                      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bpcms_yt_movies[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BpcmsYtMovies';
  }

}
