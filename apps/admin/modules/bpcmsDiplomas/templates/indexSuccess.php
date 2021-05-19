<h1>Oberschlesische Stimme</h1>
<a href="<?php echo url_for('bpcmsDiplomas/new') ?>" class="btn btn-mini btn-success">dodaj nową gazete</a>
<table class="table table-hover">
    <thead>
    <tr>
        <th width="100">Opcje</th>
        <th>Numer gazety</th>
        <th>Tytuł</th>
        <th>Data wydania</th>
        <th>Plik PDF</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($bpcms_diplomass as $bpcms_diplomas): ?>
        <tr>
            <td>
                <a href="<?php echo url_for('bpcmsDiplomas/edit?idbpcms_diplomas=' . $bpcms_diplomas->getIdbpcmsDiplomas()) ?>" class="btn btn-info btn-mini">edycja</a>
                <?php echo link_to('usuń', 'bpcmsDiplomas/delete?idbpcms_diplomas=' . $bpcms_diplomas->getIdbpcmsDiplomas(), array('method' => 'delete', 'confirm' => 'usuń wybraną pozycję?', 'class' => 'btn btn-mini btn-danger')) ?>
            </td>
            <td><?php echo $bpcms_diplomas->getName() ?></td>
            <td><?php echo $bpcms_diplomas->getTitle() ?></td>
            <td><?php echo $bpcms_diplomas->getReceivedFormat() ?></td>
            <td><?php echo $bpcms_diplomas->getLinkToOpenPdf() ?></td>
        </tr>
    <?php endforeach; ?>
    <?php if (!$bpcms_diplomas): ?>
        <tr>
            <td colspan="6">Brak wyników do wyświetlenia.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
