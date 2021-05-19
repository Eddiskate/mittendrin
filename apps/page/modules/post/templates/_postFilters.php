<section class="section post-filters">
    <ul>
        <li class="title"><?php echo LANG_POST_FILTERS_CATEGORY_TITLE ?></li>
        <li><a href="/wydarzenia.html" class="<?php if(!$sf_params->get('idpost_catalog')): ?>active<?php endif; ?>"><?php echo LANG_POST_FILTERS_SHOW_ALL ?></a></li>
        <?php foreach ($post_catalogs as $post_catalog): ?>
            <li><a href="<?php echo $post_catalog->getLinkUrl() ?>" class="<?php if($url == $post_catalog->getLinkUrl()): ?>active<?php endif; ?>"><?php echo $post_catalog->getLangName() ?></a></li>
        <?php endforeach; ?>
    </ul>
</section>