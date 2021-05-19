<?php

/**
 * BpcmsTopLayer form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsTopLayerForm extends BaseBpcmsTopLayerForm {

    public function configure() {
        $this->setWidgets(array(
            'idbpcms_top_layer' => new sfWidgetFormInputHidden(),
            'name' => new sfWidgetFormInputText(array('label' => 'Nazwa')),
            'file_name' => new sfWidgetFormInputFile(array('label' => 'Zdjęcie')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
        ));

        $this->setValidators(array(
            'idbpcms_top_layer' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_top_layer')), 'empty_value' => $this->getObject()->get('idbpcms_top_layer'), 'required' => false)),
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Uzupełnij pole!')),
            'file_name' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir').'/images/toplayer/', 'required' => true), array('required' => 'Uzupełnij pole!')),
            'publication' => new sfValidatorInteger(array('required' => false)),
        ));

        $this->setDefault('publication', 1);
        
        $this->widgetSchema->setNameFormat('bpcms_top_layer[%s]');
    }

}
