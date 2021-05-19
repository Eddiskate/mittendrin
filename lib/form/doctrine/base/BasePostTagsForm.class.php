<?php

/**
 * PostTags form base class.
 *
 * @method PostTags getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostTagsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpost_tags' => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'name_url'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idpost_tags' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpost_tags')), 'empty_value' => $this->getObject()->get('idpost_tags'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name_url'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('post_tags[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PostTags';
  }

}
