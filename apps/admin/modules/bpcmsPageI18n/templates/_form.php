<?php use_stylesheets_for_form($form_lang) ?>
<?php use_javascripts_for_form($form_lang) ?>

<form action="<?php echo url_for('bpcmsPageI18n/' . ($form_lang->getObject()->isNew() ? 'create' : 'update') . (!$form_lang->getObject()->isNew() ? '?page_idpage=' . $form_lang->getObject()->getPageIdpage() . '&bpcms_lang_install_signature=' . $form_lang->getObject()->getBpcmsLangInstallSignature() : '')) ?>" method="post" <?php $form_lang->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form_lang->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form_lang->renderHiddenFields(false) ?>
    <div class="control-group <?php echo $form_lang['lang_page_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_page_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_page_name'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_page_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_page_name_url']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_page_name_url']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_page_name_url'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_page_name_url']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_page_title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_page_title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_page_title'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_page_title']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_body']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_body']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_body'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_body']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'cart/index', array('class' => 'btn')) ?>
    </div>        
    <?php echo $form_lang['page_idpage'] ?>        
    <input name="bpcms_page_i18n[bpcms_lang_install_signature]" value="<?php echo $signature ?>" type="hidden">
</form>
