<?php use_stylesheets_for_form($form_lang) ?>
<?php use_javascripts_for_form($form_lang) ?>

<form
    action="<?php echo url_for('bpcmsYtCatalogI18n/' . ($form_lang->getObject()->isNew() ? 'create' : 'update') . (!$form_lang->getObject()->isNew() ? '?bpcms_yt_catalog_idbpcms_yt_catalog=' . $form_lang->getObject()->getBpcmsYtCatalogIdbpcmsYtCatalog() . '&bpcms_lang_install_signature=' . $form_lang->getObject()->getBpcmsLangInstallSignature() : '')) ?>"
    method="post" <?php $form_lang->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form_lang->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put"/>
    <?php endif; ?>
    <?php echo $form_lang->renderHiddenFields(false) ?>
    <?php echo $form_lang->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form_lang['lang_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_name'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_name']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'bpcmsYtMovies/index', array('class' => 'btn')) ?>
    </div>
    <?php echo $form_lang['bpcms_yt_catalog_idbpcms_yt_catalog'] ?>
    <input name="bpcms_yt_catalog_i18n[bpcms_lang_install_signature]" value="<?php echo $signature ?>" type="hidden">
</form>
