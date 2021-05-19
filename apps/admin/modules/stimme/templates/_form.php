<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('stimme/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?idstimme='.$form->getObject()->getIdstimme() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('stimme/index') ?>">Wróć do listy</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Usuń', 'stimme/delete?idstimme='.$form->getObject()->getIdstimme(), array('method' => 'delete', 'confirm' => 'Napewno?')) ?>
          <?php endif; ?>
          <input type="submit" value="Zapisz" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['date']->renderLabel() ?></th>
        <td>
          <?php echo $form['date']->renderError() ?>
          <?php echo $form['date'] ?>
          ( miesiąc / dzień / rok )
        </td>
      </tr>
      <tr>
        <th align="right" valign="top"><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th align="right"><?php echo $form['publication']->renderLabel() ?></th>
        <td>
          <?php echo $form['publication']->renderError() ?>
          <?php echo $form['publication'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  <?php echo $form['webusers_idwebusers'] ?>
  <?php echo $form['created_at'] ?>
</form>
