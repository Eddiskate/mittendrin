<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form
    action="<?php echo url_for('radioStationSchedule/' . ($form->getObject()->isNew() ? 'create?idradio_station='.$sf_params->get('idradio_station') : 'update') . (!$form->getObject()->isNew() ? '?idradio_station_schedule=' . $form->getObject()->getIdradioStationSchedule() : '')) ?>"
    method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put"/>
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
    <div class="control-group <?php echo $form['broadcast_hour']->renderErrorClass() ?>">
        <label class="control-label" for="inputWarning"><?php echo $form['broadcast_hour']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['broadcast_hour'] ?>
            <span class="help-inline"><?php echo $form['broadcast_hour']->renderError() ?></span>
        </div>
    </div>
    <div class="control-group <?php echo $form['broadcast_day_a_week']->renderErrorClass() ?>">
        <label class="control-label"
               for="inputWarning"><?php echo $form['broadcast_day_a_week']->renderLabel() ?></label>
        <div class="controls">
            <?php echo $form['broadcast_day_a_week'] ?>
            <span class="help-inline"><?php echo $form['broadcast_day_a_week']->renderError() ?></span>
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
    <?php echo $form['radio_station_idradio_station'] ?>
</form>
