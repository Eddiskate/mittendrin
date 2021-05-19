<div class="row row-fluid mittendrin-post-gallery">
    <div id="container-gallery">
        <div class="row-fluid container-gallery-info gallery-mobile">
            <div class="col-xs-6">
                <a href="<?php echo $post->getLinkPostShowUrl() ?>" class="previus-page">wróć do artykułu</a>
            </div>
            <div class="col-xs-6">
                <span class="gallery-info"><?php echo($sf_params->get('id') ? $sf_params->get('id') : 1) ?>
                    / <?php echo $gallery['last'] ?></span>
            </div>
            <div class="col-xs-12">
                <h1><?php echo $post->getLangTitle() ?></h1>
            </div>
        </div>
        <div class="row container-gallery-info gallery-desktop">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <ul>
                    <li>
                        <a href="<?php echo $post->getLinkPostShowUrl() ?>" class="previus-page">wróć do artykułu</a>
                    </li>
                    <li>
                        <h1><?php echo $post->getLangTitle() ?></h1>
                    </li>
                    <li>
                        <span class="gallery-info">
                            <?php echo($sf_params->get('id') ? $sf_params->get('id') : 1) ?> / <?php echo $gallery['last'] ?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">

            </div>
        </div>
        <hr>
        <div class="row-fluid container-gallery position-relative">
            <div class="col-md-1">
                <?php if (is_numeric($gallery['use_prev'])): ?>
                    <a href="?id=<?php echo $gallery['use_prev'] ?>" class="gallery-nav nav-left middle"><span
                                class="glyphicon slideshow-btn-left" aria-hidden="true"></span></a>
                <?php endif; ?>
            </div>
            <div class="col-md-10">

                <div class="gallery-nav-mobile">
                    <div class="row-fluid">
                        <div class="col-md-6 col-xs-6 text-right">
                            <a href="?id=<?php echo $gallery['use_prev'] ?>" class="gallery-nav-btn-left">
                                <span class="glyphicon slideshow-btn-left" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <a href="?id=<?php echo $gallery['use_next'] ?>" class="gallery-nav-btn-right">
                                <span class="glyphicon slideshow-btn-left" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <img src="/images/gallery/<?php echo $gallery['use_file_name'] ?>" class="img-responsive image"
                     title="<?php echo $post_title ?>">
            </div>
            <div class="col-md-1">
                <?php if (is_numeric($gallery['use_next'])): ?>
                    <a href="?id=<?php echo $gallery['use_next'] ?>" class="gallery-nav nav-right middle"><span
                                class="glyphicon slideshow-btn-left" aria-hidden="true"></span></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-md-12">
                <ul class="container-gallery-thumbs">
                    <?php foreach ($gallery_thumbs as $lp => $gallery_thumb): ?>
                        <li>
                            <a href="?id=<?php echo $lp + 1 ?>"
                               class="<?php if (($lp + 1) == $sf_params->get('id')): ?>active<?php endif; ?>">
                                <img src="/images/duch.png" class="image-background"
                                     style="background-image: url('/images/gallery/<?php echo $gallery_thumb['file_name'] ?>')">
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>