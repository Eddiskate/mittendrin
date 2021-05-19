/**
 * Created by eddi on 28.12.16.
 */

$(document).ready(function () {


    //
    // var player_heimat = new MediaElementPlayer('#audio-player-heimat', {
    //     alwaysShowControls: true,
    //     features: ['playpause', 'volume', 'progress'],
    //     audioVolume: 'horizontal',
    //     audioWidth: 400,
    //     audioHeight: 120,
    //     startVolume: 0.0
    // });

    // var $el_tab_active = $('.tab-content .active');
    //
    // if ($el_tab_active.attr('id') == 'heimat') {
    //     player_heimat.play();
    // } else {
    //     player_mittendrin.play();
    // }
    //
    // $('.nav-tabs a').click(function () {
    //
    //     var $el_a = $(this);
    //
    //     if ($el_a.attr('href') == '#mittendrin') {
    //         player_mittendrin.play();
    //     }
    //
    //     if ($el_a.attr('href') == '#heimat') {
    //         player_heimat.play();
    //
    //         $('#heimat .mejs-horizontal-volume-current').css({"width": "100px"});
    //     }
    //
    // });
    //
    // $('#radio-select a').click(function (e) {
    //     e.preventDefault()
    //     $(this).tab('show')
    // });
    //
    // $.SHOUTcast({
    //     host: 's1.slotex.pl',
    //     port: 7592,
    //     interval: 2000,
    //     stats: function () {
    //         $('.mp3_title_mittendrin').text(this.get('songtitle', 'Off Air'));
    //     }
    // }).startStats();
    //
    // $.SHOUTcast({
    //     host: 's1.slotex.pl',
    //     port: 7430,
    //     interval: 2000,
    //     stats: function () {
    //         $('.mp3_title_heimat').text(this.get('songtitle', 'Off Air'));
    //     }
    // }).startStats();

    setInterval(function () {
        $.ajax({
            url: '/ajax/mitStatsUpdate',
            success: function () {
                console.log('czas został dodany');
            }
        });
    }, 6000);


});