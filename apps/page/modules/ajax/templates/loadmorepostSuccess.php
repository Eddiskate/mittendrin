<?php foreach ($posts as $post): ?>
    <?php include_partial('post/postcontainer', array('post' => $post)) ?>
<?php endforeach; ?>
