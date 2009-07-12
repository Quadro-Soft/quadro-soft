
<?php /* ?>
    $content
<?php */ ?>

<?php if ($content != null): ?>
    <div id="pageTitle" style="background:#f2f2f2 url('<?php echo $content['bgUrl'] ?>') no-repeat;">
        <h1 id="title" class="pngfix"><img src="<?php echo $content['imgSrc']; ?>" width="404" height="43" alt="<?php echo myStringPeer::special($content['title']); ?>" title="" /></h1>
    </div>
<?php else: ?>
    
<?php endif; ?>