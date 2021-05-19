<h1>Bpcms post i18ns List</h1>

<table>
  <thead>
    <tr>
      <th>Post idpost</th>
      <th>Bpcms lang install signature</th>
      <th>Lang title</th>
      <th>Lang description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_post_i18ns as $bpcms_post_i18n): ?>
    <tr>
      <td><a href="<?php echo url_for('bpcmsPostI18n/edit?post_idpost='.$bpcms_post_i18n->getPostIdpost().'&bpcms_lang_install_signature='.$bpcms_post_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_post_i18n->getPostIdpost() ?></a></td>
      <td><a href="<?php echo url_for('bpcmsPostI18n/edit?post_idpost='.$bpcms_post_i18n->getPostIdpost().'&bpcms_lang_install_signature='.$bpcms_post_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_post_i18n->getBpcmsLangInstallSignature() ?></a></td>
      <td><?php echo $bpcms_post_i18n->getLangTitle() ?></td>
      <td><?php echo $bpcms_post_i18n->getLangDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('bpcmsPostI18n/new') ?>">New</a>
