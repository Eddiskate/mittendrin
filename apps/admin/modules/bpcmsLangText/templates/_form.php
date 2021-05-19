<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('bpcmsLangText/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?text_name=' . $form->getObject()->getTextName() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['text_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['text_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['text_name'] ?>
            <span class="help-inline"><?php echo $form['text_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['text_value']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['text_value']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['text_value'] ?>
            <span class="help-inline"><?php echo $form['text_value']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'bpcmsLangText/index', array('class' => 'btn')) ?>
    </div>
</form>
