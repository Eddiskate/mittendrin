<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo sfConfig::get('bpcms_page_title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo sfConfig::get('bpcms_page_keywords') ?>">
    <meta name="description" content="<?php echo sfConfig::get('bpcms_page_description') ?>">
    <meta name="author" content="<?php echo sfConfig::get('bpcms_page_author') ?>">

    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300,900&subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>
    <link href="/themes/mittendrinrwd2/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/mittendrinrwd2/css/main.css" rel="stylesheet">
    <link href="/themes/mittendrinrwd2/css/main_media.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php include_component('plugin', 'socialpostshere') ?>
    <link rel="shortcut icon" href="/themes/mittendrinrwd2/images/logo_top.png"/>
</head>

<body>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-11206842-3', 'auto');
    ga('send', 'pageview');

</script>
<!-- Fixed navbar -->
<nav class="navbar navbar-default">
    <div class="container position-relative">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if ($sf_params->get('culture') == 'de'): ?>
                <a class="navbar-brand" href="/de/"><img
                        src="/themes/mittendrinrwd2/images/logo_top.svg"></a>
            <?php else: ?>
                <a class="navbar-brand" href="<?php echo url_for('@homepage') ?>"><img
                        src="/themes/mittendrinrwd2/images/logo_top.svg"></a>
            <?php endif; ?>
            <div class="logo-description"><?php echo LANG_HEADER_SECTION_TITLE ?></div>
        </div>
        <ul class="lang_icons navbar-lang">
            <li><a href="<?php echo url_for('home/changeLang?culture=pl') ?>"><span
                        class="lang_icons_bg lang-pl <?php if ($sf_params->get('culture') == ''): ?>active<?php endif; ?>"></span></a>
            </li>
            <li><a href="<?php echo url_for('home/changeLang?culture=de') ?>"><span
                        class="lang_icons_bg lang-de <?php if ($sf_params->get('culture') == 'de'): ?>active<?php endif; ?>"></span></a>
            </li>
        </ul>
        <div id="navbar" class="navbar-collapse collapse">
            <?php include_component('cart', 'menutop') ?>

            <ul class="social_icons navbar-social hidden-xs">
                <li><a href="<?php echo sfConfig::get('bpcms_social_link_fb') ?>" target="_blank"><span
                            class="social_icons_bg social-fb"></span></a></li>
                <li><a href="<?php echo sfConfig::get('bpcms_social_link_youtube') ?>" target="_blank"><span
                            class="social_icons_bg social-youtube"></span></a></li>
                <li><a href="<?php echo sfConfig::get('bpcms_social_link_twitter') ?>" target="_blank"><span
                            class="social_icons_bg social-tw"></span></a></li>
                <li><a href="<?php echo sfConfig::get('bpcms_social_link_mc') ?>" target="_blank"><span
                            class="social_icons_bg social-green"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="menu-top-fixed hidden-xs">
    <?php include_component('cart', 'menutop') ?>
</div>
<?php include_component('plugin', 'radio') ?>
<?php include_component('plugin', 'slideshow') ?>
<div class="container container-main">
    <?php echo $sf_content ?>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php include_component('cart', 'menubottom') ?>
            </div>
            <div class="col-md-3 privace-info">
                <img src="/themes/mittendrinrwd2/images/logo_top.svg" width="156" style="margin-top: 49px;">
                <div>
                    <a href="/page/24/default-page.html" class="privacy-policy">polityka prywatności</a>
                </div><script src="/themes/mittendrinrwd2/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/themes/mittendrinrwd2/js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="/themes/mittendrinrwd2/js/jquery.validate.min.js"></script>

<script src="/themes/mittendrinrwd2/js/main.js"></script>
<?php include_component('plugin', 'loaderjs') ?>
<?php include_component('plugin', 'radioprogram') ?>

<div id="fb-root"></div>

<script src="/themes/mittendrinrwd2/plugins/jquery-shoutcast-master/jquery.shoutcast.min.js"></script>
<script type="text/javascript">
    init_Radio();
</script>

<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&appId=<?php echo sfConfig::get('bpcms_social_api_fb_app_id') ?>&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    window.twttr = (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], t = window.twttr || {};
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
        t._e = [];
        t.ready = function (f) {
            t._e.push(f);
        };
        return t;
    }(document, "script", "twitter-wjs"));
</script>

<script src="https://apis.google.com/js/platform.js" async defer>
    {
        lang: 'pl'
    }
</script>

<?php if ($sf_params->get('action') == 'gallery'): ?>
    <script>
        $(document).ready(function () {
            $('html,body').animate({
                    scrollTop: $("#container-gallery").offset().top
                },
                'slow');
        });
    </script>
<?php endif; ?>

<div class="bpcms-cookie-bar <?php if($sf_request->getCookie('cookie-accept')): ?>hidden<?php endif; ?>">
    <div class="content">
        <?php echo LANG_COOKIE_INFO_P ?>
        <span class="btn btn-default btn-mini btn-no-border btn-mittendrin-gray jq-cookie-accept-info"><?php echo LANG_COOKIE_INFO_BTN ?></span>
    </div>
</div>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: eddi
 * Date: 28.02.19
 * Time: 21:48
 */