<h1 class="title">Dostępne języki</h1>
<ul>
    <li><a href="<?php echo url_for('bpcmsLangInstall/new') ?>">Zainstaluj nowy język</a></li>
</ul>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Opcje</th>
            <th>Nazwa</th>
            <th>Sygnatura języka</th>
            <th>Domyślny</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bpcms_lang_installs as $bpcms_lang_install): ?>
            <tr>
                <td>
                    <a href="<?php echo url_for('bpcmsLangInstall/edit?signature=' . $bpcms_lang_install->getSignature()) ?>" class="btn btn-info btn-mini">edycja</a>
                    <?php echo link_to('usuń', 'bpcmsLangInstall/delete?signature=' . $bpcms_lang_install->getSignature(), array('method' => 'delete', 'confirm' => 'Usuń: język oraz wszystkie zawarte w nim tłumaczenia strony?', 'class' => 'btn btn-danger btn-mini')) ?>
                </td>
                <td><?php echo $bpcms_lang_install->getName() ?></td>
                <td><?php echo $bpcms_lang_install->getSignature() ?></td>
                <td><?php echo $bpcms_lang_install->getDefaultLang() ?></td>
                <td><?php echo $bpcms_lang_install->getStatus() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


