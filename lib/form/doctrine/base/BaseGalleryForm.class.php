<?php

/**
 * Gallery form base class.
 *
 * @method Gallery getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idgallery'                           => new sfWidgetFormInputHidden(),
      'file_name'                           => new sfWidgetFormInputText(),
      'file_title'                          => new sfWidgetFormInputText(),
      'gallery_category_idgallery_category' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCategory'), 'add_empty' => false)),
      'redirect_to_url'                     => new sfWidgetFormInputText(),
      'default_gallery'                     => new sfWidgetFormInputText(),
      'default_gallery_off'                 => new sfWidgetFormInputText(),
      'position_row'                        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idgallery'                           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idgallery')), 'empty_value' => $this->getObject()->get('idgallery'), 'required' => false)),
      'file_name'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'file_title'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'gallery_category_idgallery_category' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCategory'))),
      'redirect_to_url'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'default_gallery'                     => new sfValidatorInteger(array('required' => false)),
      'default_gallery_off'                 => new sfValidatorInteger(array('required' => false)),
      'position_row'                        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gallery[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gallery';
  }

}
