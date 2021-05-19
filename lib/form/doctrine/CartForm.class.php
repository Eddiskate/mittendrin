<?php

/**
 * Cart form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CartForm extends BaseCartForm {

    public function configure() {
        $this->setWidgets(array(
            'idcart' => new sfWidgetFormInputHidden(),
            'cart_name' => new sfWidgetFormInputText(array('label' => 'Nazwa karty'), array('size' => 120, 'class' => 'span12 copy-to-name-url')),
            'name_url' => new sfWidgetFormInputText(array('label' => 'Nazwa URL'), array('size' => 120, 'class' => 'span12 name-url', 'readonly' => true)),
            'cart_name_title' => new sfWidgetFormInputText(array('label' => 'Podpis menu'), array('size' => 60, 'placeholder' => 'opcja dodatkowa')),
            'title_alt' => new sfWidgetFormInputText(array('label' => 'Nazwa odnośnika'), array('size' => 60, 'placeholder' => 'domyślnie jak nazwa karty')),
            'title_page' => new sfWidgetFormInputText(array('label' => 'Tytuł strony'), array('size' => 60, 'placeholder' => 'domyślnie jak nazwa karty')),
            'no_page' => new sfWidgetFormInputCheckbox(array('label' => 'Brak podstron'), array('value' => 1)),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Widoczna na stronie'), array('value' => 1)),
            'position' => new sfWidgetFormChoice(array('choices' => array('górne menu', 'dolne menu', 'górne + dolne menu')), array('label' => 'Lokalizacja na stronie')),
            'link_active' => new sfWidgetFormInputCheckbox(array('label' => 'Odnośnik aktywny'), array('value' => 1)),
            'redirect_to_url' => new sfWidgetFormInputText(array('label' => 'Przekieruj na stronę'), array('placeholder' => 'http://blackpage.pl')),
            'redirect_to_url_blank_open' => new sfWidgetFormInputCheckbox(array('label' => ''), array('value' => 1)),
            'position_row' => new sfWidgetFormInputText(array('label' => 'Pozycja'), array('placeholder' => 'podajemy od 1 do ..')),
        ));

        $this->setValidators(array(
            'idcart' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idcart')), 'empty_value' => $this->getObject()->get('idcart'), 'required' => false)),
            'cart_name' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Pole nie może pozostać puste!')),
            'name_url' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Pole nie może pozostać puste!')),
            'cart_name_title' => new sfValidatorString(array('max_length' => 255, 'required' => false), array('required' => 'Pole nie może pozostać puste!')),
            'title_alt' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'title_page' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'no_page' => new sfValidatorInteger(array('required' => false)),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'position' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'position_order' => new sfValidatorInteger(array('required' => false)),
            'link_active' => new sfValidatorInteger(array('required' => false)),
            'redirect_to_url' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'redirect_to_url_blank_open' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'position_row' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
        ));

        $this->setDefaults(array(
            'publication' => 1,
            'no_page' => 1,
        ));

        $this->widgetSchema->setNameFormat('cart[%s]');
    }

}
