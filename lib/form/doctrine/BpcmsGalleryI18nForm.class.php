<?php

/**
 * BpcmsGalleryI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsGalleryI18nForm extends BaseBpcmsGalleryI18nForm {

    public function configure() {
        $this->setWidgets(array(
            'gallery_idgallery' => new sfWidgetFormInputHidden(),
            'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
            'lang_file_title' => new sfWidgetFormInputText(array('label' => 'Tytuł zdjęcia'), array('class' => 'input-xxlarge')),
        ));

        $this->setValidators(array(
            'gallery_idgallery' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_file_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->setDefault('gallery_idgallery', sfContext::getInstance()->getRequest()->getParameter('idgallery'));
        
        $this->widgetSchema->setNameFormat('bpcms_gallery_i18n[%s]');
    }

}
