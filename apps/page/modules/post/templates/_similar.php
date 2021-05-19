<?php include_partial('plugin/containser-hader', array('hader_title' => LANG_POST_SIMILAR_POST_H2)) ?>

<div class="container-post">
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-lg-4 col-md-6 post-row post-similar">
                <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                    <div class="image"
                         style="background-image: url(/images/post/<?php echo $post->getAvatar() ?>);"></div>
                </a>
                <div class="catalog-title"><a
                        href="<?php echo $post->getLinkPostCatalogUrl() ?>"><?php echo $post->getPostCatalog()->getName() ?></a>
                </div>
                <div class="content">
                    <a href="<?php echo $post->getLinkPostShowUrl() ?>"><span
                            class="title"><?php echo $post->getLangTitle() ?></span></a>
                </div>
                <div class="line"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

