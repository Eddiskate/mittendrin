<?php

/**
 * BpcmsLangInstall form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsLangInstallForm extends BaseBpcmsLangInstallForm {

    public function configure() {
        $form['new']['widgets']['signature']['options'] = array('placeholder' => 'pl_PL');
        $form['edit']['widgets']['signature']['options'] = array('readonly' => true);

        $action = sfContext::getInstance()->getRequest()->getParameter('action');

        $this->setWidgets(array(
            'name' => new sfWidgetFormInputText(array('label' => 'Nazwa')),
            'signature' => new sfWidgetFormInputText(array('label' => 'Sygnatura języka'), $form[$action]['widgets']['signature']['options']),
            'active' => new sfWidgetFormInputCheckbox(array('label' => 'Ustaw jako domyślny'), array('value' => 1)),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
            'lang_icons' => new sfWidgetFormInputFile(array('label' => 'Ikona')),
        ));

        $required = 'uzupełnij pole';

        $this->setValidators(array(
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => $required)),
            'signature' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => $required)),
            'active' => new sfValidatorInteger(array('required' => false)),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'lang_icons' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir').'/images/lang_icons/', 'required' => false)),
        ));

        $this->setDefault('publication', 1);

        $this->widgetSchema->setNameFormat('bpcms_lang_install[%s]');
    }

}
