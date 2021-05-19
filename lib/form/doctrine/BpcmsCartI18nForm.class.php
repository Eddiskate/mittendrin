<?php

/**
 * BpcmsCartI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsCartI18nForm extends BaseBpcmsCartI18nForm {

    public function configure() {
        $this->setWidgets(array(
            'cart_idcart' => new sfWidgetFormInputHidden(),
            'lang_cart_name' => new sfWidgetFormInputText(array('label' => 'Nazwa karty'), array('class' => 'span12 copy-to-name-url')),
            'lang_title_alt' => new sfWidgetFormInputText(array('label' => 'Nazwa odnośnika')),
            'lang_title_page' => new sfWidgetFormInputText(array('label' => 'Tytuł strony')),
            'lang_cart_name_title' => new sfWidgetFormInputText(array('label' => 'Podpis menu')),
            'name_url' => new sfWidgetFormInputText(array('label' => 'Nazwa URL'), array('size' => 120, 'class' => 'span12 name-url', 'readonly' => true)),
        ));

        $this->setValidators(array(
            'cart_idcart' => new sfValidatorString(array('max_length' => 255, 'required' => false), array('required' => 'uzupełnij pole!')),
            'lang_cart_name' => new sfValidatorString(array('max_length' => 255, 'required' => false), array('required' => 'uzupełnij pole!')),
            'name_url' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'uzupełnij pole!')),
            'lang_title_alt' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_title_page' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_cart_name_title' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false), array('required' => 'uzupełnij pole!')),
        ));

        $this->setDefaults(array(
            'cart_idcart' => sfContext::getInstance()->getRequest()->getParameter('idcart'),            
        ));
        
        $this->widgetSchema->setNameFormat('bpcms_cart_i18n[%s]');
    }

}
