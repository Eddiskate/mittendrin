<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('bpcmsLangInstall/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?signature=' . $form->getObject()->getSignature() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['name'] ?>
            <span class="help-inline"><?php echo $form['name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['signature']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['signature']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['signature'] ?>
            <span class="help-inline"><?php echo $form['signature']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['lang_icons']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['lang_icons']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form->getObject()->getLangIcons() != ''): ?>
                <?php echo image_tag('lang_icons/' . $form->getObject()->getLangIcons()) ?>
                <?php echo link_to('usuń ikone', 'bpcmsLangInstall/removeicons?signature='.$form->getObject()->getSignature()) ?>
            <?php else: ?>
                <?php echo $form['lang_icons'] ?>
            <?php endif; ?>
            <span class="help-inline"><?php echo $form['lang_icons']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['active']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['active']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['active'] ?>
            <span class="help-inline"><?php echo $form['active']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['publication']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['publication']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['publication'] ?>
            <span class="help-inline"><?php echo $form['publication']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'bpcmsLangInstall/index', array('class' => 'btn')) ?>
    </div>
</form>
