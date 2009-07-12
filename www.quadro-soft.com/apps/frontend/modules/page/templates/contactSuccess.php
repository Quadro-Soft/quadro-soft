<style type="text/css">
#pageTitle {
    background:#f2f2f2 url('/images/pic-what-we-do.jpg') no-repeat;
}
</style>

<div id="pageTitle">
    <h1 id="title" class="pngfix"><img src="/images/ttl-contact.png" width="404" height="43" alt="Contact" title="" /></h1>
</div>
<div id="content">
    <div id="mainContent">
        <p>Tel: +3 8050 1234567</p>
        <p>Email: <a href="mailto:info@quadro-soft.com">info@quadro-soft.com</a></p>
        <hr />
        
        <?php if ($isError): ?>
        <p class="big red"><?php echo $error; ?></p>
        <hr />
        <?php endif; ?>
        <?php if ($isMessage): ?>
        <p class="big green"><?php echo $message; ?></p>
        <hr />
        <?php endif; ?>
        
        <a name="contactForm"></a>
        <h2>Please send us your comments, suggestions or questions:</h2>
        <form class="form" action="" id="messageForm" method="post">
            <p>
                <label for="contactName" class="required">Your name <span>(Required)</span></label>
                <input class="text" id="contactName" name="contactName" size="30" type="text" value="<?php echo $contactName; ?>" />
            </p>
            <br class="clear" />
            <p>
                <label for="contactEmail" class="required">Email address <span>(Required)</span></label>
                <input class="text" id="contactEmail" name="contactEmail" size="30" type="text" value="<?php echo $contactEmail; ?>" />
            </p>
            <br class="clear" />
            <p>
                <label for="contactCompany">Company</label>
                <input class="text" id="contactCompany" name="contactCompany" size="30" type="text" value="<?php echo $contactCompany; ?>" />
            </p>
            <br class="clear" />
            <p>
                <label for="contactTelephone">Telephone</label>
                <input class="text" id="contactTelephone" name="contactTelephone" size="30" type="text" value="<?php echo $contactPhone; ?>" />
            </p>
            <br class="clear" />
            <p>
                <label for="contactMessage" class="required">Your message <span>(Required)</span></label>
                <textarea class="text" cols="40" id="contactMessage" name="contactMessage" rows="20"><?php echo $contactMessage; ?></textarea>
            </p>
            <br class="clear" />
            <p>
                <input alt="Send to Quadro Soft" class="submit image" id="buttonSend" name="buttonSend" type="submit" value="Send to Quadro Soft">
            </p>
        </form>
    </div>
</div>