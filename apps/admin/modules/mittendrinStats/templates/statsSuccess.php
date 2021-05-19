<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<form method="get">
<div class="control-group">
    <div class="controls">
        <div class="input-prepend input-append">
            <span id="focus_input" class="add-on"><i class="icon-calendar"></i></span>
            <input class="input-large" type="text" id="reportrange" name="date">
            <input class="input-large" type="hidden" id="idradio_station" name="idradio_station" value="<?php echo $sf_params->get('idradio_station') ?>">
        </div>
    </div>
</div>
</form>

<div id="html-update"></div>