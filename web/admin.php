<?php


require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('admin', 'prod', true);

$context = sfContext::createInstance($configuration);

$configurationss = Doctrine_Core::getTable('Configuration')->createQuery('a')
        ->execute();

foreach ($configurationss as $configurations) {
    sfConfig::set('bpcms_'.$configurations->getConfigOption(), $configurations->getConfigValue());
}

$bpcms_lang_admins = Doctrine_Core::getTable('BpcmsLangAdmin')->createQuery('a')
    ->execute();

foreach($bpcms_lang_admins as $bpcms_lang_admin) {
    define('LANG_'.strtoupper($bpcms_lang_admin->getTextName()), $bpcms_lang_admin->getLangTextValue());
}

define('GLOBAL_FORM_REQUIRED', 'Pole nie może zostać puste.');
define('GLOBAL_DELETE_SUCCESS', 'Wybrany element został usunięty.');
define('GLOBAL_SAVE_SUCCESS', 'Zmiany zostały zapisane.');
define('GLOBAL_FORM_SAVE', 'Zmiany zostały zapisane!');

$context->dispatch();
