<div class="p_10">
    <?php if($count_page > 1): ?>
    <h2><?php echo $cart ?></h2>
    <ul>
        <?php foreach ($pages as $page): ?>
            <?php if($page->getPageName() != 'default_page'): ?>
                <li><?php echo link_to($page->getPageName(), '@page?idpage=' . $page->getIdpage() . '&title=' . $page->getNameForLink(), array('title' => $page->getPageName())) ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>