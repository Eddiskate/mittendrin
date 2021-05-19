<?php

/**
 * DownloadCatalog form base class.
 *
 * @method DownloadCatalog getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDownloadCatalogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'iddownload_catalog' => new sfWidgetFormInputHidden(),
      'name'               => new sfWidgetFormInputText(),
      'publication'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'iddownload_catalog' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('iddownload_catalog')), 'empty_value' => $this->getObject()->get('iddownload_catalog'), 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('download_catalog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DownloadCatalog';
  }

}
