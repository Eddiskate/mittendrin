<section class="section section--first mittendrin-post-show">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="article">
                <div class="article__content">
                    <div class="mittendrin-post-show-main-image">
                        <img src="/images/post/<?php echo $post->getAvatar() ?>" style="max-width: 560px;">
                        <!-- <img src="/images/duch.png" style="background-image: url('/images/post/<?php echo $post->getAvatar() ?>');" class="image-background"> -->
                    </div>
                    <h1><?php echo $post->getLangTitle() ?></h1>

                    <?php echo $post->getLangDescription() ?>
                </div>
            </div>
            <div class="row-fluid">
                <?php include_component('post', 'gallery', array('post' => $post)) ?>
            </div>
            <div class="row-fluid">
                <div class="article__share clearfix">
                    <span>Share:</span>
                    <ul class="clearfix">
                        <li>
                            <div class="fb-share-button"
                                 data-href="<?php echo $sf_request->getUri() ?>"
                                 data-layout="button_count">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
