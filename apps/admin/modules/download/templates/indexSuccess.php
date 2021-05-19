<h1>Pliki:</h1>
<a href="<?php echo url_for('download/new') ?>" class="btn btn-success btn-mini">Dodaj nowy plik</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Opcje</th>
            <th>Nazwa katalogu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($download_catalogs as $download_catalog): ?>
            <tr>
                <td width="150">
                    <a href="<?php echo url_for('download/edit?iddownload=' . $download_catalog->getIddownloadCatalog()) ?>" class="btn btn-info btn-mini">edycja</a>
                    <?php echo link_to('Usuń', 'download/delete?iddownload=' . $download_catalog->getIddownloadCatalog(), array('method' => 'delete', 'confirm' => 'Napewno?', 'class' => 'btn btn-danger btn-mini')) ?>
                </td>
                <td width="400"><?php echo link_to($download_catalog->getName(), 'download/list?iddownload_catalog='.$download_catalog->getIddownloadCatalog()) ?></td>
            </tr>
        <?php endforeach; ?>
        <?php if (!isset($download_catalog)) : ?>
            <tr>
                <td colspan="3" align="center">brak dodanych plików!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


