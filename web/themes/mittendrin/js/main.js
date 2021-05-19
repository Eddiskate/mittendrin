/**
 * Created by eddi on 11.12.14.
 */
$('#slideshow').carousel()

jQuery('ul.nav li.dropdown').hover(function () {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
}, function () {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
});

/*
 * footer zawsze na dole
 */

var docHeight = $(window).height();
var footerHeight = $('footer').height();
var footerTop = $('footer').position().top + footerHeight;

if (footerTop < docHeight) {
    $('footer').css('margin-top', -15 + (docHeight - footerTop) + 'px');
}

/*
 * koniec czarów z footer
 */

$("#post_premium").carouFredSel({
    height: 330,
    width: 272,
    direction: "up",
    items: {
        height: 90,
        width: 259,
        visible: 4
    },
    prev: '#next_post',
    next: '#prev_post',
    scroll: {
        items: 1,
        pauseOnHover: true
    },
    auto: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('.popup_radio').click(function (event) {
    event.preventDefault();
    window.open($(this).attr("href"), "popupWindow", "width=600,height=600,scrollbars=no");
});

$('.show_movies').click(function () {
    $('.movie_avatar').toggle('slow');
    $('.movie_youtube').toggle('slow');
    $("#ytplayer").attr("src", $("#ytplayer").attr("src").replace("autoplay=0", "autoplay=1"));

});

$('.img-grayscale-remove').hover(function () {
    $('.img-youtube-avatar').addClass('img');
});

$('.img-grayscale-remove').mousemove(function () {
    $('.img-youtube-avatar').removeClass('img');
});

$(document).ready(function ()
{

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

