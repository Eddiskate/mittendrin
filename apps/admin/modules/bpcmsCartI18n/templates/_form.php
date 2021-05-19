<?php use_stylesheets_for_form($form_lang) ?>
<?php use_javascripts_for_form($form_lang) ?>

<form action="<?php echo url_for('bpcmsCartI18n/' . ($form_lang->getObject()->isNew() ? 'create' : 'update') . (!$form_lang->getObject()->isNew() ? '?cart_idcart=' . $form_lang->getObject()->getCartIdcart() . '&bpcms_lang_install_signature=' . $form_lang->getObject()->getBpcmsLangInstallSignature() : '')) ?>" method="post" <?php $form_lang->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form_lang->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form_lang->renderHiddenFields(false) ?>
    <div class="control-group <?php echo $form_lang['lang_cart_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_cart_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_cart_name'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_cart_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['name_url']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['name_url']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['name_url'] ?>
            <span class="help-inline"><?php echo $form_lang['name_url']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_title_alt']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_title_alt']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_title_alt'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_title_alt']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_title_page']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_title_page']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_title_page'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_title_page']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form_lang['lang_cart_name_title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form_lang['lang_cart_name_title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form_lang['lang_cart_name_title'] ?>
            <span class="help-inline"><?php echo $form_lang['lang_cart_name_title']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'cart/index', array('class' => 'btn')) ?>
    </div>        
    <?php echo $form_lang['cart_idcart'] ?>        
    <input name="bpcms_cart_i18n[bpcms_lang_install_signature]" value="<?php echo $signature ?>" type="hidden">
</form>
