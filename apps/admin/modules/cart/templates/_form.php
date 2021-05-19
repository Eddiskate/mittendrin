<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cart/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?idcart=' . $form->getObject()->getIdcart() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
    <div class="control-group <?php echo $form['cart_name']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['cart_name']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['cart_name'] ?>
            <span class="help-inline"><?php echo $form['cart_name']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['name_url']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['name_url']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['name_url'] ?>
            <span class="help-inline"><?php echo $form['name_url']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['title_alt']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['title_alt']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['title_alt'] ?>
            <span class="help-inline"><?php echo $form['title_alt']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['title_page']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['title_page']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['title_page'] ?>
            <span class="help-inline"><?php echo $form['title_page']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['cart_name_title']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['cart_name_title']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['cart_name_title'] ?>
            <span class="help-inline"><?php echo $form['cart_name_title']->renderError() ?></span>
        </div>
    </div>        
    <div class="control-group <?php echo $form['redirect_to_url']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['redirect_to_url']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['redirect_to_url'] ?> <?php echo $form['redirect_to_url_blank_open'] ?> otwórz w nowym oknie
            <span class="help-inline"><?php echo $form['redirect_to_url']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['no_page']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['no_page']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['no_page'] ?>
            <span class="help-inline"><?php echo $form['no_page']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['publication']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['publication']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['publication'] ?>
            <span class="help-inline"><?php echo $form['publication']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['position']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['position']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['position'] ?>
            <span class="help-inline"><?php echo $form['position']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['position_row']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['position_row']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['position_row'] ?>
            <span class="help-inline"><?php echo $form['position_row']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['link_active']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['link_active']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['link_active'] ?>
            <span class="help-inline"><?php echo $form['link_active']->renderError() ?></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Zapisz zmianny</button>
        <?php echo link_to('Wróć do listy', 'cart/index', array('class' => 'btn')) ?>
    </div>
    <input type="hidden" name="cart[position_order]" value="<?php echo $form->getObject()->getPositionOrder() ?>"></input>
</form>
