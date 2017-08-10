<div id="footer-contact-info-container">
    <h2 id="footer-content-left-title">Mainostoimisto Smoy</h2>
    <div class="contact-line-separator"></div>
    <?php if (!empty($smoy_footer_contact_building)): ?>
        <p><?php echo $smoy_footer_contact_building ?></p>
    <?php endif; ?>
    <?php if (!empty($smoy_footer_contact_street)): ?>
        <p><?php echo $smoy_footer_contact_street ?></p>
    <?php endif; ?>
    <?php if (!empty($smoy_footer_contact_city)): ?>
        <p><?php echo $smoy_footer_contact_city ?></p>
    <?php endif; ?>
    <br/>
    <?php if (!empty($smoy_footer_contact_phone)): ?>
        <?php if(is_page('eng')): ?>
            <p>Tel <?php echo $smoy_footer_contact_phone ?></p>
        <?php else: ?>
            <p>Vaihde <?php echo $smoy_footer_contact_phone ?></p>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (!empty($smoy_footer_contact_email)): ?>
        <p><?php echo $smoy_footer_contact_email ?></p>
    <?php endif; ?>
    <?php if(is_page('eng')): ?>
        <p>VAT 0741439-6</p>
    <?php else: ?>
        <p>Y-tunnus 0741439-6</p>
    <?php endif; ?>
</div>