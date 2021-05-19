<h1>Youtube - filmy katalog</h1>
<p><a href="<?php echo url_for('bpcmsYtCatalog/new') ?>" class="btn btn-mini btn-success">Dodaj nowy katalog</a></p>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="160">Opcje</th>
            <th>Nazwa</th>
            <th width="130">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bpcms_yt_catalogs as $bpcms_yt_catalog): ?>
            <tr>
                <td>
                    <a href="<?php echo url_for('bpcmsYtCatalog/edit?idbpcms_yt_catalog=' . $bpcms_yt_catalog->getIdbpcmsYtCatalog()) ?>" class="btn btn-info btn-mini">edycja</a>
                    <?php echo link_to('usuń', 'bpcmsYtCatalog/delete?idbpcms_yt_catalog=' . $bpcms_yt_catalog->getIdbpcmsYtCatalog(), array('confirm' => 'Usuń?', 'method' => 'delete', 'class' => 'btn btn-danger btn-mini')) ?>
                    <?php echo link_to('pokaż filmy', 'bpcmsYtMovies/list?idbpcms_yt_catalog=' . $bpcms_yt_catalog->getIdbpcmsYtCatalog(), array('class' => 'btn btn-mini')) ?>
                </td>
                <td><?php echo $bpcms_yt_catalog->getName() ?></td>
                <td><?php echo $bpcms_yt_catalog->getStatus() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

