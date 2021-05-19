<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('gallery/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?idgallery='.$form->getObject()->getIdgallery() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('gallery/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'gallery/delete?idgallery='.$form->getObject()->getIdgallery(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['file_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['file_name']->renderError() ?>
          <?php echo $form['file_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['file_title']->renderLabel() ?></th>
        <td>
          <?php echo $form['file_title']->renderError() ?>
          <?php echo $form['file_title'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['gallery_category_idgallery_category']->renderLabel() ?></th>
        <td>
          <?php echo $form['gallery_category_idgallery_category']->renderError() ?>
          <?php echo $form['gallery_category_idgallery_category'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
