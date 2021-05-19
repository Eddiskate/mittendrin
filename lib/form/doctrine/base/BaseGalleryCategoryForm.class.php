<?php

/**
 * GalleryCategory form base class.
 *
 * @method GalleryCategory getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idgallery_category'                => new sfWidgetFormInputHidden(),
      'category_name'                     => new sfWidgetFormInputText(),
      'publication'                       => new sfWidgetFormInputText(),
      'gallery_catalog_idgallery_catalog' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCatalog'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idgallery_category'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idgallery_category')), 'empty_value' => $this->getObject()->get('idgallery_category'), 'required' => false)),
      'category_name'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'                       => new sfValidatorInteger(array('required' => false)),
      'gallery_catalog_idgallery_catalog' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCatalog'))),
    ));

    $this->widgetSchema->setNameFormat('gallery_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GalleryCategory';
  }

}
