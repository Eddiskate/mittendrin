<h1>Bpcms album month i18ns List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Album month idalbum month</th>
      <th>Bpcms lang install signature</th>
      <th>Lang title</th>
      <th>Lang description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_album_month_i18ns as $bpcms_album_month_i18n): ?>
    <tr>
      <td><a href="<?php echo url_for('bpcmsAlbumMonthI18n/edit?
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
id='.$bpcms_album_month_i18n->getId()) ?>"><?php echo $bpcms_album_month_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
Id() ?></a></td>
      <td><?php echo $bpcms_album_month_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
AlbumMonthIdalbumMonth() ?></td>
      <td><?php echo $bpcms_album_month_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
BpcmsLangInstallSignature() ?></td>
      <td><?php echo $bpcms_album_month_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
LangTitle() ?></td>
      <td><?php echo $bpcms_album_month_i18n->get
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /var/www/mittendrin.localeddi/lib/vendor/symfony/lib/util/sfToolkit.class.php on line 362
LangDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('bpcmsAlbumMonthI18n/new') ?>">New</a>
