<?php if ($post): ?>
    <!-- Schema.org markup for Google+ -->    
    <meta itemprop="name" content="<?php echo $post->getLangTitle() ?>">
    <meta itemprop="description" content="<?php echo $post->getLangTitleRecommended() ?>">
    <meta itemprop="image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/images/post/' . $post->getAvatar() ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="www.mittendrin.pl">
    <meta name="twitter:creator" content="<?php echo sfConfig::get('bpcms_page_author') ?>">
    <meta name="twitter:title" content="<?php echo $post->getLangTitle() ?>">
    <meta name="twitter:description" content="<?php echo $post->getLangTitleRecommended() ?>">
    <meta name="twitter:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/images/post/' . $post->getAvatar() ?>">

    <!-- Facebook -->
    <meta property="og:title" content="<?php echo $post->getLangTitle() ?>" />
    <meta property="og:description" content="<?php echo $post->getLangTitleRecommended() ?>" />
    <meta property="og:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/images/post/' . $post->getAvatar() ?>" />
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $post->getLinkPostShowUrl() ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="www.mittendrin.pl"/>
    <meta property="og:locale" content="pl_PL" />
    <meta property="article:published_time" content="<?php echo date('Y-m-d H:i:s', $post->getCreatedAt()) ?>" />
    <meta property="fb:app_id" content="<?php echo sfConfig::get('bpcms_social_api_fb_app_id') ?>" />
<?php endif; ?>