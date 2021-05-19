<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<p align="left"><?php echo LANG_STIMME_ADD_GREETINGS ?></p>
<form action="<?php echo url_for('stimme/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idstimme=' . $form->getObject()->getIdstimme() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
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
    <div class="control-group <?php echo $form['city']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['city']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['city'] ?>
            <span class="help-inline"><?php echo $form['city']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['occasion']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['occasion']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['occasion'] ?>
            <span class="help-inline"><?php echo $form['occasion']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['description']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['description']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['description'] ?>
            <span class="help-inline"><?php echo $form['description']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['music_service']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['music_service']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['music_service'] ?>
            <span class="help-inline"><?php echo $form['music_service']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['submit_requests']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['submit_requests']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['submit_requests'] ?>
            <span class="help-inline"><?php echo $form['submit_requests']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['publication']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['publication']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['publication'] ?>
            <span class="help-inline"><?php echo $form['publication']->renderError() ?></span>
        </div>
    </div>
    <input type="hidden" name="stimme[webusers_idwebusers]" value="3"></input>
    <input type="hidden" name="stimme[date]" value="<?php echo $sf_params->get('date') ? $sf_params->get('date') : $_POST['stimme']['date'] ?>"></input>
    <div style="margin-left: 219px;">
        &nbsp;<a href="<?php echo url_for('stimme/index') ?>" class="btn"><?php echo LANG_GLOBAL_BTN_CANCEL ?></a>
        <input type="submit" value="<?php echo LANG_STIMME_BTN_SAVE_GREETING ?>" class="btn btn-primary"/>
    </div>
</form>
