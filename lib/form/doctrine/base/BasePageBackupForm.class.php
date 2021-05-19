<?php

/**
 * PageBackup form base class.
 *
 * @method PageBackup getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePageBackupForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpage_backup' => new sfWidgetFormInputHidden(),
      'body'          => new sfWidgetFormTextarea(),
      'page_idpage'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => false)),
      'created_at'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idpage_backup' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpage_backup')), 'empty_value' => $this->getObject()->get('idpage_backup'), 'required' => false)),
      'body'          => new sfValidatorString(array('required' => false)),
      'page_idpage'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Page'))),
      'created_at'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_backup[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageBackup';
  }

}
