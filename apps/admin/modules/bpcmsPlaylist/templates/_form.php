<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('bpcmsPlaylist/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idbpcms_playlist=' . $form->getObject()->getIdbpcmsPlaylist() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
          <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>  
    <?php echo $form->renderHiddenFields(false) ?>          
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['page_idpage']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['page_idpage']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['page_idpage'] ?>
            <span class="help-inline"><?php echo $form['page_idpage']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['plate_title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['plate_title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['plate_title'] ?>
            <span class="help-inline"><?php echo $form['plate_title']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['plate_artist']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['plate_artist']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['plate_artist'] ?>
            <span class="help-inline"><?php echo $form['plate_artist']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['plate_file']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['plate_file']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['plate_file'] ?>
            <span class="help-inline"><?php echo $form['plate_file']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['plate_cover']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['plate_cover']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['plate_cover'] ?>
            <span class="help-inline"><?php echo $form['plate_cover']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['plate_buy_link']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['plate_buy_link']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['plate_buy_link'] ?>
            <span class="help-inline"><?php echo $form['plate_buy_link']->renderError() ?></span>
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
        <?php echo link_to('Wróć do listy', 'bpcmsPlaylist/index', array('class' => 'btn')) ?>
    </div>
</form>
