<h3>Galeria</h3>
<a href="<?php echo url_for('galleryCatalog/new') ?>" class="btn btn-success btn-mini">Dodaj nowy katalog galerii</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Opcje</th>
            <th>Nazwa katalogu</th>
            <th>Posiada kategorie</th>
            <th>Status</th>
            <th>TAG do galerii</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($gallery_catalogs as $gallery_catalog): ?>
            <tr>
                <td>
                    <a href="<?php echo url_for('galleryCatalog/edit?idgallery_catalog=' . $gallery_catalog->getIdgalleryCatalog()) ?>" class="btn btn-info btn-mini">edycja</a>
                    <?php echo link_to('usuń', 'galleryCatalog/delete?idgallery_catalog=' . $gallery_catalog->getIdgalleryCatalog(), array('method' => 'delete', 'confirm' => 'Usuń katalog, kategorie oraz zdjęcia?', 'class' => 'btn btn-danger btn-mini')) ?>
                </td>
                <td><?php echo $gallery_catalog->getNameLink() ?></td>
                <td><?php if ($gallery_catalog->getNoCategory() == 1): ?>nie<?php else: ?>tak<?php endif; ?></td>
                <td><?php if ($gallery_catalog->getPublication() == 1): ?>widoczny na stronie<?php else: ?>ukryty<?php endif; ?></td>
                <td><?php echo $gallery_catalog->getTag() ?></td>
            </tr>
        <?php endforeach; ?>
        <?php if (!isset($gallery_catalog)): ?>
            <tr>
                <td colspan="4" align="center">Brak dodanych katalogów w galleri.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

