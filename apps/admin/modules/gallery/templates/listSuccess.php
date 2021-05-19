<?php if ($gallery_category != 'no_category'): ?>
    <?php echo link_to('poprzednia strona', 'gallery/category?idgallery_catalog=' . $gallery_category->getGalleryCatalogIdgalleryCatalog(), array('class' => 'btn btn-mini')) ?>
<?php else: ?>
    <?php echo link_to('poprzednia strona', 'gallery/index', array('class' => 'btn btn-mini')) ?>
<?php endif; ?>
<h1 class="title">Galeria: <?php if ($gallery_category != 'no_category'): ?><?php echo $gallery_category->getGalleryCatalog()->getCatalogName() . ' / ' . $gallery_category ?><?php else: ?><?php echo $gallery_category->getGalleryCatalog()->getCatalogName() ?><?php endif; ?></h1>
<p>
    <a href="<?php echo url_for('gallery/add?idgallery_category=' . $gallery_category->getIdgalleryCategory()) ?>" class="btn btn-success btn-mini">Dodaj nowe zdjęcie</a>
</p>
<div class="over">
    <?php foreach ($gallerys as $gallery): ?>
        <div class="fl img-polaroid">
            <p><?php echo image_tag('gallery/thumbs/' . $gallery->getFileName(), array('style' => 'width: 160px;height: 160px;')) ?></p>
            <p align="center">
                <?php echo link_to('edycja', 'gallery/edit?idgallery=' . $gallery->getIdgallery(), array('class' => 'btn btn-info btn-mini')) ?>
                <?php echo link_to('usuń', 'gallery/delete?idgallery=' . $gallery->getIdgallery(), array('method' => 'delete', 'confirm' => 'Napewno?', 'class' => 'btn btn-danger btn-mini')) ?>
            </p>
        </div>
    <?php endforeach; ?>
    <?php if (!isset($gallery)): ?>
        <p align="center">Brak dodanych zdjęć w tej galerii.</p>
    <?php endif; ?>
</div>




