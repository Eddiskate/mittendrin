<div class="row-fluid margin-top-50">
    <div class="span8 post">
        <div class="row-fluid">
            <?php foreach ($posts as $lp => $post): ?>
            <?php if ($lp % 2 == 0): ?>
        </div>
        <?php if($lp != 0): ?>
            <div><img src="/themes/mittendrin/images/pasek_menu.png"></div>
        <?php endif; ?>
        <div class="row-fluid">
            <?php endif; ?>
            <div class="span6 post_homepage post_list_span_6">
                <div class="post_location">
                    <a href="<?php echo $post->getLinkPostCatalogUrl() ?>" <?php echo $post->getPostCatalog()->getFontColorStyle() ?>><?php echo $post->getPostCatalog()->getName() ?></a>
                    <?php echo $post->getLangTitleHeader() ?>
                </div>
                    <?php if ($lp_post == 0): ?>
                        <?php if ($post->getColumnType() == 1): ?>
                            <div class="row-fluid">
                                <div class="span5">
                                    <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                                        <img src="/images/duch.png" style="width: 250px;height: 250px;background-image: url('/images/post/<?php echo $post->getAvatar() ?>');" class="image_bg_params">
                                    </a>
                                </div>
                                <div class="span7">
                                    <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                                        <h3><?php echo $post->getLangTitle() ?></h3>
                                    </a>
                                </div>
                            </div>
                            <?php $long = 300 ?>
                            <div class="header"><?php echo $post->getLangTitleRecommended() ?></div>
                            <div class="description_long"><?php echo $post->getLangDescriptionLong($long) ?></div>
                        <?php else: ?>
                            <div>
                                <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                                    <img src="/images/duch.png" style="width: 294px;height: 150px;background-image: url('/images/post/<?php echo $post->getAvatar() ?>');" class="image_bg_params">
                                </a>
                            </div>
                            <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                                <h3><?php echo $post->getLangTitle() ?></h3>
                            </a>
                            <?php $long = 200 ?>
                            <div class="header"><?php echo $post->getLangTitleRecommended() ?></div>
                            <div class="description_long" style="margin-top: -7px;"><?php echo $post->getLangDescriptionLong($long) ?></div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="post_list_next">
                            <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                                <h3><?php echo $post->getLangTitle() ?></h3>
                            </a>
                        </div>
                    <?php endif; ?>
                <div class="more_label">
                    <a href="<?php echo $post->getLinkPostShowUrl() ?>"><?php echo LANG_POST_SHOW_MORE ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row-fluid page_list_div">
            <ul class="page_list">
                <?php echo $page->getLinkPrev() ?>
                <?php echo $page->getListPage() ?>
                <?php echo $page->getLinkNext() ?>
            </ul>
        </div>
    </div>
    <div class="span4">
        <?php include_component('post', 'premium') ?>
        <?php include_component('plugin', 'albummonth') ?>
        <?php include_partial('plugin/fb') ?>
    </div>
</div>

