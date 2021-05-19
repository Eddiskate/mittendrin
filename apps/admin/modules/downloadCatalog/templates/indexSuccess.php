<h1>Download catalogs List</h1>

<table>
  <thead>
    <tr>
      <th>Iddownload catalog</th>
      <th>Name</th>
      <th>Publication</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($download_catalogs as $download_catalog): ?>
    <tr>
      <td><a href="<?php echo url_for('downloadCatalog/edit?iddownload_catalog='.$download_catalog->getIddownloadCatalog()) ?>"><?php echo $download_catalog->getIddownloadCatalog() ?></a></td>
      <td><?php echo $download_catalog->getName() ?></td>
      <td><?php echo $download_catalog->getPublication() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('downloadCatalog/new') ?>">New</a>
