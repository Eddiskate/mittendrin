<?php if ($sf_user->getAttribute('lang_content_id') == 9): ?>
    <div id="content_html" style="position: relative;">
        <div class="row-fluid search-box">
            <input id="bpcms-module-diplomas-search" value="<?php echo $keywords ?>" placeholder="Wyszukaj.."
                   style="position: absolute;right: 55px;top: -5px;padding-left: 10px;border: 1px solid #e1e2e4;line-height: 27px;">
            <button class="jq-bpcms-module-diplomas-search">szukaj</button>
        </div>
        <?php foreach ($bpcms_diplomas as $year => $bpcms_diploma): ?>
            <div class="course_lessons_section">
                <div class="panel-group" id="accordion_8248" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading_tab9939">
                            <div class="course_meta_data">
                                <div class="panel-title">
                                    <a class="tapable collapsed" role="button" data-toggle="collapse"
                                       href="#<?php echo str_replace(' ', '-', $year) ?>"
                                       aria-expanded="false" aria-controls="collapseOne">
                                        <table class="course_table">
                                            <tbody>
                                            <tr>
                                                <td class="number number-visible belowten">
                                                    <b><?php echo count($bpcms_diploma) ?></b>
                                                </td>
                                                <td class="icon">
                                                    <span class="lnr lnr-book"></span>
                                                </td>
                                                <td class="title">
                                                    <div class="course-title-holder">
                                                        <strong>Rok <?php echo $year ?></strong>
                                                        <i class="fa fa-sort-down"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="<?php echo str_replace(' ', '-', $year) ?>"
                             class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="heading_tab9939"
                             aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <div class="course-panel-body">
                                    <ul class="dt-sc-fancy-list black arrow">
                                        <?php foreach ($bpcms_diploma as $idbpcms_diploma => $bpcms_people_diploma): ?>
                                            <li>
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="width: 25%;"><?php echo $bpcms_people_diploma['name'] ?></td>
                                                        <td style="width: 60%;"
                                                            class="text-left"><?php echo $bpcms_people_diploma['title'] ?></td>
                                                        <td class="text-right"><a
                                                                    href="/images/diplomas/<?php echo $bpcms_people_diploma['image'] ?>"
                                                                    target="_blank"><img
                                                                        src="/themes/mittendrinrwd2/img/pdf-mitt.svg"
                                                                        width="20" style="margin-right: 10px;"></td>
                                                    </tr>
                                                </table>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <p></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <style>
        .course_title {
            margin-bottom: 5px;
            color: #457992;
        }

        .panel-default > .panel-heading {
            padding: 15px 0;
            font-size: 14px;
        }

        .panel-default > .panel-heading .panel-title {
            font-size: 14px;
        }

        .panel-default > .panel-heading .panel-title > a i.fa-sort-down {
            -webkit-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            transform: rotate(180deg);
            vertical-align: middle;
            color: #aaa;
        }

        .panel-default > .panel-heading .panel-title > a.collapsed i.fa-sort-down {
            -webkit-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            transform: rotate(0deg);
            vertical-align: top;
        }

        .course_table {
            width: 100%;
            margin-bottom: 0;
        }

        .course_table tr {
            border: 0;
        }

        .course_table tr td.number {
            width: 30px;
            opacity: 0;
            text-align: center;
            vertical-align: middle;
            color: #aaa;
        }

        .course_table tr td.number.number-visible {
            opacity: 1;
        }

        .course_table tr td.number.belowten {
            width: 30px;
            padding: 0 7px;
        }

        .course_table tr td.number.overthousand {
            width: 40px;
            padding: 0 5px;
        }

        .course_table tr td.icon {
            padding: 0 5px;
            vertical-align: middle;
            font-size: 16px;
            width: 33px;
            color: #457992;
        }

        .course_table tr td.title {
            padding-right: 10px;
            color: #555;
        }

        .course_table tr td.title i {
            margin: 0 5px;
            vertical-align: top;
            position: relative;
            top: 2px;
        }

        .course_table tr td.stm_badge {
            text-align: right;
            padding-right: 20px;
        }

        .course_table tr td.stm_badge .badge_unit {
            display: inline-block;
            min-width: 63px;
            padding: 0 4px;
            font-size: 12px;
            font-weight: 400;
            color: #fff;
            text-align: center;
            background-color: #48a7d4;
            border-radius: 3px;
        }

        .course_table tr td.stm_badge .badge_unit:first-letter {
            text-transform: uppercase;
        }

        .course_table tr td.stm_badge .badge_unit.free {
            background-color: #10c45c;
        }

        .course_table tr td.stm_badge .badge_unit.quiz {
            background-color: #eab830;
        }

        .course_table tr td.stm_badge .badge_unit.exam {
            background-color: #d94da6;
        }

        .course_table tr td.stm_badge .badge_unit.video {
            background-color: #1EC1D9;
        }

        .course_table tr td.stm_badge .badge_unit.test {
            background-color: #f13e3e;
        }

        .course_table tr td.stm_badge .badge_unit.private {
            background-color: #E35C49;
        }

        .course_table tr td .meta {
            display: inline-block;
            /*
          width: 120px;
                          max-width: 120px;
          */
            text-align: right;
            padding-left: 15px;
            font-size: 14px;
            color: #555;
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .course_table tr td .meta i {
            margin-right: 5px;
            font-size: 18px;
            color: #aaa;
            vertical-align: middle;
        }

        .stm_fixed_background .vc_parallax-inner {
            background-attachment: fixed !important;
        }

        .stm_fixed_background .vc_parallax-inner:after {
            content: '';
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 10;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.25);
        }

        .course_title {
            margin: 0 0 20px;
        }

        .course_lessons_section {
            margin-bottom: 37px;
            margin-top: 20px;
        }

        .course_lessons_section p {
            margin-bottom: 10px;
        }

        .panel-group .panel.panel-default {
            border-radius: 0;
            border: 1px solid #e1e2e4;
        }

        .jq-bpcms-module-diplomas-search {
            position: absolute;
            right: 5px;
            font-size: 10px;
            margin: -1px;
            height: 23px;
            line-height: 17px;
        }

        .jq-bpcms-module-diplomas-search {
            color: #fff;
            background: rgba(255, 0, 51, 1);
            font-weight: bold;
            font-size: 13px;
            border-radius: 0px;
            text-transform: uppercase;
            border: 0px;
            /* line-height: 26px; */
            height: 29px;
            margin-top: -5px;
            margin-right: -4px;
        }
    </style>
<?php endif; ?>