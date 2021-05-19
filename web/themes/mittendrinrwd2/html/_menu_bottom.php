<ul class="sidebar__footer-links clearfix">
    <?php foreach ($structure_cms as $cms): ?>
        <li>
            <a href="<?php echo $cms['href'] ?>" class="<?php echo $cms['class'] ?>"><?php echo $cms['name'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>