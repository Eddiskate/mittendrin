<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form
    action="<?php echo url_for('configuration/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idconfiguration=' . $form->getObject()->getIdconfiguration() : '')) ?>"
    method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put"/>
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['config_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['config_name']->renderLabel() ?></label>

        <div class="controls">
            <?php echo $form['config_name'] ?>
            <span class="help-inline"><?php echo $form['config_name']->renderError() ?></span>
        </div>
    </div>
    <?php if (!$form->getObject()->isNew()): ?>
        <div class="control-group <?php echo $form['config_option']->renderErrorClass() ?>">
            <label class="control-label" for="inputWarning"><?php echo $form['config_option']->renderLabel() ?></label>

            <div class="controls" style="margin-top: 5px;">
                bpcms_<?php echo $form->getObject()->getConfigOption() ?>
                <input type="hidden" name="configuration[config_option]"
                       value="<?php echo $form->getObject()->getConfigOption() ?>"></input>
                <span class="help-inline"><?php echo $form['config_option']->renderError() ?></span>
            </div>
        </div>
    <?php else: ?>
        <div class="control-group <?php echo $form['config_option']->renderErrorClass() ?>">
            <label class="control-label" for="inputWarning"><?php echo $form['config_option']->renderLabel() ?></label>

            <div class="controls">
                <?php echo $form['config_option'] ?>
                <span class="help-inline"><?php echo $form['config_option']->renderError() ?></span>
            </div>
        </div>
    <?php endif; ?>
    <div class="control-group <?php echo $form['config_value']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['config_value']->renderLabel() ?></label>

        <div class="controls">
            <?php echo $form['config_value'] ?>
            <span class="help-inline"><?php echo $form['config_value']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['config_on']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['config_on']->renderLabel() ?></label>

        <div class="controls">
            <?php echo $form['config_on'] ?>
            <span class="help-inline"><?php echo $form['config_on']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'configuration/index', array('class' => 'btn')) ?>
    </div>
</form>
