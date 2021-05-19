<div class="post_premium hidden-xs">
    <div class="container-header">
        <div class="header"><span class="icons_mittendrin arrow-right"></span> <span
                class="name"><?php echo LANG_POST_SIDEBAR_RECOMMEND ?></span></div>
        <div class="header-line"></div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-9">
            <?php foreach ($bpcms_yt_movies_premiums as $lp => $bpcms_yt_movies_premium): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            style="background-image: url('<?php echo $bpcms_yt_movies_premium->getImage() ?>');height: 131px;background-size: contain;width: 233px;margin: 0 auto;"
                            class="img-container">
                            <a href="<?php echo $bpcms_yt_movies_premium->getLinkToShowUrl() ?>">
                                <img src="/images/duch.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="content" style="width: 233px;margin: 0 auto;">
                            <div class="description">
                                <h5><?php echo link_to($bpcms_yt_movies_premium->getLangTitle(), $bpcms_yt_movies_premium->getLinkToShowUrl()) ?></h5>
                            </div>
                        </div>
                        <div class="line"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>

    .post_premium .row .content {
        background-color: #ededed;
        padding: 1px;
        padding-left: 10px;
        font-size: 14px;
        margin-bottom: 1px;
    }

    .post_premium .row .line {
        border-bottom: 2px solid #d9d9d9;
        margin-bottom: 24px;
        width: 233px;
        margin: 0 auto;
        margin-bottom: 12px;
    }

</style>