<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo sfConfig::get('bpcms_page_title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo sfConfig::get('bpcms_page_keywords') ?>">
    <meta name="description" content="<?php echo sfConfig::get('bpcms_page_description') ?>">
    <meta name="author" content="<?php echo sfConfig::get('bpcms_page_author') ?>">

    <?php include_component('themes', 'head') ?>
    <?php include_component('post', 'metaSocial') ?>
</head>
<body>
<?php include_component('themes', 'layout', array('sf_content' => $sf_content)) ?>
<?php include_component('themes', 'body') ?>
</body>
</html>