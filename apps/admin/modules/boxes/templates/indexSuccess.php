<h1 class="title">Boksy - strona główna</h1>
<ul>
    <li><a href="<?php echo url_for('boxes/new') ?>">Utwórz nowy boks</a></li>
</ul>
<table>
  <thead>
    <tr>
      <th>Opcje</th>
      <th>Tytuł</th>
      <th>Opis</th>
      <th>Zdjęcie</th>
      <th>Przekieruj na adres</th>
      <th>Status</th>
      <th>Pozycja w liście</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($boxess as $boxes): ?>
    <tr>
      <td>
          <a href="<?php echo url_for('boxes/edit?idboxes='.$boxes->getIdboxes()) ?>">edycja</a> | 
          <?php echo link_to('usuń boks', 'boxes/delete?idboxes='.$boxes->getIdboxes(), array('method' => 'delete', 'confirm' => 'Usuń?')) ?>
      </td>
      <td><?php echo $boxes->getTitle() ?></td>
      <td><?php echo $boxes->getDescription() ?></td>
      <td><?php echo $boxes->getImage() ?></td>
      <td><?php echo $boxes->getUrlForPage() ?></td>
      <td><?php echo $boxes->getPublication() ?></td>
      <td><?php echo $boxes->getPositionRow() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
