<?php

/**
 * Broadcasts form.
 *
 * @package    mittendrin
 * @subpackage form
 * @author     Damian Kania@eddi
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BroadcastsForm extends BaseBroadcastsForm {

    public function configure() {
        $this->setWidgets(array(
            'idbroadcasts' => new sfWidgetFormInputHidden(),
            'name_pl' => new sfWidgetFormInputText(array('label' => 'Nazwa audycji')),
            'name_de' => new sfWidgetFormInputText(array('label' => 'Nazwa audycji')),
            'name_cz' => new sfWidgetFormInputText(array('label' => 'Nazwa audycji')),
            'description_pl' => new sfWidgetFormTextarea(array('label' => 'Opis')),
            'description_de' => new sfWidgetFormTextarea(array('label' => 'Opis')),
            'description_cz' => new sfWidgetFormTextarea(array('label' => 'Opis')),
            'avatar' => new sfWidgetFormInputFile(array('label' => 'Ikona audycji')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Opublikowany')),
        ));

        $this->setValidators(array(
            'idbroadcasts' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbroadcasts')), 'empty_value' => $this->getObject()->get('idbroadcasts'), 'required' => false)),
            'name_pl' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'name_de' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'name_cz' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'description_pl' => new sfValidatorString(array('required' => false)),
            'description_de' => new sfValidatorString(array('required' => false)),
            'description_cz' => new sfValidatorString(array('required' => false)),
            'avatar' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/images/avatar', 'required' => false)),
            'publication' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('broadcasts[%s]');
    }

}
