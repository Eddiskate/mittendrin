<?php

/**
 * BpcmsYtCatalog form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsYtCatalogForm extends BaseBpcmsYtCatalogForm {

    public function configure() {
        $this->setWidgets(array(
            'idbpcms_yt_catalog' => new sfWidgetFormInputHidden(),
            'name' => new sfWidgetFormInputText(array('label' => 'Nazwa katalogu')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
        ));

        $this->setValidators(array(
            'idbpcms_yt_catalog' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_yt_catalog')), 'empty_value' => $this->getObject()->get('idbpcms_yt_catalog'), 'required' => false)),
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'publication' => new sfValidatorInteger(array('required' => false)),
        ));

        $this->setDefault('publication', 1);
        
        $this->widgetSchema->setNameFormat('bpcms_yt_catalog[%s]');
    }

}
