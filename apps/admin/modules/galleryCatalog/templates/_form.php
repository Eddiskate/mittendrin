<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('galleryCatalog/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idgallery_catalog=' . $form->getObject()->getIdgalleryCatalog() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>        
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['catalog_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['catalog_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['catalog_name'] ?>
            <span class="help-inline"><?php echo $form['catalog_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['no_category']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['no_category']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['no_category'] ?>
            <span class="help-inline"><?php echo $form['no_category']->renderError() ?></span>
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
        <?php echo link_to('Wróć do listy', 'gallery/index', array('class' => 'btn')) ?>
    </div>
</form>
