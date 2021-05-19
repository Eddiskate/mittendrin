<h1>Pages List</h1>

<table>
  <thead>
    <tr>
      <th>Idpage</th>
      <th>Page name</th>
      <th>Page title</th>
      <th>Body</th>
      <th>Cart idcart</th>
      <th>Publication</th>
      <th>Position</th>
      <th>Position order</th>
      <th>Rows</th>
      <th>Page default</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pages as $page): ?>
    <tr>
      <td><a href="<?php echo url_for('page/edit?idpage='.$page->getIdpage()) ?>"><?php echo $page->getIdpage() ?></a></td>
      <td><?php echo $page->getPageName() ?></td>
      <td><?php echo $page->getPageTitle() ?></td>
      <td><?php echo $page->getBody() ?></td>
      <td><?php echo $page->getCartIdcart() ?></td>
      <td><?php echo $page->getPublication() ?></td>
      <td><?php echo $page->getPosition() ?></td>
      <td><?php echo $page->getPositionOrder() ?></td>
      <td><?php echo $page->getRows() ?></td>
      <td><?php echo $page->getPageDefault() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('page/new') ?>">New</a>
