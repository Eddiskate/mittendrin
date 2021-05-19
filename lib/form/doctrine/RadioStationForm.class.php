<?php

/**
 * RadioStation form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RadioStationForm extends BaseRadioStationForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'idradio_station' => new sfWidgetFormInputHidden(),
            'name' => new sfWidgetFormInputText(array('label' => 'Nazwa radia'), array('class' => 'span8')),
            'title' => new sfWidgetFormInputText(array('label' => 'Tytuł'), array('class' => 'span8')),
            'description' => new sfWidgetFormTextarea(array('label' => 'Opis stacji'), array('class' => 'span8 ckeditor')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
            'position_row' => new sfWidgetFormInputHidden(),
            'avatar' => new sfWidgetFormInputFile(array('label' => 'Dodaj zdjecie'), array('class' => 'avatar')),
        ));

        $this->setValidators(array(
            'idradio_station' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idradio_station')), 'empty_value' => $this->getObject()->get('idradio_station'), 'required' => false)),
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => false), array('required' => GLOBAL_FORM_REQUIRED)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => false), array('required' => GLOBAL_FORM_REQUIRED)),
            'description' => new sfValidatorString(array('required' => false)),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'position_row' => new sfValidatorInteger(array('required' => false)),
            'avatar' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/images/radio-station/', 'required' => false)),
            'avatar_db' => new sfValidatorString(array('required' => false)),
        ));

        $this->setDefault('publication', 1);

        $this->widgetSchema->setNameFormat('radio_station[%s]');
    }
}
