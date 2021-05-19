<?php

/**
 * Page form base class.
 *
 * @method Page getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpage'                     => new sfWidgetFormInputHidden(),
      'page_name'                  => new sfWidgetFormInputText(),
      'page_title'                 => new sfWidgetFormInputText(),
      'body'                       => new sfWidgetFormTextarea(),
      'cart_idcart'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cart'), 'add_empty' => false)),
      'publication'                => new sfWidgetFormInputText(),
      'position'                   => new sfWidgetFormInputText(),
      'position_order'             => new sfWidgetFormInputText(),
      'rows'                       => new sfWidgetFormInputText(),
      'page_default'               => new sfWidgetFormInputText(),
      'position_row'               => new sfWidgetFormInputText(),
      'redirect_to_url'            => new sfWidgetFormInputText(),
      'redirect_to_url_blank_open' => new sfWidgetFormInputText(),
      'page_name_url'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idpage'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpage')), 'empty_value' => $this->getObject()->get('idpage'), 'required' => false)),
      'page_name'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'page_title'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body'                       => new sfValidatorString(array('required' => false)),
      'cart_idcart'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cart'))),
      'publication'                => new sfValidatorInteger(array('required' => false)),
      'position'                   => new sfValidatorInteger(array('required' => false)),
      'position_order'             => new sfValidatorInteger(array('required' => false)),
      'rows'                       => new sfValidatorInteger(array('required' => false)),
      'page_default'               => new sfValidatorInteger(array('required' => false)),
      'position_row'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'redirect_to_url'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'redirect_to_url_blank_open' => new sfValidatorInteger(array('required' => false)),
      'page_name_url'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

}
