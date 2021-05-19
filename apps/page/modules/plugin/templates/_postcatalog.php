
<ul class="post_catalog_sidebar">    
    <?php foreach ($post_catalogs as $post_catalog): ?>
        <a href="<?php echo $post_catalog->getLinkUrl() ?>"><li class="<?php if($sf_params->get('idpost_catalog') == $post_catalog->getIdpostCatalog()): ?>active<?php endif; ?>"><?php echo $post_catalog->getLangName() ?></li></a>
    <?php endforeach; ?>
</ul>