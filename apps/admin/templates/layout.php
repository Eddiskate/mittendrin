<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>panel administracyjny - <?php echo $_SERVER['HTTP_HOST'] ?></title>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <?php include_stylesheets() ?>
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="/css/daterangepicker.css"/>
    <link href="/css/admin/admin.css" rel="stylesheet"></link>
    <link href="/css/admin.css" rel="stylesheet"></link>
    <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet"></link>

    <?php if ($sf_params->get('module') == 'mittendrinStats'): ?>
    <?php endif; ?>
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }

        h1 {
            font-size: 30px;
            border-bottom: 1px solid black;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
    </style>
    <?php include_javascripts() ?>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#"><?php echo $_SERVER['HTTP_HOST'] ?></a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    Zalogowany jako <a href="#"
                                       class="navbar-link"><?php echo $sf_user->getAttribute('name') ?></a> <?php echo link_to('wyloguj się', 'security/logout') ?>
                </p>
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><?php echo link_to('Konfiguracja', 'configuration/index') ?></li>
                    <li><a href="#contact">Aktualizacje</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Aktualności</li>
                    <li class="active"><?php echo link_to('Lista postów', 'post/index') ?></li>
                    <li><?php echo link_to('Katalog postów', 'postCatalog/index') ?></li>
                    <li><?php echo link_to('Chmura tagów', 'postTags/index') ?></li>
                    <li class="nav-header">ZARZĄDZAJ TRESCIĄ</li>
                    <li class="active"><?php echo link_to('Zawartość stron', 'cart/index') ?></li>
                    <li><?php echo link_to('Galeria', 'gallery/index') ?></li>
                    <li><?php echo link_to('Slideshow', 'slideshow/index') ?></li>
                    <li><?php echo link_to('Album miesiąca', 'bpcmsAlbumMonth/index') ?></li>
                    <li><?php echo link_to('Radio - playlista', 'bpcmsPlaylist/index') ?></li>
                    <li><?php echo link_to('Youtube - filmy', 'bpcmsYtMovies/index') ?></li>
                    <li><?php echo link_to('Oberschlesische Stimme', 'bpcmsDiplomas/index') ?></li>
                    <li><?php echo link_to('Stacje radiowe', 'radioStation/index') ?></li>
                    <li class="nav-header">KONFIGURACJA</li>
                    <li class="active"><?php echo link_to('Dostępne języki', 'bpcmsLangInstall/index') ?></li>
                    <li><?php echo link_to('Tłumaczenia strony', 'bpcmsLangText/index') ?></li>
                    <li><?php echo link_to('Użytkownicy', 'users/index') ?></li>
                    <li class="nav-header">RADIO - REGION</li>
                    <li class="active"><?php echo link_to('Lista sesji', 'mittendrinStats/index?idradio_station=1') ?></li>
                    <li class=""><?php echo link_to('Dane szczegółowe', 'mittendrinStats/stats?idradio_station=1') ?></li>
                    <li class="nav-header">RADIO - ALT!NEU</li>
                    <li class="active"><?php echo link_to('Lista sesji', 'mittendrinStats/index?idradio_station=2') ?></li>
                    <li class=""><?php echo link_to('Dane szczegółowe', 'mittendrinStats/stats?idradio_station=2') ?></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <?php if ($sf_user->hasFlash('monit')): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $sf_user->getFlash('monit') ?>
                </div>
            <?php endif; ?>
            <?php if ($sf_user->hasFlash('success')): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $sf_user->getFlash('success') ?>
                </div>
            <?php endif; ?>
            <?php if ($sf_user->hasFlash('error')): ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $sf_user->getFlash('success') ?>
                </div>
            <?php endif; ?>
            <?php echo $sf_content ?>
            <?php include_component('home', 'gallerydb') ?>
        </div>
    </div>
    <hr>
    <footer>
        <p>&copy; Company 2013</p>
    </footer>
</div>

<script src="/js/jquery-1.10.2.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/holder.js"></script>
<script src="/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/pack/ckeditor/ckeditor.js"></script>
<script src="/pack/ckeditor/config.js"></script>
<script src="/js/admin/bootstrap-daterangepicker-master/moment.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<script src="/js/admin/bootstrap-daterangepicker-master/daterangepicker.js"></script>
<script src="/js/admin/bootbox.js"></script>
<script src="/js/admin/jquery.form.js"></script>
<script src="/js/admin/bpcms_admin.js"></script>

<script>
    <?php if($sf_params->get('module') == 'mittendrinStats' && $sf_params->get('action') == 'index'): ?>
    $(document).ready(function () {
        generateStat('','session');
    });
    <?php endif; ?>
    <?php if($sf_params->get('module') == 'mittendrinStats' && $sf_params->get('action') == 'stats'): ?>
    $(document).ready(function () {
        generateStat();
    });
    <?php endif; ?>
</script>

<script>
    var $ = jQuery.noConflict();
    $('#post_created_at').datepicker();

    $(".select_photo").click(function () {
        console.log("jest");
        var file_name = $(this).attr('data-filename');
        $('#myModal').modal('hide');
        $('.avatar').hide('slow');
        $('.lub').hide('slow');
        $(".avatar_db").val(file_name);
    });
</script>

<?php if ($sf_params->get('module') == 'postTags'): ?>
    <script>
        init_PostTagsCreate();
    </script>
<?php endif; ?>

</body>
</html>
