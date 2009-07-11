
<ul>
    <?php foreach ($items as $uri => $item): ?>
        <?php if($item['is_current']): ?>
            <li><strong><?php echo $item['title']; ?></strong></li>
        <?php else: ?>
            <li><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

