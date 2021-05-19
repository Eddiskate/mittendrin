<?php

/**
 * Page form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageForm extends BasePageForm {

    public function configure() {
        if ($this->getObject()->getRedirectToUrl() != '') {
            $form['widgets']['body']['options'] = array('style' => 'width: 98%;height: 200px;', 'readonly' => true);
        } else {
            $form['widgets']['body']['options'] = array('rows' => 40, 'class' => 'ckeditor');
        }
        $this->setWidgets(array(
            'idpage' => new sfWidgetFormInputHidden(),
            'page_name' => new sfWidgetFormInputText(array('label' => 'Nazwa strony'), array('size' => 80)),
            'page_name_url' => new sfWidgetFormInputText(array('label' => 'Nazwa URL strony'), array('size' => 80)),
            'page_title' => new sfWidgetFormInputText(array('label' => 'Tytuł strony'), array('size' => 80)),
            'body' => new sfWidgetFormTextarea(array('label' => 'Treść strony'), $form['widgets']['body']['options']),
            'cart_idcart' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cart'), 'add_empty' => false, 'label' => 'Karta')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Wiodczna na stronie'), array('value' => 1)),
            'position' => new sfWidgetFormInputText(),
            'position_order' => new sfWidgetFormInputText(),
            'rows' => new sfWidgetFormInputCheckbox(array('label' => 'Osobne wiersze w treści'), array('value' => 1)),
            'page_default' => new sfWidgetFormInputCheckbox(array('label' => 'Ustaw stronę jako domyślna dla karty'), array('value' => 1)),
            'position_row' => new sfWidgetFormInputText(array('label' => 'Pozycja')),
            'redirect_to_url' => new sfWidgetFormInputText(array('label' => 'Przekieruj na adres'), array('placeholder' => 'http://nazwa_strony.pl')),
            'redirect_to_url_blank_open' => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
        ));

        $this->setValidators(array(
            'idpage' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpage')), 'empty_value' => $this->getObject()->get('idpage'), 'required' => false)),
            'page_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'page_name_url' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'page_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'body' => new sfValidatorString(array('required' => false)),
            'cart_idcart' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cart'))),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'position' => new sfValidatorInteger(array('required' => false)),
            'position_order' => new sfValidatorInteger(array('required' => false)),
            'rows' => new sfValidatorInteger(array('required' => false)),
            'page_default' => new sfValidatorInteger(array('required' => false)),
            'position_row' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'redirect_to_url' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'redirect_to_url_blank_open' => new sfValidatorInteger(array('required' => false)),
        ));

        $this->setDefaults(array(
            'publication' => 1,
            'cart_idcart' => sfContext::getInstance()->getRequest()->getParameter('idcart'),
            'body' => 'Przepraszamy strona w budowie.',
        ));

        $this->widgetSchema->setNameFormat('page[%s]');
    }

}
