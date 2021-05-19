<?php

/**
 * GalleryCategory form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GalleryCategoryForm extends BaseGalleryCategoryForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'idgallery_category'                => new sfWidgetFormInputHidden(),
      'category_name'                     => new sfWidgetFormInputText(array('label' => 'Nazwa kategori')),
      'publication'                       => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
    ));

    $this->setValidators(array(
      'idgallery_category'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idgallery_category')), 'empty_value' => $this->getObject()->get('idgallery_category'), 'required' => false)),
      'category_name'                     => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'publication'                       => new sfValidatorInteger(array('required' => false)),
      'gallery_catalog_idgallery_catalog' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCatalog'))),
    ));

    $this->widgetSchema->setNameFormat('gallery_category[%s]');      
  }
}
