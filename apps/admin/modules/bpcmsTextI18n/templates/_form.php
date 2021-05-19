<?php use_stylesheets_for_form($form_lang) ?>
<?php use_javascripts_for_form($form_lang) ?>

<form action="<?php echo url_for('bpcmsTextI18n/' . ($form_lang->getObject()->isNew() ? 'create' : 'update') . (!$form_lang->getObject()->isNew() ? '?bpcms_lang_install_signature=' . $form_lang->getObject()->getBpcmsLangInstallSignature() . '&bpcms_lang_text_name=' . $form_lang->getObject()->getBpcmsLangTextTextName() : '')) ?>" method="post" <?php $form_lang->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form_lang->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>

    <?php echo $form_lang->renderHiddenFields(false) ?>
    <?php echo $form_lang->renderGlobalErrors() ?>

    <div class="control-group <?php echo $form_lang['bpcms_lang_text_text_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['bpcms_lang_text_text_name']->renderLabel() ?></label>
        <div class="controls">
            <input type="text" name="bpcms_text_i18n[bpcms_lang_text_text_name]" value="<?php echo $sf_params->get('text_name') ?>" readonly="true">
            <span class="help-inline"><?php echo $form_lang['bpcms_lang_text_text_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_text_value']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_text_value']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_text_value'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_text_value']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'bpcmsLangText/index', array('class' => 'btn')) ?>
    </div>
    <input name="bpcms_text_i18n[bpcms_lang_install_signature]" value="<?php echo $signature ?>" type="hidden">        
</form>
