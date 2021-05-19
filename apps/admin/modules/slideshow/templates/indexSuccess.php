<h1 class="title">Slideshow</h1>
<a href="<?php echo url_for('slideshow/new') ?>" class="btn btn-success btn-mini">Dodaj nowy element</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="200">Zdjęcie</th>
            <th>Opcje</th>
            <th>Tytuł</th>
            <th>Link do strony</th>
            <th>status na stronie</th>
            <th>Pozycja </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($slideshows as $slideshow): ?>
            <tr>
                <td><?php echo image_tag('slideshow/' . $slideshow->getFileName(), array('width' => 200)) ?></td>
                <td width="150">
                    <a href="<?php echo url_for('slideshow/edit?idslideshow=' . $slideshow->getIdslideshow()) ?>" class="btn btn-info btn-mini">edycja</a>
                    <?php echo link_to('Usuń plik', 'slideshow/delete?idslideshow=' . $slideshow->getIdslideshow(), array('method' => 'delete', 'confirm' => 'Napewno?', 'class' => 'btn btn-danger btn-mini')) ?> 
                    <p>Pozycja / kolejność: <?php echo $slideshow->getDefaultPosition() ?></p>
                </td>
                <td width="500">
                    <h5><?php echo $slideshow->getBodyH1() ?></h5>
                    <?php echo $slideshow->getBodyP() ?>
                </td>
                <td><?php echo $slideshow->getBodyLink() ?></td>
                <td width="130"><?php if ($slideshow->getPublication() == 1): ?>tak<?php else: ?>nie<?php endif; ?></td>
                <td width="70"><?php if ($slideshow->getDefaultPosition() == 1): ?>tak<?php else: ?>nie<?php endif; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


