<?php

/**
 * PostTags form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostTagsForm extends BasePostTagsForm {

    public function configure() {
        $sf_request = sfContext::getInstance()->getRequest();
        
        $this->setWidgets(array(
            'idpost_tags' => new sfWidgetFormInputHidden(),
            'name' => new sfWidgetFormInputText(array('label' => 'Nazwa taga'), array('id' => 'name')),
            'name_url' => new sfWidgetFormInputText(array('label' => 'Nazwa taga systemowa'), array('readonly' => true, 'id' => 'name_url')),
            'idpost' => new sfWidgetFormInputHidden(),
            'post_has_post_tags' => new sfWidgetFormInputCheckbox(array('label' => 'Użyj do postu'), array('value' => 1)),
        ));

        $this->setValidators(array(
            'idpost_tags' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpost_tags')), 'empty_value' => $this->getObject()->get('idpost_tags'), 'required' => false)),
            'name' => new sfValidatorAnd(array(
                new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
                new sfValidatorDoctrineUnique(
                        array('model' => 'PostTags', 'column' => array('name')), array('invalid' => 'Podany tag już istnieje')
                ))
            ),
            'name_url' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => GLOBAL_FORM_REQUIRED)),
            'idpost' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'post_has_post_tags' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->setDefaults(array(
            'idpost' => $sf_request->getParameter('idpost'),
            'post_has_post_tags' => 1
        ));

        $this->widgetSchema->setNameFormat('post_tags[%s]');
    }

}
