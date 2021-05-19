<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('bpcmsYtMovies/' . ($form->getObject()->isNew() ? 'create?idbpcms_yt_catalog=' . $sf_params->get('idbpcms_yt_catalog') : 'update') . (!$form->getObject()->isNew() ? '?idbpcms_yt_movies=' . $form->getObject()->getIdbpcmsYtMovies() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
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
                <div><?php echo image_tag('yt_movies/' . $form->getObject()->getAvatar(), array('class' => 'img-polaroid', 'style' => 'height: 300px;')) ?></div>
                <div><?php echo link_to('usuń zdjęcie', 'bpcmsYtMovies/removeavatar?idbpcms_yt_movies=' . $form->getObject()->getIdbpcmsYtMovies(), array('class' => 'btn btn-danger btn-mini')) ?></div>
                <input type="hidden" name="bpcms_yt_movies[avatar]" value="<?php echo $form->getObject()->getAvatar() ?>">
            <?php else: ?>
                <?php echo $form['avatar'] ?> <span class="lub">lub</span> <input type="text" name="post[avatar_db]" value="" class="avatar_db"></input> <a href="#myModal" role="button" class="btn" data-toggle="modal">wybierz z bazy</a>           
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
    <div class="control-group <?php echo $form['youtube_iframe']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['youtube_iframe']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['youtube_iframe'] ?>
            <span class="help-inline"><?php echo $form['youtube_iframe']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['recommended']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['recommended']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['recommended'] ?>
            <span class="help-inline"><?php echo $form['recommended']->renderError() ?></span>
        </div>
    </div>
    <?php if ($form->getObject()->isNew()): ?>
        <?php echo $form['bpcms_yt_catalog_idbpcms_yt_catalog'] ?>
    <?php else: ?>
        <div class="control-group <?php echo $form['bpcms_yt_catalog_idbpcms_yt_catalog']->renderErrorClass() ?>">
            <label class="control-label" for="inputWarning"><?php echo $form['bpcms_yt_catalog_idbpcms_yt_catalog']->renderLabel() ?></label>
            <div class="controls">
                <?php echo $form['bpcms_yt_catalog_idbpcms_yt_catalog'] ?>
                <span class="help-inline"><?php echo $form['bpcms_yt_catalog_idbpcms_yt_catalog']->renderError() ?></span>
            </div>
        </div>
    <?php endif; ?>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'bpcmsYtMovies/index', array('class' => 'btn')) ?>
    </div>
    <?php echo $form['created_at'] ?>
</form>
