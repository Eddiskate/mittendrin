<?php use_stylesheets_for_form($form_lang) ?>
<?php use_javascripts_for_form($form_lang) ?>

<form action="<?php echo url_for('bpcmsDownloadI18n/' . ($form_lang->getObject()->isNew() ? 'create' : 'update') . (!$form_lang->getObject()->isNew() ? '?download_iddownload=' . $form_lang->getObject()->getDownloadIddownload() . '&bpcms_lang_install_signature=' . $form_lang->getObject()->getBpcmsLangInstallSignature() : '')) ?>" method="post" <?php $form_lang->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form_lang->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form_lang->renderHiddenFields(false) ?>
    <?php echo $form_lang->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form_lang['lang_title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_title'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_title']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'download/index', array('class' => 'btn')) ?>
    </div>
    <?php echo $form_lang['download_iddownload'] ?>        
    <input name="bpcms_download_i18n[bpcms_lang_install_signature]" value="<?php echo $signature ?>" type="hidden">
</form>

