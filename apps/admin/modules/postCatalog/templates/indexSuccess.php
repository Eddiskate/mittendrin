<h1>Aktualności, katalogi postów</h1>
<p><a href="<?php echo url_for('postCatalog/new') ?>" class="btn btn-mini btn-success">Utwórz nowy katalog</a></p>
<table class="table table-striped">
    <thead>
    <tr>
        <th width="100">Opcje</th>
        <th>Nazwa katalogu</th>
        <th>Status</th>
        <th>Strona głowna</th>
        <th>Pozycja na stronie</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($post_catalogs as $post_catalog): ?>
        <tr>
            <td>
                <a href="<?php echo url_for('postCatalog/edit?idpost_catalog=' . $post_catalog->getIdpostCatalog()) ?>"
                   class="btn btn-mini btn-info">Edycja</a>
                <?php echo link_to('Usuń', 'postCatalog/delete?idpost_catalog=' . $post_catalog->getIdpostCatalog(), array('method' => 'delete', 'confirm' => 'Usuń katalog oraz wpisy w nim zawartę?', 'class' => 'btn btn-mini btn-danger')) ?>
            </td>
            <td><?php echo $post_catalog->getName() ?></td>
            <td><?php echo $post_catalog->getStatus() ?></td>
            <td><?php echo $post_catalog->getStatusHomepage() ?></td>
            <td><?php echo $post_catalog->getHomepageRow() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

  
