<h1 class="title">Pozdrowienia</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th align="left">Opcje</th>
      <th align="left">Pozdrowienia na dzień</th>
      <th align="left">Imię i nazwisko</th>
      <th align="left">Miejsce zamieszkania</th>
      <th align="left">Treść pozdrowień</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($stimmes as $stimme): ?>
    <tr>
      <td>
          <?php echo link_to('usuń','stimme/delete?idstimme='.$stimme->getIdstimme(), array('method' => 'delete', 'confirm' => 'Napewno?', 'class' => 'btn btn-danger btn-mini')) ?>
      </td>
      <td><?php echo $stimme->getDate() ?></td>
      <td><?php echo $stimme->getName() ?></td>
      <td><?php echo $stimme->getCity() ?></td>
      <td>
          <p><b>Z okazji:</b> <?php echo $stimme->getOccasion() ?></p>
          <p><b>Treść pozdrowień:</b></p>
          <p><?php echo $stimme->getDescription() ?></p>
          <p><b>życzenia składają:</b> <?php echo $stimme->getSubmitRequests() ?></p>
          <p><b>życzenie muzyczne:</b> <?php echo $stimme->getMusicService() ?></p>
      </td>
    </tr>
    <?php endforeach; ?>
    <?php if(!isset($stimme)): ?>
    <tr>
    	<td colspan="6" class="none">Brak dodanych pozdrowień</td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>
