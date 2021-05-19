<?php

/**
 * GalleryToPage form base class.
 *
 * @method GalleryToPage getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryToPageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'page_idpage'                         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => false)),
      'gallery_category_idgallery_category' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCategory'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'page_idpage'                         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Page'))),
      'gallery_category_idgallery_category' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCategory'))),
    ));

    $this->widgetSchema->setNameFormat('gallery_to_page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GalleryToPage';
  }

}
