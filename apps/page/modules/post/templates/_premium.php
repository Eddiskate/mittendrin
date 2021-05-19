<div class="post_premium hidden-xs">
    <div class="container-header">
        <div class="header"><span class="icons_mittendrin arrow-right"></span> <span class="name"><?php echo LANG_POST_SIDEBAR_RECOMMEND ?></span></div>
        <div class="header-line"></div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 section_btn_control position-relative">
            <div class="icons_mittendrin arrow-top-lg" id="prev_post"></div>
            <div class="icons_mittendrin arrow-bottom-lg" id="next_post"></div>
        </div>
        <div class="col-lg-10 col-md-9">
            <ul id="post_premium_sidebar" style="height: 200px;">
                <?php foreach ($post_premiums as $lp => $post_premium): ?>
                    <li>
                        <div class="row">
                            <div class="col-lg-4 image">
                                <a href="<?php echo $post_premium->getLinkPostShowUrl() ?>">
                                    <img src="/images/duch.png" class="img-responsive" style="background-image: url(/images/post/<?php echo $post_premium->getAvatar() ?>);width: 100%;height: 90px;background-size: cover;background-position: center;margin-top: 5px;">
                                </a>
                            </div>   
                            <div class="col-lg-8 description">
                                <a href="<?php echo $post_premium->getLinkPostShowUrl() ?>"><?php echo $post_premium->getLangTitleHeader() ?></a>
                            </div>
                        </div>
                        <div class="row_line"></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>       
</div>