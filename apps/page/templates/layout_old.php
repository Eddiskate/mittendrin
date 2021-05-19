<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo sfConfig::get('bpcms_page_title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo sfConfig::get('bpcms_page_keywords') ?>">
        <meta name="description" content="<?php echo sfConfig::get('bpcms_page_description') ?>">
        <meta name="author" content="<?php echo sfConfig::get('bpcms_page_author') ?>">
        <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="/themes/mittendrin/css/main.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic&subset=latin-ext'
              rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/themes/mittendrin/plugin/plate/css/plate.css">
        <style>
            footer {
                margin-top: 50px;
            }

            .navbar-inner {
                min-height: 40px;
                padding-right: 20px;
                padding-left: 20px;
                background-image: none !important;
                background-repeat: repeat-x;
                border: 0px solid #d4d4d4;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 0px;
                *zoom: 1;
                -webkit-box-shadow: 0;
                -moz-box-shadow: 0;
                box-shadow: 0;
            }

            .navbar-inverse .navbar-inner {
                background: none;
                border: none !important;
            }

            .navbar {
                border: none;
                text-shadow: none;
                padding-left: 50px;
                height: 50px;
            }


            .navbar-inverse {
                left: 0px;
                padding-left: 0px;
                margin-top: 11px !important;
            }

            .navbar .nav > li > a {
                float: none;
                padding: 12px 29px 10px;
                color: #000;
                text-decoration: none;
                text-shadow: 0 1px 0 #ffffff;
                line-height: 24px;
                color: #000000;
                font-size: 14px;
                text-align: center;
                font-family: 'Josefin Sans', sans-serif;
                font-weight: 600;
                display: block;
                padding-top: 0px;
                padding-bottom: 0px;
            }

            .navbar .nav > li > a:hover {
                color: #4D7ED9;
            }

            .navbar .nav > li > a:active {
                color: #4D7ED9;
            }

            .navbar .nav .page_link a {
                color: #000;
                text-decoration: none;
                text-shadow: 0 1px 0 #ffffff;
                line-height: 20px;
                color: #000000;
                font-size: 13px;
                text-align: center;
                font-family: 'Josefin Sans', sans-serif;
                font-weight: 600;
                text-align: left !important;
            }

            .navbar .nav .page_link li a:hover {
                color: white;
            }

            .navbar .nav .opacity_effect ul {
                opacity: 0.9;
                filter: alpha(opacity=90);
            }

            .dropdown-menu > li > a:hover,
            .dropdown-menu > li > a:focus,
            .dropdown-submenu:hover > a,
            .dropdown-submenu:focus > a {
                color: #ffffff;
                text-decoration: none;
                background-color: #4D7ED9;
                background-image: none;
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0);
            }

            .dropdown-menu {
                position: absolute;
                top: 27px;
                left: 19px;
                z-index: 1000;
                display: none;
                float: left;
                min-width: 160px;
                padding: 5px 0;
                margin: 2px 0 0;
                list-style: none;
                background-color: #ffffff;
                border: 1px solid #ccc;
                border: 1px solid rgba(0, 0, 0, 0.2);
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
                border-radius: 6px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -webkit-background-clip: padding-box;
                -moz-background-clip: padding;
                background-clip: padding-box;
            }

            .nav .dropdown .active {
                color: #4D7ED9;
            }

            .nav .active {
                color: #4D7ED9 !important;
            }

            .radio_program {
                width: 300px;
                margin: 0 auto;
            }

            .btn {
                font-family: 'Josefin Sans', sans-serif !important;
            }

            .load_track_name_mittendrin {
                font-size: 12px;
                margin-left: 30px;
                text-align: left;
                width: 184px;                
            }
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="/themes/mittendrin/images/logo.png">
        <?php include_component('plugin', 'socialpostshere') ?>
    </head>

    <body>
        <div class="container page_content">
            <div class="page_content_bg">
                <div class="social_icons_block">
                    <ul>
                        <li><a href="<?php echo sfConfig::get('bpcms_social_link_youtube') ?>" target="_blank"><img
                                    src="/themes/mittendrin/images/yt.png"></a></li>
                        <li><a href="<?php echo sfConfig::get('bpcms_social_link_fb') ?>" target="_blank"><img
                                    src="/themes/mittendrin/images/fb.png"></a></li>
                        <li><a href="<?php echo sfConfig::get('bpcms_social_link_twitter') ?>" target="_blank"><img
                                    src="/themes/mittendrin/images/tw.png"></a></li>
                        <li><a href="<?php echo sfConfig::get('bpcms_social_link_vimeo') ?>" target="_blank"><img
                                    src="/themes/mittendrin/images/vi.png"></a></li>
                        <li><a href="<?php echo sfConfig::get('bpcms_social_link_mc') ?>" target="_blank"><img
                                    src="/themes/mittendrin/images/mc.png"></a></li>
                    </ul>
                    <div class="lang_menu">
                        <a href="/de/"><div class="<?php echo $sf_params->get('culture') ? 'lang_de_active' : 'lang_de' ?>"></div></a>
                        <a href="/"><div class="<?php echo $sf_params->get('culture') == '' ? 'lang_pl_active' : ($sf_params->get('culture') == 'de' ? 'lang_pl' : 'lang_pl_active') ?><?php ?>"></div></a>
                    </div>
                </div>
                <div class="row-fluid header_section">
                    <div class="radio"></div>
                    <div class="text_label"><?php echo LANG_HEADER_SECTION_TITLE ?></div>
                    <a href="<?php echo $sf_params->get('culture') ? '/' . $sf_params->get('culture') . '/' : '/' ?>" class="logo"><img src="/themes/mittendrin/images/logo.png"></a>
                    <div id="radio-player">
                        <div class="player_box">
                            <div class="online_box">
                                <div class="mic"></div>
                                <div class="track-name">
                                    <p><?php echo LANG_RADIO_PLAYER_ONLINE_TRACK_P ?></p>
                                    <div class="load_track_name_mittendrin" id="iframe1"></div>
                                    <div id="loading" style="display: block;width: 20px;margin-left: 20px;"><img src="/images/load.gif"></div>                                    
                                </div>
                            </div>
                            <div class="menu">
                                <ul>
                                    <li><a href="#" onclick="javascript:void window.open('/radio.php?tab_active=mittendrin', '1422389691361', 'width=375,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=0,resizable=1,left=0,top=0');
                                            return false;"><?php echo LANG_RADIO_PLAYER_ONLINE_MENU_LINK_MITTENDRIN ?></a></li>
                                    <li><a href="#" style="margin-left: 31px;" onclick="javascript:void window.open('/radio.php?tab_active=heimat', '1422389691361', 'width=375,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=0,resizable=1,left=0,top=0');
                                            return false;"><?php echo LANG_RADIO_PLAYER_ONLINE_MENU_LINK_HEIMAT ?></a></li>
                                    <li><a href="#" style="margin-left: 29px;" onclick="javascript:void window.open('/radio.php', '1422389691361', 'width=375,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=0,resizable=1,left=0,top=0');
                                            return false;"><span><?php echo LANG_RADIO_PLAYER_ONLINE_MENU_LINK ?></span></a></li>
                                </ul>
                            </div>
                            <div class="menu_line"></div>
                        </div>
                    </div>
                </div>
                <div class="navbar-wrapper">
                    <div class="navbar navbar-inverse">
                        <div class="">
                            <?php include_component('cart', 'menutop') ?>
                        </div>
                    </div>
                </div>
                <div class="sf_content">
                    <?php echo $sf_content ?>
                </div>

                <footer>
                    <div class="row-fluid footer_section"
                         style="background-image: url(/themes/mittendrin/images/footerbackground.jpg);">
                             <?php include_component('cart', 'menubottom') ?>
                    </div>
                </footer>
            </div>
        </div>

        <script src="/js/jquery-1.10.2.js"></script>
        <script src="/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" language="javascript" src="/themes/mittendrin/js/jquery.carouFredSel-6.2.1.js"></script>
        <script src="/themes/mittendrin/plugin/plate/js/main.js"></script>
        <script src="/themes/mittendrin/js/main.js"></script>
        <script src="/js/holder.js"></script>

        <div id="fb-root"></div>
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
    </body>
</html>
