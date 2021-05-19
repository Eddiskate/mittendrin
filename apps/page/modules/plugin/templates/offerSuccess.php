<?php foreach ($pagess as $page): ?>
    <h3><?php echo $page->getPageTitle() ?></h3>
    <?php echo $page->getBody() ?>
<?php endforeach; ?>