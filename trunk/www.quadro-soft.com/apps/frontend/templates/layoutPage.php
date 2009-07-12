<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php 
    $isHomepage = (sfContext::getInstance()->getRouting()->getCurrentInternalUri() == "page/index");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        
        <link href="/images/favicon.ico" rel="Shortcut Icon" type="image/x-icon" />
    </head>
    <body <?php echo ($isHomepage ? 'id="homepage"' : 'class="innerpage"'); ?>>
        <div id="container">
            <div id="header">
                <div id="logotype"><?php if(!$isHomepage): ?><a href="<?php echo url_for('@homepage'); ?>"><?php endif; ?><img src="/images/logo.gif" width="189" height="50" border="0" alt="Quadro Soft logo" title="Homepage" /><?php if(!$isHomepage): ?></a><?php endif; ?></div>
                <br class="clear" />
                <div id="pageMenu">
                    
                    <?php include_component('page', 'menu'); ?>
                    
                </div>
            </div>
            
            <?php echo $sf_content ?>
            
            <div id="foter" class="small gray">&copy; 2009 Quadro Soft</div>
        </div>
    </body>
</html>
