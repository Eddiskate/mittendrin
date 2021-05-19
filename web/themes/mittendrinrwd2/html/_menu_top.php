<ul class="sidebar__nav clearfix">
    <?php foreach ($structure_cms as $cms): ?>
        <li>
            <a href="<?php echo $cms['href'] ?>" class="sidebar__link <?php echo $cms['class'] ?>"><?php echo $cms['name'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>