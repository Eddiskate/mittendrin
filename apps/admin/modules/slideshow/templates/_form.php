<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('slideshow/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idslideshow=' . $form->getObject()->getIdslideshow() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>    
    <div class="control-group <?php echo $form['file_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['file_name']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form->getObject()->getFileName() != ''): ?>
                <?php echo image_tag('slideshow/' . $form->getObject()->getFileName()) ?>
            <?php else: ?>
                <?php echo $form['file_name'] ?>            
            <?php endif; ?>            
            <span class="help-inline"><?php echo $form['file_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['body_h1']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['body_h1']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['body_h1'] ?>
            <span class="help-inline"><?php echo $form['body_h1']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['body_link']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['body_link']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['body_link'] ?>
            <span class="help-inline"><?php echo $form['body_link']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['publication']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['publication']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['publication'] ?>
            <span class="help-inline"><?php echo $form['publication']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['default_position']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['default_position']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['default_position'] ?>
            <span class="help-inline"><?php echo $form['default_position']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'slideshow/index', array('class' => 'btn')) ?>
    </div>        
</form>
