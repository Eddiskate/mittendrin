<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('postCatalog/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idpost_catalog=' . $form->getObject()->getIdpostCatalog() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
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
    <div class="control-group <?php echo $form['homepage_publication']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['homepage_publication']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['homepage_publication'] ?>
            <span class="help-inline"><?php echo $form['homepage_publication']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['homepage_row']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['homepage_row']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['homepage_row'] ?>
            <span class="help-inline"><?php echo $form['homepage_row']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['font_color']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['font_color']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['font_color'] ?>
            <span class="help-inline"><?php echo $form['font_color']->renderError() ?></span>
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
        <?php echo link_to('Wr???? do listy', 'postCatalog/index', array('class' => 'btn')) ?>
    </div>

</form>
