<div class="row p-calendar">
    <div class="row-fluid">
        <div class="col-md-12">
            <h3 class="block-title"><span>Nauczyciel</span></h3>
        </div>
        <ul class="filters-city row">
            <?php foreach ($bpcms_calendar_citys as $idbpcms_calendar_city => $bpcms_calendar_city): ?>
                <li class="p-calendar-filters-city-btn col-md-4 col-xs-12"
                    data-idbpcms-calendar-city="<?php echo $bpcms_calendar_city['idbpcms_calendar_city'] ?>">
                    <a style="padding-left: 25px;padding-left: 25px;margin-top: 3px;display: block;margin-right: 30px;"><?php echo $bpcms_calendar_city['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="row-fluid section-calendar-filters-tags">
        <div class="col-md-12">
            <h3 class="block-title"><span>Typ zajęć</span></h3>
        </div>
        <ul class="filters-tag">
            <?php foreach ($bpcms_calendar_tags as $idbpcms_calendar_tag => $bpcms_calendar_tag): ?>
                <li class="p-calendar-filters-tags-btn col-md-2 col-xs-12"
                    data-idbpcms-calendar-tag="<?php echo $idbpcms_calendar_tag ?>">
                <span class="circle"
                      style="background-color: <?php echo $bpcms_calendar_tag['hex_background_color'] ?>"></span>
                    <a style="padding-left: 25px;padding-left: 25px;margin-top: 3px;display: block;margin-right: 30px;"><?php echo $bpcms_calendar_tag['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <hr>

    <div class="row-fluid">
        <?php foreach (BpcmsCalendar::getStaticWeekDays() as $day_number => $day): ?>
            <div class="col-md-2">
                <span class="day-name"><?php echo $day['name'] ?></span>
                <?php foreach ($bpcms_calendar_lists[$day_number] as $lp => $bpcms_calendar_day): ?>
                    <div class="day-row filters <?php echo Configuration::getStringAndReplace($bpcms_calendar_day['name']) ?>"
                         data-idbpcms-calendar-tag="<?php echo $bpcms_calendar_day['idbpcms_calendar_tag'] ?>"
                         data-idbpcms-calendar-city="<?php echo $bpcms_calendar_day['idbpcms_calendar_city'] ?>">
                        <div>
                            <a class="post-cat" href="#"
                               style="background-color: <?php echo $bpcms_calendar_day['background_color'] ? $bpcms_calendar_day['background_color'] : '#fff' ?>">
                                <?php echo $bpcms_calendar_day['time_start'] ?>
                                - <?php echo $bpcms_calendar_day['time_end'] ?>
                            </a>
                        </div>
                        <p class="name"><b><?php echo $bpcms_calendar_day['name'] ?></b></p>
                        <p class="person"
                           style="background-color: <?php echo $bpcms_calendar_day['background_color'] ? $bpcms_calendar_day['background_color'] : '#fff' ?>">
                            PROWADZĄCY:</p>
                        <p class="person-name"><?php echo $bpcms_calendar_day['city'] ?></p>
                        <p class="room-number"
                           style="border-color: <?php echo $bpcms_calendar_day['background_color'] ?>;">
                            SALA: <?php echo $bpcms_calendar_day['room_number'] ? $bpcms_calendar_day['room_number'] : $lp ?></p>
                    </div>
                    <style>
                        .day-row.filters.<?php echo Configuration::getStringAndReplace($bpcms_calendar_day['name']) ?> .post-cat:after {
                            border-color: <?php echo $bpcms_calendar_day['background_color'] ?> rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) !important;
                        }
                    </style>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<p class="text-center"><a href="<?php echo url_for('ajax/calendarDownloadPdf?filters=none') ?>"
                          id="jq-calendar-generate-pdf" class="btn btn-primary btn-purpure" target="_blank">POBIERZ
        GRAFIK</a></p>

<style>
    .p-calendar .day-row .name {
        /*height: 39px;*/
        font-size: 14px;
        font-family: ubuntu-condensed, sans-serif;
    }

    .p-calendar .day-row .person {
        background-color: #07c3f7;
        font-size: 10px;
        color: #fff;
        height: 15px;
    }

    .p-calendar .day-row .person-name {
        margin-bottom: 0px;
    }

    .p-calendar .day-row .room-number {
        border-top: 1px solid;
        border-bottom: 1px solid;
        padding-bottom: 0px;
        margin-bottom: 0px;
    }

    @media (min-width: 992px) {
        .p-calendar .col-md-2 {
            width: 19.999999%;
        }
    }

    .post-cat:before {
        display: none;
    }

    .p-calendar .filters p {
        text-align: center;
        padding-bottom: 10px;
        line-height: 15px;
    }

    .p-calendar .filters p.time {
        text-align: left;
        color: #ffffff;
        font-size: 16px;
        font-weight: bold;
    }

    .day-row {
        padding: 5px;
    }

    .day-row p {
        font-size: 11px;
    }

    .p-calendar {
        margin-top: 25px;
    }
</style>

