<h1 class="title">Aktualności</h1>
<a href="<?php echo url_for('post/new') ?>" class="btn btn-success btn-mini">Dodaj nowy post</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Opcje</th>
      <th>Tytuł</th>
      <th>Data utworzenia</th>
      <th>Pokaż na stronie</th>
      <th>Mittendrin poleca</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($posts as $post): ?>
    <tr>
      <td>
          <a href="<?php echo url_for('post/edit?idpost='.$post->getIdpost()) ?>" class="btn btn-info btn-mini">edycja postu</a>
          <?php echo link_to('usuń', 'post/delete?idpost='.$post->getIdpost(), array('method' => 'delete', 'confirm' => 'Usuń post?', 'class' => 'btn btn-danger btn-mini')) ?>
      </td>
      <td><?php echo $post->getTitle() ?></td>
      <td><?php echo $post->getCreatedTime() ?></td>
      <td><?php echo $post->getStatusPublication() ?></td>
      <td><?php echo $post->getStatusRecommended() ?></td>
    </tr>
    <?php endforeach; ?>
	<?php if(!isset($post)): ?>
	<tr>
		<td colspan="6" align="center">Brak dodanych aktualności.</td>
	</tr>
	<?php endif; ?>
  </tbody>
</table>

  
