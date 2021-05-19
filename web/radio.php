<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>

<?php

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('page', 'prod', true);

$context = sfContext::createInstance($configuration);

$mittendrin_stats = new MitStats();
$mittendrin_stats->openConnection($context->getRequest()->getParameter('tab_active'));

?>
<head>
    <title>radio mittendrin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300,900&subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script src="/themes/mittendrinrwd/plugins/jquery-shoutcast-master/jquery.shoutcast.min.js"></script>
    <script src="/themes/mittendrinrwd/js/mediaelement-and-player.min.js"></script>
    <script src="/themes/mittendrinrwd/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link href="/themes/mittendrinrwd/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/mittendrinrwd/css/radio-player.css" rel="stylesheet">
</head>
<body>
<div>
    <div id="radio-select">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" <?php if ($_GET['tab_active'] == 'mittendrin'): ?>class="active"<?php endif; ?>>
                <a href="#mittendrin" aria-controls="mittendrin" role="tab" data-toggle="tab">Mittendrin</a>
            </li>
            <li role="presentation" <?php if ($_GET['tab_active'] == 'heimat'): ?>class="active"<?php endif; ?>>
                <a href="#heimat" aria-controls="heimat" role="tab" data-toggle="tab">Heimat</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel"
                 class="tab-pane <?php if ($_GET['tab_active'] == 'mittendrin'): ?>active<?php endif; ?>"
                 id="mittendrin">
                <div class="audio-player">
                    <h1 class="mp3_title_mittendrin"></h1>
                    <img class="cover" src="/themes/mittendrinrwd/images/radio-mittendrin.png" alt="">
                    <audio id="audio-player-mittendrin" src="http://s1.slotex.pl:7592/stream" type="audio/mp3"
                           controls="controls" data-></audio>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane <?php if ($_GET['tab_active'] == 'heimat'): ?>active<?php endif; ?>"
                 id="heimat">
                <div class="audio-player">
                    <h1 class="mp3_title_heimat">Zapraszamy wkrótce.</h1>
                    <img class="cover" src="/themes/mittendrinrwd/images/radio-heimat.png" alt="">
                    <audio id="audio-player-heimat" src="http://s1.slotex.pl:7430/stream" type="audio/mp3"
                           controls="controls"></audio>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/themes/mittendrinrwd/js/radio-player.js"></script>


</body>
</html>