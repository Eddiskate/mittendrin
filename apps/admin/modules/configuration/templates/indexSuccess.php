<h1 class="title">Konfiguracja</h1>

<table class="table table-condensed">
  <thead>
    <tr>
      <th width="50">Opcje</th>
      <th>Zmienna</th>
      <th>Wartość zmiennej</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($configurations as $configuration): ?>
    <tr>
      <td><a href="<?php echo url_for('configuration/edit?idconfiguration='.$configuration->getIdconfiguration()) ?>" class="btn btn-mini btn-info">zmień</a></td>
      <td><?php echo $configuration->getConfigName() ?></td>
      <td><?php echo $configuration->getConfigValue() ? $configuration->getConfigValue() : '-' ?></td>
      <td><?php if($configuration->getConfigOn() == 1): ?><b>aktywne</b><?php else: ?>wyłączone<?php endif; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
