<?php

/**
 * GalleryCatalog form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GalleryCatalogForm extends BaseGalleryCatalogForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'idgallery_catalog' => new sfWidgetFormInputHidden(),
      'catalog_name'      => new sfWidgetFormInputText(array('label' => 'Nazwa katalogu'), array('size' => 40)),
      'no_category'       => new sfWidgetFormInputCheckbox(array('label' => 'Pomiń kategorie galerii'), array('value' => 1)),
      'publication'       => new sfWidgetFormInputCheckbox(array('label' => 'Widoczny na stronie'), array('value' => 1)),
    ));

    $this->setValidators(array(
      'idgallery_catalog' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idgallery_catalog')), 'empty_value' => $this->getObject()->get('idgallery_catalog'), 'required' => false)),
      'catalog_name'      => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'pole nie może być puste!')),
      'no_category'       => new sfValidatorInteger(array('required' => false)),
      'publication'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gallery_catalog[%s]');	  
  }
}
