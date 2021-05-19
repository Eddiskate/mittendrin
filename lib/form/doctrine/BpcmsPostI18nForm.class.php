<?php

/**
 * BpcmsPostI18n form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsPostI18nForm extends BaseBpcmsPostI18nForm
{

    public function configure()
    {
        $this->setWidgets(array(
            'post_idpost' => new sfWidgetFormInputHidden(),
            'bpcms_lang_install_signature' => new sfWidgetFormInputHidden(),
            'lang_title' => new sfWidgetFormInputText(array('label' => 'Tytuł postu'), array('class' => 'input-xxlarge')),
            'lang_description' => new sfWidgetFormTextarea(array('label' => 'Treść postu'), array('class' => 'ckeditor')),
            'lang_title_recommended' => new sfWidgetFormInputText(array('label' => 'Tytuł postu trzeci'), array('class' => 'input-xxlarge')),
            'lang_title_header' => new sfWidgetFormInputText(array('label' => 'Tytuł postu drugi'), array('class' => 'input-xxlarge')),
        ));

        $this->setValidators(array(
            'post_idpost' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'bpcms_lang_install_signature' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_description' => new sfValidatorString(array('required' => false)),
            'lang_title_recommended' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang_title_header' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->setDefault('post_idpost', sfContext::getInstance()->getRequest()->getParameter('idpost'));

        $this->widgetSchema->setNameFormat('bpcms_post_i18n[%s]');
    }

}
