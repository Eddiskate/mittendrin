<h1>Radio station schedule i18ns List</h1>

<table>
  <thead>
    <tr>
      <th>Radio station schedule idradio station schedule</th>
      <th>Bpcms lang install signature</th>
      <th>Lang title</th>
      <th>Lang description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($radio_station_schedule_i18ns as $radio_station_schedule_i18n): ?>
    <tr>
      <td><a href="<?php echo url_for('radioStationScheduleI18n/edit?
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
radio_station_schedule_idradio_station_schedule='.$radio_station_schedule_i18n->getRadioStationScheduleIdradioStationSchedule().'&bpcms_lang_install_signature='.$radio_station_schedule_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $radio_station_schedule_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
RadioStationScheduleIdradioStationSchedule() ?></a></td>
      <td><a href="<?php echo url_for('radioStationScheduleI18n/edit?
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
radio_station_schedule_idradio_station_schedule='.$radio_station_schedule_i18n->getRadioStationScheduleIdradioStationSchedule().'&bpcms_lang_install_signature='.$radio_station_schedule_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $radio_station_schedule_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
BpcmsLangInstallSignature() ?></a></td>
      <td><?php echo $radio_station_schedule_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
LangTitle() ?></td>
      <td><?php echo $radio_station_schedule_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
LangDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('radioStationScheduleI18n/new') ?>">New</a>
