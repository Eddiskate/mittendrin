<?php if ($radio_stations): ?>
    <div class="row radio-station">
        <?php foreach ($radio_stations as $radio_station): ?>
            <div class="col-md-<?php echo $col ?> col-xs-12 box">
                <img src="/images/radio-station/<?php echo $radio_station->getAvatar() ?>">
                <div class="title"><?php echo $radio_station->getLangTitle() ?></div>
                <div class="line-radio"></div>
                <div class="description"><?php echo $radio_station->getLangDescription() ?></div>
                <?php if (count($radio_station->getSchedulesWeek()) > 0): ?>
                    <p><strong><?php echo LANG_BROADCAST_SCHEDULE_TITLE ?></strong></p>
                    <div class="schedule">
                        <?php foreach ($radio_station->getSchedulesWeek() as $day_number => $schedule_day_lists): ?>
                            <div class="schedule-day">
                                <div class="">
                                    <h2><?php echo Configuration::getNameWithDayNumber($day_number) ?></h2>
                                    <div class="h2-line"></div>
                                </div>
                                <?php foreach ($schedule_day_lists as $lp => $schedule_day_list): ?>
                                    <div>
                                        <div class="col-md-3 col-xs-3 schedule-hour"><?php echo $schedule_day_list['broadcast_hour'] ?></div>
                                        <div class="col-md-9 col-xs-9 schedule-title"><?php echo $schedule_day_list['title'] ?></div>
                                    </div>
                                    <div>
                                        <div class="schedule-description"><?php echo $schedule_day_list['description'] ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <style>
        .schedule .schedule-day {
            width: 14%;
            float: left;
            border: 1px solid #ededed;
        }

        .schedule .schedule-day .row {
            width: 100%;
        }

        .schedule .schedule-day .schedule-description p {
            padding-left: 5px;
            padding-right: 5px;
        }

        .radio-station {
            text-align: center;
        }

        .radio-station .box {

        }

        .radio-station .box:first-child {
            background-repeat: no-repeat;
            background-position: 101% 0px;
        }

        .radio-station .box:last-child {
            padding-left: 0px;
        }

        .radio-station .box .title {
            font-size: 16px;
            width: 170px;
            text-align: center;
            margin: 0 auto;
            margin-top: 19px;
        }

        .radio-station .box:first-child > .name {
            color: #547fb2;
        }

        .radio-station .box:last-child > .name {
            color: #4a391b;
            font-weight: bold;
        }

        .radio-station .box {
            padding-left: 15px;
        }

        .radio-station .box .description {
            padding-left: 70px;
            padding-right: 70px;
            text-align: left;
        }

        .radio-station .box .line-radio {
            /*background-image: url(/themes/mittendrinrwd2/images/mittendrin_icons.png);*/
            background-repeat: repeat-y;
            background-position: -64px 485px;
            height: 21px;
            width: 342px;
            margin: 0 auto;
        }

        .radio-station .box .schedule {
            margin: 0 auto;
        }

        .radio-station .box .schedule h2 {
            background-color: #ededed;
            font-size: 18px;
            padding: 18px;
            text-align: center;
            margin-bottom: 0px;
            /*background-image: url(/themes/mittendrinrwd2/images/mittendrin_icons.png);*/
            background-repeat: repeat-y;
            background-position: -273px 695px;
            font-weight: bold;
        }

        .radio-station .box .schedule .h2-line {
            background-color: #d9d9d9;
            margin-top: 1px;
            height: 3px;
            margin-bottom: 15px;
        }

        .radio-station .box .schedule .schedule-date {
            text-align: left;
            text-transform: uppercase;
        }

        .radio-station .box .schedule .schedule-date span {
            font-weight: bold;
        }

        .radio-station .box .schedule .schedule-hour {
            text-align: left;
            font-weight: bold;
            padding-top: 3px;
        }

        .radio-station .box .schedule .schedule-title {
            text-align: left;
            background-color: #ededed;
            padding-left: 10px;
            padding-top: 3px;
            padding-bottom: 3px;
            color: #547fb2;
            font-weight: bold;
            font-size: 15px;
        }

        .radio-station .box .schedule .schedule-description {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 15px;
            text-align: left;
        }

        .radio-station .box .schedule h2 {
            margin-top: 0px;
        }
    </style>
<?php endif; ?>