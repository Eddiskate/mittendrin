<?php

/**
 * BpcmsAlbumMonth form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsAlbumMonthForm extends BaseBpcmsAlbumMonthForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'idbpcms_album_month' => new sfWidgetFormInputHidden(),
            'title' => new sfWidgetFormInputText(array('label' => 'Tytuł albumu'), array('class' => 'input-xxlarge')),
            'description' => new sfWidgetFormTextarea(array('label' => 'Dodatkowy opis'), array('class' => 'input-xxlarge')),
            'link' => new sfWidgetFormInputText(array('label' => 'Link'), array('class' => 'input-xxlarge', 'placeholder' => 'http://link-do-albumu.pl')),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
            'avatar' => new sfWidgetFormInputFile(array('label' => 'Avatar')),
        ));

        $this->setValidators(array(
            'idbpcms_album_month' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_album_month')), 'empty_value' => $this->getObject()->get('idbpcms_album_month'), 'required' => false)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'description' => new sfValidatorString(array('required' => false)),
            'link' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'avatar' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/images/album_month/', 'required' => false)),
            'avatar_db' => new sfValidatorString(array('required' => false)),
        ));

        $this->setDefaults(array(
           'publication' => 1
        ));

        $this->widgetSchema->setNameFormat('bpcms_album_month[%s]');
    }
}
