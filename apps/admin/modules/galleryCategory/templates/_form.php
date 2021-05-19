<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('galleryCategory/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idgallery_category=' . $form->getObject()->getIdgalleryCategory() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['category_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['category_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['category_name'] ?>
            <span class="help-inline"><?php echo $form['category_name']->renderError() ?></span>
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
        <?php echo link_to('Wróć do listy', 'gallery/category?idgallery_catalog=' . $gallery_category_id, array('class' => 'btn')) ?>
    </div>
    <input type="hidden" name="gallery_category[gallery_catalog_idgallery_catalog]" value="<?php echo $gallery_category_id ?>">
</form>
