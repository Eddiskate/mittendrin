<div class="row container-bottom-cms">
    <div class="col-sm-4">
        <h3><?php echo link_to(LANG_POST_LINK_NAME, '@post', array('title' => LANG_POST_LINK_TITLE, 'class' => '', '' => '')) ?></h3>
        <ul>
            <?php foreach ($post_catalogs as $post_catalog): ?>
                <li><?php echo link_to($post_catalog->getLangName(), $post_catalog->getLinkUrl(), array('title' => $post_catalog->getLangName())) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php foreach ($carts as $cart): ?>
        <?php if (count($cart->getPagelist()) > 1): ?>
            <div class="col-sm-4">
                <?php if ($cart->getLinkActive() == 1): ?>
                    <?php echo $cart->getLangCartName() ?>
                <?php else: ?>
                    <h3>
                        <?php if (strlen($cart->getLinkUrl()) > 0): ?>
                            <?php echo link_to($cart->getLangCartName(), $cart->getLinkUrl(), array('title' => $cart->getCartName())) ?>
                        <?php else: ?>
                            <?php echo $cart->getLangCartName() ?>
                        <?php endif; ?>
                    </h3>
                <?php endif; ?>
                <ul>
                    <?php foreach ($cart->getPagelist() as $page): ?>
                        <?php if ($page->getPageName() != 'default_page'): ?>
                            <li><?php echo link_to($page->getPageName(), ($sf_params->get('culture') ? '/' . $sf_params->get('culture') : '') . '/page/' . $page->getIdpage() . '/' . $page->getNameForLink() . '.html', array('title' => $page->getPageName())) ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="col-sm-4 contact-info-box">
        <h3><a href="/cart/8/kontakt.html">KONTAKT</a></h3>
        <ul class="contact-info">
            <li><?php echo LANG_CONTACT_ADDRESS ?></li>
            <li><?php echo LANG_CONTACT_ZIP_CODE ?></li>
            <li><?php echo LANG_CONTACT_COUNTRY ?></li>
            <li><span class="mittendrin_icons phone"> <?php echo LANG_FOOTER_CONTACT_INFO_PHONE ?></span></li>
            <li><span class="mittendrin_icons mail"> <?php echo LANG_FOOTER_CONTACT_INFO_MAIL ?></span></li>
            <li><span class="mittendrin_icons fb"> <?php echo LANG_FOOTER_CONTACT_INFO_FB ?></span></li>
            <li><span class="mittendrin_icons tw"> <?php echo LANG_FOOTER_CONTACT_INFO_TW ?></span></li>
            <li><span class="mittendrin_icons yt"> <?php echo LANG_FOOTER_CONTACT_INFO_YT ?></span></li>
        </ul>
    </div>
</div>