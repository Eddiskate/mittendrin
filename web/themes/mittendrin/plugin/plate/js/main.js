$('.radio_mittendrin').plate({
    playlist: [
        {title: 'Radio Mittendrin', artist: true, file: 'http://s1.slotex.pl:7592', cover: '/themes/mittendrin/plugin/plate/images/radio_cover/mittendrin.jpg'}
    ],
    controls: ['cover', 'vinyl', 'trackInfo', 'progress', 'volume', 'play', 'buyButton'],
    coverEffects: ['opacity'],
    coverAnimSpeed: 300,
    skin: 'light',
    width: 320,
    playlistHeight: 200,
    plateDJ: true,
    changeTrackChangePlate: true,
    onStart: {
        pause: false,
        repeat: true,
        random: true,
        volume: 30,
        speed: 1
    },
    useCookies: false,
    preloadFirstTrack: false
});

$('.radio_heimat').plate({
    playlist: [
        {title: 'Radio Heimat', artist: true, file: 'http://91.121.77.187:4300/', cover: '/themes/mittendrin/plugin/plate/images/radio_cover/heimat.jpg'}
    ],
    controls: ['cover', 'vinyl', 'trackInfo', 'progress', 'volume', 'play', 'buyButton'],
    coverEffects: ['opacity'],
    coverAnimSpeed: 300,
    skin: 'light',
    width: 320,
    playlistHeight: 200,
    plateDJ: true,
    changeTrackChangePlate: true,
    ended: true,
    onStart: {
        pause: true,
        repeat: true,
        random: true,
        volume: 30,
        speed: 1
    },
    useCookies: false,
    preloadFirstTrack: false
});

$('.radio_heimat .play').attr('data-playername', 'heimat');
$('.radio_mittendrin .play').attr('data-playername', 'mittendrin');

$('.play').click(function () {
    var radio_name = $(this).data("playername")

    if (radio_name == 'heimat') {
        $('.radio_mittendrin').plate('pause');
    }

    if (radio_name == 'mittendrin') {
        $('.radio_heimat').plate('pause');
    }
});

$(document).ready(function ()
{
    /*
     * load do mittendrin
     */
    
    $.ajaxSetup(
            {
                cache: false,
                beforeSend: function () {
                    $('.load_track_name_mittendrin').hide();
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                    $('.load_track_name_mittendrin').show();
                },
                success: function () {
                    $('#loading').hide();
                    $('.load_track_name_mittendrin').show();
                }
            });
    var $container = $(".load_track_name_mittendrin");
    $container.load("/radio_mittendrin.php");
    var refreshId = setInterval(function ()
    {
        $container.load('/radio_mittendrin.php');
    }, 27000);
});