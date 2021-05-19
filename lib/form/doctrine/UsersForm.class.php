<?php

/**
 * Users form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsersForm extends BaseUsersForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'idusers'  => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(array('label' => 'Imie')),
      'lastname' => new sfWidgetFormInputText(array('label' => 'Nazwisko')),
      'mail'     => new sfWidgetFormInputText(array('label' => 'E-mail')),
      'active'   => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
      'passwd'   => new sfWidgetFormInputText(array('label' => 'Hasło')),
    ));

    $this->setValidators(array(
      'idusers'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idusers')), 'empty_value' => $this->getObject()->get('idusers'), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lastname' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'active'   => new sfValidatorInteger(array('required' => false)),
      'passwd'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');      
  }
}
