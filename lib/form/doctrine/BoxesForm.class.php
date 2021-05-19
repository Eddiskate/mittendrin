<?php

/**
 * Boxes form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BoxesForm extends BaseBoxesForm {

    public function configure() {
        $this->setWidgets(array(
            'idboxes' => new sfWidgetFormInputHidden(),
            'title' => new sfWidgetFormInputText(array('label' => 'Tytuł')),
            'description' => new sfWidgetFormTextarea(array('label' => 'Treść')),
            'image' => new sfWidgetFormInputFile(array('label' => 'Zdjęcie')),
            'url_for_page' => new sfWidgetFormInputText(array('label' => 'Adres url przekierowania'), array('size' => 60)),
            'target' => new sfWidgetFormInputCheckbox(array('label' => 'Otwórz adres url w nowym oknie'), array('value' => 1)),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
            'position_row' => new sfWidgetFormInputText(array('label' => 'Pozycja w liście'), array('size' => 2)),
            'show_homepage' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie głównej'), array('value' => 1)),
            'show_page' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronach CMS'), array('value' => 1)),
        ));

        $this->setValidators(array(
            'idboxes' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idboxes')), 'empty_value' => $this->getObject()->get('idboxes'), 'required' => false)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'description' => new sfValidatorString(array('required' => false)),
            'image' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/images/boxes/', 'required' => false)),
            'url_for_page' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'target' => new sfValidatorString(array('required' => false)),
            'publication' => new sfValidatorString(array('required' => false)),
            'position_row' => new sfValidatorInteger(array('required' => false)),
            'show_homepage' => new sfValidatorInteger(array('required' => false)),
            'show_page' => new sfValidatorInteger(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('boxes[%s]');
    }

}
