<?php

/**
 * Cart form base class.
 *
 * @method Cart getObject() Returns the current form's model object
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCartForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idcart'                     => new sfWidgetFormInputHidden(),
      'cart_name'                  => new sfWidgetFormInputText(),
      'title_alt'                  => new sfWidgetFormInputText(),
      'title_page'                 => new sfWidgetFormInputText(),
      'no_page'                    => new sfWidgetFormInputText(),
      'publication'                => new sfWidgetFormInputText(),
      'position'                   => new sfWidgetFormInputText(),
      'position_order'             => new sfWidgetFormInputText(),
      'link_active'                => new sfWidgetFormInputText(),
      'cart_name_title'            => new sfWidgetFormInputText(),
      'redirect_to_url'            => new sfWidgetFormInputText(),
      'redirect_to_url_blank_open' => new sfWidgetFormInputText(),
      'position_row'               => new sfWidgetFormInputText(),
      'name_url'                   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idcart'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idcart')), 'empty_value' => $this->getObject()->get('idcart'), 'required' => false)),
      'cart_name'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title_alt'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title_page'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'no_page'                    => new sfValidatorInteger(array('required' => false)),
      'publication'                => new sfValidatorInteger(array('required' => false)),
      'position'                   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'position_order'             => new sfValidatorInteger(array('required' => false)),
      'link_active'                => new sfValidatorInteger(array('required' => false)),
      'cart_name_title'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'redirect_to_url'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'redirect_to_url_blank_open' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'position_row'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'name_url'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cart[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cart';
  }

}
