<div class="container-post container-post-homepage">
    <div class="row-fluid">
        <div class="row-fluid">
            <div class="col-md-3">
                <div class="info">
                    <h1><?php echo LANG_HOMEPAGE_POST_H1_TEXT ?></h1>
                    <p><?php echo LANG_HOMEPAGE_POST_P_TEXT ?></p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php foreach ($posts as $post): ?>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <article class="news-post">
                                <figure class="news-post__img">
                                    <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                                        <img src="/images/post/<?php echo $post->getAvatar() ?>" alt="">
                                    </a>
                                </figure>
                                <header class="news-post__header">
                                    <h2 class="news-post__title"><a
                                                href="<?php echo $post->getLinkPostShowUrl() ?>"><?php echo $post->getLangTitle() ?></a>
                                    </h2>
                                    <div class="news-post__date"><?php echo $post->getCreated() ?></div>
                                </header>
                                <div class="news-post__content">
                                    <?php echo $post->getLangTitleHeader() ?>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="text-right">
                    <a href="<?php echo($sf_params->get('culture') ? '/' . $sf_params->get('culture') : '') ?>/wydarzenia.html"
                       class="btn-homepage-post-show-more">
                        <?php echo LANG_HOMEPAGE_POST_SHOW_MORE_A_TEXT ?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
