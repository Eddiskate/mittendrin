<div class="radio_program"></div>
<?php if (count($bpcms_playlists) > 0): ?>
    <script src="/js/jquery-1.10.2.js"></script>

    <script src="/themes/mittendrin/plugin/plate/js/jquery-ui.js"></script>
    <script src="/themes/mittendrin/plugin/plate/js/jquery.ui.touch-punch.min.js"></script>
    <script src="/themes/mittendrin/plugin/plate/js/jquery.cookie.js"></script>
    <script src="/themes/mittendrin/plugin/plate/js/perfect-scrollbar.js"></script>
    <script src="/themes/mittendrin/plugin/plate/js/jquery.rotate.js"></script>
    <script src="/themes/mittendrin/plugin/plate/js/plate.js"></script>

    <script type="text/javascript">
        $('.radio_program').plate({
            playlist: [
                <?php foreach ($bpcms_playlists as $bpcms_playlist): ?>
                    {title: '<?php echo $bpcms_playlist->getPlateTitle() ?>', artist: '<?php echo $bpcms_playlist->getPlateArtist() ?>', file: '<?php echo $bpcms_playlist->getPlateFile() ?>', cover: '<?php echo $bpcms_playlist->getPlateCover() ?>', buyLink: '<?php echo $bpcms_playlist->getPlateBuyLink() ?>'},
                <?php endforeach; ?>
            ],
            controls: ['trackInfo', 'progress', 'repeat', 'random', 'playlist', 'volume', 'play', 'prev', 'next', 'buyButton'],
            coverEffects: ['opacity'],
            coverAnimSpeed: 300,
            skin: 'light',
            width: 320,
            playlistHeight: 300,
            plateDJ: false,
            changeTrackChangePlate: false,
            onStart: {
                pause: true,
                repeat: false,
                random: false,
                volume: 70,
                speed: 1
            },
            useCookies: false,
            preloadFirstTrack: true
        });
    </script>
<?php endif; ?>