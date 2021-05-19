<h1>Youtube - filmy: katalog <?php echo $bpcms_yt_catalog->getName() ?></h1>
<p><a href="<?php echo url_for('bpcmsYtMovies/index') ?>" class="btn btn-mini">wróć do listy</a> <a href="<?php echo url_for('bpcmsYtMovies/new?idbpcms_yt_catalog='.$sf_params->get('idbpcms_yt_catalog')) ?>" class="btn btn-mini btn-success">Dodaj nowy film</a></p>
<table class="table table-striped">
  <thead>
    <tr>
      <th width="100">Opcje</th>
      <th>Tytuł</th>      
      <th width="140">Data utworzenia</th>
      <th width="140">Status</th>
      <th width="140">Polecane</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_yt_moviess as $bpcms_yt_movies): ?>
    <tr>
      <td>
          <a href="<?php echo url_for('bpcmsYtMovies/edit?idbpcms_yt_movies='.$bpcms_yt_movies->getIdbpcmsYtMovies()) ?>" class="btn btn-mini btn-info">edycja</a>
          <?php echo link_to('usuń', 'bpcmsYtMovies/delete?idbpcms_yt_movies='.$bpcms_yt_movies->getIdbpcmsYtMovies(), array('confirm' => 'usuń?', 'method' => 'delete', 'class' => 'btn btn-mini btn-danger')) ?>
      </td>
      <td><?php echo $bpcms_yt_movies->getTitle() ?></td>
      <td><?php echo date('Y-m-d H:i:s', $bpcms_yt_movies->getCreatedAt()) ?></td>
      <td><?php echo $bpcms_yt_movies->getStatus() ?></td>
      <td><?php echo $bpcms_yt_movies->getStatusRecommended() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
