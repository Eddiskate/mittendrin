<h1 class="title">Galeria: edycja kategorii</h1>

<ul class="nav nav-tabs">
    <li><a href="#pl" data-toggle="tab" class="active">Polski</a></li>
    <?php foreach ($lang_installs as $lang_install): ?>
        <li><a href="#<?php echo $lang_install->getSignature() ?>" data-toggle="tab"><?php echo $lang_install->getName() ?></a></li>    
    <?php endforeach; ?>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="pl"><?php include_partial('form', array('form' => $form, 'gallery_category_id' => $gallery_category_id)) ?></div>
    <?php foreach ($lang_installs as $lang_install): ?>
        <div class="tab-pane" id="<?php echo $lang_install->getSignature() ?>"><?php include_partial('bpcmsGalleryCategoryI18n/form', array('form_lang' => $lang_install->getObjectType('BpcmsGalleryCategoryI18n', 'gallery_category_idgallery_category', $sf_params->get('idgallery_category')), 'signature' => $lang_install->getSignature())) ?></div>
    <?php endforeach; ?>
</div>