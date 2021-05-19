<?php

/**
 * BpcmsPlaylist form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsPlaylistForm extends BaseBpcmsPlaylistForm {

    public function configure() {
        $this->setWidgets(array(
            'idbpcms_playlist' => new sfWidgetFormInputHidden(),
            'page_idpage' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => false, 'label' => 'Pokaż na stronie')),
            'plate_title' => new sfWidgetFormInputText(array('label' => 'Tytuł')),
            'plate_artist' => new sfWidgetFormInputText(array('label' => 'Program')),
            'plate_file' => new sfWidgetFormInputText(array('label' => 'Adres URL')),
            'plate_cover' => new sfWidgetFormInputText(array('label' => 'Okładka URL')),
            'plate_buy_link' => new sfWidgetFormInputText(array('label' => 'Link do strony')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
        ));

        $this->setValidators(array(
            'idbpcms_playlist' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_playlist')), 'empty_value' => $this->getObject()->get('idbpcms_playlist'), 'required' => false)),
            'page_idpage' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Page'))),
            'plate_title' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Uzupełnij pole.')),
            'plate_artist' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Uzupełnij pole.')),
            'plate_file' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Uzupełnij pole.')),
            'plate_cover' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'plate_buy_link' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'publication' => new sfValidatorInteger(array('required' => false)),
        ));

        $this->setDefault('publication', 1);
        
        $this->widgetSchema->setNameFormat('bpcms_playlist[%s]');
    }

}
