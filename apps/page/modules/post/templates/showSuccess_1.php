<div class="row-fluid margin-top-50">
    <div class="span8 post post_show">
        <div class="post_location">
            <a href="<?php echo $post->getLinkPostCatalogUrl() ?>"><?php echo $post->getPostCatalog()->getName() ?></a>,
            <?php echo $post->getLangTitleHeader() ?>
        </div>
        <?php if ($post->getColumnType() == 1): ?>
            <div class="row-fluid margin-bottom-20">
                <div class="span5"><a href="<?php echo $post->getLinkPostShowUrl() ?>"><?php echo image_tag('post/' . $post->getAvatar(), array('width' => 250, 'height' => 250)) ?></a></div>
                <div class="span7">
                    <a href="<?php echo $post->getLinkPostShowUrl() ?>"><h3><?php echo $post->getLangTitle() ?></h3></a>
                    <div class="header"><?php echo $post->getLangTitleRecommended() ?></div>
                    <div class="header"><?php echo $post->getLangDescriptionHeader() ?></div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="description_long"><?php echo $post->getLangDescriptionLongShowPost() ?></div>
            </div>
        <?php else: ?>
            <div class="row-fluid margin-bottom-20">
                <a href="<?php echo $post->getLinkPostShowUrl() ?>"><?php echo image_tag('post/' . $post->getAvatar()) ?></a>
                <a href="<?php echo $post->getLinkPostShowUrl() ?>"><h3><?php echo $post->getLangTitle() ?></h3></a>
            </div>
            <div class="header"><?php echo $post->getLangTitleRecommended() ?></div>
            <div class="description_long"><?php echo $post->getLangDescriptionLong() ?></div>
        <?php endif; ?>        
        <div class="row" style="margin-left: 0px;">
            <div class="span3" style="width: 105px;"><div class="fb-share-button" data-href="<?php echo $post->getLinkPostShowUrl() ?>" data-layout="button_count"></div></div>
            <div class="span3" style="width: 70px;"><a class="twitter-share-button" href="<?php echo $post->getLinkPostShowUrl() ?>">Tweet</a></div>
            <div class="span6"><div class="g-plus" data-action="share"></div></div>
            <img src="/themes/mittendrin/images/pasek_menu.png">
            <div class="fb-comments" data-href="http://<?php echo $_SERVER['HTTP_HOST'] ?><?php echo $post->getLinkPostShowUrl() ?>" data-numposts="5" data-colorscheme="light"></div>
        </div>    
    </div>
    <div class="span4">
        <?php include_component('post', 'premium') ?>
    </div>
</div>
