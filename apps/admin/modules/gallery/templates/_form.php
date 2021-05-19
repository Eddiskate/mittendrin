<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('gallery/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idgallery=' . $form->getObject()->getIdgallery() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['file_title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['file_title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['file_title'] ?>
            <span class="help-inline"><?php echo $form['file_title']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['file_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['file_name']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form->getObject()->getFileName() != ''): ?>
                <p><?php echo image_tag('gallery/thumbs/' . $form->getObject()->getFileName(), array('style' => 'width: 160px;height: 160px;', 'class' => 'img-polaroid')) ?></p>
            <?php else: ?>
                <?php echo $form['file_name'] ?>            
            <?php endif; ?>            
            <span class="help-inline"><?php echo $form['file_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['redirect_to_url']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['redirect_to_url']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['redirect_to_url'] ?>
            <span class="help-inline"><?php echo $form['redirect_to_url']->renderError() ?></span>
        </div>
    </div>        
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'gallery/list?idgallery_category=' .($form->getObject()->getGalleryCategoryIdgalleryCategory() ? $form->getObject()->getGalleryCategoryIdgalleryCategory() : $sf_params->get('idgallery_category')) , array('class' => 'btn')) ?>
    </div>
    <input type="hidden" name="gallery[gallery_category_idgallery_category]" value="<?php echo ($form->getObject()->getGalleryCategoryIdgalleryCategory() ? $form->getObject()->getGalleryCategoryIdgalleryCategory() : $sf_params->get('idgallery_category')) ?>"></input>
</form>