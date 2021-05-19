<h1>Użytkownicy</h1>

<a href="<?php echo url_for('users/new') ?>" class="btn btn-success btn-mini">Dodaj nowego użytkownika</a>
<table class="table table-striped">
<thead>
    <tr>
        <th>Opcje</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Adres e-mail</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($userss as $users): ?>
        <tr>
            <td>
                <a href="<?php echo url_for('users/edit?idusers=' . $users->getIdusers()) ?>" class="btn btn-info btn-mini">edycja</a>
                <a href="<?php echo url_for('users/delete?idusers=' . $users->getIdusers()) ?>" class="btn btn-danger btn-mini" confirm="usuń?" method="delete">edycja</a>
            </td>
            <td><?php echo $users->getName() ?></td>
            <td><?php echo $users->getLastname() ?></td>
            <td><?php echo $users->getMail() ?></td>
            <td><?php if($users->getActive() == 1): ?>aktywne<?php else: ?>zablokowane<?php endif; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>

