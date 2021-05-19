function init_Navbar() {
    "use strict";

    var $obj = $('.navbar');

    $(window).scroll(function (event) {
        var y = $(this).scrollTop();

        if (y == 0) {
            $('.navbar-fixed-top').removeClass('nav_bar_scroll');
            $('.navbar-social').show();
            $('.navbar-lang').show();
            $('.logo-description').show();

            var $navbar_brand_img = $('.navbar-brand').children('img');
            $navbar_brand_img.attr('src', '/themes/mittendrinrwd2/images/logo_top.svg');
        } else {
            if (y > 150) {
                $('.menu-top-fixed').is(':visabled').slideDown();
            } else {
                $('.menu-top-fixed').slideUp();
            }
        }
    });

}



$(document).ready(function () {
    $("#post_premium_sidebar").carouFredSel({
        direction: "up",
        items: {
            visible: 3,
        },
        prev: '#prev_post',
        next: '#next_post',
        scroll: {
            items: 1,
            pauseOnHover: true
        },
        auto: false,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });

    var max_width = $('.container-post-tags').width();
    var width_sum = 0;

    $('.container-post-tags .el_list').each(function (index, el) {

        var $el_li = $(this);
        var el_width = $el_li.width() + 14;
        width_sum = width_sum + el_width;

        console.log('wielkosc elementu w petli px: ' + el_width);
        console.log('Ile już elementy zajmują px: ' + width_sum);

        if (max_width > width_sum) {
            console.log('dodaj');

        } else {
            var ile_dodac = width_sum - max_width;

            console.log('dodaj do' + ile_dodac);

            var $prev_element = $('.element_' + (index - 1));

            console.log('wielkosc poprzedniego elementu ' + $prev_element.width());
            var prev_element_width = $prev_element.width() + 13;
            $prev_element.width(prev_element_width + ile_dodac);

            width_sum = 0;

            console.log('za duzo sprawdz ktory sie nie zmiesci i ostani przed nim rozciginj o tyle o ile brauje');
        }

        console.log($el_li.find('a').text());
        console.log(index);
        console.log('______________________________________________');
    });
});

function init_Post() {
    "use strict";

    $(document).ready(function () {
        $('body').on('click', '.jq-load-more', function (event) {

            event.preventDefault();

            var $el_jq_load_more = $(this);
            var count_post_row = $('#post').find('.post-row').length;
            var bpcms_post_max_count_to_page = $el_jq_load_more.data('count');
            var $post_list = $('#post .post_list');
            var idpost_catalog = $el_jq_load_more.data('idpost-catalog');
            var name_url = $el_jq_load_more.data('name_url');
            var culture = $el_jq_load_more.data('culture');

            $.ajax({
                url: '/ajax/loadmorepost/',
                method: 'post',
                data: {
                    bpcms_post_max_count_to_page: count_post_row,
                    idpost_catalog: idpost_catalog,
                    name_url: name_url,
                    culture: culture,
                },
                success: function (response) {

                    $post_list.append(response);

                    if (response.length == 0) {
                        $('#post .jq-load-more').hide();
                    }
                }
            });

            $.ajax({
                url: '/ajax/loadmorepost/',
                method: 'post',
                data: {
                    bpcms_post_max_count_to_page: (count_post_row + count_post_row),
                    idpost_catalog: idpost_catalog,
                    name_url: name_url
                },
                success: function (response) {
                    if (response.length == 0) {
                        $('#post .jq-load-more').hide();
                    }
                }
            });
        })
    });

}

function init_StimmeForm() {
    var $form = $("#stimme-form");

    $form.validate({
        onfocusout: function (element) {
            $(element).valid();
        },
        submitHandler: function (form) {
            event.preventDefault();

            $.ajax({
                url: '/ajax/stimmeformsave',
                method: 'post',
                data: $form.serialize(),
                success: function (response) {
                    var $inputs = $form.find('input,textarea');

                    $inputs.each(function (index, el) {
                        var $el_input = $(this);
                        $el_input.val('');
                    });

                    var json = JSON.parse(response);
                    $form.fadeOut();
                    $('.stimme-form-alert').html(json.message);
                    $('.stimme-form-alert').fadeIn();
                }
            });
        },
        rules: {
            name: {
                required: true,
            },
            city: {
                required: true,
            },
            occasion: {
                required: true,
            },
        },
        messages: {
            accept_reg: {
                required: "Pole jest wymagane!",
            },
            city: {
                required: "Pole jest wymagane!",
            },
            occasion: {
                required: "Pole jest wymagane!",
            },
        }

    });

}

$('ul.nav li.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
}, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
});

function init_Radio() {
    $(document).ready(function () {
        function getTrackName() {
            console.log('pobieram');
            $.ajax({
                url: '/default/ajaxGetRadioPlayNow',
                success: function (response) {
                    $('.mp3_title').text(response);
                }
            });
        }

        getTrackName();

        setInterval(function () {
            getTrackName();
        }, 9000);

        // $('.popup_radio').click(function (event) {
        //     event.preventDefault();
        //     window.open($(this).attr("href"), "popupWindow", "width=600,height=600,scrollbars=no");
        // });

        // $.ajaxSetup(
        //     {
        //         cache: false,
        //         beforeSend: function () {
        //             $('.load_track_name_mittendrin').hide();
        //             $('#loading').show();
        //         },
        //         complete: function () {
        //             $('#loading').hide();
        //             $('.load_track_name_mittendrin').show();
        //         },
        //         success: function () {
        //             $('#loading').hide();
        //             $('.load_track_name_mittendrin').show();
        //         }
        //     });
        // var $container = $(".load_track_name_mittendrin");
        // $container.load("/radio_mittendrin.php");
        // var refreshId = setInterval(function () {
        //     $container.load('/radio_mittendrin.php');
        // }, 27000);
    });
}

var $el_body = $('body');
var $el_container_main = $('.container-main');
var $el_footer = $('footer');
var windows_height = $(document).height();

if ($el_body.height() < windows_height) {
    // var to_height = windows_height - $el_body.height();
    // $el_container_main.height($el_container_main.height() + to_height - 15);
}

$('body').on('click', '.jq-cookie-accept-info', function (event) {
    var $el_btn = $(this);
    var $el_container = $el_btn.parents('.bpcms-cookie-bar');

    document.cookie = "cookie-accept=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";

    $el_container.fadeOut();
});

function init_ModuleDiplomasSearch() {
    $('body').on('click', '.jq-bpcms-module-diplomas-search', function () {

        var $el_input = $('#bpcms-module-diplomas-search');
        var $el_content_html = $('#content_html');

        $.ajax({
            url: '/ajax/bpcmsDiplomasSearch',
            data: {keywords: $el_input.val()},
            success: function (response_html) {
                $el_input.val($el_input.val());
                $el_content_html.html(response_html);

                if ($el_input.val().length > 0) {
                    $('body').find('.panel-collapse').addClass('show').css({'height': 'auto'});
                } else {
                    $('body').find('.panel-collapse').removeClass('show').css({'height': '0px;'});
                }

            }
        });
    })
}

init_StimmeForm();
init_ModuleDiplomasSearch();
