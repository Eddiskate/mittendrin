<?php

/**
 * BpcmsAlbumMonthI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsAlbumMonthI18nForm extends BaseBpcmsAlbumMonthI18nForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'album_month_idalbum_month' => new sfWidgetFormInputHidden(),
            'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
            'lang_title' => new sfWidgetFormInputText(array('label' => 'Tytuł albumu'), array('class' => 'input-xxlarge')),
            'lang_description' => new sfWidgetFormTextarea(array('label' => 'Dodatkowy opis'), array('class' => 'input-xxlarge')),
        ));

        $this->setValidators(array(
            'album_month_idalbum_month' => new sfValidatorString(array('required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('required' => false)),
            'lang_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_description' => new sfValidatorString(array('required' => false)),
        ));

        $this->setDefault('album_month_idalbum_month', sfContext::getInstance()->getRequest()->getParameter('idbpcms_album_month'));

        $this->widgetSchema->setNameFormat('bpcms_album_month_i18n[%s]');
    }
}
