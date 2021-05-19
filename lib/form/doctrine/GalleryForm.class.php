<?php

/**
 * Gallery form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GalleryForm extends BaseGalleryForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'idgallery'                           => new sfWidgetFormInputHidden(),
      'file_name'                           => new sfWidgetFormInputFile(array('label' => 'Zdjęcie')),
      'file_title'                          => new sfWidgetFormInputText(array('label' => 'Tytuł zdjęcia'), array('class' => 'input-xxlarge')),
      'gallery_category_idgallery_category' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCategory'), 'add_empty' => false)),
      'redirect_to_url'                     => new sfWidgetFormInputText(array('label' => 'Link zewnetrzny'), array('placeholder' => 'http://nazwa.strony', 'class' => 'input-xxlarge')),        
    ));

    $this->setValidators(array(
      'idgallery'                           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idgallery')), 'empty_value' => $this->getObject()->get('idgallery'), 'required' => false)),
      'file_name'                           => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir').'/images/gallery/', 'required' => false)),
      'file_title'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'gallery_category_idgallery_category' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GalleryCategory'))),
      'redirect_to_url'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),        
    ));

    $this->widgetSchema->setNameFormat('gallery[%s]');	  
  }
}
