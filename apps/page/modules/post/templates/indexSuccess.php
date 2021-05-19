<?php include_component('post', 'postFilters') ?>
<section class="section section--first" id="post">
    <div class="row">
        <div class="col-xs-12">
            <div class="section__title section__title--single clearfix">
                <?php if ($post_catalog): ?>
                    <h2><?php echo LANG_POST_LINK_NAME ?>: <?php echo $post_catalog->getLangName() ?></h2>
                <?php else: ?>
                    <h2><?php echo LANG_POST_LINK_NAME ?></h2>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="row row--grid-big">
                <div class="row-fluid post_list">
                    <?php foreach ($posts as $post): ?>
                        <?php include_partial('post/postcontainer', array('post' => $post)) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <?php if ($post_count >= sfConfig::get('bpcms_post_max_count_to_page')): ?>
                <a href="#" class="default-btn default-btn--red default-btn--center jq-post-load-more-btn"
                   data-count="<?php echo sfConfig::get('bpcms_post_max_count_to_page') ?>"
                   data-idpost-catalog="<?php echo $sf_params->get('idpost_catalog') ?>"
                   data-name-url="<?php echo $sf_params->get('name_url') ?>">pokaż więcej</a>
            <?php endif; ?>
        </div>
    </div>
</section>

