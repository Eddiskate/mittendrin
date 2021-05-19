<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('bpcmsDiplomas/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idbpcms_diplomas=' . $form->getObject()->getIdbpcmsDiplomas() : '')) ?>"
      method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put"/>
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <div class="control-group <?php echo $form['name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['name'] ?>
            <span class="help-inline"><?php echo $form['name']->renderError() ?></span>
        </div>
    </div>

    <div class="control-group <?php echo $form['title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['title'] ?>
            <span class="help-inline"><?php echo $form['title']->renderError() ?></span>
        </div>
    </div>

    <div class="control-group <?php echo $form['image']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['image']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form->getObject()->getImage() != ''): ?>
                <div><?php echo $form->getObject()->getLinkToOpenPdf() ?>
                <?php echo link_to('usuń', 'bpcmsDiplomas/removePdfFile?idbpcms_diplomas=' . $form->getObject()->getIdbpcmsDiplomas(), array('class' => 'btn btn-danger btn-mini')) ?></div>
                <input type="hidden" name="bpcms_diplomas[image]" value="<?php echo $form->getObject()->getImage() ?>">
            <?php else: ?>
                <?php echo $form['image'] ?>
            <?php endif; ?>
            <span class="help-inline"><?php echo $form['image']->renderError() ?></span>
        </div>
    </div>

    <div class="control-group <?php echo $form['received']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['received']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['received'] ?>
            <span class="help-inline"><?php echo $form['received']->renderError() ?></span>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary"><?php echo LANG_POST_FORM_BTN_SAVE ?></button>
        <?php echo link_to(LANG_POST_FORM_BTN_PREV_PAGE, 'bpcmsDiplomas/index', array('class' => 'btn')) ?>
    </div>
</form>
