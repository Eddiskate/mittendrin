<h1>Bpcms text i18ns List</h1>

<table>
  <thead>
    <tr>
      <th>Bpcms lang install signature</th>
      <th>Lang text value</th>
      <th>Bpcms lang text name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_text_i18ns as $bpcms_text_i18n): ?>
    <tr>
      <td><a href="<?php echo url_for('bpcmsTextI18n/edit?bpcms_lang_install_signature='.$bpcms_text_i18n->getBpcmsLangInstallSignature().'&bpcms_lang_text_name='.$bpcms_text_i18n->getBpcmsLangTextName()) ?>"><?php echo $bpcms_text_i18n->getBpcmsLangInstallSignature() ?></a></td>
      <td><?php echo $bpcms_text_i18n->getLangTextValue() ?></td>
      <td><a href="<?php echo url_for('bpcmsTextI18n/edit?bpcms_lang_install_signature='.$bpcms_text_i18n->getBpcmsLangInstallSignature().'&bpcms_lang_text_name='.$bpcms_text_i18n->getBpcmsLangTextName()) ?>"><?php echo $bpcms_text_i18n->getBpcmsLangTextName() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('bpcmsTextI18n/new') ?>">New</a>
