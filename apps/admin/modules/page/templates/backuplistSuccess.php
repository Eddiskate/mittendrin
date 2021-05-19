<h1>Kopia strony: lista utworzonych kopii</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Opcje</th>
      <th>Nazwa strony</th>
      <th>Data utworzenia kopii</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($page_backups as $page_backup): ?>
    <tr>
      <td><a href="<?php echo url_for('page/backuprestore?idpage_backup='.$page_backup->getIdpageBackup()) ?>">przywróć stronę</a></td>
      <td><?php echo $page_backup->getPage()->getCart()->getCartName() ?> / <?php echo $page_backup->getPage()->getPageName() ?></td>
      <td><?php echo date('Y-m-d H:i:s', $page_backup->getCreatedAt()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
