<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('bpcmsTopLayer/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idbpcms_top_layer=' . $form->getObject()->getIdbpcmsTopLayer() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
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
    <div class="control-group <?php echo $form['file_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['file_name']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form->getObject()->getFileName() != ''): ?>
                <?php echo image_tag('toplayer/'.$form->getObject()->getFileName(), array('width' => 200, 'class' => 'img-polaroid')) ?>
            <?php else: ?>
                <?php echo $form['file_name'] ?>            
            <?php endif; ?>            
            <span class="help-inline"><?php echo $form['file_name']->renderError() ?></span>
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
        <?php echo link_to('Wróć do listy', 'bpcmsTopLayer/index', array('class' => 'btn')) ?>
    </div>
</form>
