<h1>Chmura tagów</h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th width="40">opcje</th>
            <th>nazwa</th>
            <th>nazwa url</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($post_tagss as $post_tags): ?>
            <tr>
                <td><?php echo link_to('usuń', 'postTags/delete?idpost_tags=' . $post_tags->getIdpostTags(), array('method' => 'delete', 'confirm' => 'usuń?' ,'class' => 'btn btn-mini btn-danger')) ?></td>
                <td><?php echo $post_tags->getName() ?></td>
                <td><?php echo $post_tags->getNameUrl() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
