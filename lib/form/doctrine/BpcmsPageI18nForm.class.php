<?php

/**
 * BpcmsPageI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsPageI18nForm extends BaseBpcmsPageI18nForm {

    public function configure() {
        $this->setWidgets(array(
            'page_idpage' => new sfWidgetFormInputHidden(),
            'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
            'lang_page_name' => new sfWidgetFormInputText(array('label' => 'Nazwa strony')),
            'lang_page_name_url' => new sfWidgetFormInputText(array('label' => 'Nazwa URL strony')),
            'lang_page_title' => new sfWidgetFormInputText(array('label' => 'Tytuł strony')),
            'lang_body' => new sfWidgetFormTextarea(array('label' => 'Treść strony'), array('rows' => 40, 'class' => 'ckeditor')),
        ));

        $this->setValidators(array(
            'page_idpage' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'lang_page_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_page_name_url' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_page_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_body' => new sfValidatorString(array('required' => false)),
        ));

        $this->setDefault('page_idpage', sfContext::getInstance()->getRequest()->getParameter('idpage'));

        $this->widgetSchema->setNameFormat('bpcms_page_i18n[%s]');
    }

}
