<div id="post">
    <div class="row-fluid">
        <div class="col-lg-8 col-md-8 col-sm-8 container-post row">
            <div class="container-header-list">
                <span class="icons_mittendrin arrow-right"></span>
                <h1><?php echo $bpcms_yt_movies->getBpcmsYtCatalog()->getLangName() ?></h1>
            </div>
            <div class="row yt_movies_list">
                <h1><?php echo $bpcms_yt_movies->getLangTitle() ?></h1>
                <iframe width="100%" height="auto"
                        src="https://www.youtube.com/embed/<?php echo $bpcms_yt_movies->getYoutubeIframe() ?>"
                        frameborder="0" allowfullscreen></iframe>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="description">
                            <?php echo $bpcms_yt_movies->getLangDescription() ?>
                        </div>
                    </div>
                </div>
                <div class="row component-social-post">
                    <div class="col-lg-12"><?php include_component('bpcmsYtMovies', 'social', array('bpcms_yt_movies' => $bpcms_yt_movies)) ?></div>
                </div>
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
        <div class="col-lg-4 col-md-4 col-sm-4" style="margin-top: 62px;">
            <?php include_component('bpcmsYtMovies', 'catalog') ?>
            <?php include_component('bpcmsYtMovies', 'premium') ?>
        </div>
    </div>
</div>

<style>
    .yt_movies_list {
        margin-left: 3px;
    }

    .yt_movies_list h1 {
        font-weight: bold;
        font-size: 15px;
        display: block;
        line-height: 16px;
        margin-top: 11px;
    }

    .yt_movies_list .row h2 {
        font-weight: bold;
        font-size: 15px;
        display: block;
        height: 38px;
        line-height: 16px;
        margin-top: 11px;
    }

    .yt_movies_list .row {
        padding-bottom: 20px;
    }

    .yt_movies_list .row .img-container {
        width: 103%;
    }

    .yt_movies_list .row img {
        background-image: url('/themes/mittendrinrwd2/images/mittendrin_icons.png');
        width: 103%;
        height: 168px;
        display: block;
        background-position: 478px 458px;
    }

    .yt_movies_list .row img:hover {
        background-position: 478px 283px;
    }

    .yt_movies_list .row .bottom-line {
        background-image: url('/themes/mittendrinrwd2/images/mittendrin_icons.png');
        width: 100%;
        height: 20px;
        display: block;
        background-position: -190px 99px;
    }

    .yt_movies_list {
        margin-right: 30px;
    }
</style>