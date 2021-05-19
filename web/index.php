<?php

if($_SERVER['REQUEST_URI'] == '/' && $_SERVER['HTTP_HOST'] == 'player.mittendrin.pl') {
    header('Location: https://mittendrin.pl');
    exit;
}

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('page', 'prod', true);

$context = sfContext::createInstance($configuration);

$configurationss = Doctrine_Core::getTable('Configuration')->createQuery('a')
        ->execute();

foreach ($configurationss as $configurations) {
    sfConfig::set('bpcms_'.$configurations->getConfigOption(), $configurations->getConfigValue());
}

$bpcms_lang_texts = Doctrine_Core::getTable('BpcmsLangText')->createQuery('a')
        ->execute();

foreach($bpcms_lang_texts as $bpcms_lang_text) {
    define('LANG_'.strtoupper($bpcms_lang_text->getTextName()), $bpcms_lang_text->getLangTextValue());
}

sfConfig::set('bpcms_themes_dir_name', 'mittendrinrwd2');

$context->dispatch();

