<?php

/**
 * Download form.
 *
 * @package    blackcms
 * @subpackage form
 * @author     Damian Kania @ Eddi blackpage.pl 2012
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DownloadForm extends BaseDownloadForm {

    public function configure() {
        $this->setWidgets(array(
            'iddownload' => new sfWidgetFormInputHidden(),
            'file_name' => new sfWidgetFormInputFile(array('label' => 'Wybierz plik')),
            'title' => new sfWidgetFormInputText(array('label' => 'Nazwa pliku'), array('size' => 80)),
            'download_catalog_iddownload_catalog' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DownloadCatalog'), 'add_empty' => false, 'label' => 'Lokalizacja pliku')),
            'url_to_file' => new sfWidgetFormInputText(array('label' => 'lub podaj adres pliku'), array('placeholder' => 'http://serwer/plik', 'class' => 'input-xxlarge')),
        ));

        $this->setValidators(array(
            'iddownload' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('iddownload')), 'empty_value' => $this->getObject()->get('iddownload'), 'required' => false)),
            'file_name' => new sfValidatorFile(array('path' => sfConfig::get('sf_web_dir') . '/uploads/files/', 'required' => false)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Podaj nazwę wyświetlaną dla pliku!')),
            'download_catalog_iddownload_catalog' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DownloadCatalog')), array('required' => 'Wybierz lokalizacje zapisania pliku!')),
            'url_to_file' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->widgetSchema->setNameFormat('download[%s]');
    }

}
