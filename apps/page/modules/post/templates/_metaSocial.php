<?php if ($sf_params->get('module') == 'post' && $sf_params->get('action') == 'show'): ?>
    <meta property="og:url" content="<?php echo $sf_request->getUri() ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo str_replace(array('„','”'),array('',''), $sf_params->get('post_title')) ?>"/>
    <meta property="og:description" content="<?php echo strip_tags($sf_params->get('post_header')) ?>"/>
    <meta property="og:image" content="<?php echo $sf_request->getUriPrefix().$sf_params->get('post_image') ?>"/>
<?php endif; ?>