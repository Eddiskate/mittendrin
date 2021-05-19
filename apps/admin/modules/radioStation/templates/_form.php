<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form
    action="<?php echo url_for('radioStation/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idradio_station=' . $form->getObject()->getIdradioStation() : '')) ?>"
    method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put"/>
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
    <div class="control-group <?php echo $form['title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['title'] ?>
            <span class="help-inline"><?php echo $form['title']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['description']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['description']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['description'] ?>
            <span class="help-inline"><?php echo $form['description']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['avatar']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['avatar']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form->getObject()->getAvatar() != ''): ?>
                <div><?php echo image_tag('radio-station/' . $form->getObject()->getAvatar(), array('class' => 'img-polaroid')) ?></div>
                <div><?php echo link_to('usuń zdjęcie', 'radioStation/removeavatar?idradio_station=' . $form->getObject()->getIdradioStation(), array('class' => 'btn btn-danger btn-mini')) ?></div>
                <input type="hidden" name="radio_station[avatar]" value="<?php echo $form->getObject()->getAvatar() ?>">
            <?php else: ?>
                <?php echo $form['avatar'] ?> <span class="lub">lub</span> <input type="text" name="radio_station[avatar_db]" value="" class="avatar_db"></input> <a href="#myModal" role="button" class="btn" data-toggle="modal">wybierz z bazy</a>
            <?php endif; ?>
            <span class="help-inline"><?php echo $form['avatar']->renderError() ?></span>
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
        <?php echo link_to('Wróć do listy', 'radioStation/index', array('class' => 'btn')) ?>
    </div>
</form>
