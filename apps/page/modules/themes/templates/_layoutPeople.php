<section class="ls section_padding_bottom_100">
    <div class="container">
        <h2 class="text-center"><?php echo LANG_ABOUT_US_TEAM_H2 ?></h2>

        <?php if (sfConfig::get('bpcms_people_view_type') == 'carousel'): ?>
            <div class="owl-carousel team-owl-carousel" data-nav="false" data-dots="true" data-responsive-lg="3"
                 data-responsive-sm="3" data-center="true" data-loop="true">
                <?php foreach ($bpcms_peoples as $bpcms_people): ?>
                    <div class="vertical-item content-absolute hover-content">
                        <div class="item-media rounded overflow_hidden">
                            <img src="/images/people/<?php echo $bpcms_people['photo'] ?>" alt="">
                        </div>
                        <header class="item-content cs main_color3 bottom_rounded">
                            <div class="content-justify vertical-center">
                                <h4 class="margin_0 text-center"><?php echo $bpcms_people['name'] ?></h4>
                                <span class="small-text topmargin_5"><?php echo $bpcms_people['job'] ?></span>
                            </div>
                        </header>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="owl-carousel team-owl-carousel-content topmargin_60" data-nav="false" data-dots="false"
                 data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-mouse-drag="false"
                 data-touch-drag="false">
                <?php foreach ($bpcms_peoples as $bpcms_people): ?>
                    <div class="row columns_padding_25 columns_margin_bottom_30">
                        <div class="col-sm-6">
                            <h3 class="text-uppercase margin_0"><?php echo $bpcms_people['name'] ?></h3>
                            <p class="small-text highlight"><?php echo $bpcms_people['job'] ?></p>
                            <p><?php echo $bpcms_people['body'] ?></p>
                        </div>
                        <div class="col-sm-6" style="color: #37a248;">
                            <p><b><?php echo $bpcms_people['mail'] ?></b></p>
                            <p><b><?php echo $bpcms_people['phone'] ?></b></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="row columns_padding_25 columns_margin_bottom_30 bpcms-people">
                <?php foreach ($bpcms_peoples as $bpcms_people): ?>
                    <div class="content-absolute col-md-4">
                        <div class="item-media rounded overflow_hidden">
                            <img src="/images/people/<?php echo $bpcms_people['photo'] ?>" alt="">
                        </div>
                        <header class="item-content cs main_color3 bottom_rounded">
                            <div class="content-justify vertical-center">
                                <h4 class="margin_0 text-center"><?php echo $bpcms_people['name'] ?></h4>
                                <span class="small-text topmargin_5"><?php echo $bpcms_people['job'] ?></span>
                                <p><b><?php echo $bpcms_people['mail'] ?></b></p>
                                <p><b><?php echo $bpcms_people['phone'] ?></b></p>
                            </div>
                        </header>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
