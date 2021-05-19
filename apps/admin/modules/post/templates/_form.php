<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('post/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idpost=' . $form->getObject()->getIdpost() : '')) ?>"
      method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put"/>
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
    <input type="hidden" name="post[created_at]" value="<?php echo time() ?>"></input>
    <input type="hidden" name="post[users_idusers]" value="<?php echo $sf_user->getAttribute('idusers') ?>"></input>
    <div class="control-group <?php echo $form['post_catalog_idpost_catalog']->renderErrorClass() ?>">
        <label class="control-label"
               for="inputWarning"><?php echo $form['post_catalog_idpost_catalog']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['post_catalog_idpost_catalog'] ?>
            <span class="help-inline"><?php echo $form['post_catalog_idpost_catalog']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['title'] ?>
            <span class="help-inline"><?php echo $form['title']->renderError() ?></span>
        </div>
    </div>
    <!--    <div class="control-group --><?php //echo $form['title_recommended']->renderErrorClass() ?><!--">-->
    <!--        <label class="control-label" for="inputWarning">-->
    <?php //echo $form['title_recommended']->renderLabel() ?><!--</label>-->
    <!--        <div class="controls">-->
    <!--            --><?php //echo $form['title_recommended'] ?>
    <!--            <span class="help-inline">--><?php //echo $form['title_recommended']->renderError() ?><!--</span>-->
    <!--        </div>-->
    <!--    </div>-->
    <div class="control-group <?php echo $form['title_header']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['title_header']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['title_header'] ?>
            <span class="help-inline"><?php echo $form['title_header']->renderError() ?></span>
        </div>
    </div>
    <div class="row-fluid">
        <div class="alert alert-block alert-error fade in">
            <p>Pierwszy akapit postu max 160 znaków!!!</p>
        </div>
    </div>
    <div class="control-group <?php echo $form['description']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['description']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['description'] ?>
            <span class="help-inline"><?php echo $form['description']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['created_at']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['created_at']->renderLabel() ?></label>
        <div class="controls">
            <div class="input-append date" id="post_created_at" data-date="<?php echo date('Y-m-d') ?>"
                 data-date-format="yyyy-mm-dd">
                <input size="25" type="text"
                       value="<?php echo date('Y-m-d', $form->getObject()->getCreatedAt() ? $form->getObject()->getCreatedAt() : time()) ?>"
                       name="post[created_at]">
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
            <span class="help-inline"><?php echo $form['created_at']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['option_title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['option_title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['option_title'] ?>
            <span class="help-inline"><?php echo $form['option_title']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['avatar']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['avatar']->renderLabel() ?></label>
        <div class="controls">
            <?php if ($form->getObject()->getAvatar() != ''): ?>
                <div><?php echo image_tag('post/thumbs/' . $form->getObject()->getAvatar(), array('class' => 'img-polaroid')) ?></div>
                <div><?php echo link_to('usuń zdjęcie', 'post/removeavatar?idpost=' . $form->getObject()->getIdpost(), array('class' => 'btn btn-danger btn-mini')) ?></div>
                <input type="hidden" name="post[avatar]" value="<?php echo $form->getObject()->getAvatar() ?>">
            <?php else: ?>
                <?php echo $form['avatar'] ?> <span class="lub">lub</span> <input type="text" name="post[avatar_db]"
                                                                                  value="" class="avatar_db"></input> <a
                        href="#myModal" role="button" class="btn" data-toggle="modal">wybierz z bazy</a>
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
    <div class="control-group <?php echo $form['recommended']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['recommended']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['recommended'] ?>
            <span class="help-inline"><?php echo $form['recommended']->renderError() ?></span>
        </div>
    </div>
    <?php if ($sf_params->get('action') == 'edit' || $sf_params->get('action') == 'update'): ?>
    <div class="control-group <?php echo $form['avatar']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['avatar']->renderLabel() ?></label>
        <div class="controls">
            <p>
                <a href="<?php echo url_for('gallery/add?idpost=' . $sf_params->get('idpost')) ?>"
                   class="btn btn-mini btn-success">Dodaj zdjęcia</a>
                <span style="margin-top: 5px;">lub</span>
                <a href="#myModal" role="button" class="btn btn-mini btn-info" data-toggle="modal">wybierz zdjecie z
                    biblioteki</a>
            </p>
            <ul class="bp-table sortable-list-x-y ui-sortable gallery-list" data-db-table="Gallery">
                <?php foreach ($form->getObject()->getGallerys() as $lp => $gallery): ?>
                    <li style="position: relative;" class="sortable-item">
                        <img src="/images/gallery/thumbs/<?php echo $gallery['file_name'] ?>"
                             class="img-responsive img-rounded" style="height: 100px;">
                        <p style="margin-top: 3px;">
                            <?php echo link_to('usuń', 'gallery/delete?idgallery=' . $gallery['idgallery'], array('class' => 'btn btn-mini btn-danger', 'confirm' => 'Delete file?', 'method' => 'delete')) ?>
                            <a href="#" class="btn btn-mini jq-gallery-file-options-btn"
                               data-idgallery="<?php echo $gallery['idgallery'] ?>">opcje</a>
                            <?php if ($gallery['default_gallery'] == 1): ?>
                                <span class="badge" style="position: absolute;top: 5px;left: 5px;">miniaturka</span>
                            <?php endif; ?>
                        </p>
                        <input type="hidden"
                               name="<?php echo $gallery['idgallery'] ?>"
                               value="<?php echo $lp + 1 ?>" data-table="Galllery"/>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <hr>
    <?php include_component('post', 'postTags') ?>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'post/index', array('class' => 'btn')) ?>
    </div>
</form>

<style>
    .sortable-list li {
        border-bottom: none;
        display: inline-block;
        width: 144px;
    }

    .ui-state-highlight {
        width: 144px;
        height: 100px;
        background-color: grey;
    }
</style>