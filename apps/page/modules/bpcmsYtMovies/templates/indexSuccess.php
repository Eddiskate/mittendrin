<div id="post">
    <div class="row-fluid" id="blockContainer">
        <div class="col-lg-8 col-md-12 col-sm-12 container-post row" id="blockA">
            <div class="container-header-list">
                <span class="icons_mittendrin arrow-right"></span>

                <h1><?php echo LANG_TV_LIST_H1 ?></h1>
            </div>
            <div class="row yt_movies_list">
                <?php foreach ($bpcms_yt_moviess as $bpcms_yt_movies): ?>
                    <div class="row tv-box">
                        <div class="col-lg-5 col-md-4 col-xs-12">
                            <div style="background-image: url('<?php echo $bpcms_yt_movies->getImage() ?>');background-size: cover;display: block;" class="img-container box">
                                <a href="<?php echo $bpcms_yt_movies->getLinkToShowUrl() ?>">
                                    <img src="/images/duch.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8 col-xs-12">
                            <h2><?php echo link_to($bpcms_yt_movies->getLangTitle(), $bpcms_yt_movies->getLinkToShowUrl()) ?></h2>

                            <div class="description">
                                <?php echo substr($bpcms_yt_movies->getLangDescriptionHeader(), 0, 250) ?>

                                <?php if (strlen($bpcms_yt_movies->getLangDescriptionHeader()) > 250): ?>
                                <?php endif; ?>
                            </div>

                            <div class="additional">
                                <?php echo link_to($bpcms_yt_movies->getBpcmsYtCatalog()->getLangName(), $bpcms_yt_movies->getLinkToShowCatalogUrl()) ?>
                                - <span><?php echo date('Y-m-d ', $bpcms_yt_movies->getCreatedAt()) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="bottom-line"></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row text-center">
                <?php if (!$bpcms_yt_movies): ?>
                    <p>Przepraszamy, brak wiadmości w tym katalogu</p>
                <?php else: ?>
                    <?php if ($post_count >= sfConfig::get('bpcms_post_max_count_to_page')): ?>
                        <a href="#" class="jq-load-more btn btn-default btn-mini btn-no-border"
                           data-count="<?php echo sfConfig::get('bpcms_post_max_count_to_page') ?>"
                           data-idpost-catalog="<?php echo $sf_params->get('idpost_catalog') ?>"
                           data-name-url="<?php echo $sf_params->get('name_url') ?>">pokaż więcej</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 yt-movies-sidebar" id="blockB">
            <?php include_component('bpcmsYtMovies', 'catalog') ?>
            <?php include_component('bpcmsYtMovies', 'premium') ?>
        </div>
    </div>
</div>