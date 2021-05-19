<?php use_stylesheets_for_form($form_lang) ?>
<?php use_javascripts_for_form($form_lang) ?>
<form action="<?php echo url_for('bpcmsGalleryCategoryI18n/' . ($form_lang->getObject()->isNew() ? 'create' : 'update') . (!$form_lang->getObject()->isNew() ? '?gallery_category_idgallery_category=' . $form_lang->getObject()->getGalleryCategoryIdgalleryCategory() . '&bpcms_lang_install_signature=' . $form_lang->getObject()->getBpcmsLangInstallSignature() : '')) ?>" method="post" <?php $form_lang->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form_lang->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form_lang->renderHiddenFields(false) ?>
    <?php echo $form_lang->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form_lang['lang_category_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_category_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_category_name'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_category_name']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'gallery/category?idgallery_catalog=' . $sf_params->get('idgallery_category'), array('class' => 'btn')) ?>
    </div>
    <?php echo $form_lang['gallery_category_idgallery_category'] ?>        
    <input name="bpcms_gallery_category_i18n[bpcms_lang_install_signature]" value="<?php echo $signature ?>" type="hidden">        
</form>
