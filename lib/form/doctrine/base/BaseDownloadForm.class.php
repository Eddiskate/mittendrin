<?php

/**
 * Download form base class.
 *
 * @method Download getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDownloadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'iddownload'                          => new sfWidgetFormInputHidden(),
      'file_name'                           => new sfWidgetFormInputText(),
      'title'                               => new sfWidgetFormInputText(),
      'publication'                         => new sfWidgetFormInputText(),
      'download_catalog_iddownload_catalog' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DownloadCatalog'), 'add_empty' => false)),
      'url_to_file'                         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'iddownload'                          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('iddownload')), 'empty_value' => $this->getObject()->get('iddownload'), 'required' => false)),
      'file_name'                           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'title'                               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'                         => new sfValidatorInteger(array('required' => false)),
      'download_catalog_iddownload_catalog' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DownloadCatalog'))),
      'url_to_file'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('download[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Download';
  }

}
