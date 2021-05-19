<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('boxes/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?idboxes='.$form->getObject()->getIdboxes() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('boxes/index') ?>">Wróć do listy</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Usuń boks', 'boxes/delete?idboxes='.$form->getObject()->getIdboxes(), array('method' => 'delete', 'confirm' => 'Usuń?')) ?>
          <?php endif; ?>
          <input type="submit" value="Zapisz" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['image']->renderLabel() ?></th>
        <td>
          <?php echo $form['image']->renderError() ?>
          <?php if($form->getObject()->getImage() != ''): ?>
              <?php echo image_tag('boxes/'.$form->getObject()->getImage(), array('width' => 100)) ?>  
          <?php else: ?>  
              <?php echo $form['image'] ?> 
              <b>podpowiedź:</b> plik JPG lub PNG
          <?php endif; ?>  
        </td>
      </tr>
      <tr>
        <th><?php echo $form['url_for_page']->renderLabel() ?></th>
        <td>
          <?php echo $form['url_for_page']->renderError() ?>
          <?php echo $form['url_for_page'] ?> <b>podpowiedź:</b> adres podajemy z <b>http://</b> np http://blackpage.pl
        </td>
      </tr>
      <tr>
        <th><?php echo $form['target']->renderLabel() ?></th>
        <td>
          <?php echo $form['target']->renderError() ?>
          <?php echo $form['target'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['publication']->renderLabel() ?></th>
        <td>
          <?php echo $form['publication']->renderError() ?>
          <?php echo $form['publication'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['show_homepage']->renderLabel() ?></th>
        <td>
          <?php echo $form['show_homepage']->renderError() ?>
          <?php echo $form['show_homepage'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['show_page']->renderLabel() ?></th>
        <td>
          <?php echo $form['show_page']->renderError() ?>
          <?php echo $form['show_page'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['position_row']->renderLabel() ?></th>
        <td>
          <?php echo $form['position_row']->renderError() ?>
          <?php echo $form['position_row'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
