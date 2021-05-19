<?php

/**
 * Slideshow form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SlideshowForm extends BaseSlideshowForm {

    public function configure() {
        $this->setWidgets(array(
            'idslideshow' => new sfWidgetFormInputHidden(),
            'file_name' => new sfWidgetFormInputFile(array('label' => 'Wybierz plik')),
            'body_h1' => new sfWidgetFormInputText(array('label' => 'Tytuł pozycji'), array('size' => 60)),
            'body_link' => new sfWidgetFormInputText(array('label' => 'Link do strony'), array('size' => 60, 'placeholder' => 'http://google.pl')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Wiodczny na stronie'), array('value' => 1)),
            'default_position' => new sfWidgetFormInputText(array('label' => 'Pozycja / kolejność')),
        ));

        $this->setValidators(array(
            'idslideshow' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idslideshow')), 'empty_value' => $this->getObject()->get('idslideshow'), 'required' => false)),
            'file_name' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/images/slideshow/', 'required' => false)),
            'body_h1' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'body_link' => new sfValidatorString(array('required' => false)),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'default_position' => new sfValidatorInteger(array('required' => false)),
        ));

        $this->setDefault('publication', 1);

        $this->widgetSchema->setNameFormat('slideshow[%s]');
    }

}
