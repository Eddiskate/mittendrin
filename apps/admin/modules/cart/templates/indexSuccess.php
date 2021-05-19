<h1 class="title">Zarzadzaj zawartością stron:</h1>
<a href="<?php echo url_for('cart/new') ?>" class="btn btn-success btn-mini">Dodaj nową kartę</a></li>

<hr>

<ul class="bp-table sortable-list ui-sortable" data-db-table="Cart">
    <?php foreach ($carts as $lp => $cart): ?>
        <li class="sortable-item">
            <div class="row-fluid">
                <div class="span3">
                    <a href="<?php echo url_for('cart/edit?idcart=' . $cart->getIdcart()) ?>"
                       class="btn btn-info btn-mini">edycja karty</a>
                    <?php echo link_to(LANG_CMS_BTN_DELETE, 'cart/delete?idcart=' . $cart->getIdcart(), array('method' => 'delete', 'confirm' => LANG_CMS_BTN_DELETE_CUSTOM, 'class' => 'btn btn-danger btn-mini')) ?>
                    <?php echo $cart->getPublicationLink() ?>
                </div>
                <div class="span3">
                    <b><?php echo $cart->getCartName() ?></b>
                    <div><?php echo link_to(LANG_CMS_PAGE_BTN_ADD_NEW, 'page/new?idcart=' . $cart->getIdcart(), array('class' => 'btn btn-success btn-mini')) ?></div>
                </div>
                <div class="span3">

                </div>
                <div class="span3">
                    <?php echo $cart->getLocation() ?>
                </div>
            </div>
            <input type="hidden"
                   name="Cart_<?php echo $cart->getIdcart() ?>"
                   value="<?php echo $lp + 1 ?>"/>

            <ul class="bp-table sortable-list ui-sortable" data-db-table="Page">
                <?php foreach ($cart->getPagelist() as $lp_page => $page): ?>
                    <li class="sortable-item">
                        <div class="row-fluid">
                            <div class="span3">
                                <?php if($page['page_default'] == 1): ?>
                                    <button class="btn btn-default btn-mini">domyślna dla karty "<?php echo $cart->getCartName() ?>"</button>
                                <?php endif; ?>
                            </div>
                            <div class="span6">
                                <?php echo link_to(LANG_CMS_PAGE_BTN_EDIT, 'page/edit?idpage=' . $page->getIdpage(), array('class' => 'btn btn-info btn-mini')) ?>
                                <?php echo link_to(LANG_CMS_PAGE_BTN_DELETE, 'page/delete?idpage=' . $page->getIdpage(), array('method' => 'delete', 'confirm' => LANG_CMS_PAGE_BTN_DELETE_CUSTOM, 'class' => 'btn btn-danger btn-mini')) ?>
                                <?php echo link_to(LANG_CMS_PAGE_BTN_VIEW, '/' . $page->getNameForLink() . '.html', array('target' => '_blank', 'class' => 'btn btn-mini')) ?>

                                <?php if ($page->getPageName() != 'default_page'): ?><?php echo $page->getPageName() ?><?php endif; ?>
                            </div>
                        </div>
                        <input type="hidden"
                               name="Page_<?php echo $page->getIdpage() ?>"
                               value="<?php echo $lp_page + 1 ?>"/>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>

