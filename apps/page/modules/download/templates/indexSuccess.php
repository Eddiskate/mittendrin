<h1>Downloads List</h1>

<table>
  <thead>
    <tr>
      <th>Iddownload</th>
      <th>File name</th>
      <th>Title</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($downloads as $download): ?>
    <tr>
      <td><a href="<?php echo url_for('download/edit?iddownload='.$download->getIddownload()) ?>"><?php echo $download->getIddownload() ?></a></td>
      <td><?php echo $download->getFileName() ?></td>
      <td><?php echo $download->getTitle() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('download/new') ?>">New</a>
