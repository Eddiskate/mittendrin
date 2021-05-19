<?php

/**
 * BpcmsGalleryCatalogI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsGalleryCatalogI18nForm extends BaseBpcmsGalleryCatalogI18nForm {

    public function configure() {
        $this->setWidgets(array(
            'gallery_catalog_idgallery_catalog' => new sfWidgetFormInputHidden(),
            'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
            'lang_catalog_name' => new sfWidgetFormInputText(array('label' => 'Nazwa katalogu')),
        ));

        $this->setValidators(array(
            'gallery_catalog_idgallery_catalog' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'lang_catalog_name' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
        ));

        $this->setDefault('gallery_catalog_idgallery_catalog', sfContext::getInstance()->getRequest()->getParameter('idgallery_catalog'));

        $this->widgetSchema->setNameFormat('bpcms_gallery_catalog_i18n[%s]');
    }

}
