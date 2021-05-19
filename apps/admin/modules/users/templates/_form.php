<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('users/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idusers=' . $form->getObject()->getIdusers() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
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
    <div class="control-group <?php echo $form['lastname']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['lastname']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['lastname'] ?>
            <span class="help-inline"><?php echo $form['lastname']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['mail']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['mail']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['mail'] ?>
            <span class="help-inline"><?php echo $form['mail']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['active']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['active']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['active'] ?>
            <span class="help-inline"><?php echo $form['active']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['passwd']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['passwd']->renderLabel() ?></label>
        <div class="controls">
            <?php if($form->getObject()->getPasswd() != ''): ?>
                <?php echo link_to('zmień hasło', 'users/passwdremove?idusers='.$form->getObject()->getIdusers(), array('confirm' => 'Hasło zostanie usunięte! nadaj nowe w celu poprawnego logowania na konto!')) ?>
            <?php else: ?>
                <?php echo $form['passwd'] ?>
            <?php endif; ?>
            <span class="help-inline"><?php echo $form['passwd']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'users/index', array('class' => 'btn')) ?>
    </div>
</form>
