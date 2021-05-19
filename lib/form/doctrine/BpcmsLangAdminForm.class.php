<?php

/**
 * BpcmsLangAdmin form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsLangAdminForm extends BaseBpcmsLangAdminForm {

    public function configure() {
        
        $request = sfContext::getInstance()->getRequest();
        
        $action = $request->getParameter('action');
        
        if($action == 'edit' || $action == 'update') {
            $form['widgets']['text_name']['options'] = array('readonly' => true);
        } else {
            $form['widgets']['text_name']['options'] = array();
            
        }
        
        $this->setWidgets(array(
            'text_name' => new sfWidgetFormInputText(array('label' => LANG_LANG_INSTALL_FORM_LABEL_TEXT_NAME), $form['widgets']['text_name']['options']),
            'text_value' => new sfWidgetFormTextarea(array('label' => LANG_LANG_INSTALL_FORM_LABEL_TEXT_VALUE), array('style' => 'width: 97%;height: 200px;')),
        ));

        $this->setValidators(array(
            'text_name' => new sfValidatorString(array('required' => true), array('required' => LANG_GLOBAL_FORM_REQUIRED)),
            'text_value' => new sfValidatorString(array('required' => true), array('required' => LANG_GLOBAL_FORM_REQUIRED)),
        ));

        $this->widgetSchema->setNameFormat('bpcms_lang_admin[%s]');
    }

}
