<h1>Toplayer</h1>
<a href="<?php echo url_for('bpcmsTopLayer/new') ?>" class="btn btn-success btn-mini">Dodaj nowy</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Opcje</th>
      <th>Nazwa</th>
      <th>Zdjęcie</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_top_layers as $bpcms_top_layer): ?>
    <tr>
      <td>
          <a href="<?php echo url_for('bpcmsTopLayer/edit?idbpcms_top_layer='.$bpcms_top_layer->getIdbpcmsTopLayer()) ?>" class="btn btn-info btn-mini">edycja</a>
          <?php echo link_to('usuń', 'bpcmsTopLayer/delete?idbpcms_top_layer='.$bpcms_top_layer->getIdbpcmsTopLayer(), array('class' => 'btn btn-danger btn-mini', 'method' => 'delete', 'confirm' => 'Usuń')) ?>
      </td>
      <td><?php echo $bpcms_top_layer->getName() ?></td>
      <td><?php echo image_tag('toplayer/'.$bpcms_top_layer->getFileName(), array('width' => 200, 'class' => 'img-polaroid')) ?></td>
      <td><?php echo $bpcms_top_layer->getStatus() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
