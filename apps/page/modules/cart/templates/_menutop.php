<ul class="sidebar__nav clearfix">
    <li class="sidebar__dropdown">
        <?php echo link_to(LANG_POST_LINK_NAME . ' <span class="caret"></span>', ($sf_params->get('culture') ? '/' . $sf_params->get('culture') : '') . '/wydarzenia.html', array('title' => LANG_POST_LINK_TITLE, 'class' => $post_active_class.' sidebar__link')) ?></b>
        <ul class="sidebar__dropdown-menu">
            <?php foreach ($post_catalogs as $post_catalog): ?>
                <li><?php echo link_to($post_catalog->getLangName(), $post_catalog->getLinkUrl(), array('title' => $post_catalog->getLangName(), 'class' => 'sidebar__link')) ?></li>
            <?php endforeach ?>
        </ul>
    </li>
    <?php foreach ($carts as $key => $cart): ?>
        <li class="sidebar__dropdown">
            <?php echo link_to($cart->getLangCartName(), $cart->getLinkUrl(), array('title' => $cart->getCartName(), 'class' => $cart->hasActiveClass() . ' sidebar__link')) ?>
            <ul class="sidebar__dropdown-menu">
                <?php foreach ($cart->getPagelist() as $page): ?>
                    <?php if ($page->getPageName() != 'default_page'): ?>
                        <li>
                            <?php echo link_to($page->getPageName(), ($sf_params->get('culture') ? '/' . $sf_params->get('culture') : '') . '/page/' . $page->getIdpage() . '/' . $page->getNameForLink() . '.html', array('title' => $page->getPageName())) ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>

