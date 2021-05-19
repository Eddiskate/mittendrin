<?php

/**
 * BpcmsDiplomas form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsDiplomasForm extends BaseBpcmsDiplomasForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'idbpcms_diplomas' => new sfWidgetFormInputHidden(),
            'name' => new sfWidgetFormInputText(array('label' => 'Numer gazety')),
            'class' => new sfWidgetFormInputText(array('label' => 'Klasa')),
            'title' => new sfWidgetFormInputText(array('label' => 'Tytuł')),
            'received' => new sfWidgetFormInputText(array('label' => 'Data wydania'), array('value' => date('Y-m-d', ($this->getObject()->getReceived() ? $this->getObject()->getReceived() : time())), 'class' => 'input-datapicker')),
            'image' => new sfWidgetFormInputFile(array('label' => 'Dodaj plik PDF')),
        ));

        $this->setValidators(array(
            'idbpcms_diplomas' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_diplomas')), 'empty_value' => $this->getObject()->get('idbpcms_diplomas'), 'required' => false)),
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'class' => new sfValidatorString(array('max_length' => 45, 'required' => false), array('required' => GLOBAL_FORM_REQUIRED)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'received' => new sfValidatorString(array('max_length' => 45, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'image' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir').'/images/diplomas/', 'required' => false)),
        ));

        $this->setDefault('received', date('Y-m-d'));

        $this->widgetSchema->setNameFormat('bpcms_diplomas[%s]');
    }
}
