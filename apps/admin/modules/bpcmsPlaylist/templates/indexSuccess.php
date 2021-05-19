<h1>Radio - playlista</h1>
<a href="<?php echo url_for('bpcmsPlaylist/new') ?>" class="btn btn-success btn-mini">Dodaj nową pozycję</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Opcje</th>
      <th>Pokaż na stronie</th>
      <th>Tytuł</th>
      <th>Program</th>
      <th>Adres URL</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_playlists as $bpcms_playlist): ?>
    <tr>
      <td width="100">
          <a href="<?php echo url_for('bpcmsPlaylist/edit?idbpcms_playlist='.$bpcms_playlist->getIdbpcmsPlaylist()) ?>" class="btn btn-info btn-mini">edycja</a>
          <?php echo link_to('usuń', 'bpcmsPlaylist/delete?idbpcms_playlist='.$bpcms_playlist->getIdbpcmsPlaylist(), array('confirm' => 'usuń?', 'method' => 'delete', 'class' => 'btn btn-mini btn-danger')) ?>
      </td>
      <td><?php echo $bpcms_playlist->getPage()->getPageName() ?></td>
      <td><?php echo $bpcms_playlist->getPlateTitle() ?></td>
      <td><?php echo $bpcms_playlist->getPlateArtist() ?></td>
      <td><?php echo $bpcms_playlist->getPlateFile() ?></td>
      <td><?php echo $bpcms_playlist->getStatus() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
