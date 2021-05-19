<div class="col-xs-12 col-sm-4 col-md-4 post-row">
    <article class="news-post">
        <figure class="news-post__img">
            <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                <img src="/images/post/<?php echo $post->getAvatar() ?>">
            </a>
        </figure>
        <header class="news-post__header">
            <h2 class="news-post__title"><a
                        href="<?php echo $post->getLinkPostShowUrl() ?>"><?php echo $post->getLangTitle() ?></a>
            </h2>
            <div class="news-post__date"><?php echo $post->getCreated() ?> | <a href="<?php echo $post->getLinkPostCatalogUrl() ?>"><?php echo $post->getLinkPostCatalogNameUrl() ?></a></div>
        </header>
        <div class="news-post__content">
            <?php echo $post->getLangTitleHeader() ?>
        </div>
    </article>
</div>