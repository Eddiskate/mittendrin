<h1>Album miesiąca</h1>
<a href="<?php echo url_for('bpcmsAlbumMonth/new') ?>" class="btn btn-mini btn-success">Dodaj nowy album</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th width="90">Opcje</th>
      <th>Avatar</th>
      <th>Opis</th>
      <th width="100">Link</th>
      <th width="150">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_album_months as $bpcms_album_month): ?>
    <tr>
      <td>
          <a href="<?php echo url_for('bpcmsAlbumMonth/edit?idbpcms_album_month='.$bpcms_album_month->getIdbpcmsAlbumMonth()) ?>" class="btn btn-mini btn-info">edycja</a>
          <?php echo link_to('usuń', 'bpcmsAlbumMonth/delete?idbpcms_album_month='.$bpcms_album_month->getIdbpcmsAlbumMonth(), array('method' => 'delete', 'confirm' => 'Usuń album?', 'class' => 'btn btn-mini btn-danger')) ?>
      </td>
      <td><?php echo image_tag('album_month/'.$bpcms_album_month->getAvatar(), array('widht' => 150)) ?></td>
      <td>
          <h4><?php echo $bpcms_album_month->getTitle() ?></h4>
          <?php echo $bpcms_album_month->getDescription() ?>
      </td>
      <td><?php echo link_to('link do albumu', $bpcms_album_month->getLink(), array('target' => '_blank')) ?></td>
      <td><?php echo $bpcms_album_month->getStatus() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


