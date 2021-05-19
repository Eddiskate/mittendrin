<h1>Bpcms page i18ns List</h1>

<table>
  <thead>
    <tr>
      <th>Page idpage</th>
      <th>Bpcms lang install signature</th>
      <th>Lang page name</th>
      <th>Lang page title</th>
      <th>Lang body</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_page_i18ns as $bpcms_page_i18n): ?>
    <tr>
      <td><a href="<?php echo url_for('bpcmsPageI18n/edit?page_idpage='.$bpcms_page_i18n->getPageIdpage().'&bpcms_lang_install_signature='.$bpcms_page_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_page_i18n->getPageIdpage() ?></a></td>
      <td><a href="<?php echo url_for('bpcmsPageI18n/edit?page_idpage='.$bpcms_page_i18n->getPageIdpage().'&bpcms_lang_install_signature='.$bpcms_page_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_page_i18n->getBpcmsLangInstallSignature() ?></a></td>
      <td><?php echo $bpcms_page_i18n->getLangPageName() ?></td>
      <td><?php echo $bpcms_page_i18n->getLangPageTitle() ?></td>
      <td><?php echo $bpcms_page_i18n->getLangBody() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('bpcmsPageI18n/new') ?>">New</a>
