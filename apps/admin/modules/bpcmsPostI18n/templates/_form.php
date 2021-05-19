<?php use_stylesheets_for_form($form_lang) ?>
<?php use_javascripts_for_form($form_lang) ?>

<form action="<?php echo url_for('bpcmsPostI18n/' . ($form_lang->getObject()->isNew() ? 'create' : 'update') . (!$form_lang->getObject()->isNew() ? '?post_idpost=' . $form_lang->getObject()->getPostIdpost() . '&bpcms_lang_install_signature=' . $form_lang->getObject()->getBpcmsLangInstallSignature() : '')) ?>" method="post" <?php $form_lang->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
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
    <div class="control-group <?php echo $form_lang['lang_title_recommended']->renderErrorClass() ?> hidden">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_title_recommended']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_title_recommended'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_title_recommended']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_title_header']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_title_header']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_title_header'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_title_header']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_description']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_description']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_description'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_description']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'post/index', array('class' => 'btn')) ?>
    </div>        
    <?php echo $form_lang['post_idpost'] ?>        
    <input name="bpcms_post_i18n[bpcms_lang_install_signature]" value="<?php echo $signature ?>" type="hidden">
</form>
