<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('mittendrinStats/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
idmittendrin_stats='.$form->getObject()->getIdmittendrinStats() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('mittendrinStats/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'mittendrinStats/delete?
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
idmittendrin_stats='.$form->getObject()->getIdmittendrinStats(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['ipaddr']->renderLabel() ?></th>
        <td>
          <?php echo $form['ipaddr']->renderError() ?>
          <?php echo $form['ipaddr'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['open']->renderLabel() ?></th>
        <td>
          <?php echo $form['open']->renderError() ?>
          <?php echo $form['open'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['close']->renderLabel() ?></th>
        <td>
          <?php echo $form['close']->renderError() ?>
          <?php echo $form['close'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['http_user_agent']->renderLabel() ?></th>
        <td>
          <?php echo $form['http_user_agent']->renderError() ?>
          <?php echo $form['http_user_agent'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
