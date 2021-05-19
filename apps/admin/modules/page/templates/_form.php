<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<form action="<?php echo url_for('page/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idpage=' . $form->getObject()->getIdpage() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['page_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['page_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['page_name'] ?>
            <span class="help-inline"><?php echo $form['page_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['page_name_url']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['page_name_url']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['page_name_url'] ?>
            <span class="help-inline"><?php echo $form['page_name_url']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['page_title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['page_title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['page_title'] ?>
            <span class="help-inline"><?php echo $form['page_title']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['body']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['body']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['body'] ?>
            <span class="help-inline"><?php echo $form['body']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['position_row']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['position_row']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['position_row'] ?>
            <span class="help-inline"><?php echo $form['position_row']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['redirect_to_url']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['redirect_to_url']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['redirect_to_url'] ?> <?php echo $form['redirect_to_url_blank_open'] ?> otwórz w nowym oknie
            <span class="help-inline"><?php echo $form['redirect_to_url']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['cart_idcart']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['cart_idcart']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['cart_idcart'] ?>
            <span class="help-inline"><?php echo $form['cart_idcart']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['publication']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['publication']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['publication'] ?>
            <span class="help-inline"><?php echo $form['publication']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['rows']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['rows']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['rows'] ?>
            <span class="help-inline"><?php echo $form['rows']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['page_default']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['page_default']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['page_default'] ?>
            <span class="help-inline"><?php echo $form['page_default']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'cart/index', array('class' => 'btn')) ?>
    </div>        
</form>

