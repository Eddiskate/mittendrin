<h1>Bpcms cart i18ns List</h1>

<table>
  <thead>
    <tr>
      <th>Cart idcart</th>
      <th>Lang cart name</th>
      <th>Lang title alt</th>
      <th>Lang title page</th>
      <th>Lang cart name title</th>
      <th>Bpcms lang install signature</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_cart_i18ns as $bpcms_cart_i18n): ?>
    <tr>
      <td><a href="<?php echo url_for('bpcmsCartI18n/edit?cart_idcart='.$bpcms_cart_i18n->getCartIdcart().'&bpcms_lang_install_signature='.$bpcms_cart_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_cart_i18n->getCartIdcart() ?></a></td>
      <td><?php echo $bpcms_cart_i18n->getLangCartName() ?></td>
      <td><?php echo $bpcms_cart_i18n->getLangTitleAlt() ?></td>
      <td><?php echo $bpcms_cart_i18n->getLangTitlePage() ?></td>
      <td><?php echo $bpcms_cart_i18n->getLangCartNameTitle() ?></td>
      <td><a href="<?php echo url_for('bpcmsCartI18n/edit?cart_idcart='.$bpcms_cart_i18n->getCartIdcart().'&bpcms_lang_install_signature='.$bpcms_cart_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_cart_i18n->getBpcmsLangInstallSignature() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('bpcmsCartI18n/new') ?>">New</a>
