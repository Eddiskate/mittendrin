<h1>Pliki:</h1>
<a href="<?php echo url_for('download/new?iddownload_catalog='.$sf_params->get('iddownload_catalog')) ?>" class="btn btn-success btn-mini">Dodaj nowy plik</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Opcje</th>
            <th>Nazwa pliku</th>
            <th>Tytuł</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($downloads as $download): ?>
            <tr>
                <td width="150">
                    <a href="<?php echo url_for('download/edit?iddownload=' . $download->getIddownload()) ?>" class="btn btn-info btn-mini">edycja</a>
                    <?php echo link_to('Usuń', 'download/delete?iddownload=' . $download->getIddownload(), array('method' => 'delete', 'confirm' => 'Napewno?', 'class' => 'btn btn-danger btn-mini')) ?>
                </td>
                <td width="400"><?php echo link_to($download->getTitle(), '/uploads/files/'.$download->getFileName(), array('target' => '_blank')) ?></td>
                <td><?php echo $download->getTitle() ?></td>
            </tr>
        <?php endforeach; ?>
        <?php if (!isset($download)) : ?>
            <tr>
                <td colspan="3" align="center">brak dodanych plików!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


