<?php

/**
 * PostHasPostTags form base class.
 *
 * @method PostHasPostTags getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostHasPostTagsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'post_idpost'           => new sfWidgetFormInputHidden(),
      'post_tags_idpost_tags' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'post_idpost'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('post_idpost')), 'empty_value' => $this->getObject()->get('post_idpost'), 'required' => false)),
      'post_tags_idpost_tags' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('post_tags_idpost_tags')), 'empty_value' => $this->getObject()->get('post_tags_idpost_tags'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('post_has_post_tags[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PostHasPostTags';
  }

}
