<h1>Stacja radiowa <?php echo $radio_station->getName() ?>, ramówka</h1>
<a href="<?php echo url_for('radioStation/index') ?>" class="btn btn-mini btn-default">poprzednia strona</a> <a
        href="<?php echo url_for('radioStationSchedule/new?idradio_station=' . $sf_params->get('idradio_station')) ?>"
        class="btn btn-mini btn-success">dodaj pozycję do ramówki</a>
<hr>

<div class="accordion" id="accordion2">
    <?php foreach ($week_plans as $day => $week_plan): ?>
        <div class="accordion-group">
            <div class="accordion-heading">
                <div class="row-fluid">
                    <a class="accordion-toggle span9" data-toggle="collapse" data-parent="#day<?php echo $day ?>"
                       href="#day<?php echo $day ?>">
                        <?php echo $week_plan['day_name'] ?>
                    </a>
                    <div class="span3">
                        <span class="broadcast-count">ilość audycji (<?php echo count($week_plan['broadcast_list']) ?>)</span>
                    </div>
                </div>
            </div>
            <div id="day<?php echo $day ?>" class="accordion-body collapse">
                <div class="accordion-inner">
                    <table class="table">
                        <thead>
                        <tr>
                            <th width="90">Opcje</th>
                            <th>Tytuł</th>
                            <th>Opis</th>
                            <th>Godzina</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($week_plan['broadcast_list'] as $broadcast): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo url_for('radioStationSchedule/edit?idradio_station_schedule=' . $broadcast['idradio_station_schedule']) ?>"
                                       class="btn btn-mini btn-info">edycja</a>
                                    <?php echo link_to('usuń', 'radioStationSchedule/delete?idradio_station_schedule=' . $broadcast['idradio_station_schedule'], array('method' => 'delete', 'confirm' => 'usuń?', 'class' => 'btn btn-mini btn-danger')) ?>
                                </td>
                                <td width="300"><?php echo $broadcast['title'] ?></td>
                                <td><?php echo $broadcast['description'] ?></td>
                                <td style="text-align: center;"><?php echo $broadcast['broadcast_hour'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>