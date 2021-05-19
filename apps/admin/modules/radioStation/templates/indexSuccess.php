<h1>Stacje radiowe</h1>

<a href="<?php echo url_for('radioStation/new') ?>" class="btn btn-mini btn-success">utwórz nową stację radiową</a>
<hr>
<div class="bp-table-header row-fluid">
    <div class="span3">Opcje</div>
    <div class="span3">Nazwa stacji</div>
    <div class="span4">Tytuł</div>
    <div class="span2">Status</div>
</div>

<ul class="bp-table sortable-list ui-sortable" data-table="RadioStation">
    <?php foreach ($radio_stations as $lp => $radio_station): ?>
        <li class="sortable-item">
            <div class="row-fluid">
                <div class="span3">
                    <a href="<?php echo url_for('radioStation/edit?idradio_station=' . $radio_station->getIdradioStation()) ?>" class="btn btn-mini btn-info">edycja</a>
                    <a href="<?php echo url_for('radioStation/schedule?idradio_station=' . $radio_station->getIdradioStation()) ?>" class="btn btn-mini">ramówka</a>
                    <?php echo link_to('usuń', 'radioStation/delete?idradio_station=' . $radio_station->getIdradioStation(), array('method' => 'delete', 'confirm' => 'usuń?', 'class' => 'btn btn-mini btn-danger')) ?>
                </div>
                <div class="span3"><?php echo $radio_station->getName() ?></div>
                <div class="span4"><?php echo $radio_station->getTitle() ?></div>
                <div class="span2"><?php echo $radio_station->getStatusPublication() ?></div>
            </div>
            <input type="hidden"
                   name="<?php echo $radio_station->getIdradioStation() ?>"
                   value="<?php echo $lp + 1 ?>" data-table="RadioStation"/>
        </li>
    <?php endforeach; ?>
</ul>


