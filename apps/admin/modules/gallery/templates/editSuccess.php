<h1>Galeria: edycja zdjęcia</h1>

<ul class="nav nav-tabs">
    <li><a href="#pl" data-toggle="tab" class="active">Polski</a></li>
    <?php foreach ($lang_installs as $lang_install): ?>
        <li><a href="#<?php echo $lang_install->getSignature() ?>" data-toggle="tab"><?php echo $lang_install->getName() ?></a></li>    
    <?php endforeach; ?>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="pl"><?php include_partial('form', array('form' => $form)) ?></div>
    <?php foreach ($lang_installs as $lang_install): ?>
        <div class="tab-pane" id="<?php echo $lang_install->getSignature() ?>"><?php include_partial('bpcmsGalleryI18n/form', array('form_lang' => $lang_install->getObjectType('BpcmsGalleryI18n', 'gallery_idgallery', $sf_params->get('idgallery')), 'signature' => $lang_install->getSignature())) ?></div>
    <?php endforeach; ?>
</div>