<?php

/**
 * PostCatalog form base class.
 *
 * @method PostCatalog getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostCatalogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpost_catalog'       => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'publication'          => new sfWidgetFormInputText(),
      'homepage_publication' => new sfWidgetFormInputText(),
      'homepage_row'         => new sfWidgetFormInputText(),
      'font_color'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idpost_catalog'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpost_catalog')), 'empty_value' => $this->getObject()->get('idpost_catalog'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'publication'          => new sfValidatorInteger(array('required' => false)),
      'homepage_publication' => new sfValidatorInteger(array('required' => false)),
      'homepage_row'         => new sfValidatorInteger(array('required' => false)),
      'font_color'           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('post_catalog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PostCatalog';
  }

}
