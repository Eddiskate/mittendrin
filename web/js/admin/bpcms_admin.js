function init_PostTagsCreate() {
    "use strict";

    $(document).ready(function () {

        var $name = $('#name');
        var $name_url = $('#name_url');

        $name.keyup(function (event) {
            $name_url.val($name.val().replace(' ', '-').replace('.', '-'));
        });

    });
}

$('.sortable-list').sortable({
    axis: "y",
    update: function (event, ui) {

        var $el_ul = $('.sortable-list');
        var ul = $(ui.item).closest('ul');
        var index = 0;
        var toPost = {};

        ul.find('> li').each(function () {
            index++;

            var $el_input = $(this).find('input');
            $el_input.val(index);

            toPost[$el_input.attr('name')] = index;
        });

        $.ajax({
            url: '/admin.php/ajax/bptablerowpositionsave',
            data: {position: toPost, table: $el_ul.data('table')},
            type: 'POST',
            success: function (resp) {

            },
            error: function () {
                alert('Wystąpił błąd');
            }
        });
    }
});

$('.sortable-list-x').sortable({
    axis: "y",
    placeholder: "ui-state-highlight",
    over: function(event, ui) {
        var cl = ui.item.attr('class');
        $('.ui-state-highlight').addClass(cl);
    },
    update: function (event, ui) {

        var $el_ul = $('.sortable-list');
        var ul = $(ui.item).closest('ul');
        var index = 0;
        var toPost = {};

        ul.find('> li').each(function () {
            index++;

            var $el_input = $(this).find('input');
            $el_input.val(index);

            toPost[$el_input.attr('name')] = index;
        });

        $.ajax({
            url: '/admin.php/ajax/bptablerowpositionsave',
            data: {position: toPost, table: $el_ul.data('table')},
            type: 'POST',
            success: function (resp) {

            },
            error: function () {
                alert('Wystąpił błąd');
            }
        });
    }
});


function generateStat(date, type) {
    var $el_input_idradio_station = $('#idradio_station');
    var $el_html = $('#html-update');

    $el_html.html('<img src="/images/load.gif" class="text-center">');

    $.ajax({
        url: '/admin.php/mittendrinStats/generateStats',
        data: {date: date, idradio_station: $el_input_idradio_station.val(), type: type},
        success: function (response_html) {
            $el_html.html(response_html);
        }
    });
}

$(function () {

    var start = moment().subtract(6, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    moment.locale('pl');

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Dzisiaj': [moment(), moment()],
            'Wczoraj': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Ostatnie 7 dni': [moment().subtract(6, 'days'), moment()],
            'Ostatnie 30 dni': [moment().subtract(29, 'days'), moment()],
            'Bierzący miesiąc': [moment().startOf('month'), moment().endOf('month')],
            'Ostatni miesiąc': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        "locale": {
            "format": "YYYY-MM-DD",
            "separator": " - ",
            "applyLabel": "Zatwierdź",
            "cancelLabel": "Anuluj",
            "fromLabel": "Od",
            "toLabel": "To",
            "customRangeLabel": "Własny filtr",
            "daysOfWeek": [
                "Nie",
                "Pon",
                "Wto",
                "Sro",
                "Czw",
                "Pią",
                "Sob"
            ],
            "monthNames": [
                "styczeń",
                "luty",
                "marzec",
                "kwiecień",
                "maj",
                "czerwiec",
                "lipiec",
                "sierpień",
                "wrzesień",
                "październik",
                "listopad",
                "grudzień"
            ],
            "firstDay": 1
        }
    }, cb);

    cb(start, end);

    $('#reportrange').on('change', function () {
        var $el_input = $(this);

        generateStat($el_input.val(), $el_input.data('type'));
    });
});

$('.sortable-list').sortable({
    axis: "y",
    update: function (event, ui) {

        var ul = $(ui.item).closest('ul');
        var index = 0;
        var toPost = {};
        var table_name = ul.data('db-table');

        ul.find('> li').each(function () {
            index++;
            $(this).find('input').val(index);
            toPost[$(this).find('input').attr('name')] = index;
        });

        $.ajax({
            url: '/admin.php/ajax/bptablerowpositionsave',
            data: {position_row: toPost, table_name: table_name},
            type: 'POST',
            success: function (resp) {

            },
            error: function () {
                alert('Wystąpił błąd');
            }
        });
    }
});

function upload_image()
{
    var bar = $('#bar');
    var percent = $('#percent');

    $('#myForm').ajaxForm({
        beforeSubmit: function() {
            document.getElementById("progress_div").style.display="block";
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        success: function() {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        complete: function(xhr) {
            if(xhr.responseText)
            {
                document.getElementById("output_image").innerHTML=xhr.responseText;
            }
        }
    });
}

$('.jq-gallery-file-options-btn').on('click', function (event) {
    event.preventDefault();

    var $el_btn = $(this);
    var idgallery = $el_btn.data('idgallery');

    $.ajax({
        url: '/admin.php/ajax/galleryFileOption',
        data: {idgallery: idgallery},
        success: function (response) {

            $('body').on('click', '#jq-gallery-file-option-default-btn', function () {
                var $el_jq_gallery_file_option_default_gallery_off_label = $('body').find('#jq-gallery-file-option-default-gallery-off-label');

                $el_jq_gallery_file_option_default_gallery_off_label.toggle();
            })

            bootbox.dialog({
                message: response,
                buttons: {
                    danger: {
                        label: "zamknij",
                        className: "btn-danger"
                    },
                    success: {
                        label: "zapisz",
                        className: "btn-success",
                        callback: function () {
                            var $el_form = $('#form-gallery-option');

                            $.ajax({
                                url: '/admin.php/ajax/galleryFileOptionForm',
                                method: 'post',
                                data: $el_form.serialize(),
                                success: function (response) {

                                }
                            });
                        }
                    }
                },
                title: "Ustawienia zdjęcia",
                backdrop: false,
                onEscape: false
            });
        }
    });
});

$(".select_photo").click(function () {
    console.log("jest");
    var file_name = $(this).attr('data-filename');
    $('#myModal').modal('hide');
    $('.avatar').hide('slow');
    $('.lub').hide('slow');
    $(".avatar_db").val(file_name);
});

$('.copy-to-name-url').change(function (event) {
    console.log('przepisz do name-url class');
    var $el_input = $(this);
    var $el_form = $el_input.parents('form');

    $.ajax({
        url: '/admin.php/ajax/generateNameUrl',
        data: {name_url: $el_input.val()},
        success: function (response_json) {
            var json = JSON.parse(response_json);

            var $el_input_name_url = $el_form.find('.name-url');
            $el_input_name_url.val(json.name_url);
        }
    });
})