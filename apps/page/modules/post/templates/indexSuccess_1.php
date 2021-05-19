<div class="row-fluid margin-top-50">
    <div class="span8 post">
        <?php foreach ($posts as $lp => $post): ?>
            <?php if ($post->getColumnType() == 1): ?>
                <div class="row-fluid">
                    <div class="span5">
                        <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                            <img src="/images/duch.png" style="width: 250px;height: 250px;background-image: url('/images/post/<?php echo $post->getAvatar() ?>');" class="image_bg_params">
                        </a>
                    </div>
                    <div class="span7 position-relative">
                        <div class="post_location">
                            <a href="<?php echo $post->getLinkPostCatalogUrl() ?>"><?php echo $post->getPostCatalog()->getName() ?></a>
                            <?php echo $post->getLangTitleHeader() ?>
                        </div>
                        <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                            <h3><?php echo $post->getLangTitle() ?></h3>
                        </a>
                        <div class="header"><?php echo $post->getLangTitleRecommended() ?></div>
                        <div class="description_long"><?php echo $post->getLangDescriptionLong(250) ?></div>
                        <div class="more_label" style="bottom: 7px;">
                            <a href="<?php echo $post->getLinkPostShowUrl() ?>"><?php echo LANG_POST_SHOW_MORE ?></a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row-fluid position-relative">
                    <div class="post_location">
                        <a href="<?php echo $post->getLinkPostCatalogUrl() ?>" <?php echo $post->getPostCatalog()->getFontColorStyle() ?>><?php echo $post->getPostCatalog()->getName() ?></a>
                        <?php echo $post->getLangTitleHeader() ?>
                    </div>
                    <div>
                        <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                            <img src="/images/duch.png" style="width: 600px;height: 300px;background-image: url('/images/post/<?php echo $post->getAvatar() ?>');" class="image_bg_params">
                        </a>
                    </div>
                    <a href="<?php echo $post->getLinkPostShowUrl() ?>">
                        <h3><?php echo $post->getLangTitle() ?></h3>
                    </a>
                    <div class="header"><?php echo $post->getLangTitleRecommended() ?></div>
                    <div class="more_label">
                        <a href="<?php echo $post->getLinkPostShowUrl() ?>"><?php echo LANG_POST_SHOW_MORE ?></a>
                    </div>
                </div>
            <?php endif; ?>
            <div><img src="/themes/mittendrin/images/pasek_menu.png"></div>
        <?php endforeach; ?>
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

