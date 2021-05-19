<?php

/**
 * BpcmsPostCatalogI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsPostCatalogI18nForm extends BaseBpcmsPostCatalogI18nForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'post_catalog_idpost_catalog' => new sfWidgetFormInputHidden(),
            'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
            'lang_name' => new sfWidgetFormInputText(array('label' => 'Nazwa katalogu')),
        ));

        $this->setValidators(array(
            'post_catalog_idpost_catalog' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->setDefault('post_catalog_idpost_catalog', sfContext::getInstance()->getRequest()->getParameter('idpost_catalog'));

        $this->widgetSchema->setNameFormat('bpcms_post_catalog_i18n[%s]');
    }
}
