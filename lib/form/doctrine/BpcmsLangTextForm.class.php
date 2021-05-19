<?php

/**
 * BpcmsLangText form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsLangTextForm extends BaseBpcmsLangTextForm {

    public function configure() {
        $this->setWidgets(array(
            'text_name' => new sfWidgetFormInputText(array('label' => 'Nazwa systemowa')),
            'text_value' => new sfWidgetFormTextarea(array('label' => 'Wartość taga'), array('style' => 'width: 97%;height: 200px;')),
        ));

        $this->setValidators(array(
            'text_name' => new sfValidatorString(array('required' => true), array('required' => 'uzupełnij pole!')),
            'text_value' => new sfValidatorString(array('required' => true), array('required' => 'uzupełnij pole!')),
        ));

        $this->widgetSchema->setNameFormat('bpcms_lang_text[%s]');
    }

}
