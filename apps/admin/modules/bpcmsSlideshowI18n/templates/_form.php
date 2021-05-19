<?php use_stylesheets_for_form($form_lang) ?>
<?php use_javascripts_for_form($form_lang) ?>

<form
        action="<?php echo url_for('bpcmsSlideshowI18n/' . ($form_lang->getObject()->isNew() ? 'create' : 'update') . (!$form_lang->getObject()->isNew() ? '?slideshow_idslideshow=' . $form_lang->getObject()->getSlideshowIdslideshow() . '&bpcms_lang_install_signature=' . $form_lang->getObject()->getBpcmsLangInstallSignature() : '')) ?>"
        method="post" <?php $form_lang->isMultipart() and print 'enctype="multipart/form-data" ' ?>
        class="form-horizontal">
    <?php if (!$form_lang->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put"/>
    <?php endif; ?>
    <?php echo $form_lang->renderHiddenFields(false) ?>
    <?php echo $form_lang->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form_lang['lang_file_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_file_name']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form_lang->getObject()->getLangFileName() != ''): ?>
                <?php echo image_tag('slideshow/' . $form_lang->getObject()->getLangFileName()) ?>
            <?php else: ?>
                <?php echo $form_lang['lang_file_name'] ?>
            <?php endif; ?>
            <span class="help-inline"><?php echo $form_lang['lang_file_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_body_h1']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_body_h1']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_body_h1'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_body_h1']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_body_link']->renderErrorClass() ?>">
        <label class="control-label"
               for="inputWarning"><?php echo $form_lang['lang_body_link']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_body_link'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_body_link']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'slideshow/edit?idslideshow=' . $form_lang->getObject()->getSlideshowIdslideshow(), array('class' => 'btn')) ?>
    </div>
    <?php echo $form_lang['slideshow_idslideshow'] ?>
    <input name="bpcms_slideshow_i18n[bpcms_lang_install_signature]" value="<?php echo $signature ?>"
           type="hidden">
</form>