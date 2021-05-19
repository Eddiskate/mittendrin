<?php

/**
 * BpcmsYtMovies form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BpcmsYtMoviesForm extends BaseBpcmsYtMoviesForm {

    public function configure() {

        $request = sfContext::getInstance()->getRequest();

        $action = $request->getParameter('action');

        $form['new']['bpcms_yt_catalog_idbpcms_yt_catalog'] = new sfWidgetFormInputHidden();
        $form['create']['bpcms_yt_catalog_idbpcms_yt_catalog'] = new sfWidgetFormInputHidden();
        $form['edit']['bpcms_yt_catalog_idbpcms_yt_catalog'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BpcmsYtCatalog'), 'add_empty' => false, 'label' => 'Katalog'));
        $form['update']['bpcms_yt_catalog_idbpcms_yt_catalog'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BpcmsYtCatalog'), 'add_empty' => false, 'label' => 'Katalog'));

        $this->setWidgets(array(
            'idbpcms_yt_movies' => new sfWidgetFormInputHidden(),
            'title' => new sfWidgetFormInputText(array('label' => 'Tytuł'), array('class' => 'input-xxlarge')),
            'description' => new sfWidgetFormTextarea(array('label' => 'Opis'), array('class' => 'ckeditor')),
            'avatar' => new sfWidgetFormInputFile(array('label' => 'Wybierz plik')),
            'created_at' => new sfWidgetFormInputHidden(),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
            'bpcms_yt_catalog_idbpcms_yt_catalog' => $form[$action]['bpcms_yt_catalog_idbpcms_yt_catalog'],
            'recommended' => new sfWidgetFormInputCheckbox(array('label' => 'Polecane'), array('value' => 1)),
            'youtube_iframe' => new sfWidgetFormTextarea(array('label' => 'Iframe z youtube'), array('style' => 'width: 100%;height: 100px;')),
        ));

        $this->setValidators(array(
            'idbpcms_yt_movies' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idbpcms_yt_movies')), 'empty_value' => $this->getObject()->get('idbpcms_yt_movies'), 'required' => false)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'description' => new sfValidatorString(array('required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'avatar' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/images/yt_movies/', 'required' => false)),
            'created_at' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'bpcms_yt_catalog_idbpcms_yt_catalog' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BpcmsYtCatalog'))),
            'recommended' => new sfValidatorInteger(array('required' => false)),
            'youtube_iframe' => new sfValidatorString(array('required' => false)),
        ));

        $this->setDefaults(array(
            'publication' => 1,
            'created_at' => time(),
            'bpcms_yt_catalog_idbpcms_yt_catalog' => $request->getParameter('idbpcms_yt_catalog')
        ));

        $this->widgetSchema->setNameFormat('bpcms_yt_movies[%s]');
    }

}
