<?php

/**
 * Post form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostForm extends BasePostForm
{

    public function configure()
    {
        $action = sfContext::getInstance()->getRequest()->getParameter('action');

        $form['new']['created_at']['options'] = array('value' => date('Y-m-d H:i:s'));
        $form['edit']['created_at']['options'] = array('value' => date('Y-m-d H:i:s', $this->getObject()->getCreatedAt()));

        $this->setWidgets(array(
            'idpost' => new sfWidgetFormInputHidden(),
            'title' => new sfWidgetFormInputText(array('label' => 'Tytuł postu'), array('class' => 'input-xxlarge')),
            'description' => new sfWidgetFormTextarea(array('label' => 'Treść postu'), array('rows' => 30, 'cols' => 60, 'class' => 'ckeditor')),
            'created_at' => new sfWidgetFormInputText(array('label' => 'Data utworzenia'), $form[$action]['created_at']['options']),
            'archiv' => new sfWidgetFormInputCheckbox(array('label' => 'Przenieś do archiwum'), array('value' => 1)),
            'publication' => new sfWidgetFormInputCheckbox(array('label' => 'Pokaż na stronie'), array('value' => 1)),
            'newsletter' => new sfWidgetFormInputCheckbox(array('label' => 'Wyslij newsletter'), array('value' => 1)),
            'avatar' => new sfWidgetFormInputFile(array('label' => 'Dodaj zdjecie do postu'), array('class' => 'avatar')),
            'post_catalog_idpost_catalog' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PostCatalog'), 'add_empty' => false, 'label' => 'Katalog')),
            'users_idusers' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Users'), 'add_empty' => false)),
            'option_title' => new sfWidgetFormInputText(array('label' => 'Opis dodatkowy / hasło'), array('size' => 80)),
            'column_type' => new sfWidgetFormChoice(array('choices' => array(0 => 'poziomy', 1 => 'pionowy'), 'label' => 'Układ')),
            'recommended' => new sfWidgetFormInputCheckbox(array('label' => 'Mittendrin poleca'), array('value' => 1)),
            'title_header' => new sfWidgetFormInputText(array('label' => 'Tytuł postu polecamy'), array('class' => 'input-xxlarge')),
            'title_recommended' => new sfWidgetFormInputText(array('label' => 'Tytuł postu drugi'), array('class' => 'input-xxlarge')),
        ));

        $this->setValidators(array(
            'idpost' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpost')), 'empty_value' => $this->getObject()->get('idpost'), 'required' => false)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'pole nie może być puste')),
            'description' => new sfValidatorString(array('required' => true), array('required' => 'pole nie może być puste')),
            'created_at' => new sfValidatorString(array('required' => false)),
            'archiv' => new sfValidatorInteger(array('required' => false)),
            'publication' => new sfValidatorInteger(array('required' => false)),
            'newsletter' => new sfValidatorInteger(array('required' => false)),
            'avatar' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/images/post/', 'required' => false)),
            'avatar_db' => new sfValidatorString(array('required' => false)),
            'post_catalog_idpost_catalog' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PostCatalog'))),
            'users_idusers' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Users'))),
            'option_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'column_type' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'recommended' => new sfValidatorInteger(array('required' => false)),
            'title_header' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'title_recommended' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->setDefault('publication', 1);
        
        $this->widgetSchema->setNameFormat('post[%s]');
    }

}
