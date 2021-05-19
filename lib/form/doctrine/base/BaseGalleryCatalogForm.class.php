<?php

/**
 * GalleryCatalog form base class.
 *
 * @method GalleryCatalog getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryCatalogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idgallery_catalog' => new sfWidgetFormInputHidden(),
      'catalog_name'      => new sfWidgetFormInputText(),
      'no_category'       => new sfWidgetFormInputText(),
      'publication'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idgallery_catalog' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idgallery_catalog')), 'empty_value' => $this->getObject()->get('idgallery_catalog'), 'required' => false)),
      'catalog_name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'no_category'       => new sfValidatorInteger(array('required' => false)),
      'publication'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gallery_catalog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GalleryCatalog';
  }

}
