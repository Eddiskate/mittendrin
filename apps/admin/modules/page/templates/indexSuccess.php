<h1>Carts List</h1>

<table>
  <thead>
    <tr>
      <th>Idcart</th>
      <th>Cart name</th>
      <th>Title alt</th>
      <th>Title page</th>
      <th>No page</th>
      <th>Publication</th>
      <th>Position</th>
      <th>Position order</th>
      <th>Link active</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($carts as $cart): ?>
    <tr>
      <td><a href="<?php echo url_for('cart/edit?idcart='.$cart->getIdcart()) ?>"><?php echo $cart->getIdcart() ?></a></td>
      <td><?php echo $cart->getCartName() ?></td>
      <td><?php echo $cart->getTitleAlt() ?></td>
      <td><?php echo $cart->getTitlePage() ?></td>
      <td><?php echo $cart->getNoPage() ?></td>
      <td><?php echo $cart->getPublication() ?></td>
      <td><?php echo $cart->getPosition() ?></td>
      <td><?php echo $cart->getPositionOrder() ?></td>
      <td><?php echo $cart->getLinkActive() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('cart/new') ?>">New</a>
