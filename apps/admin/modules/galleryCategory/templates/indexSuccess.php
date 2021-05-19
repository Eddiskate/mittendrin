<h1>Gallery categorys List</h1>

<table>
  <thead>
    <tr>
      <th>Idgallery category</th>
      <th>Category name</th>
      <th>Publication</th>
      <th>Gallery catalog idgallery catalog</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($gallery_categorys as $gallery_category): ?>
    <tr>
      <td><a href="<?php echo url_for('galleryCategory/edit?idgallery_category='.$gallery_category->getIdgalleryCategory()) ?>"><?php echo $gallery_category->getIdgalleryCategory() ?></a></td>
      <td><?php echo $gallery_category->getCategoryName() ?></td>
      <td><?php echo $gallery_category->getPublication() ?></td>
      <td><?php echo $gallery_category->getGalleryCatalogIdgalleryCatalog() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('galleryCategory/new') ?>">New</a>
