<h1>Gallery catalogs List</h1>

<table>
  <thead>
    <tr>
      <th>Idgallery catalog</th>
      <th>Catalog name</th>
      <th>No category</th>
      <th>Publication</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($gallery_catalogs as $gallery_catalog): ?>
    <tr>
      <td><a href="<?php echo url_for('galleryCatalog/edit?idgallery_catalog='.$gallery_catalog->getIdgalleryCatalog()) ?>"><?php echo $gallery_catalog->getIdgalleryCatalog() ?></a></td>
      <td><?php echo $gallery_catalog->getCatalogName() ?></td>
      <td><?php echo $gallery_catalog->getNoCategory() ?></td>
      <td><?php echo $gallery_catalog->getPublication() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('galleryCatalog/new') ?>">New</a>
