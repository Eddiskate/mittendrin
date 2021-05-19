<?php echo link_to('poprzednia strona', 'gallery/index', array('class' => 'btn btn-mini')) ?>
<h1 class="title">Galeria: <?php echo $gallery_catalog->getCatalogName() ?> / lista kategorii</h1>
<a href="<?php echo url_for('galleryCategory/new?idgallery_catalog='.$sf_params->get('idgallery_catalog')) ?>" class="btn btn-success btn-mini">Dodaj nową kategorie</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Opcje</th>
      <th>Nazwa kategorii</th>
      <th>Status</th>
      <th>Tag do galleri</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($gallery_categorys as $gallery_category): ?>
    <tr>
      <td>
          <a href="<?php echo url_for('galleryCategory/edit?idgallery_category='.$gallery_category->getIdgalleryCategory()) ?>" class="btn btn-info btn-mini">edycja</a>
          <?php echo link_to('usuń', 'galleryCategory/delete?idgallery_category='.$gallery_category->getIdgalleryCategory(), array('method' => 'delete', 'confirm' => 'Usuń galerie?', 'class' => 'btn btn-danger btn-mini')) ?>
      </td>
      <td><?php echo link_to($gallery_category->getCategoryName(), 'gallery/list?idgallery_category='.$gallery_category->getIdgalleryCategory()) ?></td>
      <td><?php echo $gallery_category->getStatus() ?></td>
      <td><?php echo $gallery_category->getTag() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
