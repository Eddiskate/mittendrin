<h1>Bpcms download i18ns List</h1>

<table>
  <thead>
    <tr>
      <th>Download iddownload</th>
      <th>Bpcms lang install signature</th>
      <th>Lang title</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_download_i18ns as $bpcms_download_i18n): ?>
    <tr>
      <td><a href="<?php echo url_for('bpcmsDownloadI18n/edit?download_iddownload='.$bpcms_download_i18n->getDownloadIddownload().'&bpcms_lang_install_signature='.$bpcms_download_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_download_i18n->getDownloadIddownload() ?></a></td>
      <td><a href="<?php echo url_for('bpcmsDownloadI18n/edit?download_iddownload='.$bpcms_download_i18n->getDownloadIddownload().'&bpcms_lang_install_signature='.$bpcms_download_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_download_i18n->getBpcmsLangInstallSignature() ?></a></td>
      <td><?php echo $bpcms_download_i18n->getLangTitle() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('bpcmsDownloadI18n/new') ?>">New</a>
