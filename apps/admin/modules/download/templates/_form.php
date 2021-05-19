<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('download/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?iddownload=' . $form->getObject()->getIddownload() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['download_catalog_iddownload_catalog']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['download_catalog_iddownload_catalog']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($sf_params->get('iddownload_catalog') != ''): ?>
                <input type="text" value="<?php echo $download_catalog->getName() ?>" readonly="true">
                <input type="hidden" name="download[download_catalog_iddownload_catalog]" value="<?php echo $download_catalog->getIddownloadCatalog() ?>">
            <?php else: ?>
                <?php echo $form['download_catalog_iddownload_catalog'] ?>            
            <?php endif; ?>
            <span class="help-inline"><?php echo $form['download_catalog_iddownload_catalog']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['title'] ?>
            <span class="help-inline"><?php echo $form['title']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['file_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['file_name']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form->getObject()->getFileName() != ''): ?>
                <?php echo $form->getObject()->getFileName() ?>
            <?php else: ?>
                <?php echo $form['file_name'] ?>            
            <?php endif; ?>            
            <span class="help-inline"><?php echo $form['file_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['url_to_file']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['url_to_file']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['url_to_file'] ?>
            <span class="help-inline"><?php echo $form['url_to_file']->renderError() ?></span>
        </div>
    </div>        
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'download/list?iddownload_catalog='.($form->getObject()->getDownloadCatalogIddownloadCatalog() ? $form->getObject()->getDownloadCatalogIddownloadCatalog() : $sf_params->get('iddownload_catalog')), array('class' => 'btn')) ?>
    </div>
</form>
