<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('postTags/' . ($form->getObject()->isNew() ? 'create?idpost=' . $sf_params->get('idpost') : 'update') . (!$form->getObject()->isNew() ? '?idpost_tags=' . $form->getObject()->getIdpostTags() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
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
    <div class="control-group <?php echo $form['name_url']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['name_url']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['name_url'] ?>
            <span class="help-inline"><?php echo $form['name_url']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['post_has_post_tags']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['post_has_post_tags']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['post_has_post_tags'] ?>
            <span class="help-inline"><?php echo $form['post_has_post_tags']->renderError() ?></span>
        </div>
    </div>        
    <div class="form-actions">
        <?php if ($sf_params->get('idpost')): ?>
            <?php echo link_to('Wróć do postu', 'post/edit?idpost=' . $sf_params->get('idpost'), array('class' => 'btn')) ?>
        <?php else: ?>
            <?php echo link_to('Wróć do listy', 'postTags/index', array('class' => 'btn')) ?>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
    </div>  
    <?php echo $form['idpost'] ?>
</form>
