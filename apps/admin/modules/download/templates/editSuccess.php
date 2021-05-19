<h1 class="title">Plik: edycja</h1>

<ul class="nav nav-tabs">
    <li><a href="#pl" data-toggle="tab" class="active">Polski</a></li>
    <?php foreach ($lang_installs as $lang_install): ?>
        <li><a href="#<?php echo $lang_install->getSignature() ?>" data-toggle="tab"><?php echo $lang_install->getName() ?></a></li>    
    <?php endforeach; ?>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="pl"><?php include_partial('form', array('form' => $form, 'download_catalog' => $download_catalog)) ?></div>
    <?php foreach ($lang_installs as $lang_install): ?>
        <div class="tab-pane" id="<?php echo $lang_install->getSignature() ?>"><?php include_partial('bpcmsDownloadI18n/form', array('form_lang' => $lang_install->getObjectType('BpcmsDownloadI18n', 'download_iddownload', $sf_params->get('iddownload')), 'signature' => $lang_install->getSignature())) ?></div>
    <?php endforeach; ?>
</div>

