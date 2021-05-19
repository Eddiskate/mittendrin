<?php

/**
 * PostCatalog form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostCatalogForm extends BasePostCatalogForm
{

    public function configure()
    {
        $this->setWidgets(array(
            'idpost_catalog' => new sfWidgetFormInputHidden(),
            'name' => new sfWidgetFormInputText(array('label' => 'Nazwa katalogu')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Widoczny na stronie'), array('value' => 1)),
            'homepage_publication' => new sfWidgetFormInputCheckbox(array('label' => 'Widoczny na stronie głownej'), array('value' => 1)),
            'homepage_row' => new sfWidgetFormInputText(array('label' => 'Pozycja w liście')),
            'font_color' => new sfWidgetFormInputText(array('label' => 'Czcionka kolor')),
        ));

        $this->setValidators(array(
            'idpost_catalog' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpost_catalog')), 'empty_value' => $this->getObject()->get('idpost_catalog'), 'required' => false)),
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Pole nie może być puste!')),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'homepage_publication' => new sfValidatorInteger(array('required' => false)),
            'homepage_row' => new sfValidatorInteger(array('required' => false)),
            'font_color' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
        ));

        $this->widgetSchema->setNameFormat('post_catalog[%s]');
    }

}
