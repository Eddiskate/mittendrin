<?php

/**
 * BpcmsGalleryCategoryI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsGalleryCategoryI18nForm extends BaseBpcmsGalleryCategoryI18nForm {

    public function configure() {
        $this->setWidgets(array(
            'gallery_category_idgallery_category' => new sfWidgetFormInputHidden(),
            'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
            'lang_category_name' => new sfWidgetFormInputText(array('label' => 'Nazwa kategori')),
        ));

        $this->setValidators(array(
            'gallery_category_idgallery_category' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_category_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->setDefault('gallery_category_idgallery_category', sfContext::getInstance()->getRequest()->getParameter('idgallery_category'));

        $this->widgetSchema->setNameFormat('bpcms_gallery_category_i18n[%s]');
    }

}
