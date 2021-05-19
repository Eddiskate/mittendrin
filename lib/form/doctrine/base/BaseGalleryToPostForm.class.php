<?php

/**
 * GalleryToPost form base class.
 *
 * @method GalleryToPost getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryToPostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'post_idpost'                         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Post'), 'add_empty' => false)),
      'gallery_category_idgallery_category' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCategory'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'post_idpost'                         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Post'))),
      'gallery_category_idgallery_category' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCategory'))),
    ));

    $this->widgetSchema->setNameFormat('gallery_to_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GalleryToPost';
  }

}
