
<ul>
    <?php foreach ($items as $uri => $item): ?>
        <?php if($item['is_current']): ?>
            <li><strong><?php echo myStringPeer::special($item['title']); ?></strong></li>
        <?php else: ?>
            <li><?php echo link_to(myStringPeer::special($item['title']), $uri); ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>