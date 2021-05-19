<h1>Youtube - filmy katalog: edycja</h1>

<ul class="nav nav-tabs">
    <li><a href="#pl" data-toggle="tab" class="active">Polski</a></li>
    <?php foreach ($lang_installs as $lang_install): ?>
        <li><a href="#<?php echo $lang_install->getSignature() ?>" data-toggle="tab"><?php echo $lang_install->getName() ?></a></li>
    <?php endforeach; ?>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="pl"><?php include_partial('form', array('form' => $form)) ?></div>
    <?php foreach ($lang_installs as $lang_install): ?>
        <div class="tab-pane" id="<?php echo $lang_install->getSignature() ?>"><?php include_partial('bpcmsYtCatalogI18n/form', array('form_lang' => $lang_install->getObjectType('BpcmsYtCatalogI18n', 'bpcms_yt_catalog_idbpcms_yt_catalog', $sf_params->get('idbpcms_yt_catalog')), 'signature' => $lang_install->getSignature())) ?></div>
    <?php endforeach; ?>
</div>